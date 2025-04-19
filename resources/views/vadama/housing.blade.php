@extends('vadama.layouts.header')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room in Bhaktapur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Circular', -apple-system, BlinkMacSystemFont, Roboto, Helvetica Neue, sans-serif;
        }
        .gallery-img {
            height: 200px;
            object-fit: cover;
        }
    .image {
        height: 200px;
        width: 280px;
        object-fit: cover; 
        border-radius: 10px; 
    }
        .main-img {
            height: 410px;
        }
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
        .host-avatar {
            width: 56px;
            height: 56px;
            border-radius: 50%;
        }
        .calendar-day {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        .calendar-day.selected {
            background-color: #222;
            color: white;
        }
        .calendar-day.unavailable {
            text-decoration: line-through;
            color: #ddd;
        }

    </style>
</head>
<body>
    <div class="container py-4">
        <!-- Image gallery -->
        <div class="row g-2 mb-5 position-relative">
            <div class="col-md-6">
            <img src="https://a0.muscache.com/im/pictures/miso/Hosting-687326818861051595/original/61beb3c6-6451-4ba3-b886-fcbe76d6f571.jpeg?im_w=1200" alt="Main" 
 class="img-fluid rounded main-img h-150 w-100">
            </div>
            <div class="col-md-6">
                <div class="row g-2">
                    <div class="col-6"><img src="https://a0.muscache.com/im/pictures/miso/Hosting-687326818861051595/original/61beb3c6-6451-4ba3-b886-fcbe76d6f571.jpeg?im_w=1200" class="image" alt="Interior"></div>
                    <div class="col-6"><img src="https://a0.muscache.com/im/pictures/miso/Hosting-687326818861051595/original/61beb3c6-6451-4ba3-b886-fcbe76d6f571.jpeg?im_w=1200" class="image" alt="Bedroom"></div>
                    <div class="col-6"><img src="https://a0.muscache.com/im/pictures/miso/Hosting-687326818861051595/original/61beb3c6-6451-4ba3-b886-fcbe76d6f571.jpeg?im_w=1200" class="image" alt="Bathroom"></div>
                    <div class="col-6"><img src="https://a0.muscache.com/im/pictures/miso/Hosting-687326818861051595/original/61beb3c6-6451-4ba3-b886-fcbe76d6f571.jpeg?im_w=1200"  class="image"alt="View"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Left column -->
            <div class="col-lg-8">
                <div class="d-flex justify-content-between border-bottom pb-4 mb-4">
                    <div>
                        <h2 class="fs-4 fw-bold">Room in Bhaktapur, Nepal</h2>
                        <div class="text-secondary">2 guests · 1 bedroom · 1 bed · 1 shared bath</div>
                    </div>
                </div>

                <div class="border-bottom pb-4 mb-4">
                    <div class="d-flex mb-4">
                        <div class="me-3"><i class="bi bi-house-door fs-4"></i></div>
                        <div>
                            <h3 class="fs-5 fw-bold">Room in a guesthouse</h3>
                            <p class="text-secondary">Your own room in a home, plus access to shared spaces.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="me-3"><i class="bi bi-laptop fs-4"></i></div>
                        <div>
                            <h3 class="fs-5 fw-bold">Dedicated workspace</h3>
                            <p class="text-secondary">A room with wifi that's well-suited for working.</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="me-3"><i class="bi bi-door-open fs-4"></i></div>
                        <div>
                            <h3 class="fs-5 fw-bold">Self check-in</h3>
                            <p class="text-secondary">Check yourself in with the lockbox.</p>
                        </div>
                    </div>
                </div>

                <div class="border-bottom pb-4 mb-4">
                    <h2 class="fs-4 fw-bold mb-3">About this place</h2>
                    <p>Moun'2 is a cozy room at Mila Guesthouse in Bhaktapur. It has a big bed, a desk, and a shared bathroom. From the balcony, you can see the Himalayas.</p>
                    <p>The space is comfortable and clean, with traditional Newari touches. The shared bathroom has hot water, and there's free Wi-Fi throughout the guesthouse.</p>
                    <button class="btn btn-link text-decoration-underline p-0 fw-bold">Show more</button>
                </div>

                <div class="border-bottom pb-4 mb-4">
                    <h2 class="fs-4 fw-bold mb-3">Where you'll sleep</h2>
                    <div class="border rounded p-4" style="width: 200px;">
                        <div class="mb-3"><i class="bi bi-bed fs-4"></i></div>
                        <h3 class="fs-5 fw-bold">Bedroom</h3>
                        <p>1 queen bed</p>
                    </div>
                </div>

                <div class="border-bottom pb-4 mb-2">
                    <h2 class="fs-4 fw-bold mb-3">What this place offers</h2>
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3"><i class="bi bi-wifi me-3"></i>Wifi</div>
                        <div class="col-md-6 mb-3"><i class="bi bi-laptop me-3"></i>Dedicated workspace</div>
                        <div class="col-md-6 mb-3"><i class="bi bi-p-circle me-3"></i>Free parking on premises</div>
                        <div class="col-md-6 mb-3"><i class="bi bi-snow me-3"></i>Air conditioning</div>
                    </div>
                </div>
            </div>

            <!-- Right column -->
            <div class="col-lg-4">
                <div class="card shadow position-sticky" style="top: 100px;">
                    <div class="card-body">
                        <div class="fs-4 fw-bold mb-2">$85 <span class="fs-6 fw-normal">night</span></div>
                        <div class="mb-4"><i class="bi bi-star-fill"></i> 5.0 · 111 reviews</div>
                        
                        <div class="border rounded mb-3">
                            <div class="row g-0">
                                <div class="col-6 border-end p-3">
                                    <div class="small fw-bold text-uppercase">Check-in</div>
                                    <div class="text-secondary">5/10/2023</div>
                                </div>
                                <div class="col-6 p-3">
                                    <div class="small fw-bold text-uppercase">Checkout</div>
                                    <div class="text-secondary">5/15/2023</div>
                                </div>
                            </div>
                            <div class="border-top p-3 d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="small fw-bold text-uppercase">Guests</div>
                                    <div class="text-secondary">1 guest</div>
                                </div>
                                <i class="bi bi-chevron-down"></i>
                            </div>
                        </div>

                        <button class="btn btn-danger w-100 mb-3">Reserve</button>
                        <p class="text-center text-secondary small mb-4">You won't be charged yet</p>

                        <div class="mb-0">
                            <div class="d-flex justify-content-between mb-2">
                                <div class="text-decoration-underline">$85 x 5 nights</div>
                                <div>$425</div>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <div class="text-decoration-underline">Cleaning fee</div>
                                <div>$20</div>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <div class="text-decoration-underline">Service fee</div>
                                <div>$60</div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between fw-bold">
                                <div>Total before taxes</div>
                                <div>$505</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Reviews Section -->
<<div class="container px-4">
    <h2 class="fs-4 fw-bold mb-4"><i class="bi bi-star-fill"></i> 5.0 · 111 reviews</h2>

    <!-- Individual Review -->
    <div class="mb-4 mx-2">
        <div class="d-flex align-items-center mb-2">
            <img src="https://randomuser.me/api/portraits/women/68.jpg" class="avatar me-3" alt="Reviewer">
            <div>
                <div class="fw-bold">Emily</div>
                <div class="text-secondary small">March 2023</div>
            </div>
        </div>
        <p class="mb-0">Amazing stay! The room was clean, cozy, and the view of the Himalayas was breathtaking. Highly recommended!</p>
    </div>

    <!-- Another Review -->
    <div class="mb-4 mx-2">
        <div class="d-flex align-items-center mb-2">
            <img src="https://randomuser.me/api/portraits/men/44.jpg" class="avatar me-3" alt="Reviewer">
            <div>
                <div class="fw-bold">James</div>
                <div class="text-secondary small">February 2023</div>
            </div>
        </div>
        <p class="mb-0">Friendly host and great location. The guesthouse had everything we needed. Would definitely come back!</p>
    </div>
</div>

</body>
@include('vadama.layouts.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>
@endsection
