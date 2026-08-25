<div class="card">
    <div class="card-header" role="tab" id="heading-4">
        <h6 class="mb-0">
            <a data-toggle="collapse" href="#Question-27" aria-expanded="false" aria-controls="collapse-4">
                27.{{ $questiontitles[26]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-27" class="collapse" role="tabpane27" aria-labelledby="heading-4" data-parent="#accordion-2">
        <div class="card-body">
            <div id="six_question_view">
                @if(isset($case->yes_no_other) && $case->yes_no_other->is_government_direct_victim_q27 == 1)

                <p>Type of Spending on Victim Care
                </p>
                <table class="table table-bordered text-center">
                    <thead class="text-center align-middle">

                        <tr style="background:#E5E5E5;">
                            <th>Type of Spending on Victim Care</th>
                            <th>Central Government/Ministry</th>
                            <th>Local Government</th>
                            <th>NGO/INGO</th>
                        </tr>

                    </thead>
                    <tbody>

                        @foreach($case->twentyseven as $twentyseven)
                        <tr>
                            <th>{{$twentyseven->victim_care_q27}}</th>

                            <th>
                                {{ $twentyseven->central_government_q27 ?? 'N/A' }}

                                @if($twentyseven->central_government_q27 == 'Yes')
                                <br>
                                <span style="font-weight: bold; color: #2b6cb0;">
                                    ({{ $twentyseven->central_government_title_q27 }})
                                </span>
                                @endif
                            </th>

                            <th>
                                {{ $twentyseven->local_government_q27 ?? 'N/A' }}

                                @if($twentyseven->local_government_q27 == 'Yes')
                                <br>
                                <span style="font-weight: bold; color: #2b6cb0;">
                                    ({{ $twentyseven->local_government_title_q27 }})
                                </span>
                                @endif
                            </th>
                            <th>
                                {{ $twentyseven->ngo_ingo_q27 ?? 'N/A' }}

                                @if($twentyseven->ngo_ingo_q27 == 'Yes')
                                <br>
                                <span style="font-weight: bold; color: #2b6cb0;">
                                    ({{ $twentyseven->ngo_ingo_title_q27 }})
                                </span>
                                @endif
                            </th>
                        </tr>

                        @endforeach

                    </tbody>
                </table>

                <br>
                <p>Total Protection Related Expenses</p>
                <table class="table table-bordered text-center">
                    <thead class="text-center align-middle">

                        <tr style="background:#E5E5E5;">
                            <th>Type of Spending on Victim Care</th>
                            <th>Central Government/Ministry</th>
                            <th>Local Government</th>
                            <th>NGO/INGO</th>
                        </tr>

                    </thead>
                    <tbody>

                        @foreach($case->twentysevenb as $twentysevenb)
                        <tr>
                            <th>{{$twentysevenb->victim_care_q27b}}</th>

                            <th>
                                {{ $twentysevenb->central_government_q27b ?? 'N/A' }}

                                @if($twentysevenb->central_government_q27b == 'Yes')
                                <br>
                                <span style="font-weight: bold; color: #2b6cb0;">
                                    ({{ $twentysevenb->central_government_title_q27b }})
                                </span>
                                @endif
                            </th>

                            <th>
                                {{ $twentysevenb->local_government_q27b ?? 'N/A' }}

                                @if($twentysevenb->local_government_q27b == 'Yes')
                                <br>
                                <span style="font-weight: bold; color: #2b6cb0;">
                                    ({{ $twentysevenb->local_government_title_q27b }})
                                </span>
                                @endif
                            </th>
                            <th>
                                {{ $twentysevenb->ngo_ingo_q27b ?? 'N/A' }}

                                @if($twentysevenb->ngo_ingo_q27b == 'Yes')
                                <br>
                                <span style="font-weight: bold; color: #2b6cb0;">
                                    ({{ $twentysevenb->ngo_ingo_title_q27b }})
                                </span>
                                @endif
                            </th>
                        </tr>

                        @endforeach

                    </tbody>
                </table>


                @elseif(isset($case->yes_no_other) &&
                !empty($case->yes_no_other->other_government_direct_victim_q27))
                <div class="alert alert-info">
                    <strong>Other Description:</strong>
                    {{ $case->yes_no_other->other_government_direct_victim_q27 }}
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