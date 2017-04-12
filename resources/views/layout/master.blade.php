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

       			<div class="show-panel-heading"></div>
                <div class="panel-heading hide-panel-heading">
                    <h3 >
                    <span class="fa fa-refresh fa-spin fa-x fa-fw" id="loading"></span>
                    <span>Contact</span>
                    </h3>
                </div>
                <div class="panel-body">
                	<form id="contactform" class="form-horizontal">
                		@include('home.form')
						<input type="hidden" name="_token" value="{!! csrf_token() !!}">
					</form>
                </div>
                <div class="panel-footer hide-panel-footer">
                    <button class="btn btn-sm btn-success" id="send-contact">Send</button>
                    <button class="btn btn-sm btn-default" id="cancel-contact">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript">
	
	$(document).ready(function () {

		if(screen.height < 626) {
			$('.show-panel-heading').html(
				'<div class="panel-footer"><button class="btn btn-sm btn-success" id="send-contact">Send</button><button class="btn btn-sm btn-default" id="cancel-contact"><i class="fa fa-close"></i></button></div>'
			);
			$('.hide-panel-heading').addClass('hidden');
			$('.hide-panel-footer').addClass('hidden');
		}
		var loading = $('#loading');
		var sendContact = $('#send-contact');
		var contactShow = $('#contact-show');
		var contactForm = $('.contact-form');
		var contactFormShow = $('#contact-form-show');
		var cancelContact = $('#cancel-contact');

		loading.addClass('hidden');

		cancelContact.click(function() {
			contactFormShow.toggle('slide', 'right', 500);
		});

		//contactForm.addClass('hidden');
		contactShow.click(function() {
			contactFormShow.toggle('slide', 'right', 500);
			
		});
		

		sendContact.click(function() {
			loading.removeClass('hidden');
			$.ajax({
		        url: '{!! route('contact.store') !!}',
		        data:  $('form').serialize(),
		        dataType: "JSON",
		        method: "POST",
		        success: function (responce) {
		        	loading.addClass('hidden');
		            if(responce) {
		            	toastr.options = {
		                    "positionClass": "toast-bottom-left"
		                };

		                toastr.success("Thanks for taking a look at my profile")
		                contactFormShow.toggle('slide', 'right', 500);

		                $( '#contactform' ).each(function(){
    						this.reset();
						});
		            }
		        },

		        error: function(responce) {
		        	loading.addClass('hidden');
		        	toastr.options = {
		                "positionClass": "toast-bottom-left"
		                };

		                if(responce && responce.responseText) {
							responce = JSON.parse(responce.responseText);
		                	var email = responce.email ? responce.email[0] : '' ;
		                	var message = responce.message ? responce.message[0] : ''
		            		toastr.error(email.concat(' ', message));
		                }
		                
		        }

		    });

		});

	});
</script>
</html>