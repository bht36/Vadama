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
              .hero-container {
              background-image: url('https://images.wsj.net/im-553730?width=1280&size=1.770');
              background-size: cover;
              background-position: center;
              height: 450px;
              width: 100%;
              position: relative;
              color: white;
              text-align: center;
              display: flex;
              align-items: center;
              justify-content: center;
              margin-bottom: 50px;
              overflow: hidden; /* Ensures ::before doesn't overflow */
          }

          .hero-container::before {
              content: "";
              position: absolute;
              top: 0; left: 0;
              width: 100%;
              height: 100%;
              background: rgba(0, 0, 0, 0.4); /* Shadow overlay */
              z-index: 0;
          }

          .hero-content {
              position: relative;
              z-index: 1; /* On top of the shadow */
              max-width: 800px;
              padding: 20px;
          }

        .category-text {
            font-size: 18px;
            margin-bottom: 15px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        
        .headline-text {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 30px;
            line-height: 1.2;
        }      
        .read-button {
            background-color: transparent;
            color: white;
            border: 2px solid white;
            border-radius: 30px;
            padding: 8px 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .read-button:hover {
            background-color:rgba(255, 0, 0, 0.6);
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
    <div class="hero-container mt-8">
        <div class="hero-content">
            <div class="category-text">Unique Homes</div>
            <div class="headline-text">$79 Million Aspen Megamansion With Wild Array of Amenities Including Indoor Pool and 4 Bars Is the Week's Most Expensive Home</div>
            <div>
                <button class="btn read-button">Read Article</button>
            </div>
        </div>
    </div>

<!-- Rent House Section -->
<div class="container mt-4">
  <h2 class="fw-bold" style="font-size: 20px;">Rent House</h2>
  <div class="row justify-content-center g-4">
    @forelse ($houses as $house)
    <div class="col-md-3 col-sm-6">
      <a href="{{ route('housing', ['id' => $house->id]) }}">
        <div class="card hover-card position-relative">
          @php
              $firstImage = $house->images->first();
          @endphp

          @if ($firstImage)
            <img src="{{ asset('storage/uploads/properties/images/' . $firstImage->image_path) }}"
                 class="card-img-top img-fluid object-cover"
                 alt="{{ $house->title }}"
                 style="aspect-ratio: 4/3; object-fit: cover; width: 100%; border-radius: 8px;">
          @else
            <img src="{{ asset('images/no-image.jpg') }}"
                 class="card-img-top img-fluid"
                 alt="No Image">
          @endif

          <i class="bi bi-bookmark love-icon" onclick="toggleLoveIcon(this)"></i>
          <div class="card-body d-flex flex-column">
            <div class="d-flex justify-content-between align-items-center">
              <p class="card-text mb-0">Price: रु{{ $house->price_per_month }}</p>
              <div><i class="bi bi-star-fill text-warning"></i> 4.8</div>
            </div>
            <p class="card-text text-muted">{{ $house->location }}</p>
          </div>
        </div>
      </a>
    </div>
    @empty
      <div class="text-center mt-4">
        <h5>Coming Soon . . .</h5>
      </div>
    @endforelse
  </div>
</div>


<!-- Rent Room Section -->
<div class="container mt-4">
  <h2 class="fw-bold" style="font-size: 20px;">Rent House</h2>
  <div class="row justify-content-center g-4">
    @forelse ($rooms as $room)
    <div class="col-md-3 col-sm-6">
      <a href="{{ route('housing', ['id' => $room->id]) }}">
        <div class="card hover-card position-relative">

          @php
              $firstImage = $room->images->first();
          @endphp

          @if ($firstImage)
            <img src="{{ asset('storage/uploads/properties/images/' . $firstImage->image_path) }}"
                 class="card-img-top img-fluid object-cover"
                 alt="{{ $room->title }}"
                 style="aspect-ratio: 4/3; object-fit: cover; width: 100%; border-radius: 8px;">
          @else
            <img src="{{ asset('images/no-image.jpg') }}"
                 class="card-img-top img-fluid"
                 alt="No Image">
          @endif

          <i class="bi bi-bookmark love-icon" onclick="toggleLoveIcon(this)"></i>
          <div class="card-body d-flex flex-column">
            <div class="d-flex justify-content-between align-items-center">
              <p class="card-text mb-0">Price: रु{{ $room->price_per_month }}</p>
              <div><i class="bi bi-star-fill text-warning"></i> 4.8</div>
            </div>
            <p class="card-text text-muted">{{ $room->location }}</p>
          </div>
        </div>
      </a>
    </div>
    @empty
      <div class="text-center mt-4">
        <h5>Coming Soon . . .</h5>
      </div>
    @endforelse
  </div>
</div>
  </div>
</div>

<!-- Rent Apartment Section -->
<div class="container mt-4">
  <h2 class="fw-bold" style="font-size: 20px;">Rent Apartment</h2>
  <div class="row justify-content-center g-4">
    @forelse ($apartments as $apartment)
    <div class="col-md-3 col-sm-6">
      <a href="{{ route('housing', ['id' => $apartment->id]) }}">
        <div class="card hover-card position-relative">

          @php
              $firstImage = $apartment->images->first();
          @endphp

          @if ($firstImage)
            <img src="{{ asset('storage/uploads/properties/images/' . $firstImage->image_path) }}"
                 class="card-img-top img-fluid object-cover"
                 alt="{{ $apartment->title }}"
                 style="aspect-ratio: 4/3; object-fit: cover; width: 100%; border-radius: 8px;">
          @else
            <img src="{{ asset('images/no-image.jpg') }}"
                 class="card-img-top img-fluid"
                 alt="No Image">
          @endif

          <i class="bi bi-bookmark love-icon" onclick="toggleLoveIcon(this)"></i>
          <div class="card-body d-flex flex-column">
            <div class="d-flex justify-content-between align-items-center">
              <p class="card-text mb-0">Price: रु{{ $apartment->price_per_month }}</p>
              <div><i class="bi bi-star-fill text-warning"></i> 4.8</div>
            </div>
            <p class="card-text text-muted">{{ $apartment->location }}</p>
          </div>
        </div>
      </a>
    </div>
    @empty
      <div class="text-center mt-4">
        <h5>Coming Soon . . .</h5>
      </div>
    @endforelse
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
