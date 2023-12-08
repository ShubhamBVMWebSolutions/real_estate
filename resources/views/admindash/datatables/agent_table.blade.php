<div class="card-body">
  <table id="agents_details" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>S.No</th>
        <th>User_Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($agent as $value)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$value->name}}</td>
        <td>{{$value->email}}</td>
        <td></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
