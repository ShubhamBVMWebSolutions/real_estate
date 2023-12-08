<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
 <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
<script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>

<!-- datatables_script -->

<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>


<script>
 $(document).ready(function() {
    $("#agents_details").DataTable({
      "rowId": "S.No",
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

$(document).ready(function() {
   var dataTable =  $("#user_details").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
    });
         $('#user_details').on('change', '.status-toggle', function() {
          var userId = $(this).data('user-id');
          var isChecked = $(this).prop('checked') ? 2 : 0;
          $.ajax({
             url: '/admin/updateUserStatus',
             method: 'POST',
             data: { userId: userId, status: isChecked, _token: '{{ csrf_token() }}'},
             success: function(response) {
                if (response.success) {
                  dataTable.draw();
                } else {
                   alert('Failed to update user status.');
                }
             },
             error: function(error) {
                console.error('Error updating user status:', error);
             }
          });
       });
  });
 // user_details
</script>