@extends('admin.layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xxl-4 col-lg-5">
            <div class="card">
                <div class="card-header py-4 text-center bg-primary">
                    {{-- <a href="">
                        <span><img src="{{ asset('admin-assets/images/logo.png')}}" alt="logo" height="22"></span>
                    </a> --}}
                    <span>
                        <strong class="custom-text-cardheader">
                            Lawer - admin
                        </strong>
                    </span>
                </div>
                <div class="card-body p-4">
                    <div class="text-center w-75 m-auto">
                        <h4 class="text-dark-50 text-center pb-0 fw-bold">Đăng Nhập</h4>
                        <p class="text-muted mb-4">Nhập địa chỉ email và mật khẩu của bạn để truy cập vào bảng quản trị.</p>
                    </div>
                    <form action="{{route('admin.postlogin')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="emailaddress" class="form-label">Địa chỉ email</label>
                            <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="Enter your email">
                            @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <a href="pages-recoverpw.html" class="text-muted float-end"><small>Quên mật khẩu?</small></a>
                            <label for="password" class="form-label">Mật khẩu</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                                @error('password')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                <label class="form-check-label" for="checkbox-signin">Ghi nhớ mật khẩu</label>
                            </div>
                        </div>
                        <div class="mb-3 mb-0 text-center">
                            <button class="btn btn-primary" type="submit"> Đăng nhập </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-center">
                    {{-- <p class="text-muted">Bạn chưa có tài khoản? <a href="pages-register.html" class="text-muted ms-1"><b>Sign Up</b></a></p> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
