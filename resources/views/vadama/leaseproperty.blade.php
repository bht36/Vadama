@extends('vadama.layouts.header')

@section('content')
<style>
    .form-section-title {
        font-weight: bold;
        font-size: 1.1rem;
        color: var(--primary-color);
        margin-top: 20px;
    }
    .form-group label {
        font-weight: 500;
        font-size: 14px;
    }
    .multi-upload-box {
        border: 2px dashed #ccc;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        transition: 0.3s;
    }
    .multi-upload-box:hover {
        background-color: #f8f9fa;
    }
    .image-preview-container img {
        height: 100px;
        margin: 5px;
        border-radius: 6px;
        object-fit: cover;
    }
</style>

<div class="container mt-4">
    <div class="page-title">
        <div class="page-title-indicator"></div>
        <h1 class="h5 mb-0">Lease a Property</h1>
    </div>

    <form method="POST" action="{{ route('property_upload') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-section-title">Property Information</div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="title">Title (Home Name)</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Ex: Cozy Lakeside Cabin">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-3">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}" placeholder="Ex: Pokhara, Nepal">
            @error('location')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3 mb-3">
            <label for="type">Type of Rental</label>
            <select class="form-control" id="type" name="type">
                <option value="" disabled {{ old('type') ? '' : 'selected' }}>Select rental type</option>
                <option value="Rent House" {{ old('type') == 'Rent House' ? 'selected' : '' }}>Rent House</option>
                <option value="Rent Room" {{ old('type') == 'Rent Room' ? 'selected' : '' }}>Rent Room</option>
                <option value="Rent Apartment" {{ old('type') == 'Rent Apartment' ? 'selected' : '' }}>Rent Apartment</option>
            </select>
            @error('type')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="description">Description</label>
        <textarea rows="4" class="form-control" id="description" name="description" placeholder="Describe the property, neighborhood, etc.">{{ old('description') }}</textarea>
        @error('description')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-section-title">Images</div>
    <div class="mb-3">
        <label>Upload Images</label>
        <div class="multi-upload-box" onclick="document.getElementById('images').click()">
            Click or drag to upload multiple images
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

    <div class="form-section-title">Availability & Pricing</div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="checkin_time">Check-in Time</label>
            <input type="time" class="form-control" id="checkin_time" name="checkin_time" value="{{ old('checkin_time') }}">
            @error('checkin_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-3">
            <label for="checkout_time">Check-out Time</label>
            <input type="time" class="form-control" id="checkout_time" name="checkout_time" value="{{ old('checkout_time') }}">
            @error('checkout_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4 mb-3">
            <label for="price_per_month">Price (NPR)</label>
            <input type="number" class="form-control" id="price_per_month" name="price_per_month" placeholder="e.g. 1500" value="{{ old('price_per_month') }}">
            @error('price_per_month')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-section-title">Highlights & Features</div>

    <div class="mb-3">
        <label for="key_points">Key Points</label>
        <textarea rows="3" class="form-control" id="key_points" name="key_points" placeholder="e.g. Lake view, near hiking trail, pet-friendly...">{{ old('key_points') }}</textarea>
        @error('key_points')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="tags">Tags (comma separated)</label>
        <input type="text" class="form-control" id="tags" name="tags" value="{{ old('tags') }}" placeholder="e.g. Modern, Cozy, Wifi">
        @error('tags')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-flex justify-content-end mt-4">
        <button type="submit" class="btn btn-primary mb-3" style="background-color: #79090f; border-color: #79090f;">
            Upload Property
        </button>
    </div>
</form>

</div>

<script>
    function previewImages(event) {
        const files = event.target.files;
        const previewContainer = document.getElementById('preview');
        previewContainer.innerHTML = '';

        for (let i = 0; i < files.length; i++) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                previewContainer.appendChild(img);
            }
            reader.readAsDataURL(files[i]);
        }
    }
</script>
@endsection
