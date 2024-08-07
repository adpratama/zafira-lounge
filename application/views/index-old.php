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
	<style>
		/* width */
		::-webkit-scrollbar {
			width: 5px;
		}

		/* Track */
		::-webkit-scrollbar-track {
			box-shadow: inset 0 0 5px grey;
			border-radius: 2px;
		}

		/* Handle */
		::-webkit-scrollbar-thumb {
			background: #38a4ff;
			border-radius: 2px;
		}

		/* Handle on hover */
		::-webkit-scrollbar-thumb:hover {
			background: #007bff;
		}
	</style>
</head>

<body>
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message_name') ?>"></div>
	<div class="flash-data-error" data-flashdata="<?= $this->session->flashdata('message_error') ?>"></div>

	<!-- header-start -->
	<header>
		<div class="header-area ">
			<div id="sticky-header" class="main-header-area">
				<div class="container-fluid p-0">
					<div class="row align-items-center no-gutters">
						<div class="col-xl-5 col-lg-6">
							<div class="main-menu  d-none d-lg-block">
								<nav>
									<ul id="navigation">
										<li><a class="<?= ($this->uri->segment(1) == '') ? 'active' : '' ?>" href="<?= base_url() ?>">home</a></li>
										<!-- <li><a href="rooms.html">rooms</a></li> -->
										<li><a href="<?= base_url('home/about') ?>" class="<?= ($this->uri->segment(2) == 'about') ? 'active' : '' ?>">About</a></li>
										<!-- <li><a href="#">blog <i class="ti-angle-down"></i></a>
											<ul class="submenu">
												<li><a href="blog.html">blog</a></li>
												<li><a href="single-blog.html">single-blog</a></li>
											</ul>
										</li> -->
										<!-- <li><a href="#">pages <i class="ti-angle-down"></i></a>
											<ul class="submenu">
												<li><a href="elements.html">elements</a></li>
											</ul>
										</li> -->
										<li><a href="contact.html">Contact</a></li>
									</ul>
								</nav>
							</div>
						</div>
						<div class="col-xl-2 col-lg-2">
							<div class="logo-img">
								<a href="<?= base_url() ?>">
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
									<!-- <a class="popup-with-form d-block" href="#test-form">Book A Room</a> -->
									<button type="button" class="genric-btn info" data-toggle="modal" data-target="#exampleModal">
										Book A Room
									</button>
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
				<div class="row justify-content-between">
					<div class="col-xl-2 col-md-6 col-lg-2">
						<div class="footer_widget">
							<h3 class="footer_title">
								Navigation
							</h3>
							<ul>
								<li><a href="#">Home</a></li>
								<!-- <li><a href="#">Rooms</a></li> -->
								<li><a href="#">About</a></li>
								<li><a href="#">News</a></li>
							</ul>
						</div>
					</div>
					<div class="col-xl-4 col-md-6 col-lg-4">
						<div class="footer_widget">
							<h3 class="footer_title">
								Address
							</h3>
							<p class="footer_text"> Adi Soemarmo International Airport</p>
							<!-- <a href="#" class="line-button">Get Direction</a> -->
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.564833097434!2d110.74662930977915!3d-7.51319509246823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1372ba370a85%3A0x22d08547623e7ddd!2sAdi%20Soemarmo%20International%20Airport!5e0!3m2!1sen!2sid!4v1710229767621!5m2!1sen!2sid" width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</div>
					<div class="col-xl-4 col-md-6 col-lg-4">
						<div class="footer_widget">
							<h3 class="footer_title">
								Reservation
							</h3>
							<p class="footer_text">(021) 250 955 56 <br>+62 851 8680 8072 <br>+62 895 5147 9079
								reservation@zafiralounge.com</p>
							<p class="footer_text">Zafira Garden Lounge Garden operates daily from 06:00 AM until 22:00 PM. The lounge also remains open during holiday seasons and special occasions; however, its operational hours may vary according to flight schedules.</p>
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



	<div class="book-container d-block d-xs-block d-sm-block d-md-block d-lg-none">
		<button type="button" class="" data-toggle="modal" data-target="#exampleModal">
			Book A Room
		</button>
	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Booking form</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form class="" action="<?= base_url('booking/add') ?>" method="POST">
					<div class="modal-body">
						<div class="row justify-content-center">
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="customer_name">Name</label>
									<input name="customer_name" class="form-control" data-label="Name" placeholder="Enter your name" required>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="email">Email address</label>
									<input name="email" class="form-control" data-label="Email" placeholder="Enter your email" required>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="phone_number">Whatsapp number</label>
									<input name="phone_number" class="form-control" data-label="book number" placeholder="Enter book number. ex: 62811" required>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="booking_date">Booking date</label>
									<input name="booking_date" id="datepicker" data-label="Booking date" placeholder="Booking date" required>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="pax">Pax</label>
									<input name="pax" id="pax" class="form-control" data-label="Pax" placeholder="Enter pax" oninput="calculateTotal()" value="<?= $this->input->post('pax') ?>" required>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="Lounge">Room type</label>
									<select name="lounge" class="form-control" id="lounge" data-label="Room type" required>
										<!-- <option data-display="Room type">Room type</option> -->
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
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="price">Price</label>
									<input type="text" class="form-control" name="price" id="price" data-label="Price" placeholder="Price" value="0" readonly>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="subtotal">Subtotal</label>
									<input type="text" class="form-control" name="subtotal" id="subtotal" value="0" readonly>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="tax">Tax</label>
									<input type="text" class="form-control" name="tax" id="tax" data-label="Tax" placeholder="Tax" value="0" readonly>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="total">Total</label>
									<input type="text" class="form-control" name="total" id="total" value="0" readonly>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="genric-btn primary" data-dismiss="modal">Close</button>
						<button type="submit" class="genric-btn info">Book now</button>
					</div>
				</form>
			</div>
		</div>
	</div>

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