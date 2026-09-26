@if (($questiontitles[39]->status ?? null) == 1)
@php
$question_40_data = session()->get('question40');
$q40_checked = isset($question_40_data['q40_checked_value']) ? (string)$question_40_data['q40_checked_value'] : null;
$q40_data = $question_40_data['q40_data'] ?? null;

$district_Lists = [
1 => "Bagerhat", 2 => "Bandarban", 3 => "Barguna", 4 => "Barishal",
5 => "Bhola", 6 => "Bogura", 7 => "Brahmanbaria", 8 => "Chandpur",
9 => "Chapainawabganj", 10 => "Chattogram", 11 => "Chuadanga", 12 => "Cumilla",
13 => "Cox's Bazar", 14 => "Dhaka", 15 => "Dinajpur", 16 => "Faridpur",
17 => "Feni", 18 => "Gaibandha", 19 => "Gazipur", 20 => "Gopalganj",
21 => "Habiganj", 22 => "Jamalpur", 23 => "Jashore", 24 => "Jhalakathi",
25 => "Jhenaidah", 26 => "Joypurhat", 27 => "Khagrachari", 28 => "Khulna",
29 => "Kishoreganj", 30 => "Kurigram", 31 => "Kushtia", 32 => "Lakshmipur",
33 => "Lalmonirhat", 34 => "Madaripur", 35 => "Magura", 36 => "Manikganj",
37 => "Meherpur", 38 => "Moulvibazar", 39 => "Munshiganj", 40 => "Mymensingh",
41 => "Naogaon", 42 => "Narail", 43 => "Narayanganj", 44 => "Narsingdi",
45 => "Natore", 46 => "Netrokona", 47 => "Nilphamari", 48 => "Noakhali",
49 => "Pabna", 50 => "Panchagarh", 51 => "Patuakhali", 52 => "Pirojpur",
53 => "Rajbari", 54 => "Rajshahi", 55 => "Rangamati", 56 => "Rangpur",
57 => "Satkhira", 58 => "Shariatpur", 59 => "Sherpur", 60 => "Sirajganj",
61 => "Sunamganj", 62 => "Sylhet", 63 => "Tangail", 64 => "Thakurgaon"
];
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

            <div class="form-group">
                <label class="font-weight-bold">Could victims file civil suits against traffickers for damages?</label>
                <textarea name="victims_traffickers_title_one_q40" class="form-control q40-desc-input" rows="3"
                    placeholder="Please describe">{{ $q40_data['civil_suits_description'] ?? '' }}</textarea>
            </div>

            <div class="form-group mb-2">
                <label class="font-weight-bold d-block">Does the government provide information or legal support for
                    victims to pursue a civil suit?</label>

                <input type="radio" id="radioYes40" class="fortystatus" name="is_victims_civil_traffickers_q40"
                    value="1" {{ (is_null($q40_checked) || $q40_checked === '1') ? 'checked' : '' }}>
                <label for="radioYes40" class="mr-3  font-weight-bold">Yes</label>

                <input type="radio" id="radioNo40" class="fortystatus" name="is_victims_civil_traffickers_q40" value="0"
                    {{ ($q40_checked === '0') ? 'checked' : '' }}>
                <label for="radioNo40" class="mr-3  font-weight-bold">No</label>

                <input type="radio" id="radioOthers40" class="fortystatus" name="is_victims_civil_traffickers_q40"
                    value="2" {{ ($q40_checked === '2') ? 'checked' : '' }}>
                <label for="radioOthers40" class=" font-weight-bold">Others</label>
            </div>

            <div id="others_q40" style="display: {{ ($q40_checked === '2') ? 'block' : 'none' }};">
                <textarea name="other_victims_civil_traffickers_q40" class="form-control mt-2 q40-others-input" rows="2"
                    placeholder="Please describe">{{ $q40_data['others_legal_support'] ?? '' }}</textarea>
            </div>

            <div id="yes_extra_q40"
                style="display: {{ (is_null($q40_checked) || $q40_checked === '1') ? 'block' : 'none' }};">


                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="civil-suit-table-q40">
                        <thead>
                            <tr class="bg-light">
                                <th rowspan="2" style="vertical-align: middle;">District</th>
                                <th colspan="6">Number of Victims pursuing civil suit</th>
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
                            @php
                            $rows = $q40_data['victims_data'] ?? [];
                            $totalRows = max(2, count($rows)); // সর্বনিম্ন ২ টা রো দেখাবে
                            @endphp

                            @for($i = 0; $i < $totalRows; $i++) @php $row=$rows[$i] ?? null; @endphp <tr>
                                <td>

                                    <select name="victims_traffickers_location_q40b[]" class="form-control">
                                        <option value="" disabled>---Choose an item--</option>
                                        @foreach ($district_Lists as $key => $district)
                                        <option value="{{ $key }}"
                                            {{ ($row['district'] ?? '') == $key ? 'selected' : '' }}>
                                            {{ $district }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="number" name="victims_traffickers_men_q40b[]"
                                        class="form-control q40-men q40-calc" value="{{ $row['men'] ?? '' }}" min="0">
                                </td>
                                <td><input type="number" name="victims_traffickers_women_q40b[]"
                                        class="form-control q40-women q40-calc" value="{{ $row['women'] ?? '' }}"
                                        min="0"></td>
                                <td><input type="number" name="victims_traffickers_boy_q40b[]"
                                        class="form-control q40-boy q40-calc" value="{{ $row['boy'] ?? '' }}" min="0">
                                </td>
                                <td><input type="number" name="victims_traffickers_girl_q40b[]"
                                        class="form-control q40-girl q40-calc" value="{{ $row['girl'] ?? '' }}" min="0">
                                </td>
                                <td><input type="number" name="victims_traffickers_tg_q40b[]"
                                        class="form-control q40-tg q40-calc" value="{{ $row['tg'] ?? '' }}" min="0">
                                </td>
                                <td><input type="number" name="victims_traffickers_total_q40b[]"
                                        class="form-control q40-total" value="{{ $row['total'] ?? '' }}" readonly></td>
                                <td>
                                    @if($i == 0)
                                    <!-- <span class="badge badge-secondary">Fixed</span> -->
                                    @elseif($i == 1)
                                    <button type="button" class="btn btn-sm btn-primary add-row-q40">+</button>
                                    @else
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
                                <td id="grand-total-boy-q40">0</td>
                                <td id="grand-total-girl-q40">0</td>
                                <td id="grand-total-tg-q40">0</td>
                                <td id="grand-total-q40">0</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- <div class="form-group mt-2">
                    <label class="text-danger font-weight-bold">Location Not specify :</label>
                    <textarea name="victims_traffickers_title_two_q40" class="form-control q40-location-not-specified"
                        rows="2"
                        placeholder="Please describe">{{ $q40_data['location_not_specified'] ?? '' }}</textarea>
                </div> -->
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
    function toggleq40() {
        let val = $("input[name='is_victims_civil_traffickers_q40']:checked").val();

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

    function calculateQ40Totals() {
        let grandMen = 0,
            grandWomen = 0,
            grandBoy = 0,
            grandGirl = 0,
            grandTg = 0,
            grandTotal = 0;

        $('#civil-suit-table-q40 tbody tr').each(function() {
            let men = parseInt($(this).find('.q40-men').val()) || 0;
            let women = parseInt($(this).find('.q40-women').val()) || 0;
            let boy = parseInt($(this).find('.q40-boy').val()) || 0;
            let girl = parseInt($(this).find('.q40-girl').val()) || 0;
            let tg = parseInt($(this).find('.q40-tg').val()) || 0;

            let rowTotal = men + women + boy + girl + tg;
            $(this).find('.q40-total').val(rowTotal);

            grandMen += men;
            grandWomen += women;
            grandBoy += boy;
            grandGirl += girl;
            grandTg += tg;
            grandTotal += rowTotal;
        });

        $('#grand-total-men-q40').text(grandMen);
        $('#grand-total-women-q40').text(grandWomen);
        $('#grand-total-boy-q40').text(grandBoy);
        $('#grand-total-girl-q40').text(grandGirl);
        $('#grand-total-tg-q40').text(grandTg);
        $('#grand-total-q40').text(grandTotal);
    }

    $(document).on('input', '.q40-calc', calculateQ40Totals);

    $(document).on('click', '.add-row-q40', function() {
        let newRow = `
            <tr>
                <td>
                    <select name="victims_traffickers_location_q40b[]" class="form-control">
                                        <option value="" disabled>---Choose an item--</option>
                                        @foreach ($district_Lists as $key => $district)
                                        <option value="{{ $key }}"
                                            {{ ($row['district'] ?? '') == $key ? 'selected' : '' }}>
                                            {{ $district }}</option>
                                        @endforeach
                                    </select>
                </td>
                <td><input type="number" name="victims_traffickers_men_q40b[]" class="form-control q40-men q40-calc" min="0"></td>
                <td><input type="number" name="victims_traffickers_women_q40b[]" class="form-control q40-women q40-calc" min="0"></td>
                <td><input type="number" name="victims_traffickers_boy_q40b[]" class="form-control q40-boy q40-calc" min="0"></td>
                <td><input type="number" name="victims_traffickers_girl_q40b[]" class="form-control q40-girl q40-calc" min="0"></td>
                <td><input type="number" name="victims_traffickers_tg_q40b[]" class="form-control q40-tg q40-calc" min="0"></td>
                <td><input type="number" name="victims_traffickers_total_q40b[]" class="form-control q40-total" readonly></td>
                <td><button type="button" class="btn btn-sm btn-danger remove-row-q40">-</button></td>
            </tr>`;
        $('#civil-suit-table-q40 tbody').append(newRow);
        calculateQ40Totals();
    });

    $(document).on('click', '.remove-row-q40', function() {
        $(this).closest('tr').remove();
        calculateQ40Totals();
    });

    calculateQ40Totals();

    $(document).on("click", "#temp-save-question40", function() {
        let checkedValue = $("input[name='is_victims_civil_traffickers_q40']:checked").val();
        let victimsData = [];

        $('#civil-suit-table-q40 tbody tr').each(function() {
            let location = $(this).find('.q40-location').val();
            let men = $(this).find('.q40-men').val();
            let women = $(this).find('.q40-women').val();
            let boy = $(this).find('.q40-boy').val();
            let girl = $(this).find('.q40-girl').val();
            let tg = $(this).find('.q40-tg').val();
            let total = $(this).find('.q40-total').val();

            if (location || men || women || boy || girl || tg) {
                victimsData.push({
                    location: location,
                    men: men,
                    women: women,
                    boy: boy,
                    girl: girl,
                    tg: tg,
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
                    alert("Question 40 Temp Saved");
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