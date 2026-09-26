@if (($questiontitles[36]->status ?? null) == 1)
@php
$question_37_data = session()->get('question37');$q37_checked = isset($question_37_data['q37_checked_value']) ?
(string)$question_37_data['q37_checked_value'] : null;
$q37_data =$question_37_data['q37_data'] ?? null;
@endphp

<div class="card question37">
    <div class="card-header" id="heading-37">
        <h6 style="color: {{ !empty($question_37_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-37" aria-expanded="false" aria-controls="Question-37">
                37. {{ $questiontitles[36]->title ?? 'Question 37' }}
            </a>
        </h6>
    </div>

    <div id="Question-37" class="collapse" role="tabpanel" aria-labelledby="heading-37" data-parent="#accordion-2">
        <div class="card-body">

            <!-- Radio Options -->
            <div class="form-group mb-2">
                <input type="radio" id="radioYes37" class="thirtysevenstatus" name="is_assistance_government_q37"
                    value="1" {{ (is_null($q37_checked) or$q37_checked === '1') ? 'checked' : '' }}>
                <label for="radioYes37" class="mr-3 font-weight-bold">Yes</label>

                <input type="radio" id="radioNo37" class="thirtysevenstatus" name="is_assistance_government_q37"
                    value="0" {{ ($q37_checked === '0') ? 'checked' : '' }}>
                <label for="radioNo37" class="mr-3 font-weight-bold">No</label>

                <input type="radio" id="radioOthers37" class="thirtysevenstatus" name="is_assistance_government_q37"
                    value="2" {{ ($q37_checked === '2') ? 'checked' : '' }}>
                <label for="radioOthers37" class="font-weight-bold">Others</label>
            </div>

            <!-- YES Block (Table) -->
            <div id="yes_extra_q37"
                style="display: {{ (is_null($q37_checked) or$q37_checked === '1') ? 'block' : 'none' }};">
                <p class="font-weight-bold mt-3">If Yes</p>
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="legal-aid-table-q37">
                        <thead>
                            <tr class="bg-light">
                                <th rowspan="2" style="vertical-align: middle; min-width: 200px;">Form of legal aid</th>
                                <th colspan="6">Number of support recipients</th>
                                <th rowspan="2" style="vertical-align: middle; width: 80px;">Add row</th>
                            </tr>
                            <tr class="bg-light">
                                <th>Men</th>
                                <th>Women</th>
                                <th>Boy</th>
                                <th>Girl</th>
                                <th>TG</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $legal_aid_rows =$q37_data['legal_aid_data'] ?? [];
                                $totalRows = max(1, count($legal_aid_rows));
                                for ($i = 0; $i <$totalRows; $i++):$row = $legal_aid_rows[$i] ?? null;
                                    $selectedAid =$row['form_of_aid'] ?? '';
                            ?>
                            <tr>
                                <td>
                                    <select name="q37_form_of_aid[]" class="form-control q37-form-aid">
                                        <option value="">Select Please</option>
                                        <option value="Criminal Charges"
                                            <?php echo $selectedAid === 'Criminal Charges' ? 'selected' : ''; ?>>
                                            Criminal Charges</option>
                                        <option value="Family Law"
                                            <?php echo $selectedAid === 'Family Law' ? 'selected' : ''; ?>>Family Law
                                        </option>
                                        <option value="Protective Orders"
                                            <?php echo $selectedAid === 'Protective Orders' ? 'selected' : ''; ?>>
                                            Protective Orders</option>
                                    </select>
                                </td>
                                <td><input type="number" name="q37_men[]" class="form-control q37-men"
                                        value="{{ $row['men'] ?? '' }}" min="0"></td>
                                <td><input type="number" name="q37_women[]" class="form-control q37-women"
                                        value="{{ $row['women'] ?? '' }}" min="0"></td>
                                <td><input type="number" name="q37_boy[]" class="form-control q37-boy"
                                        value="{{ $row['boy'] ?? '' }}" min="0"></td>
                                <td><input type="number" name="q37_girl[]" class="form-control q37-girl"
                                        value="{{ $row['girl'] ?? '' }}" min="0"></td>
                                <td><input type="number" name="q37_tg[]" class="form-control q37-tg"
                                        value="{{ $row['tg'] ?? '' }}" min="0"></td>
                                <td><input type="number" name="q37_total[]" class="form-control q37-total"
                                        value="{{ $row['total'] ?? '' }}" readonly></td>
                                <td>
                                    <?php if ($i == 0): ?>
                                    <button type="button" class="btn btn-sm btn-primary add-row-q37">+</button>
                                    <?php else: ?>
                                    <button type="button" class="btn btn-sm btn-danger remove-row-q37">-</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endfor; ?>
                        </tbody>
                        <tfoot>
                            <tr class="bg-light font-weight-bold">
                                <td>Total</td>
                                <td id="grand-men-q37">0</td>
                                <td id="grand-women-q37">0</td>
                                <td id="grand-boy-q37">0</td>
                                <td id="grand-girl-q37">0</td>
                                <td id="grand-tg-q37">0</td>
                                <td id="grand-total-q37">0</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- OTHERS Block -->
            <div id="others_q37" style="display: {{ ($q37_checked === '2') ? 'block' : 'none' }};">
                <p class="font-weight-bold mt-3">Others</p>
                <input type="text" name="other_assistance_government_q37" class="form-control mt-2 q37-others-input"
                    placeholder="Please describe" value="{{ $q37_data['others'] ?? '' }}">
            </div>

        </div>

        <p class="text-right mr-3">
            <button type="button" class="btn btn-success" id="temp-save-question37">Save</button>
        </p>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    function toggleq37() {
        let val = $("input[name='is_assistance_government_q37']:checked").val();

        if (!val) {
            val = '1';
            $('#radioYes37').prop('checked', true);
        }

        if (val === '1') {
            $('#yes_extra_q37').show();
            $('#others_q37').hide();
        } else if (val === '2') {
            $('#yes_extra_q37').hide();
            $('#others_q37').show();
        } else {
            $('#yes_extra_q37').hide();
            $('#others_q37').hide();
        }
    }

    $(document).on('change', '.thirtysevenstatus', toggleq37);

    function calculateQ37Totals() {
        let grandMen = 0,
            grandWomen = 0,
            grandBoy = 0,
            grandGirl = 0,
            grandTg = 0,
            grandTotal = 0;

        $('#legal-aid-table-q37 tbody tr').each(function() {
            let men = parseInt($(this).find('.q37-men').val()) || 0;
            let women = parseInt($(this).find('.q37-women').val()) || 0;
            let boy = parseInt($(this).find('.q37-boy').val()) || 0;
            let girl = parseInt($(this).find('.q37-girl').val()) || 0;
            let tg = parseInt($(this).find('.q37-tg').val()) || 0;

            let rowTotal = men + women + boy + girl + tg;
            $(this).find('.q37-total').val(rowTotal);

            grandMen += men;
            grandWomen += women;
            grandBoy += boy;
            grandGirl += girl;
            grandTg += tg;
            grandTotal += rowTotal;
        });

        $('#grand-men-q37').text(grandMen);
        $('#grand-women-q37').text(grandWomen);
        $('#grand-boy-q37').text(grandBoy);
        $('#grand-girl-q37').text(grandGirl);
        $('#grand-tg-q37').text(grandTg);
        $('#grand-total-q37').text(grandTotal);
    }

    $(document).on('input', '.q37-men, .q37-women, .q37-boy, .q37-girl, .q37-tg', calculateQ37Totals);

    $(document).on('click', '.add-row-q37', function() {
        let newRow = `
            <tr>
                <td>
                    <select name="q37_form_of_aid[]" class="form-control q37-form-aid">
                        <option value="">Select Please</option>
                        <option value="Criminal Charges">Criminal Charges</option>
                        <option value="Family Law">Family Law</option>
                        <option value="Protective Orders">Protective Orders</option>
                    </select>
                </td>
                <td><input type="number" name="q37_men[]" class="form-control q37-men" min="0"></td>
                <td><input type="number" name="q37_women[]" class="form-control q37-women" min="0"></td>
                <td><input type="number" name="q37_boy[]" class="form-control q37-boy" min="0"></td>
                <td><input type="number" name="q37_girl[]" class="form-control q37-girl" min="0"></td>
                <td><input type="number" name="q37_tg[]" class="form-control q37-tg" min="0"></td>
                <td><input type="number" name="q37_total[]" class="form-control q37-total" readonly></td>
                <td><button type="button" class="btn btn-sm btn-danger remove-row-q37">-</button></td>
            </tr>`;
        $('#legal-aid-table-q37 tbody').append(newRow);
    });

    $(document).on('click', '.remove-row-q37', function() {
        $(this).closest('tr').remove();
        calculateQ37Totals();
    });

    calculateQ37Totals();

    $(document).on("click", "#temp-save-question37", function() {
        let checkedValue = $("input[name='is_assistance_government_q37']:checked").val();

        let legalAidData = [];
        if (checkedValue === '1') {
            $('#legal-aid-table-q37 tbody tr').each(function() {
                let formAid = $(this).find('.q37-form-aid').val();
                let men = $(this).find('.q37-men').val();
                let women = $(this).find('.q37-women').val();
                let boy = $(this).find('.q37-boy').val();
                let girl = $(this).find('.q37-girl').val();
                let tg = $(this).find('.q37-tg').val();
                let total = $(this).find('.q37-total').val();

                if (formAid || men || women || boy || girl || tg) {
                    legalAidData.push({
                        form_of_aid: formAid,
                        men: men,
                        women: women,
                        boy: boy,
                        girl: girl,
                        tg: tg,
                        total: total
                    });
                }
            });
        }

        let q37_data = {
            legal_aid_data: legalAidData,
            others: $('.q37-others-input').val()
        };

        let new_data = {
            q37_checked_value: checkedValue,
            q37_data: q37_data
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                _token: "{{ csrf_token() }}",
                question_no: 37,
                question37: new_data
            },
            success: function(response) {
                if (response.success || response) {
                    $('.question37 .card-header h6').css('color', 'blue');
                    alert("Question 37 Temp Saved ");
                } else {
                    alert("Not Saved");
                }
            },
            error: function() {
                alert("Something went wrong!");
            }
        });
    });
});
</script>