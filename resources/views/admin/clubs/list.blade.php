@extends('admin.layouts.index')
@section('content')
<div class="container-fluid">
    
    <div class="row">
      <h1>Đội bóng | </h1>
      <div style="font-size:20px; line-height: 50px;"> danh sách</div>
    </div>
    
    <div class = "add">
        <a href = "admin/clubs/add" type = "button" class="btn btn-success"> <i class="fas fa-user-plus"></i> Thêm</a>
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
            <th scope="col">Tên</th>
            <th scope="col">Trình độ</th>
            <th scope="col">Độ tuổi</th>
            <th scope="col">Logo</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Đội trưởng</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $stt = 1; ?>
          @foreach($clubs as $club)
            <tr>
              <th scope="row"><?php echo $stt ;?></th>
              <th>{{$club->id}}</th>
              <td>{{$club->clubName}}</td>
              <td>{{$club->level}}</td>
              <td>{{$club->youngest . ' - ' . $club->oldest}}</td>
              <td>
                  <img src="admin_image/{{$club->logo}}" class = "avt" />
              </td>
              <td>{{$club->address}}</td>
              <td>{{$club->users->lastName . ' ' .$club->users->firstName}}</td>
              <td>
                <a href="admin/clubs/edit/{{$club->id}}" class="btn btn-warning"><i class="fas fa-user-edit"></i> Sửa</a>
                <a href="admin/clubs/delete/{{$club->id}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fas fa-user-minus"></i> Xóa</a>
              </td>
            </tr>
          <?php $stt++ ?>
          @endforeach
        </tbody>
    </table>
    <div class="pull-right">
      {!!$clubs->links()!!}
    </div>
    
</div>
@endsection