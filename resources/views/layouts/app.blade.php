<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>TK Aisyiyah Mimika</title>

<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="nav-container">

        <div class="logo-wrapper">
            <img src="{{ asset('assets/images/LogoTK.png') }}" class="logo-img">
        </div>

        <ul class="nav-menu">
            <li><a href="/">Beranda</a></li>
            <li><a href="/profil">Profil</a></li>
            <li><a href="/galeri">Galeri</a></li>
            <li><a href="/ppdb">PPDB</a></li>
        </ul>

    </div>
</nav>

<!-- CONTENT -->
<main>

@yield('content')

</main>

<!-- FOOTER -->
<footer class="footer">

<div class="footer-container">

<div class="footer-left">

<img src="{{ asset('assets/images/LogoTK.png') }}" width="70">

<p>TK Aisyiyah Mimika</p>

</div>

<div class="footer-right">

<p>📧 tkaisyiyah_mimika@gmail.com</p>
<p>📱 @tk_aisyiyah_mimika</p>
<p>📞 0812-3456-7890</p>

</div>

</div>

</footer>

</body>
</html>