@extends('admin.layouts.app')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <ol class="breadcrumb text-muted fs-6 fw-semibold">
                    <li class="breadcrumb-item"><a href="" class="">Trang chủ</a></li>
                    <li class="breadcrumb-item text-muted">Văn bản pháp quy</li>
                </ol>
            </div>
            <a href="{{route('admin.regulation.create')}}" class="btn btn-sm fw-bold btn-primary">Thêm mới</a>
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
                            <input type="text" name="title" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-14" value="{{Request::get('title')}}" placeholder="Tìm kiếm" />
                        </div>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-search"></i>
                        </button>
                        <!--end::Search-->
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
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_product_table">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <!-- <th>ID</th> -->
                                <th>Số hiệu</th>
                                <th>Tên văn bản</th>
                                <th class="min-w-100px">Cơ quan BH</th>
                                <th>Người ký</th>
                                <th class="min-w-150px">Ngày BH</th>
                                <th class="min-w-150px">Ngày HL</th>
                                <th>File</th>
                                <th class="min-w-100px text-end">Hành Động</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @foreach($items as $i)
                            <tr>
                                <!-- <td> {{ $i->id }} </td> -->
                                <td> {{ $i->number}} </td>
                                <td> {{ $i->title}} </td>
                                <td> {{ $i->issuingAgency}} </td>
                                <td> {{ $i->signer}} </td>
                                <td> {{ date('d-m-Y', strtotime($i->issuedDate))}} </td>
                                <td> {{ date('d-m-Y', strtotime($i->effectiveDate))}} </td>
                                <td> @if($i->download_path != 'not_found')<a href="{{ $i->download_path}}" download>{{ basename($i->download_path)}}</a> @endif</td>
                                <td class="text-end">
                                    <a href="{{route('admin.regulation.edit', $i->id)}}" class="menu-link"><i class="bi bi-pencil-square text-warning pe-3"></i></a>
                                    <a href="{{route('admin.regulation.destroy', $i->id)}}" class="menu-link delete_btn"><i class="bi bi-trash text-danger pe-3"></i></a>
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
@endpush