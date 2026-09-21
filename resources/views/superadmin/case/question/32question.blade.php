@if (($questiontitles[31]->status ?? null) == 1)
@php
$question_32_data = session()->get('question32');
$q32_checked = isset($question_32_data['q32_checked_value']) ? (string)$question_32_data['q32_checked_value'] : null;
$q32_data = $question_32_data['q32_data'] ?? null;
@endphp

<div class="card question32">
    <div class="card-header">
        <h6 style="color: {{ !empty($question_32_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-32" aria-expanded="false" aria-controls="Question-32">
                32. {{ $questiontitles[31]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-32" class="collapse" role="tabpanel" aria-labelledby="heading-31" data-parent="#accordion-2">
        <div class="card-body">

            <div class="form-group mb-3">
                <input type="radio" id="radioYes32" class="thirtytwostatus" name="is_complicit_official_q32" value="1"
                    {{ (is_null($q32_checked) || $q32_checked === '1') ? 'checked' : '' }}>
                <label for="radioYes32" class="mr-3 font-weight-bold">Yes</label>

                <input type="radio" id="radioNo32" class="thirtytwostatus" name="is_complicit_official_q32" value="0"
                    {{ ($q32_checked === '0') ? 'checked' : '' }}>
                <label for="radioNo32" class="mr-3 font-weight-bold">No</label>

                <input type="radio" id="radioOthers32" class="thirtytwostatus" name="is_complicit_official_q32"
                    value="2" {{ ($q32_checked === '2') ? 'checked' : '' }}>
                <label for="radioOthers32" class="font-weight-bold">Others</label>
            </div>

            <!-- YES SECTION: TABLE WITH DYNAMIC ADD ROW -->
            <div id="yes_extra_q32"
                style="display: {{ (is_null($q32_checked) || $q32_checked === '1') ? 'block' : 'none' }};">
                <div class="table-responsive">
                    <table class="table table-bordered text-center align-middle" id="table-q32">
                        <thead>
                            <tr class="bg-light">
                                <th>Number of victims penalized/incarcerated</th>
                                <th>Details (Please describe)</th>
                                <th style="width: 100px;">Add row</th>
                            </tr>
                        </thead>
                        <tbody id="q32-tbody">
                            @php
                            $rows = $q32_data['rows'] ?? [[]];
                            if(count($rows) == 0) { $rows = [[]]; }
                            @endphp

                            @foreach($rows as $rIndex => $row)
                            <tr class="q32-row">
                                <td>
                                    <input type="number" name="q32_victim_number[]" class="form-control q32-victim-num"
                                        placeholder="Please describe" value="{{ $row['victim_num'] ?? '' }}" min="0">
                                </td>
                                <td>
                                    <input type="text" name="q32_details[]" class="form-control q32-details"
                                        placeholder="Please describe" value="{{ $row['details'] ?? '' }}">
                                </td>
                                <td>
                                    @if($loop->first)
                                    <button type="button" class="btn btn-sm btn-primary add-row-q32">+</button>
                                    @else
                                    <button type="button" class="btn btn-sm btn-danger remove-row-q32">-</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- NO SECTION: NOTHING HERE -->

            <!-- OTHERS SECTION: INPUT FIELD -->
            <div id="others_q32" style="display: {{ ($q32_checked === '2') ? 'block' : 'none' }};">
                <textarea name="others_complicit_official_q32" class="form-control mt-2 q32-others-input" rows="3"
                    placeholder="Please describe">{{ $q32_data['others'] ?? '' }}</textarea>
            </div>

        </div>

        <p class="text-right mr-3">
            <button type="button" class="btn btn-success" id="temp-save-question32">Save</button>
        </p>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    // Radio button Toggle Logic
    function toggleq32() {
        let val = $("input[name='is_complicit_official_q32']:checked").val();

        if (!val) {
            val = '1';
            $('#radioYes32').prop('checked', true);
        }

        $('#yes_extra_q32').hide();
        $('#others_q32').hide();

        if (val === '1') {
            $('#yes_extra_q32').show();
        } else if (val === '2') {
            $('#others_q32').show();
        }
    }

    $(document).on('change', '.thirtytwostatus', toggleq32);

    // Add Row Event
    $(document).on('click', '.add-row-q32', function(e) {
        e.preventDefault();
        var rowHtml =
            '<tr class="q32-row">' +
            '<td><input type="number" name="q32_victim_number[]" class="form-control q32-victim-num" placeholder="Please describe" min="0"></td>' +
            '<td><input type="text" name="q32_details[]" class="form-control q32-details" placeholder="Please describe"></td>' +
            '<td><button type="button" class="btn btn-sm btn-danger remove-row-q32">-</button></td>' +
            '</tr>';
        $('#q32-tbody').append(rowHtml);
    });

    // Remove Row Event
    $(document).on('click', '.remove-row-q32', function(e) {
        e.preventDefault();
        $(this).closest('tr').remove();
    });

    // Temp Save AJAX Logic
    $(document).on("click", "#temp-save-question32", function() {
        let checkedValue = $("input[name='is_complicit_official_q32']:checked").val();
        let q32_data = {};

        if (checkedValue == '1') {
            let tableRows = [];
            $('.q32-row').each(function() {
                let victimNum = $(this).find('.q32-victim-num').val();
                let details = $(this).find('.q32-details').val();

                if (victimNum || details) {
                    tableRows.push({
                        victim_num: victimNum,
                        details: details
                    });
                }
            });
            q32_data.rows = tableRows;
        } else if (checkedValue == '2') {
            q32_data.others = $('.q32-others-input').val();
        }

        let new_data = {
            q32_checked_value: checkedValue,
            q32_data: q32_data
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                _token: "{{ csrf_token() }}",
                question_no: 32,
                question32: new_data
            },
            success: function(response) {
                if (response.success || response) {
                    $('.question32 .card-header h6').css('color', 'blue');
                    alert("Question 32 Saved Temp");
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