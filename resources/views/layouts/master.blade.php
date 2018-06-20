<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}" />
	<link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}" />
	<link rel="stylesheet" href="{{asset('css/skins/_all-skins.min.css')}}" />
	<link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}" />
	@yield('stylesheets')
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		@include('partials.header')
		@include('partials.sidebar')
		@yield('content')
	</div>
   <!--   Core JS Files   -->
	<script src="{{ asset('/js/core/jquery.min.js" type="text/javascript"') }}"></script>
	<script src="{{ asset('js/core/popper.min.js" type="text/javascript') }}"></script>
	<script src="{{ asset('/js/core/bootstrap.min.js" type="text/javascript') }}"></script>
	<script src="{{ asset('/js/core/bootstrap.min.js" type="text/javascript') }}"></script>
	<script src="{{ asset('/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
	<script src="{{ asset('/js/plugins/moment.min.js') }}"></script>
	<script src="{{ asset('/js/adminlte.min.js') }}"></script>
	
	@yield('scripts')
	
	<!--  Plugin for Sweet Alert -->
	
	<script src="{{ asset('/js/plugins/sweetalert2.min.js" type="text/javascript') }}"></script>

	<!-- Forms Validations Plugin -->
	<script src="{{ asset('/js/plugins/jquery.validate.min.js" type="text/javascript') }}"></script>    
	
	<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
	<script src="{{ asset('js/plugins/jquery.bootstrap-wizard.js') }}"></script> 

	<!--   Plugin for Select, full documentation here:     http://silviomoreto.github.io/bootstrap-select -->
	<script src="../assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>

	<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
	<script src="../assets/js/plugins/bootstrap-switch.js"></script>

	<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
	<script src="../assets/js/plugins/bootstrap-datetimepicker.js"></script>

	<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
	<script src="../assets/js/plugins/jquery.dataTables.min.js"></script>

	<!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
	<script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>

	<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
	<script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>

	<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
	<script src="../assets/js/plugins/fullcalendar.min.js"></script>

	<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
	<script src="../assets/js/plugins/jquery-jvectormap.js"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

	<!-- Chart JS -->
	<script src="../assets/js/plugins/chartjs.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="../assets/js/plugins/bootstrap-notify.js"></script>

	<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
	<script src="../assets/js/now-ui-dashboard.js?v=1.1.0" type="text/javascript"></script>
</body>
</html>