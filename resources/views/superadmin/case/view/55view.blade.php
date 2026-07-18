<?php
if (($questiontitles[54]->status ?? null) == 1) {

?>
    <div class="card">
        <div class="card-header" role="tab" id="heading-4">
            <h6 class="mb-0">
                <a data-toggle="collapse" href="#Question-55" aria-expanded="false"
                    aria-controls="collapse-4">
                    55.{{ $questiontitles[54]->title }}
                </a>
            </h6>
        </div>

        <div id="Question-55" class="collapse" role="tabpane55" aria-labelledby="heading-4"
            data-parent="#accordion-2">
            <div class="card-body">
                @if(isset($case->yes_no_other) && $case->yes_no_other->is_government_provide_trafficking_q55 == 1)
                <table class="table table-white table-bordered">
                    <thead class="text-center align-middle">
                        <tr style="background:#E5E5E5;">
                            <th rowspan="2" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Country where posted</th>
                            <th rowspan="2" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Description</th>
                            <th colspan="4" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Coverage of Training</th>

                        </tr>
                        <tr style="background:#E5E5E5;">
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Men</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Women</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">TG</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Total</th>
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
                            <td>
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
                            </td>
                            <td>{{$fiftyfive->government_provide_description_q55}}</td>
                            <td class="text-center align-middle">{{$fiftyfive->government_provide_men_q55}}</td>
                            <td class="text-center align-middle">{{$fiftyfive->government_provide_women_q55}}</td>
                            <td class="text-center align-middle">{{$fiftyfive->government_provide_tg_q55}}</td>
                            <td class="text-center align-middle">{{$fiftyfive->government_provide_total_q55}}</td>


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
                            <td class="text-center align-middle">{{ $menTotal }}</td>
                            <td class="text-center align-middle">{{ $womenTotal }}</td>
                            <td class="text-center align-middle">{{ $thirdTotal }}</td>
                            <td class="text-center align-middle">{{ $Total }}</td>

                        </tr>
                    </tbody>
                </table>
                @elseif(isset($case->yes_no_other) && !empty($case->yes_no_other->other_government_provide_trafficking_q55))
                <div class="alert alert-info">
                    <strong>Other Description:</strong> {{ $case->yes_no_other->other_government_provide_trafficking_q55 }}
                </div>

                @else
                <div class="text-center py-3">
                    <p class="text-muted">No data available for this section.</p>
                </div>
                @endif

            </div>
        </div>
    </div>

<?php } ?>