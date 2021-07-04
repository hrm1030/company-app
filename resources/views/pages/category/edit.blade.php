@extends('layout.app')

@section('page-content')

<script src="{{ asset('js/users/add.js') }}"></script>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                </div>
                <!--begin::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Form-->
                <form class="form w-100" novalidate="novalidate" id="category_form" action="{{ route('users.save') }}" method="POST">
                    @csrf
                    <!--begin::Heading-->
                    <div class="mb-10 text-center">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">Create a Category</h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <label class="form-label fw-bolder text-dark fs-6">Select Name</label>
                        <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="name" id="name" value="{{ old('name') }}" autocomplete="off" />
                        @if($errors->has('name'))
                        <span class="form-text text-danger" id="name_error">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <label class="form-label fw-bolder text-dark fs-6">Category Name</label>
                        <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="name" id="name" value="{{ old('name') }}" autocomplete="off" />
                        @if($errors->has('name'))
                        <span class="form-text text-danger" id="name_error">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="button" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card body-->
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                </div>
                <!--begin::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Form-->
                <form class="form w-100" novalidate="novalidate" id="subcategory_form" action="{{ route('users.save') }}" method="POST">
                    @csrf
                    <!--begin::Heading-->
                    <div class="mb-10 text-center">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">Create a SubCategory</h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <label class="form-label fw-bolder text-dark fs-6">Select Name</label>
                        <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="name" id="name" value="{{ old('name') }}" autocomplete="off" />
                        @if($errors->has('name'))
                        <span class="form-text text-danger" id="name_error">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row fv-row mb-7">
                        <label class="form-label fw-bolder text-dark fs-6">Category Name</label>
                        <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="name" id="name" value="{{ old('name') }}" autocomplete="off" />
                        @if($errors->has('name'))
                        <span class="form-text text-danger" id="name_error">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="button" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card body-->
        </div>
    </div>
</div>
@endsection
