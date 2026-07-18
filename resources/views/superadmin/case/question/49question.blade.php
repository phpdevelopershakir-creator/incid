<?php
if (($questiontitles[48]->status ?? null) == 1) {
   
    $question_49_data = session()->get('question49');

    $q49_checked = $question_49_data['q49_checked_value'] ?? "1";
    $q49_saved_rows = $question_49_data['q49_table_data'] ?? [];
    $q49_others_val = $question_49_data['others'] ?? '';

    $Instruments_Lists = [
        1 => "Bil-lateral Agreement",
        2 => "SOP",
        3 => "Mutual Legal Arrangement",
        4 => "MoU",
        5 => "Trade Treaty",
        6 => "G to G Agreement",
    ];

    $country_Lists = [
        1 => "India", 2 => "Nepal", 3 => "Sri lanka", 4 => "EU", 5 => "USA",
        6 => "Saudi Arabia", 7 => "Qatar", 8 => "Lebanon", 9 => "Iraq",
        10 => "UAE", 11 => "Thailand", 12 => "Vietnam", 13 => "Cambodia",
        14 => "South Africa", 15 => "Brazil", 16 => "UK"
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
                49. {{ $questiontitles[48]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-49" class="collapse" role="tabpanel" aria-labelledby="heading-49" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioFoutyNine1" class="fourtyninestatus"
                    name="is_government_agreements_transparent_q49" value="1"
                    {{ $q49_checked == "1" ? "checked" : "" }}>
                <label for="radioFoutyNine1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioFourtyNine2" class="fourtyninestatus"
                    name="is_government_agreements_transparent_q49" value="0"
                    {{ $q49_checked == "0" ? "checked" : "" }}>
                <label for="radioFourtyNine2">No</label>
            </div>

            <div class="icheck-primary input-group">
                <input type="radio" id="radioFourtyNine3" class="fourtyninestatus"
                    name="is_government_agreements_transparent_q49" value="2"
                    {{ $q49_checked == "2" ? "checked" : "" }}>
                <label for="radioFourtyNine3">Others</label>

                <span class="col-md-6 mt--4 q49_others_container {{ $q49_checked == '2' ? '' : 'othersText' }}">
                    <input type="text" id="q49others" placeholder="Others" class="form-control"
                        value="{{ $q49_others_val }}" name="other_government_agreements_transparent_q49">
                </span>
            </div>

            <div id="49_question_view" class="{{ ($q49_checked == '0' || $q49_checked == '2') ? 'visibility' : '' }}">
                <table id="addRowQ49" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Country</th>
                            <th>Instruments</th>
                            <th>Attach/Upload Summary</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
          
              if (!empty($q49_saved_rows)) {
                foreach($q49_saved_rows as $index => $row) { 
                  $country_val = $row['country'] ?? '';
                  $is_custom_input = !is_numeric($country_val) && !empty($country_val);
                ?>
                        <tr class="qe49NoOfRow" id="row_q49_<?= $index ?>">
                            <td>
                                <?php if($is_custom_input || $index >= 3) { ?>
                                <input type="text" name="government_agreements_transparent_country_q49[]"
                                    value="<?= $country_val ?>" class="form-control q49_country_input"
                                    placeholder="Others (Specify)___">
                                <?php } else { ?>
                                <select name="government_agreements_transparent_country_q49[]"
                                    class="form-control q49_country_input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($country_Lists as $key => $country)
                                    <option value="{{ $key }}" <?= ($country_val == $key) ? 'selected' : '' ?>>
                                        {{ $country }}</option>
                                    @endforeach
                                </select>
                                <?php } ?>
                            </td>
                            <td>
                                <select name="government_agreements_transparent_status_q49[]"
                                    class="form-control q49_instrument_select">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($Instruments_Lists as $key => $instrument)
                                    <option value="{{ $key }}"
                                        <?= (($row['instrument'] ?? '') == $key) ? 'selected' : '' ?>>{{ $instrument }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="file" name="document_upload_q49[]" class="form-control q49_file_input">
                                <?php if(!empty($row['uploaded_file_name'])) { ?>
                                <small class="text-success d-block text-left mt-1">✓ Current:
                                    <?= $row['uploaded_file_name'] ?></small>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($index < 3) { ?>
                                <span class="text-muted">-</span>
                                <?php } elseif ($index == 3) { ?>
                                <button id="addRowDatasq49" type="button" class="btn btn-sm btn-primary">+</button>
                                <?php } else { ?>
                                <button type="button" class="btn btn-danger btn_remove_q49"
                                    data-id="<?= $index ?>">-</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } 
              } else { 
               
                for ($i = 0; $i < 3; $i++) { ?>
                        <tr class="qe49NoOfRow" id="row_q49_<?= $i ?>">
                            <td>
                                <select name="government_agreements_transparent_country_q49[]"
                                    class="form-control q49_country_input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($country_Lists as $key => $country)
                                    <option value="{{ $key }}">{{ $country }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="government_agreements_transparent_status_q49[]"
                                    class="form-control q49_instrument_select">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($Instruments_Lists as $key => $instrument)
                                    <option value="{{ $key }}">{{ $instrument }}</option>
                                    @endforeach
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
                                    @foreach ($Instruments_Lists as $key => $instrument)
                                    <option value="{{ $key }}">{{ $instrument }}</option>
                                    @endforeach
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


    let dynamicRowCount = $('.qe49NoOfRow').length + 500;
    $(document).on("click", "#addRowDatasq49", function() {
        dynamicRowCount++;
        $("#addRowQ49 tbody").append(
            `<tr class="qe49NoOfRow" id="row_q49_${dynamicRowCount}">
            <td>
              <input type="text" name="government_agreements_transparent_country_q49[]" class="form-control q49_country_input" placeholder="Others (Specify)___">
            </td>
            <td>
              <select name="government_agreements_transparent_status_q49[]" class="form-control q49_instrument_select">
                <option value="" disabled selected>---Choose an item--</option>
                @foreach ($Instruments_Lists as $key => $instrument)
                  <option value="{{ $key }}">{{ $instrument }}</option>
                @endforeach
              </select>
            </td>
            <td><input type="file" name="document_upload_q49[]" class="form-control q49_file_input"></td>
            <td><button type="button" class="btn btn-danger btn_remove_q49" data-id="${dynamicRowCount}">-</button></td>
          </tr>`
        );
    });


    $(document).on('click', '.btn_remove_q49', function() {
        let button_id = $(this).data('id');
        $('#row_q49_' + button_id).remove();
    });


    $(document).on("click", '#temp-save-question49', function() {
        let yes_no_value = $("input[name='is_government_agreements_transparent_q49']:checked").val();

        let formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append("question_no", "49");
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
                alert("Question 49  Saved Temporarily ");
            },
            error: function(err) {
                alert("Error saving question 49 data ");
                console.log(err);
            }
        });
    });

});
</script>
<?php } ?>