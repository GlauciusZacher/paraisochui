<?php
function swiper_init($path)
{
    $files = scandir('./assets/img/fotos/' . $path);
    $files = array_slice($files, 2); // Remove . and .. entries
?>
    <div class="swiper-container">
        <div class="swiper">
            <div class="swiper-wrapper">
                <!-- Slides -->
                <?php foreach ($files as $file) : ?>
                    <div class="swiper-slide">
                        <img src="assets/img/fotos/<?php echo $path . '/' . $file; ?>" />
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
<?php
}
