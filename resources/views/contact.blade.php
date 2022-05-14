@extends('main')
@section('title',"Home")

@section('ganalytics')
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M7MG2W8" height="0" width="0"
			style="display:none;visibility:hidden"></iframe></noscript>
@endsection

@section('content')

<!-- <section class="breadcrumbs">
			<div class="container">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li>Contact us</li>
				</ul>
				<h2>Contact us</h2>
			</div>
		</section> -->
@include('partials._breadcrumbs')
		<section id="contact" class="contact">
			<div class="container">
				<div class="section-title" data-aos="fade-up">
					<h2>Contact Us</h2>
					<p>Feel free to reachout to us! Details are provided below.</p>
				</div>

				<div class="row box" data-aos="fade-up" data-aos-delay="100">
					<div class="col-md-8 line-r-hr">
						<div class="box-header text-center mt-3 p-3" data-aos="fade-up" data-aos-delay="200">
							<span class="icon_wrapper">
								<i class="bi bi-geo-alt-fill"></i>
							</span>
							<h3 style="margin-top: 0.8rem">Our Address</h3>
							<p>AC-3, Ground Floor. Kestopur. VIP East. <br />Opposite Sarathi Sweet shop. <br />Kolkata - 700101</p>
						</div>
						<div class="map" data-aos="fade-up" data-aos-delay="250">
							<iframe
								src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14732.680288703368!2d88.4284307!3d22.6101234!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9e7c33a4e5c5f644!2sOm%20RN%20Detective%20Private%20Limited!5e0!3m2!1sen!2sin!4v1630947639625!5m2!1sen!2sin"
								width="100%"
								height="300px"
								style="border: 0"
								allowfullscreen=""
								loading="lazy"
							></iframe>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row p-3" style="height: 100%">
							<div class="col-12 info mt-4 mt-lg-0 pt-3 text-center line-b-vr" data-aos="fade-up" data-aos-delay="300">
								<span class="icon_wrapper">
									<i class="bi bi-envelope-fill"></i>
								</span>
								<h4 style="margin-top: 0.8rem">Email</h4>
								<p><a href="mailto:omrndetective@gmail.com">omrndetective@gmail.com</a></p>
							</div>

							<div class="col-12 info mt-4 mt-lg-0 pt-4 text-center line-b-vr" data-aos="fade-up" data-aos-delay="350">
								<span class="icon_wrapper">
									<i class="bi bi-telephone"></i>
								</span>
								<h4 style="margin-top: 1rem">Call</h4>
								<p><a href="tel:+91 8416090681">8416090681</a> <br /><a href="tel:+91 9062121384">9062121384</a></p>
							</div>

							<div class="col-12 info mt-4 mt-lg-0 pt-4 text-center" data-aos="fade-up" data-aos-delay="400">
								<span class="icon_wrapper"><i class="bi bi-whatsapp"></i> </span>
								<h4 style="margin-top: 1rem">WhatsApp</h4>
								<p><a href="https://wa.me/+918416090681">8416090681</a> <br /><a href="https://wa.me/+919062121384">9062121384</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="container mt-3" data-aos="fade-up" data-aos-delay="100">
				<form action="{{route('usercontact.store')}}" method="post" role="form" class="box form p-4 pt-5" id="contact-form">
					@csrf()
					<input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
					<div class="row">
						<div class="col-md-6 form-group">
							<input type="text" name="name" class="form-control" id="input-name" placeholder="Your Name" required />
						</div>
						<div class="col-md-6 form-group mt-3 mt-md-0">
							<input type="email" class="form-control" name="email" id="input-email" placeholder="Your Email" required />
						</div>
					</div>
					<div class="form-group mt-3">
						<input type="text" class="form-control" name="subject" id="input-subject" placeholder="Subject" required />
					</div>
					<div class="form-group mt-3">
						<textarea class="form-control" name="message" id="input-message" rows="5" placeholder="Message" required></textarea>
					</div>
					<div class="text-center mt-4"><button type="submit">Send Message</button></div>
				</form>
				<div>@include('partials._message')</div>
			</div>
		</section>


 @endsection