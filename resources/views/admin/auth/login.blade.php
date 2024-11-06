<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title></title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Tri luc viet" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <link rel="shortcut icon" href="{{asset('admin/media/logos/favicon.ico')}}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    @include('admin.layouts.style')
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-body">
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <div class="d-flex flex-column flex-root">
                <!--begin::Authentication - Sign-in -->
                <div class="d-flex flex-column flex-lg-row flex-column-fluid">
                    <!--begin::Aside-->
                    <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-color: #F2C98A">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                            <!--begin::Content-->
                            <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
                                <!--begin::Logo-->
                                <a href="" class="py-9 mb-5">
                                    <img alt="Logo" src="{{asset('admin/media/logo-tlv-ai.png')}}" class="h-60px" />
                                </a>
                                <!--end::Logo-->
                                <!--begin::Title-->
                                <h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #986923;">Welcome to Admin Tri Luc Viet</h1>
                                <!--end::Title-->
                                <!--begin::Description-->
                                <p class="fw-bold fs-2" style="color: #986923;">Tư vấn đào tạo
                                    <br />đấu thầu chuyên nghiệp
                                </p>
                                <!--end::Description-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Aside-->
                    <!--begin::Body-->
                    <div class="d-flex flex-column flex-lg-row-fluid py-10">
                        <!--begin::Content-->
                        <div class="d-flex flex-center flex-column flex-column-fluid">
                            <!--begin::Wrapper-->
                            <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                                <!--begin::Form-->
                                <form class="form w-100" novalidate="novalidate" method="post" id="kt_sign_in_form" action="{{route('admin.login')}}">
                                    @csrf
                                    <!--begin::Heading-->
                                    <div class="text-center mb-10">
                                        <!--begin::Title-->
                                        <h1 class="text-dark mb-3">Sign In to Trilucviet admin</h1>
                                        <!--end::Title-->
                                    </div>
                                    <!--begin::Heading-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input required class="form-control" type="text" name="email" autocomplete="off" />
                                        <!--end::Input-->
                                        @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-stack mb-2">
                                            <!--begin::Label-->
                                            <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                            <!--end::Label-->
                                            <!--begin::Link-->
                                            <a href="" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                                            <!--end::Link-->
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Input-->
                                        <input required class="form-control" type="password" name="password" autocomplete="off" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="text-center">
                                        <!--begin::Submit button-->
                                        <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                            <span class="indicator-label">Continue</span>
                                        </button>
                                        <!--end::Submit button-->
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Authentication - Sign-in-->
            </div>
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    </div>
</body>
<!--end::Body-->
@include('admin.layouts.script')
@stack('custom-scripts')

</html>