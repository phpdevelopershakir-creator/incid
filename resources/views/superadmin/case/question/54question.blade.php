<?php
if (($questiontitles[53]->status ?? null) == 1) {
    
    $question_54_data = session()->get('question54');

    $q54_checked =$question_54_data['q54_checked_value'] ?? "1";
    $q54_saved_rows =$question_54_data['q54_table_data'] ?? [];
    $q54_others_val =$question_54_data['others'] ?? '';
    
    // Bottom Radio & Description
    $q54_sub_status =$question_54_data['sub_status'] ?? '1'; // 1=Yes, 0=No, 2=Others
    $q54_sub_desc =$question_54_data['sub_description'] ?? '';
    
    // Fetch countries list
    $countries = DB::table('countries')->pluck('name', 'id')->toArray();
?>
<style>
.visibility {
    display: none !important;
}

.othersText {
    display: none !important;
}
</style>

<div class="card question54">
    <div class="card-header" role="tab" id="heading-54">
        <h6 class="card-title" style="color: {{ !empty($question_54_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-54" aria-expanded="false" aria-controls="collapse-54">
                54. {{ $questiontitles[53]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-54" class="collapse" role="tabpanel" aria-labelledby="heading-54" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioFiftyFour1" class="fittyfourstatus"
                    name="is_country_diplomats_allegedly_q54" value="1" {{ $q54_checked == "1" ? "checked" : "" }}>
                <label for="radioFiftyFour1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioFiftyFour2" class="fittyfourstatus"
                    name="is_country_diplomats_allegedly_q54" value="0" {{ $q54_checked == "0" ? "checked" : "" }}>
                <label for="radioFiftyFour2">No</label>
            </div>

            <div class="icheck-primary input-group">
                <input type="radio" id="radioFiftyFour3" class="fittyfourstatus"
                    name="is_country_diplomats_allegedly_q54" value="2" {{ $q54_checked == "2" ? "checked" : "" }}>
                <label for="radioFiftyFour3">Others</label>

                <span class="col-md-6 mt--4 q54_others_container {{ $q54_checked == '2' ? '' : 'othersText' }}">
                    <input type="text" id="q54others" placeholder="Please describe" class="form-control"
                        value="{{ $q54_others_val }}" name="other_country_diplomats_allegedly_q54">
                </span>
            </div>

            <div id="54_question_view" class="{{ ($q54_checked == '0' or$q54_checked == '2') ? 'visibility' : '' }}">

                <!-- Dynamic Main Table -->
                <table id="addRowQ54" class="table table-bordered text-center mb-4">
                    <thead>
                        <tr>
                            <th rowspan="2" style="vertical-align: middle;">Country where posted</th>
                            <th rowspan="2" style="vertical-align: middle;">Description</th>
                            <th colspan="4">Number of Cases</th>
                            <th rowspan="2" style="vertical-align: middle;">Add row</th>
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
                        if (!empty($q54_saved_rows)) {
                            foreach($q54_saved_rows as $index =>$row) { 
                                $country_val =$row['country'] ?? '';
                        ?>
                        <tr class="qe54NoOfRow">
                            <td>
                                <select name="country_diplomat_name_q54[]" class="form-control q54_country_input">
                                    <option value="" disabled <?= empty($country_val) ? 'selected' : '' ?>>---Choose an
                                        item---</option>
                                    <?php foreach ($countries as $key =>$country_name) { ?>
                                    <option value="<?= $key ?>" <?= $country_val ==$key ? 'selected' : '' ?>>
                                        <?= $country_name ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="country_diplomat_description_q54[]"
                                    class="form-control country_diplomat_description_q54"
                                    value="<?= $row['description'] ?? '' ?>">
                            </td>
                            <td>
                                <input type="number" name="country_diplomat_men_q54[]"
                                    class="form-control country_diplomat_men_q54" value="<?= $row['men'] ?? 0 ?>"
                                    min="0">
                            </td>
                            <td>
                                <input type="number" name="country_diplomat_women_q54[]"
                                    class="form-control country_diplomat_women_q54" value="<?= $row['women'] ?? 0 ?>"
                                    min="0">
                            </td>
                            <td>
                                <input type="number" name="country_diplomat_tg_q54[]"
                                    class="form-control country_diplomat_tg_q54" value="<?= $row['tg'] ?? 0 ?>" min="0">
                            </td>
                            <td>
                                <input type="number" name="country_diplomat_total_q54[]"
                                    class="form-control country_diplomat_total_q54" value="<?= $row['total'] ?? 0 ?>"
                                    readonly>
                            </td>
                            <td>
                                <?php if ($index == 0) { ?>
                                <button type="button" class="btn btn-sm btn-primary btn_add_q54">+</button>
                                <?php } else { ?>
                                <button type="button" class="btn btn-danger btn_remove_q54">-</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } 
                        } else { ?>
                        <tr class="qe54NoOfRow">
                            <td>
                                <select name="country_diplomat_name_q54[]" class="form-control q54_country_input">
                                    <option value="" disabled selected>---Choose an item---</option>
                                    <?php foreach ($countries as $key =>$country_name) { ?>
                                    <option value="<?= $key ?>"><?= $country_name ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="text" name="country_diplomat_description_q54[]"
                                    class="form-control country_diplomat_description_q54"></td>
                            <td><input type="number" name="country_diplomat_men_q54[]"
                                    class="form-control country_diplomat_men_q54" value="0" min="0"></td>
                            <td><input type="number" name="country_diplomat_women_q54[]"
                                    class="form-control country_diplomat_women_q54" value="0" min="0"></td>
                            <td><input type="number" name="country_diplomat_tg_q54[]"
                                    class="form-control country_diplomat_tg_q54" value="0" min="0"></td>
                            <td><input type="number" name="country_diplomat_total_q54[]"
                                    class="form-control country_diplomat_total_q54" value="0" readonly></td>
                            <td><button type="button" class="btn btn-sm btn-primary btn_add_q54">+</button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <!-- Bottom Section: Yes/No/Others Question -->
                <div class="mt-4 p-3 border rounded">
                    <p class="font-weight-bold mb-2">Did the government seek criminal accountability?</p>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input q54_sub_status" type="radio" name="q54_sub_status"
                            id="q54_sub_yes" value="1" <?= $q54_sub_status == '1' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="q54_sub_yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input q54_sub_status" type="radio" name="q54_sub_status"
                            id="q54_sub_no" value="0" <?= $q54_sub_status == '0' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="q54_sub_no">No</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input q54_sub_status" type="radio" name="q54_sub_status"
                            id="q54_sub_other" value="2" <?= $q54_sub_status == '2' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="q54_sub_other">Others</label>
                    </div>

                    <!-- Description Textarea Container -->
                    <div class="mt-3 q54_sub_desc_container"
                        style="<?= $q54_sub_status == '0' ? 'display: none;' : '' ?>">
                        <textarea name="q54_sub_description" id="q54_sub_description" class="form-control" rows="2"
                            placeholder="Please describe..."><?= $q54_sub_desc ?></textarea>
                    </div>
                </div>

            </div>

            <br />
            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question54">Save</button>
            </p>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {

    // Dynamic Country Options HTML
    let countryOptions = '<option value="" disabled selected>---Choose an item---</option>';
    <?php foreach ($countries as $key =>$country_name) { ?>
    countryOptions += `<option value="<?= $key ?>"><?= addslashes($country_name) ?></option>`;
    <?php } ?>

    // Radio Button Visibility Toggle (Main Question)
    $(".fittyfourstatus").on("change", function() {
        var statusvalue = $("input[name='is_country_diplomats_allegedly_q54']:checked").val();

        if (statusvalue == '1') {
            $('#54_question_view').removeClass('visibility').show();
            $('.q54_others_container').addClass('othersText').hide();
            $('#q54others').val("");
        } else if (statusvalue == "2") {
            $('#54_question_view').addClass('visibility').hide();
            $('.q54_others_container').removeClass('othersText').show();
        } else {
            $('#54_question_view').addClass('visibility').hide();
            $('.q54_others_container').addClass('othersText').hide();
            $('#q54others').val("");
        }
    });

    // Sub Question Radio Change Toggle (Yes/No/Others)
    $(document).on("change", ".q54_sub_status", function() {
        let subVal = $(this).val();
        if (subVal == "1" || subVal == "2") { // Yes or Others
            $(".q54_sub_desc_container").slideDown();
        } else { // No
            $(".q54_sub_desc_container").slideUp();
            $("#q54_sub_description").val(""); // Clear description on NO
        }
    });

    // 1. ADD ROW FUNCTIONALITY
    $(document).on("click", ".btn_add_q54", function() {
        let newRow = `
            <tr class="qe54NoOfRow">
                <td>
                    <select name="country_diplomat_name_q54[]" class="form-control q54_country_input">
                        ${countryOptions}
                    </select>
                </td>
                <td><input type="text" name="country_diplomat_description_q54[]" class="form-control country_diplomat_description_q54"></td>
                <td><input type="number" name="country_diplomat_men_q54[]" class="form-control country_diplomat_men_q54" value="0" min="0"></td>
                <td><input type="number" name="country_diplomat_women_q54[]" class="form-control country_diplomat_women_q54" value="0" min="0"></td>
                <td><input type="number" name="country_diplomat_tg_q54[]" class="form-control country_diplomat_tg_q54" value="0" min="0"></td>
                <td><input type="number" name="country_diplomat_total_q54[]" class="form-control country_diplomat_total_q54" value="0" readonly></td>
                <td><button type="button" class="btn btn-danger btn_remove_q54">-</button></td>
            </tr>`;

        $("#addRowQ54 tbody").append(newRow);
    });

    // 2. REMOVE ROW FUNCTIONALITY
    $(document).on('click', '.btn_remove_q54', function() {
        $(this).closest('tr').remove();
    });

    // 3. AUTO CALCULATION TOTAL
    $(document).on('input', '.country_diplomat_men_q54, .country_diplomat_women_q54, .country_diplomat_tg_q54',
        function() {
            let row = $(this).closest('tr');
            let men = parseFloat(row.find('.country_diplomat_men_q54').val()) || 0;
            let women = parseFloat(row.find('.country_diplomat_women_q54').val()) || 0;
            let tg = parseFloat(row.find('.country_diplomat_tg_q54').val()) || 0;

            row.find('.country_diplomat_total_q54').val(men + women + tg);
        });

    // 4. AJAX TEMP SAVE
    $(document).on("click", '#temp-save-question54', function() {
        let yes_no_value = $("input[name='is_country_diplomats_allegedly_q54']:checked").val();
        let sub_status = $("input[name='q54_sub_status']:checked").val() || '1';

        let formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append("question_no", "54");
        formData.append("question54[q54_checked_value]", yes_no_value);
        formData.append("question54[others]", $("#q54others").val() || '');

        // Append Sub Question Data
        formData.append("question54[sub_status]", sub_status);
        formData.append("question54[sub_description]", $("#q54_sub_description").val() || '');

        $('.qe54NoOfRow').each(function(index) {
            let country = $(this).find('.q54_country_input').val() || '';
            let description = $(this).find('.country_diplomat_description_q54').val() || '';
            let men = $(this).find('.country_diplomat_men_q54').val() || 0;
            let women = $(this).find('.country_diplomat_women_q54').val() || 0;
            let tg = $(this).find('.country_diplomat_tg_q54').val() || 0;
            let total = $(this).find('.country_diplomat_total_q54').val() || 0;

            if (country !== '') {
                formData.append(`question54[q54_table_data][${index}][country]`, country);
                formData.append(`question54[q54_table_data][${index}][description]`,
                    description);
                formData.append(`question54[q54_table_data][${index}][men]`, men);
                formData.append(`question54[q54_table_data][${index}][women]`, women);
                formData.append(`question54[q54_table_data][${index}][tg]`, tg);
                formData.append(`question54[q54_table_data][${index}][total]`, total);
            }
        });

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('.question54 .card-title').css('color', 'blue');
                alert("Question 54 Saved Temporarily ");
            },
            error: function(err) {
                alert("Error saving question 54 data ");
                console.log(err);
            }
        });
    });

});
</script>
<?php } ?>