@if (($questiontitles[37]->status ?? null) == 1)

<style>
.sub_field_box_q38 {
    display: none;
}

.q38_table_header {
    background-color: #fce4d6;
    font-weight: bold;
}
</style>

<div class="card question38">
    <div class="card-header" role="tab" id="heading-38">
        <h6 class="card-title" style="color: {{ !empty($question_38_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-38" aria-expanded="false" aria-controls="collapse-38">
                38. {{ $questiontitles[37]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-38" class="collapse" role="tabpanel" aria-labelledby="heading-38" data-parent="#accordion-2">
        <div class="card-body">
            @if(isset($case->yes_no_other) && $case->yes_no_other->is_victim_protection_q38 == 1)

            {{$case->yes_no_other->title_victim_protection_q38}}

            <!-- Main Status Radio Buttons -->
            <div class="mb-3">
                <label class="font-weight-bold">Status:</label>
                <div class="mt-1">
                    <div class="icheck-primary d-inline mr-3">
                        @if($case->yes_no_other->is_victim_protection_q38 == 1)
                        Yes
                        @elseif($case->yes_no_other->is_victim_protection_q38 == 0)
                        No
                        @elseif($case->yes_no_other->is_victim_protection_q38 == 2)
                        Other
                        @else
                        N/A
                        @endif
                    </div>


                </div>

                <div class="mt-2 q38_others_box sub_field_box_q38">
                    @if($case->yes_no_other->is_victim_protection_q38 == 1)
                    {{$case->yes_no_other->title_victim_protection_q38}}

                    @elseif($case->yes_no_other->is_victim_protection_q38 == 2)
                    {{$case->yes_no_other->other_victim_protection_q38}}
                    @else
                    N/A
                    @endif
                </div>
            </div>

            <!-- Content Area (Show if Yes) -->
            <div class="q38_content_wrapper">

                <!-- TABLE 1: Witness Protection Table -->
                <div class="table-responsive mb-4">
                    <table class="table table-bordered text-center mb-0" id="q38_table_1">
                        <thead>
                            <tr class="bg-light">
                                <th colspan="6">VoT participating in investigation Provided with Witness Protection</th>
                            </tr>
                            <tr class="bg-light">
                                <th>Men</th>
                                <th>Women</th>
                                <th>TG</th>
                                <th>Boy</th>
                                <th>Girl</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Internal Trafficking Row Header -->
                            <tr class="q38_table_header">
                                <td colspan="6">Internal Trafficking</td>
                            </tr>
                            @foreach($case->thirtyeight as $thirtyeight)
                            <tr>
                                <td>{{$thirtyeight->internal_men_q38}}</td>
                                <td>{{$thirtyeight->internal_women_q38}}</td>
                                <td>{{$thirtyeight->internal_tg_q38}}</td>
                                <td>{{$thirtyeight->internal_boy_q38}}</td>
                                <td>{{$thirtyeight->internal_girl_q38}}</td>
                                <td>{{$thirtyeight->internal_total_q38}}</td>

                            </tr>
                            @endforeach

                            <!-- International Trafficking Row Header -->
                            <tr class="q38_table_header">
                                <td colspan="6">International Trafficking</td>
                            </tr>
                            <tr>
                                @foreach($case->thirtyeightb as $thirtyeightb)
                                <td>{{$thirtyeightb->international_men_q38}}</td>
                                <td>{{$thirtyeightb->international_women_q38}}</td>
                                <td>{{$thirtyeightb->international_tg_q38}}</td>
                                <td>{{$thirtyeightb->international_boy_q38}}</td>
                                <td>{{$thirtyeightb->international_girl_q38}}</td>
                                <td>{{$thirtyeightb->international_total_q38}}</td>
                            </tr>
                            @endforeach
                            <!-- Total Row Header & Result -->

                        </tbody>
                    </table>
                </div>


                <!-- TABLE 2: Coverage / Assistance Table -->
                <div class="table-responsive">
                    <table class="table table-bordered text-center mb-1" id="q38_table_2">
                        <thead class="bg-light">
                            <tr>
                                <th rowspan="2" class="align-middle" style="width: 20%;">Location (multiple-response)
                                </th>
                                <th rowspan="2" class="align-middle" style="width: 25%;">Types of Assistance</th>
                                <th colspan="6">Coverage</th>
                                <th rowspan="2" class="align-middle" style="width: 70px;">Action</th>
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
                        <tbody id="q38_t2_body">
                            @php
                            $menTotal = 0;
                            $womenTotal = 0;
                            $tgTotal = 0;
                            $boyTotal = 0;
                            $girlTotal = 0;
                            $Total = 0;

                            @endphp
                            @foreach($case->thirtyeightc as $thirtyeightc)
                            <tr>
                                <td>{{$thirtyeightc->location_q38c}}</td>
                                <td>{{$thirtyeightc->type_q38c}}</td>
                                <td>{{$thirtyeightc->men_q38c}}</td>
                                <td>{{$thirtyeightc->women_q38c}}</td>
                                <td>{{$thirtyeightc->tg_q38c}}</td>
                                <td>{{$thirtyeightc->boy_q38c}}</td>
                                <td>{{$thirtyeightc->girl_q38c}}</td>
                                <td>{{$thirtyeightc->total_q38c}}</td>


                            </tr>
                            @php
                            $menTotal += $thirtyeightc->men_q38c;
                            $womenTotal += $thirtyeightc->women_q38c;
                            $tgTotal += $thirtyeightc->tg_q38c;
                            $boyTotal += $thirtyeightc->boy_q38c;
                            $girlTotal += $thirtyeightc->girl_q38c;
                            $Total += $thirtyeightc->total_q38c;


                            @endphp
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr class="bg-light font-weight-bold">
                                <td colspan="2" class="text-right">Result</td>
                                <td id="q38_t2_sum_men">0</td>
                                <td id="q38_t2_sum_women">0</td>
                                <td id="q38_t2_sum_tg">0</td>
                                <td id="q38_t2_sum_boy">0</td>
                                <td id="q38_t2_sum_girl">0</td>
                                <td id="q38_t2_grand_total">0</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                    <small class="text-danger font-weight-bold">Location is division with national</small>
                </div>
            </div>

            @elseif(isset($case->yes_no_other) && !empty($case->yes_no_other->other_victim_protection_q38))
            <div class="alert alert-info">
                <strong>Other Description:</strong>
                {{ $case->yes_no_other->other_victim_protection_q38 }}
            </div>

            @else
            <div class="text-center py-3">
                <p class="text-muted">No data available for this section.</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endif