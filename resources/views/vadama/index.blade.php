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

    <!-- Listings Section -->
    <section class="listings bg-dark text-white py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold">Newest listings</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card bg-dark text-white">
                        <img src="https://via.placeholder.com/300" class="card-img-top" alt="House">
                        <div class="card-body">
                            <h5 class="card-title">$2,500</h5>
                            <p class="card-text">123 Main St, Austin, TX</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="card">
  <img src="..." class="card-img-top" alt="...">
<!-- Rent House Section -->
<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold" style="font-size: 20px;">Rent House</h2>
  </div>

  <div class="row justify-content-center g-4">
    <!-- Card 1 -->
    <div class="col-md-3 col-sm-6">
      <div class="card position-relative">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRbcrj53mGyk-u4JwrIb6z1RBAeCpxR78gfQ&s"
             class="card-img-top img-fluid" alt="House 1">
        
        <!-- Love Icon -->
        <i class="bi bi-heart love-icon" onclick="toggleLoveIcon(this)"></i>

        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center">
            <p class="card-text mb-0">Price: $2400</p>
            <div>
              <i class="bi bi-star-fill text-warning"></i> 4.94
            </div>
          </div>
          <p class="card-text text-muted">Cape Town, South Africa</p>
          <a href="#" class="btn btn-primary mt-auto">View Details</a>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-md-3 col-sm-6">
      <div class="card position-relative">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRbcrj53mGyk-u4JwrIb6z1RBAeCpxR78gfQ&s"
             class="card-img-top img-fluid" alt="House 2">
        
        <!-- Love Icon -->
        <i class="bi bi-heart love-icon" onclick="toggleLoveIcon(this)"></i>

        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center">
            <p class="card-text mb-0">Price: $2500</p>
            <div>
              <i class="bi bi-star-fill text-warning"></i> 4.88
            </div>
          </div>
          <p class="card-text text-muted">New York, USA</p>
          <a href="#" class="btn btn-primary mt-auto">View Details</a>
        </div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="col-md-3 col-sm-6">
      <div class="card position-relative">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRbcrj53mGyk-u4JwrIb6z1RBAeCpxR78gfQ&s"
             class="card-img-top img-fluid" alt="House 3">
        
        <!-- Love Icon -->
        <i class="bi bi-heart love-icon" onclick="toggleLoveIcon(this)"></i>

        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center">
            <p class="card-text mb-0">Price: $2300</p>
            <div>
              <i class="bi bi-star-fill text-warning"></i> 4.75
            </div>
          </div>
          <p class="card-text text-muted">Sydney, Australia</p>
          <a href="#" class="btn btn-primary mt-auto">View Details</a>
        </div>
      </div>
    </div>

    <!-- Card 4 -->
    <div class="col-md-3 col-sm-6">
      <div class="card position-relative">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRbcrj53mGyk-u4JwrIb6z1RBAeCpxR78gfQ&s"
             class="card-img-top img-fluid" alt="House 4">
        
        <!-- Love Icon -->
        <i class="bi bi-heart love-icon" onclick="toggleLoveIcon(this)"></i>

        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center">
            <p class="card-text mb-0">Price: $2600</p>
            <div>
              <i class="bi bi-star-fill text-warning"></i> 4.90
            </div>
          </div>
          <p class="card-text text-muted">London, UK</p>
          <a href="#" class="btn btn-primary mt-auto">View Details</a>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Rent Room Section -->
<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold" style="font-size: 20px;">Rent Room</h2>
  </div>

  <div class="row justify-content-center g-4">
    <!-- Room 1 -->
<div class="col-md-3 col-sm-6">
  <div class="card position-relative">
    <img src="https://a0.muscache.com/im/pictures/miso/Hosting-1025775067818659597/original/96d33f63-a691-4c51-8755-3bfcaa0ffaf0.jpeg?im_w=720"
         class="card-img-top img-fluid" alt="Room 1">
    <!-- Love Icon -->
    <i class="bi bi-heart love-icon" onclick="toggleLoveIcon(this)"></i>
    <div class="card-body d-flex flex-column">
      <div class="d-flex justify-content-between align-items-center">
        <p class="card-text mb-0">Price: $800</p>
        <div>
          <i class="bi bi-star-fill text-warning"></i> 4.85
        </div>
      </div>
      <p class="card-text text-muted">Berlin, Germany</p>
      <a href="#" class="btn btn-primary mt-auto">View Details</a>
    </div>
  </div>
</div>

<!-- Room 2 -->
<div class="col-md-3 col-sm-6">
  <div class="card position-relative">
    <img src="https://a0.muscache.com/im/pictures/miso/Hosting-1025775067818659597/original/96d33f63-a691-4c51-8755-3bfcaa0ffaf0.jpeg?im_w=720"
         class="card-img-top img-fluid" alt="Room 2">
    <!-- Love Icon -->
    <i class="bi bi-heart love-icon" onclick="toggleLoveIcon(this)"></i>
    <div class="card-body d-flex flex-column">
      <div class="d-flex justify-content-between align-items-center">
        <p class="card-text mb-0">Price: $750</p>
        <div>
          <i class="bi bi-star-fill text-warning"></i> 4.75
        </div>
      </div>
      <p class="card-text text-muted">Tokyo, Japan</p>
      <a href="#" class="btn btn-primary mt-auto">View Details</a>
    </div>
  </div>
</div>

<!-- Room 3 -->
<div class="col-md-3 col-sm-6">
  <div class="card position-relative">
    <img src="https://a0.muscache.com/im/pictures/miso/Hosting-1025775067818659597/original/96d33f63-a691-4c51-8755-3bfcaa0ffaf0.jpeg?im_w=720"
         class="card-img-top img-fluid" alt="Room 3">
    <!-- Love Icon -->
    <i class="bi bi-heart love-icon" onclick="toggleLoveIcon(this)"></i>
    <div class="card-body d-flex flex-column">
      <div class="d-flex justify-content-between align-items-center">
        <p class="card-text mb-0">Price: $820</p>
        <div>
          <i class="bi bi-star-fill text-warning"></i> 4.90
        </div>
      </div>
      <p class="card-text text-muted">Paris, France</p>
      <a href="#" class="btn btn-primary mt-auto">View Details</a>
    </div>
  </div>
</div>

<!-- Room 4 -->
<div class="col-md-3 col-sm-6">
  <div class="card position-relative">
    <img src="https://a0.muscache.com/im/pictures/miso/Hosting-1025775067818659597/original/96d33f63-a691-4c51-8755-3bfcaa0ffaf0.jpeg?im_w=720"
         class="card-img-top img-fluid" alt="Room 4">
    <!-- Love Icon -->
    <i class="bi bi-heart love-icon" onclick="toggleLoveIcon(this)"></i>
    <div class="card-body d-flex flex-column">
      <div class="d-flex justify-content-between align-items-center">
        <p class="card-text mb-0">Price: $780</p>
        <div>
          <i class="bi bi-star-fill text-warning"></i> 4.80
        </div>
      </div>
      <p class="card-text text-muted">Madrid, Spain</p>
      <a href="#" class="btn btn-primary mt-auto">View Details</a>
    </div>
  </div>
</div>
</div>

<!-- Rent Apartment Section -->
<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold" style="font-size: 20px;">Rent Apartment</h2>
  </div>

  <div class="row justify-content-center g-4">
    <!-- Apartment 1 -->
    <div class="col-md-3 col-sm-6">
      <div class="card position-relative">
        <img src="https://www.shutterstock.com/shutterstock/photos/2501530247/display_1500/stock-photo-new-modern-block-of-flats-in-green-area-residential-apartment-with-flat-buildings-exterior-luxury-2501530247.jpg"
             class="card-img-top img-fluid" alt="Apartment 1">
        
        <!-- Love Icon -->
        <i class="bi bi-heart love-icon" onclick="toggleLoveIcon(this)"></i>

        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center">
            <p class="card-text mb-0">Price: $3000</p>
            <div>
              <i class="bi bi-star-fill text-warning"></i> 4.92
            </div>
          </div>
          <p class="card-text text-muted">Los Angeles, USA</p>
          <a href="#" class="btn btn-primary mt-auto">View Details</a>
        </div>
      </div>
    </div>

    <!-- Apartment 2 -->
    <div class="col-md-3 col-sm-6">
      <div class="card position-relative">
        <img src="https://www.shutterstock.com/shutterstock/photos/2501530247/display_1500/stock-photo-new-modern-block-of-flats-in-green-area-residential-apartment-with-flat-buildings-exterior-luxury-2501530247.jpg"
             class="card-img-top img-fluid" alt="Apartment 2">
        
        <i class="bi bi-heart love-icon" onclick="toggleLoveIcon(this)"></i>

        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center">
            <p class="card-text mb-0">Price: $2800</p>
            <div>
              <i class="bi bi-star-fill text-warning"></i> 4.87
            </div>
          </div>
          <p class="card-text text-muted">Dubai, UAE</p>
          <a href="#" class="btn btn-primary mt-auto">View Details</a>
        </div>
      </div>
    </div>

    <!-- Apartment 3 -->
    <div class="col-md-3 col-sm-6">
      <div class="card position-relative">
        <img src="https://www.shutterstock.com/shutterstock/photos/2501530247/display_1500/stock-photo-new-modern-block-of-flats-in-green-area-residential-apartment-with-flat-buildings-exterior-luxury-2501530247.jpg"
             class="card-img-top img-fluid" alt="Apartment 3">
        
        <i class="bi bi-heart love-icon" onclick="toggleLoveIcon(this)"></i>

        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center">
            <p class="card-text mb-0">Price: $3100</p>
            <div>
              <i class="bi bi-star-fill text-warning"></i> 4.95
            </div>
          </div>
          <p class="card-text text-muted">Toronto, Canada</p>
          <a href="#" class="btn btn-primary mt-auto">View Details</a>
        </div>
      </div>
    </div>

    <!-- Apartment 4 -->
    <div class="col-md-3 col-sm-6">
      <div class="card position-relative">
        <img src="https://www.shutterstock.com/shutterstock/photos/2501530247/display_1500/stock-photo-new-modern-block-of-flats-in-green-area-residential-apartment-with-flat-buildings-exterior-luxury-2501530247.jpg"
             class="card-img-top img-fluid" alt="Apartment 4">
        
        <i class="bi bi-heart love-icon" onclick="toggleLoveIcon(this)"></i>

        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center">
            <p class="card-text mb-0">Price: $2900</p>
            <div>
              <i class="bi bi-star-fill text-warning"></i> 4.88
            </div>
          </div>
          <p class="card-text text-muted">Singapore</p>
          <a href="#" class="btn btn-primary mt-auto">View Details</a>
        </div>
      </div>
    </div>
  </div>
</div>


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
    icon.classList.toggle("bi-heart");
    icon.classList.toggle("bi-heart-fill");
    icon.classList.toggle("text-danger");
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
