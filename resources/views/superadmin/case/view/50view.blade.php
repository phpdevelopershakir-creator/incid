<?php
if (($questiontitles[49]->status ?? null) == 1) {

?>
  <div class="card">
    <div class="card-header" role="tab" id="heading-4">
      <h6 class="mb-0">
        <a data-toggle="collapse" href="#Question-50" aria-expanded="false"
          aria-controls="collapse-4">
          50.{{ $questiontitles[49]->title }}
        </a>
      </h6>
    </div>

    <div id="Question-50" class="collapse" role="tabpane50" aria-labelledby="heading-4"
      data-parent="#accordion-2">
      <div class="card-body">
        <div id="six_question_view">
          @if(isset($case->yes_no_other) && $case->yes_no_other->is_exploitative_treatment_q50 == 1)
          <table class="table table-white table-bordered">
            <thead class="text-center align-middle">
              <tr style="background:#E5E5E5;">
                <th scope="col" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Action </th>
                <th scope="col" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Attach/Upload Pdf</th>
              </tr>
            </thead>
            <tbody>
              @foreach($case->fifty as $fifty)
              <tr>
                <td style="text-align: left;">
                  @if($fifty->exploitative_treatment_title_q50 == 1)
                  Strict Monitoring of impacts of policies
                  @elseif ($fifty->exploitative_treatment_title_q50 == 2)
                  Promotion of safe migration
                  @elseif ($fifty->exploitative_treatment_title_q50 == 3)
                  Awareness raising of vulnerable groups
                  @elseif ($fifty->exploitative_treatment_title_q50 == 4)
                  Expansion of safety-net for vulnerable groups
                  @elseif ($fifty->exploitative_treatment_title_q50 == 5)
                  Promotion of skilling among vulnerable groups
                  @else
                  {{$fifty->exploitative_treatment_title_q50}}
                  @endif
                </td>


                <td>
                  @if(!empty($fifty->document_upload_q50))
                  <a href="{{ asset($fifty->document_upload_q50) }}" target="_blank">View</a>
                  @else
                  not Found
                  @endif

                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @elseif(isset($case->yes_no_other) && !empty($case->yes_no_other->other_exploitative_treatment_q50))
          <div class="alert alert-info">
            <strong>Other Description:</strong> {{ $case->yes_no_other->other_exploitative_treatment_q50 }}
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