<?php
if (($questiontitles[19]->status ?? null) == 1) {
  $internal_traffick = [
    1 => 'MoWCA',
    2 => 'MoHA',
    3 => 'MoSW',
    4 => 'MoEWOE',
    5 => 'MoLJPA',
    6 => 'INCIDIN Bangladesh',
    7 => 'Ask',
    8 => 'BNWLA',
    9 => 'DAM'
  ];

 
  $session_data = session('question20', []);
  
  $q20_checked = $session_data['q20_checked_value'] ?? "1";
  $q20_others_val = $session_data['others'] ?? "";
  
  $q20_main_rows_one = $session_data['q20_data_one'] ?? [];
  $q20_main_rows_two = $session_data['q20_data_two'] ?? [];
?>

@if(Auth::user()->can('20.question'))

<style>
.othersText {
    display: none;
}

.visibility {
    display: none;
}

.otherSpecify {
    display: none;
}
</style>

<div class="card question20">
    <div class="card-header" role="tab" id="heading-20">
        <h6 class="card-title"
            style="color: {{ (!empty($q20_main_rows_one) || !empty($q20_main_rows_two)) ? 'blue' : 'green' }}; mb-0">
            <a data-toggle="collapse" href="#Question-20" aria-expanded="false" aria-controls="Question-20">
                20.{{ $questiontitles[19]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-20" class="collapse" role="tabpanel" aria-labelledby="heading-20" data-parent="#accordion-20">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioTwenty1" class="twenty_status" name="is_describe_government_operated_q20"
                    <?= ($q20_checked == '1') ? 'checked' : ''; ?> value="1">
                <label for="radioTwenty1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioTwenty2" class="twenty_status" name="is_describe_government_operated_q20"
                    <?= ($q20_checked == '0') ? 'checked' : ''; ?> value="0">
                <label for="radioTwenty2">No</label>
            </div>

            <div class="icheck-primary input-group mb-3">
                <input type="radio" id="radioTwenty3" class="twenty_status" name="is_describe_government_operated_q20"
                    <?= ($q20_checked == '2') ? 'checked' : ''; ?> value="2">
                <label for="radioTwenty3">Others</label>
                <span class="col-md-6 style-input <?= ($q20_checked == '2') ? '' : 'othersText'; ?>"
                    id="q20_others_spec_wrapper" style="margin-top:-8px; margin-left: 10px;">
                    <input type="text" id="q20others" placeholder="Others" class="form-control"
                        value="<?= $q20_others_val; ?>" name="other_describe_government_operated_q20">
                </span>
            </div>

            <div id="20_question_view" class="<?= ($q20_checked == '2' || $q20_checked == '0') ? 'visibility' : ''; ?>">

                <div class="card-body">
                    <table id="addRowQ20Internal" class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th rowspan="2" style="text-align: center; vertical-align: middle;">Types of Hotlines
                                </th>
                                <th rowspan="2" style="vertical-align: middle;">Hotlines Number</th>
                                <th colspan="6">Coverage</th>
                            </tr>
                            <tr>
                                <th>Men</th>
                                <th>Women</th>
                                <th>3rd Gender</th>
                                <th>Boy</th>
                                <th>Girls</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="8"
                                    style="text-align: center; font-weight: bold; background-color: #f8f9fa;">Internal
                                    Trafficking</td>
                            </tr>

                            <?php 
                if (!empty($q20_main_rows_one)) { 
                  foreach($q20_main_rows_one as $q20A_raw) {
                   
                    $q20A = (object) $q20A_raw;
                ?>
                            <tr class="q20AQrow">
                                <td>
                                    <?php if (isset($q20A->type_hotline) && is_numeric($q20A->type_hotline)) { ?>
                                    <select name="internal_traffick_type_of_hotlines_q20[]"
                                        class="form-control q20InternalTraffickA select-type-hotline">
                                        @foreach ($internal_traffick as $key => $item)
                                        <option <?= ($q20A->type_hotline == $key) ? 'selected' : ''; ?>
                                            value="{{ $key }}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                    <?php } else { ?>
                                    <input type="text" value="{{ $q20A->type_hotline ?? '' }}"
                                        name="internal_traffick_type_of_hotlines_q20[]" class="form-control"
                                        placeholder="Other(Specify)___">
                                    <?php } ?>
                                </td>
                                <td><input type="text" value="{{ $q20A->hotline_num_one ?? '' }}"
                                        name="internal_hotlines_number_q20[]" class="form-control"
                                        placeholder="Hotline number"></td>
                                <td><input type="number" value="{{ $q20A->men_one ?? 0 }}"
                                        name="internal_traffick_men_q20[]" class="form-control calculate-total q20_men"
                                        min="0"></td>
                                <td><input type="number" value="{{ $q20A->female_one ?? 0 }}"
                                        name="internal_traffick_women_q20[]"
                                        class="form-control calculate-total q20_women" min="0"></td>
                                <td><input type="number" value="{{ $q20A->third_gender_one ?? 0 }}"
                                        name="internal_traffick_third_gender_q20[]"
                                        class="form-control calculate-total q20_third_gender" min="0"></td>
                                <td><input type="number" value="{{ $q20A->boy_one ?? 0 }}"
                                        name="internal_traffick_boys_q20[]"
                                        class="form-control calculate-total q20_boys" min="0"></td>
                                <td><input type="number" value="{{ $q20A->girl_one ?? 0 }}"
                                        name="internal_traffick_girls_q20[]"
                                        class="form-control calculate-total q20_girls" min="0"></td>
                                <td><input type="text" value="{{ $q20A->total_one ?? 0 }}"
                                        name="internal_traffick_total_q20[]" class="form-control q20_total"
                                        readonly="true"></td>
                            </tr>
                            <?php } } else { ?>
                            <tr class="q20AQrow">
                                <td>
                                    <select name="internal_traffick_type_of_hotlines_q20[]"
                                        class="form-control q20InternalTraffickA select-type-hotline">
                                        @foreach ($internal_traffick as $key => $item)
                                        <option value="{{ $key }}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="text" name="internal_hotlines_number_q20[]" class="form-control"
                                        placeholder="Hotline number"></td>
                                <td><input type="number" name="internal_traffick_men_q20[]"
                                        class="form-control calculate-total q20_men" value="0" min="0"></td>
                                <td><input type="number" name="internal_traffick_women_q20[]"
                                        class="form-control calculate-total q20_women" value="0" min="0"></td>
                                <td><input type="number" name="internal_traffick_third_gender_q20[]"
                                        class="form-control calculate-total q20_third_gender" value="0" min="0"></td>
                                <td><input type="number" name="internal_traffick_boys_q20[]"
                                        class="form-control calculate-total q20_boys" value="0" min="0"></td>
                                <td><input type="number" name="internal_traffick_girls_q20[]"
                                        class="form-control calculate-total q20_girls" value="0" min="0"></td>
                                <td><input type="text" name="internal_traffick_total_q20[]"
                                        class="form-control q20_total" value="0" readonly="true"></td>
                            </tr>
                            <tr class="q20AQrow">
                                <td>
                                    <select name="internal_traffick_type_of_hotlines_q20[]"
                                        class="form-control q20InternalTraffickA select-type-hotline">
                                        @foreach ($internal_traffick as $key => $item)
                                        <option value="{{ $key }}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="text" name="internal_hotlines_number_q20[]" class="form-control"
                                        placeholder="Hotline number"></td>
                                <td><input type="number" name="internal_traffick_men_q20[]"
                                        class="form-control calculate-total q20_men" value="0" min="0"></td>
                                <td><input type="number" name="internal_traffick_women_q20[]"
                                        class="form-control calculate-total q20_women" value="0" min="0"></td>
                                <td><input type="number" name="internal_traffick_third_gender_q20[]"
                                        class="form-control calculate-total q20_third_gender" value="0" min="0"></td>
                                <td><input type="number" name="internal_traffick_boys_q20[]"
                                        class="form-control calculate-total q20_boys" value="0" min="0"></td>
                                <td><input type="number" name="internal_traffick_girls_q20[]"
                                        class="form-control calculate-total q20_girls" value="0" min="0"></td>
                                <td><input type="text" name="internal_traffick_total_q20[]"
                                        class="form-control q20_total" value="0" readonly="true"></td>
                            </tr>
                            <tr class="q20AQrow">
                                <td><input type="text" name="internal_traffick_type_of_hotlines_q20[]"
                                        class="form-control" placeholder="Other (Specify)"></td>
                                <td><input type="text" name="internal_hotlines_number_q20[]" class="form-control"
                                        placeholder="Hotline number"></td>
                                <td><input type="number" name="internal_traffick_men_q20[]"
                                        class="form-control calculate-total q20_men" value="0" min="0"></td>
                                <td><input type="number" name="internal_traffick_women_q20[]"
                                        class="form-control calculate-total q20_women" value="0" min="0"></td>
                                <td><input type="number" name="internal_traffick_third_gender_q20[]"
                                        class="form-control calculate-total q20_third_gender" value="0" min="0"></td>
                                <td><input type="number" name="internal_traffick_boys_q20[]"
                                        class="form-control calculate-total q20_boys" value="0" min="0"></td>
                                <td><input type="number" name="internal_traffick_girls_q20[]"
                                        class="form-control calculate-total q20_girls" value="0" min="0"></td>
                                <td><input type="text" name="internal_traffick_total_q20[]"
                                        class="form-control q20_total" value="0" readonly="true"></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="card-body">
                    <table id="addRowQ20International" class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th rowspan="2" style="text-align: center; vertical-align: middle;">Types of Hotlines
                                </th>
                                <th rowspan="2" style="vertical-align: middle;">Hotline number</th>
                                <th colspan="6">Coverage</th>
                            </tr>
                            <tr>
                                <th>Men</th>
                                <th>Women</th>
                                <th>3rd Gender</th>
                                <th>Boy</th>
                                <th>Girls</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="8"
                                    style="text-align: center; font-weight: bold; background-color: #f8f9fa;">
                                    International Trafficking</td>
                            </tr>

                            <?php 
                if (!empty($q20_main_rows_two)) { 
                  foreach($q20_main_rows_two as $q20B_raw) {
                    // 🌟 ফিক্সড: সেশনের অ্যারে ডেটাকে অবজেক্টে রূপান্তর
                    $q20B = (object) $q20B_raw;
                ?>
                            <tr class="q20BQrow">
                                <td>
                                    <?php if (isset($q20B->traffick_type) && is_numeric($q20B->traffick_type)) { ?>
                                    <select name="international_traffick_type_of_hotlines_q20[]"
                                        class="form-control q20InternalTraffickB select-type-hotline">
                                        @foreach ($internal_traffick as $key => $item)
                                        <option <?= ($q20B->traffick_type == $key) ? 'selected' : ''; ?>
                                            value="{{ $key }}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                    <?php } else { ?>
                                    <input type="text" class="form-control" value="{{ $q20B->traffick_type ?? '' }}"
                                        name="international_traffick_type_of_hotlines_q20[]"
                                        placeholder="Other (Specify)">
                                    <?php } ?>
                                </td>
                                <td><input type="text" value="{{ $q20B->hotline_num_two ?? '' }}"
                                        name="international_hotlines_number_q20[]" class="form-control"
                                        placeholder="Hotline number"></td>
                                <td><input type="number" value="{{ $q20B->men_two ?? 0 }}"
                                        name="international_traffick_men_q20[]"
                                        class="form-control calculate-total q20_men" min="0"></td>
                                <td><input type="number" value="{{ $q20B->female_two ?? 0 }}"
                                        name="international_traffick_women_q20[]"
                                        class="form-control calculate-total q20_women" min="0"></td>
                                <td><input type="number" value="{{ $q20B->third_gender_two ?? 0 }}"
                                        name="international_traffick_third_gender_q20[]"
                                        class="form-control calculate-total q20_third_gender" min="0"></td>
                                <td><input type="number" value="{{ $q20B->boy_two ?? 0 }}"
                                        name="international_traffick_boys_q20[]"
                                        class="form-control calculate-total q20_boys" min="0"></td>
                                <td><input type="number" value="{{ $q20B->girl_two ?? 0 }}"
                                        name="international_traffick_girls_q20[]"
                                        class="form-control calculate-total q20_girls" min="0"></td>
                                <td><input type="text" value="{{ $q20B->total_two ?? 0 }}"
                                        name="international_traffick_total_q20[]" class="form-control q20_total"
                                        readonly="true"></td>
                            </tr>
                            <?php } } else { ?>
                            <tr class="q20BQrow">
                                <td>
                                    <select name="international_traffick_type_of_hotlines_q20[]"
                                        class="form-control q20InternalTraffickB select-type-hotline">
                                        @foreach ($internal_traffick as $key => $item)
                                        <option value="{{ $key }}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="text" name="international_hotlines_number_q20[]" class="form-control"
                                        placeholder="Hotline number"></td>
                                <td><input type="number" name="international_traffick_men_q20[]"
                                        class="form-control calculate-total q20_men" value="0" min="0"></td>
                                <td><input type="number" name="international_traffick_women_q20[]"
                                        class="form-control calculate-total q20_women" value="0" min="0"></td>
                                <td><input type="number" name="international_traffick_third_gender_q20[]"
                                        class="form-control calculate-total q20_third_gender" value="0" min="0"></td>
                                <td><input type="number" name="international_traffick_boys_q20[]"
                                        class="form-control calculate-total q20_boys" value="0" min="0"></td>
                                <td><input type="number" name="international_traffick_girls_q20[]"
                                        class="form-control calculate-total q20_girls" value="0" min="0"></td>
                                <td><input type="text" name="international_traffick_total_q20[]"
                                        class="form-control q20_total" value="0" readonly="true"></td>
                            </tr>
                            <tr class="q20BQrow">
                                <td>
                                    <select name="international_traffick_type_of_hotlines_q20[]"
                                        class="form-control q20InternalTraffickB select-type-hotline">
                                        @foreach ($internal_traffick as $key => $item)
                                        <option value="{{ $key }}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="text" name="international_hotlines_number_q20[]" class="form-control"
                                        placeholder="Hotline number"></td>
                                <td><input type="number" name="international_traffick_men_q20[]"
                                        class="form-control calculate-total q20_men" value="0" min="0"></td>
                                <td><input type="number" name="international_traffick_women_q20[]"
                                        class="form-control calculate-total q20_women" value="0" min="0"></td>
                                <td><input type="number" name="international_traffick_third_gender_q20[]"
                                        class="form-control calculate-total q20_third_gender" value="0" min="0"></td>
                                <td><input type="number" name="international_traffick_boys_q20[]"
                                        class="form-control calculate-total q20_boys" value="0" min="0"></td>
                                <td><input type="number" name="international_traffick_girls_q20[]"
                                        class="form-control calculate-total q20_girls" value="0" min="0"></td>
                                <td><input type="text" name="international_traffick_total_q20[]"
                                        class="form-control q20_total" value="0" readonly="true"></td>
                            </tr>
                            <tr class="q20BQrow">
                                <td><input type="text" class="form-control"
                                        name="international_traffick_type_of_hotlines_q20[]"
                                        placeholder="Other (Specify)"></td>
                                <td><input type="text" name="international_hotlines_number_q20[]" class="form-control"
                                        placeholder="Hotline number"></td>
                                <td><input type="number" name="international_traffick_men_q20[]"
                                        class="form-control calculate-total q20_men" value="0" min="0"></td>
                                <td><input type="number" name="international_traffick_women_q20[]"
                                        class="form-control calculate-total q20_women" value="0" min="0"></td>
                                <td><input type="number" name="international_traffick_third_gender_q20[]"
                                        class="form-control calculate-total q20_third_gender" value="0" min="0"></td>
                                <td><input type="number" name="international_traffick_boys_q20[]"
                                        class="form-control calculate-total q20_boys" value="0" min="0"></td>
                                <td><input type="number" name="international_traffick_girls_q20[]"
                                        class="form-control calculate-total q20_girls" value="0" min="0"></td>
                                <td><input type="text" name="international_traffick_total_q20[]"
                                        class="form-control q20_total" value="0" readonly="true"></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <br>
                    <p class="text-right">
                        <button type="button" class="btn btn-success" id="temp-save-question20">Save</button>
                    </p>
                </div>

            </div>

        </div>
    </div>
</div>
@endif

<?php } ?>

<script>
$(document).ready(function() {


    $('.twenty_status').change(function() {
        var value = $(this).val();
        if (value == '1') {
            $('#20_question_view').removeClass('visibility').show();
            $('#q20_others_spec_wrapper').addClass('othersText').hide();
            $('#q20others').val("");
        } else if (value == '0') {
            $('#20_question_view').addClass('visibility').hide();
            $('#q20_others_spec_wrapper').addClass('othersText').hide();
            $('#q20others').val("");
        } else if (value == '2') {
            $('#20_question_view').addClass('visibility').hide();
            $('#q20_others_spec_wrapper').removeClass('othersText').show();
        }
    });


    $(document).on('input keyup change', '.calculate-total', function() {
        var row = $(this).closest('tr');
        var men = parseInt(row.find('.q20_men').val()) || 0;
        var women = parseInt(row.find('.q20_women').val()) || 0;
        var third_gender = parseInt(row.find('.q20_third_gender').val()) || 0;
        var boys = parseInt(row.find('.q20_boys').val()) || 0;
        var girls = parseInt(row.find('.q20_girls').val()) || 0;

        var total = men + women + third_gender + boys + girls;
        row.find('.q20_total').val(total);
    });


    $('#temp-save-question20').click(function(e) {
        e.preventDefault();

        let checked_value = $("input[name='is_describe_government_operated_q20']:checked").val() || "1";
        let others_val = $("#q20others").val() || "";

        let internalData = [];
        let internationalData = [];


        $('.q20AQrow').each(function() {
            let type_hotline = $(this).find(
                "select[name='internal_traffick_type_of_hotlines_q20[]'], input[name='internal_traffick_type_of_hotlines_q20[]']"
            ).val() || "";
            let hotline_num = $(this).find("input[name='internal_hotlines_number_q20[]']")
                .val() || "";

            internalData.push({
                type_hotline: type_hotline,
                hotline_num_one: hotline_num,
                men_one: $(this).find('.q20_men').val() || 0,
                female_one: $(this).find('.q20_women').val() || 0,
                third_gender_one: $(this).find('.q20_third_gender').val() || 0,
                boy_one: $(this).find('.q20_boys').val() || 0,
                girl_one: $(this).find('.q20_girls').val() || 0,
                total_one: $(this).find('.q20_total').val() || 0
            });
        });


        $('.q20BQrow').each(function() {
            let traffick_type = $(this).find(
                "select[name='international_traffick_type_of_hotlines_q20[]'], input[name='international_traffick_type_of_hotlines_q20[]']"
            ).val() || "";
            let hotline_num = $(this).find("input[name='international_hotlines_number_q20[]']")
                .val() || "";

            internationalData.push({
                traffick_type: traffick_type,
                hotline_num_two: hotline_num,
                men_two: $(this).find('.q20_men').val() || 0,
                female_two: $(this).find('.q20_women').val() || 0,
                third_gender_two: $(this).find('.q20_third_gender').val() || 0,
                boy_two: $(this).find('.q20_boys').val() || 0,
                girl_two: $(this).find('.q20_girls').val() || 0,
                total_two: $(this).find('.q20_total').val() || 0
            });
        });


        let sendData = {
            _token: "{{ csrf_token() }}",
            question_no: "20",
            question20: {
                q20_checked_value: checked_value,
                others: others_val,
                q20_data_one: internalData,
                q20_data_two: internationalData
            }
        };

        // AJAX কল
        $.ajax({
            url: "/superadmin/case/temp-save-question",
            method: "POST",
            data: sendData,
            success: function(response) {
                if (response.success) {
                    $('.question20 .card-title').css('color', 'blue');
                    alert('Question 20  Saved Temporarily ');
                } else {
                    alert('Failed to save data.');
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                alert('Error: Something went wrong.');
            }
        });
    });

});
</script>