<?php
if (($questiontitles[30]->status ?? null) == 1) {

?>
  <div class="card">
    <div class="card-header" role="tab" id="heading-31">
      <h6 class="mb-0">
        <a data-toggle="collapse" href="#Question-31" aria-expanded="false"
          aria-controls="collapse-4">
          31.{{ $questiontitles[30]->title }}
        </a>
      </h6>
    </div>

    <div id="Question-31" class="collapse" role="tabpane31" aria-labelledby="heading-31"
      data-parent="#accordion-2">
      <div class="card-body">
        <div id="six_question_view">
          @if(isset($case->yes_no_other) && $case->yes_no_other->is_citizen_victims_abroad_q31 == 1)
          <table class="table table-white table-bordered">
            <thead class="text-center align-middle">
              <tr style="background:#E5E5E5;">
                <th rowspan="2" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Country where posted</th>
                <th rowspan="2" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Status of coverage</th>
                <th colspan="6" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Number of Nationals receiving the support</th>

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
              @foreach($case->thirtyone as $thirtyone)
              <tr>
                <td>
                  @if($thirtyone->citizen_victims_abroad_name_q31 == 1)
                  India
                  @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 2)
                  Nepal
                  @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 3)
                  Sri lanka
                  @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 4)
                  EU
                  @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 5)
                  USA
                  @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 6)
                  Saudi Arabia
                  @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 7)
                  Qatar
                  @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 8)
                  Lebanon
                  @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 9)
                  Irag
                  @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 10)
                  UAE
                  @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 11)
                  Thailand
                  @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 12)
                  Vietnam
                  @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 13)
                  Cambodia
                  @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 14)
                  South Africa
                  @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 15)
                  Brazil
                  @elseif ($thirtyone->citizen_victims_abroad_name_q31 == 16)
                  UK

                  @else
                  {{$thirtyone->citizen_victims_abroad_name_q31}}
                  @endif
                </td>
                <td>
                {{$thirtyone->citizen_victims_abroad_status_q31 }}
                  
                  
                </td>
                <td class="text-center align-middle">{{$thirtyone->citizen_victims_abroad_men_q31}}</td>
                <td class="text-center align-middle">{{$thirtyone->citizen_victims_abroad_women_q31}}</td>
                <td class="text-center align-middle">{{$thirtyone->citizen_victims_abroad_tg_q31}}</td>
                <td class="text-center align-middle">{{$thirtyone->citizen_victims_abroad_boy_q31}}</td>
                <td class="text-center align-middle">{{$thirtyone->citizen_victims_abroad_girl_q31}}</td>
                <td class="text-center align-middle">{{$thirtyone->citizen_victims_abroad_total_q31}}</td>
                

              </tr>
              @php
              $menTotal += $thirtyone->citizen_victims_abroad_men_q31;
              $womenTotal += $thirtyone->citizen_victims_abroad_women_q31;
              $thirdTotal += $thirtyone->citizen_victims_abroad_tg_q31;
              $boyTotal += $thirtyone->citizen_victims_abroad_boy_q31;
              $girlTotal += $thirtyone->citizen_victims_abroad_girl_q31;
              $Total += $thirtyone->citizen_victims_abroad_total_q31;
              
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
          @elseif(isset($case->yes_no_other) && !empty($case->yes_no_other->other_citizen_victims_abroad_q31))
          <div class="alert alert-info">
            <strong>Other Description:</strong> {{ $case->yes_no_other->other_citizen_victims_abroad_q31 }}
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

<?php } ?>