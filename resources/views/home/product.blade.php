<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">

      @foreach ($products as $product)
      
      

        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
              <div class="img-box">
                <img src="products/{{$product->image}}" alt="">
              </div>
              <div class="detail-box">
                <h6>{{$product->title}}</h6>
                <h6>Price<span>${{$product->price}}</span></h6>
              </div>

              <div class=" d-flex justify-content-end pt-2">
                <a class="btn btn-success" href="{{url('product_detail', $product->id)}}">Details</a>
              </div>
          </div>
        </div>

        @endforeach
      </div>
    </div>
  </section>