<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/Harpon.png">
    <title>Harpoon: Hygiene for All, Power for Her</title>

    <link rel="stylesheet" href="/css/style.css" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:image" content="@yield('image')"/>
    <meta property="og:image:width" content="1200"/>
    <meta property="og:image:height" content="630"/>
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description"
          content="@yield('description')">

</head>
<body >
@include('sweetalert::alert')

@yield('content')

<script src="/js/script.js"></script>

</body>
</html>
