@extends('layouts.master_layout')
@section('content')
    <section class="container-fluid">
        <div class="profile-container">
            <div class="shadow profile-section">
                <div class="header">Thông tin tài khoản</div>
                <div class="profile-layout">
                    <div class="information">
                        <img src="{{asset('assets-theme/img/payment-methods/momo.png')}}" class="avatar">
                        <div class="info-group">
                            <h2 class="name">Nguyen Van Quy</h2>
                            <div class="balance"><span class="quantity">100</span> xu</div>
                            <div class="balance"><span class="quantity">23</span> ảnh tải về trong 30 ngày qua</div>
                        </div>
                    </div>
                    <div class="tab-container">
                        <div class="tab-header">
                            <div class="tab active" data-tab="tab1">Thông tin cơ bản</div>
                            <div class="tab" data-tab="tab2">Đổi mật khẩu</div>
                        </div>
                        <div class="tab-content">
                            <div class="content active" id="tab1">
                                <div class="profile-info-layout">
                                    <div class="profile-info-item">
                                        <label class="profile-label">Tên hiển thị</label>
                                        <span>Nguyễn Văn Quý</span>
                                    </div>
                                    <div class="profile-info-item">
                                        <label class="profile-label">Địa chỉ email</label>
                                        <span>nguyenvanquy@gmail.com</span>
                                    </div>
                                    <div class="profile-info-item">
                                        <label class="profile-label">Mật khẩu</label>
                                        <span>********</span>
                                    </div>
                                </div>

                            </div>
                            <div class="content" id="tab2">
                                Tài khoản được liên kết với dịch vụ google.<br/>
                                Vui lòng thay đổi mật khẩu của tài khoản google để tăng tính bảo mật.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shadow profile-section">
                <div class="header">Lịch sử tải ảnh</div>
                <div class="table-wrapper">
                    <div class="table-tools">
                        <label>
                            Hiện
                            <select class="custom-select custom-select-sm form-control form-control-sm">
                                <option value="10">10</option>
                                <option value="10">25</option>
                                <option value="10">50</option>
                            </select>
                            mục
                        </label>
                        <label>
                            Tìm kiếm
                            <input type="search" class="custom-input form-control form-control-sm" placeholder="" aria-controls="download-table">
                        </label>
                    </div>
                    <table class="table table-bordered dataTable no-footer" id="download-table" width="100%" cellspacing="0" role="grid" aria-describedby="download-table_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="download-table" rowspan="1" colspan="1" aria-label="#: activate to sort column descending" style="width: 59.2px;" aria-sort="ascending">#</th>
                                <th class="sorting" tabindex="0" aria-controls="download-table" rowspan="1" colspan="1" aria-label="Thời gian: activate to sort column ascending" style="width: 174.2px;">Thời gian</th>
                                <th class="sorting" tabindex="0" aria-controls="download-table" rowspan="1" colspan="1" aria-label="Link gốc: activate to sort column ascending" style="width: 160.2px;">Link gốc</th>
                                <th class="text-center sorting" tabindex="0" aria-controls="download-table" rowspan="1" colspan="1" aria-label="Tải lại: activate to sort column ascending" style="width: 124px;">Tải lại</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr class="odd">
                                <td valign="top" colspan="4" class="dataTables_empty">Không có mục nào</td>
                            </tr> -->
                            <tr class="odd" role="row">
                                <th class="table-item-custom"   aria-controls="download-table" rowspan="1" colspan="1"  style="width: 59.2px;" aria-sort="ascending">1</th>
                                <th class="table-item-custom"   aria-controls="download-table" rowspan="1" colspan="1"  style="width: 174.2px;">07/09/2024 - 12:07:01 AN</th>
                                <th class="table-item-custom"   aria-controls="download-table" rowspan="1" colspan="1"  style="width: 160.2px;"><a href="https://vngraphic.com/profile#download-history">https://vngraphic.com/profile#download-history</a></th>
                                <th class="table-item-custom"   aria-controls="download-table" rowspan="1" colspan="1"  style="width: 124px;">Tải lại</th>
                            </tr>
                            <tr role="row">
                                <th class="table-item-custom"  aria-controls="download-table" rowspan="1" colspan="1"  style="width: 59.2px;" aria-sort="ascending">2</th>
                                <th class="table-item-custom"   aria-controls="download-table" rowspan="1" colspan="1"  style="width: 174.2px;">07/09/2024 - 12:07:01 AN</th>
                                <th class="table-item-custom"   aria-controls="download-table" rowspan="1" colspan="1"  style="width: 160.2px;"><a href="https://vngraphic.com/profile#download-history">https://vngraphic.com/profile#download-history</a></th>
                                <th class="table-item-custom"   aria-controls="download-table" rowspan="1" colspan="1"  style="width: 124px;">Tải lại</th>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="download-table_info" role="status" aria-live="polite"></div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="download-table_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="download-table_previous">
                                        <a href="#" aria-controls="download-table" data-dt-idx="0" tabindex="0" class="page-link">Trước</a>
                                    </li>
                                    <li class="paginate_button page-item next disabled" id="download-table_next">
                                        <a href="#" aria-controls="download-table" data-dt-idx="1" tabindex="0" class="page-link">Kế tiếp</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shadow profile-section">
                <div class="header">Lịch sử thanh toán</div>
                <div class="table-wrapper">
                    <div class="table-tools">
                        <label>
                            Hiện
                            <select class="custom-select custom-select-sm form-control form-control-sm">
                                <option value="10">10</option>
                                <option value="10">25</option>
                                <option value="10">50</option>
                            </select>
                            mục
                        </label>
                        <label>
                            Tìm kiếm
                            <input type="search" class="custom-input form-control form-control-sm" placeholder="" aria-controls="download-table">
                        </label>
                    </div>
                    <table class="table table-bordered dataTable no-footer" id="download-table" width="100%" cellspacing="0" role="grid" aria-describedby="download-table_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="download-table" rowspan="1" colspan="1" aria-label="#: activate to sort column descending" style="width: 59.2px;" aria-sort="ascending">#</th>
                                <th class="sorting" tabindex="0" aria-controls="download-table" rowspan="1" colspan="1" aria-label="Thời gian: activate to sort column ascending" style="width: 174.2px;">Ngày</th>
                                <th class="sorting" tabindex="0" aria-controls="download-table" rowspan="1" colspan="1" aria-label="Thời gian: activate to sort column ascending" style="width: 174.2px;">Hình thức</th>
                                <th class="sorting" tabindex="0" aria-controls="download-table" rowspan="1" colspan="1" aria-label="Link gốc: activate to sort column ascending" style="width: 160.2px;">Số tiền</th>
                                <th class="sorting" tabindex="0" aria-controls="download-table" rowspan="1" colspan="1" aria-label="Thời gian: activate to sort column ascending" style="width: 174.2px;">Thông tin thêm</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr class="odd">
                                <td valign="top" colspan="4" class="dataTables_empty">Không có mục nào</td>
                            </tr> -->
                            <tr class="odd" role="row">
                                <th class="table-item-custom"   aria-controls="download-table" rowspan="1" colspan="1"  style="width: 59.2px;" aria-sort="ascending">1</th>
                                <th class="table-item-custom"   aria-controls="download-table" rowspan="1" colspan="1"  style="width: 174.2px;">07/09/2024</th>
                                <th class="table-item-custom"   aria-controls="download-table" rowspan="1" colspan="1"  style="width: 174.2px;">Ví điện tử Momo</th>
                                <th class="table-item-custom"   aria-controls="download-table" rowspan="1" colspan="1"  style="width: 174.2px;">400,400vnđ</th>
                                <th class="table-item-custom"   aria-controls="download-table" rowspan="1" colspan="1"  style="width: 174.2px;">Không có</th>
                            </tr>
                            <tr class="odd" role="row">
                                <th class="table-item-custom"   aria-controls="download-table" rowspan="1" colspan="1"  style="width: 59.2px;" aria-sort="ascending">1</th>
                                <th class="table-item-custom"   aria-controls="download-table" rowspan="1" colspan="1"  style="width: 174.2px;">07/09/2024</th>
                                <th class="table-item-custom"   aria-controls="download-table" rowspan="1" colspan="1"  style="width: 174.2px;">Ví điện tử Momo</th>
                                <th class="table-item-custom"   aria-controls="download-table" rowspan="1" colspan="1"  style="width: 174.2px;">400,400vnđ</th>
                                <th class="table-item-custom"   aria-controls="download-table" rowspan="1" colspan="1"  style="width: 174.2px;">Không có</th>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="download-table_info" role="status" aria-live="polite"></div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="download-table_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="download-table_previous">
                                        <a href="#" aria-controls="download-table" data-dt-idx="0" tabindex="0" class="page-link">Trước</a>
                                    </li>
                                    <li class="paginate_button page-item next disabled" id="download-table_next">
                                        <a href="#" aria-controls="download-table" data-dt-idx="1" tabindex="0" class="page-link">Kế tiếp</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
