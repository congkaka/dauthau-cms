@extends('admin.layouts.app')
@section('content')
@php
$courses = \App\Models\Training::get();
@endphp
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <ol class="breadcrumb text-muted fs-6 fw-semibold">
                    <li class="breadcrumb-item"><a href="" class="">Trang chủ</a></li>
                    <li class="breadcrumb-item text-muted">Quản lý đăng ký</li>
                </ol>
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
            <!--begin::Category-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <form class="card-title" method="get">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative me-2">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                <i class="bi bi-search"></i>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" name="fullname" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-14" value="{{Request::get('fullname')}}" placeholder="Tìm kiếm" />
                        </div>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-search"></i>
                        </button>
                        <!--end::Search-->
                        <div class="row" style="margin-left: 20px;">
                            <div class="col-12">
                                <select name="training_id" class="form-control" onchange="this.form.submit()">
                                    <option value="">Chọn khóa học</option>
                                    @foreach($courses as $course)
                                    <option value="{{$course->id}}" {{ $course->id == Request::get('training_id')?'selected' : '' }}>{{$course->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- <button type="button" id="export" class="btn btn-sm fw-bold btn-primary" style="position: absolute;right: 25px;">Xuất File</button> -->
                        <a href="{{route('admin.booking.export')}}" id="export" class="btn btn-sm fw-bold btn-primary" style="position: absolute;right: 25px;">Xuất File</a>

                    </form>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Add customer-->
                        <!--end::Add customer-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 " id="kt_ecommerce_product_table">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-140px">Họ tên</th>
                                <th class="min-w-90px">Giới tính</th>
                                <th class="min-w-90px">Điện thoại</th>
                                <th>Email</th>
                                <th class="min-w-90px">Khóa học</th>
                                <!-- <th>Nguồn</th> -->
                                <th class="min-w-90px">Chức vụ</th>
                                <th class="min-w-90px">Công ty</th>
                                <th class="min-w-100px">Kinh nghiệm</th>
                                <!-- <th class="min-w-90px">Ghi chú</th> -->
                                <th class="min-w-125px">Ngày tạo</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @foreach($items as $i)
                            <tr>
                                <td> {{ $i->fullname }} </td>
                                <td> {{ ($i->gender == 1) ? 'Nam' : 'Nữ'}} </td>
                                <td> {{ $i->phone}} </td>
                                <td> {{ $i->email}} </td>
                                <td>
                                    @php
                                    foreach($courses as $course) {
                                    if($course->id == $i->training_id) echo $course->name;
                                    }
                                    @endphp
                                </td>
                                <!-- <td> {{ $i->traffic}} </td> -->
                                <td> {{ $i->position}} </td>
                                <td> {{ $i->company}} </td>
                                <td> {{ $i->experience}} </td>
                                <!-- <td> {{ $i->note}} </td> -->
                                <td> {{ date('d-m-Y', strtotime($i->created_at))}}</td>
                                <td>
                                    <a href="{{route('admin.booking.show', $i->id)}}" class="menu-link"><i class="bi bi-eye-fill text-warning pe-3"></i></a>
                                    <a href="{{route('admin.booking.destroy', $i->id)}}" class="menu-link delete_btn"><i class="bi bi-trash text-danger pe-3"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-xxl mt-3">
    {{ $items->appends($_GET)->links('admin.custom.pagination')}}
</div>
@endsection
@push('custom-scripts')
<script>
    $(document).on("click", "#export", function() {
        $.ajax({
            url: "{{route('admin.booking.export')}}",
            method: 'POST',
            data: {
                _token: "{{csrf_token()}}"
            },
            success: function(response) {
                if (response.success) {
                    alert('Export Success');

                } else {
                    alert('Thay đổi trạng thái thất bại!');
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
</script>
@endpush