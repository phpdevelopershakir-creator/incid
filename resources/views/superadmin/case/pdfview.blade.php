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
                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            1. {{ $questiontitles[0]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        @if(isset($case->yes_no_other) && $case->yes_no_other->is_supreme_court_q1 == 1)
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif; margin-bottom: 25px;">
                                            <thead>
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 45%;">
                                                        Title of The New Law</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 35%;">
                                                        Contents of Change/Status</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 20%;">
                                                        Attach/Upload Pdf</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->one as $one)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
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
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        @if($one->supreme_court_status == 1)
                                                        Revised
                                                        @elseif ($one->supreme_court_status == 2)
                                                        Abolished
                                                        @endif
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
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

                                        <div class="section-title"
                                            style="font-size: 16px; font-weight: bold; color: #000; margin: 20px 0 10px 0; font-family: sans-serif; padding-left: 2px;">
                                            New Law
                                        </div>

                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif;">
                                            <thead>
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 45%;">
                                                        Title of The New Law</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 35%;">
                                                        Contents of Change/Status</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 20%;">
                                                        Attach/Upload Pdf</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->oneb as $oneb)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{$oneb->supreme_court_title_two}}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
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
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
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
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->others_supreme_court_q1))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->others_supreme_court_q1 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif

                                    </div>
                                </div>

                                <?php } ?>
                                @endif

                                @if(Auth::user()->can('2.question'))
                                <?php
                                if (($questiontitles[1]->status ?? null) == 1) {
                                ?>

                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            2. {{ $questiontitles[1]->title ?? 'Question 2' }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        @if(isset($case->yes_no_other) &&
                                        $case->yes_no_other->is_government_transparent_q2 == 1)
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif;">
                                            <thead>
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 35%;">
                                                        Nationality</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 45%;">
                                                        Sector</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 20%;">
                                                        Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $grandTotal = 0;

                                                // Array Mapping for Nationality
                                                $nationalityMap = [
                                                1 => 'Chinese National',
                                                2 => 'Cuban national',
                                                3 => 'North Korean National'
                                                ];

                                                // Array Mapping for Sectors
                                                $sectorMap = [
                                                1 => 'Belt and Road Initiative',
                                                2 => 'Medical workers',
                                                3 => 'Athletes',
                                                4 => 'Coaches',
                                                5 => 'Artist',
                                                6 => 'Teachers',
                                                7 => 'Engineers',
                                                8 => 'Sea Merchants',
                                                9 => 'Government to Government Work',
                                                10 => 'Private Sector',
                                                11 => 'Others',
                                                12 => 'N/A'
                                                ];
                                                @endphp

                                                @foreach($case->two as $two)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{ $nationalityMap[$two->government_nationality_q2] ?? $two->government_nationality_q2 }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{ $sectorMap[$two->government_sector_q2] ?? $two->government_sector_q2 }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-weight: bold;">
                                                        {{ $two->government_total_q2 }}
                                                    </td>
                                                </tr>

                                                @php
                                                $grandTotal += $two->government_total_q2;
                                                @endphp
                                                @endforeach

                                                <tr
                                                    style="font-weight: bold; background-color: #f2f2f2; color: #000; font-size: 14px;">
                                                    <td colspan="2"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left;">
                                                        Total</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $grandTotal }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->other_government_transparent_q2))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->other_government_transparent_q2 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <?php } ?>
                                @endif


                                @if(Auth::user()->can('4.question'))
                                <?php
                                if (($questiontitles[3]->status ?? null) == 1) {
                                ?>

                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <!-- Question Header: Full width blue bar -->
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            4. {{ $questiontitles[3]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        @if(isset($case->yes_no_other) && $case->yes_no_other->is_supreme_court_q4 == 1)
                                        <!-- First Table -->
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif; margin-bottom: 25px;">
                                            <thead>
                                                <!-- Row: Pink Header -->
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 45%;">
                                                        Title of The New Law</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 35%;">
                                                        Contents of Change/Status</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 20%;">
                                                        Attach/Upload Pdf</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->fourb as $fourb)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-weight: normal;">
                                                        {{$fourb->supreme_court_title_two_q4}}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
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
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        @if(!empty($fourb->supreme_court_image_two_q4))
                                                        <a href="{{ asset($fourb->supreme_court_image_two_q4) }}"
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

                                        <!-- Sub Title inside Card Body -->
                                        <div class="section-title"
                                            style="font-size: 16px; font-weight: bold; color: #000; margin: 20px 0 10px 0; font-family: sans-serif; padding-left: 2px;">
                                            New Law
                                        </div>

                                        <!-- Second Table -->
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif;">
                                            <thead>
                                                <!-- Row: Pink Header -->
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 45%;">
                                                        Title of The New Law</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 35%;">
                                                        Contents of Change/Status</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 20%;">
                                                        Attach/Upload Pdf</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->fourb as $fourb)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-weight: normal;">
                                                        {{$fourb->supreme_court_title_two_q4}}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
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
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        @if(!empty($fourb->supreme_court_image_two_q4))
                                                        <a href="{{ asset($fourb->supreme_court_image_two_q4) }}"
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
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->others_supreme_court_q4))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->others_supreme_court_q4 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                                <?php } ?>
                                @endif


                                @if(Auth::user()->can('5.question'))
                                <?php
                                if (($questiontitles[4]->status ?? null) == 1) {
                                ?>

                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            5. {{ $questiontitles[4]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        @if(isset($case->yes_no_other) && $case->yes_no_other->is_complicit_official_q5
                                        == 1)
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif;">
                                            <thead>
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px;">
                                                        Title Description
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->five as $five)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{ $five->involved_directly_trafficking_title_q5 }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->others_complicit_official_q5))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->others_complicit_official_q5 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <?php } ?>
                                @endif


                                @if(Auth::user()->can('6.question'))
                                <?php
                                if (($questiontitles[5]->status ?? null) == 1) {
                                ?>


                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <!-- Question Header: Full width blue bar -->
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            6. {{ $questiontitles[5]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        <!-- Table: Added width 100% -->
                                        @if(isset($case->yes_no_other) && $case->yes_no_other->is_unit_court_q6 == 1)
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif;">

                                            <thead>
                                                <!-- Row 1: Pink Header -->
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th rowspan="2"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 35%; vertical-align: middle;">
                                                        Ministry/Department
                                                    </th>
                                                    <th colspan="3"
                                                        style="border: 1.5px solid #000; padding: 6px; text-align: center; font-size: 14px;">
                                                        Number of Official Accused
                                                    </th>
                                                    <th rowspan="2"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 35%; vertical-align: middle;">
                                                        Result of which Policy/Law/Response
                                                    </th>
                                                </tr>
                                                <!-- Row 2: Pink Sub-header -->
                                                <tr
                                                    style="background-color: #f8cbad; color: #000; font-weight: bold; text-align: center;">
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 6px; font-size: 14px; width: 10%;">
                                                        Men</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 6px; font-size: 14px; width: 10%;">
                                                        Women</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 6px; font-size: 14px; width: 10%;">
                                                        Total</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @php
                                                $menTotal = 0;
                                                $womenTotal = 0;
                                                $Total = 0;
                                                @endphp

                                                @foreach($case->six as $six)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{ $six->labor_title_q6 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $six->labor_men_q6 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $six->labor_women_q6 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $six->labor_total_q6 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{ $six->labor_response_q6 }}
                                                    </td>
                                                </tr>
                                                @php
                                                $menTotal += $six->labor_men_q6;
                                                $womenTotal += $six->labor_women_q6;
                                                $Total += $six->labor_total_q6;
                                                @endphp
                                                @endforeach

                                                <!-- Total Row -->
                                                <tr
                                                    style="font-weight: bold; font-size: 14px; color: #000; background-color: #ffffff;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        Total</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $menTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $womenTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $Total }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; background-color: #ffffff;">
                                                    </td>
                                                </tr>
                                            </tbody>

                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->others_unit_court_q6))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->others_unit_court_q6 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <?php } ?>
                                @endif
                                @if(Auth::user()->can('7.question'))
                                <?php
                                if (($questiontitles[6]->status ?? null) == 1) {
                                ?>


                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <!-- Question Header: Full width blue bar -->
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            7. {{ $questiontitles[6]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        <!-- Table: Added width 100% -->
                                        @if(isset($case->yes_no_other) &&
                                        $case->yes_no_other->is_exclusively_dedicated_trafficking_q7 == 1)
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif;">

                                            <thead>
                                                <!-- Row 1: Pink Header -->
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th rowspan="2"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 55%;">
                                                        Ministry/Department Municipality body
                                                    </th>
                                                    <th colspan="3"
                                                        style="border: 1.5px solid #000; padding: 6px; text-align: center; font-size: 14px;">
                                                        Number of Official Accused
                                                    </th>
                                                </tr>
                                                <!-- Row 2: Pink Sub-header -->
                                                <tr
                                                    style="background-color: #f8cbad; color: #000; font-weight: bold; text-align: center;">
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 6px; font-size: 14px; width: 15%;">
                                                        Men</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 6px; font-size: 14px; width: 15%;">
                                                        Women</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 6px; font-size: 14px; width: 15%;">
                                                        Total</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @php
                                                $menTotal = 0;
                                                $womenTotal = 0;
                                                $Total = 0;
                                                @endphp

                                                @foreach($case->seven as $seven)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{ $seven->justice_title_q7 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $seven->justice_men_q7 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $seven->justice_women_q7 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $seven->justice_total_q7 }}
                                                    </td>
                                                </tr>
                                                @php
                                                $menTotal += $seven->justice_men_q7;
                                                $womenTotal += $seven->justice_women_q7;
                                                $Total += $seven->justice_total_q7;
                                                @endphp
                                                @endforeach

                                                <!-- Total Row -->
                                                <tr
                                                    style="font-weight: bold; font-size: 14px; color: #000; background-color: #ffffff;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        Total</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $menTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $womenTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $Total }}</td>
                                                </tr>
                                            </tbody>

                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->other_exclusively_dedicated_trafficking_q7))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->other_exclusively_dedicated_trafficking_q7 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <?php } ?>
                                @endif

                                @if(Auth::user()->can('8.question'))
                                <?php
                                if (($questiontitles[7]->status ?? null) == 1) {
                                ?>

                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <!-- Question Header: Full width blue bar -->
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            8. {{ $questiontitles[7]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        <!-- Table: Width 100% and balanced columns -->
                                        @if(isset($case->yes_no_other) &&
                                        $case->yes_no_other->is_involved_directly_trafficking_8q == 1)
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif;">

                                            <thead>
                                                <!-- Row 1: Pink Header -->
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th rowspan="2"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 40%; vertical-align: middle;">
                                                        Ministry/Department Municipality body
                                                    </th>
                                                    <!-- Changed colspan to 4 to match the 4 sub-headers -->
                                                    <th colspan="4"
                                                        style="border: 1.5px solid #000; padding: 6px; text-align: center; font-size: 14px;">
                                                        Measures Taken
                                                    </th>
                                                </tr>
                                                <!-- Row 2: Pink Sub-header -->
                                                <tr
                                                    style="background-color: #f8cbad; color: #000; font-weight: bold; text-align: center; vertical-align: middle;">
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 6px; font-size: 13px; width: 15%;">
                                                        Investigation (number)
                                                    </th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 6px; font-size: 13px; width: 15%;">
                                                        Prosecution (number)
                                                    </th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 6px; font-size: 13px; width: 15%;">
                                                        Conviction or Sentencing (number)
                                                    </th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 6px; font-size: 13px; width: 15%;">
                                                        Administrative Measures (number)
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @php
                                                $menTotal = 0;
                                                $womenTotal = 0;
                                                $thirdTotal = 0;
                                                $Total = 0;
                                                @endphp

                                                @foreach($case->eight as $eight)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{ $eight->official_title_q8 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $eight->official_investigation_q8 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $eight->official_prosecution_q8 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $eight->official_conviction_q8 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $eight->official_administrative_q8 }}
                                                    </td>
                                                </tr>
                                                @php
                                                $menTotal += $eight->official_investigation_q8;
                                                $womenTotal += $eight->official_prosecution_q8;
                                                $thirdTotal += $eight->official_conviction_q8;
                                                $Total += $eight->official_administrative_q8;
                                                @endphp
                                                @endforeach

                                                <!-- Total Row -->
                                                <tr
                                                    style="font-weight: bold; font-size: 14px; color: #000; background-color: #ffffff;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        Total
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $menTotal }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $womenTotal }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $thirdTotal }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $Total }}
                                                    </td>
                                                </tr>
                                            </tbody>

                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->other_involved_directly_trafficking_8q))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->other_involved_directly_trafficking_8q }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <?php } ?>
                                @endif

                                @if(Auth::user()->can('9.question'))
                                <?php
                                if (($questiontitles[8]->status ?? null) == 1) {
                                ?>
                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            9. {{ $questiontitles[8]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        @if(isset($case->yes_no_other) &&
                                        $case->yes_no_other->is_exclusively_trafficking_q9 == 1)
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif;">
                                            <thead>
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 40%;">
                                                        Court Title / Question</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 20%;">
                                                        Status (Yes/No)</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 40%;">
                                                        Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->nine as $nine)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{ $nine->court_title_q9 }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $nine->court_type_q9 == 1 ? 'Yes' : 'No' }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        @if($nine->court_type_q9 == 1)
                                                        {{ $nine->court_description_q9 }}
                                                        @else
                                                        -
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->other_exclusively_trafficking_q9))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->other_exclusively_trafficking_q9 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <?php } ?>
                                @endif



                                @if(Auth::user()->can('10.question'))
                                <?php
                                if (($questiontitles[9]->status ?? null) == 1) {
                                ?>
                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            10. {{ $questiontitles[9]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        @if(isset($case->yes_no_other) &&
                                        $case->yes_no_other->is_exclusively_trafficking_q10 == 1)
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif;">
                                            <thead>
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 40%;">
                                                        Court Title / Question</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 20%;">
                                                        Status (Yes/No)</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 40%;">
                                                        Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->ten as $ten)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{ $ten->court_title_q10 }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $ten->court_type_q10 == 1 ? 'Yes' : 'No' }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        @if($ten->court_type_q10 == 1)
                                                        {{ $ten->court_description_q10 }}
                                                        @else
                                                        -
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->other_exclusively_trafficking_q10))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->other_exclusively_trafficking_q10 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <?php } ?>
                                @endif
                                @if(Auth::user()->can('11.question'))
                                <?php
                                if (($questiontitles[10]->status ?? null) == 1) {
                                ?>

                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            11. {{ $questiontitles[10]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        @if(isset($case->yes_no_other) &&
                                        $case->yes_no_other->is_government_agreements_transparent_q11 == 1)
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif;">
                                            <thead>
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 30%;">
                                                        Country</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 50%;">
                                                        Target group of Training (multiple response)</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 20%;">
                                                        Total coverage</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->eleven as $eleven)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        @if($eleven->government_agreements_transparent_country_q11 == 1)
                                                        India
                                                        @elseif ($eleven->government_agreements_transparent_country_q11
                                                        == 2)
                                                        Nepal
                                                        @elseif ($eleven->government_agreements_transparent_country_q11
                                                        == 3)
                                                        Sri Lanka
                                                        @elseif ($eleven->government_agreements_transparent_country_q11
                                                        == 4)
                                                        EU
                                                        @elseif ($eleven->government_agreements_transparent_country_q11
                                                        == 5)
                                                        USA
                                                        @elseif ($eleven->government_agreements_transparent_country_q11
                                                        == 6)
                                                        Saudi Arabia
                                                        @elseif ($eleven->government_agreements_transparent_country_q11
                                                        == 7)
                                                        Qatar
                                                        @elseif ($eleven->government_agreements_transparent_country_q11
                                                        == 8)
                                                        Lebanon
                                                        @elseif ($eleven->government_agreements_transparent_country_q11
                                                        == 9)
                                                        Iraq
                                                        @elseif ($eleven->government_agreements_transparent_country_q11
                                                        == 10)
                                                        UAE
                                                        @elseif ($eleven->government_agreements_transparent_country_q11
                                                        == 11)
                                                        Thailand
                                                        @elseif ($eleven->government_agreements_transparent_country_q11
                                                        == 12)
                                                        Vietnam
                                                        @elseif ($eleven->government_agreements_transparent_country_q11
                                                        == 13)
                                                        Cambodia
                                                        @elseif ($eleven->government_agreements_transparent_country_q11
                                                        == 14)
                                                        South Africa
                                                        @elseif ($eleven->government_agreements_transparent_country_q11
                                                        == 15)
                                                        Brazil
                                                        @elseif ($eleven->government_agreements_transparent_country_q11
                                                        == 16)
                                                        UK
                                                        @else
                                                        {{ $eleven->government_agreements_transparent_country_q11 }}
                                                        @endif
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        @if($eleven->government_agreements_transparent_status_q11 == 1)
                                                        Government Official
                                                        @elseif ($eleven->government_agreements_transparent_status_q11
                                                        == 2)
                                                        Immigration authority
                                                        @elseif ($eleven->government_agreements_transparent_status_q11
                                                        == 3)
                                                        Law Enforcing Personnel
                                                        @elseif ($eleven->government_agreements_transparent_status_q11
                                                        == 4)
                                                        Border Control Force
                                                        @elseif ($eleven->government_agreements_transparent_status_q11
                                                        == 5)
                                                        Judiciary
                                                        @elseif ($eleven->government_agreements_transparent_status_q11
                                                        == 6)
                                                        Diplomat
                                                        @endif
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $eleven->government_agreements_transparent_total_q11 }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->other_government_agreements_transparent_q11))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->other_government_agreements_transparent_q11 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <?php } ?>
                                @endif


                                @if(Auth::user()->can('12.question'))
                                <?php
                                if (($questiontitles[11]->status ?? null) == 1) {
                                ?>
                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            12. {{ $questiontitles[11]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        @if(isset($case->yes_no_other) &&
                                        $case->yes_no_other->is_government_cooperate_foreign_counterparts_q12 ==
                                        1)

                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif; margin-bottom: 25px;">
                                            <h4>A.new investigations</h4>
                                            <thead>
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 40%;">
                                                        Country/Region/International Law Enforcement Organization</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Sex Trafficking</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Labour Trafficking</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Other/Unspecific Trafficking</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->twelve as $twelve)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{ $twelve->government_cooperate_foreign_counterparts_country_q12 }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $twelve->government_cooperate_foreign_counterparts_sex_trafficking_q12 }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $twelve->government_cooperate_foreign_counterparts_labour_trafficking_q12 }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $twelve->government_cooperate_foreign_counterparts_other_trafficking_q12 }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-weight: bold;">
                                                        {{ $twelve->government_cooperate_foreign_counterparts_total_trafficking_q12 }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif; margin-bottom: 25px;">
                                            <h4>B.new investigations</h4>
                                            <thead>
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 40%;">
                                                        Country/Region/International Law Enforcement Organization</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Sex Trafficking</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Labour Trafficking</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Other/Unspecific Trafficking</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->twelveb as $twelveb)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{ $twelveb->government_country_q12b }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $twelveb->government_sex_trafficking_q12b }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $twelveb->government_labour_trafficking_q12b }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $twelveb->government_other_trafficking_q12b }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-weight: bold;">
                                                        {{ $twelveb->government_total_trafficking_q12b }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif; margin-bottom: 25px;">
                                            <h4>C.new investigations</h4>
                                            <thead>
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 40%;">
                                                        Country/Region/International Law Enforcement Organization</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Sex Trafficking</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Labour Trafficking</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Other/Unspecific Trafficking</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->twelvec as $twelvec)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{ $twelvec->government_country_q12c }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $twelvec->government_sex_trafficking_q12c }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $twelvec->government_labour_trafficking_q12c }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $twelvec->government_other_trafficking_q12c }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-weight: bold;">
                                                        {{ $twelvec->government_total_trafficking_q12c }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif; margin-bottom: 25px;">
                                            <h4>D.new investigations</h4>
                                            <thead>
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 40%;">
                                                        Country/Region/International Law Enforcement Organization</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Sex Trafficking</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Labour Trafficking</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Other/Unspecific Trafficking</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->twelved as $twelved)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{ $twelved->government_country_q12d }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $twelved->government_sex_trafficking_q12d }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $twelved->government_labour_trafficking_q12d }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $twelved->government_other_trafficking_q12d }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-weight: bold;">
                                                        {{ $twelved->government_total_trafficking_q12d }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->other_government_cooperate_foreign_counterparts_q12))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->other_government_cooperate_foreign_counterparts_q12 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <?php } ?>
                                @endif

                                @if(Auth::user()->can('13.question'))
                                <?php
                                if (($questiontitles[12]->status ?? null) == 1) {
                                ?>
                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            13. {{ $questiontitles[12]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        @if(isset($case->yes_no_other) &&
                                        $case->yes_no_other->is_government_cooperate_foreign_counterparts_q13 ==
                                        1)

                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif; margin-bottom: 25px;">
                                            <h4>A.new investigations</h4>
                                            <thead>
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 40%;">
                                                        Country/Region/International Law Enforcement Organization</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Sex Trafficking</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Labour Trafficking</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Other/Unspecific Trafficking</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->thirteena as $thirteena)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{ $thirteena->government_country_q13a }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $thirteena->government_sex_q13a }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $thirteena->government_labour_q13a}}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $thirteena->government_other_q13a }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-weight: bold;">
                                                        {{ $thirteena->government_total_q13a }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif; margin-bottom: 25px;">
                                            <h4>B.new investigations</h4>
                                            <thead>
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 40%;">
                                                        Country/Region/International Law Enforcement Organization</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Sex Trafficking</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Labour Trafficking</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Other/Unspecific Trafficking</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->thirteenb as $thirteenb)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{ $thirteenb->government_country_q13b }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $thirteenb->government_sex_q13b }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $thirteenb->government_labour_q13b }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $thirteenb->government_other_q13b }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-weight: bold;">
                                                        {{ $thirteenb->government_total_q13b }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif; margin-bottom: 25px;">
                                            <h4>C.new investigations</h4>
                                            <thead>
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 40%;">
                                                        Country/Region/International Law Enforcement Organization</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Sex Trafficking</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Labour Trafficking</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Other/Unspecific Trafficking</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->thirteenc as $thirteenc)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{ $thirteenc->government_country_q13c }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $thirteenc->government_sex_q13c }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $thirteenc->government_labour_q13c }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $thirteenc->government_other_q13c }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-weight: bold;">
                                                        {{ $thirteenc->government_total_q13c }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif; margin-bottom: 25px;">
                                            <h4>D.new investigations</h4>
                                            <thead>
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 40%;">
                                                        Country/Region/International Law Enforcement Organization</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Sex Trafficking</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Labour Trafficking</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Other/Unspecific Trafficking</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 15%;">
                                                        Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->thirteend as $thirteend)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{ $thirteend->government_country_q12d }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $thirteend->government_sex_q13d }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $thirteend->government_labour_q13d }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $thirteend->government_other_q13d }}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-weight: bold;">
                                                        {{ $thirteend->government_total_q13d }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->other_government_cooperate_foreign_counterparts_q13))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->other_government_cooperate_foreign_counterparts_q13 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <?php } ?>
                                @endif

                                @if(Auth::user()->can('14.question'))
                                <?php
                                if (($questiontitles[13]->status ?? null) == 1) {
                                ?>
                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            14. {{ $questiontitles[13]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        @if(isset($case->yes_no_other) &&
                                        $case->yes_no_other->is_government_devote_implement_q14 == 1)
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif;">
                                            <thead>
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 45%;">
                                                        Main document/ Procedure</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 35%;">
                                                        Description of change/ Status</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 20%;">
                                                        Attach/Upload Summary</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->fourteen as $fourteen)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        @if ($fourteen->original_approach_q14 == 1)
                                                        Victim Identification Guidelines of PSD/MoHA
                                                        @elseif ($fourteen->original_approach_q14 == 2)
                                                        PSHT Act's Rule on VoT identification
                                                        @elseif ($fourteen->original_approach_q14 == 3)
                                                        Victim identification checklist of MoSW
                                                        @elseif ($fourteen->original_approach_q14 == 4)
                                                        VoT identification under NRM of MoHA
                                                        @else
                                                        {{ $fourteen->original_approach_q14 }}
                                                        @endif
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        @if ($fourteen->description_change_q14 == 1)
                                                        Enforced
                                                        @elseif ($fourteen->description_change_q14 == 2)
                                                        Updated and enforced
                                                        @elseif ($fourteen->description_change_q14 == 3)
                                                        Stricter enforcement
                                                        @elseif ($fourteen->description_change_q14 == 4)
                                                        Increases efforts
                                                        @else
                                                        {{ $fourteen->description_change_q14 }}
                                                        @endif
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        @if(!empty($fourteen->document_upload_q14))
                                                        <a href="{{ asset($fourteen->document_upload_q14) }}"
                                                            target="_blank"
                                                            style="color: #0056b3; font-weight: bold; text-decoration: underline;">View</a>
                                                        @else
                                                        <span style="color: #6c757d; font-style: italic;">Not
                                                            Found</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->other_government_devote_implement_q14))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->other_government_devote_implement_q14 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <?php } ?>
                                @endif

                                @if(Auth::user()->can('17.question'))
                                <?php
                                if (($questiontitles[16]->status ?? null) == 1) {
                                ?>
                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <!-- Question Header: Full width blue bar -->
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            17. {{ $questiontitles[16]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        <!-- Table -->
                                        @if(isset($case->yes_no_other) &&
                                        $case->yes_no_other->is_report_country_narrative_protection_q17 == 1)
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif;">
                                            <thead>
                                                <!-- Row 1: Pink Header (Top Level) -->
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th rowspan="2" scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 35%;">
                                                        Title of Original Guideline</th>
                                                    <th rowspan="2" scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 25%;">
                                                        Description of change/Status</th>
                                                    <th colspan="4" scope="colgroup"
                                                        style="border: 1.5px solid #000; padding: 6px; text-align: center; font-size: 14px; width: 40%;">
                                                        VoT referred</th>
                                                </tr>
                                                <!-- Row 2: Pink Header (Sub Level) -->
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 6px; text-align: center; font-size: 13px; width: 10%;">
                                                        Men</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 6px; text-align: center; font-size: 13px; width: 10%;">
                                                        Women</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 6px; text-align: center; font-size: 13px; width: 10%;">
                                                        TG</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 6px; text-align: center; font-size: 13px; width: 10%;">
                                                        Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $menTotal = 0;
                                                $womenTotal = 0;
                                                $thirdTotal = 0;
                                                $Total = 0;

                                                // Array mappings to replace nested @if-@elseif statements safely
                                                $titlesMap = [
                                                1 => 'Referral desk established at women and Child Repression Prevention
                                                Tribunals, Anti-Trafficking Tribunals, and District tribunals',
                                                2 => 'National Referral Mechanism Guideline',
                                                3 => 'National Referral Mechanism SOP',
                                                4 => 'Digital Referral Mechanism of MoHA'
                                                ];

                                                $statusMap = [
                                                1 => 'Enforced',
                                                2 => 'Updated and enforced',
                                                3 => 'Stricter enforcement',
                                                4 => 'Increases efforts'
                                                ];
                                                @endphp

                                                @foreach($case->seventeen as $seventeen)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <!-- Column 1: Title of Guideline (Clean Array Mapping Method) -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{ $titlesMap[$seventeen->report_country_narrative_protection_title_q17] ?? $seventeen->report_country_narrative_protection_title_q17 }}
                                                    </td>

                                                    <!-- Column 2: Status Description (Clean Array Mapping Method) -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{ $statusMap[$seventeen->report_country_narrative_protection_description_q17] ?? $seventeen->report_country_narrative_protection_description_q17 }}
                                                    </td>

                                                    <!-- Columns 3-6: Numeric Breakdown Data -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $seventeen->report_country_narrative_protection_men_q17 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $seventeen->report_country_narrative_protection_women_q17 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $seventeen->report_country_narrative_protection_tg_q17 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-weight: bold;">
                                                        {{ $seventeen->report_country_narrative_protection_total_q17 }}
                                                    </td>
                                                </tr>

                                                @php
                                                $menTotal += $seventeen->report_country_narrative_protection_men_q17;
                                                $womenTotal +=
                                                $seventeen->report_country_narrative_protection_women_q17;
                                                $thirdTotal += $seventeen->report_country_narrative_protection_tg_q17;
                                                $Total += $seventeen->report_country_narrative_protection_total_q17;
                                                @endphp
                                                @endforeach

                                                <!-- Summary Row: Total -->
                                                <tr
                                                    style="font-weight: bold; background-color: #f2f2f2; color: #000; font-size: 14px;">
                                                    <td colspan="2"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left;">
                                                        Total</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $menTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $womenTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $thirdTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; color: #000;">
                                                        {{ $Total }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->other_report_country_narrative_protection_q17))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->other_report_country_narrative_protection_q17 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <?php } ?>
                                @endif

                                @if(Auth::user()->can('20.question'))
                                <?php
                                if (($questiontitles[19]->status ?? null) == 1) {
                                ?>
                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <!-- Question Header: Full width blue bar -->
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            20. {{ $questiontitles[19]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        @if(isset($case->yes_no_other) &&
                                        $case->yes_no_other->is_describe_government_operated_q20 == 1)
                                        <!-- ==================== FIRST TABLE: INTERNAL TRAFFICKING ==================== -->
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif; margin-bottom: 30px;">
                                            <thead>
                                                <!-- Row 1: Pink Header -->
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th rowspan="2" scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 25%; vertical-align: middle;">
                                                        Types of Hotlines</th>
                                                    <th rowspan="2" scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 20%; vertical-align: middle;">
                                                        Hotlines Number</th>
                                                    <th colspan="6" scope="colgroup"
                                                        style="border: 1.5px solid #000; padding: 6px; text-align: center; font-size: 14px; width: 55%;">
                                                        Coverage</th>
                                                </tr>
                                                <!-- Row 2: Pink Sub-Header -->
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 6px; text-align: center; font-size: 13px; width: 9%;">
                                                        Men</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 6px; text-align: center; font-size: 13px; width: 9%;">
                                                        Women</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 6px; text-align: center; font-size: 13px; width: 9%;">
                                                        3rd Gender</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 6px; text-align: center; font-size: 13px; width: 9%;">
                                                        Boy</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 6px; text-align: center; font-size: 13px; width: 9%;">
                                                        Girls</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 6px; text-align: center; font-size: 13px; width: 10%;">
                                                        Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Section Title Row -->
                                                <tr>
                                                    <td colspan="8"
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-weight: bold; background-color: #d9e1f2; color: #000; font-size: 14px;">
                                                        Internal Trafficking
                                                    </td>
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
                                                <tr style="color: #000; font-size: 14px;">
                                                    <!-- Column 1: Hotline Type -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        @if($twentya->internal_traffick_type_of_hotlines_q20 == 1) MoWCA
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
                                                        @else {{ $twentya->internal_traffick_type_of_hotlines_q20 }}
                                                        @endif
                                                    </td>
                                                    <!-- Column 2: Hotline Number -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{ $twentya->internal_hotlines_number_q20 }}
                                                    </td>
                                                    <!-- Numeric Breakdown Columns -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $twentya->internal_traffick_men_q20 }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $twentya->internal_traffick_women_q20 }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $twentya->internal_traffick_third_gender_q20 }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $twentya->internal_traffick_boys_q20 }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $twentya->internal_traffick_girls_q20 }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-weight: bold;">
                                                        {{ $twentya->internal_traffick_total_q20 }}</td>
                                                </tr>
                                                @php
                                                $InternalmenTotal += $twentya->internal_traffick_men_q20;
                                                $InternalwomenTotal += $twentya->internal_traffick_women_q20;
                                                $InternalthirgenderTotal +=
                                                $twentya->internal_traffick_third_gender_q20;
                                                $InternalboyTotal += $twentya->internal_traffick_boys_q20;
                                                $InternalgirlTotal += $twentya->internal_traffick_girls_q20;
                                                $InternalTotal += $twentya->internal_traffick_total_q20;
                                                @endphp
                                                @endforeach

                                                <!-- Summary Row: Total -->
                                                <tr
                                                    style="font-weight: bold; background-color: #f2f2f2; color: #000; font-size: 14px;">
                                                    <td colspan="2"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left;">
                                                        Total</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $InternalmenTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $InternalwomenTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $InternalthirgenderTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $InternalboyTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $InternalgirlTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $InternalTotal }}</td>
                                                </tr>
                                            </tbody>
                                        </table>


                                        <!-- ==================== SECOND TABLE: INTERNATIONAL TRAFFICKING ==================== -->
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif;">
                                            <thead>
                                                <!-- Row 1: Pink Header -->
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th rowspan="2" scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 25%; vertical-align: middle;">
                                                        Types of Hotlines</th>
                                                    <th rowspan="2" scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 20%; vertical-align: middle;">
                                                        Hotlines Number</th>
                                                    <th colspan="6" scope="colgroup"
                                                        style="border: 1.5px solid #000; padding: 6px; text-align: center; font-size: 14px; width: 55%;">
                                                        Coverage</th>
                                                </tr>
                                                <!-- Row 2: Pink Sub-Header -->
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 6px; text-align: center; font-size: 13px; width: 9%;">
                                                        Men</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 6px; text-align: center; font-size: 13px; width: 9%;">
                                                        Women</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 6px; text-align: center; font-size: 13px; width: 9%;">
                                                        3rd Gender</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 6px; text-align: center; font-size: 13px; width: 9%;">
                                                        Boy</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 6px; text-align: center; font-size: 13px; width: 9%;">
                                                        Girls</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 6px; text-align: center; font-size: 13px; width: 10%;">
                                                        Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Section Title Row -->
                                                <tr>
                                                    <td colspan="8"
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-weight: bold; background-color: #d9e1f2; color: #000; font-size: 14px;">
                                                        International Trafficking
                                                    </td>
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
                                                <tr style="color: #000; font-size: 14px;">
                                                    <!-- Column 1: Hotline Type -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        @if($twentyb->international_traffick_type_of_hotlines_q20 == 1)
                                                        MoWCA
                                                        @elseif ($twentyb->international_traffick_type_of_hotlines_q20
                                                        == 2) MoHA
                                                        @elseif ($twentyb->international_traffick_type_of_hotlines_q20
                                                        == 3) MoSW
                                                        @elseif ($twentyb->international_traffick_type_of_hotlines_q20
                                                        == 4) MoEWOE
                                                        @elseif ($twentyb->international_traffick_type_of_hotlines_q20
                                                        == 5) MoLJPA
                                                        @elseif ($twentyb->international_traffick_type_of_hotlines_q20
                                                        == 6) INCIDIN Bangladesh
                                                        @elseif ($twentyb->international_traffick_type_of_hotlines_q20
                                                        == 7) Ask
                                                        @elseif ($twentyb->international_traffick_type_of_hotlines_q20
                                                        == 8) BNWLA
                                                        @elseif ($twentyb->international_traffick_type_of_hotlines_q20
                                                        == 9) DAM
                                                        @else
                                                        {{ $twentyb->international_traffick_type_of_hotlines_q20 }}
                                                        @endif
                                                    </td>
                                                    <!-- Column 2: Hotline Number -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{ $twentyb->international_hotlines_number_q20 }}
                                                    </td>
                                                    <!-- Numeric Breakdown Columns -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $twentyb->international_traffick_men_q20 }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $twentyb->international_traffick_women_q20 }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $twentyb->international_traffick_third_gender_q20 }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $twentyb->international_traffick_boys_q20 }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{ $twentyb->international_traffick_girls_q20 }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-weight: bold;">
                                                        {{ $twentyb->international_traffick_total_q20 }}</td>
                                                </tr>
                                                @php
                                                $InternalionmenTotal += $twentyb->international_traffick_men_q20;
                                                $InternalionwomenTotal += $twentyb->international_traffick_women_q20;
                                                $InternalionthirgenderTotal +=
                                                $twentyb->international_traffick_third_gender_q20;
                                                $InternalionboyTotal += $twentyb->international_traffick_boys_q20;
                                                $InternaliongirlTotal += $twentyb->international_traffick_girls_q20;
                                                $InternalionTotal += $twentyb->international_traffick_total_q20;
                                                @endphp
                                                @endforeach

                                                <!-- Summary Row: Total -->
                                                <tr
                                                    style="font-weight: bold; background-color: #f2f2f2; color: #000; font-size: 14px;">
                                                    <td colspan="2"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left;">
                                                        Total</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $InternalionmenTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $InternalionwomenTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $InternalionthirgenderTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $InternalionboyTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $InternaliongirlTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $InternalionTotal }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->other_describe_government_operated_q20))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->other_describe_government_operated_q20 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif

                                    </div>
                                </div>


                                <?php } ?>
                                @endif

                                @if(Auth::user()->can('21.question'))
                                <?php
                                if (($questiontitles[20]->status ?? null) == 1) {
                                ?>

                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            21. {{ $questiontitles[20]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        @if(isset($case->yes_no_other) &&
                                        $case->yes_no_other->is_crime_justice_q21 == 1)
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif; margin-bottom: 30px; page-break-inside: avoid;">
                                            <thead>
                                                <!-- Row 1: Main Header -->
                                                <tr
                                                    style="background-color: #f8cbad; color: #000; font-weight: bold; height: 40px;">
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 25%; vertical-align: middle;">
                                                        Name of the Shelters</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 20%; vertical-align: middle;">
                                                        Operators</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 4px; text-align: center; font-size: 13px; width: 8%;">
                                                        Men</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 4px; text-align: center; font-size: 13px; width: 8%;">
                                                        Women</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 4px; text-align: center; font-size: 13px; width: 8%;">
                                                        Total</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-size: 14px; width: 12%; vertical-align: middle;">
                                                        Specialized for Trafficking?</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-size: 14px; width: 10%; vertical-align: middle;">
                                                        Eligible Victims</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 9%; vertical-align: middle;">
                                                        Note</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @php
                                                $menTotal = 0;
                                                $womenTotal = 0;
                                                $Total = 0;
                                                @endphp

                                                @foreach($case->twentyone as $twentyone)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; vertical-align: middle;">
                                                        {{ $twentyone->name_q21 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; vertical-align: middle;">
                                                        {{ $twentyone->operator_q21 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; vertical-align: middle;">
                                                        {{ $twentyone->capacity_men_q21 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; vertical-align: middle;">
                                                        {{ $twentyone->capacity_women_q21 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-weight: bold; vertical-align: middle;">
                                                        {{ $twentyone->capacity_total_q21 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; vertical-align: middle;">
                                                        {{ $twentyone->is_specialized_q21 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; vertical-align: middle;">
                                                        {{ $twentyone->eligible_victims_q21 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; vertical-align: middle;">
                                                        {{ $twentyone->note_q21 }}
                                                    </td>
                                                </tr>
                                                @php
                                                $menTotal += (int)$twentyone->capacity_men_q21;
                                                $womenTotal += (int)$twentyone->capacity_women_q21;
                                                $Total += (int)$twentyone->capacity_total_q21;
                                                @endphp
                                                @endforeach

                                                <!-- Summary Row: Total -->
                                                <tr
                                                    style="font-weight: bold; background-color: #f2f2f2; color: #000; font-size: 14px;">
                                                    <td colspan="2"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left;">
                                                        Total
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $menTotal }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $womenTotal }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $Total }}
                                                    </td>
                                                    <td colspan="3"
                                                        style="border: 1.5px solid #000; background-color: #f2f2f2;">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->other_crime_justice_q21))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->other_crime_justice_q21 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <?php } ?>
                                @endif

                                @if(Auth::user()->can('22.question'))
                                <?php
                                if (($questiontitles[21]->status ?? null) == 1) {
                                ?>

                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            22. {{ $questiontitles[20]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        @if(isset($case->yes_no_other) &&
                                        $case->yes_no_other->is_crime_justice_q22 == 1)
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif; margin-bottom: 30px; page-break-inside: avoid;">
                                            <thead>
                                                <!-- Row 1: Main Header -->
                                                <tr
                                                    style="background-color: #f8cbad; color: #000; font-weight: bold; height: 40px;">
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 25%; vertical-align: middle;">
                                                        Name of the Shelters</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 20%; vertical-align: middle;">
                                                        Operators</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 4px; text-align: center; font-size: 13px; width: 8%;">
                                                        Men</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 4px; text-align: center; font-size: 13px; width: 8%;">
                                                        Women</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 4px; text-align: center; font-size: 13px; width: 8%;">
                                                        Total</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-size: 14px; width: 12%; vertical-align: middle;">
                                                        Specialized for Trafficking?</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-size: 14px; width: 10%; vertical-align: middle;">
                                                        Eligible Victims</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 9%; vertical-align: middle;">
                                                        Note</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @php
                                                $menTotal = 0;
                                                $womenTotal = 0;
                                                $Total = 0;
                                                @endphp

                                                @foreach($case->twentytwo as $twentytwo)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; vertical-align: middle;">
                                                        {{ $twentytwo->name_q22 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; vertical-align: middle;">
                                                        {{ $twentytwo->operator_q22 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; vertical-align: middle;">
                                                        {{ $twentytwo->capacity_men_q22 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; vertical-align: middle;">
                                                        {{ $twentytwo->capacity_women_q22 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-weight: bold; vertical-align: middle;">
                                                        {{ $twentytwo->capacity_total_q22 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; vertical-align: middle;">
                                                        {{ $twentytwo->is_specialized_q22 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; vertical-align: middle;">
                                                        {{ $twentytwo->eligible_victims_q22 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; vertical-align: middle;">
                                                        {{ $twentytwo->note_q22 }}
                                                    </td>
                                                </tr>
                                                @php
                                                $menTotal += (int)$twentytwo->capacity_men_q22;
                                                $womenTotal += (int)$twentytwo->capacity_women_q22;
                                                $Total += (int)$twentytwo->capacity_total_q22;
                                                @endphp
                                                @endforeach

                                                <!-- Summary Row: Total -->
                                                <tr
                                                    style="font-weight: bold; background-color: #f2f2f2; color: #000; font-size: 14px;">
                                                    <td colspan="2"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left;">
                                                        Total
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $menTotal }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $womenTotal }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $Total }}
                                                    </td>
                                                    <td colspan="3"
                                                        style="border: 1.5px solid #000; background-color: #f2f2f2;">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->others_crime_justice_q22))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->others_crime_justice_q22 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <?php } ?>
                                @endif

                                @if(Auth::user()->can('23.question'))
                                <?php
                                if (($questiontitles[22]->status ?? null) == 1) {
                                ?>

                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            23. {{ $questiontitles[22]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        @if(isset($case->yes_no_other) && $case->yes_no_other->is_complicit_official_q23
                                        == 1)
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif;">
                                            <thead>
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px;">
                                                        Title Description
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->twentythree as $twentythree)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{ $twentythree->involved_directly_trafficking_title_q23 }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->others_complicit_official_q23))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->others_complicit_official_q23 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <?php } ?>
                                @endif

                                @if(Auth::user()->can('24.question'))
                                <?php
                                if (($questiontitles[23]->status ?? null) == 1) {
                                ?>

                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            24. {{ $questiontitles[23]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        @if(isset($case->yes_no_other) &&
                                        $case->yes_no_other->is_specialized_trafficking_victims_q24 == 1)
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif; margin-bottom: 30px; page-break-inside: avoid;">
                                            <thead>
                                                <!-- Row 1: Main Header -->
                                                <tr
                                                    style="background-color: #f8cbad; color: #000; font-weight: bold; height: 40px;">
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 25%; vertical-align: middle;">
                                                        Protection Services</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 20%; vertical-align: middle;">
                                                        Quality</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 4px; text-align: center; font-size: 13px; width: 8%;">
                                                        Men</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 4px; text-align: center; font-size: 13px; width: 8%;">
                                                        Women</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 4px; text-align: center; font-size: 13px; width: 8%;">
                                                        TG</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-size: 14px; width: 12%; vertical-align: middle;">
                                                        Boy</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-size: 14px; width: 10%; vertical-align: middle;">
                                                        Girl</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 9%; vertical-align: middle;">
                                                        Total</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 9%; vertical-align: middle;">
                                                        Location</th>
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
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; vertical-align: middle;">
                                                        @if($twentyfour->specialized_trafficking_victims_protection_q24
                                                        == 1)
                                                        Economic Support/Asset Transfer
                                                        @elseif($twentyfour->specialized_trafficking_victims_protection_q24
                                                        == 2)
                                                        Micro Credit
                                                        @elseif($twentyfour->specialized_trafficking_victims_protection_q24
                                                        == 3)
                                                        Livelihood Training
                                                        @elseif($twentyfour->specialized_trafficking_victims_protection_q24
                                                        == 4)
                                                        Job Placement
                                                        @elseif($twentyfour->specialized_trafficking_victims_protection_q24
                                                        == 5)
                                                        Health Care
                                                        @elseif($twentyfour->specialized_trafficking_victims_protection_q24
                                                        == 6)
                                                        Psychosocial Care
                                                        @elseif($twentyfour->specialized_trafficking_victims_protection_q24
                                                        == 7)
                                                        Shelter
                                                        @elseif($twentyfour->specialized_trafficking_victims_protection_q24
                                                        == 8)
                                                        Social Safetynet
                                                        @elseif($twentyfour->specialized_trafficking_victims_protection_q24
                                                        == 9)
                                                        Information Support
                                                        @elseif($twentyfour->specialized_trafficking_victims_protection_q24
                                                        == 10)
                                                        Mainstream Education
                                                        @elseif($twentyfour->specialized_trafficking_victims_protection_q24
                                                        == 11)
                                                        Non Formal Education
                                                        @elseif($twentyfour->specialized_trafficking_victims_protection_q24
                                                        == 12)
                                                        Technical Education
                                                        @elseif($twentyfour->specialized_trafficking_victims_protection_q24
                                                        == 13)
                                                        Life Skill
                                                        @elseif($twentyfour->specialized_trafficking_victims_protection_q24
                                                        == 14)
                                                        Family Reunion
                                                        @elseif($twentyfour->specialized_trafficking_victims_protection_q24
                                                        == 15)
                                                        Referral
                                                        @endif
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; vertical-align: middle;">
                                                        @if($twentyfour->specialized_trafficking_victims_quality_q24 ==
                                                        1)
                                                        Excellent
                                                        @elseif($twentyfour->specialized_trafficking_victims_quality_q24
                                                        == 2)
                                                        As per Standard
                                                        @elseif($twentyfour->specialized_trafficking_victims_quality_q24
                                                        == 3)
                                                        Below Standard
                                                        @endif
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; vertical-align: middle;">
                                                        {{$twentyfour->specialized_trafficking_victims_men_q24}}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; vertical-align: middle;">
                                                        {{$twentyfour->specialized_trafficking_victims_women_q24}}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-weight: bold; vertical-align: middle;">
                                                        {{$twentyfour->specialized_trafficking_victims_tg_q24}}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; vertical-align: middle;">
                                                        {{$twentyfour->specialized_trafficking_victims_boy_q24}}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; vertical-align: middle;">
                                                        {{$twentyfour->specialized_trafficking_victims_girl_q24}}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; vertical-align: middle;">
                                                        {{$twentyfour->specialized_trafficking_victims_total_q24}}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; vertical-align: middle;">
                                                        @php
                                                        $locations =
                                                        $twentyfour->specialized_trafficking_victims_location_q24;

                                                        if (is_string($locations)) {
                                                        $decoded = json_decode($locations, true);
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

                                                <!-- Summary Row: Total -->
                                                <tr
                                                    style="font-weight: bold; background-color: #f2f2f2; color: #000; font-size: 14px;">
                                                    <td colspan="2"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left;">
                                                        Total
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $menTotal }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $womenTotal }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $thirdTotal }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $boyTotal }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $girlTotal }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $Total }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->others_crime_justice_q22))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->others_crime_justice_q22 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <?php } ?>
                                @endif

                                @if(Auth::user()->can('30.question'))
                                <?php
                                if (($questiontitles[29]->status ?? null) == 1) {
                                ?>

                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            30. {{ $questiontitles[29]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        @if(isset($case->yes_no_other) &&
                                        $case->yes_no_other->is_foreign_victims_q30 == 1)
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif; margin-bottom: 30px; page-break-inside: avoid;">
                                            <thead>
                                                <!-- Row 1: Main Header -->
                                                <tr
                                                    style="background-color: #f8cbad; color: #000; font-weight: bold; height: 40px;">
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 25%; vertical-align: middle;">
                                                        Protection Services</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 20%; vertical-align: middle;">
                                                        Quality</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 4px; text-align: center; font-size: 13px; width: 8%;">
                                                        Men</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 4px; text-align: center; font-size: 13px; width: 8%;">
                                                        Women</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 4px; text-align: center; font-size: 13px; width: 8%;">
                                                        TG</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-size: 14px; width: 12%; vertical-align: middle;">
                                                        Boy</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-size: 14px; width: 10%; vertical-align: middle;">
                                                        Girl</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 9%; vertical-align: middle;">
                                                        Total</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 9%; vertical-align: middle;">
                                                        Location</th>
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

                                                @foreach($case->thirty as $thirty)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; vertical-align: middle;">
                                                        @if(is_numeric($thirty->citizen_victims_services_q30) &&
                                                        $thirty->citizen_victims_services_q30 >= 1 &&
                                                        $thirty->citizen_victims_services_q30 <= 15) @if($thirty->
                                                            citizen_victims_services_q30 == 1) Economic Support/Asset
                                                            Transfer
                                                            @elseif($thirty->citizen_victims_services_q30 == 2) Micro
                                                            Credit
                                                            @elseif($thirty->citizen_victims_services_q30 == 3)
                                                            Livelihood Training
                                                            @elseif($thirty->citizen_victims_services_q30 == 4) Job
                                                            Placement
                                                            @elseif($thirty->citizen_victims_services_q30 == 5) Health
                                                            Care
                                                            @elseif($thirty->citizen_victims_services_q30 == 6)
                                                            Psychosocial Care
                                                            @elseif($thirty->citizen_victims_services_q30 == 7) Shelter
                                                            @elseif($thirty->citizen_victims_services_q30 == 8) Social
                                                            Safetynet
                                                            @elseif($thirty->citizen_victims_services_q30 == 9)
                                                            Information Support
                                                            @elseif($thirty->citizen_victims_services_q30 == 10)
                                                            Mainstream Education
                                                            @elseif($thirty->citizen_victims_services_q30 == 11) Non
                                                            Formal Education
                                                            @elseif($thirty->citizen_victims_services_q30 == 12)
                                                            Technical Education
                                                            @elseif($thirty->citizen_victims_services_q30 == 13) Life
                                                            Skill
                                                            @elseif($thirty->citizen_victims_services_q30 == 14) Family
                                                            Reunion
                                                            @elseif($thirty->citizen_victims_services_q30 == 15)
                                                            Referral
                                                            @endif
                                                            @else
                                                            {{ $thirty->citizen_victims_services_q30 }}
                                                            @endif
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; vertical-align: middle;">
                                                        @if($thirty->citizen_victims_quality_q30 == 1) Excess
                                                        @elseif($thirty->citizen_victims_quality_q30 == 2) Adequate
                                                        @elseif($thirty->citizen_victims_quality_q30 == 3) Inadequate
                                                        @elseif($thirty->citizen_victims_quality_q30 == 4) None
                                                        @endif
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; vertical-align: middle;">
                                                        {{$thirty->citizen_victims_men_q30}}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; vertical-align: middle;">
                                                        {{$thirty->citizen_victims_women_q30}}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-weight: bold; vertical-align: middle;">
                                                        {{$thirty->citizen_victims_tg_q30}}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; vertical-align: middle;">
                                                        {{$thirty->citizen_victims_boy_q30}}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; vertical-align: middle;">
                                                        {{$thirty->citizen_victims_girl_q30}}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; vertical-align: middle;">
                                                        {{$thirty->citizen_victims_total_q30}}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; vertical-align: middle;">
                                                        @php
                                                        $locations = $thirty->citizen_victims_country_q30;

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
                                                $menTotal += $thirty->citizen_victims_men_q30;
                                                $womenTotal += $thirty->citizen_victims_women_q30;
                                                $thirdTotal += $thirty->citizen_victims_tg_q30;
                                                $boyTotal += $thirty->citizen_victims_boy_q30;
                                                $girlTotal += $thirty->citizen_victims_girl_q30;
                                                $Total += $thirty->citizen_victims_total_q30;
                                                @endphp
                                                @endforeach

                                                <!-- Summary Row: Total -->
                                                <tr
                                                    style="font-weight: bold; background-color: #f2f2f2; color: #000; font-size: 14px;">
                                                    <td colspan="2"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left;">
                                                        Total
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $menTotal }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $womenTotal }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $thirdTotal }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $boyTotal }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $girlTotal }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $Total }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->other_foreign_victims_q30))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->other_foreign_victims_q30 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <?php } ?>
                                @endif

                                @if(Auth::user()->can('31.question'))
                                <?php
                                if (($questiontitles[30]->status ?? null) == 1) {
                                ?>

                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            31. {{ $questiontitles[30]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        @if(isset($case->yes_no_other) &&
                                        $case->yes_no_other->is_citizen_victims_abroad_q31 == 1)
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif; margin-bottom: 30px; page-break-inside: avoid;">
                                            <thead>
                                                <!-- Row 1: Main Header -->
                                                <tr
                                                    style="background-color: #f8cbad; color: #000; font-weight: bold; height: 40px;">
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 25%; vertical-align: middle;">
                                                        Protection Services</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 20%; vertical-align: middle;">
                                                        Quality</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 4px; text-align: center; font-size: 13px; width: 8%;">
                                                        Men</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 4px; text-align: center; font-size: 13px; width: 8%;">
                                                        Women</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 4px; text-align: center; font-size: 13px; width: 8%;">
                                                        TG</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-size: 14px; width: 12%; vertical-align: middle;">
                                                        Boy</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-size: 14px; width: 10%; vertical-align: middle;">
                                                        Girl</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 9%; vertical-align: middle;">
                                                        Total</th>

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

                                                @foreach($case->thirtyone as $thirtyone)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; vertical-align: middle;">
                                                        @if($thirtyone->citizen_victims_abroad_name_q31 == 1)
                                                        India
                                                        @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 2)
                                                        Nepal
                                                        @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 3)
                                                        Sri lanka
                                                        @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 4)
                                                        EU
                                                        @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 5)
                                                        USA
                                                        @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 6)
                                                        Saudi Arabia
                                                        @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 7)
                                                        Qatar
                                                        @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 8)
                                                        Lebanon
                                                        @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 9)
                                                        Irag
                                                        @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 10)
                                                        UAE
                                                        @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 11)
                                                        Thailand
                                                        @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 12)
                                                        Vietnam
                                                        @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 13)
                                                        Cambodia
                                                        @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 14)
                                                        South Africa
                                                        @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 15)
                                                        Brazil
                                                        @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 16)
                                                        UK

                                                        @else
                                                        {{$thirtyone->citizen_victims_abroad_name_q31}}
                                                        @endif
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; vertical-align: middle;">
                                                        {{$thirtyone->citizen_victims_abroad_status_q31 }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; vertical-align: middle;">
                                                        {{$thirtyone->citizen_victims_abroad_men_q31}}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; vertical-align: middle;">
                                                        {{$thirtyone->citizen_victims_abroad_women_q31}}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-weight: bold; vertical-align: middle;">
                                                        {{$thirtyone->citizen_victims_abroad_tg_q31}}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; vertical-align: middle;">
                                                        {{$thirtyone->citizen_victims_abroad_boy_q31}}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; vertical-align: middle;">
                                                        {{$thirtyone->citizen_victims_abroad_girl_q31}}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; vertical-align: middle;">
                                                        {{$thirtyone->citizen_victims_abroad_total_q31}}
                                                    </td>

                                                </tr>
                                                @php
                                                $menTotal += $thirtyone->citizen_victims_abroad_men_q31;
                                                $womenTotal += $thirtyone->citizen_victims_abroad_women_q31;
                                                $thirdTotal += $thirtyone->citizen_victims_abroad_tg_q31;
                                                $boyTotal += $thirtyone->citizen_victims_abroad_boy_q31;
                                                $girlTotal +=$thirtyone->citizen_victims_abroad_girl_q31;
                                                $Total += $thirtyone->citizen_victims_abroad_total_q31;
                                                @endphp
                                                @endforeach

                                                <!-- Summary Row: Total -->
                                                <tr
                                                    style="font-weight: bold; background-color: #f2f2f2; color: #000; font-size: 14px;">
                                                    <td colspan="2"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left;">
                                                        Total
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $menTotal }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $womenTotal }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $thirdTotal }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $boyTotal }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $girlTotal }}
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $Total }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->other_citizen_victims_abroad_q31))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->other_citizen_victims_abroad_q31 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <?php } ?>
                                @endif


                                @if(Auth::user()->can('33.question'))
                                <?php
                                if (($questiontitles[32]->status ?? null) == 1) {
                                ?>

                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            33. {{ $questiontitles[32]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        @if(isset($case->yes_no_other) && $case->yes_no_other->is_complicit_official_q33
                                        == 1)
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif;">
                                            <thead>
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px;">
                                                        Title Description
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->thirtythree as $thirtythree)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{ $thirtythree->involved_directly_trafficking_title_q33 }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->others_complicit_official_q33))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->others_complicit_official_q33 }}
                                        </div>


                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->no_details_q33))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->no_details_q33 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <?php } ?>
                                @endif


                                @if(Auth::user()->can('44.question'))
                                <?php
                                if (($questiontitles[43]->status ?? null) == 1) {
                                ?>
                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            44. {{ $questiontitles[43]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        @if(isset($case->yes_no_other) &&
                                        $case->yes_no_other->is_awareness_campaigns_research_projects_q44 == 1)
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif;">
                                            <thead>
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 45%;">
                                                        Type of preventive Action</th>

                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 20%;">
                                                        Allocation (in BDT) / Assessment</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->fortyfour as $fortyfour)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        @if($fortyfour->awareness_campaigns_research_projects_title_q44
                                                        == 1)
                                                        Total Allocation under NPA for prevention
                                                        @elseif($fortyfour->awareness_campaigns_research_projects_title_q44
                                                        == 2)
                                                        Total Allocation utilized under NPA for prevention
                                                        @elseif($fortyfour->awareness_campaigns_research_projects_title_q44
                                                        == 3)
                                                        Total allocation spent for Awareness activities
                                                        @elseif($fortyfour->awareness_campaigns_research_projects_title_q44
                                                        == 4)
                                                        Total allocation spent for safety-net
                                                        @elseif($fortyfour->awareness_campaigns_research_projects_title_q44
                                                        == 5)
                                                        Total allocation spent for training to promote prevention
                                                        @elseif($fortyfour->awareness_campaigns_research_projects_title_q44
                                                        == 6)
                                                        Assessment of Allocation
                                                        @endif
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        @if($fortyfour->awareness_campaigns_research_projects_status_q44
                                                        == 1)
                                                        Excess
                                                        @elseif($fortyfour->awareness_campaigns_research_projects_status_q44
                                                        == 2)
                                                        Adequate
                                                        @elseif($fortyfour->awareness_campaigns_research_projects_status_q44
                                                        == 3)
                                                        Inadequate
                                                        @elseif($fortyfour->awareness_campaigns_research_projects_status_q44
                                                        == 4)
                                                        None
                                                        @else
                                                        {{ $fortyfour->awareness_campaigns_research_projects_status_q44 }}
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->other_awareness_campaigns_research_projects_q44))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->other_awareness_campaigns_research_projects_q44 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <?php } ?>
                                @endif

                                @if(Auth::user()->can('45.question'))
                                <?php
                                if (($questiontitles[44]->status ?? null) == 1) {
                                ?>
                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            45. {{ $questiontitles[44]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        @if(isset($case->yes_no_other) &&
                                        $case->yes_no_other->is_national_plan_trafficking_q45 == 1)
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif;">
                                            <thead>
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 45%;">
                                                        Type of preventive Action</th>

                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 20%;">
                                                        Allocation (in BDT) / Assessment</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->fortyfive as $fortyfive)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">

                                                        {{$fortyfive->national_plan_trafficking_q45_title_q45}}
                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        @if(!empty($fortyfive->document_upload_q45))
                                                        <a href="{{ asset('uploads/'.$fortyfive->document_upload_q45) }}"
                                                            target="_blank">
                                                            View
                                                        </a>
                                                        @else
                                                        Not Found
                                                        @endif
                                                    </td>
                                                </tr>

                                                <tr style="color: #000; font-size: 14px;">
                                                    <td colspan="2"
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{$fortyfive->national_plan_trafficking_q45_description_q45}}
                                                    </td>
                                                </tr>

                                                @endforeach
                                            </tbody>
                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->other_national_plan_trafficking_q45))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->other_national_plan_trafficking_q45 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <?php } ?>
                                @endif






                                @if(Auth::user()->can('46.question'))
                                <?php
                                if (($questiontitles[45]->status ?? null) == 1) {
                                ?>

                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            46. {{ $questiontitles[45]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        @if(isset($case->yes_no_other) &&
                                        $case->yes_no_other->is_government_conduct_awareness_activities_q46 == 1)
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif; margin-bottom: 30px; page-break-inside: avoid;">
                                            <thead>
                                                <!-- Row 1: Main Header -->
                                                <tr
                                                    style="background-color: #f8cbad; color: #000; font-weight: bold; height: 40px;">
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 25%; vertical-align: middle;">
                                                        Protection Services</th>

                                                    <th
                                                        style="border: 1.5px solid #000; padding: 4px; text-align: center; font-size: 13px; width: 8%;">
                                                        Men</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 4px; text-align: center; font-size: 13px; width: 8%;">
                                                        Women</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 4px; text-align: center; font-size: 13px; width: 8%;">
                                                        TG</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-size: 14px; width: 12%; vertical-align: middle;">
                                                        Boy</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center; font-size: 14px; width: 10%; vertical-align: middle;">
                                                        Girl</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 9%; vertical-align: middle;">
                                                        Total</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 9%; vertical-align: middle;">
                                                        GO</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 9%; vertical-align: middle;">
                                                        NGO</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 9%; vertical-align: middle;">
                                                        INGO</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 9%; vertical-align: middle;">
                                                        UN</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 9%; vertical-align: middle;">
                                                        CTC</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 9%; vertical-align: middle;">
                                                        Others</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 9%; vertical-align: middle;">
                                                        M</th>

                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 9%; vertical-align: middle;">
                                                        F</th>
                                                    <th
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; font-size: 14px; width: 9%; vertical-align: middle;">
                                                        Total</th>



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
                                                $thirteenTotal = 0; // ৩০ এর জায়গায় ১৩ করা হয়েছে নামকরণের সুবিধার্থে
                                                $fourteenTotal = 0;
                                                $Total = 0;
                                                @endphp

                                                @foreach($case->fortysix as $fortysix)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <!-- ১. Activity Type -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left; vertical-align: middle;">
                                                        @if($fortysix->q46_type_activity == 1) Courtyard meeting
                                                        @elseif ($fortysix->q46_type_activity == 2) Bazar/hatt meeting
                                                        @elseif ($fortysix->q46_type_activity == 3) CTC meeting
                                                        @elseif ($fortysix->q46_type_activity == 4) Consultation
                                                        @elseif ($fortysix->q46_type_activity == 5) Poster
                                                        @elseif ($fortysix->q46_type_activity == 6) leaflet
                                                        @elseif ($fortysix->q46_type_activity == 7) Booklet
                                                        @elseif ($fortysix->q46_type_activity == 8) SMS
                                                        @elseif ($fortysix->q46_type_activity == 9) Newsletter
                                                        @elseif ($fortysix->q46_type_activity == 10) Billboard
                                                        @elseif ($fortysix->q46_type_activity == 11) Folk show
                                                        @elseif ($fortysix->q46_type_activity == 12) Film show
                                                        @elseif ($fortysix->q46_type_activity == 13) Miking
                                                        @elseif ($fortysix->q46_type_activity == 14) Web campaign
                                                        @else {{$fortysix->q46_type_activity}}
                                                        @endif
                                                    </td>

                                                    <!-- ২. Men -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{$fortysix->q46_comm_m}}</td>
                                                    <!-- ৩. Women -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{$fortysix->q46_comm_w}}</td>
                                                    <!-- ৪. TG -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{$fortysix->q46_comm_tg}}</td>
                                                    <!-- ৫. Boy -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{$fortysix->q46_comm_b}}</td>
                                                    <!-- ৬. Girl -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{$fortysix->q46_comm_g}}</td>
                                                    <!-- ৭. Total (Community) -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        {{$fortysix->q46_comm_t}}</td>

                                                    <!-- ৮. GO -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{$fortysix->q46_org_go}}</td>
                                                    <!-- ৯. NGO -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{$fortysix->q46_org_ngo}}</td>
                                                    <!-- ১০. INGO -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{$fortysix->q46_org_ingo}}</td>
                                                    <!-- ১১. UN -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{$fortysix->q46_org_un}}</td>
                                                    <!-- ১২. CTC -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{$fortysix->q46_org_ctc}}</td>
                                                    <!-- ১৩. Others -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{$fortysix->q46_org_others}}</td>

                                                    <!-- ১৪. M -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{$fortysix->q46_total_m}}</td>
                                                    <!-- ১৫. F -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{$fortysix->q46_total_f}}</td>
                                                    <!-- ১৬. Total -->
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        {{$fortysix->q46_total_t}}</td>
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
                                                $thirteenTotal += $fortysix->q46_total_m;
                                                $fourteenTotal += $fortysix->q46_total_f;
                                                $Total += $fortysix->q46_total_t;
                                                @endphp
                                                @endforeach

                                                <!-- Summary Row: Total -->
                                                <tr
                                                    style="font-weight: bold; background-color: #f2f2f2; color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left;">
                                                        Total</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $oneTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $twoTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $threeTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $fourTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $fiveTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $sixTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $sevenTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $eightTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $nineTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $tenTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $elevenTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $twelveTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $thirteenTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $fourteenTotal }}</td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center;">
                                                        {{ $Total }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->other_government_conduct_awareness_activities_q46))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->other_government_conduct_awareness_activities_q46 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <?php } ?>
                                @endif


                                @if(Auth::user()->can('47.question'))
                                <?php
                                if (($questiontitles[46]->status ?? null) == 1) {
                                ?>
                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            47. {{ $questiontitles[46]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        @if(isset($case->yes_no_other) &&
                                        $case->yes_no_other->is_government_change_regulated_q47 == 1)
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif;">
                                            <thead>
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 45%;">
                                                        Original Document/Approach</th>

                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 20%;">
                                                        Description of Change</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->fortyseven as $fortyseven)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        @if ($fortyseven->government_change_regulated_title_q47 == 1)
                                                        OEMA 2013
                                                        @elseif ($fortyseven->government_change_regulated_title_q47 ==
                                                        2)
                                                        Employee-paid-model
                                                        @elseif ($fortyseven->government_change_regulated_title_q47 ==
                                                        3)
                                                        Employer-paid-model
                                                        @elseif ($fortyseven->government_change_regulated_title_q47 ==
                                                        4)
                                                        Fair recruitment cost notification
                                                        @elseif ($fortyseven->government_change_regulated_title_q47 ==
                                                        5)
                                                        Ranking of Recruiting Agents
                                                        @elseif ($fortyseven->government_change_regulated_title_q47 ==
                                                        6)
                                                        Licensing of Recruiting Agents
                                                        @elseif ($fortyseven->government_change_regulated_title_q47 ==
                                                        7)
                                                        Registration of Informal Recruiting Agents
                                                        @elseif ($fortyseven->government_change_regulated_title_q47 ==
                                                        8)
                                                        Zero Migration Cost Approach
                                                        @else
                                                        {{$fortyseven->government_change_regulated_title_q47}}
                                                        @endif

                                                    </td>

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        @if ($fortyseven->government_change_regulated_status_q47 == 1)
                                                        Firmly implemented enforced
                                                        @elseif ($fortyseven->government_change_regulated_status_q47 ==
                                                        2)
                                                        Reformed
                                                        @elseif ($fortyseven->government_change_regulated_status_q47 ==
                                                        3)
                                                        Planned
                                                        @elseif ($fortyseven->government_change_regulated_status_q47 ==
                                                        4)
                                                        Drafted
                                                        @elseif ($fortyseven->government_change_regulated_status_q47 ==
                                                        5)
                                                        Updated
                                                        @elseif ($fortyseven->government_change_regulated_status_q47 ==
                                                        6)
                                                        Partially enforced
                                                        @elseif ($fortyseven->government_change_regulated_status_q47 ==
                                                        7)
                                                        Expanded us
                                                        @elseif ($fortyseven->government_change_regulated_status_q47 ==
                                                        8)

                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->other_government_change_regulated_q47))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->other_government_change_regulated_q47 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <?php } ?>
                                @endif

                                @if(Auth::user()->can('49.question'))
                                <?php
                                if (($questiontitles[48]->status ?? null) == 1) {
                                ?>
                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            49. {{ $questiontitles[48]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        @if(isset($case->yes_no_other) &&
                                        $case->yes_no_other->is_government_change_regulated_q47 == 1)
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif;">
                                            <thead>
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 45%;">
                                                        Country</th>

                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 20%;">
                                                        Instruments</th>
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 20%;">
                                                        Attach/Upload Pdf</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->fortynine as $fortynine)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
                                                        @if($fortynine->government_agreements_transparent_country_q49 ==
                                                        1) India
                                                        @elseif($fortynine->government_agreements_transparent_country_q49
                                                        == 2) Nepal
                                                        @elseif($fortynine->government_agreements_transparent_country_q49
                                                        == 3) Sri lanka
                                                        @elseif($fortynine->government_agreements_transparent_country_q49
                                                        == 4) EU
                                                        @elseif($fortynine->government_agreements_transparent_country_q49
                                                        == 5) USA
                                                        @elseif($fortynine->government_agreements_transparent_country_q49
                                                        == 6) Saudi Arabia
                                                        @elseif($fortynine->government_agreements_transparent_country_q49
                                                        == 7) Qatar
                                                        @elseif($fortynine->government_agreements_transparent_country_q49
                                                        == 8) Lebanon
                                                        @elseif($fortynine->government_agreements_transparent_country_q49
                                                        == 9) Iraq
                                                        @elseif($fortynine->government_agreements_transparent_country_q49
                                                        == 10) UAE
                                                        @elseif($fortynine->government_agreements_transparent_country_q49
                                                        == 11) Thailand
                                                        @elseif($fortynine->government_agreements_transparent_country_q49
                                                        == 12) Vietnam
                                                        @elseif($fortynine->government_agreements_transparent_country_q49
                                                        == 13) Cambodia
                                                        @elseif($fortynine->government_agreements_transparent_country_q49
                                                        == 14) South Africa
                                                        @elseif($fortynine->government_agreements_transparent_country_q49
                                                        == 15) Brazil
                                                        @elseif($fortynine->government_agreements_transparent_country_q49
                                                        == 16) UK
                                                        @else
                                                        {{$fortynine->government_agreements_transparent_country_q49}}
                                                        @endif

                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        @if($fortynine->government_agreements_transparent_status_q49 ==
                                                        1) Bil-lateral Agreement
                                                        @elseif($fortynine->government_agreements_transparent_status_q49
                                                        == 2) SOP
                                                        @elseif($fortynine->government_agreements_transparent_status_q49
                                                        == 3) Mutual Legal Arrangement
                                                        @elseif($fortynine->government_agreements_transparent_status_q49
                                                        == 4) MoU
                                                        @elseif($fortynine->government_agreements_transparent_status_q49
                                                        == 5) Trade Treaty
                                                        @elseif($fortynine->government_agreements_transparent_status_q49
                                                        == 6) G to G Agreement
                                                        @endif
                                                    </td>
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        @if(!empty($fortynine->document_upload_q49))
                                                        <a href="{{ asset($fortynine->document_upload_q49) }}"
                                                            target="_blank">View</a>
                                                        @else
                                                        not Found
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->other_government_agreements_transparent_q49))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->other_government_agreements_transparent_q49 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <?php } ?>
                                @endif

                                @if(Auth::user()->can('50.question'))
                                <?php
                                if (($questiontitles[49]->status ?? null) == 1) {
                                ?>
                                <div class="card" style="width: 100%; border: none; margin-bottom: 25px;">
                                    <div class="card-header text-dark font-weight-bold"
                                        style="background-color: #9bc2e6; border: 1.5px solid #000; padding: 12px;">
                                        <h5
                                            style="margin: 0; font-size: 16px; font-weight: bold; line-height: 1.5; font-family: sans-serif;">
                                            50. {{ $questiontitles[49]->title }}
                                        </h5>
                                    </div>

                                    <div class="card-body" style="padding: 0; margin-top: 15px;">
                                        @if(isset($case->yes_no_other) &&
                                        $case->yes_no_other->is_exploitative_treatment_q50 == 1)
                                        <table class="custom-table"
                                            style="width: 100%; border-collapse: collapse; border: 1.5px solid #000; font-family: sans-serif;">
                                            <thead>
                                                <tr style="background-color: #f8cbad; color: #000; font-weight: bold;">
                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: left; font-size: 14px; width: 45%;">
                                                        Action</th>


                                                    <th scope="col"
                                                        style="border: 1.5px solid #000; padding: 10px; text-align: center; font-size: 14px; width: 20%;">
                                                        Attach/Upload Pdf</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($case->fifty as $fifty)
                                                <tr style="color: #000; font-size: 14px;">
                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: left;">
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




                                                    <td
                                                        style="border: 1.5px solid #000; padding: 8px; text-align: center;">
                                                        @if(!empty($fifty->document_upload_q50))
                                                        <a href="{{ asset($fifty->document_upload_q50) }}"
                                                            target="_blank">View</a>
                                                        @else
                                                        not Found
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @elseif(isset($case->yes_no_other) &&
                                        !empty($case->yes_no_other->other_exploitative_treatment_q50))
                                        <div class="alert alert-info">
                                            <strong>Other Description:</strong>
                                            {{ $case->yes_no_other->other_exploitative_treatment_q50 }}
                                        </div>


                                        @else
                                        <div class="text-center py-3">
                                            <p class="text-muted">No data available for this section.</p>
                                        </div>
                                        @endif
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