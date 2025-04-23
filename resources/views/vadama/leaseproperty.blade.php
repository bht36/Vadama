@extends('vadama.layouts.header')
@section('content')
<div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</div>
<body class="bg-light">
    <div class="container py-4">
        <div class="text-center mb-4">
            <h1 class="h3">Add New Room Listing</h1>
            <p class="text-muted">Upload details and images for your room or property</p>
        </div>

        <div class="card" id="form-card">
            <div class="card-body">
                <div id="alert-container"></div>

                <form id="listing-form">
                    <!-- Room Details Section -->
                    <h4 class="section-title">Room Details</h4>
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Listing Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="e.g., Cozy Room in Bhaktapur" required>
                        <div class="invalid-feedback" id="title-error"></div>
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location" placeholder="e.g., Bhaktapur, Nepal" required>
                        <div class="invalid-feedback" id="location-error"></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="price" class="form-label">Price per Night ($)</label>
                            <input type="number" class="form-control" id="price" name="price" min="1" placeholder="e.g., 85" required>
                            <div class="invalid-feedback" id="price-error"></div>
                        </div>
                        <div class="col-md-6">
                            <label for="property-type" class="form-label">Property Type</label>
                            <select class="form-select" id="property-type" name="propertyType" required>
                                <option value="">Select property type</option>
                                <option value="room">Room in a home</option>
                                <option value="apartment">Apartment</option>
                                <option value="house">Entire house</option>
                                <option value="guesthouse">Guesthouse</option>
                                <option value="hotel">Hotel room</option>
                            </select>
                            <div class="invalid-feedback" id="property-type-error"></div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6 col-md-3">
                            <label for="guests" class="form-label">Guests</label>
                            <select class="form-select" id="guests" name="guests" required>
                                <option value="1">1</option>
                                <option value="2" selected>2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </div>
                        <div class="col-6 col-md-3">
                            <label for="bedrooms" class="form-label">Bedrooms</label>
                            <select class="form-select" id="bedrooms" name="bedrooms" required>
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-6 col-md-3">
                            <label for="beds" class="form-label">Beds</label>
                            <select class="form-select" id="beds" name="beds" required>
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                        <div class="col-6 col-md-3">
                            <label for="baths" class="form-label">Bathrooms</label>
                            <select class="form-select" id="baths" name="baths" required>
                                <option value="1" selected>1</option>
                                <option value="1.5">1.5</option>
                                <option value="2">2</option>
                                <option value="2.5">2.5</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Describe your property..." required></textarea>
                        <div class="form-text">Include details about the space, location, and any special features.</div>
                        <div class="invalid-feedback" id="description-error"></div>
                    </div>

                    <!-- Images Section -->
                    <h4 class="section-title">Property Images</h4>
                    
                    <div class="mb-3">
                        <div class="upload-container" id="upload-container">
                            <i class="bi bi-cloud-upload fs-1 text-muted mb-2"></i>
                            <p><strong>Click to upload</strong> or drag and drop</p>
                            <p class="text-muted small">PNG, JPG or WEBP (MAX. 5MB per image)</p>
                            <input type="file" id="image-upload" accept="image/png, image/jpeg, image/jpg, image/webp" multiple class="d-none">
                        </div>
                        <div class="invalid-feedback d-block" id="images-error"></div>
                    </div>

                    <div id="image-preview-container" class="row g-3 mt-2" style="display: none;"></div>

                    <!-- Amenities Section -->
                    <h4 class="section-title">Amenities</h4>
                    
                    <div class="mb-3">
                        <p class="form-text mb-3">Select all the amenities that your property offers</p>
                        
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="wifi" name="amenities" value="wifi">
                                    <label class="form-check-label" for="wifi">
                                        <i class="bi bi-wifi me-2"></i>Wifi
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="workspace" name="amenities" value="workspace">
                                    <label class="form-check-label" for="workspace">
                                        <i class="bi bi-laptop me-2"></i>Dedicated workspace
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="parking" name="amenities" value="parking">
                                    <label class="form-check-label" for="parking">
                                        <i class="bi bi-p-circle me-2"></i>Free parking
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="ac" name="amenities" value="ac">
                                    <label class="form-check-label" for="ac">
                                        <i class="bi bi-snow me-2"></i>Air conditioning
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="kitchen" name="amenities" value="kitchen">
                                    <label class="form-check-label" for="kitchen">
                                        <i class="bi bi-cup-hot me-2"></i>Kitchen
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="washer" name="amenities" value="washer">
                                    <label class="form-check-label" for="washer">
                                        <i class="bi bi-water me-2"></i>Washer
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="tv" name="amenities" value="tv">
                                    <label class="form-check-label" for="tv">
                                        <i class="bi bi-tv me-2"></i>TV
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="heating" name="amenities" value="heating">
                                    <label class="form-check-label" for="heating">
                                        <i class="bi bi-thermometer-half me-2"></i>Heating
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end pt-4 border-top mt-4">
                        <button type="submit" id="submit-btn" class="btn btn-primary">Create Listing</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Success Card (Hidden by default) -->
        <div class="card d-none" id="success-card">
            <div class="card-body text-center py-5">
                <div class="d-inline-flex justify-content-center align-items-center bg-success bg-opacity-10 rounded-circle p-3 mb-4">
                    <i class="bi bi-check-lg fs-3 text-success"></i>
                </div>
                <h2 class="h4 mb-2">Listing Created Successfully</h2>
                <p class="text-muted mb-4">Your room listing has been created and is now live.</p>
                <button id="create-another-btn" class="btn btn-primary">Create Another Listing</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@include('vadama.layouts.footer')
@endsection
