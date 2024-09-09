<!-- banner-page -->
<div class="banner-page inner-page about" style="background-image: url('<?= base_url('assets/front/images/about/cover.jpg') ?>')">
    <div class="content">
        <div class="banner-text">about us</div>
        <p>
            Need food and a good place to eat? Welcome to our humble
            place where you can eat <br />
            good food peacefully.
        </p>
    </div>
</div>
<!-- /banner-page -->

<!-- wg-about-slider -->
<div class="wg-about-slider snare-half">
    <img class="item-1" src="<?= base_url() ?>assets/front/images/item-background/item-1.png" alt="" />
    <img class="item-2" src="<?= base_url() ?>assets/front/images/item-background/item-1.png" alt="" />
    <div class="themesflat-container">
        <div class="row">
            <div class="col-lg-7">
                <div class="content">
                    <div class="heading-section">
                        <div class="sub wow fadeInUp">Tentang Zafira Garden Lounge</div>
                        <div class="main wow fadeInUp">Zafira Garden Lounge</div>
                        <div class="divider wow fadeInUp">
                            <div></div>
                        </div>
                        <div class="description wow fadeInUp">
                            Mulailah perjalanan dengan kebersamaan di Zafira Garden Lounge. Tempat yang nyaman untuk bersantai dengan keluarga sebelum keberangkatan.
                        </div>
                    </div>
                    <p class="wow fadeInUp">Zafira Garden Lounge hadir untuk memberikan pengalaman menunggu yang nyaman bagi para penumpang bandara. Kami menawarkan ruang yang tenang untuk bersantai sebelum penerbangan, dilengkapi dengan hidangan lezat dan akses cepat ke terminal.</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="image wow fadeInRight">
                    <img class="w-full" src="<?= base_url() ?>assets/front/images/item-background/3-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-container mt-3 " data-swiper='{
                    "spaceBetween": 30,
                    "slidesPerView": 1,
                    "loop": true,
                    "centeredSlides" : true,
                    "breakpoints": {
                        "991": {
                            "slidesPerView": 4.24
                        }
                    },
                    "navigation": {
                        "nextEl": ".about-next",
                        "prevEl": ".about-prev"
                    }
                }'>
        <div class="swiper-wrapper align-items-center">
            <?php for ($i = 1; $i <= 100; $i++) :
                $ext = ($i == "1" or $i == "2" or $i == "4" or $i == "38" or $i == "69" or $i == "70") ? "png" : "jpg";
            ?>
                <div class="swiper-slide">
                    <img src="<?= base_url("assets/front/images/about/1-$i.$ext") ?>" alt="" class="" />
                </div>
            <?php endfor; ?>
        </div>
        <div class="swiper-button-next button-style-arrow about-next"></div>
        <div class="swiper-button-prev button-style-arrow about-prev"></div>
    </div>
</div>
<!-- /wg-about-slider -->

<!-- counter -->
<div class="wg-counter style-1">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-3">
                <div class="counter-item dot-after">
                    <div class="counter">
                        <div class="number-counter">
                            <span class="number" data-speed="2500" data-to="240" data-inviewport="yes">240</span>
                        </div>
                    </div>
                    <div class="text">Clients Every Day</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="counter-item dot-after">
                    <div class="counter">
                        <div class="number-counter">
                            <span class="number" data-speed="2500" data-to="180" data-inviewport="yes">180</span>
                        </div>
                    </div>
                    <div class="text">Great Moments</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="counter-item dot-after">
                    <div class="counter">
                        <div class="number-counter">
                            <span class="number" data-speed="2500" data-to="05" data-inviewport="yes">05</span>
                        </div>
                    </div>
                    <div class="text">prestigious award</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="counter-item">
                    <div class="counter">
                        <div class="number-counter">
                            <span class="number" data-speed="2500" data-to="23" data-inviewport="yes">23</span>
                        </div>
                    </div>
                    <div class="text">year of operation</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /counter -->

<!-- wg-philosophy -->

<div class="wg-philosophy">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-7">
                <div class="images">
                    <img class="img1 wow fadeInLeft" src="<?= base_url() ?>assets/front/images/item-background/1-5.jpg" alt="">
                    <!-- <img class="img2 wow fadeInLeft" data-wow-delay="0.2s" src="<?= base_url() ?>assets/front/images/logo/logo-bg-gelap.png" alt=""> -->
                </div>
            </div>
            <div class="col-md-5">
                <div class="content">
                    <div class="heading-section text-center">
                        <div class="sub wow fadeInUp">Filosofi Kami</div>
                        <div class="main wow fadeInUp">Zafira Garden Lounge</div>
                        <div class="divider wow fadeInUp">
                            <div></div>
                        </div>
                    </div>
                    <p class="wow fadeInUp">Zafira Garden Lounge didirikan dengan filosofi untuk menciptakanoasis ketenangan di tengah kesibukan bandara. Dengan ruang tunggu yang nyaman, elegan, dan penuh dengan nuansa kehangatan.</p>
                    <p class="wow fadeInUp">Tujuan kami mendirikan Zafira Garden Lounge adalah untuk menyediakan tempat di mana penumpang dapat melepas penat, menikmati hidangan lezat, dan bersantai dengan keluarga sebelum keberangkatan. </p>
                    <p class="wow fadeInUp">Dengan mengedepankan pelayanan ramah dan fasilitas berkualitas, tujuan kami adalah untuk memastikan bahwa setiap momen yang dihabiskan di Zafira Garden Lounge meninggalkan kesan yang positif dan memperkaya perjalanan para penumpang. </p>
                    <!-- <a class="button-two-line wow fadeInUp" href="chef.html">VIEW ALL THE CHEF</a> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /wg-philosophy -->

<!-- road-map -->
<!-- <div class="road-map">
    <div class="swiper-container" data-swiper='{
                    "spaceBetween": 0,
                    "slidesPerView": 1,
                    "loop": true,
                    "breakpoints": {
                        "768": {
                            "slidesPerView": 2
                        },
                        "991": {
                            "slidesPerView": 3
                        }
                    },
                    "navigation": {
                        "nextEl": ".about-next",
                        "prevEl": ".about-prev"
                    }
                }'>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="road-map-item wow fadeInUp">
                    <div class="image">
                        <img src="<?= base_url() ?>assets/front/images/logo/logo-bg-gelap.png" alt="" class="w-50" />
                    </div>
                    <div class="content">
                        <div class="sub">2022</div>
                        <div class="title">
                            <a href="#">since lounge</a>
                        </div>
                        <p>
                            Morbi non arcu risus quis. Elementum tempus
                            donne egestas sed sed risus pretium quam
                            vulputate. Simul per omittantur voluptatibus
                            viderer vero nam.
                        </p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="road-map-item wow fadeInUp reverse" data-wow-delay="0.1s">
                    <div class="content">
                        <div class="sub">2023</div>
                        <div class="title">
                            <a href="#">new location</a>
                        </div>
                        <p>
                            Morbi non arcu risus quis. Elementum tempus
                            donne egestas sed sed risus pretium quam
                            vulputate. Simul per omittantur voluptatibus
                            viderer vero nam.
                        </p>
                    </div>
                    <div class="image">
                        <img src="<?= base_url() ?>assets/front/images/logo/logo-bg-gelap.png" alt="" class="w-50" />
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="road-map-item wow fadeInUp" data-wow-delay="0.2s">
                    <div class="image">
                        <img src="<?= base_url() ?>assets/front/images/logo/logo-bg-gelap.png" alt="" class="w-50" />
                    </div>
                    <div class="content">
                        <div class="sub">2024</div>
                        <div class="title">
                            <a href="#">award lounge</a>
                        </div>
                        <p>
                            Morbi non arcu risus quis. Elementum tempus
                            donne egestas sed sed risus pretium quam
                            vulputate. Simul per omittantur voluptatibus
                            viderer vero nam.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-button-next button-style-arrow about-next"></div>
    <div class="swiper-button-prev button-style-arrow about-prev"></div>
</div> -->
<!-- /road-map -->

<!-- wg-testimonial -->
<div class="wg-testimonial style-1 snare-before snare-after relative over-hidden">
    <div class="bg"></div>
    <div class="swiper-container" data-swiper='{ "spaceBetween": 0, "slidesPerView": 1, "pagination": { "el": ".page-title-pagination", "clickable": true }}'>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="testimonial-item">
                    <img class=" wow fadeInUp" src="<?= base_url() ?>assets/front/images/item-background/icon-quote.png" alt="">
                    <div class="title wow fadeInUp">
                        <a href="#">Pelayanan Ramah dan Fasilitas Lengkap</a>
                    </div>
                    <p class="wow fadeInUp">Saya sangat terkesan dengan fasilitas yang disediakan oleh Zafira Garden Lounge di Bandara Adi Soemarmo Solo. Sebagai jamaah haji, kenyamanan sebelum penerbangan sangat penting bagi saya. Lounge ini menyediakan ruang yang luas dan nyaman, dengan pelayanan yang ramah dan cepat. Selain itu, makanan yang disediakan sangat enak dan sesuai dengan selera jamaah. Terima kasih, Zafira Garden Lounge, atas pengalaman yang luar biasa!</p>
                    <div class="rating wow fadeInUp">
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                    </div>
                    <div class="author wow fadeInUp"><a href="#">Ahmad Yusuf</a></div>

                </div>
            </div>
            <div class="swiper-slide">
                <div class="testimonial-item">
                    <img src="<?= base_url() ?>assets/front/images/item-background/icon-quote.png" alt="">
                    <div class="title wow fadeInUp"><a href="#">Tempat Istirahat yang Nyaman untuk Jamaah Umroh</a></div>
                    <p class="wow fadeInUp">Zafira Garden Lounge benar-benar memikirkan kebutuhan jamaah umroh. Dari saat saya memasuki lounge, saya disambut dengan keramahan dan pelayanan yang luar biasa. Ruangannya bersih dan nyaman, dengan berbagai fasilitas yang membuat waktu tunggu menjadi lebih menyenangkan. Saya merasa sangat dihargai dan diperhatikan di sini. Ini adalah tempat yang sempurna untuk beristirahat sebelum penerbangan panjang. Sangat direkomendasikan!</p>
                    <div class="rating wow fadeInUp">
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                    </div>
                    <div class="author wow fadeInUp"><a href="#">Siti Nurhaliza</a></div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="testimonial-item">
                    <img src="<?= base_url() ?>assets/front/images/item-background/icon-quote.png" alt="">
                    <div class="title wow fadeInUp"><a href="#">Pengalaman yang Memuaskan di Lounge Bandara</a></div>
                    <p class="wow fadeInUp">Pengalaman saya di Zafira Garden Lounge di Bandara Adi Soemarmo Solo sangat memuaskan. Lounge ini menyediakan fasilitas lengkap untuk jamaah haji dan umroh, mulai dari tempat istirahat yang nyaman, makanan halal yang lezat, hingga layanan Wi-Fi gratis. Pelayanannya juga sangat cepat dan profesional. Saya merasa tenang dan nyaman selama menunggu penerbangan. Terima kasih kepada seluruh staf Zafira Garden Lounge atas pelayanan yang luar biasa!</p>
                    <div class="rating wow fadeInUp">
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                    </div>
                    <div class="author wow fadeInUp"><a href="#">Haji Mulyadi</a></div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination style-dot page-title-pagination"></div>
    </div>
</div>
<!-- /wg-testimonial -->

<!-- wg-action -->
<div class="wg-video-full">
    <div class="video-wrap">
        <a href="https://www.youtube.com/watch?v=GX6fWiN_gTA" class="popup-youtube">
            <div class="icon">
                <i class="icon-play3"></i>
            </div>
        </a>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

<script>
    $(document).ready(function() {
        $('.popup-youtube').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            preloader: false,
            fixedContentPos: false
        });
    });
</script>