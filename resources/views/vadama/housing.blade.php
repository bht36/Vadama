@extends('vadama.layouts.header')
@section('content')
<div>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        .booking-card {
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            border: none;
        }
        .main-img {
            height: 410px;
            object-fit: cover;
        }
        .gallery-img {
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }
        .show-photos-btn {
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            background-color: white;
        }
        .custom-select {
                                border-radius: 25px; /* Rounded corners */
                                padding: 1px 15px; /* Add some padding for better spacing */
                                font-size: 16px; /* Larger text */
                                background-color: #f9f9f9; /* Light background */
                                border: 1px solid #ddd; /* Subtle border */
                                transition: all 0.3s ease; /* Smooth transition on focus */
                            }
                        
                            .custom-select:focus {
                                outline: none; /* Remove default outline */
                                border-color: #79090f; /* Red border on focus */
                                box-shadow: 0 0 5px rgba(121, 9, 15, 0.4); /* Subtle shadow effect */
                            }
                        
                            .custom-select option {
                                padding: 10px; /* Add padding for option text */
                            }
                            .form-control {
        border-radius: 25px; /* Rounded corners for inputs */
        background-color: #f9f9f9; /* Light background */
        border: 1px solid #ddd; /* Subtle border */
    }
        
    </style>
</div>

<div class="container py-4">
    <!-- Image gallery -->
    <div class="row g-3 mb-5 position-relative">
        <div class="col-md-6">
            @if($property->images->isNotEmpty())
                <img src="{{ asset('storage/uploads/properties/images/' . $property->images[0]->image_path) }}" 
                    alt="Main" class="img-fluid rounded main-img w-100">
            @else
                <img src="{{ asset('default-placeholder.jpg') }}" 
                    alt="No Image" class="img-fluid rounded main-img w-100">
            @endif
        </div>
    
        <div class="col-md-6">
            <div class="row g-2">
                @foreach($property->images->skip(1)->take(4) as $image)
                    <div class="col-6">
                        <img src="{{ asset('storage/uploads/properties/images/' . $image->image_path) }}" 
                            class="img-fluid w-100 gallery-img" alt="Property Image">
                    </div>
                @endforeach
            </div>
    
            <button class="btn btn-light position-absolute bottom-0 end-0 me-3 mb-3 d-flex align-items-center gap-2 shadow-sm show-photos-btn">
                <i class="bi bi-grid-3x3-gap-fill"></i>
                Show all photos
            </button>
        </div>
    </div>

    <div class="row">
        <!-- Left column -->
        <div class="col-lg-8">
            <div class="d-flex justify-content-between border-bottom pb-4 mb-4">
                <div>
                    <h1 class="h2 fw-bold mb-2">{{$property->title}}</h1>
                    <div class="text-muted">
                        <i class="bi bi-people-fill me-1"></i> {{$property->guest}} guests · 
                        <i class="bi bi-door-closed-fill ms-2 me-1"></i> {{$property->bedroom}} bedroom · 
                        <i class="bi bi-lamp-fill ms-2 me-1"></i> {{$property->bed}} bed · 
                        <i class="bi bi-droplet-fill ms-2 me-1"></i> {{ $property->bathroom }} bath
                    </div>
                </div>
            </div>

            <div class="border-bottom pb-4 mb-4">
                <div class="fs-5 fw-bold mb-3">{{$property->highlights}}</div>
            </div>

            <div class="border-bottom pb-4 mb-4">
                <h2 class="h4 fw-bold mb-3">About this place</h2>
                <p class="text-muted">{{$property->description}}</p>
                <button class="btn btn-link text-decoration-underline p-0 fw-bold" style="color: #79090f;">
                    Show more <i class="bi bi-chevron-down ms-1"></i>
                </button>
                
            </div>

            <h2 class="h4 fw-bold mb-3">What this place offers</h2>
            <div class="row mb-3">
                @foreach($amenitiesList as $amenity)
                    @if(in_array($amenity['id'], $selectedAmenities))
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="bi {{ $amenity['icon'] }}   me-3 mr-3" style="color: #79090f;"></i>
                                <span class="text-muted ">{{ $amenity['label'] }}</span>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <h5 class="mt-4 mb-3 fw-bold">Location</h5>
            {!! $property->location !!}
            <h5 class="mt-4 mb-3 fw-bold">Location</h5>
            <iframe 
                src="https://www.google.com/maps?q={{ urlencode($property->location) }}&output=embed"
                width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
            <h5 class="mt-4 mb-3 fw-bold">Location</h5>
            <div class="google-map-container">
                {!! $property->location !!}
            </div>

        </div>

        <!-- Right column -->
        <div class="col-lg-4">
            <div class="card booking-card position-sticky" style="top: 20px;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-end mb-3">
                        <div>
                            <div class="h3 fw-bold">रु{{ number_format($property->price_per_month) }}</div>
                            <div class="text-muted">Per month</div>
                        </div>
                        <div class="badge bg-warning text-dark">
                            <i class="bi bi-star-fill me-1"></i> 5.0 · 111 reviews
                        </div>
                    </div>
                    <!-- Always show the form (for both logged-in and guest users) -->
                    <form id="rental-request-form" method="POST" action="{{ route('rental-requests.store') }}">
                        @csrf
                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                        
                        <!-- Form fields (same as before) -->
                        <div class="border rounded-3 mb-4 overflow-hidden">
                            <!-- Duration Selector -->
                            <div class="p-3 bg-light">
                                <label for="month-count" class="form-label fw-bold text-uppercase small text-dark mb-2">Select Duration</label>
                                <select id="month-count" name="duration" class="form-select custom-select shadow-none">
                                    <option value="1">1 Month</option>
                                    <option value="2">2 Months</option>
                                    <option value="3">3 Months</option>
                                    <option value="4">4 Months</option>
                                    <option value="6">6 Months</option>
                                    <option value="12">12 Months</option>
                                </select>
                            </div>
                            
                            <!-- Date Selection -->
                            <div class="card mb-0 border-0 rounded-0">
                                <div class="row g-0">
                                    <div class="col-6 border-end p-3">
                                        <div class="small fw-bold text-muted mb-1">Check-in</div>
                                        <input type="date" id="check-in" name="check_in" value="{{ date('Y-m-d') }}" 
                                            class="form-control custom-date-input border-0 shadow-none" required />
                                    </div>
                                    <div class="col-6 p-3">
                                        <div class="small fw-bold text-muted mb-1" style="margin-right: 10px;">Check-out</div>
                                        <input type="date" id="check-out" name="check_out" 
                                            class="form-control custom-date-input-right border-0 shadow-none" readonly required />
                                    </div>
                                </div>
                            </div>
                            
                                        <!-- Guest Selector -->
                <div class="border-top p-3 guest-selector" id="guest-selector" style="cursor: pointer;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="small fw-bold text-muted">Guests</div>
                            <div class="text-dark">
                                <span id="guest-display-main">1</span>
                                <span id="guest-text">guest</span>
                            </div>
                            <input type="hidden" id="guest-input" name="guests" value="1">
                        </div>
                        <i class="bi bi-chevron-down" id="toggle-dropdown"></i>
                    </div>
                </div>

                <!-- Guest Dropdown -->
                <div class="border-top p-3" id="guest-dropdown" style="display: none;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="fw-bold">Guests</div>
                        <div class="d-flex align-items-center">
                            <button type="button" class="btn btn-outline-secondary me-2" id="decrease-guests" disabled>
                                <i class="bi bi-dash"></i>
                            </button>
                            <span id="guest-count" class="fw-bold mx-2">1</span>
                            <button type="button" class="btn btn-outline-secondary ms-2" id="increase-guests">
                                <i class="bi bi-plus"></i>
                            </button>
        </div>
    </div>
</div>


                        <!-- <input type="hidden" id="total-price-input" name="total_price" value="{{ $property->price_per_month + 500 }}"> -->

                        <!-- Modified Reserve Button with click handler -->
                        <button type="button" class="btn btn-danger w-100 mb-3 py-2 fw-bold" id="reserve-btn">
                            Reserve Now
                        </button>
                        <p class="text-center text-muted small mb-4">You won't be charged yet</p>

                        <div class="bg-light p-3 rounded">
                            <!-- Pricing summary (same as before) -->
                            <div class="d-flex justify-content-between mb-2">
                                <div class="text-muted">रु{{ number_format($property->price_per_month) }} x <span id="duration-text">1</span> month</div>
                                <div>रु<span id="base-price">{{ number_format($property->price_per_month) }}</span></div>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <div class="text-muted">Cleaning fee</div>
                                <div>रु200</div>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <div class="text-muted">Service fee</div>
                                <div>रु300</div>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <div class="text-muted">Guests</div>
                                <div><span id="guest-summary">1</span></div>
                            </div>
                            <hr class="my-3">
                            <div class="d-flex justify-content-between fw-bold">
                                <div>Total before taxes</div>
                                <div class="text-danger">रु<span id="total-price">{{ number_format($property->price_per_month + 500) }}</span></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>

<!-- Reviews Section -->
<div class="container px-4 mt-5">
    <h2 class="h4 fw-bold mb-4"><i class="bi bi-star-fill text-warning"></i> 5.0 · 111 reviews</h2>

    <!-- Individual Review -->
    <div class="mb-4 pb-3 border-bottom">
        <div class="d-flex align-items-center mb-2">
            <img src="https://randomuser.me/api/portraits/women/68.jpg" class="rounded-circle me-3" width="48" height="48" alt="Reviewer">
            <div>
                <div class="fw-bold">Emily</div>
                <div class="text-muted small">March 2023</div>
            </div>
        </div>
        <p class="mb-0">Amazing stay! The room was clean, cozy, and the view of the Himalayas was breathtaking. Highly recommended!</p>
    </div>

    <!-- Another Review -->
    <div class="mb-4 pb-3 border-bottom">
        <div class="d-flex align-items-center mb-2">
            <img src="https://randomuser.me/api/portraits/men/44.jpg" class="rounded-circle me-3" width="48" height="48" alt="Reviewer">
            <div>
                <div class="fw-bold">James</div>
                <div class="text-muted small">February 2023</div>
            </div>
        </div>
        <p class="mb-0">Friendly host and great location. The guesthouse had everything we needed. Would definitely come back!</p>
    </div>
    
    <button class="btn btn-outline-dark rounded-pill px-4 mt-2">
        Show all reviews <i class="bi bi-arrow-right ms-2"></i>
    </button>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-4">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title" id="successModalLabel">Reservation Successful</h5>
          <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close" disabled id="headerCloseBtn"></button>
        </div>
        <div class="modal-body text-center">
          <i class="bi bi-check-circle-fill display-4 text-success mb-3"></i>
          <p class="fw-bold">Your reservation has been placed successfully!</p>
        </div>
        <div class="modal-footer">
          <button id="closeModalBtn" type="button" class="btn btn-outline-success" data-bs-dismiss="modal" disabled>Close</button>
        </div>
      </div>
    </div>
  </div>

  @if(session('error'))
<script>
  window.addEventListener('DOMContentLoaded', function () {
    var errorModal = new bootstrap.Modal(document.getElementById('errorModal'), {
      keyboard: false,
      backdrop: 'static'
    });

    document.getElementById("errorCloseModalBtn").disabled = true;
    document.getElementById("errorHeaderCloseBtn").disabled = true;

    errorModal.show();

    setTimeout(function () {
      document.getElementById("errorCloseModalBtn").disabled = false;
      document.getElementById("errorHeaderCloseBtn").disabled = false;
      errorModal.hide(); // Optional: remove this if you want manual close only
    }, 3000);
  });
</script>
@endif


<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="errorModalLabel">Reservation Error</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close" disabled id="errorHeaderCloseBtn"></button>
      </div>
      <div class="modal-body text-center">
        <i class="bi bi-x-circle-fill display-4 text-danger mb-3"></i>
        <p class="fw-bold">{{ session('error') }}</p>
      </div>
      <div class="modal-footer">
        <button id="errorCloseModalBtn" type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" disabled>Close</button>
      </div>
    </div>
  </div>
</div>


  <!-- Script -->
  @if(session('success'))
<script>
    window.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.getElementById('successModal'), {
            keyboard: false,
            backdrop: 'static'
        });

        // Disable close buttons initially
        document.getElementById("closeModalBtn").disabled = true;
        document.getElementById("headerCloseBtn").disabled = true;

        // Show modal
        myModal.show();

        // Enable buttons and optionally hide modal after 7 seconds
        setTimeout(function () {
            document.getElementById("closeModalBtn").disabled = false;
            document.getElementById("headerCloseBtn").disabled = false;
            myModal.hide(); // Optional
        }, 3000);
    });
</script>
@endif


<script>
document.addEventListener("DOMContentLoaded", function () {
    let guestCount = 1;
    const maxGuests = {{ $property->guest }}; // Get max number of guests from the database
    let duration = 1; // Default duration is 1 month

    const basePrice = {{ $property->price_per_month }}; // The price per month from your property data
    const cleaningFee = 200; // Fixed cleaning fee
    const serviceFee = 300;  // Fixed service fee

    const guestCountSpan = document.getElementById("guest-count");
    const guestDisplayMain = document.getElementById("guest-display-main");
    const guestText = document.getElementById("guest-text");
    const guestInput = document.getElementById("guest-input");
    const decreaseBtn = document.getElementById("decrease-guests");
    const increaseBtn = document.getElementById("increase-guests");
    const totalPrice = document.getElementById("total-price");
    const guestSummary = document.getElementById("guest-summary");
    const monthCountSelect = document.getElementById("month-count");
    const durationText = document.getElementById("duration-text");
    const basePriceElement = document.getElementById("base-price");

    // Event listeners for guest count
    increaseBtn.addEventListener("click", function () {
        if (guestCount < maxGuests) {
            guestCount++;
            updateGuestDisplay();
            updateTotalPrice();
        }
    });

    decreaseBtn.addEventListener("click", function () {
        if (guestCount > 1) {
            guestCount--;
            updateGuestDisplay();
            updateTotalPrice();
        }
    });

    // Event listener for duration (month count) change
    monthCountSelect.addEventListener("change", function () {
        duration = parseInt(monthCountSelect.value);
        updatePricingSummary();
        updateTotalPrice();
    });

    function updateGuestDisplay() {
        guestCountSpan.textContent = guestCount;
        guestDisplayMain.textContent = guestCount;
        guestInput.value = guestCount;
        guestText.textContent = guestCount === 1 ? "guest" : "guests";
        decreaseBtn.disabled = guestCount === 1;
    }

    function updatePricingSummary() {
        // Update duration text and base price
        durationText.textContent = duration;
        basePriceElement.textContent = basePrice * duration; // Show price per month * duration as base price
    }

    function updateTotalPrice() {
        // Calculate the total price based on guest count and selected duration
        const total = (basePrice * guestCount * duration) + cleaningFee + serviceFee;
        
        // Update the total price display
        totalPrice.textContent = total;

        // Update the guest summary in the pricing section
        guestSummary.textContent = guestCount;

        // Update the base price display for each month
        basePriceElement.textContent = basePrice * duration;
    }

    // Toggle dropdown
    document.getElementById("guest-selector").addEventListener("click", function () {
        const dropdown = document.getElementById("guest-dropdown");
        dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
    });

    // Initial price update
    updatePricingSummary();
    updateTotalPrice();
});

</script>


    

@include('vadama.layouts.footer')
@endsection