<x-siteparts.layout :mycarts="$c_data">
    <x-slot:pagetitle>Home</x-slot:pagetitle>
    <x-slot:maurl>home</x-slot:maurl>
    <x-slot>
		<!-- Page Content -->
		<!-- Banner Starts Here -->
		<div class="banner header-text">
			<div class="owl-banner owl-carousel">
				<div class="banner-item-01">
					<div class="text-content">
						<h4>Best Offer</h4>
						<h2>New Arrivals On Sale</h2>
					</div>
				</div>
				<div class="banner-item-02">
					<div class="text-content">
						<h4>Flash Deals</h4>
						<h2>Get your best products</h2>
					</div>
				</div>
				<div class="banner-item-03">
					<div class="text-content">
						<h4>Last Minute</h4>
						<h2>Grab last minute deals</h2>
					</div>
				</div>
			</div>
		</div>
		<!-- Banner Ends Here -->

        @include('user.products_2')

        <div class="best-features">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-heading">
							<h2>About SevenFOLD Prints</h2>
						</div>
					</div>
					<div class="col-md-6">
						<div class="left-content">
							<h4>Looking for the best prints?</h4>
							<p>
                                <a class="w3-text-blue themehover" rel="nofollow" href="./products" target="_parent">Our Prints</a> are designed to be the highest possible quality. 
                                <a class="w3-text-blue themehover" rel="nofollow" href="./contacts">Contact us</a> for more info on deliveries and getting your prints sold on our platform.
                            </p>
							<ul class="featured-list">
								<li><a>High quality prints</a></li>
								<li><a>Human Only art (or AI with human edits)</a></li>
								<li><a>3 day delivery (max)</a></li>
								<li><a>Affordable pricing</a></li>
							</ul>
							<a href="./about" class="filled-button">Learn More</a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="right-image">
							<img src="assets/images/feature-image.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="call-to-action">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="inner-content">
							<div class="row">
								<div class="col-md-8">
									<h4>Creative &amp; Unique <em>SevenFOLD</em> Prints</h4>
									<p>Get the highest quality print that will improve your space's aesthetic value seven fold</p>
								</div>
								<div class="col-md-4">
									<a href="./products" class="filled-button">Purchase Now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </x-slot>
</x-siteparts.layout>