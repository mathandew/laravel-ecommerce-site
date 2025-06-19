<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
    .image-preview {
      width: 100%;
      height: 300px;
      border: 2px dashed #ddd;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      color: #ccc;
    }
    .image-preview img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: none;
    }
  </style>
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

                    <h1>Add Product</h1>

                    <div class="container mt-4">
                        <form action="upload_product" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter product title">
                                </div>
                                <div class="col">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-control" id="category" name="category">
                                        <option selected>Select category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"
                                    placeholder="Enter product description"></textarea>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" class="form-control" id="price" name="price"
                                        placeholder="Enter product price">
                                </div>
                                <div class="col">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity"
                                        placeholder="Enter product quantity">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="image-preview" id="imagePreview">
                                <img src="" alt="Image Preview" class="image-preview__image">
                                <span class="image-preview__default-text">Image Preview</span>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- image preview  -->
        <script>
  const imageUpload = document.getElementById('image');
  const imagePreview = document.getElementById('imagePreview');
  const imagePreviewImage = imagePreview.querySelector('.image-preview__image');
  const imagePreviewDefaultText = imagePreview.querySelector('.image-preview__default-text');

  imageUpload.addEventListener('change', function() {
    const file = this.files[0];

    if (file) {
      const reader = new FileReader();

      imagePreviewDefaultText.style.display = 'none';
      imagePreviewImage.style.display = 'block';

      reader.addEventListener('load', function() {
        imagePreviewImage.setAttribute('src', this.result);
      });

      reader.readAsDataURL(file);
    } else {
      imagePreviewDefaultText.style.display = 'block';
      imagePreviewImage.style.display = 'none';
      imagePreviewImage.setAttribute('src', '');
    }
  });
</script>
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