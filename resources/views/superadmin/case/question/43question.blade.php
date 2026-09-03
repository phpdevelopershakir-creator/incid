@if (($questiontitles[42]->status ?? null) == 1)
@php
// সেশন থেকে ৪৩ নম্বর প্রশ্নের ডাটা তুলে নেওয়া
$question_43_data = session()->get('question43');

// ডাটা স্ট্রিন্গ বা টাইপ কাস্টিং এর ঝামেলা এড়াতে বাউন্ডারি ঠিক করা হলো (ডিফল্ট ১/Yes)
$q43_checked = isset($question_43_data['q43_checked_value']) ? (string)$question_43_data['q43_checked_value'] : null;
$q43_data = $question_43_data['q43_data'] ?? null;
@endphp

<div class="card question43">
    <div class="card-header" id="heading-43">
        <h6 style="color: {{ !empty($question_43_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-43" aria-expanded="false" aria-controls="collapse-43">
                43. {{ $questiontitles[42]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-43" class="collapse" role="tabpanel" aria-labelledby="heading-43" data-parent="#accordion-2">
        <div class="card-body">

            <!-- ডিফল্ট হিসেবে ১ (Yes) সিলেক্টেড থাকবে যদি কোনো ডাটা না থাকে -->
            <input type="radio" id="radioYes43" class="fortythreestatus" name="is_government_seek_civil_q43" value="1"
                {{ (is_null($q43_checked) || $q43_checked === '1') ? 'checked' : '' }}>
            <label for="radioYes43" class="mr-3">Yes</label>

            <input type="radio" id="radioNo43" class="fortythreestatus" name="is_government_seek_civil_q43" value="0"
                {{ ($q43_checked === '0') ? 'checked' : '' }}>
            <label for="radioNo43" class="mr-3">No</label>

            <input type="radio" id="radioOthers43" class="fortythreestatus" name="is_government_seek_civil_q43"
                value="2" {{ ($q43_checked === '2') ? 'checked' : '' }}>
            <label for="radioOthers43">Others</label>

            <!-- ইনলাইন স্টাইল দিয়ে ইনিশিয়াল হাইড/শো হ্যান্ডেল করা হয়েছে -->
            <div id="yes_extra_q43"
                style="display: {{ (is_null($q43_checked) || $q43_checked === '1') ? 'block' : 'none' }};">
                <label class="mt-2 text-muted font-weight-bold">If "YES" please describe:</label>
                <input type="text" name="goverment_seek_title_q43" class="form-control q43-yes-input"
                    placeholder="Provide Yes details" value="{{ $q43_data['yes_desc'] ?? '' }}">
            </div>

            <div id="others_q43" style="display: {{ ($q43_checked === '2') ? 'block' : 'none' }};">
                <label class="mt-2 text-muted font-weight-bold">If "Other" please describe:</label>
                <input type="text" name="other_government_seek_civil_q43" class="form-control q43-others-input"
                    placeholder="Others details" value="{{ $q43_data['others'] ?? '' }}">
            </div>

        </div>

        <p class="text-right mr-3">
            <button type="button" class="btn btn-success" id="temp-save-question43">Save</button>
        </p>
    </div>
</div>
@endif

<script>
$(document).ready(function() {
    // Yes/No/Others রেডিও বাটনের টগল লজিক
    function toggleq43() {
        // [FIXED]: সঠিক name (is_government_seek_civil_q43) ব্যবহার করা হয়েছে
        let val = $("input[name='is_government_seek_civil_q43']:checked").val();

        if (!val) {
            val = '1';
            $('#radioYes43').prop('checked', true);
        }

        // শুরুতে সব হাইড করা
        $('#yes_extra_q43').hide();
        $('#others_q43').hide();

        // কন্ডিশন অনুযায়ী শো করা
        if (val === '1') {
            $('#yes_extra_q43').show();
        } else if (val === '2') {
            $('#others_q43').show();
        }
    }

    // ইভেন্ট লিসেনার এবং ইনিশিয়াল রান
    $(document).on('change', '.fortythreestatus', toggleq43);
    toggleq43();
});
</script>

<script>
// সাময়িকভাবে ডাটা সেভ করার AJAX রিকোয়েস্ট
$(document).on("click", "#temp-save-question43", function() {
    // [FIXED]: সঠিক name ব্যবহার করা হয়েছে
    let checkedValue = $("input[name='is_government_seek_civil_q43']:checked").val();
    let q43_data = {};

    if (checkedValue == '1') {
        q43_data.yes_desc = $('.q43-yes-input').val();
    }

    if (checkedValue == '2') {
        q43_data.others = $('.q43-others-input').val();
    }

    let new_data = {
        q43_checked_value: checkedValue,
        q43_data: q43_data
    };

    $.ajax({
        type: "POST",
        url: "/superadmin/case/temp-save-question",
        data: {
            _token: "{{ csrf_token() }}",
            question_no: 43,
            question43: new_data
        },
        success: function(response) {
            if (response.success) {
                $('.question43 .card-header h6').css('color', 'blue');
                alert("Question 43 has been saved temporarily");
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