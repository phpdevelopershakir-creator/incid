@if (($questiontitles[17]->status ?? null) == 1)
@php
$question_18_data = session()->get('question18');
$q18_checked = isset($question_18_data['q18_checked_value']) ? (string)$question_18_data['q18_checked_value'] : null;
$q18_data = $question_18_data['q18_data'] ?? null;

try {
$districts = \DB::table('districts')->pluck('name', 'id')->toArray();
} catch (\Exception $e) {
$districts = \DB::table('districs')->pluck('name', 'id')->toArray();
}

// Categories array
$categories = [
'Social Worker' => 'Social Worker',
'Law Enforcement' => 'Law Enforcement',
'NGO Worker' => 'NGO Worker',
'Government Official' => 'Government Official',
'Legal Counsel' => 'Legal Counsel',
'Other' => 'Other'
];
@endphp

<div class="card question18">
    <div class="card-header">
        <h6 style="color: {{ !empty($question_18_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-18" aria-expanded="false" aria-controls="Question-18">
                18. {{ $questiontitles[17]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-18" class="collapse" role="tabpanel" aria-labelledby="heading-17" data-parent="#accordion-2">
        <div class="card-body">

            <!-- Radio Options -->
            <div class="form-group mb-3">
                <input type="radio" id="radioYes18" class="eighteenstatus" name="is_complicit_official_q18" value="1"
                    {{ (is_null($q18_checked) || $q18_checked === '1') ? 'checked' : '' }}>
                <label for="radioYes18" class="mr-3 font-weight-bold">Yes</label>

                <input type="radio" id="radioNo18" class="eighteenstatus" name="is_complicit_official_q18" value="0"
                    {{ ($q18_checked === '0') ? 'checked' : '' }}>
                <label for="radioNo18" class="mr-3 font-weight-bold">No</label>

                <input type="radio" id="radioOthers18" class="eighteenstatus" name="is_complicit_official_q18" value="2"
                    {{ ($q18_checked === '2') ? 'checked' : '' }}>
                <label for="radioOthers18" class="font-weight-bold">Others</label>
            </div>

            <!-- YES SECTION: TABLE WITH DYNAMIC ADD ROW -->
            <div id="yes_extra_q18"
                style="display: {{ (is_null($q18_checked) || $q18_checked === '1') ? 'block' : 'none' }};">
                <div class="table-responsive">
                    <table class="table table-bordered text-center align-middle" id="table-q18">
                        <thead>
                            <tr class="bg-light">
                                <th rowspan="2" class="align-middle">Location</th>
                                <th rowspan="2" class="align-middle">Category</th>
                                <th colspan="3">Number of personnel Trained</th>
                                <th rowspan="2" class="align-middle" style="width: 80px;">Add row</th>
                            </tr>
                            <tr class="bg-light">
                                <th>Men</th>
                                <th>Women</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="q18-tbody">
                            @php
                            $rows = $q18_data['rows'] ?? [[]];
                            if(count($rows) == 0) { $rows = [[]]; }
                            @endphp

                            @foreach($rows as $rIndex => $row)
                            <tr class="q18-row">
                                <td>
                                    <select name="q18_district_id[]" class="form-control q18-district">
                                        <option value="">Select District</option>
                                        @foreach($districts as $id => $name)
                                        <option value="{{ $id }}"
                                            {{ ($row['district_id'] ?? '') == $id ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <!-- Category Dropdown -->
                                    <select name="q18_category[]" class="form-control q18-category">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $catKey => $catVal)
                                        <option value="{{ $catKey }}"
                                            {{ ($row['category'] ?? '') == $catKey ? 'selected' : '' }}>
                                            {{ $catVal }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="q18_men[]" class="form-control q18-men" placeholder="0"
                                        value="{{ $row['men'] ?? '' }}" min="0">
                                </td>
                                <td>
                                    <input type="number" name="q18_women[]" class="form-control q18-women"
                                        placeholder="0" value="{{ $row['women'] ?? '' }}" min="0">
                                </td>
                                <td>
                                    <input type="number" name="q18_total[]" class="form-control q18-total bg-light"
                                        placeholder="0" value="{{ $row['total'] ?? '0' }}" readonly>
                                </td>
                                <td>
                                    @if($loop->first)
                                    <button type="button" class="btn btn-sm btn-primary add-row-q18">+</button>
                                    @else
                                    <button type="button" class="btn btn-sm btn-danger remove-row-q18">-</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- NO SECTION: INPUT TEXT BOX -->
            <div id="no_q18" style="display: {{ ($q18_checked === '0') ? 'block' : 'none' }};">
                <textarea name="no_complicit_official_q18" class="form-control mt-2 q18-no-input" rows="3"
                    placeholder="Please describe">{{ $q18_data['no_details'] ?? '' }}</textarea>
            </div>

            <!-- OTHERS SECTION: INPUT TEXT BOX -->
            <div id="others_q18" style="display: {{ ($q18_checked === '2') ? 'block' : 'none' }};">
                <textarea name="others_complicit_official_q18" class="form-control mt-2 q18-others-input" rows="3"
                    placeholder="Please describe">{{ $q18_data['others'] ?? '' }}</textarea>
            </div>

            <!-- BOTTOM DROPDOWN SECTION -->
            <div class="form-group mt-4">
                <label class="font-weight-bold">
                    If victims were referred to NGO facilities, describe the NGOs' assessment of the government referral
                    process.
                </label>
                <select name="q18_ngo_assessment" class="form-control q18-ngo-assessment">
                    <option value="">Choose an Item</option>
                    @php $ngoVal = $q18_data['ngo_assessment'] ?? ''; @endphp
                    <option value="Excellent" {{ $ngoVal == 'Excellent' ? 'selected' : '' }}>Excellent</option>
                    <option value="Good" {{ $ngoVal == 'Good' ? 'selected' : '' }}>Good</option>
                    <option value="Fair" {{ $ngoVal == 'Fair' ? 'selected' : '' }}>Fair</option>
                    <option value="Poor" {{ $ngoVal == 'Poor' ? 'selected' : '' }}>Poor</option>
                    <option value="Extremely Poor" {{ $ngoVal == 'Extremely Poor' ? 'selected' : '' }}>Extremely Poor
                    </option>
                    <option value="Non-Functional" {{ $ngoVal == 'Non-Functional' ? 'selected' : '' }}>Non-Functional
                    </option>
                </select>
            </div>

        </div>

        <p class="text-right mr-3">
            <button type="button" class="btn btn-success" id="temp-save-question18">Save</button>
        </p>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    // District options for dynamic JS row creation
    var districtOptions = '<option value="">Select District</option>';
    @foreach($districts as $id => $name)
    districtOptions += '<option value="{{ $id }}">{{ addslashes($name) }}</option>';
    @endforeach

    // Category options for dynamic JS row creation
    var categoryOptions = '<option value="">Select Category</option>';
    @foreach($categories as $catKey => $catVal)
    categoryOptions += '<option value="{{ $catKey }}">{{ addslashes($catVal) }}</option>';
    @endforeach

    // Radio Toggle Logic
    function toggleq18() {
        let val = $("input[name='is_complicit_official_q18']:checked").val();

        if (!val) {
            val = '1';
            $('#radioYes18').prop('checked', true);
        }

        $('#yes_extra_q18').hide();
        $('#no_q18').hide();
        $('#others_q18').hide();

        if (val === '1') {
            $('#yes_extra_q18').show();
        } else if (val === '0') {
            $('#no_q18').show();
        } else if (val === '2') {
            $('#others_q18').show();
        }
    }

    $(document).on('change', '.eighteenstatus', toggleq18);

    // Dynamic Total Calculation (Men + Women)
    $(document).on('input', '.q18-men, .q18-women', function() {
        let row = $(this).closest('tr');
        let men = parseInt(row.find('.q18-men').val()) || 0;
        let women = parseInt(row.find('.q18-women').val()) || 0;
        row.find('.q18-total').val(men + women);
    });

    // Add Row Event
    $(document).on('click', '.add-row-q18', function(e) {
        e.preventDefault();
        var rowHtml =
            '<tr class="q18-row">' +
            '<td><select name="q18_district_id[]" class="form-control q18-district">' +
            districtOptions + '</select></td>' +
            '<td><select name="q18_category[]" class="form-control q18-category">' + categoryOptions +
            '</select></td>' +
            '<td><input type="number" name="q18_men[]" class="form-control q18-men" placeholder="0" min="0"></td>' +
            '<td><input type="number" name="q18_women[]" class="form-control q18-women" placeholder="0" min="0"></td>' +
            '<td><input type="number" name="q18_total[]" class="form-control q18-total bg-light" placeholder="0" readonly></td>' +
            '<td><button type="button" class="btn btn-sm btn-danger remove-row-q18">-</button></td>' +
            '</tr>';
        $('#q18-tbody').append(rowHtml);
    });

    // Remove Row Event
    $(document).on('click', '.remove-row-q18', function(e) {
        e.preventDefault();
        $(this).closest('tr').remove();
    });

    // Temp Save AJAX Logic
    $(document).on("click", "#temp-save-question18", function() {
        let checkedValue = $("input[name='is_complicit_official_q18']:checked").val();
        let q18_data = {};

        if (checkedValue == '1') {
            let tableRows = [];
            $('.q18-row').each(function() {
                let districtId = $(this).find('.q18-district').val();
                let category = $(this).find('.q18-category').val();
                let men = $(this).find('.q18-men').val();
                let women = $(this).find('.q18-women').val();
                let total = $(this).find('.q18-total').val();

                if (districtId || category || men || women) {
                    tableRows.push({
                        district_id: districtId,
                        category: category,
                        men: men,
                        women: women,
                        total: total
                    });
                }
            });
            q18_data.rows = tableRows;
        } else if (checkedValue == '0') {
            q18_data.no_details = $('.q18-no-input').val();
        } else if (checkedValue == '2') {
            q18_data.others = $('.q18-others-input').val();
        }

        // Bottom NGO Assessment Dropdown Save
        q18_data.ngo_assessment = $('.q18-ngo-assessment').val();

        let new_data = {
            q18_checked_value: checkedValue,
            q18_data: q18_data
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                _token: "{{ csrf_token() }}",
                question_no: 18,
                question18: new_data
            },
            success: function(response) {
                if (response.success || response) {
                    $('.question18 .card-header h6').css('color', 'blue');
                    alert("Question 18 Saved Temp");
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