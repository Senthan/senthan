<!DOCTYPE html>
<html lang="en"  style="font-family: Segoe UI, Helvetica, Arial, sans-serif">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Senthan Software Engineer</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('components/bootstrap/dist/css/bootstrap.min.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('components/toastr/toastr.min.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body style="background: #222 url(../images/bg-body.png)">


	<div style="margin: 50px">
		<div class="container container-width" style="background-color: #fff;">
			@yield('content')
		</div>
	</div>


	<script type="text/javascript" src="{{  asset('components/jquery/dist/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{  asset('components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{  asset('components/jquery-ui/jquery-ui.min.js') }}"></script>
	<script type="text/javascript" src="{{  asset('components/toastr/toastr.min.js') }}"></script>
</body>
<footer>
	<div class="row contact-position">
        <div class="contact-form" id="contact-form-show">
            <div class="panel panel-warning panel-contact">
                <div class="panel-heading">
                    <h3>Contact</h3>
                </div>
                <div class="panel-body">
                	<form>
                		@include('home.form')
						<input type="hidden" name="_token" value="{!! csrf_token() !!}">
					</form>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-sm btn-success" id="send-contact">Send</button>
                </div>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript">
	
	$(document).ready(function () {
		var sendContact = $('#send-contact');
		var contactShow = $('#contact-show');
		var contactForm = $('.contact-form');
		var contactFormShow = $('#contact-form-show');
		//contactForm.addClass('hidden');
		contactShow.click(function() {
			if(contactForm.hasClass('hidden')) {
			//	contactForm.removeClass('hidden');
			} else {
			//	contactForm.addClass('hidden');
			}
			
			contactFormShow.toggle('slide', 'right', 500);
			//contactFormShow.find('.panel-contact').focus();
		});
		

		sendContact.click(function() {

			$.ajax({
		        url: '{!! route('contact.store') !!}',
		        data:  $('form').serialize(),
		        dataType: "JSON",
		        method: "POST",
		        success: function (responce) {
		            if(responce) {
		            	toastr.options = {
		                    "positionClass": "toast-bottom-left"
		                };

		                toastr.success("Thanks for taking a look at my profile")
		                contactFormShow.toggle('slide', 'right', 500);
		            }
		        },

		        error: function(responce) {
		        	toastr.options = {
		                "positionClass": "toast-bottom-left"
		                };
		                responce = JSON.parse(responce.responseText);
		                var email = responce.email ? responce.email[0] : '' ;
		                var message = responce.message ? responce.message[0] : ''
		            toastr.error(email.concat(' ', message))
		        }

		    });

		});

	});
</script>
</html>