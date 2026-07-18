<?php
if (($questiontitles[8]->status ?? null) == 1) {

?>

  <div class="card">
    <div class="card-header" role="tab" id="heading-4">
      <h6 class="mb-0">
        <a data-toggle="collapse" href="#Question-9" aria-expanded="false"
          aria-controls="collapse-4">
          9.{{ $questiontitles[8]->title }}
        </a>
      </h6>
    </div>

    <div id="Question-9" class="collapse" role="tabpane9" aria-labelledby="heading-4"
      data-parent="#accordion-2">
      <div class="card-body">
        <div id="six_question_view">
          @if(isset($case->yes_no_other) && $case->yes_no_other->is_exclusively_trafficking_q9 == 1)
          <table class="table table-white table-bordered">
            <thead class="text-center align-middle">
              <tr style="background:#E5E5E5;">
                <th scope="col" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Description</th>
                <th scope="col" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Please Select Yes/No</th>
                <th scope="col" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Opinion</th>
              </tr>
            </thead>
            <tbody>
              @foreach($case->nine as $nine)
              <tr>
                <td style="text-align: left;">

                  {{$nine->court_title_q9}}
                </td>
                <td>
                  {{ $nine->court_type_q9 == 1 ? 'Yes' : 'No' }}
                </td>
                @if($nine->court_type_q9 == 1)
                <td>

                  {{ $nine->court_description_q9 }}

                </td>
                @endif
              </tr>
              @endforeach
            </tbody>
          </table>
          @elseif(isset($case->yes_no_other) && !empty($case->yes_no_other->other_exclusively_trafficking_q9))
          <div class="alert alert-info">
            <strong>Other Description:</strong> {{ $case->yes_no_other->other_exclusively_trafficking_q9 }}
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