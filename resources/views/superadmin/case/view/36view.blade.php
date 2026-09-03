@if (($questiontitles[35]->status ?? null) == 1)


<style>
.sub_field_box_q35 {
    display: none;
}
</style>

<div class="card question35">
    <div class="card-header" role="tab" id="heading-35">
        <h6 class="card-title" style="color: {{ !empty($question_36_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-36" aria-expanded="false" aria-controls="collapse-35">
                36. {{ $questiontitles[35]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-36" class="collapse" role="tabpane36" aria-labelledby="heading-35" data-parent="#accordion-2">
        <div class="card-body">
            @foreach($case->thirtysix as $thirtysix)
            <table class="table table-bordered mb-0">
                <tbody>
                    <!-- Sub-Question 1 -->
                    <tr>
                        <td>
                            <label class="font-weight-bold">
                                a) Is specialized support provided for child/vulnerable victims?
                            </label>

                            <div class="mt-2">
                                <div class="icheck-primary d-inline mr-3">
                                    @if($thirtysix->q36_p1_status == 1)
                                    Yes
                                    @elseif($thirtysix->q36_p1_status == 0)
                                    No
                                    @elseif($thirtysix->q36_p1_status == 2)
                                    Others
                                    @endif
                                </div>

                            </div>

                            <div class="mt-2">
                                @if($thirtysix->q36_p1_status == 1)
                                {{ $thirtysix->q36_p1_yes_desc }}
                                @elseif($thirtysix->q36_p1_status == 2)
                                {{ $thirtysix->q36_p1_others_desc }}
                                @endif
                            </div>
                        </td>
                    </tr>

                    <!-- Sub-Question 2 -->
                    <tr>
                        <td>
                            <label class="font-weight-bold">
                                b) Are specialized facilities available (e.g., Child-friendly room, One-way mirror,
                                Legal support, etc.)?

                            </label>

                            <div class="mt-2">
                                <div class="icheck-primary d-inline mr-3">
                                    @if($thirtysix->q36_p2_status == 1)
                                    Yes
                                    @elseif($thirtysix->q36_p2_status == 0)
                                    No
                                    @elseif($thirtysix->q36_p2_status == 2)
                                    Others
                                    @endif
                                </div>

                            </div>

                            <div class="mt-2">
                                @if($thirtysix->q36_p2_status == 1)
                                {{ $thirtysix->q36_p2_yes_desc }}
                                @elseif($thirtysix->q36_p2_status == 2)
                                {{ $thirtysix->q36_p2_others_desc }}
                                @endif
                            </div>
                        </td>
                    </tr>
                    <!-- Sub-Question 3 -->
                    <tr>
                        <td>
                            <label class="font-weight-bold">
                                c) Are measures taken to prevent secondary victimization or discrimination during
                                inquiry/investigation?
                            </label>

                            <div class="mt-2">
                                <div class="icheck-primary d-inline mr-3">
                                    @if($thirtysix->q36_p3_status == 1)
                                    Yes
                                    @elseif($thirtysix->q36_p3_status == 0)
                                    No
                                    @elseif($thirtysix->q36_p3_status == 2)
                                    Others
                                    @endif
                                </div>

                            </div>

                            <div class="mt-2">
                                @if($thirtysix->q36_p3_status == 1)
                                {{ $thirtysix->q36_p3_yes_desc }}
                                @elseif($thirtysix->q36_p3_status == 2)
                                {{ $thirtysix->q36_p3_others_desc }}
                                @endif
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            @endforeach
            <br>
            <table class="table table-bordered text-center">
                <thead class="text-center align-middle">

                    <tr style="background:#E5E5E5;">
                        <th>Type of Support</th>
                        <th>Men</th>
                        <th>Women</th>
                        <th>TG</th>
                        <th>Total</th>
                    </tr>

                </thead>
                <tbody>
                    @php
                    $menTotal = 0;
                    $womenTotal = 0;
                    $tgTotal = 0;
                    $Total = 0;

                    @endphp
                    @foreach($case->thirtysixb as $thirtysixb)
                    <tr>


                        <th>
                            {{$thirtysixb->q36_support_type}}
                        </th>

                        <th>
                            {{$thirtysixb->q36_men}}
                        </th>
                        <th>
                            {{$thirtysixb->q36_women}}
                        </th>
                        <th>
                            {{$thirtysixb->q36_tg}}
                        </th>
                        <th>
                            {{$thirtysixb->q36_total}}
                        </th>


                    </tr>
                    @php
                    $menTotal += $thirtysixb->q36_men;
                    $womenTotal += $thirtysixb->q36_women;
                    $tgTotal += $thirtysixb->q36_tg;
                    $Total += $thirtysixb->q36_total;


                    @endphp
                    @endforeach
                    <tr style="font-weight:bold; background:#f1f1f1;">
                        <td>Total</td>
                        <td class="text-center align-middle">{{ $menTotal }}</td>
                        <td class="text-center align-middle">{{ $womenTotal }}</td>
                        <td class="text-center align-middle">{{ $tgTotal }}</td>
                        <td class="text-center align-middle">{{ $Total }}</td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif