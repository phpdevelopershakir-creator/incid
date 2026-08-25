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
            <a data-toggle="collapse" href="#Question-40" aria-expanded="false" aria-controls="collapse-4">
                40.{{ $questiontitles[39]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-40" class="collapse" role="tabpane40" aria-labelledby="heading-4" data-parent="#accordion-2">
        <div class="card-body">


            <div class="q15-wrapper">
                @foreach($case->forty as $forty)
                <div class="q15-item-card p-3 mb-3">
                    <!-- 1. Description One -->
                    <div class="mb-2">
                        <strong class="text-secondary d-block">Description :</strong>
                        <span>{{ $forty->victims_traffickers_title_one_q40 }}</span>
                    </div>

                    <!-- 2. Description Two -->
                    <div class="mb-2">
                        <strong class="text-secondary d-block">Description :</strong>
                        <span>{{ $forty->victims_traffickers_title_two_q40 }}</span>
                    </div>




                </div>
                @endforeach
            </div>
            <br>
            @if(isset($case->yes_no_other) && $case->yes_no_other->is_victims_civil_traffickers_q40 == 1)
            <table class="table table-bordered text-center">
                <thead class="text-center align-middle">
                    <tr style="background:#E5E5E5;">
                        <th rowspan="2" style="vertical-align: middle;">Location</th>
                        <th colspan="3">Number of personnel Trained</th>
                    </tr>
                    <tr style="background:#E5E5E5;">


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
                    @foreach($case->fortyb as $fortyb)
                    <tr>
                        <th>{{$fortyb->victims_traffickers_location_q40b}}</th>


                        <th>
                            {{$fortyb->victims_traffickers_men_q40b}}

                        </th>

                        <th>
                            {{$fortyb->victims_traffickers_women_q40b}}
                        </th>
                        <th>
                            {{$fortyb->victims_traffickers_total_q40b}}
                        </th>


                    </tr>
                    @php
                    $menTotal += $fortyb->victims_traffickers_men_q40b;
                    $womenTotal += $fortyb->victims_traffickers_women_q40b;
                    $Total += $fortyb->victims_traffickers_total_q40b;


                    @endphp
                    @endforeach
                    <tr style="font-weight:bold; background:#f1f1f1;">
                        <td>Total</td>
                        <td class="text-center align-middle">{{ $menTotal }}</td>
                        <td class="text-center align-middle">{{ $womenTotal }}</td>
                        <td class="text-center align-middle">{{ $Total }}</td>

                    </tr>
                </tbody>
            </table>
            @elseif(isset($case->yes_no_other) &&
            !empty($case->yes_no_other->other_victims_civil_traffickers_q40))
            <div class="alert alert-info">
                <strong>Other Description:</strong>
                {{ $case->yes_no_other->other_victims_civil_traffickers_q40 }}
            </div>


            @else
            <div class="text-center py-3">
                <p class="text-muted">No data available for this section.</p>
            </div>
            @endif


        </div>
    </div>
</div>