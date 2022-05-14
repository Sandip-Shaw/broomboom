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
					<li>About us</li>
				</ul>
				<h2>About us</h2>
			</div>
		</section> -->
		@include('partials._breadcrumbs')

		<div class="about-container row p-5 m-0 pb-0">
			<div class="container pt-3 pb-3 col-md-8 col-12">
				<h3>ABOUT US</h3>
				<h5>Best Detectives in Kolkata</h5>
				<p>
					OM RN Detective agency is a private detective agency in India with expertise around 4 years, they help in providing a confidential detective service to the partnerships, lawyers and money related establishments. We have a reputation of providing fruitful cases that have filled the expectations of the clients.
					They have a group of exports and screened specialists who work hard to the extent to bring out the bitter truth from the cutting edge investigations that are being performed. The main goal is to get the best result within a desirable time. 
					There is an extensive service provided to the clients, the service includes private and confidential cases such as divorces cases proof, sting operation, fraud investigation background and missing person investigation. We assure that every case is handled with utmost care that will help in understanding the customer’s details.<br /><br />

					<strong>Why To Choose Us</strong><br />
					We are known to be one of the best private detective agencies that have been serving people over 4 years. We have solved over 100+ cases successfully. We have been able to achieve
					the best level of client in India.
				</p>
			</div>
			<div class="col-12 col-md-4 about-img">
				<a href="index.html"><img src="{{asset('assets/img/logo1.png')}}" alt="" class="img-fluid" /></a>
			</div>
		</div>
		<div class="row px-5 pb-5">
			<div class="col-md-6 col-12">
				<img src="{{asset('assets/img/iso-full-copy.jpg')}}" width="100%" />
			</div>
			<div class="col-md-6 col-12">
				<h3>We are an ISO Certified Organization</h3>
				<p>
					ISO 9001:2015 is an international standard dedicated to Quality Management Systems (QMS). It outlines a framework for improving quality and a vocabulary of understanding for any organization looking to provide products and services that consistently meet the requirements and expectations of customers and other relevant interested parties in the most efficient manner possible.i The QMS is the aggregate of all the processes, resources, assets, and cultural values that support the goal of customer satisfaction and organizational efficiency. First published in 1987, the latest iteration (ISO 9001:2015) replaces ISO 9001:2008
				</p>
			</div>
		</div>



 @endsection