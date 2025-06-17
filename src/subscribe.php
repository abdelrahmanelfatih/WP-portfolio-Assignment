<?php
// Database connection settings
$host = "localhost";
$username = "root";
$password = ""; 
$database = "portfolio_db";


$conn = new mysqli($host, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    // Validate input
    if (empty($name) || empty($email)) {
        header("Location: index.php?error=Please+fill+in+all+fields");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.php?error=Invalid+email+format");
        exit();
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO newsletter_subscribers (name, email) VALUES (?, ?)");
    if ($stmt) {
        $stmt->bind_param("ss", $name, $email);
        $exec = $stmt->execute();

        if ($exec) {
            header("Location: index.php?subscribed=true");
            exit();
        } else {
            header("Location: index.php?error=Database+error:+Email+may+already+exist");
            exit();
        }

        $stmt->close();
    } else {
        header("Location: index.php?error=Failed+to+prepare+SQL+statement");
        exit();
    }
} else {
    header("Location: index.php?error=Invalid+request");
    exit();
}

$conn->close();
?>
