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
            <a data-toggle="collapse" href="#Question-15" aria-expanded="false" aria-controls="collapse-4">
                15.{{ $questiontitles[14]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-15" class="collapse" role="tabpane15" aria-labelledby="heading-4" data-parent="#accordion-2">
        <div class="card-body">

            @if(isset($case->yes_no_other) && $case->yes_no_other->is_victim_identification_protocol_q15 == 1)
            <div class="q15-wrapper">
                @foreach($case->fifteen as $fifteen)
                <div class="q15-item-card p-3 mb-3">
                    <!-- 1. Description One -->
                    <div class="mb-2">
                        <strong class="text-secondary d-block">Description 1:</strong>
                        <span>{{ $fifteen->description_one_q15 }}</span>
                    </div>

                    <!-- 2. Description Two -->
                    <div class="mb-2">
                        <strong class="text-secondary d-block">Description 2:</strong>
                        <span>{{ $fifteen->description_two_q15 }}</span>
                    </div>

                    <!-- 3. Description Three -->
                    <div class="mb-2">
                        <strong class="text-secondary d-block">Description 3:</strong>
                        <span>{{ $fifteen->description_three_q15 }}</span>
                    </div>

                    <!-- 4. Document / Image Link -->
                    <div class="mt-2 pt-2 border-top">
                        <strong class="text-secondary d-block mb-1">Document / Image:</strong>
                        @if(!empty($fifteen->document_upload_q15))
                        <a href="{{ asset($fifteen->document_upload_q15) }}" target="_blank"
                            class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-eye"></i> View Document
                        </a>
                        @else
                        <span class="badge badge-secondary">Not Found</span>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>

            @elseif(isset($case->yes_no_other) && !empty($case->yes_no_other->other_victim_identification_protocol_q15))
            <div class="alert alert-info">
                <strong>Other Description:</strong>
                {{ $case->yes_no_other->other_victim_identification_protocol_q15 }}
            </div>

            @else
            <div class="text-center py-3">
                <p class="text-muted">No data available for this section.</p>
            </div>
            @endif

        </div>
    </div>
</div>