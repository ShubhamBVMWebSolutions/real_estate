<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="{{asset('profile/css/profile_style.css')}}">
	 @include('agent.layouts.css')
</head>
<body id="page-top">
	<div id="wrapper">
		 @include('agent.layouts.leftsidebar')
		 <div id="content-wrapper" class="d-flex flex-column">
		 	<div id="content">
		 		@include('agent.layouts.topbar')
		 		<div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                    </div>
						<div class="container rounded bg-white mt-5 mb-5">
						    <div class="row">
						        <div class="col-md-3 border-right">
						            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
						            	<div class="profile-container">
							            	@if($profile->profile_pic==null)
							            	<img class="rounded-circle mt-5" width="150px" src="{{asset('img/profile_pic.jpeg')}}">
							            	@else
							            	<img class="rounded-circle mt-5" width="150px" src="{{asset($profile->profile_pic)}}" alt="profile_pic">
							            	@endif
							            	<form action="{{route('profile_pic')}}" method="post" id="profilePicForm" enctype="multipart/form-data">
							            		@csrf
							            		<input type="hidden" name="user_id" value="{{$profile->id}}">
								                <label for="fileInput" class="camera-icon" onclick="handleUploadClick()">📷</label>
								            	 <input type="file" id="profilePicInput" name="image" style="display: none" accept="image/*">
							                </form>
							            	<span class="profile_name">{{ Auth::user()->name }}</span>
							            	<span class="text-black-50 profile_email">{{ Auth::user()->email }}</span>
						            	</div>
						            </div>
						        </div>
						        <div class="col-md-9 border-right">
								    <div class="p-3 py-5">
								        <div class="d-flex justify-content-between align-items-center mb-3">
								            <h4 class="text-right">Profile Settings</h4>
								        </div>
								        <form action="{{route('update_profile')}}" method="POST">
								        	@csrf
									        <div class="row mt-2">
									            <div class="col-md-6 mb-3">
									                <label class="form-label">Name</label>
									                <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
									            </div>
									            <div class="col-md-6 mb-3">
									                <label class="form-label">Surname</label>
									                <input type="text" name="surname" class="form-control"placeholder="Surname" value="{{$profile->surname}}">
									            </div>
									        </div>
									        <div class="row mt-3">
									            <div class="col-md-12 mb-3">
									                <label class="form-label">Mobile Number</label>
									                <input type="text" class="form-control" placeholder="Enter phone number" name="contact" value="{{$profile->contact}}">
									            </div>
									            <div class="col-md-12 mb-3">
									                <label class="form-label">Address Line 1</label>
									                <input type="text" class="form-control" placeholder="Enter address line 1" value="{{$profile->address_1}}" name="address_1">
									            </div>
									            <div class="col-md-12 mb-3">
									                <label class="form-label">Address Line 2</label>
									                <input type="text" class="form-control" placeholder="Enter address line 2" value="{{$profile->address_2}}" name="address_2">
									            </div>
									            <div class="col-md-12 mb-3">
									                <label class="form-label">Postcode</label>
									                <input type="text" class="form-control" placeholder="Enter postcode" value="{{$profile->postcode}}" name="postcode">
									            </div>
									            <div class="col-md-12 mb-3">
									                <label class="form-label">State</label>
									                <input type="text" class="form-control" placeholder="Enter state" value="{{$profile->state}}" name="state">
									            </div>
									            <div class="col-md-12 mb-3">
									                <label class="form-label">Area</label>
									                <input type="text" class="form-control" placeholder="Enter area" value="{{$profile->Area}}" name="area">
									            </div>
									            <div class="col-md-12 mb-3">
									                <label class="form-label">Email ID</label>
									                <input type="text" class="form-control" value="{{ Auth::user()->email }}" disabled>
									            </div>
									            <div class="col-md-12 mb-3">
									                <label class="form-label">Education</label>
									                <input type="text" class="form-control" placeholder="Enter Last Education" value="{{$profile->education}}" name="education">
									            </div>
									        </div>
									        <div class="row mt-3">
									            <div class="col-md-6 mb-3">
									                <label class="form-label">Country</label>
									                <input type="text" class="form-control" placeholder="Enter country" value="{{$profile->country}}" name="country">
									            </div>
									            <div class="col-md-6 mb-3">
									                <label class="form-label">State/Region</label>
									                <input type="text" class="form-control" placeholder="Enter state/region" value="{{$profile->state}}" name="state">
									            </div>
									        </div>
									        <div class="mt-5 text-center">
									            <button class="btn btn-primary" type="submit">Save Profile</button>
									        </div>
								        </form>
								    </div>
								</div>
						    </div>
						</div>
				</div>
			</div>
			@include('agent.layouts.footer')
		</div>
	</div>
	<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    @include('agent.layouts.scripts')
    
</body>
</html>