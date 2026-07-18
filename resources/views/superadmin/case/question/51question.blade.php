<?php
if (($questiontitles[50]->status ?? null) == 1) {
    
    $question_51_data = session()->get('question51');

    $q51_checked = $question_51_data['q51_checked_value'] ?? "1";
    $q51_saved_rows = $question_51_data['q51_table_data'] ?? [];
    $q51_others_val = $question_51_data['others'] ?? '';

    $status_Lists = [
        1 => "Enforced",
        2 => "Updated and enforced",
        3 => "Stricter enforcement",
        4 => "Increases efforts"
    ];

    
    $fixed_titles = [
        1 => "Awareness raising on forced prostitution and trafficking among citizens",
        2 => "Awareness raising on legal measures against sexual exploitation of trafficked individuals",
        3 => "Legal actions against foreign podophiles/sex-tourists (clients on underaged girls/VoTs)"
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

<div class="card question51">
    <div class="card-header" role="tab" id="heading-51">
        <h6 class="card-title" style="color: {{ !empty($question_51_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-51" aria-expanded="false" aria-controls="collapse-51">
                51. {{ $questiontitles[50]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-51" class="collapse" role="tabpanel" aria-labelledby="heading-51" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioFiftyOne1" class="fiftyonestatus" name="is_commercial_sex_demands_q51"
                    value="1" {{ $q51_checked == "1" ? "checked" : "" }}>
                <label for="radioFiftyOne1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioFiftyOne2" class="fiftyonestatus" name="is_commercial_sex_demands_q51"
                    value="0" {{ $q51_checked == "0" ? "checked" : "" }}>
                <label for="radioFiftyOne2">No</label>
            </div>

            <div class="icheck-primary input-group">
                <input type="radio" id="radioFiftyOne3" class="fiftyonestatus" name="is_commercial_sex_demands_q51"
                    value="2" {{ $q51_checked == "2" ? "checked" : "" }}>
                <label for="radioFiftyOne3">Others</label>

                <span class="col-md-6 mt--4 q51_others_container {{ $q51_checked == '2' ? '' : 'othersText' }}">
                    <input type="text" id="q51others" placeholder="Others" class="form-control"
                        value="{{ $q51_others_val }}" name="other_commercial_sex_demands_q51">
                </span>
            </div>

            <div id="51_question_view" class="{{ ($q51_checked == '0' || $q51_checked == '2') ? 'visibility' : '' }}">
                <table id="addRowQ51" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Status</th>
                            <th>Attach/Upload Summary</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
         
              if (!empty($q51_saved_rows)) {
                foreach($q51_saved_rows as $index => $row) { 
                  $title_val = $row['title'] ?? '';
                  $is_custom_input = !is_numeric($title_val) && !empty($title_val);
                ?>
                        <tr class="qe51NoOfRow" id="row_q51_<?= $index ?>">
                            <td>
                                <?php if($is_custom_input || $index >= 3) { ?>
                                <input type="text" name="commercial_title_q51[]" value="<?= $title_val ?>"
                                    class="form-control q51_title_input" placeholder="Others (Specify)___">
                                <?php } else { ?>
                                <p class="text-left mb-0"><?= $fixed_titles[$title_val] ?? '' ?></p>
                                <input type="hidden" name="commercial_title_q51[]" value="<?= $title_val ?>"
                                    class="form-control q51_title_input">
                                <?php } ?>
                            </td>
                            <td>
                                <select name="commercial_status_q51[]" class="form-control q51_status_select">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($status_Lists as $key => $training)
                                    <option value="{{ $key }}"
                                        <?= (($row['status'] ?? '') == $key) ? 'selected' : '' ?>>{{ $training }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="file" name="document_upload_q51[]" class="form-control q51_file_input">
                                <?php if(!empty($row['uploaded_file_name'])) { ?>
                                <small class="text-success d-block text-left mt-1">✓ Current:
                                    <?= $row['uploaded_file_name'] ?></small>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($index < 3) { ?>
                                <span class="text-muted">-</span>
                                <?php } elseif ($index == 3) { ?>
                                <button id="addRowDatasq51" type="button" class="btn btn-sm btn-primary">+</button>
                                <?php } else { ?>
                                <button type="button" class="btn btn-danger btn_remove_q51"
                                    data-id="<?= $index ?>">-</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } 
              } else { 
                // ২. ফ্রেশ অবস্থায় ৩টি ডিফল্ট স্ট্যাটিক রো
                foreach($fixed_titles as $key => $title_text) { ?>
                        <tr class="qe51NoOfRow" id="row_q51_<?= $key-1 ?>">
                            <td>
                                <p class="text-left mb-0"><?= $title_text ?></p>
                                <input type="hidden" name="commercial_title_q51[]" value="<?= $key ?>"
                                    class="form-control q51_title_input">
                            </td>
                            <td>
                                <select name="commercial_status_q51[]" class="form-control q51_status_select">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($status_Lists as $key_s => $training)
                                    <option value="{{ $key_s }}">{{ $training }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="file" name="document_upload_q51[]" class="form-control q51_file_input">
                            </td>
                            <td><span class="text-muted">-</span></td>
                        </tr>
                        <?php } ?>

                        <tr class="qe51NoOfRow" id="row_q51_3">
                            <td>
                                <input type="text" name="commercial_title_q51[]" class="form-control q51_title_input"
                                    placeholder="Others (Specify)___">
                            </td>
                            <td>
                                <select name="commercial_status_q51[]" class="form-control q51_status_select">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($status_Lists as $key_s => $training)
                                    <option value="{{ $key_s }}">{{ $training }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="file" name="document_upload_q51[]" class="form-control q51_file_input">
                            </td>
                            <td><button id="addRowDatasq51" type="button" class="btn btn-sm btn-primary">+</button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <br />
            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question51">Save</button>
            </p>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {


    $(".fiftyonestatus").on("change", function() {
        var statusvalue = $("input[name='is_commercial_sex_demands_q51']:checked").val();

        if (statusvalue == '1') {
            $('#51_question_view').removeClass('visibility').show();
            $('.q51_others_container').addClass('othersText').hide();
            $('#q51others').val("");
        } else if (statusvalue == "2") {
            $('#51_question_view').addClass('visibility').hide();
            $('.q51_others_container').removeClass('othersText').show();
        } else {
            $('#51_question_view').addClass('visibility').hide();
            $('.q51_others_container').addClass('othersText').hide();
            $('#q51others').val("");
        }
    });


    let dynamicRowCount = $('.qe51NoOfRow').length + 500;
    $(document).on("click", "#addRowDatasq51", function() {
        dynamicRowCount++;
        $("#addRowQ51 tbody").append(
            `<tr class="qe51NoOfRow" id="row_q51_${dynamicRowCount}">
            <td>
              <input type="text" name="commercial_title_q51[]" class="form-control q51_title_input" placeholder="Others (Specify)___">
            </td>
            <td>
              <select name="commercial_status_q51[]" class="form-control q51_status_select">
                <option value="" disabled selected>---Choose an item--</option>
                @foreach ($status_Lists as $key => $training)
                  <option value="{{ $key }}">{{ $training }}</option>
                @endforeach
              </select>
            </td>
            <td><input type="file" name="document_upload_q51[]" class="form-control q51_file_input"></td>
            <td><button type="button" class="btn btn-danger btn_remove_q51" data-id="${dynamicRowCount}">-</button></td>
          </tr>`
        );
    });


    $(document).on('click', '.btn_remove_q51', function() {
        let button_id = $(this).data('id');
        $('#row_q51_' + button_id).remove();
    });


    $(document).on("click", '#temp-save-question51', function() {
        let yes_no_value = $("input[name='is_commercial_sex_demands_q51']:checked").val();

        let formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append("question_no", "51");
        formData.append("question51[q51_checked_value]", yes_no_value);
        formData.append("question51[others]", $("#q51others").val() || '');


        $('.qe51NoOfRow').each(function(index) {
            let title = $(this).find('.q51_title_input').val() || '';
            let status = $(this).find('.q51_status_select').val() || '';

            if (title !== '' || status !== '') {
                formData.append(`question51[q51_table_data][${index}][title]`, title);
                formData.append(`question51[q51_table_data][${index}][status]`, status);


                let fileInput = $(this).find('.q51_file_input')[0].files[0];
                if (fileInput) {
                    formData.append(`document_upload_q51_${index}`, fileInput);
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
                $('.question51 .card-title').css('color', 'blue');
                alert("Question 51  Saved Temporarily ");
            },
            error: function(err) {
                alert("Error saving question 51 data ");
                console.log(err);
            }
        });
    });

});
</script>
<?php } ?>