function alertCloseHandler(id) {
	var calbackFun = setTimeout(function () {
		try {
			$(`#${id}`).fadeOut('slow', function () {
				$(`#${id}`).remove();
			});
		} catch (error) {}
	}, 10000);

	try {
		$(`#${id} .close`).on('click', function () {
			$(`#${id}`).fadeOut('slow', function () {
				$(`#${id}`).remove();
			});
		});
		clearTimeout(calbackFun);
	} catch (error) {}
}

// post form
$(document).ready(function () {
	$('#contact-form').on('submit', function (e) {
		// prevet from submit form
		e.preventDefault();
		
		
		// document.write("hi");
		// submit all data by ajax
		var name = $('#input-name').val().trim(),
			email = $('#input-email').val().trim(),
			subject = $('#input-subject').val().trim(),
			message = $('#input-message').val().trim();


	//console.log(name);
	//console.log(email);
	//console.log(subject);
	//console.log(message);

		if (name == '' || email == '' || subject == '' || message == '') {
			alert('Please fill-up the form before submit.');
			return;
		}

		// clear form
		$('#input-name').val('');
		$('#input-email').val('');
		$('#input-subject').val('');
		$('#input-message').val('');
		
		$.ajax({
			url: './contact',
			method: 'POST',
			data: {
				_token: $("#csrf").val(),
				type: 1,
				name : name,
				email : email,
				subject : subject,
				message : message,
			},
			success: function (result) {
				var id = new Date().getTime().toString();
				if (result.status) {
					var alertDivHtml = `<div id='${id}' class="alert alert-success alert-dismissible fade show" role="alert">
										<strong>Your message successfully sent.</strong> 
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>`;
					$('#alert-wrapper').append(alertDivHtml);
					alertCloseHandler(id);
				} else {
					var alertDivHtml = `<div id='${id}' class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Your message not sent. Something went wrong.</strong> 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>`;
					$('#alert-wrapper').append(alertDivHtml);
					alertCloseHandler(id);
				}
			},
			error: function (request, status, error) {
				alert('Something went wrong.');
			},
		});

	});

	$('#modal-form').on('submit', function (e) {
		// prevet from submit form
		e.preventDefault();

		// submit all data by ajax
		var name = $('#modal-name').val().trim(),
			email = $('#modal-email').val().trim(),
			service = $('#modal-service').val().trim(),
			mobile = $('#modal-mobile').val().trim();
			message='';
			subject='';

			//console.log(mobile);


		if (name == '' || email == '' || service == undefined || mobile == '') {
			alert('Please fill-up the form before submit.');
			return;
		}

		$('#myModal').modal('hide');
		// clear form
		$('#modal-name').val('');
		$('#modal-email').val('');
		$('#modal-service').val('');
		$('#modal-mobile').val('');

		$.ajax({
			url: './contact',
			method: 'POST',
			data: {
				_token: $("#csrf").val(),
				type: 1,
				name : name,
				email : email,
				service : service,
				mobile : mobile,
				subject : subject,
				message : message,
			},
			success: function (result) {
				var id = new Date().getTime().toString();
				if (result.status) {
					var alertDivHtml = `<div id='${id}' class="alert alert-success alert-dismissible fade show" role="alert">
										<strong>Your message successfully save. We will contact you soon.</strong> 
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>`;
					$('#alert-wrapper').append(alertDivHtml);
					alertCloseHandler(id);
				} else {
					var alertDivHtml = `<div id='${id}' class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Your message not sent. Something went wrong.</strong> 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>`;
					$('#alert-wrapper').append(alertDivHtml);
					alertCloseHandler(id);
				}
			},
			error: function (request, status, error) {
				alert('Something went wrong.');
			},
		});
	});
});
