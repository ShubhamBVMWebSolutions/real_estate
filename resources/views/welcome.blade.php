<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
         @include('front_page.css')

    </head>
<body class="antialiased">
        <!-- Template Start's -->
       @include('front_page.navbar')
        <div class="untree_co_slider-wrap" data-aos="fade-up">
            <div class="nav-direction">
              <a href="#" class="js-nav-right nav-right"><span class="icon-keyboard_arrow_right"></span></a>
              <a href="#" class="js-nav-left nav-left"><span class="icon-keyboard_arrow_left"></span></a>
            </div>

            <div class="untree_co_slider">
              @foreach($products as $product)
              <div class="item">
                <img src="{{asset($product->product_image)}}" alt="Image" class="img-fluid">

                <div class="property-contents">
                  <strong class="current-price text-secondary">$999,000</strong>
                  <span class="old-price">${{$product->product_price}}</span>
                  <h2>
                    <a href="#"><span>{{$product->product_name}}</span></a>
                  </h2>
                  <h2>
                    <a href="#"><span>{{$product->product_discription}}</span></a>
                  </h2>
                </div>

                <div class="property_details">
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
                </div>
              </div>
              @endforeach
            </div>
        </div>

        <div class="untree_co-section">
          <div class="container"> 
            <div class="row gutter-v2">
              <div class="col-lg-6 mb-4 mb-lg-2">
                <a href="#" class="feature-v2 d-flex">
                  <div class="icon-wrap">
                    <span class="icon-users"></span>
                  </div>
                  <div class="text">
                    <h3 class="heading">Community of Agents</h3>
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  </div>
                </a> <!-- /.feature-v2 -->
              </div> <!-- /.col-lg-6 -->
              <div class="col-lg-6 mb-4 mb-lg-2">
                <a href="#" class="feature-v2 d-flex">
                  <div class="icon-wrap">
                    <span class="icon-building"></span>
                  </div>
                    <div class="text">
                      <h3 class="heading">1000+ Properties</h3>
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    </div>
                  </a> <!-- /.feature-v2 -->
              </div> <!-- /.col-lg-6 -->

              <div class="col-lg-6 mb-4 mb-lg-2">
                <a href="#" class="feature-v2 d-flex">
                  <div class="icon-wrap">
                    <span class="icon-support"></span>
                  </div>
                  <div class="text">
                    <h3 class="heading">Customer Service</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  </div>
                </a> <!-- /.feature-v2 -->
              </div> <!-- /.col-lg-6 -->
              <div class="col-lg-6 mb-4 mb-lg-2">
                <a href="#" class="feature-v2 d-flex">
                  <div class="icon-wrap">
                    <span class="icon-chat_bubble_outline"></span>
                  </div>
                  <div class="text">
                    <h3 class="heading">Blog Posts</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  </div>
                </a> <!-- /.feature-v2 -->
              </div> <!-- /.col-lg-6 -->
            </div> <!-- /.row -->
          </div> <!-- /.container -->
        </div>

        <div class="untree_co-section bg-light">
            <div class="container">
              <div class="row align-items-center mb-3">
                <div class="col-6">
                  <h2 class="heading-2">Properties</h2>
                </div>
                <div class="col-6 text-right properties-nav-direction">
                  <a href="#" class="prev js-custom-prev-v2"><span class="icon-keyboard_backspace"></span></a>
                  <a href="#" class="next js-custom-next-v2"><span class="icon-keyboard_backspace"></span></a>
                </div>
              </div>
            </div>
            <div class="owl-3-slider owl-carousel">
              @foreach($products as $product)
              <div class="item">
                <div class="property-entry">
                  <img src="{{asset($product->product_image)}}" alt="Image" class="img-fluid">
                  <div class="property-specs">
                    <strong class="price">${{$product->product_price}}</strong>
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
                      </div>
                      <div class="more">
                        <a href="#">
                          <span class="icon-keyboard_backspace"></span>
                        </a>
                      </div>
                    </div>
                    
                  </div>
                </div> <!-- /.property-entry --> 
              </div>
              @endforeach 
            </div> <!-- /.owl-3-slider -->      
        </div>

        <div class="untree_co-section">
            <div class="container">
              <div class="row justify-content-center text-center">
                <div class="col-lg-6 mb-5">
                  <h2 class="text-secondary heading">We will help you find your home</h2>
                  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div>
              </div>

              <div class="row justify-content-center">
                <div class="col-lg-10">
                  <div class="row">
                    <div class="col-6 col-lg-3 mb-5 mb-lg-0">
                      <div class="service">
                        <div class="icon-wrap"><span class="flaticon-building"></span></div>
                        <div>
                          <h3><a href="#">The Word Mountains</a></h3>
                          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 col-lg-3 mb-5 mb-lg-0">
                      <div class="service">
                        <div class="icon-wrap"><span class="flaticon-bathtub"></span></div>
                        <div>
                          <h3><a href="#">The Word Mountains</a></h3>
                          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 col-lg-3 mb-5 mb-lg-0">
                      <div class="service">
                        <div class="icon-wrap"><span class="flaticon-bed"></span></div>
                        <div>
                          <h3><a href="#">The Word Mountains</a></h3>
                          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 col-lg-3 mb-5 mb-lg-0">
                      <div class="service">
                        <div class="icon-wrap"><span class="flaticon-house-size"></span></div>
                        <div>
                          <h3><a href="#">The Word Mountains</a></h3>
                          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                        </div>
                      </div>
                    </div>     
                  </div>
                </div>

              </div>
            </div>
        </div>

        <div class="untree_co-section bg-light">
            <div class="container">
              <div class="row align-items-center justify-content-between">
                  <div class="col-lg-4">
                    <ul class="list-unstyled list-icons">
                      <li>
                        <a href="#" class="d-flex align-items-center">
                          <span class="icon-wrap">
                            <span class="flaticon-bed"></span>
                          </span>
                          <span class="text">
                           Right at the coast of the Semantics Vokalia and Consonantia
                         </span>
                       </a>
                      </li>

                      <li>
                        <a href="#" class="d-flex align-items-center">
                          <span class="icon-wrap">
                            <span class="flaticon-building"></span>
                          </span>
                          <span class="text">
                            And if she hasn’t been rewritten then Vokalia and Consonantia
                          </span>
                        </a>
                      </li>

                      <li>
                        <a href="#" class="d-flex align-items-center">
                          <span class="icon-wrap">
                            <span class="flaticon-garage"></span>
                          </span>
                          <span class="text">
                            Separated they live in Bookmarksgrove right at  large
                          </span>
                        </a>
                      </li>

                      <li>
                        <a href="#" class="d-flex align-items-center">
                          <span class="icon-wrap">
                            <span class="flaticon-map"></span>
                          </span>
                          <span class="text">
                            And if she hasn’t been rewritten then large language ocean.
                          </span>
                        </a>
                      </li>

                      <li>
                        <a href="#" class="d-flex align-items-center">
                          <span class="icon-wrap">
                            <span class="flaticon-shower"></span>
                          </span>
                          <span class="text">
                            And if she hasn’t been rewritten then Vokalia and Consonantia
                          </span>
                        </a>
                      </li>
                    </ul>
                  </div>
                   <!-- /.col-lg-4 -->
                  <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="{{asset('homepage/images/img_portrait_1.jpg')}}" alt="Image" class="img-fluid rounded">
                  </div>
              <!-- /.col-lg-4 -->
              </div> 
            </div> 
        </div>

        @include('front_page.footer')
        <!-- Template End's -->

        <!-- Template Script's  -->
        @include('front_page.scripts')
        <!-- Template Script's  -->
</body>
</html>
