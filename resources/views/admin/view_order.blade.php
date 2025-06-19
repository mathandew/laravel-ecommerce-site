<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">


                    <h1>Orders</h1>

                    <div class="">

                        <table class="table table-success">
                            <tr>
                                <th>Id</th>
                                <th>Recepient Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Product Title</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Status Action</th>
                                <th>Print PDF</th>
                            </tr>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->rec_address}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->product->title}}</td>
                                    <td>{{$order->product->price}}</td>
                                    <td><img src="products/{{$order->product->image}}" alt="" class="img-small"
                                            style="width:50px; height:50px;"></td>
                                    <td>
                                    @if ($order->status == "in progress")
                                        <span style="color:red">{{$order->status}}</span>
                                    @elseif ($order->status == "Delivered") 
                                        <span style="color:green" style>{{$order->status}}</span>
                                    @elseif ($order->status == "Canceled") 
                                    <span style="color:black" style>{{$order->status}}</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{url('on_the_way', $order->id)}}">On The Way</a>
                                    <a class="btn btn-sm btn-success" href="{{url('order_delivered', $order->id)}}">Delivered</a>
                                    <a class="btn btn-sm btn-secondary" href="{{url('order_canceled', $order->id)}}">Canceled</a>
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{{url('print_pdf', $order->id)}}">Print</a>
                                </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!-- JavaScript files-->

        <script type="text/javascript">
            function Confirmation(event) {

                event.preventDefault();

                var urlToRedirect = event.currentTarget.getAttribute('href');

                swal({
                    title: "Are sure to delete this",
                    text: "This delete will be permanent",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willCancel) => {

                    if (willCancel) {

                        window.location.href = urlToRedirect;
                    }
                })

            }
        </script>

        <!-- Sweet Alert-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
            integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
        <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
        <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
        <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
        <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
        <script src="{{asset('/admincss/js/front.js')}}"></script>
</body>

</html>