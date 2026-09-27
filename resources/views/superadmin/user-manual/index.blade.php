@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">User Manual</h3>
    </div>

    {{-- Success Alert --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="form-row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    {{-- 1. SUPER ADMIN ebong MOHA user-der jonno (Upload / Update Form) --}}
                    @if(in_array(auth()->user()->user_type, ['superadmin', 'moha']))

                    <form action="{{ route('superadmin.user-manual.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="attach_user_manual">Upload User Manual (PDF Only)</label>
                                    <input type="file" name="attach_user_manual" class="form-control form-control-sm"
                                        id="attach_user_manual" accept=".pdf">

                                    @error('attach_user_manual')
                                    <p class="text-danger mt-1 mb-0">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        @if(!empty($manual->attach_user_manual) && file_exists(public_path('uploads/pdf/' .
                        $manual->attach_user_manual)))
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <p class="mb-1 text-muted"><strong>Current Attached Manual:</strong></p>
                                <a href="{{ asset('uploads/pdf/' . $manual->attach_user_manual) }}" target="_blank"
                                    class="btn btn-sm btn-info">
                                    View Current PDF
                                </a>
                            </div>
                        </div>
                        @endif

                        <button type="submit" class="btn btn-primary mr-2"
                            style="background-color: #3b2c68; border-color: #3b2c68;">Update Manual</button>
                    </form>

                    {{-- 2. Normal user-der jonno (Shudhu View PDF Button) --}}
                    @else

                    @if(!empty($manual->attach_user_manual) && file_exists(public_path('uploads/pdf/' .
                    $manual->attach_user_manual)))
                    <div class="text-center my-4">
                        <p class="mb-3" style="font-size: 16px;">Click the button below to view or download the User
                            Manual PDF:</p>
                        <a href="{{ asset('uploads/pdf/' . $manual->attach_user_manual) }}" target="_blank"
                            class="btn btn-primary btn-lg" style="background-color: #3b2c68; border-color: #3b2c68;">
                            <i class="mdi mdi-file-pdf"></i> View PDF Manual
                        </a>
                    </div>
                    @else
                    <div class="alert alert-warning">
                        No user manual available right now.
                    </div>
                    @endif

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection