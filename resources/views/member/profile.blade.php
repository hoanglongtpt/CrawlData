@extends('layouts.master_layout')
@section('content')
<section class="container-fluid">
    <div class="profile-container">
        <div class="shadow profile-section">
            <div class="header">Thông tin tài khoản</div>
            <div class="profile-layout">
                <div class="information">
                    <img src="{{ asset('assets-theme/img/avatar.png') }}" class="avatar">
                    <div class="info-group">
                        <h2 class="name">{{ $user->name }}</h2>
                        <div class="balance"><span class="quantity">{{ $user->account_balance }}</span> xu</div>
                        <div class="balance"><span class="quantity">23</span> ảnh tải về trong hôm nay</div>
                    </div>
                </div>
                <div class="tab-container">
                    <div class="tab-header">
                        <a href="{{ route('profile', ['tab' => 'tab1']) }}" class="tab {{ $tab == 'tab1' ? 'active' : '' }}" data-tab="tab1">Thông tin cơ bản</a>
                        <a href="{{ route('profile', ['tab' => 'tab2']) }}" class="tab {{ $tab == 'tab2' ? 'active' : '' }}" data-tab="tab2">Đổi mật khẩu</a>
                    </div>
                    <div class="tab-content">
                        <div class="content {{ $tab == 'tab1' ? 'active' : '' }}" id="tab1">
                            <div class="profile-info-layout">
                                <div class="profile-info-item">
                                    <label class="profile-label">Tên hiển thị</label>
                                    <span>{{ $user->name }}</span>
                                </div>
                                <div class="profile-info-item">
                                    <label class="profile-label">Địa chỉ email</label>
                                    <span>{{ $user->email }}</span>
                                </div>
                                <div class="profile-info-item">
                                    <label class="profile-label">Mật khẩu</label>
                                    <span>********</span>
                                </div>
                            </div>

                        </div>
                        <div class="content {{ $tab == 'tab2' ? 'active' : '' }}" id="tab2">
                            <div class="container mt-3">
                                <form action="{{route('changePassword')}}" method="POST">
                                    @csrf
                                    <div class="mb-3 mt-3">
                                        <label for="old_password">Mật khẩu cũ:</label>
                                        <input type="password" class="form-control" id="old_password"
                                            placeholder="Nhập mật khẩu cũ" name="old_password"
                                            value="{{ request()->get('old_password') }}">
                                        @error('old_password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="new_password">Mật Khẩu mới:</label>
                                        <input type="password" class="form-control" id="new_password"
                                            placeholder="Nhập mật khẩu mới" name="new_password"
                                            value="{{ request()->get('new_password') }}">
                                        @error('new_password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirm_pass">Xác nhận lại mật khẩu mới:</label>
                                        <input type="password" class="form-control" id="confirm_pass"
                                            placeholder="Nhập lại mật khẩu mới" name="confirm_password"
                                            value="{{ request()->get('confirm_password') }}">
                                        @error('confirm_password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </form>
                            </div>
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
                        <input type="search" class="custom-input form-control form-control-sm" placeholder=""
                            aria-controls="download-table">
                    </label>
                </div>
                <table class="table table-bordered dataTable no-footer" id="download-table" width="100%"
                    cellspacing="0" role="grid" aria-describedby="download-table_info" style="width: 100%;">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="download-table" rowspan="1"
                                colspan="1" aria-label="#: activate to sort column descending" style="width: 59.2px;"
                                aria-sort="ascending">#</th>
                            <th class="sorting" tabindex="0" aria-controls="download-table" rowspan="1"
                                colspan="1" aria-label="Thời gian: activate to sort column ascending"
                                style="width: 174.2px;">Thời gian</th>
                            <th class="sorting" tabindex="0" aria-controls="download-table" rowspan="1"
                                colspan="1" aria-label="Link gốc: activate to sort column ascending"
                                style="width: 160.2px;">Link gốc</th>
                            <th class="text-center sorting" tabindex="0" aria-controls="download-table"
                                rowspan="1" colspan="1" aria-label="Tải lại: activate to sort column ascending"
                                style="width: 124px;">Tải lại</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr class="odd">
                                    <td valign="top" colspan="4" class="dataTables_empty">Không có mục nào</td>
                                </tr> -->
                        <tr class="odd" role="row">
                            <th class="table-item-custom" aria-controls="download-table" rowspan="1"
                                colspan="1" style="width: 59.2px;" aria-sort="ascending">1</th>
                            <th class="table-item-custom" aria-controls="download-table" rowspan="1"
                                colspan="1" style="width: 174.2px;">07/09/2024 - 12:07:01 AN</th>
                            <th class="table-item-custom" aria-controls="download-table" rowspan="1"
                                colspan="1" style="width: 160.2px;"><a
                                    href="https://vngraphic.com/profile#download-history">https://vngraphic.com/profile#download-history</a>
                            </th>
                            <th class="table-item-custom" aria-controls="download-table" rowspan="1"
                                colspan="1" style="width: 124px;">Tải lại</th>
                        </tr>
                        <tr role="row">
                            <th class="table-item-custom" aria-controls="download-table" rowspan="1"
                                colspan="1" style="width: 59.2px;" aria-sort="ascending">2</th>
                            <th class="table-item-custom" aria-controls="download-table" rowspan="1"
                                colspan="1" style="width: 174.2px;">07/09/2024 - 12:07:01 AN</th>
                            <th class="table-item-custom" aria-controls="download-table" rowspan="1"
                                colspan="1" style="width: 160.2px;"><a
                                    href="https://vngraphic.com/profile#download-history">https://vngraphic.com/profile#download-history</a>
                            </th>
                            <th class="table-item-custom" aria-controls="download-table" rowspan="1"
                                colspan="1" style="width: 124px;">Tải lại</th>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="download-table_info" role="status" aria-live="polite">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="download-table_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="download-table_previous">
                                    <a href="#" aria-controls="download-table" data-dt-idx="0" tabindex="0"
                                        class="page-link">Trước</a>
                                </li>
                                <li class="paginate_button page-item next disabled" id="download-table_next">
                                    <a href="#" aria-controls="download-table" data-dt-idx="1" tabindex="0"
                                        class="page-link">Kế tiếp</a>
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
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
                        mục
                    </label>
                    <label>
                        Tìm kiếm
                        <input type="search" class="custom-input form-control form-control-sm" placeholder=""
                            aria-controls="download-table">
                    </label>
                </div>
                <table class="table table-bordered dataTable no-footer" id="download-table" width="100%"
                    cellspacing="0" role="grid" aria-describedby="download-table_info" style="width: 100%;">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="download-table" rowspan="1"
                                colspan="1" aria-label="#: activate to sort column descending"
                                style="width: 59.2px;" aria-sort="ascending">#</th>
                            <th class="sorting" tabindex="0" aria-controls="download-table" rowspan="1"
                                colspan="1" aria-label="Thời gian: activate to sort column ascending"
                                style="width: 174.2px;">Thời gian</th>
                            <th class="sorting" tabindex="0" aria-controls="download-table" rowspan="1"
                                colspan="1" aria-label="Thời gian: activate to sort column ascending"
                                style="width: 174.2px;">Hình thức</th>
                            <th class="sorting" tabindex="0" aria-controls="download-table" rowspan="1"
                                colspan="1" aria-label="Link gốc: activate to sort column ascending"
                                style="width: 160.2px;">Số tiền</th>
                            <th class="sorting" tabindex="0" aria-controls="download-table" rowspan="1"
                                colspan="1" aria-label="Thời gian: activate to sort column ascending"
                                style="width: 174.2px;">Thông tin thêm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr class="odd">
                                    <td valign="top" colspan="4" class="dataTables_empty">Không có mục nào</td>
                                </tr> -->

                        @foreach ($transactions as $transaction)
                        <tr>
                            <th class="table-item-custom" aria-controls="download-table" rowspan="1"
                                colspan="1" style="width: 59.2px;" aria-sort="ascending">
                                {{ $transaction->id }}
                            </th>
                            <th class="table-item-custom" aria-controls="download-table" rowspan="1"
                                colspan="1" style="width: 174.2px;">{{ $transaction->created_at }}</th>
                            <th class="table-item-custom" aria-controls="download-table" rowspan="1"
                                colspan="1" style="width: 174.2px;">{{ $transaction->type }}</th>
                            <th class="table-item-custom" aria-controls="download-table" rowspan="1"
                                colspan="1" style="width: 174.2px;">{{ $transaction->amount }}vnđ</th>
                            <th class="table-item-custom" aria-controls="download-table" rowspan="1"
                                colspan="1" style="width: 174.2px;">Không có</th>
                        </tr>
                        @endforeach

                        <!-- <tr class="odd" role="row">
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
                                </tr> -->
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="download-table_info" role="status" aria-live="polite">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="download-table_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="download-table_previous">
                                    <a href="#" aria-controls="download-table" data-dt-idx="0" tabindex="0"
                                        class="page-link">Trước</a>
                                </li>
                                <li class="paginate_button page-item next disabled" id="download-table_next">
                                    <a href="#" aria-controls="download-table" data-dt-idx="1" tabindex="0"
                                        class="page-link">Kế tiếp</a>
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