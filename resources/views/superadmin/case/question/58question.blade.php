@if (($questiontitles[57]->status ?? null) == 1)
@php
    // সেশন থেকে সরাসরি ৫৮ নম্বর প্রশ্নের ডাটা তুলে নেওয়া হচ্ছে
    $question_58_data = session()->get('question58');

    // ডাটা টাইপ কাস্টিং এর ঝামেলা এড়াতে বাউন্ডারি ঠিক করা হলো
    $q58_checked = isset($question_58_data['q58_checked_value']) ? (string)$question_58_data['q58_checked_value'] : null;
    $q58_data = $question_58_data['q58_data'] ?? null;
@endphp

<div class="card question58">
    <div class="card-header" id="heading-58">
        <h6 style="color: {{ !empty($question_58_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-58" aria-expanded="false" aria-controls="Question-58">
                58. {{ $questiontitles[57]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-58" class="collapse" role="tabpanel" aria-labelledby="heading-58" data-parent="#accordion-2">
        <div class="card-body">

            <!-- ডিফল্ট হিসেবে ১ (Yes) সিলেক্টেড থাকবে যদি কোনো ডাটা না থাকে -->
            <div class="form-group mb-2">
                <input type="radio" id="radioYes58" class="fiftyeightstatus" name="is_trafficking_investigations_q58" value="1" 
                    {{ (is_null($q58_checked) || $q58_checked === '1') ? 'checked' : '' }}>
                <label for="radioYes58" class="mr-3">Yes</label>

                <input type="radio" id="radioNo58" class="fiftyeightstatus" name="is_trafficking_investigations_q58" value="0" 
                    {{ ($q58_checked === '0') ? 'checked' : '' }}>
                <label for="radioNo58" class="mr-3">No</label>

                <input type="radio" id="radioOthers58" class="fiftyeightstatus" name="is_trafficking_investigations_q58" value="2" 
                    {{ ($q58_checked === '2') ? 'checked' : '' }}>
                <label for="radioOthers58">Others</label>
            </div>

            <!-- Yes সিলেক্ট থাকলে দেখাবে -->
            <div id="yes_extra_q58" style="display: {{ (is_null($q58_checked) || $q58_checked === '1') ? 'block' : 'none' }};">
                <input type="text" name="trafficking_investigations_title_q58" class="form-control mt-2 q58-yes-input"
                    placeholder="Provide Yes details"
                    value="{{ $q58_data['trafficking_investigations_title_q58'] ?? '' }}">
            </div>

            <!-- Others সিলেক্ট থাকলে দেখাবে -->
            <div id="others_q58" style="display: {{ ($q58_checked === '2') ? 'block' : 'none' }};">
                <input type="text" name="other_trafficking_investigations_q58" class="form-control mt-2 q58-others-input" 
                    placeholder="Others details" value="{{ $q58_data['others'] ?? '' }}">
            </div>

        </div>

        <p class="text-right mr-3">
            <button type="button" class="btn btn-success" id="temp-save-question58">Save</button>
        </p>
    </div>
</div>
@endif

<script>
$(document).ready(function() {
    // Yes/No/Others রেডিও বাটনের টগল লজিক
    function toggleq58() {
        let val = $("input[name='is_trafficking_investigations_q58']:checked").val();

        if (!val) {
            val = '1';
            $('#radioYes58').prop('checked', true);
        }

        // কন্ডিশন অনুযায়ী শো/হাইড করা
        if (val === '1') {
            $('#yes_extra_q58').show();
            $('#others_q58').hide();
        } else if (val === '2') {
            $('#yes_extra_q58').hide();
            $('#others_q58').show();
        } else {
            $('#yes_extra_q58').hide();
            $('#others_q58').hide();
        }
    }

    // ইভেন্ট লিসেনার
    $(document).on('change', '.fiftyeightstatus', toggleq58);

    // সাময়িকভাবে ডাটা সেভ করার AJAX রিকোয়েস্ট
    $(document).on("click", "#temp-save-question58", function() {
        let checkedValue = $("input[name='is_trafficking_investigations_q58']:checked").val();
        
        let q58_data = {
            trafficking_investigations_title_q58: $('.q58-yes-input').val(),
            others: $('.q58-others-input').val()
        };

        let new_data = {
            q58_checked_value: checkedValue,
            q58_data: q58_data
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                _token: "{{ csrf_token() }}",
                question_no: 58,
                question58: new_data
            },
            success: function(response) {
                if (response.success || response) {
                    $('.question58 .card-header h6').css('color', 'blue');
                    alert("Question 58 Temp Saved Successfully");
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