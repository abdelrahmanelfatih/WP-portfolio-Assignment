<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Group Portfolio - Ramadan, Zacaria, Elfatih</title>
  <link rel="stylesheet" href="styles.css" />
  

</head>
<body>
  <div class="grid-container">
    <!-- Header -->
    <header class="header">
      <img src="images/group-logo.png" alt="Group Logo" class="logo">
      <h1>Welcome to Our Personal Website</h1>
      <p class="subheading">Mohamed Ramadan, Hamza Zacaria, Abdulrahman Elfatih</p>
      
    </header>

    <!-- Left Menu for Navigation -->
    <nav class="left-menu">
      <h4>Navigation</h4>
      <ul>
        <li><a href="#about">About Us</a></li>
        <li><a href="#team-members">Meet the Team</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>

    <!-- Right Menu for Extra information -->
    <nav class="right-menu">
      <h4>Secondary Content</h4>
      <ul>
        <li><a href="https://github.com/abdelrahmanelfatih/WP-portfolio-Assignment">GitHub Repository</a></li>
      </ul>
    </nav>

    <!-- Main Content -->
    <main class="content">
        <section id="about">
          <h2>About Us</h2>
          <p>We are a team of three students passionate about web development and design. This site is our collaborative effort to showcase our skills and creativity using HTML/CSS</p>
        </section>
        <section id="team-members" style="margin-top: 40px;">
          <h2>Meet The Team</h2>

          <section id="newsletter-signup">
            <button onclick="showNewsletterForm()">📬 Subscribe to Our Newsletter</button>
            <div id="newsletterForm" style="display: none; margin-top: 20px;">
              <form action="subscribe.php" method="POST">
                <input type="name" name="name" placeholder="Enter your name" required>
                <input type="email" name="email" placeholder="Enter your email" required>
                <button type="submit">Subscribe</button>
              </form>
            </div>

            <?php if (isset($_GET['subscribed'])): ?>
              <p style="color: green;">✅ Thank you for subscribing!</p>
            <?php elseif (isset($_GET['error'])): ?>
              <p style="color: red;">❌ Error: <?= htmlspecialchars($_GET['error']) ?></p>
            <?php endif; ?>
          </section>
        </section>
        
        <!-- Member Sections with alternating layout -->
        <section class="member-section" id="mohamed">
            <div class="member-content left">
            <img src="images/Mohamed1.png" alt="Mohamed Ramadan" class="member-photo">
            <div class="text"> 
                <h2>Mohamed Ramadan</h2>
                <p>Hey! I'm the goat, I am a great developer when it comes to making unconventional things.</p>
            </div>
            <div class="member-links-container-mohamed">
              <div class="member-links">
                <a href="https://github.com/Mohamed-M-M-Ramadan" target="_blank">
                  <img src="images/github-sign.png" alt="GitHub" class="social-icon">
                  <span>GitHub</span>
                </a>
              </div>
              <div class="member-links">
                <a href="https://www.linkedin.com/in/mohamed-ramadan-0a747a346/" target="_blank">
                  <img src="images/LinkedIn-logo.png" alt="LinkedIn" class="social-icon">
                  <span>LinkedIn</span>
                </a>
              </div>
            </div>
        </section>
        
        <section class="member-section" id="hamza">
            <div class="member-content right">
            <img src="images/Hamza1.jpg" alt="Hamza Zacaria" class="member-photo">
            <div class="text">
                <h2>Hamza Zacaria</h2>
                <p>Hello! I'm Hamza, I am very passionate about video games and Lore. I enjoy reading comics and random facts.</p>
                
                <div class="member-links">
                  <a href="https://github.com/bamuzo" target="_blank">
                    <img src="images/github-sign.png" alt="GitHub" class="social-icon">
                    <span>My GitHub</span>
                  </a>
                </div>
                
            </div>
            </div>
            
          
        </section>
        
        <section class="member-section" id="abdulrahman">
            <div class="member-content left">
            <img src="images/Abdul1.jpg" alt="Abdulrahman Elfatih" class="member-photo">
            <div class="text">
                <h2>Abdulrahman Elfatih</h2>
                <p>Hi! my name is Abdelrahman but you can call me Abdul for short :), I am a software engnieer and I'm intrested in becoming a full stack dev!</p>
                <div class="member-links-container-mohamed">
                  <div class="member-links">
                    <a href="https://github.com/abdelrahmanelfatih" target="_blank">
                      <img src="images/github-sign.png" alt="GitHub" class="social-icon">
                      <span>GitHub</span>
                    </a>
                  </div>
                  <div class="member-links">
                    <a href="https://www.linkedin.com/in/abdelrahman-alfadni/" target="_blank">
                      <img src="images/LinkedIn-logo.png" alt="LinkedIn" class="social-icon">
                      <span>LinkedIn</span>
                    </a>
                  </div>
                </div>
            </div>
        </section>
        
      
        <section id="gallery">
          <h2>Gallery: Notable Projects</h2>
          <!--Image rows to show mobile application-->
          <div class="image-row">
            <img src="images/abdulp1.jpg" alt="project-image" />
            <img src="images/abdulp2.jpg" alt="project-image" />
            <img src="images/abdulp3.jpg" alt="project-image" />
          </div>
          <p style ="text-align: center; margin-bottom: 50px;">Abdulrahman's Project: A Telegram Bot</p>
          <!--Brick layout to show application-->
          <div class="brick-container">
            <div class="brick"><img src="images/mohamedp1.jpg" alt="project-image"></div>
            <div class="brick"><img src="images/mohamedp2.jpg" alt="project-image"></div>
            <div class="brick"><img src="images/mohamedp3.jpg" alt="project-image"></div>
          </div>
          <p style ="text-align: center; margin-bottom: 50px;">Mohamed's Project: A video game</p>
          <div class ="HamzaContainer">
            <img src="images/Hamza project.jpg" alt="project-image" class="hamza-project" />
            <p style ="text-align: center; margin-bottom: 50px;">Hamza's Project: A Prototype AR Headset</p>
          </div>
          
        </section>
      
        <section id="contact">
          <h2>Contact Us</h2>
          <p>You can reach out via email:</p>
          <ul>
            <li>Mohamed: me@me.com</li>
            <li>Hamza: hamzautm2005@gmail.com</li>
            <li>Abdulrahman: elfatihabdelrahman@graduate.utm.my</li>
          </ul>
        </section>
      </main>
      

    <!-- Footer -->
    <footer class="footer">
      <p>&copy; 2025 Mohamed Ramadan, Hamza Zacaria & Abdulrahman Elfatih. All rights reserved.</p>
    </footer>
  </div>
  <script>
  function showNewsletterForm() {
    document.getElementById("newsletterForm").style.display = "block";
  }
</script>

</body>
</html>
