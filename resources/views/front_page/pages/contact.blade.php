
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <!-- Inuairy Form Styles -->
<link href="{{asset('css/inquiry.css')}}" rel="stylesheet">
  @include('front_page.css')

  <title>Rent - Property</title>
</head>

<body>

   @include('front_page.navbar')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 pulse">
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h2 class="card-title text-center mb-4">Send An Inquiry</h2>
                        <form action="{{route('inquiry')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" name ="email" placeholder="Email ID" required>
                            </div>
                            <div class="mb-3">
                                <input type="number" class="form-control" name ="contact" placeholder="Phone Number">
                            </div>
                             <div class="mb-3">
                                <textarea class="form-control" name ="message" placeholder="Inquries......"></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="checkbox" name ="checkbox">
                                <label for="whats'app"class="form-label visually-hidden" style="display: contents;">Enable Update Through <img src="{{asset('img/whatsapp.png')}}" style="max-width: 19%;"></label>
                            </div>
                            <hr class="my-4">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

  @include('front_page.footer')

  <!-- Template Script's  -->
  @include('front_page.scripts')
  <!-- Template Script's  -->
  </body>

</html>
