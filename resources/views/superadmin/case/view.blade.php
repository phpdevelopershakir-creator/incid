@extends('layouts.app')
@section('content')


<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Case View
        </h3>
        <nav aria-label="breadcrumb" class="my-3">
            <div class="d-flex align-items-center flex-wrap">
                <div class="me-2 mb-2">
                    <a href="{{ url('superadmin/case/list') }}" class="btn btn-primary">
                        <i class="fas fa-list me-1"></i> Case List
                    </a>
                </div>
                &nbsp
                <div class="me-2 mb-2">
                    <a href="{{ route('superadmin.view.pdf', $case->id) }}" target="_blank" class="btn btn-danger">
                        <i class="fas fa-file-pdf me-1"></i> PDF View
                    </a>
                </div>
                &nbsp
                <div class="me-2 mb-2">
                    <a href="{{ route('superadmin.case.csv', $case->id) }}" target="_blank" class="btn btn-success">
                        <i class="fas fa-file-csv me-1"></i> CSV View
                    </a>
                </div>
                &nbsp
                <div class="mb-2">
                    <a href="{{ route('superadmin.case.word', $case->id) }}" target="_blank"
                        class="btn btn-info text-white">
                        <i class="fas fa-file-word me-1"></i> Word View
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
                            @include('superadmin.case.view.1view')
                            @endif

                            @if(Auth::user()->can('2.question'))
                            @include('superadmin.case.view.2view')
                            @endif

                            @if(Auth::user()->can('4.question'))
                            @include('superadmin.case.view.4view')
                            @endif

                            @if(Auth::user()->can('5.question'))
                            @include('superadmin.case.view.5view')
                            @endif

                            @if(Auth::user()->can('6.question'))
                            @include('superadmin.case.view.6view')
                            @endif

                            @if(Auth::user()->can('7.question'))
                            @include('superadmin.case.view.7view')
                            @endif

                            @if(Auth::user()->can('8.question'))
                            @include('superadmin.case.view.8view')
                            @endif

                            @if(Auth::user()->can('9.question'))
                            @include('superadmin.case.view.9view')
                            @endif

                            @if(Auth::user()->can('10.question'))
                            @include('superadmin.case.view.10view')
                            @endif

                            @if(Auth::user()->can('11.question'))
                            @include('superadmin.case.view.11view')
                            @endif

                            @if(Auth::user()->can('12.question'))
                            @include('superadmin.case.view.12view')
                            @endif

                            @if(Auth::user()->can('13.question'))
                            @include('superadmin.case.view.13view')
                            @endif

                            @if(Auth::user()->can('14.question'))
                            @include('superadmin.case.view.14view')
                            @endif

                            @if(Auth::user()->can('17.question'))
                            @include('superadmin.case.view.17view')
                            @endif

                            @if(Auth::user()->can('20.question'))
                            @include('superadmin.case.view.20view')
                            @endif

                            @if(Auth::user()->can('21.question'))
                            @include('superadmin.case.view.21view')
                            @endif

                            @if(Auth::user()->can('22.question'))
                            @include('superadmin.case.view.22view')
                            @endif

                            @if(Auth::user()->can('23.question'))
                            @include('superadmin.case.view.23view')
                            @endif

                            @if(Auth::user()->can('24.question'))
                            @include('superadmin.case.view.24view')
                            @endif

                            @if(Auth::user()->can('30.question'))
                            @include('superadmin.case.view.30view')
                            @endif

                            @if(Auth::user()->can('31.question'))
                            @include('superadmin.case.view.31view')
                            @endif

                            @if(Auth::user()->can('33.question'))
                            @include('superadmin.case.view.33view')
                            @endif

                            @if(Auth::user()->can('44.question'))
                            @include('superadmin.case.view.44view')
                            @endif

                            @if(Auth::user()->can('45.question'))
                            @include('superadmin.case.view.45view')
                            @endif

                            @if(Auth::user()->can('46.question'))
                            @include('superadmin.case.view.46view')
                            @endif

                            @if(Auth::user()->can('47.question'))
                            @include('superadmin.case.view.47view')
                            @endif

                            @if(Auth::user()->can('49.question'))
                            @include('superadmin.case.view.49view')
                            @endif

                            @if(Auth::user()->can('50.question'))
                            @include('superadmin.case.view.50view')
                            @endif

                            @if(Auth::user()->can('51.question'))
                            @include('superadmin.case.view.51view')
                            @endif

                            @if(Auth::user()->can('52.question'))
                            @include('superadmin.case.view.52view')
                            @endif

                            @if(Auth::user()->can('53.question'))
                            @include('superadmin.case.view.53view')
                            @endif

                            @if(Auth::user()->can('54.question'))
                            @include('superadmin.case.view.54view')
                            @endif

                            @if(Auth::user()->can('55.question'))
                            @include('superadmin.case.view.55view')
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>

@endsection
<script src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
    crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"
    crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".sevenstatus").on("click", function() {
        var statusvalue = $("input[name='is_address_trafficking_q7']:checked").val();
        $('.question7').find('.othersText').hide()
        $('.question7').find('#q7others').val("")
        if (statusvalue == '1') {
            $('.question7').find('#seven_question_view').show()
            $('.question7').find('span').addClass('othersText')
        } else if (statusvalue == "2") {
            $('.question7').find('#seven_question_view').hide()
            $('.question7').find('span').removeClass('othersText')
            $('.question7').find('span').show()

        } else {
            $('.question7').find('#seven_question_view').hide()
            $('.question7').find('span').addClass('othersText')


        }
    });
});
</script>