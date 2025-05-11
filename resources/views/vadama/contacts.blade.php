@extends('vadama.layouts.header')
@section('content')

<!-- Cloudflare Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    /* Move all the CSS styles here - already done below */
    * {
        /* margin: 0;
        padding: 0;
        box-sizing: border-box; */
        font-family: 'Arial', sans-serif;
    }
    body {
        background-color: white;
        color: black;
        line-height: 1.6;
    }
    /* You can place this in your main layout or global CSS file */
.container {
    max-width: 1140px; /* or same as other pages */
    margin: 0 auto;
    padding-left: 15px;
    padding-right: 15px;
}

    .contact-section {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
        margin-bottom: 50px;
    }
    .contact-form, .contact-info {
        flex: 1;
        min-width: 300px;
        padding: 20px;
    }
    h1 {
        color: #79090f;
        font-size: 32px;
        margin-bottom: 30px;
    }
    h2 {
    color: #79090f;
    font-size: 24px;
    margin-bottom: 10px;
    margin-top: 30px; /* <-- Add this line */
}

.contact-info h1 {
    margin-top: 30px; /* <-- Add this line */
}

    h3 {
        color: #79090f;
        font-size: 20px;
        margin-bottom: 10px;
    }
    .form-row {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
    }
    .form-group {
        flex: 1;
    }
    input {
        width: 100%;
        padding: 12px;
        background-color: transparent;
        border: none;
        border-bottom: 1px solid #ddd;
        color: black;
        font-size: 16px;
        margin-bottom: 20px;
        outline: none;
        transition: border-color 0.3s;
    }
    input:focus {
        border-color: #79090f;
    }
    .error {
        color: #79090f;
        font-size: 14px;
        margin-top: -15px;
        margin-bottom: 15px;
    }
    .submit-btn {
        background-color: #79090f;
        color: white;
        border: none;
        padding: 12px 30px;
        font-size: 16px;
        border-radius: 30px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .submit-btn:hover {
        background-color: #5a0609;
    }
    .info-item {
        display: flex;
        margin-bottom: 30px;
    }
    .icon {
        color: #79090f;
        font-size: 24px;
        margin-right: 20px;
        width: 40px;
        text-align: center;
    }
    .details p {
        margin-bottom: 5px;
        color: #333;
    }
    .map-section {
        margin-bottom: 30px;
    }
    .map-title {
        color: #79090f;
        font-size: 28px;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
    }
    .map-container {
        width: 100%;
        height: 400px;
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid #eee;
    }
    .map-container iframe {
        width: 100%;
        height: 100%;
        border: 0;
    }
    .success-message {
        background-color: rgba(39, 174, 96, 0.2);
        border: 1px solid #27ae60;
        color: #27ae60;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
        display: none;
    }
    .social-icons {
        display: flex;
        gap: 15px;
        margin-top: 10px;
    }
    .social-icons a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background-color: #eee;
        color: #333;
        border-radius: 50%;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    .social-icons a:hover {
        background-color: #79090f;
        color: white;
        transform: translateY(-3px);
    }
    @media (max-width: 768px) {
        .contact-section {
            flex-direction: column;
        }
        .form-row {
            flex-direction: column;
            gap: 0;
        }
        .map-container {
            height: 300px;
        }
    }
</style>

<div class="container">
    <div class="contact-section">
        <div class="contact-form">
            <h2>Contact Us</h2>
            <h1>Get in Touch for Rentals, Support, or Inquiries</h1>

            <div id="successMessage" class="success-message">
                Thank you for your message! We'll get back to you soon.
            </div>

            <form id="contactForm" method="POST" action="{{ route('contacts_email') }}" enctype="multipart/form-data">    
                @csrf            
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" id="name" name="name" placeholder="Your Name*" required>
                        <div id="nameError" class="error"></div>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" placeholder="Your Email*" required>
                        <div id="emailError" class="error"></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input type="tel" id="phone" name="phone" placeholder="Phone*" required>
                        <div id="phoneError" class="error"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" id="message" name="message" placeholder="Message">
                        <div id="websiteError" class="error"></div>
                    </div>
                </div>

                <button type="submit" class="submit-btn">Submit Now</button>
            </form>
        </div>

        <div class="contact-info">
            <h1>Get Answers & Advices</h1>

            <div class="info-item">
                <div class="icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="details">
                    <h3>Address</h3>
                    <p>Herald College Kathmandu</p>
                    <p>Kathmandu, Nepal</p>
                </div>
            </div>

            <div class="info-item">
                <div class="icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <div class="details">
                    <h3>Phone</h3>
                    <p>+977-9847451947</p>
                    <p>+977-9827501391</p>
                </div>
            </div>

            <div class="info-item">
                <div class="icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="details">
                    <h3>E-Mail</h3>
                    <p>rentsnepal@gmail.com</p>
                    <p>info@rentsnepal.com.np</p>

                    <div class="social-icons">
                        <a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="map-section">
        <h2 class="map-title">Our Location</h2>
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.16815418468!2d85.328191175254!3d27.71209397617984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb196de5da5741%3A0x652792640c70ede9!2sHerald%20College%20Kathmandu!5e0!3m2!1sen!2snp!4v1746892487675!5m2!1sen!2snp" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>

@include('vadama.layouts.footer')
@endsection
