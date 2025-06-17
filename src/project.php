<?php
$host = "localhost";
$dbname = "portfolio_db"; // ← Change to your DB name
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get all projects
$sql = "SELECT * FROM projects";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Project Showcase</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <div class="grid-container">
    <header class="header">
      <h1>Our Projects</h1>
      <a href="index.php" style="color: white; text-decoration: underline;">← Back to Home</a>
    </header>

    <main class="content">
      <?php
      if ($result && $result->num_rows > 0):
        while ($project = $result->fetch_assoc()):
      ?>
        <section class="project-card" style="margin-bottom: 50px; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
          <h2 style="margin-bottom: 10px;"><?= htmlspecialchars($project['title']) ?></h2>
          <p style="margin-bottom: 15px;"><?= nl2br(htmlspecialchars($project['description'])) ?></p>

          <?php
          // Fetch project images
          $project_id = $project['id'];
          $img_sql = "SELECT image_filename FROM project_images WHERE project_id = ?";
          $stmt = $conn->prepare($img_sql);
          $stmt->bind_param("i", $project_id);
          $stmt->execute();
          $img_result = $stmt->get_result();

          if ($img_result && $img_result->num_rows > 0): ?>
            <div class="image-row" style="display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 10px;">
              <?php while ($img = $img_result->fetch_assoc()): ?>
                <img src="images/<?= htmlspecialchars($img['image_filename']) ?>" alt="Project Image" style="max-width: 200px; border-radius: 5px;" />
              <?php endwhile; ?>
            </div>
          <?php endif; ?>

          <?php if (!empty($project['project_url'])): ?>
            <p><a href="<?= htmlspecialchars($project['project_url']) ?>" target="_blank" style="color: blue; text-decoration: underline;">🔗 View Project</a></p>
          <?php endif; ?>
        </section>
      <?php
        endwhile;
      else:
      ?>
        <p>No projects found.</p>
      <?php endif; ?>
    </main>

    <footer class="footer">
      <p>&copy; 2025 Mohamed Ramadan, Hamza Zacaria & Abdulrahman Elfatih. All rights reserved.</p>
    </footer>
  </div>
</body>
</html>

<?php $conn->close(); ?>
