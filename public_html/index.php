<?php
$page = $_GET['page'] ?? 'home';
$pages = ['home', 'alojamientos', 'ubicacion', 'contacto'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Paraíso Chuí</title>
</head>

<body>
    <header>
        <div class="logo"><img src="assets/img/logo.png" alt="Logo"></div>
        <nav class="navbar">
            <ul class="nav-links">
                <li><a href="/">Inicio</a></li>
                <li><a href="/alojamientos">Alojamientos</a></li>
                <li><a href="/ubicacion">Ubicación</a></li>
                <li><a href="/contacto">Contacto</a></li>
            </ul>
        </nav>
        <?php //include 'view/swiper.php'; 
        ?>
        <?php
        if (in_array($page, $pages)) {
            $file = "app/{$page}.php";
            include(is_file($file) ? $file : 'app/home.php');
        }
        ?>
    </header>
    <script src="./assets/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // var swiper = new Swiper('.swiperp', {
            //     slidesPerView: 1,
            //     spaceBetween: 0,

            //     loop: true,
            //     pagination: {
            //         el: '.swiper-pagination',
            //         clickable: true,
            //     },
            //     navigation: {
            //         nextEl: '.swiper-button-next',
            //         prevEl: '.swiper-button-prev',
            //     },
            //     scrollbar: {
            //         el: '.swiper-scrollbar',
            //     },
            //     effect: 'cube',
            // });

            var swipertop = new Swiper('.swipertop', {
                slidesPerView: 1,
                spaceBetween: 0,
                speed: 500,

                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                scrollbar: {
                    el: '.swiper-scrollbar',
                },
                keyboard: {
                    enabled: true, // Enable keyboard control
                    // onlyInViewport: true, // Optional: Only enable when Swiper is in the viewport
                    pageUpDown: true, // Optional: Enable Page Up/Down keys for pagination
                    // effect: 'fade',
                    // autoplay: {
                    //     delay: 5000,
                },
            });
        });
    </script>
</body>

</html>