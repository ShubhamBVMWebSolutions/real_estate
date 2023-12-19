

<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
 <script src="{{asset('js/sb-admin-2.min.js')}}"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
    $(document).ready(function () {
        updateBadgeOnLoad();
        $("#messagesDropdown").on("click", function () {
            
            $.ajax({
                url: '/fetch-messages', 
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    data.sort(function (a, b) {
                        return new Date(b.created_at) - new Date(a.created_at);
                    });
                    updateDropdown(data);

                     updateBadge(data.length);
                },
                error: function (error) {
                    console.error('Error fetching messages:', error);
                }
            });
        });

        function updateDropdown(messages) {
            var dropdownContainer = $("#message-dropdown-list");
             dropdownContainer.empty();
                var messageCenterHeader = $("<h6>").addClass("dropdown-header").text("Message Center");
                dropdownContainer.append(messageCenterHeader);

             messages.forEach(function (message) {
                var messageItem = $("<a>").addClass("dropdown-item d-flex align-items-center").attr("href", "#");
                 var checkboxContainer = $("<div>").addClass("checkbox-container");                 
                 var checkboxElement = $("<input>").attr({
                        type: "checkbox",
                        name: "response",
                        style: "margin-left: -19px;",
                        checked: message.response_status == 1,
                    });
                  checkboxElement.on("change", function () {
                      var newResponseStatus = this.checked ? 1 : 0;
                      $.ajax({
                            url: '/update-response-status',
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                messageId: message.id,
                                newResponseStatus: newResponseStatus,
                            },
                            success: function () {
                                updateBadgeOnLoad();
                            },
                            error: function (error) {
                                console.error('Error updating response status:', error);
                            }
                        });
                    });
                checkboxContainer.append(checkboxElement);
                var imageContainer = $("<div>").addClass("dropdown-list-image mr-3").attr("id", "image");
                var imageElement = $("<img>").addClass("rounded-circle").attr("src", "{{asset('img/undraw_profile_1.svg')}}").attr("alt", "...");
                var statusIndicator = $("<div>").addClass("status-indicator bg-success");
                imageContainer.append(imageElement, statusIndicator);
                var contentContainer = $("<div>").addClass("font-weight-bold");
                var messageElement = $("<div>").addClass("text-truncate").attr("id", "message").text(message.message);
                var formattedDate = moment(message.created_at).format("YYYY-MM-DD HH:mm:ss");
                var nameElement = $("<div>").addClass("small text-gray-500").attr("id", "name").text(message.name + " · " + formattedDate);
                contentContainer.append(messageElement, nameElement); 
                messageItem.append(checkboxContainer, imageContainer, contentContainer);
                dropdownContainer.append(messageItem);

            });
             var readmoremessages = $("<a>").addClass("dropdown-item text-center small text-gray-500").text("Read More Messages");
                dropdownContainer.append(readmoremessages);
        }
        function updateBadge(messageCount) {
            var badgeElement = $(".message-badge-counter");
            badgeElement.text(messageCount);
        }
        function updateBadgeOnLoad() {
            $.ajax({
                url: '/fetch-messages',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    updateBadge(data.length);
                },
                error: function (error) {
                    console.error('Error fetching messages:', error);
                }
            });
        }
    });
</script>


<script>
    function handleUploadClick() {
        document.getElementById('profilePicInput').click();
    }
    document.getElementById('profilePicInput').addEventListener('change', function () {
        const fileInput = this;
        const form = document.getElementById('profilePicForm');

        if (fileInput.files && fileInput.files[0]) {
            form.submit();
        }
    });
</script>

<script>
    $(document).ready(function () {
        // Initial state
        updatePriceFields();

        // Handle checkbox changes
        $('input[type="radio"]').on('click', function () {
            updatePriceFields();
        });

        // Function to update the visibility of price input fields
        function updatePriceFields() {
            var forRentCheckbox = $('#for_rent');
            var forSaleCheckbox = $('#for_sale');
            var rentInput = $('#rent');
            var saleInput = $('#sale');

            // Check for the state of the checkboxes and update visibility
            if (forRentCheckbox.is(':checked')) {
                rentInput.prop('disabled', false).removeClass('d-none');
                saleInput.prop('disabled', true).addClass('d-none');
            } else if (forSaleCheckbox.is(':checked')) {
                saleInput.prop('disabled', false).removeClass('d-none');
                rentInput.prop('disabled', true).addClass('d-none');
            } else {
                // If neither checkbox is checked, hide both inputs
                // saleInput.addClass('d-none');
                // rentInput.addClass('d-none');
            }
        }
    });
</script>
