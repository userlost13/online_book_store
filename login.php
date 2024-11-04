<?php
include('database.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['is_admin'] = $user['is_admin'];
            header("Location: index.php");
        } else {
            echo "<p class='error'>Invalid password!</p>";
        }
    } else {
        echo "<p class='error'>No user found!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
    <a href="index.php">Home</a>
    <a href="books.php">Books</a>
    <a href="categories.php">Categories</a>
    <a href="about.php">About Us</a>
    <a href="contact.php">Contact</a>

    <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
        <!-- Only visible to logged-in admins -->
        <a href="admin.php">Admin Panel</a>
        <a href="view_feedback.php">View Feedback</a>
        <a href="logout.php">Logout</a>
    <?php elseif (isset($_SESSION['user_id'])): ?>
        <!-- Only visible to logged-in regular users -->
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <!-- Visible to users who are not logged in -->
        <a href="login.php">Login</a>
        <a href="admin_login.php">Admin Login</a> <!-- Link to admin login page -->
    <?php endif; ?>
</div>


    <!-- Login Form -->
    <div class="container">
        <h1>Login</h1>
        <form method="POST" action="">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
