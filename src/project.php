<?php
// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'portfolio_db';

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all projects
$projects_sql = "SELECT * FROM projects";
$projects_result = $conn->query($projects_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Project Showcase</title>
  <link rel="stylesheet" href="styles.css" />
  <style>
    .project-card {
      border: 1px solid #ccc;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 30px;
      background-color: #f9f9f9;
    }
    .project-images img {
      max-width: 200px;
      margin: 10px;
      border-radius: 8px;
    }
    .project-title {
      font-size: 24px;
      font-weight: bold;
    }
    .project-description {
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <h1 style="text-align:center;">🛠️ Our Project Showcase</h1>
  <div class="projects-container" style="width: 90%; margin: 0 auto;">

  <?php
  if ($projects_result->num_rows > 0) {
      while ($project = $projects_result->fetch_assoc()) {
          echo "<div class='project-card'>";
          echo "<div class='project-title'>" . htmlspecialchars($project['title']) . "</div>";
          echo "<div class='project-description'>" . htmlspecialchars($project['description']) . "</div>";

          // Fetch images for this project
          $project_id = $project['id'];
          $images_sql = "SELECT image_filename FROM project_images WHERE project_id = $project_id";
          $images_result = $conn->query($images_sql);

          if ($images_result->num_rows > 0) {
              echo "<div class='project-images'>";
              while ($img = $images_result->fetch_assoc()) {
                  $img_path = "images/" . htmlspecialchars($img['image_filename']);
                  echo "<img src='$img_path' alt='Project Image'>";
              }
              echo "</div>";
          } else {
              echo "<p>No images found.</p>";
          }

          echo "</div>";
      }
  } else {
      echo "<p>No projects available.</p>";
  }

  $conn->close();
  ?>
  </div>
</body>
</html>
