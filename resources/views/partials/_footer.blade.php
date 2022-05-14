<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-info">
						<h3>OM</h3>
						<p>
							AC-3, Ground Floor.<br />
							Kestopur. VIP East.<br />
							Opposite Sarathi Sweet shop.<br />
							Kolkata - 700101<br />
						</p>
					</div>
				</div>

				<div class="col-lg-2 col-md-6 footer-links">
					<h4>Useful Links</h4>
					<ul>
						<li><i class="bi bi-chevron-double-right"></i> <a href="{{ route('home') }}">Home</a></li>
						<li><i class="bi bi-chevron-double-right"></i> <a href="{{route('about')}}">About us</a></li>
						<li><i class="bi bi-chevron-double-right"></i> <a href="{{route('service')}}">Services</a></li>
						<!-- 							<li><i class="bi bi-chevron-double-right"></i> <a href="blog.html">Blog</a></li> -->
						<li><i class="bi bi-chevron-double-right"></i> <a href="{{route('contact')}}">Contact us</a></li>
					</ul>
				</div>

				<div class="col-lg-3 col-md-6 footer-links">
					<h4>Our Services</h4>
					<ul>
						<li><i class="bi bi-chevron-double-right"></i> <a href="#">Surveillance Service</a></li>
						<li><i class="bi bi-chevron-double-right"></i> <a href="#">Pre-Marital Investigation</a></li>
						<li><i class="bi bi-chevron-double-right"></i> <a href="#">Post-Marital Investigation</a></li>
						<li><i class="bi bi-chevron-double-right"></i> <a href="#">Legal Help</a></li>
						<li><i class="bi bi-chevron-double-right"></i> <a href="#">Undercover Operations</a></li>
						<li><i class="bi bi-chevron-double-right"></i> <a href="#">Shadowing</a></li>
						<li><i class="bi bi-chevron-double-right"></i> <a href="#">Extramarital Affair Investigation</a>
						</li>
						<li><i class="bi bi-chevron-double-right"></i> <a href="#">Fraud cases Investigation</a></li>
						<li><i class="bi bi-chevron-double-right"></i> <a href="#">Missing person tracing</a></li>
						<li><i class="bi bi-chevron-double-right"></i> <a href="#">Employment verification</a></li>
						<li><i class="bi bi-chevron-double-right"></i> <a href="#">Family Background</a></li>
						<li><i class="bi bi-chevron-double-right"></i> <a href="#">Corporate Investigation</a></li>
					</ul>
				</div>

				<div class="col-lg-4 col-md-6 footer-newsletter">
					<div class="footer-info">
						<p>
							<strong>Phone:</strong>
							<a href="tel:+918416090681"> +91 8416090681 </a>&nbsp;&nbsp;/&nbsp;&nbsp;
							<a href="tel:+919062121384"> +91 9062121384</a>
							<br />
							<strong>Email:</strong> <a href="mailto: omrndetective@gmail.com">
								omrndetective@gmail.com</a><br />
						</p>
						<div class="social-links mt-3">
							<a href="https://www.facebook.com/omrndetective"><i class="bi bi-facebook"></i></a>
							<a href="https://www.linkedin.com/in/omrndetective/"><i class="bi bi-linkedin"></i></a>
						</div>
						<div class="m-1 my-3">
							<img src="{{asset('assets/img/rm-iso-qr-code.jpg')}}" height="200px" width="200px">
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<div class="term w-100 py-3 px-5">Design and developed by <a href="www.alsoltech.com">ALSOLTech</a></div>

	<!-- for showing alert  -->
	<div class="alert-wrapper" id="alert-wrapper"></div>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header border-0">
					<h4 class="modal-title mx-auto" id="myModalLabel">Want to hire us?</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal-close-btn"
						style="border: none;background: none;">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body container d-flex justify-content-center flex-column pt-0">
					<div class="d-flex justify-content-center">
						<img src="{{asset('assets/img/iso-logo.webp')}}" height="100px" width="150px" />
					</div>
					<h6 class="mb-2">
						<small class="d-flex text-center"> India's most trusted Private Detective Agency and Legal
							Service Provider. 100% Confidentiality And On-Time Service Guaranteed! </small>
					</h6>
					<div>
						<form id="modal-form">
						@csrf()
					<input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
							<div class="form-group mt-2 mb-2">
								<select class="form-control" id="modal-service" required>
									<option>Service Looking for</option>
									<option value="Surveillance Service">Surveillance Service</option>
									<option value="Pre-Marital Investigation">Pre-Marital Investigation</option>
									<option value="Post-Marital Investigation">Post-Marital Investigation</option>
									<option value="Legal Help">Legal Help/option</option>
								</select>
							</div>
							<div class="form-group mb-2">
								<input type="text" class="form-control" id="modal-name" placeholder="Full Name"
									required />
							</div>
							<div class="form-group mb-2">
								<input type="email" class="form-control" id="modal-email" placeholder="Email"
									required />
							</div>
							<div class="form-group mb-2">
								<input type="number" class="form-control" id="modal-mobile" placeholder="Mobile Number"
									required />
							</div>
							<div class="d-flex justify-content-center">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
						<div class="d-flex justify-content-center align-items-center flex-column">
							<p class="m-2"><small>OR</small></p>
							<div class="d-flex justify-content-center align-items-center flex-column">
								<small><strong> Whatsapp us </strong></small>
								<a href="https://wa.me/+918416090681" class="m-3">
									<span class="icon_wrapper"><i class="bi bi-whatsapp"></i> </span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>