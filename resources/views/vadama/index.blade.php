@extends('vadama.layouts.header')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Website</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Hero Section -->
    <header>
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('storage/uploads/banner/main_image/1743057470_1500x450.png') }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('storage/uploads/banner/main_image/1743057470_1500x450.png') }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('storage/uploads/banner/main_image/1743057470_1500x450.png') }}" class="d-block w-100" alt="...">
      </div>
    </div>
    <!-- Optional: Controls for manual navigation -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</header>
    <!-- <header class="hero text-white text-center d-flex align-items-center justify-content-center" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://hebbkx1anhila5yf.public.blob.vercel-storage.com/screencapture-realtor-rentals-2025-03-12-07_30_21%20%281%29.png-lzGooxWprjpSDTRMskNkMAFzfel2Nj.jpeg'); background-size: cover; background-position: center; height: 500px;">
        <div class="container">
            <h1 class="display-4 fw-bold">The #1 site real estate professionals trust<sup>*</sup></h1>
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
    </header> -->

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
