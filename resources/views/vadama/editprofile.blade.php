@extends('vadama.layouts.header')

@section('content')
    <style>
        :root {
            --primary-color: #79090f;
            --secondary-color: #e6b52b;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }
        
        .page-title {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .page-title-indicator {
            width: 16px;
            height: 16px;
            background-color: var(--primary-color);
            border-radius: 50%;
            margin-right: 10px;
        }
        
        .profile-image-container {
            position: relative;
            background-color: #f8f9fa;
            border-radius: 8px;
            aspect-ratio: 1/1;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        
        .camera-button {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: white;
            border: none;
            border-radius: 8px;
            padding: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .dashed-box {
            border: 1px dashed #ccc;
            border-radius: 8px;
            padding: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100px;
            text-align: center;
        }
        
        .dashed-box-text {
            color: #aaa;
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 500;
            margin-top: 5px;
        }
        
        .info-label {
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 5px;
        }
        
        .save-button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 6px;
            transition: background-color 0.2s;
        }
        
        .save-button:hover {
            background-color: #5e070c;
        }
        
        .cancel-button {
            border: 1px solid #ccc;
            color: #333;
            background-color: white;
            padding: 10px 30px;
            border-radius: 6px;
            text-decoration: none;
            transition: background-color 0.2s;
        }
        
        .cancel-button:hover {
            background-color: #f5f5f5;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(121, 9, 15, 0.25);
        }
        
        .container {
            max-width: 1000px;
        }
    </style>

    <div class="container">
        <div class="page-title">
            <div class="page-title-indicator"></div>
            <h1 class="h5 mb-0">Edit Profile</h1>
        </div>

        <!-- Display success or error messages -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Edit Profile Form -->
        <form method="POST" action="{{ route('update', ['id' => $user->id]) }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="profile-image-container">
                        <img src="https://via.placeholder.com/300" alt="Profile picture" class="img-fluid">
                        <button type="button" class="camera-button">
                            <i class="fa-solid fa-camera"></i>
                        </button>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="dashed-box">
                                <span class="dashed-box-text">Logo</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="dashed-box">
                                <i class="fa-solid fa-upload" style="color: #aaa; font-size: 14px;"></i>
                                <span class="dashed-box-text">Vendor Documents</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mt-4 mt-md-0">
                        <div class="mb-3 row">
                            <!-- First Name Input -->
                            <div class="col-md-6">
                                <label for="first_name" class="info-label">First Name:</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name', $user->first_name) }}">
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <!-- Last Name Input -->
                            <div class="col-md-6">
                                <label for="last_name" class="info-label">Last Name:</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}">
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Username Input -->
                        <div class="mb-3">
                            <label for="username" class="info-label">Username:</label>
                            <input type="username" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $user->username) }}">
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <!-- Email Input -->
                        <div class="mb-3">
                            <label for="email" class="info-label">Email:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <!-- Phone Number Input -->
                        <div class="mb-3">
                            <label for="phone_number" class="info-label">Phone Number:</label>
                            <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                            @error('phone_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <!-- Save Button -->
                            <button type="submit" class="save-button me-2">Save</button>
                            <!-- Cancel Button -->
                            <a href="{{ route('accountprofile') }}" class="cancel-button">Cancel</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
