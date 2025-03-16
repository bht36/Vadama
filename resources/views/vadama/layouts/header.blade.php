<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Menu</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 15px 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin: 0 15px;
        }

        .nav-links a {
            text-decoration: none;
            color: black;
            font-size: 16px;
            font-weight: bold;
        }

        .signup-btn {
            text-decoration: none;
            color: black;
            font-size: 16px;
            font-weight: bold;
            border: 2px solid black;
            padding: 8px 15px;
            border-radius: 5px;
        }

        .signup-btn:hover {
            background-color: black;
            color: white;
        }

        .content {
            /* margin-top: 20px; */
            padding: 20px;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contacts</a></li>
        </ul>
        <a href="#" class="signup-btn">Signup</a>
    </nav>

    <div class="content">
        @yield('content')
    </div>

</body>
</html>
