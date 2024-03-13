<!-- bradcam_area_start -->
<div class="bradcam_area breadcam_bg">
    <h3>About Montana</h3>
</div>
<!-- bradcam_area_end -->

<!-- about_area_start -->

<div class="about_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-5">
                <div class="about_info">
                    <div class="section_title mb-20px">
                        <span>About us</span>
                        <h3>Zafira Garden <br>
                            Lounge</h3>
                    </div>
                    <p>An exclusive oasis within the airport, offering comfort and luxury for travelers awaiting their flights. With its strategic location within the airport terminal, Zafira Lounge Garden is the top choice for those seeking a relaxed and comfortable travel experience.</p>
                    <!-- <a href="#" class="line-button">Learn more...</a> -->
                </div>
            </div>
            <div class="col-xl-7 col-lg-7">
                <div class="about_thumb d-flex">
                    <div class="img_1 w-100">
                        <img src="<?= base_url() ?>assets/front/img/about/about-1.jpeg" alt="">
                    </div>
                    <div class="img_2 w-100">
                        <img src="<?= base_url() ?>assets/front/img/about/about-2.jpeg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about_area_end -->

<!-- about_info_area_start -->
<div class="about_info_area">
    <div class="about_active owl-carousel">
        <div class="single_slider slider_bg_1"></div>
        <div class="single_slider slider_bg_1"></div>
        <!-- <div class="single_slider about_bg_1"></div>
        <div class="single_slider about_bg_1"></div> -->
    </div>
</div>
<!-- about_info_area_start -->

<!-- about_main_info_start -->
<div class="features_room">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title text-center mb-100">
                    <span>Featured Rooms</span>
                    <h3>Choose a Better Room</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="rooms_here">
        <?php
        foreach ($lounges as $l) :
            $price = $l->price_per_pax / 1000;
        ?>
            <div class="single_rooms">
                <div class="room_thumb">
                    <img src="<?= base_url() ?>assets/front/img/rooms/1.png" alt="">
                    <div class="room_heading d-flex justify-content-between align-items-center">
                        <div class="room_heading_inner">
                            <span>From Rp<?= $price ?>k/day</span>
                            <h3><?= $l->lounge_name ?></h3>
                        </div>
                        <!-- <a href="#test-form" class="line-button popup-with-form">book now</a> -->
                        <button type="button" class="line-button genric-btn info" data-toggle="modal" data-target="#exampleModal">
                            Book A Room
                        </button>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
        ?>
    </div>
</div>
<!-- about_main_info_end -->

<!-- forQuery_start -->

<div class="forQuery">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1 col-md-12">
                <div class="Query_border">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-6 col-md-6">
                            <div class="Query_text">
                                <p>For Reservation 0r Query?</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="phone_num">
                                <a href="https://wa.me/628170773567" class="mobile_no" target="_blank">+62 817-0773-567</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- forQuery_end-->

<!-- instragram_area_start -->
<div class="instragram_area">
    <div class="single_instagram">
        <img src="<?= base_url() ?>assets/front/img/instragram/1.png" alt="">
        <div class="ovrelay">
            <a href="#">
                <i class="fa fa-instagram"></i>
            </a>
        </div>
    </div>
    <div class="single_instagram">
        <img src="<?= base_url() ?>assets/front/img/instragram/2.png" alt="">
        <div class="ovrelay">
            <a href="#">
                <i class="fa fa-instagram"></i>
            </a>
        </div>
    </div>
    <div class="single_instagram">
        <img src="<?= base_url() ?>assets/front/img/instragram/3.png" alt="">
        <div class="ovrelay">
            <a href="#">
                <i class="fa fa-instagram"></i>
            </a>
        </div>
    </div>
    <div class="single_instagram">
        <img src="<?= base_url() ?>assets/front/img/instragram/4.png" alt="">
        <div class="ovrelay">
            <a href="#">
                <i class="fa fa-instagram"></i>
            </a>
        </div>
    </div>
    <div class="single_instagram">
        <img src="<?= base_url() ?>assets/front/img/instragram/5.png" alt="">
        <div class="ovrelay">
            <a href="#">
                <i class="fa fa-instagram"></i>
            </a>
        </div>
    </div>
</div>
<!-- instragram_area_end -->