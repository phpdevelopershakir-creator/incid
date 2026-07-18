<?php
if (($questiontitles[43]->status ?? null) == 1) {
 
  $question_44_data = session()->get('question44');

  $q44_checked = $question_44_data['q44_checked_value'] ?? "1";
  $q44_table_data = $question_44_data['q44_table_data'] ?? [];
  $q44_others_val = $question_44_data['others'] ?? '';

  $q44_status = [
    1 => "Excess",
    2 => "Adequate",
    3 => "Inadequate",
    4 => "None"
  ];
?>

<style>
.othersText {
    display: none !important;
}

.visibility {
    display: none !important;
}
</style>

<div class="card question44">
    <div class="card-header" role="tab" id="heading-44">
        <h6 class="card-title" style="color: {{ !empty($question_44_data) ? 'blue' : 'black' }};">
            <a data-toggle="collapse" href="#Question-44" aria-expanded="false" aria-controls="collapse-44">
                44. {{ $questiontitles[43]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-44" class="collapse" role="tabpanel" aria-labelledby="heading-44" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioFoutyFour1" class="fourtyfour_status"
                    name="is_awareness_campaigns_research_projects_q44" value="1"
                    {{ $q44_checked == "1" ? "checked" : "" }}>
                <label for="radioFoutyFour1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioFourtyFour2" class="fourtyfour_status"
                    name="is_awareness_campaigns_research_projects_q44" value="0"
                    {{ $q44_checked == "0" ? "checked" : "" }}>
                <label for="radioFourtyFour2">No</label>
            </div>

            <div class="icheck-primary input-group mb-3">
                <input type="radio" id="radioFourtyFour3" class="fourtyfour_status"
                    name="is_awareness_campaigns_research_projects_q44" value="2"
                    {{ $q44_checked == "2" ? "checked" : "" }}>
                <label for="radioFourtyFour3">Others</label>

                <span class="col-md-6 mt--4 q44_others_container {{ $q44_checked == '2' ? '' : 'othersText' }}">
                    <input type="text" id="q44others" placeholder="Others Specific" class="form-control"
                        value="{{ $q44_others_val }}" name="other_awareness_campaigns_research_projects_q44">
                </span>
            </div>

            <div id="fourtyfour_question_view"
                class="{{ ($q44_checked == '2' || $q44_checked == '0') ? 'visibility' : '' }}">
                <table class="table table-white table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Type of preventive Action</th>
                            <th scope="col">Allocation (in BDT) / Assessment</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr class="q44_row" data-title-id="1">
                            <th scope="row">Total Allocation under NPA for prevention</th>
                            <input type="hidden" name="awareness_campaigns_research_projects_title_q44[]" value="1">
                            <td>
                                <input type="text" name="awareness_campaigns_research_projects_status_q44[]"
                                    class="form-control q44_input_field" value="{{ $q44_table_data[1] ?? '' }}">
                            </td>
                        </tr>

                        <tr class="q44_row" data-title-id="2">
                            <th scope="row">Total Allocation utilized under NPA for prevention</th>
                            <input type="hidden" name="awareness_campaigns_research_projects_title_q44[]" value="2">
                            <td>
                                <input type="text" name="awareness_campaigns_research_projects_status_q44[]"
                                    class="form-control q44_input_field" value="{{ $q44_table_data[2] ?? '' }}">
                            </td>
                        </tr>

                        <tr class="q44_row" data-title-id="3">
                            <th scope="row">Total allocation spent for Awareness activities</th>
                            <input type="hidden" name="awareness_campaigns_research_projects_title_q44[]" value="3">
                            <td>
                                <input type="text" name="awareness_campaigns_research_projects_status_q44[]"
                                    class="form-control q44_input_field" value="{{ $q44_table_data[3] ?? '' }}">
                            </td>
                        </tr>

                        <tr class="q44_row" data-title-id="4">
                            <th scope="row">Total allocation spent for safety-net</th>
                            <input type="hidden" name="awareness_campaigns_research_projects_title_q44[]" value="4">
                            <td>
                                <input type="text" name="awareness_campaigns_research_projects_status_q44[]"
                                    class="form-control q44_input_field" value="{{ $q44_table_data[4] ?? '' }}">
                            </td>
                        </tr>

                        <tr class="q44_row" data-title-id="5">
                            <th scope="row">Total allocation spent for training to promote prevention</th>
                            <input type="hidden" name="awareness_campaigns_research_projects_title_q44[]" value="5">
                            <td>
                                <input type="text" name="awareness_campaigns_research_projects_status_q44[]"
                                    class="form-control q44_input_field" value="{{ $q44_table_data[5] ?? '' }}">
                            </td>
                        </tr>

                        <tr class="q44_row" data-title-id="6">
                            <th scope="row">Assessment of Allocation</th>
                            <input type="hidden" name="awareness_campaigns_research_projects_title_q44[]" value="6">
                            <td>
                                <select name="awareness_campaigns_research_projects_status_q44[]" id="q44Description"
                                    class="form-control q44_input_field">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    <?php foreach ($q44_status as $key => $item) { ?>
                                    <option value="<?= $key ?>"
                                        <?= (($q44_table_data[6] ?? '') == $key) ? 'selected' : '' ?>><?= $item ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <br />
            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question44">Save</button>
            </p>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {


    $(".fourtyfour_status").on("change", function() {
        let statusvalue = $("input[name='is_awareness_campaigns_research_projects_q44']:checked").val();

        if (statusvalue == '1') {
            $('#fourtyfour_question_view').removeClass('visibility').show();
            $('.q44_others_container').addClass('othersText').hide();
            $('#q44others').val('');
        } else if (statusvalue == '2') {
            $('#fourtyfour_question_view').addClass('visibility').hide();
            $('.q44_others_container').removeClass('othersText').show();
        } else {
            $('#fourtyfour_question_view').addClass('visibility').hide();
            $('.q44_others_container').addClass('othersText').hide();
            $('#q44others').val('');
        }
    });


    $(document).on("click", '#temp-save-question44', function() {
        let yes_no_value = $("input[name='is_awareness_campaigns_research_projects_q44']:checked")
            .val();
        let table_data = {};


        $('.q44_row').each(function() {
            let titleId = $(this).data('title-id');
            let val = $(this).find('.q44_input_field').val() || '';
            table_data[titleId] = val;
        });

        let new_data = {
            q44_checked_value: yes_no_value,
            q44_table_data: table_data,
            others: $("#q44others").val()
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                "_token": "{{ csrf_token() }}",
                "question44": new_data,
                "question_no": "44"
            },
            success: function(response) {
                $('.question44 .card-title').css('color', 'blue');
                alert("Question 44  Saved Temporarily ");
            },
            error: function(err) {
                alert("Error saving question 44 data ");
                console.log(err);
            }
        });
    });

});
</script>
<?php } ?>