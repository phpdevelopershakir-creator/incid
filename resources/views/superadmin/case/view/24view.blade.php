<?php
if (($questiontitles[23]->status ?? null) == 1) {

?>

@php
$district_Lists = [
1 => "Bagerhat", 2 => "Bandarban", 3 => "Barguna", 4 => "Barishal",
5 => "Bhola", 6 => "Bogura", 7 => "Brahmanbaria", 8 => "Chandpur",
9 => "Chapainawabganj", 10 => "Chattogram", 11 => "Chuadanga", 12 => "Cumilla",
13 => "Cox's Bazar", 14 => "Dhaka", 15 => "Dinajpur", 16 => "Faridpur",
17 => "Feni", 18 => "Gaibandha", 19 => "Gazipur", 20 => "Gopalganj",
21 => "Habiganj", 22 => "Jamalpur", 23 => "Jashore", 24 => "Jhalakathi",
25 => "Jhenaidah", 26 => "Joypurhat", 27 => "Khagrachari", 28 => "Khulna",
29 => "Kishoreganj", 30 => "Kurigram", 31 => "Kushtia", 32 => "Lakshmipur",
33 => "Lalmonirhat", 34 => "Madaripur", 35 => "Magura", 36 => "Manikganj",
37 => "Meherpur", 38 => "Moulvibazar", 39 => "Munshiganj", 40 => "Mymensingh",
41 => "Naogaon", 42 => "Narail", 43 => "Narayanganj", 44 => "Narsingdi",
45 => "Natore", 46 => "Netrokona", 47 => "Nilphamari", 48 => "Noakhali",
49 => "Pabna", 50 => "Panchagarh", 51 => "Patuakhali", 52 => "Pirojpur",
53 => "Rajbari", 54 => "Rajshahi", 55 => "Rangamati", 56 => "Rangpur",
57 => "Satkhira", 58 => "Shariatpur", 59 => "Sherpur", 60 => "Sirajganj",
61 => "Sunamganj", 62 => "Sylhet", 63 => "Tangail", 64 => "Thakurgaon"
];
@endphp
<div class="card">
    <div class="card-header" role="tab" id="heading-4">
        <h6 class="mb-0">
            <a data-toggle="collapse" href="#Question-54" aria-expanded="false" aria-controls="collapse-4">
                24.{{ $questiontitles[23]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-54" class="collapse" role="tabpane54" aria-labelledby="heading-4" data-parent="#accordion-2">
        <div class="card-body">
            @if(isset($case->yes_no_other) && $case->yes_no_other->is_specialized_trafficking_victims_q24 == 1)
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
                            District</th>
                    </tr>
                    <tr style="background:#E5E5E5;">
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Men</th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Women</th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">TG</th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Boy</th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Girl</th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Total</th>

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
                    @foreach($case->twentyfour as $twentyfour)
                    <tr>
                        <td>
                            @if($twentyfour->specialized_trafficking_victims_protection_q24 == 1)
                            Economic Support/Asset Transfer
                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 2)
                            Micro Credit
                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 3)
                            Livelihood Training
                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 4)
                            Job Placement
                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 5)
                            Health Care
                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 6)
                            Psychosocial Care
                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 7)
                            Shelter
                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 8)
                            Social Safetynet
                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 9)
                            Information Support
                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 10)
                            Mainstream Education
                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 11)
                            Non Formal Education
                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 12)
                            Technical Education
                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 13)
                            Life Skill
                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 14)
                            Family Reunion
                            @elseif ($twentyfour->specialized_trafficking_victims_protection_q24 == 15)
                            Referral

                            @endif
                        </td>
                        <td>
                            @if($twentyfour->specialized_trafficking_victims_quality_q24 == 1)
                            Excellent
                            @elseif ($twentyfour->specialized_trafficking_victims_quality_q24 == 2)
                            As per Standard
                            @elseif ($twentyfour->specialized_trafficking_victims_quality_q24 == 3)
                            Below Standard

                            @endif
                        </td>
                        <td class="text-center align-middle">
                            {{$twentyfour->specialized_trafficking_victims_men_q24}}

                        </td>
                        <td class="text-center align-middle">
                            {{$twentyfour->specialized_trafficking_victims_women_q24}}

                        </td>
                        <td class="text-center align-middle">
                            {{$twentyfour->specialized_trafficking_victims_tg_q24}}

                        </td>
                        <td class="text-center align-middle">
                            {{$twentyfour->specialized_trafficking_victims_boy_q24}}

                        </td>
                        <td class="text-center align-middle">
                            {{$twentyfour->specialized_trafficking_victims_girl_q24}}

                        </td>
                        <td class="text-center align-middle">{{$twentyfour->specialized_trafficking_victims_total_q24}}
                        </td>
                        <td>
                            @php
    $loc = $twentyfour->specialized_trafficking_victims_location_q24 ?? null;
    
    // Jodi location-ti Array ba Object hoy, tobe tar prothom value-ti nebe
    if (is_array($loc)) {
        $loc = reset($loc);
    } elseif (is_object($loc)) {
        $loc = (string) $loc;
    }
@endphp
@if (!empty($loc) && isset($district_Lists[$loc]))
        {{ $district_Lists[$loc] }}
    @else
        {{ $loc }}
    @endif
                        </td>



                    </tr>
                    @php
                    $menTotal += $twentyfour->specialized_trafficking_victims_men_q24;
                    $womenTotal += $twentyfour->specialized_trafficking_victims_women_q24;
                    $thirdTotal += $twentyfour->specialized_trafficking_victims_tg_q24;
                    $boyTotal += $twentyfour->specialized_trafficking_victims_boy_q24;
                    $girlTotal += $twentyfour->specialized_trafficking_victims_girl_q24;
                    $Total += $twentyfour->specialized_trafficking_victims_total_q24;
                    @endphp
                    @endforeach
                    <tr style="font-weight:bold; background:#f1f1f1;">
                        <td colspan="2">Total</td>
                        <td class="text-center align-middle">{{ $menTotal }}</td>
                        <td class="text-center align-middle">{{ $womenTotal }}</td>
                        <td class="text-center align-middle">{{ $thirdTotal }}</td>
                        <td class="text-center align-middle">{{ $boyTotal }}</td>
                        <td class="text-center align-middle">{{ $girlTotal }}</td>
                        <td class="text-center align-middle">{{ $Total }}</td>

                    </tr>

                </tbody>
            </table>
            @elseif(isset($case->yes_no_other) &&
            !empty($case->yes_no_other->other_specialized_trafficking_victims_q24))
            <div class="alert alert-info">
                <strong>Other Description:</strong> {{ $case->yes_no_other->other_specialized_trafficking_victims_q24 }}
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