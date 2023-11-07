<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <!-- submit the data from the form to action/register.php -->
    <form action="../actions/register.php" method="post" class="border rounded-2 p-3 w-50 mx-auto my-5">
        <h1 class="display-6 text-center text-uppercase">Register</h1>

        <label for="first_name" class="form-label">First Name</label>
        <input type="text" name="first_name" id="first-name" class="form-control mb-2">

        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" name="last_name" id="last-name" class="form-control mb-2">

        <label for="username" class="form-label fw-bold">Username</label>
        <input type="text" name="username" id="username" class="form-control mb-2">

        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control mb-4">

        <button type="submit" class="btn btn-success w-100">Register</button>
        <div class="text-center">
            Registered already? <a href="index.php">Log in</a>.
        </div>
    </form>
</body>
</html>