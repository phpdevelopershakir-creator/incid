<?php
if (($questiontitles[44]->status ?? null) == 1) {
  
  $question_45_data = session()->get('question45');

  $q45_checked = $question_45_data['q45_checked_value'] ?? "1";
  $q45_duration = $question_45_data['duration'] ?? '';
  $q45_description = $question_45_data['description'] ?? '';
  $q45_others_val = $question_45_data['others'] ?? '';
  $q45_uploaded_file = $question_45_data['uploaded_file_name'] ?? null;
?>
<style>
.visibility {
    display: none !important;
}

.othersText {
    display: none !important;
}
</style>

<div class="card question45">
    <div class="card-header" role="tab" id="heading-45">
        <h6 class="card-title" style="color: {{ !empty($question_45_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-45" aria-expanded="false" aria-controls="collapse-45">
                45. {{ $questiontitles[44]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-45" class="collapse" role="tabpanel" aria-labelledby="heading-45" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioFourtyFive1" class="fourtyfivestatus"
                    name="is_national_plan_trafficking_q45" value="1" {{ $q45_checked == "1" ? "checked" : "" }}>
                <label for="radioFourtyFive1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioFourtyFive2" class="fourtyfivestatus"
                    name="is_national_plan_trafficking_q45" value="0" {{ $q45_checked == "0" ? "checked" : "" }}>
                <label for="radioFourtyFive2">No</label>
            </div>

            <div class="icheck-primary input-group">
                <input type="radio" id="radioFourtyFive3" class="fourtyfivestatus"
                    name="is_national_plan_trafficking_q45" value="2" {{ $q45_checked == "2" ? "checked" : "" }}>
                <label for="radioFourtyFive3">Others</label>

                <span class="col-md-6 mt--4 q45_others_container {{ $q45_checked == '2' ? '' : 'othersText' }}">
                    <input type="text" id="q45others" placeholder="Others Specific" class="form-control"
                        value="{{ $q45_others_val }}" name="other_national_plan_trafficking_q45">
                </span>
            </div>

            <div id="45_question_view" class="{{ ($q45_checked == '0' || $q45_checked == '2') ? 'visibility' : '' }}">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Duration of NPA</th>
                            <th>Attach/Upload</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" id="q45_duration" name="national_plan_trafficking_q45_title_q45"
                                    class="form-control" value="{{ $q45_duration }}" placeholder="e.g. 2025-2028">
                            </td>
                            <td>
                                <input type="file" id="q45_file" name="document_upload_q45" class="form-control">
                                <?php if (!empty($q45_uploaded_file)) { ?>
                                <small class="text-success d-block text-left mt-1">✓ Current File:
                                    <?= $q45_uploaded_file ?></small>
                                <?php } ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <div>
                    <textarea id="q45_description" name="national_plan_trafficking_q45_description_q45"
                        class="form-control" placeholder="Write description here..."
                        rows="4">{{ $q45_description }}</textarea>
                </div>
            </div>

            <br />
            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question45">Save</button>
            </p>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {


    $(".fourtyfivestatus").on("change", function() {
        var statusvalue = $("input[name='is_national_plan_trafficking_q45']:checked").val();

        if (statusvalue == '1') {
            $('#45_question_view').removeClass('visibility').show();
            $('.q45_others_container').addClass('othersText').hide();
            $('#q45others').val("");
        } else if (statusvalue == "2") {
            $('#45_question_view').addClass('visibility').hide();
            $('.q45_others_container').removeClass('othersText').show();
        } else {
            $('#45_question_view').addClass('visibility').hide();
            $('.q45_others_container').addClass('othersText').hide();
            $('#q45others').val("");
        }
    });


    $(document).on("click", '#temp-save-question45', function() {
        let yes_no_value = $("input[name='is_national_plan_trafficking_q45']:checked").val();


        let formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append("question_no", "45");


        formData.append("question45[q45_checked_value]", yes_no_value);
        formData.append("question45[duration]", $("#q45_duration").val() || '');
        formData.append("question45[description]", $("#q45_description").val() || '');
        formData.append("question45[others]", $("#q45others").val() || '');


        let fileInput = $('#q45_file')[0].files[0];
        if (fileInput) {
            formData.append("document_upload_q45", fileInput);
        }

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('.question45 .card-title').css('color', 'blue');
                alert("Question 45  Saved Temporarily");
            },
            error: function(err) {
                alert("Error saving question 45 data ");
                console.log(err);
            }
        });
    });

});
</script>
<?php } ?>