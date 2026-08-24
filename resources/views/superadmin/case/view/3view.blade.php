<?php
if (($questiontitles[2]->status ?? null) == 1) {

?>
<div class="card">
    <div class="card-header" role="tab" id="heading-4">
        <h6 class="mb-0">
            <a data-toggle="collapse" href="#Question-3" aria-expanded="false" aria-controls="collapse-4">
                3.{{ $questiontitles[2]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-3" class="collapse" role="tabpanel3" aria-labelledby="heading-4" data-parent="#accordion-2">
        <div class="card-body">
            <div id="six_question_view">
                @if(isset($case->yes_no_other) && $case->yes_no_other->is_technology_trafficking_applicable_q3 == 1)
                <table class="table table-bordered text-center">
                    <thead class="text-center align-middle">
                        <tr style="background:#E5E5E5;">
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Category</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Purpose
                                (Multiple Selection)</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Type of
                                Technology Used by Traffickers
                                (Multiple Selection)</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Description
                                (victims/process and nature
                                of victimization/government actions)</th>


                        </tr>

                    </thead>
                    <tbody>

                        @foreach($case->three as $three)
                        <tr>

                            <td>{{$three->category_q3}}</td>
                            <td>{{$three->purpose_q3}}</td>
                            <td>{{$three->technology_q3}}</td>
                            <td>{{$three->description_q3}}</td>

                        </tr>

                        @endforeach


                    </tbody>
                </table>
                <br>
                <p class="font-weight-bold">Government Response</p>
                <table class="table table-bordered text-center">
                    <thead class="text-center align-middle">
                        <tr style="background:#E5E5E5;">
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Question</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Responses
                                (Multiple Selection)</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Description
                                (who is doing it? What are
                                the results)</th>

                        </tr>

                    </thead>
                    <tbody>

                        @foreach($case->threeb as $threeb)
                        <tr>

                            <td>{{$threeb->question_q3b}}</td>
                            <td>{{$threeb->response_q3b}}</td>
                            <td>{{$threeb->description_q3b}}</td>

                        </tr>

                        @endforeach


                    </tbody>
                </table>

                @elseif(isset($case->yes_no_other) &&
                !empty($case->yes_no_other->other_technology_trafficking_applicable_q3))
                <div class="alert alert-info">
                    <strong>Other Description:</strong>
                    {{ $case->yes_no_other->other_technology_trafficking_applicable_q3 }}
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