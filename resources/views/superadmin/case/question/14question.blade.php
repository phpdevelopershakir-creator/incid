<?php
if (($questiontitles[13]->status ?? null) == 1) {
   
    $question_14_data = session()->get('question14');

    $q14_checked = $question_14_data['q14_checked_value'] ?? "1";
    $q14_table_data = $question_14_data['q14_table_data'] ?? null;
    $q14_others_val = $question_14_data['others'] ?? '';

    $status_Lists = [
        1 => "Enforced",
        2 => "Updated and enforced",
        3 => "Stricter enforcement",
        4 => "Increases efforts",
    ];

    
    $static_guidelines = [
        1 => "Victim Identification Guidelines of PSD/MoHA",
        2 => "PSHT Act's Rule on VoT identification",
        3 => "Victim identification checklist of MoSW",
        4 => "VoT identification under NRM of MoHA"
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

<div class="card question14">
    <div class="card-header" role="tab" id="heading-14">
        <h6 class="card-title" style="color: {{ !empty($question_14_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-14" aria-expanded="false" aria-controls="collapse-14">
                14. {{ $questiontitles[13]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-14" class="collapse" role="tabpanel" aria-labelledby="heading-14" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioFourteen1" class="fourteen_status"
                    name="is_government_devote_implement_q14" value="1" {{ $q14_checked == "1" ? "checked" : "" }}>
                <label for="radioFourteen1">Yes</label>
            </div>
            <div class="icheck-primary">
                <input type="radio" id="radioFourteen2" class="fourteen_status"
                    name="is_government_devote_implement_q14" value="0" {{ $q14_checked == "0" ? "checked" : "" }}>
                <label for="radioFourteen2">No</label>
            </div>
            <div class="icheck-primary input-group">
                <input type="radio" id="radioFourteen3" class="fourteen_status"
                    name="is_government_devote_implement_q14" value="2" {{ $q14_checked == "2" ? "checked" : "" }}>
                <label for="radioFourteen3">Others</label>

                <span class="col-md-6 mt--4 q14_others_container {{ $q14_checked == '2' ? '' : 'othersText' }}">
                    <input type="text" id="q14others" placeholder="Others" class="form-control"
                        value="{{ $q14_others_val }}" name="other_government_devote_implement_q14">
                </span>
            </div>

            <div id="14_question_view" class="{{ $q14_checked == '0' ? 'visibility' : '' }}">
                <table id="addRowQ14" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Main document/ Procedure</th>
                            <th>Description of change/ Status</th>
                            <th>Attach/Upload Summary</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
              
              if (!empty($q14_table_data) && count($q14_table_data) > 0) {
                foreach($q14_table_data as $index => $row) { 
                  $unique_row_id = "row_q14_" . $index;
                  ?>
                        <tr class="qe14NoOfRow" id="<?= $unique_row_id ?>">
                            <td>
                                <?php if(isset($row['is_static']) && $row['is_static'] == 1) { ?>
                                <b><?= $static_guidelines[$row['approach_key']] ?? '' ?></b>
                                <input type="hidden" name="original_approach_q14[]" value="<?= $row['approach_key'] ?>">
                                <input type="hidden" name="is_static_row_q14[]" value="1">
                                <?php } else { ?>
                                <input type="text" name="original_approach_q14[]"
                                    class="form-control original_approach_q14" placeholder="Others (Specify)___"
                                    value="<?= $row['title'] ?? '' ?>">
                                <input type="hidden" name="is_static_row_q14[]" value="0">
                                <?php } ?>
                            </td>
                            <td>
                                <select name="description_change_q14[]" class="form-control q10Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    <?php foreach ($status_Lists as $key => $training) { ?>
                                    <option value="<?= $key ?>"
                                        <?= (($row['status'] ?? '') == $key) ? 'selected' : '' ?>><?= $training ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="file" name="document_upload_q14[]"
                                    class="form-control document_upload_q14"></td>
                            <td>
                                <?php if(isset($row['is_static']) && $row['is_static'] == 1) { ?>
                                <?php } else if($index == 4) { ?>
                                <button id="addRowDatasq14" type="button" class="btn btn-sm btn-primary">+</button>
                                <?php } else { ?>
                                <button type="button" class="btn btn-danger btn_remove"
                                    data-id="<?= $unique_row_id ?>">-</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } 
              } else { ?>
                        <tr class="qe14NoOfRow" id="row_q14_0">
                            <td>
                                <b>Victim Identification Guidelines of PSD/MoHA</b>
                                <input type="hidden" name="original_approach_q14[]" value="1">
                                <input type="hidden" name="is_static_row_q14[]" value="1">
                            </td>
                            <td>
                                <select name="description_change_q14[]" class="form-control q10Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    <?php foreach ($status_Lists as $key => $training) { ?>
                                    <option value="<?= $key ?>"><?= $training ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="file" name="document_upload_q14[]"
                                    class="form-control document_upload_q14"></td>
                            <td></td>
                        </tr>

                        <tr class="qe14NoOfRow" id="row_q14_1">
                            <td>
                                <b>PSHT Act's Rule on VoT identification</b>
                                <input type="hidden" name="original_approach_q14[]" value="2">
                                <input type="hidden" name="is_static_row_q14[]" value="1">
                            </td>
                            <td>
                                <select name="description_change_q14[]" class="form-control q10Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    <?php foreach ($status_Lists as $key => $training) { ?>
                                    <option value="<?= $key ?>"><?= $training ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="file" name="document_upload_q14[]"
                                    class="form-control document_upload_q14"></td>
                            <td></td>
                        </tr>

                        <tr class="qe14NoOfRow" id="row_q14_2">
                            <td>
                                <b>Victim identification checklist of MoSW</b>
                                <input type="hidden" name="original_approach_q14[]" value="3">
                                <input type="hidden" name="is_static_row_q14[]" value="1">
                            </td>
                            <td>
                                <select name="description_change_q14[]" class="form-control q10Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    <?php foreach ($status_Lists as $key => $training) { ?>
                                    <option value="<?= $key ?>"><?= $training ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="file" name="document_upload_q14[]"
                                    class="form-control document_upload_q14"></td>
                            <td></td>
                        </tr>

                        <tr class="qe14NoOfRow" id="row_q14_3">
                            <td>
                                <b>VoT identification under NRM of MoHA</b>
                                <input type="hidden" name="original_approach_q14[]" value="4">
                                <input type="hidden" name="is_static_row_q14[]" value="1">
                            </td>
                            <td>
                                <select name="description_change_q14[]" class="form-control q10Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    <?php foreach ($status_Lists as $key => $training) { ?>
                                    <option value="<?= $key ?>"><?= $training ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="file" name="document_upload_q14[]"
                                    class="form-control document_upload_q14"></td>
                            <td></td>
                        </tr>

                        <tr class="qe14NoOfRow" id="row_q14_4">
                            <td>
                                <input type="text" name="original_approach_q14[]"
                                    class="form-control original_approach_q14" placeholder="Others (Specify)___">
                                <input type="hidden" name="is_static_row_q14[]" value="0">
                            </td>
                            <td>
                                <select name="description_change_q14[]" class="form-control q10Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    <?php foreach ($status_Lists as $key => $training) { ?>
                                    <option value="<?= $key ?>"><?= $training ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="file" name="document_upload_q14[]"
                                    class="form-control document_upload_q14"></td>
                            <td><button id="addRowDatasq14" type="button" class="btn btn-sm btn-primary">+</button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <br />
            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question14">Save</button>
            </p>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {


    $(".fourteen_status").on("change", function() {
        var statusvalue = $("input[name='is_government_devote_implement_q14']:checked").val();
        if (statusvalue == '1') {
            $('#14_question_view').removeClass('visibility').show();
            $('.q14_others_container').addClass('othersText').hide();
            $('#q14others').val("");
        } else if (statusvalue == "2") {
            $('#14_question_view').addClass('visibility').hide();
            $('.q14_others_container').removeClass('othersText').show();
        } else {
            $('#14_question_view').addClass('visibility').hide();
            $('.q14_others_container').addClass('othersText').hide();
            $('#q14others').val("");
        }
    });


    $("#addRowDatasq14").click(function() {
        let uniqueRowId = 'row_q14_' + Date.now();
        $("#addRowQ14 tbody").append(
            `<tr class="qe14NoOfRow" id="${uniqueRowId}">
            <td>
              <input type="text" name="original_approach_q14[]" class="form-control original_approach_q14" placeholder="Others (Specify)___">
              <input type="hidden" name="is_static_row_q14[]" value="0">
            </td>
            <td>
              <select name="description_change_q14[]" class="form-control q10Input">
                <option value="" disabled selected>---Choose an item--</option>
                <option value="1">Enforced</option>
                <option value="2">Updated and enforced</option>
                <option value="3">Stricter enforcement</option>
                <option value="4">Increases efforts</option>
              </select>
            </td>
            <td><input type="file" name="document_upload_q14[]" class="form-control document_upload_q14"></td>
            <td><button type="button" class="btn btn-danger btn_remove" data-id="${uniqueRowId}">-</button></td>
          </tr>`
        );
    });


    $(document).on('click', '.btn_remove', function() {
        var targetRowId = $(this).data('id');
        $('#' + targetRowId).remove();
    });


    $(document).on("click", '#temp-save-question14', function() {
        let table_data = [];
        let yes_no_value = $("input[name='is_government_devote_implement_q14']:checked").val();

        $('.qe14NoOfRow').each(function() {
            let is_static = $(this).find('input[name="is_static_row_q14[]"]').val();
            let status = $(this).find('select[name="description_change_q14[]"]').val();

            let approach_val = "";
            let approach_key = "";

            if (is_static == "1") {

                approach_key = $(this).find('input[name="original_approach_q14[]"]').val();
            } else {

                approach_val = $(this).find('input[name="original_approach_q14[]"]').val();
            }

            if (approach_val || status || approach_key) {
                table_data.push({
                    is_static: is_static,
                    approach_key: approach_key,
                    title: approach_val,
                    status: status
                });
            }
        });

        let final_payload = {
            q14_checked_value: yes_no_value,
            q14_table_data: table_data,
            others: $("#q14others").val()
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                "_token": "{{ csrf_token() }}",
                "question_no": 14,
                "question14": final_payload
            },
            success: function(response) {
                $('.question14 .card-title').css('color', 'blue');
                alert("Question 14 Draft Saved Temporarily ");
            },
            error: function(err) {
                alert("Error saving data ");
                console.log(err);
            }
        });
    });

});
</script>
<?php } ?>