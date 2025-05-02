@extends('vadama.layouts.header')

@section('content')
<div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</div>

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
    .upload-container {
        border: 2px dashed #dee2e6;
        border-radius: 0.375rem;
        padding: 2rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s;
    }
    .upload-container:hover {
        border-color: #adb5bd;
        background-color: #f8f9fa;
    }
    .section-title {
        margin-top: 2rem;
        margin-bottom: 1.5rem;
        padding-bottom: 0.5rem;
        border-bottom: 1px solid #dee2e6;
    }
</style>

<div class="bg-light">
    <div class="container py-4">
        <div class="text-center mb-4">
            <h1 class="h3">Add New Room Listing</h1>
            <p class="text-muted">Upload details and images for your room or property</p>
        </div>

        <div class="card" id="form-card">
            <div class="card-body">
                <div id="alert-container"></div>

                <form id="listing-form" method="POST" action="{{ route('property_upload') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Room Details -->
                    <h4 class="section-title">Room Details</h4>
                    <div class="mb-3">
                        <label for="title" class="form-label">Listing Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="e.g., Cozy Room in Bhaktapur" value="{{ old('title') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location" placeholder="e.g., Bhaktapur, Nepal" value="{{ old('location') }}" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="price" class="form-label">Price per Night (रु)</label>
                            <input type="number" class="form-control" id="price" name="price" min="1" value="{{ old('price') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="property-type" class="form-label">Property Type</label>
                            <select class="form-select" id="property-type" name="property_type" required>
                                <option value="">Select property type</option>
                                <option value="room" {{ old('property_type') == 'room' ? 'selected' : '' }}>Room in a home</option>
                                <option value="apartment" {{ old('property_type') == 'apartment' ? 'selected' : '' }}>Apartment</option>
                                <option value="house" {{ old('property_type') == 'house' ? 'selected' : '' }}>Entire house</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label class="form-label">Guests</label>
                            <select class="form-select" name="guests">
                                @for($i = 1; $i <= 8; $i++)
                                    <option value="{{ $i }}" {{ old('guests') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Bedrooms</label>
                            <select class="form-select" name="bedrooms">
                                @for($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ old('bedrooms') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Beds</label>
                            <select class="form-select" name="beds">
                                @for($i = 1; $i <= 6; $i++)
                                    <option value="{{ $i }}" {{ old('beds') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Bathrooms</label>
                            <select class="form-select" name="baths">
                                @foreach([1,2,3, 4] as $bath)
                                    <option value="{{ $bath }}" {{ old('baths') == $bath ? 'selected' : '' }}>{{ $bath }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="4" required>{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Highlights</label>
                <textarea class="form-control" name="highlights" id="highlights" rows="4" required>{{ old('highlights') }}</textarea>
                    </div>


                    <!-- Image Upload -->
                    <h4 class="section-title">Property Images</h4>
                        <div class="mb-3">
                            <label>Upload Images</label>
                            <div class="multi-upload-box upload-container" onclick="document.getElementById('images').click()" id="upload-container">
                                <i class="bi bi-cloud-upload fs-1 text-muted mb-2"></i>
                                <p><strong>Click to upload</strong> or drag and drop</p>
                                <p class="text-muted small">PNG, JPG or WEBP (MAX. 5MB per image)</p>
                            </div>
                            <input type="file" id="images" name="images[]" multiple accept="image/*" class="d-none" onchange="previewImages(event)">
                            
                            <div class="image-preview-container mt-3 d-flex flex-wrap" id="preview"></div>

                            @error('images')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            @error('images.*')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    <!-- Amenities -->
                    <h4 class="section-title">Amenities</h4>
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
                        $oldAmenities = old('amenities', []);
                    @endphp
                    <div class="row">
                        @foreach($amenitiesList as $amenity)
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="{{ $amenity['id'] }}" name="amenities[]" value="{{ $amenity['id'] }}"
                                        {{ in_array($amenity['id'], $oldAmenities) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="{{ $amenity['id'] }}">
                                        <i class="bi {{ $amenity['icon'] }} me-2"></i>{{ $amenity['label'] }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-end pt-4 border-top mt-4">
                        <button type="submit" class="btn btn-primary">Create Listing</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    <!-- Include CKEditor 5 CDN -->
    ClassicEditor
        .create(document.querySelector('#highlights'))
        .catch(error => {
            console.error(error);
        });
    function previewImages(event) {
        const preview = document.getElementById('preview');
        preview.innerHTML = ''; // Clear previous previews
        const files = event.target.files;

        if (files.length > 0) {
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'me-2 mb-2';
                    img.style.width = '100px';
                    img.style.height = '100px';
                    img.style.objectFit = 'cover';
                    img.style.borderRadius = '8px';
                    preview.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        }
    }
</script>
@include('vadama.layouts.footer')
@endsection
