<?php
if (($questiontitles[16]->status ?? null) == 1) {

?>
  <div class="card">
    <div class="card-header" role="tab" id="heading-4">
      <h6 class="mb-0">
        <a data-toggle="collapse" href="#Question-17" aria-expanded="false"
          aria-controls="collapse-4">
          17.{{ $questiontitles[16]->title }}
        </a>
      </h6>
    </div>

    <div id="Question-17" class="collapse" role="tabpane17" aria-labelledby="heading-4"
      data-parent="#accordion-2">
      <div class="card-body">
        @if(isset($case->yes_no_other) && $case->yes_no_other->is_report_country_narrative_protection_q17 == 1)
        <table class="table table-white table-bordered">
          <thead class="text-center align-middle">
            <tr style="background:#E5E5E5;">
              <th rowspan="2" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Title of Original Guideline</th>


              <th rowspan="2" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Description of change/Status</th>
              <th colspan="4">VoT referred</th>

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
            @foreach($case->seventeen as $seventeen)
            <tr>
              <td>
                @if($seventeen->report_country_narrative_protection_title_q17 == 1)
                Referral desk established at women and Child Repression Prevention Tribunals,Anti-Trafficking Tribunals, and District tribunals
                @elseif ($seventeen->report_country_narrative_protection_title_q17 == 2)
                National Referral Mechanism Guideline
                @elseif ($seventeen->report_country_narrative_protection_title_q17 == 3)
                National Referral Mechanism SOP
                @elseif ($seventeen->report_country_narrative_protection_title_q17 == 4)
                Digital Referral Mechanism of MoHA
                @else
                {{$seventeen->report_country_narrative_protection_title_q17}}
                @endif
              </td>
              <td>
                @if($seventeen->report_country_narrative_protection_description_q17 == 1)
                Enforced
                @elseif ($seventeen->report_country_narrative_protection_description_q17 == 2)
                Updated and enforced
                @elseif ($seventeen->report_country_narrative_protection_description_q17 == 3)
                Stricter enforcement
                @elseif ($seventeen->report_country_narrative_protection_description_q17 == 4)
                Increases efforts
                @endif
              </td>

              <td class="text-center align-middle">{{$seventeen->report_country_narrative_protection_men_q17}}</td>
              <td class="text-center align-middle">{{$seventeen->report_country_narrative_protection_women_q17}}</td>
              <td class="text-center align-middle">{{$seventeen->report_country_narrative_protection_tg_q17}}</td>
              <td class="text-center align-middle">{{$seventeen->report_country_narrative_protection_total_q17}}</td>


            </tr>
            @php
            $menTotal += $seventeen->report_country_narrative_protection_men_q17;
            $womenTotal += $seventeen->report_country_narrative_protection_women_q17;
            $thirdTotal += $seventeen->report_country_narrative_protection_tg_q17;
            $Total += $seventeen->report_country_narrative_protection_total_q17;
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
        @elseif(isset($case->yes_no_other) && !empty($case->yes_no_other->other_report_country_narrative_protection_q17))
        <div class="alert alert-info">
          <strong>Other Description:</strong> {{ $case->yes_no_other->other_report_country_narrative_protection_q17 }}
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