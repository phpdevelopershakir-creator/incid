@if (($questiontitles[24]->status ?? null) == 1)
@php
// ১. সেশন থেকে সরাসরি ২৫ নম্বর প্রশ্নের ডাটা পাওয়া
$question_25_data = session()->get('question25');

// ২. ডাটা বাউন্ডারি ও টাইপ কাস্টিং ঠিক করা
$q25_checked = isset($question_25_data['q25_checked_value']) ? (string)$question_25_data['q25_checked_value'] : null;
$q25_data = $question_25_data['q25_data'] ?? [];
@endphp

<div class="card question25">
    <div class="card-header" role="tab" id="heading-25">
        <h6 class="card-title" style="color: {{ !empty($question_25_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-25" aria-expanded="false" aria-controls="collapse-25">
                25. {{ $questiontitles[24]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-25" class="collapse" role="tabpanel" aria-labelledby="heading-25" data-parent="#accordion-2">
        <div class="card-body">

            <!-- Radio Options -->
            <div class="icheck-primary d-inline mr-3">
                <input type="radio" id="radioYes25" class="twentyfivestatus" name="is_government_person_formally_q25"
                    value="1" {{ (is_null($q25_checked) || $q25_checked === '1') ? 'checked' : '' }}>
                <label for="radioYes25">Yes</label>
            </div>

            <div class="icheck-primary d-inline mr-3">
                <input type="radio" id="radioNo25" class="twentyfivestatus" name="is_government_person_formally_q25"
                    value="0" {{ ($q25_checked === '0') ? 'checked' : '' }}>
                <label for="radioNo25">No</label>
            </div>

            <div class="icheck-primary d-inline">
                <input type="radio" id="radioOthers25" class="twentyfivestatus" name="is_government_person_formally_q25"
                    value="2" {{ ($q25_checked === '2') ? 'checked' : '' }}>
                <label for="radioOthers25">Others</label>
            </div>

            <!-- Dynamic Input Fields -->
            <div id="yes_extra_q25" class="mt-2"
                style="display: {{ (is_null($q25_checked) || $q25_checked === '1') ? 'block' : 'none' }};">
                <input type="text" name="government_person_formally_title_q25" class="form-control q25-yes-input"
                    placeholder="Provide Yes details"
                    value="{{ $q25_data['government_person_formally_title_q25'] ?? '' }}">
            </div>

            <div id="others_q25" class="mt-2" style="display: {{ ($q25_checked === '2') ? 'block' : 'none' }};">
                <input type="text" name="other_government_person_formally_q25" class="form-control q25-others-input"
                    placeholder="Others details" value="{{ $q25_data['others'] ?? '' }}">
            </div>

            <p class="text-right mt-3">
                <button type="button" class="btn btn-success" id="temp-save-question25">Save</button>
            </p>

        </div>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    // Toggle Logic for Question 25
    function toggleq25() {
        let val = $("input[name='is_government_person_formally_q25']:checked").val();

        if (!val) {
            val = '1';
            $('#radioYes25').prop('checked', true);
        }

        if (val === '1') {
            $('#yes_extra_q25').show();
            $('#others_q25').hide();
            $('.q25-others-input').val(''); // Reset hidden input
        } else if (val === '2') {
            $('#yes_extra_q25').hide();
            $('#others_q25').show();
            $('.q25-yes-input').val(''); // Reset hidden input
        } else {
            $('#yes_extra_q25').hide();
            $('#others_q25').hide();
            $('.q25-yes-input').val('');
            $('.q25-others-input').val('');
        }
    }

    // Event Listener and Initial Run
    $(document).on('change', '.twentyfivestatus', toggleq25);

    // Temp Save AJAX Request
    $(document).on("click", "#temp-save-question25", function(e) {
        e.preventDefault();

        let checkedValue = $("input[name='is_government_person_formally_q25']:checked").val();
        let q25_data = {};

        if (checkedValue == '1') {
            // Key mismatch fixed: government_person_formally_title_q25
            q25_data.government_person_formally_title_q25 = $('.q25-yes-input').val();
        } else if (checkedValue == '2') {
            q25_data.others = $('.q25-others-input').val();
        }

        let new_data = {
            q25_checked_value: checkedValue,
            q25_data: q25_data
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                _token: "{{ csrf_token() }}",
                question_no: 25,
                question25: new_data
            },
            success: function(response) {
                $('.question25 .card-header h6').css('color', 'blue');
                alert("Question 25 Temp Saved ");
            },
            error: function(xhr, status, error) {
                alert("Something went wrong!");
                console.error(error);
            }
        });
    });

});
</script>