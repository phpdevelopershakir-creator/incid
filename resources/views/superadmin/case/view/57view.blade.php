<style>
.othersText {
    display: none
}

.visibility {
    display: none
}

.q15-item-card {
    border: 1px solid #e9ecef;
    border-radius: 6px;
    background-color: #f8f9fa;
}
</style>

<div class="card question15">

    <div class="card-header" role="tab" id="heading-4">
        <h6 class="mb-0 card-title">
            <a data-toggle="collapse" href="#Question-57" aria-expanded="false" aria-controls="collapse-4">
                57.{{ $questiontitles[56]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-57" class="collapse" role="tabpane57" aria-labelledby="heading-4" data-parent="#accordion-2">
        <div class="card-body">


            <div class="q15-wrapper">

                <div class="q15-item-card p-3 mb-3">
                    <!-- 1. Description One -->
                    <div class="mb-2">
                        <strong class="text-secondary d-block">Description :</strong>
                        <span>{{ $case->yes_no_other->desc_considering_reported_q57 }}</span>
                    </div>



                </div>

            </div>
            @if(isset($case->yes_no_other) && $case->yes_no_other->is_considering_reported_q57 == 1)
            <table class="table table-bordered text-center">
                <thead class="text-center align-middle">
                    <tr style="background:#E5E5E5;">
                        <th style="vertical-align: middle;">Major Component</th>
                        <th style="vertical-align: middle;">Suggested Inputs/Update</th>
                        <th style="vertical-align: middle;">Please Update Attachment (If any)</th>

                    </tr>


                </thead>
                <tbody>

                    @foreach($case->fiftyseven as $fiftyseven)
                    <tr>
                        <th>{{$fiftyseven->mejor_q57}}</th>

                        <th>
                            {{$fiftyseven->suggested_q57}}
                        </th>



                        <th>
                            @if(!empty($fiftyseven->document_upload_q57))
                            <a href="{{ asset($fiftyseven->document_upload_q57) }}" target="_blank">View</a>
                            @else
                            not Found
                            @endif
                        </th>


                    </tr>

                    @endforeach

                </tbody>
            </table>


            @elseif(isset($case->yes_no_other) && !empty($case->yes_no_other->other_considering_reported_q57))
            <div class="alert alert-info">
                <strong>Other Description:</strong> {{ $case->yes_no_other->other_considering_reported_q57 }}
            </div>


            @else
            <div class="text-center py-3">
                <p class="text-muted">No data available for this section.</p>
            </div>
            @endif



        </div>
    </div>
</div>