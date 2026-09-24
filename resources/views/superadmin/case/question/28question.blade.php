<?php
if (($questiontitles[27]->status ?? null) == 1) {
    $question_28_data = session()->get('question28');
    $q28_checked =$question_28_data['q28_checked_value'] ?? "1"; 
    $q28_saved_blocks =$question_28_data['q28_table_data'] ?? [];

    $districts = DB::table('districs')->pluck('name', 'id')->toArray();

    $facility_types = [
        1 => "Shelter",
        2 => "Development Center",
        3 => "Other (Specify)",
        4 => "Other (Specify)"
    ];

    $quality_options = ["Excellent", "As per Standard", "Below Standard"];
?>
<style>
.visibility {
    display: none !important;
}

.table-bordered th,
.table-bordered td {
    vertical-align: middle !important;
}
</style>

<div class="card question28">
    <div class="card-header" role="tab" id="heading-28">
        <h6 class="card-title" style="color: {{ !empty($question_28_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-28" aria-expanded="false" aria-controls="collapse-28">
                28. {{ $questiontitles[27]->title ?? 'Child Care Facilities Status' }}
            </a>
        </h6>
    </div>

    <div id="Question-28" class="collapse" role="tabpanel" aria-labelledby="heading-28" data-parent="#accordion-2">
        <div class="card-body">

            <!-- Radio Options -->
            <div class="icheck-primary">
                <input type="radio" id="radioTwentyEight1" class="twentyeightstatus" name="is_child_care_facilities_q28"
                    value="1" {{ (string)$q28_checked === "1" ? "checked" : "" }}>
                <label for="radioTwentyEight1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioTwentyEight2" class="twentyeightstatus" name="is_child_care_facilities_q28"
                    value="0" {{ (string)$q28_checked === "0" ? "checked" : "" }}>
                <label for="radioTwentyEight2">No</label>
            </div>

            <!-- Table View Section -->
            <div id="28_question_view" class="{{ (string)$q28_checked === '0' ? 'visibility' : '' }}">
                <div class="table-responsive">
                    <table id="tableQ28" class="table table-bordered text-center align-middle">
                        <thead>
                            <tr>
                                <th rowspan="2">Location (District)</th>
                                <th rowspan="2">Type of Facility</th>
                                <th rowspan="2">Number of Facility</th>
                                <th colspan="3">Number of Children</th>
                                <th colspan="3">Status of Coverage</th>
                                <th rowspan="2">Quality of Care</th>
                                <th rowspan="2" style="width: 50px;">Add row</th>
                            </tr>
                            <tr>
                                <th>Boy</th>
                                <th>Girl</th>
                                <th>Total</th>
                                <th>Boy</th>
                                <th>Girl</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="q28_table_body">
                            <?php 
                            if (!empty($q28_saved_blocks)) {
                                foreach($q28_saved_blocks as $b_index =>$block) {
                                    $is_fixed = ($b_index == 0);
                                    $total_districts_in_block =$is_fixed ? 1 : 4;
                                    $total_rows_span =$total_districts_in_block * 4;

                                    for ($d_index = 1; $d_index <=$total_districts_in_block; $d_index++) {$district_val = $block['districts'][$d_index]['district'] ?? '';
                                        foreach($facility_types as $f_key =>$f_name) { 
                                            $row_data =$block['districts'][$d_index]['facilities'][$f_key] ?? [];
                            ?>
                            <tr class="q28_row_group block_<?= $b_index ?>" data-block="<?= $b_index ?>">
                                <?php if($f_key == 1) { ?>
                                <td rowspan="4" class="align-middle">
                                    <select name="q28_data[<?= $b_index ?>][districts][<?= $d_index ?>][district]"
                                        class="form-control q28_district">
                                        <option value="" disabled selected>Choose an item.</option>
                                        <?php foreach ($districts as $d_id =>$d_name) { ?>
                                        <option value="<?= $d_id ?>" <?= ($district_val == $d_id) ? 'selected' : '' ?>>
                                            <?=$d_name ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <?php } ?>

                                <td>
                                    <?php if($f_key > 2) { ?>
                                    <input type="text"
                                        name="q28_data[<?= $b_index ?>][districts][<?= $d_index ?>][facilities][<?= $f_key ?>][facility_type_other]"
                                        class="form-control" placeholder="Other (Specify)"
                                        value="<?= $row_data['facility_type_other'] ?? '' ?>">
                                    <?php } else { ?>
                                    <?= $f_name ?>
                                    <input type="hidden"
                                        name="q28_data[<?= $b_index ?>][districts][<?= $d_index ?>][facilities][<?= $f_key ?>][facility_type]"
                                        value="<?= $f_name ?>">
                                    <?php } ?>
                                </td>
                                <td><input type="number" min="0"
                                        name="q28_data[<?= $b_index ?>][districts][<?= $d_index ?>][facilities][<?= $f_key ?>][num_facility]"
                                        class="form-control" value="<?= $row_data['num_facility'] ?? '' ?>"></td>

                                <!-- Number of Children -->
                                <td><input type="number" min="0"
                                        name="q28_data[<?= $b_index ?>][districts][<?= $d_index ?>][facilities][<?= $f_key ?>][children_boy]"
                                        class="form-control q28_boy" value="<?= $row_data['children_boy'] ?? '' ?>">
                                </td>
                                <td><input type="number" min="0"
                                        name="q28_data[<?= $b_index ?>][districts][<?= $d_index ?>][facilities][<?= $f_key ?>][children_girl]"
                                        class="form-control q28_girl" value="<?= $row_data['children_girl'] ?? '' ?>">
                                </td>
                                <td><input type="number" readonly
                                        name="q28_data[<?= $b_index ?>][districts][<?= $d_index ?>][facilities][<?= $f_key ?>][children_total]"
                                        class="form-control q28_total" value="<?= $row_data['children_total'] ?? '' ?>">
                                </td>

                                <!-- Status of Coverage -->
                                <td><input type="number" min="0"
                                        name="q28_data[<?= $b_index ?>][districts][<?= $d_index ?>][facilities][<?= $f_key ?>][coverage_boy]"
                                        class="form-control q28_cov_boy" value="<?= $row_data['coverage_boy'] ?? '' ?>">
                                </td>
                                <td><input type="number" min="0"
                                        name="q28_data[<?= $b_index ?>][districts][<?= $d_index ?>][facilities][<?= $f_key ?>][coverage_girl]"
                                        class="form-control q28_cov_girl"
                                        value="<?= $row_data['coverage_girl'] ?? '' ?>"></td>
                                <td><input type="number" readonly
                                        name="q28_data[<?= $b_index ?>][districts][<?= $d_index ?>][facilities][<?= $f_key ?>][coverage_total]"
                                        class="form-control q28_cov_total"
                                        value="<?= $row_data['coverage_total'] ?? '' ?>"></td>

                                <!-- Quality of Care -->
                                <td>
                                    <select
                                        name="q28_data[<?= $b_index ?>][districts][<?= $d_index ?>][facilities][<?= $f_key ?>][quality]"
                                        class="form-control">
                                        <option value="">Choose an item.</option>
                                        <?php foreach($quality_options as$opt) { ?>
                                        <option value="<?= $opt ?>"
                                            <?= (($row_data['quality'] ?? '') == $opt) ? 'selected' : '' ?>><?=$opt ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </td>

                                <?php if($d_index == 1 &&$f_key == 1) { ?>
                                <td rowspan="<?= $total_rows_span ?>" class="align-middle">
                                    <?php if(!$is_fixed) { ?>
                                    <button type="button" class="btn btn-sm btn-danger removeBlockQ28"
                                        data-block="block_<?= $b_index ?>">-</button>
                                    <?php } ?>
                                </td>
                                <?php } ?>
                            </tr>
                            <?php 
                                        }
                                    }
                                }
                            } else {
                                // Default Initial Fixed District Block (1 District = 4 Rows)
                                foreach($facility_types as $f_key =>$f_name) {
                            ?>
                            <tr class="q28_row_group block_0" data-block="0">
                                <?php if($f_key == 1) { ?>
                                <td rowspan="4" class="align-middle">
                                    <select name="q28_data[0][districts][1][district]"
                                        class="form-control q28_district">
                                        <option value="" disabled selected>Choose an item.</option>
                                        <?php foreach ($districts as $d_id =>$d_name) { ?>
                                        <option value="<?= $d_id ?>"><?= $d_name ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <?php } ?>

                                <td>
                                    <?php if($f_key > 2) { ?>
                                    <input type="text"
                                        name="q28_data[0][districts][1][facilities][<?= $f_key ?>][facility_type_other]"
                                        class="form-control" placeholder="Other (Specify)">
                                    <?php } else { ?>
                                    <?= $f_name ?>
                                    <input type="hidden"
                                        name="q28_data[0][districts][1][facilities][<?= $f_key ?>][facility_type]"
                                        value="<?= $f_name ?>">
                                    <?php } ?>
                                </td>
                                <td><input type="number" min="0"
                                        name="q28_data[0][districts][1][facilities][<?= $f_key ?>][num_facility]"
                                        class="form-control"></td>

                                <td><input type="number" min="0"
                                        name="q28_data[0][districts][1][facilities][<?= $f_key ?>][children_boy]"
                                        class="form-control q28_boy"></td>
                                <td><input type="number" min="0"
                                        name="q28_data[0][districts][1][facilities][<?= $f_key ?>][children_girl]"
                                        class="form-control q28_girl"></td>
                                <td><input type="number" readonly
                                        name="q28_data[0][districts][1][facilities][<?= $f_key ?>][children_total]"
                                        class="form-control q28_total"></td>

                                <td><input type="number" min="0"
                                        name="q28_data[0][districts][1][facilities][<?= $f_key ?>][coverage_boy]"
                                        class="form-control q28_cov_boy"></td>
                                <td><input type="number" min="0"
                                        name="q28_data[0][districts][1][facilities][<?= $f_key ?>][coverage_girl]"
                                        class="form-control q28_cov_girl"></td>
                                <td><input type="number" readonly
                                        name="q28_data[0][districts][1][facilities][<?= $f_key ?>][coverage_total]"
                                        class="form-control q28_cov_total"></td>

                                <td>
                                    <select name="q28_data[0][districts][1][facilities][<?= $f_key ?>][quality]"
                                        class="form-control">
                                        <option value="">Choose an item.</option>
                                        <?php foreach($quality_options as$opt) { ?>
                                        <option value="<?= $opt ?>"><?= $opt ?></option>
                                        <?php } ?>
                                    </select>
                                </td>

                                <?php if($f_key == 1) { ?>
                                <td rowspan="4" class="align-middle">
                                    <!-- Fixed initial block, no remove button -->
                                </td>
                                <?php } ?>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="11" class="text-left bg-light">
                                    <button type="button" class="btn btn-sm btn-primary" id="addBlockQ28">
                                        <i class="fa fa-plus"></i> Add row
                                    </button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <br />
            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question28">Save</button>
            </p>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    let blockIndex = 1;
    $('.q28_row_group').each(function() {
        let b = $(this).data('block');
        if (b !== undefined && parseInt(b) >= blockIndex) {
            blockIndex = parseInt(b) + 1;
        }
    });

    // Toggle Table View
    $(".twentyeightstatus").on("change", function() {
        var statusvalue = $("input[name='is_child_care_facilities_q28']:checked").val();
        if (statusvalue == '1') {
            $('#28_question_view').removeClass('visibility').show();
        } else {
            $('#28_question_view').addClass('visibility').hide();
        }
    });

    // Auto Calculate Total Children
    $(document).on('input', '.q28_boy, .q28_girl', function() {
        let tr = $(this).closest('tr');
        let boy = parseInt(tr.find('.q28_boy').val()) || 0;
        let girl = parseInt(tr.find('.q28_girl').val()) || 0;
        tr.find('.q28_total').val(boy + girl);
    });

    // Auto Calculate Total Coverage
    $(document).on('input', '.q28_cov_boy, .q28_cov_girl', function() {
        let tr = $(this).closest('tr');
        let boy = parseInt(tr.find('.q28_cov_boy').val()) || 0;
        let girl = parseInt(tr.find('.q28_cov_girl').val()) || 0;
        tr.find('.q28_cov_total').val(boy + girl);
    });

    // Add 4-District Block (Bottom button click)
    $(document).on('click', '#addBlockQ28', function() {
        let districtOptions = `<option value="" disabled selected>Choose an item.</option>`;
        <?php foreach ($districts as $d_id =>$d_name) { ?>
        districtOptions += `<option value="<?= $d_id ?>"><?= addslashes($d_name) ?></option>`;
        <?php } ?>

        let qualityOptions =
            `<option value="">Choose an item.</option><option value="Excellent">Excellent</option><option value="As per Standard">As per Standard</option><option value="Below Standard">Below Standard</option>`;

        let blockHtml = '';

        for (let d = 1; d <= 4; d++) {
            blockHtml += `
                <tr class="q28_row_group block_${blockIndex}" data-block="${blockIndex}">
                    <td rowspan="4" class="align-middle">
                        <select name="q28_data[${blockIndex}][districts][${d}][district]" class="form-control q28_district">
                            ${districtOptions}
                        </select>
                    </td>
                    <td>Shelter<input type="hidden" name="q28_data[${blockIndex}][districts][${d}][facilities][1][facility_type]" value="Shelter"></td>
                    <td><input type="number" min="0" name="q28_data[${blockIndex}][districts][${d}][facilities][1][num_facility]" class="form-control"></td>
                    <td><input type="number" min="0" name="q28_data[${blockIndex}][districts][${d}][facilities][1][children_boy]" class="form-control q28_boy"></td>
                    <td><input type="number" min="0" name="q28_data[${blockIndex}][districts][${d}][facilities][1][children_girl]" class="form-control q28_girl"></td>
                    <td><input type="number" readonly name="q28_data[${blockIndex}][districts][${d}][facilities][1][children_total]" class="form-control q28_total"></td>
                    <td><input type="number" min="0" name="q28_data[${blockIndex}][districts][${d}][facilities][1][coverage_boy]" class="form-control q28_cov_boy"></td>
                    <td><input type="number" min="0" name="q28_data[${blockIndex}][districts][${d}][facilities][1][coverage_girl]" class="form-control q28_cov_girl"></td>
                    <td><input type="number" readonly name="q28_data[${blockIndex}][districts][${d}][facilities][1][coverage_total]" class="form-control q28_cov_total"></td>
                    <td><select name="q28_data[${blockIndex}][districts][${d}][facilities][1][quality]" class="form-control">${qualityOptions}</select></td>
                    ${d === 1 ? `<td rowspan="16" class="align-middle"><button type="button" class="btn btn-sm btn-danger removeBlockQ28" data-block="block_${blockIndex}">-</button></td>` : ''}
                </tr>
                <tr class="q28_row_group block_${blockIndex}" data-block="${blockIndex}">
                    <td>Development Center<input type="hidden" name="q28_data[${blockIndex}][districts][${d}][facilities][2][facility_type]" value="Development Center"></td>
                    <td><input type="number" min="0" name="q28_data[${blockIndex}][districts][${d}][facilities][2][num_facility]" class="form-control"></td>
                    <td><input type="number" min="0" name="q28_data[${blockIndex}][districts][${d}][facilities][2][children_boy]" class="form-control q28_boy"></td>
                    <td><input type="number" min="0" name="q28_data[${blockIndex}][districts][${d}][facilities][2][children_girl]" class="form-control q28_girl"></td>
                    <td><input type="number" readonly name="q28_data[${blockIndex}][districts][${d}][facilities][2][children_total]" class="form-control q28_total"></td>
                    <td><input type="number" min="0" name="q28_data[${blockIndex}][districts][${d}][facilities][2][coverage_boy]" class="form-control q28_cov_boy"></td>
                    <td><input type="number" min="0" name="q28_data[${blockIndex}][districts][${d}][facilities][2][coverage_girl]" class="form-control q28_cov_girl"></td>
                    <td><input type="number" readonly name="q28_data[${blockIndex}][districts][${d}][facilities][2][coverage_total]" class="form-control q28_cov_total"></td>
                    <td><select name="q28_data[${blockIndex}][districts][${d}][facilities][2][quality]" class="form-control">${qualityOptions}</select></td>
                </tr>
                <tr class="q28_row_group block_${blockIndex}" data-block="${blockIndex}">
                    <td><input type="text" name="q28_data[${blockIndex}][districts][${d}][facilities][3][facility_type_other]" class="form-control" placeholder="Other (Specify)"></td>
                    <td><input type="number" min="0" name="q28_data[${blockIndex}][districts][${d}][facilities][3][num_facility]" class="form-control"></td>
                    <td><input type="number" min="0" name="q28_data[${blockIndex}][districts][${d}][facilities][3][children_boy]" class="form-control q28_boy"></td>
                    <td><input type="number" min="0" name="q28_data[${blockIndex}][districts][${d}][facilities][3][children_girl]" class="form-control q28_girl"></td>
                    <td><input type="number" readonly name="q28_data[${blockIndex}][districts][${d}][facilities][3][children_total]" class="form-control q28_total"></td>
                    <td><input type="number" min="0" name="q28_data[${blockIndex}][districts][${d}][facilities][3][coverage_boy]" class="form-control q28_cov_boy"></td>
                    <td><input type="number" min="0" name="q28_data[${blockIndex}][districts][${d}][facilities][3][coverage_girl]" class="form-control q28_cov_girl"></td>
                    <td><input type="number" readonly name="q28_data[${blockIndex}][districts][${d}][facilities][3][coverage_total]" class="form-control q28_cov_total"></td>
                    <td><select name="q28_data[${blockIndex}][districts][${d}][facilities][3][quality]" class="form-control">${qualityOptions}</select></td>
                </tr>
                <tr class="q28_row_group block_${blockIndex}" data-block="${blockIndex}">
                    <td><input type="text" name="q28_data[${blockIndex}][districts][${d}][facilities][4][facility_type_other]" class="form-control" placeholder="Other (Specify)"></td>
                    <td><input type="number" min="0" name="q28_data[${blockIndex}][districts][${d}][facilities][4][num_facility]" class="form-control"></td>
                    <td><input type="number" min="0" name="q28_data[${blockIndex}][districts][${d}][facilities][4][children_boy]" class="form-control q28_boy"></td>
                    <td><input type="number" min="0" name="q28_data[${blockIndex}][districts][${d}][facilities][4][children_girl]" class="form-control q28_girl"></td>
                    <td><input type="number" readonly name="q28_data[${blockIndex}][districts][${d}][facilities][4][children_total]" class="form-control q28_total"></td>
                    <td><input type="number" min="0" name="q28_data[${blockIndex}][districts][${d}][facilities][4][coverage_boy]" class="form-control q28_cov_boy"></td>
                    <td><input type="number" min="0" name="q28_data[${blockIndex}][districts][${d}][facilities][4][coverage_girl]" class="form-control q28_cov_girl"></td>
                    <td><input type="number" readonly name="q28_data[${blockIndex}][districts][${d}][facilities][4][coverage_total]" class="form-control q28_cov_total"></td>
                    <td><select name="q28_data[${blockIndex}][districts][${d}][facilities][4][quality]" class="form-control">${qualityOptions}</select></td>
                </tr>
            `;
        }

        $('#q28_table_body').append(blockHtml);
        blockIndex++;
    });

    // Dynamic Block Remove Functionality
    $(document).on('click', '.removeBlockQ28', function() {
        let blockClass = $(this).attr('data-block');
        $('.' + blockClass).remove();
    });

    // Save AJAX Functionality
    $(document).on('click', '#temp-save-question28', function() {
        let yes_no_value = $("input[name='is_child_care_facilities_q28']:checked").val() || "0";
        let formData = new FormData();
        formData.append("_token", "{{ csrf_token() }}");
        formData.append("question_no", "28");
        formData.append("is_child_care_facilities_q28", yes_no_value);
        formData.append("question28[q28_checked_value]", yes_no_value);

        let serializedData = $('#28_question_view input, #28_question_view select').serializeArray();
        $.each(serializedData, function(i, field) {
            formData.append(`question28[${field.name}]`, field.value);
        });

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('.question28 .card-title').css('color', 'blue');
                alert("Question 28 Saved Successfully!");
            },
            error: function(err) {
                alert("Error saving Question 28");
                console.log(err);
            }
        });
    });
});
</script>
<?php } ?>