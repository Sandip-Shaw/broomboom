@extends('main')
@section('title',"Home")

@section('stylesheets')

<link href="{{asset('assets/css/blog.css')}}" rel="stylesheet" />

@endsection

@section('ganalytics')
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M7MG2W8" height="0" width="0"
			style="display:none;visibility:hidden"></iframe></noscript>
@endsection

@section('content')

<!-- <section class="breadcrumbs">
		<div class="container">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li>Blog</li>
			</ul>
			<h2>Blog</h2>
		</div>
	</section> -->
    @include('partials._breadcrumbs')
	<section class="blog">
	
		<div class="container">
		@foreach($blog as $image)
			<div class="row justify-content-center">
				
				<div class="col-lg-10 entries">
					<article class="entry" data-aos="fade-up">
						<div>
							<img src="{{asset('/images/blog/'.$image->image)}}   " alt="" class="img-fluid" data-aos="fade-up"
								data-aos-delay="100" />
						</div>

						<h2 class="title" data-aos="fade-up" data-aos-delay="200">
							<p>{{$image->title}}</p>
						</h2>

						<div class="meta" data-aos="fade-up" data-aos-delay="300">
							<ul>
								<li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
										href="">{{$image->author}}</a></li>
								<li class="d-flex align-items-center">
									<i class="bi bi-clock"></i> <a href=""><time datetime="2020-01-01">{{$image->created_at}}</time></a>
								</li>
							</ul>
						</div>

							<div class="content" data-aos="fade-up" data-aos-delay="400">
							<p>
							{{substr($image->description,0,300)."..."}}
							</p>
							<div class="read-more" data-aos="fade-up" data-aos-delay="300">
								<a href="{{route('omrndecBetter',$image->id)}}">Read More</a>
							</div>
							</div>
					</article>
				</div>
			</div>


		@endforeach
		</div>
	</div>
					<!-- <article class="entry" data-aos="fade-up">
						<div>
							<img src="{{asset('assets/img/underCovered.webp')}}" alt="" class="img-fluid" data-aos="fade-up"
								data-aos-delay="100" />
						</div>

						<h2 class="title" data-aos="fade-up" data-aos-delay="200">
							<a href="./How-is-OM-RN-Detective-Pvt.-Ltd-better-than-its-competitors.html">How is OM RN Detective Pvt. Ltd. better than its competitors?</a>
						</h2>

						<div class="meta" data-aos="fade-up" data-aos-delay="300">
							<ul>
								<li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
										href="./How-is-OM-RN-Detective-Pvt.-Ltd-better-than-its-competitors.html">Admin</a></li>
								<li class="d-flex align-items-center">
									<i class="bi bi-clock"></i> <a href="./How-is-OM-RN-Detective-Pvt.-Ltd-better-than-its-competitors.html"><time datetime="2020-01-01">Aug 1,
											2020</time></a>
								</li>
							</ul>
						</div>

						<div class="content" data-aos="fade-up" data-aos-delay="400">
							<p>
								OM RN Detective Pvt. Ltd. focuses on several serious things carefully like Family
								background, Health status, Social status, Educational background, Criminal
								background....
							</p>
							<div class="read-more" data-aos="fade-up" data-aos-delay="300">
								<a href="./How-is-OM-RN-Detective-Pvt.-Ltd-better-than-its-competitors.html">Read More</a>
							</div>
						</div>
					</article>
					<article class="entry" data-aos="fade-up">
						<div>
							<img src="{{asset('assets/img/surveillance.webp')}}" alt="" class="img-fluid" data-aos="fade-up"
								data-aos-delay="100" />
						</div>

						<h2 class="title" data-aos="fade-up" data-aos-delay="200">
							<a href="./Nitty-and-Gritties-of-Spying.html">Nitty and Gritties of Spying</a>
						</h2>

						<div class="meta" data-aos="fade-up" data-aos-delay="300">
							<ul>
								<li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
										href="./Nitty-and-Gritties-of-Spying.html">Admin</a></li>
								<li class="d-flex align-items-center">
									<i class="bi bi-clock"></i> <a href="./Nitty-and-Gritties-of-Spying.html"><time datetime="2020-01-01">Jul 1,
											2020</time></a>
								</li>
							</ul>
						</div>

						<div class="content" data-aos="fade-up" data-aos-delay="400">
							<p>
								A wedding without the perfect background check is always a risky decision. Compromise
								issues are quite
								common in marriages where neither the partners nor their respective families know each
								other well. Usually,
								such a relationship......
							</p>
							<div class="read-more" data-aos="fade-up" data-aos-delay="300">
								<a href="./Nitty-and-Gritties-of-Spying.html">Read More</a>
							</div>
						</div>
					</article>
				</div>
			</div>
		</div>
	</section> -->


 @endsection