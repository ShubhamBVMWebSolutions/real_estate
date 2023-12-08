<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
</head>
<body>
	<div class="container mt-5">
	    <div class="row justify-content-center">
	        <div class="col-lg-10">
	            <div class="card shadow">
	                <div class="card-header bg-primary text-white">
	                    <h5 class="mb-0">Question and Answer Table</h5>
	                </div>
	                <div class="card-body">
	                    <div class="table-responsive">
	                        <table class="table table-bordered table-hover mb-0">
	                            <thead class="thead-dark">
	                                <tr>
	                                    <th class="fw-normal" scope="col">Questions</th>
	                                    <th class="fw-normal" scope="col">Answer 1</th>
	                                    <th class="fw-normal" scope="col">Answer 2</th>
	                                    <th class="fw-normal" scope="col">Answer 3</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                                @foreach($question as $q)
	                                <tr>
	                                    <td class="fw-bold">{{$q->question}}</td>
	                                    <td class="text-success">{{$q->answer_a}}</td>
	                                    <td class="text-primary">{{$q->answer_b}}</td>
	                                    <td class="text-danger">{{$q->answer_c}}</td>
	                                </tr>
	                                @endforeach
	                            </tbody>
	                        </table>
	                    </div>
	                </div>
	                <div class="card-footer text-muted text-center">
	                    Table Footer Content or Additional Information
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>