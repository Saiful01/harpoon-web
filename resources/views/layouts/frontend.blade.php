<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/Harpon.png">
    <title>Harpoon Campaign</title>
    <link rel="stylesheet" href="/css/style.css" />

  {{--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>--}}


    <meta http-equiv="cache-control" content="max-age=0, no-cache, no-store, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">


    <meta property="og:image" content="@yield('image')"/>
    <meta property="og:image:width" content="1200"/>
    <meta property="og:image:height" content="628"/>
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description"
          content="@yield('description')">



</head>
<body >

<!-- Header Navigation -->
<header class="header-nav">
    <nav>
        <div class="logo">
            <a href="/">
                <img
                    src="/assets/images/Harpon.png"
                    class="logo-image"
                    alt="Harpon Logo"
                />
            </a>
            <div class="divider"></div>
            <img
                src="/assets/images/WTD.png"
                class="logo-image"
                alt="WTD Logo"
            />
        </div>
        <ul class="nav-links">
            <li><a href="#join-now">জয়েন করুন</a></li>
            <li><a href="#shopoth">শপথ নিন</a></li>
            <li><a href="#story">আওয়াজ তুলুন</a></li>
            <li><a href="#">সাথে থাকুন</a></li>
        </ul>
        <div class="hamburger" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
</header>

@yield('content')

<script src="/js/script.js"></script>

</body>
</html>
