<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Books</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
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

    <div class="container">
        <h1>About</h1>
        <p>About Us
Welcome to Online Book Store your ultimate online destination for books of all genres, for every reader. We believe that a book can change your life, inspire you, and expand your world, one page at a time. Our mission is to bring together a wide selection of books to spark curiosity, fuel knowledge, and ignite the imagination of readers around the globe.</p>
    </div>
</body>
</html>
