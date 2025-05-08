<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vadama ® Footer</title>
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary-color: #79090F; 
      --primary-dark: #5a070b; 
      --primary-light: #f8e5e6; 
      --primary-bg: #fdf2f3; 
      --text-color: #333;
      --text-light: #666;
      --text-muted: #888;
      --bg-color: #f9fafb;
      --footer-bg: #fff;
      --border-color: #e5e7eb;
      --card-bg: #f9fafb;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background-color: var(--bg-color);
      color: var(--text-color);
      line-height: 1.5;
    }
    .footer {
      background-color: var(--footer-bg);
      border-top: 1px solid var(--border-color);
      padding: 2rem 0 1rem;
      box-shadow: 0 -5px 30px rgba(0, 0, 0, 0.03);
      margin-top:50px
    }

    .container {
      width: 90%;
      max-width: 1200px;
      margin: 0 auto;
    }

    .footer-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1.5rem;
    }

    .footer-section {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }
    .logo-container {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      margin-bottom: 0.5rem;
    }

    .logo-image {
      width: 40px;
      height: 40px;
      border-radius: 6px;
      overflow: hidden;
      background-color: var(--primary-color);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .logo-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .logo-text {
      font-weight: 700;
      font-size: 1.2rem;
      color: var(--text-color);
    }

    .highlight {
      color: var(--primary-color);
    }

    .description {
      color: var(--text-light);
      line-height: 1.4;
      font-size: 0.9rem;
    }
    .section-title {
      font-size: 1rem;
      font-weight: 600;
      color: var(--text-color);
      position: relative;
      margin-bottom: 0.75rem;
      display: inline-block;
    }

    .section-title::after {
      content: '';
      position: absolute;
      width: 40%;
      height: 2px;
      background-color: var(--primary-color);
      bottom: -3px;
      left: 0;
    }

    .nav-links {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 0.4rem;
    }

    .nav-links a {
      color: var(--text-light);
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 0.4rem;
      font-size: 0.85rem;
      transition: color 0.2s ease;
    }
    .nav-links a:hover {
      color: var(--primary-color); 
    }
    .nav-dot {
      width: 4px;
      height: 4px;
      background-color: #ccc;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.2s ease;
    }

    .nav-links a:hover .nav-dot {
      background-color: var(--primary-color); 
    }
    .contact-cards {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }

    .contact-card {
      background-color: var(--card-bg);
      padding: 0.5rem;
      border-radius: 6px;
      display: flex;
      gap: 0.5rem;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .contact-card:hover {
      transform: translateY(-2px);*
      box-shadow: 0 3px 10px rgba(121, 9, 15, 0.1); 
    }

    .contact-icon {
      color: var(--primary-color);
      font-size: 1rem;
      margin-top: 0.1rem;
    }

    .contact-info h4 {
      font-weight: 600;
      color: var(--text-color);
      margin-bottom: 0.1rem;
      font-size: 0.85rem;
    }

    .contact-info p {
      color: var(--text-light);
      font-size: 0.8rem;
    }
    .footer-bottom {
      margin-top: 1.5rem;
      padding-top: 0.75rem;
      border-top: 1px solid var(--border-color);
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 0.5rem;
    }

    .copyright {
      color: var(--text-muted);
      font-size: 0.75rem;
    }

    .made-with {
      display: flex;
      align-items: center;
      gap: 0.3rem;
      color: var(--text-muted);
      font-size: 0.7rem;
    }

    .heart {
      color: var(--primary-color); 
      font-size: 0.8rem;
    }

    @media (max-width: 768px) {
      .footer-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
      }
      
      .footer-section {
        align-items: center;
        text-align: center;
      }
      
      .section-title::after {
        left: 30%;
        width: 40%;
      }
      
      .nav-links {
        align-items: center;
      }
      
      .footer-bottom {
        flex-direction: column;
        text-align: center;
        margin-top: 1rem;
      }
    }
  </style>
</head>
<body>
<footer class="footer">
    <div class="container">
      <div class="footer-grid">
       
      <!-- Logo Section -->
        <div class="footer-section">
          <div class="logo-container">
            <div class="logo-image">
              <!-- Replace with your logo image -->
              <img src="https://via.placeholder.com/40x40" alt="Vadama Logo">
              <!-- For a real implementation, you would use:
              <img src="your-logo.png" alt="Vadama Logo"> -->
            </div>
            <span class="logo-text"><span class="highlight">Vadama®</span></span>
          </div>
          <p class="description">
            Your trusted partner in finding the perfect rental property in Nepal.
          </p>
        </div>

        <!-- Navigation Section -->
        <div class="footer-section">
          <h3 class="section-title">Quick Links</h3>
          <nav>
            <ul class="nav-links">
              <li><a href="#"><span class="nav-dot"></span>Home</a></li>
              <li><a href="#"><span class="nav-dot"></span>About Us</a></li>
              <li><a href="#"><span class="nav-dot"></span>Properties</a></li>
              <li><a href="#"><span class="nav-dot"></span>Become a Seller</a></li>
            </ul>
          </nav>
        </div>

        <!-- Contact Section -->
        <div class="footer-section">
          <h3 class="section-title">Contact Us</h3>
          <div class="contact-cards">
            <div class="contact-card">
              <div class="contact-icon">
                <i class="fas fa-map-marker-alt"></i>
              </div>
              <div class="contact-info">
                <h4>Our Location</h4>
                <p>Kathmandu, Nepal</p>
              </div>
            </div>
            <div class="contact-card">
              <div class="contact-icon">
                <i class="fas fa-phone"></i>
              </div>
              <div class="contact-info">
                <h4>Phone Number</h4>
                <p>+977 1234567890</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer Bottom -->
      <div class="footer-bottom">
        <p class="copyright">
          © 2025 Vadama® and Move, Inc. All rights reserved.
        </p>
        <div class="made-with">
          <span>copyrigth@</span>
          <span>2025</span>
          <span>vadama</span>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>