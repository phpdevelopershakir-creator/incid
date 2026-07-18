@if (($questiontitles[22]->status ?? null) == 1)
@php
$question_23_data = session()->get('question23');
$q23_checked = isset($question_23_data['q23_checked_value']) ? (string)$question_23_data['q23_checked_value'] : null;
$q23_data = $question_23_data['q23_data'] ?? null;
@endphp

<div class="card question23">
    <div class="card-header">
        <h6 style="color: {{ !empty($question_23_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-23" aria-expanded="false" aria-controls="collapse-22">
                23. {{ $questiontitles[22]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-23" class="collapse" role="tabpane23" aria-labelledby="heading-22" data-parent="#accordion-2">
        <div class="card-body">

            <input type="radio" id="radioYes_q23" class="twentythreestatus" name="is_complicit_official_q23" value="1"
                {{ (is_null($q23_checked) || $q23_checked === '1') ? 'checked' : '' }}>
            <label for="radioYes_q23" class="mr-3">Yes</label>

            <input type="radio" id="radioNo_q23" class="twentythreestatus" name="is_complicit_official_q23" value="0"
                {{ ($q23_checked === '0') ? 'checked' : '' }}>
            <label for="radioNo_q23" class="mr-3">No</label>

            <input type="radio" id="radioOthers_q23" class="twentythreestatus" name="is_complicit_official_q23"
                value="2" {{ ($q23_checked === '2') ? 'checked' : '' }}>
            <label for="radioOthers_q23">Others</label>

            <div id="others_q23" style="display: {{ ($q23_checked === '2') ? 'block' : 'none' }};">
                <input type="text" name="others_complicit_official_q23" class="form-control mt-2 q23-others-input"
                    placeholder="Others details" value="{{ $q23_data['others'] ?? '' }}">
            </div>

            <div id="yes_extra_q23"
                style="display: {{ (is_null($q23_checked) || $q23_checked === '1') ? 'block' : 'none' }};">
                <input type="text" name="involved_directly_trafficking_title_q23"
                    class="form-control mt-2 q23-yes-input" placeholder="Provide Yes details"
                    value="{{ $q23_data['involved_directly_trafficking_title'] ?? '' }}">
            </div>

        </div>

        <p class="text-right mr-3">
            <button type="button" class="btn btn-success" id="temp-save-question23">Save</button>
        </p>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    function toggleq23() {
        let val = $("input[name='is_complicit_official_q23']:checked").val();

        if (!val) {
            val = '1';
            $('#radioYes_q23').prop('checked', true);
        }

        $('#yes_extra_q23').hide();
        $('#others_q23').hide();

        if (val === '1') {
            $('#yes_extra_q23').show();
        } else if (val === '2') {
            $('#others_q23').show();
        }
    }

    $(document).on('change', '.twentythreestatus', toggleq23);
    toggleq23();
});
</script>

<script>
$(document).on("click", "#temp-save-question23", function() {
    let checkedValue = $("input[name='is_complicit_official_q23']:checked").val();
    let q23_data = {};

    if (checkedValue == '1') {
        q23_data.involved_directly_trafficking_title = $('.q23-yes-input').val();
    }

    if (checkedValue == '2') {
        q23_data.others = $('.q23-others-input').val();
    }

    let new_data = {
        q23_checked_value: checkedValue,
        q23_data: q23_data
    };

    $.ajax({
        type: "POST",
        url: "/superadmin/case/temp-save-question",
        data: {
            _token: "{{ csrf_token() }}",
            question_no: 23,
            question23: new_data
        },
        success: function(response) {
            if (response.success) {
                $('.question23 .card-header h6').css('color', 'blue');
                alert("Question 23  Saved Temporarily ");
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