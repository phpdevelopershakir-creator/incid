<?php
if (($questiontitles[7]->status ?? null) == 1) {

?>
<div class="card">
    <div class="card-header" role="tab" id="heading-4">
        <h6 class="mb-0">
            <a data-toggle="collapse" href="#Question-8" aria-expanded="false" aria-controls="collapse-4">
                8.{{ $questiontitles[7]->title }}
            </a>
        </h6>
    </div>


    <div id="Question-8" class="collapse" role="tabpane8" aria-labelledby="heading-4" data-parent="#accordion-2">
        <div class="card-body">
            <div id="six_question_view">
                @if(isset($case->yes_no_other) && $case->yes_no_other->is_involved_directly_trafficking_8q == 1)
                <table class="table table-white table-bordered">
                    <thead class="text-center align-middle">
                        <tr style="background:#E5E5E5;">
                            <th rowspan="2" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">
                                Ministry/Department Municipality body</th>
                            <!-- <th rowspan="2">Description of change/Status</th> -->
                            <th colspan="4" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">
                                Measures Taken</th>

                        </tr>
                        <tr style="background:#E5E5E5;">
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
                            <td class="text-center align-middle">{{$eight->official_investigation_q8}}</td>
                            <td class="text-center align-middle">{{$eight->official_prosecution_q8}}</td>
                            <td class="text-center align-middle">{{$eight->official_conviction_q8}}</td>
                            <td class="text-center align-middle">{{$eight->official_administrative_q8}}</td>
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
                            <td class="text-center align-middle">{{ $menTotal }}</td>
                            <td class="text-center align-middle">{{ $womenTotal }}</td>
                            <td class="text-center align-middle">{{ $thirdGenderTotal }}</td>
                            <td class="text-center align-middle">{{ $boysTotal }}</td>
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
    </div>
</div>

<?php } ?>