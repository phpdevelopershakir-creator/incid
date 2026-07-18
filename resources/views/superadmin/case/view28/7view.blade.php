<?php
if (($questiontitles[6]->status ?? null) == 1) {

?>
  <div class="card">
    <div class="card-header" role="tab" id="heading-4">
      <h6 class="mb-0">
        <a data-toggle="collapse" href="#Question-7" aria-expanded="false"
          aria-controls="collapse-4">
          7.{{ $questiontitles[6]->title }}
        </a>
      </h6>
    </div>

    <div id="Question-7" class="collapse" role="tabpane7" aria-labelledby="heading-4"
      data-parent="#accordion-2">
      <div class="card-body">
        <div id="six_question_view">
         <table class="table table-white table-bordered">
            <thead class="text-center align-middle">
              <tr style="background:#E5E5E5;">
                <th rowspan="2" scope="row" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Ministry/Department Municipality body</th>
                <th colspan="5" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Number of Official Accused</th>
              </tr>
              <tr style="background:#E5E5E5;">
                <th scope="row">Men</th>
                <th scope="col">Women</th>
                <th scope="col">Total</th>

              </tr>
            </thead>
            <tbody>
              @php
              $menTotal = 0;
              $womenTotal = 0;
              $Total = 0;

              @endphp
              @foreach($case->seven as $seven)
              <tr>

                <td style="text-align: left;">{{$seven->justice_title_q7}}</td>
                <td class="text-center align-middle">{{$seven->justice_men_q7}}</td>
                <td class="text-center align-middle">{{$seven->justice_women_q7}}</td>
                <td class="text-center align-middle">{{$seven->justice_total_q7}}</td>
              </tr>
              @php
              $menTotal += $seven->justice_men_q7;
              $womenTotal += $seven->justice_women_q7;
              $Total += $seven->justice_total_q7;


              @endphp
              @endforeach
              <tr style="font-weight:bold; background:#f1f1f1;">
                <td style="text-align: left;">Total</td>
                <td class="text-center align-middle">{{ $menTotal }}</td>
                <td class="text-center align-middle">{{ $womenTotal }}</td>
                <td class="text-center align-middle">{{ $Total }}</td>

              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

<?php } ?>