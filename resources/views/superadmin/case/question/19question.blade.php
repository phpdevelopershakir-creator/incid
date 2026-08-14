@if (($questiontitles[18]->status ?? null) == 1)
@php
// সেশন থেকে সরাসরি ১৯ নম্বর প্রশ্নের ডাটা তুলে নেওয়া হচ্ছে
$question_19_data = session()->get('question19');

// ডাটা ইন্টিজার বা স্ট্রিন্গ যাই হোক, টাইপ কাস্টিং এর ঝামেলা এড়াতে বাউন্ডারি ঠিক করা হলো
$q19_checked = isset($question_19_data['q19_checked_value']) ? (string)$question_19_data['q19_checked_value'] : null;
$q19_data = $question_19_data['q19_data'] ?? null;
@endphp

<div class="card question19">
    <div class="card-header">
        <h6 style="color: {{ !empty($question_19_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-19" aria-expanded="false" aria-controls="collapse-19">
                19. {{ $questiontitles[18]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-19" class="collapse" role="tabpanel" aria-labelledby="heading-19" data-parent="#accordion-2">
        <div class="card-body">

            <!-- ডিফল্ট হিসেবে ১ (Yes) সিলেক্টেড থাকবে যদি কোনো ডাটা না থাকে -->
            <input type="radio" id="radioYes19" class="nineteenstatus" name="is_complicit_official_q19" value="1"
                {{ (is_null($q19_checked) || $q19_checked === '1') ? 'checked' : '' }}>
            <label for="radioYes19" class="mr-3">Yes</label>

            <input type="radio" id="radioNo19" class="nineteenstatus" name="is_complicit_official_q19" value="0"
                {{ ($q19_checked === '0') ? 'checked' : '' }}>
            <label for="radioNo19" class="mr-3">No</label>

            <input type="radio" id="radioOthers19" class="nineteenstatus" name="is_complicit_official_q19" value="2"
                {{ ($q19_checked === '2') ? 'checked' : '' }}>
            <label for="radioOthers19">Others</label>

            <!-- ইনলাইন স্টাইল দিয়ে ইনিশিয়াল হাইড/শো হ্যান্ডেল করা হয়েছে -->
            <div id="others_q19" style="display: {{ ($q19_checked === '2') ? 'block' : 'none' }};">
                <input type="text" name="others_complicit_official_q19" class="form-control mt-2 q19-others-input"
                    placeholder="Others details" value="{{ $q19_data['others'] ?? '' }}">
            </div>

            <div id="yes_extra_q19"
                style="display: {{ (is_null($q19_checked) || $q19_checked === '1') ? 'block' : 'none' }};">
                <input type="text" name="involved_directly_trafficking_title_q19"
                    class="form-control mt-2 q19-yes-input" placeholder="Provide Yes details"
                    value="{{ $q19_data['involved_directly_trafficking_title'] ?? '' }}">
            </div>

        </div>

        <p class="text-right mr-3">
            <button type="button" class="btn btn-success" id="temp-save-question19">Save</button>
        </p>
    </div>
</div>
@endif

<script>
$(document).ready(function() {
    // Yes/No/Others রেডিও বাটনের টগল লজিক
    function toggleq19() {
        let val = $("input[name='is_complicit_official_q19']:checked").val();

        if (!val) {
            val = '1';
            $('#radioYes19').prop('checked', true);
        }

        // শুরুতে সব হাইড করা
        $('#yes_extra_q19').hide();
        $('#others_q19').hide();

        // কন্ডিশন অনুযায়ী শো করা
        if (val === '1') {
            $('#yes_extra_q19').show();
        } else if (val === '2') {
            $('#others_q19').show();
        }
    }

    // ইভেন্ট লিসেনার এবং ইনিশিয়াল রান
    $(document).on('change', '.nineteenstatus', toggleq19);
    toggleq19();
});
</script>

<script>
// সাময়িকভাবে ডাটা সেভ করার AJAX রিকোয়েস্ট
$(document).on("click", "#temp-save-question19", function() {
    let checkedValue = $("input[name='is_complicit_official_q19']:checked").val();
    let q19_data = {};

    if (checkedValue == '1') {
        q19_data.involved_directly_trafficking_title = $('.q19-yes-input').val();
    }

    if (checkedValue == '2') {
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
            if (response.success || response) {
                $('.question19 .card-header h6').css('color', 'blue');
                alert("Question 19 Temp Saved");
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