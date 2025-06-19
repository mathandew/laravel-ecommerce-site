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

        <div class="container mt-5 mb-5">
    <h2 class="mb-4">Product Table</h2>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Status</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->product->title}}</td>
                <td>{{$order->product->title}}</td>
                <td>{{$order->status}}</td>
                <td><img src="products/{{$order->product->image}}" alt="Product 1" width="50"></td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>

    </div>

        <!-- info section -->
        @include('home.footer')

        <!-- js links -->
        @include('home.js')


</body>

</html>