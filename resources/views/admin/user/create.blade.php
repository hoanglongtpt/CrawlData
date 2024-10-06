@extends('admin.layouts.master')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Thêm Mới Admin</h4>
                                <div class="tab-content mt-5">
                                    <div class="tab-pane show active" id="custom-styles-preview" role="tabpanel">
                                        <form action="{{route('user.store')}}" class="needs-validation" novalidate="" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom01">Email</label>
                                                <input value="{{ old('email') }}" name="email" type="text"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="validationCustom01" placeholder="Email" required />
                                                <div class="valid-feedback">
                                                    Tốt!
                                                </div>
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom01">Mật Khẩu</label>
                                                <input value="{{ old('password') }}" name="password" type="text"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="validationCustom01" placeholder="password" required />
                                                <div class="valid-feedback">
                                                    Tốt!
                                                </div>
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom02">Tên</label>
                                                <input value="{{ old('name') }}" name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror"
                                                id="validationCustom01" placeholder="Tên" required />
                                            <div class="valid-feedback">
                                                Tốt!
                                            </div>
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            </div>
                                            <button class="btn btn-primary" type="submit" fdprocessedid="j85tou">Thêm mới</button>
                                        </form>
                                    </div> <!-- end preview-->

                                    <div class="tab-pane code" id="custom-styles-code" role="tabpanel">
                                        <button class="btn-copy-clipboard" data-clipboard-action="copy">Copy</button>
                                        <pre class="mb-0">                                                    <span class="html escape hljs xml"><span class="hljs-tag">&lt;<span class="hljs-name">form</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"needs-validation"</span> <span class="hljs-attr">novalidate</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-3"</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-label"</span> <span class="hljs-attr">for</span>=<span class="hljs-string">"validationCustom01"</span>&gt;</span>First name<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-control"</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"validationCustom01"</span> <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"First name"</span> <span class="hljs-attr">value</span>=<span class="hljs-string">"Mark"</span> <span class="hljs-attr">required</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"valid-feedback"</span>&gt;</span><br>            Looks good!<br>        <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-3"</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-label"</span> <span class="hljs-attr">for</span>=<span class="hljs-string">"validationCustom02"</span>&gt;</span>Last name<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-control"</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"validationCustom02"</span> <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"Last name"</span> <span class="hljs-attr">value</span>=<span class="hljs-string">"Otto"</span> <span class="hljs-attr">required</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"valid-feedback"</span>&gt;</span><br>            Looks good!<br>        <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-3"</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-label"</span> <span class="hljs-attr">for</span>=<span class="hljs-string">"validationCustomUsername"</span>&gt;</span>Username<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"input-group"</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">span</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"input-group-text"</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"inputGroupPrepend"</span>&gt;</span>@<span class="hljs-tag">&lt;/<span class="hljs-name">span</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-control"</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"validationCustomUsername"</span> <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"Username"</span></span><br><span class="hljs-tag">                <span class="hljs-attr">aria-describedby</span>=<span class="hljs-string">"inputGroupPrepend"</span> <span class="hljs-attr">required</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"invalid-feedback"</span>&gt;</span><br>                Please choose a username.<br>            <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-3"</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-label"</span> <span class="hljs-attr">for</span>=<span class="hljs-string">"validationCustom03"</span>&gt;</span>City<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-control"</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"validationCustom03"</span> <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"City"</span> <span class="hljs-attr">required</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"invalid-feedback"</span>&gt;</span><br>            Please provide a valid city.<br>        <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-3"</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-label"</span> <span class="hljs-attr">for</span>=<span class="hljs-string">"validationCustom04"</span>&gt;</span>State<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-control"</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"validationCustom04"</span> <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"State"</span> <span class="hljs-attr">required</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"invalid-feedback"</span>&gt;</span><br>            Please provide a valid state.<br>        <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-3"</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-label"</span> <span class="hljs-attr">for</span>=<span class="hljs-string">"validationCustom05"</span>&gt;</span>Zip<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-control"</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"validationCustom05"</span> <span class="hljs-attr">placeholder</span>=<span class="hljs-string">"Zip"</span> <span class="hljs-attr">required</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"invalid-feedback"</span>&gt;</span><br>            Please provide a valid zip.<br>        <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"mb-3"</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-check"</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"checkbox"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-check-input"</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"invalidCheck"</span> <span class="hljs-attr">required</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-check-label form-label"</span> <span class="hljs-attr">for</span>=<span class="hljs-string">"invalidCheck"</span>&gt;</span>Agree to terms<br>                and conditions<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"invalid-feedback"</span>&gt;</span><br>                You must agree before submitting.<br>            <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">button</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"btn btn-primary"</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"submit"</span>&gt;</span>Submit form<span class="hljs-tag">&lt;/<span class="hljs-name">button</span>&gt;</span><br><span class="hljs-tag">&lt;/<span class="hljs-name">form</span>&gt;</span></span>
                                            </pre> <!-- end highlight-->
                                    </div> <!-- end preview code-->
                                </div>
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>

            </div>
            <!-- container -->

        </div>
        <!-- content -->

        <!-- Footer Start -->
        @include('admin.includes.footer')

        <!-- end Footer -->

    </div>
@endsection