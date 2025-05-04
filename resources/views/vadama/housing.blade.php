@extends('vadama.layouts.header')
@section('content')
<div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</div>
<div class="container py-4">
    <!-- Image gallery -->
    <div class="row g-1 mb-5 position-relative">
        <div class="col-md-6">
            @if($property->images->isNotEmpty())
                <img src="{{ asset('storage/uploads/properties/images/' . $property->images[0]->image_path) }}" 
                    alt="Main" class="img-fluid rounded main-img h-140 w-100" style="height: 410px;">
            @else
                <img src="{{ asset('default-placeholder.jpg') }}" 
                    alt="No Image" class="img-fluid rounded main-img h-140 w-100" style="height: 410px;">
            @endif
        </div>
    
        <div class="col-md-6">
            <div class="row g-2">
                @foreach($property->images->skip(1)->take(4) as $image)
                    <div class="col-6">
                        <img src="{{ asset('storage/uploads/properties/images/' . $image->image_path) }}" 
                            class="image w-100" alt="Property Image" 
                            style="height: 200px; object-fit: cover; border-radius: 10px;">
                    </div>
                @endforeach
            </div>
    
            <button class="btn btn-light position-absolute bottom-0 end-0 me-3 mb-3 d-flex align-items-center gap-2 shadow-sm"
                style="border-radius: 8px; font-size: 14px; font-weight: 600;">
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
                    <h2 class="fs-4 fw-bold">{{$property->title}}</h2>
                    <div class="text-secondary">{{$property->guest}} guests · {{$property->bedroom}} bedroom · {{$property->bed}} bed · {{$property->bathroom}} shared bath</div>
                </div>
            </div>

            <div class="border-bottom pb-4 mb-4">
                {{$property->highlights}}
            </div>

            <div class="border-bottom pb-4 mb-4">
                <h2 class="fs-4 fw-bold mb-3">About this place</h2>
                <p>{{$property->description}}</p>
                <button class="btn btn-link text-decoration-underline p-0 fw-bold">Show more</button>
            </div>
            <h2 class="fs-4 fw-bold mb-3">What this place offers</h2>
            <div class="row mb-3">
                @foreach($amenitiesList as $amenity)
                    @if(in_array($amenity['id'], $selectedAmenities))
                        <div class="col-md-6 mb-3">
                            <i class="bi {{ $amenity['icon'] }} me-3"></i>{{ $amenity['label'] }}
                        </div>
                    @endif
                @endforeach
            </div>
            
            
        </div>

        <!-- Right column -->
        <div class="col-lg-4">
            <div class="card shadow position-sticky" style="top: 100px;">
                <div class="card-body">
                    <div class="fs-4 fw-bold mb-2">रु85 <span class="fs-6 fw-normal">night</span></div>
                    <div class="mb-4"><i class="bi bi-star-fill"></i> 5.0 · 111 reviews</div>
                    
                    <div class="border rounded mb-3">
                        <div class="row g-0">
                            <div class="col-6 border-end p-3">
                                <div class="small fw-bold text-uppercase">Check-in</div>
                                <div class="text-secondary">
                                    <input type="date" id="check-in" value="2023-05-10" style="border: none; color: #6c757d; font-size: 14px; width: 100%; outline: none; padding: 2px 0;">
                                </div>
                            </div>
                            <div class="col-6 p-3">
                                <div class="small fw-bold text-uppercase">Checkout</div>
                                <div class="text-secondary">
                                    <input type="date" id="check-out" value="2023-05-15" style="border: none; color: #6c757d; font-size: 14px; width: 100%; outline: none; padding: 2px 0;">
                                </div>
                            </div>
                        </div>
                        <div class="border-top p-3 d-flex justify-content-between align-items-center" id="guest-selector" style="cursor: pointer;">
                            <div>
                                <div class="small fw-bold text-uppercase">Guests</div>
                                <div class="text-secondary"><span id="guest-count">1</span> <span id="guest-text">guest</span></div>
                            </div>
                            <div id="toggle-dropdown" style="border: solid #000; border-width: 0 2px 2px 0; display: inline-block; padding: 3px; transform: rotate(45deg); transition: transform 0.3s;"></div>
                        </div>
                        <div id="guest-dropdown" style="display: none; padding: 15px; border-top: 1px solid #dee2e6;">
                            <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 10px;">
                                <button id="decrease-guests" disabled style="width: 30px; height: 30px; border: 1px solid #dee2e6; background: white; border-radius: 4px; cursor: pointer; font-size: 16px;">-</button>
                                <span id="guest-display" style="margin: 0 10px;">1</span>
                                <button id="increase-guests" style="width: 30px; height: 30px; border: 1px solid #dee2e6; background: white; border-radius: 4px; cursor: pointer; font-size: 16px;">+</button>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-danger w-100 mb-3">Reserve</button>
                    <p class="text-center text-secondary small mb-4">You won't be charged yet</p>

                    <div class="mb-0">
                        <div class="d-flex justify-content-between mb-2">
                            <div class="text-decoration-underline">$85 x 5 nights</div>
                            <div>रु425</div>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <div class="text-decoration-underline">Cleaning fee</div>
                            <div>रु20</div>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <div class="text-decoration-underline">Service fee</div>
                            <div>रु60</div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between fw-bold">
                            <div>Total before taxes</div>
                            <div>रु505</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Reviews Section -->
<div class="container px-4">
    <h2 class="fs-4 fw-bold mb-4"><i class="bi bi-star-fill"></i> 5.0 · 111 reviews</h2>

    <!-- Individual Review -->
    <div class="mb-4 mx-2">
        <div class="d-flex align-items-center mb-2">
            <img src="https://randomuser.me/api/portraits/women/68.jpg" class="avatar me-3" alt="Reviewer" style="width: 40px; height: 40px; border-radius: 50%;">
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
            <img src="https://randomuser.me/api/portraits/men/44.jpg" class="avatar me-3" alt="Reviewer" style="width: 40px; height: 40px; border-radius: 50%;">
            <div>
                <div class="fw-bold">James</div>
                <div class="text-secondary small">February 2023</div>
            </div>
        </div>
        <p class="mb-0">Friendly host and great location. The guesthouse had everything we needed. Would definitely come back!</p>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const checkInInput = document.getElementById('check-in');
    const checkOutInput = document.getElementById('check-out');
    const guestSelector = document.getElementById('guest-selector');
    const guestDropdown = document.getElementById('guest-dropdown');
    const toggleDropdown = document.getElementById('toggle-dropdown');
    const decreaseBtn = document.getElementById('decrease-guests');
    const increaseBtn = document.getElementById('increase-guests');
    const guestDisplay = document.getElementById('guest-display');
    const guestCount = document.getElementById('guest-count');
    const guestText = document.getElementById('guest-text');
    
    // Initial guest count
    let guests = 1;
    
    // Toggle dropdown for guest selection
    guestSelector.addEventListener('click', function() {
        if (guestDropdown.style.display === 'none' || guestDropdown.style.display === '') {
            guestDropdown.style.display = 'block';
            toggleDropdown.style.transform = 'rotate(-135deg)';
        } else {
            guestDropdown.style.display = 'none';
            toggleDropdown.style.transform = 'rotate(45deg)';
        }
    });
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        if (!guestSelector.contains(event.target) && !guestDropdown.contains(event.target)) {
            guestDropdown.style.display = 'none';
            toggleDropdown.style.transform = 'rotate(45deg)';
        }
    });
    
    // Increase guests
    increaseBtn.addEventListener('click', function() {
        guests++;
        updateGuestDisplay();
    });
    
    // Decrease guests
    decreaseBtn.addEventListener('click', function() {
        if (guests > 1) {
            guests--;
            updateGuestDisplay();
        }
    });
    
    // Update guest display
    function updateGuestDisplay() {
        guestDisplay.textContent = guests;
        guestCount.textContent = guests;
        guestText.textContent = guests === 1 ? 'guest' : 'guests';
        decreaseBtn.disabled = guests <= 1;
    }
    
    // Ensure checkout date is after check-in date
    checkInInput.addEventListener('change', function() {
        const checkInDate = new Date(this.value);
        const checkOutDate = new Date(checkOutInput.value);
        
        if (checkOutDate <= checkInDate) {
            // Set checkout to day after check-in
            const nextDay = new Date(checkInDate);
            nextDay.setDate(nextDay.getDate() + 1);
            
            // Format date as YYYY-MM-DD
            const year = nextDay.getFullYear();
            const month = String(nextDay.getMonth() + 1).padStart(2, '0');
            const day = String(nextDay.getDate()).padStart(2, '0');
            
            checkOutInput.value = `${year}-${month}-${day}`;
        }
    });
    
    // Show all photos button functionality
    const showPhotosBtn = document.querySelector('.btn-light');
    if (showPhotosBtn) {
        showPhotosBtn.addEventListener('click', function() {
            alert('Photo gallery would open here');
            // In a real implementation, this would open a modal or navigate to a gallery page
        });
    }
});
</script>
@include('vadama.layouts.footer')
@endsection