<?php
if (($questiontitles[23]->status ?? null) == 1) {

?>
  <div class="card">
    <div class="card-header" role="tab" id="heading-4">
      <h6 class="mb-0">
        <a data-toggle="collapse" href="#Question-54" aria-expanded="false"
          aria-controls="collapse-4">
          24.{{ $questiontitles[23]->title }}
        </a>
      </h6>
    </div>

    <div id="Question-54" class="collapse" role="tabpane54" aria-labelledby="heading-4"
      data-parent="#accordion-2">
      <div class="card-body">

        <table class="table table-white table-bordered">
          <thead class="text-center align-middle">
            <tr style="background:#E5E5E5;">
              <th rowspan="2" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Protection Services</th>
              <th rowspan="2" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Quality</th>
              <th colspan="6" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Quality of Current Coverage</th>
              <th rowspan="2" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Location</th>
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
              <td class="text-center align-middle">{{$twentyfour->specialized_trafficking_victims_total_q24}}</td>
              <td>
                @php
                $locations = $twentyfour->specialized_trafficking_victims_location_q24;

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


      </div>
    </div>
  </div>

<?php } ?>