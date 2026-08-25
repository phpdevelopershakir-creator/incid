<style>
.othersText {
    display: none
}

.visibility {
    display: none
}

.q15-item-card {
    border: 1px solid #e9ecef;
    border-radius: 6px;
    background-color: #f8f9fa;
}
</style>

<div class="card question15">

    <div class="card-header" role="tab" id="heading-4">
        <h6 class="mb-0 card-title">
            <a data-toggle="collapse" href="#Question-56" aria-expanded="false" aria-controls="collapse-4">
                56.{{ $questiontitles[55]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-56" class="collapse" role="tabpane56" aria-labelledby="heading-4" data-parent="#accordion-2">
        <div class="card-body">


            <div class="q15-wrapper">


                <div class="q15-item-card p-3 mb-3">
                    <!-- 1. Description One -->
                    <div class="mb-2">
                        <strong class="text-secondary d-block">Description :</strong>
                        <span>{{ $case->yes_no_other->desctiption_instances_trafficking_q56 }}</span>
                    </div>



                </div>

            </div>
            @if(isset($case->yes_no_other) && $case->yes_no_other->is_instances_trafficking_q56 == 1)
            <table class="table table-bordered text-center">
                <thead class="text-center align-middle">
                    <tr style="background:#E5E5E5;">
                        <th rowspan="2" style="vertical-align: middle;">Country where posted</th>
                        <th rowspan="2" style="vertical-align: middle;">Description</th>
                        <th colspan="4">Number of Trainees</th>

                    </tr>
                    <tr style="background:#E5E5E5;">
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
                    $tgTotal = 0;
                    $Total = 0;

                    @endphp
                    @foreach($case->fiftysix as $fiftysix)
                    <tr>
                        <th>{{$fiftysix->instances_trafficking_country_q56}}</th>

                        <th>
                            {{$fiftysix->instances_trafficking_desc_q56}}
                        </th>
                        <th>
                            {{$fiftysix->instances_trafficking_men_q56}}

                        </th>
                        <th>
                            {{$fiftysix->instances_trafficking_women_q56}}
                        </th>
                        <th>
                            {{$fiftysix->instances_trafficking_tg_q56}}
                        </th>
                        <th>
                            {{$fiftysix->instances_trafficking_total_q56}}
                        </th>


                    </tr>
                    @php
                    $menTotal += $fiftysix->instances_trafficking_men_q56;
                    $womenTotal += $fiftysix->instances_trafficking_women_q56;
                    $tgTotal += $fiftysix->instances_trafficking_tg_q56;
                    $Total += $fiftysix->instances_trafficking_total_q56;


                    @endphp
                    @endforeach
                    <tr style="font-weight:bold; background:#f1f1f1;">
                        <td colspan="2">Total</td>
                        <td class="text-center align-middle">{{ $menTotal }}</td>
                        <td class="text-center align-middle">{{ $womenTotal }}</td>
                        <td class="text-center align-middle">{{ $tgTotal }}</td>
                        <td class="text-center align-middle">{{ $Total }}</td>

                    </tr>
                </tbody>
            </table>
            <br>
            <p>2. Number of Official Accused
            </p>
            <table class="table table-bordered text-center">
                <thead class="text-center align-middle">
                    <tr style="background:#E5E5E5;">
                        <th rowspan="2" style="vertical-align: middle;">2. Number of Official Accused
                        </th>

                        <th colspan="4">Number of Trainees</th>

                    </tr>
                    <tr style="background:#E5E5E5;">
                        <th>Men</th>
                        <th>Women</th>
                        <th>Total</th>
                        <th style="vertical-align: middle;">Description</th>

                    </tr>

                </thead>
                <tbody>
                    @php
                    $menTotal = 0;
                    $womenTotal = 0;

                    $Total = 0;

                    @endphp
                    @foreach($case->fiftysixb as $fiftysixb)
                    <tr>
                        <th>{{$fiftysixb->instances_trafficking_ministry_q56b}}</th>


                        <th>
                            {{$fiftysixb->instances_trafficking_men_q56b}}

                        </th>
                        <th>
                            {{$fiftysixb->instances_trafficking_women_q56b}}
                        </th>

                        <th>
                            {{$fiftysixb->instances_trafficking_total_q56b}}
                        </th>
                        <th>
                            {{$fiftysixb->instances_trafficking_measures_q56b}}
                        </th>


                    </tr>
                    @php
                    $menTotal += $fiftysixb->instances_trafficking_men_q56b;
                    $womenTotal += $fiftysixb->instances_trafficking_women_q56b;

                    $Total += $fiftysixb->instances_trafficking_total_q56b;


                    @endphp
                    @endforeach
                    <tr style="font-weight:bold; background:#f1f1f1;">
                        <td class="text-center align-middle">Total</td>
                        <td class="text-center align-middle">{{ $menTotal }}</td>
                        <td class="text-center align-middle">{{ $womenTotal }}</td>

                        <td class="text-center align-middle">{{ $Total }}</td>

                    </tr>
                </tbody>
            </table>

            @elseif(isset($case->yes_no_other) && !empty($case->yes_no_other->other_instances_trafficking_q56))
            <div class="alert alert-info">
                <strong>Other Description:</strong> {{ $case->yes_no_other->other_instances_trafficking_q56 }}
            </div>


            @else
            <div class="text-center py-3">
                <p class="text-muted">No data available for this section.</p>
            </div>
            @endif



        </div>
    </div>
</div>