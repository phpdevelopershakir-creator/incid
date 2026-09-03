@if (($questiontitles[35]->status ?? null) == 1)
@php
// সেশন থেকে ৩৬ নম্বর প্রশ্নের ডাটা ক্যাচ করা
$question_36_data = session()->get('question36', []);

// Part 1 Data (ডিফল্ট '1' অর্থাৎ Yes)
$q36_p1_status = isset($question_36_data['q36_p1_status']) ? (string)$question_36_data['q36_p1_status'] : '1';
$q36_p1_yes_desc = $question_36_data['q36_p1_yes_desc'] ?? '';
$q36_p1_others_desc = $question_36_data['q36_p1_others_desc'] ?? '';

// Part 2 Data
$q36_p2_status = isset($question_36_data['q36_p2_status']) ? (string)$question_36_data['q36_p2_status'] : '1';
$q36_p2_yes_desc = $question_36_data['q36_p2_yes_desc'] ?? '';
$q36_p2_others_desc = $question_36_data['q36_p2_others_desc'] ?? '';

// Part 3 Data
$q36_p3_status = isset($question_36_data['q36_p3_status']) ? (string)$question_36_data['q36_p3_status'] : '1';
$q36_p3_yes_desc = $question_36_data['q36_p3_yes_desc'] ?? '';
$q36_p3_others_desc = $question_36_data['q36_p3_others_desc'] ?? '';

// Dynamic Table Data Safe Array Fetch
$q36_support_types = $question_36_data['q36_support_type'] ?? [];
$q36_mens = $question_36_data['q36_men'] ?? [];
$q36_womens = $question_36_data['q36_women'] ?? [];
$q36_tgs = $question_36_data['q36_tg'] ?? [];
$q36_totals = $question_36_data['q36_total'] ?? [];

$rowCount = max(count($q36_support_types), 1);
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

    <div id="Question-36" class="collapse" role="tabpanel" aria-labelledby="heading-36">
        <div class="card-body">




            <!-- ================= Part 1 ================= -->
            <div class="form-group mb-4 p-3 border rounded bg-light">
                <label class="font-weight-bold d-block text-dark">
                    a) Is specialized support provided for child/vulnerable victims?
                </label>

                <div class="form-check form-check-inline">
                    <input class="form-check-input q36_p1_radio" type="radio" name="question36[q36_p1_status]"
                        id="q36_p1_yes" value="1" {{ $q36_p1_status === '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="q36_p1_yes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input q36_p1_radio" type="radio" name="question36[q36_p1_status]"
                        id="q36_p1_no" value="0" {{ $q36_p1_status === '0' ? 'checked' : '' }}>
                    <label class="form-check-label" for="q36_p1_no">No</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input q36_p1_radio" type="radio" name="question36[q36_p1_status]"
                        id="q36_p1_others" value="2"
                        {{ $q36_p1_status === '2' || $q36_p1_status === 'others' ? 'checked' : '' }}>
                    <label class="form-check-label" for="q36_p1_others">Others</label>
                </div>

                <div class="mt-3 {{ $q36_p1_status === '1' ? '' : 'd-none' }}" id="q36_p1_yes_box">
                    <label class="small font-weight-bold">If Yes, specify support details:</label>
                    <textarea class="form-control" name="question36[q36_p1_yes_desc]" rows="2"
                        placeholder="Describe specialized support">{{ $q36_p1_yes_desc }}</textarea>
                </div>

                <div class="mt-3 {{ $q36_p1_status === '2' || $q36_p1_status === 'others' ? '' : 'd-none' }}"
                    id="q36_p1_others_box">
                    <label class="small font-weight-bold">If Others, specify:</label>
                    <input type="text" class="form-control" name="question36[q36_p1_others_desc]"
                        value="{{ $q36_p1_others_desc }}" placeholder="Specify other status">
                </div>
            </div>

            <!-- ================= Part 2 ================= -->
            <div class="form-group mb-4 p-3 border rounded bg-light">
                <label class="font-weight-bold d-block text-dark">
                    b) Are specialized facilities available (e.g., Child-friendly room, One-way mirror, Legal
                    support, etc.)?
                </label>

                <div class="form-check form-check-inline">
                    <input class="form-check-input q36_p2_radio" type="radio" name="question36[q36_p2_status]"
                        id="q36_p2_yes" value="1" {{ $q36_p2_status === '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="q36_p2_yes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input q36_p2_radio" type="radio" name="question36[q36_p2_status]"
                        id="q36_p2_no" value="0" {{ $q36_p2_status === '0' ? 'checked' : '' }}>
                    <label class="form-check-label" for="q36_p2_no">No</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input q36_p2_radio" type="radio" name="question36[q36_p2_status]"
                        id="q36_p2_others" value="2"
                        {{ $q36_p2_status === '2' || $q36_p2_status === 'others' ? 'checked' : '' }}>
                    <label class="form-check-label" for="q36_p2_others">Others</label>
                </div>

                <div class="mt-3 {{ $q36_p2_status === '1' ? '' : 'd-none' }}" id="q36_p2_yes_box">
                    <label class="small font-weight-bold">If Yes, specify available facilities:</label>
                    <textarea class="form-control" name="question36[q36_p2_yes_desc]" rows="2"
                        placeholder="Describe available facilities">{{ $q36_p2_yes_desc }}</textarea>
                </div>

                <div class="mt-3 {{ $q36_p2_status === '2' || $q36_p2_status === 'others' ? '' : 'd-none' }}"
                    id="q36_p2_others_box">
                    <label class="small font-weight-bold">If Others, specify:</label>
                    <input type="text" class="form-control" name="question36[q36_p2_others_desc]"
                        value="{{ $q36_p2_others_desc }}" placeholder="Specify other status">
                </div>
            </div>

            <!-- ================= Dynamic Table ================= -->
            <div class="form-group mb-4 p-3 border rounded bg-white">
                <label class="font-weight-bold d-block text-primary">
                    Number of Victims Benefited by Specialized Support (Categorized)
                </label>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="q36_dynamic_table">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th style="width: 30%;">Type of Support</th>
                                <th>Men</th>
                                <th>Women</th>
                                <th>TG</th>
                                <th>Total</th>
                                <th style="width: 80px;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="q36_table_body">
                            @for($i = 0; $i < $rowCount; $i++) <tr>
                                <td>
                                    <select name="question36[q36_support_type][]" class="form-control q36_support_type">
                                        <option value="">Select Support</option>
                                        <option value="Child-friendly Room"
                                            {{ ($q36_support_types[$i] ?? '') == 'Child-friendly Room' ? 'selected' : '' }}>
                                            Child-friendly Room</option>
                                        <option value="One-way Mirror"
                                            {{ ($q36_support_types[$i] ?? '') == 'One-way Mirror' ? 'selected' : '' }}>
                                            One-way Mirror</option>
                                        <option value="Legal Support"
                                            {{ ($q36_support_types[$i] ?? '') == 'Legal Support' ? 'selected' : '' }}>
                                            Legal Support</option>
                                        <option value="Others"
                                            {{ ($q36_support_types[$i] ?? '') == 'Others' ? 'selected' : '' }}>
                                            Others</option>
                                    </select>
                                </td>
                                <td><input type="number" name="question36[q36_men][]"
                                        class="form-control q36_men q36_calc" min="0" value="{{ $q36_mens[$i] ?? 0 }}">
                                </td>
                                <td><input type="number" name="question36[q36_women][]"
                                        class="form-control q36_women q36_calc" min="0"
                                        value="{{ $q36_womens[$i] ?? 0 }}"></td>
                                <td><input type="number" name="question36[q36_tg][]"
                                        class="form-control q36_tg q36_calc" min="0" value="{{ $q36_tgs[$i] ?? 0 }}">
                                </td>
                                <td><input type="number" name="question36[q36_total][]"
                                        class="form-control q36_row_total" value="{{ $q36_totals[$i] ?? 0 }}" readonly>
                                </td>
                                <td>
                                    @if($i == 0)
                                    <button type="button" class="btn btn-primary btn-sm" id="add_q36_row"><i
                                            class="fa fa-plus"></i></button>
                                    @else
                                    <button type="button" class="btn btn-danger btn-sm remove_q36_row"><i
                                            class="fa fa-trash"></i></button>
                                    @endif
                                </td>
                                </tr>
                                @endfor
                        </tbody>
                        <tfoot>
                            <tr class="font-weight-bold bg-light">
                                <td>Grand Total</td>
                                <td id="q36_grand_men">0</td>
                                <td id="q36_grand_women">0</td>
                                <td id="q36_grand_tg">0</td>
                                <td id="q36_grand_total">0</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- ================= Part 3 ================= -->
            <div class="form-group mb-4 p-3 border rounded bg-light">
                <label class="font-weight-bold d-block text-dark">
                    c) Are measures taken to prevent secondary victimization or discrimination during
                    inquiry/investigation?
                </label>

                <div class="form-check form-check-inline">
                    <input class="form-check-input q36_p3_radio" type="radio" name="question36[q36_p3_status]"
                        id="q36_p3_yes" value="1" {{ $q36_p3_status === '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="q36_p3_yes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input q36_p3_radio" type="radio" name="question36[q36_p3_status]"
                        id="q36_p3_no" value="0" {{ $q36_p3_status === '0' ? 'checked' : '' }}>
                    <label class="form-check-label" for="q36_p3_no">No</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input q36_p3_radio" type="radio" name="question36[q36_p3_status]"
                        id="q36_p3_others" value="2"
                        {{ $q36_p3_status === '2' || $q36_p3_status === 'others' ? 'checked' : '' }}>
                    <label class="form-check-label" for="q36_p3_others">Others</label>
                </div>

                <div class="mt-3 {{ $q36_p3_status === '1' ? '' : 'd-none' }}" id="q36_p3_yes_box">
                    <label class="small font-weight-bold">If Yes, specify preventive measures:</label>
                    <textarea class="form-control" name="question36[q36_p3_yes_desc]" rows="2"
                        placeholder="Describe preventive measures">{{ $q36_p3_yes_desc }}</textarea>
                </div>

                <div class="mt-3 {{ $q36_p3_status === '2' || $q36_p3_status === 'others' ? '' : 'd-none' }}"
                    id="q36_p3_others_box">
                    <label class="small font-weight-bold">If Others, specify:</label>
                    <input type="text" class="form-control" name="question36[q36_p3_others_desc]"
                        value="{{ $q36_p3_others_desc }}" placeholder="Specify other status">
                </div>
            </div>

            <div class="text-right">
                <button type="button" class="btn btn-success px-5" id="save_q36_btn">Save</button>
            </div>


        </div>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    // Radio Toggle Handler (Part 1, 2, 3)
    $(document.body).on('change', '.q36_p1_radio', function() {
        let val = $(this).val();
        if (val === '1') {
            $('#q36_p1_yes_box').removeClass('d-none');
            $('#q36_p1_others_box').addClass('d-none');
        } else if (val === '2' || val === 'others') {
            $('#q36_p1_others_box').removeClass('d-none');
            $('#q36_p1_yes_box').addClass('d-none');
        } else {
            $('#q36_p1_yes_box, #q36_p1_others_box').addClass('d-none');
        }
    });

    $(document.body).on('change', '.q36_p2_radio', function() {
        let val = $(this).val();
        if (val === '1') {
            $('#q36_p2_yes_box').removeClass('d-none');
            $('#q36_p2_others_box').addClass('d-none');
        } else if (val === '2' || val === 'others') {
            $('#q36_p2_others_box').removeClass('d-none');
            $('#q36_p2_yes_box').addClass('d-none');
        } else {
            $('#q36_p2_yes_box, #q36_p2_others_box').addClass('d-none');
        }
    });

    $(document.body).on('change', '.q36_p3_radio', function() {
        let val = $(this).val();
        if (val === '1') {
            $('#q36_p3_yes_box').removeClass('d-none');
            $('#q36_p3_others_box').addClass('d-none');
        } else if (val === '2' || val === 'others') {
            $('#q36_p3_others_box').removeClass('d-none');
            $('#q36_p3_yes_box').addClass('d-none');
        } else {
            $('#q36_p3_yes_box, #q36_p3_others_box').addClass('d-none');
        }
    });

    // Dynamic Calculation Logic
    function calculateQ36Totals() {
        let grandMen = 0,
            grandWomen = 0,
            grandTg = 0,
            grandTotal = 0;

        $('#q36_table_body tr').each(function() {
            let men = parseFloat($(this).find('.q36_men').val()) || 0;
            let women = parseFloat($(this).find('.q36_women').val()) || 0;
            let tg = parseFloat($(this).find('.q36_tg').val()) || 0;

            let rowTotal = men + women + tg;
            $(this).find('.q36_row_total').val(rowTotal);

            grandMen += men;
            grandWomen += women;
            grandTg += tg;
            grandTotal += rowTotal;
        });

        $('#q36_grand_men').text(grandMen);
        $('#q36_grand_women').text(grandWomen);
        $('#q36_grand_tg').text(grandTg);
        $('#q36_grand_total').text(grandTotal);
    }

    $(document.body).on('input', '.q36_calc', function() {
        calculateQ36Totals();
    });

    // Add Dynamic Row
    $(document.body).on('click', '#add_q36_row', function() {
        let newRow = `
            <tr>
                <td>
                    <select class="form-control q36_support_type" name="question36[q36_support_type][]">
                        <option value="">Select Support</option>
                        <option value="Child-friendly Room">Child-friendly Room</option>
                        <option value="One-way Mirror">One-way Mirror</option>
                        <option value="Legal Support">Legal Support</option>
                        <option value="Others">Others</option>
                    </select>
                </td>
                <td><input type="number" name="question36[q36_men][]" class="form-control q36_men q36_calc" min="0" value="0"></td>
                <td><input type="number" name="question36[q36_women][]" class="form-control q36_women q36_calc" min="0" value="0"></td>
                <td><input type="number" name="question36[q36_tg][]" class="form-control q36_tg q36_calc" min="0" value="0"></td>
                <td><input type="number" name="question36[q36_total][]" class="form-control q36_row_total" value="0" readonly></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm remove_q36_row"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        `;
        $('#q36_table_body').append(newRow);
        calculateQ36Totals();
    });

    // Remove Dynamic Row
    $(document.body).on('click', '.remove_q36_row', function() {
        $(this).closest('tr').remove();
        calculateQ36Totals();
    });

    // Calculate Initial Totals
    calculateQ36Totals();

    // Temp Save AJAX Request
    $(document.body).on('click', '#save_q36_btn', function(e) {
        e.preventDefault();

        let formData = $('#q36_form').serialize();

        $.ajax({
            url: "/superadmin/case/temp-save-question",
            type: "POST",
            data: formData,
            success: function(response) {
                if (response.success || response) {
                    $('.question36 .card-header h6').css('color', 'blue');
                    alert('Question 36 Temp Saved Successfully!');
                }
            },
            error: function(xhr) {
                alert('Something went wrong!');
                console.log(xhr.responseText);
            }
        });
    });

});
</script>