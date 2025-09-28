<x-admindash>
	<x-slot>
		<div class="main-panel">
			<div class="toparea text-left spacy-md w3-display-container">
				<div class="w3-display-topright spacy-md">
					<a class="btn btn-primary" href="./admin_new_product"><i class="mdi mdi-plus"></i> add product</a>
				</div>
				<h1>Products management</h1>
				<p>all available products</p>
			</div>

			<div class="items spacy-md">
				<table class="table table-hover">
					<thead>
						<tr>
							<th class="w3-text-white"></th>
							<th class="w3-text-white">Image</th>
							<th class="w3-text-white">Date Added</th>
							<th class="w3-text-white">Product name</th>
							<th class="w3-text-white">Quantity</th>
							<th class="w3-text-white">Price</th>
							<th class="w3-text-white">Actions</th>
						</tr>
					</thead>
					
					<tbody>
					@if (count($data) == 0)
						<tr>
							<td colspan="5" class="w3-center spacy-sm">no records found</td>
						</tr>
					@else
						<?php
							$no = 0 + (($data->currentPage() - 1) * $amts);
						?>
						@foreach ($data as $prod)
							<?php
								$img = $prod['prod_img'];
								$imgpath = './uploads/products/'.$img;
								
								$price = $prod['price'];
								$price_format = number_format($price,0,'.',',');
								$title = $prod['title'];
								$datemed = $prod['created_at'];
								$quantity = $prod['quantity'];
								$no++;
							?>
							<tr>
								<td>{{ $no }}</td>
								<td>
									<img src="{{$imgpath}}" alt="">
								</td>
								<td>{{ $datemed }}</td>
								<td>{{ $title }}</td>
								<td>{{ $quantity }}</td>
								<td>Ksh. {{ $price_format }}</td>
								<td>
									<div class="dropdown">
										<button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuOutlineButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Actions</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton2" style="">
											<a class="dropdown-item w3-hover-blue" href="#">View</a>
											<a class="dropdown-item w3-hover-blue" href="{{url('admin_edit_product',$prod->id)}}">Edit</a>
											<form action="{{url('delete_product',$prod->id)}}" method="POST">
												@csrf
												<button class="dropdown-item w3-hover-red">Delete</button>
											</form>
										</div>
									</div>
								</td>
							</tr>
						@endforeach
					@endif
					</tbody>
				</table>
				<div class="spacy-md">
					{{ $data->links('vendor.pagination.admin') }}
				</div>
				<div class="spacy-sm">
					<p>Currently on page <b class="text-primary">{{ $data->currentPage() }}</b> of <b>{{ $data->lastPage() }}</b></p>
				</div>
			</div>
		</div>
	</x-slot>
</x-admindash>