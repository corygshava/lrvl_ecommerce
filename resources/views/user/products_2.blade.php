<div class="latest-products">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-heading">
					<h2>Latest Products</h2>
					<a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
				</div>
			</div>

			{{-- shows products --}}
			@foreach ($prods as $prod)
				<?php
					$img = $prod['prod_img'];
					$imgpath = './uploads/products/'.$img;
					$price = $prod['price'];
					$price_format = number_format($price,0,'.',',');

					$title = $prod['title'];
					$desc = $prod['description'];
					$desc_short = $desc;
				?>
				<div class="col-md-4">
					<div class="product-item">
						<a href="#"><img src="{{$imgpath}}" alt=""></a>
						<div class="down-content">
							<a href="#"><h4>{{ $title }}</h4></a>
							<h6>Ksh. {{$price_format}}</h6>
							<p>{{$desc_short}}</p>

							<div class="w3-hide">
								<ul class="stars">
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
								</ul>
								<span>Reviews (24)</span>
							</div>
						</div>
					</div>
				</div>
			@endforeach

		</div>
		<div class="w3-container">
			{!! $prods->links() !!}
		</div>
	</div>
</div>