<?php
if (($questiontitles[36]->status ?? null) == 1) {

?>

<div class="card">
    <div class="card-header" role="tab" id="heading-5">
        <h6 class="mb-0">
            <a data-toggle="collapse" href="#Question-37" aria-expanded="false" aria-controls="collapse-4">
                37.{{ $questiontitles[36]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-37" class="collapse" role="tabpane37" aria-labelledby="heading-5" data-parent="#accordion-2">
        <div class="card-body">
            <div id="six_question_view">
                @if(isset($case->yes_no_other) && $case->yes_no_other->is_assistance_government_q37 == 1)
                @foreach($case->thirtyseven as $thirtyseven)
                {{$thirtyseven->assistance_government_title_q37}}
                @endforeach

                @elseif(isset($case->yes_no_other) && !empty($case->yes_no_other->other_assistance_government_q37))
                <div class="alert alert-info">
                    <strong>Other Description:</strong> {{ $case->yes_no_other->other_assistance_government_q37 }}
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