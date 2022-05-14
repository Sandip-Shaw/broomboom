<section class="breadcrumbs">
		<div class="container">
			<ul>
				<li><a href="{{ route('home') }}">Home</a></li>
				<li>
                @php
                $uri = $_SERVER['REQUEST_URI'];
                
                $sp = explode("/",$uri);
                print_r(ucfirst(end($sp)));
                @endphp
                </li>
			</ul>
			<h2> 
                @php
                $uri = $_SERVER['REQUEST_URI'];
                
                $sp = explode("/",$uri);
                print_r(ucfirst(end($sp)));
                @endphp</h2>
		</div>
	</section>