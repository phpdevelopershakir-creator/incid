@if (($questiontitles[55]->status ?? null) == 1)
@php
// session data for Question 56
$question_56_data = session()->get('question56');
$q56_checked = isset($question_56_data['q56_checked_value']) ? (string)$question_56_data['q56_checked_value'] : null;
$q56_data = $question_56_data['q56_data'] ?? null;
@endphp

<div class="card question56">
    <div class="card-header" id="heading-56">
        <h6 style="color: {{ !empty($question_56_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-56" aria-expanded="false" aria-controls="Question-56">
                56. {{ $questiontitles[55]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-56" class="collapse" role="tabpanel" aria-labelledby="heading-56" data-parent="#accordion-2">
        <div class="card-body">

            <!-- Title & Input Field -->
            <div class="form-group">
                <label class="font-weight-bold">
                    In instances of trafficking allegations filed against peacekeepers, what steps did the
                    government take to hold perpetrators accountable and prevent future incidents?
                </label>
                <textarea name="peacekeeper_steps_q56" class="form-control q56-desc-input" rows="3"
                    placeholder="Input Field">{{ $q56_data['peacekeeper_steps'] ?? '' }}</textarea>
            </div>

            <!-- Radio Options -->
            <div class="form-group mb-2">
                <input type="radio" id="radioYes56" class="fiftysixstatus" name="is_peacekeeper_steps_q56" value="1"
                    {{ (is_null($q56_checked) || $q56_checked === '1') ? 'checked' : '' }}>
                <label for="radioYes56" class="mr-3 text-danger font-weight-bold">Yes</label>

                <input type="radio" id="radioNo56" class="fiftysixstatus" name="is_peacekeeper_steps_q56" value="0"
                    {{ ($q56_checked === '0') ? 'checked' : '' }}>
                <label for="radioNo56" class="mr-3 text-danger font-weight-bold">No</label>

                <input type="radio" id="radioOthers56" class="fiftysixstatus" name="is_peacekeeper_steps_q56" value="2"
                    {{ ($q56_checked === '2') ? 'checked' : '' }}>
                <label for="radioOthers56" class="text-danger font-weight-bold">Others [input text box with
                    description]</label>
            </div>

            <!-- Others Input -->
            <div id="others_q56" style="display: {{ ($q56_checked === '2') ? 'block' : 'none' }};">
                <textarea name="others_peacekeeper_q56" class="form-control mt-2 q56-others-input" rows="2"
                    placeholder="Others [input text box with description]">{{ $q56_data['others_peacekeeper'] ?? '' }}</textarea>
            </div>

            <!-- If Yes Section -->
            <div id="yes_extra_q56"
                style="display: {{ (is_null($q56_checked) || $q56_checked === '1') ? 'block' : 'none' }};">
                <p class="font-weight-bold mt-3">If Yes</p>

                <!-- ==================== TABLE 1: Trainees Table ==================== -->
                <h6 class="font-weight-bold text-primary mb-2">1. Number of Trainees</h6>
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="trainees-table-q56">
                        <thead>
                            <tr class="bg-light">
                                <th rowspan="2" style="vertical-align: middle;">Country where posted</th>
                                <th rowspan="2" style="vertical-align: middle;">Description</th>
                                <th colspan="4">Number of Trainees</th>
                                <th rowspan="2" style="vertical-align: middle; width: 80px;">Action</th>
                            </tr>
                            <tr class="bg-light">
                                <th>Men</th>
                                <th>Women</th>
                                <th>TG</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $trainees_rows = $q56_data['trainees_data'] ?? [];
                            $totalTraineeRows = max(3, count($trainees_rows)); // সর্বনিম্ন ৩টি রো থাকবে
                            @endphp

                            @for($i = 0; $i < $totalTraineeRows; $i++) @php $row=$trainees_rows[$i] ?? null; @endphp
                                <tr>
                                <td>
                                    <select name="country_posted_q56[]" class="form-control q56-country">
                                        <option value="">Dropdown</option>
                                        <option value="Bangladesh"
                                            {{ ($row['country'] ?? '') == 'Bangladesh' ? 'selected' : '' }}>Bangladesh
                                        </option>
                                        <option value="Argentina"
                                            {{ ($row['country'] ?? '') == 'Argentina' ? 'selected' : '' }}>Argentina
                                        </option>
                                    </select>
                                </td>
                                <td><input type="text" name="trainee_description_q56[]"
                                        class="form-control q56-trainee-desc" value="{{ $row['description'] ?? '' }}"
                                        placeholder="[Input Text Field]"></td>
                                <td><input type="number" name="trainee_men_q56[]" class="form-control q56-trainee-men"
                                        value="{{ $row['men'] ?? '' }}" min="0"></td>
                                <td><input type="number" name="trainee_women_q56[]"
                                        class="form-control q56-trainee-women" value="{{ $row['women'] ?? '' }}"
                                        min="0"></td>
                                <td><input type="number" name="trainee_tg_q56[]" class="form-control q56-trainee-tg"
                                        value="{{ $row['tg'] ?? '' }}" min="0"></td>
                                <td><input type="number" name="trainee_total_q56[]"
                                        class="form-control q56-trainee-total" value="{{ $row['total'] ?? '' }}"
                                        readonly></td>
                                <td>
                                    @if($i < 2) <span class="badge badge-secondary">Fixed</span>
                                        @elseif($i == 2)
                                        <button type="button"
                                            class="btn btn-sm btn-primary add-trainee-row-q56">+</button>
                                        @else
                                        <button type="button"
                                            class="btn btn-sm btn-danger remove-trainee-row-q56">-</button>
                                        @endif
                                </td>
                                </tr>
                                @endfor
                        </tbody>
                        <tfoot>
                            <tr class="bg-light font-weight-bold">
                                <td colspan="2">Total</td>
                                <td id="grand-trainee-men-q56">0</td>
                                <td id="grand-trainee-women-q56">0</td>
                                <td id="grand-trainee-tg-q56">0</td>
                                <td id="grand-trainee-total-q56" class="text-danger">0</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <small class="text-muted d-block mb-4 font-italic">
                    <strong>Country drop down:</strong> This information is only required of the following countries:
                    Argentina, Austria, Bangladesh, Bhutan, Burundi, Cambodia, Cameroon, China, Congo (Brazzaville),
                    Côte d'Ivoire, Djibouti, Egypt, Ethiopia, Fiji, Finland, France, Germany, Ghana, Greece, Guatemala,
                    India, Indonesia, Ireland, Italy, Jordan, Kazakhstan, Kenya, Malawi, Malaysia, Mauritania, Mongolia,
                    Morocco, Nepal, Nigeria, Pakistan, Peru, Poland, Portugal, Republic of Korea, Rwanda, Senegal,
                    Serbia, Slovakia, South Africa, Spain, Sri Lanka, Tanzania, Thailand, Tunisia, Turkiye, Uganda,
                    United Kingdom, Uruguay, Vietnam, and Zambia.
                </small>

                <!-- ==================== TABLE 2: Official Accused Table ==================== -->
                <h6 class="font-weight-bold text-primary mb-2">2. Number of Official Accused</h6>
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="accused-table-q56">
                        <thead>
                            <tr class="bg-light">
                                <th rowspan="2" style="vertical-align: middle;">Ministry/Department</th>
                                <th colspan="3">Number of Official Accused</th>
                                <th rowspan="2" style="vertical-align: middle;">Measures Taken</th>
                                <th rowspan="2" style="vertical-align: middle; width: 80px;">Action</th>
                            </tr>
                            <tr class="bg-light">
                                <th>Men</th>
                                <th>Women</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $accused_rows = $q56_data['accused_data'] ?? [];
                            $totalAccusedRows = max(3, count($accused_rows)); // সর্বনিম্ন ৩টি রো থাকবে
                            @endphp

                            @for($i = 0; $i < $totalAccusedRows; $i++) @php $row=$accused_rows[$i] ?? null; @endphp <tr>
                                <td><input type="text" name="ministry_dept_q56[]" class="form-control q56-ministry"
                                        value="{{ $row['ministry'] ?? '' }}" placeholder="[Input Text Field]"></td>
                                <td><input type="number" name="accused_men_q56[]" class="form-control q56-accused-men"
                                        value="{{ $row['men'] ?? '' }}" min="0"></td>
                                <td><input type="number" name="accused_women_q56[]"
                                        class="form-control q56-accused-women" value="{{ $row['women'] ?? '' }}"
                                        min="0"></td>
                                <td><input type="number" name="accused_total_q56[]"
                                        class="form-control q56-accused-total" value="{{ $row['total'] ?? '' }}"
                                        readonly></td>
                                <td><input type="text" name="measures_taken_q56[]" class="form-control q56-measures"
                                        value="{{ $row['measures'] ?? '' }}" placeholder="[Input Text Field]"></td>
                                <td>
                                    @if($i < 2) <span class="badge badge-secondary">Fixed</span>
                                        @elseif($i == 2)
                                        <button type="button"
                                            class="btn btn-sm btn-primary add-accused-row-q56">+</button>
                                        @else
                                        <button type="button"
                                            class="btn btn-sm btn-danger remove-accused-row-q56">-</button>
                                        @endif
                                </td>
                                </tr>
                                @endfor
                        </tbody>
                        <tfoot>
                            <tr class="bg-light font-weight-bold">
                                <td>Total</td>
                                <td id="grand-accused-men-q56">0</td>
                                <td id="grand-accused-women-q56">0</td>
                                <td id="grand-accused-total-q56">0</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>

        </div>

        <p class="text-right mr-3">
            <button type="button" class="btn btn-success" id="temp-save-question56">Save</button>
        </p>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    // Radio Toggle Logic
    function toggleq56() {
        let val = $("input[name='is_peacekeeper_steps_q56']:checked").val();

        if (!val) {
            val = '1';
            $('#radioYes56').prop('checked', true);
        }

        if (val === '1') {
            $('#yes_extra_q56').show();
            $('#others_q56').hide();
        } else if (val === '2') {
            $('#yes_extra_q56').hide();
            $('#others_q56').show();
        } else {
            $('#yes_extra_q56').hide();
            $('#others_q56').hide();
        }
    }

    $(document).on('change', '.fiftysixstatus', toggleq56);

    // ==================== TABLE 1 LOGIC (Trainees) ====================
    function calculateQ56TraineesTotals() {
        let grandMen = 0,
            grandWomen = 0,
            grandTg = 0,
            grandTotal = 0;

        $('#trainees-table-q56 tbody tr').each(function() {
            let men = parseInt($(this).find('.q56-trainee-men').val()) || 0;
            let women = parseInt($(this).find('.q56-trainee-women').val()) || 0;
            let tg = parseInt($(this).find('.q56-trainee-tg').val()) || 0;
            let rowTotal = men + women + tg;

            $(this).find('.q56-trainee-total').val(rowTotal);

            grandMen += men;
            grandWomen += women;
            grandTg += tg;
            grandTotal += rowTotal;
        });

        $('#grand-trainee-men-q56').text(grandMen);
        $('#grand-trainee-women-q56').text(grandWomen);
        $('#grand-trainee-tg-q56').text(grandTg);
        $('#grand-trainee-total-q56').text(grandTotal);
    }

    $(document).on('input', '.q56-trainee-men, .q56-trainee-women, .q56-trainee-tg',
        calculateQ56TraineesTotals);

    $(document).on('click', '.add-trainee-row-q56', function() {
        let newRow = `
            <tr>
                <td>
                    <select name="country_posted_q56[]" class="form-control q56-country">
                        <option value="">Dropdown</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Argentina">Argentina</option>
                    </select>
                </td>
                <td><input type="text" name="trainee_description_q56[]" class="form-control q56-trainee-desc" placeholder="[Input Text Field]"></td>
                <td><input type="number" name="trainee_men_q56[]" class="form-control q56-trainee-men" min="0"></td>
                <td><input type="number" name="trainee_women_q56[]" class="form-control q56-trainee-women" min="0"></td>
                <td><input type="number" name="trainee_tg_q56[]" class="form-control q56-trainee-tg" min="0"></td>
                <td><input type="number" name="trainee_total_q56[]" class="form-control q56-trainee-total" readonly></td>
                <td><button type="button" class="btn btn-sm btn-danger remove-trainee-row-q56">-</button></td>
            </tr>`;
        $('#trainees-table-q56 tbody').append(newRow);
    });

    $(document).on('click', '.remove-trainee-row-q56', function() {
        $(this).closest('tr').remove();
        calculateQ56TraineesTotals();
    });

    // ==================== TABLE 2 LOGIC (Accused Officials) ====================
    function calculateQ56AccusedTotals() {
        let grandMen = 0,
            grandWomen = 0,
            grandTotal = 0;

        $('#accused-table-q56 tbody tr').each(function() {
            let men = parseInt($(this).find('.q56-accused-men').val()) || 0;
            let women = parseInt($(this).find('.q56-accused-women').val()) || 0;
            let rowTotal = men + women;

            $(this).find('.q56-accused-total').val(rowTotal);

            grandMen += men;
            grandWomen += women;
            grandTotal += rowTotal;
        });

        $('#grand-accused-men-q56').text(grandMen);
        $('#grand-accused-women-q56').text(grandWomen);
        $('#grand-accused-total-q56').text(grandTotal);
    }

    $(document).on('input', '.q56-accused-men, .q56-accused-women', calculateQ56AccusedTotals);

    $(document).on('click', '.add-accused-row-q56', function() {
        let newRow = `
            <tr>
                <td><input type="text" name="ministry_dept_q56[]" class="form-control q56-ministry" placeholder="[Input Text Field]"></td>
                <td><input type="number" name="accused_men_q56[]" class="form-control q56-accused-men" min="0"></td>
                <td><input type="number" name="accused_women_q56[]" class="form-control q56-accused-women" min="0"></td>
                <td><input type="number" name="accused_total_q56[]" class="form-control q56-accused-total" readonly></td>
                <td><input type="text" name="measures_taken_q56[]" class="form-control q56-measures" placeholder="[Input Text Field]"></td>
                <td><button type="button" class="btn btn-sm btn-danger remove-accused-row-q56">-</button></td>
            </tr>`;
        $('#accused-table-q56 tbody').append(newRow);
    });

    $(document).on('click', '.remove-accused-row-q56', function() {
        $(this).closest('tr').remove();
        calculateQ56AccusedTotals();
    });

    // Initial Calculation Run
    calculateQ56TraineesTotals();
    calculateQ56AccusedTotals();

    // ==================== TEMP SAVE AJAX REQUEST ====================
    $(document).on("click", "#temp-save-question56", function() {
        let checkedValue = $("input[name='is_peacekeeper_steps_q56']:checked").val();

        // Table 1 Data
        let traineesData = [];
        $('#trainees-table-q56 tbody tr').each(function() {
            let country = $(this).find('.q56-country').val();
            let description = $(this).find('.q56-trainee-desc').val();
            let men = $(this).find('.q56-trainee-men').val();
            let women = $(this).find('.q56-trainee-women').val();
            let tg = $(this).find('.q56-trainee-tg').val();
            let total = $(this).find('.q56-trainee-total').val();

            if (country || description || men || women || tg) {
                traineesData.push({
                    country: country,
                    description: description,
                    men: men,
                    women: women,
                    tg: tg,
                    total: total
                });
            }
        });

        // Table 2 Data
        let accusedData = [];
        $('#accused-table-q56 tbody tr').each(function() {
            let ministry = $(this).find('.q56-ministry').val();
            let men = $(this).find('.q56-accused-men').val();
            let women = $(this).find('.q56-accused-women').val();
            let total = $(this).find('.q56-accused-total').val();
            let measures = $(this).find('.q56-measures').val();

            if (ministry || men || women || measures) {
                accusedData.push({
                    ministry: ministry,
                    men: men,
                    women: women,
                    total: total,
                    measures: measures
                });
            }
        });

        let q56_data = {
            peacekeeper_steps: $('.q56-desc-input').val(),
            others_peacekeeper: $('.q56-others-input').val(),
            trainees_data: traineesData,
            accused_data: accusedData
        };

        let new_data = {
            q56_checked_value: checkedValue,
            q56_data: q56_data
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                _token: "{{ csrf_token() }}",
                question_no: 56,
                question56: new_data
            },
            success: function(response) {
                if (response.success || response) {
                    $('.question56 .card-header h6').css('color', 'blue');
                    alert("Question 56 Temp Saved Successfully");
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