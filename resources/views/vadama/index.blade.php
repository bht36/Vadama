@extends('vadama.layouts.header')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Website</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                        url('https://hebbkx1anhila5yf.public.blob.vercel-storage.com/screencapture-realtor-rentals-2025-03-12-07_30_21%20%281%29.png-lzGooxWprjpSDTRMskNkMAFzfel2Nj.jpeg');
            background-size: cover;
            background-position: center;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
        }

        .hero-content {
            max-width: 1000px;
            padding: 0 20px;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .hero h1 sup {
            font-size: 1rem;
            vertical-align: super;
        }

        /* Navigation Tabs */
        .nav-tabs ul {
            display: flex;
            justify-content: center;
            list-style: none;
            gap: 10px;
            margin-bottom: 30px;
        }

        .nav-tabs a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .nav-tabs a:hover, .nav-tabs a.active {
            border-bottom: 3px solid white;
        }

        /* Search Bar */
        .search-container {
            display: flex;
            max-width: 800px;
            margin: 0   ;
            border-radius: 50px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .search-input {
            flex: 1;
            padding: 15px 20px;
            border: none;
            font-size: 1rem;
            outline: none;
        }

        .search-button {
            background-color: white;
            border: none;
            padding: 0 20px;
            cursor: pointer;
            color: #666;
            font-size: 1.2rem;
        }

        /* Listings Section */
        .listings {
            background-color: #1a1a1a;
            color: white;
            padding: 50px 0;
        }

        .listings-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .listings-header h2 {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .view-all {
            color: white;
            text-decoration: none;
        }

        .view-all:hover {
            text-decoration: underline;
        }

        /* Property Grid */
        .property-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(270px, 1fr));
            gap: 20px;
        }

        /* Property Card */
        .property-card {
            background-color: #1a1a1a;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .property-card:hover {
            transform: translateY(-5px);
        }

        .property-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .property-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .favorite-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: rgba(0, 0, 0, 0.6);
            border: none;
            color: white;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .favorite-btn:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .property-type {
            position: absolute;
            bottom: 10px;
            left: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
        }

        .property-details {
            padding: 15px;
        }

        .property-price {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .property-specs {
            display: flex;
            gap: 15px;
            margin-bottom: 10px;
            font-size: 0.9rem;
            color: #ccc;
        }

        .property-address {
            font-size: 0.9rem;
            color: #ccc;
        }
    </style>
</head>
<body>

    <!-- Hero Section -->
    <header class="hero">
        <div class="hero-content">
            <h1>The #1 site real estate<br>professionals trust<sup>*</sup></h1>
            <nav class="nav-tabs">
                <ul>
                    <li><a href="#" class="active">Buy</a></li>
                    <li><a href="#">Rent</a></li>
                    <li><a href="#">Sell</a></li>
                    <li><a href="#">Pre-approval</a></li>
                    <li><a href="#">Just sold</a></li>
                    <li><a href="#">Home value</a></li>
                </ul>
            </nav>
            <div class="search-container">
                <input type="text" placeholder="Address, School, City, Zip or Neighborhood" class="search-input">
                <button class="search-button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </header>

    <!-- Listings Section -->
    <section class="listings">
        <div class="container">
            <div class="listings-header">
                <h2>Newest listings</h2>
            </div>
            <div class="property-grid">
                <div class="property-card">
                    <div class="property-image">
                        <img src="https://via.placeholder.com/300" alt="House">
                        <button class="favorite-btn"><i class="fas fa-heart"></i></button>
                        <span class="property-type">For Rent</span>
                    </div>
                    <div class="property-details">
                        <h3 class="property-price">$2,500</h3>
                        <p class="property-address">123 Main St, Austin, TX</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>


@endsection
