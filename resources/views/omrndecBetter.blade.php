@extends('main')
@section('title',"Blog")

@section('stylesheets')

<link href="{{asset('assets/css/blog.css')}}" rel="stylesheet" />

@endsection

@section('ganalytics')
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M7MG2W8" height="0" width="0"
			style="display:none;visibility:hidden"></iframe></noscript>
@endsection

@section('content')

<section class="breadcrumbs">
		<div class="container">
			<ul>
				<li><a href="{{ route('home') }}">Home</a></li>
				<li>Blog</li>
				

			</ul>
			<h2>Blog</h2>
		</div>
	</section>
<!-- @include('partials._breadcrumbs') -->
	
<div class="services container pt-3 pb-3">
		<div class="d-flex justify-content-center">
			<img src="{{asset('/images/blog/'.$image->image)}}" alt="" class="img-fluid" data-aos="fade-up" data-aos-delay="100" />
		</div>
		<h2 style="font-weight: bold" class="p-3 text-center">{{$image->title}}</h2>
		<p class="text-center">
			{{$image->description}}
	</div>

 @endsection