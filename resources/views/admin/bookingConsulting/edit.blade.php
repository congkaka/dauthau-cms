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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">update booking-consulting</h1>
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
            <form action="{{route('admin.booking-consulting.update', $item->id)}}" class="form d-flex flex-column flex-lg-row gap-7 gap-lg-10" method="POST">
                @method('PUT')
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
                                        <label class="required form-label">Tên</label>
                                        <input type="text" name="name" value="{{ $item->name }}" class="form-control" />
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Danh mục</label>
                                        <select name="category_id" required class="form-select mb-2" data-placeholder="Select an option">
                                            @foreach($categories as $category)
                                            <option {{ $item->category_id == $category->id?'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Time</label>
                                        <input type="text" name="time" value="{{ $item->time }}" class="form-control" />
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="form-label">link</label>
                                        <input type="text" name="link" value="{{ $item->link }}" class="form-control" />
                                    </div>

                                    <x-admin.single-img-upload inputName="file" fillValue="{{$item->file}}" />
                                    <div class="mb-10"></div>

                                    <div class="mb-10 fv-row">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Trạng thái</label>
                                        <select name="status" required class="form-select mb-2" data-placeholder="Select an option">
                                            @foreach(\App\Enums\booking-consultingStatus::getMap() as $v => $l)
                                            <option {{$item->status == $v ? 'selected' : ''}} value="{{$v}}">{{$l}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{route('admin.booking-consulting.index')}}" id="kt_user_cancel" class="btn btn-light me-5">Quay lại</a>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Lưu</span>
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
</script>
@endpush