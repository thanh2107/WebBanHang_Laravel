
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Thời trang nữ Loriem</title>
	<base href="{{asset(' ')}}"/>
	<meta charset="UTF-8">
	<meta name="description" content=" Loriem | eCommerce Template">
	<meta name="keywords" content="loriem, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="resources/img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="resources/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="resources/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="resources/css/flaticon.css"/>
	<link rel="stylesheet" href="resources/css/slicknav.min.css"/>
	<link rel="stylesheet" href="resources/css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="resources/css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="resources/css/animate.css"/>
	<link rel="stylesheet" href="resources/css/style.css"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
			<!-- header-->
			@include('header')
			<!-- trang chu-->
			@yield('content')
			<!-- footer-->
			@include('footer')


	


	<!--====== Javascripts & Jquery ======-->
	<script src="resources/js/jquery-3.2.1.min.js"></script>
	<script src="resources/js/bootstrap.min.js"></script>
	<script src="resources/js/jquery.slicknav.min.js"></script>
	<script src="resources/js/owl.carousel.min.js"></script>
	<script src="resources/js/jquery.nicescroll.min.js"></script>
	<script src="resources/js/jquery.zoom.min.js"></script>
	<script src="resources/js/jquery-ui.min.js"></script>
	<script src="resources/js/main.js"></script>


	</body>
</html>
