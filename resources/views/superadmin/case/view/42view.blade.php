<?php
if (($questiontitles[41]->status ?? null) == 1) {

?>

<div class="card">
    <div class="card-header" role="tab" id="heading-5">
        <h6 class="mb-0">
            <a data-toggle="collapse" href="#Question-42" aria-expanded="false" aria-controls="collapse-4">
                42.{{ $questiontitles[41]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-42" class="collapse" role="tabpane42" aria-labelledby="heading-5" data-parent="#accordion-2">
        <div class="card-body">
            <div id="six_question_view">

                @foreach($case->fortytwo as $fortytwo)
                <table class="table table-bordered mb-0">
                    <tbody>
                        <!-- Row 1: Agency / Official Led -->
                        <tr>
                            <td style="width: 45%; background-color: #ffff00;" class="font-weight-bold align-middle">
                                Which official, agency, and/or national coordinating body, if any, led government
                                anti-trafficking efforts?
                            </td>
                            <td style="background-color: #ffff00;">
                                {{$fortytwo->official_title_q42}}
                            </td>
                        </tr>

                        <!-- Row 2: Effectiveness & Results Description -->
                        <tr>
                            <td style="background-color: #ffff00;" class="font-weight-bold align-middle">
                                How was this body effective or ineffective, and what results did it produce?
                            </td>
                            <td style="background-color: #ffff00;">
                                <div class="form-group mb-2">
                                    {{$fortytwo->official_type_q42}}
                                </div>

                                <div class="form-group mb-0">
                                    <label class="font-weight-bold text-muted">Please describe the results-</label>
                                    {{$fortytwo->official_desc_q42}}
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>



                @endforeach



            </div>
        </div>
    </div>
</div>

<?php } ?>