@extends('vadama.layouts.header')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Website</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
      .marketing-solutions {
        padding: 40px 20px;
        max-width: 1600px;
        margin: 0 auto;
        background-color: black;
        margin-bottom: 50px;
      }

    /* Heading styles */
    .marketing-solutions-heading {
        text-align: center;
        font-size: 36px;
        font-weight: 700;
        color:rgb(255, 255, 255);
        margin-bottom: 60px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    /* Solutions grid */
    .solutions-grid {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 40px;
    }

    /* Solution card */
    .solution-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 300px;
    }

    /* Icon container */
    .icon-container {
        background-color: #f0f0f0;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }

    /* Category title */
    .category-title {
        font-size: 24px;
        font-weight: 700;
        text-align: center;
        color:rgb(255, 243, 243);
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        line-height: 1.3;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .solutions-grid {
            flex-direction: column;
            align-items: center;
        }
        
        .marketing-solutions-heading {
            font-size: 28px;
            margin-bottom: 40px;
        }
    }

        .hero-slider {
            position: relative;
            width: 100%;
            height: 500px;
            overflow: hidden;
        }
        .slider-container {
            display: flex;
            width: 100%;
            height: 100%;
            transition: transform 1s ease-in-out;
        }
        .slider-item {
            flex: 0 0 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
        }
        .slider-content {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            text-align: center;
            padding: 20px;
            z-index: 2;
        }
      .custom-img {
      height: 200px; 
      object-fit: cover; 
    }
    .love-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    color: black;
    cursor: pointer;
  }
  .card.hover-card:hover {
  box-shadow: 0 4px 15px rgba(255, 0, 0, 0.6); /* Red shadow */
  transform: scale(1.05); /* Optional: slightly enlarge the card */
  transition: all 0.3s ease; /* Smooth transition */
}
    </style>
</head>
<body>
    <!-- Hero Section with Slider -->
    <div class="hero-slider">
        <!-- Fixed Content Overlay -->
        <div class="slider-content">
            <h1 class="display-4 fw-bold mb-3">The #1 site real estate professionals trust<sup>*</sup></h1>
            <ul class="nav nav-tabs justify-content-center mt-3">
                <li class="nav-item"><a class="nav-link active" href="#">Buy</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Rent</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Sell</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Pre-approval</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Just sold</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Home value</a></li>
            </ul>
            <div class="input-group mt-3 mx-auto" style="max-width: 800px;">
                <input type="text" class="form-control" placeholder="Address, School, City, Zip or Neighborhood">
                <button class="btn btn-light" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
        
        <!-- Image Slider with dynamic images from database -->
        <div class="slider-container" id="sliderContainer">
            @foreach($banner as $bannerimage)
                <div class="slider-item" style="background-image: url({{ asset('storage/uploads/banner/main_image/'. $bannerimage->main_image) }});"></div>
            @endforeach
        </div>
    </div>

    <!-- advertising secton -->
    <div class="marketing-solutions">
    <h1 class="marketing-solutions-heading">More lead and marketing solutions for:</h1>
    
    <div class="solutions-grid">
        <!-- Builders -->
        <div class="solution-card">
            <div class="icon-container">
                <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M35 30C35 30 40 25 45 30L55 40C55 40 60 45 55 50L50 55C50 55 45 60 40 55L30 45C30 45 25 40 30 35L35 30Z" fill="#CCCCCC" stroke="#333333" stroke-width="2"/>
                    <path d="M60 55C60 55 65 50 70 55L80 65C80 65 85 70 80 75L75 80C75 80 70 85 65 80L55 70C55 70 50 65 55 60L60 55Z" fill="#CCCCCC" stroke="#333333" stroke-width="2"/>
                    <rect x="30" y="50" width="40" height="30" rx="2" fill="#E32222"/>
                    <path d="M35 50V65" stroke="#333333" stroke-width="2"/>
                    <path d="M45 50V65" stroke="#333333" stroke-width="2"/>
                    <path d="M55 50V65" stroke="#333333" stroke-width="2"/>
                    <path d="M65 50V65" stroke="#333333" stroke-width="2"/>
                </svg>
            </div>
            <h2 class="category-title">Builders</h2>
        </div>
        
        <!-- Property Managers -->
        <div class="solution-card">
            <div class="icon-container">
                <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="50" y="20" width="30" height="60" fill="#FFFFFF" stroke="#333333" stroke-width="2"/>
                    <rect x="20" y="40" width="30" height="40" fill="#FFFFFF" stroke="#333333" stroke-width="2"/>
                    <rect x="55" y="25" width="5" height="5" fill="#FFFFFF" stroke="#333333" stroke-width="1"/>
                    <rect x="65" y="25" width="5" height="5" fill="#FFFFFF" stroke="#333333" stroke-width="1"/>
                    <rect x="55" y="35" width="5" height="5" fill="#FFFFFF" stroke="#333333" stroke-width="1"/>
                    <rect x="65" y="35" width="5" height="5" fill="#FFFFFF" stroke="#333333" stroke-width="1"/>
                    <rect x="55" y="45" width="5" height="5" fill="#FFFFFF" stroke="#333333" stroke-width="1"/>
                    <rect x="65" y="45" width="5" height="5" fill="#FFFFFF" stroke="#333333" stroke-width="1"/>
                    <rect x="25" y="45" width="5" height="5" fill="#FFFFFF" stroke="#333333" stroke-width="1"/>
                    <rect x="35" y="45" width="5" height="5" fill="#FFFFFF" stroke="#333333" stroke-width="1"/>
                    <rect x="25" y="55" width="5" height="5" fill="#FFFFFF" stroke="#333333" stroke-width="1"/>
                    <rect x="35" y="55" width="5" height="5" fill="#FFFFFF" stroke="#333333" stroke-width="1"/>
                    <rect x="25" y="65" width="20" height="15" fill="#E32222"/>
                    <rect x="55" y="65" width="20" height="15" fill="#E32222"/>
                </svg>
            </div>
            <h2 class="category-title">Property<br>Managers</h2>
        </div>
        
        <!-- Brand Advertisers -->
        <div class="solution-card">
            <div class="icon-container">
                <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="20" y="25" width="60" height="50" rx="3" fill="#FFFFFF" stroke="#333333" stroke-width="2"/>
                    <rect x="20" y="25" width="60" height="10" rx="3" fill="#333333"/>
                    <circle cx="25" cy="30" r="2" fill="#FFFFFF"/>
                    <circle cx="32" cy="30" r="2" fill="#FFFFFF"/>
                    <circle cx="39" cy="30" r="2" fill="#FFFFFF"/>
                    <rect x="25" y="45" width="20" height="5" fill="#333333"/>
                    <rect x="25" y="55" width="15" height="5" fill="#333333"/>
                    <rect x="50" y="45" width="25" height="20" fill="#E32222"/>
                    <path d="M65 55L70 60" stroke="#FFFFFF" stroke-width="2"/>
                </svg>
            </div>
            <h2 class="category-title">Brand<br>Advertisers</h2>
        </div>
    </div>
</div>
<!-- Rent House Section -->
<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold" style="font-size: 20px;">Rent House</h2>
  </div>

  <div class="row justify-content-center g-4">
    <!-- Card 1 with red shadow hover effect -->
    <div class="col-md-3 col-sm-6">
      <div class="card hover-card position-relative">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRbcrj53mGyk-u4JwrIb6z1RBAeCpxR78gfQ&s"
             class="card-img-top img-fluid" alt="House 1">
        
        <!-- Love Icon -->
        <i class="bi bi-bookmark love-icon" onclick="toggleLoveIcon(this)"></i>

        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center">
            <p class="card-text mb-0">Price: $2400</p>
            <div>
              <i class="bi bi-star-fill text-warning"></i> 4.94
            </div>
          </div>
          <p class="card-text text-muted">Cape Town, South Africa</p>
        </div>
      </div>
    </div>

    <!-- Card 2 with red shadow hover effect -->
    <div class="col-md-3 col-sm-6">
      <div class="card hover-card position-relative">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRbcrj53mGyk-u4JwrIb6z1RBAeCpxR78gfQ&s"
             class="card-img-top img-fluid" alt="House 2">
        
        <!-- Love Icon -->
        <i class="bi bi-bookmark love-icon" onclick="toggleLoveIcon(this)"></i>

        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center">
            <p class="card-text mb-0">Price: $2500</p>
            <div>
              <i class="bi bi-star-fill text-warning"></i> 4.88
            </div>
          </div>
          <p class="card-text text-muted">New York, USA</p>
        </div>
      </div>
    </div>

    <!-- Card 3 with red shadow hover effect -->
    <div class="col-md-3 col-sm-6">
      <div class="card hover-card position-relative">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRbcrj53mGyk-u4JwrIb6z1RBAeCpxR78gfQ&s"
             class="card-img-top img-fluid" alt="House 3">
        
        <!-- Love Icon -->
        <i class="bi bi-bookmark love-icon" onclick="toggleLoveIcon(this)"></i>

        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center">
            <p class="card-text mb-0">Price: $2300</p>
            <div>
              <i class="bi bi-star-fill text-warning"></i> 4.75
            </div>
          </div>
          <p class="card-text text-muted">Sydney, Australia</p>
        </div>
      </div>
    </div>

    <!-- Card 4 with red shadow hover effect -->
    <div class="col-md-3 col-sm-6">
      <div class="card hover-card position-relative">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRbcrj53mGyk-u4JwrIb6z1RBAeCpxR78gfQ&s"
             class="card-img-top img-fluid" alt="House 4">
        
        <!-- Love Icon -->
        <i class="bi bi-bookmark love-icon" onclick="toggleLoveIcon(this)"></i>

        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center">
            <p class="card-text mb-0">Price: $2600</p>
            <div>
              <i class="bi bi-star-fill text-warning"></i> 4.90
            </div>
          </div>
          <p class="card-text text-muted">London, UK</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Rent Room Section -->
<div class="container">
  <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
    <h2 class="fw-bold" style="font-size: 20px;">Rent Room</h2>
  </div>

  <div class="row justify-content-center g-4">
    <!-- Room 1 with red shadow hover effect -->
    <div class="col-md-3 col-sm-6">
      <div class="card hover-card position-relative">
        <img src="https://a0.muscache.com/im/pictures/miso/Hosting-1025775067818659597/original/96d33f63-a691-4c51-8755-3bfcaa0ffaf0.jpeg?im_w=720"
             class="card-img-top img-fluid" alt="Room 1">
        <!-- Love Icon -->
        <i class="bi bi-bookmark love-icon" onclick="toggleLoveIcon(this)"></i>
        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center">
            <p class="card-text mb-0">Price: $800</p>
            <div>
              <i class="bi bi-star-fill text-warning"></i> 4.85
            </div>
          </div>
          <p class="card-text text-muted">Berlin, Germany</p>
        </div>
      </div>
    </div>

    <!-- Room 2 with red shadow hover effect -->
    <div class="col-md-3 col-sm-6">
      <div class="card hover-card position-relative">
        <img src="https://a0.muscache.com/im/pictures/miso/Hosting-1025775067818659597/original/96d33f63-a691-4c51-8755-3bfcaa0ffaf0.jpeg?im_w=720"
             class="card-img-top img-fluid" alt="Room 2">
        <!-- Love Icon -->
        <i class="bi bi-bookmark love-icon" onclick="toggleLoveIcon(this)"></i>
        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center">
            <p class="card-text mb-0">Price: $750</p>
            <div>
              <i class="bi bi-star-fill text-warning"></i> 4.75
            </div>
          </div>
          <p class="card-text text-muted">Tokyo, Japan</p>
        </div>
      </div>
    </div>

    <!-- Room 3 with red shadow hover effect -->
    <div class="col-md-3 col-sm-6">
      <div class="card hover-card position-relative">
        <img src="https://a0.muscache.com/im/pictures/miso/Hosting-1025775067818659597/original/96d33f63-a691-4c51-8755-3bfcaa0ffaf0.jpeg?im_w=720"
             class="card-img-top img-fluid" alt="Room 3">
        <!-- Love Icon -->
        <i class="bi bi-bookmark love-icon" onclick="toggleLoveIcon(this)"></i>
        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center">
            <p class="card-text mb-0">Price: $820</p>
            <div>
              <i class="bi bi-star-fill text-warning"></i> 4.90
            </div>
          </div>
          <p class="card-text text-muted">Paris, France</p>
        </div>
      </div>
    </div>

    <!-- Room 4 with red shadow hover effect -->
    <div class="col-md-3 col-sm-6">
      <div class="card hover-card position-relative">
        <img src="https://a0.muscache.com/im/pictures/miso/Hosting-1025775067818659597/original/96d33f63-a691-4c51-8755-3bfcaa0ffaf0.jpeg?im_w=720"
             class="card-img-top img-fluid" alt="Room 4">
        <!-- Love Icon -->
        <i class="bi bi-bookmark love-icon" onclick="toggleLoveIcon(this)"></i>
        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center">
            <p class="card-text mb-0">Price: $780</p>
            <div>
              <i class="bi bi-star-fill text-warning"></i> 4.80
            </div>
          </div>
          <p class="card-text text-muted">Madrid, Spain</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Rent Apartment Section -->
<div class="container">
  <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
    <h2 class="fw-bold" style="font-size: 20px;">Rent Apartment</h2>
  </div>

  <div class="row justify-content-center g-4">
    <!-- Apartment 1 -->
    <div class="col-md-3 col-sm-6">
      <div class="card position-relative hover-card">
        <img src="https://www.shutterstock.com/shutterstock/photos/2501530247/display_1500/stock-photo-new-modern-block-of-flats-in-green-area-residential-apartment-with-flat-buildings-exterior-luxury-2501530247.jpg"
             class="card-img-top img-fluid" alt="Apartment 1">
        
        <!-- Love Icon -->
        <i class="bi bi-bookmark love-icon" onclick="toggleLoveIcon(this)"></i>

        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center">
            <p class="card-text mb-0">Price: $3000</p>
            <div>
              <i class="bi bi-star-fill text-warning"></i> 4.92
            </div>
          </div>
          <p class="card-text text-muted">Los Angeles, USA</p>
        </div>
      </div>
    </div>

    <!-- Apartment 2 -->
    <div class="col-md-3 col-sm-6">
      <div class="card position-relative hover-card">
        <img src="https://www.shutterstock.com/shutterstock/photos/2501530247/display_1500/stock-photo-new-modern-block-of-flats-in-green-area-residential-apartment-with-flat-buildings-exterior-luxury-2501530247.jpg"
             class="card-img-top img-fluid" alt="Apartment 2">
        
             <i class="bi bi-bookmark love-icon" onclick="toggleLoveIcon(this)"></i>

        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center">
            <p class="card-text mb-0">Price: $2800</p>
            <div>
              <i class="bi bi-star-fill text-warning"></i> 4.87
            </div>
          </div>
          <p class="card-text text-muted">Dubai, UAE</p>
        </div>
      </div>
    </div>

    <!-- Apartment 3 -->
    <div class="col-md-3 col-sm-6">
      <div class="card position-relative hover-card">
        <img src="https://www.shutterstock.com/shutterstock/photos/2501530247/display_1500/stock-photo-new-modern-block-of-flats-in-green-area-residential-apartment-with-flat-buildings-exterior-luxury-2501530247.jpg"
             class="card-img-top img-fluid" alt="Apartment 3">
        
             <i class="bi bi-bookmark love-icon" onclick="toggleLoveIcon(this)"></i>

        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center">
            <p class="card-text mb-0">Price: $3100</p>
            <div>
              <i class="bi bi-star-fill text-warning"></i> 4.95
            </div>
          </div>
          <p class="card-text text-muted">Toronto, Canada</p>
        </div>
      </div>
    </div>

    <!-- Apartment 4 -->
    <div class="col-md-3 col-sm-6">
      <div class="card position-relative hover-card">
        <img src="https://www.shutterstock.com/shutterstock/photos/2501530247/display_1500/stock-photo-new-modern-block-of-flats-in-green-area-residential-apartment-with-flat-buildings-exterior-luxury-2501530247.jpg"
             class="card-img-top img-fluid" alt="Apartment 4">
        
             <i class="bi bi-bookmark love-icon" onclick="toggleLoveIcon(this)"></i>

        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center">
            <p class="card-text mb-0">Price: $2900</p>
            <div>
              <i class="bi bi-star-fill text-warning"></i> 4.88
            </div>
          </div>
          <p class="card-text text-muted">Singapore</p>
        </div>
      </div>
    </div>
  </div>
</div>
@include('vadama.layouts.footer')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sliderContainer = document.getElementById('sliderContainer');
            const slides = document.querySelectorAll('.slider-item');
            let currentSlide = 0;
            const slideCount = slides.length;
            
            // Only initialize slider if there are slides
            if (slideCount > 0) {
                // Set initial position
                sliderContainer.style.transform = 'translateX(0)';
                
                // Start auto rotation after 3 seconds
                setTimeout(() => {
                    setInterval(() => {
                        currentSlide = (currentSlide + 1) % slideCount;
                        sliderContainer.style.transform = `translateX(-${currentSlide * 100}%)`;
                    }, 5000); // Change slide every 5 seconds
                }, 3000); // Start 3 seconds after page load
            }
        });
        function toggleLoveIcon(icon) {
    icon.classList.toggle("bi-bookmark");
    icon.classList.toggle("bi-bookmark-fill");
    icon.style.color = icon.classList.contains('bi-bookmark-fill') ? 'white' : 'white';
  }
    </script>
</body>
<!-- Bootstrap JS (Make sure this is included before the script) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    var myCarousel = new bootstrap.Carousel(document.getElementById('carouselExampleIndicators'), {
      interval: 10000,  
      ride: 'carousel'
    });
  });
</script>
</html>
@endsection
