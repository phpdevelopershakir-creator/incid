@if (($questiontitles[34]->status ?? null) == 1)
@php
// সেশন থেকে ৩৫ নম্বর প্রশ্নের ডাটা ক্যাচ করা
$question_35_data = session()->get('question35');

// Part 1 Data (ডিফল্ট '1' অর্থাৎ Yes)
$q35_p1_status = isset($question_35_data['q35_p1_status']) ? (string)$question_35_data['q35_p1_status'] : '1';
$q35_p1_yes_desc = $question_35_data['q35_p1_yes_desc'] ?? '';
$q35_p1_others_desc = $question_35_data['q35_p1_others_desc'] ?? '';

// Part 2 Data (ডিফল্ট '1' অর্থাৎ Yes)
$q35_p2_status = isset($question_35_data['q35_p2_status']) ? (string)$question_35_data['q35_p2_status'] : '1';
$q35_p2_yes_desc = $question_35_data['q35_p2_yes_desc'] ?? '';
$q35_p2_others_desc = $question_35_data['q35_p2_others_desc'] ?? '';

// Part 3 Data (ডিফল্ট '1' অর্থাৎ Yes)
$q35_p3_status = isset($question_35_data['q35_p3_status']) ? (string)$question_35_data['q35_p3_status'] : '1';
$q35_p3_yes_desc = $question_35_data['q35_p3_yes_desc'] ?? '';
$q35_p3_others_desc = $question_35_data['q35_p3_others_desc'] ?? '';
@endphp

<style>
.sub_field_box_q35 {
    display: none;
}
</style>

<div class="card question35">
    <div class="card-header" role="tab" id="heading-35">
        <h6 class="card-title" style="color: {{ !empty($question_35_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-35" aria-expanded="false" aria-controls="collapse-35">
                35. {{ $questiontitles[34]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-35" class="collapse" role="tabpanel" aria-labelledby="heading-35" data-parent="#accordion-2">
        <div class="card-body">

            <table class="table table-bordered mb-0">
                <tbody>
                    <!-- Sub-Question 1 -->
                    <tr>
                        <td>
                            <label class="font-weight-bold">
                                Were victims required to speak with law enforcement officials, or cooperate with authorities in the investigation or prosecution of traffickers to access certain protection services (such as residence in a government shelter)?
                            </label>

                            <div class="mt-2">
                                <div class="icheck-primary d-inline mr-3">
                                    <input type="radio" class="q35_p1_status" id="q35_p1_yes" name="q35_p1_radio" value="1" {{ $q35_p1_status === '1' ? 'checked' : '' }}>
                                    <label for="q35_p1_yes">Yes</label>
                                </div>
                                <div class="icheck-primary d-inline mr-3">
                                    <input type="radio" class="q35_p1_status" id="q35_p1_no" name="q35_p1_radio" value="0" {{ $q35_p1_status === '0' ? 'checked' : '' }}>
                                    <label for="q35_p1_no">No</label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" class="q35_p1_status" id="q35_p1_others" name="q35_p1_radio" value="2" {{ $q35_p1_status === '2' ? 'checked' : '' }}>
                                    <label for="q35_p1_others">Others</label>
                                </div>
                            </div>

                            <div class="mt-2 q35_p1_yes_box sub_field_box_q35" style="display: {{ $q35_p1_status === '1' ? 'block' : 'none' }};">
                                <input type="text" id="q35_p1_yes_text" class="form-control col-md-8" placeholder="Provide Description" value="{{ $q35_p1_yes_desc }}">
                            </div>
                            <div class="mt-2 q35_p1_others_box sub_field_box_q35" style="display: {{ $q35_p1_status === '2' ? 'block' : 'none' }};">
                                <input type="text" id="q35_p1_others_text" class="form-control col-md-8" placeholder="Others details" value="{{ $q35_p1_others_desc }}">
                            </div>
                        </td>
                    </tr>

                    <!-- Sub-Question 2 -->
                    <tr>
                        <td>
                            <label class="font-weight-bold">
                                Did the government provide a recovery and reflection period to all victims?
                            </label>

                            <div class="mt-2">
                                <div class="icheck-primary d-inline mr-3">
                                    <input type="radio" class="q35_p2_status" id="q35_p2_yes" name="q35_p2_radio" value="1" {{ $q35_p2_status === '1' ? 'checked' : '' }}>
                                    <label for="q35_p2_yes">Yes</label>
                                </div>
                                <div class="icheck-primary d-inline mr-3">
                                    <input type="radio" class="q35_p2_status" id="q35_p2_no" name="q35_p2_radio" value="0" {{ $q35_p2_status === '0' ? 'checked' : '' }}>
                                    <label for="q35_p2_no">No</label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" class="q35_p2_status" id="q35_p2_others" name="q35_p2_radio" value="2" {{ $q35_p2_status === '2' ? 'checked' : '' }}>
                                    <label for="q35_p2_others">Others</label>
                                </div>
                            </div>

                            <div class="mt-2 q35_p2_yes_box sub_field_box_q35" style="display: {{ $q35_p2_status === '1' ? 'block' : 'none' }};">
                                <input type="text" id="q35_p2_yes_text" class="form-control col-md-8" placeholder="Provide Description" value="{{ $q35_p2_yes_desc }}">
                            </div>
                            <div class="mt-2 q35_p2_others_box sub_field_box_q35" style="display: {{ $q35_p2_status === '2' ? 'block' : 'none' }};">
                                <input type="text" id="q35_p2_others_text" class="form-control col-md-8" placeholder="Others details" value="{{ $q35_p2_others_desc }}">
                            </div>
                        </td>
                    </tr>

                    <!-- Sub-Question 3 -->
                    <tr>
                        <td>
                            <label class="font-weight-bold">
                                What, if any, alternatives were victims presented with to speaking with law enforcement while participating in investigations?
                            </label>

                            <div class="mt-2">
                                <div class="icheck-primary d-inline mr-3">
                                    <input type="radio" class="q35_p3_status" id="q35_p3_yes" name="q35_p3_radio" value="1" {{ $q35_p3_status === '1' ? 'checked' : '' }}>
                                    <label for="q35_p3_yes">Yes</label>
                                </div>
                                <div class="icheck-primary d-inline mr-3">
                                    <input type="radio" class="q35_p3_status" id="q35_p3_no" name="q35_p3_radio" value="0" {{ $q35_p3_status === '0' ? 'checked' : '' }}>
                                    <label for="q35_p3_no">No</label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" class="q35_p3_status" id="q35_p3_others" name="q35_p3_radio" value="2" {{ $q35_p3_status === '2' ? 'checked' : '' }}>
                                    <label for="q35_p3_others">Others</label>
                                </div>
                            </div>

                            <div class="mt-2 q35_p3_yes_box sub_field_box_q35" style="display: {{ $q35_p3_status === '1' ? 'block' : 'none' }};">
                                <input type="text" id="q35_p3_yes_text" class="form-control col-md-8" placeholder="Provide Description" value="{{ $q35_p3_yes_desc }}">
                            </div>
                            <div class="mt-2 q35_p3_others_box sub_field_box_q35" style="display: {{ $q35_p3_status === '2' ? 'block' : 'none' }};">
                                <input type="text" id="q35_p3_others_text" class="form-control col-md-8" placeholder="Others details" value="{{ $q35_p3_others_desc }}">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <p class="text-right mt-3">
                <button type="button" class="btn btn-success" id="temp-save-question35">Save</button>
            </p>

        </div>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    // Part 1 Toggle
    $(document).on('change', '.q35_p1_status', function() {
        let val = $("input[name='q35_p1_radio']:checked").val();
        $('.q35_p1_yes_box, .q35_p1_others_box').hide();
        if (val === '1') {
            $('.q35_p1_yes_box').show();
        } else if (val === '2') {
            $('.q35_p1_others_box').show();
        }
    });

    // Part 2 Toggle
    $(document).on('change', '.q35_p2_status', function() {
        let val = $("input[name='q35_p2_radio']:checked").val();
        $('.q35_p2_yes_box, .q35_p2_others_box').hide();
        if (val === '1') {
            $('.q35_p2_yes_box').show();
        } else if (val === '2') {
            $('.q35_p2_others_box').show();
        }
    });

    // Part 3 Toggle
    $(document).on('change', '.q35_p3_status', function() {
        let val = $("input[name='q35_p3_radio']:checked").val();
        $('.q35_p3_yes_box, .q35_p3_others_box').hide();
        if (val === '1') {
            $('.q35_p3_yes_box').show();
        } else if (val === '2') {
            $('.q35_p3_others_box').show();
        }
    });

    // Temp Save AJAX Action
    $(document).on('click', '#temp-save-question35', function(e) {
        e.preventDefault();

        let p1_status = $("input[name='q35_p1_radio']:checked").val();
        let p2_status = $("input[name='q35_p2_radio']:checked").val();
        let p3_status = $("input[name='q35_p3_radio']:checked").val();

        let formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('question_no', 35);

        // Part 1
        formData.append('question35[q35_p1_status]', p1_status !== undefined ? p1_status : '1');
        formData.append('question35[q35_p1_yes_desc]', $('#q35_p1_yes_text').val() || '');
        formData.append('question35[q35_p1_others_desc]', $('#q35_p1_others_text').val() || '');

        // Part 2
        formData.append('question35[q35_p2_status]', p2_status !== undefined ? p2_status : '1');
        formData.append('question35[q35_p2_yes_desc]', $('#q35_p2_yes_text').val() || '');
        formData.append('question35[q35_p2_others_desc]', $('#q35_p2_others_text').val() || '');

        // Part 3
        formData.append('question35[q35_p3_status]', p3_status !== undefined ? p3_status : '1');
        formData.append('question35[q35_p3_yes_desc]', $('#q35_p3_yes_text').val() || '');
        formData.append('question35[q35_p3_others_desc]', $('#q35_p3_others_text').val() || '');

        $.ajax({
            url: "/superadmin/case/temp-save-question",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success || response) {
                    $('.question35 .card-header h6').css('color', 'blue');
                    alert("Question 35 Temp Saved Successfully!");
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