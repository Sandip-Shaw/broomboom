<script defer src="https://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script defer src="{{asset('assets/vendor/aos/aos.js')}}"></script>
	<script defer>
		window.addEventListener('load', function () {
			$('#myModal').modal('show');
			$("#modal-close-btn").on("click", function () {
				$('#myModal').modal('hide');
			})
		});
	</script>
	<script defer src="{{asset('assets/js/swiper/swiper-bundle.min.js')}}"></script>
	<script defer src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<script defer src="{{asset('assets/js/main.js')}}"></script>
	 <script defer src="{{asset('assets/js/form.js')}}"></script> 