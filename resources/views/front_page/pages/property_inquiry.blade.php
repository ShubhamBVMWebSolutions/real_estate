<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Inquiry</title>
    <link rel="stylesheet" type="text/css" href="{{asset('homepage/css/property_inquiry.css')}}">
</head>
<body>
    @include('sweetalert::alert')
<div class="product-container">
    <div class="product-image">
        <img src="{{asset($products->product_image)}}" alt="Product Image">
        <div class="product-name">{{$products->product_name}}</div>
        <div class="product-description">
            {{$products->product_discription}}
        </div>
    </div>
    <div class="product-details">
        <form class="inquiry-form" action="{{route('send_pro_spec_inquiry')}}" method ="post">
            @csrf
            <input type="hidden" name="product_id" value = "{{$products->id}}">
            <input type="hidden" name="agent_id" value = "{{$products->agent_id}}">
            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" placeholder="Your Name Please" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Contact Details:</label>
                <input type="text" id="number" name="number" placeholder="Mobile Number" required>
            </div>
            <div class="form-group">
                <label for="message">Your Message:</label>
                <textarea id="message" placeholder="Type your mesage here....." name="message" rows="4" required></textarea>
            </div>
            <button type="submit">Send Inquiry</button>
        </form>
    </div>
</div>

</body>
</html>
