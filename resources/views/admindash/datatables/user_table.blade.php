<div class="card-body">
  <table id="user_details" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>S.No</th>
        <th>User_Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($user_data as $value)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$value->name}}</td>
        <td>{{$value->email}}</td>
        <td>
          <!-- Toggle Switch To update product status -->
            <label class="switch">
              <input type="checkbox" class="status-toggle" data-user-id="{{$value->id}}">
              <span class="slider round"></span>
              </label>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>