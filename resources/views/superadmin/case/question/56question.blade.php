@if (($questiontitles[55]->status ?? null) == 1)
@php
$question_56_data = session()->get('question56');$q56_checked = isset($question_56_data['q56_checked_value']) ?
(string)$question_56_data['q56_checked_value'] : null;
$q56_data =$question_56_data['q56_data'] ?? null;
$countries = [
"AF" => "Afghanistan", "AX" => "Aland Islands", "AL" => "Albania", "DZ" => "Algeria",
"AS" => "American Samoa", "AD" => "Andorra", "AO" => "Angola", "AI" => "Anguilla",
"AQ" => "Antarctica", "AG" => "Antigua and Barbuda", "AR" => "Argentina", "AM" => "Armenia",
"AW" => "Aruba", "AU" => "Australia", "AT" => "Austria", "AZ" => "Azerbaijan",
"BS" => "Bahamas", "BH" => "Bahrain", "BD" => "Bangladesh", "BB" => "Barbados",
"BY" => "Belarus", "BE" => "Belgium", "BZ" => "Belize", "BJ" => "Benin",
"BM" => "Bermuda", "BT" => "Bhutan", "BO" => "Bolivia", "BQ" => "Bonaire",
"BA" => "Bosnia and Herzegovina", "BW" => "Botswana", "BV" => "Bouvet Island", "BR" => "Brazil",
"IO" => "British Indian Ocean Territory", "BN" => "Brunei Darussalam", "BG" => "Bulgaria",
"BF" => "Burkina Faso", "BI" => "Burundi", "KH" => "Cambodia", "CM" => "Cameroon",
"CA" => "Canada", "CV" => "Cape Verde", "KY" => "Cayman Islands", "CF" => "Central African Republic",
"TD" => "Chad", "CL" => "Chile", "CN" => "China", "CX" => "Christmas Island",
"CC" => "Cocos Islands", "CO" => "Colombia", "KM" => "Comoros", "CG" => "Congo",
"CD" => "Congo Democratic Republic", "CK" => "Cook Islands", "CR" => "Costa Rica",
"CI" => "Cote d'Ivoire", "HR" => "Croatia", "CU" => "Cuba", "CW" => "Curaçao",
"CY" => "Cyprus", "CZ" => "Czech Republic", "DK" => "Denmark", "DJ" => "Djibouti",
"DM" => "Dominica", "DO" => "Dominican Republic", "EC" => "Ecuador", "EG" => "Egypt",
"SV" => "El Salvador", "GQ" => "Equatorial Guinea", "ER" => "Eritrea", "EE" => "Estonia",
"ET" => "Ethiopia", "FK" => "Falkland Islands", "FO" => "Faroe Islands", "FJ" => "Fiji",
"FI" => "Finland", "FR" => "France", "GF" => "French Guiana", "PF" => "French Polynesia",
"TF" => "French Southern Territories", "GA" => "Gabon", "GM" => "Gambia", "GE" => "Georgia",
"DE" => "Germany", "GH" => "Ghana", "GI" => "Gibraltar", "GR" => "Greece",
"GL" => "Greenland", "GD" => "Grenada", "GP" => "Guadeloupe", "GU" => "Guam",
"GT" => "Guatemala", "GG" => "Guernsey", "GN" => "Guinea", "GW" => "Guinea-Bissau",
"GY" => "Guyana", "HT" => "Haiti", "HM" => "Heard Island", "VA" => "Vatican City",
"HN" => "Honduras", "HK" => "Hong Kong", "HU" => "Hungary", "IS" => "Iceland",
"IN" => "India", "ID" => "Indonesia", "IR" => "Iran", "IQ" => "Iraq",
"IE" => "Ireland", "IM" => "Isle of Man", "IL" => "Israel", "IT" => "Italy",
"JM" => "Jamaica", "JP" => "Japan", "JE" => "Jersey", "JO" => "Jordan",
"KZ" => "Kazakhstan", "KE" => "Kenya", "KI" => "Kiribati", "KP" => "Korea North",
"KR" => "Korea South", "KW" => "Kuwait", "KG" => "Kyrgyzstan", "LA" => "Laos",
"LV" => "Latvia", "LB" => "Lebanon", "LS" => "Lesotho", "LR" => "Liberia",
"LY" => "Libya", "LI" => "Liechtenstein", "LT" => "Lithuania", "LU" => "Luxembourg",
"MO" => "Macao", "MK" => "Macedonia", "MG" => "Madagascar", "MW" => "Malawi",
"MY" => "Malaysia", "MV" => "Maldives", "ML" => "Mali", "MT" => "Malta",
"MH" => "Marshall Islands", "MQ" => "Martinique", "MR" => "Mauritania", "MU" => "Mauritius",
"YT" => "Mayotte", "MX" => "Mexico", "FM" => "Micronesia", "MD" => "Moldova",
"MC" => "Monaco", "MN" => "Mongolia", "ME" => "Montenegro", "MS" => "Montserrat",
"MA" => "Morocco", "MZ" => "Mozambique", "MM" => "Myanmar", "NA" => "Namibia",
"NR" => "Nauru", "NP" => "Nepal", "NL" => "Netherlands", "NC" => "New Caledonia",
"NZ" => "New Zealand", "NI" => "Nicaragua", "NE" => "Niger", "NG" => "Nigeria",
"NU" => "Niue", "NF" => "Norfolk Island", "MP" => "Northern Mariana Islands", "NO" => "Norway",
"OM" => "Oman", "PK" => "Pakistan", "PW" => "Palau", "PS" => "Palestine",
"PA" => "Panama", "PG" => "Papua New Guinea", "PY" => "Paraguay", "PE" => "Peru",
"PH" => "Philippines", "PN" => "Pitcairn", "PL" => "Poland", "PT" => "Portugal",
"PR" => "Puerto Rico", "QA" => "Qatar", "RE" => "Reunion", "RO" => "Romania",
"RW" => "Rwanda", "BL" => "Saint Barthelemy", "SH" => "Saint Helena", "KN" => "Saint Kitts and Nevis",
"LC" => "Saint Lucia", "MF" => "Saint Martin", "PM" => "Saint Pierre and Miquelon", "VC" => "Saint Vincent and the
Grenadines", "WS" => "Samoa", "SM" => "San Marino",
"ST" => "Sao Tome and Principe", "SA" => "Saudi Arabia", "SN" => "Senegal", "RS" => "Serbia",
"SC" => "Seychelles", "SL" => "Sierra Leone", "SG" => "Singapore", "SX" => "Sint Maarten",
"SK" => "Slovakia", "SI" => "Slovenia", "SB" => "Solomon Islands", "SO" => "Somalia",
"ZA" => "South Africa", "GS" => "South Georgia", "SS" => "South Sudan", "ES" => "Spain",
"LK" => "Sri Lanka", "SD" => "Sudan", "SR" => "Suriname", "SJ" => "Svalbard and Jan Mayen",
"SZ" => "Swaziland", "SE" => "Sweden", "CH" => "Switzerland", "SY" => "Syria",
"TW" => "Taiwan", "TJ" => "Tajikistan", "TZ" => "Tanzania", "TH" => "Thailand",
"TL" => "Timor-Leste", "TG" => "Togo", "TK" => "Tokelau", "TO" => "Tonga",
"TT" => "Trinidad and Tobago", "TN" => "Tunisia", "TR" => "Turkey", "TM" => "Turkmenistan",
"TC" => "Turks and Caicos Islands", "TV" => "Tuvalu", "UG" => "Uganda", "UA" => "Ukraine",
"AE" => "United Arab Emirates", "GB" => "United Kingdom", "US" => "United States",
"UM" => "United States Minor Outlying Islands", "UY" => "Uruguay", "UZ" => "Uzbekistan",
"VU" => "Vanuatu", "VE" => "Venezuela", "VN" => "Viet Nam", "VG" => "Virgin Islands British",
"VI" => "Virgin Islands US", "WF" => "Wallis and Futuna", "EH" => "Western Sahara",
"YE" => "Yemen", "ZM" => "Zambia", "ZW" => "Zimbabwe"
];
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

            <div class="form-group">
                <label class="font-weight-bold">
                    In instances of trafficking allegations filed against peacekeepers, what steps did the
                    government take to hold perpetrators accountable and prevent future incidents?
                </label>
                <textarea name="desctiption_instances_trafficking_q56" class="form-control q56-desc-input" rows="3"
                    placeholder="Please describe">{{ $q56_data['peacekeeper_steps'] ?? '' }}</textarea>
            </div>

            <div class="form-group mb-2">
                <input type="radio" id="radioYes56" class="fiftysixstatus" name="is_instances_trafficking_q56" value="1"
                    {{ (is_null($q56_checked) or$q56_checked === '1') ? 'checked' : '' }}>
                <label for="radioYes56" class="mr-3 font-weight-bold">Yes</label>

                <input type="radio" id="radioNo56" class="fiftysixstatus" name="is_instances_trafficking_q56" value="0"
                    {{ ($q56_checked === '0') ? 'checked' : '' }}>
                <label for="radioNo56" class="mr-3 font-weight-bold">No</label>

                <input type="radio" id="radioOthers56" class="fiftysixstatus" name="is_instances_trafficking_q56"
                    value="2" {{ ($q56_checked === '2') ? 'checked' : '' }}>
                <label for="radioOthers56" class="font-weight-bold">Others </label>
            </div>

            <div id="others_q56" style="display: {{ ($q56_checked === '2') ? 'block' : 'none' }};">
                <textarea name="other_instances_trafficking_q56" class="form-control mt-2 q56-others-input" rows="2"
                    placeholder="Please describe">{{ $q56_data['others_peacekeeper'] ?? '' }}</textarea>
            </div>

            <!-- Used PHP 'or' keyword instead of symbols -->
            <div id="yes_extra_q56"
                style="display: {{ (is_null($q56_checked) or$q56_checked === '1') ? 'block' : 'none' }};">

                <!-- Table 1: Trainees Table -->

                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="trainees-table-q56">
                        <thead>
                            <tr class="bg-light">
                                <th rowspan="2" class="align-middle">Country where posted</th>
                                <th rowspan="2" class="align-middle">Description</th>
                                <th colspan="4">Number of Trainees</th>
                                <th rowspan="2" class="align-middle" style="width: 80px;">Add row</th>
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
                            $trainees_rows =$q56_data['trainees_data'] ?? [];
                            $totalTraineeRows = max(3, count($trainees_rows));
                            @endphp

                            @for($i = 0; $i < $totalTraineeRows; $i++) @php $row=$trainees_rows[$i] ?? null; @endphp
                                <tr>
                                <td>
                                    <select name="instances_trafficking_country_q56[]" class="form-control q56-country">
                                        <option value="">Country Selected</option>
                                        @foreach($countries as $code =>$name)
                                        <option value="{{ $name }}"
                                            {{ ($row['country'] ?? '') ==$name ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="instances_trafficking_desc_q56[]"
                                        class="form-control q56-trainee-desc" value="{{ $row['description'] ?? '' }}"
                                        placeholder="Please describe">
                                </td>
                                <td>
                                    <input type="number" name="instances_trafficking_men_q56[]"
                                        class="form-control q56-trainee-men" value="{{ $row['men'] ?? '' }}" min="0">
                                </td>
                                <td>
                                    <input type="number" name="instances_trafficking_women_q56[]"
                                        class="form-control q56-trainee-women" value="{{ $row['women'] ?? '' }}"
                                        min="0">
                                </td>
                                <td>
                                    <input type="number" name="instances_trafficking_tg_q56[]"
                                        class="form-control q56-trainee-tg" value="{{ $row['tg'] ?? '' }}" min="0">
                                </td>
                                <td>
                                    <input type="number" name="instances_trafficking_total_q56[]"
                                        class="form-control q56-trainee-total" value="{{ $row['total'] ?? '' }}"
                                        readonly>
                                </td>
                                <td>
                                    @if($i < 2) <span class="badge badge-secondary"></span>
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
                                <td id="grand-trainee-total-q56">0</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Table 2: Single Row Table -->
                <br>
                <h6 class="font-weight-bold text-primary mb-2">2. Official Accused Details</h6>
                <div class="table-responsive">
                    <table class="table table-bordered align-items-center" id="accused-table-q56">
                        <thead>
                            <tr class="bg-light text-center">
                                <th style="width: 40%; vertical-align: middle;">Title / Subject</th>
                                <th style="width: 60%; vertical-align: middle;">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle">
                                    <p class="font-weight-bold mb-0 text-dark">
                                        Steps taken by the government to hold perpetrators accountable and prevent
                                        future incidents:
                                    </p>
                                </td>
                                <td>
                                    <textarea name="instances_trafficking_measures_q56b"
                                        class="form-control q56-measures" rows="3"
                                        placeholder="Please describe details here...">{{ $q56_data['accused_measures'] ?? '' }}</textarea>
                                </td>
                            </tr>
                        </tbody>
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
    function toggleq56() {
        let val = $("input[name='is_instances_trafficking_q56']:checked").val();

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

    // Table 1 Calculation
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
                    <select name="instances_trafficking_country_q56[]" class="form-control q56-country">
                        <option value="">Country Selected</option>
                        @foreach($countries as $code => $name)
                            <option value="{{ $name }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </td>
                <td><input type="text" name="instances_trafficking_desc_q56[]" class="form-control q56-trainee-desc" placeholder="Please describe"></td>
                <td><input type="number" name="instances_trafficking_men_q56[]" class="form-control q56-trainee-men" min="0"></td>
                <td><input type="number" name="instances_trafficking_women_q56[]" class="form-control q56-trainee-women" min="0"></td>
                <td><input type="number" name="instances_trafficking_tg_q56[]" class="form-control q56-trainee-tg" min="0"></td>
                <td><input type="number" name="instances_trafficking_total_q56[]" class="form-control q56-trainee-total" readonly></td>
                <td><button type="button" class="btn btn-sm btn-danger remove-trainee-row-q56">-</button></td>
            </tr>`;
        $('#trainees-table-q56 tbody').append(newRow);
    });

    $(document).on('click', '.remove-trainee-row-q56', function() {
        $(this).closest('tr').remove();
        calculateQ56TraineesTotals();
    });

    calculateQ56TraineesTotals();

    // AJAX Temp Save
    $(document).on("click", "#temp-save-question56", function() {
        let checkedValue = $("input[name='is_instances_trafficking_q56']:checked").val();

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

        let q56_data = {
            peacekeeper_steps: $('.q56-desc-input').val(),
            others_peacekeeper: $('.q56-others-input').val(),
            trainees_data: traineesData,
            accused_measures: $('.q56-measures').val()
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
                    alert("Question 56 Temp Saved");
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