@if (($questiontitles[28]->status ?? null) == 1)
@php
// Controller 'question29' কি (Key) দিয়ে সেশনে ডাটা রাখছে
$question_29_data = session()->get('question29') ?? [];

// Checked Radio Value বের করা
$q29_checked = isset($question_29_data['q29_checked_value']) 
    ? (string)$question_29_data['q29_checked_value'] 
    : ($question_29_data['is_adult_victims_juvenile_q29'] ?? null);

// Inner data extraction
$q29_data = $question_29_data['q29_data'] ?? [];

// Inputs Values Extract
$yes_title_val = $q29_data['adult_victims_juvenile_title_q29'] 
    ?? ($q29_data['involved_directly_trafficking_title'] 
    ?? ($question_29_data['adult_victims_juvenile_title_q29'] ?? ''));

$others_val = $q29_data['others'] 
    ?? ($question_29_data['others_adult_victims_juvenile_q29'] ?? '');
@endphp

<div class="card question29">
    <div class="card-header" id="heading-29">
        <h6 style="color: {{ !empty($question_29_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-29" aria-expanded="false" aria-controls="Question-29">
                29. {{ $questiontitles[28]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-29" class="collapse" role="tabpanel" aria-labelledby="heading-29" data-parent="#accordion-2">
        <div class="card-body">

            <!-- Radio Options (Controller-এর নামের সাথে মিল রেখে পরিবর্তন করা হয়েছে) -->
            <div class="form-group mb-2">
                <input type="radio" id="radioYes29" class="twentyninestatus" name="is_adult_victims_juvenile_q29" value="1"
                    {{ (is_null($q29_checked) || $q29_checked === '1') ? 'checked' : '' }}>
                <label for="radioYes29" class="mr-3 font-weight-bold">Yes</label>

                <input type="radio" id="radioNo29" class="twentyninestatus" name="is_adult_victims_juvenile_q29" value="0"
                    {{ ($q29_checked === '0') ? 'checked' : '' }}>
                <label for="radioNo29" class="mr-3 font-weight-bold">No</label>

                <input type="radio" id="radioOthers29" class="twentyninestatus" name="is_adult_victims_juvenile_q29" value="2"
                    {{ ($q29_checked === '2') ? 'checked' : '' }}>
                <label for="radioOthers29" class="font-weight-bold">Others</label>
            </div>

            <!-- Others Description Field -->
            <div id="others_q29" style="display: {{ ($q29_checked === '2') ? 'block' : 'none' }};">
                <input type="text" name="others_adult_victims_juvenile_q29" class="form-control mt-2 q29-others-input"
                    placeholder="Others details" value="{{ $others_val }}">
            </div>

            <!-- Yes Input Field (Controller-এর নামের সাথে মিল রেখে পরিবর্তন করা হয়েছে) -->
            <div id="yes_extra_q29" style="display: {{ (is_null($q29_checked) || $q29_checked === '1') ? 'block' : 'none' }};">
                <input type="text" name="adult_victims_juvenile_title_q29" class="form-control mt-2 q29-yes-input"
                    placeholder="Provide details" value="{{ $yes_title_val }}">
            </div>

        </div>

        <p class="text-right mr-3">
            <button type="button" class="btn btn-success" id="temp-save-question29">Save</button>
        </p>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    // Radio Toggle Logic
    function toggleq29() {
        let val = $("input[name='is_adult_victims_juvenile_q29']:checked").val();

        if (!val) {
            val = '1';
            $('#radioYes29').prop('checked', true);
        }

        $('#yes_extra_q29').hide();
        $('#others_q29').hide();

        if (val === '1') {
            $('#yes_extra_q29').show();
        } else if (val === '2') {
            $('#others_q29').show();
        }
    }

    $(document).on('change', '.twentyninestatus', toggleq29);

    // ================= Temp Save Action =================
    $(document).on("click", "#temp-save-question29", function() {
        let checkedValue = $("input[name='is_adult_victims_juvenile_q29']:checked").val();
        let yesInputVal = $('.q29-yes-input').val();
        let othersInputVal = $('.q29-others-input').val();

        let new_data = {
            q29_checked_value: checkedValue,
            is_adult_victims_juvenile_q29: checkedValue,
            adult_victims_juvenile_title_q29: yesInputVal,
            others_adult_victims_juvenile_q29: othersInputVal,
            q29_data: {
                adult_victims_juvenile_title_q29: yesInputVal,
                others: othersInputVal
            }
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                _token: "{{ csrf_token() }}",
                question_no: 29,
                question29: new_data
            },
            success: function(response) {
                if (response.success || response) {
                    $('.question29 .card-header h6').css('color', 'blue');
                    alert("Question 29 Temp Saved Successfully");
                } else {
                    alert("Not Saved");
                }
            },
            error: function() {
                alert("Something went wrong!");
            }
        });
    });

});
</script>