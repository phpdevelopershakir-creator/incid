@php
$Nationality_Lists = [
1 => "Chinese National",
2 => "Cuban national",
3 => "North Korean National"
];

$Sector_Lists = [
1 => "Belt and Road Initiative",
2 => "Medical workers",
3 => "Athletes",
4 => "Coaches",
5 => "Artist",
6 => "Teachers",
7 => "Engineers",
8 => "Sea Merchants",
9 => "Government to Government Work",
10 => "Private Sector",
11 => "Others",
12 => "N/A"
];
@endphp

@if (($questiontitles[1]->status ?? null) == 1)
@php
$question_2_data = session()->get('question2');

$q2_checked =$question_2_data['q2_checked_value'] ?? "1";
$q2_rows_data =$question_2_data['q2_data'] ?? null;
$q2_others_val =$question_2_data['others'] ?? '';
@endphp

<style>
.visibility_q2 {
    display: none !important;
}

.othersText_q2 {
    display: none !important;
}

.q2_risk_other_input {
    margin-top: 5px;
}
</style>

<div class="card question2">
    <div class="card-header" role="tab" id="heading-2">
        <h6 class="card-title" style="color: {{ !empty($question_2_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-2" aria-expanded="false" aria-controls="collapse-2">
                2. {{ $questiontitles[1]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-2" class="collapse" role="tabpanel" aria-labelledby="heading-2" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioTwo1" class="twostatus" name="is_government_transparent_q2" value="1"
                    {{ $q2_checked == "1" ? "checked" : "" }}>
                <label for="radioTwo1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioTwo2" class="twostatus" name="is_government_transparent_q2" value="0"
                    {{ $q2_checked == "0" ? "checked" : "" }}>
                <label for="radioTwo2">No</label>
            </div>

            <div class="icheck-primary input-group mb-3">
                <input type="radio" id="radioTwo3" class="twostatus" name="is_government_transparent_q2" value="2"
                    {{ $q2_checked == "2" ? "checked" : "" }}>
                <label for="radioTwo3">Others</label>

                <span class="col-md-6 mt--4 q2_others_container {{ $q2_checked == '2' ? '' : 'othersText_q2' }}"
                    style="margin-top:-8px;">
                    <input type="text" id="q2others" placeholder="Please describe" class="form-control"
                        value="{{ $q2_others_val }}" name="other_government_transparent_q2">
                </span>
            </div>

            <div id="2_question_view" class="{{ ($q2_checked == '1') ? '' : 'visibility_q2' }}">
                <table id="addRowQ2" class="table table-bordered text-center align-middle">
                    <thead>
                        <tr>
                            <th>Nationality</th>
                            <th>Sector</th>
                            <th>Number of Citizen present in Bangladesh</th>
                            <th>Are they at high risk of forced labour</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($q2_rows_data) && count($q2_rows_data) > 0)
                        @foreach($q2_rows_data as $index =>$row)
                        @if(isset($row['nationality']))
                        @php
                        $riskVal =$row['risk_status_q2'] ?? 'Yes';
                        $riskOtherVal =$row['risk_other_details_q2'] ?? '';
                        $rowNum =$loop->iteration;
                        $rowKey = "row_q2_" . $index;
                        @endphp
                        <tr class="qe2NoOfRow" id="{{ $rowKey }}">
                            <td>
                                <select name="government_nationality_q2[]" class="form-control q2-select">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($Nationality_Lists as $key =>$nationality)
                                    <option value="{{ $key }}"
                                        {{ ($row['nationality'] ?? '') ==$key ? 'selected' : '' }}>
                                        {{ $nationality }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="government_sector_q2[]" class="form-control q2-select">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($Sector_Lists as $key =>$sector)
                                    <option value="{{ $key }}" {{ ($row['sector'] ?? '') ==$key ? 'selected' : '' }}>
                                        {{ $sector }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="government_total_q2[]" value="{{ $row['total'] ?? 0 }}"
                                    class="form-control q2-total" min="0">
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <label class="mr-2"><input type="radio" name="risk_status_q2_row_{{ $index }}"
                                            class="q2_risk_option" value="Yes" {{ $riskVal == 'Yes' ? 'checked' : '' }}>
                                        Yes</label>
                                    <label class="mr-2"><input type="radio" name="risk_status_q2_row_{{ $index }}"
                                            class="q2_risk_option" value="No" {{ $riskVal == 'No' ? 'checked' : '' }}>
                                        No</label>
                                    <label><input type="radio" name="risk_status_q2_row_{{ $index }}"
                                            class="q2_risk_option" value="Other"
                                            {{ $riskVal == 'Other' ? 'checked' : '' }}> Other</label>
                                </div>
                                <input type="text" name="risk_other_details_q2[]"
                                    class="form-control form-control-sm q2_risk_other_input {{ $riskVal == 'Other' ? '' : 'd-none' }}"
                                    placeholder="Please describe" value="{{ $riskOtherVal }}">
                            </td>
                            <td>
                                @if($rowNum == 3)
                                <button id="addRowDatasq2" type="button" class="btn btn-primary btn-sm">Add Row</button>
                                @elseif($rowNum > 3)
                                <button type="button" class="btn btn-danger btn-sm btn_remove_q2">-</button>
                                @endif
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        @else
                        @for ($i = 0; $i < 3; $i++) <tr class="qe2NoOfRow" id="row_q2_fixed_{{ $i }}">
                            <td>
                                <select name="government_nationality_q2[]" class="form-control q2-select">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($Nationality_Lists as $key =>$nationality)
                                    <option value="{{ $key }}">{{ $nationality }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="government_sector_q2[]" class="form-control q2-select">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($Sector_Lists as $key =>$sector)
                                    <option value="{{ $key }}">{{ $sector }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="government_total_q2[]" value="0"
                                    class="form-control q2-total" min="0">
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <label class="mr-2"><input type="radio" name="risk_status_q2_row_{{ $i }}"
                                            class="q2_risk_option" value="Yes" checked> Yes</label>
                                    <label class="mr-2"><input type="radio" name="risk_status_q2_row_{{ $i }}"
                                            class="q2_risk_option" value="No"> No</label>
                                    <label><input type="radio" name="risk_status_q2_row_{{ $i }}" class="q2_risk_option"
                                            value="Other"> Other</label>
                                </div>
                                <input type="text" name="risk_other_details_q2[]"
                                    class="form-control form-control-sm q2_risk_other_input d-none"
                                    placeholder="Please describe">
                            </td>
                            <td>
                                @if($i == 2)
                                <button id="addRowDatasq2" type="button" class="btn btn-primary btn-sm">Add Row</button>
                                @endif
                            </td>
                            </tr>
                            @endfor
                            @endif
                    </tbody>
                </table>
            </div>

            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question2">Save</button>
            </p>
        </div>
    </div>
</div>
@endif

<script type="text/javascript">
$(document).ready(function() {
    $(".twostatus").on("change", function() {
        var statusvalue = $("input[name='is_government_transparent_q2']:checked").val();

        if (statusvalue == '1') {
            $('#2_question_view').removeClass('visibility_q2').show();
            $('.q2_others_container').addClass('othersText_q2').hide();
            $('#q2others').val("");
        } else if (statusvalue == "2") {
            $('#2_question_view').hide();
            $('.q2_others_container').removeClass('othersText_q2').show();
        } else {
            $('#2_question_view').hide();
            $('.q2_others_container').addClass('othersText_q2').hide();
            $('#q2others').val("");
        }
    });

});
</script>
<script type="text/javascript">
$(document).ready(function() {

    // Radio option Change event
    $(document).on('change', '.q2_risk_option', function() {
        let parentTd = $(this).closest('td');
        let otherInput = parentTd.find('.q2_risk_other_input');

        if ($(this).val() === 'Other') {
            otherInput.removeClass('d-none').show();
        } else {
            otherInput.addClass('d-none').hide().val('');
        }
    });

    // Add Row Event
    $(document).on('click', '#addRowDatasq2', function() {
        // এখানে বর্তমানে কতগুলো row আছে তার হিসাব রেখে unique index তৈরি করা হচ্ছে
        let rowIndex = $('#addRowQ2 tbody tr.qe2NoOfRow').length;

        let nationalityOptions = `<option value="" disabled selected>---Choose an item--</option>`;
        @foreach($Nationality_Lists as $key => $nationality)
        nationalityOptions += `<option value="{{ $key }}">{{ $nationality }}</option>`;
        @endforeach

        let sectorOptions = `<option value="" disabled selected>---Choose an item--</option>`;
        @foreach($Sector_Lists as $key => $sector)
        sectorOptions += `<option value="{{ $key }}">{{ $sector }}</option>`;
        @endforeach

        let html = `
        <tr class="qe2NoOfRow" id="row_q2_${rowIndex}">
            <td><select name="government_nationality_q2[]" class="form-control q2-select">${nationalityOptions}</select></td>
            <td><select name="government_sector_q2[]" class="form-control q2-select">${sectorOptions}</select></td>
            <td><input type="number" name="government_total_q2[]" class="form-control q2-total" value="0" min="0"></td>
            <td>
                <div class="d-flex justify-content-center align-items-center gap-2">
                    <label class="mr-2"><input type="radio" name="risk_status_q2_row_${rowIndex}" class="q2_risk_option" value="Yes" checked> Yes</label>
                    <label class="mr-2"><input type="radio" name="risk_status_q2_row_${rowIndex}" class="q2_risk_option" value="No"> No</label>
                    <label><input type="radio" name="risk_status_q2_row_${rowIndex}" class="q2_risk_option" value="Other"> Other</label>
                </div>
                <input type="text" name="risk_other_details_q2[]" class="form-control form-control-sm q2_risk_other_input d-none" placeholder="Please describe">
            </td>
            <td><button type="button" class="btn btn-danger btn-sm btn_remove_q2">-</button></td>
        </tr>`;

        $("#addRowQ2 tbody").append(html);

        // Dynamic Row ডিলিট বা যোগ করার পর রেডিও বাটনের নামগুলো সিরিয়ালি re-index করা
        reIndexQ2Rows();
    });

    $(document).on('click', '.btn_remove_q2', function() {
        $(this).closest('tr').remove();
        reIndexQ2Rows(); // Remove করার পর Index রি-অ্যাডজাস্ট করা
    });

    // রেডিও বাটনের নেম ইনডেক্স সঠিক রাখার ফাংশন
    function reIndexQ2Rows() {
        $('#addRowQ2 tbody tr.qe2NoOfRow').each(function(index) {
            $(this).find('.q2_risk_option').attr('name', 'risk_status_q2_row_' + index);
        });
    }

    // Temp Save JS Code
    $(document).on("click", "#temp-save-question2", function() {
        let q2_rows_data = [];

        $('#addRowQ2 tbody tr.qe2NoOfRow').each(function(i) {
            let nationality = $(this).find('.q2-select[name="government_nationality_q2[]"]')
                .val();
            let sector = $(this).find('.q2-select[name="government_sector_q2[]"]').val();
            let total = $(this).find('.q2-total[name="government_total_q2[]"]').val();

            // নির্দিষ্ট সারির সিলেক্টেড রেডিও বাটন ধরা
            let risk_status = $(this).find('input[name="risk_status_q2_row_' + i + '"]:checked')
                .val() || 'Yes';
            let risk_other_details = $(this).find('.q2_risk_other_input').val();

            if (nationality && sector) {
                q2_rows_data.push({
                    nationality: nationality,
                    sector: sector,
                    total: total ? total : 0,
                    risk_status_q2: risk_status,
                    risk_other_details_q2: risk_status === 'Other' ?
                        risk_other_details : ''
                });
            }
        });

        let saveData = {
            q2_checked_value: $("input[name='is_government_transparent_q2']:checked").val(),
            q2_data: q2_rows_data,
            others: $("#q2others").val()
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                _token: "{{ csrf_token() }}",
                question_no: 2,
                question2: saveData
            },
            success: function(response) {
                $('.question2 .card-header h6').css('color', 'blue');
                alert("Question 2 Temp Saved!");
            },
            error: function() {
                alert("Something went wrong!");
            }
        });
    });
});
</script>