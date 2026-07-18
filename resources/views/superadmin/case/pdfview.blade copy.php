<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Case Pdf View</title>
    <script src="{{asset('backend/js/data-table.js')}}"></script>


    <style>
    .custom-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .custom-table th,
    .custom-table td {
        border: 1px solid #dee2e6;
        padding: 12px;
        text-align: center;
        vertical-align: middle;
    }

    .custom-table thead {
        background: #E5E5E5;
        color: #333333;
    }

    .custom-table tbody tr:hover {
        background: #f5f5f5;
    }

    .section-title {
        font-size: 18px;
        font-weight: bold;
        color: #007bff;
        margin: 15px 0;
    }

    .view-btn {
        background: #007bff;
        color: white;
        padding: 5px 10px;
        text-decoration: none;
        border-radius: 4px;
        display: inline-block;
    }

    .view-btn:hover {
        background: #0056b3;
        color: white;
    }
    </style>
</head>

<body>

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align:center;">View Pdf Data</h4>
                        <div class="mt-4">
                            <div class="pdf-container">
                                @php
                                $questions = $questiontitles->keyBy('id');
                                @endphp


                                @if(Auth::user()->can('1.question'))

                                <?php
                                if (($questiontitles[0]->status ?? null) == 1) {
                                ?>


                                <div class="card">

                                    <div class="card-header bg-primary text-white">
                                        <h5>
                                            1. {{ $questiontitles[0]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body">

                                        <!-- First Table -->
                                        <table class="custom-table">

                                            <thead>
                                                <tr>
                                                    <th>Title of The New Law</th>
                                                    <th>Contents of Change/Status</th>
                                                    <th>Attach/Upload Pdf</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @foreach($case->one as $one)

                                                <tr>

                                                    <td>
                                                        @if($one->supreme_court_title == 1)
                                                        PSHT 2012
                                                        @elseif ($one->supreme_court_title == 2)
                                                        Rule of PSHTA (2017)
                                                        @elseif ($one->supreme_court_title == 3)
                                                        OEMA 2013
                                                        @elseif ($one->supreme_court_title == 4)
                                                        Children Act
                                                        @elseif ($one->supreme_court_title == 5)
                                                        Labour Act
                                                        @elseif ($one->supreme_court_title == 6)
                                                        MLA in Criminal Matter 2012
                                                        @elseif ($one->supreme_court_title == 7)
                                                        Human Organ Transfer Rule 1999
                                                        @else
                                                        {{$one->supreme_court_title}}
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if($one->supreme_court_status == 1)
                                                        Revised
                                                        @elseif ($one->supreme_court_status == 2)
                                                        Abolished
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if(!empty($one->supreme_court_image))
                                                        <a href="{{ asset($one->supreme_court_image) }}" target="_blank"
                                                            class="view-btn">
                                                            View
                                                        </a>
                                                        @else
                                                        Not Found
                                                        @endif
                                                    </td>

                                                </tr>

                                                @endforeach

                                            </tbody>

                                        </table>

                                        <div class="section-title">
                                            New Law
                                        </div>

                                        <!-- Second Table -->
                                        <table class="custom-table">

                                            <thead>
                                                <tr>
                                                    <th>Title of The New Law</th>
                                                    <th>Contents of Change/Status</th>
                                                    <th>Attach/Upload Pdf</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @foreach($case->oneb as $oneb)

                                                <tr>

                                                    <td>
                                                        {{$oneb->supreme_court_title_two}}
                                                    </td>

                                                    <td>

                                                        @if($oneb->supreme_court_status_two == 1)
                                                        Planned

                                                        @elseif ($oneb->supreme_court_status_two == 2)
                                                        On Process of Need Assessment

                                                        @elseif ($oneb->supreme_court_status_two == 3)
                                                        Drafted

                                                        @elseif ($oneb->supreme_court_status_two == 4)
                                                        Under Review of MoLJPA

                                                        @elseif ($oneb->supreme_court_status_two == 5)
                                                        Waiting to be enacted

                                                        @elseif ($oneb->supreme_court_status_two == 6)
                                                        Enforced
                                                        @endif

                                                    </td>

                                                    <td>

                                                        @if(!empty($oneb->supreme_court_image_two))

                                                        <a href="{{ asset($oneb->supreme_court_image_two) }}"
                                                            target="_blank" class="view-btn">
                                                            View
                                                        </a>

                                                        @else
                                                        Not Found
                                                        @endif

                                                    </td>

                                                </tr>

                                                @endforeach

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                                <?php } ?>

                                @endif

                                @if(Auth::user()->can('4.question'))

                                <?php
                                if (($questiontitles[3]->status ?? null) == 1) {
                                ?>


                                <div class="card">
                                    <div class="card-header bg-primary text-white">
                                        <h5>
                                            4.{{ $questiontitles[3]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body">
                                        <table class="custom-table">

                                            <thead>
                                                <tr>

                                                    <th scope="col">Title of The New Low </th>
                                                    <th scope="col">Contents of Change/Status </th>
                                                    <th scope="col">Attach/Upload Pdf</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($case->fourb as $fourb)
                                                <tr>
                                                    <th>
                                                        {{$fourb->supreme_court_title_two_q4}}
                                                    </th>
                                                    <td>
                                                        @if($fourb->supreme_court_status_two_q4 == 1)
                                                        Planned
                                                        @elseif ($fourb->supreme_court_status_two_q4 == 2)
                                                        On Process of Need Assessment
                                                        @elseif ($fourb->supreme_court_status_two_q4 == 3)
                                                        Drafted
                                                        @elseif ($fourb->supreme_court_status_two_q4 == 4)
                                                        Under Review of MoLJPA
                                                        @elseif ($fourb->supreme_court_status_two_q4 == 5)
                                                        Waiting to be enacted
                                                        @elseif ($fourb->supreme_court_status_two_q4 == 6)
                                                        Enforced

                                                        @endif

                                                    </td>
                                                    <td>
                                                        @if(!empty($fourb->supreme_court_image_two_q4))
                                                        <a href="{{ asset($fourb->supreme_court_image_two_q4) }}"
                                                            target="_blank">View</a>
                                                        @else
                                                        not Found
                                                        @endif

                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <br>
                                        <h6>New Low</h6>
                                        <table class="table table-bordered text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Title of The New Low </th>
                                                    <th scope="col">Contents of Change/Status </th>
                                                    <th scope="col">Attach/Upload Pdf</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->fourb as $fourb)
                                                <tr>
                                                    <th>
                                                        {{$fourb->supreme_court_title_two_q4}}
                                                    </th>
                                                    <td>
                                                        @if($fourb->supreme_court_status_two_q4 == 1)
                                                        Planned
                                                        @elseif ($fourb->supreme_court_status_two_q4 == 2)
                                                        On Process of Need Assessment
                                                        @elseif ($fourb->supreme_court_status_two_q4 == 3)
                                                        Drafted
                                                        @elseif ($fourb->supreme_court_status_two_q4 == 4)
                                                        Under Review of MoLJPA
                                                        @elseif ($fourb->supreme_court_status_two_q4 == 5)
                                                        Waiting to be enacted
                                                        @elseif ($fourb->supreme_court_status_two_q4 == 6)
                                                        Enforced

                                                        @endif

                                                    </td>
                                                    <td>
                                                        @if(!empty($fourb->supreme_court_image_two_q4))
                                                        <a href="{{ asset($fourb->supreme_court_image_two_q4) }}"
                                                            target="_blank">View</a>
                                                        @else
                                                        not Found
                                                        @endif

                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php } ?>

                                @endif

                                @if(Auth::user()->can('5.question'))
                                <?php
                                if (($questiontitles[4]->status ?? null) == 1) {
                                ?>


                                <div class="card">
                                    <div class="card-header bg-primary text-white">
                                        <h5>
                                            5.{{ $questiontitles[4]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body">
                                        <table class="custom-table">

                                            <thead>
                                                <tr>
                                                    <th scope="col">Title Description </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($case->five as $five)
                                                {{$five->involved_directly_trafficking_title_q5}}
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php } ?>
                                @endif
                                @if(Auth::user()->can('6.question'))
                                <?php
                                if (($questiontitles[5]->status ?? null) == 1) {
                                ?>


                                <div class="card">
                                    <div class="card-header bg-primary text-white">
                                        <h5>
                                            6.{{ $questiontitles[5]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body">
                                        <table class="custom-table">

                                            <thead>

                                                <tr>
                                                    <th rowspan="2" style="text-align:center; vertical-align:middle;">
                                                        Ministry/Department
                                                    </th>

                                                    <th colspan="3" style="text-align:center;">
                                                        Number of Official Accused
                                                    </th>

                                                    <th rowspan="2" style="text-align:center; vertical-align:middle;">
                                                        Result of which Policy/Law/Response
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <th>Men</th>
                                                    <th>Women</th>
                                                    <th>Total</th>
                                                </tr>

                                            </thead>

                                            <tbody>

                                                @php
                                                $menTotal = 0;
                                                $womenTotal = 0;
                                                $Total = 0;
                                                @endphp

                                                @foreach($case->six as $six)

                                                <tr>
                                                    <td>{{$six->labor_title_q6}}</td>
                                                    <td>{{$six->labor_men_q6}}</td>
                                                    <td>{{$six->labor_women_q6}}</td>
                                                    <td>{{$six->labor_total_q6}}</td>
                                                    <td>{{$six->labor_response_q6}}</td>
                                                </tr>

                                                @php
                                                $menTotal += $six->labor_men_q6;
                                                $womenTotal += $six->labor_women_q6;
                                                $Total += $six->labor_total_q6;
                                                @endphp

                                                @endforeach

                                                <tr style="font-weight:bold; background:#f1f1f1;">
                                                    <td>Total</td>
                                                    <td>{{ $menTotal }}</td>
                                                    <td>{{ $womenTotal }}</td>
                                                    <td>{{ $Total }}</td>
                                                    <td></td>
                                                </tr>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                                <?php } ?>
                                @endif
                                @if(Auth::user()->can('7.question'))
                                <?php
                                if (($questiontitles[6]->status ?? null) == 1) {
                                ?>


                                <div class="card">
                                    <div class="card-header bg-primary text-white">
                                        <h5>
                                            7.{{ $questiontitles[6]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body">
                                        <table class="custom-table">

                                            <thead>
                                                <tr>
                                                    <th rowspan="2" scope="row">Ministry/Department Municipality body
                                                    </th>
                                                    <th colspan="4" style="text-align: left">Number of Official Accused
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Men</th>
                                                    <th scope="col">Women</th>
                                                    <th scope="col">Total</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @php
                                                $menTotal = 0;
                                                $womenTotal = 0;
                                                $Total = 0;

                                                @endphp
                                                @foreach($case->seven as $seven)
                                                <tr>

                                                    <td>{{$seven->justice_title_q7}}</td>
                                                    <td>{{$seven->justice_men_q7}}</td>
                                                    <td>{{$seven->justice_women_q7}}</td>
                                                    <td>{{$seven->justice_total_q7}}</td>
                                                </tr>
                                                @php
                                                $menTotal += $seven->justice_men_q7;
                                                $womenTotal += $seven->justice_women_q7;
                                                $Total += $seven->justice_total_q7;


                                                @endphp
                                                @endforeach
                                                <tr style="font-weight:bold; background:#f1f1f1;">
                                                    <td>Total</td>
                                                    <td>{{ $menTotal }}</td>
                                                    <td>{{ $womenTotal }}</td>
                                                    <td>{{ $Total }}</td>

                                                </tr>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                                <?php } ?>
                                @endif













                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>