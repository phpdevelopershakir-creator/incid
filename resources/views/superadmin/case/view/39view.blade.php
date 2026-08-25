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
            <a data-toggle="collapse" href="#Question-39" aria-expanded="false" aria-controls="collapse-4">
                39.{{ $questiontitles[38]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-39" class="collapse" role="tabpane39" aria-labelledby="heading-4" data-parent="#accordion-2">
        <div class="card-body">


            <div class="q15-wrapper">
                @foreach($case->thirtynine as $thirtynine)
                <div class="q15-item-card p-3 mb-3">
                    <!-- 1. Description One -->
                    <div class="mb-2">
                        <strong class="text-secondary d-block">Description :</strong>
                        <span>{{ $thirtynine->victims_restitution_title_one_q39 }}</span>
                    </div>

                    <!-- 2. Description Two -->
                    <div class="mb-2">
                        <strong class="text-secondary d-block">Description :</strong>
                        <span>{{ $thirtynine->victims_restitution_title_two_q39 }}</span>
                    </div>

                    <!-- 3. Description Three -->
                    <div class="mb-2">
                        <strong class="text-secondary d-block">Description :</strong>
                        <span>{{ $thirtynine->victims_restitution_title_three_q39 }}</span>
                    </div>

                    <div class="mb-2">
                        <strong class="text-secondary d-block">Description :</strong>
                        <span>{{ $thirtynine->victims_restitution_title_four_q39 }}</span>
                    </div>

                </div>
                @endforeach
            </div>
            <br>
            <table class="table table-bordered text-center">
                <thead class="text-center align-middle">
                    <tr style="background:#E5E5E5;">
                        <th rowspan="2" style="vertical-align: middle;">Location</th>
                        <th colspan="5">Number of personnel Trained</th>
                    </tr>
                    <tr style="background:#E5E5E5;">
                        <th>Category</th>
                        <th>NGO/INGO </th>
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
                    @foreach($case->thirtynineb as $thirtynineb)
                    <tr>
                        <th>{{$thirtynineb->victims_restitution_location_q39b}}</th>

                        <th>
                            @php
                            $categories = [
                            1 => 'Social Worker',
                            2 => 'Police',
                            3 => 'BGB',
                            4 => 'Coastguard',
                            5 => 'VDP',
                            6 => 'Rail Police',
                            7 => 'Judiciary',
                            8 => 'NGO',
                            9 => 'Others'
                            ];
                            @endphp

                            {{ $categories[$thirtynineb->victims_restitution_location_q39b] ?? 'N/A' }}
                        </th>
                        <th>
                            {{$thirtynineb->victims_restitution_category_q39b}}

                        </th>
                        <th>
                            {{$thirtynineb->victims_restitution_men_q39b}}
                        </th>
                        <th>
                            {{$thirtynineb->victims_restitution_women_q39b}}
                        </th>
                        <th>
                            {{$thirtynineb->victims_restitution_total_q39b}}
                        </th>


                    </tr>
                    @php
                    $menTotal += $thirtynineb->victims_restitution_men_q39b;
                    $womenTotal += $thirtynineb->victims_restitution_women_q39b;
                    $Total += $thirtynineb->victims_restitution_total_q39b;


                    @endphp
                    @endforeach
                    <tr style="font-weight:bold; background:#f1f1f1;">
                        <td colspan="3">Total</td>
                        <td class="text-center align-middle">{{ $menTotal }}</td>
                        <td class="text-center align-middle">{{ $womenTotal }}</td>
                        <td class="text-center align-middle">{{ $Total }}</td>

                    </tr>
                </tbody>
            </table>



        </div>
    </div>
</div>