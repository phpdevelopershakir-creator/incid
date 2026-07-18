@if (($questiontitles[32]->status ?? null) == 1)
@php

$question_33_data = session()->get('question33');
$q33_checked = isset($question_33_data['q33_checked_value']) ? (string)$question_33_data['q33_checked_value'] : null;
$q33_data = $question_33_data['q33_data'] ?? null;
@endphp

<div class="card question33">
    <div class="card-header">
        <h6 style="color: {{ !empty($question_33_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-33" aria-expanded="false" aria-controls="collapse-32">
                33. {{ $questiontitles[32]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-33" class="collapse" role="tabpane33" aria-labelledby="heading-32" data-parent="#accordion-2">
        <div class="card-body">


            <input type="radio" id="radioYes33" class="thirtythreestatus" name="is_complicit_official_q33" value="1"
                {{ (is_null($q33_checked) || $q33_checked === '1') ? 'checked' : '' }}>
            <label for="radioYes33" class="mr-3">Yes</label>

            <input type="radio" id="radioNo33" class="thirtythreestatus" name="is_complicit_official_q33" value="0"
                {{ ($q33_checked === '0') ? 'checked' : '' }}>
            <label for="radioNo33" class="mr-3">No</label>

            <input type="radio" id="radioOthers33" class="thirtythreestatus" name="is_complicit_official_q33" value="2"
                {{ ($q33_checked === '2') ? 'checked' : '' }}>
            <label for="radioOthers33">Others</label>


            <div id="yes_extra_q33"
                style="display: {{ (is_null($q33_checked) || $q33_checked === '1') ? 'block' : 'none' }};">
                <input type="text" name="involved_directly_trafficking_title_q33"
                    class="form-control mt-2 q33-yes-input" placeholder="Provide Yes details"
                    value="{{ $q33_data['involved_directly_trafficking_title'] ?? '' }}">
            </div>


            <div id="no_extra_q33" style="display: {{ ($q33_checked === '0') ? 'block' : 'none' }};">
                <input type="text" name="no_details_q33" class="form-control mt-2 q33-no-input"
                    placeholder="Provide No details" value="{{ $q33_data['no_details'] ?? '' }}">
            </div>


            <div id="others_q33" style="display: {{ ($q33_checked === '2') ? 'block' : 'none' }};">
                <input type="text" name="others_complicit_official_q33" class="form-control mt-2 q33-others-input"
                    placeholder="Others details" value="{{ $q33_data['others'] ?? '' }}">
            </div>

        </div>

        <p class="text-right mr-3">
            <button type="button" class="btn btn-success" id="temp-save-question33">Save</button>
        </p>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    function toggleq33() {
        let val = $("input[name='is_complicit_official_q33']:checked").val();

        if (!val) {
            val = '1';
            $('#radioYes33').prop('checked', true);
        }


        $('#yes_extra_q33').hide();
        $('#no_extra_q33').hide();
        $('#others_q33').hide();


        if (val === '1') {
            $('#yes_extra_q33').show();
        } else if (val === '0') {
            $('#no_extra_q33').show();
        } else if (val === '2') {
            $('#others_q33').show();
        }
    }


    $(document).on('change', '.thirtythreestatus', toggleq33);
    toggleq33();
});
</script>

<script>
$(document).on("click", "#temp-save-question33", function() {
    let checkedValue = $("input[name='is_complicit_official_q33']:checked").val();
    let q33_data = {};

    if (checkedValue == '1') {
        q33_data.involved_directly_trafficking_title = $('.q33-yes-input').val();
    }

    if (checkedValue == '0') {
        q33_data.no_details = $('.q33-no-input').val();
    }

    if (checkedValue == '2') {
        q33_data.others = $('.q33-others-input').val();
    }

    let new_data = {
        q33_checked_value: checkedValue,
        q33_data: q33_data
    };

    $.ajax({
        type: "POST",
        url: "/superadmin/case/temp-save-question",
        data: {
            _token: "{{ csrf_token() }}",
            question_no: 33,
            question33: new_data
        },
        success: function(response) {
            if (response.success) {
                $('.question33 .card-header h6').css('color', 'blue');
                alert("Question 33  Saved Temporarily ");
            } else {
                alert("Not Saved");
            }
        },
        error: function() {
            alert("Something went wrong!");
        }
    });
});
</script>