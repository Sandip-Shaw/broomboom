<section class="topbar d-flex align-items-center">
		<div class="container d-flex justify-content-center justify-content-md-end">
			<div class="contact-info d-flex align-items-c enter">
				<i class="bi bi-envelope d-flex align-items-center"><a href="mailto: omrndetective@gmail.com">
						omrndetective@gmail.com</a></i>
				<i class="bi bi-phone d-flex align-items-center ms-4">
					<a href="tel:9062121384"><span>+91</span> 9062121384</a>
					/<a href="tel:8416090681"><span>+91</span> 8416090681</a>
				</i>
			</div>
		</div>
	</section>

	<nav class="navbar navbar-expand-lg header">
		<div class="container">
			<div class="logo navbar-brand">
				<a href="{{route('home')}}"><img src="{{asset('assets/img/logo.webp')}}" alt="logo" class="img-fluid" height="56px" /></a>
			</div>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<i class="bi bi-list mobile-nav-toggle"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li><a class="nav-link active" href="{{ route('home') }}">HOME</a></li>
					<li><a class="nav-link" href="{{route('about')}}">ABOUT US</a></li>
					<li><a class="nav-link" href="{{route('service')}}">SERVICES</a></li>
					<li><a class="nav-link" href="{{route('blog')}}">BLOG</a></li>
					<li><a class="nav-link" href="{{route('contact')}}">CONTACT</a></li>
				</ul>
			</div>
		</div>
	</nav>