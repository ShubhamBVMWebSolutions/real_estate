<script>
    $(document).ready(function () {
        var messageOffset = 0; // Initial offset
        var messagesPerPage = 4; // Number of messages to display per page

        // Function to fetch and display messages
        function fetchAndDisplayMessages(offset) {
            $.ajax({
                url: '/fetch-messages', // Replace with your Laravel route
                type: 'GET',
                dataType: 'json',
                data: {
                    offset: offset,
                    limit: messagesPerPage
                },
                success: function (data) {
                    // Sort messages in descending order based on created_at
                    data.sort(function (a, b) {
                        return new Date(b.created_at) - new Date(a.created_at);
                    });

                    // Update the dropdown content with the fetched messages
                    updateDropdown(data);

                    // Update the badge with the total number of messages
                    updateBadge(data.length);
                },
                error: function (error) {
                    console.error('Error fetching messages:', error);
                }
            });
        }

        // Update the badge and display messages on page load
        fetchAndDisplayMessages(messageOffset);

        // Attach a click event to the messages dropdown
        $("#messagesDropdown").on("click", function () {
            // Increment the offset to fetch the next set of messages
            messageOffset += messagesPerPage;

            // Fetch and display the next set of messages
            fetchAndDisplayMessages(messageOffset);
        });

        // Function to update the badge with the number of messages
        function updateBadge(messageCount) {
            // Select the badge element
            var badgeElement = $(".badge-counter");

            // Update the text content with the number of messages
            badgeElement.text(messageCount);
        }

        // Function to update the dropdown with messages
        function updateDropdown(messages) {
            // Select the dropdown container
            var dropdownContainer = $(".dropdown-list");

            // Clear existing content
            dropdownContainer.empty();

            // Iterate through each message and create HTML elements
            messages.forEach(function (message) {
                // ... (the rest of the code remains unchanged)
            });

            // Add "Read More Messages" link
            var readMoreLink = $("<a>").addClass("dropdown-item text-center small text-gray-500").attr("href", "#").text("Read More Messages");
            readMoreLink.on("click", function () {
                // Fetch and display the next set of messages when the link is clicked
                fetchAndDisplayMessages(messageOffset);
            });

            // Append the "Read More Messages" link to the dropdown container
            dropdownContainer.append(readMoreLink);
        }
    });
</script>










<div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{ Auth::user()->name }}</span><span class="text-black-50">{{ Auth::user()->email }}</span><span> </span></div>
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
                                <input type="text" name="surname" class="form-control"placeholder="Surname">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Mobile Number</label>
                                <input type="text" class="form-control" placeholder="Enter phone number" name="contact">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Address Line 1</label>
                                <input type="text" class="form-control" placeholder="Enter address line 1" value="" name="address_1">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Address Line 2</label>
                                <input type="text" class="form-control" placeholder="Enter address line 2" value="" name="address_2">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Postcode</label>
                                <input type="text" class="form-control" placeholder="Enter postcode" value="" name="postcode">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">State</label>
                                <input type="text" class="form-control" placeholder="Enter state" value="" name="state">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Area</label>
                                <input type="text" class="form-control" placeholder="Enter area" value="" name="area">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Email ID</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->email }}" disabled>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Education</label>
                                <input type="text" class="form-control" placeholder="Enter Last Education" value="" name="education">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Country</label>
                                <input type="text" class="form-control" placeholder="Enter country" value="" name="country">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">State/Region</label>
                                <input type="text" class="form-control" placeholder="Enter state/region" value="" name="state">
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