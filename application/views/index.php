<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Zafira Garden</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- <link rel="manifest" href="site.webmanifest"> -->
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/front/img/favicon.png">
	<!-- Place favicon.ico in the root directory -->

	<!-- CSS here -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/front/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/front/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/front/css/magnific-popup.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/front/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/front/css/themify-icons.css">
	<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/front/css/nice-select.css"> -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/front/css/flaticon.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/front/css/gijgo.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/front/css/animate.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/front/css/slicknav.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/front/css/style.css">
	<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/front/css/responsive.css"> -->
</head>

<body>
	<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

	<!-- header-start -->

	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message_name') ?>"></div>
	<div class="flash-data-error" data-flashdata="<?= $this->session->flashdata('message_error') ?>"></div>
	<header>
		<div class="header-area ">
			<div id="sticky-header" class="main-header-area">
				<div class="container-fluid p-0">
					<div class="row align-items-center no-gutters">
						<div class="col-xl-5 col-lg-6">
							<div class="main-menu  d-none d-lg-block">
								<nav>
									<ul id="navigation">
										<li><a class="active" href="index.html">home</a></li>
										<li><a href="rooms.html">rooms</a></li>
										<li><a href="about.html">About</a></li>
										<li><a href="#">blog <i class="ti-angle-down"></i></a>
											<ul class="submenu">
												<li><a href="blog.html">blog</a></li>
												<li><a href="single-blog.html">single-blog</a></li>
											</ul>
										</li>
										<li><a href="#">pages <i class="ti-angle-down"></i></a>
											<ul class="submenu">
												<li><a href="elements.html">elements</a></li>
											</ul>
										</li>
										<li><a href="contact.html">Contact</a></li>
									</ul>
								</nav>
							</div>
						</div>
						<div class="col-xl-2 col-lg-2">
							<div class="logo-img">
								<a href="index.html">
									<img src="<?= base_url() ?>assets/front/img/logo.jpg" alt="" style="width: 112px">
								</a>
							</div>
						</div>
						<div class="col-xl-5 col-lg-4 d-none d-lg-block">
							<div class="book_room">
								<div class="socail_links">
									<ul>
										<li>
											<a href="#">
												<i class="fa fa-facebook-square"></i>
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-twitter"></i>
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-instagram"></i>
											</a>
										</li>
									</ul>
								</div>
								<div class="book_btn d-none d-lg-block">
									<a class="popup-with-form" href="#test-form">Book A Room</a>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="mobile_menu d-block d-lg-none"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- header-end -->

	<?php if (isset($pages)) $this->load->view($pages); ?>


	<!-- footer -->
	<footer class="footer">
		<div class="footer_top">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-md-6 col-lg-3">
						<div class="footer_widget">
							<h3 class="footer_title">
								address
							</h3>
							<p class="footer_text"> 200, Green road, Mongla, <br>
								New Yor City USA</p>
							<a href="#" class="line-button">Get Direction</a>
						</div>
					</div>
					<div class="col-xl-3 col-md-6 col-lg-3">
						<div class="footer_widget">
							<h3 class="footer_title">
								Reservation
							</h3>
							<p class="footer_text">+10 367 267 2678 <br>
								reservation@Zafira Garden.com</p>
						</div>
					</div>
					<div class="col-xl-2 col-md-6 col-lg-2">
						<div class="footer_widget">
							<h3 class="footer_title">
								Navigation
							</h3>
							<ul>
								<li><a href="#">Home</a></li>
								<li><a href="#">Rooms</a></li>
								<li><a href="#">About</a></li>
								<li><a href="#">News</a></li>
							</ul>
						</div>
					</div>
					<div class="col-xl-4 col-md-6 col-lg-4">
						<div class="footer_widget">
							<h3 class="footer_title">
								Newsletter
							</h3>
							<form action="#" class="newsletter_form">
								<input type="text" placeholder="Enter your mail">
								<button type="submit">Sign Up</button>
							</form>
							<p class="newsletter_text">Subscribe newsletter to get updates</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="copy-right_text">
			<div class="container">
				<div class="footer_border"></div>
				<div class="row">
					<div class="col-xl-8 col-md-7 col-lg-9">
						<p class="copy_right">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>
								document.write(new Date().getFullYear());
							</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
					<div class="col-xl-4 col-md-5 col-lg-3">
						<div class="socail_links">
							<ul>
								<li>
									<a href="#">
										<i class="fa fa-facebook-square"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-twitter"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-instagram"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<!-- link that opens popup -->

	<!-- form itself end-->
	<form id="test-form" class="white-popup-block mfp-hide" action="<?= base_url('booking/add') ?>" method="POST">
		<div class="popup_box ">
			<div class="popup_inner">
				<h3>Booking form</h3>
				<div class="row">
					<div class="col-xl-6">
						<input name="customer_name" class="form-control" data-label="Name" placeholder="Enter your name">
					</div>
					<div class="col-xl-6">
						<input name="email" class="form-control" data-label="Email" placeholder="Enter your email">
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-xl-6">
						<input name="phone_number" class="form-control" data-label="Whatsapp number" placeholder="Enter whatsapp number. ex: 62811">
					</div>
					<div class="col-xl-6">
						<input name="booking_date" id="datepicker" data-label="Booking date" placeholder="Booking date">
					</div>
				</div>
				<div class="row">
					<div class="col-xl-6">
						<input name="pax" id="pax" class="form-control" data-label="Pax" placeholder="Enter pax" oninput="calculateTotal()" value="<?= $this->input->post('pax') ?>">
					</div>
					<div class="col-xl-6">
						<select name="lounge" class="form-control" id="lounge" data-label="Room type">
							<option data-display="Room type">Room type</option>
							<?php
							foreach ($lounges as $l) :
							?>
								<option data-price="<?= $l->price_per_pax ?>" value="<?= $l->Id ?>"><?= $l->lounge_name ?></option>
							<?php
							endforeach;
							?>
						</select>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-xl-6">
						<input type="text" class="form-control" name="price" id="price" data-label="Price" placeholder="Price" value="0" readonly>
					</div>
					<div class="col-xl-6">
						<input type="text" class="form-control" name="total" id="total" value="0" readonly>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-xl-12">
						<button type="submit" class="boxed-btn3 btn-confirm">Book now</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- form itself end -->

	<!-- JS here -->
	<script src="<?= base_url() ?>assets/front/js/vendor/modernizr-3.5.0.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/vendor/jquery-1.12.4.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/popper.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/owl.carousel.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/isotope.pkgd.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/ajax-form.js"></script>
	<script src="<?= base_url() ?>assets/front/js/waypoints.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/jquery.counterup.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/imagesloaded.pkgd.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/scrollIt.js"></script>
	<script src="<?= base_url() ?>assets/front/js/jquery.scrollUp.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/wow.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/nice-select.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/jquery.slicknav.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/jquery.magnific-popup.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/plugins.js"></script>
	<script src="<?= base_url() ?>assets/front/js/gijgo.min.js"></script>

	<!--contact js-->
	<script src="<?= base_url() ?>assets/front/js/contact.js"></script>
	<script src="<?= base_url() ?>assets/front/js/jquery.ajaxchimp.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/jquery.form.js"></script>
	<script src="<?= base_url() ?>assets/front/js/jquery.validate.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/mail-script.js"></script>

	<script src="<?= base_url() ?>assets/front/js/main.js"></script>
	<script src="<?= base_url() ?>assets/front/js/script.js"></script>

	<script type="text/javascript" src="https://repo.rachmat.id/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="https://repo.rachmat.id/jquery-ui-1.12.1/jquery-ui.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		$("#datepicker2").datepicker({
			iconsLibrary: "fontawesome",
			icons: {
				rightIcon: '<span class="fa fa-caret-down"></span>',
			},
			minDate: new Date(new Date().getTime() + 24 * 60 * 60 * 1000),
		});

		const flashdata = $(".flash-data").data("flashdata");

		if (flashdata) {
			Swal.fire({
				title: "Success!! ",
				text: flashdata,
				icon: "success",
			});
		}

		const flashdata_error = $(".flash-data-error").data("flashdata");
		if (flashdata_error) {
			Swal.fire({
				title: "Error!! ",
				text: flashdata_error,
				icon: "error",
			});
		}
	</script>
</body>

</html>