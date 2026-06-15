<?php
// 1. Configure headers to allow communication from your frontend
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Content-Type: application/json");

// Handle preflight OPTIONS requests gracefully (used by browsers for security checks)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

// 2. Database Connection Credentials
$servername = "localhost";
$username   = "root"; 
$password   = ""; 
$dbname     = "school_system";

// Establish Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if connection failed
if ($conn->connect_error) {
    echo json_encode([
        "status" => "error", 
        "message" => "Database connection failed: " . $conn->connect_error
    ]);
    exit();
}

// 3. Receive and Parse the Incoming Form Request
// Reads raw JSON payloads sent via JavaScript's fetch()
$rawInput = file_get_contents("php://input");
$data = json_decode($rawInput, true);

// 4. Validate and Insert Data
if (!empty($data['firstName']) && !empty($data['lastName']) && !empty($data['email'])) {
    
    // Extract values
    $first_name = trim($data['firstName']);
    $last_name  = trim($data['lastName']);
    $email      = filter_var(trim($data['email']), FILTER_SANITIZE_EMAIL);
    $gpa        = isset($data['gpa']) ? floatval($data['gpa']) : 0.00;
    
    // Use a Prepared Statement to insert data securely
    $stmt = $conn->prepare("INSERT INTO students (first_name, last_name, email, gpa) VALUES (?, ?, ?, ?)");
    
    if ($stmt) {
        // "sssd" means string, string, string, double/decimal
        $stmt->bind_param("sssd", $first_name, $last_name, $email, $gpa);
        
        if ($stmt->execute()) {
            echo json_encode([
                "status" => "success", 
                "message" => "Student successfully registered in database!"
            ]);
        } else {
            // Check for duplicate emails or other table constraint breaks
            echo json_encode([
                "status" => "error", 
                "message" => "Execution failed: " . $stmt->error
            ]);
        }
        $stmt->close();
    } else {
        echo json_encode([
            "status" => "error", 
            "message" => "Statement preparation failed: " . $conn->error
        ]);
    }
    
} else {
    // If required fields were missing in the HTTP request payload
    echo json_encode([
        "status" => "error", 
        "message" => "Incomplete form submisson. First name, Last name, and Email are required."
    ]);
}

// Close Connection
$conn->close();
?>
