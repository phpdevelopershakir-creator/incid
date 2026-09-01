@if (($questiontitles[47]->status ?? null) == 1)
    @php
        // সেশন থেকে ৪৮ নম্বর প্রশ্নের ডাটা তুলে নেওয়া
        $question_48_data = session()->get('question48');

        // ডাটা চেক (ডিফল্ট হিসেবে ১ / Yes সেট করা থাকবে যদি ডাটা না থাকে)
        $q48_checked = isset($question_48_data['q48_checked_value']) ? (string)$question_48_data['q48_checked_value'] : null;
        $q48_data = $question_48_data['q48_data'] ?? null;
    @endphp

    <div class="card question48">
        <div class="card-header" id="heading-48">
            <h6 style="color: {{ !empty($question_48_data) ? 'blue' : 'green' }};">
                <a data-toggle="collapse" href="#Question-48" aria-expanded="false" aria-controls="collapse-48">
                    48. {{ $questiontitles[47]->title }}
                </a>
            </h6>
        </div>

        <div id="Question-48" class="collapse" role="tabpanel" aria-labelledby="heading-48" data-parent="#accordion-2">
            <div class="card-body">

                <!-- Radio Buttons (Yes=1, No=0, Others=2) -->
                <input type="radio" id="radioYes48" class="fortyeightstatus" name="q48_status_radio" value="1" 
                    {{ (is_null($q48_checked) || $q48_checked === '1') ? 'checked' : '' }}>
                <label for="radioYes48" class="mr-3">Yes</label>

                <input type="radio" id="radioNo48" class="fortyeightstatus" name="q48_status_radio" value="0" 
                    {{ ($q48_checked === '0') ? 'checked' : '' }}>
                <label for="radioNo48" class="mr-3">No</label>

                <input type="radio" id="radioOthers48" class="fortyeightstatus" name="q48_status_radio" value="2" 
                    {{ ($q48_checked === '2') ? 'checked' : '' }}>
                <label for="radioOthers48">Others</label>

                <!-- Input Field for YES -->
                <div id="yes_extra_q48" style="display: {{ (is_null($q48_checked) || $q48_checked === '1') ? 'block' : 'none' }};">
                    <label class="mt-2 text-muted font-weight-bold">If "YES" details:</label>
                    <input type="text" name="yes_details_q48" class="form-control q48-yes-input"
                        placeholder="Provide Yes details"
                        value="{{ $q48_data['yes_details'] ?? '' }}">
                </div>

                <!-- Input Field for NO -->
                <div id="no_extra_q48" style="display: {{ ($q48_checked === '0') ? 'block' : 'none' }};">
                    <label class="mt-2 text-muted font-weight-bold">If "NO" details:</label>
                    <input type="text" name="no_details_q48" class="form-control q48-no-input"
                        placeholder="Provide No details"
                        value="{{ $q48_data['no_details'] ?? '' }}">
                </div>

                <!-- Input Field for OTHERS -->
                <div id="others_q48" style="display: {{ ($q48_checked === '2') ? 'block' : 'none' }};">
                    <label class="mt-2 text-muted font-weight-bold">If "Others" details:</label>
                    <input type="text" name="others_details_q48" class="form-control q48-others-input" 
                        placeholder="Others details"
                        value="{{ $q48_data['others_details'] ?? '' }}">
                </div>

            </div>

            <p class="text-right mr-3">
                <button type="button" class="btn btn-success" id="temp-save-question48">Save</button>
            </p>
        </div>
    </div>
@endif

<script>
    $(document).ready(function() {
        // Yes / No / Others রেডিও বাটনের টগল লজিক
        function toggleq48() {
            let val = $("input[name='q48_status_radio']:checked").val();

            if (!val) {
                val = '1';
                $('#radioYes48').prop('checked', true);
            }

            // শুরুতে সব ইনপুট বক্স হাইড করা
            $('#yes_extra_q48').hide();
            $('#no_extra_q48').hide();
            $('#others_q48').hide();

            // কন্ডিশন অনুযায়ী নির্দিষ্ট ইনপুট বক্স শো করা
            if (val === '1') {
                $('#yes_extra_q48').show();
            } else if (val === '0') {
                $('#no_extra_q48').show();
            } else if (val === '2') {
                $('#others_q48').show();
            }
        }

        // ইভেন্ট লিসেনার এবং ইনিশিয়াল রান
        $(document).on('change', '.fortyeightstatus', toggleq48);
        toggleq48(); 
    });
</script>

<script>
    // সাময়িকভাবে ডাটা সেভ করার AJAX রিকোয়েস্ট
    $(document).on("click", "#temp-save-question48", function() {
        let checkedValue = $("input[name='q48_status_radio']:checked").val();
        let q48_data = {};

        if (checkedValue == '1') {
            q48_data.yes_details = $('.q48-yes-input').val();
        } else if (checkedValue == '0') {
            q48_data.no_details = $('.q48-no-input').val();
        } else if (checkedValue == '2') {
            q48_data.others_details = $('.q48-others-input').val();
        }

        let new_data = {
            q48_checked_value: checkedValue,
            q48_data: q48_data
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                _token: "{{ csrf_token() }}",
                question_no: 48,
                question48: new_data
            },
            success: function(response) {
                if (response.success) {
                    $('.question48 .card-header h6').css('color', 'blue');
                    alert("Question 48 has been saved temporarily");
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