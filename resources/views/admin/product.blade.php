<x-admindash>
	<x-slot>
		<div class="main-panel">
			<div class="toparea text-center spacy-md">
				<h1>Products management</h1>
			</div>

			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Add new product</h4>
					<p class="card-description">Add the details to register a product</p>
					{{-- error handling --}}
                        
					@if ($errors->any())
						<div class="w3-animate-zoom spacy-sm w3-border w3-border-red w3-text-red">
							@foreach ($errors->all() as $err)
								<span>{{$err}}</span><br>
							@endforeach
						</div>
						@endif
						
					@if (session()->has('message'))
						<script>alert_success(`{{session('message')}}`,15);</script>
					@endif

					<form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{url('add_product')}}">
						@csrf
						<div class="form-group">
							<label for="prod_title">Product title</label>
							<input type="text" class="form-control" name="prod_title" id="prod_title" placeholder="enter product title here">
						</div>
						<div class="form-group">
							<label for="prod_price">Product Price</label>
							<input type="number" class="form-control" name="prod_price" id="prod_price" placeholder="enter product price here">
						</div>
						<div class="form-group">
							<label for="prod_desc">Description</label>
							<textarea name="prod_desc" id="prod_desc" cols="30" rows="5" class="form-control" placeholder="enter description here"></textarea>
						</div>
						<div class="form-group">
							<label for="prod_amt">Quantity</label>
							<input type="number" class="form-control" name="prod_amt" id="prod_amt" placeholder="enter product quantity here">
						</div>
						<div class="form-group">
							<label for="prod_img">Main Image</label>
							<input type="file" class="form-control" name="prod_img" id="prod_img">
						</div>
						<button type="submit" class="btn btn-primary me-2">Submit</button>
						<button type="reset" class="btn btn-dark">Restart</button>
					</form>
				</div>
			</div>
		</div>
	</x-slot>
</x-admindash>