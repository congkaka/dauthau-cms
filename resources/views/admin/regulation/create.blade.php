@extends('admin.layouts.app')
@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Add regulation</h1>
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
            <form action="{{route('admin.regulation.store')}}" class="form d-flex flex-column flex-lg-row gap-7 gap-lg-10" method="POST">
                @method('post')
                @csrf
                <input type="hidden" name="author_id" value="{{Auth::user()->id}}">
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-12 gap-lg-12">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <!--<h2>General</h2>-->
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Số</label>
                                        <input type="text" name="number" value="" class="form-control" />
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Tên Văn bản</label>
                                        <input type="text" name="title" value="" class="form-control" />
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Cơ quan ban hành</label>
                                        <select name="issuingAgency" required class="form-select mb-2" data-placeholder="Select an option">
                                            @foreach(\App\Enums\Regulation::list() as $v => $l)
                                            <option value="{{$l}}">{{$l}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="form-label">Người ký</label>
                                        <input type="text" name="signer" value="" class="form-control" />
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="form-label">Ngày ban hành</label>
                                        <input type="text" name="issuedDate" value="" class="form-control datetimepicker" />
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="form-label">Ngày hiệu lực</label>
                                        <input type="text" name="effectiveDate" value="" class="form-control datetimepicker" />
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="form-label">File đính kèm</label>
                                        <input type="text" name="attachment" value="" class="form-control" />
                                    </div>

                                    <x-admin.single-img-upload inputName="download_path" fillValue="" />
                                    <div class="mb-10"></div>

                                    <div class="mb-10 fv-row">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Loại</label>
                                        <select name="status" required class="form-select mb-2" data-placeholder="Select an option">
                                            @foreach(\App\Enums\Regulation::type() as $v => $l)
                                            <option value="{{$l}}">{{$l}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Trạng thái</label>
                                        <select name="status" required class="form-select mb-2" data-placeholder="Select an option">
                                            @foreach(\App\Enums\Regulation::getMap() as $v => $l)
                                            <option value="{{$v}}">{{$l}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{route('admin.regulation.index')}}" id="kt_user_cancel" class="btn btn-light me-5">Back</a>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Save</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('custom-scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Khởi tạo Flatpickr
        flatpickr('.datetimepicker', {
            enableTime: true, // Bật tùy chọn thời gian (nếu cần)
            dateFormat: 'Y-m-d H:i', // Định dạng ngày giờ (YYYY-MM-DD HH:mm)
            time_24hr: true // Hiển thị giờ theo định dạng 24 giờ
        });
    });
</script>

@endpush