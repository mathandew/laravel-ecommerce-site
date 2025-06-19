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
</div>

        <!-- product detail -->

        <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="../products/{{$product->image}}" alt="Product Image" class="product-image" style="max-width: 100%; height: auto;">
            </div>
            <div class="col-md-6 product-details">
                <h2>{{$product->title}}</h2>
                <p class="text-muted">{{$product->description}}</p>
                <h4>${{$product->price}}</h4>
                <div class="d-flex align-items-center mb-3">
                    <label for="quantity" class="mr-2">{{$product->quantity}}:</label>
                    <input type="number" id="quantity" name="quantity" class="form-control quantity-input" value="1" min="1">
                </div>
                <a class="btn btn-primary" href="{{url('add_cart', $product->id)}}">Add to Cart</a>
            </div>
        </div>
    </div>

        <!-- info section -->
        @include('home.footer')

        <!-- js links -->
        @include('home.js')


</body>

</html>