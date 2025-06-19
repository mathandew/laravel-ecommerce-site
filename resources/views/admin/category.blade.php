<!DOCTYPE html>
<html>

<head>
  @include('admin.css')

  <style>
    input[type='text'] {
      width: 300px;
      height: 50px;
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
          <div>
            <form action="{{url('add_category')}}" method="post">
              @csrf
              <div>
                <input class="form-group" type="text" name="category">
                <input class="btn btn-primary" type="submit" value="Add Category">
              </div>
            </form>
          </div>

          <div class="">

            <table class="table table-success">
              <tr>
              <th>Id</th>
                <th>Category Name</th>
                <th>Action</th>
              </tr>
              @foreach ($categories as $category)
              <tr>
              <td>{{$category->id}}</td>
              <td>{{$category->category_name}}</td>
              <td>
              <a href="{{url('edit_category', $category->id)}}" class="btn btn-success">Edit</a>  
              <a href="{{url('delete_category', $category->id)}}" class="btn btn-danger" onclick="Confirmation(event)">Delete</a>
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
      function Confirmation(event){

        event.preventDefault();

        var urlToRedirect = event.currentTarget.getAttribute('href');

        swal({
          title: "Are sure to delete this",
          text: "This delete will be permanent",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((willCancel)=>{

          if(willCancel){

            window.location.href = urlToRedirect;
          }
        })

      }
    </script>

    <!-- Sweet Alert-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
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