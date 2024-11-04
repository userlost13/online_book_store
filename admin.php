<?php
session_start();
include('database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['admin_password'])) {
    $password = $_POST['admin_password'];

    if ($password === "Admin123!") { // Replace with your actual admin password
        $_SESSION['admin_verified'] = true;
    } else {
        $error_message = "Incorrect password.";
    }
}

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1 || !isset($_SESSION['admin_verified'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel Login</title>
</head>
<body>
    <div class="container">
        <h1>Admin Access</h1>
        <?php if (isset($error_message)) echo "<p class='error'>$error_message</p>"; ?>
        <form method="POST" action="admin.php">
            <label for="admin_password">Enter Admin Password:</label>
            <input type="password" id="admin_password" name="admin_password" required>
            <button type="submit">Enter Admin Panel</button>
        </form>
    </div>
</body>
</html>
<?php
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <p>Welcome, Admin! Here you can manage the bookstore.</p>
    </div>
</body>
</html>
