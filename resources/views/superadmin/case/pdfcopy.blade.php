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
                                                            <a href="{{ asset($one->supreme_court_image) }}"
                                                                target="_blank"
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
                                                                target="_blank"
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
                                                            <a href="{{ asset($fourb->supreme_court_image_two_q4) }}" target="_blank">View</a>
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
                                                            <a href="{{ asset($fourb->supreme_court_image_two_q4) }}" target="_blank">View</a>
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
                                                        <th rowspan="2" scope="row">Ministry/Department Municipality body</th>
                                                        <th colspan="4" style="text-align: left">Number of Official Accused</th>
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
                                @if(Auth::user()->can('8.question'))
                                <?php
                                if (($questiontitles[7]->status ?? null) == 1) {
                                ?>


                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5>
                                                8.{{ $questiontitles[7]->title }}
                                            </h5>
                                        </div>

                                        <div class="card-body">
                                            <table class="custom-table">

                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" style="text-align: center; vertical-align: middle;">Ministry/Department Municipality body</th>
                                                        <th colspan="4">Measures Taken</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Investigation (numbwer)</th>
                                                        <th>Prosecution (number)</th>
                                                        <th>Conviction or Sentencing (number)</th>
                                                        <th>Administrative Measures (numbwer)</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @php
                                                    $menTotal = 0;
                                                    $womenTotal = 0;
                                                    $thirdGenderTotal = 0;
                                                    $boysTotal = 0;

                                                    @endphp
                                                    @foreach($case->eight as $eight)
                                                    <tr>

                                                        <td>{{$eight->official_title_q8}}</td>
                                                        <td>{{$eight->official_investigation_q8}}</td>
                                                        <td>{{$eight->official_prosecution_q8}}</td>
                                                        <td>{{$eight->official_conviction_q8}}</td>
                                                        <td>{{$eight->official_administrative_q8}}</td>
                                                    </tr>
                                                    @php
                                                    $menTotal += $eight->official_investigation_q8;
                                                    $womenTotal += $eight->official_prosecution_q8;
                                                    $thirdGenderTotal += $eight->official_conviction_q8;
                                                    $boysTotal += $eight->official_administrative_q8;

                                                    @endphp
                                                    @endforeach
                                                    <tr style="font-weight:bold; background:#f1f1f1;">
                                                        <td>Total</td>
                                                        <td>{{ $menTotal }}</td>
                                                        <td>{{ $womenTotal }}</td>
                                                        <td>{{ $thirdGenderTotal }}</td>
                                                        <td>{{ $boysTotal }}</td>
                                                    </tr>

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                <?php } ?>
                                @endif
                                @if(Auth::user()->can('9.question'))
                                <?php
                                if (($questiontitles[8]->status ?? null) == 1) {
                                ?>


                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5>
                                                9.{{ $questiontitles[8]->title }}
                                            </h5>
                                        </div>

                                        <div class="card-body">
                                            <table class="custom-table">

                                                <thead>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($case->nine as $nine)
                                                    <tr>
                                                        <td>

                                                            {{$nine->court_title_q9}}
                                                        </td>
                                                        <td>
                                                            {{ $nine->court_type_q9 == 1 ? 'Yes' : 'No' }}
                                                        </td>
                                                        @if($nine->court_type_q9 == 1)
                                                        <td>

                                                            {{ $nine->court_description_q9 }}

                                                        </td>
                                                        @endif
                                                    </tr>
                                                    @endforeach
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                <?php } ?>
                                @endif
                                @if(Auth::user()->can('10.question'))
                                <?php
                                if (($questiontitles[9]->status ?? null) == 1) {
                                ?>


                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5>
                                                10.{{ $questiontitles[9]->title }}
                                            </h5>
                                        </div>

                                        <div class="card-body">
                                            <table class="custom-table">

                                                <thead>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($case->ten as $ten)
                                                    <tr>
                                                        <td>

                                                            {{$ten->court_title_q10}}
                                                        </td>
                                                        <td>
                                                            {{ $ten->court_type_q10 == 1 ? 'Yes' : 'No' }}
                                                        </td>
                                                        @if($ten->court_type_q10 == 1)
                                                        <td>

                                                            {{ $ten->court_description_q10 }}

                                                        </td>
                                                        @endif
                                                    </tr>
                                                    @endforeach
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                <?php } ?>
                                @endif
                                @if(Auth::user()->can('11.question'))
                                <?php
                                if (($questiontitles[10]->status ?? null) == 1) {
                                ?>


                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5>
                                                11.{{ $questiontitles[10]->title }}
                                            </h5>
                                        </div>

                                        <div class="card-body">
                                            <table class="custom-table">

                                                <thead>
                                                    <tr>
                                                        <th>Country</th>
                                                        <th>Target group of Training (multiple response)</th>
                                                        <th>Total coverage</th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($case->eleven as $eleven)
                                                    <tr>
                                                        <th>
                                                            @if($eleven->government_agreements_transparent_country_q11 == 1)
                                                            India
                                                            @elseif ($eleven->government_agreements_transparent_country_q11 == 2)
                                                            Nepal
                                                            @elseif ($eleven->government_agreements_transparent_country_q11 == 3)
                                                            Sri lanka
                                                            @elseif ($eleven->government_agreements_transparent_country_q11 == 4)
                                                            EU
                                                            @elseif ($eleven->government_agreements_transparent_country_q11 == 5)
                                                            USA
                                                            @elseif ($eleven->government_agreements_transparent_country_q11 == 6)
                                                            Saudi Arabia
                                                            @elseif ($eleven->government_agreements_transparent_country_q11 == 7)
                                                            Qatar
                                                            @elseif ($eleven->government_agreements_transparent_country_q11 == 8)
                                                            Lebanon
                                                            @elseif ($eleven->government_agreements_transparent_country_q11 == 9)
                                                            Irag
                                                            @elseif ($eleven->government_agreements_transparent_country_q11 == 10)
                                                            UAE
                                                            @elseif ($eleven->government_agreements_transparent_country_q11 == 11)
                                                            Thailand
                                                            @elseif ($eleven->government_agreements_transparent_country_q11 == 12)
                                                            Vietnam
                                                            @elseif ($eleven->government_agreements_transparent_country_q11 == 13)
                                                            Cambodia
                                                            @elseif ($eleven->government_agreements_transparent_country_q11 == 14)
                                                            South Africa
                                                            @elseif ($eleven->government_agreements_transparent_country_q11 == 15)
                                                            Brazil
                                                            @elseif ($eleven->government_agreements_transparent_country_q11 == 16)
                                                            UK

                                                            @else
                                                            {{$eleven->government_agreements_transparent_country_q11}}
                                                            @endif
                                                        </th>
                                                        <td>
                                                            @if($eleven->government_agreements_transparent_status_q11 == 1)
                                                            Govemment Official
                                                            @elseif ($eleven->government_agreements_transparent_status_q11 == 2)
                                                            Immigration authority
                                                            @elseif ($eleven->government_agreements_transparent_status_q11 == 3)
                                                            Law Enforcing Personnel
                                                            @elseif ($eleven->government_agreements_transparent_status_q11 == 4)
                                                            Border Control Force
                                                            @elseif ($eleven->government_agreements_transparent_status_q11 == 5)
                                                            Judiciary
                                                            @elseif ($eleven->government_agreements_transparent_status_q11 == 6)
                                                            Diplomat
                                                            @endif

                                                        </td>
                                                        <td>
                                                            {{$eleven->government_agreements_transparent_total_q11}}

                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                <?php } ?>
                                @endif
                                @if(Auth::user()->can('12.question'))
                                <?php
                                if (($questiontitles[11]->status ?? null) == 1) {
                                ?>


                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5>
                                                12.{{ $questiontitles[11]->title }}
                                            </h5>
                                        </div>

                                        <div class="card-body">
                                            @php
                                            $index = 65;
                                            @endphp
                                            @foreach($twelveGrouped as $country => $rows)
                                            <h5 class="mt-3">{{ chr($index++) }}. {{ $labels[$country] ?? $country }}</h5>
                                            <table class="custom-table">

                                                <thead>
                                                    <tr>
                                                        <th>Country/Region/International Law Enforcement Organization</th>
                                                        <th>Sex Trafficking</th>
                                                        <th>Labour Trafficking</th>
                                                        <th>Other/Unspecific Trafficking</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($rows as $twelve)
                                                    <tr>
                                                        <td>{{ $twelve->government_cooperate_foreign_counterparts_country_q12 }}</td>
                                                        <td>{{ $twelve->government_cooperate_foreign_counterparts_sex_trafficking_q12 }}</td>
                                                        <td>{{ $twelve->government_cooperate_foreign_counterparts_labour_trafficking_q1 }}</td>
                                                        <td>{{ $twelve->government_cooperate_foreign_counterparts_other_trafficking_q12 }}</td>
                                                        <td>{{ $twelve->government_cooperate_foreign_counterparts_total_trafficking_q12 }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>

                                            </table>
                                            @endforeach
                                        </div>
                                    </div>
                                <?php } ?>
                                @endif
                                @if(Auth::user()->can('14.question'))
                                <?php
                                if (($questiontitles[13]->status ?? null) == 1) {
                                ?>


                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5>
                                                14.{{ $questiontitles[13]->title }}
                                            </h5>
                                        </div>

                                        <div class="card-body">
                                            <table class="custom-table">

                                                <thead>
                                                    <tr>
                                                        <th>Main document/ Procedure</th>
                                                        <th>Description of change/ Status</th>
                                                        <th>Attach/Upload Summary</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    @foreach($case->fourteen as $fourteen)
                                                    <tr>
                                                        <td>
                                                            @if ($fourteen->original_approach_q14 == 1)
                                                            Victim Identification Guidelines of PSD/MoHA
                                                            @elseif ($fourteen->original_approach_q14 == 2)
                                                            PSHT Act's Rule on VoT identification
                                                            @elseif ($fourteen->original_approach_q14 == 3)
                                                            Victim identification checklist of MoSW
                                                            @elseif ($fourteen->original_approach_q14 == 4)
                                                            VoT identification under NRM of MoHA
                                                            @else
                                                            {{$fourteen->original_approach_q14}}
                                                            @endif
                                                        </td>

                                                        <td>
                                                            @if ($fourteen->description_change_q14 == 1)
                                                            Enforced
                                                            @elseif ($fourteen->description_change_q14 == 2)
                                                            Updated and enforced
                                                            @elseif ($fourteen->description_change_q14 == 3)
                                                            Stricter enforcement
                                                            @elseif ($fourteen->description_change_q14 == 4)
                                                            Increases efforts
                                                            @else
                                                            {{$fourteen->description_change_q14}}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if(!empty($fourteen->document_upload_q14))
                                                            <a href="{{ asset($fourteen->document_upload_q14) }}" target="_blank">View</a>
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
                                @if(Auth::user()->can('17.question'))
                                <?php
                                if (($questiontitles[16]->status ?? null) == 1) {
                                ?>


                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5>
                                                17.{{ $questiontitles[16]->title }}
                                            </h5>
                                        </div>

                                        <div class="card-body">
                                            <table class="custom-table">

                                                <thead>
                                                    <tr>
                                                        <th rowspan="2">Title of Original Guideline</th>
                                                        <th rowspan="2">Description of change/Status</th>
                                                        <th colspan="4">VoT referred</th>

                                                    </tr>
                                                    <tr>
                                                        <th>Men</th>
                                                        <th>Women</th>
                                                        <th>TG</th>
                                                        <th>Total</th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @php
                                                    $menTotal = 0;
                                                    $womenTotal = 0;
                                                    $thirdTotal = 0;
                                                    $Total = 0;

                                                    @endphp
                                                    @foreach($case->seventeen as $seventeen)
                                                    <tr>
                                                        <th>
                                                            @if($seventeen->report_country_narrative_protection_title_q17 == 1)
                                                            Referral desk established at women and Child Repression Prevention Tribunals,Anti-Trafficking Tribunals, and District tribunals
                                                            @elseif ($seventeen->report_country_narrative_protection_title_q17 == 2)
                                                            National Referral Mechanism Guideline
                                                            @elseif ($seventeen->report_country_narrative_protection_title_q17 == 3)
                                                            National Referral Mechanism SOP
                                                            @elseif ($seventeen->report_country_narrative_protection_title_q17 == 4)
                                                            Digital Referral Mechanism of MoHA
                                                            @else
                                                            {{$seventeen->report_country_narrative_protection_title_q17}}
                                                            @endif
                                                        </th>
                                                        <td>
                                                            @if($seventeen->report_country_narrative_protection_description_q17 == 1)
                                                            Enforced
                                                            @elseif ($seventeen->report_country_narrative_protection_description_q17 == 2)
                                                            Updated and enforced
                                                            @elseif ($seventeen->report_country_narrative_protection_description_q17 == 3)
                                                            Stricter enforcement
                                                            @elseif ($seventeen->report_country_narrative_protection_description_q17 == 4)
                                                            Increases efforts
                                                            @endif
                                                        </td>

                                                        <td>{{$seventeen->report_country_narrative_protection_men_q17}}</td>
                                                        <td>{{$seventeen->report_country_narrative_protection_women_q17}}</td>
                                                        <td>{{$seventeen->report_country_narrative_protection_tg_q17}}</td>
                                                        <td>{{$seventeen->report_country_narrative_protection_total_q17}}</td>


                                                    </tr>
                                                    @php
                                                    $menTotal += $seventeen->report_country_narrative_protection_men_q17;
                                                    $womenTotal += $seventeen->report_country_narrative_protection_women_q17;
                                                    $thirdTotal += $seventeen->report_country_narrative_protection_tg_q17;
                                                    $Total += $seventeen->report_country_narrative_protection_total_q17;
                                                    @endphp
                                                    @endforeach
                                                    <tr style="font-weight:bold; background:#f1f1f1;">
                                                        <td colspan="2">Total</td>
                                                        <td>{{ $menTotal }}</td>
                                                        <td>{{ $womenTotal }}</td>
                                                        <td>{{ $thirdTotal }}</td>
                                                        <td>{{ $Total }}</td>

                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                <?php } ?>
                                @endif
                                @if(Auth::user()->can('20.question'))
                                <?php
                                if (($questiontitles[19]->status ?? null) == 1) {
                                ?>

                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5>
                                                20. {{ $questiontitles[19]->title }}
                                            </h5>
                                        </div>
                                        <div class="card-body">

                                            <!-- First Table -->
                                            <table class="custom-table">

                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" style="text-align: center; vertical-align: middle;">Types of Hotlines</th>
                                                        <th rowspan="2" style="vertical-align: middle;">Hotlines Number</th>
                                                        <th colspan="6">Coverage</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Men</th>
                                                        <th>Women</th>
                                                        <th>3rd Gender</th>
                                                        <th>Boy</th>
                                                        <th>Girls</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td colspan="8" style="text-align: center; font-weight: bold; background-color: #f8f9fa;">Internal Trafficking</td>
                                                    </tr>
                                                    @php
                                                    $InternalmenTotal = 0;
                                                    $InternalwomenTotal = 0;
                                                    $InternalthirgenderTotal = 0;
                                                    $InternalboyTotal = 0;
                                                    $InternalgirlTotal = 0;
                                                    $InternalTotal = 0;

                                                    @endphp
                                                    @foreach($case->twentya as $twentya)
                                                    <tr>
                                                        <td>
                                                            @if($twentya->internal_traffick_type_of_hotlines_q20 == 1)
                                                            MoWCA
                                                            @elseif ($twentya->internal_traffick_type_of_hotlines_q20 == 2)
                                                            MoHA
                                                            @elseif ($twentya->internal_traffick_type_of_hotlines_q20 == 3)
                                                            MoSW
                                                            @elseif ($twentya->internal_traffick_type_of_hotlines_q20 == 4)
                                                            MoEWOE
                                                            @elseif ($twentya->internal_traffick_type_of_hotlines_q20 == 5)
                                                            MoLJPA
                                                            @elseif ($twentya->internal_traffick_type_of_hotlines_q20 == 6)
                                                            INCIDIN Bangladesh
                                                            @elseif ($twentya->internal_traffick_type_of_hotlines_q20 == 7)
                                                            Ask
                                                            @elseif ($twentya->internal_traffick_type_of_hotlines_q20 == 8)
                                                            BNWLA
                                                            @elseif ($twentya->internal_traffick_type_of_hotlines_q20 == 9)
                                                            DAM
                                                            @else
                                                            {{$twentya->internal_traffick_type_of_hotlines_q20}}
                                                            @endif
                                                        </td>
                                                        <td>{{$twentya->internal_hotlines_number_q20}}</td>
                                                        <td>{{$twentya->internal_traffick_men_q20}}</td>
                                                        <td>{{$twentya->internal_traffick_women_q20}}</td>
                                                        <td>{{$twentya->internal_traffick_third_gender_q20}}</td>
                                                        <td>{{$twentya->internal_traffick_boys_q20}}</td>
                                                        <td>{{$twentya->internal_traffick_girls_q20}}</td>
                                                        <td>{{$twentya->internal_traffick_total_q20}}</td>

                                                    </tr>
                                                    @php
                                                    $InternalmenTotal += $twentya->internal_traffick_men_q20;
                                                    $InternalwomenTotal += $twentya->internal_traffick_women_q20;
                                                    $InternalthirgenderTotal += $twentya->internal_traffick_third_gender_q20;
                                                    $InternalboyTotal += $twentya->internal_traffick_boys_q20;
                                                    $InternalgirlTotal += $twentya->internal_traffick_girls_q20;
                                                    $InternalTotal += $twentya->internal_traffick_total_q20;


                                                    @endphp
                                                    @endforeach
                                                    <tr style="font-weight:bold; background:#f1f1f1;">
                                                        <td style="text-align: left;" colspan="2">Total</td>
                                                        <td class="text-center align-middle">{{ $InternalmenTotal }}</td>
                                                        <td class="text-center align-middle">{{ $InternalwomenTotal }}</td>
                                                        <td class="text-center align-middle">{{ $InternalthirgenderTotal }}</td>
                                                        <td class="text-center align-middle">{{ $InternalboyTotal }}</td>
                                                        <td class="text-center align-middle">{{ $InternalgirlTotal }}</td>
                                                        <td class="text-center align-middle">{{ $InternalTotal }}</td>

                                                    </tr>

                                                </tbody>

                                            </table>



                                            <!-- Second Table -->
                                            <table class="custom-table">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" style="text-align: center; vertical-align: middle;">Types of Hotlines</th>
                                                        <th rowspan="2" style="vertical-align: middle;">Hotlines Number</th>
                                                        <th colspan="6">Coverage</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Men</th>
                                                        <th>Women</th>
                                                        <th>3rd Gender</th>
                                                        <th>Boy</th>
                                                        <th>Girls</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td colspan="8" style="text-align: center; font-weight: bold; background-color: #f8f9fa;">International Trafficking</td>
                                                    </tr>
                                                    @php
                                                    $InternalionmenTotal = 0;
                                                    $InternalionwomenTotal = 0;
                                                    $InternalionthirgenderTotal = 0;
                                                    $InternalionboyTotal = 0;
                                                    $InternaliongirlTotal = 0;
                                                    $InternalionTotal = 0;

                                                    @endphp
                                                    @foreach($case->twentyb as $twentyb)

                                                    <tr>
                                                        <td>
                                                            @if($twentyb->international_traffick_type_of_hotlines_q20 == 1)
                                                            MoWCA
                                                            @elseif ($twentyb->international_traffick_type_of_hotlines_q20 == 2)
                                                            MoHA
                                                            @elseif ($twentyb->international_traffick_type_of_hotlines_q20 == 3)
                                                            MoSW
                                                            @elseif ($twentyb->international_traffick_type_of_hotlines_q20 == 4)
                                                            MoEWOE
                                                            @elseif ($twentyb->international_traffick_type_of_hotlines_q20 == 5)
                                                            MoLJPA
                                                            @elseif ($twentyb->international_traffick_type_of_hotlines_q20 == 6)
                                                            INCIDIN Bangladesh
                                                            @elseif ($twentyb->international_traffick_type_of_hotlines_q20 == 7)
                                                            Ask
                                                            @elseif ($twentyb->international_traffick_type_of_hotlines_q20 == 8)
                                                            BNWLA
                                                            @elseif ($twentyb->international_traffick_type_of_hotlines_q20 == 9)
                                                            DAM
                                                            @else
                                                            {{$twentyb->international_traffick_type_of_hotlines_q20}}
                                                            @endif
                                                        </td>
                                                        <td>{{$twentyb->international_hotlines_number_q20}}</td>
                                                        <td>{{$twentyb->international_traffick_men_q20}}</td>
                                                        <td>{{$twentyb->international_traffick_women_q20}}</td>
                                                        <td>{{$twentyb->international_traffick_third_gender_q20}}</td>
                                                        <td>{{$twentyb->international_traffick_boys_q20}}</td>
                                                        <td>{{$twentyb->international_traffick_girls_q20}}</td>
                                                        <td>{{$twentyb->international_traffick_total_q20}}</td>

                                                    </tr>
                                                    @php
                                                    $InternalionmenTotal += $twentyb->international_traffick_men_q20;
                                                    $InternalionwomenTotal += $twentyb->international_traffick_women_q20;
                                                    $InternalionthirgenderTotal += $twentyb->international_traffick_third_gender_q20;
                                                    $InternalionboyTotal += $twentyb->international_traffick_boys_q20;
                                                    $InternaliongirlTotal += $twentyb->international_traffick_girls_q20;
                                                    $InternalionTotal += $twentyb->international_traffick_total_q20;


                                                    @endphp
                                                    @endforeach
                                                    <tr style="font-weight:bold; background:#f1f1f1;">
                                                        <td style="text-align: left;" colspan="2">Total</td>
                                                        <td class="text-center align-middle">{{ $InternalionmenTotal }}</td>
                                                        <td class="text-center align-middle">{{ $InternalionwomenTotal }}</td>
                                                        <td class="text-center align-middle">{{ $InternalionthirgenderTotal }}</td>
                                                        <td class="text-center align-middle">{{ $InternalionboyTotal }}</td>
                                                        <td class="text-center align-middle">{{ $InternaliongirlTotal }}</td>
                                                        <td class="text-center align-middle">{{ $InternalionTotal }}</td>

                                                    </tr>
                                                </tbody>

                                            </table>

                                        </div>

                                    </div>

                                <?php } ?>

                                @endif
                                
                                @if(Auth::user()->can('21.question'))
                                <?php
                                if (($questiontitles[20]->status ?? null) == 1) {
                                ?>


                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5>
                                                21.{{ $questiontitles[20]->title }}
                                            </h5>
                                        </div>

                                        <div class="card-body">
                                            <table class="custom-table">

                                                <thead>
                                                    <tr>
                                                        <th rowspan="2">Name of the Shalters </th>
                                                        <th rowspan="2">Operators </th>
                                                        <th colspan="3">Capacity </th>
                                                        <th rowspan="2">Specialized for Trafficking? </th>
                                                        <th rowspan="2">Eligible Victims</th>
                                                        <th rowspan="2">Note</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Men</th>
                                                        <th>Women</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @
                                                    @php
                                                    $menTotal = 0;
                                                    $womenTotal = 0;
                                                    $Total = 0;

                                                    @endphp
                                                    @foreach($case->twentyone as $twentyone)
                                                    <tr>
                                                        <td> {{$twentyone->name_q21}}</td>
                                                        <td> {{$twentyone->operator_q21}}</td>
                                                        <td> {{$twentyone->capacity_men_q21}}</td>
                                                        <td> {{$twentyone->capacity_women_q21}}</td>
                                                        <td> {{$twentyone->capacity_total_q21}}</td>
                                                        <td> {{$twentyone->is_specialized_q21}}</td>
                                                        <td> {{$twentyone->eligible_victims_q21}}</td>
                                                        <td> {{$twentyone->note_q21}}</td>

                                                    </tr>
                                                    @php
                                                    $menTotal += $twentyone->capacity_men_q21;
                                                    $womenTotal += $twentyone->capacity_women_q21;
                                                    $Total += $twentyone->capacity_total_q21;
                                                    @endphp
                                                    @endforeach
                                                    <tr style="font-weight:bold; background:#f1f1f1;">
                                                        <td colspan="2">Total</td>
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
                                @if(Auth::user()->can('22.question'))
                                <?php
                                if (($questiontitles[21]->status ?? null) == 1) {
                                ?>


                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5>
                                                22.{{ $questiontitles[21]->title }}
                                            </h5>
                                        </div>

                                        <div class="card-body">
                                            <table class="custom-table">

                                                <thead>
                                                    <tr>
                                                        <th rowspan="2">Name of the Shalters </th>
                                                        <th rowspan="2">Operators </th>
                                                        <th colspan="3">Capacity </th>
                                                        <th rowspan="2">Specialized for Trafficking? </th>
                                                        <th rowspan="2">Eligible Victims</th>
                                                        <th rowspan="2">Note</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Men</th>
                                                        <th>Women</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>>

                                                <tbody>
                                                    @php
                                                    $menTotal = 0;
                                                    $womenTotal = 0;
                                                    $Total = 0;

                                                    @endphp
                                                    @foreach($case->twentytwo as $twentytwo)
                                                    <tr>
                                                        <td> {{$twentytwo->name_q22}}</td>
                                                        <td> {{$twentytwo->operator_q22}}</td>
                                                        <td> {{$twentytwo->capacity_men_q22}}</td>
                                                        <td> {{$twentytwo->capacity_women_q22}}</td>
                                                        <td> {{$twentytwo->capacity_total_q22}}</td>
                                                        <td> {{$twentytwo->is_specialized_q22}}</td>
                                                        <td> {{$twentytwo->eligible_victims_q22}}</td>
                                                        <td> {{$twentytwo->note_q22}}</td>

                                                    </tr>
                                                    @php
                                                    $menTotal += $twentytwo->capacity_men_q22;
                                                    $womenTotal += $twentytwo->capacity_women_q22;
                                                    $Total += $twentytwo->capacity_total_q22;
                                                    @endphp
                                                    @endforeach
                                                    <tr style="font-weight:bold; background:#f1f1f1;">
                                                        <td colspan="2">Total</td>
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
                                @if(Auth::user()->can('24.question'))
                                <?php
                                if (($questiontitles[23]->status ?? null) == 1) {
                                ?>


                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5>
                                                24.{{ $questiontitles[23]->title }}
                                            </h5>
                                        </div>

                                        <div class="card-body">
                                            <table class="custom-table">

                                                <thead>
                                                    <tr>
                                                        <th rowspan="2">Protection Services</th>
                                                        <th rowspan="2">Quality</th>
                                                        <th colspan="6">Quality of Current Coverage</th>
                                                        <th rowspan="2">Location</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Men</th>
                                                        <th>Women</th>
                                                        <th>TG</th>
                                                        <th>Boy</th>
                                                        <th>Girl</th>
                                                        <th>Total</th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @php
                                                    $menTotal = 0;
                                                    $womenTotal = 0;
                                                    $thirdTotal = 0;
                                                    $boyTotal = 0;
                                                    $girlTotal = 0;
                                                    $Total = 0;

                                                    @endphp
                                                    @foreach($case->twentyfour as $twentyfour)
                                                    <tr>
                                                        <td>
                                                            @if($twentyfour->specialized_trafficking_victims_protection_q24 == 1)
                                                            Economic Support/Asset Transfer
                                                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 2)
                                                            Micro Credit
                                                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 3)
                                                            Livelihood Training
                                                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 4)
                                                            Job Placement
                                                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 5)
                                                            Health Care
                                                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 6)
                                                            Psychosocial Care
                                                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 7)
                                                            Shelter
                                                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 8)
                                                            Social Safetynet
                                                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 9)
                                                            Information Support
                                                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 10)
                                                            Mainstream Education
                                                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 11)
                                                            Non Formal Education
                                                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 12)
                                                            Technical Education
                                                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 13)
                                                            Life Skill
                                                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 14)
                                                            Family Reunion
                                                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 15)
                                                            Referral

                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($twentyfour->specialized_trafficking_victims_quality_q24 == 1)
                                                            Excellent
                                                            @elseif ($twentyfour->specialized_trafficking_victims_quality_q24 == 2)
                                                            As per Standard
                                                            @elseif ($twentyfour->specialized_trafficking_victims_quality_q24 == 3)
                                                            Below Standard

                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{$twentyfour->specialized_trafficking_victims_men_q24}}

                                                        </td>
                                                        <td>
                                                            {{$twentyfour->specialized_trafficking_victims_women_q24}}

                                                        </td>
                                                        <td>
                                                            {{$twentyfour->specialized_trafficking_victims_tg_q24}}

                                                        </td>
                                                        <td>
                                                            {{$twentyfour->specialized_trafficking_victims_boy_q24}}

                                                        </td>
                                                        <td>
                                                            {{$twentyfour->specialized_trafficking_victims_girl_q24}}

                                                        </td>
                                                        <td>{{$twentyfour->specialized_trafficking_victims_total_q24}}</td>
                                                        <td>
                                                            @php
                                                            $locations = $twentyfour->specialized_trafficking_victims_location_q24;

                                                            // যদি JSON string হয়
                                                            if (is_string($locations)) {
                                                            $decoded = json_decode($locations, true);

                                                            // json decode fail হলে plain string রেখে দাও
                                                            $locations = $decoded ?? $locations;
                                                            }
                                                            @endphp

                                                            @if(is_array($locations))
                                                            {{ implode(', ', $locations) }}
                                                            @else
                                                            {{ $locations ?? 'N/A' }}
                                                            @endif

                                                        </td>



                                                    </tr>
                                                    @php
                                                    $menTotal += $twentyfour->specialized_trafficking_victims_men_q24;
                                                    $womenTotal += $twentyfour->specialized_trafficking_victims_women_q24;
                                                    $thirdTotal += $twentyfour->specialized_trafficking_victims_tg_q24;
                                                    $boyTotal += $twentyfour->specialized_trafficking_victims_boy_q24;
                                                    $girlTotal += $twentyfour->specialized_trafficking_victims_girl_q24;
                                                    $Total += $twentyfour->specialized_trafficking_victims_total_q24;
                                                    @endphp
                                                    @endforeach
                                                    <tr style="font-weight:bold; background:#f1f1f1;">
                                                        <td colspan="2">Total</td>
                                                        <td>{{ $menTotal }}</td>
                                                        <td>{{ $womenTotal }}</td>
                                                        <td>{{ $thirdTotal }}</td>
                                                        <td>{{ $boyTotal }}</td>
                                                        <td>{{ $girlTotal }}</td>
                                                        <td>{{ $Total }}</td>
                                                        <td></td>
                                                    </tr>

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                <?php } ?>
                                @endif
                                @if(Auth::user()->can('44.question'))
                                <?php
                                if (($questiontitles[43]->status ?? null) == 1) {
                                ?>


                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5>
                                                44.{{ $questiontitles[43]->title }}
                                            </h5>
                                        </div>

                                        <div class="card-body">
                                            <table class="custom-table">

                                                <thead>
                                                    <tr>
                                                        <th scope="col">Allocation</th>
                                                        <th scope="col">Allocation</th>


                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($case->fortyfour as $fortyfour)
                                                    <tr>
                                                        <th>
                                                            @if ($fortyfour->awareness_campaigns_research_projects_title_q44 == 1)
                                                            Total Allocation under NPA for prevention
                                                            @elseif ($fortyfour->awareness_campaigns_research_projects_title_q44 == 2)
                                                            Total Allocation utilized under NPA for prevention
                                                            @elseif ($fortyfour->awareness_campaigns_research_projects_title_q44 == 3)
                                                            Total allocation spent for Awareness activities
                                                            @elseif ($fortyfour->awareness_campaigns_research_projects_title_q44 == 4)
                                                            Total allocation spent for safety-net
                                                            @elseif ($fortyfour->awareness_campaigns_research_projects_title_q44 == 5)
                                                            Total allocation spent for training to promote prevention
                                                            @elseif ($fortyfour->awareness_campaigns_research_projects_title_q44 == 6)
                                                            Assessment of Allocation
                                                            @endif

                                                        </th>

                                                        <th>
                                                            @if($fortyfour->awareness_campaigns_research_projects_status_q44 == 1)
                                                            Excess
                                                            @elseif ($fortyfour->awareness_campaigns_research_projects_status_q44 == 2)
                                                            Adequate
                                                            @elseif ($fortyfour->awareness_campaigns_research_projects_status_q44 == 3)
                                                            Inadequate
                                                            @elseif ($fortyfour->awareness_campaigns_research_projects_status_q44 == 4)
                                                            None
                                                            @else
                                                            {{$fortyfour->awareness_campaigns_research_projects_status_q44}}
                                                            @endif

                                                        </th>
                                                    </tr>
                                                    @endforeach
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                <?php } ?>
                                @endif
                                @if(Auth::user()->can('45.question'))
                                <?php
                                if (($questiontitles[44]->status ?? null) == 1) {
                                ?>


                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5>
                                                45.{{ $questiontitles[44]->title }}
                                            </h5>
                                        </div>

                                        <div class="card-body">
                                            <table class="custom-table">

                                                <thead>
                                                    <tr>

                                                        <td>Duration of NPA</td>
                                                        <td>Attach/Upload</td>



                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($case->fortyfive as $fortyfive)
                                                    <tr>
                                                        <th>

                                                            {{$fortyfive->national_plan_trafficking_q45_title_q45}}

                                                        </th>

                                                        <td>
                                                            @if(!empty($fortyfive->document_upload_q45))
                                                            <a href="{{ asset($fortyfive->document_upload_q45) }}" target="_blank">View</a>
                                                            @else
                                                            not Found
                                                            @endif

                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            {{$fortyfive->national_plan_trafficking_q45_description_q45}}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                <?php } ?>
                                @endif
                                
                                @if(Auth::user()->can('46.question'))
                                <?php
                                if (($questiontitles[45]->status ?? null) == 1) {
                                ?>


                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5>
                                                46.{{ $questiontitles[45]->title }}
                                            </h5>
                                        </div>

                                        <div class="card-body">
                                            <table class="custom-table">

                                                <thead class="text-center align-middle">
                                                    <tr style="background:#E5E5E5;">
                                                        <th rowspan="2" style="text-align: center; vertical-align: middle; min-width: 180px;">Types of Activities</th>
                                                        <th colspan="6">Community (number covered)</th>
                                                        <th colspan="6">Organization (Number covered)</th>
                                                        <th colspan="3">Total (number covered)</th>

                                                    </tr>
                                                    <tr style="background:#E5E5E5;">
                                                        <th>M</th>
                                                        <th>W</th>
                                                        <th>TG</th>
                                                        <th>B</th>
                                                        <th>G</th>
                                                        <th>T</th>
                                                        <th>GO</th>
                                                        <th>NGO</th>
                                                        <th>INGO</th>
                                                        <th>UN</th>
                                                        <th>CTC</th>
                                                        <th>Others</th>
                                                        <th>M</th>
                                                        <th>F</th>
                                                        <th>T</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @php
                                                    $oneTotal = 0;
                                                    $twoTotal = 0;
                                                    $threeTotal = 0;
                                                    $fourTotal = 0;
                                                    $fiveTotal = 0;
                                                    $sixTotal = 0;
                                                    $sevenTotal = 0;
                                                    $eightTotal = 0;
                                                    $nineTotal = 0;
                                                    $tenTotal = 0;
                                                    $elevenTotal = 0;
                                                    $twelveTotal = 0;
                                                    $thirtyTotal = 0;
                                                    $fourteenTotal = 0;

                                                    $Total = 0;

                                                    @endphp
                                                    @foreach($case->fortysix as $fortysix)
                                                    <tr>

                                                        <td>
                                                            @if($fortysix->q46_type_activity == 1)
                                                            Courtyard meeting
                                                            @elseif ($fortysix->q46_type_activity == 2)
                                                            Bazar/hatt meeting
                                                            @elseif ($fortysix->q46_type_activity == 3)
                                                            CTC meeting
                                                            @elseif ($fortysix->q46_type_activity == 4)
                                                            Consultation
                                                            @elseif ($fortysix->q46_type_activity == 5)
                                                            Poster
                                                            @elseif ($fortysix->q46_type_activity == 6)
                                                            leaflet
                                                            @elseif ($fortysix->q46_type_activity == 7)
                                                            Booklet
                                                            @elseif ($fortysix->q46_type_activity == 8)
                                                            SMS
                                                            @elseif ($fortysix->q46_type_activity == 9)
                                                            Newsletter
                                                            @elseif ($fortysix->q46_type_activity == 10)
                                                            Billboard
                                                            @elseif ($fortysix->q46_type_activity == 11)
                                                            Folk show
                                                            @elseif ($fortysix->q46_type_activity == 12)
                                                            Film show
                                                            @elseif ($fortysix->q46_type_activity == 13)
                                                            Miking
                                                            @elseif ($fortysix->q46_type_activity == 14)
                                                            Web campaign
                                                            @else
                                                            {{$fortysix->q46_type_activity}}
                                                            @endif
                                                        </td>
                                                        <td class="text-center align-middle">{{$fortysix->q46_comm_m}}</td>
                                                        <td class="text-center align-middle">{{$fortysix->q46_comm_w}}</td>
                                                        <td class="text-center align-middle">{{$fortysix->q46_comm_tg}}</td>
                                                        <td class="text-center align-middle">{{$fortysix->q46_comm_b}}</td>
                                                        <td class="text-center align-middle">{{$fortysix->q46_comm_g}}</td>
                                                        <td class="text-center align-middle">{{$fortysix->q46_comm_t}}</td>
                                                        <td class="text-center align-middle">{{$fortysix->q46_org_go}}</td>
                                                        <td class="text-center align-middle">{{$fortysix->q46_org_ngo}}</td>
                                                        <td class="text-center align-middle">{{$fortysix->q46_org_ingo}}</td>
                                                        <td class="text-center align-middle">{{$fortysix->q46_org_un}}</td>
                                                        <td class="text-center align-middle">{{$fortysix->q46_org_ctc}}</td>
                                                        <td class="text-center align-middle">{{$fortysix->q46_org_others}}</td>
                                                        <td class="text-center align-middle"> {{$fortysix->q46_total_m}}</td>
                                                        <td class="text-center align-middle">{{$fortysix->q46_total_f}}</td>
                                                        <td class="text-center align-middle">{{$fortysix->q46_total_t}}</td>
                                                    </tr>
                                                    @php
                                                    $oneTotal += $fortysix->q46_comm_m;
                                                    $twoTotal += $fortysix->q46_comm_w;
                                                    $threeTotal += $fortysix->q46_comm_tg;
                                                    $fourTotal += $fortysix->q46_comm_b;
                                                    $fiveTotal += $fortysix->q46_comm_g;
                                                    $sixTotal += $fortysix->q46_comm_t;
                                                    $sevenTotal += $fortysix->q46_org_go;
                                                    $eightTotal += $fortysix->q46_org_ngo;
                                                    $nineTotal += $fortysix->q46_org_ingo;
                                                    $tenTotal += $fortysix->q46_org_un;
                                                    $elevenTotal += $fortysix->q46_org_ctc;
                                                    $twelveTotal += $fortysix->q46_org_others;
                                                    $thirtyTotal += $fortysix->q46_total_m;
                                                    $fourteenTotal += $fortysix->q46_total_f;
                                                    $Total += $fortysix->q46_total_t;



                                                    @endphp
                                                    @endforeach
                                                    <tr style="font-weight:bold; background:#f1f1f1;">
                                                        <td style="text-align: left;">Total</td>
                                                        <td class="text-center align-middle">{{ $oneTotal }}</td>
                                                        <td class="text-center align-middle">{{ $twoTotal }}</td>
                                                        <td class="text-center align-middle">{{ $threeTotal }}</td>
                                                        <td class="text-center align-middle">{{ $fourTotal }}</td>
                                                        <td class="text-center align-middle">{{ $fiveTotal }}</td>
                                                        <td class="text-center align-middle">{{ $sixTotal }}</td>
                                                        <td class="text-center align-middle">{{ $sevenTotal }}</td>
                                                        <td class="text-center align-middle">{{ $eightTotal }}</td>
                                                        <td class="text-center align-middle">{{ $nineTotal }}</td>
                                                        <td class="text-center align-middle">{{ $tenTotal }}</td>
                                                        <td class="text-center align-middle">{{ $elevenTotal }}</td>
                                                        <td class="text-center align-middle">{{ $twelveTotal }}</td>
                                                        <td class="text-center align-middle">{{ $thirtyTotal }}</td>
                                                        <td class="text-center align-middle">{{ $fourteenTotal }}</td>
                                                        <td class="text-center align-middle">{{ $Total }}</td>

                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                <?php } ?>
                                @endif
                                @if(Auth::user()->can('47.question'))
                                <?php
                                if (($questiontitles[46]->status ?? null) == 1) {
                                ?>


                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5>
                                                47.{{ $questiontitles[46]->title }}
                                            </h5>
                                        </div>

                                        <div class="card-body">
                                            <table class="custom-table">

                                                <thead>
                                                    <tr>
                                                        <td>Original Document/Approach</td>
                                                        <td>Description of Change</td>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($case->fortyseven as $fortyseven)
                                                    <tr>
                                                        <th>
                                                            @if ($fortyseven->government_change_regulated_title_q47 == 1)
                                                            OEMA 2013
                                                            @elseif ($fortyseven->government_change_regulated_title_q47 == 2)
                                                            Employee-paid-model
                                                            @elseif ($fortyseven->government_change_regulated_title_q47 == 3)
                                                            Employer-paid-model
                                                            @elseif ($fortyseven->government_change_regulated_title_q47 == 4)
                                                            Fair recruitment cost notification
                                                            @elseif ($fortyseven->government_change_regulated_title_q47 == 5)
                                                            Ranking of Recruiting Agents
                                                            @elseif ($fortyseven->government_change_regulated_title_q47 == 6)
                                                            Licensing of Recruiting Agents
                                                            @elseif ($fortyseven->government_change_regulated_title_q47 == 7)
                                                            Registration of Informal Recruiting Agents
                                                            @elseif ($fortyseven->government_change_regulated_title_q47 == 8)
                                                            Zero Migration Cost Approach
                                                            @else
                                                            {{$fortyseven->government_change_regulated_title_q47}}
                                                            @endif


                                                        </th>

                                                        <td>
                                                            @if ($fortyseven->government_change_regulated_status_q47 == 1)
                                                            Firmly implemented enforced
                                                            @elseif ($fortyseven->government_change_regulated_status_q47 == 2)
                                                            Reformed
                                                            @elseif ($fortyseven->government_change_regulated_status_q47 == 3)
                                                            Planned
                                                            @elseif ($fortyseven->government_change_regulated_status_q47 == 4)
                                                            Drafted
                                                            @elseif ($fortyseven->government_change_regulated_status_q47 == 5)
                                                            Updated
                                                            @elseif ($fortyseven->government_change_regulated_status_q47 == 6)
                                                            Partially enforced
                                                            @elseif ($fortyseven->government_change_regulated_status_q47 == 7)
                                                            Expanded us
                                                            @elseif ($fortyseven->government_change_regulated_status_q47 == 8)

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
                                @if(Auth::user()->can('49.question'))
                                <?php
                                if (($questiontitles[48]->status ?? null) == 1) {
                                ?>


                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5>
                                                49.{{ $questiontitles[48]->title }}
                                            </h5>
                                        </div>

                                        <div class="card-body">
                                            <table class="custom-table">

                                                <thead>
                                                    <tr>
                                                        <th scope="col">Country </th>
                                                        <th scope="col">Instruments</th>
                                                        <th scope="col">Attach/Upload Pdf</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($case->fortynine as $fortynine)
                                                    <tr>
                                                        <th>
                                                            @if($fortynine->government_agreements_transparent_country_q49 == 1)
                                                            India
                                                            @elseif ($fortynine->government_agreements_transparent_country_q49 == 2)
                                                            Nepal
                                                            @elseif ($fortynine->government_agreements_transparent_country_q49 == 3)
                                                            Sri lanka
                                                            @elseif ($fortynine->government_agreements_transparent_country_q49 == 4)
                                                            EU
                                                            @elseif ($fortynine->government_agreements_transparent_country_q49 == 5)
                                                            USA
                                                            @elseif ($fortynine->government_agreements_transparent_country_q49 == 6)
                                                            Saudi Arabia
                                                            @elseif ($fortynine->government_agreements_transparent_country_q49 == 7)
                                                            Qatar
                                                            @elseif ($fortynine->government_agreements_transparent_country_q49 == 8)
                                                            Lebanon
                                                            @elseif ($fortynine->government_agreements_transparent_country_q49 == 9)
                                                            Irag
                                                            @elseif ($fortynine->government_agreements_transparent_country_q49 == 10)
                                                            UAE
                                                            @elseif ($fortynine->government_agreements_transparent_country_q49 == 11)
                                                            Thailand
                                                            @elseif ($fortynine->government_agreements_transparent_country_q49 == 12)
                                                            Vietnam
                                                            @elseif ($fortynine->government_agreements_transparent_country_q49 == 13)
                                                            Cambodia
                                                            @elseif ($fortynine->government_agreements_transparent_country_q49 == 14)
                                                            South Africa
                                                            @elseif ($fortynine->government_agreements_transparent_country_q49 == 15)
                                                            Brazil
                                                            @elseif ($fortynine->government_agreements_transparent_country_q49 == 16)
                                                            UK

                                                            @else
                                                            {{$fortynine->government_agreements_transparent_country_q49}}
                                                            @endif
                                                        </th>
                                                        <td>
                                                            @if($fortynine->government_agreements_transparent_status_q49 == 1)
                                                            Bil-lateral Agreement
                                                            @elseif ($fortynine->government_agreements_transparent_status_q49 == 2)
                                                            SOP
                                                            @elseif ($fortynine->government_agreements_transparent_status_q49 == 3)
                                                            Mutual Legal Arrangement
                                                            @elseif ($fortynine->government_agreements_transparent_status_q49 == 4)
                                                            MoU
                                                            @elseif ($fortynine->government_agreements_transparent_status_q49 == 5)
                                                            Trade Treaty
                                                            @elseif ($fortynine->government_agreements_transparent_status_q49 == 6)
                                                            G to G Agreement
                                                            @endif

                                                        </td>
                                                        <td>
                                                            @if(!empty($fortynine->document_upload_q49))
                                                            <a href="{{ asset($fortynine->document_upload_q49) }}" target="_blank">View</a>
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
                                @if(Auth::user()->can('50.question'))
                                <?php
                                if (($questiontitles[49]->status ?? null) == 1) {
                                ?>


                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5>
                                                50.{{ $questiontitles[49]->title }}
                                            </h5>
                                        </div>

                                        <div class="card-body">
                                            <table class="custom-table">

                                                <thead>
                                                    <tr>
                                                        <th scope="col">Action </th>
                                                        <th scope="col">Attach/Upload Pdf</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($case->fifty as $fifty)
                                                    <tr>
                                                        <th>
                                                            @if($fifty->exploitative_treatment_title_q50 == 1)
                                                            Strict Monitoring of impacts of policies
                                                            @elseif ($fifty->exploitative_treatment_title_q50 == 2)
                                                            Promotion of safe migration
                                                            @elseif ($fifty->exploitative_treatment_title_q50 == 3)
                                                            Awareness raising of vulnerable groups
                                                            @elseif ($fifty->exploitative_treatment_title_q50 == 4)
                                                            Expansion of safety-net for vulnerable groups
                                                            @elseif ($fifty->exploitative_treatment_title_q50 == 5)
                                                            Promotion of skilling among vulnerable groups
                                                            @else
                                                            {{$fifty->exploitative_treatment_title_q50}}
                                                            @endif
                                                        </th>


                                                        <td>
                                                            @if(!empty($fifty->document_upload_q50))
                                                            <a href="{{ asset($fifty->document_upload_q50) }}" target="_blank">View</a>
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
                                @if(Auth::user()->can('51.question'))
                                <?php
                                if (($questiontitles[50]->status ?? null) == 1) {
                                ?>


                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5>
                                                51.{{ $questiontitles[50]->title }}
                                            </h5>
                                        </div>

                                        <div class="card-body">
                                            <table class="custom-table">

                                                <thead>
                                                    <tr>
                                                        <th scope="col">Action </th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Attach/Upload Pdf</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($case->fiftyone as $fiftyone)
                                                    <tr>
                                                        <th>
                                                            @if($fiftyone->commercial_title_q51 == 1)
                                                            Awareness raising on forced prostitution and trafficking among citizens
                                                            @elseif ($fiftyone->commercial_title_q51 == 2)
                                                            Awareness raising on legal measures against sexual exploitation of trafficked individuals
                                                            @elseif ($fiftyone->commercial_title_q51 == 3)
                                                            Legal actions against foreign podophiles/sex-tourists (clients on underaged girls/VoTs)
                                                            @else
                                                            {{$fiftyone->commercial_title_q51}}
                                                            @endif
                                                        </th>
                                                        <td>
                                                            @if($fiftyone->commercial_status_q51 == 1)
                                                            Enforced
                                                            @elseif ($fiftyone->commercial_status_q51 == 2)
                                                            Updated and enforced
                                                            @elseif ($fiftyone->commercial_status_q51 == 3)
                                                            Stricter enforcement
                                                            @elseif ($fiftyone->commercial_status_q51 == 4)
                                                            Increases efforts
                                                            @endif

                                                        </td>
                                                        <td>
                                                            @if(!empty($fiftyone->document_upload_q51))
                                                            <a href="{{ asset($fiftyone->document_upload_q51) }}" target="_blank">View</a>
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
                                @if(Auth::user()->can('52.question'))
                                <?php
                                if (($questiontitles[51]->status ?? null) == 1) {
                                ?>


                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5>
                                                52.{{ $questiontitles[51]->title }}
                                            </h5>
                                        </div>

                                        <div class="card-body">
                                            <table class="custom-table">

                                                <thead>
                                                    <tr>
                                                        <th scope="col">Action </th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Attach/Upload Pdf</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($case->fiftytwo as $fiftytwo)
                                                    <tr>
                                                        <th>
                                                            @if($fiftytwo->prosecute_title_q52 == 1)
                                                            Awareness raising on forced prostitution and trafficking among citizens
                                                            @elseif ($fiftytwo->prosecute_title_q52 == 2)
                                                            Awareness raising on legal measures against sexual exploitation of trafficked individuals
                                                            @elseif ($fiftytwo->prosecute_title_q52 == 3)
                                                            Legal actions against foreign podophiles/sex-tourists (clients on underaged girls/VoTs)
                                                            @else
                                                            {{$fiftytwo->prosecute_title_q52}}
                                                            @endif
                                                        </th>
                                                        <td>
                                                            @if($fiftytwo->prosecute_status_q52 == 1)
                                                            Enforced
                                                            @elseif ($fiftytwo->prosecute_status_q52 == 2)
                                                            Updated and enforced
                                                            @elseif ($fiftytwo->prosecute_status_q52 == 3)
                                                            Stricter enforcement
                                                            @elseif ($fiftytwo->prosecute_status_q52 == 4)
                                                            Increases efforts
                                                            @endif

                                                        </td>
                                                        <td>
                                                            @if(!empty($fiftytwo->document_upload_q52))
                                                            <a href="{{ asset($fiftytwo->document_upload_q52) }}" target="_blank">View</a>
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
                                @if(Auth::user()->can('53.question'))
                                <?php
                                if (($questiontitles[52]->status ?? null) == 1) {
                                ?>


                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5>
                                                53.{{ $questiontitles[52]->title }}
                                            </h5>
                                        </div>

                                        <div class="card-body">
                                            <table class="custom-table">

                                                <thead>
                                                    <tr>
                                                        <th rowspan="2">Category of Trainee</th>
                                                        <th colspan="4">Coverage of Training</th>


                                                    </tr>
                                                    <tr>
                                                        <th>Men</th>
                                                        <th>Women</th>
                                                        <th>TG</th>
                                                        <th>Total</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $menTotal = 0;
                                                    $womenTotal = 0;
                                                    $thirdTotal = 0;
                                                    $Total = 0;

                                                    @endphp
                                                    @foreach($case->fiftythree as $fiftythree)
                                                    <tr>
                                                        <th>
                                                            @if($fiftythree->government_title_q53 == 1)
                                                            Diplomats in foreign missions
                                                            @elseif ($fiftythree->government_title_q53 == 2)
                                                            Labour Attaches
                                                            @elseif ($fiftythree->government_title_q53 == 3)
                                                            MoFA officials within the country
                                                            @else
                                                            {{$fiftythree->government_title_q53}}
                                                            @endif
                                                        </th>
                                                        <td>{{$fiftythree->government_men_q53}}</td>
                                                        <td>{{$fiftythree->government_women_q53}}</td>
                                                        <td>{{$fiftythree->government_tg_q53}}</td>
                                                        <td>{{$fiftythree->government_total_q53}}</td>


                                                    </tr>
                                                    @php
                                                    $menTotal += $fiftythree->government_men_q53;
                                                    $womenTotal += $fiftythree->government_women_q53;
                                                    $thirdTotal += $fiftythree->government_tg_q53;
                                                    $Total += $fiftythree->government_total_q53;
                                                    @endphp
                                                    @endforeach
                                                    <tr style="font-weight:bold; background:#f1f1f1;">
                                                        <td>Total</td>
                                                        <td>{{ $menTotal }}</td>
                                                        <td>{{ $womenTotal }}</td>
                                                        <td>{{ $thirdTotal }}</td>
                                                        <td>{{ $Total }}</td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php } ?>
                                @endif
                                @if(Auth::user()->can('54.question'))
                                <?php
                                if (($questiontitles[53]->status ?? null) == 1) {
                                ?>


                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5>
                                                54.{{ $questiontitles[53]->title }}
                                            </h5>
                                        </div>

                                        <div class="card-body">
                                            <table class="custom-table">

                                                <thead>
                                                    <tr>
                                                        <th rowspan="2">Country where posted</th>
                                                        <th rowspan="2">Description</th>
                                                        <th colspan="4">Coverage of Training</th>

                                                    </tr>
                                                    <tr>
                                                        <th>Men</th>
                                                        <th>Women</th>
                                                        <th>TG</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $menTotal = 0;
                                                    $womenTotal = 0;
                                                    $thirdTotal = 0;
                                                    $Total = 0;

                                                    @endphp
                                                    @foreach($case->fiftyfour as $fiftyfour)
                                                    <tr>
                                                        <th>
                                                            @if($fiftyfour->country_diplomat_name_q54 == 1)
                                                            India
                                                            @elseif ($fiftyfour->country_diplomat_name_q54 == 2)
                                                            Nepal
                                                            @elseif ($fiftyfour->country_diplomat_name_q54 == 3)
                                                            Sri lanka
                                                            @elseif ($fiftyfour->country_diplomat_name_q54 == 4)
                                                            EU
                                                            @elseif ($fiftyfour->country_diplomat_name_q54 == 5)
                                                            USA
                                                            @elseif ($fiftyfour->country_diplomat_name_q54 == 6)
                                                            Saudi Arabia
                                                            @elseif ($fiftyfour->country_diplomat_name_q54 == 7)
                                                            Qatar
                                                            @elseif ($fiftyfour->country_diplomat_name_q54 == 8)
                                                            Lebanon
                                                            @elseif ($fiftyfour->country_diplomat_name_q54 == 9)
                                                            Irag
                                                            @elseif ($fiftyfour->country_diplomat_name_q54 == 10)
                                                            UAE
                                                            @elseif ($fiftyfour->country_diplomat_name_q54 == 11)
                                                            Thailand
                                                            @elseif ($fiftyfour->country_diplomat_name_q54 == 12)
                                                            Vietnam
                                                            @elseif ($fiftyfour->country_diplomat_name_q54 == 13)
                                                            Cambodia
                                                            @elseif ($fiftyfour->country_diplomat_name_q54 == 14)
                                                            South Africa
                                                            @elseif ($fiftyfour->country_diplomat_name_q54 == 15)
                                                            Brazil
                                                            @elseif ($fiftyfour->country_diplomat_name_q54 == 16)
                                                            UK

                                                            @else
                                                            {{$fiftyfour->country_diplomat_name_q54}}
                                                            @endif
                                                        </th>
                                                        <td>{{$fiftyfour->country_diplomat_description_q54}}</td>
                                                        <td>{{$fiftyfour->country_diplomat_men_q54}}</td>
                                                        <td>{{$fiftyfour->country_diplomat_women_q54}}</td>
                                                        <td>{{$fiftyfour->country_diplomat_tg_q54}}</td>
                                                        <td>{{$fiftyfour->country_diplomat_total_q54}}</td>


                                                    </tr>
                                                    @php
                                                    $menTotal += $fiftyfour->country_diplomat_men_q54;
                                                    $womenTotal += $fiftyfour->country_diplomat_women_q54;
                                                    $thirdTotal += $fiftyfour->country_diplomat_tg_q54;
                                                    $Total += $fiftyfour->country_diplomat_total_q54;
                                                    @endphp
                                                    @endforeach
                                                    <tr style="font-weight:bold; background:#f1f1f1;">
                                                        <td colspan="2">Total</td>
                                                        <td>{{ $menTotal }}</td>
                                                        <td>{{ $womenTotal }}</td>
                                                        <td>{{ $thirdTotal }}</td>
                                                        <td>{{ $Total }}</td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php } ?>
                                @endif
                                @if(Auth::user()->can('55.question'))
                                <?php
                                if (($questiontitles[54]->status ?? null) == 1) {
                                ?>


                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5>
                                                55.{{ $questiontitles[54]->title }}
                                            </h5>
                                        </div>

                                        <div class="card-body">
                                            <table class="custom-table">

                                                <thead>
                                                    <tr>
                                                        <th rowspan="2">Country where posted</th>
                                                        <th rowspan="2">Description</th>
                                                        <th colspan="4">Coverage of Training</th>

                                                    </tr>
                                                    <tr>
                                                        <th>Men</th>
                                                        <th>Women</th>
                                                        <th>TG</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $menTotal = 0;
                                                    $womenTotal = 0;
                                                    $thirdTotal = 0;
                                                    $Total = 0;

                                                    @endphp
                                                    @foreach($case->fiftyfive as $fiftyfive)
                                                    <tr>
                                                        <th>
                                                            @if($fiftyfive->government_provide_name_q55 == 1)
                                                            India
                                                            @elseif ($fiftyfive->government_provide_name_q55 == 2)
                                                            Nepal
                                                            @elseif ($fiftyfive->government_provide_name_q55 == 3)
                                                            Sri lanka
                                                            @elseif ($fiftyfive->government_provide_name_q55 == 4)
                                                            EU
                                                            @elseif ($fiftyfive->government_provide_name_q55 == 5)
                                                            USA
                                                            @elseif ($fiftyfive->government_provide_name_q55 == 6)
                                                            Saudi Arabia
                                                            @elseif ($fiftyfive->government_provide_name_q55 == 7)
                                                            Qatar
                                                            @elseif ($fiftyfive->government_provide_name_q55 == 8)
                                                            Lebanon
                                                            @elseif ($fiftyfive->government_provide_name_q55 == 9)
                                                            Irag
                                                            @elseif ($fiftyfive->government_provide_name_q55 == 10)
                                                            UAE
                                                            @elseif ($fiftyfive->government_provide_name_q55 == 11)
                                                            Thailand
                                                            @elseif ($fiftyfive->government_provide_name_q55 == 12)
                                                            Vietnam
                                                            @elseif ($fiftyfive->government_provide_name_q55 == 13)
                                                            Cambodia
                                                            @elseif ($fiftyfive->government_provide_name_q55 == 14)
                                                            South Africa
                                                            @elseif ($fiftyfive->government_provide_name_q55 == 15)
                                                            Brazil
                                                            @elseif ($fiftyfive->government_provide_name_q55 == 16)
                                                            UK

                                                            @else
                                                            {{$fiftyfive->government_provide_name_q55}}
                                                            @endif
                                                        </th>
                                                        <td>{{$fiftyfive->government_provide_description_q55}}</td>
                                                        <td>{{$fiftyfive->government_provide_men_q55}}</td>
                                                        <td>{{$fiftyfive->government_provide_women_q55}}</td>
                                                        <td>{{$fiftyfive->government_provide_tg_q55}}</td>
                                                        <td>{{$fiftyfive->government_provide_total_q55}}</td>


                                                    </tr>
                                                    @php
                                                    $menTotal += $fiftyfive->government_provide_men_q55;
                                                    $womenTotal += $fiftyfive->government_provide_women_q55;
                                                    $thirdTotal += $fiftyfive->government_provide_tg_q55;
                                                    $Total += $fiftyfive->government_provide_total_q55;
                                                    @endphp
                                                    @endforeach
                                                    <tr style="font-weight:bold; background:#f1f1f1;">
                                                        <td colspan="2">Total</td>
                                                        <td>{{ $menTotal }}</td>
                                                        <td>{{ $womenTotal }}</td>
                                                        <td>{{ $thirdTotal }}</td>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>