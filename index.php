<?php
include('database.php');
$query = "SELECT * FROM books";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Bookstore</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="navbar">
<span class="navbar-brand">ONLINE BOOK STORE</span>
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


    <!-- Main Content -->
    <div class="container">
        <h1>Available Books</h1>
        <div class="book-list">
            <?php while ($book = $result->fetch_assoc()): ?>
                <div class="book">
                    <img src="<?php echo htmlspecialchars($book['image_url']); ?>" alt="Book Image" class="book-image">
                    <h2><?php echo htmlspecialchars($book['title']); ?></h2>
                    <p><strong>Author:</strong> <?php echo htmlspecialchars($book['author']); ?></p>
                    <p><?php echo htmlspecialchars($book['description']); ?></p>
                    <p class="price">Price: $<?php echo htmlspecialchars($book['price']); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
