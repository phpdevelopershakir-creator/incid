<?php
if (($questiontitles[13]->status ?? null) == 1) {

?>
    <div class="card question61">
        <div class="card-header" role="tab" id="heading-4">
            <h6 class="card-title" style="color: {{ isset($question_61_data) ? 'blue' : 'black' }};">
                <a data-toggle="collapse" href="#Question-14" aria-expanded="false"
                    aria-controls="collapse-4">
                    14.{{ $questiontitles[13]->title }}
                </a>
            </h6>
        </div>

        <div id="Question-14" class="collapse" role="tabpane14" aria-labelledby="heading-4"
            data-parent="#accordion-2">
            <div class="card-body">
                @if(isset($case->yes_no_other) && $case->yes_no_other->is_government_devote_implement_q14 == 1)
                <table class="table table-white table-bordered">
                    <thead class="text-center align-middle">
                        <tr style="background:#E5E5E5;">
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Main document/ Procedure</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Description of change/ Status</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Attach/Upload Summary</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($case->fourteen as $fourteen)
                        <tr>
                            <td>
                                @if ($fourteen->original_approach_q14 == 1)
                                Victim Identification Guidelines of PSD/MoHA
                                @elseif ($fourteen->original_approach_q14 == 2)
                                PSHT Act's Rule on VoT identification
                                @elseif ($fourteen->original_approach_q14 == 3)
                                Victim identification checklist of MoSW
                                @elseif ($fourteen->original_approach_q14 == 4)
                                VoT identification under NRM of MoHA
                                @else
                                {{$fourteen->original_approach_q14}}
                                @endif
                            </td>

                            <td>
                                @if ($fourteen->description_change_q14 == 1)
                                Enforced
                                @elseif ($fourteen->description_change_q14 == 2)
                                Updated and enforced
                                @elseif ($fourteen->description_change_q14 == 3)
                                Stricter enforcement
                                @elseif ($fourteen->description_change_q14 == 4)
                                Increases efforts
                                @else
                                {{$fourteen->description_change_q14}}
                                @endif
                            </td>
                            <td>
                                @if(!empty($fourteen->document_upload_q14))
                                <a href="{{ asset($fourteen->document_upload_q14) }}" target="_blank">View</a>
                                @else
                                not Found
                                @endif

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                @elseif(isset($case->yes_no_other) && !empty($case->yes_no_other->other_government_devote_implement_q14))
                <div class="alert alert-info">
                    <strong>Other Description:</strong> {{ $case->yes_no_other->other_government_devote_implement_q14 }}
                </div>


                @else
                <div class="text-center py-3">
                    <p class="text-muted">No data available for this section.</p>
                </div>
                @endif


            </div>
        </div>
    </div>
<?php } ?>