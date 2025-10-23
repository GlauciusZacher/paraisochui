<?php
$page = $_GET['page'] ?? 'home';
$pages = ['home', 'alojamientos', 'ubicacion', 'contacto'];
$links = [
    'home' => '/',
    'alojamientos' => '/alojamientos',
    'ubicacion' => '/ubicacion',
    'contacto' => '/contacto',
];
$page_to_load = 'home';
if (array_key_exists($page, $links)) {
    $page_to_load = $page;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Delius&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


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
                <?php foreach ($links as $name => $link) : ?>
                    <?php $activeClass = ($page_to_load === $name) ? 'active' : ''; ?>
                    <li><a href="<?= $link ?>" class="<?= $activeClass ?>"><?= ucfirst($name) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </header>
    <?php
    $file = "app/{$page_to_load}.php";
    include(is_file($file) ? $file : 'app/home.php');
    ?>
    <script src="./assets/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swiper = new Swiper('.swiper', {
                slidesPerView: 1,
                spaceBetween: 0,

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
                // effect: 'cube',
                autoplay: {
                    delay: 5000,
                },
                pauseOnMouseEnter: true, // Pause autoplay on mouse hover
                disableOnInteraction: true, // Optional: Autoplay continues after user interaction`
                stopOnLastSlide: true, // Optional: Autoplay stops on the last slide
            });

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
                autoplay: {
                    delay: 5000,
                },
                // disableOnInteraction: false,
                keyboard: {
                    enabled: true, // Enable keyboard control
                    // onlyInViewport: true, // Optional: Only enable when Swiper is in the viewport
                    pageUpDown: true, // Optional: Enable Page Up/Down keys for pagination
                    // effect: 'fade',
                },
            });
        });
    </script>
</body>

</html>