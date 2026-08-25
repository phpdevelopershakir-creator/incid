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
            <a data-toggle="collapse" href="#Question-41" aria-expanded="false" aria-controls="collapse-4">
                41.{{ $questiontitles[40]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-41" class="collapse" role="tabpane41" aria-labelledby="heading-4" data-parent="#accordion-2">
        <div class="card-body">


            <div class="q15-wrapper">
                @foreach($case->fortyone as $fortyone)
                <div class="q15-item-card p-3 mb-3">
                    <!-- 1. Description One -->
                    <div class="mb-2">
                        <strong class="text-secondary d-block">Description :</strong>
                        <span>{{ $fortyone->convicted_traffickers_title_one_q41 }}</span>
                    </div>

                    <!-- 2. Description Two -->
                    <div class="mb-2">
                        <strong class="text-secondary d-block">Description :</strong>
                        <span>{{ $fortyone->convicted_traffickers_title_two_q41 }}</span>
                    </div>




                </div>
                @endforeach
            </div>
            <br>
            @if(isset($case->yes_no_other) && $case->yes_no_other->is_convicted_traffickers_q41 == 1)
            <table class="table table-bordered text-center">
                <thead class="text-center align-middle">

                    <tr style="background:#E5E5E5;">
                        <th>Location</th>
                        <th>Case No</th>
                        <th>No of Men</th>
                        <th>Amount</th>
                        <th>No of Women</th>
                        <th>Amount</th>
                        <th>Total No of Traffickers</th>
                        <th>Total amount</th>
                    </tr>

                </thead>
                <tbody>

                    @foreach($case->fortyoneb as $fortyoneb)
                    <tr>
                        <th>{{$fortyoneb->convicted_traffickers_location_q41b}}</th>


                        <th>
                            {{$fortyoneb->convicted_traffickers_case_q41b}}

                        </th>

                        <th>
                            {{$fortyoneb->convicted_traffickers_men_q41b}}
                        </th>
                        <th>
                            {{$fortyoneb->convicted_traffickers_men_amount_q41b}}
                        </th>

                        <th>
                            {{$fortyoneb->convicted_traffickers_women_q41b}}
                        </th>

                        <th>
                            {{$fortyoneb->convicted_traffickers_women_amount_q41b}}
                        </th>

                        <th>
                            {{$fortyoneb->convicted_traffickers_total_trafic_q41b}}
                        </th>

                        <th>
                            {{$fortyoneb->convicted_traffickers_total_amount_q41b}}
                        </th>


                    </tr>

                    @endforeach

                </tbody>
            </table>
            @elseif(isset($case->yes_no_other) &&
            !empty($case->yes_no_other->other_convicted_traffickers_q41))
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