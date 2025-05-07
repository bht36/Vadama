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
        .search-container {
            position: relative;
            width: 100%;
            max-width: 600px;
        }

        .search-bar {
            width: 100%;
            padding: 15px 20px;
            font-size: 16px;
            border: none;
            border-radius: 30px;
            background-color: #222;
            color: #fff;
            outline: none;
            box-sizing: border-box;
            padding-right: 60px;
        }

        .search-bar::placeholder {
            color: #aaa;
        }

        .search-button {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background-color: #333;
            border: 2px solid white;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background-color 0.3s;
        }

        .search-button:hover {
            background-color: #444;
        }

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
            margin-top: 50px;
            overflow: hidden;
        }

        .hero-container::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 0;
        }

        .hero-content {
            position: relative;
            z-index: 1;
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
            background-color: rgba(255, 0, 0, 0.6);
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
            z-index: 10;
            pointer-events: auto;
        }
        .card.hover-card:hover {
            box-shadow: 0 4px 15px rgba(255, 0, 0, 0.6);
            transform: scale(1.05);
            transition: all 0.3s ease;
        }
        .card-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }
    </style>
</head>
<body>
    <!-- Hero Section with Slider -->
    <div class="hero-slider">
        <div class="slider-content">
            <h1 class="display-4 fw-bold mb-3">The #1 site real estate professionals trust<sup>*</sup></h1>
            <div class="input-group mt-3 mx-auto" style="max-width: 800px; border-radius: 50px; overflow: hidden;">
                <input type="text" class="form-control" style="border-radius: 0;" placeholder="Address, School, City, Zip or Neighborhood">
                <button class="btn btn-light" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="slider-container" id="sliderContainer">
            @foreach($banner as $bannerimage)
                <div class="slider-item" style="background-image: url({{ asset('storage/uploads/banner/main_image/'. $bannerimage->main_image) }});"></div>
            @endforeach
        </div>
    </div>

    <!-- Rent House Section -->
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mt-5 mb-4">
            <h2 class="fw-bold" style="font-size: 20px;">Rent House</h2>
        </div>
        <div class="row justify-content-center g-4">
            @foreach([1,2,3,4] as $item)
            <div class="col-md-3 col-sm-6">
                <a href="{{ route('housing') }}" class="card-link">
                    <div class="card hover-card position-relative">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRbcrj53mGyk-u4JwrIb6z1RBAeCpxR78gfQ&s"
                            class="card-img-top img-fluid" alt="House {{ $item }}">
                        <i class="bi bi-bookmark love-icon" onclick="toggleLoveIcon(event, this)"></i>
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="card-text mb-0">Price: ${{ 2400 + $item * 100 }}</p>
                                <div>
                                    <i class="bi bi-star-fill text-warning"></i> 4.{{ 94 - $item }}
                                </div>
                            </div>
                            <p class="card-text text-muted">Location {{ $item }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Rent Room Section -->
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
            <h2 class="fw-bold" style="font-size: 20px;">Rent Room</h2>
        </div>
        <div class="row justify-content-center g-4">
            @foreach([1,2,3,4] as $item)
            <div class="col-md-3 col-sm-6">
                <a href="#" class="card-link">
                    <div class="card hover-card position-relative">
                        <img src="https://a0.muscache.com/im/pictures/miso/Hosting-1025775067818659597/original/96d33f63-a691-4c51-8755-3bfcaa0ffaf0.jpeg?im_w=720"
                            class="card-img-top img-fluid" alt="Room {{ $item }}">
                        <i class="bi bi-bookmark love-icon" onclick="toggleLoveIcon(event, this)"></i>
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="card-text mb-0">Price: ${{ 800 + $item * 20 }}</p>
                                <div>
                                    <i class="bi bi-star-fill text-warning"></i> 4.{{ 85 - $item }}
                                </div>
                            </div>
                            <p class="card-text text-muted">Room {{ $item }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Rent Apartment Section -->
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
            <h2 class="fw-bold" style="font-size: 20px;">Rent Apartment</h2>
        </div>
        <div class="row justify-content-center g-4">
            @foreach([1,2,3,4] as $item)
            <div class="col-md-3 col-sm-6">
                <a href="#" class="card-link">
                    <div class="card hover-card position-relative">
                        <img src="https://www.shutterstock.com/shutterstock/photos/2501530247/display_1500/stock-photo-new-modern-block-of-flats-in-green-area-residential-apartment-with-flat-buildings-exterior-luxury-2501530247.jpg"
                            class="card-img-top img-fluid" alt="Apartment {{ $item }}">
                        <i class="bi bi-bookmark love-icon" onclick="toggleLoveIcon(event, this)"></i>
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="card-text mb-0">Price: ${{ 3000 + $item * 100 }}</p>
                                <div>
                                    <i class="bi bi-star-fill text-warning"></i> 4.{{ 95 - $item }}
                                </div>
                            </div>
                            <p class="card-text text-muted">Apartment {{ $item }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Advertising Section -->
    <div class="hero-container mt-8">
        <div class="hero-content">
            <div class="category-text">Unique Homes</div>
            <div class="headline-text">$79 Million Aspen Megamansion With Wild Array of Amenities Including Indoor Pool and 4 Bars Is the Week's Most Expensive Home</div>
            <div>
                <button class="btn read-button">Read Article</button>
            </div>
        </div>
    </div>

    @include('vadama.layouts.footer')

    <script>
        function toggleLoveIcon(event, icon) {
            event.stopPropagation();
            event.preventDefault();
            icon.classList.toggle("bi-bookmark");
            icon.classList.toggle("bi-bookmark-fill");
            icon.style.color = icon.classList.contains('bi-bookmark-fill') ? 'red' : 'black';
        }

        document.addEventListener('DOMContentLoaded', function() {
            const sliderContainer = document.getElementById('sliderContainer');
            const slides = document.querySelectorAll('.slider-item');
            let currentSlide = 0;
            const slideCount = slides.length;
            
            if (slideCount > 0) {
                sliderContainer.style.transform = 'translateX(0)';
                
                setTimeout(() => {
                    setInterval(() => {
                        currentSlide = (currentSlide + 1) % slideCount;
                        sliderContainer.style.transform = `translateX(-${currentSlide * 100}%)`;
                    }, 5000);
                }, 3000);
            }
        });
    </script>
</body>
</html>
@endsection