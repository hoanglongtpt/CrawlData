@extends('member.auth.auth_master')
@section('content')

    <section class="login-container">
        <div class="login-card">
            <div class="side img-side">
                <img class="login-img"  src="{{asset('assets-theme/img/login.jpg')}}">
            </div>
            <div class="side login-side">
                <div class="logo">LOGO</div>
                <div class="login-wrapper">
                    <div class="login-text">Đăng nhập</div>
                    <form action="{{route('member.postLogin')}}"  class="user" method="POST">
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
                            <button  type="submit" href="index.html" class="login-btn">Đăng nhập</button>
                        </div>
                        <hr class="divider">
                        <a href="index.html" class="btn btn-google btn-user btn-block social-btn">
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


    <div class="hidden container login-container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block login-img-wrapper">
                                <img class="login-img"  src="{{asset('assets-theme/img/login.jpg')}}">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form action="{{route('member.postLogin')}}"  class="user" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" href="index.html" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
