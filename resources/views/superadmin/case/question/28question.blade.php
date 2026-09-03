@if (($questiontitles[27]->status ?? null) == 1)
@php
// Controller 'question28' কি (Key) দিয়ে সেশনে ডাটা রাখছে
$question_28_data = session()->get('question28') ?? [];

// Checked Radio Value বের করা
$q28_checked = isset($question_28_data['q28_checked_value']) 
    ? (string)$question_28_data['q28_checked_value'] 
    : ($question_28_data['is_child_victims_juvenile_q28'] ?? null);

// Inner data extraction
$q28_data = $question_28_data['q28_data'] ?? [];

// Inputs Values Extract
$yes_title_val = $q28_data['child_victims_juvenile_title_q28'] 
    ?? ($q28_data['involved_directly_trafficking_title'] 
    ?? ($question_28_data['child_victims_juvenile_title_q28'] ?? ''));

$others_val = $q28_data['others'] 
    ?? ($question_28_data['others_child_victims_juvenile_q28'] ?? '');
@endphp

<div class="card question28">
    <div class="card-header" id="heading-28">
        <h6 style="color: {{ !empty($question_28_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-28" aria-expanded="false" aria-controls="Question-28">
                28. {{ $questiontitles[27]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-28" class="collapse" role="tabpanel" aria-labelledby="heading-28" data-parent="#accordion-2">
        <div class="card-body">

            <!-- Radio Options (Name Controller অনুযায়ী মিল রাখা হয়েছে) -->
            <div class="form-group mb-2">
                <input type="radio" id="radioYes28" class="twentyeightstatus" name="is_child_victims_juvenile_q28" value="1"
                    {{ (is_null($q28_checked) || $q28_checked === '1') ? 'checked' : '' }}>
                <label for="radioYes28" class="mr-3 font-weight-bold">Yes</label>

                <input type="radio" id="radioNo28" class="twentyeightstatus" name="is_child_victims_juvenile_q28" value="0"
                    {{ ($q28_checked === '0') ? 'checked' : '' }}>
                <label for="radioNo28" class="mr-3 font-weight-bold">No</label>

                <input type="radio" id="radioOthers28" class="twentyeightstatus" name="is_child_victims_juvenile_q28" value="2"
                    {{ ($q28_checked === '2') ? 'checked' : '' }}>
                <label for="radioOthers28" class="font-weight-bold">Others</label>
            </div>

            <!-- Others Description Field -->
            <div id="others_q28" style="display: {{ ($q28_checked === '2') ? 'block' : 'none' }};">
                <input type="text" name="others_child_victims_juvenile_q28" class="form-control mt-2 q28-others-input"
                    placeholder="Others details" value="{{ $others_val }}">
            </div>

            <!-- Yes Input Field (Name Controller অনুযায়ী মিল রাখা হয়েছে) -->
            <div id="yes_extra_q28" style="display: {{ (is_null($q28_checked) || $q28_checked === '1') ? 'block' : 'none' }};">
                <input type="text" name="child_victims_juvenile_title_q28" class="form-control mt-2 q28-yes-input"
                    placeholder="Provide details" value="{{ $yes_title_val }}">
            </div>

        </div>

        <p class="text-right mr-3">
            <button type="button" class="btn btn-success" id="temp-save-question28">Save</button>
        </p>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    // Radio Toggle Logic
    function toggleq28() {
        let val = $("input[name='is_child_victims_juvenile_q28']:checked").val();

        if (!val) {
            val = '1';
            $('#radioYes28').prop('checked', true);
        }

        $('#yes_extra_q28').hide();
        $('#others_q28').hide();

        if (val === '1') {
            $('#yes_extra_q28').show();
        } else if (val === '2') {
            $('#others_q28').show();
        }
    }

    $(document).on('change', '.twentyeightstatus', toggleq28);

    // ================= Temp Save Action =================
    $(document).on("click", "#temp-save-question28", function() {
        let checkedValue = $("input[name='is_child_victims_juvenile_q28']:checked").val();
        let yesInputVal = $('.q28-yes-input').val();
        let othersInputVal = $('.q28-others-input').val();

        let new_data = {
            q28_checked_value: checkedValue,
            is_child_victims_juvenile_q28: checkedValue,
            child_victims_juvenile_title_q28: yesInputVal,
            others_child_victims_juvenile_q28: othersInputVal,
            q28_data: {
                child_victims_juvenile_title_q28: yesInputVal,
                others: othersInputVal
            }
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                _token: "{{ csrf_token() }}",
                question_no: 28,
                question28: new_data
            },
            success: function(response) {
                if (response.success || response) {
                    $('.question28 .card-header h6').css('color', 'blue');
                    alert("Question 28 Temp Saved Successfully");
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