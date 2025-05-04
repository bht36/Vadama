<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accommodation Search</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
  <style>
    .favorite-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      background: rgba(255,255,255,0.8);
      border-radius: 50%;
      width: 36px;
      height: 36px;
      border: none;
      transition: transform 0.2s;
    }
    .favorite-btn:hover { transform: scale(1.1); }
    .favorite-btn.active i { color: #dc3545; }
    
    .image-dots {
      position: absolute;
      bottom: 10px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 4px;
    }
    .dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: rgba(255,255,255,0.5);
    }
    .dot.active { background: white; }
    
    .guest-badge {
      position: absolute;
      top: 10px;
      left: 10px;
    }
    
    .listing-card {
      transition: transform 0.2s;
    }
    .listing-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <div class="container py-4">
    <h4 class="mb-1">mobile</h4>
    <p class="text-secondary mb-4">32103 items found for "mobile"</p>
    
    <div class="row mb-4 align-items-center">
      <!-- Search -->
      <div class="col-md-6 mb-3 mb-md-0">
        <div class="input-group">
          <span class="input-group-text bg-white border-end-0">
            <i class="bi bi-search text-secondary"></i>
          </span>
          <input type="text" class="form-control border-start-0" placeholder="Search accommodations...">
        </div>
      </div>
      
      <!-- Sort -->
      <div class="col-md-6 d-flex justify-content-md-end">
        <div class="dropdown">
          <span class="me-2 text-secondary">Sort By:</span>
          <button class="btn btn-outline-secondary rounded-pill dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown">
            Best Match
          </button>
          <ul class="dropdown-menu" aria-labelledby="sortDropdown">
            <li><a class="dropdown-item active" href="#">Best Match</a></li>
            <li><a class="dropdown-item" href="#">Price low to high</a></li>
            <li><a class="dropdown-item" href="#">Price high to low</a></li>
          </ul>
        </div>
      </div>
    </div>
    
    <div class="row g-4">
      <!-- Listing 1 -->
      <div class="col-md-6 col-lg-4">
        <div class="card listing-card h-100 border rounded-4 overflow-hidden">
          <div class="position-relative">
            <img src="https://via.placeholder.com/400x220" class="card-img-top" alt="Hotel">
            <button class="favorite-btn d-flex align-items-center justify-content-center">
              <i class="bi bi-heart"></i>
            </button>
            <div class="image-dots">
              <div class="dot active"></div>
              <div class="dot"></div>
              <div class="dot"></div>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between mb-1">
              <h5 class="card-title mb-0">Hotel in Lekhnath</h5>
              <div><i class="bi bi-star-fill text-warning"></i> 5.0 <small class="text-secondary">(3)</small></div>
            </div>
            <p class="card-text text-secondary mb-1">Indralok Hotel and Sky Garden</p>
            <p class="card-text text-secondary mb-1">1 bed</p>
            <p class="card-text text-secondary mb-1">May 3 – 8</p>
            <p class="card-text mt-2"><strong>$103</strong> <span class="text-secondary">for 5 nights</span></p>
          </div>
        </div>
      </div>
      
      <!-- Listing 2 -->
      <div class="col-md-6 col-lg-4">
        <div class="card listing-card h-100 border rounded-4 overflow-hidden">
          <div class="position-relative">
            <img src="https://via.placeholder.com/400x220" class="card-img-top" alt="Guesthouse">
            <span class="badge bg-white text-dark guest-badge">Guest favorite</span>
            <button class="favorite-btn d-flex align-items-center justify-content-center">
              <i class="bi bi-heart"></i>
            </button>
            <div class="image-dots">
              <div class="dot active"></div>
              <div class="dot"></div>
              <div class="dot"></div>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between mb-1">
              <h5 class="card-title mb-0">Guesthouse in Lekhnath</h5>
              <div><i class="bi bi-star-fill text-warning"></i> 4.87 <small class="text-secondary">(61)</small></div>
            </div>
            <p class="card-text text-secondary mb-1">Twin room with shared bathroom</p>
            <p class="card-text text-secondary mb-1">2 single beds</p>
            <p class="card-text text-secondary mb-1">May 3 – 8</p>
            <p class="card-text mt-2"><strong>$68</strong> <span class="text-secondary">for 5 nights</span></p>
          </div>
        </div>
      </div>
      
      <!-- Listing 3 -->
      <div class="col-md-6 col-lg-4">
        <div class="card listing-card h-100 border rounded-4 overflow-hidden">
          <div class="position-relative">
            <img src="https://via.placeholder.com/400x220" class="card-img-top" alt="Room">
            <button class="favorite-btn d-flex align-items-center justify-content-center">
              <i class="bi bi-heart"></i>
            </button>
            <div class="image-dots">
              <div class="dot active"></div>
              <div class="dot"></div>
              <div class="dot"></div>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between mb-1">
              <h5 class="card-title mb-0">Room in Pokhara</h5>
              <div><i class="bi bi-star-fill text-warning"></i></div>
            </div>
            <p class="card-text text-secondary mb-1">Stay with Oshan · Agriculturist</p>
            <p class="card-text text-secondary mb-1">Mountain View Home</p>
            <p class="card-text text-secondary mb-1">May 3 – 8</p>
            <p class="card-text mt-2"><strong>$68</strong> <span class="text-secondary">for 5 nights</span></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Favorite button functionality
      document.querySelectorAll('.favorite-btn').forEach(btn => {
        btn.addEventListener('click', function() {
          this.classList.toggle('active');
          const icon = this.querySelector('i');
          icon.classList.toggle('bi-heart');
          icon.classList.toggle('bi-heart-fill');
        });
      });
      
      // Dropdown functionality is handled by Bootstrap
    });
  </script>
</body>
</html>