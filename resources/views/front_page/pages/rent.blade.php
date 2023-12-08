
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="" />

 @include('front_page.css')

  <title>Rent - Property</title>
</head>

<body>
  @include('sweetalert::alert')
   @include('front_page.navbar')



  <div class="untree_co-section">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-lg-6">
          <h2 class="text-secondary heading-2">Rent Properties</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="untree_co-section bg-light">
    <div class="container">
      <div class="row">
        @foreach($products as $product)
        <div class="col-md-6 col-lg-4 products">
          <a href="{{route('details',Crypt::encrypt(['id'=>$product->id]))}}" style="text-decoration: none;">
          <div class="property-entry">
            <img src="{{asset($product->product_image)}}" alt="Image" class="img-fluid" style="width: 100%; height: 200px; object-fit: cover;">
            <div class="property-specs">
              <strong class="price d-inline-block">${{$product->product_price}}</strong>/month
              <ul class="list-unstyled specs">
                <li class="d-inline-flex align-items-center">
                  <span class="icon-wrap flaticon-bathtub"></span>
                  <strong>{{$product->no_of_bathrooms}}</strong>
                </li>
                <li class="d-inline-flex align-items-center">
                  <span class="icon-wrap flaticon-bed"></span>
                  <strong>{{$product->no_of_bedrooms}}</strong>
                </li>
                <li class="d-inline-flex align-items-center">
                  <span class="icon-wrap flaticon-house-size"></span>
                  <strong>{{$product->area}}<sup>2</sup></strong>
                </li>
              </ul>

              <div class="location d-flex justify-content-between align-items-center">
                <div>
                  <span class="d-block caption">location: </span>
                  <h3><a href="#"><span>{{$product->product_name}}</span></a></h3>
                  <a href="{{url('/property_inquiry/'.Crypt::encrypt($product->id))}}" class="send-inquiry">Send An Inquiry</a>
                </div>
                <div class="more">
                  <a href="#">
                    <span class="icon-keyboard_backspace"></span>
                  </a>
                </div>
              </div>
              
            </div>
          </div> <!-- /.property-entry -->
          </a> 
        </div> <!-- /.col-lg-4 -->
        @endforeach
      </div> <!-- /.row -->
      <div class="row mt-5">
        <div class="col-12">
          <ul class="list-unstyled untree_co-pagination">
            <li><a href="#">1</a></li>
            <li><span>2</span></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
          </ul> <!-- /.list-unstyled -->
        </div> <!-- /.col-12 -->
      </div> <!-- /.row -->
    </div> <!-- /.container -->
  </div> <!-- /.untree_co-section -->


  <div class="untree_co-section">
    <div class="container"> 
      <div class="row gutter-v3">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <a href="#" class="feature-v2 d-flex">
            <div class="icon-wrap">
              <span class="icon-support"></span>
            </div>
            <div class="text">
              <h3 class="heading">Ask our Customer Service</h3>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </a> <!-- /.feature-v2 -->
        </div> <!-- /.col-lg-6 -->
        <div class="col-lg-6 mb-4 mb-lg-0">
          <a href="#" class="feature-v2 d-flex">
            <div class="icon-wrap">
              <span class="icon-chat_bubble_outline"></span>
            </div>
            <div class="text">
              <h3 class="heading">Visit our Blog</h3>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </a> <!-- /.feature-v2 -->
        </div> <!-- /.col-lg-6 -->
      </div> <!-- /.row -->
    </div> <!-- /.container -->
  </div>

  @include('front_page.footer')

  <!-- Template Script's  -->
  @include('front_page.scripts')
  <!-- Template Script's  -->
  </body>

</html>
