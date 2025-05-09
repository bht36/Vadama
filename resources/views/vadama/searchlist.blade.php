@extends('vadama.layouts.header')

@section('content')
<div class="container py-5">

    <!--Stylish Search Bar -->
    <div class="mb-5 d-flex justify-content-center">
        <form method="GET" action="{{ route('searchlist') }}" class="d-flex align-items-center position-relative" style="max-width: 600px; width: 100%;">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-lg border-0 shadow-sm rounded-pill py-3" placeholder="Search properties..." style="padding-left: 20px; padding-right: 60px;">
            <button type="submit" class="btn btn-dark rounded-circle position-absolute" style="width: 48px; height: 48px; right: 6px; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <!-- 📂 Category Tabs -->
    <div class="d-flex justify-content-end mb-4 position-relative">
        <div class="custom-dropdown">
            <button class="btn btn-outline-secondary" id="sortDropdownBtn">Sort by ▼</button>
            <ul class="dropdown-list list-unstyled border shadow-sm bg-white position-absolute end-0 mt-2 d-none" id="sortDropdownMenu" style="z-index: 1000; min-width: 150px;">
                <li><a class="dropdown-item px-3 py-2 text-dark d-block" href="{{ route('housing.list', ['sort' => 'best']) }}">Best</a></li>
                <li><a class="dropdown-item px-3 py-2 text-dark d-block" href="{{ route('housing.list', ['sort' => 'high']) }}">High Budget</a></li>
                <li><a class="dropdown-item px-3 py-2 text-dark d-block" href="{{ route('housing.list', ['sort' => 'low']) }}">Low Budget</a></li>
            </ul>
        </div>
    </div>

    <!-- 📂 Properties Listing -->
    <div class="row g-4">
        @forelse ($properties as $property)
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('housing', ['id' => $property->id]) }}" class="text-decoration-none text-dark">
                <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden hover-shadow transition position-relative">
    <div class="position-relative">
        @php $firstImage = $property->images->first(); @endphp
        <img src="{{ $firstImage ? asset('storage/uploads/properties/images/' . $firstImage->image_path) : asset('images/no-image.jpg') }}"
             class="card-img-top" alt="Property Image" style="height: 240px; object-fit: cover;">
        <span class="position-absolute top-0 start-0 m-3 badge bg-white text-dark shadow-sm px-3 py-2 rounded-pill">Featured</span>
    </div>

    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="card-title fw-semibold mb-0" style="flex: 1;">{{ $property->title }}</h5>
            <p class="text-danger fw-bold mb-0" style="font-weight: 700; margin-left: 10px;">Rs {{ number_format($property->price_per_month) }}/m</p>
        </div>
        <p class="card-text text-muted mb-3">{{ Str::limit($property->description, 80) }}</p>
    </div>

    <!-- 👇 Bottom-right Type Badge -->
    <div class="position-absolute bottom-0 end-0 m-3">
        <span class="badge bg-dark text-white px-3 py-2 rounded-pill" style="text-transform: uppercase;">
            {{ $property->type }}
        </span>
    </div>
</div>

                </a>
            </div>
        @empty
            <div class="col-12 text-center">
                <h5>No properties found for "{{ request('search') }}"</h5>
            </div>
        @endforelse
    </div>
</div>

<style>
    .hover-shadow:hover {
        transform: scale(1.02);
        transition: all 0.2s ease-in-out;
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1) !important;
    }
    
    /* Additional styles for the search bar */
    .form-control:focus {
        box-shadow: none;
        border-color: #ced4da;
        outline: none;
    }
    
    .form-control {
        background-color: #fff;
        transition: all 0.2s ease;
    }
    
    .form-control:focus {
        background-color: #fff;
    }
    
    /* Fix for dropdown menu */
    .custom-dropdown {
        position: relative;
    }
    
    .dropdown-list {
        right: 0;
        top: 100%;
        margin-top: 5px !important;
    }
    
    .dropdown-item:hover {
        background-color: #f8f9fa;
    }
</style>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dropdownBtn = document.getElementById('sortDropdownBtn');
        const dropdownMenu = document.getElementById('sortDropdownMenu');

        dropdownBtn.addEventListener('click', function (e) {
            e.stopPropagation(); // Prevent click bubbling
            dropdownMenu.classList.toggle('d-none');
        });

        document.addEventListener('click', function (e) {
            if (!dropdownMenu.classList.contains('d-none')) {
                dropdownMenu.classList.add('d-none');
            }
        });
    });
</script>

@include('vadama.layouts.footer')

@endsection