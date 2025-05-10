@extends('vadama.layouts.header')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<style>
    .image-preview {
        position: relative;
        height: 160px;
        border-radius: 0.375rem;
        overflow: hidden;
    }
    .image-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .image-preview .remove-btn {
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        background-color: rgba(220, 53, 69, 0.9);
        color: white;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        opacity: 0;
        transition: opacity 0.2s;
    }
    .image-preview:hover .remove-btn {
        opacity: 1;
    }
</style>

<div class="container py-4">
    <h2 class="text-center mb-4">Edit Room Listing</h2>
    <form method="POST" action="{{ route('property_update', $property->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="mb-3">
            <label for="title" class="form-label">Listing Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $property->title) }}" required>
        </div>

        <!-- Location -->
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $property->location) }}" required>
        </div>

        <!-- Price and Type -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="price" class="form-label">Price per Night (रु)</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $property->price_per_month) }}" required>
            </div>
            <div class="col-md-6">
                <label for="property_type" class="form-label">Property Type</label>
                <select class="form-select" name="property_type" required>
                    <option value="">Select property type</option>
                    <option value="room" {{ $property->type == 'room' ? 'selected' : '' }}>Room in a home</option>
                    <option value="apartment" {{ $property->type == 'apartment' ? 'selected' : '' }}>Apartment</option>
                    <option value="house" {{ $property->type == 'house' ? 'selected' : '' }}>Entire house</option>
                </select>
            </div>
        </div>

        <!-- Guests, Beds, etc. -->
        <div class="row mb-3">
            <div class="col-md-3">
                <label class="form-label">Guests</label>
                <select class="form-select" name="guests">
                    @for($i = 1; $i <= 8; $i++)
                        <option value="{{ $i }}" {{ $property->guests == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Bedrooms</label>
                <select class="form-select" name="bedrooms">
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ $property->bedrooms == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Beds</label>
                <select class="form-select" name="beds">
                    @for($i = 1; $i <= 6; $i++)
                        <option value="{{ $i }}" {{ $property->beds == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Bathrooms</label>
                <select class="form-select" name="baths">
                    @for($i = 1; $i <= 4; $i++)
                        <option value="{{ $i }}" {{ $property->baths == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <!-- Highlights -->
        <div class="mb-3">
            <label class="form-label">Highlights</label>
            <textarea class="form-control" name="highlights" rows="3">{{ old('highlights', $property->key_points) }}</textarea>
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="4">{{ old('description', $property->description) }}</textarea>
        </div>

        <!-- Upload New Images -->
        <div class="mb-3">
            <label class="form-label">Upload New Images</label>
            <input type="file" name="images[]" multiple accept="image/*" class="form-control">
        </div>

        <!-- Amenities -->
        <h4 class="mt-4 mb-2">Amenities</h4>
        @php
            $amenitiesList = [
                ['id' => 'wifi', 'icon' => 'bi-wifi', 'label' => 'Wifi'],
                ['id' => 'workspace', 'icon' => 'bi-laptop', 'label' => 'Dedicated workspace'],
                ['id' => 'parking', 'icon' => 'bi-p-circle', 'label' => 'Free parking'],
                ['id' => 'ac', 'icon' => 'bi-snow', 'label' => 'Air conditioning'],
                ['id' => 'kitchen', 'icon' => 'bi-cup-hot', 'label' => 'Kitchen'],
                ['id' => 'washer', 'icon' => 'bi-water', 'label' => 'Washer'],
                ['id' => 'tv', 'icon' => 'bi-tv', 'label' => 'TV'],
                ['id' => 'heating', 'icon' => 'bi-thermometer-half', 'label' => 'Heating'],
            ];
            $existingAmenities = is_array($property->amenities) ? $property->amenities : explode(',', $property->amenities);
        @endphp
        <div class="row">
            @foreach($amenitiesList as $amenity)
                <div class="col-md-4 mb-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="amenities[]" value="{{ $amenity['id'] }}"
                            {{ in_array($amenity['id'], $existingAmenities) ? 'checked' : '' }}>
                        <label class="form-check-label">
                            <i class="bi {{ $amenity['icon'] }} me-2"></i>{{ $amenity['label'] }}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-end mt-4">
            <button type="submit" class="btn btn-success">Update Listing</button>
        </div>
    </form>
</div>
@endsection
