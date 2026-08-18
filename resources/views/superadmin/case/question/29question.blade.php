@if (($questiontitles[28]->status ?? null) == 1)
@php
// সেশন থেকে সরাসরি ২৯ নম্বর প্রশ্নের ডাটা তুলে নেওয়া হচ্ছে
$question_29_data = session()->get('question29');

// ডাটা টাইপ কাস্টিং এর ঝামেলা এড়াতে বাউন্ডারি ঠিক করা হলো
$q29_checked = isset($question_29_data['q29_checked_value']) ? (string)$question_29_data['q29_checked_value'] : null;
$q29_data = $question_29_data['q29_data'] ?? null;
@endphp

<div class="card question29">
    <div class="card-header" id="heading-29">
        <h6 style="color: {{ !empty($question_29_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-29" aria-expanded="false" aria-controls="collapse-29">
                29. {{ $questiontitles[28]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-29" class="collapse" role="tabpanel" aria-labelledby="heading-29" data-parent="#accordion-2">
        <div class="card-body">

            <!-- ডিফল্ট হিসেবে ১ (Yes) সিলেক্টেড থাকবে যদি কোনো ডাটা না থাকে -->
            <div class="form-group mb-2">
                <input type="radio" id="radioYes29" class="twentyninestatus" name="is_adult_victims_juvenile_q29" value="1"
                    {{ (is_null($q29_checked) || $q29_checked === '1') ? 'checked' : '' }}>
                <label for="radioYes29" class="mr-3">Yes</label>

                <input type="radio" id="radioNo29" class="twentyninestatus" name="is_adult_victims_juvenile_q29" value="0"
                    {{ ($q29_checked === '0') ? 'checked' : '' }}>
                <label for="radioNo29" class="mr-3">No</label>

                <input type="radio" id="radioOthers29" class="twentyninestatus" name="is_adult_victims_juvenile_q29" value="2"
                    {{ ($q29_checked === '2') ? 'checked' : '' }}>
                <label for="radioOthers29">Others</label>
            </div>

            <!-- Yes সিলেক্ট থাকলে দেখাবে -->
            <div id="yes_extra_q29" style="display: {{ (is_null($q29_checked) || $q29_checked === '1') ? 'block' : 'none' }};">
                <input type="text" name="adult_victims_juvenile_title_q29"
                    class="form-control mt-2 q29-yes-input" placeholder="Provide Yes details"
                    value="{{ $q29_data['involved_directly_trafficking_title'] ?? '' }}">
            </div>

            <!-- Others সিলেক্ট থাকলে দেখাবে -->
            <div id="others_q29" style="display: {{ ($q29_checked === '2') ? 'block' : 'none' }};">
                <input type="text" name="other_adult_victims_juvenile_q29" class="form-control mt-2 q29-others-input"
                    placeholder="Others details" value="{{ $q29_data['others'] ?? '' }}">
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
    // Yes/No/Others রেডিও বাটনের টগল লজিক
    function toggleq29() {
        let val = $("input[name='is_adult_victims_juvenile_q29']:checked").val();

        if (!val) {
            val = '1';
            $('#radioYes29').prop('checked', true);
        }

        // কন্ডিশন অনুযায়ী শো/হাইড করা
        if (val === '1') {
            $('#yes_extra_q29').show();
            $('#others_q29').hide();
        } else if (val === '2') {
            $('#yes_extra_q29').hide();
            $('#others_q29').show();
        } else {
            $('#yes_extra_q29').hide();
            $('#others_q29').hide();
        }
    }

    // ইভент লিসেনার
    $(document).on('change', '.twentyninestatus', toggleq29);

    // সাময়িকভাবে ডাটা সেভ করার AJAX রিকোয়েস্ট
    $(document).on("click", "#temp-save-question29", function() {
        let checkedValue = $("input[name='is_adult_victims_juvenile_q29']:checked").val();
        
        // উভয় ইনপুট ফিল্ডের ডাটা একসাথে নেওয়া
        let q29_data = {
            involved_directly_trafficking_title: $('.q29-yes-input').val(),
            others: $('.q29-others-input').val()
        };

        let new_data = {
            q29_checked_value: checkedValue,
            q29_data: q29_data
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