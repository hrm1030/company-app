@extends('layout.app')

@section('page-content')
<script src="{{ asset('js/item.js') }}"></script>
<div class="row">
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <h3>Item List</h3>
            </div>
            <!--begin::Card title-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-subscription-table-toolbar="base">
                    <!--begin::Add subscription-->
                    <button type="button" id="btn_new_item" class="btn btn-primary">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"></rect>
                                <rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)" x="4" y="11" width="16" height="2" rx="1"></rect>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Add Item
                    </button>
                    <!--end::Add subscription-->
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <table id="item_table" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                <thead>
                    <tr class="fw-bolder fs-6 text-gray-800 px-7">
                        <th width="15%">Item ID</th>
                        <th width="15%">Item Name</th>
                        <th width="25%">Categories</th>
                        <th width="30%">Subcategories</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)

                    @php
                        $categories = json_decode($item->categories);
                        $subcategories = json_decode($item->subcategories);
                    @endphp
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            @foreach($categories as $category)
                            <span class="badge badge-primary mb-10"><i class="fa fa-tags text-light"></i> {{ $category->value }}</span>
                            @endforeach
                        </td>
                        <td>
                            @foreach($subcategories as $subcategory)
                            <span class="badge badge-info mb-10"><i class="fa fa-tags text-light"></i> {{ $subcategory->value }}</span>
                            @endforeach
                        </td>
                        <td>
                            <button class="btn btn-sm btn-success btn_edit btn-icon" type="button" item_id = "{{ $item->id }}"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger btn-icon btn_delete" type="button" item_id = "{{ $item->id }}"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!--end::Card body-->
    </div>
</div>

<div class="modal fade" tabindex="-1" id="itemModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"></rect>
                                <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1"></rect>
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <!--begin:Form-->
                    <form id="item_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">Create a Item</h1>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Item Name</span>

                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control" placeholder="Enter Item Name" name="item_name" id="item_name">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Select Categories</span>

                            </label>
                            <!--end::Label-->
                            <input class="form-control form-control-solid" value="" id="categories" placeholder="Select categories..."/>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Select Sub Categories</span>

                            </label>
                            <!--end::Label-->
                            <input class="form-control form-control-solid" value="" id="subcategories" placeholder="Select sub categories..."/>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Description</span>

                            </label>
                            <!--end::Label-->
                            <textarea class="form-control form-control-solid" rows="5" value="" id="description" placeholder="Type description..."></textarea>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->
                    </form>
                    <!--end:Form-->
                </div>
            </div>

            <div class="modal-footer">
                <button type="reset" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" item_id="" id="btn_item_save">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
