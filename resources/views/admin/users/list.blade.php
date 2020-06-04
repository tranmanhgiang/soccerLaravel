@extends('admin.layouts.index')
@section('content')
<div class="container-fluid">
    
    <div class="row">
      <h1>Người dùng | </h1>
      <div style="font-size:20px; line-height: 50px;"> danh sách</div>
    </div>
    
    <div class = "add">
        <a href = "admin/users/add" type = "button" class="btn btn-success"> <i class="fas fa-user-plus"></i> Thêm</a>
    </div>
    @if(session('success'))
      <div class="alert alert-success">
          {{session('success')}}
      </div>
    @endif
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">ID</th>
            <th scope="col">Họ Tên</th>
            <th scope="col">Email</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Vai trò</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $stt = 1; ?>
          @foreach($users as $user)
            <tr>
              <th scope="row"><?php echo $stt ;?></th>
              <th>{{$user->id}}</th>
              <td>{{$user->lastName. ' ' . $user->firstName}}</td>
              <td>{{$user->email}}</td>
              <td>
                  <img src="admin_image/{{$user->thunbar}}" class = "avt" />
              </td>
              <td>{{$user->role === 0 ? 'User' : 'Admin'}}</td>
              <td>
                <a href="admin/users/edit/{{$user->id}}" class="btn btn-warning"><i class="fas fa-user-edit"></i> Sửa</a>
                  <a href="admin/users/delete/{{$user->id}}" class="btn btn-danger"><i class="fas fa-user-minus"></i> Xóa</a>
              </td>
            </tr>
          <?php $stt++ ?>
          @endforeach
        </tbody>
    </table>
    <div class="pull-right">
      {!!$users->links()!!}
    </div>
    
</div>
@endsection