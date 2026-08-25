<div class="card">
    <div class="card-header" role="tab" id="heading-4">
        <h6 class="mb-0">
            <a data-toggle="collapse" href="#Question-26" aria-expanded="false" aria-controls="collapse-4">
                26.{{ $questiontitles[25]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-26" class="collapse" role="tabpane26" aria-labelledby="heading-4" data-parent="#accordion-2">
        <div class="card-body">
            <div id="six_question_view">
                @if(isset($case->yes_no_other) && $case->yes_no_other->is_consistent_victim_approach_q26 == 1)


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
                        @foreach($case->twentysix as $twentysix)
                        <tr>
                            <th>{{$twentysix->location_q26}}</th>

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

                                {{ $categories[$twentysix->category_q26] ?? 'N/A' }}
                            </th>
                            <th>
                                @php
                                $ratings = [
                                1 => 'Excellent',
                                2 => 'Good',
                                3 => 'Fair',
                                4 => 'Poor',
                                5 => 'Extremely Poor',
                                6 => 'Non-Functional'
                                ];
                                @endphp

                                {{ $ratings[$twentysix->ngo_rating_q26] ?? 'N/A' }}
                            </th>
                            <th>
                                {{$twentysix->men_q26}}
                            </th>
                            <th>
                                {{$twentysix->women_q26}}
                            </th>
                            <th>
                                {{$twentysix->total_q26}}
                            </th>


                        </tr>
                        @php
                        $menTotal += $twentysix->men_q26;
                        $womenTotal += $twentysix->women_q26;
                        $Total += $twentysix->total_q26;


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
                        @foreach($case->twentysixb as $twentysixb)
                        <tr>
                            <th>{{$twentysixb->location_q26b}}</th>

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

                                {{ $categories[$twentysixb->category_q26b] ?? 'N/A' }}
                            </th>
                            <th>
                                @php
                                $ratings = [
                                1 => 'Excellent',
                                2 => 'Good',
                                3 => 'Fair',
                                4 => 'Poor',
                                5 => 'Extremely Poor',
                                6 => 'Non-Functional'
                                ];
                                @endphp

                                {{ $ratings[$twentysixb->ngo_rating_q26b] ?? 'N/A' }}
                            </th>
                            <th>
                                {{$twentysixb->men_q26b}}
                            </th>
                            <th>
                                {{$twentysixb->women_q26b}}
                            </th>
                            <th>
                                {{$twentysixb->total_q26b}}
                            </th>


                        </tr>
                        @php
                        $menTotal += $twentysixb->men_q26b;
                        $womenTotal += $twentysixb->women_q26b;
                        $Total += $twentysixb->total_q26b;


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

                @elseif(isset($case->yes_no_other) &&
                !empty($case->yes_no_other->other_consistent_victim_approach_q26))
                <div class="alert alert-info">
                    <strong>Other Description:</strong>
                    {{ $case->yes_no_other->other_consistent_victim_approach_q26 }}
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