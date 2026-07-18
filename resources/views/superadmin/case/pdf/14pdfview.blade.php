<?php
if (($questiontitles[13]->status ?? null) == 1) {
?>


    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5>
                14.{{ $questiontitles[13]->title }}
            </h5>
        </div>

        <div class="card-body">
            <table class="custom-table">

                <thead>
                    <tr>
                        <th>Main document/ Procedure</th>
                        <th>Description of change/ Status</th>
                        <th>Attach/Upload Summary</th>
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
        </div>
    </div>
<?php } ?>