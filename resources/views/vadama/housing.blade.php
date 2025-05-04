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
                <button class="btn btn-link text-decoration-underline p-0 fw-bold">Show more <i class="bi bi-chevron-down ms-1"></i></button>
            </div>

            <h2 class="h4 fw-bold mb-3">What this place offers</h2>
            <div class="row mb-3">
                @foreach($amenitiesList as $amenity)
                    @if(in_array($amenity['id'], $selectedAmenities))
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="bi {{ $amenity['icon'] }} me-3 text-primary"></i> 
                                <span class="text-muted">{{ $amenity['label'] }}</span>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Right column -->
        <div class="col-lg-4">
            <div class="card booking-card position-sticky" style="top: 20px;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-end mb-3">
                        <div>
                            <div class="h3 fw-bold">रु{{number_format($property->price_per_month)}}</div>
                            <div class="text-muted">Per month</div>
                        </div>
                        <div class="badge bg-warning text-dark">
                            <i class="bi bi-star-fill me-1"></i> 5.0 · 111 reviews
                        </div>
                    </div>
                    
                    <div class="border rounded-3 mb-4 overflow-hidden">
                        <!-- Duration Selector -->
                        <div class="p-3 bg-light">
                            <label for="month-count" class="form-label fw-bold text-uppercase small text-dark mb-2">Select Duration</label>
                            <select id="month-count" class="form-select shadow-none">
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
                                    <input type="date" id="check-in" value="{{ date('Y-m-d') }}" class="form-control border-0 shadow-none px-0" />
                                </div>
                                <div class="col-6 p-3">
                                    <div class="small fw-bold text-muted mb-1">Check-out</div>
                                    <input type="date" id="check-out" class="form-control border-0 shadow-none px-0" readonly />
                                </div>
                            </div>
                        </div>
                        
                        <!-- Guest Selector -->
                        <div class="border-top p-3" id="guest-selector">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="small fw-bold text-muted">Guests</div>
                                    <div class="text-dark"><span id="guest-count">1</span> <span id="guest-text">guest</span></div>
                                </div>
                                <i class="bi bi-chevron-down" id="toggle-dropdown"></i>
                            </div>
                        </div>
                        <div class="border-top p-3" id="guest-dropdown" style="display: none;">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="fw-bold">Guests</div>
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-outline-secondary me-2" id="decrease-guests" disabled>
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <span id="guest-display" class="fw-bold mx-2">1</span>
                                    <button class="btn btn-outline-secondary ms-2" id="increase-guests">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-danger w-100 mb-3 py-2 fw-bold">
                        Reserve Now
                    </button>
                    <p class="text-center text-muted small mb-4">You won't be charged yet</p>

                    <div class="bg-light p-3 rounded">
                        <div class="d-flex justify-content-between mb-2">
                            <div class="text-muted">रु{{number_format($property->price_per_month)}} x <span id="duration-text">1</span> month</div>
                            <div>रु<span id="base-price">{{number_format($property->price_per_month)}}</span></div>
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
                            <div class="text-danger">रु<span id="total-price">{{number_format($property->price_per_month + 500)}}</span></div>
                        </div>
                    </div>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Elements
        const checkInInput = document.getElementById('check-in');
        const checkOutInput = document.getElementById('check-out');
        const monthCountSelect = document.getElementById('month-count');
        const guestSelector = document.getElementById('guest-selector');
        const guestDropdown = document.getElementById('guest-dropdown');
        const toggleDropdown = document.getElementById('toggle-dropdown');
        const decreaseBtn = document.getElementById('decrease-guests');
        const increaseBtn = document.getElementById('increase-guests');
        const guestDisplay = document.getElementById('guest-display');
        const guestCount = document.getElementById('guest-count');
        const guestText = document.getElementById('guest-text');
        const durationText = document.getElementById('duration-text');
        const basePrice = document.getElementById('base-price');
        const totalPrice = document.getElementById('total-price');
        const reserveBtn = document.querySelector('.btn-danger');
        const showPhotosBtn = document.querySelector('.show-photos-btn');
        const maxGuests = {{$property->guest}};

        

        
        // Initial values
        let guests = 1;
        const pricePerMonth = {{$property->price_per_month}};
        const cleaningFee = 200;
        const serviceFee = 300;
        
        function updateCheckoutDate() {
            const checkInDate = new Date(checkInInput.value);
            const monthsToAdd = parseInt(monthCountSelect.value);
            
            if (!isNaN(checkInDate.getTime())) {
                const checkOutDate = new Date(checkInDate);
                checkOutDate.setMonth(checkOutDate.getMonth() + monthsToAdd);
                checkOutInput.value = checkOutDate.toISOString().split('T')[0];
                updatePricing(monthsToAdd, guests);
            }
        }
        



        function updatePricing(months, guestsCount) {
            const base = pricePerMonth * months * guestsCount;
            const total = base + cleaningFee + serviceFee;
            
            durationText.textContent = months;
            basePrice.textContent = base.toLocaleString();
            totalPrice.textContent = total.toLocaleString();
        }
    
        // Dropdown toggle
        guestSelector.addEventListener('click', function(e) {
            e.stopPropagation();
            const isVisible = guestDropdown.style.display === 'block';
            guestDropdown.style.display = isVisible ? 'none' : 'block';
            toggleDropdown.classList.toggle('bi-chevron-down', isVisible);
            toggleDropdown.classList.toggle('bi-chevron-up', !isVisible);
        });
    
        document.addEventListener('click', function() {
            guestDropdown.style.display = 'none';
            toggleDropdown.classList.add('bi-chevron-down');
            toggleDropdown.classList.remove('bi-chevron-up');
        });
    
        guestDropdown.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    
        increaseBtn.addEventListener('click', function() {
            guests = guests + 1;
            updateGuestDisplay();
            updateCheckoutDate();
        });
    
        decreaseBtn.addEventListener('click', function() {
            if (guests > 1) {
                guests = guests - 1;
                updateGuestDisplay();
                updateCheckoutDate();
            }
        });
    
        // function updateGuestDisplay() {
        //     document.getElementById('guest-summary').textContent = guests;
        //     guestDisplay.textContent = guests;
        //     guestCount.textContent = guests;
        //     guestText.textContent = guests === 1 ? 'guest' : 'guests';
        //     decreaseBtn.disabled = guests <= 1;
        // }

        function updateGuestDisplay() {
            document.getElementById('guest-summary').textContent = guests;
            guestDisplay.textContent = guests;
            guestCount.textContent = guests;
            guestText.textContent = guests === 1 ? 'guest' : 'guests';
            
            decreaseBtn.disabled = guests <= 1;
            increaseBtn.disabled = guests >= maxGuests;
        }

        increaseBtn.addEventListener('click', function() {
            if (guests < maxGuests) {
                guests = guests + 1;
                updateGuestDisplay();
                updateCheckoutDate();
            }
        });

        reserveBtn.addEventListener('click', function() {
            const checkInDate = checkInInput.value;
            const checkOutDate = checkOutInput.value;
            const duration = parseInt(monthCountSelect.value);
    
            if (!checkInDate || !checkOutDate) {
                alert('Please select check-in and check-out dates');
                return;
            }
    
            const total = (pricePerMonth * duration * guests) + cleaningFee + serviceFee;
    
            const bookingData = {
                property_id: {{$property->id}},
                check_in: checkInDate,
                check_out: checkOutDate,
                duration: duration,
                guests: guests,
                total_price: total
            };
    
            console.log('Booking data:', bookingData);
            alert('Reservation request sent!');
        });
    
        if (showPhotosBtn) {
            showPhotosBtn.addEventListener('click', function() {
                console.log('Show all photos clicked');
            });
        }
    
        // Initialize on load
        updateGuestDisplay();
        updatePricing(1, guests);
        updateCheckoutDate();
        checkInInput.addEventListener('change', updateCheckoutDate);
        monthCountSelect.addEventListener('change', function() {
            updateCheckoutDate();
        });
    });
    </script>
    

@include('vadama.layouts.footer')
@endsection