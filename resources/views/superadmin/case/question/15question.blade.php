@if (($questiontitles[14]->status ?? null) == 1)
@php
    // ১. সেশন এবং ডাটাবেজ থেকে ডাটা ক্যাচ করা
    $question_15_data = session()->get('question15');

    // রেডিও ভ্যালু ডিফল্ট null বা সেশন / ডাটাবেজের মান (১ = Yes, 0 = No, 2 = Others)
    $raw_checked = $question_15_data['is_victim_identification_protocol_q15'] 
                    ?? ($question_15_data['q15_checked_value'] 
                    ?? ($db_q15->is_victim_identification_protocol_q15 ?? null));

    $q15_checked = ($raw_checked !== null) ? (string)$raw_checked : '1';

    // Others details
    $q15_others_val = $question_15_data['other_victim_identification_protocol_q15'] 
                        ?? ($question_15_data['others'] 
                        ?? ($db_q15->other_victim_identification_protocol_q15 ?? ''));

    // Descriptions & File (Session -> DB Model -> Default empty)
    $q15_r1_val = $question_15_data['description_one_q15'] 
                    ?? ($question_15_data['q15_r1_yes_val'] 
                    ?? ($db_q15->description_one_q15 ?? ''));

    $q15_r2_val = $question_15_data['description_two_q15'] 
                    ?? ($question_15_data['q15_r2_yes_val'] 
                    ?? ($db_q15->description_two_q15 ?? ''));

    $q15_r3_val = $question_15_data['description_three_q15'] 
                    ?? ($question_15_data['q15_r3_yes_val'] 
                    ?? ($db_q15->description_three_q15 ?? ''));

    $q15_file_val = $question_15_data['document_upload_q15'] 
                    ?? ($question_15_data['q15_c_file'] 
                    ?? ($db_q15->document_upload_q15 ?? ''));
@endphp

<div class="card question15">
    <div class="card-header" role="tab" id="heading-15">
        <h6 class="card-title" style="color: {{ (!empty($question_15_data) || !empty($db_q15)) ? 'blue' : 'green' }};">
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
                    <input type="radio" class="q15_main_status" id="q15_main_yes"
                        name="is_victim_identification_protocol_q15" value="1"
                        {{ $q15_checked === '1' ? 'checked' : '' }}>
                    <label for="q15_main_yes">Yes</label>
                </div>
                <div class="icheck-primary d-inline mr-3">
                    <input type="radio" class="q15_main_status" id="q15_main_no"
                        name="is_victim_identification_protocol_q15" value="0"
                        {{ $q15_checked === '0' ? 'checked' : '' }}>
                    <label for="q15_main_no">No</label>
                </div>
                <div class="icheck-primary d-inline">
                    <input type="radio" class="q15_main_status" id="q15_main_others"
                        name="is_victim_identification_protocol_q15" value="2"
                        {{ $q15_checked === '2' ? 'checked' : '' }}>
                    <label for="q15_main_others">Others</label>
                </div>
            </div>

            <!-- Others সিলেক্ট করলে এই ফিল্ড আসবে -->
            <div class="mb-3 q15_others_container" style="display: {{ $q15_checked === '2' ? 'block' : 'none' }};">
                <input type="text" id="q15others" name="other_victim_identification_protocol_q15"
                    class="form-control col-md-6" placeholder="Others details" value="{{ $q15_others_val }}">
            </div>

            <!-- Yes সিলেক্ট করলে টেবিল শো করবে -->
            <div class="q15_tables_wrapper" style="display: {{ $q15_checked === '1' ? 'block' : 'none' }};">
                <p><strong>If yes;</strong></p>
                <table class="table table-bordered mb-0">
                    <tbody>
                        <!-- Row 1 -->
                        <tr>
                            <td>
                                <label class="font-weight-bold">
                                    Did front-line officials have a victim identification protocol or other formal written procedures to guide proactive victim identification?
                                </label>
                                <div class="mt-2 q15_r1_yes_box">
                                    <input type="text" id="q15_r1_yes_text" name="description_one_q15"
                                        class="form-control col-md-8" placeholder="Provide details for Row 1"
                                        value="{{ $q15_r1_val }}">
                                </div>
                            </td>
                        </tr>

                        <!-- Row 2 -->
                        <tr>
                            <td>
                                <label class="font-weight-bold">
                                    Does the protocol or other formal written procedure outline steps to screen populations at increased risk of trafficking per the previous year’s TIP Report or other reporting on emerging trends involving the country or its nationals?
                                </label>
                                <div class="mt-2 q15_r2_yes_box">
                                    <input type="text" id="q15_r2_yes_text" name="description_two_q15"
                                        class="form-control col-md-8" placeholder="Provide details for Row 2"
                                        value="{{ $q15_r2_val }}">
                                </div>
                            </td>
                        </tr>

                        <!-- Row 3 -->
                        <tr>
                            <td>
                                <label class="font-weight-bold">
                                    <u>Share copies of the victim identification protocol or any formal written procedures used for victim identification, if any.</u>
                                </label>
                                <div class="mt-2 q15_r3_yes_box">
                                    <input type="text" id="q15_r3_yes_text" name="description_three_q15"
                                        class="form-control col-md-8 mb-2" placeholder="Provide details for Row 3"
                                        value="{{ $q15_r3_val }}">
                                </div>

                                <!-- File Upload -->
                                <div class="mt-3">
                                    <label class="font-weight-bold">Please upload/attach the document:</label>
                                    <input type="file" id="q15_c_file_input" name="document_upload_q15" class="form-control-file">
                                    @if(!empty($q15_file_val))
                                        <small class="text-success d-block mt-1">Uploaded File: {{ $q15_file_val }}</small>
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

    // Radio button change event listener
    $(document).on('change', '.q15_main_status', function() {
        let selectedVal = $(this).val();

        if (selectedVal === '1') { // Yes
            $('.q15_tables_wrapper').slideDown();
            $('.q15_others_container').slideUp();
        } else if (selectedVal === '2') { // Others
            $('.q15_tables_wrapper').slideUp();
            $('.q15_others_container').slideDown();
        } else { // No
            $('.q15_tables_wrapper').slideUp();
            $('.q15_others_container').slideUp();
        }
    });

    // Temp Save AJAX Logic
    $(document).on('click', '#temp-save-question15', function(e) {
        e.preventDefault();

        // Radio Button Select Value Catch
        let checkedVal = $("input[name='is_victim_identification_protocol_q15']:checked").val();
        
        if (typeof checkedVal === 'undefined') {
            alert('Please select Yes, No, or Others!');
            return false;
        }

        let formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('question_no', 15);

        // রেডিও এবং আদার্স ফিল্ডের তথ্য
        formData.append('question15[is_victim_identification_protocol_q15]', checkedVal);
        formData.append('question15[q15_checked_value]', checkedVal);
        formData.append('question15[other_victim_identification_protocol_q15]', $('#q15others').val() || '');
        formData.append('question15[others]', $('#q15others').val() || '');

        // Controller এর সাথে নাম হুবহু মিলিয়ে Data Append করা হলো
        formData.append('question15[description_one_q15]', $('#q15_r1_yes_text').val() || '');
        formData.append('question15[description_two_q15]', $('#q15_r2_yes_text').val() || '');
        formData.append('question15[description_three_q15]', $('#q15_r3_yes_text').val() || '');
        
        formData.append('question15[q15_r1_yes_val]', $('#q15_r1_yes_text').val() || '');
        formData.append('question15[q15_r2_yes_val]', $('#q15_r2_yes_text').val() || '');
        formData.append('question15[q15_r3_yes_val]', $('#q15_r3_yes_text').val() || '');

        // ফাইল ডাটা
        let fileInput = $('#q15_c_file_input')[0];
        if (fileInput && fileInput.files.length > 0) {
            formData.append('question15[document_upload_q15]', fileInput.files[0]);
            formData.append('document_upload_q15', fileInput.files[0]);
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
                    alert("Question 15 Temp Saved Successfully!");
                } else {
                    alert("Save failed!");
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