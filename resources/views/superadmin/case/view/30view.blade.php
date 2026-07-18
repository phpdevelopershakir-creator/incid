<?php
if (($questiontitles[29]->status ?? null) == 1) {

?>
<div class="card">
    <div class="card-header" role="tab" id="heading-30">
        <h6 class="mb-0">
            <a data-toggle="collapse" href="#Question-30" aria-expanded="false" aria-controls="collapse-4">
                30.{{ $questiontitles[29]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-30" class="collapse" role="tabpane30" aria-labelledby="heading-30" data-parent="#accordion-2">
        <div class="card-body">
            @if(isset($case->yes_no_other) && $case->yes_no_other->is_foreign_victims_q30 == 1)
            <table class="table table-white table-bordered">
                <thead class="text-center align-middle">
                    <tr style="background:#E5E5E5;">
                        <th rowspan="2" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">
                            Protection Services</th>
                        <th rowspan="2" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">
                            Quality</th>
                        <th colspan="6" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">
                            Quality of Current Coverage</th>
                        <th rowspan="2" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">
                            Origin of VoT </th>

                    </tr>
                    <tr style="background:#E5E5E5;">
                        <th>Men</th>
                        <th>Women</th>
                        <th>TG</th>
                        <th>Boy</th>
                        <th>Girl</th>
                        <th>Total</th>
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

                    {{-- 💡 লজিক ফিক্স: শুধুমাত্র যে রো-তে টোটাল ভিকটিম ০ থেকে বেশি আছে, সেগুলোই টেবিলে দেখাবে --}}
                    @if(($thirty->citizen_victims_total_q30 ?? 0) > 0)
                    <tr>
                        <td class="text-center align-middle">
                            @if(is_numeric($thirty->citizen_victims_services_q30) &&
                            $thirty->citizen_victims_services_q30 >= 1 && $thirty->citizen_victims_services_q30 <= 15)
                                @if($thirty->citizen_victims_services_q30 == 1) Economic Support/Asset Transfer
                                @elseif($thirty->citizen_victims_services_q30 == 2) Micro Credit
                                @elseif($thirty->citizen_victims_services_q30 == 3) Livelihood Training
                                @elseif($thirty->citizen_victims_services_q30 == 4) Job Placement
                                @elseif($thirty->citizen_victims_services_q30 == 5) Health Care
                                @elseif($thirty->citizen_victims_services_q30 == 6) Psychosocial Care
                                @elseif($thirty->citizen_victims_services_q30 == 7) Shelter
                                @elseif($thirty->citizen_victims_services_q30 == 8) Social Safetynet
                                @elseif($thirty->citizen_victims_services_q30 == 9) Information Support
                                @elseif($thirty->citizen_victims_services_q30 == 10) Mainstream Education
                                @elseif($thirty->citizen_victims_services_q30 == 11) Non Formal Education
                                @elseif($thirty->citizen_victims_services_q30 == 12) Technical Education
                                @elseif($thirty->citizen_victims_services_q30 == 13) Life Skill
                                @elseif($thirty->citizen_victims_services_q30 == 14) Family Reunion
                                @elseif($thirty->citizen_victims_services_q30 == 15) Referral
                                @endif
                                @else
                                {{ $thirty->citizen_victims_services_q30 }}
                                @endif
                        </td>
                        <td class="text-center align-middle">
                            @if($thirty->citizen_victims_quality_q30 == 1) Excess
                            @elseif($thirty->citizen_victims_quality_q30 == 2) Adequate
                            @elseif($thirty->citizen_victims_quality_q30 == 3) Inadequate
                            @elseif($thirty->citizen_victims_quality_q30 == 4) None
                            @endif
                        </td>
                        <td class="text-center align-middle">{{ $thirty->citizen_victims_men_q30 }}</td>
                        <td class="text-center align-middle">{{ $thirty->citizen_victims_women_q30 }}</td>
                        <td class="text-center align-middle">{{ $thirty->citizen_victims_tg_q30 }}</td>
                        <td class="text-center align-middle">{{ $thirty->citizen_victims_boy_q30 }}</td>
                        <td class="text-center align-middle">{{ $thirty->citizen_victims_girl_q30 }}</td>
                        <td class="text-center align-middle">{{ $thirty->citizen_victims_total_q30 }}</td>
                        <td class="text-center align-middle">
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
                    @endif
                    @endforeach
                    <tr style="font-weight:bold; background:#f1f1f1;">
                        <td colspan="2" class="text-center align-middle">Total</td>
                        <td class="text-center align-middle">{{ $menTotal }}</td>
                        <td class="text-center align-middle">{{ $womenTotal }}</td>
                        <td class="text-center align-middle">{{ $thirdTotal }}</td>
                        <td class="text-center align-middle">{{ $boyTotal }}</td>
                        <td class="text-center align-middle">{{ $girlTotal }}</td>
                        <td class="text-center align-middle">{{ $Total }}</td>
                        <td></td>
                    </tr>

                </tbody>
            </table>
            @elseif(isset($case->yes_no_other) && !empty($case->yes_no_other->other_foreign_victims_q30))
            <div class="alert alert-info">
                <strong>Other Description:</strong> {{ $case->yes_no_other->other_foreign_victims_q30 }}
            </div>

            @else
            <div class="text-center py-3">
                <p class="text-muted">No data available for this section.</p>
            </div>
            @endif

        </div>
    </div>
</div>
<?php
}
?>