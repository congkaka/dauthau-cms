@extends('admin.layouts.app') @section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Update category</h1>
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
            <form action="{{route('admin.comments.update', $item->id)}}"
                class="form d-flex flex-column flex-lg-row gap-7 gap-lg-10" method="POST">
                @method('PUT')
                @csrf
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
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <div class="mb-10 fv-row">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-10 fv-row">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" value="{{ $item['name'] }}" class="form-control" placeholder="Enter name" />
                                        </div>

                                        <div class="mb-10 fv-row">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" value="{{ $item['email'] }}" class="form-control" placeholder="Enter email" />
                                        </div>

                                        <div class="mb-10 fv-row">
                                            <label class="form-label">Phone</label>
                                            <input type="text" name="phone" value="{{ $item['phone'] }}" class="form-control" placeholder="0347576999..." />
                                        </div>

                                        <div class="mb-10 input-group">
                                            <span class="input-group-text">Content</span>
                                            <textarea class="form-control" name="content" rows="4" aria-label="description" placeholder="Enter content...">{{ $item['content'] }}</textarea>
                                        </div>

                                        <div class="mb-10 fv-row">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6">Blog</label>
                                            <select name="post_id" required class="form-select mb-2" data-placeholder="Select an option">
                                                <option value="">----- Chọn ------</option>
                                                @foreach($posts as $v => $post)
                                                <option {{$item->post_id == $post->id ? 'selected' : ''}} value="{{$post->id}}">{{$post->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-10 fv-row">
                                            <label class="col-lg-4 col-form-label fw-bold fs-6">Published</label>
                                            <select name="status" required class="form-select mb-2" data-placeholder="Select an option">
                                                @foreach(\App\Enums\Regulation::getMap() as $v => $l)
                                                <option {{$item->status == $v ? 'selected' : ''}} value="{{$v}}">{{$l}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-10"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--end::General options-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{route('admin.comments.index')}}" id="kt_ecommerce_add_product_cancel"
                            class="btn btn-light me-5">Back</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Save</span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Main column-->
                </div>
            </form>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->
@endsection