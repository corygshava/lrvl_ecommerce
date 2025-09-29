<x-siteparts.layout :mycarts="$c_data">
	<x-slot:pagetitle>Products</x-slot:pagetitle>
	<x-slot:maurl>products</x-slot:maurl>
	<x-slot>
		<!-- Page Content -->
		<div class="page-heading products-heading header-text">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="text-content">
							<h4>Our Catalogue</h4>
							<h2>SevenFOLD products</h2>
						</div>
					</div>
				</div>
			</div>
		</div>

		@include('site.catalogue')
	</x-slot>
</x-siteparts.layout>