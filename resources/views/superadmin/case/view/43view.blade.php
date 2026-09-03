<?php
if (($questiontitles[42]->status ?? null) == 1) {

?>

<div class="card">
    <div class="card-header" role="tab" id="heading-5">
        <h6 class="mb-0">
            <a data-toggle="collapse" href="#Question-43" aria-expanded="false" aria-controls="collapse-4">
                43.{{ $questiontitles[42]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-43" class="collapse" role="tabpane43" aria-labelledby="heading-5" data-parent="#accordion-2">
        <div class="card-body">
            <div id="six_question_view">
                @if(isset($case->yes_no_other) && $case->yes_no_other->is_government_seek_civil_q43 == 1)
                @foreach($case->fortythree as $fortythree)
                {{$fortythree->goverment_seek_title_q43}}
                @endforeach

                @elseif(isset($case->yes_no_other) && !empty($case->yes_no_other->other_government_seek_civil_q43))
                <div class="alert alert-info">
                    <strong>Other Description:</strong> {{ $case->yes_no_other->other_government_seek_civil_q43 }}
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