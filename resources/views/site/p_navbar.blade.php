
<?php
	$act_marker = '<span class="sr-only">(current)</span>';
?>

		<!-- Header -->
		<header class="">
			<nav class="navbar navbar-expand-lg">
				<div class="container">
					<a class="navbar-brand" href="./"><h2>SevenFOLD <em>Prints</em></h2></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarResponsive">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item <?php echo (strtolower($maurl) == 'home') ? 'active' : ''?>">
								<a class="nav-link" href="./">Home
									@if (strtolower($maurl) == 'home')
										{!! $act_marker !!}
									@endif
								</a>
							</li>
							<li class="nav-item <?php echo (strtolower($maurl) == 'products') ? 'active' : ''?>">
								<a class="nav-link" href="./products">Our Products
									@if (strtolower($maurl) == 'products')
										{!! $act_marker !!}
									@endif
								</a>
							</li>
							<li class="nav-item <?php echo (strtolower($maurl) == 'about') ? 'active' : ''?>">
								<a class="nav-link" href="about.html">About Us
									@if (strtolower($maurl) == 'about')
										{!! $act_marker !!}
									@endif
								</a>
							</li>
							<li class="nav-item <?php echo (strtolower($maurl) == 'contacts') ? 'active' : ''?>">
								<a class="nav-link" href="contact.html">Contact Us
									@if (strtolower($maurl) == 'contacts')
										{!! $act_marker !!}
									@endif
								</a>
							</li>

							@auth
								<li class="nav-item <?php echo (strtolower($maurl) == 'mycart') ? 'active' : ''?>"">
									<a href="{{ url('/mycart') }}" class="nav-link" >
										<i class="fa fa-shopping-cart"></i>
										Cart
										@if (isset($mycarts))
											@if ($mycarts > 0)
												<b class="w3-badge themebg w3-animate-zoom">{{$mycarts}}</b>
											@endif
										@else
											{{-- <b class="w3-badge themebg"><i class="fa fa-times"></i></b> --}}
										@endif
									</a>
								</li>
								<li class="nav-item">
									<a href="{{ url('/dashboard') }}" class="nav-link" >
										{{-- <i class="fa fa-dashboard"></i> --}}
										Dashboard
									</a>
								</li>
								<li class="nav-item w3-hide">
									<a href="{{ url('/user/profile') }}" class="nav-link" >
										{{-- <i class="fa fa-dashboard"></i> --}}
										profile
									</a>
								</li>
								<li class="nav-item">
									<form action="{{ url('/logout')}}" method="post">
										@csrf
										@method('post')

										<button href="{{ url('/dashboard') }}" class="btn primary" >
											{{-- <i class="fa fa-user-slash"></i> --}}
											logout
										</button>
									</form>
								</li>
							@else
								<li class="nav-item">
									<a href="{{ route('login') }}" class="nav-link" >
										{{-- <i class="fa fa-user"></i> --}}
										Log in
									</a>
								</li>
								
								@if (Route::has('register'))
									<li class="nav-item">
										<a href="{{ route('register') }}" class="nav-link">
											{{-- <i class="fa fa-user-plus"></i> --}}
											Register
										</a>
									</li>
								@endif
							@endauth
						</ul>
					</div>
				</div>
			</nav>
		</header>
