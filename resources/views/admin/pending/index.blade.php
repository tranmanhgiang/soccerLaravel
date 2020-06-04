@extends('admin.layouts.index')
@section('content')
<div class="container-fluid">
    
    <div class="row">
      <h1>Đội bóng | </h1>
      <div style="font-size:20px; line-height: 50px;"> danh sách</div>
    </div>
    
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">ID</th>
            <th scope="col">Ngày</th>
            <th scope="col">Giờ</th>
            <th scope="col">Kèo</th>
            <th scope="col">Sân bóng</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Đội bóng</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
            <?php $stt = 1; ?>
            @foreach($clubs as $club)
                <tr>
                    <th scope="row"><?php echo $stt ;?></th>
                    <th>{{$club->id}}</th>
                    <td>{{$club->date}}</td>
                    <td>{{$club->time}}</td>
                    <td>{{$club->lease}}</td>
                    <td>{{$club->stadium}}</td>
                    <td>{{$club->address}}</td>
                    <td>{{$club->clubs->clubName}}</td>
                    <td> 
                        @if($club->allow === 0)
                            <form action='admin/findamatch/update/{{$club->id}}' method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-warning" name="allow">Đang chờ</button>    
                            </form>
                        @else
                            <button type="button" class='btn btn-sm btn-success'>Đã duyệt</button>   
                        @endif
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