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

                    <form action="{{url('update_category', $category->id)}}" class="row g-3" method="post">
                        @csrf
                        <div class="col-auto">
                            <input type="text" class="form-control" id="" name="category" placeholder="" value="{{$category->category_name}}">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- JavaScript files-->
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