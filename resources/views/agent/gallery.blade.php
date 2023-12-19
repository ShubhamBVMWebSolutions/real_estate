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

    /* Style the modal */
    .selected_image_modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
    }

    .selected_image_modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        padding-bottom: 20px;
    }

    .selected_image_close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .selected_image_close:hover,
    .selected_image_close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }


    .modal .modal-image-container {
      text-align: center;
      margin-bottom: 20px;
      display: inline-block;
      width: 200px;
      height: 150px;
      margin-right: 20px;
      vertical-align: top;
      padding-bottom: 15px;
    }

    .modal .modal-image-container img {
      max-width: 100%;
      height: 100%;
     object-fit: cover;
    }

    .modal .modal-image-container select {
      margin-top: 10px;
    }
    select {
        margin-top: 10px;
        display: flex;
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
                          <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title mb-0" style="flex: 1;">{{$property->product_name}}</h4>
                            <form action="{{route('property_gallery_update',Crypt::encrypt(['id'=>$property->id]))}}" method="POST" enctype="multipart/form-data" style="" id="uploadForm">
                                @csrf
                                <label for="fileInput">
                                <img src="{{asset('icons/upload.png')}}" alt="upload_image" style="width: 45px;height: 35px; object-fit: contain; cursor: pointer;">
                                <input type="file" name="images[]"id="fileInput" style="display: none;"multiple onchange="openModal()">
                                    
                                </label>
                            </form>
                          </div>
                          <div class="card-body">
                            <div>
                              <div class="btn-group w-100 mb-2">
                                <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> All items </a>
                                <a class="btn btn-info" href="javascript:void(0)" data-filter="Exterior">Exterior </a>
                                <a class="btn btn-info" href="javascript:void(0)" data-filter="Interior">Interior </a>
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
                              <div class="filter-container p-0 row" style="top: 22px;">
                                @foreach($gallery as $image)
                                <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample" style="width: 100%; margin: 0; padding: 0;" id="image_container">
                                  <a href="#" onclick="openzoomImageModal('{{asset($image->image)}}')" data-toggle="modal"  data-target="#imageModal" data-title="{{$image->image_category}}">
                                    <img src="{{asset($image->image)}}" class="img-fluid mb-2" alt="white sample" style=" width: 100%;height: 233px;object-fit: cover;">
                                  </a>
                                     <span class="delete-icon" onclick="deleteImage('{{ $image->id }}')"><i class='fas fa-trash' style='font-size:20px;color:red'></i></i></span>
                                </div>
                                @endforeach
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
    <!-- Modal HTML structure -->
    <div id="imageModal" class="modal">
        <div class="selected_image_modal-content">
            <span class="selected_image_close" onclick="closeModal()">&times;</span>
            <div id="selectedImages" class="row" style="padding-bottom: 40px;"></div>
            <button class="btn btn-primary" onclick="submitForm()">Submit</button>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="zoomimageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background: transparent; border: none;">
            <div class="modal-body" style="padding: 0;">
              <h1>Hello</h1>
                <img id="modalzoomImage" src="" class="img-fluid" alt="Modal Image" style="max-width: 130vh;height: 100%;margin: 0 auto;display: block; width: 100%; object-fit: contain;">
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

  // $('#fileInput').on('change', function () {
  //       $('#uploadForm').submit();
  //   });
</script>
<script>
    function openzoomImageModal(imageSrc) {
        var modal = document.getElementById("zoomimageModal");
        modal.style.display = "block";
        var modalzoomImage = document.getElementById('modalzoomImage');
        modalzoomImage.src = imageSrc;
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

<script>
  
  function openModal() {
    var modal = document.getElementById("imageModal");
    modal.style.display = "block";

    var filesInput = document.getElementById("fileInput");
    var selectedImagesContainer = document.getElementById("selectedImages");

    selectedImagesContainer.innerHTML = "";

    for (var i = 0; i < filesInput.files.length; i++) {
        var imgContainer = document.createElement("div");
        imgContainer.className = "modal-image-container";

        var img = document.createElement("img");
        img.src = URL.createObjectURL(filesInput.files[i]);
        img.className = "modal-image"; 
        imgContainer.appendChild(img);

        var dropdown = createDropdown(i);
        imgContainer.appendChild(dropdown);

        selectedImagesContainer.appendChild(imgContainer);
    }
}

function closeModal() {
    var modal = document.getElementById("imageModal");
    modal.style.display = "none";
}

function createDropdown(index) {
    var dropdown = document.createElement("select");
    dropdown.name = "category["+ index +"]";

    // Add dropdown options
    var options = ["Exterior", "Interior"];
    for (var i = 0; i < options.length; i++) {
        var option = document.createElement("option");
        option.text = options[i];
        dropdown.add(option);
    }
    return dropdown;
}

function submitForm() {
    var filesInput = document.getElementById("fileInput");
    var selectedValues = [];
     for (var i = 0; i < filesInput.files.length; i++) {
        var dropdown = document.getElementsByName("category[" + i + "]")[0];
        var selectedValue = dropdown.options[dropdown.selectedIndex].text;
        selectedValues.push({ 
          file: filesInput.files[i],
          category: selectedValue
        });
    }
    console.log(selectedValues);
     var formData = new FormData();
      for (var i = 0; i < selectedValues.length; i++) {
        formData.append("images[]", selectedValues[i].file);
        formData.append("categories["+ i +"]", selectedValues[i].category);
    }

    var formAction = document.getElementById("uploadForm").action;
     fetch(formAction, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
       if (data.success) {
            location.reload();
        } else {
            console.error('Error:', data.error);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    })
    .finally(() => {
        // Close the modal
        closeModal();
    });
}

</script>

<!-- Page Script's -->
</body>
</html>