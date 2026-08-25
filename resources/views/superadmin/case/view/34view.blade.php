<div class="card">
    <div class="card-header" role="tab" id="heading-4">
        <h6 class="mb-0">
            <a data-toggle="collapse" href="#Question-34" aria-expanded="false" aria-controls="Question-34">
                34. {{ $questiontitles[33]->title ?? '' }}
            </a>
        </h6>
    </div>

    <div id="Question-34" class="collapse" role="tabpanel" aria-labelledby="heading-4" data-parent="#accordion-2">
        <div class="card-body">
            <div id="six_question_view">
                @if(isset($case->yes_no_other) && $case->yes_no_other->is_newly_identified_victims_q34 == 1)

                <p>How many newly identified victims participated in the investigation and prosecution of traffickers?
                </p>

                <table class="table table-bordered text-center">
                    <thead>
                        <tr style="background:#E5E5E5;">
                            <th>Number of victims participated in Investigation</th>
                            <th>Men</th>
                            <th>Women</th>
                            <th>TG</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($case->thirtyfour as $thirtyfour)
                        <tr>
                            <td>{{ $thirtyfour->number_victims_q34 }}</td>
                            <td>{{ $thirtyfour->men_victims_q34 }}</td>
                            <td>{{ $thirtyfour->women_victims_q34 }}</td>
                            <td>{{ $thirtyfour->tg_victims_q34 }}</td>
                            <td>{{ $thirtyfour->total_victims_q34 }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <br>
                <p>What, if any, support did the government provide to victims who assisted in the investigation and
                    prosecution of trafficking cases, such as visa categories that facilitate cooperation with law
                    enforcement, legal support and advice, witness protection, and victim-witness advocates?</p>

                <table class="table table-bordered text-center">
                    <thead>
                        <tr style="background:#E5E5E5;">
                            <th rowspan="2" style="vertical-align: middle;">Type of Support</th>
                            <th colspan="4">Number of VoTs receiving support</th>
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

                        @foreach($case->thirtyfourb as $thirtyfourb)
                        <tr>
                            <td>
                                @php
                                $supportTypes = [
                                1 => 'Visa Categories',
                                2 => 'Legal Support & Advice',
                                3 => 'Witness Protection',
                                4 => 'Victim-Witness Advocates',
                                5 => 'Others'
                                ];
                                @endphp

                                {{ $supportTypes[$thirtyfourb->number_victims_q34b] ?? 'Other Support' }}


                            </td>
                            <td>{{ $thirtyfourb->men_victims_q34b }}</td>
                            <td>{{ $thirtyfourb->women_victims_q34b }}</td>
                            <td>{{ $thirtyfourb->tg_victims_q34b }}</td>
                            <td>{{ $thirtyfourb->total_victims_q34b }}</td>
                        </tr>

                        @php
                        $menTotal += $thirtyfourb->men_victims_q34b;
                        $womenTotal += $thirtyfourb->women_victims_q34b;
                        $tgTotal += $thirtyfourb->tg_victims_q34b;
                        $Total += $thirtyfourb->total_victims_q34b;
                        @endphp
                        @endforeach

                        <tr style="font-weight:bold; background:#f1f1f1;">
                            <td>Total</td>
                            <td>{{ $menTotal }}</td>
                            <td>{{ $womenTotal }}</td>
                            <td>{{ $tgTotal }}</td>
                            <td>{{ $Total }}</td>
                        </tr>
                    </tbody>
                </table>

                @elseif(isset($case->yes_no_other) && !empty($case->yes_no_other->other_newly_identified_victims_q34))
                <div class="alert alert-info">
                    <strong>Other Description:</strong>
                    {{ $case->yes_no_other->other_newly_identified_victims_q34 }}
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