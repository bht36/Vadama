<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UI Template</title>

    <!-- Google Font: Source Sans Pro (Provides typography styles) -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- FontAwesome Icons (Used for icons in UI) -->
    <link rel="stylesheet" href="{{ asset('build/assets/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- AdminLTE CSS (Main UI framework) -->
    <link rel="stylesheet" href="{{ asset('build/assets/dist/css/adminlte.min.css') }}">

    <!-- overlayScrollbars (Used for sidebar scrolling effects) -->
    <link rel="stylesheet" href="{{ asset('build/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <!-- Custom CSS (Admin-specific styles) -->
    <link rel="stylesheet" href="{{asset('css/admin.css')}}?v={{rand()}}">

    <!-- Flowbite: Provides pre-built Tailwind CSS components for UI design -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

    <!-- Font Awesome: Provides a library of scalable vector icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Swiper Js: Enables interactive slideshow and carousel functionality -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- AOS (Animate on Scroll): Adds scroll-based animations to elements -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- FancyBox: Enables image and media lightbox functionality -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js" defer></script>

    <!-- jQuery (Required for AdminLTE and Bootstrap functionalities) -->
    <!-- <script src="{{ asset('build/assets/plugins/jquery/jquery.min.js') }}"></script> -->

    <!-- Google Recaptcha: Adds security verification to forms -->
    <script src="https://www.google.com/recaptcha/api.js?hl=en" async defer></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</head>

<body>
    <script>
        AOS.init();
    </script>
</body>

</html>