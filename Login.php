<!DOCTYPE html>
<html>
<head>
    <title>Employee Management Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2>Employee Management Login</h2>

    <form action="authenticate.php" method="POST">

        <div class="mb-3">
            <input
            type="text"
            name="username"
            class="form-control"
            placeholder="Username"
            required>
        </div>

        <div class="mb-3">
            <input
            type="password"
            name="password"
            class="form-control"
            placeholder="Password"
            required>
        </div>

        <button type="submit" class="btn btn-primary">
            Login
        </button>

    </form>

</div>

</body>
</html>
