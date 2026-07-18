<?php
if (($questiontitles[52]->status ?? null) == 1) {
    
    $question_53_data = session()->get('question53');

    $q53_checked = $question_53_data['q53_checked_value'] ?? "1";
    $q53_saved_rows = $question_53_data['q53_table_data'] ?? [];
    $q53_others_val = $question_53_data['others'] ?? '';

  
    $fixed_titles = [
        1 => "Diplomats in foreign missions",
        2 => "Labour Attaches",
        3 => "MoFA officials within the country"
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

<div class="card question53">
    <div class="card-header" role="tab" id="heading-53">
        <h6 class="card-title" style="color: {{ !empty($question_53_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-53" aria-expanded="false" aria-controls="collapse-53">
                53. {{ $questiontitles[52]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-53" class="collapse" role="tabpanel" aria-labelledby="heading-53" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioFiftyThree1" class="fiftythreestatus"
                    name="is_government_train_diplomat_q53" value="1" {{ $q53_checked == "1" ? "checked" : "" }}>
                <label for="radioFiftyThree1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioFiftyThree2" class="fiftythreestatus"
                    name="is_government_train_diplomat_q53" value="0" {{ $q53_checked == "0" ? "checked" : "" }}>
                <label for="radioFiftyThree2">No</label>
            </div>

            <div class="icheck-primary input-group">
                <input type="radio" id="radioFiftyThree3" class="fiftythreestatus"
                    name="is_government_train_diplomat_q53" value="2" {{ $q53_checked == "2" ? "checked" : "" }}>
                <label for="radioFiftyThree3">Others</label>

                <span class="col-md-6 mt--4 q53_others_container {{ $q53_checked == '2' ? '' : 'othersText' }}">
                    <input type="text" id="q53others" placeholder="Others" class="form-control"
                        value="{{ $q53_others_val }}" name="other_government_train_diplomat_q53">
                </span>
            </div>

            <div id="53_question_view" class="{{ ($q53_checked == '0' || $q53_checked == '2') ? 'visibility' : '' }}">
                <table id="addRowQ53" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th rowspan="2" style="vertical-align: middle;">Category of Trainee</th>
                            <th colspan="4">Coverage of Training</th>
                            <th rowspan="2" style="vertical-align: middle;">Action</th>
                        </tr>
                        <tr>
                            <th>Men</th>
                            <th>Women</th>
                            <th>TG</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
             
              if (!empty($q53_saved_rows)) {
                foreach($q53_saved_rows as $index => $row) { 
                  $title_val = $row['title'] ?? '';
                  $is_custom_input = !is_numeric($title_val) && !empty($title_val);
                ?>
                        <tr class="qe53NoOfRow" id="row_q53_<?= $index ?>">
                            <td>
                                <?php if($is_custom_input || $index >= 3) { ?>
                                <input type="text" name="government_title_q53[]" value="<?= $title_val ?>"
                                    class="form-control q53_title_input" placeholder="Others (Specify)___">
                                <?php } else { ?>
                                <p class="text-left mb-0"><?= $fixed_titles[$title_val] ?? '' ?></p>
                                <input type="hidden" name="government_title_q53[]" value="<?= $title_val ?>"
                                    class="form-control q53_title_input">
                                <?php } ?>
                            </td>
                            <td>
                                <input type="number" name="government_men_q53[]" class="form-control government_men_q53"
                                    value="<?= $row['men'] ?? 0 ?>" min="0">
                            </td>
                            <td>
                                <input type="number" name="government_women_q53[]"
                                    class="form-control government_women_q53" value="<?= $row['women'] ?? 0 ?>" min="0">
                            </td>
                            <td>
                                <input type="number" name="government_tg_q53[]" class="form-control government_tg_q53"
                                    value="<?= $row['tg'] ?? 0 ?>" min="0">
                            </td>
                            <td>
                                <input type="number" name="government_total_q53[]"
                                    class="form-control government_total_q53" value="<?= $row['total'] ?? 0 ?>"
                                    readonly>
                            </td>
                            <td>
                                <?php if ($index < 3) { ?>
                                <span class="text-muted">-</span>
                                <?php } elseif ($index == 3) { ?>
                                <button id="addRowDatasq53" type="button" class="btn btn-sm btn-primary">+</button>
                                <?php } else { ?>
                                <button type="button" class="btn btn-danger btn_remove_q53"
                                    data-id="<?= $index ?>">-</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } 
              } else { 
                
                foreach($fixed_titles as $key => $title_text) { ?>
                        <tr class="qe53NoOfRow" id="row_q53_<?= $key-1 ?>">
                            <td>
                                <p class="text-left mb-0"><?= $title_text ?></p>
                                <input type="hidden" name="government_title_q53[]" value="<?= $key ?>"
                                    class="form-control q53_title_input">
                            </td>
                            <td><input type="number" name="government_men_q53[]" class="form-control government_men_q53"
                                    value="0" min="0"></td>
                            <td><input type="number" name="government_women_q53[]"
                                    class="form-control government_women_q53" value="0" min="0"></td>
                            <td><input type="number" name="government_tg_q53[]" class="form-control government_tg_q53"
                                    value="0" min="0"></td>
                            <td><input type="number" name="government_total_q53[]"
                                    class="form-control government_total_q53" value="0" readonly></td>
                            <td><span class="text-muted">-</span></td>
                        </tr>
                        <?php } ?>

                        <tr class="qe53NoOfRow" id="row_q53_3">
                            <td>
                                <input type="text" name="government_title_q53[]" class="form-control q53_title_input"
                                    placeholder="Others (Specify)___">
                            </td>
                            <td><input type="number" name="government_men_q53[]" class="form-control government_men_q53"
                                    value="0" min="0"></td>
                            <td><input type="number" name="government_women_q53[]"
                                    class="form-control government_women_q53" value="0" min="0"></td>
                            <td><input type="number" name="government_tg_q53[]" class="form-control government_tg_q53"
                                    value="0" min="0"></td>
                            <td><input type="number" name="government_total_q53[]"
                                    class="form-control government_total_q53" value="0" readonly></td>
                            <td><button id="addRowDatasq53" type="button" class="btn btn-sm btn-primary">+</button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <br />
            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question53">Save</button>
            </p>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {


    $(".fiftythreestatus").on("change", function() {
        var statusvalue = $("input[name='is_government_train_diplomat_q53']:checked").val();

        if (statusvalue == '1') {
            $('#53_question_view').removeClass('visibility').show();
            $('.q53_others_container').addClass('othersText').hide();
            $('#q53others').val("");
        } else if (statusvalue == "2") {
            $('#53_question_view').addClass('visibility').hide();
            $('.q53_others_container').removeClass('othersText').show();
        } else {
            $('#53_question_view').addClass('visibility').hide();
            $('.q53_others_container').addClass('othersText').hide();
            $('#q53others').val("");
        }
    });


    let dynamicRowCount = $('.qe53NoOfRow').length + 500;
    $(document).on("click", "#addRowDatasq53", function() {
        dynamicRowCount++;
        $("#addRowQ53 tbody").append(
            `<tr class="qe53NoOfRow" id="row_q53_${dynamicRowCount}">
            <td>
              <input type="text" name="government_title_q53[]" class="form-control q53_title_input" placeholder="Others (Specify)___">
            </td>
            <td><input type="number" name="government_men_q53[]" class="form-control government_men_q53" value="0" min="0"></td>
            <td><input type="number" name="government_women_q53[]" class="form-control government_women_q53" value="0" min="0"></td>
            <td><input type="number" name="government_tg_q53[]" class="form-control government_tg_q53" value="0" min="0"></td>
            <td><input type="number" name="government_total_q53[]" class="form-control government_total_q53" value="0" readonly></td>
            <td><button type="button" class="btn btn-danger btn_remove_q53" data-id="${dynamicRowCount}">-</button></td>
          </tr>`
        );
    });


    $(document).on('click', '.btn_remove_q53', function() {
        let button_id = $(this).data('id');
        $('#row_q53_' + button_id).remove();
    });


    $(document).on('input', '.government_men_q53, .government_women_q53, .government_tg_q53', function() {
        let row = $(this).closest('tr');
        let men = parseFloat(row.find('.government_men_q53').val()) || 0;
        let women = parseFloat(row.find('.government_women_q53').val()) || 0;
        let tg = parseFloat(row.find('.government_tg_q53').val()) || 0;

        row.find('.government_total_q53').val(men + women + tg);
    });


    $(document).on("click", '#temp-save-question53', function() {
        let yes_no_value = $("input[name='is_government_train_diplomat_q53']:checked").val();

        let formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append("question_no", "53");
        formData.append("question53[q53_checked_value]", yes_no_value);
        formData.append("question53[others]", $("#q53others").val() || '');


        $('.qe53NoOfRow').each(function(index) {
            let title = $(this).find('.q53_title_input').val() || '';
            let men = $(this).find('.government_men_q53').val() || 0;
            let women = $(this).find('.government_women_q53').val() || 0;
            let tg = $(this).find('.government_tg_q53').val() || 0;
            let total = $(this).find('.government_total_q53').val() || 0;

            if (title !== '') {
                formData.append(`question53[q53_table_data][${index}][title]`, title);
                formData.append(`question53[q53_table_data][${index}][men]`, men);
                formData.append(`question53[q53_table_data][${index}][women]`, women);
                formData.append(`question53[q53_table_data][${index}][tg]`, tg);
                formData.append(`question53[q53_table_data][${index}][total]`, total);
            }
        });

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('.question53 .card-title').css('color', 'blue');
                alert("Question 53  Saved Temporarily");
            },
            error: function(err) {
                alert("Error saving question 53 data ");
                console.log(err);
            }
        });
    });

});
</script>
<?php } ?>