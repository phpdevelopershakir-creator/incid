<?php
if (($questiontitles[23]->status ?? null) == 1) {

    $question_24_data = session()->get('question24');

    
    $q24_checked = isset($question_24_data['q24_checked_value']) ? $question_24_data['q24_checked_value'] : ($question_24_data->q24_checked_value ?? "1");
    $q24_others_val = isset($question_24_data['others']) ? $question_24_data['others'] : ($question_24_data->others ?? "");
    $q24_main_rows = isset($question_24_data['q24_data']) ? $question_24_data['q24_data'] : ($question_24_data->q24_data ?? []);
?>
<style>
.visibility {
    display: none;
}

.othersText {
    display: none;
}
</style>

<div class="card question24">
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
      1 => "Excellent",
      2 => "As per Standard",
      3 => "Below Standard"
    ];
    ?>

    <div class="card-header" role="tab" id="heading-4">
        <h6 class="card-title" style="color: {{ !empty($question_24_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-24" aria-expanded="false" aria-controls="collapse-4">
                24.{{ $questiontitles[23]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-24" class="collapse" role="tabpane24" aria-labelledby="heading-4" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioTwentyFour1" class="twentyfourstatus"
                    name="is_specialized_trafficking_victims_q24" value="1"
                    <?= ($q24_checked == "1") ? "checked" : ""; ?>>
                <label for="radioTwentyFour1">Yes</label>
            </div>
            <div class="icheck-primary">
                <input type="radio" id="radioTwentyFour2" class="twentyfourstatus"
                    name="is_specialized_trafficking_victims_q24" value="0"
                    <?= ($q24_checked == "0") ? "checked" : ""; ?>>
                <label for="radioTwentyFour2">No</label>
            </div>
            <div class="icheck-primary input-group">
                <input type="radio" id="radioTwentyFour3" class="twentyfourstatus"
                    name="is_specialized_trafficking_victims_q24" value="2"
                    <?= ($q24_checked == "2") ? "checked" : ""; ?>>
                <label for="radioTwentyFour3">Others</label>
                <span class="col-md-6 mt--4 <?= ($q24_checked == "2") ? "" : "othersText"; ?>">
                    <input type="text" id="q24others" placeholder="Others " class="form-control"
                        value="<?= $q24_others_val; ?>" name="other_specialized_trafficking_victims_q24">
                </span>
            </div>

            <div id="24_question_view" class="<?= ($q24_checked == '0' || $q24_checked == '2') ? 'visibility' : ''; ?>">
                <table id="addRowQ24" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th rowspan="2">Protection Services</th>
                            <th rowspan="2">Quality</th>
                            <th colspan="6">Quality of Current Coverage</th>
                            <th rowspan="2">Location</th>
                            <th>Action</th>
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
              if (!empty($q24_main_rows) && (is_array($q24_main_rows) || is_object($q24_main_rows))) {
                $i = 0; 
              ?>
                        @foreach($q24_main_rows as $q24)
                        @php
                        $saved_locations = json_decode(json_encode($q24->specialized_trafficking_victims_location_q24 ??
                        ($q24['specialized_trafficking_victims_location_q24'] ?? [])), true);
                        if(!is_array($saved_locations)) { $saved_locations = []; }
                        @endphp
                        <tr class="qe24NoOfRow" id="row_old_<?= $i; ?>">
                            <td>
                                <select name="specialized_trafficking_victims_protection_q24[]"
                                    class="form-control q24Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($protection_Lists as $key => $training)
                                    <option
                                        <?= (isset($q24->specialized_trafficking_victims_protection_q24) && $q24->specialized_trafficking_victims_protection_q24 == $key) || (isset($q24['specialized_trafficking_victims_protection_q24']) && $q24['specialized_trafficking_victims_protection_q24'] == $key) ? 'selected' : ''; ?>
                                        value="{{ $key }}">{{ $training }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="specialized_trafficking_victims_quality_q24[]"
                                    class="form-control q24Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($protection_qualites as $key => $training)
                                    <option
                                        <?= (isset($q24->specialized_trafficking_victims_quality_q24) && $q24->specialized_trafficking_victims_quality_q24 == $key) || (isset($q24['specialized_trafficking_victims_quality_q24']) && $q24['specialized_trafficking_victims_quality_q24'] == $key) ? 'selected' : ''; ?>
                                        value="{{ $key }}">{{ $training }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="number" name="specialized_trafficking_victims_men_q24[]"
                                    class="form-control specialized_trafficking_victims_men_q24"
                                    value="{{ $q24->specialized_trafficking_victims_men_q24 ?? ($q24['specialized_trafficking_victims_men_q24'] ?? 0) }}"
                                    min="0"></td>
                            <td><input type="number" name="specialized_trafficking_victims_women_q24[]"
                                    class="form-control specialized_trafficking_victims_women_q24"
                                    value="{{ $q24->specialized_trafficking_victims_women_q24 ?? ($q24['specialized_trafficking_victims_women_q24'] ?? 0) }}"
                                    min="0"></td>
                            <td><input type="number" name="specialized_trafficking_victims_tg_q24[]"
                                    class="form-control specialized_trafficking_victims_tg_q24"
                                    value="{{ $q24->specialized_trafficking_victims_tg_q24 ?? ($q24['specialized_trafficking_victims_tg_q24'] ?? 0) }}"
                                    min="0"></td>
                            <td><input type="number" name="specialized_trafficking_victims_boy_q24[]"
                                    class="form-control specialized_trafficking_victims_boy_q24"
                                    value="{{ $q24->specialized_trafficking_victims_boy_q24 ?? ($q24['specialized_trafficking_victims_boy_q24'] ?? 0) }}"
                                    min="0"></td>
                            <td><input type="number" name="specialized_trafficking_victims_girl_q24[]"
                                    class="form-control specialized_trafficking_victims_girl_q24"
                                    value="{{ $q24->specialized_trafficking_victims_girl_q24 ?? ($q24['specialized_trafficking_victims_girl_q24'] ?? 0) }}"
                                    min="0"></td>
                            <td><input type="text" name="specialized_trafficking_victims_total_q24[]"
                                    class="form-control specialized_trafficking_victims_total_q24" readonly
                                    value="{{ $q24->specialized_trafficking_victims_total_q24 ?? ($q24['specialized_trafficking_victims_total_q24'] ?? 0) }}">
                            </td>
                            <td>
                                <select name="specialized_trafficking_victims_location_q24[old_<?= $i ?>][]"
                                    class="form-control multiSelect" multiple="multiple">
                                    @include('superadmin.case.helper.location', ['selected_locations' =>
                                    $saved_locations])
                                </select>
                            </td>
                            <td>
                                <?php if ($i < 3) { ?>
                                <?php } else if ($i == 3) { ?>
                                <button type="button" class="btn btn-sm btn-primary addRowDatasq24">+</button>
                                <?php } else { ?>
                                <button type="button" id="old_<?= $i; ?>"
                                    class="btn btn-danger btn_remove cicle">-</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        @endforeach
                        <?php } else { ?>

                        <tr class="qe24NoOfRow" id="row_f1">
                            <td>
                                <select name="specialized_trafficking_victims_protection_q24[]"
                                    class="form-control q24Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($protection_Lists as $key => $training)
                                    <option value="{{ $key }}">{{ $training }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="specialized_trafficking_victims_quality_q24[]"
                                    class="form-control q24Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($protection_qualites as $key => $training)
                                    <option value="{{ $key }}">{{ $training }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="number" name="specialized_trafficking_victims_men_q24[]"
                                    class="form-control specialized_trafficking_victims_men_q24" value="0" min="0"></td>
                            <td><input type="number" name="specialized_trafficking_victims_women_q24[]"
                                    class="form-control specialized_trafficking_victims_women_q24" value="0" min="0">
                            </td>
                            <td><input type="number" name="specialized_trafficking_victims_tg_q24[]"
                                    class="form-control specialized_trafficking_victims_tg_q24" value="0" min="0"></td>
                            <td><input type="number" name="specialized_trafficking_victims_boy_q24[]"
                                    class="form-control specialized_trafficking_victims_boy_q24" value="0" min="0"></td>
                            <td><input type="number" name="specialized_trafficking_victims_girl_q24[]"
                                    class="form-control specialized_trafficking_victims_girl_q24" value="0" min="0">
                            </td>
                            <td><input type="text" name="specialized_trafficking_victims_total_q24[]"
                                    class="form-control specialized_trafficking_victims_total_q24" value="0" readonly>
                            </td>
                            <td>
                                <select name="specialized_trafficking_victims_location_q24[f1][]"
                                    class="form-control multiSelect" multiple="multiple">
                                    @include('superadmin.case.helper.location')
                                </select>
                            </td>
                            <td></td>
                        </tr>

                        <tr class="qe24NoOfRow" id="row_f2">
                            <td>
                                <select name="specialized_trafficking_victims_protection_q24[]"
                                    class="form-control q24Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($protection_Lists as $key => $training)
                                    <option value="{{ $key }}">{{ $training }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="specialized_trafficking_victims_quality_q24[]"
                                    class="form-control q24Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($protection_qualites as $key => $training)
                                    <option value="{{ $key }}">{{ $training }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="number" name="specialized_trafficking_victims_men_q24[]"
                                    class="form-control specialized_trafficking_victims_men_q24" value="0" min="0"></td>
                            <td><input type="number" name="specialized_trafficking_victims_women_q24[]"
                                    class="form-control specialized_trafficking_victims_women_q24" value="0" min="0">
                            </td>
                            <td><input type="number" name="specialized_trafficking_victims_tg_q24[]"
                                    class="form-control specialized_trafficking_victims_tg_q24" value="0" min="0"></td>
                            <td><input type="number" name="specialized_trafficking_victims_boy_q24[]"
                                    class="form-control specialized_trafficking_victims_boy_q24" value="0" min="0"></td>
                            <td><input type="number" name="specialized_trafficking_victims_girl_q24[]"
                                    class="form-control specialized_trafficking_victims_girl_q24" value="0" min="0">
                            </td>
                            <td><input type="text" name="specialized_trafficking_victims_total_q24[]"
                                    class="form-control specialized_trafficking_victims_total_q24" value="0" readonly>
                            </td>
                            <td>
                                <select name="specialized_trafficking_victims_location_q24[f2][]"
                                    class="form-control multiSelect" multiple="multiple">
                                    @include('superadmin.case.helper.location')
                                </select>
                            </td>
                            <td></td>
                        </tr>

                        <tr class="qe24NoOfRow" id="row_f3">
                            <td>
                                <select name="specialized_trafficking_victims_protection_q24[]"
                                    class="form-control q24Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($protection_Lists as $key => $training)
                                    <option value="{{ $key }}">{{ $training }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="specialized_trafficking_victims_quality_q24[]"
                                    class="form-control q24Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($protection_qualites as $key => $training)
                                    <option value="{{ $key }}">{{ $training }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="number" name="specialized_trafficking_victims_men_q24[]"
                                    class="form-control specialized_trafficking_victims_men_q24" value="0" min="0"></td>
                            <td><input type="number" name="specialized_trafficking_victims_women_q24[]"
                                    class="form-control specialized_trafficking_victims_women_q24" value="0" min="0">
                            </td>
                            <td><input type="number" name="specialized_trafficking_victims_tg_q24[]"
                                    class="form-control specialized_trafficking_victims_tg_q24" value="0" min="0"></td>
                            <td><input type="number" name="specialized_trafficking_victims_boy_q24[]"
                                    class="form-control specialized_trafficking_victims_boy_q24" value="0" min="0"></td>
                            <td><input type="number" name="specialized_trafficking_victims_girl_q24[]"
                                    class="form-control specialized_trafficking_victims_girl_q24" value="0" min="0">
                            </td>
                            <td><input type="text" name="specialized_trafficking_victims_total_q24[]"
                                    class="form-control specialized_trafficking_victims_total_q24" value="0" readonly>
                            </td>
                            <td>
                                <select name="specialized_trafficking_victims_location_q24[f3][]"
                                    class="form-control multiSelect" multiple="multiple">
                                    @include('superadmin.case.helper.location')
                                </select>
                            </td>
                            <td></td>
                        </tr>

                        <tr class="qe24NoOfRow" id="row_f4">
                            <td>
                                <select name="specialized_trafficking_victims_protection_q24[]"
                                    class="form-control q24Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($protection_Lists as $key => $training)
                                    <option value="{{ $key }}">{{ $training }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="specialized_trafficking_victims_quality_q24[]"
                                    class="form-control q24Input">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($protection_qualites as $key => $training)
                                    <option value="{{ $key }}">{{ $training }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="number" name="specialized_trafficking_victims_men_q24[]"
                                    class="form-control specialized_trafficking_victims_men_q24" value="0" min="0"></td>
                            <td><input type="number" name="specialized_trafficking_victims_women_q24[]"
                                    class="form-control specialized_trafficking_victims_women_q24" value="0" min="0">
                            </td>
                            <td><input type="number" name="specialized_trafficking_victims_tg_q24[]"
                                    class="form-control specialized_trafficking_victims_tg_q24" value="0" min="0"></td>
                            <td><input type="number" name="specialized_trafficking_victims_boy_q24[]"
                                    class="form-control specialized_trafficking_victims_boy_q24" value="0" min="0"></td>
                            <td><input type="number" name="specialized_trafficking_victims_girl_q24[]"
                                    class="form-control specialized_trafficking_victims_girl_q24" value="0" min="0">
                            </td>
                            <td><input type="text" name="specialized_trafficking_victims_total_q24[]"
                                    class="form-control specialized_trafficking_victims_total_q24" value="0" readonly>
                            </td>
                            <td>
                                <select name="specialized_trafficking_victims_location_q24[f4][]"
                                    class="form-control multiSelect" multiple="multiple">
                                    @include('superadmin.case.helper.location')
                                </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary addRowDatasq24">+</button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <br />
            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question24">Save</button>
            </p>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $(".twentyfourstatus").on("click", function() {
        var statusvalue = $("input[name='is_specialized_trafficking_victims_q24']:checked").val();
        $('.question24').find('.othersText').hide();
        $('.question24').find('#q24others').val("");
        if (statusvalue == '1') {
            $('.question24').find('#24_question_view').show();
            $('.question24').find('span').addClass('othersText');
        } else if (statusvalue == "2") {
            $('.question24').find('#24_question_view').hide();
            $('.question24').find('span').removeClass('othersText').show();
        } else {
            $('.question24').find('#24_question_view').hide();
            $('.question24').find('span').addClass('othersText');
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


    $(document).on('click', '.addRowDatasq24', function() {
        let uniqueId = new Date().getTime();

        let html = `
        <tr class="qe24NoOfRow" id="row_${uniqueId}">
            <td>
                <select name="specialized_trafficking_victims_protection_q24[]" class="form-control q24Input">
                    <option value="" disabled selected>---Choose an item--</option>
                    <?php foreach ($protection_Lists as $key => $training) { ?>
                    <option value="<?= $key ?>"><?= $training ?></option>
                    <?php } ?>
                </select>
            </td>
            <td>
               <select name="specialized_trafficking_victims_quality_q24[]" class="form-control q24Input">
                    <option value="" disabled selected>---Choose an item--</option>
                    <?php foreach ($protection_qualites as $key => $training) { ?>
                    <option value="<?= $key ?>"><?= $training ?></option>
                    <?php } ?>
               </select>
           </td>
            <td><input type="number" name="specialized_trafficking_victims_men_q24[]" class="form-control specialized_trafficking_victims_men_q24" value="0" min="0"></td>
            <td><input type="number" name="specialized_trafficking_victims_women_q24[]" class="form-control specialized_trafficking_victims_women_q24" value="0" min="0"></td>
            <td><input type="number" name="specialized_trafficking_victims_tg_q24[]" class="form-control specialized_trafficking_victims_tg_q24" value="0" min="0"></td>
            <td><input type="number" name="specialized_trafficking_victims_boy_q24[]" class="form-control specialized_trafficking_victims_boy_q24" value="0" min="0"></td>
            <td><input type="number" name="specialized_trafficking_victims_girl_q24[]" class="form-control specialized_trafficking_victims_girl_q24" value="0" min="0"></td>
            <td><input type="text" name="specialized_trafficking_victims_total_q24[]" class="form-control specialized_trafficking_victims_total_q24" value="0" readonly></td>
            <td>
                <select name="specialized_trafficking_victims_location_q24[${uniqueId}][]" class="form-control multiSelect" multiple="multiple">
                     @include('superadmin.case.helper.location')
                </select>
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm btn_remove cicle" id="${uniqueId}">-</button>
            </td>
        </tr>`;

        $('#addRowQ24 tbody').append(html);
        initializeSelect2();
    });


    $(document).on('click', '.btn_remove', function() {
        let button_id = $(this).attr("id");
        $('#row_' + button_id).remove();
    });


    $(document).on('keyup change', '.qe24NoOfRow input[type="number"]', function() {
        let $row = $(this).closest('.qe24NoOfRow');
        let men = parseInt($row.find('.specialized_trafficking_victims_men_q24').val()) || 0;
        let women = parseInt($row.find('.specialized_trafficking_victims_women_q24').val()) || 0;
        let tg = parseInt($row.find('.specialized_trafficking_victims_tg_q24').val()) || 0;
        let boy = parseInt($row.find('.specialized_trafficking_victims_boy_q24').val()) || 0;
        let girl = parseInt($row.find('.specialized_trafficking_victims_girl_q24').val()) || 0;

        let total = men + women + tg + boy + girl;
        $row.find('.specialized_trafficking_victims_total_q24').val(total);
    });


    $(document).on('click', '#temp-save-question24', function(e) {
        e.preventDefault();

        let yes_no_value = $("input[name='is_specialized_trafficking_victims_q24']:checked").val();
        let others_input_val = $("#q24others").val();
        let courtData = [];

        $('.qe24NoOfRow').each(function() {
            let protection = $(this).find(
                "select[name='specialized_trafficking_victims_protection_q24[]']").val();
            let quality = $(this).find(
                "select[name='specialized_trafficking_victims_quality_q24[]']").val();
            let men = $(this).find(".specialized_trafficking_victims_men_q24").val();
            let women = $(this).find(".specialized_trafficking_victims_women_q24").val();
            let tg = $(this).find(".specialized_trafficking_victims_tg_q24").val();
            let boy = $(this).find(".specialized_trafficking_victims_boy_q24").val();
            let girl = $(this).find(".specialized_trafficking_victims_girl_q24").val();
            let total = $(this).find(".specialized_trafficking_victims_total_q24").val();


            let rowId = $(this).attr('id').replace('row_', '');
            let location = $(this).find('.multiSelect').val();

            courtData.push({
                specialized_trafficking_victims_protection_q24: protection,
                specialized_trafficking_victims_quality_q24: quality,
                specialized_trafficking_victims_men_q24: men,
                specialized_trafficking_victims_women_q24: women,
                specialized_trafficking_victims_tg_q24: tg,
                specialized_trafficking_victims_boy_q24: boy,
                specialized_trafficking_victims_girl_q24: girl,
                specialized_trafficking_victims_total_q24: total,
                specialized_trafficking_victims_location_q24: location,
                row_identifier: rowId
            });
        });

        let new_data = {
            q24_data: courtData,
            q24_checked_value: yes_no_value,
            others: others_input_val
        };

        // Ajax কল
        $.ajax({
            url: "/superadmin/case/temp-save-question",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "question_no": "24",
                "question24": new_data
            },
            success: function(response) {
                if (response.success) {
                    $('.question24 .card-title').css('color', 'blue');
                    alert("Question 24  Saved Temporarily ");
                } else {
                    alert("Failed to save data.");
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                alert("Error: Connection failed.");
            }
        });
    });

});
</script>
<?php } ?>