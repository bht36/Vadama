<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Listings in New York, NY</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        
        body {
            background-color: #fff;
            color: #333;
            line-height: 1.5;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Header Styles */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        
        .header-left h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .header-left p {
            font-size: 18px;
            color: #666;
        }
        
        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        /* Search Bar Styles */
        .search-container {
            position: relative;
            width: 400px;
        }
        
        .search-input {
            width: 100%;
            padding: 12px 80px 12px 16px;
            border: 1px solid #ccc;
            border-radius: 50px;
            font-size: 16px;
            color: #333;
            outline: none;
        }
        
        .clear-button {
            position: absolute;
            right: 60px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 24px;
            color: #777;
        }
        
        .search-button {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background-color: #222;
            border: none;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .search-icon {
            width: 20px;
            height: 20px;
            fill: white;
        }
        
        /* Sort Dropdown */
        .sort-dropdown {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .sort-dropdown span {
            font-size: 16px;
        }
        
        .sort-dropdown select {
            font-size: 16px;
            font-weight: bold;
            border: none;
            background: transparent;
            cursor: pointer;
            padding-right: 15px;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right center;
            background-size: 16px;
        }
        
        /* Divider */
        .divider {
            height: 1px;
            background-color: #eee;
            margin: 10px 0 20px;
        }
        
        /* Listings Grid */
        .listings-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(550px, 1fr));
            gap: 20px;
        }
        
        /* Listing Card */
        .listing-card {
            border: 1px solid #eee;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
        
        .listing-image {
            position: relative;
            height: 300px;
            background-size: cover;
            background-position: center;
        }
        
        .listing-tag {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: rgba(190, 233, 123, 0.9);
            color: #333;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
        }
        
        .listing-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: rgba(255, 255, 255, 0.9);
            color: #333;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 600;
        }
        
        .listing-badge.construction {
            bottom: 15px;
            top: auto;
            width: auto;
            border-radius: 20px;
            padding: 5px 15px;
        }
        
        .listing-content {
            padding: 20px;
        }
        
        .listing-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .listing-price {
            font-size: 24px;
            font-weight: bold;
        }
        
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        
        .action-btn {
            background: none;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 16px;
            color: #333;
        }
        
        .listing-address {
            font-size: 16px;
            color: #666;
            margin-bottom: 10px;
        }
        
        .listing-details {
            margin-bottom: 10px;
        }
        
        .listing-details span {
            color: #666;
            margin-right: 5px;
        }
        
        .listing-details span:not(:last-child)::after {
            content: "•";
            margin: 0 5px;
        }
        
        .listing-name {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .listing-availability {
            color: #666;
            margin-bottom: 20px;
        }
        
        .contact-buttons {
            display: flex;
            gap: 10px;
        }
        
        .contact-btn {
            flex: 1;
            padding: 12px;
            border-radius: 30px;
            border: none;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }
        
        .contact-btn.phone {
            background-color: #f0f2f5;
            color: #333;
        }
        
        .contact-btn.email {
            background-color: #4a6bff;
            color: white;
        }
        
        .contact-btn.tour {
            background-color: #4a6bff;
            color: white;
        }
        
        .sponsored-tag {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: rgba(255, 255, 255, 0.9);
            color: #666;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
        }
        
        .price-drop {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: rgba(190, 233, 123, 0.9);
            color: #333;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .info-icon {
            width: 16px;
            height: 16px;
            fill: #333;
        }
        
        @media (max-width: 1100px) {
            .listings-grid {
                grid-template-columns: 1fr;
            }
            
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }
            
            .header-right {
                width: 100%;
                flex-direction: column;
                align-items: flex-start;
            }
            
            .search-container {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-left">
                <h1>All Rental Listings in New York, NY</h1>
                <p>19,850 Rentals Available</p>
            </div>
            <div class="header-right">
                <div class="search-container">
                    <input type="text" class="search-input" placeholder="Search..." value="New York">
                    <button class="clear-button">×</button>
                    <button class="search-button">
                        <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                        </svg>
                    </button>
                </div>
                <div class="sort-dropdown">
                    <span>Sort by:</span>
                    <select>
                        <option>Best Match</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Newest</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="divider"></div>
        
        <div class="listings-grid">
            <!-- Listing 1 -->
            <div class="listing-card">
                <div class="listing-image" style="background-image: url('https://hebbkx1anhila5yf.public.blob.vercel-storage.com/home-LUz7Ge6mwtKDed1Wz6D03Ha8up55W3.png');">
                    <div class="listing-tag">3 Months Free</div>
                    <div class="listing-badge construction">New Construction</div>
                </div>
                <div class="listing-content">
                    <div class="listing-actions">
                        <div class="listing-price">$2,690+</div>
                        <div class="action-buttons">
                            <button class="action-btn">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 17L17 7M7 7L17 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                            <button class="action-btn">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Save
                            </button>
                        </div>
                    </div>
                    <div class="listing-address">2 Kinderkamack Road, Hackensack, NJ 07601</div>
                    <div class="listing-details">
                        <span>1bd $2,690+</span>
                        <span>2bd $3,440+</span>
                    </div>
                    <div class="listing-name">The Jefferson</div>
                    <div class="listing-availability">Available Now</div>
                    <div class="contact-buttons">
                        <button class="contact-btn phone">(551) 449-9458</button>
                        <button class="contact-btn email">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <polyline points="22,6 12,13 2,6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Email
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Listing 2 -->
            <div class="listing-card">
                <div class="listing-image" style="background-image: url('https://hebbkx1anhila5yf.public.blob.vercel-storage.com/home-LUz7Ge6mwtKDed1Wz6D03Ha8up55W3.png');">
                    <div class="listing-tag">1 Month Free</div>
                    <div class="listing-badge">3D</div>
                </div>
                <div class="listing-content">
                    <div class="listing-actions">
                        <div class="listing-price">$3,416+</div>
                        <div class="action-buttons">
                            <button class="action-btn">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 17L17 7M7 7L17 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                            <button class="action-btn">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Save
                            </button>
                        </div>
                    </div>
                    <div class="listing-address">111 Lawrence St, Brooklyn, NY 11201</div>
                    <div class="listing-details">
                        <span>Studio $3,416+</span>
                        <span>1bd $3,998+</span>
                        <span>2+bd $6,563+</span>
                    </div>
                    <div class="listing-name">The Brooklyner</div>
                    <div class="listing-availability">Available Now</div>
                    <div class="contact-buttons">
                        <button class="contact-btn phone">Email</button>
                        <button class="contact-btn tour">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <line x1="16" y1="2" x2="16" y2="6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <line x1="8" y1="2" x2="8" y2="6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <line x1="3" y1="10" x2="21" y2="10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Schedule Tour
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Listing 3 (Sponsored) -->
            <div class="listing-card">
                <div class="listing-image" style="background-image: url('https://hebbkx1anhila5yf.public.blob.vercel-storage.com/home-LUz7Ge6mwtKDed1Wz6D03Ha8up55W3.png');">
                    <div class="sponsored-tag">Sponsored</div>
                </div>
                <div class="listing-content">
                    <!-- Content would go here -->
                </div>
            </div>
            
            <!-- Listing 4 (Price Drop) -->
            <div class="listing-card">
                <div class="listing-image" style="background-image: url('https://hebbkx1anhila5yf.public.blob.vercel-storage.com/home-LUz7Ge6mwtKDed1Wz6D03Ha8up55W3.png');">
                    <div class="price-drop">
                        $245 Price Drop
                        <svg class="info-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" fill="none" stroke="currentColor" stroke-width="2"/>
                            <line x1="12" y1="16" x2="12" y2="12" stroke="currentColor" stroke-width="2"/>
                            <line x1="12" y1="8" x2="12" y2="8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div class="listing-badge">3D</div>
                </div>
                <div class="listing-content">
                    <!-- Content would go here -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add functionality to clear button
        document.querySelector('.clear-button').addEventListener('click', function() {
            document.querySelector('.search-input').value = '';
            document.querySelector('.search-input').focus();
        });
        
        // Add functionality to search button
        document.querySelector('.search-button').addEventListener('click', function() {
            alert('Searching for: ' + document.querySelector('.search-input').value);
        });
        
        // Add functionality to save buttons
        document.querySelectorAll('.action-btn').forEach(button => {
            if (button.textContent.includes('Save')) {
                button.addEventListener('click', function() {
                    alert('Property saved to favorites!');
                });
            }
        });
        
        // Add functionality to contact buttons
        document.querySelectorAll('.contact-btn').forEach(button => {
            button.addEventListener('click', function() {
                if (button.textContent.includes('Email')) {
                    alert('Email contact form would open');
                } else if (button.textContent.includes('Schedule')) {
                    alert('Tour scheduling calendar would open');
                }
            });
        });
    </script>
</body>
</html>