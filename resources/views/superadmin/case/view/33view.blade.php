<?php
if (($questiontitles[32]->status ?? null) == 1) {

?>

  <div class="card">
    <div class="card-header" role="tab" id="heading-4">
      <h6 class="mb-0">
        <a data-toggle="collapse" href="#Question-33" aria-expanded="false"
          aria-controls="collapse-4">
          33.{{ $questiontitles[32]->title }}
        </a>
      </h6>
    </div>

    <div id="Question-33" class="collapse" role="tabpane33" aria-labelledby="heading-4"
      data-parent="#accordion-2">
      <div class="card-body">
        <div id="six_question_view">
          @if(isset($case->yes_no_other) && $case->yes_no_other->is_complicit_official_q33 == 1)
          @foreach($case->thirtythree as $thirtythree)
          {{$thirtythree->involved_directly_trafficking_title_q33}}
          @endforeach

          @elseif(isset($case->yes_no_other) && !empty($case->yes_no_other->others_complicit_official_q33))
          <div class="alert alert-info">
            <strong>Other Description:</strong> {{ $case->yes_no_other->others_complicit_official_q33 }}
          </div>

            @elseif(isset($case->yes_no_other) && !empty($case->yes_no_other->no_details_q33))
          <div class="alert alert-info">
            <strong>No Description:</strong> {{ $case->yes_no_other->no_details_q33 }}
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