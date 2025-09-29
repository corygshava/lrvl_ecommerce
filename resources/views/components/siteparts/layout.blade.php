<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

	<title>SevenFOLD Prints - {{$pagetitle}}</title>

	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!--
		TemplateMo 546 Sixteen Clothing
		https://templatemo.com/tm-546-sixteen-clothing
	-->

	<!-- Additional CSS Files -->
	<link rel="stylesheet" href="assets/css/fontawesome.css">
	<link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
	<link rel="stylesheet" href="assets/css/owl.css">

	<link rel="stylesheet" href="assets/css/w3.css">
	<link rel="stylesheet" href="assets/css/coryG_base.css">

	<style>
		.products img{
			aspect-ratio: 1;
			object-fit: cover;
		}
		.products .thedesc{
			height: 45px;
			position: relative;
			overflow: hidden;
		}
		.products .thedesc::before{
			content: '';
			position: absolute;
			left: 0;
			bottom: 0;
			width: 100%;
			height: 50%;
			z-index: 2;
			background-image: linear-gradient(0deg,#fff, transparent);
		}
		.products .thetitle{
			/* height: 20px; */
			overflow: hidden;
		}
	</style>
</head>
<body>
	<!-- ***** Preloader Start ***** -->
	<div id="preloader">
		<div class="jumper">
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>

	@include('site.p_navbar')

	{{$slot}}

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="inner-content">
						<p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.
					- Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
					</div>
				</div>
			</div>
		</div>
	</footer>


	<!-- Bootstrap core JavaScript -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


	<!-- Additional Scripts -->
	<script src="assets/js/custom.js"></script>
	<script src="assets/js/owl.js"></script>
	<script src="assets/js/slick.js"></script>
	<script src="assets/js/isotope.js"></script>
	<script src="assets/js/accordions.js"></script>

	<script src="assets/js/SuperScript.js"></script>
	<script src="assets/js/toappend.js"></script>
	<script src="assets/js/customalerter.js"></script>
	<script src="assets/js/app.js"></script>

	@if (session()->has('message'))
		<script>
			alert_dark(`{{session('message')}}`	);
		</script>
	@endif

	
	@if ($errors->any())
		<script>
			@foreach ($errors->all() as $err)
				alert_danger(`{{$err}}`);
			@endforeach
		</script>
	@endif

	<script language = "text/Javascript"> 
		cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
		function clearField(t){                   //declaring the array outside of the
			if(! cleared[t.id]){                      // function makes it static and global
				cleared[t.id] = 1;  // you could use true and false, but that's more typing
				t.value='';         // with more chance of typos
				t.style.color='#fff';
			}
		}
	</script>
</body>
</html>