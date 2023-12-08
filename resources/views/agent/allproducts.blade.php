<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agent - Dashboard</title>

    <!-- Custom fonts -->
    @include('agent.layouts.css')

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('agent.layouts.leftsidebar')
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
              @include('agent.layouts.topbar')
                <!-- Begin Page Content -->
                <div class="container-fluid">
                        <!-- Page Heading -->
                     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">All Products</h1>
                            
                    </div>
                    @foreach($products as $product)
                    <div class="add_container">
                        <div class="add_product">
                            <img src="{{asset($product->product_image)}}" alt="Product Image">
                            <h2>{{$product->product_name}}</h2>
                            <p>{{$product->product_discription}}</p>
                        </div>  
                        <a href="{{route('gallery',Crypt::encrypt(['id'=>$product->id]))}}">
                            <img src="{{asset('icons/gallery.jpeg')}}" alt="galery_icon" style="max-width: 3%; position: absolute; right: 19%;">
                        </a>
                    </div>
                    @endforeach
                </div>
            <!-- Footer -->
            @include('agent.layouts.footer')
            <!-- End of Footer -->
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    @include('agent.layouts.scripts')

</body>

</html>