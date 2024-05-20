<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>

	<?php $this->load->view('pages/layouts/_style'); ?>

	<script src="<?= base_url() ?>assets/front/js/jquery.min.js"></script>

</head>

<body class="body">

	<!-- preload -->
	<div class="preload preload-container">
		<div class="middle"></div>
	</div>
	<!-- /preload -->

	<!-- #wrapper -->
	<div id="wrapper">
		<!-- #page -->
		<div id="page" class="">

			<!-- header -->
			<header id="header_main" class="header header-fixed">
				<div class="header-top">
					<div class="left">
						<div class="wg-information">
							<div class="icon">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="16" viewBox="0 0 13 16">
									<image id="_" data-name="" width="13" height="16" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAgCAYAAAAMq2gFAAADaUlEQVRIia2We29UVRTFfx0uCC3TFtoCxUJRgwISCIjGQEz8xxg/l1/HT4CJPEQwCAIFlTdKQCmP1nagUx5TyE5+x1xO7p1pE3dy00nnzF577bX2Prfv9Hff0iUawGpgDTAADAJN//ccaAFzwDPgFfCiLlXRDcWkI8BG/24A1gsUSeeBx8CMfx9bwLKBgsk48BGwH9gNTAoc7PqAJcEeAXeAi8AF4FoVWBXQOmAb8CnwiUC7gK01RQXYXWACGJPxddnVAq0FdgJfAF8DH9uyobreyvA99dtmJ44BZ4AnVUANqz4CfAMcVpPlxCpgk+f7bW3oN6VhOmWgYWAf8BXw+QpAyhEm+VCNZnXiFeBpIZOg/z5wUE1GKpK0bEXLBGs9NyKjFO/Y/sOe/zt0LGzfiAAHbEEe81YWzroNtBU+OnAI2J6dD0336MZfY84So2GdtVP6KTpBW8seB05lQFHtS5+tOjbFmCMRhT9MjJrac0LqKRaBWwJ8r7jztu6RnxcF+tLfpwjQUZ+hQpcM2r6BCl2uAmdt3Uzpu7ZFYPX7MyDMHaba0BBk2EHLY8H23Bc0j9gOD2XXrvh+jd0aTEtztVrVxWuflcZ/+RuukAUrypP1K/KEzPNoKPZYZoQUr5yp54WumtPzz7IWNnXjtN//VroSoi1bgM8ci6oBbzu4s4VsIslfarGj5LwYyg9KTDcD93TaoLNyxEHPh7xtgZFzupBabNrfnaPxEtAqh2+Xn8czoFg3e4F33W8pOprohudnCmfgiVM/aZW5HgPeTVuy1g3p2L7sfIzBJeB8cmxhWxZdF1OulE3qU451NYLn0ZHFWcFCoxdlS/9r+352OKvmpldE0Q+Ay8AvwM3k5vI1EcP3D/CTrRutYNUrWoKc9pZ9ms7nN+yc936/18boCu+lO6XlO13+It8GSwo55VV8TbP0io7duKA2t/Lf1b0FhTV/dOLHdWO3mFGTU7ZsMT9bt99eyuaM7Ga77LolLRzanss2fE8gTB7uO+EtOVdxJrlsSkY3arZ4zzfVBzqo6fppZu8HLYs4KchCXaJeQC1ZrXfnbVSztAliTo4CP+QuWylQAvtDoTe7dmLZRuJgG0/YumssBygiWhhAsZpitoJhGCXeI9J1/r8AxRKNKzt0iMkPoDDAn3XivxXAG/709S6pPU+LAAAAAElFTkSuQmCC" />
								</svg>
							</div>
							<div class="content">
								<p class="tf-color">Ex Gedung TKI, Terminal Keberangkatan, </p>
								<p>Jalan Bandara Adi Soemarno,</p>
								<p>Kecamatan Ngeplak, Kota Surakarta,</p>
								<p>Jawa Tengah 57108</p>
							</div>
						</div>
						<div class="wg-information">
							<div class="icon">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="13" viewBox="0 0 17 13">
									<image id="_" data-name="" width="17" height="13" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAACIAAAAaCAYAAADSbo4CAAADAElEQVRIic2WWWtTQRiGnzSnaWtbbN2tW4tYUay4XKgg6m/wL/lPvPY3eFkv3FBRUEFRbF3q1s1qkjbyhWdgCF0Sl+oHQybnnHnnnffbpjR54xqZFcBWYAewGxgASsA3YA6YAb4AXb4fAbYBPcCKI7eS82q2/oPzH/n3RcuiIDEGjAJ7gcGMyDwwDbwBvgJliR6WVN2RWxBuADU3/yjGlGOulUjJjU8Dl4GTgld8XxfsPfAQmARe+34COC9GqyLJVlTlu4rcB24CD1S4SaQf2C7YFeAicDQjkVuQOaArJv1dBno9SLEGkdziUPuAPqAbuBNqx8Jxx1XgHLBnDRK4cNx5uO058AzYAlxy7UYWex5TgF5VehEPzzhCiZE2gHoyxeoqE2AH2ySCBMaNvVeBGUQuAKeUtl2rGNQvgdsG8pxuKneAM+r+fUmmMYOtKuiSoMkavq/ohgHnO4FdwIKnW9BlDVVaNE2RYBo9xsgWg71UKOewH8/r92mBUh2om4rDnmJMoH6JNCTxWdkbZkdk1ifJlCTRp/qR9kO6dLbwZGnDJfP7qcDpeU2QETfPo37Yb4P4rCrhfEoyM7quqppnLIRDqtNbZJv9ihUCFar23d+UxmWVjAL42GI46OHPZjj1oqUa9nna0jqu2akSydI3DeNqRSJx2kNihsvvqhDG5WK2rlo4SRZsjwD7NwjWSva8sQqRbgkPWgCXraKPVqm+jSRtTqRilW3XciK5i8vGUr//T1inagbuhH2NRL6dkvwnbLc97KAbH8qKX3UziUScHDdl0/9e5/XNJNLtGFzlXdO1XZtEZEP7r4h00qT+Foeurpb0/RfWLAG/S2Qgy4DUBFcLyPUsgrgcRN7ll9gOrW5dWM4uz7UOMaJjf470vWWHjLKe0nkjlVIVjd7xBHirOjUbXLpWrIWT1jevidEMY+Prltu4V4TE693GW4Gi/ce9I5paYN2zvYeb1iOSQiKuHeGR5n0kLkLRyOJ0nRKJ8hxdNH7D4t4RWKk7t0NkFlj6CW2ly+DSZ9BoAAAAAElFTkSuQmCC" />
								</svg>
							</div>
							<div class="content">
								<p class="tf-color">Kontak Email</p>
								<p>admin.sales@zafiralounge.com</p>
							</div>
						</div>
						<div class="wg-information">
							<div class="icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16">
									<path fill="currentColor" d="M11 10c-1 1-1 2-2 2s-2-1-3-2s-2-2-2-3s1-1 2-2s-2-4-3-4s-3 3-3 3c0 2 2.055 6.055 4 8s6 4 8 4c0 0 3-2 3-3s-3-4-4-3" />
								</svg>
							</div>
							<div class="content">
								<p class="tf-color">Hubungi kami</p>
								<p class="number-phone">TBA</p>
							</div>
						</div>
					</div>
					<!-- <div class="right">
						<div class="button-right">
							<a href="book-a-table.html" class="button-default">BOOK A TABLE</a>
						</div>
					</div> -->
				</div>
				<div class="header-inner">
					<div class="header-inner-wrap">

						<div class="header-left">
							<div id="site-logo">
								<a href="<?= base_url() ?>" rel="home" class="main-logo">
									<img id="logo_header" alt="" src="<?= base_url() ?>assets/front/images/logo/logo-bg-dark-crop.png" data-retina="<?= base_url() ?>assets/front/images/logo/logo-1@2x.png" />
								</a>
							</div>
							<!-- /logo -->
						</div>
						<nav class="main-nav">
							<ul class="menu-primary-menu">
								<li class="menu-item <?= ($this->uri->segment(1) == "home" and $this->uri->segment(1) == "") ? 'current-menu-item' : '' ?>">
									<a href="<?= base_url() ?>">Beranda</a>
								</li>
								<li class="menu-item <?= ($this->uri->segment(2) == 'about') ? 'current-menu-item' : '' ?>">
									<a href="<?= base_url('home/about') ?>">Tentang</a>
								</li>
								<li class="menu-item <?= ($this->uri->segment(1) == 'article') ? 'current-menu-item' : '' ?>">
									<a href="<?= base_url('article') ?>">Artikel</a>
								</li>
								<li class="menu-item <?= ($this->uri->segment(2) == 'contact') ? 'current-menu-item' : '' ?>">
									<a href="<?= base_url('home/contact') ?>">Kontak</a>
								</li>
							</ul>
						</nav><!-- /main-nav -->
						<div class="header-right">
							<!-- <div class="button-right"> -->
							<a href="<?= base_url('home/book') ?>" class="button-default">PESAN</a>
							<!-- </div> -->
							<!-- <div class="header-search">
								<a href="#" class="show-search">
									<i class="icon-search"></i>
								</a>
								<div class="top-search">
									<form class="search-form relative">
										<fieldset class="search">
											<input type="search" placeholder="Search..." class="" name="search" tabindex="2" value="" aria-required="true" required="">
										</fieldset>
										<div class="">
											<button class="" type="submit"><i class="icon-search"></i></button>
										</div>
									</form>
								</div>
							</div> -->
							<div class="mobile-button ">
								<span></span>
							</div>
						</div>
						<!-- /header-right -->
					</div>
				</div>
				<div class="mobile-nav-wrap">
					<div class="overlay-mobile-nav"></div>
					<div class="inner-mobile-nav">
						<div class="relative">
							<a href="<?= base_url() ?>" rel="home" class="main-logo">
								<img id="mobile-logo_header" alt="" src="<?= base_url() ?>assets/front/images/logo/logo-bg-dark-crop.png" data-retina="assets/images/logo/logo-bg-dark-crop.png">
							</a>
							<div class="mobile-nav-close">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="white" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 122.878 122.88" enable-background="new 0 0 122.878 122.88" xml:space="preserve">
									<g>
										<path d="M1.426,8.313c-1.901-1.901-1.901-4.984,0-6.886c1.901-1.902,4.984-1.902,6.886,0l53.127,53.127l53.127-53.127 c1.901-1.902,4.984-1.902,6.887,0c1.901,1.901,1.901,4.985,0,6.886L68.324,61.439l53.128,53.128c1.901,1.901,1.901,4.984,0,6.886 c-1.902,1.902-4.985,1.902-6.887,0L61.438,68.326L8.312,121.453c-1.901,1.902-4.984,1.902-6.886,0 c-1.901-1.901-1.901-4.984,0-6.886l53.127-53.128L1.426,8.313L1.426,8.313z" />
									</g>
								</svg>
							</div>
						</div>
						<nav id="mobile-main-nav" class="mobile-main-nav">
							<ul id="menu-mobile-menu" class="menu">
								<li class="menu-item current-menu-item">
									<a href="<?= base_url() ?>">Beranda</a>
								</li>
								<li class="menu-item">
									<a href="#">Tentang</a>
								</li>
								<li class="menu-item">
									<a href="#">Contact</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</header>
			<!-- /header -->


			<?php if (isset($pages)) $this->load->view($pages); ?>

			<!-- footer -->
			<footer id="footer" class="footer">
				<div class="themesflat-container">
					<div class="row">
						<div class="col-12">
							<div class="logo-footer" id="logo-footer">
								<a href="<?= base_url() ?>">
									<img id="logo_footer" alt="" src="<?= base_url() ?>assets/front/images/logo/logo-bg-dark-crop.png" data-retina="<?= base_url() ?>assets/front/images/logo/logo-bg-dark-crop.png" class="w-25">
								</a>
							</div>
						</div>
						<div class="col-md-4">
							<div class="footer-left">
								<div class="footer-title">WE ARE HERE</div>

								<p>Ex Gedung TKI, Terminal Keberangkatan, <br>
									Jalan Bandara Adi Soemarno,<br>
									Kecamatan Ngeplak, Kota Surakarta,<br>
									Jawa Tengah 57108
								</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="footer-center">
								<p>A distinctive, well-preserved and comfortable space, high-quality products, authentic cuisine, food and drinks are done flawlessly.</p>
								<div class="widget-social-text">
									<ul class="flex-wrap">
										<li><a href="#">facebook</a></li>
										<li><a href="#">instagram</a></li>
										<li><a href="#">tripadvisor</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="footer-right">
								<div class="footer-title">OPENING TIME</div>
								<p>
									Mon - Fri: 08:00 am - 09:00pm <br>
									Sat - Sun: 10:00 am - 11:00pm <br>
									Holiday: Close
								</p>
							</div>
						</div>
						<div class="col-12">
							<div class="footer-bottom">
								<p>Copyright © 2024 Zafira Garden Lounge. All Rights Reserved.</p>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<!-- /footer -->

		</div>
		<!-- /#page -->
	</div>
	<!-- /#wrapper -->

	<!-- cusor -->
	<div class="tf-mouse tf-mouse-outer"></div>
	<div class="tf-mouse tf-mouse-inner"></div>

	<div class="whatsapp-container">
		<a href="https://wa.me/6285240719210" class="whatsapp-icon" target="_blank" rel="noopener noreferrer">
			<i class="fab fa-whatsapp"></i>
		</a>
	</div>
	<!-- go top button -->
	<div class="progress-wrap active-progress">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;"></path>
		</svg>
	</div>
	<div class="progress-wrap-left active-progress">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;"></path>
		</svg>
	</div>
	<!-- <div class=" "> -->
	<!-- </div> -->

	<!-- Javascript -->
	<script src="<?= base_url() ?>assets/front/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/swiper-bundle.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/swiper.js"></script>
	<script src="<?= base_url() ?>assets/front/js/map.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/map.js"></script>
	<script src="<?= base_url() ?>assets/front/js/countto.js"></script>
	<script src="<?= base_url() ?>assets/front/js/count-down.js"></script>
	<script src="<?= base_url() ?>assets/front/js/nouislider.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/magnific-popup.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/wow.min.js"></script>
	<script src="<?= base_url() ?>assets/front/js/main.js"></script>

</body>

</html>