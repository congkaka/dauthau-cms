@extends('admin.layouts.app')
@php
$posts = \App\Models\Post::get(['id', 'title', 'slug']);
@endphp
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Phản hồi</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
            </div>
            <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Thêm mới</a>
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
                            <input type="text" name="content" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-14" value="{{Request::get('content')}}" placeholder="Tìm kiếm" />
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
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th>Tác giả</th>
                                <th>Bình luận</th>
                                <th class="min-w-150px">Trả lời cho</th>
                                <th>Đã đăng vào</th>
                                <th class="min-w-95px">Trạng thái</th>
                                <th class="min-w-150px text-end">Hành động</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            <!--begin::Table row-->
                            @foreach($items as $i)
                            <tr>
                                <td>
                                    {{$i['name']}}
                                </td>
                                <td>
                                    {{$i['content']}}
                                </td>
                                <td>
                                    @php
                                    foreach($posts as $post) {
                                        $slug = $post->slug;
                                        $tag = "
                                            $post->title
                                            </br>
                                            <a href='https://dauthau.online/$slug'>Xem bài viết</a>
                                        ";
                                        if($post->id == $i['post_id']) echo $tag;
                                    }
                                    @endphp
                                    </br>
                                    <button class="text-gray"><a href="{{route('admin.comments.show', $i->id)}}">{{ count($i['children']) }}</a></button>
                                </td>
                                <td>{{$i['created_at']}}</td>
                                <td>
                                    @php
                                    foreach(\App\Enums\Regulation::getMap() as $v => $l){
                                    if($i['status'] == $v) echo "<span id='status-$i->id'>$l</span>";
                                    }
                                    @endphp
                                </td>
                                <td class="text-end" style="position: relative;">
                                    <div class="action" style="display: flex; position: absolute; right: -35px;">
                                        <a href="{{route('admin.comments.edit', $i['id'])}}" class="menu-link"><i class="bi bi-pencil-square text-warning pe-3"></i></a>
                                        <i class="bi bi-reply text-primary pe-3" data-id="{{$i['id']}}" data-bs-toggle="modal" data-bs-target="#kt_modal_reply"></i>
                                        <a href="{{route('admin.comments.destroy', $i['id'])}}" data-kt-customer-table-filter="delete_row" class="menu-link delete_btn"><i class="bi bi-trash text-danger pe-3"></i></a>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input h-20px w-30px changeStatus" data-id="{{$i['id']}}" type="checkbox" role="switch" @if($i['status'] == 1)checked @endif>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--end::Post-->
</div>
<div class="container-xxl mt-3">
    {{ $items->appends($_GET)->links('admin.custom.pagination')}}
</div>

<div class="modal fade" id="kt_modal_create_app" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Thêm phản hồi</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span><span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body py-lg-10 px-lg-10">
                <form id="kt_account_profile_details_form" class="form" action="{{route('admin.comments.store')}}" method="post">
                    @csrf
                    <div class="card-body border-top p-9">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-10 fv-row">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" value="" class="form-control" placeholder="Enter name" />
                                </div>

                                <div class="mb-10 fv-row">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" value="" class="form-control" placeholder="Enter email" />
                                </div>

                                <div class="mb-10 fv-row">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" value="" class="form-control" placeholder="0347576999..." />
                                </div>

                                <div class="mb-10 input-group">
                                    <span class="input-group-text">Content</span>
                                    <textarea class="form-control" name="content" rows="4" aria-label="description" placeholder="Enter content..."></textarea>
                                </div>

                                <div class="mb-10 fv-row">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Blog</label>
                                    <select name="post_id" required class="form-select mb-2" data-placeholder="Select an option">
                                        <option value="">----- Chọn ------</option>
                                        @foreach($posts as $v => $post)
                                        <option value="{{$post->id}}">{{$post->title}}</option>
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

                                <div class="mb-10"></div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- //modal reply -->
<div class="modal fade" id="kt_modal_reply" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Trả lời phản hồi</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span><span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body py-lg-10 px-lg-10">
                <form id="kt_account_profile_details_form" class="form" action="{{route('admin.comments.reply')}}" method="post">
                    @csrf
                    <input type="hidden" id="comment_id" name="comment_id">
                    <div class="card-body border-top p-9">
                        <div class="row">
                            <div class="col-md-12">
                                <textarea class="form-control" name="comment_reply" id="comment_reply" rows="5" aria-label="description" placeholder="Enter reply..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- // -->

@endsection
@push('custom-scripts')
<script>
    $('.bi-reply').on('click', function() {
        $('#comment_id').val($(this).data('id'));
    });

    $('.changeStatus').on('change', function() {
        let commentId = $(this).data('id');
        let status = $(this).is(':checked')? 1 : 2;

        $.ajax({
            url: "{{route('admin.comments.changeStatus')}}",
            method: 'POST',
            data: {
                commentId: commentId,
                status: status,
                _token: "{{csrf_token()}}"
            },
            success: function(response) {
                if (response.success) {
                    status == 1 ? $('#status-'+commentId).text('Đã phê duyệt') : $('#status-'+commentId).text('Đang chờ');

                } else {
                    alert('Thay đổi trạng thái thất bại!');
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });

    ClassicEditor
        .create(document.querySelector('#comment_reply'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endpush