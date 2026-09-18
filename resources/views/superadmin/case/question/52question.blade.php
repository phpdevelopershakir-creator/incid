<?php
if (($questiontitles[51]->status ?? null) == 1) {
    $question_52_data = session()->get('question52');
    $q52_checked = $question_52_data['q52_checked_value'] ?? "1";
    $q52_saved_rows = $question_52_data['q52_table_data'] ?? [];
    $q52_others_val = $question_52_data['others'] ?? '';

    // Districts List
    $districts = [
        "Bagerhat", "Bandarban", "Barguna", "Barishal", "Bhola", "Bogra", "Brahmanbaria", "Chandpur", 
        "Chattogram", "Chuadanga", "Cox's Bazar", "Cumilla", "Dhamrai", "Dhaka", "Dinajpur", "Faridpur", 
        "Feni", "Gaibandha", "Gazipur", "Gopalganj", "Habiganj", "Jamalpur", "Jashore", "Jhalokati", 
        "Jhenaidah", "Joypurhat", "Khagrachhari", "Khulna", "Kishoreganj", "Kurigram", "Kushtia", 
        "Lakshmipur", "Lalmonirhat", "Madaripur", "Magura", "Manikganj", "Meherpur", "Moulvibazar", 
        "Munshiganj", "Mymensingh", "Naogaon", "Narail", "Narayanganj", "Narsingdi", "Natore", 
        "Nawabganj", "Netrokona", "Nilphamari", "Noakhali", "Pabna", "Panchagarh", "Patuakhali", 
        "Pirojpur", "Rajbari", "Rajshahi", "Rangamati", "Rangpur", "Satkhira", "Shariatpur", 
        "Sherpur", "Sirajganj", "Sunamganj", "Sylhet", "Tangail", "Thakurgaon"
    ];

    // Who is deported options
    $who_deported_options = [
        1 => "Bangladeshi perpetrator of child sexual exploitation",
        2 => "Foreign perpetrator of child sexual exploitation"
    ];
?>
<style>
.visibility { display: none !important; }
.othersText { display: none !important; }
.table th, .table td { vertical-align: middle !important; padding: 0.5rem; }
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
                    <input type="text" id="q52others" placeholder="Please describe" class="form-control"
                        value="{{ $q52_others_val }}" name="other_government_prosecute_deport_q52">
                </span>
            </div>

            <div id="52_question_view" class="{{ ($q52_checked == '0' || $q52_checked == '2') ? 'visibility' : '' }}">
                <table id="addRowQ52" class="table table-bordered text-center align-middle">
                    <thead>
                        <tr>
                            <th rowspan="2" class="align-middle">Location of exploitation</th>
                            <th colspan="4">Number of victims</th>
                            <th rowspan="2" class="align-middle">Who is deported</th>
                            <th colspan="3">Number of perpetrator deported</th>
                            <th rowspan="2" class="align-middle" style="width: 80px;">Add row</th>
                        </tr>
                        <tr>
                            <th>Boy</th>
                            <th>Girl</th>
                            <th>TG</th>
                            <th>Total</th>
                            <th>Man</th>
                            <th>Women</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if (!empty($q52_saved_rows)) {
                            foreach($q52_saved_rows as $index => $row) { 
                        ?>
                            <tr class="qe52NoOfRow" id="row_q52_<?= $index ?>">
                                <td>
                                    <select name="location_district_q52[]" class="form-control q52_district">
                                        <option value="">--Select District--</option>
                                        <?php foreach($districts as $district) { ?>
                                            <option value="<?= $district ?>" <?= (($row['district'] ?? '') == $district) ? 'selected' : '' ?>><?= $district ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td><input type="number" min="0" name="victim_boy_q52[]" class="form-control q52_v_boy" value="<?= $row['v_boy'] ?? 0 ?>"></td>
                                <td><input type="number" min="0" name="victim_girl_q52[]" class="form-control q52_v_girl" value="<?= $row['v_girl'] ?? 0 ?>"></td>
                                <td><input type="number" min="0" name="victim_tg_q52[]" class="form-control q52_v_tg" value="<?= $row['v_tg'] ?? 0 ?>"></td>
                                <td><input type="number" readonly name="victim_total_q52[]" class="form-control q52_v_total" value="<?= $row['v_total'] ?? 0 ?>"></td>
                                <td>
                                    <select name="who_deported_q52[]" class="form-control q52_who_deported">
                                        <option value="">--Select Option--</option>
                                        <?php foreach($who_deported_options as $k => $v) { ?>
                                            <option value="<?= $k ?>" <?= (($row['who_deported'] ?? '') == $k) ? 'selected' : '' ?>><?= $v ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td><input type="number" min="0" name="perp_man_q52[]" class="form-control q52_p_man" value="<?= $row['p_man'] ?? 0 ?>"></td>
                                <td><input type="number" min="0" name="perp_women_q52[]" class="form-control q52_p_women" value="<?= $row['p_women'] ?? 0 ?>"></td>
                                <td><input type="number" readonly name="perp_total_q52[]" class="form-control q52_p_total" value="<?= $row['p_total'] ?? 0 ?>"></td>
                                <td>
                                    <?php if ($index == 0) { ?>
                                        <button id="addRowDatasq52" type="button" class="btn btn-sm btn-primary">+</button>
                                    <?php } else { ?>
                                        <button type="button" class="btn btn-sm btn-danger btn_remove_q52" data-id="<?= $index ?>">-</button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php 
                            } 
                        } else { 
                        ?>
                            <tr class="qe52NoOfRow" id="row_q52_0">
                                <td>
                                    <select name="location_district_q52[]" class="form-control q52_district">
                                        <option value="">--Select District--</option>
                                        <?php foreach($districts as $district) { ?>
                                            <option value="<?= $district ?>"><?= $district ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td><input type="number" min="0" name="victim_boy_q52[]" class="form-control q52_v_boy" value="0"></td>
                                <td><input type="number" min="0" name="victim_girl_q52[]" class="form-control q52_v_girl" value="0"></td>
                                <td><input type="number" min="0" name="victim_tg_q52[]" class="form-control q52_v_tg" value="0"></td>
                                <td><input type="number" readonly name="victim_total_q52[]" class="form-control q52_v_total" value="0"></td>
                                <td>
                                    <select name="who_deported_q52[]" class="form-control q52_who_deported">
                                        <option value="">--Select Option--</option>
                                        <?php foreach($who_deported_options as $k => $v) { ?>
                                            <option value="<?= $k ?>"><?= $v ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td><input type="number" min="0" name="perp_man_q52[]" class="form-control q52_p_man" value="0"></td>
                                <td><input type="number" min="0" name="perp_women_q52[]" class="form-control q52_p_women" value="0"></td>
                                <td><input type="number" readonly name="perp_total_q52[]" class="form-control q52_p_total" value="0"></td>
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

    // Status toggle logic
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

    // Auto calculate totals
    $(document).on('input', '.q52_v_boy, .q52_v_girl, .q52_v_tg', function() {
        let tr = $(this).closest('tr');
        let boy = parseInt(tr.find('.q52_v_boy').val()) || 0;
        let girl = parseInt(tr.find('.q52_v_girl').val()) || 0;
        let tg = parseInt(tr.find('.q52_v_tg').val()) || 0;
        tr.find('.q52_v_total').val(boy + girl + tg);
    });

    $(document).on('input', '.q52_p_man, .q52_p_women', function() {
        let tr = $(this).closest('tr');
        let man = parseInt(tr.find('.q52_p_man').val()) || 0;
        let women = parseInt(tr.find('.q52_p_women').val()) || 0;
        tr.find('.q52_p_total').val(man + women);
    });

    // Add row logic
    let dynamicRowCount = $('.qe52NoOfRow').length + 500;
    $(document).on("click", "#addRowDatasq52", function() {
        dynamicRowCount++;
        
        let districtOptions = `<option value="">--Select District--</option>`;
        <?php foreach($districts as $district) { ?>
            districtOptions += `<option value="<?= $district ?>"><?= $district ?></option>`;
        <?php } ?>

        let whoDeportedOptions = `<option value="">--Select Option--</option>`;
        <?php foreach($who_deported_options as $k => $v) { ?>
            whoDeportedOptions += `<option value="<?= $k ?>"><?= $v ?></option>`;
        <?php } ?>

        $("#addRowQ52 tbody").append(
            `<tr class="qe52NoOfRow" id="row_q52_${dynamicRowCount}">
                <td><select name="location_district_q52[]" class="form-control q52_district">${districtOptions}</select></td>
                <td><input type="number" min="0" name="victim_boy_q52[]" class="form-control q52_v_boy" value="0"></td>
                <td><input type="number" min="0" name="victim_girl_q52[]" class="form-control q52_v_girl" value="0"></td>
                <td><input type="number" min="0" name="victim_tg_q52[]" class="form-control q52_v_tg" value="0"></td>
                <td><input type="number" readonly name="victim_total_q52[]" class="form-control q52_v_total" value="0"></td>
                <td><select name="who_deported_q52[]" class="form-control q52_who_deported">${whoDeportedOptions}</select></td>
                <td><input type="number" min="0" name="perp_man_q52[]" class="form-control q52_p_man" value="0"></td>
                <td><input type="number" min="0" name="perp_women_q52[]" class="form-control q52_p_women" value="0"></td>
                <td><input type="number" readonly name="perp_total_q52[]" class="form-control q52_p_total" value="0"></td>
                <td><button type="button" class="btn btn-sm btn-danger btn_remove_q52" data-id="${dynamicRowCount}">-</button></td>
            </tr>`
        );
    });

    // Remove row logic
    $(document).on('click', '.btn_remove_q52', function() {
        let button_id = $(this).data('id');
        $('#row_q52_' + button_id).remove();
    });

    // Save logic via AJAX
    $(document).on("click", '#temp-save-question52', function() {
        let yes_no_value = $("input[name='is_government_prosecute_deport_q52']:checked").val();

        let formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append("question_no", "52");
        formData.append("question52[q52_checked_value]", yes_no_value);
        formData.append("question52[others]", $("#q52others").val() || '');

        $('.qe52NoOfRow').each(function(index) {
            let district = $(this).find('.q52_district').val() || '';
            let v_boy = $(this).find('.q52_v_boy').val() || 0;
            let v_girl = $(this).find('.q52_v_girl').val() || 0;
            let v_tg = $(this).find('.q52_v_tg').val() || 0;
            let v_total = $(this).find('.q52_v_total').val() || 0;
            let who_deported = $(this).find('.q52_who_deported').val() || '';
            let p_man = $(this).find('.q52_p_man').val() || 0;
            let p_women = $(this).find('.q52_p_women').val() || 0;
            let p_total = $(this).find('.q52_p_total').val() || 0;

            formData.append(`question52[q52_table_data][${index}][district]`, district);
            formData.append(`question52[q52_table_data][${index}][v_boy]`, v_boy);
            formData.append(`question52[q52_table_data][${index}][v_girl]`, v_girl);
            formData.append(`question52[q52_table_data][${index}][v_tg]`, v_tg);
            formData.append(`question52[q52_table_data][${index}][v_total]`, v_total);
            formData.append(`question52[q52_table_data][${index}][who_deported]`, who_deported);
            formData.append(`question52[q52_table_data][${index}][p_man]`, p_man);
            formData.append(`question52[q52_table_data][${index}][p_women]`, p_women);
            formData.append(`question52[q52_table_data][${index}][p_total]`, p_total);
        });

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('.question52 .card-title').css('color', 'blue');
                alert("Question 52 Temp Saved");
            },
            error: function(err) {
                alert("Error saving question 52 data");
                console.log(err);
            }
        });
    });

});
</script>
<?php } ?>