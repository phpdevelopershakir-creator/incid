<?php
if (($questiontitles[9]->status ?? null) == 1) {
   
    $question_10_data = session()->get('question10');

    
    $q10_checked = isset($question_10_data['q10_checked_value']) ? $question_10_data['q10_checked_value'] : ($question_10_data->q10_checked_value ?? "1");
    $q10_others_val = isset($question_10_data['others']) ? $question_10_data['others'] : ($question_10_data->others ?? "");
    $q10_main_data = isset($question_10_data['q10_data']) ? $question_10_data['q10_data'] : ($question_10_data->q10_data ?? null);
    $q10_other_rows = isset($question_10_data['q10_other_data']) ? $question_10_data['q10_other_data'] : ($question_10_data->q10_other_data ?? []);

    
    if (is_object($q10_main_data)) {
        $q10_main_data = (array) $q10_main_data;
    }
?>
<style>
.visibility {
    display: none;
}

.othersText {
    display: none;
}

.radio-group-vertical {
    display: flex;
    flex-direction: column;
    gap: 8px;
    font-family: Arial, sans-serif;
}

.radio-group-vertical label {
    cursor: pointer;
    font-size: 15px;
}

.radio-group-vertical input[type="radio"] {
    accent-color: #0d6efd;
    margin-right: 6px;
}
</style>

<div class="card question10">
    <div class="card-header" role="tab" id="heading-10">
        <h6 class="card-title" style="color: {{ !empty($question_10_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-10" aria-expanded="false" aria-controls="Question-10">
                10. {{ $questiontitles[9]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-10" class="collapse" role="tabpanel" aria-labelledby="heading-10" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioTen1" class="tenstatus" name="is_exclusively_trafficking_q10" value="1"
                    <?= ($q10_checked == "1") ? "checked" : ""; ?>>
                <label for="radioTen1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioTen2" class="tenstatus" name="is_exclusively_trafficking_q10" value="0"
                    <?= ($q10_checked == "0") ? "checked" : ""; ?>>
                <label for="radioTen2">No</label>
            </div>

            <div class="icheck-primary input-group">
                <input type="radio" id="radioTen3" class="tenstatus" name="is_exclusively_trafficking_q10" value="2"
                    <?= ($q10_checked == "2") ? "checked" : ""; ?>>
                <label for="radioTen3">Others</label>
                <span class="col-md-6 mt--4 <?= ($q10_checked == "2") ? "" : "othersText"; ?>">
                    <input type="text" id="q10others" placeholder="Others" class="form-control"
                        value="<?= $q10_others_val; ?>" name="other_exclusively_trafficking_q10">
                </span>
            </div>

            <div id="ten_question_view"
                class="<?= ($q10_checked == "2" || $q10_checked == "0") ? "visibility" : ""; ?>">
                <br>
                <b>Note: If you select "Yes", an opinion text box will open for your detailed input.</b>
                <br><br>

                <table id="addRowQ10" class="table table-bordered text-center">
                    <thead style="background-color:#ccc; font-weight:bold;">
                        <tr>
                            <th scope="col">Description</th>
                            <th scope="col">Please Select Yes/No</th>
                            <th scope="col">Opinion</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $static_rows = [
                                'police_station' => 'Police Station',
                                'cid' => 'CID',
                                'rab' => 'RAB',
                                'sb' => 'SB',
                                'prosecution_offices' => 'Prosecution offices (SPP)',
                                'special_tribunal' => 'Special Tribunal'
                            ];

                            foreach ($static_rows as $key => $title) {
                                // অ্যারে অথবা অবজেক্ট দুই ফরম্যাট থেকেই ডেটা রিড করার ব্যবস্থা করা হয়েছে
                                $saved_desc = '';
                                if (is_array($q10_main_data)) {
                                    $saved_desc = $q10_main_data[$key] ?? '';
                                } elseif (is_object($q10_main_data)) {
                                    $saved_desc = $q10_main_data->$key ?? '';
                                }
                                $has_value = !empty($saved_desc);
                            ?>
                        <tr class="qe10NoOfRow">
                            <td data-title="<?= $key; ?>" style="text-align: left;">
                                <?= $title; ?>
                                <input type="hidden" name="court_title_q10[]" value="<?= $title; ?>">
                            </td>
                            <td>
                                <div class="radio-group-vertical">
                                    <label><input type="radio" name="<?= $key; ?>_radio_q10" value="1"
                                            onchange="setCourtTypeQ10(this)" <?= $has_value ? 'checked' : ''; ?>>
                                        Yes</label>
                                    <label><input type="radio" name="<?= $key; ?>_radio_q10" value="0"
                                            onchange="setCourtTypeQ10(this)" <?= !$has_value ? 'checked' : ''; ?>>
                                        No</label>
                                    <input type="hidden" name="court_type_q10[]" class="courtTypeHolder10"
                                        value="<?= $has_value ? '1' : '0'; ?>">
                                </div>
                            </td>
                            <td>
                                <input type="text" name="court_description_q10[]" class="form-control desc-td"
                                    style="display: <?= $has_value ? 'block' : 'none'; ?>;" value="<?= $saved_desc; ?>">
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <?php } ?>

                        <?php if (!empty($q10_other_rows) && (is_array($q10_other_rows) || is_object($q10_other_rows))) { ?>
                        @foreach($q10_other_rows as $index => $other_data)
                        @php
                        $oth_title = $other_data['court_title_q10'] ?? ($other_data->court_title_q10 ?? '');
                        $oth_desc = $other_data['court_description_q10'] ?? ($other_data->court_description_q10 ?? '');
                        $oth_has_val = !empty($oth_desc);
                        @endphp
                        <tr class="qe10NoOfRowOthers" id="row_q10_{{$index}}">
                            <td>
                                <input type="text" name="court_title_q10[]" class="form-control"
                                    value="{{ $oth_title }}" placeholder="Others (Specify)___">
                            </td>
                            <td>
                                <div class="radio-group-vertical">
                                    <label><input type="radio" name="dynamic_radio_q10_{{$index}}" value="1"
                                            onchange="setCourtTypeQ10(this)" {{ $oth_has_val ? 'checked' : '' }}>
                                        Yes</label>
                                    <label><input type="radio" name="dynamic_radio_q10_{{$index}}" value="0"
                                            onchange="setCourtTypeQ10(this)" {{ !$oth_has_val ? 'checked' : '' }}>
                                        No</label>
                                    <input type="hidden" name="court_type_q10[]" class="courtTypeHolder10"
                                        value="{{ $oth_has_val ? '1' : '0' }}">
                                </div>
                            </td>
                            <td>
                                <input type="text" name="court_description_q10[]" value="{{ $oth_desc }}"
                                    class="form-control desc-td"
                                    style="display: {{ $oth_has_val ? 'block' : 'none' }};">
                            </td>
                            <td>
                                @if($loop->first)
                                <button type="button" id="addRowDatasQ10" class="btn btn-sm btn-primary">+</button>
                                @else
                                <button type="button" class="btn btn-danger btn_remove_q10">-</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        <?php } else { ?>
                        <tr class="qe10NoOfRowOthers">
                            <td>
                                <input type="text" name="court_title_q10[]" class="form-control"
                                    placeholder="Others Specific">
                            </td>
                            <td>
                                <div class="radio-group-vertical">
                                    <label><input type="radio" name="dynamic_radio_q10_0" value="1"
                                            onchange="setCourtTypeQ10(this)"> Yes</label>
                                    <label><input type="radio" name="dynamic_radio_q10_0" value="0"
                                            onchange="setCourtTypeQ10(this)" checked> No</label>
                                    <input type="hidden" name="court_type_q10[]" class="courtTypeHolder10" value="0">
                                </div>
                            </td>
                            <td>
                                <input type="text" name="court_description_q10[]" class="form-control desc-td"
                                    style="display:none;">
                            </td>
                            <td>
                                <button type="button" id="addRowDatasQ10" class="btn btn-sm btn-primary">+</button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <br />
            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question10">Save</button>
            </p>
        </div>
    </div>
</div>
<?php } ?>

<script>
$(document).ready(function() {
    let q10RadioIndex = 100;

    function toggleTenQuestionView() {
        let statusvalue = $("input[name='is_exclusively_trafficking_q10']:checked").val();
        if (statusvalue == '1') {
            $('#ten_question_view').show();
            $('.othersText').hide();
        } else if (statusvalue == '2') {
            $('#ten_question_view').hide();
            $('.othersText').show();
        } else {
            $('#ten_question_view').hide();
            $('.othersText').hide();
        }
    }

    $(".tenstatus").on("change", function() {
        toggleTenQuestionView();
    });

    toggleTenQuestionView();

    $(document).on('click', '#addRowDatasQ10', function() {
        q10RadioIndex++;
        $('#addRowQ10 tbody').append(`
                <tr class="qe10NoOfRowOthers">
                    <td>
                        <input type="text" name="court_title_q10[]" class="form-control" placeholder="Others (Specify)___">
                    </td>
                    <td>
                        <div class="radio-group-vertical">
                            <label><input type="radio" name="dynamic_radio_q10_${q10RadioIndex}" value="1" onchange="setCourtTypeQ10(this)"> Yes</label>
                            <label><input type="radio" name="dynamic_radio_q10_${q10RadioIndex}" value="0" onchange="setCourtTypeQ10(this)" checked> No</label>
                            <input type="hidden" name="court_type_q10[]" class="courtTypeHolder10" value="0">
                        </div>
                    </td>
                    <td>
                        <input type="text" name="court_description_q10[]" class="form-control desc-td" style="display:none;">
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn_remove_q10">-</button>
                    </td>
                </tr>
            `);
    });

    $(document).on('click', '.btn_remove_q10', function() {
        $(this).closest('tr').remove();
    });

    $(document).on('change', '.radio-group-vertical input[type=radio]', function() {
        let row = $(this).closest('tr');
        let textTd = row.find('.desc-td');

        if ($(this).val() === '1') {
            textTd.show();
        } else {
            textTd.hide();
            textTd.val('');
        }
    });

    $(document).on("click", '#temp-save-question10', function() {
        let yes_no_value = $("input[name='is_exclusively_trafficking_q10']:checked").val();
        let q10_data = {};
        let others_input_val = $("input[name='other_exclusively_trafficking_q10']").val();

        if (yes_no_value == "1") {
            $('tr.qe10NoOfRow').each(function() {
                let title = $(this).find('td[data-title]').data('title');
                let description = $(this).find('input[name="court_description_q10[]"]').val();
                if (title) {
                    q10_data[title] = description;
                }
            });
        }

        let courtData = [];
        $('tr.qe10NoOfRowOthers').each(function() {
            let title = $(this).find('input[name="court_title_q10[]"]').val();
            let description = $(this).find('input[name="court_description_q10[]"]').val();

            if (title || description) {
                courtData.push({
                    court_title_q10: title,
                    court_description_q10: description
                });
            }
        });

        let new_data = {
            q10_data: q10_data,
            q10_checked_value: yes_no_value,
            q10_other_data: courtData,
            others: others_input_val
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                "_token": "{{ csrf_token() }}",
                "question_no": "10",
                "question10": new_data // এখানে q8a_data পরিবর্তন করে 'question10' করা হয়েছে কন্ট্রোলারের রিকোয়েস্ট অনুযায়ী
            },
            success: function(response) {
                if (response
                    .success) { // কন্ট্রোলারের ['success' => true] রেসপন্স চেক করা হচ্ছে
                    $('.question10 .card-title').css('color', 'blue');
                    alert("Question 10 has been saved temporarily");
                } else {
                    alert("Not Saved");
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                alert("Save failed");
            }
        });
    });
});

function setCourtTypeQ10(radio) {
    let row = radio.closest('tr');
    let hiddenInput = row.querySelector('.courtTypeHolder10');
    if (hiddenInput) {
        hiddenInput.value = radio.value;
    }
}
</script>