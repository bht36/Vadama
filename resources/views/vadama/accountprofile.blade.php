@extends('vadama.layouts.header')
@section('content')
    <style>
        :root {
            --primary-color: #79090f;
            --secondary-color: #e6b52b;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
            overflow: hidden;
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
            cursor: pointer;
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

        .info-value {
            color: #555;
            margin-bottom: 20px;
        }

        .edit-button {
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            background-color: white;
            padding: 8px 20px;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            transition: background-color 0.2s;
        }

        .edit-button:hover {
            background-color: rgba(121, 9, 15, 0.05);
        }

        .edit-button i {
            margin-right: 8px;
        }

        .container {
            max-width: 1000px;
        }
    </style>

    <div class="container">
        <div class="page-title mt-3">
            <div class="page-title-indicator"></div>
            <h1 class="h5 mb-0">Profile</h1>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="profile-image-container" style="width: 400px; height: 400px;">
                    <img id="profilePreview"
                         src="{{ $user->profile_picture ? asset('storage/uploads/profile_pictures/' . $user->profile_picture) : asset('logo/User.png') }}"
                         alt="Profile picture"
                         class="img-fluid rounded"
                         width="400" height="150">
                    
                    <button class="camera-button" title="Change Profile Picture">
                        <i class="fa-solid fa-camera"></i>
                    </button>
                    <input type="file" id="profileInput" accept="image/*" style="display: none;">
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="dashed-box">
                            <span class="dashed-box-text">User Profile</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="dashed-box">
                            <i class="fa-solid fa-upload" style="color: #aaa; font-size: 14px;"></i>
                            <span class="dashed-box-text">Citizen Documents</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mt-4 mt-md-0">
                    <div class="info-label">Name:</div>
                    <div class="info-value">{{ $user->first_name }} {{ $user->last_name }}</div>

                    <div class="info-label">Username:</div>
                    <div class="info-value">{{ $user->username }}</div>

                    <div class="info-label">Email:</div>
                    <div class="info-value">{{ $user->email }}</div>

                    <div class="info-label">Phone Number:</div>
                    <div class="info-value">{{ $user->phone_number }}</div>

                    <a href="{{ route('editprofile') }}" class="edit-button">
                        <i class="fa-solid fa-pen"></i>
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
@include('vadama.layouts.footer')
@endsection

@section('scripts')
<script>
    document.querySelector('.camera-button').addEventListener('click', function () {
        document.getElementById('profileInput').click();
    });

    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function () {
            const output = document.getElementById('profilePreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    document.getElementById('profileInput').addEventListener('change', previewImage);
</script>
