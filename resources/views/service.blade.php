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
				<li>Services</li>
			</ul>
			<h2>Services</h2>
		</div>
	</section> -->
	@include('partials._breadcrumbs')

	<div class="services container pt-3 pb-3">
		<div class="section-title" data-aos="fade-up">
			<h2>Services we offer</h2>
			<p>We cover a vast list of services spread accross a wide set of requirements aligned to the needs of our
				clients.</p>
		</div>
		

<div class="container service-container">

<!--     <h1>Bootstrap 3 Gallery</h1> -->

<!--     <p class="page-description text-center">Clean Layout With Minimal Styles</p>
 -->    
    <div class="tz-service">
	<div class="row">
		@foreach($service as $image)		
			<div class="col-md-3 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="100">
				<div class="card" style="width: 100%">
					<img src="{{asset('/images/service/'.$image->image)}}" class="card-img-top" alt="..." />
					<div class="card-body">
						<h4 class="card-title">{{$image->title}}</h4>
						<p class="card-text">{{$image->description}}</p>
					</div>
				</div>
			</div>
		@endforeach
		</div>

	</div>

</div>

			<!-- <div class="col-md-3 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="200">
				<div class="card" style="width: 100%">
					<img src="{{asset('assets/img/preMatrimonial.webp')}}" alt="..." />
					<div class="card-body">
						<h4 class="card-title">Pre-Marital Investigation</h4>
						<p class="card-text">The investigation is done to know the authenticity of the person, whether
							the person has any criminal background..</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="300">
				<div class="card" style="width: 100%">
					<img src="{{asset('assets/img/postmaritalimg.jpg')}}" class="card-img-top" alt="..." />
					<div class="card-body">
						<h4 class="card-title">Post Marital Investigation</h4>
						<p class="card-text">The investigation is done in order to know that there is any existing
							investigation that is ongoing with the person concerned..</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="400">
				<div class="card" style="width: 100%">
					<img src="{{asset('assets/img/legal.webp')}}" class="card-img-top" alt="..." />
					<div class="card-body">
						<h4 class="card-title">Legal help</h4>
						<p class="card-text">Legal help is provided to the person who requires legal help regarding
							their companies or any other issues especially marital cases..</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="500">
				<div class="card" style="width: 100%">
					<img src="{{asset('assets/img/underCovered.webp')}}" class="card-img-top" alt="..." />
					<div class="card-body">
						<h4 class="card-title">Undercover operation</h4>
						<p class="card-text">To find and investigate any respective cases without letting anyone know
							about the fact of investigation.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="600">
				<div class="card" style="width: 100%">
					<img src="{{asset('assets/img/shadowing.webp')}}" class="card-img-top" alt="..." />
					<div class="card-body">
						<h4 class="card-title">Shadowing</h4>
						<p class="card-text">This is done to follow some very closely and observe someone very closely..
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="700">
				<div class="card" style="width: 100%">
					<img src="{{asset('assets/img/extraMarital.webp')}}" class="card-img-top" alt="..." />
					<div class="card-body">
						<h4 class="card-title">Extramarital Affair Investigation</h4>
						<p class="card-text">It helps in investigating when there are extra marital affairs with the
							person..</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="800">
				<div class="card" style="width: 100%">
					<img src="{{asset('assets/img/fraud.webp')}}" class="card-img-top" alt="..." />
					<div class="card-body">
						<h4 class="card-title">Fraud cases Investigation</h4>
						<p class="card-text">When a person falls in a trap of fraud cases, then there is an
							investigation that is done.</p>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="800">
				<div class="card" style="width: 100%">
					<img src="{{asset('assets/img/missing.webp')}}" class="card-img-top" alt="..." />
					<div class="card-body">
						<h4 class="card-title">Missing person tracing</h4>
						<p class="card-text">It helps in tracing the missing person who has been missing for a very long
							time.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="800">
				<div class="card" style="width: 100%">
					<img src="{{asset('assets/img/employmentVerification.webp')}}" class="card-img-top" alt="..." />
					<div class="card-body">
						<h4 class="card-title">Employment verification</h4>
						<p class="card-text">It is a part of the corporate investigation that involves the background
							verification of the candidate who will be joining the organization.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="800">
				<div class="card" style="width: 100%">
					<img src="{{asset('assets/img/familyBackground.webp')}}" class="card-img-top" alt="..." />
					<div class="card-body">
						<h4 class="card-title">Family Background</h4>
						<p class="card-text">It often happens during the pre-marital investigation, when people try to
							know about the family of the person related.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="800">
				<div class="card" style="width: 100%">
					<img src="{{asset('assets/img/corporate.webp')}}" class="card-img-top" alt="..." />
					<div class="card-body">
						<h4 class="card-title">Corporate Investigation</h4>
						<p class="card-text">
							This involves the background verification that is performed for the candidate who will be
							joining. The corporate investigation often includes investigating if there is
							any fishy incident taking place.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
 -->


 @endsection

 @section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
	<script>
	   baguetteBox.run('.tz-service');
	</script>

@endsection