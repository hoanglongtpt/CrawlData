@extends('layouts.master_layout')
@section('content')
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-8 col-lg-5">

                <div class="card shadow mb-4">

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Getlink Freepik giá siêu rẻ chỉ 1.000
                            đồng</h6>
                    </div>

                    <div class="card-body" style="min-height: 418px">
                        <div class="form-group green-border-focus">
                            <label>Dán link freepik vào ô bên dưới và nhấn nút getlink:</label>
                            <textarea class="form-control" id="link" rows="5"></textarea>
                        </div>
                        <div style="text-align: center;">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="typeDownload" value="image"
                                    checked="">
                                <label class="form-check-label">
                                    Image/Template - 1xu
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="typeDownload" value="video">
                                <label class="form-check-label">
                                    Video 4K/HD - 5xu
                                </label>
                            </div>
                        </div>
                        <div class="form-group" style="text-align: center;">
                            <button class="btn btn-lg btn-outline-info btn-getlink" id="getlink_btn_freepik">
                                <span class="icon">
                                    <i class="fas fa-cogs"></i>
                                </span>
                                <span class="text">GETLINK</span>
                            </button>
                            <button class="btn btn-lg btn-outline-warning btn-getlink" id="reset_btn">
                                <span class="icon">
                                    <i class="fas fa-redo-alt"></i>
                                </span>
                                <span class="text">RESET</span>
                            </button>
                        </div>
                        <div id="flashmessage" class="submit-warning border-warning">
                            <p class="warning-text">Oops! Vui lòng nhập link pikbest</p>
                            <button class="warning-text btn-close">&#x2715;</button>
                        </div>
                        <div id="flashmessage" class="submit-warning border-error">
                            <p class="error-text">Oops! Bạn chưa đăng nhập</p>
                            <button class="error-text btn-close">&#x2715;</button>
                        </div>
                        <div id="result" class="result-container">
                            <div class="flex justify-center download-box  border-b-dashed">
                                <img class="download-img"  src="{{asset('assets-theme/img/folder-download.png')}}">
                            </div>
                            <div class="download-box border-b-dashed flex flex-col items-center gap-2">
                                <button class="result-link">freepik_4854.zip</button>
                                <button class="result-download">DOWNLOAD</button>
                            </div>
                            <div class="border-b-dashed flex justify-center report-link">Báo link download hỏng hoặc gặp sự cố?</div>
                            <!-- <div class="border-b-dashed"></div> -->
                            
                        </div>
                        <div id="loadingbar" class="form-group">
                            <h4 class="small font-weight-bold"><span id="title_loadingbar"></span><span
                                    id="percent_loadingbar" class="float-right"></span></h4>
                            <div class="progress mb-4">
                                <div id="style_loadingbar" class="progress-bar bg-info" role="progressbar" style="width: 0%"
                                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="m-separator m-separator--dashed"></div>
                        <div class="form-group">
                            <label>Định dạng hỗ trợ: <img class="extension" src="{{asset('assets-theme/img/zip.png')}}"><img
                                    class="extension" src="{{asset('assets-theme/img/svg.png')}}"><img class="extension"
                                    src="{{asset('assets-theme/img/png.png')}}"><img class="extension"
                                    src="{{asset('assets-theme/img/ai.png')}}"><img class="extension"
                                    src="{{asset('assets-theme/img/eps.png')}}"><img class="extension"
                                    src="{{asset('assets-theme/img/psd.png')}}"><img class="extension"
                                    src="{{asset('assets-theme/img/avi.png')}}"><img class="extension"
                                    src="{{asset('assets-theme/img/mov.png')}}"></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Khuyến mãi đang diễn ra</h6>
                    </div>
                    <div class="card-body">
                        <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                            CSS bloat and poor page performance. Custom CSS classes are used to create
                            custom components and custom utility classes.</p>
                        <p class="mb-0">Before working with this theme, you should become familiar with the
                            Bootstrap framework, especially the utility classes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
