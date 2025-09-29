<div class="latest-products">
	<div class="container">
		<div class="row products">
			<div class="col-md-12">
				<div class="section-heading">
					<h2>Latest Products</h2>
					<a href="./products#products">view all products <i class="fa fa-angle-right"></i></a>
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
				<div class="col-md-3">
					<a class="product-item" href="./products#products">
						<img src="{{$imgpath}}" alt="">
						<div class="down-content">
							<h4>{{ $title }}</h4>
							{{-- <span class="w3-display-topright text-sm">Ksh. {{$price_format}}</span> --}}
							<h4><b>Ksh. {{$price_format}}</b></h4>
							<p class="thedesc">{{$desc_short}}</p>

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
					</a>
				</div>
			@endforeach

			<div class="col-md-12">
				{{-- {{ $prods->links('vendor.pagination.custom') }} --}}
			</div>
		</div>
	</div>
</div>