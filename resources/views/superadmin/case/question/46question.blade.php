<?php
if (($questiontitles[45]->status ?? null) == 1) {
  $activities_list = [
    1 => 'Courtyard meeting',
    2 => 'Bazar/hatt meeting',
    3 => 'CTC meeting',
    4 => 'Consultation',
    5 => 'Poster',
    6 => 'leaflet',
    7 => 'Booklet',
    8 => 'SMS',
    9 => 'Newsletter',
    10 => 'Billboard',
    11 => 'Folk show',
    12 => 'Film show',
    13 => 'Miking',
    14 => 'Web campaign',
    15 => 'Other'
  ];

  $session_data = session('question46', []);
  $q46_checked =$session_data['q46_checked_value'] ?? "1";
  $q46_others_val =$session_data['others'] ?? "";
  $q46_main_rows =$session_data['q46_data'] ?? [];
?>

@if(Auth::user()->can('46.question'))

<style>
.othersText {
    display: none;
}

.visibility {
    display: none;
}

#addRowQ46Internal td {
    padding: 4px;
    vertical-align: middle;
}

#addRowQ46Internal input,
#addRowQ46Internal select {
    padding: 2px 5px;
    height: auto;
    text-align: center;
}

.btn-xs {
    padding: 1px 5px;
    font-size: 12px;
    line-height: 1.5;
    border-radius: 3px;
}
</style>

<div class="card question46">
    <div class="card-header" role="tab" id="heading-46">
        <h6 class="card-title" style="color: {{ !empty($q46_main_rows) ? 'blue' : 'green' }}; mb-0">
            <a data-toggle="collapse" href="#Question-46" aria-expanded="false" aria-controls="Question-46">
                46.{{ $questiontitles[45]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-46" class="collapse" role="tabpanel" aria-labelledby="heading-46" data-parent="#accordion-46">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioFortySix1" class="fortysix_status"
                    name="is_government_conduct_awareness_activities_q46" <?= ($q46_checked == '1') ? 'checked' : ''; ?>
                    value="1">
                <label for="radioFortySix1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioFortySix2" class="fortysix_status"
                    name="is_government_conduct_awareness_activities_q46" <?= ($q46_checked == '0') ? 'checked' : ''; ?>
                    value="0">
                <label for="radioFortySix2">No</label>
            </div>

            <div class="icheck-primary input-group mb-3">
                <input type="radio" id="radioFortySix3" class="fortysix_status"
                    name="is_government_conduct_awareness_activities_q46" <?= ($q46_checked == '2') ? 'checked' : ''; ?>
                    value="2">
                <label for="radioFortySix3">Others</label>
                <span class="col-md-6 style-input <?= ($q46_checked == '2') ? '' : 'othersText'; ?>"
                    id="q46_others_spec_wrapper" style="margin-top:-8px; margin-left: 10px;">
                    <input type="text" id="q46others" placeholder="Please describe" class="form-control"
                        value="<?= $q46_others_val; ?>" name="other_government_conduct_awareness_activities_q46">
                </span>
            </div>

            <div id="46_question_view" class="<?= ($q46_checked == '2' || $q46_checked == '0') ? 'visibility' : ''; ?>">
                <div class="card-body table-responsive p-0">
                    <table id="addRowQ46Internal" class="table table-bordered text-center table-sm">
                        <thead>
                            <tr>
                                <th rowspan="2" style="text-align: center; vertical-align: middle; min-width: 180px;">
                                    Types of Activities</th>
                                <th colspan="6">Community (number covered)</th>
                                <th colspan="6">Organization (Number covered)</th>
                                <th colspan="3">Total (number covered)</th>
                                <th rowspan="2" style="text-align: center; vertical-align: middle; min-width: 50px;">
                                    Action</th>
                            </tr>
                            <tr>
                                <th>M</th>
                                <th>W</th>
                                <th>TG</th>
                                <th>B</th>
                                <th>G</th>
                                <th>T</th>
                                <th>GO</th>
                                <th>NGO</th>
                                <th>INGO</th>
                                <th>UN</th>
                                <th>CTC</th>
                                <th>Others</th>
                                <th>M</th>
                                <th>F</th>
                                <th>T</th>
                            </tr>
                        </thead>
                        <tbody id="q46_table_body">

                            <?php
                            if (!empty($q46_main_rows)) {
                                foreach ($q46_main_rows as $index =>$q46A_raw) {
                                    $q46A = (object)$q46A_raw;
                            ?>
                            <tr class="q46Row">
                                <td>
                                    <select name="q46_type_activity[]" class="form-control q46_activity_select">
                                        <option value="" disabled selected>--Select--</option>
                                        <?php foreach ($activities_list as $key =>$act_name) { ?>
                                        <option value="<?= $key ?>"
                                            <?= (($q46A->type_activity ?? '') == $key) ? 'selected' : ''; ?>>
                                            <?= $act_name ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td><input type="number" value="<?= $q46A->comm_m ?? 0 ?>" name="q46_comm_m[]"
                                        class="form-control calculate-total q46_men" min="0"></td>
                                <td><input type="number" value="<?= $q46A->comm_w ?? 0 ?>" name="q46_comm_w[]"
                                        class="form-control calculate-total q46_women" min="0"></td>
                                <td><input type="number" value="<?= $q46A->comm_tg ?? 0 ?>" name="q46_comm_tg[]"
                                        class="form-control calculate-total q46_third_gender" min="0"></td>
                                <td><input type="number" value="<?= $q46A->comm_b ?? 0 ?>" name="q46_comm_b[]"
                                        class="form-control calculate-total q46_boys" min="0"></td>
                                <td><input type="number" value="<?= $q46A->comm_g ?? 0 ?>" name="q46_comm_g[]"
                                        class="form-control calculate-total q46_girls" min="0"></td>
                                <td><input type="text" value="<?= $q46A->comm_t ?? 0 ?>" name="q46_comm_t[]"
                                        class="form-control q46_comm_total" readonly></td>

                                <td><input type="number" value="<?= $q46A->org_go ?? 0 ?>" name="q46_org_go[]"
                                        class="form-control" min="0"></td>
                                <td><input type="number" value="<?= $q46A->org_ngo ?? 0 ?>" name="q46_org_ngo[]"
                                        class="form-control" min="0"></td>
                                <td><input type="number" value="<?= $q46A->org_ingo ?? 0 ?>" name="q46_org_ingo[]"
                                        class="form-control" min="0"></td>
                                <td><input type="number" value="<?= $q46A->org_un ?? 0 ?>" name="q46_org_un[]"
                                        class="form-control" min="0"></td>
                                <td><input type="number" value="<?= $q46A->org_ctc ?? 0 ?>" name="q46_org_ctc[]"
                                        class="form-control" min="0"></td>
                                <td><input type="number" value="<?= $q46A->org_others ?? 0 ?>" name="q46_org_others[]"
                                        class="form-control" min="0"></td>

                                <td><input type="number" value="<?= $q46A->total_m ?? 0 ?>" name="q46_total_m[]"
                                        class="form-control q46_total_m" min="0"></td>
                                <td><input type="number" value="<?= $q46A->total_f ?? 0 ?>" name="q46_total_f[]"
                                        class="form-control q46_total_f" min="0"></td>
                                <td><input type="text" value="<?= $q46A->total_t ?? 0 ?>" name="q46_total_t[]"
                                        class="form-control q46_total" readonly></td>

                                <td>
                                    <?php if ($index === 0) { ?>
                                    <button type="button" id="add_more_q46_btn" class="btn btn-sm btn-primary btn-xs"><i
                                            class="fa fa-plus"></i></button>
                                    <?php } else { ?>
                                    <button type="button" class="btn btn-sm btn-danger remove-q46-row btn-xs">✖</button>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php 
                                }
                            } else { 
                            ?>
                            <!-- First Initial Fixed Row -->
                            <tr class="q46Row">
                                <td>
                                    <select name="q46_type_activity[]" class="form-control q46_activity_select">
                                        <option value="" disabled selected>--Select--</option>
                                        <?php foreach ($activities_list as $key =>$item) { ?>
                                        <option value="<?= $key ?>"><?= $item ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td><input type="number" name="q46_comm_m[]"
                                        class="form-control calculate-total q46_men" value="0" min="0"></td>
                                <td><input type="number" name="q46_comm_w[]"
                                        class="form-control calculate-total q46_women" value="0" min="0"></td>
                                <td><input type="number" name="q46_comm_tg[]"
                                        class="form-control calculate-total q46_third_gender" value="0" min="0"></td>
                                <td><input type="number" name="q46_comm_b[]"
                                        class="form-control calculate-total q46_boys" value="0" min="0"></td>
                                <td><input type="number" name="q46_comm_g[]"
                                        class="form-control calculate-total q46_girls" value="0" min="0"></td>
                                <td><input type="text" name="q46_comm_t[]" class="form-control q46_comm_total" value="0"
                                        readonly></td>

                                <td><input type="number" name="q46_org_go[]" class="form-control" value="0" min="0">
                                </td>
                                <td><input type="number" name="q46_org_ngo[]" class="form-control" value="0" min="0">
                                </td>
                                <td><input type="number" name="q46_org_ingo[]" class="form-control" value="0" min="0">
                                </td>
                                <td><input type="number" name="q46_org_un[]" class="form-control" value="0" min="0">
                                </td>
                                <td><input type="number" name="q46_org_ctc[]" class="form-control" value="0" min="0">
                                </td>
                                <td><input type="number" name="q46_org_others[]" class="form-control" value="0" min="0">
                                </td>

                                <td><input type="number" name="q46_total_m[]" class="form-control q46_total_m" value="0"
                                        min="0"></td>
                                <td><input type="number" name="q46_total_f[]" class="form-control q46_total_f" value="0"
                                        min="0"></td>
                                <td><input type="text" name="q46_total_t[]" class="form-control q46_total" value="0"
                                        readonly></td>

                                <td>
                                    <button type="button" id="add_more_q46_btn" class="btn btn-sm btn-primary btn-xs"><i
                                            class="fa fa-plus"></i></button>
                                </td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>

                <div class="row mt-3">
                    <div class="col-12 text-right">
                        <button type="button" id="temp-save-question46" class="btn btn-success px-4">
                            Save
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endif

<?php } ?>

<script>
$(document).ready(function() {
    $('.fortysix_status').change(function() {
        var value = $(this).val();
        if (value == '1') {
            $('#46_question_view').removeClass('visibility').show();
            $('#q46_others_spec_wrapper').addClass('othersText').hide();
            $('#q46others').val("");
        } else if (value == '0') {
            $('#46_question_view').addClass('visibility').hide();
            $('#q46_others_spec_wrapper').addClass('othersText').hide();
            $('#q46others').val("");
        } else if (value == '2') {
            $('#46_question_view').addClass('visibility').hide();
            $('#q46_others_spec_wrapper').removeClass('othersText').show();
        }
    });

    // Add Row Event
    $(document).on('click', '#add_more_q46_btn', function() {
        var optionsHtml = '<option value="" disabled selected>--Select--</option>';
        <?php foreach ($activities_list as $key =>$item) { ?>
        optionsHtml += '<option value="<?= $key ?>"><?= addslashes($item) ?></option>';
        <?php } ?>

        var html = `<tr class="q46Row generated-row">
            <td>
                <select name="q46_type_activity[]" class="form-control q46_activity_select">
                    ${optionsHtml}
                </select>
            </td>
            <td><input type="number" name="q46_comm_m[]" class="form-control calculate-total q46_men" value="0" min="0"></td>
            <td><input type="number" name="q46_comm_w[]" class="form-control calculate-total q46_women" value="0" min="0"></td>
            <td><input type="number" name="q46_comm_tg[]" class="form-control calculate-total q46_third_gender" value="0" min="0"></td>
            <td><input type="number" name="q46_comm_b[]" class="form-control calculate-total q46_boys" value="0" min="0"></td>
            <td><input type="number" name="q46_comm_g[]" class="form-control calculate-total q46_girls" value="0" min="0"></td>
            <td><input type="text" name="q46_comm_t[]" class="form-control q46_comm_total" value="0" readonly></td>
            <td><input type="number" name="q46_org_go[]" class="form-control" value="0" min="0"></td>
            <td><input type="number" name="q46_org_ngo[]" class="form-control" value="0" min="0"></td>
            <td><input type="number" name="q46_org_ingo[]" class="form-control" value="0" min="0"></td>
            <td><input type="number" name="q46_org_un[]" class="form-control" value="0" min="0"></td>
            <td><input type="number" name="q46_org_ctc[]" class="form-control" value="0" min="0"></td>
            <td><input type="number" name="q46_org_others[]" class="form-control" value="0" min="0"></td>
            <td><input type="number" name="q46_total_m[]" class="form-control q46_total_m" value="0" min="0"></td>
            <td><input type="number" name="q46_total_f[]" class="form-control q46_total_f" value="0" min="0"></td>
            <td><input type="text" name="q46_total_t[]" class="form-control q46_total" value="0" readonly></td>
            <td><button type="button" class="btn btn-sm btn-danger remove-q46-row btn-xs">✖</button></td>
        </tr>`;

        $('#q46_table_body').append(html);
    });

    // Remove Row Event
    $(document).on('click', '.remove-q46-row', function() {
        if (confirm("Are you sure to remove this row?")) {
            $(this).closest('tr').remove();
        }
    });

    // Calculation Script
    $(document).on('input keyup change', '.calculate-total, .q46_total_m, .q46_total_f', function() {
        var row = $(this).closest('tr');

        var men = parseInt(row.find('.q46_men').val()) || 0;
        var women = parseInt(row.find('.calculate-total.q46_women').val()) || 0;
        var third_gender = parseInt(row.find('.q46_third_gender').val()) || 0;
        var boys = parseInt(row.find('.q46_boys').val()) || 0;
        var girls = parseInt(row.find('.q46_girls').val()) || 0;

        var comm_total = men + women + third_gender + boys + girls;
        row.find('.q46_comm_total').val(comm_total);

        var total_m = parseInt(row.find('.q46_total_m').val()) || 0;
        var total_f = parseInt(row.find('.q46_total_f').val()) || 0;
        row.find('.q46_total').val(total_m + total_f);
    });

    // Temp Save AJAX Script
    $('#temp-save-question46').click(function(e) {
        e.preventDefault();

        let checked_value = $("input[name='is_government_conduct_awareness_activities_q46']:checked")
            .val() || "1";
        let others_val = $("#q46others").val() || "";
        let activityDataSet = [];

        $('.q46Row').each(function() {
            let type_act = $(this).find("select[name='q46_type_activity[]']").val() || "";
            if (type_act !== "") {
                activityDataSet.push({
                    type_activity: type_act,
                    comm_m: $(this).find('.q46_men').val() || 0,
                    comm_w: $(this).find('.calculate-total.q46_women').val() || 0,
                    comm_tg: $(this).find('.q46_third_gender').val() || 0,
                    comm_b: $(this).find('.q46_boys').val() || 0,
                    comm_g: $(this).find('.q46_girls').val() || 0,
                    comm_t: $(this).find('.q46_comm_total').val() || 0,

                    org_go: $(this).find('input[name^="q46_org_go"]').val() || 0,
                    org_ngo: $(this).find('input[name^="q46_org_ngo"]').val() || 0,
                    org_ingo: $(this).find('input[name^="q46_org_ingo"]').val() || 0,
                    org_un: $(this).find('input[name^="q46_org_un"]').val() || 0,
                    org_ctc: $(this).find('input[name^="q46_org_ctc"]').val() || 0,
                    org_others: $(this).find('input[name^="q46_org_others"]').val() ||
                        0,

                    total_m: $(this).find('.q46_total_m').val() || 0,
                    total_f: $(this).find('.q46_total_f').val() || 0,
                    total_t: $(this).find('.q46_total').val() || 0
                });
            }
        });

        let sendData = {
            _token: "{{ csrf_token() }}",
            question_no: "46",
            question46: {
                q46_checked_value: checked_value,
                others: others_val,
                q46_data: activityDataSet
            }
        };

        $.ajax({
            url: "/superadmin/case/temp-save-question",
            method: "POST",
            data: sendData,
            success: function(response) {
                if (response.success) {
                    $('.question46 .card-title').css('color', 'blue');
                    alert('Question 46 Temp Saved');
                } else {
                    alert('Failed to save data.');
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                alert('System Sync Error.');
            }
        });
    });

});
</script>