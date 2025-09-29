<x-siteparts.layout :mycarts="$c_data">
	<x-slot:pagetitle>your cart</x-slot:pagetitle>
	<x-slot:maurl>mycart</x-slot:maurl>

    <?php
        $myname = auth()->user()->name;
        $myemail = auth()->user()->email;

        $m_cart = $cartdata;
        $id = 0;
        $sum = 0;
        // $m_cart = [];
    ?>

    <x-slot>
        <link rel="stylesheet" href="./assets/css/cart.css">
        <div class="spacy-md">
            <div class="container">
                <h3 class="mb-3">Your cart</h3>
            </div>
        </div>

        <div class="cart-container">
            <div class="cart-header w3-center">
                <h2 class="mb-0"><i class="fa fa-shopping-cart"></i> Your Shopping Cart</h2>
            </div>

            <div class="user-info w3-center">
                <strong>Name:</strong> {{ $myname }} | <strong>Email:</strong> {{ $myemail }}
            </div>

            <div class="cart-items">
                {{-- start rendering cart items --}}
                @if (count($m_cart) == 0)
                    <div class="cart-item w3-center">
                        <i>no items in cart</i><br>
                        <div class="spacy-sm">
                            <a class="btn btn-primary" href="./products#products"><i class="fa fa-plus"></i> add item</a>
                        </div>
                    </div>
                @else
                    @foreach ($m_cart as $item)
                        <?php
                            $myprod = $prods[$id];
                            $myid = $item->id;

                            // print_r($myprod);

                            $prodname = $myprod->title;
                            $theprice = $myprod->price;
                            $showprice = number_format($theprice);
                            $img = $myprod->prod_img;
							$imgpath = './uploads/products/'.$img;

                            $amt = $item->quantity;
                            $mycost = $amt * $theprice;
                            $sum += $mycost;
                            // $prodname = '$myprod->title';
                        ?>
                        <div class="cart-item d-flex align-items-center">
                            <img src="{{ $imgpath }}" alt="Product 1">
                            <div class="item-details">
                                <div class="item-name">{{ $prodname }}</div>
                                <div class="text-muted"><b>quantity: </b> {{$amt}}</div>
                            </div>
                            <div class="item-price mx-4">{{$showprice}}</div>
                            
                            <form action="./remove_from_cart" method="post" data-role="remove_item_{{$id}}">
                                @csrf
                                <input type="hidden" name="recid" value="{{ $myid }}">
                                <i class="fa fa-times remove-item" aria-hidden="true" data-submitme='[data-role="remove_item_{{$id}}"]'></i>
                            </form>
                        </div>

                        <?php
                            $id++;
                        ?>
                    @endforeach
                @endif

            </div>

            <?php
                $showsum = number_format($sum);
            ?>

            <div class="cart-summary">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h4 class="mb-0">Total Items:</h4>
                    </div>
                    <div class="col-md-6 text-right">
                        <span class="total-amount w3-text-black">{{ $id }}</span>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h4 class="mb-0">Total Amount:</h4>
                    </div>
                    <div class="col-md-6 text-right">
                        <span class="total-amount">{{ $showsum }}</span>
                    </div>
                </div>
                @if (count($m_cart) != 0)
                    <hr>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <form class="w3-hide" action="./clearcart" method="post" data-role="clearcart">
                                @csrf
                                <input type="hidden" name="doit" value="yes">
                            </form>

                            <button class="btn btn-custom btn-clear mr-2" data-submitme='[data-role="clearcart"]'>
                                <i class="fa fa-trash"></i> Clear Cart
                            </button>
                            <button class="btn btn-custom btn-checkout">
                                <i class="fa fa-credit-card"></i> Checkout
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </x-slot>
</x-siteparts.layout>