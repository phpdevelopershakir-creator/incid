@if (($questiontitles[34]->status ?? null) == 1)


<style>
.sub_field_box_q35 {
    display: none;
}
</style>

<div class="card question35">
    <div class="card-header" role="tab" id="heading-35">
        <h6 class="card-title" style="color: {{ !empty($question_35_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-35" aria-expanded="false" aria-controls="collapse-35">
                35. {{ $questiontitles[34]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-35" class="collapse" role="tabpanel" aria-labelledby="heading-35" data-parent="#accordion-2">
        <div class="card-body">
            @foreach($case->thirtyfive as $thirtyfive)
            <table class="table table-bordered mb-0">
                <tbody>
                    <!-- Sub-Question 1 -->
                    <tr>
                        <td>
                            <label class="font-weight-bold">
                                Were victims required to speak with law enforcement officials, or cooperate with
                                authorities in the investigation or prosecution of traffickers to access certain
                                protection services (such as residence in a government shelter)?
                            </label>

                            <div class="mt-2">
                                <div class="icheck-primary d-inline mr-3">
                                    @if($thirtyfive->q35_p1_radio == 1)
                                    Yes
                                    @elseif($thirtyfive->q35_p1_radio == 0)
                                    No
                                    @elseif($thirtyfive->q35_p1_radio == 2)
                                    Others
                                    @endif
                                </div>

                            </div>

                            <div class="mt-2">
                                @if($thirtyfive->q35_p1_radio == 1)
                                {{ $thirtyfive->q35_p1_yes_text }}
                                @elseif($thirtyfive->q35_p1_radio == 2)
                                {{ $thirtyfive->q35_p1_others_text }}
                                @endif
                            </div>
                        </td>
                    </tr>

                    <!-- Sub-Question 2 -->
                    <tr>
                        <td>
                            <label class="font-weight-bold">
                                Did the government provide a recovery and reflection period to all victims?
                            </label>

                            <div class="mt-2">
                                <div class="icheck-primary d-inline mr-3">
                                    @if($thirtyfive->q35_p2_radio == 1)
                                    Yes
                                    @elseif($thirtyfive->q35_p2_radio == 0)
                                    No
                                    @elseif($thirtyfive->q35_p2_radio == 2)
                                    Others
                                    @endif
                                </div>

                            </div>

                            <div class="mt-2">
                                @if($thirtyfive->q35_p2_radio == 1)
                                {{ $thirtyfive->q35_p2_yes_text }}
                                @elseif($thirtyfive->q35_p2_radio == 2)
                                {{ $thirtyfive->q35_p2_others_text }}
                                @endif
                            </div>
                        </td>
                    </tr>
                    <!-- Sub-Question 3 -->
                    <tr>
                        <td>
                            <label class="font-weight-bold">
                                What, if any, alternatives were victims presented with to speaking with law enforcement
                                while participating in investigations?
                            </label>

                            <div class="mt-2">
                                <div class="icheck-primary d-inline mr-3">
                                    @if($thirtyfive->q35_p3_radio == 1)
                                    Yes
                                    @elseif($thirtyfive->q35_p3_radio == 0)
                                    No
                                    @elseif($thirtyfive->q35_p3_radio == 2)
                                    Others
                                    @endif
                                </div>

                            </div>

                            <div class="mt-2">
                                @if($thirtyfive->q35_p3_radio == 1)
                                {{ $thirtyfive->q35_p3_yes_text }}
                                @elseif($thirtyfive->q35_p3_radio == 2)
                                {{ $thirtyfive->q35_p3_others_text }}
                                @endif
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            @endforeach

        </div>
    </div>
</div>
@endif