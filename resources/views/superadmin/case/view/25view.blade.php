<?php
if (($questiontitles[24]->status ?? null) == 1) {

?>

<div class="card">
    <div class="card-header" role="tab" id="heading-5">
        <h6 class="mb-0">
            <a data-toggle="collapse" href="#Question-25" aria-expanded="false" aria-controls="collapse-4">
                25.{{ $questiontitles[24]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-25" class="collapse" role="tabpane25" aria-labelledby="heading-5" data-parent="#accordion-2">
        <div class="card-body">
            <div id="six_question_view">
                @if(isset($case->yes_no_other) && $case->yes_no_other->is_government_person_formally_q25 == 1)
                @foreach($case->twentyfive as $twentyfive)
                {{$twentyfive->government_person_formally_title_q25}}
                @endforeach

                @elseif(isset($case->yes_no_other) &&
                !empty($case->yes_no_other->other_government_person_formally_q25))
                <div class="alert alert-info">
                    <strong>Other Description:</strong> {{ $case->yes_no_other->other_government_person_formally_q25 }}
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