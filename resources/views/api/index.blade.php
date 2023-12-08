<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .pulse {
            animation: pulse 2s infinite;
        }
    </style>
    <title>Enhanced Form</title>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 pulse">
            <div class="card shadow-lg">
                <div class="card-body p-5">
                    <h2 class="card-title text-center mb-4">Sign In</h2>
                    <form>

                        <div class="mb-3">
                            <label for="formEmail" class="form-label visually-hidden">Employee_name</label>
                            <input type="text" class="form-control" name="emp_name" placeholder="Enter Employee Name" required>
                        </div>

                        <div class="mb-3">
                            <label for="formPassword" class="form-label visually-hidden">Phone Number</label>
                            <input type="text" class="form-control" name ="emp_number" placeholder="Enter your Mobile Number " required>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="formRemember">
                                <label class="form-check-label" for="formRemember">Remember me</label>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                    </form>

                    <hr class="my-4">

                    <div class="text-center">
                        <p class="mb-2">Not a member? <a href="#" class="text-decoration-none">Register</a></p>
                        <p class="mb-3">or sign up with:</p>

                        <div class="btn-group" role="group" aria-label="Sign up with">
                            <button type="button" class="btn btn-secondary btn-floating">
                                <i class="fab fa-facebook-f"></i>
                            </button>
                            <button type="button" class="btn btn-secondary btn-floating">
                                <i class="fab fa-google"></i>
                            </button>
                            <button type="button" class="btn btn-secondary btn-floating">
                                <i class="fab fa-twitter"></i>
                            </button>
                            <button type="button" class="btn btn-secondary btn-floating">
                                <i class="fab fa-github"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
