<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <meta name="description" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="">

  <title>
    E-VENT - Payment Gateway
  </title>

  <!-- Favicons -->
  <link href="{{ asset('/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <!-- CSS Files -->
  <link href="{{ asset('/assetsMaterial/css/material-kit.css') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('/assetsMaterial/demo/demo.css') }}" rel="stylesheet" />
</head>

<body class="index-page sidebar-collapse">
	<div class="container">
		<div class="row text-center">
		  <div class="col-md-6 mx-auto">
		    <h2>Manual Payment</h2>
		    <hr>
		  </div>
		</div>
		<div class="row text-left">

		  <div class="col-md-6 border mx-auto">
		    <h4>Details Ticket Transaction :</h4>
		    @foreach($tickets as $index => $ticket)
		    <div class="row">
		    	<div class="col-sm-6">
		    		<p>{{ $ticket->ticket_name }}</p>
		    	</div>
		    	<div class="col-lg-6">
		    		<div class="float-right">
			    		<p>x {{ (int)$ticket->quantity }}</p>
			    		<p>Rp.{{ $ticket->price }}</p>
		    		</div>
		    	</div>
		    </div>
		    @endforeach
		    <hr>
		    <div class="row">
		    	<div class="col-sm-6">
		    		<h5 class="font-weight-bold">Subtotal</h5>
		    	</div>
		    	<div class="col-lg-6">
		    		<div class="float-right">
		    			<h5 class="font-weight-bold">Rp.{{ $transaction->sub_total_order }}</h5>
		    		</div>
		    	</div>
		    </div>
		    <form action="{{-- url('checkout/') --}}" method="post" id="paymentForm">
		    	@method('patch')
		    	@csrf
			    <div class="row">
			    	<div class="col-lg-6">
			    		<h4 class="font-weight-bold">Your Cash</h4>
			    	</div>
			    	<div class="col-lg-6">
			    		<div class="float-right">
			    			<input type="number" id="total_payment" name="total_payment" class="form-control" placeholder="Enter your cash.." min="0">
			    		</div>
			    	</div>
			    </div>
			    <br>
			    <div class="row">
			    	<div class="col-sm-12">
			    		<button class="btn btn-primary float-right" type="submit" value="submit" >Pay Now</button>
			    	</div>
			    </div>
		    </form>
		  </div>
		</div>
	</div>

  <!--   Core JS Files   -->
  <script src="{{ asset('/assetsMaterial/js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/assetsMaterial/js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/assetsMaterial/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/assetsMaterial/js/plugins/moment.min.js') }}"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="{{ asset('/assetsMaterial/js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('/assetsMaterial/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('/assetsMaterial/js/material-kit.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets2/vendor/SweetAlert2/sweetalert2.js') }}"></script>
  
</body>

</html>

<script>
$(document).ready(function() {
	$('#paymentForm').on('submit', function(e) {
	  e.preventDefault();

	    $.ajax({
	        url: window.location.href,
	        method: 'patch',
	        data: $(this).serialize(),
	        cache: false,
	        success: function(response) {
	          let url = "{{ url('/checkout') }}";
	          Swal.fire('success!', 'Payment success.', 'success').then(function(){
	            window.location.href = "{{ route('ticket') }}";
	          });
	        },

	        error: function(xhr) {
	        	let res = '';
		            res = xhr.responseJSON;
	        	try{
		            if ($.isEmptyObject(res) == false) {
		              $.each(res.errors, function(key, val) {
		                Swal.fire("Invalid!", val, "error");
		              });
		            }else{
		            	Swal.fire("Invalid!", res.errors, "error");
		            }
	        	}catch(err){
					console.log(err);
					Swal.fire("Invalid!", res.errors, "error");
	        	}
	        }
	    });
	});
});


    function scrollToDownload() {
      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }
  </script>