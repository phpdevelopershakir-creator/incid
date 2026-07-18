<?php
if (($questiontitles[29]->status ?? null) == 1) {
    
    $question_30_data = session()->get('question30');

    $q30_checked = isset($question_30_data['q30_checked_value']) ? $question_30_data['q30_checked_value'] : ($question_30_data->q30_checked_value ?? "1");
    $q30_others_val = isset($question_30_data['others']) ? $question_30_data['others'] : ($question_30_data->others ?? "");
    $q30_main_rows = isset($question_30_data['q30_data']) ? $question_30_data['q30_data'] : ($question_30_data->q30_data ?? []);
?>
<style>
.visibility {
    display: none;
}

.othersText {
    display: none;
}
</style>

<div class="card question30">
    <?php
    $protection_Lists = [
      1 => "Economic Support/Asset Transfer",
      2 => "Micro Credit",
      3 => "Livelihood Training",
      4 => "Job Placement",
      5 => "Health Care",
      6 => "Psychosocial Care",
      7 => "Shelter",
      8 => "Social Safetynet",
      9 => "Information Support",
      10 => "Mainstream Education",
      11 => "Non Formal Education",
      12 => "Technical Education",
      13 => "Life Skill",
      14 => "Family Reunion",
      15 => "Referral"
    ];

    $protection_qualites = [
      1 => "Excess",
      2 => "Adequate",
      3 => "Inadequate",
      4 => "None"
    ];
    ?>

    <div class="card-header" role="tab" id="heading-4">
        <h6 class="card-title" style="color: {{ !empty($question_30_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-30" aria-expanded="false" aria-controls="collapse-4">
                30. {{ $questiontitles[29]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-30" class="collapse" role="tabpanel" aria-labelledby="heading-4" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioTwentyFour1" class="twentyfourstatus" name="is_foreign_victims_q30"
                    value="1" <?= ($q30_checked == "1") ? "checked" : ""; ?>>
                <label for="radioTwentyFour1">Yes</label>
            </div>
            <div class="icheck-primary">
                <input type="radio" id="radioTwentyFour2" class="twentyfourstatus" name="is_foreign_victims_q30"
                    value="0" <?= ($q30_checked == "0") ? "checked" : ""; ?>>
                <label for="radioTwentyFour2">No</label>
            </div>
            <div class="icheck-primary input-group mb-3">
                <input type="radio" id="radioTwentyFour3" class="twentyfourstatus" name="is_foreign_victims_q30"
                    value="2" <?= ($q30_checked == "2") ? "checked" : ""; ?>>
                <label for="radioTwentyFour3">Others</label>
                <span class="col-md-6 mt--4 <?= ($q30_checked == "2") ? "" : "othersText"; ?>" style="margin-top:-8px;">
                    <input type="text" id="q30others" placeholder="Others" class="form-control"
                        value="<?= $q30_others_val; ?>" name="other_foreign_victims_q30">
                </span>
            </div>

            <div id="24_question_view" class="<?= ($q30_checked == '0' || $q30_checked == '2') ? 'visibility' : ''; ?>">
                <table id="addRowq30" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th rowspan="2">Protection Services</th>
                            <th rowspan="2">Status of coverage</th>
                            <th colspan="6">Current Coverage of Foreign VoTs </th>
                            <th rowspan="2">Origin of VoT (multiple Response)</th>
                            <th rowspan="2">Action</th>
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
                        
                        if (!empty($q30_main_rows) && (is_array($q30_main_rows) || is_object($q30_main_rows))) {
                            $i = 0;
                            foreach($q30_main_rows as $q30) {
                                $q30 = (array)$q30;
                                $saved_locations = json_decode(json_encode($q30['citizen_victims_country_q30'] ?? []), true);
                                if(!is_array($saved_locations)) { $saved_locations = []; }
                                
                                $service_val = $q30['citizen_victims_services_q30'] ?? '';
                        ?>
                        <tr class="qe24NoOfRow" id="row_old_<?= $i; ?>">
                            <td>
                                <?php if(is_numeric($service_val) && $service_val >= 1 && $service_val <= 15 && isset($protection_Lists[$service_val])) { ?>
                                <select name="citizen_victims_services_q30[]" class="form-control q30Input">
                                    <option value="" disabled>---Choose an item--</option>
                                    <?php foreach ($protection_Lists as $key => $training) { ?>
                                    <option <?= $service_val == $key ? 'selected' : ''; ?> value="<?= $key ?>">
                                        <?= $training ?></option>
                                    <?php } ?>
                                </select>
                                <?php } else { ?>
                                <input type="text" name="citizen_victims_services_q30[]" class="form-control"
                                    value="<?= htmlspecialchars($service_val) ?>" placeholder="Other (Specify)___">
                                <?php } ?>
                            </td>
                            <td>
                                <select name="citizen_victims_quality_q30[]" class="form-control q30Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    <?php foreach ($protection_qualites as $key => $quality) { ?>
                                    <option
                                        <?= ($q30['citizen_victims_quality_q30'] ?? '') == $key ? 'selected' : ''; ?>
                                        value="<?= $key ?>"><?= $quality ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="number" name="citizen_victims_men_q30[]"
                                    class="form-control citizen_victims_men_q30"
                                    value="<?= $q30['citizen_victims_men_q30'] ?? 0 ?>" min="0"></td>
                            <td><input type="number" name="citizen_victims_women_q30[]"
                                    class="form-control citizen_victims_women_q30"
                                    value="<?= $q30['citizen_victims_women_q30'] ?? 0 ?>" min="0"></td>
                            <td><input type="number" name="citizen_victims_tg_q30[]"
                                    class="form-control citizen_victims_tg_q30"
                                    value="<?= $q30['citizen_victims_tg_q30'] ?? 0 ?>" min="0"></td>
                            <td><input type="number" name="citizen_victims_boy_q30[]"
                                    class="form-control citizen_victims_boy_q30"
                                    value="<?= $q30['citizen_victims_boy_q30'] ?? 0 ?>" min="0"></td>
                            <td><input type="number" name="citizen_victims_girl_q30[]"
                                    class="form-control citizen_victims_girl_q30"
                                    value="<?= $q30['citizen_victims_girl_q30'] ?? 0 ?>" min="0"></td>
                            <td><input type="text" name="citizen_victims_total_q30[]"
                                    class="form-control citizen_victims_total_q30" readonly
                                    value="<?= $q30['citizen_victims_total_q30'] ?? 0 ?>"></td>
                            <td>
                                <select name="citizen_victims_country_q30[old_<?= $i ?>][]"
                                    class="form-control multiSelect" multiple="multiple">
                                    @include('superadmin.case.helper.country', ['selected_locations' =>
                                    $saved_locations])
                                </select>
                            </td>
                            <td>
                                <?php if ($i < 17) { ?>
                                <!-- প্রথম ১৭টি রো-তে কোনো অ্যাকশন বাটন থাকবে না -->
                                <?php } else if ($i == 17) { ?>
                                <button type="button" class="btn btn-sm btn-primary addRowDatasq30">+</button>
                                <?php } else { ?>
                                <button type="button" id="old_<?= $i; ?>"
                                    class="btn btn-danger btn-sm btn_remove cicle">-</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php 
                                $i++;
                            }
                        } else { 
                        
                            
                            
                            foreach ($protection_Lists as $key => $training) {
                        ?>
                        <tr class="qe24NoOfRow" id="row_fixed_<?= $key ?>">
                            <td>
                                <select name="citizen_victims_services_q30[]" class="form-control q30Input">
                                    <option value="<?= $key ?>" selected><?= $training ?></option>
                                </select>
                            </td>
                            <td>
                                <select name="citizen_victims_quality_q30[]" class="form-control q30Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    <?php foreach ($protection_qualites as $qKey => $quality) { ?>
                                    <option value="<?= $qKey ?>"><?= $quality ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="number" name="citizen_victims_men_q30[]"
                                    class="form-control citizen_victims_men_q30" value="0" min="0"></td>
                            <td><input type="number" name="citizen_victims_women_q30[]"
                                    class="form-control citizen_victims_women_q30" value="0" min="0"></td>
                            <td><input type="number" name="citizen_victims_tg_q30[]"
                                    class="form-control citizen_victims_tg_q30" value="0" min="0"></td>
                            <td><input type="number" name="citizen_victims_boy_q30[]"
                                    class="form-control citizen_victims_boy_q30" value="0" min="0"></td>
                            <td><input type="number" name="citizen_victims_girl_q30[]"
                                    class="form-control citizen_victims_girl_q30" value="0" min="0"></td>
                            <td><input type="text" name="citizen_victims_total_q30[]"
                                    class="form-control citizen_victims_total_q30" value="0" readonly></td>
                            <td>
                                <select name="citizen_victims_country_q30[fixed_<?= $key ?>][]"
                                    class="form-control multiSelect" multiple="multiple">
                                    @include('superadmin.case.helper.country')
                                </select>
                            </td>
                            <td></td>
                        </tr>
                        <?php 
                            } 
                            
                           
                            for ($idx = 1; $idx <= 2; $idx++) {
                        ?>
                        <tr class="qe24NoOfRow" id="row_other_fixed_<?= $idx ?>">
                            <td>
                                <input type="text" name="citizen_victims_services_q30[]" class="form-control"
                                    placeholder="Other (Specify)___">
                            </td>
                            <td>
                                <select name="citizen_victims_quality_q30[]" class="form-control q30Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    <?php foreach ($protection_qualites as $qKey => $quality) { ?>
                                    <option value="<?= $qKey ?>"><?= $quality ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="number" name="citizen_victims_men_q30[]"
                                    class="form-control citizen_victims_men_q30" value="0" min="0"></td>
                            <td><input type="number" name="citizen_victims_women_q30[]"
                                    class="form-control citizen_victims_women_q30" value="0" min="0"></td>
                            <td><input type="number" name="citizen_victims_tg_q30[]"
                                    class="form-control citizen_victims_tg_q30" value="0" min="0"></td>
                            <td><input type="number" name="citizen_victims_boy_q30[]"
                                    class="form-control citizen_victims_boy_q30" value="0" min="0"></td>
                            <td><input type="number" name="citizen_victims_girl_q30[]"
                                    class="form-control citizen_victims_girl_q30" value="0" min="0"></td>
                            <td><input type="text" name="citizen_victims_total_q30[]"
                                    class="form-control citizen_victims_total_q30" value="0" readonly></td>
                            <td>
                                <select name="citizen_victims_country_q30[other_fixed_<?= $idx ?>][]"
                                    class="form-control multiSelect" multiple="multiple">
                                    @include('superadmin.case.helper.country')
                                </select>
                            </td>
                            <td></td>
                        </tr>
                        <?php 
                            } 
                            
                            
                        ?>
                        <tr class="qe24NoOfRow" id="row_other_fixed_3">
                            <td>
                                <input type="text" name="citizen_victims_services_q30[]" class="form-control"
                                    placeholder="Other (Specify)___">
                            </td>
                            <td>
                                <select name="citizen_victims_quality_q30[]" class="form-control q30Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    <?php foreach ($protection_qualites as $qKey => $quality) { ?>
                                    <option value="<?= $qKey ?>"><?= $quality ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="number" name="citizen_victims_men_q30[]"
                                    class="form-control citizen_victims_men_q30" value="0" min="0"></td>
                            <td><input type="number" name="citizen_victims_women_q30[]"
                                    class="form-control citizen_victims_women_q30" value="0" min="0"></td>
                            <td><input type="number" name="citizen_victims_tg_q30[]"
                                    class="form-control citizen_victims_tg_q30" value="0" min="0"></td>
                            <td><input type="number" name="citizen_victims_boy_q30[]"
                                    class="form-control citizen_victims_boy_q30" value="0" min="0"></td>
                            <td><input type="number" name="citizen_victims_girl_q30[]"
                                    class="form-control citizen_victims_girl_q30" value="0" min="0"></td>
                            <td><input type="text" name="citizen_victims_total_q30[]"
                                    class="form-control citizen_victims_total_q30" value="0" readonly></td>
                            <td>
                                <select name="citizen_victims_country_q30[other_fixed_3][]"
                                    class="form-control multiSelect" multiple="multiple">
                                    @include('superadmin.case.helper.country')
                                </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary addRowDatasq30">+</button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <br />
            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question30">Save</button>
            </p>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {

    $(".twentyfourstatus").on("click", function() {
        var statusvalue = $("input[name='is_foreign_victims_q30']:checked").val();
        $('.question30').find('.othersText').hide();
        $('.question30').find('#q30others').val("");
        if (statusvalue == '1') {
            $('.question30').find('#24_question_view').show();
            $('.question30').find('.input-group span').addClass('othersText').hide();
        } else if (statusvalue == "2") {
            $('.question30').find('#24_question_view').hide();
            $('.question30').find('.input-group span').removeClass('othersText').show();
        } else {
            $('.question30').find('#24_question_view').hide();
            $('.question30').find('.input-group span').addClass('othersText').hide();
        }
    });
});
</script>

<script type="text/javascript">
$(function() {
    function initializeSelect2() {
        if ($.fn.select2) {
            $('.multiSelect').each(function() {
                if (!$(this).hasClass("select2-hidden-accessible")) {
                    $(this).select2({
                        width: '100%',
                        placeholder: "Select Locations"
                    });
                }
            });
        }
    }

    initializeSelect2();


    $(document).on('click', '.addRowDatasq30', function() {
        let uniqueId = new Date().getTime();

        let jsProtectionQualities = {
            1: "Excess",
            2: "Adequate",
            3: "Inadequate",
            4: "None"
        };

        let qualityOptions = `<option value="" disabled selected>---Choose an item--</option>`;
        $.each(jsProtectionQualities, function(key, value) {
            qualityOptions += `<option value="${key}">${value}</option>`;
        });

        let html = `
        <tr class="qe24NoOfRow" id="row_${uniqueId}">
            <td>
                <input type="text" name="citizen_victims_services_q30[]" class="form-control" placeholder="Other (Specify)___">
            </td>
            <td>
               <select name="citizen_victims_quality_q30[]" class="form-control q30Input">
                    ${qualityOptions}
               </select>
           </td>
            <td><input type="number" name="citizen_victims_men_q30[]" class="form-control citizen_victims_men_q30" value="0" min="0"></td>
            <td><input type="number" name="citizen_victims_women_q30[]" class="form-control citizen_victims_women_q30" value="0" min="0"></td>
            <td><input type="number" name="citizen_victims_tg_q30[]" class="form-control citizen_victims_tg_q30" value="0" min="0"></td>
            <td><input type="number" name="citizen_victims_boy_q30[]" class="form-control citizen_victims_boy_q30" value="0" min="0"></td>
            <td><input type="number" name="citizen_victims_girl_q30[]" class="form-control citizen_victims_girl_q30" value="0" min="0"></td>
            <td><input type="text" name="citizen_victims_total_q30[]" class="form-control citizen_victims_total_q30" value="0" readonly></td>
            <td>
                <select name="citizen_victims_country_q30[${uniqueId}][]" class="form-control multiSelect" multiple="multiple">
                     @include('superadmin.case.helper.country')
                </select>
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm btn_remove cicle" id="${uniqueId}">-</button>
            </td>
        </tr>`;

        $('#addRowq30 tbody').append(html);
        initializeSelect2();
    });


    $(document).on('click', '.btn_remove', function() {
        $(this).closest('tr').remove();
    });


    $(document).on('keyup change', '.qe24NoOfRow input[type="number"]', function() {
        let $row = $(this).closest('.qe24NoOfRow');
        let men = parseInt($row.find('.citizen_victims_men_q30').val()) || 0;
        let women = parseInt($row.find('.citizen_victims_women_q30').val()) || 0;
        let tg = parseInt($row.find('.citizen_victims_tg_q30').val()) || 0;
        let boy = parseInt($row.find('.citizen_victims_boy_q30').val()) || 0;
        let girl = parseInt($row.find('.citizen_victims_girl_q30').val()) || 0;

        let total = men + women + tg + boy + girl;
        $row.find('.citizen_victims_total_q30').val(total);
    });


    $(document).on('click', '#temp-save-question30', function(e) {
        e.preventDefault();

        let yes_no_value = $("input[name='is_foreign_victims_q30']:checked").val();
        let others_input_val = $("#q30others").val();
        let courtData = [];

        $('.qe24NoOfRow').each(function() {
            let protection = $(this).find("select[name='citizen_victims_services_q30[]']")
                .val() || $(this).find("input[name='citizen_victims_services_q30[]']").val();
            let quality = $(this).find("select[name='citizen_victims_quality_q30[]']").val();
            let men = $(this).find(".citizen_victims_men_q30").val();
            let women = $(this).find(".citizen_victims_women_q30").val();
            let tg = $(this).find(".citizen_victims_tg_q30").val();
            let boy = $(this).find(".citizen_victims_boy_q30").val();
            let girl = $(this).find(".citizen_victims_girl_q30").val();
            let total = $(this).find(".citizen_victims_total_q30").val();
            let location = $(this).find('.multiSelect').val();

            courtData.push({
                citizen_victims_services_q30: protection,
                citizen_victims_quality_q30: quality,
                citizen_victims_men_q30: men,
                citizen_victims_women_q30: women,
                citizen_victims_tg_q30: tg,
                citizen_victims_boy_q30: boy,
                citizen_victims_girl_q30: girl,
                citizen_victims_total_q30: total,
                citizen_victims_country_q30: location
            });
        });

        let new_data = {
            q30_data: courtData,
            q30_checked_value: yes_no_value,
            others: others_input_val
        };

        $.ajax({
            url: "/superadmin/case/temp-save-question",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "question_no": "30",
                "question30": new_data
            },
            success: function(response) {
                $('.question30 .card-title').css('color', 'blue');
                alert("Question 30  Saved Temporarily ");
            },
            error: function(xhr) {
                alert("Error: Connection failed.");
            }
        });
    });
});
</script>
<?php 
} 
?>