@if (($questiontitles[37]->status ?? null) == 1)
@php
// সেশন থেকে ৩৮ নম্বর প্রশ্নের ডাটা ক্যাচ করা
$question_38_data = session()->get('question38');

// Main Question Radio Status (ডিফল্ট Yes = 1)
$q38_status = isset($question_38_data['q38_status']) ? (string)$question_38_data['q38_status'] : '1';
$q38_yes_desc = $question_38_data['q38_yes_desc'] ?? '';
$q38_others_desc = $question_38_data['q38_others_desc'] ?? '';

// Table 1 Data (Internal & International)
$q38_t1_internal = $question_38_data['t1_internal'] ?? ['men' => 0, 'women' => 0, 'tg' => 0, 'boy' => 0, 'girl' => 0,
'total' => 0];
$q38_t1_international = $question_38_data['t1_international'] ?? ['men' => 0, 'women' => 0, 'tg' => 0, 'boy' => 0,
'girl' => 0, 'total' => 0];

// JSON/String ডাটা হলে সেটিকে array তে কনভার্ট করার সেফগার্ড
if (is_string($q38_t1_internal)) {
$q38_t1_internal = json_decode($q38_t1_internal, true) ?? [];
}
if (is_string($q38_t1_international)) {
$q38_t1_international = json_decode($q38_t1_international, true) ?? [];
}

// Table 2 Rows Data Safe Extraction
$q38_t2_rows = $question_38_data['t2_rows'] ?? [];
if (is_string($q38_t2_rows)) {
$q38_t2_rows = json_decode($q38_t2_rows, true) ?? [];
}
@endphp

<style>
.sub_field_box_q38 {
    display: none;
}

.q38_table_header {
    background-color: #fce4d6;
    font-weight: bold;
}
</style>

<div class="card question38">
    <div class="card-header" role="tab" id="heading-38">
        <h6 class="card-title" style="color: {{ !empty($question_38_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-38" aria-expanded="false" aria-controls="collapse-38">
                38. {{ $questiontitles[37]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-38" class="collapse" role="tabpanel" aria-labelledby="heading-38" data-parent="#accordion-2">
        <div class="card-body">

            <!-- Main Status Radio Buttons -->
            <div class="mb-3">
                <label class="font-weight-bold">Status:</label>
                <div class="mt-1">
                    <div class="icheck-primary d-inline mr-3">
                        <input type="radio" class="q38_status" id="q38_yes" name="is_victim_protection_q38" value="1"
                            {{ $q38_status === '1' ? 'checked' : '' }}>
                        <label for="q38_yes">Yes</label>
                    </div>
                    <div class="icheck-primary d-inline mr-3">
                        <input type="radio" class="q38_status" id="q38_no" name="is_victim_protection_q38" value="0"
                            {{ $q38_status === '0' ? 'checked' : '' }}>
                        <label for="q38_no">No</label>
                    </div>
                    <div class="icheck-primary d-inline">
                        <input type="radio" class="q38_status" id="q38_others" name="is_victim_protection_q38" value="2"
                            {{ $q38_status === '2' ? 'checked' : '' }}>
                        <label for="q38_others">Others</label>
                    </div>
                </div>

                <div class="mt-2 q38_yes_box sub_field_box_q38"
                    style="display: {{ $q38_status === '1' ? 'block' : 'none' }};">
                    <input type="text" name="title_victim_protection_q38" id="q38_yes_text"
                        class="form-control col-md-8 mb-3" placeholder="Provide Description"
                        value="{{ $q38_yes_desc }}">
                </div>
                <div class="mt-2 q38_others_box sub_field_box_q38"
                    style="display: {{ $q38_status === '2' ? 'block' : 'none' }};">
                    <input type="text" name="other_victim_protection_q38" id="q38_others_text"
                        class="form-control col-md-8" placeholder="Others details" value="{{ $q38_others_desc }}">
                </div>
            </div>

            <!-- Content Area (Show if Yes) -->
            <div class="q38_content_wrapper" style="display: {{ $q38_status === '1' ? 'block' : 'none' }};">
                <label class="font-weight-bold text-primary">If Yes</label>

                <!-- TABLE 1: Witness Protection Table -->
                <div class="table-responsive mb-4">
                    <table class="table table-bordered text-center mb-0" id="q38_table_1">
                        <thead>
                            <tr class="bg-light">
                                <th colspan="6">VoT participating in investigation Provided with Witness Protection</th>
                            </tr>
                            <tr class="bg-light">
                                <th>Men</th>
                                <th>Women</th>
                                <th>TG</th>
                                <th>Boy</th>
                                <th>Girl</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Internal Trafficking Row Header -->
                            <tr class="q38_table_header">
                                <td colspan="6">Internal Trafficking</td>
                            </tr>
                            <tr>
                                <td><input type="number" name="internal_men_q38[]"
                                        class="form-control q38_t1_int_calc q38_t1_int_men" min="0"
                                        value="{{ $q38_t1_internal['men'] ?? 0 }}"></td>
                                <td><input type="number" name="internal_women_q38[]"
                                        class="form-control q38_t1_int_calc q38_t1_int_women" min="0"
                                        value="{{ $q38_t1_internal['women'] ?? 0 }}"></td>
                                <td><input type="number" name="internal_tg_q38[]"
                                        class="form-control q38_t1_int_calc q38_t1_int_tg" min="0"
                                        value="{{ $q38_t1_internal['tg'] ?? 0 }}"></td>
                                <td><input type="number" name="internal_boy_q38[]"
                                        class="form-control q38_t1_int_calc q38_t1_int_boy" min="0"
                                        value="{{ $q38_t1_internal['boy'] ?? 0 }}"></td>
                                <td><input type="number" name="internal_girl_q38[]"
                                        class="form-control q38_t1_int_calc q38_t1_int_girl" min="0"
                                        value="{{ $q38_t1_internal['girl'] ?? 0 }}"></td>
                                <td><input type="number" name="internal_total_q38[]"
                                        class="form-control q38_t1_int_total"
                                        value="{{ $q38_t1_internal['total'] ?? 0 }}" readonly></td>
                            </tr>

                            <!-- International Trafficking Row Header -->
                            <tr class="q38_table_header">
                                <td colspan="6">International Trafficking</td>
                            </tr>
                            <tr>
                                <td><input type="number" name="international_men_q38[]"
                                        class="form-control q38_t1_ext_calc q38_t1_ext_men" min="0"
                                        value="{{ $q38_t1_international['men'] ?? 0 }}"></td>
                                <td><input type="number" name="international_women_q38[]"
                                        class="form-control q38_t1_ext_calc q38_t1_ext_women" min="0"
                                        value="{{ $q38_t1_international['women'] ?? 0 }}"></td>
                                <td><input type="number" name="international_tg_q38[]"
                                        class="form-control q38_t1_ext_calc q38_t1_ext_tg" min="0"
                                        value="{{ $q38_t1_international['tg'] ?? 0 }}"></td>
                                <td><input type="number" name="international_boy_q38[]"
                                        class="form-control q38_t1_ext_calc q38_t1_ext_boy" min="0"
                                        value="{{ $q38_t1_international['boy'] ?? 0 }}"></td>
                                <td><input type="number" name="international_girl_q38[]"
                                        class="form-control q38_t1_ext_calc q38_t1_ext_girl" min="0"
                                        value="{{ $q38_t1_international['girl'] ?? 0 }}"></td>
                                <td><input type="number" name="international_total_q38[]"
                                        class="form-control q38_t1_ext_total"
                                        value="{{ $q38_t1_international['total'] ?? 0 }}" readonly></td>
                            </tr>

                            <!-- Total Row Header & Result -->
                            <tr class="q38_table_header">
                                <td colspan="6">Total</td>
                            </tr>
                            <tr class="font-weight-bold bg-light">
                                <td id="q38_t1_sum_men">0</td>
                                <td id="q38_t1_sum_women">0</td>
                                <td id="q38_t1_sum_tg">0</td>
                                <td id="q38_t1_sum_boy">0</td>
                                <td id="q38_t1_sum_girl">0</td>
                                <td id="q38_t1_grand_total">0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- TABLE 2: Coverage / Assistance Table -->
                <div class="table-responsive">
                    <table class="table table-bordered text-center mb-1" id="q38_table_2">
                        <thead class="bg-light">
                            <tr>
                                <th rowspan="2" class="align-middle" style="width: 20%;">Location (multiple-response)
                                </th>
                                <th rowspan="2" class="align-middle" style="width: 25%;">Types of Assistance</th>
                                <th colspan="6">Coverage</th>
                                <th rowspan="2" class="align-middle" style="width: 70px;">Action</th>
                            </tr>
                            <tr>
                                <th>Men</th>
                                <th>Women</th>
                                <th>TG</th>
                                <th>Boy</th>
                                <th>Girl</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="q38_t2_body">
                            @if(is_array($q38_t2_rows) && count($q38_t2_rows) > 0)
                            @foreach($q38_t2_rows as $index => $row)
                            <tr>
                                <td>
                                    <select class="form-control q38_location" name="location_q38c[]">
                                        <option value="">Choose an item...</option>
                                        <option value="National"
                                            {{ ($row['location'] ?? '') == 'National' ? 'selected' : '' }}>National
                                        </option>
                                        <option value="Dhaka"
                                            {{ ($row['location'] ?? '') == 'Dhaka' ? 'selected' : '' }}>Dhaka Division
                                        </option>
                                        <option value="Chattogram"
                                            {{ ($row['location'] ?? '') == 'Chattogram' ? 'selected' : '' }}>Chattogram
                                            Division</option>
                                        <option value="Rajshahi"
                                            {{ ($row['location'] ?? '') == 'Rajshahi' ? 'selected' : '' }}>Rajshahi
                                            Division</option>
                                        <option value="Khulna"
                                            {{ ($row['location'] ?? '') == 'Khulna' ? 'selected' : '' }}>Khulna Division
                                        </option>
                                        <option value="Barishal"
                                            {{ ($row['location'] ?? '') == 'Barishal' ? 'selected' : '' }}>Barishal
                                            Division</option>
                                        <option value="Sylhet"
                                            {{ ($row['location'] ?? '') == 'Sylhet' ? 'selected' : '' }}>Sylhet Division
                                        </option>
                                        <option value="Rangpur"
                                            {{ ($row['location'] ?? '') == 'Rangpur' ? 'selected' : '' }}>Rangpur
                                            Division</option>
                                        <option value="Mymensingh"
                                            {{ ($row['location'] ?? '') == 'Mymensingh' ? 'selected' : '' }}>Mymensingh
                                            Division</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="type_q38c[]" class="form-control q38_assistance"
                                        placeholder="Types of Assistance" value="{{ $row['assistance'] ?? '' }}">
                                </td>
                                <td><input type="number" name="men_q38c[]" class="form-control q38_t2_men q38_t2_calc"
                                        min="0" value="{{ $row['men'] ?? 0 }}"></td>
                                <td><input type="number" name="women_q38c[]"
                                        class="form-control q38_t2_women q38_t2_calc" min="0"
                                        value="{{ $row['women'] ?? 0 }}"></td>
                                <td><input type="number" name="tg_q38c[]" class="form-control q38_t2_tg q38_t2_calc"
                                        min="0" value="{{ $row['tg'] ?? 0 }}"></td>
                                <td><input type="number" name="boy_q38c[]" class="form-control q38_t2_boy q38_t2_calc"
                                        min="0" value="{{ $row['boy'] ?? 0 }}"></td>
                                <td><input type="number" name="girl_q38c[]" class="form-control q38_t2_girl q38_t2_calc"
                                        min="0" value="{{ $row['girl'] ?? 0 }}"></td>
                                <td><input type="number" name="total_q38c[]" class="form-control q38_t2_row_total"
                                        value="{{ $row['total'] ?? 0 }}" readonly></td>
                                <td>
                                    @if($index == 0)
                                    <!-- Row 1 Fixed Add Button -->
                                    <button type="button" class="btn btn-primary btn-sm" id="add_q38_t2_row"><i
                                            class="fa fa-plus"></i></button>
                                    @else
                                    <!-- Row 2+ Delete Button -->
                                    <button type="button" class="btn btn-danger btn-sm remove_q38_t2_row"><i
                                            class="fa fa-trash"></i></button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <!-- Default Fixed Row 1 ONLY -->
                            <tr>
                                <td>
                                    <select class="form-control q38_location" name="location_q38c[]">
                                        <option value="">Choose an item...</option>
                                        <option value="National">National</option>
                                        <option value="Dhaka">Dhaka Division</option>
                                        <option value="Chattogram">Chattogram Division</option>
                                        <option value="Rajshahi">Rajshahi Division</option>
                                        <option value="Khulna">Khulna Division</option>
                                        <option value="Barishal">Barishal Division</option>
                                        <option value="Sylhet">Sylhet Division</option>
                                        <option value="Rangpur">Rangpur Division</option>
                                        <option value="Mymensingh">Mymensingh Division</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="type_q38c[]" class="form-control q38_assistance"
                                        placeholder="Types of Assistance">
                                </td>
                                <td><input type="number" name="men_q38c[]" class="form-control q38_t2_men q38_t2_calc"
                                        min="0" value="0">
                                </td>
                                <td><input type="number" name="women_q38c[]"
                                        class="form-control q38_t2_women q38_t2_calc" min="0" value="0"></td>
                                <td><input type="number" name="tg_q38c[]" class="form-control q38_t2_tg q38_t2_calc"
                                        min="0" value="0">
                                </td>
                                <td><input type="number" name="boy_q38c[]" class="form-control q38_t2_boy q38_t2_calc"
                                        min="0" value="0">
                                </td>
                                <td><input type="number" name="girl_q38c[]" class="form-control q38_t2_girl q38_t2_calc"
                                        min="0" value="0">
                                </td>
                                <td><input type="number" name="total_q38c[]" class="form-control q38_t2_row_total"
                                        value="0" readonly></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" id="add_q38_t2_row"><i
                                            class="fa fa-plus"></i></button>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                        <tfoot>
                            <tr class="bg-light font-weight-bold">
                                <td colspan="2" class="text-right">Result</td>
                                <td id="q38_t2_sum_men">0</td>
                                <td id="q38_t2_sum_women">0</td>
                                <td id="q38_t2_sum_tg">0</td>
                                <td id="q38_t2_sum_boy">0</td>
                                <td id="q38_t2_sum_girl">0</td>
                                <td id="q38_t2_grand_total">0</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                    <small class="text-danger font-weight-bold">Location is division with national</small>
                </div>
            </div>

            <p class="text-right mt-3">
                <button type="button" class="btn btn-success" id="temp-save-question38">Save</button>
            </p>

        </div>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    // --- Table 1 Auto Calculation ---
    function calculateQ38Table1() {
        let intMen = parseFloat($('.q38_t1_int_men').val()) || 0;
        let intWomen = parseFloat($('.q38_t1_int_women').val()) || 0;
        let intTg = parseFloat($('.q38_t1_int_tg').val()) || 0;
        let intBoy = parseFloat($('.q38_t1_int_boy').val()) || 0;
        let intGirl = parseFloat($('.q38_t1_int_girl').val()) || 0;
        let intTotal = intMen + intWomen + intTg + intBoy + intGirl;
        $('.q38_t1_int_total').val(intTotal);

        let extMen = parseFloat($('.q38_t1_ext_men').val()) || 0;
        let extWomen = parseFloat($('.q38_t1_ext_women').val()) || 0;
        let extTg = parseFloat($('.q38_t1_ext_tg').val()) || 0;
        let extBoy = parseFloat($('.q38_t1_ext_boy').val()) || 0;
        let extGirl = parseFloat($('.q38_t1_ext_girl').val()) || 0;
        let extTotal = extMen + extWomen + extTg + extBoy + extGirl;
        $('.q38_t1_ext_total').val(extTotal);

        let sumMen = intMen + extMen;
        let sumWomen = intWomen + extWomen;
        let sumTg = intTg + extTg;
        let sumBoy = intBoy + extBoy;
        let sumGirl = intGirl + extGirl;
        let grandTotal = intTotal + extTotal;

        $('#q38_t1_sum_men').text(sumMen);
        $('#q38_t1_sum_women').text(sumWomen);
        $('#q38_t1_sum_tg').text(sumTg);
        $('#q38_t1_sum_boy').text(sumBoy);
        $('#q38_t1_sum_girl').text(sumGirl);
        $('#q38_t1_grand_total').text(grandTotal);
    }

    // --- Table 2 Auto Calculation ---
    function calculateQ38Table2() {
        let sumMen = 0,
            sumWomen = 0,
            sumTg = 0,
            sumBoy = 0,
            sumGirl = 0,
            grandTotal = 0;

        $('#q38_t2_body tr').each(function() {
            let men = parseFloat($(this).find('.q38_t2_men').val()) || 0;
            let women = parseFloat($(this).find('.q38_t2_women').val()) || 0;
            let tg = parseFloat($(this).find('.q38_t2_tg').val()) || 0;
            let boy = parseFloat($(this).find('.q38_t2_boy').val()) || 0;
            let girl = parseFloat($(this).find('.q38_t2_girl').val()) || 0;

            let rowTotal = men + women + tg + boy + girl;
            $(this).find('.q38_t2_row_total').val(rowTotal);

            sumMen += men;
            sumWomen += women;
            sumTg += tg;
            sumBoy += boy;
            sumGirl += girl;
            grandTotal += rowTotal;
        });

        $('#q38_t2_sum_men').text(sumMen);
        $('#q38_t2_sum_women').text(sumWomen);
        $('#q38_t2_sum_tg').text(sumTg);
        $('#q38_t2_sum_boy').text(sumBoy);
        $('#q38_t2_sum_girl').text(sumGirl);
        $('#q38_t2_grand_total').text(grandTotal);
    }

    // Run Calculations Initially
    calculateQ38Table1();
    calculateQ38Table2();

    // Change Events for Calculations
    $(document).on('input', '.q38_t1_int_calc, .q38_t1_ext_calc', function() {
        calculateQ38Table1();
    });

    $(document).on('input', '.q38_t2_calc', function() {
        calculateQ38Table2();
    });

    // Add Row Action (Row 2+)
    $(document).on('click', '#add_q38_t2_row', function() {
        let newRow = `
            <tr>
                <td>
                    <select class="form-control q38_location" name="location_q38c[]">
                        <option value="">Choose an item...</option>
                        <option value="National">National</option>
                        <option value="Dhaka">Dhaka Division</option>
                        <option value="Chattogram">Chattogram Division</option>
                        <option value="Rajshahi">Rajshahi Division</option>
                        <option value="Khulna">Khulna Division</option>
                        <option value="Barishal">Barishal Division</option>
                        <option value="Sylhet">Sylhet Division</option>
                        <option value="Rangpur">Rangpur Division</option>
                        <option value="Mymensingh">Mymensingh Division</option>
                    </select>
                </td>
                <td>
                    <input type="text" name="type_q38c[]"  class="form-control q38_assistance" placeholder="Types of Assistance">
                </td>
                <td><input type="number" name="men_q38c[]"  class="form-control q38_t2_men q38_t2_calc" min="0" value="0"></td>
                <td><input type="number" name="women_q38c[]"  class="form-control q38_t2_women q38_t2_calc" min="0" value="0"></td>
                <td><input type="number" name="tg_q38c[]"  class="form-control q38_t2_tg q38_t2_calc" min="0" value="0"></td>
                <td><input type="number" name="boy_q38c[]"  class="form-control q38_t2_boy q38_t2_calc" min="0" value="0"></td>
                <td><input type="number" name="girl_q38c[]" class="form-control q38_t2_girl q38_t2_calc" min="0" value="0"></td>
                <td><input type="number" name="total_q38c[]"  class="form-control q38_t2_row_total" value="0" readonly></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm remove_q38_t2_row"><i class="fa fa-trash"></i></button>
                </td>
            </tr>`;
        $('#q38_t2_body').append(newRow);
        calculateQ38Table2();
    });

    // Remove Row Action (২য় রো থেকে ডিলিট করা যাবে)
    $(document).on('click', '.remove_q38_t2_row', function() {
        $(this).closest('tr').remove();
        calculateQ38Table2();
    });

    // Radio Toggle Handler
    $(document).on('change', '.q38_status', function() {
        let val = $("input[name='is_victim_protection_q38']:checked").val();
        $('.q38_yes_box, .q38_others_box, .q38_content_wrapper').hide();

        if (val === '1') {
            $('.q38_yes_box, .q38_content_wrapper').show();
        } else if (val === '2') {
            $('.q38_others_box').show();
        }
    });

    // Temp Save Action
    $(document).on('click', '#temp-save-question38', function(e) {
        e.preventDefault();

        let q38_status = $("input[name='is_victim_protection_q38']:checked").val();

        // Collect Table 1 Data
        let t1_internal = {
            men: $('.q38_t1_int_men').val() || 0,
            women: $('.q38_t1_int_women').val() || 0,
            tg: $('.q38_t1_int_tg').val() || 0,
            boy: $('.q38_t1_int_boy').val() || 0,
            girl: $('.q38_t1_int_girl').val() || 0,
            total: $('.q38_t1_int_total').val() || 0
        };

        let t1_international = {
            men: $('.q38_t1_ext_men').val() || 0,
            women: $('.q38_t1_ext_women').val() || 0,
            tg: $('.q38_t1_ext_tg').val() || 0,
            boy: $('.q38_t1_ext_boy').val() || 0,
            girl: $('.q38_t1_ext_girl').val() || 0,
            total: $('.q38_t1_ext_total').val() || 0
        };

        // Collect Table 2 Rows
        let t2_rows = [];
        $('#q38_t2_body tr').each(function() {
            t2_rows.push({
                location: $(this).find('.q38_location').val() || '',
                assistance: $(this).find('.q38_assistance').val() || '',
                men: $(this).find('.q38_t2_men').val() || 0,
                women: $(this).find('.q38_t2_women').val() || 0,
                tg: $(this).find('.q38_t2_tg').val() || 0,
                boy: $(this).find('.q38_t2_boy').val() || 0,
                girl: $(this).find('.q38_t2_girl').val() || 0,
                total: $(this).find('.q38_t2_row_total').val() || 0
            });
        });

        let formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('question_no', 38);

        formData.append('question38[q38_status]', q38_status !== undefined ? q38_status : '1');
        formData.append('question38[q38_yes_desc]', $('#q38_yes_text').val() || '');
        formData.append('question38[q38_others_desc]', $('#q38_others_text').val() || '');

        formData.append('question38[t1_internal]', JSON.stringify(t1_internal));
        formData.append('question38[t1_international]', JSON.stringify(t1_international));
        formData.append('question38[t2_rows]', JSON.stringify(t2_rows));

        $.ajax({
            url: "/superadmin/case/temp-save-question",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success || response) {
                    $('.question38 .card-header h6').css('color', 'blue');
                    alert("Question 38 Temp Saved Successfully!");
                }
            },
            error: function(err) {
                alert("Something went wrong!");
                console.log(err);
            }
        });
    });

});
</script>