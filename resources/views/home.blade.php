@extends('main')
@section('title',"Home")

@section('ganalytics')
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M7MG2W8" height="0" width="0"
			style="display:none;visibility:hidden"></iframe></noscript>
@endsection

@section('content')
<section class="hero">
		<div class="hero-container">
			<div id="heroCarousel" data-bs-interval="7000" class="carousel slide carousel-fade" data-bs-ride="carousel">
				<ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active" style="background-image: url({{asset('assets/img/homePage.webp')}})">
						<div class="carousel-container">
							<div class="carousel-content">
								<h2 class="animate__animated animate__fadeInUp">Welcome to <span>OM</span></h2>
								<p class="animate__animated animate__fadeInUp">
									We are just a call away. We are a maestro in the field with 100+ successful
									investigations.
								</p>
								<a href="{{route('contact')}}" class="btn-get-started animate__animated animate__fadeInUp">Get
									Free Consultation</a>
							</div>
						</div>
					</div>

					<div class="carousel-item" style="background-image: url({{asset('assets/img/hero2.webp')}})">
						<div class="carousel-container">
							<div class="carousel-content">
								<h2 class="animate__animated animate__fadeInUp">Confidential Investigation. </h2>
								<p class="animate__animated animate__fadeInUp">
									Get all pre-requisite investigation done with complete confidentiality.
								</p>
								<a href="{{route('contact')}}" class="btn-get-started animate__animated animate__fadeInUp">Get
									Free Consultation</a>
							</div>
						</div>
					</div>

					<div class="carousel-item" style="background-image: url({{asset('assets/img/qualityService.webp')}})">
						<div class="carousel-container">
							<div class="carousel-content">
								<h2 class="animate__animated animate__fadeInUp">Quality Service</h2>
								<p class="animate__animated animate__adeInUp">
									We have delivered quality service to clients and has given them hope when no
									solution was feasible.
								</p>
								<a href="{{route('contact')}}" class="btn-get-started animate__animated animate__fadeInUp">Get
									Free Consultation</a>
							</div>
						</div>
					</div>
				</div>

				<a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
					<span class="carousel-control-prev-icon ri-arrow-left-line" aria-hidden="true"></span>
				</a>

				<a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
					<span class="carousel-control-next-icon ri-arrow-right-line" aria-hidden="true"></span>
				</a>
			</div>
		</div>
	</section>

	<main id="main">
		<section class="about">
			<div class="container">
				<div class="row content">
					<div class="col-lg-6 mb-3" data-aos="fade-right">
						<h3 data-aos="fade-up" data-aos-delay="100">What is Om RN Detective Private Limited</h3>
						<p class="text-muted" data-aos="fade-bottom" data-aos-delay="100">
							<small>
								The private detective agency is dedicated to serve the necessity of the people; it is a
								client centric organization. The organization has an expert who tries to bring the edge
								of the investigation. It has always given the exact information that the client has
								always asked. The level of satisfaction is always higher for the clients.
							</small>
						</p>
					</div>
					<div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">
						<img loading="lazy" alt="about" src="{{asset('assets/img/whatIsOMRN.webp')}}" load="lazy"
							style="width: 100%" />
					</div>
				</div>
			</div>
		</section>
		<section class="services section-bg-dark">
			<div class="container">
				<div class="section-title" data-aos="fade-up">
					<span></span>
					<h2 class="text-light">
						Our Services
						<!-- todo search icon -->
					</h2>
					<p style="color: #dee2e6">
						We cover a vast list of services spread accross a wide set of requirements aligned to the needs
						of our clients.
					</p>
				</div>

				<div class="row">
				@foreach($service as $image)
					<div class="col-md-3 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="100">
						<div class="card" style="width: 100%">
							<img loading="lazy" src="{{asset('/images/service/'.$image->image)}}" class="card-img-top"
								alt="service" />
							<div class="card-body">
								<h4 class="card-title">{{$image->title}}</h4>
								<p class="card-text">{{$image->description}}</p>
							</div>
						</div>
					</div>
				@endforeach
				</div>
					<!-- <div class="col-md-3 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="200">
						<div class="card" style="width: 100%">
							<img loading="lazy" src="{{asset('assets/img/preMatrimonial.webp')}}" class="card-img-top"
								alt="service" />
							<div class="card-body">
								<h4 class="card-title">Pre-Marital Investigation</h4>
								<p class="card-text">The investigation is done to know the authenticity of the person,
									whether the person has any criminal background..</p>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="300">
						<div class="card" style="width: 100%">
							<img loading="lazy" src="{{asset('assets/img/privateInvestigation.webp')}}" class="card-img-top"
								alt="service" />
							<div class="card-body">
								<h4 class="card-title">Post Marital Investigation</h4>
								<p class="card-text">The investigation is done in order to know that there is any
									existing investigation that is ongoing with the person concerned</p>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="400">
						<div class="card" style="width: 100%">
							<img loading="lazy" src="{{asset('assets/img/legal.webp')}}" class="card-img-top" alt="service" />
							<div class="card-body">
								<h4 class="card-title">Legal help</h4>
								<p class="card-text">Legal help is provided to the person who requires legal help
									regarding their companies or any other issues especially marital cases.</p>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="500">
						<div class="card" style="width: 100%">
							<img loading="lazy" src="{{asset('assets/img/underCovered.webp')}}" class="card-img-top"
								alt="service" />
							<div class="card-body">
								<h4 class="card-title">Undercover operation</h4>
								<p class="card-text">To find and investigate any respective cases without letting anyone
									know about the fact of investigation.</p>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="600">
						<div class="card" style="width: 100%">
							<img loading="lazy" src="{{asset('assets/img/shadowing.webp')}}" class="card-img-top" alt="service" />
							<div class="card-body">
								<h4 class="card-title">Shadowing</h4>
								<p class="card-text">This is done to follow some very closely and observe someone very
									closely..</p>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="700">
						<div class="card" style="width: 100%">
							<img loading="lazy" src="{{asset('assets/img/extraMarital.webp')}}" class="card-img-top"
								alt="service" />
							<div class="card-body">
								<h4 class="card-title">Extramarital Affair Investigation</h4>
								<p class="card-text">It helps in investigating when there are extra marital affairs with
									the person..</p>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="800">
						<div class="card" style="width: 100%">
							<img loading="lazy" src="{{asset('assets/img/fraud.webp')}}" class="card-img-top" alt="service" />
							<div class="card-body">
								<h4 class="card-title">Fraud cases Investigation</h4>
								<p class="card-text">When a person falls in a trap of fraud cases, then there is an
									investigation that is done.</p>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="800">
						<div class="card" style="width: 100%">
							<img loading="lazy" src="{{asset('assets/img/missingPerson.webp')}}" class="card-img-top"
								alt="service" />
							<div class="card-body">
								<h4 class="card-title">Missing person tracing</h4>
								<p class="card-text">It helps in tracing the missing person who has been missing for a
									very long time. .</p>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="800">
						<div class="card" style="width: 100%">
							<img loading="lazy" src="{{asset('assets/img/employmentVerification.webp')}}" class="card-img-top"
								alt="service" />
							<div class="card-body">
								<h4 class="card-title">Employment verification</h4>
								<p class="card-text">It is a part of the corporate investigation that involves the
									background verification of the candidate who will be joining the organization.</p>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="800">
						<div class="card" style="width: 100%">
							<img loading="lazy" src="{{asset('assets/img/familyBackground.webp')}}" class="card-img-top"
								alt="service" />
							<div class="card-body">
								<h4 class="card-title">Family Background</h4>
								<p class="card-text">It often happens during the pre-marital investigation, when people
									try to know about the family of the person related.</p>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="800">
						<div class="card" style="width: 100%">
							<img loading="lazy" src="{{asset('assets/img/corporate.webp')}}" class="card-img-top" alt="service" />
							<div class="card-body">
								<h4 class="card-title">Corporate Investigation</h4>
								<p class="card-text">This involves the background verification that is performed for the
									candidate who will be joining. The corporate investigation often includes
									investigating if there is any fishy incident taking place.</p>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</section>

		<section class="review-container">
			<div class="container position-relative">
				<div class="slider swiper-container" data-aos="fade-up">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<div class="review-wrapper">
								<img loading="lazy" src="{{asset('assets/img/min.webp')}}" alt="review" />
								<h3>Min</h3>
								<h4>Medical Representative</h4>
								<p class="animate__animated animate__fadeInDown">
									The company helped me in fraud case investigation that saved me from facing a huge
									loss.
								</p>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="review-wrapper">
								<img loading="lazy" src="{{asset('assets/img/shivani.webp')}}" alt="review" />
								<h3>Shivani</h3>
								<h4>Professor</h4>
								<p>
									<i class="bx bxs-quote-alt-left quote-icon-left"></i>
									They helped me in my divorce related case.
									<i class="bx bxs-quote-alt-right quote-icon-right"></i>
								</p>
							</div>
						</div>

						<div class="swiper-slide">
							<div class="review-wrapper">
								<img loading="lazy" src="{{asset('assets/img/kankana.webp')}}" alt="review" />
								<h3>Kankana</h3>
								<h4>Teacher</h4>
								<p>
									<i class="bx bxs-quote-alt-left quote-icon-left"></i>
									They helped me in pre marital investigation and I was saved from marrying a wrong
									person.
									<i class="bx bxs-quote-alt-right quote-icon-right"></i>
								</p>
							</div>

						</div>
						<div class="swiper-pagination"></div>
					</div>
				</div>
		</section>

		<section class="contact">
			<div class="container">
				<div class="section-title">
					<h2 data-aos="fade-up">Contact Us</h2>
					<p data-aos="fade-up">Feel free to reachout to us! Details are provided below.</p>
				</div>

				<div class="row box" data-aos="fade-up" data-aos-delay="100">
					<div class="col-md-8 line-r-hr">
						<div class="box-header text-center mt-3 p-3" data-aos="fade-up" data-aos-delay="200">
							<span class="icon_wrapper">
								<i class="bi bi-geo-alt-fill"></i>
							</span>
							<h3 style="margin-top: 0.8rem">Our Address</h3>
							<p>
								AC-3, Ground Floor.<br />
								Kestopur. VIP East. <br />Opposite Sarathi Sweet shop. <br />Kolkata - 700101
							</p>
						</div>
						<div class="map" data-aos="fade-up" data-aos-delay="250">
							<iframe
								src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14732.680288703368!2d88.4284307!3d22.6101234!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9e7c33a4e5c5f644!2sOm%20RN%20Detective%20Private%20Limited!5e0!3m2!1sen!2sin!4v1630947639625!5m2!1sen!2sin"
								width="100%" height="300px" style="border: 0" allowfullscreen=""
								loading="lazy"></iframe>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row p-3" style="height: 100%">
							<div class="col-12 info mt-4 mt-lg-0 pt-3 text-center line-b-vr" data-aos="fade-up"
								data-aos-delay="300">
								<span class="icon_wrapper">
									<i class="bi bi-envelope-fill"></i>
								</span>
								<h4 style="margin-top: 0.8rem">Email</h4>
								<p><a href="mailto:omrndetective@gmail.com">omrndetective@gmail.com</a></p>
							</div>

							<div class="col-12 info mt-4 mt-lg-0 pt-4 text-center line-b-vr" data-aos="fade-up"
								data-aos-delay="350">
								<span class="icon_wrapper">
									<i class="bi bi-telephone"></i>
								</span>
								<h4 style="margin-top: 1rem">Call</h4>
								<p><a href="tel:+91 8416090681">8416090681</a> <br /><a
										href="tel:+91 9062121384">9062121384</a></p>
							</div>

							<div class="col-12 info mt-4 mt-lg-0 pt-4 text-center" data-aos="fade-up"
								data-aos-delay="400">
								<span class="icon_wrapper"><i class="bi bi-whatsapp"></i> </span>
								<h4 style="margin-top: 1rem">WhatsApp</h4>
								<p><a href="https://wa.me/+918416090681">8416090681</a> <br /><a
										href="https://wa.me/+919062121384">9062121384</a></p>
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
							<input type="text" name="name" class="form-control" id="input-name" placeholder="Your Name"
								required />
						</div>
						<div class="col-md-6 form-group mt-3 mt-md-0">
							<input type="email" class="form-control" name="email" id="input-email"
								placeholder="Your Email" required />
						</div>
					</div>
					<div class="form-group mt-3">
						<input type="text" class="form-control" name="subject" id="input-subject" placeholder="Subject"
							required />
					</div>
					<div class="form-group mt-3">
						<textarea class="form-control" name="message" id="input-message" rows="5" placeholder="Message"
							style="resize: none;" required></textarea>
					</div>
					<div class="text-center mt-4"><button type="submit">Send Message</button></div>
				</form>
			</div>
		</section>
	</main>
 @endsection