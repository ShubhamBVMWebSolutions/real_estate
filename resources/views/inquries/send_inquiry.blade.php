<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inquries</title>
</head>
<link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">

    <!-- Custom styles for this template-->
<link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
<!-- Inuairy Form Styles -->
<link href="{{asset('css/inquiry.css')}}" rel="stylesheet">
<body>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
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
</body>
</html>