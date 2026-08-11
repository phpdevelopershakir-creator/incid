@if (($questiontitles[24]->status ?? null) == 1)
@php
// সেশন থেকে সরাসরি ২৫ নম্বর প্রশ্নের ডাটা তুলে নেওয়া হচ্ছে
$question_25_data = session()->get('question25');

// ডাটা টাইপ কাস্টিং এর ঝামেলা এড়াতে বাউন্ডারি ঠিক করা হলো
$q25_checked = isset($question_25_data['q25_checked_value']) ? (string)$question_25_data['q25_checked_value'] : null;
$q25_data = $question_25_data['q25_data'] ?? null;
@endphp

<div class="card question25">
    <div class="card-header">
        <h6 style="color: {{ !empty($question_25_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-25" aria-expanded="false" aria-controls="collapse-25">
                25. {{ $questiontitles[24]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-25" class="collapse" role="tabpanel" aria-labelledby="heading-25" data-parent="#accordion-2">
        <div class="card-body">

            <!-- ডিফল্ট হিসেবে ১ (Yes) সিলেক্টেড থাকবে যদি কোনো ডাটা না থাকে -->
            <input type="radio" id="radioYes25" class="twentyfivestatus" name="is_complicit_official_q25" value="1"
                {{ (is_null($q25_checked) || $q25_checked === '1') ? 'checked' : '' }}>
            <label for="radioYes25" class="mr-3">Yes</label>

            <input type="radio" id="radioNo25" class="twentyfivestatus" name="is_complicit_official_q25" value="0"
                {{ ($q25_checked === '0') ? 'checked' : '' }}>
            <label for="radioNo25" class="mr-3">No</label>

            <input type="radio" id="radioOthers25" class="twentyfivestatus" name="is_complicit_official_q25" value="2"
                {{ ($q25_checked === '2') ? 'checked' : '' }}>
            <label for="radioOthers25">Others</label>

            <!-- ইনলাইন স্টাইল দিয়ে ইনিশিয়াল হাইড/শো হ্যান্ডেল করা হয়েছে -->
            <div id="others_q25" style="display: {{ ($q25_checked === '2') ? 'block' : 'none' }};">
                <input type="text" name="others_complicit_official_q25" class="form-control mt-2 q25-others-input"
                    placeholder="Others details" value="{{ $q25_data['others'] ?? '' }}">
            </div>

            <div id="yes_extra_q25"
                style="display: {{ (is_null($q25_checked) || $q25_checked === '1') ? 'block' : 'none' }};">
                <input type="text" name="involved_directly_trafficking_title_q25"
                    class="form-control mt-2 q25-yes-input" placeholder="Provide Yes details"
                    value="{{ $q25_data['involved_directly_trafficking_title'] ?? '' }}">
            </div>

        </div>

        <p class="text-right mr-3">
            <button type="button" class="btn btn-success" id="temp-save-question25">Save</button>
        </p>
    </div>
</div>
@endif

<script>
$(document).ready(function() {
    // Yes/No/Others রেডিও বাটনের টগল লজিক
    function toggleq25() {
        let val = $("input[name='is_complicit_official_q25']:checked").val();

        if (!val) {
            val = '1';
            $('#radioYes25').prop('checked', true);
        }

        // শুরুতে সব হাইড করা
        $('#yes_extra_q25').hide();
        $('#others_q25').hide();

        // কন্ডিশন অনুযায়ী শো করা
        if (val === '1') {
            $('#yes_extra_q25').show();
        } else if (val === '2') {
            $('#others_q25').show();
        }
    }

    // ইভেন্ট লিসেনার এবং ইনিশিয়াল রান
    $(document).on('change', '.twentyfivestatus', toggleq25);
    toggleq25();
});
</script>

<script>
// সাময়িকভাবে ডাটা সেভ করার AJAX রিকোয়েস্ট
$(document).on("click", "#temp-save-question25", function() {
    let checkedValue = $("input[name='is_complicit_official_q25']:checked").val();
    let q25_data = {};

    if (checkedValue == '1') {
        q25_data.involved_directly_trafficking_title = $('.q25-yes-input').val();
    }

    if (checkedValue == '2') {
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
            if (response.success || response) {
                $('.question25 .card-header h6').css('color', 'blue');
                alert("Question 25 has been saved temporarily ✅");
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