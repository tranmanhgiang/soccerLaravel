@extends('front.layouts.index')
@section('content')
<section class="hero-section set-bg" data-setbg="front_asset/img/hero/hero-1.jpg">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-3 col-sm-6 col-xs-12 row-container">
                <form action="front/regist" id="form" method="post" enctype="multipart/form-data">
                @csrf
                
                <h2 class="title">Tạo tài khoản MIỄN PHÍ</h2>
                    <div class="row form-group" > 
                        <div class="col-xs-6 col-md-6"> 
                            <input class="form-control" name="lastname" placeholder="Họ" autofocus type="text">
                            @if(count($errors) > 0)
                                @foreach ($errors->get('lastname') as $err)
                                    <div style="color:red">
                                    {{$err}}<br/>
                                    </div>
                                @endforeach
                            @endif
                        </div> 
                        <div class="col-xs-6 col-md-6"> 
                            <input class="form-control" name="firstname" placeholder="Tên" type="text"> 
                            @if(count($errors) > 0)
                                @foreach ($errors->get('firstname') as $err)
                                    <div style="color:red">
                                    {{$err}}<br/>
                                    </div>
                                @endforeach
                            @endif
                        </div>                                                                                                                                                                                                                    
                    </div> 
                    
                    <div class="form-group">
                        <input class="form-control" name="email" placeholder="Email" type="email" >
                    </div>
                    @if(count($errors) > 0)
                        @foreach ($errors->get('email') as $err)
                            <div style="color:red">
                            {{$err}}<br/>
                            </div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <input class="form-control" name="phone" placeholder="Phone" type="text" >
                    </div>
                    @if(count($errors) > 0)
                        @foreach ($errors->get('phone') as $err)
                            <div style="color:red">
                            {{$err}}<br/>
                            </div>
                        @endforeach
                    @endif
                    <div class="form-group"> 
                        <input type="password" placeholder="Mật khẩu" class="form-control" name="password" id="password" >
                    </div>
                    @if(count($errors) > 0)
                        @foreach ($errors->get('password') as $err)
                            <div style="color:red">
                            {{$err}}<br/>
                            </div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <input type="password" placeholder="Nhập lại mật khẩu" class="form-control" name="confpass" id="confpass" >
                    </div>
                    @if(count($errors) > 0)
                        @foreach ($errors->get('confpass') as $err)
                            <div style="color:red">
                            {{$err}}<br/>
                            </div>
                        @endforeach
                    @endif
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Hình ảnh</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="inputEmail3" name = "thunbar">
                                @if(count($errors) > 0)
                                    @foreach ($errors->get('thunbar') as $err)
                                        <div style="color:red">
                                        {{$err}}<br/>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                    </div>
                    <div>
                        <textarea name="description" rows="3" class = "container" placeholder="Nhập mô tả bản thân..."></textarea>
                        @if(count($errors) > 0)
                            @foreach ($errors->get('description') as $err)
                                <span style="color:red">
                                {{$err}}<br/>
                                </span>
                            @endforeach
                        @endif
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit"> Đăng ký</button><br/>
                    <p>Bạn đã có tài khoản? <a href="front/login">Đăng nhập >></a></p>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection