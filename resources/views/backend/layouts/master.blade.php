<!DOCTYPE html>
<html lang="en">
<head>
  @include('backend.includes.global-styles')
  @yield('title')
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="navbar-top">

	@include('backend.includes.navbar')


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			@include('backend.includes.sidebar')
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				@yield('page-header')
				<!-- /page header -->


				<!-- Content area -->
				@yield('content-area')
				<!-- /content area -->
      
			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>

@include('backend.includes.global-scripts')
@include('backend.includes.modal')
@yield('footscripts')
<script type="text/javascript">
  var APP_URL = {!! json_encode(url('/')) !!}
  $.ajaxSetup({
			headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
	});
</script>
</html>
