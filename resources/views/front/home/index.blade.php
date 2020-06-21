@extends('front.layouts.index')
@section('content')

@if(session('success'))
    <div class="alert alert-success mb-0">
        {{session('success')}}
    </div>
@endif

<section class="hero-section set-bg" data-setbg="front_asset/img/background.png">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hs-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="hs-text">
                                    <h4>QUẢN LÝ SÂN, TÌM ĐỐI GIAO LƯU, ĐẶT SÂN TRỰC TUYẾN</h4>
                                    <h2>Hoàn toàn miễn phí</h2>
                                    @if(Auth::check())
                                    @else
                                        <a href="front/login" class="primary-btn explore">Tìm hiểu ngay</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<br/>
<hr/>

<section class="hero-section set-bg">
    
    <div class="container">
        <h2 class="text-center">Liên hệ với chúng tôi</h2>
        <h3>Bạn cần giúp đỡ?</h3>
        <br/>
        <div class="row container">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="opacity:0.8;">
                Bạn có thể liên hệ trực tiếp với chúng tôi hoặc bạn có thể điền vào mẫu dưới đây. Chúng tôi sẽ trả lời sớm liên lạc của bạn
            </div>
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 row">
                <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-danger" style="font-size:30px;"><i class="fa fa-phone"></i></div>
                <div class="col-md-8">
                    <div>Số điện thoại</div>
                    <small class="text-danger">0395578355</small>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 row">
                <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-danger" style="font-size:30px;"><i class="fa fa-envelope"></i></div>
                <div class="col-md-8">
                    <div>Email</div>
                    <small class="text-danger">tranmanhgiang06051999@gmail.com</small>
                </div>
            </div>
        </div>
        <br/>
        <br/>
        <div class="container row">
            <div class="col-md-5">
                <form>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Họ tên</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                      </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Số điện thoại</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                    </div>
            </div>
            <div class="col-md-7">
                
                    <div class="form-group">
                        <label>Content</label>
                        <textarea rows="10" cols="50" class="form-control">

                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-danger pull-right">Gửi</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection