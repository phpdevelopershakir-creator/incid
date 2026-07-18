<?php
if (($questiontitles[46]->status ?? null) == 1) {
   
    $question_47_data = session()->get('question47');

    $q47_checked = $question_47_data['q47_checked_value'] ?? "1";
    $q47_saved_rows = $question_47_data['q47_table_data'] ?? [];
    $q47_others_val = $question_47_data['others'] ?? '';

    $status_Lists = [
        1 => "Firmly implemented enforced",
        2 => "Reformed",
        3 => "Planned",
        4 => "Drafted",
        5 => "Updated",
        6 => "Partially enforced",
        7 => "Expanded us"
    ];

   
    $static_titles = [
        1 => "OEMA 2013",
        2 => "Employee-paid-model",
        3 => "Employer-paid-model",
        4 => "Fair recruitment cost notification",
        5 => "Ranking of Recruiting Agents",
        6 => "Licensing of Recruiting Agents",
        7 => "Registration of Informal Recruiting Agents",
        8 => "Zero Migration Cost Approach"
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

<div class="card question47">
    <div class="card-header" role="tab" id="heading-47">
        <h6 class="card-title" style="color: {{ !empty($question_47_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-47" aria-expanded="false" aria-controls="collapse-47">
                47. {{ $questiontitles[46]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-47" class="collapse" role="tabpanel" aria-labelledby="heading-47" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioFiftySeven1" class="fiftysevenstatus"
                    name="is_government_change_regulated_q47" value="1" {{ $q47_checked == "1" ? "checked" : "" }}>
                <label for="radioFiftySeven1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioFiftySeven2" class="fiftysevenstatus"
                    name="is_government_change_regulated_q47" value="0" {{ $q47_checked == "0" ? "checked" : "" }}>
                <label for="radioFiftySeven2">No</label>
            </div>

            <div class="icheck-primary input-group">
                <input type="radio" id="radioFiftySeven3" class="fiftysevenstatus"
                    name="is_government_change_regulated_q47" value="2" {{ $q47_checked == "2" ? "checked" : "" }}>
                <label for="radioFiftySeven3">Others</label>

                <span class="col-md-6 mt--4 q47_others_container {{ $q47_checked == '2' ? '' : 'othersText' }}">
                    <input type="text" id="q52others" placeholder="Others" class="form-control"
                        value="{{ $q47_others_val }}" name="other_government_change_regulated_q47">
                </span>
            </div>

            <div id="47_question_view" class="{{ ($q47_checked == '0' || $q47_checked == '2') ? 'visibility' : '' }}">
                <table id="addRowQ47" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Original Document/Approach</th>
                            <th>Description of Change</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
              
              if (!empty($q47_saved_rows)) {
                $rowIndex = 0;
                foreach($q47_saved_rows as $row) { 
                  $is_static = is_numeric($row['title_val']);
                  $title_text = $is_static ? ($static_titles[$row['title_val']] ?? '') : $row['title_val'];
                ?>
                        <tr class="qe47NoOfRow" id="row_q47_<?= $rowIndex ?>">
                            <td>
                                <?php if($is_static) { ?>
                                <p class="mb-0"><b><?= $title_text ?></b></p>
                                <input type="hidden" name="government_change_regulated_title_q47[]"
                                    value="<?= $row['title_val'] ?>" class="q47_title_input">
                                <?php } else { ?>
                                <input type="text" name="government_change_regulated_title_q47[]"
                                    value="<?= $row['title_val'] ?>" class="form-control q47_title_input"
                                    placeholder="Others Specific">
                                <?php } ?>
                            </td>
                            <td>
                                <select name="government_change_regulated_status_q47[]"
                                    class="form-control q47_status_select">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($status_Lists as $key => $training)
                                    <option value="{{ $key }}" <?= ($row['status_val'] == $key) ? 'selected' : '' ?>>
                                        {{ $training }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <?php if($is_static) { ?>
                                <span class="text-muted">-</span>
                                <?php } else { ?>
                                <button type="button" class="btn btn-danger btn_remove_q47"
                                    data-id="<?= $rowIndex ?>">-</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php 
                  $rowIndex++;
                } 
              } else { 
                
                foreach($static_titles as $key => $title) { ?>
                        <tr class="qe47NoOfRow">
                            <td>
                                <p class="mb-0"><b><?= $title ?></b></p>
                                <input type="hidden" name="government_change_regulated_title_q47[]" value="<?= $key ?>"
                                    class="q47_title_input">
                            </td>
                            <td>
                                <select name="government_change_regulated_status_q47[]"
                                    class="form-control q47_status_select">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($status_Lists as $keyList => $training)
                                    <option value="{{ $keyList }}">{{ $training }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><span class="text-muted">-</span></td>
                        </tr>
                        <?php } ?>

                        <tr class="qe47NoOfRow" id="row_q47_first_dynamic">
                            <td>
                                <input type="text" name="government_change_regulated_title_q47[]"
                                    class="form-control q47_title_input" placeholder="Others (Specify)___">
                            </td>
                            <td>
                                <select name="government_change_regulated_status_q47[]"
                                    class="form-control q47_status_select">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($status_Lists as $key => $training)
                                    <option value="{{ $key }}">{{ $training }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <button id="addRowDatasq47" type="button" class="btn btn-sm btn-primary">+</button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <br />
            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question47">Save</button>
            </p>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {


    $(".fiftysevenstatus").on("change", function() {
        var statusvalue = $("input[name='is_government_change_regulated_q47']:checked").val();

        if (statusvalue == '1') {
            $('#47_question_view').removeClass('visibility').show();
            $('.q47_others_container').addClass('othersText').hide();
            $('#q52others').val("");
        } else if (statusvalue == "2") {
            $('#47_question_view').addClass('visibility').hide();
            $('.q47_others_container').removeClass('othersText').show();
        } else {
            $('#47_question_view').addClass('visibility').hide();
            $('.q47_others_container').addClass('othersText').hide();
            $('#q52others').val("");
        }
    });


    let dynamicCount = $('.qe47NoOfRow').length + 100;
    $(document).on("click", "#addRowDatasq47", function() {
        dynamicCount++;
        $("#addRowQ47 tbody").append(
            `<tr class="qe47NoOfRow" id="row_q47_${dynamicCount}">
            <td>
              <input type="text" name="government_change_regulated_title_q47[]" class="form-control q47_title_input" placeholder="Others (Specify)___">
            </td>
            <td>
              <select name="government_change_regulated_status_q47[]" class="form-control q47_status_select">
                <option value="" disabled selected>---Choose an item--</option>
                @foreach ($status_Lists as $key => $training)
                  <option value="{{ $key }}">{{ $training }}</option>
                @endforeach
              </select>
            </td>
            <td>
              <button type="button" class="btn btn-danger btn_remove_q47" data-id="${dynamicCount}">-</button>
            </td>
          </tr>`
        );
    });


    $(document).on('click', '.btn_remove_q47', function() {
        let button_id = $(this).data('id');
        $('#row_q47_' + button_id).remove();
    });


    $(document).on("click", '#temp-save-question47', function() {
        let yes_no_value = $("input[name='is_government_change_regulated_q47']:checked").val();
        let table_data = [];


        $('.qe47NoOfRow').each(function() {
            let title_val = $(this).find('.q47_title_input').val() || '';
            let status_val = $(this).find('.q47_status_select').val() || '';


            if (title_val !== '' || status_val !== '') {
                table_data.push({
                    title_val: title_val,
                    status_val: status_val
                });
            }
        });

        let new_data = {
            q47_checked_value: yes_no_value,
            q47_table_data: table_data,
            others: $("#q52others").val() || ''
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                "_token": "{{ csrf_token() }}",
                "question47": new_data,
                "question_no": "47"
            },
            success: function(response) {
                $('.question47 .card-title').css('color', 'blue');
                alert("Question 47  Saved Temporarily ");
            },
            error: function(err) {
                alert("Error saving question 47 data ");
                console.log(err);
            }
        });
    });

});
</script>
<?php } ?>