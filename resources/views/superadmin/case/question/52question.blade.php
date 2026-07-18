<?php
if (($questiontitles[51]->status ?? null) == 1) {
    
    $question_52_data = session()->get('question52');

    $q52_checked = $question_52_data['q52_checked_value'] ?? "1";
    $q52_saved_rows = $question_52_data['q52_table_data'] ?? [];
    $q52_others_val = $question_52_data['others'] ?? '';

    $status_Lists = [
        1 => "Enforced",
        2 => "Updated and enforced",
        3 => "Stricter enforcement",
        4 => "Increases efforts"
    ];

   
    $fixed_titles = [
        1 => "Awareness raising on forced prostitution",
        2 => "Legal measures against exploitation",
        3 => "Legal actions against offenders"
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

<div class="card question52">
    <div class="card-header" role="tab" id="heading-52">
        <h6 class="card-title" style="color: {{ !empty($question_52_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-52" aria-expanded="false" aria-controls="collapse-52">
                52. {{ $questiontitles[51]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-52" class="collapse" role="tabpanel" aria-labelledby="heading-52" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioFiftyTwo1" class="fiftytwostatus" name="is_government_prosecute_deport_q52"
                    value="1" {{ $q52_checked == "1" ? "checked" : "" }}>
                <label for="radioFiftyTwo1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioFiftyTwo2" class="fiftytwostatus" name="is_government_prosecute_deport_q52"
                    value="0" {{ $q52_checked == "0" ? "checked" : "" }}>
                <label for="radioFiftyTwo2">No</label>
            </div>

            <div class="icheck-primary input-group">
                <input type="radio" id="radioFiftyTwo3" class="fiftytwostatus" name="is_government_prosecute_deport_q52"
                    value="2" {{ $q52_checked == "2" ? "checked" : "" }}>
                <label for="radioFiftyTwo3">Others</label>

                <span class="col-md-6 mt--4 q52_others_container {{ $q52_checked == '2' ? '' : 'othersText' }}">
                    <input type="text" id="q52others" placeholder="Others" class="form-control"
                        value="{{ $q52_others_val }}" name="other_government_prosecute_deport_q52">
                </span>
            </div>

            <div id="52_question_view" class="{{ ($q52_checked == '0' || $q52_checked == '2') ? 'visibility' : '' }}">
                <table id="addRowQ52" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Status</th>
                            <th>Upload</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
             
              if (!empty($q52_saved_rows)) {
                foreach($q52_saved_rows as $index => $row) { 
                  $title_val = $row['title'] ?? '';
                  $is_custom_input = !is_numeric($title_val) && !empty($title_val);
                ?>
                        <tr class="qe52NoOfRow" id="row_q52_<?= $index ?>">
                            <td>
                                <?php if($is_custom_input || $index >= 3) { ?>
                                <input type="text" name="prosecute_title_q52[]" value="<?= $title_val ?>"
                                    class="form-control q52_title_input" placeholder="Others (Specify)___">
                                <?php } else { ?>
                                <p class="text-left mb-0"><?= $fixed_titles[$title_val] ?? '' ?></p>
                                <input type="hidden" name="prosecute_title_q52[]" value="<?= $title_val ?>"
                                    class="form-control q52_title_input">
                                <?php } ?>
                            </td>
                            <td>
                                <select name="prosecute_status_q52[]" class="form-control q52_status_select">
                                    <option value="">---Choose---</option>
                                    @foreach ($status_Lists as $key => $training)
                                    <option value="{{ $key }}"
                                        <?= (($row['status'] ?? '') == $key) ? 'selected' : '' ?>>{{ $training }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="file" name="document_upload_q52[]" class="form-control q52_file_input">
                                <?php if(!empty($row['uploaded_file_name'])) { ?>
                                <small class="text-success d-block text-left mt-1">✓ Current:
                                    <?= $row['uploaded_file_name'] ?></small>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($index < 3) { ?>
                                <span class="text-muted">-</span>
                                <?php } elseif ($index == 3) { ?>
                                <button id="addRowDatasq52" type="button" class="btn btn-sm btn-primary">+</button>
                                <?php } else { ?>
                                <button type="button" class="btn btn-danger btn_remove_q52"
                                    data-id="<?= $index ?>">-</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } 
              } else { 
             
                foreach($fixed_titles as $key => $title_text) { ?>
                        <tr class="qe52NoOfRow" id="row_q52_<?= $key-1 ?>">
                            <td>
                                <p class="text-left mb-0"><?= $title_text ?></p>
                                <input type="hidden" name="prosecute_title_q52[]" value="<?= $key ?>"
                                    class="form-control q52_title_input">
                            </td>
                            <td>
                                <select name="prosecute_status_q52[]" class="form-control q52_status_select">
                                    <option value="">---Choose---</option>
                                    @foreach ($status_Lists as $key_s => $training)
                                    <option value="{{ $key_s }}">{{ $training }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="file" name="document_upload_q52[]" class="form-control q52_file_input">
                            </td>
                            <td><span class="text-muted">-</span></td>
                        </tr>
                        <?php } ?>

                        <tr class="qe52NoOfRow" id="row_q52_3">
                            <td>
                                <input type="text" name="prosecute_title_q52[]" class="form-control q52_title_input"
                                    placeholder="Others (Specify)___">
                            </td>
                            <td>
                                <select name="prosecute_status_q52[]" class="form-control q52_status_select">
                                    <option value="">---Choose---</option>
                                    @foreach ($status_Lists as $key_s => $training)
                                    <option value="{{ $key_s }}">{{ $training }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="file" name="document_upload_q52[]" class="form-control q52_file_input">
                            </td>
                            <td><button id="addRowDatasq52" type="button" class="btn btn-sm btn-primary">+</button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <br />
            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question52">Save</button>
            </p>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {


    $(".fiftytwostatus").on("change", function() {
        var statusvalue = $("input[name='is_government_prosecute_deport_q52']:checked").val();

        if (statusvalue == '1') {
            $('#52_question_view').removeClass('visibility').show();
            $('.q52_others_container').addClass('othersText').hide();
            $('#q52others').val("");
        } else if (statusvalue == "2") {
            $('#52_question_view').addClass('visibility').hide();
            $('.q52_others_container').removeClass('othersText').show();
        } else {
            $('#52_question_view').addClass('visibility').hide();
            $('.q52_others_container').addClass('othersText').hide();
            $('#q52others').val("");
        }
    });


    let dynamicRowCount = $('.qe52NoOfRow').length + 500;
    $(document).on("click", "#addRowDatasq52", function() {
        dynamicRowCount++;
        $("#addRowQ52 tbody").append(
            `<tr class="qe52NoOfRow" id="row_q52_${dynamicRowCount}">
            <td>
              <input type="text" name="prosecute_title_q52[]" class="form-control q52_title_input" placeholder="Others (Specify)___">
            </td>
            <td>
              <select name="prosecute_status_q52[]" class="form-control q52_status_select">
                <option value="">---Choose---</option>
                @foreach ($status_Lists as $key => $training)
                  <option value="{{ $key }}">{{ $training }}</option>
                @endforeach
              </select>
            </td>
            <td><input type="file" name="document_upload_q52[]" class="form-control q52_file_input"></td>
            <td><button type="button" class="btn btn-danger btn_remove_q52" data-id="${dynamicRowCount}">-</button></td>
          </tr>`
        );
    });


    $(document).on('click', '.btn_remove_q52', function() {
        let button_id = $(this).data('id');
        $('#row_q52_' + button_id).remove();
    });


    $(document).on("click", '#temp-save-question52', function() {
        let yes_no_value = $("input[name='is_government_prosecute_deport_q52']:checked").val();

        let formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append("question_no", "52");
        formData.append("question52[q52_checked_value]", yes_no_value);
        formData.append("question52[others]", $("#q52others").val() || '');


        $('.qe52NoOfRow').each(function(index) {
            let title = $(this).find('.q52_title_input').val() || '';
            let status = $(this).find('.q52_status_select').val() || '';

            if (title !== '' || status !== '') {
                formData.append(`question52[q52_table_data][${index}][title]`, title);
                formData.append(`question52[q52_table_data][${index}][status]`, status);


                let fileInput = $(this).find('.q52_file_input')[0].files[0];
                if (fileInput) {
                    formData.append(`document_upload_q52_${index}`, fileInput);
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
                $('.question52 .card-title').css('color', 'blue');
                alert("Question 52  Saved Temporarily ");
            },
            error: function(err) {
                alert("Error saving question 52 data ");
                console.log(err);
            }
        });
    });

});
</script>
<?php } ?>