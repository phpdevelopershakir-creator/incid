@if (($questiontitles[56]->status ?? null) == 1)
@php
// Session data for Question 57
$question_57_data = session()->get('question57');
$q57_checked = isset($question_57_data['q57_checked_value']) ? (string)$question_57_data['q57_checked_value'] : null;
$q57_data = $question_57_data['q57_data'] ?? null;
@endphp

<div class="card question57">
    <div class="card-header" id="heading-57">
        <h6 style="color: {{ !empty($question_57_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-57" aria-expanded="false" aria-controls="Question-57">
                57. {{ $questiontitles[56]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-57" class="collapse" role="tabpanel" aria-labelledby="heading-57" data-parent="#accordion-2">
        <div class="card-body">

            <!-- Question Title & Main Input -->
            <div class="form-group">
                <label class="font-weight-bold">
                    Considering what was reported in the 2025 TIP Report country narrative, provide any updates
                    about trafficking trends, government anti-trafficking efforts in territories or semi-autonomous
                    regions, and lead agencies.
                </label>
                <textarea name="desc_considering_reported_q57" class="form-control q57-desc-input" rows="3"
                    placeholder="Input Field">{{ $q57_data['tip_report_updates'] ?? '' }}</textarea>
            </div>

            <!-- Radio Options -->
            <div class="form-group mb-2">
                <input type="radio" id="radioYes57" class="fiftysevenstatus" name="is_considering_reported_q57"
                    value="1" {{ (is_null($q57_checked) || $q57_checked === '1') ? 'checked' : '' }}>
                <label for="radioYes57" class="mr-3 text-danger font-weight-bold">Yes</label>

                <input type="radio" id="radioNo57" class="fiftysevenstatus" name="is_considering_reported_q57" value="0"
                    {{ ($q57_checked === '0') ? 'checked' : '' }}>
                <label for="radioNo57" class="mr-3 text-danger font-weight-bold">No</label>

                <input type="radio" id="radioOthers57" class="fiftysevenstatus" name="is_considering_reported_q57"
                    value="2" {{ ($q57_checked === '2') ? 'checked' : '' }}>
                <label for="radioOthers57" class="text-danger font-weight-bold">Others [input text box with
                    description]</label>
            </div>

            <!-- Others Input Textbox -->
            <div id="others_q57" style="display: {{ ($q57_checked === '2') ? 'block' : 'none' }};">
                <textarea name="other_considering_reported_q57" class="form-control mt-2 q57-others-input" rows="2"
                    placeholder="Others [input text box with description]">{{ $q57_data['others_tip_report'] ?? '' }}</textarea>
            </div>

            <!-- If Yes Section Table -->
            <div id="yes_extra_q57"
                style="display: {{ (is_null($q57_checked) || $q57_checked === '1') ? 'block' : 'none' }};">
                <p class="font-weight-bold mt-3">If Yes</p>

                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="tip-report-table-q57">
                        <thead>
                            <tr class="bg-light">
                                <th>Major Component</th>
                                <th>Suggested Inputs/Update</th>
                                <th>Please Update Attachment (If any)</th>
                                <th style="width: 80px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $table_rows = $q57_data['table_data'] ?? [];
                            $totalRows = max(3, count($table_rows)); // সর্বনিম্ন ৩টি রো থাকবে

                            // প্রথম ৩টি ডিফল্ট মান
                            $defaultValues = [
                            'Trafficking Trends',
                            'Territories / Special Areas',
                            'Government Anti-Trafficking Efforts'
                            ];
                            @endphp

                            @for($i = 0; $i < $totalRows; $i++) @php $row=$table_rows[$i] ?? null;
                                $selectedComponent=$row['component'] ?? ($defaultValues[$i] ?? '' ); @endphp <tr>
                                <td>
                                    <select name="mejor_q57[]" class="form-control q57-component">
                                        <option value="">Dropdown</option>
                                        <option value="Trafficking Trends"
                                            {{ $selectedComponent == 'Trafficking Trends' ? 'selected' : '' }}>
                                            Trafficking Trends</option>
                                        <option value="Territories / Special Areas"
                                            {{ $selectedComponent == 'Territories / Special Areas' ? 'selected' : '' }}>
                                            Territories / Special Areas</option>
                                        <option value="Government Anti-Trafficking Efforts"
                                            {{ $selectedComponent == 'Government Anti-Trafficking Efforts' ? 'selected' : '' }}>
                                            Government Anti-Trafficking Efforts</option>
                                        <option value="Key Update for Reporting Period"
                                            {{ $selectedComponent == 'Key Update for Reporting Period' ? 'selected' : '' }}>
                                            Key Update for Reporting Period</option>
                                    </select>
                                </td>
                                <td>
                                    <textarea name="suggested_q57[]" class="form-control q57-inputs" rows="2"
                                        placeholder="[Input Text Field]">{{ $row['inputs'] ?? '' }}</textarea>
                                </td>
                                <td style="vertical-align: middle;">
                                    <input type="file" name="document_upload_q57[]" class="form-control-file q57-files">
                                    @if(!empty($row['attachment']))
                                    <small class="text-success font-weight-bold d-block mt-1">Uploaded:
                                        {{ $row['attachment'] }}</small>
                                    @endif
                                </td>
                                <td style="vertical-align: middle;">
                                    @if($i < 2) <span class="badge badge-secondary">Fixed</span>
                                        @elseif($i == 2)
                                        <button type="button" class="btn btn-sm btn-primary add-row-q57">+</button>
                                        @else
                                        <button type="button" class="btn btn-sm btn-danger remove-row-q57">-</button>
                                        @endif
                                </td>
                                </tr>
                                @endfor
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <p class="text-right mr-3">
            <button type="button" class="btn btn-success" id="temp-save-question57">Save</button>
        </p>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    // Radio Toggle Logic
    function toggleq57() {
        let val = $("input[name='is_considering_reported_q57']:checked").val();

        if (!val) {
            val = '1';
            $('#radioYes57').prop('checked', true);
        }

        if (val === '1') {
            $('#yes_extra_q57').show();
            $('#others_q57').hide();
        } else if (val === '2') {
            $('#yes_extra_q57').hide();
            $('#others_q57').show();
        } else {
            $('#yes_extra_q57').hide();
            $('#others_q57').hide();
        }
    }

    $(document).on('change', '.fiftysevenstatus', toggleq57);

    // Dynamic Add Row
    $(document).on('click', '.add-row-q57', function() {
        let newRow = `
            <tr>
                <td>
                    <select name="mejor_q57[]" class="form-control q57-component">
                        <option value="">Dropdown</option>
                        <option value="Trafficking Trends">Trafficking Trends</option>
                        <option value="Territories / Special Areas">Territories / Special Areas</option>
                        <option value="Government Anti-Trafficking Efforts">Government Anti-Trafficking Efforts</option>
                        <option value="Key Update for Reporting Period">Key Update for Reporting Period</option>
                    </select>
                </td>
                <td>
                    <textarea name="suggested_q57[]" class="form-control q57-inputs" rows="2" placeholder="Input Text Field"></textarea>
                </td>
                <td style="vertical-align: middle;">
                    <input type="file" name="document_upload_q57[]" class="form-control-file q57-files">
                </td>
                <td style="vertical-align: middle;">
                    <button type="button" class="btn btn-sm btn-danger remove-row-q57">-</button>
                </td>
            </tr>`;
        $('#tip-report-table-q57 tbody').append(newRow);
    });

    // Dynamic Remove Row
    $(document).on('click', '.remove-row-q57', function() {
        $(this).closest('tr').remove();
    });

    // ==================== TEMP SAVE AJAX REQUEST ====================
    $(document).on("click", "#temp-save-question57", function() {
        let formData = new FormData();
        let checkedValue = $("input[name='is_considering_reported_q57']:checked").val();

        formData.append('_token', '{{ csrf_token() }}');
        formData.append('question_no', 57);
        formData.append('q57_checked_value', checkedValue);
        formData.append('tip_report_updates', $('.q57-desc-input').val());
        formData.append('others_tip_report', $('.q57-others-input').val());

        // Loop Table Data
        $('#tip-report-table-q57 tbody tr').each(function(index) {
            let component = $(this).find('.q57-component').val();
            let inputs = $(this).find('.q57-inputs').val();
            let fileInput = $(this).find('.q57-files')[0];

            formData.append(`table_data[${index}][component]`, component);
            formData.append(`table_data[${index}][inputs]`, inputs);

            if (fileInput && fileInput.files[0]) {
                formData.append(`table_data[${index}][file]`, fileInput.files[0]);
            }
        });

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success || response) {
                    $('.question57 .card-header h6').css('color', 'blue');
                    alert("Question 57 Temp Saved Successfully");
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