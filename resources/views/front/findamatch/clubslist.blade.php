@extends('front.layouts.index')
@section('content')

<section class="hero-section set-bg">
    <div class="container row">
        <div class="col-md-3 filter">
            <div class="fil_text"><i class="fa fa-filter"></i> Lọc kết quả</div>
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Trình độ</label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                  <option selected>Choose...</option>
                  <option value="1">Yếu</option>
                  <option value="2">Trung bình</option>
                  <option value="3">Khá</option>
                </select>
            </div>
            <div class="col-auto my-2">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Sân bóng</label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                  <option selected>Choose...</option>
                  <option value="1">Sân nhà</option>
                  <option value="2">Sân khách</option>
                </select>
            </div>
        </div>
        <div class="col-md-8 club">
            
            @foreach ($clubs as $item)
                <div class="row">
                    <div class="col-lg-1">
                        <div class="cc-pic">
                            <img src="admin_image/{{$item->clubs->logo}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="cc-text">
                            <div class="ct-title">
                                <div class="row">
                                    <div class="col-sm-9 col-xs-9 col-md-9 col-lg-9 fc">
                                        <h3 >{{$item->clubs->clubName}}</h3>
                                        <a class="caption"><i class="fa fa-user"></i> {{$item->clubs->users->firstName . ' ' .$item->clubs->users->lastName}}</a>
                                        &nbsp;
                                        <button class="message btn btn-sm btn-default" title="Click để chat với đối" onclick="chat()"><i class="fa fa-comment"></i> Nói chuyện</button>
                                    </div>
                                    <button type="button" class="btn btn-default btn-sm pull-right"><i class="fa fa-send"></i> Mời đối giao lưu</button>
                                </div>
                                <hr/>
                                <p>{{$item->clubs->description}}</p><hr/>
                                <div class = "row">
                                    <h5 class="col-md-3">Trình độ : </h5>
                                    <span class="col-md-6"> {{$item->clubs->level}} </span>
                                </div>
                                <hr/>
                                <div class = "row">
                                    <h5 class="col-md-3">Độ tuổi : </h5>
                                    <span class="col-md-6"> {{$item->clubs->youngest . ' - ' .$item->clubs->oldest .' tuổi'}} </span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="pull-right">
                {!!$clubs->links()!!}
            </div>
            
            
        </div>
        
    </div>
    
</section>

@endsection