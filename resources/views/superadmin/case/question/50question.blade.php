<?php
if (($questiontitles[49]->status ?? null) == 1) {
    
    $question_50_data = session()->get('question50');

    $q50_checked = $question_50_data['q50_checked_value'] ?? "1";
    $q50_saved_rows = $question_50_data['q50_table_data'] ?? [];
    $q50_others_val = $question_50_data['others'] ?? '';

    
    $fixed_titles = [
        1 => "Strict Monitoring of impacts of policies",
        2 => "Promotion of safe migration",
        3 => "Awareness raising of vulnerable groups",
        4 => "Expansion of safety-net for vulnerable groups",
        5 => "Promotion of skilling among vulnerable groups"
    ];
?>
<style>
.visibility {
    display: none !important;
}

.othersText {
    display: none !important;
}
</style>

<div class="card question50">
    <div class="card-header" role="tab" id="heading-50">
        <h6 class="card-title" style="color: {{ !empty($question_50_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-50" aria-expanded="false" aria-controls="collapse-50">
                50. {{ $questiontitles[49]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-50" class="collapse" role="tabpanel" aria-labelledby="heading-50" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioFifty1" class="fiftystatus" name="is_exploitative_treatment_q50" value="1"
                    {{ $q50_checked == "1" ? "checked" : "" }}>
                <label for="radioFifty1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioFifty2" class="fiftystatus" name="is_exploitative_treatment_q50" value="0"
                    {{ $q50_checked == "0" ? "checked" : "" }}>
                <label for="radioFifty2">No</label>
            </div>

            <div class="icheck-primary input-group">
                <input type="radio" id="radioFifty3" class="fiftystatus" name="is_exploitative_treatment_q50" value="2"
                    {{ $q50_checked == "2" ? "checked" : "" }}>
                <label for="radioFifty3">Others</label>

                <span class="col-md-6 mt--4 q50_others_container {{ $q50_checked == '2' ? '' : 'othersText' }}">
                    <input type="text" id="q50others" placeholder="Others" class="form-control"
                        value="{{ $q50_others_val }}" name="others_victim_centered_approach_q50">
                </span>
            </div>

            <div id="50_question_view" class="{{ ($q50_checked == '0' || $q50_checked == '2') ? 'visibility' : '' }}">
                <table id="addRowQ50" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Attach/Upload Summary</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
             
              if (!empty($q50_saved_rows)) {
                foreach($q50_saved_rows as $index => $row) { 
                  $title_val = $row['title'] ?? '';
                  $is_custom_input = !is_numeric($title_val) && !empty($title_val);
                ?>
                        <tr class="qe50NoOfRow" id="row_q50_<?= $index ?>">
                            <td>
                                <?php if($is_custom_input || $index >= 5) { ?>
                                <input type="text" name="exploitative_treatment_title_q50[]" value="<?= $title_val ?>"
                                    class="form-control q50_title_input" placeholder="Others (Specify)___">
                                <?php } else { ?>
                                <p class="text-left mb-0"><?= $fixed_titles[$title_val] ?? '' ?></p>
                                <input type="hidden" name="exploitative_treatment_title_q50[]" value="<?= $title_val ?>"
                                    class="form-control q50_title_input">
                                <?php } ?>
                            </td>
                            <td>
                                <input type="file" name="document_upload_q50[]" class="form-control q50_file_input">
                                <?php if(!empty($row['uploaded_file_name'])) { ?>
                                <small class="text-success d-block text-left mt-1">✓ Current:
                                    <?= $row['uploaded_file_name'] ?></small>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($index < 5) { ?>
                                <span class="text-muted">-</span>
                                <?php } elseif ($index == 5) { ?>
                                <button id="addRowDatasq50" type="button" class="btn btn-sm btn-primary">+</button>
                                <?php } else { ?>
                                <button type="button" class="btn btn-danger btn_remove_q50"
                                    data-id="<?= $index ?>">-</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } 
              } else { 
                
                foreach($fixed_titles as $key => $title_text) { ?>
                        <tr class="qe50NoOfRow" id="row_q50_<?= $key-1 ?>">
                            <td>
                                <p class="text-left mb-0"><?= $title_text ?></p>
                                <input type="hidden" name="exploitative_treatment_title_q50[]" value="<?= $key ?>"
                                    class="form-control q50_title_input">
                            </td>
                            <td><input type="file" name="document_upload_q50[]" class="form-control q50_file_input">
                            </td>
                            <td><span class="text-muted">-</span></td>
                        </tr>
                        <?php } ?>

                        <tr class="qe50NoOfRow" id="row_q50_5">
                            <td>
                                <input type="text" name="exploitative_treatment_title_q50[]"
                                    class="form-control q50_title_input" placeholder="Others (Specify)___">
                            </td>
                            <td><input type="file" name="document_upload_q50[]" class="form-control q50_file_input">
                            </td>
                            <td><button id="addRowDatasq50" type="button" class="btn btn-sm btn-primary">+</button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <br />
            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question50">Save</button>
            </p>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {


    $(".fiftystatus").on("change", function() {
        var statusvalue = $("input[name='is_exploitative_treatment_q50']:checked").val();

        if (statusvalue == '1') {
            $('#50_question_view').removeClass('visibility').show();
            $('.q50_others_container').addClass('othersText').hide();
            $('#q50others').val("");
        } else if (statusvalue == "2") {
            $('#50_question_view').addClass('visibility').hide();
            $('.q50_others_container').removeClass('othersText').show();
        } else {
            $('#50_question_view').addClass('visibility').hide();
            $('.q50_others_container').addClass('othersText').hide();
            $('#q50others').val("");
        }
    });


    let dynamicRowCount = $('.qe50NoOfRow').length + 500;
    $(document).on("click", "#addRowDatasq50", function() {
        dynamicRowCount++;
        $("#addRowQ50 tbody").append(
            `<tr class="qe50NoOfRow" id="row_q50_${dynamicRowCount}">
            <td>
              <input type="text" name="exploitative_treatment_title_q50[]" class="form-control q50_title_input" placeholder="Others (Specify)___">
            </td>
            <td><input type="file" name="document_upload_q50[]" class="form-control q50_file_input"></td>
            <td><button type="button" class="btn btn-danger btn_remove_q50" data-id="${dynamicRowCount}">-</button></td>
          </tr>`
        );
    });


    $(document).on('click', '.btn_remove_q50', function() {
        let button_id = $(this).data('id');
        $('#row_q50_' + button_id).remove();
    });


    $(document).on("click", '#temp-save-question50', function() {
        let yes_no_value = $("input[name='is_exploitative_treatment_q50']:checked").val();

        let formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append("question_no", "50");
        formData.append("question50[q50_checked_value]", yes_no_value);
        formData.append("question50[others]", $("#q50others").val() || '');


        $('.qe50NoOfRow').each(function(index) {
            let title = $(this).find('.q50_title_input').val() || '';

            if (title !== '') {
                formData.append(`question50[q50_table_data][${index}][title]`, title);


                let fileInput = $(this).find('.q50_file_input')[0].files[0];
                if (fileInput) {
                    formData.append(`document_upload_q50_${index}`, fileInput);
                }
            }
        });

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('.question50 .card-title').css('color', 'blue');
                alert("Question 50  Saved Temporarily ");
            },
            error: function(err) {
                alert("Error saving question 50 data ");
                console.log(err);
            }
        });
    });

});
</script>
<?php } ?>