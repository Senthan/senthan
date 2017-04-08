<!DOCTYPE html>
<html lang="en"  style="font-family: Segoe UI, Helvetica, Arial, sans-serif">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Senthan Software Engineer</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('components/bootstrap/dist/css/bootstrap.min.css')  }}">
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

</body>
<footer>
	<div class="row contact-position">

        <div class="contact-form" id="contact-form-show">
            {!! Form::open(['url' => route('contact.store'), 'role' => 'form', 'class' => 'form-horizontal']) !!}

            <div class="panel panel-warning panel-contact">
                <div class="panel-heading">
                    <h3>Contact</h3>
                </div>
                <div class="panel-body">
                    @include('home.form')
                </div>
                <div class="panel-footer">
                    <button class="btn btn-sm btn-success" id="send-contact">Send</button>
                </div>
            </div>

            {!! Form::close() !!}   
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
		        data: { _token: '{!! csrf_token() !!}'},
		        dataType: "JSON",
		        method: "POST",
		        success: function (responce) {
		            if(responce.data) {
		            	toastr.options = {
		                    "positionClass": "toast-bottom-left"
		                };
		                toastr.success('Successfully sent it.')
		            }
		        }
		    });

		});

	});
</script>
</html>