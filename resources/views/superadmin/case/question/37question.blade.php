@if (($questiontitles[36]->status ?? null) == 1)
@php
// সেশন থেকে সরাসরি ৩৭ নম্বর প্রশ্নের ডাটা তুলে নেওয়া হচ্ছে
$question_37_data = session()->get('question37');

// ডাটা টাইপ কাস্টিং এর ঝামেলা এড়াতে বাউন্ডারি ঠিক করা হলো
$q37_checked = isset($question_37_data['q37_checked_value']) ? (string)$question_37_data['q37_checked_value'] : null;
$q37_data = $question_37_data['q37_data'] ?? null;
@endphp

<div class="card question37">
    <div class="card-header" id="heading-37">
        <h6 style="color: {{ !empty($question_37_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-37" aria-expanded="false" aria-controls="collapse-37">
                37. {{ $questiontitles[36]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-37" class="collapse" role="tabpanel" aria-labelledby="heading-37" data-parent="#accordion-2">
        <div class="card-body">

            <!-- ডিফল্ট হিসেবে ১ (Yes) সিলেক্টেড থাকবে যদি কোনো ডাটা না থাকে -->
            <div class="form-group mb-2">
                <input type="radio" id="radioYes37" class="thirtysevenstatus" name="is_assistance_government_q37"
                    value="1" {{ (is_null($q37_checked) || $q37_checked === '1') ? 'checked' : '' }}>
                <label for="radioYes37" class="mr-3">Yes</label>

                <input type="radio" id="radioNo37" class="thirtysevenstatus" name="is_assistance_government_q37"
                    value="0" {{ ($q37_checked === '0') ? 'checked' : '' }}>
                <label for="radioNo37" class="mr-3">No</label>

                <input type="radio" id="radioOthers37" class="thirtysevenstatus" name="is_assistance_government_q37"
                    value="2" {{ ($q37_checked === '2') ? 'checked' : '' }}>
                <label for="radioOthers37">Others</label>
            </div>

            <!-- Yes সিলেক্ট থাকলে দেখাবে -->
            <div id="yes_extra_q37"
                style="display: {{ (is_null($q37_checked) || $q37_checked === '1') ? 'block' : 'none' }};">
                <input type="text" name="assistance_government_title_q37" class="form-control mt-2 q37-yes-input"
                    placeholder="Provide Yes details" value="{{ $q37_data['assistance_government_title_q37'] ?? '' }}">
            </div>

            <!-- Others সিলেক্ট থাকলে দেখাবে -->
            <div id="others_q37" style="display: {{ ($q37_checked === '2') ? 'block' : 'none' }};">
                <input type="text" name="other_assistance_government_q37" class="form-control mt-2 q37-others-input"
                    placeholder="Others details" value="{{ $q37_data['others'] ?? '' }}">
            </div>

        </div>

        <p class="text-right mr-3">
            <button type="button" class="btn btn-success" id="temp-save-question37">Save</button>
        </p>
    </div>
</div>
@endif

<script>
$(document).ready(function() {
    // Yes/No/Others রেডিও বাটনের টগল লজিক
    function toggleq37() {
        let val = $("input[name='is_assistance_government_q37']:checked").val();

        if (!val) {
            val = '1';
            $('#radioYes37').prop('checked', true);
        }

        // কন্ডিশন অনুযায়ী শো/হাইড করা
        if (val === '1') {
            $('#yes_extra_q37').show();
            $('#others_q37').hide();
        } else if (val === '2') {
            $('#yes_extra_q37').hide();
            $('#others_q37').show();
        } else {
            $('#yes_extra_q37').hide();
            $('#others_q37').hide();
        }
    }

    // ইভেন্ট লিসেনার
    $(document).on('change', '.thirtysevenstatus', toggleq37);

    // সাময়িকভাবে ডাটা সেভ করার AJAX রিকোয়েস্ট
    $(document).on("click", "#temp-save-question37", function() {
        let checkedValue = $("input[name='is_assistance_government_q37']:checked").val();

        let q37_data = {
            assistance_government_title_q37: $('.q37-yes-input').val(),
            others: $('.q37-others-input').val()
        };

        let new_data = {
            q37_checked_value: checkedValue,
            q37_data: q37_data
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                _token: "{{ csrf_token() }}",
                question_no: 37,
                question37: new_data
            },
            success: function(response) {
                if (response.success || response) {
                    $('.question37 .card-header h6').css('color', 'blue');
                    alert("Question 37 Temp Saved Successfully");
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