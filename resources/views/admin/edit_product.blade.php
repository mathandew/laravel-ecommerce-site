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

                    <h1>Update Product</h1>

                    <div class="container mt-4">
                        <form action="{{url('update_product', $product->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="" value="{{$product->title}}">
                                </div>
                                <div class="col">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-control" id="category" name="category">
                                        <option value="{{$product->category}}">{{$product->category}}</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"
                                    placeholder="">{{$product->description}}</textarea>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" class="form-control" id="price" name="price"
                                        placeholder="" value="{{$product->price}}">
                                </div>
                                <div class="col">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity"
                                        placeholder="" value="{{$product->quantity}}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

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