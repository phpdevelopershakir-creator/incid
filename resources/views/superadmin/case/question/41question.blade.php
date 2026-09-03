@if (($questiontitles[40]->status ?? null) == 1)
@php
// সেশন থেকে ৪১ নম্বর প্রশ্নের ডাটা নেওয়া হচ্ছে
$question_41_data = session()->get('question41');
$q41_checked = isset($question_41_data['q41_checked_value']) ? (string)$question_41_data['q41_checked_value'] : null;
$q41_data = $question_41_data['q41_data'] ?? null;
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

            <!-- Title & Top Input Field -->
            <div class="form-group">
                <label class="font-weight-bold">
                     How many convicted traffickers were ordered to pay restitution to a victim and what amounts were
                    they ordered to pay? How many victims received the amount they were awarded? If applicable, what
                    factors hindered victims' receipt of these funds?
                </label>
                <textarea name="convicted_traffickers_title_one_q41" class="form-control q41-desc-input" rows="3"
                    placeholder="Input Field">{{ $q41_data['convicted_traffickers_title_one_q41'] ?? '' }}</textarea>
            </div>

            <!-- Radio Options (Name Controller-এর সাথে মিল রেখে দেওয়া হলো) -->
            <div class="form-group mb-2">
                <input type="radio" id="radioYes41" class="fortyonestatus" name="is_convicted_traffickers_q41" value="1"
                    {{ (is_null($q41_checked) || $q41_checked === '1') ? 'checked' : '' }}>
                <label for="radioYes41" class="mr-3 text-danger font-weight-bold">Yes</label>

                <input type="radio" id="radioNo41" class="fortyonestatus" name="is_convicted_traffickers_q41" value="0"
                    {{ ($q41_checked === '0') ? 'checked' : '' }}>
                <label for="radioNo41" class="mr-3 text-danger font-weight-bold">No</label>

                <input type="radio" id="radioOthers41" class="fortyonestatus" name="is_convicted_traffickers_q41"
                    value="2" {{ ($q41_checked === '2') ? 'checked' : '' }}>
                <label for="radioOthers41" class="text-danger font-weight-bold">Others [input text box with description]</label>
            </div>

            <!-- Others Input -->
            <div id="others_q41" style="display: {{ ($q41_checked === '2') ? 'block' : 'none' }};">
                <textarea name="others_restitution_q41" class="form-control mt-2 q41-others-input" rows="2"
                    placeholder="Others details">{{ $q41_data['others_restitution_q41'] ?? '' }}</textarea>
            </div>

            <!-- If Yes Section -->
            <div id="yes_extra_q41"
                style="display: {{ (is_null($q41_checked) || $q41_checked === '1') ? 'block' : 'none' }};">
                <p class="font-weight-bold mt-3">If Yes</p>

                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="restitution-table-q41">
                        <thead>
                            <tr class="bg-light">
                                <th>Location</th>
                                <th>Case no</th>
                                <th>No of Men</th>
                                <th>Amount</th>
                                <th>No of Women</th>
                                <th>Amount</th>
                                <th>Total No of Traffickers</th>
                                <th>Total amount</th>
                                <th style="width: 80px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $rows = $q41_data['traffickers_data'] ?? [];
                            $totalRows = max(2, count($rows)); // সর্বনিম্ন ২টি রো দেখাবে
                            @endphp

                            @for($i = 0; $i < $totalRows; $i++) 
                            @php $row = $rows[$i] ?? null; @endphp 
                            <tr>
                                <td>
                                    <select name="convicted_traffickers_location_q41b[]" class="form-control q41-location">
                                        <option value="">Dropdown</option>
                                        <option value="Dhaka" {{ ($row['convicted_traffickers_location_q41b'] ?? '') == 'Dhaka' ? 'selected' : '' }}>Dhaka</option>
                                        <option value="Chittagong" {{ ($row['convicted_traffickers_location_q41b'] ?? '') == 'Chittagong' ? 'selected' : '' }}>Chittagong</option>
                                        <option value="Barishal" {{ ($row['convicted_traffickers_location_q41b'] ?? '') == 'Barishal' ? 'selected' : '' }}>Barishal</option>
                                        <option value="Sylhet" {{ ($row['convicted_traffickers_location_q41b'] ?? '') == 'Sylhet' ? 'selected' : '' }}>Sylhet</option>
                                        <option value="Rangpur" {{ ($row['convicted_traffickers_location_q41b'] ?? '') == 'Rangpur' ? 'selected' : '' }}>Rangpur</option>
                                        <option value="Mymensingh" {{ ($row['convicted_traffickers_location_q41b'] ?? '') == 'Mymensingh' ? 'selected' : '' }}>Mymensingh</option>
                                        <option value="National" {{ ($row['convicted_traffickers_location_q41b'] ?? '') == 'National' ? 'selected' : '' }}>National</option>
                                    </select>
                                </td>
                                <td><input type="text" name="convicted_traffickers_case_q41b[]" class="form-control q41-case-no" value="{{ $row['convicted_traffickers_case_q41b'] ?? '' }}" placeholder="Case no"></td>
                                <td><input type="number" name="convicted_traffickers_men_q41b[]" class="form-control q41-men" value="{{ $row['convicted_traffickers_men_q41b'] ?? '' }}" min="0"></td>
                                <td><input type="number" name="convicted_traffickers_men_amount_q41b[]" class="form-control q41-amount-men" value="{{ $row['convicted_traffickers_men_amount_q41b'] ?? '' }}" step="0.01" min="0"></td>
                                <td><input type="number" name="convicted_traffickers_women_q41b[]" class="form-control q41-women" value="{{ $row['convicted_traffickers_women_q41b'] ?? '' }}" min="0"></td>
                                <td><input type="number" name="convicted_traffickers_women_amount_q41b[]" class="form-control q41-amount-women" value="{{ $row['convicted_traffickers_women_amount_q41b'] ?? '' }}" step="0.01" min="0"></td>
                                <td><input type="number" name="convicted_traffickers_total_trafic_q41b[]" class="form-control q41-total-traffickers" value="{{ $row['convicted_traffickers_total_trafic_q41b'] ?? '' }}" readonly></td>
                                <td><input type="number" name="convicted_traffickers_total_amount_q41b[]" class="form-control q41-total-amount" value="{{ $row['convicted_traffickers_total_amount_q41b'] ?? '' }}" readonly></td>
                                <td>
                                    @if($i == 0)
                                    <span class="badge badge-secondary">Fixed</span>
                                    @elseif($i == 1)
                                    <button type="button" class="btn btn-sm btn-primary add-row-q41">+</button>
                                    @else
                                    <button type="button" class="btn btn-sm btn-danger remove-row-q41">-</button>
                                    @endif
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                        <tfoot>
                            <tr class="bg-light font-weight-bold">
                                <td colspan="2">Total</td>
                                <td id="grand-men-q41">0</td>
                                <td id="grand-amount-men-q41">0.00</td>
                                <td id="grand-women-q41">0</td>
                                <td id="grand-amount-women-q41">0.00</td>
                                <td id="grand-total-traffickers-q41">0</td>
                                <td id="grand-total-amount-q41">0.00</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Not Declared / Not Specified Input field -->
                <div class="form-group mt-3">
                    <label class="text-danger font-weight-bold">Dropdown in Location, country and district not declared :</label>
                    <textarea name="convicted_traffickers_title_two_q41" class="form-control q41-location-not-specified" rows="2" placeholder="[Input text box with description]">{{ $q41_data['convicted_traffickers_title_two_q41'] ?? '' }}</textarea>
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

    // Radio Toggle Logic
    function toggleq41() {
        let val = $("input[name='is_convicted_traffickers_q41']:checked").val();

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

    // Calculate Totals
    function calculateQ41Totals() {
        let grandMen = 0, grandAmountMen = 0;
        let grandWomen = 0, grandAmountWomen = 0;
        let grandTotalTraffickers = 0, grandTotalAmount = 0;

        $('#restitution-table-q41 tbody tr').each(function() {
            let men = parseInt($(this).find('.q41-men').val()) || 0;
            let amountMen = parseFloat($(this).find('.q41-amount-men').val()) || 0;
            let women = parseInt($(this).find('.q41-women').val()) || 0;
            let amountWomen = parseFloat($(this).find('.q41-amount-women').val()) || 0;

            let rowTotalTraffickers = men + women;
            let rowTotalAmount = amountMen + amountWomen;

            $(this).find('.q41-total-traffickers').val(rowTotalTraffickers);
            $(this).find('.q41-total-amount').val(rowTotalAmount.toFixed(2));

            grandMen += men;
            grandAmountMen += amountMen;
            grandWomen += women;
            grandAmountWomen += amountWomen;
            grandTotalTraffickers += rowTotalTraffickers;
            grandTotalAmount += rowTotalAmount;
        });

        $('#grand-men-q41').text(grandMen);
        $('#grand-amount-men-q41').text(grandAmountMen.toFixed(2));
        $('#grand-women-q41').text(grandWomen);
        $('#grand-amount-women-q41').text(grandAmountWomen.toFixed(2));
        $('#grand-total-traffickers-q41').text(grandTotalTraffickers);
        $('#grand-total-amount-q41').text(grandTotalAmount.toFixed(2));
    }

    $(document).on('input', '.q41-men, .q41-amount-men, .q41-women, .q41-amount-women', calculateQ41Totals);

    // Dynamic Add Row
    $(document).on('click', '.add-row-q41', function() {
        let newRow = `
            <tr>
                <td>
                    <select name="convicted_traffickers_location_q41b[]" class="form-control q41-location">
                        <option value="">Dropdown</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Chittagong">Chittagong</option>
                        <option value="Khulna">Khulna</option>
                        <option value="Rajshahi">Rajshahi</option>
                        <option value="Barishal">Barishal</option>
                        <option value="Sylhet">Sylhet</option>
                        <option value="Rangpur">Rangpur</option>
                        <option value="Mymensingh">Mymensingh</option>
                        <option value="National">National</option>
                    </select>
                </td>
                <td><input type="text" name="convicted_traffickers_case_q41b[]" class="form-control q41-case-no" placeholder="Case no"></td>
                <td><input type="number" name="convicted_traffickers_men_q41b[]" class="form-control q41-men" min="0"></td>
                <td><input type="number" name="convicted_traffickers_men_amount_q41b[]" class="form-control q41-amount-men" step="0.01" min="0"></td>
                <td><input type="number" name="convicted_traffickers_women_q41b[]" class="form-control q41-women" min="0"></td>
                <td><input type="number" name="convicted_traffickers_women_amount_q41b[]" class="form-control q41-amount-women" step="0.01" min="0"></td>
                <td><input type="number" name="convicted_traffickers_total_trafic_q41b[]" class="form-control q41-total-traffickers" readonly></td>
                <td><input type="number" name="convicted_traffickers_total_amount_q41b[]" class="form-control q41-total-amount" readonly></td>
                <td><button type="button" class="btn btn-sm btn-danger remove-row-q41">-</button></td>
            </tr>`;
        $('#restitution-table-q41 tbody').append(newRow);
    });

    // Dynamic Remove Row
    $(document).on('click', '.remove-row-q41', function() {
        $(this).closest('tr').remove();
        calculateQ41Totals();
    });

    // Initial Calculation Run
    calculateQ41Totals();

    // Temp Save AJAX Request
    $(document).on("click", "#temp-save-question41", function() {
        let checkedValue = $("input[name='is_convicted_traffickers_q41']:checked").val();
        let traffickersData = [];

        $('#restitution-table-q41 tbody tr').each(function() {
            let location = $(this).find('.q41-location').val();
            let case_no = $(this).find('.q41-case-no').val();
            let men = $(this).find('.q41-men').val();
            let amount_men = $(this).find('.q41-amount-men').val();
            let women = $(this).find('.q41-women').val();
            let amount_women = $(this).find('.q41-amount-women').val();
            let total_traffickers = $(this).find('.q41-total-traffickers').val();
            let total_amount = $(this).find('.q41-total-amount').val();

            if (location || case_no || men || women) {
                traffickersData.push({
                    convicted_traffickers_location_q41b: location,
                    convicted_traffickers_case_q41b: case_no,
                    convicted_traffickers_men_q41b: men,
                    convicted_traffickers_men_amount_q41b: amount_men,
                    convicted_traffickers_women_q41b: women,
                    convicted_traffickers_women_amount_q41b: amount_women,
                    convicted_traffickers_total_trafic_q41b: total_traffickers,
                    convicted_traffickers_total_amount_q41b: total_amount
                });
            }
        });

        let q41_data = {
            convicted_traffickers_title_one_q41: $('.q41-desc-input').val(),
            others_restitution_q41: $('.q41-others-input').val(),
            traffickers_data: traffickersData,
            convicted_traffickers_title_two_q41: $('.q41-location-not-specified').val()
        };

        let new_data = {
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
                    alert("Question 41 Temp Saved Successfully");
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