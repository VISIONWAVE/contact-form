<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles.css"> <!-- Linking External CSS -->
</head>
<body>
    <div class="container">
        <h2>Contact Us</h2>
        
        <!-- Display success/error messages -->
        <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
            <p class="success-message">Message sent successfully!</p>
        <?php elseif (isset($_GET['status']) && $_GET['status'] == 'error'): ?>
            <p class="error-message">Failed to send message. Please try again.</p>
        <?php endif; ?>

        <form action="process.php" method="POST">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="message">Your Message:</label>
            <textarea id="message" name="message" rows="5" placeholder="Enter your message" required></textarea>

            <button type="submit">Send Message</button>
        </form>
    </div>
</body>
</html>
