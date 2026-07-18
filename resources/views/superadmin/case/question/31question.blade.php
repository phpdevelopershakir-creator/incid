<?php
if (($questiontitles[30]->status ?? null) == 1) {
   
    $question_31_data = session()->get('question31');

    $q31_checked = $question_31_data['q31_checked_value'] ?? "1";
    $q31_saved_rows = $question_31_data['q31_table_data'] ?? [];
    $q31_others_val = $question_31_data['others'] ?? '';

    $country_Lists = [
        1 => "India", 2 => "Nepal", 3 => "Sri lanka", 4 => "EU",
        5 => "USA", 6 => "Saudi Arabia", 7 => "Qatar", 8 => "Lebanon",
        9 => "Irag", 10 => "UAE", 11 => "Thailand", 12 => "Vietnam",
        13 => "Cambodia", 14 => "South Africa", 15 => "Brazil", 16 => "UK"
    ];

    $status_Lists = [
        1 => "Excess", 2 => "Adequate", 3 => "Inadequate", 4 => "None"
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

<div class="card question31">
    <div class="card-header" role="tab" id="heading-31">
        <h6 class="card-title" style="color: {{ !empty($question_31_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-31" aria-expanded="false" aria-controls="collapse-31">
                31. {{ $questiontitles[30]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-31" class="collapse" role="tabpane31" aria-labelledby="heading-31" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioThirtyOne1" class="thirtyonestatus" name="is_citizen_victims_abroad_q31"
                    value="1" {{ $q31_checked == "1" ? "checked" : "" }}>
                <label for="radioThirtyOne1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioThirtyOne2" class="thirtyonestatus" name="is_citizen_victims_abroad_q31"
                    value="0" {{ $q31_checked == "0" ? "checked" : "" }}>
                <label for="radioThirtyOne2">No</label>
            </div>

            <div class="icheck-primary input-group">
                <input type="radio" id="radioThirtyOne3" class="thirtyonestatus" name="is_citizen_victims_abroad_q31"
                    value="2" {{ $q31_checked == "2" ? "checked" : "" }}>
                <label for="radioThirtyOne3">Others</label>

                <span class="col-md-6 mt--4 q31_others_container {{ $q31_checked == '2' ? '' : 'othersText' }}">
                    <input type="text" id="q31others" placeholder="Others" class="form-control"
                        value="{{ $q31_others_val }}" name="other_citizen_victims_abroad_q31">
                </span>
            </div>

            <div id="31_question_view" class="{{ ($q31_checked == '0' || $q31_checked == '2') ? 'visibility' : '' }}">
                <table id="addRowQ31" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th rowspan="2" style="vertical-align: middle;">Country where posted</th>
                            <th rowspan="2" style="vertical-align: middle;">Status of coverage</th>
                            <th colspan="6">Number of Nationals receiving the support</th>
                            <th rowspan="2" style="vertical-align: middle;">Action</th>
                        </tr>
                        <tr>
                            <th>Men</th>
                            <th>Women</th>
                            <th>TG</th>
                            <th>Boy</th>
                            <th>Girl</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
              
              $max_rows = max(4, count($q31_saved_rows));
              
              for ($index = 0; $index < $max_rows; $index++) {
                  $row = $q31_saved_rows[$index] ?? null;
                  
                  $country_val = $row['country'] ?? '';
                  $status_val = $row['status'] ?? '';

                  
                  if (is_numeric($country_val) && isset($country_Lists[$country_val])) {
                      $country_val = $country_Lists[$country_val];
                  }
                  if (is_numeric($status_val) && isset($status_Lists[$status_val])) {
                      $status_val = $status_Lists[$status_val];
                  }

                  $is_custom_input = ($index >= 3);
                ?>
                        <tr class="qe31NoOfRow" id="row_q31_<?= $index ?>">
                            <td>
                                <?php if($is_custom_input) { ?>
                                <input type="text" name="citizen_victims_abroad_name_q31[]" value="<?= $country_val ?>"
                                    class="form-control q31_country_input" placeholder="Others (Specify)___">
                                <?php } else { ?>
                                <select name="citizen_victims_abroad_name_q31[]" class="form-control q31_country_input">
                                    <option value="" disabled <?= empty($country_val) ? 'selected' : '' ?>>---Choose an
                                        item--</option>
                                    <?php foreach ($country_Lists as $key => $country_name) { ?>
                                    <option value="<?= $country_name ?>"
                                        <?= $country_val == $country_name ? 'selected' : '' ?>><?= $country_name ?>
                                    </option>
                                    <?php } ?>
                                </select>
                                <?php } ?>
                            </td>

                            <td>
                                <select name="citizen_victims_abroad_status_q31[]"
                                    class="form-control q31_status_input">
                                    <option value="" disabled <?= empty($status_val) ? 'selected' : '' ?>>---Choose an
                                        item--</option>
                                    <?php foreach ($status_Lists as $key => $status_name) { ?>
                                    <option value="<?= $status_name ?>"
                                        <?= $status_val == $status_name ? 'selected' : '' ?>><?= $status_name ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="number" name="citizen_victims_abroad_men_q31[]"
                                    class="form-control citizen_victims_abroad_men_q31" value="<?= $row['men'] ?? 0 ?>"
                                    min="0"></td>
                            <td><input type="number" name="citizen_victims_abroad_women_q31[]"
                                    class="form-control citizen_victims_abroad_women_q31"
                                    value="<?= $row['women'] ?? 0 ?>" min="0"></td>
                            <td><input type="number" name="citizen_victims_abroad_tg_q31[]"
                                    class="form-control citizen_victims_abroad_tg_q31" value="<?= $row['tg'] ?? 0 ?>"
                                    min="0"></td>
                            <td><input type="number" name="citizen_victims_abroad_boy_q31[]"
                                    class="form-control citizen_victims_abroad_boy_q31" value="<?= $row['boy'] ?? 0 ?>"
                                    min="0"></td>
                            <td><input type="number" name="citizen_victims_abroad_girl_q31[]"
                                    class="form-control citizen_victims_abroad_girl_q31"
                                    value="<?= $row['girl'] ?? 0 ?>" min="0"></td>
                            <td><input type="number" name="citizen_victims_abroad_total_q31[]"
                                    class="form-control citizen_victims_abroad_total_q31"
                                    value="<?= $row['total'] ?? 0 ?>" readonly></td>
                            <td>
                                <?php 
                      
                      if ($index < 3) {
                     
                          echo '<span class="text-muted">-</span>';
                      } elseif ($index == 3) {
                         
                          echo '<button id="addRowDatasq31" type="button" class="btn btn-sm btn-primary">+</button>';
                      } else {
                        
                          echo '<button type="button" class="btn btn-sm btn-danger btn_remove_q31" data-id="'.$index.'">-</button>';
                      }
                      ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <br />
            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question31">Save</button>
            </p>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {


    $(".thirtyonestatus").on("change", function() {
        var statusvalue = $("input[name='is_citizen_victims_abroad_q31']:checked").val();

        if (statusvalue == '1') {
            $('#31_question_view').removeClass('visibility').show();
            $('.q31_others_container').addClass('othersText').hide();
            $('#q31others').val("");
        } else if (statusvalue == "2") {
            $('#31_question_view').addClass('visibility').hide();
            $('.q31_others_container').removeClass('othersText').show();
        } else {
            $('#31_question_view').addClass('visibility').hide();
            $('.q31_others_container').addClass('othersText').hide();
            $('#q31others').val("");
        }
    });


    let dynamicRowCount = $('.qe31NoOfRow').length + 600;
    $(document).on("click", "#addRowDatasq31", function() {
        dynamicRowCount++;

        let statusOptions = `<option value="" disabled selected>---Choose an item--</option>`;
        <?php foreach ($status_Lists as $key => $status_name) { ?>
        statusOptions += `<option value="<?= $status_name ?>"><?= $status_name ?></option>`;
        <?php } ?>


        $("#addRowQ31 tbody").append(
            `<tr class="qe31NoOfRow" id="row_q31_${dynamicRowCount}">
            <td>
              <input type="text" name="citizen_victims_abroad_name_q31[]" class="form-control q31_country_input" placeholder="Others (Specify)___">
            </td>
            <td>
              <select name="citizen_victims_abroad_status_q31[]" class="form-control q31_status_input">
                ${statusOptions}
              </select>
            </td>
            <td><input type="number" name="citizen_victims_abroad_men_q31[]" class="form-control citizen_victims_abroad_men_q31" value="0" min="0"></td>
            <td><input type="number" name="citizen_victims_abroad_women_q31[]" class="form-control citizen_victims_abroad_women_q31" value="0" min="0"></td>
            <td><input type="number" name="citizen_victims_abroad_tg_q31[]" class="form-control citizen_victims_abroad_tg_q31" value="0" min="0"></td>
            <td><input type="number" name="citizen_victims_abroad_boy_q31[]" class="form-control citizen_victims_abroad_boy_q31" value="0" min="0"></td>
            <td><input type="number" name="citizen_victims_abroad_girl_q31[]" class="form-control citizen_victims_abroad_girl_q31" value="0" min="0"></td>
            <td><input type="number" name="citizen_victims_abroad_total_q31[]" class="form-control citizen_victims_abroad_total_q31" value="0" readonly></td>
            <td>
               <button type="button" class="btn btn-sm btn-danger btn_remove_q31" data-id="${dynamicRowCount}">-</button>
            </td>
          </tr>`
        );
    });


    $(document).on('click', '.btn_remove_q31', function() {
        let button_id = $(this).data('id');
        $('#row_q31_' + button_id).remove();
    });


    $(document).on('input',
        '.citizen_victims_abroad_men_q31, .citizen_victims_abroad_women_q31, .citizen_victims_abroad_tg_q31, .citizen_victims_abroad_boy_q31, .citizen_victims_abroad_girl_q31',
        function() {
            let row = $(this).closest('tr');
            let men = parseFloat(row.find('.citizen_victims_abroad_men_q31').val()) || 0;
            let women = parseFloat(row.find('.citizen_victims_abroad_women_q31').val()) || 0;
            let tg = parseFloat(row.find('.citizen_victims_abroad_tg_q31').val()) || 0;
            let boy = parseFloat(row.find('.citizen_victims_abroad_boy_q31').val()) || 0;
            let girl = parseFloat(row.find('.citizen_victims_abroad_girl_q31').val()) || 0;

            row.find('.citizen_victims_abroad_total_q31').val(men + women + tg + boy + girl);
        });


    $(document).on("click", '#temp-save-question31', function() {
        let yes_no_value = $("input[name='is_citizen_victims_abroad_q31']:checked").val();

        let formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append("question_no", "31");
        formData.append("question31[q31_checked_value]", yes_no_value);
        formData.append("question31[others]", $("#q31others").val() || '');

        $('.qe31NoOfRow').each(function(index) {
            let country = $(this).find('.q31_country_input').val() || '';
            let status = $(this).find('.q31_status_input').val() || '';
            let men = $(this).find('.citizen_victims_abroad_men_q31').val() || 0;
            let women = $(this).find('.citizen_victims_abroad_women_q31').val() || 0;
            let tg = $(this).find('.citizen_victims_abroad_tg_q31').val() || 0;
            let boy = $(this).find('.citizen_victims_abroad_boy_q31').val() || 0;
            let girl = $(this).find('.citizen_victims_abroad_girl_q31').val() || 0;
            let total = $(this).find('.citizen_victims_abroad_total_q31').val() || 0;


            if (country !== '' || status !== '') {
                formData.append(`question31[q31_table_data][${index}][country]`, country);
                formData.append(`question31[q31_table_data][${index}][status]`, status);
                formData.append(`question31[q31_table_data][${index}][men]`, men);
                formData.append(`question31[q31_table_data][${index}][women]`, women);
                formData.append(`question31[q31_table_data][${index}][tg]`, tg);
                formData.append(`question31[q31_table_data][${index}][boy]`, boy);
                formData.append(`question31[q31_table_data][${index}][girl]`, girl);
                formData.append(`question31[q31_table_data][${index}][total]`, total);
            }
        });

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('.question31 .card-title').css('color', 'blue');
                alert("Question 31  Saved Temporarily ");
            },
            error: function(err) {
                alert("Error saving question 31 data");
                console.log(err);
            }
        });
    });

});
</script>
<?php }  ?>