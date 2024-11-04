<?php
include('database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare and execute the query to insert feedback into the database
    $stmt = $conn->prepare("INSERT INTO feedback (username, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $message);

    if ($stmt->execute()) {
        $success_message = "Thank you for your feedback!";
    } else {
        $error_message = "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
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


    <!-- Contact Form -->
    <div class="container">
        <h1>Contact Us</h1>
        
        <?php if (isset($success_message)): ?>
            <p class="success"><?php echo $success_message; ?></p>
        <?php elseif (isset($error_message)): ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>
        
        <form method="POST" action="contact.php">
            <label for="username">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Suggestions / Feedback:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit">Submit Feedback</button>
        </form>
    </div>
</body>
</html>
