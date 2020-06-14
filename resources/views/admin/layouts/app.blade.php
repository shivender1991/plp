<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.layouts.head')
</head>
<body onload="myOnloadFunc();">
	 <div class="loader"></div>
		<div id="app">
			<div class="main-wrapper main-wrapper-1">
			@include('admin.layouts.header')
			@include('admin.layouts.sidebar')
   			 <div class="main-content">
				@section('main-content')
				@show
			 </div>
				@if (session('sucess'))
					<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-success alert-with-icon" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1060; top: 74px; right: 33px;"><span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span> <span data-notify="title"></span> <span data-notify="message">{{ session('sucess') }}</span><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -13px; z-index: 1062;color:#fff;"><i class="now-ui-icons ui-1_simple-remove"></i>&times;</button></div>
			
				@endif	
				@if (session('error'))
					<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-danger alert-with-icon" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1060; top: 74px; right: 33px;"><span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span> <span data-notify="title"></span> <span data-notify="message">{{ session('error') }}</span><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -13px; z-index: 1062;color:#fff;"><i class="now-ui-icons ui-1_simple-remove"></i>&times;</button></div>
				
				@endif
	</div>
@include('admin.layouts.footer')
</body>
</html>