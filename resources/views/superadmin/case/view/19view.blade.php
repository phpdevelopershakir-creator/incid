<?php
if (($questiontitles[18]->status ?? null) == 1) {

?>

<div class="card">
    <div class="card-header" role="tab" id="heading-5">
        <h6 class="mb-0">
            <a data-toggle="collapse" href="#Question-19" aria-expanded="false" aria-controls="collapse-4">
                19.{{ $questiontitles[18]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-19" class="collapse" role="tabpane19" aria-labelledby="heading-5" data-parent="#accordion-2">
        <div class="card-body">
            <div id="six_question_view">
                @if(isset($case->yes_no_other) && $case->yes_no_other->is_victims_social_service_q19 == 1)
                @foreach($case->nineteen as $nineteen)
                {{$nineteen->victims_social_service_title_q19}}
                @endforeach

                @elseif(isset($case->yes_no_other) && !empty($case->yes_no_other->other_victims_social_service_q19))
                <div class="alert alert-info">
                    <strong>Other Description:</strong> {{ $case->yes_no_other->other_victims_social_service_q19 }}
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