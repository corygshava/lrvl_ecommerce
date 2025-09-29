		<div class="products" id="products">
			<div class="container">
				<div class="row">
					<div class="col-md-12 w3-hide">
						<div class="filters">
							<ul>
								<li class="active" data-filter="*">All Products</li>
								<li data-filter=".des">Featured</li>
								<li data-filter=".dev">Flash Deals</li>
								<li data-filter=".gra">Last Minute</li>
							</ul>
						</div>
					</div>
					<div class="col-md-12">
						<div class="section-heading">
							<form class="w3-right" action="./search" method="POST">
								@csrf
								<div class="input-group mb-3">
									<input type="search" name="q" class="form-control" placeholder="Search for a product">
									<div class="input-group-append">
										<button class="btn btn-dark" type="submit"><i class="fa fa-search"></i></button>  
									</div>
								</div>
							</form>
							<h2>Latest Products</h2>
						</div>
					</div>

					@isset($searchterm)
						<div class="col-md-12">
							<div class="spacy-sm">
								<i>search results for <b>{{$searchterm}}</b></i>
							</div>
						</div>
					@endisset

					<div class="col-md-12">
						<div class="filters-content">
							<div class="row grid w3-hide">
								<div class="col-lg-4 col-md-4 all des">
									<div class="product-item">
										<a href="#"><img src="assets/images/product_01.jpg" alt=""></a>
										<div class="down-content">
											<a href="#"><h4>Tittle goes here</h4></a>
											<h6>$18.25</h6>
											<p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
											<ul class="stars">
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
											</ul>
											<span>Reviews (12)</span>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 all dev">
									<div class="product-item">
										<a href="#"><img src="assets/images/product_02.jpg" alt=""></a>
										<div class="down-content">
											<a href="#"><h4>Tittle goes here</h4></a>
											<h6>$16.75</h6>
											<p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
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
								<div class="col-lg-4 col-md-4 all gra">
									<div class="product-item">
										<a href="#"><img src="assets/images/product_03.jpg" alt=""></a>
										<div class="down-content">
											<a href="#"><h4>Tittle goes here</h4></a>
											<h6>$32.50</h6>
											<p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
											<ul class="stars">
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
											</ul>
											<span>Reviews (36)</span>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 all gra">
									<div class="product-item">
										<a href="#"><img src="assets/images/product_04.jpg" alt=""></a>
										<div class="down-content">
											<a href="#"><h4>Tittle goes here</h4></a>
											<h6>$24.60</h6>
											<p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
											<ul class="stars">
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
											</ul>
											<span>Reviews (48)</span>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 all dev">
									<div class="product-item">
										<a href="#"><img src="assets/images/product_05.jpg" alt=""></a>
										<div class="down-content">
											<a href="#"><h4>Tittle goes here</h4></a>
											<h6>$18.75</h6>
											<p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
											<ul class="stars">
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
											</ul>
											<span>Reviews (60)</span>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 all des">
									<div class="product-item">
										<a href="#"><img src="assets/images/product_06.jpg" alt=""></a>
										<div class="down-content">
											<a href="#"><h4>Tittle goes here</h4></a>
											<h6>$12.50</h6>
											<p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
											<ul class="stars">
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
											</ul>
											<span>Reviews (72)</span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
													
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
										<div class="product-item">
											<img src="{{$imgpath}}" alt="">
											<div class="down-content">
												<h4 class="thetitle">{{ $title }}</h4>
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

												<form action="./add_to_cart/{{$prod->id}}" class="distance-sm" method="POST">
													@csrf
													{{-- <div class="input-group" data-role="quantifier" style="max-width: 160px;"> --}}
													<div class="distance-sm input-group" data-role="quantifier">
														<div class="input-group-prepend">
															<button class="btn btn-outline-secondary" type="button">
																<i class="fa fa-minus"></i>
															</button>
														</div>
														<input type="number" name="quantity" class="form-control text-center" value="1" min="1" max="{{$prod->quantity}}">
														<div class="input-group-append">
															<button class="btn btn-outline-secondary" type="button">
															<i class="fa fa-plus"></i>
															</button>
														</div>
													</div>
													{{-- <input type="number" name="quantity" id="" class="form-control" placeholder="quantity"> --}}
													<input type="hidden" name="prod_id" value="{{$prod->id}}">
													<button class="btn btn-primary btn-block" data-role="cartbtn"><i class="fa fa-shopping-cart"></i> Add to cart</button>
												</form>
											</div>
										</div>
									</div>
								@endforeach

							</div>
						</div>
					</div>
					<div class="col-md-12">
						<?php $suffix = '#products';?>
						{{ $prods->links('vendor.pagination.custom') }}
					</div>
				</div>
			</div>
		</div>