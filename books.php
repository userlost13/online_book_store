<?php
include('database.php');
$query = "SELECT * FROM books";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Books</title>
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
    <a href="logout.php">Logout</a>
</div>
    <div class="container">
        <h1>All Books</h1>
        <div class="book-list">
            <?php while ($book = $result->fetch_assoc()): ?>
                <div class="book">
                    <img src="<?php echo htmlspecialchars($book['image_url']); ?>" alt="Book Image" class="book-image">
                    <h2><?php echo htmlspecialchars($book['title']); ?></h2>
                    <p><strong>Author:</strong> <?php echo htmlspecialchars($book['author']); ?></p>
                    <p><strong>Genre:</strong> <?php echo htmlspecialchars($book['genre']); ?></p>
                    <p class="price">Price: $<?php echo htmlspecialchars($book['price']); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
