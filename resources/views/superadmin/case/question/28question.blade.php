@if (($questiontitles[27]->status ?? null) == 1)
@php
// সেশন থেকে সরাসরি ২৮ নম্বর প্রশ্নের ডাটা তুলে নেওয়া হচ্ছে
$question_28_data = session()->get('question28');

// ডাটা টাইপ কাস্টিং এর ঝামেলা এড়াতে বাউন্ডারি ঠিক করা হলো
$q28_checked = isset($question_28_data['q28_checked_value']) ? (string)$question_28_data['q28_checked_value'] : null;
$q28_data = $question_28_data['q28_data'] ?? null;
@endphp

<div class="card question28">
    <div class="card-header" id="heading-28">
        <h6 style="color: {{ !empty($question_28_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-28" aria-expanded="false" aria-controls="collapse-28">
                28. {{ $questiontitles[27]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-28" class="collapse" role="tabpanel" aria-labelledby="heading-28" data-parent="#accordion-2">
        <div class="card-body">

            <div class="form-group mb-2">
                <input type="radio" id="radioYes28" class="twentyeightstatus" name="is_child_victims_juvenile_q28" value="1"
                    {{ (is_null($q28_checked) || $q28_checked === '1') ? 'checked' : '' }}>
                <label for="radioYes28" class="mr-3">Yes</label>

                <input type="radio" id="radioNo28" class="twentyeightstatus" name="is_child_victims_juvenile_q28" value="0"
                    {{ ($q28_checked === '0') ? 'checked' : '' }}>
                <label for="radioNo28" class="mr-3">No</label>

                <input type="radio" id="radioOthers28" class="twentyeightstatus" name="is_child_victims_juvenile_q28" value="2"
                    {{ ($q28_checked === '2') ? 'checked' : '' }}>
                <label for="radioOthers28">Others</label>
            </div>

            <div id="yes_extra_q28" style="display: {{ (is_null($q28_checked) || $q28_checked === '1') ? 'block' : 'none' }};">
                <input type="text" name="child_victims_juvenile_title_q28"
                    class="form-control mt-2 q28-yes-input" placeholder="Provide Yes details"
                    value="{{ $q28_data['involved_directly_trafficking_title'] ?? '' }}">
            </div>

            <div id="others_q28" style="display: {{ ($q28_checked === '2') ? 'block' : 'none' }};">
                <input type="text" name="other_child_victims_juvenile_q28" class="form-control mt-2 q28-others-input"
                    placeholder="Others details" value="{{ $q28_data['others'] ?? '' }}">
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
        let val = $("input[name='is_child_victims_juvenile_q28']:checked").val();

        if (!val) {
            val = '1';
            $('#radioYes28').prop('checked', true);
        }

        // কন্ডিশন অনুযায়ী শো/হাইড করা
        if (val === '1') {
            $('#yes_extra_q28').show();
            $('#others_q28').hide();
        } else if (val === '2') {
            $('#yes_extra_q28').hide();
            $('#others_q28').show();
        } else {
            $('#yes_extra_q28').hide();
            $('#others_q28').hide();
        }
    }

    // ইভেন্ট লিসেনার
    $(document).on('change', '.twentyeightstatus', toggleq28);

    // সাময়িকভাবে ডাটা সেভ করার AJAX রিকোয়েস্ট
    $(document).on("click", "#temp-save-question28", function() {
        let checkedValue = $("input[name='is_child_victims_juvenile_q28']:checked").val();
        
        // উভয় ইনপুট ফিল্ডের ডাটা একসাথে নেওয়া
        let q28_data = {
            involved_directly_trafficking_title: $('.q28-yes-input').val(),
            others: $('.q28-others-input').val()
        };

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
                    alert("Question 28 Temp Saved Successfully");
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