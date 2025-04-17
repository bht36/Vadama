<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Footer</title>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        
        /* Footer styles */
        .footer {
            background-color: #1a1a1a;
            color: white;
            padding: 40px 20px;
        }
        
        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        /* Top section with social and logos */
        .footer-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .social-icons {
            display: flex;
            gap: 10px;
        }
        
        .social-icon {
            background-color: white;
            color: #1a1a1a;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }
        
        .partner-logos {
            display: flex;
            gap: 15px;
        }
        
        .partner-logo {
            background-color: white;
            border-radius: 20px;
            padding: 8px 15px;
            height: 36px;
        }
        
        /* Navigation sections */
        .footer-nav {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .footer-nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-size: 14px;
        }
        
        .footer-nav a:hover {
            text-decoration: underline;
        }
        
        .footer-nav a.highlight {
            color: #f7b500;
        }
        
        /* App download section */
        .app-section {
            margin: 40px 0;
        }
        
        .app-section h2 {
            font-size: 24px;
            margin-bottom: 15px;
        }
        
        .app-buttons {
            display: flex;
            gap: 15px;
        }
        
        .app-button {
            height: 40px;
        }
        
        /* Legal section */
        .legal-text {
            font-size: 12px;
            color: #cccccc;
            margin-bottom: 10px;
            max-width: 900px;
        }
        
        .copyright {
            font-size: 12px;
            color: #cccccc;
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }
        
        .copyright a {
            color: white;
            text-decoration: none;
        }
        
        .copyright a:hover {
            text-decoration: underline;
        }
        
        .copyright-symbol {
            display: inline-block;
            margin-right: 5px;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .footer-top {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }
            
            .partner-logos {
                align-self: flex-end;
            }
            
            .footer-nav {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <footer class="footer mt-4">
        <div class="footer-container">
            <!-- Social icons and partner logos -->
            <div class="footer-top">

                
                <div class="partner-logos">
                    <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/placeholder-ob7miW3mUreePYfXdVwkpFWHthzoR5.svg?height=30&width=120" alt="houselogic" class="partner-logo">
                    <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/placeholder-ob7miW3mUreePYfXdVwkpFWHthzoR5.svg?height=30&width=120" alt="realtor.realestate" class="partner-logo">
                </div>
            </div>
            
            <!-- First navigation row -->
            <nav class="footer-nav">
                <a href="#">About us</a>
                <a href="#">Careers</a>
                <a href="#">Accessibility</a>
                <a href="#">Feedback</a>
                <a href="#">Media room</a>
                <a href="#">Ad Choices</a>
                <a href="#">Advertise with us</a>
                <a href="#">Agent support</a>
                <a href="#">Privacy</a>
                <a href="#">Terms</a>
            </nav>
            
            <!-- Second navigation row -->
            <nav class="footer-nav">
                <a href="#">Home Made</a>
                <a href="#">Tech Blog</a>
                <a href="#">Agent Blog</a>
                <a href="#">Sitemap</a>
                <a href="#" class="highlight">Do Not Sell or Share My Personal Information</a>
            </nav>
            
            <!-- App download section -->
            <div class="app-section">
                <h2>Get the app</h2>
                <div class="app-buttons">
                    <a href="#" aria-label="Download on the App Store">
                        <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/placeholder-ob7miW3mUreePYfXdVwkpFWHthzoR5.svg?height=40&width=135" alt="Download on the App Store" class="app-button">
                    </a>
                    <a href="#" aria-label="Get it on Google Play">
                        <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/placeholder-ob7miW3mUreePYfXdVwkpFWHthzoR5.svg?height=40&width=135" alt="Get it on Google Play" class="app-button">
                    </a>
                </div>
            </div>
            
            <!-- Legal text -->
            <p class="legal-text">
                Any mortgage lead generation activity in the state of Connecticut is performed by MSIM, LLC (NMLS #1212192), a subsidiary of Move, Inc.
            </p>
            
            <!-- Copyright -->
            <div class="copyright">
                <span class="copyright-symbol">© 1995-2025</span>
                <a href="#">National Association of REALTORS</a>
                <span>®</span>
                <span>and</span>
                <a href="#">Move, Inc.</a>
                <span>All rights reserved.</span>
            </div>
        </div>
    </footer>
</body>
</html>