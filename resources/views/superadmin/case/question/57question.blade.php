@if (($questiontitles[56]->status ?? null) == 1)
@php
$question_57_data = session()->get('question57') ?? [];
$q57_checked = isset($question_57_data['q57_checked_value']) ? (string)$question_57_data['q57_checked_value'] : '1';
$desc_val = $question_57_data['tip_report_updates'] ?? '';
$others_val = $question_57_data['others_tip_report'] ?? '';
@endphp

<div class="card question57">
    <div class="card-header" id="heading-57">
        <h6 style="color: {{ !empty($question_57_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-57" aria-expanded="false" aria-controls="Question-57">
                57. {{ $questiontitles[56]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-57" class="collapse" role="tabpanel" aria-labelledby="heading-57" data-parent="#accordion-2">
        <div class="card-body">

            <!-- Radio Options -->
            <div class="form-group mb-2">
                <input type="radio" id="radioYes57" class="fiftysevenstatus" name="is_considering_reported_q57"
                    value="1" {{ ($q57_checked === '1') ? 'checked' : '' }}>
                <label for="radioYes57" class="mr-3 font-weight-bold">Yes</label>

                <input type="radio" id="radioNo57" class="fiftysevenstatus" name="is_considering_reported_q57" value="0"
                    {{ ($q57_checked === '0') ? 'checked' : '' }}>
                <label for="radioNo57" class="mr-3 font-weight-bold">No</label>

                <input type="radio" id="radioOthers57" class="fiftysevenstatus" name="is_considering_reported_q57"
                    value="2" {{ ($q57_checked === '2') ? 'checked' : '' }}>
                <label for="radioOthers57" class="font-weight-bold">Others</label>
            </div>

            <!-- YES Block (Only Description for YES) -->
            <div id="yes_extra_q57" style="display: {{ ($q57_checked === '1') ? 'block' : 'none' }};">
                <div class="form-group mt-3">

                    <textarea name="desc_considering_reported_q57" class="form-control q57-desc-input" rows="3"
                        placeholder="Please describe">{{ $desc_val }}</textarea>
                </div>
            </div>

            <!-- OTHERS Block (Only Description for OTHERS) -->
            <div id="others_q57" style="display: {{ ($q57_checked === '2') ? 'block' : 'none' }};">
                <div class="form-group mt-3">

                    <textarea name="other_considering_reported_q57" class="form-control q57-others-input" rows="2"
                        placeholder="Please describe">{{ $others_val }}</textarea>
                </div>
            </div>

        </div>

        <p class="text-right mr-3">
            <button type="button" class="btn btn-success" id="temp-save-question57">Save</button>
        </p>
    </div>
</div>
@endif

<script>
// Inline Pure JavaScript toggle (jQuery-র ওপর নির্ভর না করে সরাসরি কাজ করবে)
function applyToggleQ57() {
    var selectedVal = document.querySelector('input[name="is_considering_reported_q57"]:checked');
    var yesBox = document.getElementById('yes_extra_q57');
    var othersBox = document.getElementById('others_q57');

    if (!yesBox || !othersBox) return;

    var val = selectedVal ? selectedVal.value : '1';

    if (val === '1') {
        yesBox.style.display = 'block';
        othersBox.style.display = 'none';
    } else if (val === '2') {
        yesBox.style.display = 'none';
        othersBox.style.display = 'block';
    } else {
        // NO (val === '0') -> Hide Everything
        yesBox.style.display = 'none';
        othersBox.style.display = 'none';
    }
}

// Page Load & Change Event Listeners
document.addEventListener("DOMContentLoaded", function() {
    applyToggleQ57();

    var radios = document.querySelectorAll('input[name="is_considering_reported_q57"]');
    radios.forEach(function(radio) {
        radio.addEventListener('change', applyToggleQ57);
    });
});

// jQuery for Temp Save AJAX
$(document).ready(function() {
    $(document).on("click", "#temp-save-question57", function() {
        let checkedValue = $("input[name='is_considering_reported_q57']:checked").val();

        let q57_data = {
            tip_report_updates: $('.q57-desc-input').val(),
            others_tip_report: $('.q57-others-input').val()
        };

        let new_data = {
            q57_checked_value: checkedValue ? checkedValue : '1',
            q57_data: q57_data
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                _token: "{{ csrf_token() }}",
                question_no: 57,
                question57: new_data
            },
            success: function(response) {
                if (response.success) {
                    $('.question57 .card-header h6').css('color', 'blue');
                    alert("Question 57 Temp Saved");
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