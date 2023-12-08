<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agent - Dashboard</title>

    <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/ekko-lightbox/ekko-lightbox.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/adminlte.min.css')}}">
    <!-- Custom fonts -->
    @include('agent.layouts.css')
<style>
    .image-link {
        position: relative;
        display: inline-block;
    }

    .delete-icon {
        position: absolute;
        top: 5px;
        right: 5px;
        color: white;
        cursor: pointer;
        font-size: 18px;
    }

    .delete-icon:hover {
        color: red;
    }

</style>


</head>

<body id="page-top">
    @include('sweetalert::alert')
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
                     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Gallery</h1>
                    </div>
                    <!-- Gallery -->
                    <div class="col-12">
                        <div class="card card-primary">
                          <div class="card-header">
                            <h4 class="card-title">{{$property->product_name}}</h4>
                            <form action="{{route('property_gallery_update',Crypt::encrypt(['id'=>$property->id]))}}" method="POST" enctype="multipart/form-data" style="position: relative; left: 95%;" id="uploadForm">
                                @csrf
                                <label for="fileInput">
                                <img src="{{asset('icons/upload.png')}}" alt="upload_image" style="max-width: 4%;">
                                <input type="file" name="images[]"id="fileInput" style="display: none;"multiple>
                                    
                                </label>
                            </form>
                          </div>
                          <div class="card-body">
                            <div>
                              <div class="btn-group w-100 mb-2">
                                <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> All items </a>
                                <a class="btn btn-info" href="javascript:void(0)" data-filter="1"> Category 1 (WHITE) </a>
                                <a class="btn btn-info" href="javascript:void(0)" data-filter="2"> Category 2 (BLACK) </a>
                                <a class="btn btn-info" href="javascript:void(0)" data-filter="3"> Category 3 (COLORED) </a>
                                <a class="btn btn-info" href="javascript:void(0)" data-filter="4"> Category 4 (COLORED, BLACK) </a>
                              </div>
                              <div class="mb-2">
                                <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Shuffle items </a>
                                <div class="float-right">
                                  <select class="custom-select" style="width: auto;" data-sortOrder>
                                    <option value="index"> Sort by Position </option>
                                    <option value="sortData"> Sort by Custom Data </option>
                                  </select>
                                  <div class="btn-group">
                                    <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascending </a>
                                    <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descending </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div>
                              <div class="filter-container p-0 row">
                                @foreach($gallery as $image)
                                <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample" style="width: 100%; margin: 0; padding: 0;" id="image_container">
                                  <a href="#" onclick="openImageModal('{{asset($image->image)}}')" data-toggle="modal"  data-target="#imageModal" data-title="sample 1 - white">
                                    <img src="{{asset($image->image)}}" class="img-fluid mb-2" alt="white sample"/ style=" width: 100%;height: 233px;object-fit: cover;">
                                  </a>
                                     <span class="delete-icon" onclick="deleteImage('{{ $image->id }}')"><i class='fas fa-trash' style='font-size:20px;color:red'></i></i></span>
                                </div>
                                @endforeach
                                <!-- <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                                  <a href="https://via.placeholder.com/1200/000000.png?text=2" data-toggle="lightbox" data-title="sample 2 - black">
                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample"/>
                                  </a>
                                </div>
                                <div class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample">
                                  <a href="https://via.placeholder.com/1200/FF0000/FFFFFF.png?text=3" data-toggle="lightbox" data-title="sample 3 - red">
                                    <img src="https://via.placeholder.com/300/FF0000/FFFFFF?text=3" class="img-fluid mb-2" alt="red sample"/>
                                  </a>
                                </div>
                                <div class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample">
                                  <a href="https://via.placeholder.com/1200/FF0000/FFFFFF.png?text=4" data-toggle="lightbox" data-title="sample 4 - red">
                                    <img src="https://via.placeholder.com/300/FF0000/FFFFFF?text=4" class="img-fluid mb-2" alt="red sample"/>
                                  </a>
                                </div>
                                <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                                  <a href="https://via.placeholder.com/1200/000000.png?text=5" data-toggle="lightbox" data-title="sample 5 - black">
                                    <img src="https://via.placeholder.com/300/000000?text=5" class="img-fluid mb-2" alt="black sample"/>
                                  </a>
                                </div>
                                <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                  <a href="https://via.placeholder.com/1200/FFFFFF.png?text=6" data-toggle="lightbox" data-title="sample 6 - white">
                                    <img src="https://via.placeholder.com/300/FFFFFF?text=6" class="img-fluid mb-2" alt="white sample"/>
                                  </a>
                                </div>
                                <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                  <a href="https://via.placeholder.com/1200/FFFFFF.png?text=7" data-toggle="lightbox" data-title="sample 7 - white">
                                    <img src="https://via.placeholder.com/300/FFFFFF?text=7" class="img-fluid mb-2" alt="white sample"/>
                                  </a>
                                </div>
                                <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                                  <a href="https://via.placeholder.com/1200/000000.png?text=8" data-toggle="lightbox" data-title="sample 8 - black">
                                    <img src="https://via.placeholder.com/300/000000?text=8" class="img-fluid mb-2" alt="black sample"/>
                                  </a>
                                </div>
                                <div class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample">
                                  <a href="https://via.placeholder.com/1200/FF0000/FFFFFF.png?text=9" data-toggle="lightbox" data-title="sample 9 - red">
                                    <img src="https://via.placeholder.com/300/FF0000/FFFFFF?text=9" class="img-fluid mb-2" alt="red sample"/>
                                  </a>
                                </div>
                                <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                  <a href="https://via.placeholder.com/1200/FFFFFF.png?text=10" data-toggle="lightbox" data-title="sample 10 - white">
                                    <img src="https://via.placeholder.com/300/FFFFFF?text=10" class="img-fluid mb-2" alt="white sample"/>
                                  </a>
                                </div>
                                <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                  <a href="https://via.placeholder.com/1200/FFFFFF.png?text=11" data-toggle="lightbox" data-title="sample 11 - white">
                                    <img src="https://via.placeholder.com/300/FFFFFF?text=11" class="img-fluid mb-2" alt="white sample"/>
                                  </a>
                                </div>
                                <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                                  <a href="https://via.placeholder.com/1200/000000.png?text=12" data-toggle="lightbox" data-title="sample 12 - black">
                                    <img src="https://via.placeholder.com/300/000000?text=12" class="img-fluid mb-2" alt="black sample"/>
                                  </a>
                                </div> -->
                              </div>
                            </div>

                          </div>
                        </div>
                    </div>

                    <!-- Gallery -->
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
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background: transparent; border: none;">
            <div class="modal-body" style="padding: 0;">
                <img id="modalImage" src="" class="img-fluid" alt="Modal Image" style="max-width: 130vh;height: 100%;margin: 0 auto;display: block; width: 100%; object-fit: contain;">
            </div>
        </div>
    </div>
</div>

    <!-- Bootstrap core JavaScript-->
    @include('agent.layouts.scripts')
<!-- Page Script's -->
    <script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Ekko Lightbox -->
<script src="{{asset('AdminLTE/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>
<!-- Filterizr-->
<script src="{{asset('AdminLTE/plugins/filterizr/jquery.filterizr.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('AdminLTE/dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })

  $('#fileInput').on('change', function () {
        $('#uploadForm').submit();
    });
</script>
<script>
    function openImageModal(imageSrc) {
        var modalImage = document.getElementById('modalImage');
        modalImage.src = imageSrc;
    }


    function deleteImage(id) {
        alert(id);
        $.ajax({
            url:'/delete_image',
            type:'DELETE',
            data:{
                id : id,
                _token: '{{ csrf_token() }}',
            },
            success:function (data) {
                 location.reload();
            },
            error:function (error) {
                console.error('Error Deleting Image', error);
            }
        });
    }
</script>

<!-- Page Script's -->
</body>
</html>