<?php
include('database.php');

$categories = $conn->query("SELECT DISTINCT genre FROM books");

if (isset($_GET['genre'])) {
    $selected_genre = $_GET['genre'];
    $query = "SELECT * FROM books WHERE genre = '$selected_genre'";
} else {
    $query = "SELECT * FROM books";
}
$books = $conn->query($query);
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
        <h1>Categories</h1>
        <form method="GET" action="categories.php">
            <label for="genre">Select Genre:</label>
            <select name="genre" id="genre" onchange="this.form.submit()">
                <option value="">All Categories</option>
                <?php while ($category = $categories->fetch_assoc()): ?>
                    <option value="<?php echo htmlspecialchars($category['genre']); ?>" <?php if (isset($selected_genre) && $selected_genre == $category['genre']) echo 'selected'; ?>>
                        <?php echo htmlspecialchars($category['genre']); ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </form>

        <div class="book-list">
            <?php while ($book = $books->fetch_assoc()): ?>
                <div class="book">
                    <img src="<?php echo htmlspecialchars($book['image_url']); ?>" alt="Book Image" class="book-image">
                    <h2><?php echo htmlspecialchars($book['title']); ?></h2>
                    <p><strong>Author:</strong> <?php echo htmlspecialchars($book['author']); ?></p>
                    <p class="price">Price: $<?php echo htmlspecialchars($book['price']); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
