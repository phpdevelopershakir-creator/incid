@extends('layouts.app')
@section('content')


<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Report Summary
        </h3>
        <nav aria-label="breadcrumb" class="my-3">
            <div class="d-flex align-items-center flex-wrap">
                <div class="me-2 mb-2">
                    <a href="{{ url('superadmin/case/list') }}" class="btn btn-primary">
                        <i class="fas fa-list me-1"></i> Report Summary
                    </a>
                </div>

            </div>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">



                    @php
                    $questions = $questiontitles->keyBy('id');
                    @endphp
                    <div class="mt-4">
                        <div class="accordion accordion-bordered" id="accordion-2" role="tablist">
                            @if(Auth::user()->can('1.question'))
                            @include('superadmin.report.1report')
                            @endif

                            @if(Auth::user()->can('2.question'))
                            @include('superadmin.report.2report')
                            @endif

                            @if(Auth::user()->can('3.question'))
                            @include('superadmin.report.3report')
                            @endif





                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection