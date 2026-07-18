@if (($questiontitles[8]->status ?? null) == 1)
@php
$question_9_data = session()->get('question9');

$q9_checked = $question_9_data['q9_checked_value'] ?? "1";
$q9_others_val = $question_9_data['others'] ?? "";
$q9_main_rows = $question_9_data['main_rows'] ?? [];
$q9_other_rows = $question_9_data['other_rows'] ?? [];
@endphp

<style>
.visibility {
    display: none;
}

.othersText {
    display: none;
}

.radio-group-vertical {
    display: flex;
    flex-direction: column;
    gap: 4px;
    font-family: Arial, sans-serif;
}

.radio-group-vertical label {
    cursor: pointer;
    font-size: 14px;
    margin-bottom: 0px;
}

.radio-group-vertical input[type="radio"] {
    accent-color: #0d6efd;
    margin-right: 6px;
}
</style>

<div class="card question9">
    <div class="card-header" role="tab" id="heading-9">
        <h6 class="mb-0 card-title" style="color: {{ !empty($question_9_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-9" aria-expanded="false" aria-controls="collapse-9">
                9. {{ $questiontitles[8]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-9" class="collapse" role="tabpanel" aria-labelledby="heading-9" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioNine1" class="ninestatus" name="is_exclusively_trafficking_q9" value="1"
                    {{ $q9_checked == "1" ? "checked" : "" }}>
                <label for="radioNine1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioNine2" class="ninestatus" name="is_exclusively_trafficking_q9" value="0"
                    {{ $q9_checked == "0" ? "checked" : "" }}>
                <label for="radioNine2">No</label>
            </div>

            <div class="icheck-primary input-group mb-3">
                <input type="radio" id="radioNine3" class="ninestatus" name="is_exclusively_trafficking_q9" value="2"
                    {{ $q9_checked == "2" ? "checked" : "" }}>
                <label for="radioNine3">Others</label>
                <span class="col-md-6 mt--4 q9_others_container {{ $q9_checked == '2' ? '' : 'othersText' }}"
                    style="margin-top:-8px;">
                    <input type="text" id="q9others" placeholder="Others" class="form-control"
                        value="{{ $q9_others_val }}" name="other_exclusively_dedicated_trafficking_q9">
                </span>
            </div>

            <div id="nine_question_view" class="{{ $q9_checked == '1' ? '' : 'visibility' }}">
                <p class="text-muted"><b>Note:</b> If you select 'Yes', a text box will open to provide your opinion.
                </p>

                <table id="addRowQ9" class="table table-bordered text-center">
                    <thead style="background-color:#ccc; font-weight:bold;">
                        <tr>
                            <th scope="col" style="width: 35%;">Description</th>
                            <th scope="col" style="width: 20%;">Please Select Yes/No</th>
                            <th scope="col" style="width: 35%;">Opinion</th>
                            <th scope="col" style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                        $predefined_courts = ['Police Station', 'CID', 'RAB', 'SB', 'Prosecution offices (SPP)',
                        'Special Tribunal'];
                        @endphp


                        @foreach($predefined_courts as $index => $court_name)
                        @php
                        $saved_row = collect($q9_main_rows)->firstWhere('court_title', $court_name);
                        $saved_status = $saved_row['status'] ?? '';
                        $saved_desc = $saved_row['description'] ?? '';
                        @endphp
                        <tr class="qe9NoOfRow">
                            <td style="text-align: left;" class="court-title-cell">
                                {{ $court_name }}
                                <input type="hidden" name="court_title_q9[]" class="field-title"
                                    value="{{ $court_name }}">
                            </td>
                            <td>
                                <div class="radio-group-vertical">
                                    <label>
                                        <input type="radio" name="row_radio_{{ $index }}" value="1" class="q9-row-radio"
                                            {{ $saved_status == '1' ? 'checked' : '' }}> Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="row_radio_{{ $index }}" value="0" class="q9-row-radio"
                                            {{ $saved_status == '0' ? 'checked' : '' }}> No
                                    </label>
                                </div>
                                <input type="hidden" name="court_type_q9[]" class="court-type-hidden"
                                    value="{{ $saved_status }}">
                            </td>
                            <td>
                                <input type="text" name="court_description_q9[]" class="form-control field-desc desc-td"
                                    style="display: {{ $saved_status == '1' ? 'block' : 'none' }};"
                                    value="{{ $saved_desc }}">
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        @endforeach


                        @if(!empty($q9_other_rows) && count($q9_other_rows) > 0)
                        @foreach($q9_other_rows as $dyn_idx => $other_data)
                        @php
                        $dyn_status = $other_data['status'] ?? '';
                        @endphp
                        <tr class="qe9NoOfRowOthers">
                            <td>
                                <input type="text" name="court_title_q9[]" class="form-control field-title"
                                    value="{{ $other_data['court_title'] ?? '' }}" placeholder="Others Specific">
                            </td>
                            <td>
                                <div class="radio-group-vertical">
                                    <label>
                                        <input type="radio" name="dyn_radio_{{ $dyn_idx }}" value="1"
                                            class="q9-row-radio" {{ $dyn_status == '1' ? 'checked' : '' }}> Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="dyn_radio_{{ $dyn_idx }}" value="0"
                                            class="q9-row-radio" {{ $dyn_status == '0' ? 'checked' : '' }}> No
                                    </label>
                                </div>
                                <input type="hidden" name="court_type_q9[]" class="court-type-hidden"
                                    value="{{ $dyn_status }}">
                            </td>
                            <td>
                                <input type="text" name="court_description_q9[]" class="form-control field-desc desc-td"
                                    style="display: {{ $dyn_status == '1' ? 'block' : 'none' }};"
                                    value="{{ $other_data['description'] ?? '' }}">
                            </td>
                            <td>
                                @if($loop->first)
                                <button type="button" class="btn btn-sm btn-primary addRowQ9">+</button>
                                @else
                                <button type="button" class="btn btn-sm btn-danger btn_remove">-</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @else

                        <tr class="qe9NoOfRowOthers">
                            <td>
                                <input type="text" name="court_title_q9[]" class="form-control field-title"
                                    placeholder="Others (Specify)___">
                            </td>
                            <td>
                                <div class="radio-group-vertical">
                                    <label>
                                        <input type="radio" name="dyn_radio_0" value="1" class="q9-row-radio"> Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="dyn_radio_0" value="0" class="q9-row-radio"> No
                                    </label>
                                </div>
                                <input type="hidden" name="court_type_q9[]" class="court-type-hidden" value="">
                            </td>
                            <td>
                                <input type="text" name="court_description_q9[]" class="form-control field-desc desc-td"
                                    style="display:none;">
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary addRowQ9">+</button>
                            </td>
                        </tr>
                        @endif

                    </tbody>
                </table>
            </div>
            <br />

            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question9">Save</button>
            </p>
        </div>
    </div>
</div>
@endif

<script type="text/javascript">
$(document).ready(function() {


    $(document).on('change', '.ninestatus', function() {
        let statusvalue = $("input[name='is_exclusively_trafficking_q9']:checked").val();
        if (statusvalue == '1') {
            $('#nine_question_view').removeClass('visibility').show();
            $('.q9_others_container').addClass('othersText').hide();
            $('#q9others').val("");
        } else if (statusvalue == '2') {
            $('#nine_question_view').hide();
            $('.q9_others_container').removeClass('othersText').show();
        } else {
            $('#nine_question_view').hide();
            $('.q9_others_container').addClass('othersText').hide();
            $('#q9others').val("");
        }
    });


    $(document).on('change', '.q9-row-radio', function() {
        let row = $(this).closest('tr');
        let textInput = row.find('.desc-td');
        let radioVal = $(this).val();


        row.find('.court-type-hidden').val(radioVal);

        if (radioVal === '1') {
            textInput.show();
        } else {
            textInput.hide();
            textInput.val('');
        }
    });


    let dynamicIndex = $('.qe9NoOfRowOthers').length + 100;
    $(document).on('click', '.addRowQ9', function() {
        dynamicIndex++;
        $('#addRowQ9 tbody').append(`
            <tr class="qe9NoOfRowOthers">
                <td>
                    <input type="text" name="court_title_q9[]" class="form-control field-title" placeholder="Others (Specify)___">
                </td>
                <td>
                    <div class="radio-group-vertical">
                        <label><input type="radio" name="dyn_radio_${dynamicIndex}" value="1" class="q9-row-radio"> Yes</label>
                        <label><input type="radio" name="dyn_radio_${dynamicIndex}" value="0" class="q9-row-radio"> No</label>
                    </div>
                    <input type="hidden" name="court_type_q9[]" class="court-type-hidden" value="">
                </td>
                <td>
                    <input type="text" name="court_description_q9[]" class="form-control field-desc desc-td" style="display:none;">
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-danger btn_remove">-</button>
                </td>
            </tr>
        `);
    });


    $(document).on('click', '.btn_remove', function() {
        $(this).closest('tr').remove();
    });


    $(document).on("click", '#temp-save-question9', function(e) {
        e.preventDefault();

        let yes_no_value = $("input[name='is_exclusively_trafficking_q9']:checked").val();
        let mainRowsData = [];
        let otherRowsData = [];


        $('tr.qe9NoOfRow').each(function() {
            let title = $(this).find('.field-title').val();
            let radioStatus = $(this).find('.q9-row-radio:checked').val() || '';
            let description = $(this).find('.field-desc').val();

            mainRowsData.push({
                court_title: title,
                status: radioStatus,
                description: (radioStatus == '1') ? description : ''
            });
        });


        $('tr.qe9NoOfRowOthers').each(function() {
            let title = $(this).find('.field-title').val();
            let radioStatus = $(this).find('.q9-row-radio:checked').val() || '';
            let description = $(this).find('.field-desc').val();

            if (title || radioStatus) {
                otherRowsData.push({
                    court_title: title,
                    status: radioStatus,
                    description: (radioStatus == '1') ? description : ''
                });
            }
        });

        let final_payload = {
            q9_checked_value: yes_no_value,
            others: $("#q9others").val(),
            main_rows: mainRowsData,
            other_rows: otherRowsData
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                "_token": "{{ csrf_token() }}",
                "question_no": 9,
                "question9": final_payload
            },
            success: function(response) {
                if (response.success || response) {
                    $('.question9 .card-header h6').css('color', 'blue');
                    alert("Question 9  Saved Temporarily ");
                }
            },
            error: function(xhr) {
                alert("Save failed ");
                console.log(xhr.responseText);
            }
        });
    });

});
</script>