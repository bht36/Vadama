<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accommodation Search</title>
  <style>
    /* Reset and base styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
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
      padding: 1rem;
    }
    
    h4 {
      font-size: 1.25rem;
      font-weight: 500;
      margin-bottom: 0.25rem;
    }
    
    .text-muted {
      color: #6b7280;
    }
    
    /* Search and sort section */
    .search-sort {
      display: flex;
      flex-direction: column;
      gap: 0.75rem;
      margin-bottom: 1rem;
    }
    
    @media (min-width: 768px) {
      .search-sort {
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
      }
    }
    
    .search-container {
      position: relative;
      width: 100%;
    }
    
    @media (min-width: 768px) {
      .search-container {
        width: 50%;
      }
    }
    
    .search-icon {
      position: absolute;
      left: 0.75rem;
      top: 50%;
      transform: translateY(-50%);
      color: #6b7280;
    }
    
    .search-input {
      width: 100%;
      padding: 0.5rem 0.75rem 0.5rem 2.5rem;
      border: 1px solid #e5e7eb;
      border-radius: 0.375rem;
      font-size: 0.875rem;
    }
    
    .sort-container {
      display: flex;
      align-items: center;
      justify-content: flex-end;
    }
    
    .sort-label {
      margin-right: 0.5rem;
      color: #6b7280;
    }
    
    .sort-dropdown {
      position: relative;
      display: inline-block;
    }
    
    .sort-button {
      display: flex;
      align-items: center;
      padding: 0.5rem 1rem;
      background-color: white;
      border: 1px solid #e5e7eb;
      border-radius: 9999px;
      font-size: 0.875rem;
      cursor: pointer;
    }
    
    .dropdown-content {
      display: none;
      position: absolute;
      right: 0;
      min-width: 160px;
      background-color: white;
      border: 1px solid #e5e7eb;
      border-radius: 0.375rem;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      z-index: 1;
    }
    
    .dropdown-content.show {
      display: block;
    }
    
    .dropdown-item {
      padding: 0.5rem 1rem;
      cursor: pointer;
    }
    
    .dropdown-item:hover {
      background-color: #f3f4f6;
    }
    
    /* Listings grid */
    .listings-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1rem;
    }
    
    @media (min-width: 768px) {
      .listings-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }
    
    @media (min-width: 1024px) {
      .listings-grid {
        grid-template-columns: repeat(3, 1fr);
      }
    }
    
    /* Listing card */
    .listing-card {
      border: 1px solid #e5e7eb;
      border-radius: 1rem;
      overflow: hidden;
      transition: transform 0.2s, box-shadow 0.2s;
    }
    
    .listing-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
    
    .image-container {
      position: relative;
      height: 220px;
    }
    
    .listing-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    
    .favorite-btn {
      position: absolute;
      top: 0.625rem;
      right: 0.625rem;
      z-index: 10;
      background: transparent;
      border: none;
      cursor: pointer;
      transition: transform 0.2s;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .favorite-btn:hover {
      transform: scale(1.1);
    }
    
    .favorite-btn svg {
      width: 24px;
      height: 24px;
      fill: none;
      stroke: #9ca3af;
      stroke-width: 2;
    }
    
    .favorite-btn.active svg {
      fill: white;
      stroke: white;
    }
    
    .guest-badge {
      position: absolute;
      top: 0.625rem;
      left: 0.625rem;
      z-index: 10;
      background-color: white;
      color: black;
      padding: 0.25rem 0.5rem;
      border-radius: 9999px;
      font-size: 0.75rem;
      font-weight: 500;
    }
    
    .image-dots {
      position: absolute;
      bottom: 0.625rem;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 0.25rem;
    }
    
    .dot {
      width: 0.5rem;
      height: 0.5rem;
      border-radius: 50%;
      background-color: rgba(255, 255, 255, 0.5);
    }
    
    .dot.active {
      background-color: rgba(255, 255, 255, 0.9);
    }
    
    .card-content {
      padding: 1rem;
    }
    
    .card-header {
      display: flex;
      justify-content: space-between;
      margin-bottom: 0.25rem;
    }
    
    .card-title {
      font-size: 1.125rem;
      font-weight: 500;
    }
    
    .rating {
      display: flex;
      align-items: center;
    }
    
    .star-icon {
      color: #facc15;
      fill: #facc15;
      width: 1rem;
      height: 1rem;
      margin-right: 0.25rem;
    }
    
    .review-count {
      font-size: 0.75rem;
      color: #6b7280;
      margin-left: 0.25rem;
    }
    
    .card-text {
      color: #6b7280;
      margin-bottom: 0.25rem;
    }
    
    .price {
      margin-top: 0.5rem;
    }
    
    .price-amount {
      font-weight: 700;
    }
    
    .price-period {
      color: #6b7280;
    }
  </style>
</head>
<body>
  <div class="container">
    <h4>mobile</h4>
    <p class="text-muted" style="margin-bottom: 1rem;">32103 items found for "mobile"</p>
    
    <div class="search-sort">
      <!-- Search -->
      <div class="search-container">
        <svg class="search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="8"></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
        <input type="text" class="search-input" placeholder="Search accommodations..." value="mobile">
      </div>
      
      <!-- Sort -->
      <div class="sort-container">
        <span class="sort-label">Sort By:</span>
        <div class="sort-dropdown">
          <button class="sort-button" id="sortButton">
            <span id="sortValue">Best Match</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 0.5rem;">
              <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
          </button>
          <div class="dropdown-content" id="sortDropdown">
            <div class="dropdown-item" data-value="Best Match">Best Match</div>
            <div class="dropdown-item" data-value="Price low to high">Price low to high</div>
            <div class="dropdown-item" data-value="Price high to low">Price high to low</div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="listings-grid">
      <!-- Listing 1 -->
      <div class="listing-card">
        <div class="image-container">
          <img src="https://via.placeholder.com/400x220" class="listing-image" alt="Hotel in Lekhnath">
          <button class="favorite-btn" aria-label="Bookmark this listing">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
            </svg>
          </button>
          <div class="image-dots">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
          </div>
        </div>
        <div class="card-content">
          <div class="card-header">
            <h5 class="card-title">Hotel in Lekhnath</h5>
            <div class="rating">
              <svg class="star-icon" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor">
                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
              </svg>
              <span>5.0</span>
              <span class="review-count">(3)</span>
            </div>
          </div>
          <p class="card-text">Indralok Hotel and Sky Garden</p>
          <p class="card-text">1 bed</p>
          <p class="card-text">May 3 – 8</p>
          <p class="price">
            <span class="price-amount">$103</span>
            <span class="price-period">for 5 nights</span>
          </p>
        </div>
      </div>
      
      <!-- Listing 2 -->
      <div class="listing-card">
        <div class="image-container">
          <img src="https://via.placeholder.com/400x220" class="listing-image" alt="Guesthouse in Lekhnath">
          <span class="guest-badge">Guest favorite</span>
          <button class="favorite-btn" aria-label="Bookmark this listing">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
            </svg>
          </button>
          <div class="image-dots">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
          </div>
        </div>
        <div class="card-content">
          <div class="card-header">
            <h5 class="card-title">Guesthouse in Lekhnath</h5>
            <div class="rating">
              <svg class="star-icon" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor">
                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
              </svg>
              <span>4.87</span>
              <span class="review-count">(61)</span>
            </div>
          </div>
          <p class="card-text">Twin room with shared bathroom</p>
          <p class="card-text">2 single beds</p>
          <p class="card-text">May 3 – 8</p>
          <p class="price">
            <span class="price-amount">$68</span>
            <span class="price-period">for 5 nights</span>
          </p>
        </div>
      </div>
      
      <!-- Listing 3 -->
      <div class="listing-card">
        <div class="image-container">
          <img src="https://via.placeholder.com/400x220" class="listing-image" alt="Room in Pokhara">
          <button class="favorite-btn" aria-label="Bookmark this listing">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
            </svg>
          </button>
          <div class="image-dots">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
          </div>
        </div>
        <div class="card-content">
          <div class="card-header">
            <h5 class="card-title">Room in Pokhara</h5>
            <div class="rating" style="visibility: hidden;">
              <svg class="star-icon" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor">
                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
              </svg>
              <span>0</span>
              <span class="review-count">(0)</span>
            </div>
          </div>
          <p class="card-text">Stay with Oshan · Agriculturist</p>
          <p class="card-text">Mountain View Home</p>
          <p class="card-text">May 3 – 8</p>
          <p class="price">
            <span class="price-amount">$68</span>
            <span class="price-period">for 5 nights</span>
          </p>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Sort dropdown functionality
    const sortButton = document.getElementById('sortButton');
    const sortDropdown = document.getElementById('sortDropdown');
    const sortValue = document.getElementById('sortValue');
    const dropdownItems = document.querySelectorAll('.dropdown-item');
    
    sortButton.addEventListener('click', function() {
      sortDropdown.classList.toggle('show');
    });
    
    // Close the dropdown when clicking outside
    window.addEventListener('click', function(event) {
      if (!event.target.matches('.sort-button') && !event.target.parentNode.matches('.sort-button')) {
        if (sortDropdown.classList.contains('show')) {
          sortDropdown.classList.remove('show');
        }
      }
    });
    
    // Update sort value when selecting an option
    dropdownItems.forEach(item => {
      item.addEventListener('click', function() {
        const value = this.getAttribute('data-value');
        sortValue.textContent = value;
        sortDropdown.classList.remove('show');
      });
    });
    
    // Favorite button functionality
    const favoriteButtons = document.querySelectorAll('.favorite-btn');
    
    favoriteButtons.forEach(button => {
      button.addEventListener('click', function() {
        this.classList.toggle('active');
        const svg = this.querySelector('svg');
        
        if (this.classList.contains('active')) {
          svg.setAttribute('fill', 'white');
          svg.setAttribute('stroke', 'white');
        } else {
          svg.setAttribute('fill', 'none');
          svg.setAttribute('stroke', '#9ca3af');
        }
      });
    });
  </script>
</body>
</html>