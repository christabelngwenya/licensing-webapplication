<!DOCTYPE html>
<html>
<head>
    <title>Error</title>
</head>
<body>
    <h1>Error</h1>
    <p>An error occurred while processing your request. Please try again later.</p>

    <?php
    // Display the error message, if available
    if (isset($_GET['error'])) {
        $errorMessage = $_GET['error'];
        echo "<p>Error message: $errorMessage</p>";
    }
    ?>
</body>
</html>