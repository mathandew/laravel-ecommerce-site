<!DOCTYPE html>
<html>

<head>

    <!-- css links -->
    @include('home.css')

</head>

<body>
    <div class="hero_area">

        <!-- header section -->
        @include('home.header')

        <!-- slider section -->
        <!-- @include('home.slider') -->

    </div>

    <div class="container mt-5">
        <h2 class="mb-4">Shopping Cart</h2>
        <div class="row">
            <div class="col-md-8">

            <?php
                $total_price = 0;
            ?>

            @foreach ($cart as $cart_item)
            
            
            <div class="cart-item row pt-5">
                    <div class="col-md-3">
                        <img src="products/{{$cart_item->product->image}}" alt="Product Image" class="product-image">
                    </div>
                    <div class="col-md-6">
                        <h4>{{$cart_item->product->title}}</h4>
                        <p class="text-muted">{{$cart_item->product->description}}</p>
                    </div>
                    <div class="col-md-3 text-right">
                        <h5>${{$cart_item->product->price}}</h5>
                        <div class="d-flex align-items-center justify-content-end mb-3">
                            <label for="quantity1" class="mr-2">Quantity:{{$cart_item->product->quantity}}</label>
                            <!-- <input type="number" id="quantity1" name="quantity1" class="form-control quantity-input" value="1" min="1"> -->
                        </div>
                        <button class="btn btn-danger btn-sm">Remove</button>
                    </div>
                </div>

                <?php
                    $total_price = $total_price + $cart_item->product->price;
                ?>

                @endforeach
                <hr>
            </div>

            <div class="col-md-4">
            <form action="{{url('confirm_order')}}" method="post">
                @csrf
            <div class="form-group">
                <label for="name"> Name</label>
                <input type="text" class="form-control" name="recipientName" id="recipientName" placeholder="" value="{{Auth::user()->name}}">
            </div>
            <div class="form-group">
                <label for="receiverAddress"> Address</label>
                <textarea type="text" class="form-control" name="recipientAddress" id="recipientAddress" placeholder="Enter  address" required>{{Auth::user()->address}}</textarea>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" class="form-control" name="recipientPhone" id="phone" placeholder="Enter phone number" value="{{Auth::user()->phone}}" required>
            </div>
            <button type="submit" class="btn btn-primary">Cash On Delivery</button>
            <a href="" class="btn btn-danger">Pay Using Card</a>
        </form>
            </div>
            
            <div class="pt-5">
                <h1>Total Price of Products ${{$total_price}}</h1>
            </div>
        </div>
    </div>

        <!-- info section -->
        @include('home.footer')

        <!-- js links -->
        @include('home.js')


</body>

</html>