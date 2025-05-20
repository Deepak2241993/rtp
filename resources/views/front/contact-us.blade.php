@extends('layouts.master')

@section('content')


<!-- main body - start
		================================================== -->
		<main>


			<!-- breadcrumb-section - start
			================================================== -->
			<!-- <section id="breadcrumb-section" class="breadcrumb-section d-flex align-items-center decoration-wrap clearfix" data-background="assets/images/background/bg_1.jpg">
				<div class="container text-center">
					<h1 class="page-title mb-3">Contact Us</h1>
					<div class="breadcrumb-nav ul-li-center clearfix">
						<ul class="clearfix">
							<li><a href="index.html">Home</a></li>
							<li class="active">Contact</li>
						</ul>
					</div>
				</div>

				<span class="decoration-image pill-image-1">
					<img src="assets/images/decoration/pill_1.png" alt="pill_image_not_found">
				</span>
			</section> -->
			<!-- breadcrumb-section - end
			================================================== -->


			<!-- contact-section - start
			================================================== -->
			<section id="contact-section" class="contact-section sec-ptb-100 clearfix">
				<div class="container">
					<div class="row mt--40 mb-100 justify-content-lg-between justify-content-md-center justify-content-sm-center">
						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="primary-contact-info ul-li-block">
								<span class="item-icon">
									<i class="las la-clock"></i>
								</span>
								<h3 class="item-title">Opening Time</h3>
								<ul class="clearfix">
									<li>Sunday – Friday: 09:00am – 10:30pm</li>
									<li>Saturday: 10:00am – 02:00pm</li>
								</ul>
							</div>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="primary-contact-info ul-li-block">
								<span class="item-icon">
									<i class="las la-headset"></i>
								</span>
								<h3 class="item-title">Contact Info.</h3>
								<ul class="clearfix">
									<li>Email: info@readytoprint.com.au</li>
									<li>Phone: (02) 96213111</li>
								</ul>
							</div>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="primary-contact-info ul-li-block">
								<span class="item-icon">
									<i class="las la-map-marked-alt"></i>
								</span>
								<h3 class="item-title">Contact Address</h3>
								<ul class="clearfix">
									<li>Unit 3/31 Binney Road,Kings </li>
									<li>Park Blacktown 2148</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="map-wrap mb-100">
					<!--<div id="mapBox" data-lat="40.701083" data-lon="-74.1522848" data-zoom="10" data-info="Unit 3/31 Binney Road,Kings Park Blacktown 2148" data-mlat="40.701083" data-mlon="-74.1522848">-->
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3317.6620924574618!2d150.9035562!3d-33.7435529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b129926c3955555%3A0x14295e2d3dea64d4!2s3%2F31%20Binney%20Rd%2C%20Kings%20Park%20NSW%202148%2C%20Australia!5e0!3m2!1sen!2sin!4v1710750908754!5m2!1sen!2sin" width="1200" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>

				<div class="container">
					<div class="contact-form bg-gray">
						<h3 class="title-text text-center mb-60">Get in Touch</h3>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<form action="#" method="POST">
								<div class="form-item">
									<input type="text" name="name" placeholder="Name" required>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-item">
									<input type="email" name="email" placeholder="Email" required>
								</div>
							</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-item">
									<input type="tel" name="phone" placeholder="Phone" required>
								</div>
							</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-item">
									<input type="text" name="businessname" placeholder="Business Name">
								</div>
							</div>
						</div>
						<div class="form-item">
							<textarea name="message" placeholder="Message"></textarea>
						</div>
						<div class="btn-wrap text-center">
							
							<button type="submit" class="btn bg-royal-blue">Submit</button>
						</div>
				</div>
				</div>
			</section>
			<!-- contact-section - end
			================================================== -->


		</main>
		<!-- main body - end
		================================================== -->


















@endsection