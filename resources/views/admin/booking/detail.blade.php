@extends('admin.layouts.app')
@section('content')
@php
$courses = \App\Models\Training::get();
@endphp
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Chi tiết đăng ký</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Thông tin đăng ký</h3>
                    <!-- <div class="card-toolbar">
                        <button type="button" class="btn btn-sm btn-light">
                            Action
                        </button>
                    </div> -->
                </div>
                <div class="card-body">
                    <div class="input-group input-group-lg mb-5">
                        <span class="input-group-text" style=" width: 15%;">Họ và tên</span>
                        <input type="text" class="form-control" readonly value="{{ $item->fullname }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" />
                    </div>
                    <div class="input-group input-group-lg mb-5">
                        <span class="input-group-text" style=" width: 15%;">Giới tính</span>
                        <input type="text" class="form-control" readonly value="{{ ($item->gender == 1) ? 'Nam' : 'Nữ'}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" />
                    </div>
                    <div class="input-group input-group-lg mb-5">
                        <span class="input-group-text" style=" width: 15%;">Điện thoại</span>
                        <input type="text" class="form-control" readonly value="{{ $item->phone }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" />
                    </div>
                    <div class="input-group input-group-lg mb-5">
                        <span class="input-group-text" style=" width: 15%;">Email</span>
                        <input type="text" class="form-control" readonly value="{{ $item->email }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" />
                    </div>
                    <div class="input-group input-group-lg mb-5">
                        <span class="input-group-text" style=" width: 15%;">Khóa học</span>
                        <select class="form-select" aria-label="Select example">
                            @foreach($courses as $course)
                            @if($course->id == $item->training_id)<option>{{$course->name}}</option>@endif
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group input-group-lg mb-5">
                        <span class="input-group-text" style=" width: 15%;">Nguồn</span>
                        <input type="text" class="form-control" readonly value="{{ $item->traffic }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" />
                    </div>
                    <div class="input-group input-group-lg mb-5">
                        <span class="input-group-text" style=" width: 15%;">Chức vụ</span>
                        <input type="text" class="form-control" readonly value="{{ $item->position }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" />
                    </div>
                    <div class="input-group input-group-lg mb-5">
                        <span class="input-group-text" style=" width: 15%;">Công ty</span>
                        <input type="text" class="form-control" readonly value="{{ $item->company }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" />
                    </div>
                    <div class="input-group input-group-lg mb-5">
                        <span class="input-group-text" style=" width: 15%;">Kinh nghiệm</span>
                        <input type="text" class="form-control" readonly value="{{ $item->experience }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" />
                    </div>
                    <div class="input-group input-group-lg mb-5">
                        <span class="input-group-text" style=" width: 15%;">Ghi chú</span>
                        <input type="text" class="form-control" readonly value="{{ $item->note }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" />
                    </div>
                    <div class="input-group input-group-lg mb-5">
                        <span class="input-group-text" style=" width: 15%;">Ngày tạo</span>
                        <input type="text" class="form-control" readonly value="{{ $item->created_at }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" />
                    </div>
                </div>
                <div class="card-footer">
                    <div class="card-toolbar">
                        <a href="{{route('admin.booking.index')}}"><button type="button" class="btn btn-sm btn-light">
                                Quay lại
                            </button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('custom-scripts')
<script>
</script>
@endpush