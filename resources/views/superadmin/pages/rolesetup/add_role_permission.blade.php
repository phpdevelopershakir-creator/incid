@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="content-wrapper">

    <!-- Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Role & Permission Create</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Role & Permission Create</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Body -->
    <section class="content">
        <div class="container-fluid">

            <div class="card">

                <div class="card-header">
                    <a href="{{ url('superadmin/all/role/permission') }}" class="btn btn-success btn-sm float-right">
                        <i class="fa fa-list"></i> Role & Permission List
                    </a>
                </div>

                <div class="card-body">

                    <form action="{{ url('superadmin/store/role/permission') }}" method="post">
                        @csrf

                        <!-- Role Dropdown -->
                        <div class="form-group col-md-12">
                            <label>Role Name <span class="text-danger">*</span></label>
                            <select name="role_id" class="form-control" required>
                                <option disabled selected>Select Group</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- SELECT ALL -->
                         <div class="form-group col-md-12">
                        <div class="form-check mb-3 ml-2">
                            <input type="checkbox" class="form-check-input" id="checkAll">
                            <label class="form-check-label font-weight-bold" for="checkAll" style="font-size: 16px;">
                                Permission All
                            </label>
                        </div>
                        </div>

                        <hr>

                        <!-- GROUPS -->
                        @foreach($permission_groups as $group)
                        <div class="card mb-3 border">

                            <div class="card-header bg-light">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input group-check" data-group="{{ $group->group_name }}" id="group_{{ $group->group_name }}">
                                    <label class="form-check-label font-weight-bold" for="group_{{ $group->group_name }}">
                                        {{ strtoupper($group->group_name) }}
                                    </label>
                                </div>
                            </div>

                            <div class="card-body row">

                                @php
                                $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                @endphp

                                @foreach($permissions as $permission)
                                <div class="col-md-4 mb-2">
                                    <div class="form-check">
                                        <input type="checkbox"
                                               class="form-check-input permission-item"
                                               data-group="{{ $group->group_name }}"
                                               id="permission_{{ $permission->id }}"
                                               name="permission[]"
                                               value="{{ $permission->id }}">

                                        <label class="form-check-label" for="permission_{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                </div>
                                @endforeach

                            </div>

                        </div>
                        @endforeach

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>

                    </form>

                </div>

            </div>

        </div>
    </section>

</div>

<!-- SCRIPT -->
<!-- SCRIPT -->
<script>
$(document).ready(function () {

    // ১. MASTER SELECT ALL (Permission All) ক্লিক করলে
    $("#checkAll").on("change", function () {
        let isChecked = $(this).is(":checked");
        
        // "Permission All" দিলে ভেতরের সব গ্রুপ এবং পারমিশন সিলেক্ট হবে
        // আর আনচেক করলে সব আনচেক হয়ে যাবে
        $("input[type=checkbox]").not(this).prop("checked", isChecked);
    });

    // ২. GROUP SELECT (যেমন: CASE এর মেইন বক্সে ক্লিক করলে)
    $(".group-check").on("change", function () {
        let group = $(this).data("group");
        let isChecked = $(this).is(":checked");
        
        // শুধু ওই নির্দিষ্ট গ্রুপের ভেতরের পারমিশনগুলো সিলেক্ট বা আনসিলেক্ট হবে
        $("input.permission-item[data-group='" + group + "']").prop("checked", isChecked);
        
        // ইউজার যেহেতু ম্যানুয়ালি গ্রুপ চেঞ্জ করছে, তাই মেইন "Permission All" এর টিক তুলে দেওয়া ভালো
        if (!isChecked) {
            $("#checkAll").prop("checked", false);
        }
    });

    // ৩. INDIVIDUAL PERMISSION CLICK (একটা একটা করে পারমিশন সিলেক্ট/আনসিলেক্ট করলে)
    $(".permission-item").on("change", function () {
        // এখানে কোনো লজিক থাকবে না! 
        // আপনি ভেতরে আনচেক করলেও CASE বা Permission All এর মেইন বক্সে কোনো প্রভাব পড়বে না।
        
        let isChecked = $(this).is(":checked");
        if (!isChecked) {
            // জাস্ট মেইন মাস্টার "Permission All" টিকটি অফ করে দেবে যদি কোনো একটা আনচেক হয়
            $("#checkAll").prop("checked", false);
        }
    });
    
});
</script>

@endsection
