@if (($questiontitles[31]->status ?? null) == 1)
@php
$question_32_data = session()->get('question32');
$q32_checked = isset($question_32_data['q32_checked_value']) ? (string)$question_32_data['q32_checked_value'] : null;
$q32_data = $question_32_data['q32_data'] ?? null;
@endphp

<div class="card question32">
    <div class="card-header">
        <h6 style="color: {{ !empty($question_32_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-32" aria-expanded="false" aria-controls="collapse-31">
                32. {{ $questiontitles[31]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-32" class="collapse" role="tabpanel" aria-labelledby="heading-31" data-parent="#accordion-2">
        <div class="card-body">

            <input type="radio" id="radioYes32" class="thirtytwostatus" name="is_complicit_official_q32" value="1"
                {{ (is_null($q32_checked) || $q32_checked === '1') ? 'checked' : '' }}>
            <label for="radioYes32" class="mr-3">Yes</label>

            <input type="radio" id="radioNo32" class="thirtytwostatus" name="is_complicit_official_q32" value="0"
                {{ ($q32_checked === '0') ? 'checked' : '' }}>
            <label for="radioNo32" class="mr-3">No</label>

            <input type="radio" id="radioOthers32" class="thirtytwostatus" name="is_complicit_official_q32" value="2"
                {{ ($q32_checked === '2') ? 'checked' : '' }}>
            <label for="radioOthers32">Others</label>

            <div id="yes_extra_q32"
                style="display: {{ (is_null($q32_checked) || $q32_checked === '1') ? 'block' : 'none' }};">
                <input type="text" name="involved_directly_trafficking_title_q32"
                    class="form-control mt-2 q32-yes-input" placeholder="Provide Yes details"
                    value="{{ $q32_data['involved_directly_trafficking_title'] ?? '' }}">
            </div>

            <div id="no_extra_q32" style="display: {{ ($q32_checked === '0') ? 'block' : 'none' }};">
                <input type="text" name="no_details_q32" class="form-control mt-2 q32-no-input"
                    placeholder="Provide No details" value="{{ $q32_data['no_details'] ?? '' }}">
            </div>

            <div id="others_q32" style="display: {{ ($q32_checked === '2') ? 'block' : 'none' }};">
                <input type="text" name="others_complicit_official_q32" class="form-control mt-2 q32-others-input"
                    placeholder="Others details" value="{{ $q32_data['others'] ?? '' }}">
            </div>

        </div>

        <p class="text-right mr-3">
            <button type="button" class="btn btn-success" id="temp-save-question32">Save</button>
        </p>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    function toggleq32() {
        let val = $("input[name='is_complicit_official_q32']:checked").val();

        if (!val) {
            val = '1';
            $('#radioYes32').prop('checked', true);
        }

        $('#yes_extra_q32').hide();
        $('#no_extra_q32').hide();
        $('#others_q32').hide();

        if (val === '1') {
            $('#yes_extra_q32').show();
        } else if (val === '0') {
            $('#no_extra_q32').show();
        } else if (val === '2') {
            $('#others_q32').show();
        }
    }

    $(document).on('change', '.thirtytwostatus', toggleq32);
    toggleq32();
});
</script>

<script>
$(document).on("click", "#temp-save-question32", function() {
    let checkedValue = $("input[name='is_complicit_official_q32']:checked").val();
    let q32_data = {};

    if (checkedValue == '1') {
        q32_data.involved_directly_trafficking_title = $('.q32-yes-input').val();
    }

    if (checkedValue == '0') {
        q32_data.no_details = $('.q32-no-input').val();
    }

    if (checkedValue == '2') {
        q32_data.others = $('.q32-others-input').val();
    }

    let new_data = {
        q32_checked_value: checkedValue,
        q32_data: q32_data
    };

    $.ajax({
        type: "POST",
        url: "/superadmin/case/temp-save-question",
        data: {
            _token: "{{ csrf_token() }}",
            question_no: 32,
            question32: new_data
        },
        success: function(response) {
            if (response.success || response) {
                $('.question32 .card-header h6').css('color', 'blue');
                alert("Question 32 Saved Temp ");
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