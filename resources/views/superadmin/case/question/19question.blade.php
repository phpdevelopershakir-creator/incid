@if (($questiontitles[18]->status ?? null) == 1)
@php
// ১. সেশন থেকে ১৯ নম্বর প্রশ্নের ডাটা পাওয়া
$question_19_data = session()->get('question19');

// ২. ডাটা বাউন্ডারি ও কাস্টিং ঠিক করা
$q19_checked = isset($question_19_data['q19_checked_value']) ? (string)$question_19_data['q19_checked_value'] : null;
$q19_data = $question_19_data['q19_data'] ?? [];
@endphp

<div class="card question19">
    <div class="card-header" role="tab" id="heading-19">
        <h6 class="card-title" style="color: {{ !empty($question_19_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-19" aria-expanded="false" aria-controls="collapse-19">
                19. {{ $questiontitles[18]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-19" class="collapse" role="tabpanel" aria-labelledby="heading-19" data-parent="#accordion-2">
        <div class="card-body">

            <!-- Radio Options -->
            <div class="icheck-primary d-inline mr-3">
                <input type="radio" id="radioYes19" class="nineteenstatus" name="is_victims_social_service_q19"
                    value="1" {{ (is_null($q19_checked) || $q19_checked === '1') ? 'checked' : '' }}>
                <label for="radioYes19">Yes</label>
            </div>

            <div class="icheck-primary d-inline mr-3">
                <input type="radio" id="radioNo19" class="nineteenstatus" name="is_victims_social_service_q19" value="0"
                    {{ ($q19_checked === '0') ? 'checked' : '' }}>
                <label for="radioNo19">No</label>
            </div>

            <div class="icheck-primary d-inline">
                <input type="radio" id="radioOthers19" class="nineteenstatus" name="is_victims_social_service_q19"
                    value="2" {{ ($q19_checked === '2') ? 'checked' : '' }}>
                <label for="radioOthers19">Others</label>
            </div>

            <!-- Dynamic Input Fields -->
            <div id="yes_extra_q19" class="mt-2"
                style="display: {{ (is_null($q19_checked) || $q19_checked === '1') ? 'block' : 'none' }};">
                <input type="text" name="victims_social_service_title_q19" class="form-control q19-yes-input"
                    placeholder="Provide Yes details" value="{{ $q19_data['victims_social_service_title_q19'] ?? '' }}">
            </div>

            <div id="others_q19" class="mt-2" style="display: {{ ($q19_checked === '2') ? 'block' : 'none' }};">
                <input type="text" name="other_victims_social_service_q19" class="form-control q19-others-input"
                    placeholder="Others details" value="{{ $q19_data['others'] ?? '' }}">
            </div>

            <p class="text-right mt-3">
                <button type="button" class="btn btn-success" id="temp-save-question19">Save</button>
            </p>

        </div>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    // Toggle Logic for Question 19
    function toggleq19() {
        let val = $("input[name='is_victims_social_service_q19']:checked").val();

        if (!val) {
            val = '1';
            $('#radioYes19').prop('checked', true);
        }

        if (val === '1') {
            $('#yes_extra_q19').show();
            $('#others_q19').hide();
            $('.q19-others-input').val(''); // hidden input reset
        } else if (val === '2') {
            $('#yes_extra_q19').hide();
            $('#others_q19').show();
            $('.q19-yes-input').val(''); // hidden input reset
        } else {
            $('#yes_extra_q19').hide();
            $('#others_q19').hide();
            $('.q19-yes-input').val('');
            $('.q19-others-input').val('');
        }
    }

    // Change Listener & Initial Trigger
    $(document).on('change', '.nineteenstatus', toggleq19);

    // Temp Save logic
    $(document).on("click", "#temp-save-question19", function(e) {
        e.preventDefault();

        let checkedValue = $("input[name='is_victims_social_service_q19']:checked").val();
        let q19_data = {};

        if (checkedValue == '1') {
            q19_data.victims_social_service_title_q19 = $('.q19-yes-input').val();
        } else if (checkedValue == '2') {
            q19_data.others = $('.q19-others-input').val();
        }

        let new_data = {
            q19_checked_value: checkedValue,
            q19_data: q19_data
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                _token: "{{ csrf_token() }}",
                question_no: 19,
                question19: new_data
            },
            success: function(response) {
                $('.question19 .card-header h6').css('color', 'blue');
                alert("Question 19 Temp Saved ");
            },
            error: function(xhr, status, error) {
                alert("Something went wrong!");
                console.error(error);
            }
        });
    });

});
</script>