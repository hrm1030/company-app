@extends('layout.app')

@section('page-content')
<script src="{{ asset('js/users/list.js') }}"></script>

<div class="row">
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <h3>User List</h3>
            </div>
            <!--begin::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <table id="user_table" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                <thead>
                    <tr class="fw-bolder fs-6 text-gray-800 px-7">
                        <th width="15%">User ID</th>
                        <th width="20%">Name</th>
                        <th width="15%">Email</th>
                        <th width="15%">Created At</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td><button class="btn btn-sm btn-danger btn_delete" type="button" user_id = "{{ $user->id }}">Delete</button></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!--end::Card body-->
    </div>
</div>
@endsection
