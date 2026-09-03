@if (($questiontitles[4]->status ?? null) == 1)
    @php
        // সেশন থেকে সরাসরি অ্যারে তুলে নেওয়া হচ্ছে
        $question_5_data = session()->get('question5');

        // ডাটা ইন্টিজার বা স্ট্রিন্গ যাই হোক, টাইপ কাস্টিং এর ঝামেলা এড়াতে বাউন্ডারি ঠিক করা হলো
        $q5_checked = isset($question_5_data['q5_checked_value']) ? (string)$question_5_data['q5_checked_value'] : null;
        $q5_data = $question_5_data['q5_data'] ?? null;
    @endphp

    <div class="card question5">
        <div class="card-header">
            <h6 style="color: {{ !empty($question_5_data) ? 'blue' : 'green' }};">
                <a data-toggle="collapse" href="#Question-5" aria-expanded="false" aria-controls="collapse-4">
                    5. {{ $questiontitles[4]->title }}
                </a>
            </h6>
        </div>

        <div id="Question-5" class="collapse" role="tabpane5" aria-labelledby="heading-4" data-parent="#accordion-2">
            <div class="card-body">

                <!-- ডিফল্ট হিসেবে ১ (Yes) সিলেক্টেড থাকবে যদি কোনো ডাটা না থাকে -->
                <input type="radio" id="radioYes" class="fivestatus" name="is_complicit_official_q5" value="1" 
                    {{ (is_null($q5_checked) || $q5_checked === '1') ? 'checked' : '' }}>
                <label for="radioYes" class="mr-3">Yes</label>

                <input type="radio" id="radioNo" class="fivestatus" name="is_complicit_official_q5" value="0" 
                    {{ ($q5_checked === '0') ? 'checked' : '' }}>
                <label for="radioNo" class="mr-3">No</label>

                <input type="radio" id="radioOthers" class="fivestatus" name="is_complicit_official_q5" value="2" 
                    {{ ($q5_checked === '2') ? 'checked' : '' }}>
                <label for="radioOthers">Others</label>

                <!-- স্টাইল ট্যাগ বাদ দিয়ে সরাসরি ইনলাইন স্টাইল দিয়ে ইনিশিয়াল হাইড হ্যান্ডেল করা হয়েছে -->
                <div id="others_q5" style="display: {{ ($q5_checked === '2') ? 'block' : 'none' }};">
                    <input type="text" name="others_complicit_official_q5" class="form-control mt-2 q5-others-input" placeholder="Others details"
                        value="{{ $q5_data['others'] ?? '' }}">
                </div>

                <div id="yes_extra_q5" style="display: {{ (is_null($q5_checked) || $q5_checked === '1') ? 'block' : 'none' }};">
                    <input type="text" name="involved_directly_trafficking_title_q5" class="form-control mt-2 q5-yes-input"
                        placeholder="Provide Yes details"
                        value="{{ $q5_data['involved_directly_trafficking_title'] ?? '' }}">
                </div>

            </div>

            <p class="text-right mr-3">
                <button type="button" class="btn btn-success" id="temp-save-question5">Save</button>
            </p>
        </div>
    </div>
@endif

<script>
    $(document).ready(function() {
        // Yes/No/Others রেডিও বাটনের টগল লজিক
        function toggleq5() {
            let val = $("input[name='is_complicit_official_q5']:checked").val();

            if (!val) {
                val = '1';
                $('#radioYes').prop('checked', true);
            }

            // শুরুতে সব হাইড করা
            $('#yes_extra_q5').hide();
            $('#others_q5').hide();

            // কন্ডিশন অনুযায়ী শো করা
            if (val === '1') {
                $('#yes_extra_q5').show();
            } else if (val === '2') {
                $('#others_q5').show();
            }
        }

        // ইভেন্ট লিসেনার এবং ইনিশিয়াল রান
        $(document).on('change', '.fivestatus', toggleq5);
        toggleq5(); 
    });
</script>

<script>
    // সাময়িকভাবে ডাটা সেভ করার AJAX রিকোয়েস্ট
    $(document).on("click", "#temp-save-question5", function() {
        let checkedValue = $("input[name='is_complicit_official_q5']:checked").val();
        let q5_data = {};

        if (checkedValue == '1') {
            q5_data.involved_directly_trafficking_title = $('.q5-yes-input').val();
        }

        if (checkedValue == '2') {
            q5_data.others = $('.q5-others-input').val();
        }

        let new_data = {
            q5_checked_value: checkedValue,
            q5_data: q5_data
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                _token: "{{ csrf_token() }}",
                question_no: 5,
                question5: new_data
            },
            success: function(response) {
                if (response.success) {
                    $('.question5 .card-header h6').css('color', 'blue');
                    alert("Question 5 has been saved temporarily");
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