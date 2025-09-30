<x-admindash>
	<x-slot>
        <div class="main-panel">
			<div class="toparea text-left spacy-md w3-display-container">
				<h1>Order monitoring</h1>
				<p>all placed Orders</p>
			</div>

			<div class="items spacy-md">
				<table class="table table-hover">
					<thead>
						<tr>
							<th></th>
                            <th>image</th>
							<th>serial</th>
                            <th>product name</th>
                            <th>quantity</th>
                            <th>recipient email</th>
                            <th>price</th>
                            <th>status</th>
                            <th>actions</th>
						</tr>
					</thead>
					
					<tbody>
					@if (count($data) == 0)
						<tr>
							<td colspan="9" class="w3-center spacy-sm">no records found</td>
						</tr>
					@else
						<?php
                            $myid = 0;
							$no = 0 + (($data->currentPage() - 1) * $amts);
						?>
						@foreach ($data as $order)
							<?php
                                $myprod = $prods[$myid];
                                $myuser = $users[$myid];

								$img = $myprod['prod_img'] ?? '_)_.jpg';
								$imgpath = './uploads/products/'.$img;

                                $serial = $order['oderserial'];
								$uname = $myuser->name;
								$productid = $order['productid'];
								$name = $myprod->title;
								$address = $order['address'];
								$quantity = $order['quantity'];
								$recipient_email = $order['recipient_email'];
								$price = $order['price'];
								$status = $order['status'];
								$publish = $order['publish'];

								$no++;
							?>
							<tr>
								<td>{{ $no }}</td>
								<td>
									<img src="{{$imgpath}}" alt="">
								</td>
                                <td>{{$serial}}</td>
								<td>{{$name}}</td>
                                <td>{{$quantity}}</td>
                                <td>{{$recipient_email}}</td>
                                <td>{{$price}}</td>
                                <td>{{$status}}</td>
								<td>
									<div class="dropdown">
										<button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuOutlineButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Actions</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton2" style="">
											<a class="dropdown-item w3-hover-blue" href="#">View</a>
											<form action="{{url('delete_product')}}" method="POST" class="w3-hide">
												@csrf
												<button class="dropdown-item w3-hover-red">Delete</button>
											</form>
										</div>
									</div>
								</td>
							</tr>

                            <?php
                                $myid++;
                            ?>
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