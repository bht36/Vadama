@extends('vadama.layouts.header')

@section('content')
<div class="container py-5">

    <!-- 🔍 Stylish Search Bar -->
    <div class="mb-5 d-flex justify-content-center">
        <form method="GET" action="{{ route('searchlist') }}" class="input-group" style="max-width: 600px;">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-lg rounded-start-pill shadow-sm mr-3" placeholder="Search properties...">
            <button type="submit" class="btn btn-dark rounded-end-pill px-4">Search</button>
        </form>
    </div>


    <!-- 📂 Category Tabs -->
    <ul class="nav nav-pills justify-content-center mb-5 gap-2">
        <li class="nav-item">
            <a class="nav-link active rounded-pill px-4 py-2" href="#">All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-pill px-4 py-2 text-dark bg-light" href="#">Apartments</a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-pill px-4 py-2 text-dark bg-light" href="#">Studios</a>
        </li>
        <li class="nav-item">
            <a class="nav-link rounded-pill px-4 py-2 text-dark bg-light" href="#">Cottages</a>
        </li>
    </ul>
    <!-- 📂 Properties Listing -->
    <div class="row g-4">
        @forelse ($properties as $property)
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('housing', ['id' => $property->id]) }}" class="text-decoration-none text-dark">
                    <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden hover-shadow transition">
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
                          <div class="d-flex justify-content-between align-items-center mb-3">
                          <h7 class="card-title fw-semibold mb-0" style="flex: 1; text-transform: uppercase;">{{ $property->type }}</h7>
                          </div>
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
</style>

</div>
<style>
    .hover-shadow:hover {
        transform: scale(1.02);
        transition: all 0.2s ease-in-out;
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1) !important;
    }
</style>
@include('vadama.layouts.footer')

@endsection
