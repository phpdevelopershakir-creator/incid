@if (($questiontitles[39]->status ?? null) == 1)
@php
// সেশন থেকে ৪০ নম্বর প্রশ্নের ডাটা নেওয়া হচ্ছে
$question_40_data = session()->get('question40');
$q40_checked = isset($question_40_data['q40_checked_value']) ? (string)$question_40_data['q40_checked_value'] : null;
$q40_data = $question_40_data['q40_data'] ?? null;
@endphp

<div class="card question40">
    <div class="card-header" id="heading-40">
        <h6 style="color: {{ !empty($question_40_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-40" aria-expanded="false" aria-controls="Question-40">
                40. {{ $questiontitles[39]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-40" class="collapse" role="tabpanel" aria-labelledby="heading-40" data-parent="#accordion-2">
        <div class="card-body">

            <!-- Question 40 Main Field -->
            <div class="form-group">
                <label class="font-weight-bold">Could victims file civil suits against traffickers for
                    damages?</label>
                <textarea name="civil_suits_description_q40" class="form-control q40-desc-input" rows="3"
                    placeholder="Please describe-">{{ $q40_data['civil_suits_description'] ?? '' }}</textarea>
            </div>

            <!-- Radio Options -->
            <div class="form-group mb-2">
                <label class="font-weight-bold d-block">Does the government provide information or legal support for
                    victims to pursue a civil suit?</label>

                <input type="radio" id="radioYes40" class="fortystatus" name="is_legal_support_q40" value="1"
                    {{ (is_null($q40_checked) || $q40_checked === '1') ? 'checked' : '' }}>
                <label for="radioYes40" class="mr-3 text-danger font-weight-bold">Yes</label>

                <input type="radio" id="radioNo40" class="fortystatus" name="is_legal_support_q40" value="0"
                    {{ ($q40_checked === '0') ? 'checked' : '' }}>
                <label for="radioNo40" class="mr-3 text-danger font-weight-bold">No</label>

                <input type="radio" id="radioOthers40" class="fortystatus" name="is_legal_support_q40" value="2"
                    {{ ($q40_checked === '2') ? 'checked' : '' }}>
                <label for="radioOthers40" class="text-danger font-weight-bold">Others</label>
            </div>

            <!-- Others Input -->
            <div id="others_q40" style="display: {{ ($q40_checked === '2') ? 'block' : 'none' }};">
                <textarea name="others_legal_support_q40" class="form-control mt-2 q40-others-input" rows="2"
                    placeholder="Others [input text box with description]">{{ $q40_data['others_legal_support'] ?? '' }}</textarea>
            </div>

            <!-- If Yes Section -->
            <div id="yes_extra_q40"
                style="display: {{ (is_null($q40_checked) || $q40_checked === '1') ? 'block' : 'none' }};">
                <p class="font-weight-bold mt-3">If Yes</p>

                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="civil-suit-table-q40">
                        <thead>
                            <tr class="bg-light">
                                <th rowspan="2" style="vertical-align: middle;">Location</th>
                                <th colspan="3">Number of Victims pursuing civil suit</th>
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
                            $rows = $q40_data['victims_data'] ?? [];
                            $totalRows = max(2, count($rows)); // সর্বনিম্ন ২ টা রো দেখাবে
                            @endphp

                            @for($i = 0; $i < $totalRows; $i++) @php $row=$rows[$i] ?? null; @endphp <tr>
                                <td>
                                    <select name="location_q40[]" class="form-control q40-location">
                                        <option value="">Choose Location</option>
                                        <option value="Dhaka"
                                            {{ ($row['location'] ?? '') == 'Dhaka' ? 'selected' : '' }}>Dhaka</option>
                                        <option value="Chittagong"
                                            {{ ($row['location'] ?? '') == 'Chittagong' ? 'selected' : '' }}>Chittagong
                                        </option>
                                    </select>
                                </td>
                                <td><input type="number" name="men_q40[]" class="form-control q40-men"
                                        value="{{ $row['men'] ?? '' }}" min="0"></td>
                                <td><input type="number" name="women_q40[]" class="form-control q40-women"
                                        value="{{ $row['women'] ?? '' }}" min="0"></td>
                                <td><input type="number" name="total_q40[]" class="form-control q40-total"
                                        value="{{ $row['total'] ?? '' }}" readonly></td>
                                <td>
                                    @if($i == 0)
                                    <!-- ১ম রো ফিক্সড -->
                                    <span class="badge badge-secondary">Fixed</span>
                                    @elseif($i == 1)
                                    <!-- ২য় রো ফিক্সড ও নতুন রো যোগ করার বাটন -->
                                    <button type="button" class="btn btn-sm btn-primary add-row-q40">+</button>
                                    @else
                                    <!-- ৩ নম্বর রো থেকে ডায়নামিক রিমুভ বাটন -->
                                    <button type="button" class="btn btn-sm btn-danger remove-row-q40">-</button>
                                    @endif
                                </td>
                                </tr>
                                @endfor
                        </tbody>
                        <tfoot>
                            <tr class="bg-light font-weight-bold">
                                <td>Total Result</td>
                                <td id="grand-total-men-q40">0</td>
                                <td id="grand-total-women-q40">0</td>
                                <td id="grand-total-q40">0</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Location Not Specify Input -->
                <div class="form-group mt-2">
                    <label class="text-danger font-weight-bold">Location Not specify :</label>
                    <textarea name="location_not_specified_q40" class="form-control q40-location-not-specified" rows="2"
                        placeholder="[input text box with description]">{{ $q40_data['location_not_specified'] ?? '' }}</textarea>
                </div>
            </div>

        </div>

        <p class="text-right mr-3">
            <button type="button" class="btn btn-success" id="temp-save-question40">Save</button>
        </p>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    // Radio Toggle Logic
    function toggleq40() {
        let val = $("input[name='is_legal_support_q40']:checked").val();

        if (!val) {
            val = '1';
            $('#radioYes40').prop('checked', true);
        }

        if (val === '1') {
            $('#yes_extra_q40').show();
            $('#others_q40').hide();
        } else if (val === '2') {
            $('#yes_extra_q40').hide();
            $('#others_q40').show();
        } else {
            $('#yes_extra_q40').hide();
            $('#others_q40').hide();
        }
    }

    $(document).on('change', '.fortystatus', toggleq40);

    // Calculate Row and Grand Total
    function calculateQ40Totals() {
        let grandMen = 0;
        let grandWomen = 0;
        let grandTotal = 0;

        $('#civil-suit-table-q40 tbody tr').each(function() {
            let men = parseInt($(this).find('.q40-men').val()) || 0;
            let women = parseInt($(this).find('.q40-women').val()) || 0;
            let rowTotal = men + women;

            $(this).find('.q40-total').val(rowTotal);

            grandMen += men;
            grandWomen += women;
            grandTotal += rowTotal;
        });

        $('#grand-total-men-q40').text(grandMen);
        $('#grand-total-women-q40').text(grandWomen);
        $('#grand-total-q40').text(grandTotal);
    }

    $(document).on('input', '.q40-men, .q40-women', calculateQ40Totals);

    // Add Row Logic (প্রথম ২টি রো রেখে নিচে ৩য় রো বা তার পরে রিমুভ বাটনসহ নতুন রো যুক্ত করবে)
    $(document).on('click', '.add-row-q40', function() {
        let newRow = `
            <tr>
                <td>
                    <select name="location_q40[]" class="form-control q40-location">
                        <option value="">Choose Location</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Chittagong">Chittagong</option>
                    </select>
                </td>
                <td><input type="number" name="men_q40[]" class="form-control q40-men" min="0"></td>
                <td><input type="number" name="women_q40[]" class="form-control q40-women" min="0"></td>
                <td><input type="number" name="total_q40[]" class="form-control q40-total" readonly></td>
                <td><button type="button" class="btn btn-sm btn-danger remove-row-q40">-</button></td>
            </tr>`;
        $('#civil-suit-table-q40 tbody').append(newRow);
    });

    // Remove Row (শুধু ৩ নম্বর বা তার পরের রো গুলা ডিলিট হতে পারবে)
    $(document).on('click', '.remove-row-q40', function() {
        $(this).closest('tr').remove();
        calculateQ40Totals();
    });

    // Initial Calculation Run
    calculateQ40Totals();

    // Temp Save AJAX Request
    $(document).on("click", "#temp-save-question40", function() {
        let checkedValue = $("input[name='is_legal_support_q40']:checked").val();
        let victimsData = [];

        $('#civil-suit-table-q40 tbody tr').each(function() {
            let location = $(this).find('.q40-location').val();
            let men = $(this).find('.q40-men').val();
            let women = $(this).find('.q40-women').val();
            let total = $(this).find('.q40-total').val();

            if (location || men || women) {
                victimsData.push({
                    location: location,
                    men: men,
                    women: women,
                    total: total
                });
            }
        });

        let q40_data = {
            civil_suits_description: $('.q40-desc-input').val(),
            others_legal_support: $('.q40-others-input').val(),
            victims_data: victimsData,
            location_not_specified: $('.q40-location-not-specified').val()
        };

        let new_data = {
            q40_checked_value: checkedValue,
            q40_data: q40_data
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                _token: "{{ csrf_token() }}",
                question_no: 40,
                question40: new_data
            },
            success: function(response) {
                if (response.success || response) {
                    $('.question40 .card-header h6').css('color', 'blue');
                    alert("Question 40 Temp Saved Successfully");
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