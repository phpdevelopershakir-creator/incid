@if (($questiontitles[40]->status ?? null) == 1)
@php
$question_41_data = session()->get('question41');
$q41_checked = isset($question_41_data['q41_checked_value']) ? (string)$question_41_data['q41_checked_value'] : null;
$q41_data = $question_41_data['q41_data'] ?? null;

// ID-Name map load from DB
try {
$districts = \DB::table('districts')->pluck('name', 'id')->toArray();
} catch (\Exception $e) {
$districts = \DB::table('districs')->pluck('name', 'id')->toArray();
}
@endphp

<div class="card question41">
    <div class="card-header" id="heading-41">
        <h6 style="color: {{ !empty($question_41_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-41" aria-expanded="false" aria-controls="Question-41">
                41. {{ $questiontitles[40]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-41" class="collapse" role="tabpanel" aria-labelledby="heading-41" data-parent="#accordion-2">
        <div class="card-body">

            <div class="form-group">
                <label class="font-weight-bold">
                    How many convicted traffickers were ordered to pay restitution to a victim and what amounts were
                    they ordered to pay? How many victims received the amount they were awarded? If applicable, what
                    factors hindered victims' receipt of these funds?
                </label>
                <textarea name="convicted_traffickers_title_one_q41" class="form-control q41-desc-input" rows="3"
                    placeholder="Please describe">{{ $q41_data['convicted_traffickers_title_one_q41'] ?? '' }}</textarea>
            </div>

            <div class="form-group mb-2">
                <input type="radio" id="radioYes41" class="fortyonestatus" name="is_convicted_traffickers_q41" value="1"
                    {{ (is_null($q41_checked) || $q41_checked === '1') ? 'checked' : '' }}>
                <label for="radioYes41" class="mr-3 font-weight-bold">Yes</label>

                <input type="radio" id="radioNo41" class="fortyonestatus" name="is_convicted_traffickers_q41" value="0"
                    {{ ($q41_checked === '0') ? 'checked' : '' }}>
                <label for="radioNo41" class="mr-3 font-weight-bold">No</label>

                <input type="radio" id="radioOthers41" class="fortyonestatus" name="is_convicted_traffickers_q41"
                    value="2" {{ ($q41_checked === '2') ? 'checked' : '' }}>
                <label for="radioOthers41" class="font-weight-bold">Others </label>
            </div>

            <div id="others_q41" style="display: {{ ($q41_checked === '2') ? 'block' : 'none' }};">
                <textarea name="others_restitution_q41" class="form-control mt-2 q41-others-input" rows="2"
                    placeholder="Please describe">{{ $q41_data['others_restitution_q41'] ?? '' }}</textarea>
            </div>

            <div id="yes_extra_q41"
                style="display: {{ (is_null($q41_checked) || $q41_checked === '1') ? 'block' : 'none' }};">


                <div class="table-responsive">
                    <table class="table table-bordered text-center align-middle" id="restitution-table-q41">
                        <thead>
                            <tr class="bg-light">
                                <th style="vertical-align: middle;">District</th>
                                <th style="vertical-align: middle;">Case</th>
                                <th colspan="4" style="vertical-align: middle;">Information</th>
                                <th style="vertical-align: middle;">Total No of Traffickers</th>
                                <th style="vertical-align: middle;">Total amount</th>
                                <th style="vertical-align: middle; width: 80px;">Add row</th>
                            </tr>
                        </thead>
                        <tbody id="q41-tbody">
                            @php
                            $blocks = $q41_data['blocks'] ?? [[]];
                            if(count($blocks) == 0) { $blocks = [[]]; }
                            @endphp

                            @foreach($blocks as $bIndex => $block)
                            <tr class="q41-block-row" data-block="{{ $bIndex }}">
                                <!-- District Dropdown -->
                                <td rowspan="5" style="vertical-align: middle;">
                                    <select name="q41_district[]" class="form-control q41-district">
                                        <option value="">Select District</option>
                                        @foreach($districts as $districtId => $districtName)
                                        <option value="{{ $districtId }}"
                                            {{ ($block['district'] ?? '') == $districtId ? 'selected' : '' }}>
                                            {{ $districtName }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>

                                <!-- Case Text Field -->
                                <td rowspan="5" style="vertical-align: middle;">
                                    <input type="text" name="q41_case[]" class="form-control q41-case"
                                        value="{{ $block['case'] ?? '' }}" placeholder="Case Info">
                                </td>

                                <!-- Category 1: Men -->
                                <td style="vertical-align: middle;"><b>Men</b></td>
                                <td>
                                    <input type="number" name="q41_men_val[]" class="form-control q41-count q41-men"
                                        value="{{ $block['men_val'] ?? '' }}" min="0" placeholder="Number">
                                </td>
                                <td style="vertical-align: middle;"><b>Amount</b></td>
                                <td>
                                    <input type="number" step="0.01" name="q41_men_amt[]"
                                        class="form-control q41-amt q41-men-amt" value="{{ $block['men_amt'] ?? '' }}"
                                        min="0" placeholder="Amount">
                                </td>

                                <!-- Total Traffickers -->
                                <td rowspan="5" style="vertical-align: middle;">
                                    <input type="number" name="q41_total_traffickers[]"
                                        class="form-control q41-total-traffickers"
                                        value="{{ $block['total_traffickers'] ?? '' }}" readonly placeholder="Total">
                                </td>

                                <!-- Total Amount -->
                                <td rowspan="5" style="vertical-align: middle;">
                                    <input type="number" step="0.01" name="q41_total_amount[]"
                                        class="form-control q41-total-amount" value="{{ $block['total_amount'] ?? '' }}"
                                        readonly placeholder="Total Amount">
                                </td>

                                <!-- Action Button -->
                                <td rowspan="5" style="vertical-align: middle;">
                                    @if($loop->first)
                                    <button type="button" class="btn btn-sm btn-primary add-block-q41">+</button>
                                    @else
                                    <button type="button" class="btn btn-sm btn-danger remove-block-q41">-</button>
                                    @endif
                                </td>
                            </tr>

                            <!-- Sub Rows for Women, Boys, Girls, TG -->
                            <tr class="q41-sub-row">
                                <td style="vertical-align: middle;"><b>Women</b></td>
                                <td><input type="number" name="q41_women_val[]" class="form-control q41-count q41-women"
                                        value="{{ $block['women_val'] ?? '' }}" min="0" placeholder="Number"></td>
                                <td style="vertical-align: middle;"><b>Amount</b></td>
                                <td><input type="number" step="0.01" name="q41_women_amt[]"
                                        class="form-control q41-amt q41-women-amt"
                                        value="{{ $block['women_amt'] ?? '' }}" min="0" placeholder="Amount"></td>
                            </tr>
                            <tr class="q41-sub-row">
                                <td style="vertical-align: middle;"><b>Boys</b></td>
                                <td><input type="number" name="q41_boys_val[]" class="form-control q41-count q41-boys"
                                        value="{{ $block['boys_val'] ?? '' }}" min="0" placeholder="Number"></td>
                                <td style="vertical-align: middle;"><b>Amount</b></td>
                                <td><input type="number" step="0.01" name="q41_boys_amt[]"
                                        class="form-control q41-amt q41-boys-amt" value="{{ $block['boys_amt'] ?? '' }}"
                                        min="0" placeholder="Amount"></td>
                            </tr>
                            <tr class="q41-sub-row">
                                <td style="vertical-align: middle;"><b>Girls</b></td>
                                <td><input type="number" name="q41_girls_val[]" class="form-control q41-count q41-girls"
                                        value="{{ $block['girls_val'] ?? '' }}" min="0" placeholder="Number"></td>
                                <td style="vertical-align: middle;"><b>Amount</b></td>
                                <td><input type="number" step="0.01" name="q41_girls_amt[]"
                                        class="form-control q41-amt q41-girls-amt"
                                        value="{{ $block['girls_amt'] ?? '' }}" min="0" placeholder="Amount"></td>
                            </tr>
                            <tr class="q41-sub-row">
                                <td style="vertical-align: middle;"><b>TG</b></td>
                                <td><input type="number" name="q41_tg_val[]" class="form-control q41-count q41-tg"
                                        value="{{ $block['tg_val'] ?? '' }}" min="0" placeholder="Number"></td>
                                <td style="vertical-align: middle;"><b>Amount</b></td>
                                <td><input type="number" step="0.01" name="q41_tg_amt[]"
                                        class="form-control q41-amt q41-tg-amt" value="{{ $block['tg_amt'] ?? '' }}"
                                        min="0" placeholder="Amount"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="form-group mt-3">
                    <label class="font-weight-bold">Dropdown in Location, country and district not declared
                        :</label>
                    <textarea name="convicted_traffickers_title_two_q41" class="form-control q41-location-not-specified"
                        rows="2"
                        placeholder="Please describe">{{ $q41_data['convicted_traffickers_title_two_q41'] ?? '' }}</textarea>
                </div>
            </div>

        </div>

        <p class="text-right mr-3">
            <button type="button" class="btn btn-success" id="temp-save-question41">Save</button>
        </p>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    // First Option Box theke clones district options with exact value (ID) and text (Name)
    function getDistrictOptions() {
        var options = '<option value="">Select District</option>';
        var $firstSelect = $('#q41-tbody tr:first-child .q41-district');
        if ($firstSelect.length > 0) {
            $firstSelect.find('option').each(function() {
                var val = $(this).val();
                var text = $(this).text();
                if (val !== "") {
                    options += '<option value="' + val + '">' + text + '</option>';
                }
            });
        }
        return options;
    }

    function toggleq41() {
        var val = $("input[name='is_convicted_traffickers_q41']:checked").val();
        if (!val) {
            val = '1';
            $('#radioYes41').prop('checked', true);
        }
        if (val === '1') {
            $('#yes_extra_q41').show();
            $('#others_q41').hide();
        } else if (val === '2') {
            $('#yes_extra_q41').hide();
            $('#others_q41').show();
        } else {
            $('#yes_extra_q41').hide();
            $('#others_q41').hide();
        }
    }

    $(document).on('change', '.fortyonestatus', toggleq41);

    // Auto calculate per block total
    function calculateBlockTotals($firstRow) {
        var $subRows = $firstRow.nextUntil('.q41-block-row');
        var $allRows = $firstRow.add($subRows);

        var totalCount = 0;
        var totalAmount = 0;

        $allRows.find('.q41-count').each(function() {
            totalCount += parseInt($(this).val()) || 0;
        });

        $allRows.find('.q41-amt').each(function() {
            totalAmount += parseFloat($(this).val()) || 0;
        });

        $firstRow.find('.q41-total-traffickers').val(totalCount);
        $firstRow.find('.q41-total-amount').val(totalAmount.toFixed(2));
    }

    $(document).on('input', '.q41-count, .q41-amt', function() {
        var $tr = $(this).closest('tr');
        var $firstRow = $tr.hasClass('q41-block-row') ? $tr : $tr.prevAll('.q41-block-row:first');
        calculateBlockTotals($firstRow);
    });

    // Add Block (5 rows)
    $(document).on('click', '.add-block-q41', function(e) {
        e.preventDefault();
        var districtOptions = getDistrictOptions();
        var blockHtml =
            '<tr class="q41-block-row">' +
            '<td rowspan="5" style="vertical-align: middle;"><select name="q41_district[]" class="form-control q41-district">' +
            districtOptions + '</select></td>' +
            '<td rowspan="5" style="vertical-align: middle;"><input type="text" name="q41_case[]" class="form-control q41-case" placeholder="Case Info"></td>' +
            '<td style="vertical-align: middle;"><b>Men</b></td>' +
            '<td><input type="number" name="q41_men_val[]" class="form-control q41-count q41-men" min="0" placeholder="Number"></td>' +
            '<td style="vertical-align: middle;"><b>Amount</b></td>' +
            '<td><input type="number" step="0.01" name="q41_men_amt[]" class="form-control q41-amt q41-men-amt" min="0" placeholder="Amount"></td>' +
            '<td rowspan="5" style="vertical-align: middle;"><input type="number" name="q41_total_traffickers[]" class="form-control q41-total-traffickers" readonly placeholder="Total"></td>' +
            '<td rowspan="5" style="vertical-align: middle;"><input type="number" step="0.01" name="q41_total_amount[]" class="form-control q41-total-amount" readonly placeholder="Total Amount"></td>' +
            '<td rowspan="5" style="vertical-align: middle;"><button type="button" class="btn btn-sm btn-danger remove-block-q41">-</button></td>' +
            '</tr>' +
            '<tr class="q41-sub-row">' +
            '<td style="vertical-align: middle;"><b>Women</b></td>' +
            '<td><input type="number" name="q41_women_val[]" class="form-control q41-count q41-women" min="0" placeholder="Number"></td>' +
            '<td style="vertical-align: middle;"><b>Amount</b></td>' +
            '<td><input type="number" step="0.01" name="q41_women_amt[]" class="form-control q41-amt q41-women-amt" min="0" placeholder="Amount"></td>' +
            '</tr>' +
            '<tr class="q41-sub-row">' +
            '<td style="vertical-align: middle;"><b>Boys</b></td>' +
            '<td><input type="number" name="q41_boys_val[]" class="form-control q41-count q41-boys" min="0" placeholder="Number"></td>' +
            '<td style="vertical-align: middle;"><b>Amount</b></td>' +
            '<td><input type="number" step="0.01" name="q41_boys_amt[]" class="form-control q41-amt q41-boys-amt" min="0" placeholder="Amount"></td>' +
            '</tr>' +
            '<tr class="q41-sub-row">' +
            '<td style="vertical-align: middle;"><b>Girls</b></td>' +
            '<td><input type="number" name="q41_girls_val[]" class="form-control q41-count q41-girls" min="0" placeholder="Number"></td>' +
            '<td style="vertical-align: middle;"><b>Amount</b></td>' +
            '<td><input type="number" step="0.01" name="q41_girls_amt[]" class="form-control q41-amt q41-girls-amt" min="0" placeholder="Amount"></td>' +
            '</tr>' +
            '<tr class="q41-sub-row">' +
            '<td style="vertical-align: middle;"><b>TG</b></td>' +
            '<td><input type="number" name="q41_tg_val[]" class="form-control q41-count q41-tg" min="0" placeholder="Number"></td>' +
            '<td style="vertical-align: middle;"><b>Amount</b></td>' +
            '<td><input type="number" step="0.01" name="q41_tg_amt[]" class="form-control q41-amt q41-tg-amt" min="0" placeholder="Amount"></td>' +
            '</tr>';

        $('#q41-tbody').append(blockHtml);
    });

    // Remove Block Event
    $(document).on('click', '.remove-block-q41', function(e) {
        e.preventDefault();
        var $firstRow = $(this).closest('.q41-block-row');
        $firstRow.nextUntil('.q41-block-row').remove();
        $firstRow.remove();
    });

    // Temp Save AJAX Logic
    $(document).on("click", "#temp-save-question41", function() {
        var checkedValue = $("input[name='is_convicted_traffickers_q41']:checked").val();
        var blocksData = [];

        $('.q41-block-row').each(function() {
            var $firstRow = $(this);
            var $subRows = $firstRow.nextUntil('.q41-block-row');

            var district = $firstRow.find('.q41-district').val();
            var caseVal = $firstRow.find('.q41-case').val();

            var men_val = $firstRow.find('.q41-men').val();
            var men_amt = $firstRow.find('.q41-men-amt').val();

            var women_val = $subRows.eq(0).find('.q41-women').val();
            var women_amt = $subRows.eq(0).find('.q41-women-amt').val();

            var boys_val = $subRows.eq(1).find('.q41-boys').val();
            var boys_amt = $subRows.eq(1).find('.q41-boys-amt').val();

            var girls_val = $subRows.eq(2).find('.q41-girls').val();
            var girls_amt = $subRows.eq(2).find('.q41-girls-amt').val();

            var tg_val = $subRows.eq(3).find('.q41-tg').val();
            var tg_amt = $subRows.eq(3).find('.q41-tg-amt').val();

            var total_traffickers = $firstRow.find('.q41-total-traffickers').val();
            var total_amount = $firstRow.find('.q41-total-amount').val();

            if (district || caseVal || men_val || women_val || boys_val || girls_val ||
                tg_val) {
                blocksData.push({
                    district: district,
                    case: caseVal,
                    men_val: men_val,
                    men_amt: men_amt,
                    women_val: women_val,
                    women_amt: women_amt,
                    boys_val: boys_val,
                    boys_amt: boys_amt,
                    girls_val: girls_val,
                    girls_amt: girls_amt,
                    tg_val: tg_val,
                    tg_amt: tg_amt,
                    total_traffickers: total_traffickers,
                    total_amount: total_amount
                });
            }
        });

        var q41_data = {
            convicted_traffickers_title_one_q41: $('.q41-desc-input').val(),
            others_restitution_q41: $('.q41-others-input').val(),
            blocks: blocksData,
            convicted_traffickers_title_two_q41: $('.q41-location-not-specified').val()
        };

        var new_data = {
            q41_checked_value: checkedValue,
            q41_data: q41_data
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                _token: "{{ csrf_token() }}",
                question_no: 41,
                question41: new_data
            },
            success: function(response) {
                if (response.success || response) {
                    $('.question41 .card-header h6').css('color', 'blue');
                    alert("Question 41 Temp Saved");
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