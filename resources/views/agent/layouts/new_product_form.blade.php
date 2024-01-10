<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 pulse">
            <div class="card shadow-lg">
                <div class="card-body p-5">
                    <h2 class="card-title text-center mb-4">Create A New Product</h2>
                    <form action="{{route('add_new_product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="formEmail" class="form-label visually-hidden">Product Name</label>
                            <input type="text" class="form-control" name="product_name" placeholder="Product Name" required>
                        </div>
                        <div class="mb-3" id="property_for">
                            <input type="radio" id="for_rent" name="property" value="2" class="property"><label style="margin-left: 10px;margin-right: 10px;">Property For Rent</label>
                            <input type="radio" id="for_sale" name="property" value="1" class="property"><label style="margin-left: 10px;" >Property For Sale</label>
                        </div>
                        <div class="mb-3" id="property_price">
                            <label for="formPassword" class="form-label visually-hidden">Property Price</label>
                            <input type="number" id="sale" class="form-control" name ="price" placeholder="Enter Price Of The Property For Sale....." required>
                            <input type="number" id="rent" class="form-control d-none" name ="price" placeholder="Enter Price Of The Property For Rent....." required disabled>
                        </div>

                        <div class="mb-3">
                            <label for="area" class="form-label visually-hidden">Area</label>
                            <input type="number" class="form-control" name ="area" placeholder="Area of the Propertyin(sq/mtr)" required>
                        </div>
                        <div class="mb-3">
                            <label for="bathrooms" class="form-label visually-hidden">Available Bathrooms</label>
                            <input type="number" class="form-control" name ="bathrooms" placeholder="Available Bathrooms" required>
                        </div>
                        <div class="mb-3">
                            <label for="bedrooms" class="form-label visually-hidden">Available Bedrooms</label>
                            <input type="number" class="form-control" name ="bedrooms" placeholder="No Of Bedrooms" required>
                        </div>



                        <div class="mb-3">
                            <label for="formPassword" class="form-label visually-hidden">Product Discription</label>
                            <textarea class="form-control" name ="discription" placeholder="Discription"></textarea>
                        </div>
                        <hr class="my-4">
                        <div class="mb-3 file-input-container">
                            <label for="formFile" class="form-label visually-hidden file-input-label">Click Here To Choose An Image For The Product </label>
                            <input type="file" class="form-control file-input" id="formFile" name ="image">
                        </div>
                        <hr class="my-4">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
