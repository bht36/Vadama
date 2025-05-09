@extends('vadama.layouts.header')
@section('content')
<div class="article-container">
  <!-- Main Content -->
  <main class="container py-4">
    <!-- Hero Image -->
    <div class="position-relative mb-4">
      <img src="https://www.dwarikas.com/wp-content/uploads/2021/12/home-banne.jpg" alt="Luxury Aspen Megamansion" class="img-fluid w-100" style="height: 60vh; object-fit: cover;">
      <div class="banner-tag">Most Expensive Villa</div>
    </div>

    <!-- Article Content -->
    <article>
      <h1 class="article-title fw-bold mb-2 fs-1">रु79 Million Aspen Megamansion With Wild Array of Amenities Including Indoor Pool and 4 Bars Is the Week's Most Expensive Home</h1>
      
      <div class="article-meta d-flex align-items-center mb-4">
        <span class="text-uppercase fw-medium">BY ANIL BHATTA</span>
        <span class="mx-2">|</span>
        <span>JUNE 23, 2025</span>
      </div>

      <div class="row">
        <div class="col-md-8">
          <div class="article-content">
            <p class="article-intro first-letter">
              A sprawling <em>Aspen, CO,</em> estate that boasts a host of extraordinary amenities has been put on the market with an astonishing रु79 million price tag—becoming the week's most expensive listing on Vadama.com®.
            </p>

            <p>
              The property, which spans 16,726 square feet of living space, is far from the average home, having been outfitted with the kind of top-level amenities that are more commonly found in a luxury shopping mall or hotel resort.
            </p>

            <p>
              These include a screening room, a bowling alley, an indoor pool, three tennis courts, and a four-car garage—complete with its own turntable.
            </p>

            <div class="my-4">
              <img src="https://www.dwarikas.com/wp-content/uploads/2021/08/krishna-banner-1024x516.jpg" alt="Indoor Pool" class="img-fluid w-100">
              <p class="article-meta mt-2 fst-italic">
                The luxurious indoor pool area features natural stone and expansive windows.
              </p>
            </div>

            <p>
              And for those who like to end their day with a cocktail or wine, never fear: Not only are there four bars at the property, but there's also a 1,200-bottle wine room.
            </p>

            <p>
              Additionally, the luxurious mansion offers cultural dance program and, of course, features some truly spectacular mountain and independent views.
            </p>

            <p>
              Other eye-popping abodes this week include a private island mansion in Connecticut, an art deco-inspired coastal estate in <em>Malibu, CA</em>, and a regal compound in <em>Florida</em> with two guest houses.
            </p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="sidebar-box mb-4">
            <h3 class="fw-semibold">Property Details</h3>
            <ul class="list-unstyled">
              <li class="d-flex justify-content-between mb-2">
                <span class="fw-medium">Location:</span>
                <span>Aspen, Colorado</span>
              </li>
              <li class="d-flex justify-content-between mb-2">
                <span class="fw-medium">Price:</span>
                <span>रु79,000,000</span>
              </li>
              <li class="d-flex justify-content-between mb-2">
                <span class="fw-medium">Square Footage:</span>
                <span>16,726 sq ft</span>
              </li>
              <li class="d-flex justify-content-between mb-2">
                <span class="fw-medium">Bedrooms:</span>
                <span>7</span>
              </li>
              <li class="d-flex justify-content-between mb-2">
                <span class="fw-medium">Bathrooms:</span>
                <span>9</span>
              </li>
            </ul>
          </div>

          <div class="mb-4">
            <img src="https://www.dwarikas.com/wp-content/uploads/2021/10/dwarika-art.jpg" alt="Exterior View" class="img-fluid w-100 mb-2">
            <p class="article-meta fst-italic">Aerial view of the रु79 million Aspen estate.</p>
          </div>

          <div class="sidebar-box">
            <h3 class="fw-semibold">Amenities</h3>
            <ul class="list-unstyled amenities-list">
              <li>• Indoor swimming pool</li>
              <li>• Four bars throughout the property</li>
              <li>• 1,200-bottle wine room</li>
              <li>• Screening room</li>
              <li>• Bowling alley</li>
              <li>• Three tennis courts</li>
              <li>• Four-car garage with turntable</li>
              <li>• cultural dance program</li>
            </ul>
          </div>
        </div>
      </div>
    </article>
  </main>
</div>

<!-- Article-specific styles that won't affect the nav bar -->
<style>
  .article-container {
    background-color: #faf9f7;
    color: #44403c;
  }
  
  .article-title {
    font-family: 'Playfair Display', serif;
  }
  
  .article-intro {
    font-family: 'Playfair Display', serif;
  }
  
  .first-letter::first-letter {
    font-size: 3.5rem;
    font-weight: bold;
    float: left;
    line-height: 0.8;
    margin-right: 0.1em;
  }
  
  .banner-tag {
    background-color: #dc3545;
    color: white;
    padding: 0.5rem 1.5rem;
    position: absolute;
    bottom: 0;
    left: 0;
  }
  
  .article-meta {
    font-size: 0.875rem;
    color: #78716c;
  }
  
  .article-content {
    font-size: 1.1rem;
    line-height: 1.7;
    font-family: 'Inter', sans-serif;
  }
  
  .article-content p {
    margin-bottom: 1.5rem;
  }
  
  .sidebar-box {
    background-color: #f5f5f4;
    border: 1px solid #e7e5e4;
    padding: 1.5rem;
  }
  
  .sidebar-box h3 {
    font-family: 'Playfair Display', serif;
    font-size: 1.25rem;
    margin-bottom: 1rem;
  }
  
  .amenities-list li {
    margin-bottom: 0.5rem;
  }
</style>

<!-- Bootstrap and Google Fonts -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@include('vadama.layouts.footer')
@endsection