@if (($questiontitles[14]->status ?? null) == 1)
@php
// ১. সেশন থেকে ১৫ নম্বর প্রশ্নের ডাটা ক্যাচ করা
$question_15_data = session()->get('question15');

$q15_checked = $question_15_data['q15_checked_value'] ?? '1';
$q15_others_val = $question_15_data['others'] ?? '';

// Row 1 Data
$q15_r1_status = $question_15_data['q15_r1_status'] ?? '1';
$q15_r1_yes_val = $question_15_data['q15_r1_yes_val'] ?? '';
$q15_r1_others = $question_15_data['q15_r1_others'] ?? '';

// Row 2 Data
$q15_r2_status = $question_15_data['q15_r2_status'] ?? '1';
$q15_r2_yes_val = $question_15_data['q15_r2_yes_val'] ?? '';
$q15_r2_others = $question_15_data['q15_r2_others'] ?? '';

// Row 3 Data
$q15_r3_status = $question_15_data['q15_r3_status'] ?? '1';
$q15_r3_yes_val = $question_15_data['q15_r3_yes_val'] ?? '';
$q15_r3_others = $question_15_data['q15_r3_others'] ?? '';
$q15_c_file = $question_15_data['q15_c_file'] ?? '';
@endphp

<style>
.q15_others_container {
    display: none;
}

.q15_tables_wrapper {
    display: none;
}

.sub_field_box {
    display: none;
}
</style>

<div class="card question15">
    <div class="card-header" role="tab" id="heading-15">
        <h6 class="card-title" style="color: {{ !empty($question_15_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-15" aria-expanded="false" aria-controls="collapse-15">
                15. {{ $questiontitles[14]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-15" class="collapse" role="tabpanel" aria-labelledby="heading-15" data-parent="#accordion-2">
        <div class="card-body">

            <!-- মূল রেডিও বাটন (Yes / No / Others) -->
            <div class="mb-3">
                <div class="icheck-primary d-inline mr-3">
                    <input type="radio" class="q15_main_status" id="q15_main_yes" name="is_victim_identification_q15"
                        value="1" {{ $q15_checked == '1' ? 'checked' : '' }}>
                    <label for="q15_main_yes">Yes</label>
                </div>
                <div class="icheck-primary d-inline mr-3">
                    <input type="radio" class="q15_main_status" id="q15_main_no" name="is_victim_identification_q15"
                        value="0" {{ $q15_checked == '0' ? 'checked' : '' }}>
                    <label for="q15_main_no">No</label>
                </div>
                <div class="icheck-primary d-inline">
                    <input type="radio" class="q15_main_status" id="q15_main_others" name="is_victim_identification_q15"
                        value="2" {{ $q15_checked == '2' ? 'checked' : '' }}>
                    <label for="q15_main_others">Others</label>
                </div>
            </div>

            <!-- 🔹 মূল প্রশ্নের Others সিলেক্ট করলে এই ফিল্ড আসবে -->
            <div class="mb-3 q15_others_container" style="display: {{ $q15_checked == '2' ? 'block' : 'none' }};">
                <input type="text" id="q15others" name="other_victim_identification_q15" class="form-control col-md-6"
                    placeholder="Others details" value="{{ $q15_others_val }}">
            </div>

            <!-- 🔹 মূল প্রশ্নের Yes সিলেক্ট করলে ৩টি রো/টেবিল শো করবে -->
            <div class="q15_tables_wrapper" style="display: {{ $q15_checked == '1' ? 'block' : 'none' }};">

                <p><strong>If yes;</strong></p>

                <table class="table table-bordered mb-0">
                    <tbody>
                        <!-- 🔴 Row / Table 1 -->
                        <tr>
                            <td>
                                <label class="font-weight-bold">
                                    1. Did front-line officials have a victim identification protocol or other formal
                                    written procedures to guide proactive victim identification?
                                </label>
                                <div class="mt-2">
                                    <div class="icheck-primary d-inline mr-3">
                                        <input type="radio" class="q15_r1_status" id="q15_r1_yes" name="q15_r1_radio"
                                            value="1" {{ $q15_r1_status == '1' ? 'checked' : '' }}>
                                        <label for="q15_r1_yes">Yes</label>
                                    </div>
                                    <div class="icheck-primary d-inline mr-3">
                                        <input type="radio" class="q15_r1_status" id="q15_r1_no" name="q15_r1_radio"
                                            value="0" {{ $q15_r1_status == '0' ? 'checked' : '' }}>
                                        <label for="q15_r1_no">No</label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" class="q15_r1_status" id="q15_r1_others" name="q15_r1_radio"
                                            value="2" {{ $q15_r1_status == '2' ? 'checked' : '' }}>
                                        <label for="q15_r1_others">Others</label>
                                    </div>
                                </div>

                                <!-- Row 1 এর Yes এর ইনপুট ফিল্ড -->
                                <div class="mt-2 q15_r1_yes_box sub_field_box"
                                    style="display: {{ $q15_r1_status == '1' ? 'block' : 'none' }};">
                                    <input type="text" id="q15_r1_yes_text" class="form-control col-md-8"
                                        placeholder="Provide Yes details for Row 1" value="{{ $q15_r1_yes_val }}">
                                </div>

                                <!-- Row 1 এর Others এর ইনপুট ফিল্ড -->
                                <div class="mt-2 q15_r1_others_box sub_field_box"
                                    style="display: {{ $q15_r1_status == '2' ? 'block' : 'none' }};">
                                    <input type="text" id="q15_r1_others_text" class="form-control col-md-8"
                                        placeholder="Others details for Row 1" value="{{ $q15_r1_others }}">
                                </div>
                            </td>
                        </tr>

                        <!-- 🔴 Row / Table 2 -->
                        <tr>
                            <td>
                                <label class="font-weight-bold">
                                    2. Does the protocol or other formal written procedure outline steps to screen
                                    populations at increased risk of trafficking per the previous year’s TIP Report or
                                    other reporting on emerging trends involving the country or its nationals?
                                </label>
                                <div class="mt-2">
                                    <div class="icheck-primary d-inline mr-3">
                                        <input type="radio" class="q15_r2_status" id="q15_r2_yes" name="q15_r2_radio"
                                            value="1" {{ $q15_r2_status == '1' ? 'checked' : '' }}>
                                        <label for="q15_r2_yes">Yes</label>
                                    </div>
                                    <div class="icheck-primary d-inline mr-3">
                                        <input type="radio" class="q15_r2_status" id="q15_r2_no" name="q15_r2_radio"
                                            value="0" {{ $q15_r2_status == '0' ? 'checked' : '' }}>
                                        <label for="q15_r2_no">No</label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" class="q15_r2_status" id="q15_r2_others" name="q15_r2_radio"
                                            value="2" {{ $q15_r2_status == '2' ? 'checked' : '' }}>
                                        <label for="q15_r2_others">Others</label>
                                    </div>
                                </div>

                                <!-- Row 2 এর Yes এর ইনপুট ফিল্ড -->
                                <div class="mt-2 q15_r2_yes_box sub_field_box"
                                    style="display: {{ $q15_r2_status == '1' ? 'block' : 'none' }};">
                                    <input type="text" id="q15_r2_yes_text" class="form-control col-md-8"
                                        placeholder="Provide Yes details for Row 2" value="{{ $q15_r2_yes_val }}">
                                </div>

                                <!-- Row 2 এর Others এর ইনপুট ফিল্ড -->
                                <div class="mt-2 q15_r2_others_box sub_field_box"
                                    style="display: {{ $q15_r2_status == '2' ? 'block' : 'none' }};">
                                    <input type="text" id="q15_r2_others_text" class="form-control col-md-8"
                                        placeholder="Others details for Row 2" value="{{ $q15_r2_others }}">
                                </div>
                            </td>
                        </tr>

                        <!-- 🔴 Row / Table 3 -->
                        <tr>
                            <td>
                                <label class="font-weight-bold">
                                    3. <u>Share copies of the victim identification protocol or any formal written
                                        procedures used for victim identification, if any.</u>
                                </label>
                                <div class="mt-2">
                                    <div class="icheck-primary d-inline mr-3">
                                        <input type="radio" class="q15_r3_status" id="q15_r3_yes" name="q15_r3_radio"
                                            value="1" {{ $q15_r3_status == '1' ? 'checked' : '' }}>
                                        <label for="q15_r3_yes">Yes</label>
                                    </div>
                                    <div class="icheck-primary d-inline mr-3">
                                        <input type="radio" class="q15_r3_status" id="q15_r3_no" name="q15_r3_radio"
                                            value="0" {{ $q15_r3_status == '0' ? 'checked' : '' }}>
                                        <label for="q15_r3_no">No</label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" class="q15_r3_status" id="q15_r3_others" name="q15_r3_radio"
                                            value="2" {{ $q15_r3_status == '2' ? 'checked' : '' }}>
                                        <label for="q15_r3_others">Others</label>
                                    </div>
                                </div>

                                <!-- Row 3 এর Yes এর ইনপুট ফিল্ড -->
                                <div class="mt-2 q15_r3_yes_box sub_field_box"
                                    style="display: {{ $q15_r3_status == '1' ? 'block' : 'none' }};">
                                    <input type="text" id="q15_r3_yes_text" class="form-control col-md-8 mb-2"
                                        placeholder="Provide Yes details for Row 3" value="{{ $q15_r3_yes_val }}">
                                </div>

                                <!-- Row 3 এর Others এর ইনপুট ফিল্ড -->
                                <div class="mt-2 q15_r3_others_box sub_field_box"
                                    style="display: {{ $q15_r3_status == '2' ? 'block' : 'none' }};">
                                    <input type="text" id="q15_r3_others_text" class="form-control col-md-8 mb-2"
                                        placeholder="Others details for Row 3" value="{{ $q15_r3_others }}">
                                </div>

                                <!-- File Upload Field -->
                                <div class="mt-3">
                                    <label class="font-weight-bold">Please upload/attach the document:</label>
                                    <input type="file" id="q15_c_file_input" name="q15_c_file"
                                        class="form-control-file">
                                    @if(!empty($q15_c_file))
                                    <small class="text-success d-block mt-1">Uploaded File: {{ $q15_c_file }}</small>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p class="text-right mt-3">
                <button type="button" class="btn btn-success" id="temp-save-question15">Save</button>
            </p>

        </div>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    // ⬅️ মূল রেডিও বাটন (Yes / No / Others) টগল
    $(document).on('change', '.q15_main_status', function() {
        let val = $("input[name='is_victim_identification_q15']:checked").val();

        if (val == '1') { // Yes
            $('.q15_tables_wrapper').show();
            $('.q15_others_container').hide();
            $('#q15others').val('');
        } else if (val == '2') { // Others
            $('.q15_tables_wrapper').hide();
            $('.q15_others_container').show();
        } else { // No
            $('.q15_tables_wrapper').hide();
            $('.q15_others_container').hide();
            $('#q15others').val('');
        }
    });

    // ⬅️ Row 1 টগল লজিক (Yes/No/Others)
    $(document).on('change', '.q15_r1_status', function() {
        let val = $("input[name='q15_r1_radio']:checked").val();
        $('.q15_r1_yes_box, .q15_r1_others_box').hide();
        if (val == '1') {
            $('.q15_r1_yes_box').show();
        } else if (val == '2') {
            $('.q15_r1_others_box').show();
        }
    });

    // ⬅️ Row 2 টগল লজিক (Yes/No/Others)
    $(document).on('change', '.q15_r2_status', function() {
        let val = $("input[name='q15_r2_radio']:checked").val();
        $('.q15_r2_yes_box, .q15_r2_others_box').hide();
        if (val == '1') {
            $('.q15_r2_yes_box').show();
        } else if (val == '2') {
            $('.q15_r2_others_box').show();
        }
    });

    // ⬅️ Row 3 টগল লজিক (Yes/No/Others)
    $(document).on('change', '.q15_r3_status', function() {
        let val = $("input[name='q15_r3_radio']:checked").val();
        $('.q15_r3_yes_box, .q15_r3_others_box').hide();
        if (val == '1') {
            $('.q15_r3_yes_box').show();
        } else if (val == '2') {
            $('.q15_r3_others_box').show();
        }
    });

    // ⬅️ টেম্পোরারি সেভ AJAX লজিক
    $(document).on('click', '#temp-save-question15', function(e) {
        e.preventDefault();

        let checkedVal = $("input[name='is_victim_identification_q15']:checked").val();

        let formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('question_no', 15);

        // মূল রেডিও এবং আদার্স
        formData.append('question15[q15_checked_value]', checkedVal || '1');
        formData.append('question15[others]', $('#q15others').val());

        // Row 1
        formData.append('question15[q15_r1_status]', $("input[name='q15_r1_radio']:checked").val() ||
            '1');
        formData.append('question15[q15_r1_yes_val]', $('#q15_r1_yes_text').val());
        formData.append('question15[q15_r1_others]', $('#q15_r1_others_text').val());

        // Row 2
        formData.append('question15[q15_r2_status]', $("input[name='q15_r2_radio']:checked").val() ||
            '1');
        formData.append('question15[q15_r2_yes_val]', $('#q15_r2_yes_text').val());
        formData.append('question15[q15_r2_others]', $('#q15_r2_others_text').val());

        // Row 3
        formData.append('question15[q15_r3_status]', $("input[name='q15_r3_radio']:checked").val() ||
            '1');
        formData.append('question15[q15_r3_yes_val]', $('#q15_r3_yes_text').val());
        formData.append('question15[q15_r3_others]', $('#q15_r3_others_text').val());

        // ফাইল আপলোড
        let fileInput = $('#q15_c_file_input')[0];
        if (fileInput && fileInput.files.length > 0) {
            formData.append('q15_c_file', fileInput.files[0]);
        }

        $.ajax({
            url: "/superadmin/case/temp-save-question",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success || response) {
                    $('.question15 .card-header h6').css('color', 'blue');
                    alert("Question 15 Temp Saved");
                }
            },
            error: function(err) {
                alert("Something went wrong!");
                console.log(err);
            }
        });
    });

});
</script>