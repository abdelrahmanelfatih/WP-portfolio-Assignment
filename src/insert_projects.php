<?php
// Database configuration
$host = 'localhost';
$username = 'root';     
$password = '';          
$database = 'portfolio_db'; 

// Connect to the database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}


$projects = [
    [
        "title" => "Abdulrahman's Telegram Bot",
        "description" => "A smart Telegram bot That makes invoices to help automate billing.",
        "project_url" => "https://github.com/abdelrahmanelfatih/telegram-bot-backend",
        "images" => ["abdulp1.jpg", "abdulp2.jpg", "abdulp3.jpg"]
    ],
    [
        "title" => "Mohamed's Video Game",
        "description" => "A 2D platformer game.",
        "project_url" => "",
        "images" => ["mohamedp1.jpg", "mohamedp2.jpg", "mohamedp3.jpg"]
    ],
    [
        "title" => "Hamza's AR Headset Prototype",
        "description" => "A prototype AR headset designed to simulate augmented vision for games.",
        "project_url" => "",
        "images" => ["Hamza project.jpg"] 
    ]
];

foreach ($projects as $project) {
    $stmt = $conn->prepare("INSERT INTO projects (title, description, project_url) VALUES (?, ?, ?)");
    if (!$stmt) {
        echo "❌ Failed to prepare project insert: " . $conn->error . "<br>";
        continue;
    }

    $stmt->bind_param("sss", $project['title'], $project['description'], $project['project_url']);
    if (!$stmt->execute()) {
        echo "❌ Failed to insert project: " . $stmt->error . "<br>";
        continue;
    }


    $project_id = $stmt->insert_id;
    $stmt->close();

    // Insert each image related to the project
    foreach ($project["images"] as $img) {
        $img_stmt = $conn->prepare("INSERT INTO project_images (project_id, image_filename) VALUES (?, ?)");
        if (!$img_stmt) {
            echo "❌ Failed to prepare image insert for '$img': " . $conn->error . "<br>";
            continue;
        }

        $img_stmt->bind_param("is", $project_id, $img);
        if (!$img_stmt->execute()) {
            echo "❌ Failed to insert image '$img': " . $img_stmt->error . "<br>";
        } else {
            echo "✅ Image '$img' inserted for project '{$project['title']}'<br>";
        }

        $img_stmt->close();
    }
}

$conn->close();
echo "<br>✔️ All done!";
?>
