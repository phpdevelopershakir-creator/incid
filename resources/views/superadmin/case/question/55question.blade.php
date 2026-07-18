<?php
if (($questiontitles[54]->status ?? null) == 1) {
  
    $question_55_data = session()->get('question55');

    $q55_checked = $question_55_data['q55_checked_value'] ?? "1";
    $q55_saved_rows = $question_55_data['q55_table_data'] ?? [];
    $q55_others_val = $question_55_data['others'] ?? '';

    $country_Lists = [
        1 => "India", 2 => "Nepal", 3 => "Sri lanka", 4 => "EU",
        5 => "USA", 6 => "Saudi Arabia", 7 => "Qatar", 8 => "Lebanon",
        9 => "Irag", 10 => "UAE", 11 => "Thailand", 12 => "Vietnam",
        13 => "Cambodia", 14 => "South Africa", 15 => "Brazil", 16 => "UK"
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

<div class="card question55">
    <div class="card-header" role="tab" id="heading-55">
        <h6 class="card-title" style="color: {{ !empty($question_55_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-55" aria-expanded="false" aria-controls="collapse-55">
                55. {{ $questiontitles[54]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-55" class="collapse" role="tabpanel" aria-labelledby="heading-55" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioFiftyFive1" class="fiftyfivestatus"
                    name="is_government_provide_trafficking_q55" value="1" {{ $q55_checked == "1" ? "checked" : "" }}>
                <label for="radioFiftyFive1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioFiftyFive2" class="fiftyfivestatus"
                    name="is_government_provide_trafficking_q55" value="0" {{ $q55_checked == "0" ? "checked" : "" }}>
                <label for="radioFiftyFive2">No</label>
            </div>

            <div class="icheck-primary input-group">
                <input type="radio" id="radioFiftyFive3" class="fiftyfivestatus"
                    name="is_government_provide_trafficking_q55" value="2" {{ $q55_checked == "2" ? "checked" : "" }}>
                <label for="radioFiftyFive3">Others</label>

                <span class="col-md-6 mt--4 q55_others_container {{ $q55_checked == '2' ? '' : 'othersText' }}">
                    <input type="text" id="q55others" placeholder="Others" class="form-control"
                        value="{{ $q55_others_val }}" name="other_government_provide_trafficking_q55">
                </span>
            </div>

            <div id="55_question_view" class="{{ ($q55_checked == '0' || $q55_checked == '2') ? 'visibility' : '' }}">
                <table id="addRowQ55" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th rowspan="2" style="vertical-align: middle;">Country where posted</th>
                            <th rowspan="2" style="vertical-align: middle;">Description</th>
                            <th colspan="4">Number of Cases</th>
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
              
              if (!empty($q55_saved_rows)) {
                foreach($q55_saved_rows as $index => $row) { 
                  $country_val = $row['country'] ?? '';
                  $is_custom_input = !is_numeric($country_val) && !empty($country_val);
                ?>
                        <tr class="qe55NoOfRow" id="row_q55_<?= $index ?>">
                            <td>
                                <?php if($is_custom_input || $index >= 3) { ?>
                                <input type="text" name="government_provide_name_q55[]" value="<?= $country_val ?>"
                                    class="form-control q55_country_input" placeholder="Others (Specify)___">
                                <?php } else { ?>
                                <select name="government_provide_name_q55[]" class="form-control q55_country_input">
                                    <option value="" disabled>---Choose an item--</option>
                                    <?php foreach ($country_Lists as $key => $country_name) { ?>
                                    <option value="<?= $key ?>" <?= $country_val == $key ? 'selected' : '' ?>>
                                        <?= $country_name ?></option>
                                    <?php } ?>
                                </select>
                                <?php } ?>
                            </td>
                            <td>
                                <input type="text" name="government_provide_description_q55[]"
                                    class="form-control government_provide_description_q55"
                                    value="<?= $row['description'] ?? '' ?>">
                            </td>
                            <td>
                                <input type="number" name="government_provide_men_q55[]"
                                    class="form-control government_provide_men_q55" value="<?= $row['men'] ?? 0 ?>"
                                    min="0">
                            </td>
                            <td>
                                <input type="number" name="government_provide_women_q55[]"
                                    class="form-control government_provide_women_q55" value="<?= $row['women'] ?? 0 ?>"
                                    min="0">
                            </td>
                            <td>
                                <input type="number" name="government_provide_tg_q55[]"
                                    class="form-control government_provide_tg_q55" value="<?= $row['tg'] ?? 0 ?>"
                                    min="0">
                            </td>
                            <td>
                                <input type="number" name="government_provide_total_q55[]"
                                    class="form-control government_provide_total_q55" value="<?= $row['total'] ?? 0 ?>"
                                    readonly>
                            </td>
                            <td>
                                <?php if ($index < 3) { ?>
                                <span class="text-muted">-</span>
                                <?php } elseif ($index == 3) { ?>
                                <button id="addRowDatasq55" type="button" class="btn btn-sm btn-primary">+</button>
                                <?php } else { ?>
                                <button type="button" class="btn btn-danger btn_remove_q55"
                                    data-id="<?= $index ?>">-</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } 
              } else { 
               
                for($k = 0; $k < 3; $k++) { ?>
                        <tr class="qe55NoOfRow" id="row_q55_<?= $k ?>">
                            <td>
                                <select name="government_provide_name_q55[]" class="form-control q55_country_input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    <?php foreach ($country_Lists as $key => $country_name) { ?>
                                    <option value="<?= $key ?>"><?= $country_name ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="text" name="government_provide_description_q55[]"
                                    class="form-control government_provide_description_q55"></td>
                            <td><input type="number" name="government_provide_men_q55[]"
                                    class="form-control government_provide_men_q55" value="0" min="0"></td>
                            <td><input type="number" name="government_provide_women_q55[]"
                                    class="form-control government_provide_women_q55" value="0" min="0"></td>
                            <td><input type="number" name="government_provide_tg_q55[]"
                                    class="form-control government_provide_tg_q55" value="0" min="0"></td>
                            <td><input type="number" name="government_provide_total_q55[]"
                                    class="form-control government_provide_total_q55" value="0" readonly></td>
                            <td><span class="text-muted">-</span></td>
                        </tr>
                        <?php } ?>

                        <tr class="qe55NoOfRow" id="row_q55_3">
                            <td>
                                <input type="text" name="government_provide_name_q55[]"
                                    class="form-control q55_country_input" placeholder="Others (Specify)___">
                            </td>
                            <td><input type="text" name="government_provide_description_q55[]"
                                    class="form-control government_provide_description_q55"></td>
                            <td><input type="number" name="government_provide_men_q55[]"
                                    class="form-control government_provide_men_q55" value="0" min="0"></td>
                            <td><input type="number" name="government_provide_women_q55[]"
                                    class="form-control government_provide_women_q55" value="0" min="0"></td>
                            <td><input type="number" name="government_provide_tg_q55[]"
                                    class="form-control government_provide_tg_q55" value="0" min="0"></td>
                            <td><input type="number" name="government_provide_total_q55[]"
                                    class="form-control government_provide_total_q55" value="0" readonly></td>
                            <td><button id="addRowDatasq55" type="button" class="btn btn-sm btn-primary">+</button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <br />
            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question55">Save</button>
            </p>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {


    $(".fiftyfivestatus").on("change", function() {
        var statusvalue = $("input[name='is_government_provide_trafficking_q55']:checked").val();

        if (statusvalue == '1') {
            $('#55_question_view').removeClass('visibility').show();
            $('.q55_others_container').addClass('othersText').hide();
            $('#q55others').val("");
        } else if (statusvalue == "2") {
            $('#55_question_view').addClass('visibility').hide();
            $('.q55_others_container').removeClass('othersText').show();
        } else {
            $('#55_question_view').addClass('visibility').hide();
            $('.q55_others_container').addClass('othersText').hide();
            $('#q55others').val("");
        }
    });


    let dynamicRowCount55 = $('.qe55NoOfRow').length + 700;
    $(document).on("click", "#addRowDatasq55", function() {
        dynamicRowCount55++;
        $("#addRowQ55 tbody").append(
            `<tr class="qe55NoOfRow" id="row_q55_${dynamicRowCount55}">
            <td>
              <input type="text" name="government_provide_name_q55[]" class="form-control q55_country_input" placeholder="Others (Specify)___">
            </td>
            <td><input type="text" name="government_provide_description_q55[]" class="form-control government_provide_description_q55"></td>
            <td><input type="number" name="government_provide_men_q55[]" class="form-control government_provide_men_q55" value="0" min="0"></td>
            <td><input type="number" name="government_provide_women_q55[]" class="form-control government_provide_women_q55" value="0" min="0"></td>
            <td><input type="number" name="government_provide_tg_q55[]" class="form-control government_provide_tg_q55" value="0" min="0"></td>
            <td><input type="number" name="government_provide_total_q55[]" class="form-control government_provide_total_q55" value="0" readonly></td>
            <td><button type="button" class="btn btn-danger btn_remove_q55" data-id="${dynamicRowCount55}">-</button></td>
          </tr>`
        );
    });


    $(document).on('click', '.btn_remove_q55', function() {
        let button_id = $(this).data('id');
        $('#row_q55_' + button_id).remove();
    });


    $(document).on('input',
        '.government_provide_men_q55, .government_provide_women_q55, .government_provide_tg_q55',
        function() {
            let row = $(this).closest('tr');
            let men = parseFloat(row.find('.government_provide_men_q55').val()) || 0;
            let women = parseFloat(row.find('.government_provide_women_q55').val()) || 0;
            let tg = parseFloat(row.find('.government_provide_tg_q55').val()) || 0;

            row.find('.government_provide_total_q55').val(men + women + tg);
        });


    $(document).on("click", '#temp-save-question55', function() {
        let yes_no_value = $("input[name='is_government_provide_trafficking_q55']:checked").val();

        let formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append("question_no", "55");
        formData.append("question55[q55_checked_value]", yes_no_value);
        formData.append("question55[others]", $("#q55others").val() || '');


        $('.qe55NoOfRow').each(function(index) {
            let country = $(this).find('.q55_country_input').val() || '';
            let description = $(this).find('.government_provide_description_q55').val() || '';
            let men = $(this).find('.government_provide_men_q55').val() || 0;
            let women = $(this).find('.government_provide_women_q55').val() || 0;
            let tg = $(this).find('.government_provide_tg_q55').val() || 0;
            let total = $(this).find('.government_provide_total_q55').val() || 0;

            if (country !== '') {
                formData.append(`question55[q55_table_data][${index}][country]`, country);
                formData.append(`question55[q55_table_data][${index}][description]`,
                    description);
                formData.append(`question55[q55_table_data][${index}][men]`, men);
                formData.append(`question55[q55_table_data][${index}][women]`, women);
                formData.append(`question55[q55_table_data][${index}][tg]`, tg);
                formData.append(`question55[q55_table_data][${index}][total]`, total);
            }
        });

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('.question55 .card-title').css('color', 'blue');
                alert("Question 55  Saved Temporarily");
            },
            error: function(err) {
                alert("Error saving question 55 data");
                console.log(err);
            }
        });
    });

});
</script>
<?php } ?>