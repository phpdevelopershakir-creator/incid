<?php
if (($questiontitles[28]->status ?? null) == 1) {

?>

<div class="card">
    <div class="card-header" role="tab" id="heading-5">
        <h6 class="mb-0">
            <a data-toggle="collapse" href="#Question-29" aria-expanded="false" aria-controls="collapse-4">
                29.{{ $questiontitles[28]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-29" class="collapse" role="tabpane29" aria-labelledby="heading-5" data-parent="#accordion-2">
        <div class="card-body">
            <div id="six_question_view">
                @if(isset($case->yes_no_other) && $case->yes_no_other->is_adult_victims_juvenile_q29 == 1)
                @foreach($case->twentynine as $twentynine)
                {{$twentynine->adult_victims_juvenile_title_q29}}
                @endforeach

                @elseif(isset($case->yes_no_other) && !empty($case->yes_no_other->other_adult_victims_juvenile_q29))
                <div class="alert alert-info">
                    <strong>Other Description:</strong> {{ $case->yes_no_other->other_adult_victims_juvenile_q29 }}
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