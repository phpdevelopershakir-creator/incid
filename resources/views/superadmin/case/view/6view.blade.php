<?php
if (($questiontitles[5]->status ?? null) == 1) {

?>


  <div class="card">
    <div class="card-header" role="tab" id="heading-4">
      <h6 class="mb-0">
        <a data-toggle="collapse" href="#Question-6" aria-expanded="false"
          aria-controls="collapse-4">
          6.{{ $questiontitles[5]->title }}
        </a>
      </h6>
    </div>

    <div id="Question-6" class="collapse" role="tabpane6" aria-labelledby="heading-4"
      data-parent="#accordion-2">
      <div class="card-body">
        <div id="six_question_view">
          @if(isset($case->yes_no_other) && $case->yes_no_other->is_unit_court_q6 == 1)
          <table class="table table-white table-bordered">

            <thead class="text-center align-middle">
              <tr style="background:#E5E5E5;">
                <th rowspan="3" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Ministry/Department</th>

              <tr style="background:#E5E5E5;">
                <th colspan="3" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Number of Official Accused</th>
                <th colspan="1" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Result of which Policy/Law/ response </th>
              </tr>
              <tr style="background:#E5E5E5;">
                <th>Men</th>
                <th>Women</th>
                <th>Total</th>
                <td>Response</td>

              </tr>
            </thead>
            <tbody>
              @php
              $menTotal = 0;
              $womenTotal = 0;
              $Total = 0;

              @endphp
              @foreach($case->six as $six)
              <tr>

                <td>{{$six->labor_title_q6}}</td>
                <td class="text-center align-middle">{{$six->labor_men_q6}}</td>
                <td class="text-center align-middle">{{$six->labor_women_q6}}</td>
                <td class="text-center align-middle">{{$six->labor_total_q6}}</td>
                <td>{{$six->labor_response_q6}}</td>
              </tr>
              @php
              $menTotal += $six->labor_men_q6;
              $womenTotal += $six->labor_women_q6;
              $Total += $six->labor_total_q6;


              @endphp
              @endforeach
              <tr style="font-weight:bold; background:#f1f1f1;">
                <td>Total</td>
                <td class="text-center align-middle">{{ $menTotal }}</td>
                <td class="text-center align-middle">{{ $womenTotal }}</td>
                <td class="text-center align-middle">{{ $Total }}</td>

              </tr>

            </tbody>
          </table>
          @elseif(isset($case->yes_no_other) && !empty($case->yes_no_other->others_unit_court_q6))
          <div class="alert alert-info">
            <strong>Other Description:</strong> {{ $case->yes_no_other->others_unit_court_q6 }}
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