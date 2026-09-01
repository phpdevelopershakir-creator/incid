@if (($questiontitles[35]->status ?? null) == 1)
@php
// সেশন থেকে ৩৬ নম্বর প্রশ্নের ডাটা ক্যাচ করা
$question_36_data = session()->get('question36');

// Part 1 Data (ডিফল্ট Yes = 1)
$q36_p1_status = isset($question_36_data['q36_p1_status']) ? (string)$question_36_data['q36_p1_status'] : '1';
$q36_p1_yes_desc = $question_36_data['q36_p1_yes_desc'] ?? '';
$q36_p1_others_desc = $question_36_data['q36_p1_others_desc'] ?? '';

// Part 2 Data (ডিফল্ট Yes = 1)
$q36_p2_status = isset($question_36_data['q36_p2_status']) ? (string)$question_36_data['q36_p2_status'] : '1';
$q36_p2_yes_desc = $question_36_data['q36_p2_yes_desc'] ?? '';
$q36_p2_others_desc = $question_36_data['q36_p2_others_desc'] ?? '';

// Part 3 Data (ডিফল্ট Yes = 1)
$q36_p3_status = isset($question_36_data['q36_p3_status']) ? (string)$question_36_data['q36_p3_status'] : '1';
$q36_p3_yes_desc = $question_36_data['q36_p3_yes_desc'] ?? '';
$q36_p3_others_desc = $question_36_data['q36_p3_others_desc'] ?? '';

// Table Rows Data
$q36_table_rows = $question_36_data['table_rows'] ?? [];
@endphp

<style>
.sub_field_box_q36 {
    display: none;
}
</style>

<div class="card question36">
    <div class="card-header" role="tab" id="heading-36">
        <h6 class="card-title" style="color: {{ !empty($question_36_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-36" aria-expanded="false" aria-controls="collapse-36">
                36. {{ $questiontitles[35]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-36" class="collapse" role="tabpanel" aria-labelledby="heading-36" data-parent="#accordion-2">
        <div class="card-body">

            <table class="table table-bordered mb-0">
                <tbody>
                    <!-- Sub-Question 1 -->
                    <tr>
                        <td>
                            <label class="font-weight-bold">
                                Did law enforcement consistently conduct victim interviews in private, secure locations, without any suspects present?
                            </label>

                            <div class="mt-2">
                                <div class="icheck-primary d-inline mr-3">
                                    <input type="radio" class="q36_p1_status" id="q36_p1_yes" name="q36_p1_radio" value="1" {{ $q36_p1_status === '1' ? 'checked' : '' }}>
                                    <label for="q36_p1_yes">Yes</label>
                                </div>
                                <div class="icheck-primary d-inline mr-3">
                                    <input type="radio" class="q36_p1_status" id="q36_p1_no" name="q36_p1_radio" value="0" {{ $q36_p1_status === '0' ? 'checked' : '' }}>
                                    <label for="q36_p1_no">No</label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" class="q36_p1_status" id="q36_p1_others" name="q36_p1_radio" value="2" {{ $q36_p1_status === '2' ? 'checked' : '' }}>
                                    <label for="q36_p1_others">Others</label>
                                </div>
                            </div>

                            <div class="mt-2 q36_p1_yes_box sub_field_box_q36" style="display: {{ $q36_p1_status === '1' ? 'block' : 'none' }};">
                                <input type="text" id="q36_p1_yes_text" class="form-control col-md-8" placeholder="Provide Description" value="{{ $q36_p1_yes_desc }}">
                            </div>
                            <div class="mt-2 q36_p1_others_box sub_field_box_q36" style="display: {{ $q36_p1_status === '2' ? 'block' : 'none' }};">
                                <input type="text" id="q36_p1_others_text" class="form-control col-md-8" placeholder="Others details" value="{{ $q36_p1_others_desc }}">
                            </div>
                        </td>
                    </tr>

                    <!-- Sub-Question 2 -->
                    <tr>
                        <td>
                            <label class="font-weight-bold">
                                Did the government provide interpreters to conduct interviews in an individual’s primary language?
                            </label>

                            <div class="mt-2">
                                <div class="icheck-primary d-inline mr-3">
                                    <input type="radio" class="q36_p2_status" id="q36_p2_yes" name="q36_p2_radio" value="1" {{ $q36_p2_status === '1' ? 'checked' : '' }}>
                                    <label for="q36_p2_yes">Yes</label>
                                </div>
                                <div class="icheck-primary d-inline mr-3">
                                    <input type="radio" class="q36_p2_status" id="q36_p2_no" name="q36_p2_radio" value="0" {{ $q36_p2_status === '0' ? 'checked' : '' }}>
                                    <label for="q36_p2_no">No</label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" class="q36_p2_status" id="q36_p2_others" name="q36_p2_radio" value="2" {{ $q36_p2_status === '2' ? 'checked' : '' }}>
                                    <label for="q36_p2_others">Others</label>
                                </div>
                            </div>

                            <div class="mt-2 q36_p2_yes_box sub_field_box_q36" style="display: {{ $q36_p2_status === '1' ? 'block' : 'none' }};">
                                <input type="text" id="q36_p2_yes_text" class="form-control col-md-8" placeholder="Provide Description" value="{{ $q36_p2_yes_desc }}">
                            </div>
                            <div class="mt-2 q36_p2_others_box sub_field_box_q36" style="display: {{ $q36_p2_status === '2' ? 'block' : 'none' }};">
                                <input type="text" id="q36_p2_others_text" class="form-control col-md-8" placeholder="Others details" value="{{ $q36_p2_others_desc }}">
                            </div>
                        </td>
                    </tr>

                    <!-- Sub-Question 3 -->
                    <tr>
                        <td>
                            <label class="font-weight-bold">
                                Do they utilize any facilities specially equipped to support victim’s needs (e.g., child-friendly interviewing rooms, one-way mirror/Gessell chambers)?
                            </label>

                            <div class="mt-2">
                                <div class="icheck-primary d-inline mr-3">
                                    <input type="radio" class="q36_p3_status" id="q36_p3_yes" name="q36_p3_radio" value="1" {{ $q36_p3_status === '1' ? 'checked' : '' }}>
                                    <label for="q36_p3_yes">Yes</label>
                                </div>
                                <div class="icheck-primary d-inline mr-3">
                                    <input type="radio" class="q36_p3_status" id="q36_p3_no" name="q36_p3_radio" value="0" {{ $q36_p3_status === '0' ? 'checked' : '' }}>
                                    <label for="q36_p3_no">No</label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" class="q36_p3_status" id="q36_p3_others" name="q36_p3_radio" value="2" {{ $q36_p3_status === '2' ? 'checked' : '' }}>
                                    <label for="q36_p3_others">Others</label>
                                </div>
                            </div>

                            <div class="mt-2 q36_p3_yes_box sub_field_box_q36" style="display: {{ $q36_p3_status === '1' ? 'block' : 'none' }};">
                                <input type="text" id="q36_p3_yes_text" class="form-control col-md-8 mb-3" placeholder="Provide Description" value="{{ $q36_p3_yes_desc }}">

                                <!-- Dynamic Table -->
                                <div class="mt-3">
                                    <label class="font-weight-bold text-primary">If Yes;</label>
                                    <table class="table table-bordered text-center" id="q36_dynamic_table">
                                        <thead class="bg-light">
                                            <tr>
                                                <th rowspan="2" class="align-middle">Type of Support</th>
                                                <th colspan="4">Number of VoT receiving Supports</th>
                                                <th rowspan="2" class="align-middle" style="width: 80px;">Action</th>
                                            </tr>
                                            <tr>
                                                <th>Men</th>
                                                <th>Women</th>
                                                <th>TG</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="q36_table_body">
                                            @if(!empty($q36_table_rows) && count($q36_table_rows) > 0)
                                                @foreach($q36_table_rows as $index => $row)
                                                <tr>
                                                    <td>
                                                        <select class="form-control q36_support_type">
                                                            <option value="">Select Support</option>
                                                            <option value="Child-friendly Room" {{ ($row['support_type'] ?? '') == 'Child-friendly Room' ? 'selected' : '' }}>Child-friendly Room</option>
                                                            <option value="One-way Mirror" {{ ($row['support_type'] ?? '') == 'One-way Mirror' ? 'selected' : '' }}>One-way Mirror</option>
                                                            <option value="Legal Support" {{ ($row['support_type'] ?? '') == 'Legal Support' ? 'selected' : '' }}>Legal Support</option>
                                                            <option value="Others" {{ ($row['support_type'] ?? '') == 'Others' ? 'selected' : '' }}>Others</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="number" class="form-control q36_men q36_calc" min="0" value="{{ $row['men'] ?? 0 }}"></td>
                                                    <td><input type="number" class="form-control q36_women q36_calc" min="0" value="{{ $row['women'] ?? 0 }}"></td>
                                                    <td><input type="number" class="form-control q36_tg q36_calc" min="0" value="{{ $row['tg'] ?? 0 }}"></td>
                                                    <td><input type="number" class="form-control q36_row_total" value="{{ $row['total'] ?? 0 }}" readonly></td>
                                                    <td>
                                                        @if($index == 0)
                                                            <!-- ১ম রো ফিক্সড (Add Button) -->
                                                            <button type="button" class="btn btn-primary btn-sm" id="add_q36_row"><i class="fa fa-plus"></i></button>
                                                        @else
                                                            <!-- ২য় রো থেকে Remove Button -->
                                                            <button type="button" class="btn btn-danger btn-sm remove_q36_row"><i class="fa fa-trash"></i></button>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @else
                                                <!-- Default Fixed Row 1 -->
                                                <tr>
                                                    <td>
                                                        <select class="form-control q36_support_type">
                                                            <option value="">Select Support</option>
                                                            <option value="Child-friendly Room">Child-friendly Room</option>
                                                            <option value="One-way Mirror">One-way Mirror</option>
                                                            <option value="Legal Support">Legal Support</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="number" class="form-control q36_men q36_calc" min="0" value="0"></td>
                                                    <td><input type="number" class="form-control q36_women q36_calc" min="0" value="0"></td>
                                                    <td><input type="number" class="form-control q36_tg q36_calc" min="0" value="0"></td>
                                                    <td><input type="number" class="form-control q36_row_total" value="0" readonly></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm" id="add_q36_row"><i class="fa fa-plus"></i></button>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                        <tfoot>
                                            <tr class="bg-light font-weight-bold">
                                                <td>Result</td>
                                                <td id="q36_total_men">0</td>
                                                <td id="q36_total_women">0</td>
                                                <td id="q36_total_tg">0</td>
                                                <td id="q36_grand_total">0</td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="mt-2 q36_p3_others_box sub_field_box_q36" style="display: {{ $q36_p3_status === '2' ? 'block' : 'none' }};">
                                <input type="text" id="q36_p3_others_text" class="form-control col-md-8" placeholder="Others details" value="{{ $q36_p3_others_desc }}">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <p class="text-right mt-3">
                <button type="button" class="btn btn-success" id="temp-save-question36">Save</button>
            </p>

        </div>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    // Dynamic Calculation Function
    function calculateQ36Totals() {
        let totalMen = 0, totalWomen = 0, totalTg = 0, grandTotal = 0;

        $('#q36_table_body tr').each(function() {
            let men = parseFloat($(this).find('.q36_men').val()) || 0;
            let women = parseFloat($(this).find('.q36_women').val()) || 0;
            let tg = parseFloat($(this).find('.q36_tg').val()) || 0;

            let rowTotal = men + women + tg;
            $(this).find('.q36_row_total').val(rowTotal);

            totalMen += men;
            totalWomen += women;
            totalTg += tg;
            grandTotal += rowTotal;
        });

        $('#q36_total_men').text(totalMen);
        $('#q36_total_women').text(totalWomen);
        $('#q36_total_tg').text(totalTg);
        $('#q36_grand_total').text(grandTotal);
    }

    // Initial Calculation on Load
    calculateQ36Totals();

    // Input Change Trigger
    $(document).on('input', '.q36_calc', function() {
        calculateQ36Totals();
    });

    // Add Row Action (নতুুন রো ২, ৩, ৪... এতে Trash বাটন থাকবে)
    $(document).on('click', '#add_q36_row', function() {
        let newRow = `
            <tr>
                <td>
                    <select class="form-control q36_support_type">
                        <option value="">Select Support</option>
                        <option value="Child-friendly Room">Child-friendly Room</option>
                        <option value="One-way Mirror">One-way Mirror</option>
                        <option value="Legal Support">Legal Support</option>
                        <option value="Others">Others</option>
                    </select>
                </td>
                <td><input type="number" class="form-control q36_men q36_calc" min="0" value="0"></td>
                <td><input type="number" class="form-control q36_women q36_calc" min="0" value="0"></td>
                <td><input type="number" class="form-control q36_tg q36_calc" min="0" value="0"></td>
                <td><input type="number" class="form-control q36_row_total" value="0" readonly></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm remove_q36_row"><i class="fa fa-trash"></i></button>
                </td>
            </tr>`;
        $('#q36_table_body').append(newRow);
        calculateQ36Totals();
    });

    // Remove Row Action (২য় রো থেকে ডিলিট করা যাবে)
    $(document).on('click', '.remove_q36_row', function() {
        $(this).closest('tr').remove();
        calculateQ36Totals();
    });

    // Toggle Handlers
    $(document).on('change', '.q36_p1_status', function() {
        let val = $("input[name='q36_p1_radio']:checked").val();
        $('.q36_p1_yes_box, .q36_p1_others_box').hide();
        if (val === '1') $('.q36_p1_yes_box').show();
        else if (val === '2') $('.q36_p1_others_box').show();
    });

    $(document).on('change', '.q36_p2_status', function() {
        let val = $("input[name='q36_p2_radio']:checked").val();
        $('.q36_p2_yes_box, .q36_p2_others_box').hide();
        if (val === '1') $('.q36_p2_yes_box').show();
        else if (val === '2') $('.q36_p2_others_box').show();
    });

    $(document).on('change', '.q36_p3_status', function() {
        let val = $("input[name='q36_p3_radio']:checked").val();
        $('.q36_p3_yes_box, .q36_p3_others_box').hide();
        if (val === '1') $('.q36_p3_yes_box').show();
        else if (val === '2') $('.q36_p3_others_box').show();
    });

    // Temp Save Action
    $(document).on('click', '#temp-save-question36', function(e) {
        e.preventDefault();

        let p1_status = $("input[name='q36_p1_radio']:checked").val();
        let p2_status = $("input[name='q36_p2_radio']:checked").val();
        let p3_status = $("input[name='q36_p3_radio']:checked").val();

        let tableRows = [];
        $('#q36_table_body tr').each(function() {
            tableRows.push({
                support_type: $(this).find('.q36_support_type').val() || '',
                men: $(this).find('.q36_men').val() || 0,
                women: $(this).find('.q36_women').val() || 0,
                tg: $(this).find('.q36_tg').val() || 0,
                total: $(this).find('.q36_row_total').val() || 0
            });
        });

        let formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('question_no', 36);

        // Part 1
        formData.append('question36[q36_p1_status]', p1_status !== undefined ? p1_status : '1');
        formData.append('question36[q36_p1_yes_desc]', $('#q36_p1_yes_text').val() || '');
        formData.append('question36[q36_p1_others_desc]', $('#q36_p1_others_text').val() || '');

        // Part 2
        formData.append('question36[q36_p2_status]', p2_status !== undefined ? p2_status : '1');
        formData.append('question36[q36_p2_yes_desc]', $('#q36_p2_yes_text').val() || '');
        formData.append('question36[q36_p2_others_desc]', $('#q36_p2_others_text').val() || '');

        // Part 3
        formData.append('question36[q36_p3_status]', p3_status !== undefined ? p3_status : '1');
        formData.append('question36[q36_p3_yes_desc]', $('#q36_p3_yes_text').val() || '');
        formData.append('question36[q36_p3_others_desc]', $('#q36_p3_others_text').val() || '');

        // Dynamic Table Array Data
        formData.append('question36[table_rows]', JSON.stringify(tableRows));

        $.ajax({
            url: "/superadmin/case/temp-save-question",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success || response) {
                    $('.question36 .card-header h6').css('color', 'blue');
                    alert("Question 36 Temp Saved Successfully!");
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