<?php
if (($questiontitles[48]->status ?? null) == 1) {
    $question_49_data = session()->get('question49');
    
    // Default value logic
    $q49_checked =$question_49_data['q49_checked_value'] ?? "1"; 
    $q49_saved_rows =$question_49_data['q49_table_data'] ?? [];
    $q49_others_val =$question_49_data['others'] ?? '';

    $countries = DB::table('countries')->pluck('name', 'id')->toArray();

    $Instruments_Lists = [
        1 => "Bil-lateral Agreement",
        2 => "SOP",
        3 => "Mutual Legal Arrangement",
        4 => "MoU",
        5 => "Trade Treaty",
        6 => "G to G Agreement",
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

<div class="card question49">
    <div class="card-header" role="tab" id="heading-49">
        <h6 class="card-title" style="color: {{ !empty($question_49_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-49" aria-expanded="false" aria-controls="collapse-49">
                49. {{ $questiontitles[48]->title ?? 'Government Agreements' }}
            </a>
        </h6>
    </div>

    <div id="Question-49" class="collapse" role="tabpanel" aria-labelledby="heading-49" data-parent="#accordion-2">
        <div class="card-body">

            <!-- Radio Option 1: Yes (1) -->
            <div class="icheck-primary">
                <input type="radio" id="radioFoutyNine1" class="fourtyninestatus"
                    name="is_government_agreements_transparent_q49" value="1"
                    {{ (string)$q49_checked === "1" ? "checked" : "" }}>
                <label for="radioFoutyNine1">Yes</label>
            </div>

            <!-- Radio Option 2: No (0) -->
            <div class="icheck-primary">
                <input type="radio" id="radioFourtyNine2" class="fourtyninestatus"
                    name="is_government_agreements_transparent_q49" value="0"
                    {{ (string)$q49_checked === "0" ? "checked" : "" }}>
                <label for="radioFourtyNine2">No</label>
            </div>

            <!-- Radio Option 3: Others (2) -->
            <div class="icheck-primary input-group">
                <input type="radio" id="radioFourtyNine3" class="fourtyninestatus"
                    name="is_government_agreements_transparent_q49" value="2"
                    {{ (string)$q49_checked === "2" ? "checked" : "" }}>
                <label for="radioFourtyNine3">Others</label>

                <span
                    class="col-md-6 mt--4 q49_others_container {{ (string)$q49_checked === '2' ? '' : 'othersText' }}">
                    <input type="text" id="q49others" placeholder="Please describe" class="form-control"
                        value="{{ $q49_others_val }}" name="other_government_agreements_transparent_q49">
                </span>
            </div>

            <!-- Question View Section -->
            <div id="49_question_view"
                class="{{ ((string)$q49_checked === '0' || (string)$q49_checked === '2') ? 'visibility' : '' }}">
                <table id="addRowQ49" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Country</th>
                            <th>Instruments</th>
                            <th>Attach/Upload Summary</th>
                            <th>Add row</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if (!empty($q49_saved_rows)) {
                            foreach($q49_saved_rows as $index =>$row) { 
                                $country_val =$row['country'] ?? '';
                                if (is_numeric($country_val) && isset($countries[$country_val])) {$country_val = $countries[$country_val];
                                }
                                $is_custom_input = ($index >= 3);
                        ?>
                        <tr class="qe49NoOfRow" id="row_q49_<?= $index ?>">
                            <td>
                                <?php if($is_custom_input) { ?>
                                <input type="text" name="government_agreements_transparent_country_q49[]"
                                    value="<?= htmlspecialchars($country_val) ?>" class="form-control q49_country_input"
                                    placeholder="Others (Specify)___">
                                <?php } else { ?>
                                <select name="government_agreements_transparent_country_q49[]"
                                    class="form-control q49_country_input">
                                    <option value="" disabled <?= empty($country_val) ? 'selected' : '' ?>>---Choose an
                                        item--</option>
                                    <?php foreach ($countries as $id =>$country_name) { ?>
                                    <option value="<?= $country_name ?>"
                                        <?= ($country_val ==$country_name) ? 'selected' : '' ?>>
                                        <?= $country_name ?>
                                    </option>
                                    <?php } ?>
                                </select>
                                <?php } ?>
                            </td>
                            <td>
                                <select name="government_agreements_transparent_status_q49[]"
                                    class="form-control q49_instrument_select">
                                    <option value="" disabled <?= empty($row['instrument'] ?? '') ? 'selected' : '' ?>>
                                        ---Choose an item--</option>
                                    <?php foreach ($Instruments_Lists as $key =>$instrument) { ?>
                                    <option value="<?= $key ?>"
                                        <?= (($row['instrument'] ?? '') ==$key) ? 'selected' : '' ?>>
                                        <?= $instrument ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <input type="file" name="document_upload_q49[]" class="form-control q49_file_input">
                            </td>
                            <td>
                                <?php if ($index < 3) { ?> <span class="text-muted">-</span>
                                <?php } elseif ($index == 3) { ?>
                                <button id="addRowDatasq49" type="button" class="btn btn-sm btn-primary">+</button>
                                <?php } else { ?>
                                <button type="button" class="btn btn-sm btn-danger btn_remove_q49">-</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php 
                            } 
                        } else { 
                            for ($i = 0; $i < 3; $i++) { 
                        ?>
                        <tr class="qe49NoOfRow" id="row_q49_<?= $i ?>">
                            <td>
                                <select name="government_agreements_transparent_country_q49[]"
                                    class="form-control q49_country_input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    <?php foreach ($countries as $id =>$country_name) { ?>
                                    <option value="<?= $country_name ?>"><?= $country_name ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <select name="government_agreements_transparent_status_q49[]"
                                    class="form-control q49_instrument_select">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    <?php foreach ($Instruments_Lists as $key =>$instrument) { ?>
                                    <option value="<?= $key ?>"><?= $instrument ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="file" name="document_upload_q49[]" class="form-control q49_file_input">
                            </td>
                            <td><span class="text-muted">-</span></td>
                        </tr>
                        <?php } ?>

                        <tr class="qe49NoOfRow" id="row_q49_3">
                            <td>
                                <input type="text" name="government_agreements_transparent_country_q49[]"
                                    class="form-control q49_country_input" placeholder="Others (Specify)___">
                            </td>
                            <td>
                                <select name="government_agreements_transparent_status_q49[]"
                                    class="form-control q49_instrument_select">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    <?php foreach ($Instruments_Lists as $key =>$instrument) { ?>
                                    <option value="<?= $key ?>"><?= $instrument ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="file" name="document_upload_q49[]" class="form-control q49_file_input">
                            </td>
                            <td><button id="addRowDatasq49" type="button" class="btn btn-sm btn-primary">+</button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <br />
            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question49">Save</button>
            </p>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    // Radio toggle listener for showing/hiding table & text inputs
    $(".fourtyninestatus").on("change", function() {
        var statusvalue = $("input[name='is_government_agreements_transparent_q49']:checked").val();

        if (statusvalue == '1') {
            $('#49_question_view').removeClass('visibility').show();
            $('.q49_others_container').addClass('othersText').hide();
            $('#q49others').val("");
        } else if (statusvalue == "2") {
            $('#49_question_view').addClass('visibility').hide();
            $('.q49_others_container').removeClass('othersText').show();
        } else {
            $('#49_question_view').addClass('visibility').hide();
            $('.q49_others_container').addClass('othersText').hide();
            $('#q49others').val("");
        }
    });

    // Dynamic row addition
    $(document).on("click", "#addRowDatasq49", function() {
        let instrumentOptions = `<option value="" disabled selected>---Choose an item--</option>`;
        <?php foreach ($Instruments_Lists as $key =>$instrument) { ?>
        instrumentOptions += `<option value="<?= $key ?>"><?= $instrument ?></option>`;
        <?php } ?>

        $("#addRowQ49 tbody").append(
            `<tr class="qe49NoOfRow">
                <td>
                  <input type="text" name="government_agreements_transparent_country_q49[]" class="form-control q49_country_input" placeholder="Others (Specify)___">
                </td>
                <td>
                  <select name="government_agreements_transparent_status_q49[]" class="form-control q49_instrument_select">
                    ${instrumentOptions}
                  </select>
                </td>
                <td><input type="file" name="document_upload_q49[]" class="form-control q49_file_input"></td>
                <td><button type="button" class="btn btn-sm btn-danger btn_remove_q49">-</button></td>
            </tr>`
        );
    });

    // Dynamic row removal
    $(document).on('click', '.btn_remove_q49', function() {
        $(this).closest('tr').remove();
    });

    // AJAX submit handler
    $(document).on("click", '#temp-save-question49', function() {
        let yes_no_value = $("input[name='is_government_agreements_transparent_q49']:checked").val();

        // Unchecked situation-e default "0" (No)
        if (typeof yes_no_value === "undefined" || yes_no_value === null) {
            yes_no_value = "0";
        }

        let formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append("question_no", "49");
        formData.append("is_government_agreements_transparent_q49", yes_no_value);
        formData.append("question49[q49_checked_value]", yes_no_value);
        formData.append("question49[others]", $("#q49others").val() || '');

        $('.qe49NoOfRow').each(function(index) {
            let country = $(this).find('.q49_country_input').val() || '';
            let instrument = $(this).find('.q49_instrument_select').val() || '';

            if (country !== '' || instrument !== '') {
                formData.append(`question49[q49_table_data][${index}][country]`, country);
                formData.append(`question49[q49_table_data][${index}][instrument]`, instrument);

                let fileInput = $(this).find('.q49_file_input')[0].files[0];
                if (fileInput) {
                    formData.append(`document_upload_q49_${index}`, fileInput);
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
                $('.question49 .card-title').css('color', 'blue');
                alert("Question 49 Saved Successfully!");
            },
            error: function(err) {
                alert("Error saving question 49 data");
                console.log(err);
            }
        });
    });
});
</script>
<?php } ?>