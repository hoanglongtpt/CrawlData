@extends('member.auth.auth_master')
@section('content')
<section class="login-container">
    <div class="login-card">
        <div class="side img-side">
            <img class="login-img" src="{{asset('assets-theme/img/login.jpg')}}">
        </div>
        <div class="side login-side">
            <div class="logo">LOGO</div>
            <div class="login-wrapper">
                <div class="login-text">Đăng nhập</div>
                <form action="{{route('member.postLogin')}}" class="user" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" class="form-control-login"
                            id="exampleInputEmail" aria-describedby="emailHelp"
                            placeholder="Nhập email của bạn">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control-login"
                            id="exampleInputPassword" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="form-group submit-group">
                        <!-- <input type="checkbox" class="form-control-checkbox" id="customCheck"> -->
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label" for="customCheck">Ghi nhớ</label>
                        </div>
                        <button type="submit" href="index.html" class="login-btn">Đăng nhập</button>
                    </div>
                    <hr class="divider">
                    <a href="{{route('member.google-auth')}}" class="btn btn-google btn-user btn-block social-btn">
                        <img width="24px" height="24px" src="{{asset('assets-theme/img/google.svg')}}">
                        Đăng nhập bằng Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block social-btn">
                        <img width="24px" height="24px" src="{{asset('assets-theme/img/facebook.svg')}}">
                        Đăng nhập bằng Facebook
                    </a>
                </form>
                <hr class="divider">
                <div class="question-group">
                    <a>Quên mật khẩu?</a>
                    <a>Tạo tài khoản</a>
                </div>
                <div class="policy-group">
                    <p>Chính sách bảo mật</p>
                    <span>|</span>
                    <span class="hotline-text">Hotline:058.789.6799</span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection