<?php
if (($questiontitles[20]->status ?? null) == 1) {

?>
  <div class="card">
    <div class="card-header" role="tab" id="heading-4">
      <h6 class="mb-0">
        <a data-toggle="collapse" href="#Question-21" aria-expanded="false"
          aria-controls="collapse-4">
          21.{{ $questiontitles[20]->title }}
        </a>
      </h6>
    </div>

    <div id="Question-21" class="collapse" role="tabpane4" aria-labelledby="heading-4"
      data-parent="#accordion-2">
      <div class="card-body">
        @if(isset($case->yes_no_other) && $case->yes_no_other->is_crime_justice_q21 == 1)
        <table class="table table-white table-bordered">
          <thead class="text-center align-middle">
            <tr style="background:#E5E5E5;">
              <th rowspan="2" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Name of the Shalters </th>
              <th rowspan="2" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Operators </th>
              <th colspan="3" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Capacity </th>
              <th rowspan="2" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Specialized for Trafficking? </th>
              <th rowspan="2" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Eligible Victims</th>
              <th rowspan="2" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Note</th>
            </tr>
            <tr style="background:#E5E5E5;">
              <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Men</th>
              <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Women</th>
              <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Total</th>
            </tr>
          </thead>

          @php
          $menTotal = 0;
          $womenTotal = 0;
          $Total = 0;

          @endphp
          @foreach($case->twentyone as $twentyone)
          <tr>
            <td> {{$twentyone->name_q21}}</td>
            <td> {{$twentyone->operator_q21}}</td>
            <td class="text-center align-middle"> {{$twentyone->capacity_men_q21}}</td>
            <td class="text-center align-middle"> {{$twentyone->capacity_women_q21}}</td>
            <td class="text-center align-middle"> {{$twentyone->capacity_total_q21}}</td>
            <td> {{$twentyone->is_specialized_q21}}</td>
            <td> {{$twentyone->eligible_victims_q21}}</td>
            <td> {{$twentyone->note_q21}}</td>

          </tr>
          @php
          $menTotal += $twentyone->capacity_men_q21;
          $womenTotal += $twentyone->capacity_women_q21;
          $Total += $twentyone->capacity_total_q21;
          @endphp
          @endforeach
          <tr style="font-weight:bold; background:#f1f1f1;">
            <td colspan="2">Total</td>
            <td class="text-center align-middle">{{ $menTotal }}</td>
            <td class="text-center align-middle">{{ $womenTotal }}</td>
            <td class="text-center align-middle">{{ $Total }}</td>

          </tr>
          </tbody>
        </table>
        @elseif(isset($case->yes_no_other) && !empty($case->yes_no_other->other_crime_justice_q21))
        <div class="alert alert-info">
          <strong>Other Description:</strong> {{ $case->yes_no_other->other_crime_justice_q21 }}
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