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
        <h1 class="h5 mb-0">Edit Property</h1>
    </div>

    <form method="POST" action="{{ route('property_update', $property->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-section-title">Property Information</div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $property->title) }}">
                @error('title') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="location">Location</label>
                <input type="text" class="form-control" name="location" value="{{ old('location', $property->location) }}">
                @error('location') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-3 mb-3">
                <label for="type">Type</label>
                <select class="form-control" name="type">
                    @foreach(['Apartment', 'Room', 'House / Independent Home', 'Villa', 'Flat', 'Studio Apartment', 'Commercial Property'] as $type)
                        <option value="{{ $type }}" {{ old('type', $property->type) == $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
                @error('type') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="description">Description</label>
            <textarea class="form-control" rows="4" name="description">{{ old('description', $property->description) }}</textarea>
            @error('description') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-section-title">Images</div>
        <div class="mb-3">
            <label>Existing Images:</label>
            <div class="image-preview-container d-flex flex-wrap">
                @foreach ($property->images as $image)
                    <img src="{{ asset('storage/uploads/properties/images/' . $image->image_path) }}" alt="Image">
                @endforeach
            </div>
        </div>
        <div class="mb-3">
            <label>Upload New Images</label>
            <input type="file" name="images[]" multiple class="form-control">
            @error('images') <div class="text-danger">{{ $message }}</div> @enderror
            @error('images.*') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-section-title">Availability & Pricing</div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="checkin_time">Check-in Time</label>
                <input type="time" class="form-control" name="checkin_time" value="{{ old('checkin_time', $property->checkin_time) }}">
                @error('checkin_time') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="checkout_time">Check-out Time</label>
                <input type="time" class="form-control" name="checkout_time" value="{{ old('checkout_time', $property->checkout_time) }}">
                @error('checkout_time') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="price_per_month">Price (NPR)</label>
                <input type="number" class="form-control" name="price_per_month" value="{{ old('price_per_month', $property->price_per_month) }}">
                @error('price_per_month') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-section-title">Highlights & Features</div>

        <div class="mb-3">
            <label for="key_points">Key Points</label>
            <textarea class="form-control" name="key_points" rows="3">{{ old('key_points', $property->key_points) }}</textarea>
            @error('key_points') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="tags">Tags</label>
            <input type="text" class="form-control" name="tags" value="{{ old('tags', $property->tags) }}">
            @error('tags') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-danger mb-3">
                Update Property
            </button>
        </div>
    </form>
</div>
@endsection
