@extends('vadama.layouts.header')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Timeline</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff;
            color: black;
            font-family: Arial, sans-serif;
        }
        
        .timeline-container {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        .timeline-title {
            text-align: center;
            font-size: 3rem;
            margin-bottom: 50px;
        }
        
        .timeline {
            position: relative;
        }
        
        .timeline::after {
            content: '';
            position: absolute;
            width: 2px;
            background-color:rgb(174, 171, 171);
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -1px;
        }
        
        .timeline-item {
            position: relative;
            margin-bottom: 80px;
            display: flex;
            justify-content: space-between;
        }
        
        .timeline-marker {
            position: absolute;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background-color: #79090F;
            border: 4px solid #E9E1E1;
            left: 50%;
            top: 50px;
            transform: translateX(-50%);
            z-index: 1;
        }
        
        .timeline-content {
            padding: 20px;
            background-color: #F2EEEE;
            border-radius: 6px;
            width: 45%;
        }
        
        .timeline-content h3 {
            margin-top: 0;
            font-weight: bold;
        }
        
        .timeline-content p {
            margin-bottom: 0;
            line-height: 1.6;
        }
        
        .image-container {
            position: relative;
            width: 100%;
        }
        
        .year-label {
            position: absolute;
            top: -30px;
            right: 0;
            background-color: #79090F;
            color: white;
            padding: 5px 15px;
            border-radius: 4px;
            font-size: 1.5rem;
            font-weight: bold;
            z-index: 2;
        }
        
        .image-placeholder {
            width: 100%;
            height: 200px;
            background-color: #E9E1E1;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
        }
        
        @media (max-width: 768px) {
            .timeline-item {
                flex-direction: column;
            }
            
            .timeline-content {
                width: 100%;
                margin-bottom: 30px;
            }
            
            .timeline::after {
                left: 20px;
            }
            
            .timeline-marker {
                left: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="timeline-container">
        <h1 class="timeline-title">Team Timeline</h1>
        
        <div class="timeline">
            <!-- Project Manager -->
            <div class="timeline-item">
                <div class="timeline-content" style="margin-right: 5%;">
                    <div class="image-container">
                        <div class="year-label">Anil Bhatta</div>
                        <div class="image-placeholder">Project manager</div>
                    </div>
                </div>
                <div class="timeline-marker"></div>
                <div class="timeline-content">
                    <h3>Project Manager</h3>
                    <p>Anil Bhatta is responsible for overseeing the project's overall direction, ensuring that deadlines are met, and coordinating communication between team members and stakeholders. He manages the project timeline, budget, and resources.</p>
                </div>
            </div>
            
            <!-- Business Analyst -->
            <div class="timeline-item">
                <div class="timeline-content">
                    <h3>Business Analyst</h3>
                    <p>Suman Shrestha plays a key role in identifying the business needs, gathering requirements, and ensuring that the project aligns with the client's goals. Suman bridges the gap between the business and technical teams, ensuring clear communication of requirements.</p>
                </div>
                <div class="timeline-marker"></div>
                <div class="timeline-content" style="margin-left: 5%;">
                    <div class="image-container">
                        <div class="year-label">Suman Shrestha</div>
                        <div class="image-placeholder">Business Analysis</div>
                    </div>
                </div>
            </div>
            
            <!-- Frontend Developer 1 -->
            <div class="timeline-item">
                <div class="timeline-content" style="margin-right: 5%;">
                    <div class="image-container">
                        <div class="year-label">Rijen Maharjan</div>
                        <div class="image-placeholder">Frontend Developer</div>
                    </div>
                </div>
                <div class="timeline-marker"></div>
                <div class="timeline-content">
                    <h3>Frontend Developer</h3>
                    <p>Rijen Maharjan is responsible for implementing the user interface and ensuring that the web application is visually appealing and user-friendly. Rijen works closely with designers to bring the visual design to life using HTML, CSS, and JavaScript.</p>
                </div>
            </div>

            <!-- Frontend Developer 2 -->
            <div class="timeline-item">
                <div class="timeline-content">
                    <h3>Frontend Developer</h3>
                    <p>Johit Thabe also works on the frontend development, ensuring the seamless integration of design and functionality. Johit focuses on making the application responsive and optimized for various screen sizes and devices.</p>
                </div>
                <div class="timeline-marker"></div>
                <div class="timeline-content" style="margin-left: 5%;">
                    <div class="image-container">
                        <div class="year-label">Johit Thabe</div>
                        <div class="image-placeholder">Frontend Developer</div>
                    </div>
                </div>
            </div>

            <!-- Backend Developer -->
            <div class="timeline-item">
                <div class="timeline-content" style="margin-right: 5%;">
                    <div class="image-container">
                        <div class="year-label">Swoyam Suwal</div>
                        <div class="image-placeholder">Backend Developer</div>
                    </div>
                </div>
                <div class="timeline-marker"></div>
                <div class="timeline-content">
                    <h3>Backend Developer</h3>
                    <p>Swoyam Suwal is responsible for developing the backend functionality of the project, including handling database operations, server-side logic, and API integrations. Swoyam ensures that the application runs smoothly and securely.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection
