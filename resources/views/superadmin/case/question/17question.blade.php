<?php
if (($questiontitles[16]->status ?? null) == 1) {
  
    $question_17_data = session()->get('question17');

    $q17_checked = $question_17_data['q17_checked_value'] ?? "1";
    $q17_table_data = $question_17_data['q17_table_data'] ?? null;
    $q17_others_val = $question_17_data['others'] ?? '';

    $Status_Lists = [
        1 => "Enforced",
        2 => "Updated and enforced",
        3 => "Stricter enforcement",
        4 => "Increases efforts"
    ];

    
    $static_titles = [
        1 => "Referral desk established at women and Child Repression Prevention Tribunals,Anti-Trafficking Tribunals, and District tribunals",
        2 => "National Referral Mechanism Guideline",
        3 => "National Referral Mechanism SOP",
        4 => "Digital Referral Mechanism of MoHA"
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

<div class="card question17">
    <div class="card-header" role="tab" id="heading-17">
        <h6 class="card-title" style="color: {{ !empty($question_17_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-17" aria-expanded="false" aria-controls="collapse-17">
                17. {{ $questiontitles[16]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-17" class="collapse" role="tabpanel" aria-labelledby="heading-17" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioSeventeen1" class="seventeenstatus"
                    name="is_report_country_narrative_protection_q17" value="1"
                    {{ $q17_checked == "1" ? "checked" : "" }}>
                <label for="radioSeventeen1">Yes</label>
            </div>
            <div class="icheck-primary">
                <input type="radio" id="radioSeventeen2" class="seventeenstatus"
                    name="is_report_country_narrative_protection_q17" value="0"
                    {{ $q17_checked == "0" ? "checked" : "" }}>
                <label for="radioSeventeen2">No</label>
            </div>
            <div class="icheck-primary input-group">
                <input type="radio" id="radioSeventeen3" class="seventeenstatus"
                    name="is_report_country_narrative_protection_q17" value="2"
                    {{ $q17_checked == "2" ? "checked" : "" }}>
                <label for="radioSeventeen3">Others</label>

                <span class="col-md-6 mt--4 q17_others_container {{ $q17_checked == '2' ? '' : 'othersText' }}">
                    <input type="text" id="q17others" placeholder="Others" class="form-control"
                        value="{{ $q17_others_val }}" name="other_report_country_narrative_protection_q17">
                </span>
            </div>

            <div id="17_question_view" class="{{ $q17_checked == '0' ? 'visibility' : '' }}">
                <table id="addRowQ17" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th rowspan="2" style="vertical-align: middle;">Title of Original Guideline</th>
                            <th rowspan="2" style="vertical-align: middle;">Description of change/Status</th>
                            <th colspan="4">VoT referred</th>
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
             
              if (!empty($q17_table_data) && count($q17_table_data) > 0) {
                foreach($q17_table_data as $index => $row) { 
                  $unique_row_id = "row_q17_" . $index;
                  ?>
                        <tr class="qe17NoOfRow" id="<?= $unique_row_id ?>">
                            <td>
                                <?php if(isset($row['is_static']) && $row['is_static'] == 1) { ?>
                                <p><?= $static_titles[$row['approach_key']] ?? '' ?></p>
                                <input type="hidden" name="report_country_narrative_protection_title_q17[]"
                                    value="<?= $row['approach_key'] ?>">
                                <input type="hidden" name="is_static_row_q17[]" value="1">
                                <?php } else { ?>
                                <input type="text" name="report_country_narrative_protection_title_q17[]"
                                    class="form-control report_country_narrative_protection_title_q17"
                                    placeholder="Others Specific" value="<?= $row['title'] ?? '' ?>">
                                <input type="hidden" name="is_static_row_q17[]" value="0">
                                <?php } ?>
                            </td>
                            <td>
                                <select name="report_country_narrative_protection_description_q17[]"
                                    class="form-control q10Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    <?php foreach ($Status_Lists as $key => $training) { ?>
                                    <option value="<?= $key ?>"
                                        <?= (($row['status'] ?? '') == $key) ? 'selected' : '' ?>><?= $training ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="number" name="report_country_narrative_protection_men_q17[]"
                                    value="<?= $row['men'] ?? 0 ?>"
                                    class="form-control report_country_narrative_protection_men_q17" min="0"></td>
                            <td><input type="number" name="report_country_narrative_protection_women_q17[]"
                                    value="<?= $row['women'] ?? 0 ?>"
                                    class="form-control report_country_narrative_protection_women_q17" min="0"></td>
                            <td><input type="number" name="report_country_narrative_protection_tg_q17[]"
                                    value="<?= $row['tg'] ?? 0 ?>"
                                    class="form-control report_country_narrative_protection_tg_q17" min="0"></td>
                            <td><input type="number" name="report_country_narrative_protection_total_q17[]"
                                    value="<?= $row['total'] ?? 0 ?>"
                                    class="form-control report_country_narrative_protection_total_q17" readonly min="0">
                            </td>
                            <td>
                                <?php if(isset($row['is_static']) && $row['is_static'] == 1) { ?>
                                <?php } else if($index == 4) { ?>
                                <button id="addRowDatasq17" type="button" class="btn btn-sm btn-primary">+</button>
                                <?php } else { ?>
                                <button type="button" class="btn btn-danger btn_remove"
                                    data-id="<?= $unique_row_id ?>">-</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } 
              } else { ?>
                        <tr class="qe17NoOfRow" id="row_q17_0">
                            <td>
                                <p>Referral desk established at women and Child Repression Prevention
                                    Tribunals,Anti-Trafficking Tribunals, and District tribunals</p>
                                <input type="hidden" name="report_country_narrative_protection_title_q17[]" value="1">
                                <input type="hidden" name="is_static_row_q17[]" value="1">
                            </td>
                            <td>
                                <select name="report_country_narrative_protection_description_q17[]"
                                    class="form-control q10Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    <?php foreach ($Status_Lists as $key => $training) { ?>
                                    <option value="<?= $key ?>"><?= $training ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="number" name="report_country_narrative_protection_men_q17[]" value="0"
                                    class="form-control report_country_narrative_protection_men_q17" min="0"></td>
                            <td><input type="number" name="report_country_narrative_protection_women_q17[]" value="0"
                                    class="form-control report_country_narrative_protection_women_q17" min="0"></td>
                            <td><input type="number" name="report_country_narrative_protection_tg_q17[]" value="0"
                                    class="form-control report_country_narrative_protection_tg_q17" min="0"></td>
                            <td><input type="number" name="report_country_narrative_protection_total_q17[]" value="0"
                                    class="form-control report_country_narrative_protection_total_q17" readonly min="0">
                            </td>
                            <td></td>
                        </tr>

                        <tr class="qe17NoOfRow" id="row_q17_1">
                            <td>
                                <p>National Referral Mechanism Guideline</p>
                                <input type="hidden" name="report_country_narrative_protection_title_q17[]" value="2">
                                <input type="hidden" name="is_static_row_q17[]" value="1">
                            </td>
                            <td>
                                <select name="report_country_narrative_protection_description_q17[]"
                                    class="form-control q10Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    <?php foreach ($Status_Lists as $key => $training) { ?>
                                    <option value="<?= $key ?>"><?= $training ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="number" name="report_country_narrative_protection_men_q17[]" value="0"
                                    class="form-control report_country_narrative_protection_men_q17" min="0"></td>
                            <td><input type="number" name="report_country_narrative_protection_women_q17[]" value="0"
                                    class="form-control report_country_narrative_protection_women_q17" min="0"></td>
                            <td><input type="number" name="report_country_narrative_protection_tg_q17[]" value="0"
                                    class="form-control report_country_narrative_protection_tg_q17" min="0"></td>
                            <td><input type="number" name="report_country_narrative_protection_total_q17[]" value="0"
                                    class="form-control report_country_narrative_protection_total_q17" readonly min="0">
                            </td>
                            <td></td>
                        </tr>

                        <tr class="qe17NoOfRow" id="row_q17_2">
                            <td>
                                <p>National Referral Mechanism SOP</p>
                                <input type="hidden" name="report_country_narrative_protection_title_q17[]" value="3">
                                <input type="hidden" name="is_static_row_q17[]" value="1">
                            </td>
                            <td>
                                <select name="report_country_narrative_protection_description_q17[]"
                                    class="form-control q10Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    <?php foreach ($Status_Lists as $key => $training) { ?>
                                    <option value="<?= $key ?>"><?= $training ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="number" name="report_country_narrative_protection_men_q17[]" value="0"
                                    class="form-control report_country_narrative_protection_men_q17" min="0"></td>
                            <td><input type="number" name="report_country_narrative_protection_women_q17[]" value="0"
                                    class="form-control report_country_narrative_protection_women_q17" min="0"></td>
                            <td><input type="number" name="report_country_narrative_protection_tg_q17[]" value="0"
                                    class="form-control report_country_narrative_protection_tg_q17" min="0"></td>
                            <td><input type="number" name="report_country_narrative_protection_total_q17[]" value="0"
                                    class="form-control report_country_narrative_protection_total_q17" readonly min="0">
                            </td>
                            <td></td>
                        </tr>

                        <tr class="qe17NoOfRow" id="row_q17_3">
                            <td>
                                <p>Digital Referral Mechanism of MoHA</p>
                                <input type="hidden" name="report_country_narrative_protection_title_q17[]" value="4">
                                <input type="hidden" name="is_static_row_q17[]" value="1">
                            </td>
                            <td>
                                <select name="report_country_narrative_protection_description_q17[]"
                                    class="form-control q10Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    <?php foreach ($Status_Lists as $key => $training) { ?>
                                    <option value="<?= $key ?>"><?= $training ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="number" name="report_country_narrative_protection_men_q17[]" value="0"
                                    class="form-control report_country_narrative_protection_men_q17" min="0"></td>
                            <td><input type="number" name="report_country_narrative_protection_women_q17[]" value="0"
                                    class="form-control report_country_narrative_protection_women_q17" min="0"></td>
                            <td><input type="number" name="report_country_narrative_protection_tg_q17[]" value="0"
                                    class="form-control report_country_narrative_protection_tg_q17" min="0"></td>
                            <td><input type="number" name="report_country_narrative_protection_total_q17[]" value="0"
                                    class="form-control report_country_narrative_protection_total_q17" readonly min="0">
                            </td>
                            <td></td>
                        </tr>

                        <tr class="qe17NoOfRow" id="row_q17_4">
                            <td>
                                <input type="text" name="report_country_narrative_protection_title_q17[]"
                                    class="form-control report_country_narrative_protection_title_q17"
                                    placeholder="Others (Specify)___">
                                <input type="hidden" name="is_static_row_q17[]" value="0">
                            </td>
                            <td>
                                <select name="report_country_narrative_protection_description_q17[]"
                                    class="form-control q10Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    <?php foreach ($Status_Lists as $key => $training) { ?>
                                    <option value="<?= $key ?>"><?= $training ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="number" name="report_country_narrative_protection_men_q17[]" value="0"
                                    class="form-control report_country_narrative_protection_men_q17" min="0"></td>
                            <td><input type="number" name="report_country_narrative_protection_women_q17[]" value="0"
                                    class="form-control report_country_narrative_protection_women_q17" min="0"></td>
                            <td><input type="number" name="report_country_narrative_protection_tg_q17[]" value="0"
                                    class="form-control report_country_narrative_protection_tg_q17" min="0"></td>
                            <td><input type="number" name="report_country_narrative_protection_total_q17[]" value="0"
                                    class="form-control report_country_narrative_protection_total_q17" readonly min="0">
                            </td>
                            <td><button id="addRowDatasq17" type="button" class="btn btn-sm btn-primary">+</button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <br />
            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question17">Save</button>
            </p>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {


    $(".seventeenstatus").on("change", function() {
        var statusvalue = $("input[name='is_report_country_narrative_protection_q17']:checked").val();
        if (statusvalue == '1') {
            $('#17_question_view').removeClass('visibility').show();
            $('.q17_others_container').addClass('othersText').hide();
            $('#q17others').val("");
        } else if (statusvalue == "2") {
            $('#17_question_view').addClass('visibility').hide();
            $('.q17_others_container').removeClass('othersText').show();
        } else {
            $('#17_question_view').addClass('visibility').hide();
            $('.q17_others_container').addClass('othersText').hide();
            $('#q17others').val("");
        }
    });


    $("#addRowDatasq17").click(function() {
        let uniqueRowId = 'row_q17_' + Date.now();
        $("#addRowQ17 tbody").append(
            `<tr class="qe17NoOfRow" id="${uniqueRowId}">
            <td>
              <input type="text" name="report_country_narrative_protection_title_q17[]" class="form-control report_country_narrative_protection_title_q17" placeholder="Others (Specify)___">
              <input type="hidden" name="is_static_row_q17[]" value="0">
            </td>
            <td>
              <select name="report_country_narrative_protection_description_q17[]" class="form-control q10Input">
                <option value="" disabled selected>---Choose an item--</option>
                <option value="1">Enforced</option>
                <option value="2">Updated and enforced</option>
                <option value="3">Stricter enforcement</option>
                <option value="4">Increases efforts</option>
              </select>
            </td>
            <td><input type="number" name="report_country_narrative_protection_men_q17[]" value="0" class="form-control report_country_narrative_protection_men_q17" min="0"></td>
            <td><input type="number" name="report_country_narrative_protection_women_q17[]" value="0" class="form-control report_country_narrative_protection_women_q17" min="0"></td>
            <td><input type="number" name="report_country_narrative_protection_tg_q17[]" value="0" class="form-control report_country_narrative_protection_tg_q17" min="0"></td>
            <td><input type="number" name="report_country_narrative_protection_total_q17[]" value="0" class="form-control report_country_narrative_protection_total_q17" readonly min="0"></td>
            <td><button type="button" class="btn btn-danger btn_remove" data-id="${uniqueRowId}">-</button></td>
          </tr>`
        );
    });


    $(document).on('click', '.btn_remove', function() {
        var targetRowId = $(this).data('id');
        $('#' + targetRowId).remove();
    });


    $(document).on('input',
        '.report_country_narrative_protection_men_q17, .report_country_narrative_protection_women_q17, .report_country_narrative_protection_tg_q17',
        function() {
            let row = $(this).closest('tr');
            let men = parseFloat(row.find('.report_country_narrative_protection_men_q17').val()) || 0;
            let women = parseFloat(row.find('.report_country_narrative_protection_women_q17').val()) || 0;
            let tg = parseFloat(row.find('.report_country_narrative_protection_tg_q17').val()) || 0;

            row.find('.report_country_narrative_protection_total_q17').val(men + women + tg);
        });


    $(document).on("click", '#temp-save-question17', function() {
        let table_data = [];
        let yes_no_value = $("input[name='is_report_country_narrative_protection_q17']:checked").val();

        $('.qe17NoOfRow').each(function() {
            let is_static = $(this).find('input[name="is_static_row_q17[]"]').val();
            let status = $(this).find(
                    'select[name="report_country_narrative_protection_description_q17[]"]')
                .val();
            let men = $(this).find(
                'input[name="report_country_narrative_protection_men_q17[]"]').val() || 0;
            let women = $(this).find(
                'input[name="report_country_narrative_protection_women_q17[]"]').val() || 0;
            let tg = $(this).find('input[name="report_country_narrative_protection_tg_q17[]"]')
                .val() || 0;
            let total = $(this).find(
                'input[name="report_country_narrative_protection_total_q17[]"]').val() || 0;

            let approach_val = "";
            let approach_key = "";

            if (is_static == "1") {
                approach_key = $(this).find(
                    'input[name="report_country_narrative_protection_title_q17[]"]').val();
            } else {
                approach_val = $(this).find(
                    'input[name="report_country_narrative_protection_title_q17[]"]').val();
            }

            if (approach_val || status || approach_key || men || women || tg) {
                table_data.push({
                    is_static: is_static,
                    approach_key: approach_key,
                    title: approach_val,
                    status: status,
                    men: men,
                    women: women,
                    tg: tg,
                    total: total
                });
            }
        });

        let final_payload = {
            q17_checked_value: yes_no_value,
            q17_table_data: table_data,
            others: $("#q17others").val()
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                "_token": "{{ csrf_token() }}",
                "question_no": 17,
                "question17": final_payload
            },
            success: function(response) {
                $('.question17 .card-title').css('color', 'blue');
                alert("Question 17 Draft Saved Temporarily ");
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