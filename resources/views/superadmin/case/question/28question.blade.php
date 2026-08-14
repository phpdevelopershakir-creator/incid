@if (($questiontitles[27]->status ?? null) == 1)
@php
// সেশন থেকে সরাসরি ২৮ নম্বর প্রশ্নের ডাটা তুলে নেওয়া হচ্ছে
$question_28_data = session()->get('question28');

// ডাটা টাইপ কাস্টিং এর ঝামেলা এড়াতে বাউন্ডারি ঠিক করা হলো
$q28_checked = isset($question_28_data['q28_checked_value']) ? (string)$question_28_data['q28_checked_value'] : null;
$q28_data = $question_28_data['q28_data'] ?? null;
@endphp

<div class="card question28">
    <div class="card-header">
        <h6 style="color: {{ !empty($question_28_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-28" aria-expanded="false" aria-controls="collapse-28">
                28. {{ $questiontitles[27]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-28" class="collapse" role="tabpanel" aria-labelledby="heading-28" data-parent="#accordion-2">
        <div class="card-body">

            <!-- ডিফল্ট হিসেবে ১ (Yes) সিলেক্টেড থাকবে যদি কোনো ডাটা না থাকে -->
            <input type="radio" id="radioYes28" class="twentyeightstatus" name="is_complicit_official_q28" value="1"
                {{ (is_null($q28_checked) || $q28_checked === '1') ? 'checked' : '' }}>
            <label for="radioYes28" class="mr-3">Yes</label>

            <input type="radio" id="radioNo28" class="twentyeightstatus" name="is_complicit_official_q28" value="0"
                {{ ($q28_checked === '0') ? 'checked' : '' }}>
            <label for="radioNo28" class="mr-3">No</label>

            <input type="radio" id="radioOthers28" class="twentyeightstatus" name="is_complicit_official_q28" value="2"
                {{ ($q28_checked === '2') ? 'checked' : '' }}>
            <label for="radioOthers28">Others</label>

            <!-- স্টাইল ট্যাগ বাদ দিয়ে সরাসরি ইনলাইন স্টাইল দিয়ে ইনিশিয়াল হাইড হ্যান্ডেল করা হয়েছে -->
            <div id="others_q28" style="display: {{ ($q28_checked === '2') ? 'block' : 'none' }};">
                <input type="text" name="others_complicit_official_q28" class="form-control mt-2 q28-others-input"
                    placeholder="Others details" value="{{ $q28_data['others'] ?? '' }}">
            </div>

            <div id="yes_extra_q28"
                style="display: {{ (is_null($q28_checked) || $q28_checked === '1') ? 'block' : 'none' }};">
                <input type="text" name="involved_directly_trafficking_title_q28"
                    class="form-control mt-2 q28-yes-input" placeholder="Provide Yes details"
                    value="{{ $q28_data['involved_directly_trafficking_title'] ?? '' }}">
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
    // Yes/No/Others রেডিও বাটনের টগল লজিক
    function toggleq28() {
        let val = $("input[name='is_complicit_official_q28']:checked").val();

        if (!val) {
            val = '1';
            $('#radioYes28').prop('checked', true);
        }

        // শুরুতে সব হাইড করা
        $('#yes_extra_q28').hide();
        $('#others_q28').hide();

        // কন্ডিশন অনুযায়ী শো করা
        if (val === '1') {
            $('#yes_extra_q28').show();
        } else if (val === '2') {
            $('#others_q28').show();
        }
    }

    // ইভেন্ট লিসেনার এবং ইনিশিয়াল রান
    $(document).on('change', '.twentyeightstatus', toggleq28);
    toggleq28();
});
</script>

<script>
// সাময়িকভাবে ডাটা সেভ করার AJAX রিকোয়েস্ট
$(document).on("click", "#temp-save-question28", function() {
    let checkedValue = $("input[name='is_complicit_official_q28']:checked").val();
    let q28_data = {};

    if (checkedValue == '1') {
        q28_data.involved_directly_trafficking_title = $('.q28-yes-input').val();
    }

    if (checkedValue == '2') {
        q28_data.others = $('.q28-others-input').val();
    }

    let new_data = {
        q28_checked_value: checkedValue,
        q28_data: q28_data
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
                alert("Question 28 Temp Saved ");
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