@if (($questiontitles[21]->status ?? null) == 1)
@php

$question_22_data = session()->get('question22');

$q22_checked = $question_22_data['q22_checked_value'] ?? "1"; // ডিফল্ট 'Yes'
$q22_table_data = $question_22_data['q22_data'] ?? null;
$q22_others_val = $question_22_data['others'] ?? '';
@endphp

<style>
.othersText {
    display: none;
}

.visibility {
    display: none;
}
</style>

<div class="card question22">
    <div class="card-header" role="tab" id="heading-22">
        <h6 class="mb-0 card-title" style="color: {{ !empty($question_22_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-22" aria-expanded="false" aria-controls="collapse-22">
                22. {{ $questiontitles[21]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-22" class="collapse" role="tabpanel" aria-labelledby="heading-22" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioTwentyTwo1" class="twentytwo_status" name="is_crime_justice_q22" value="1"
                    {{ $q22_checked == "1" ? "checked" : "" }}>
                <label for="radioTwentyTwo1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioTwentyTwo2" class="twentytwo_status" name="is_crime_justice_q22" value="0"
                    {{ $q22_checked == "0" ? "checked" : "" }}>
                <label for="radioTwentyTwo2">No</label>
            </div>

            <div class="icheck-primary input-group mb-3">
                <input type="radio" id="radioTwentyTwo3" class="twentytwo_status" name="is_crime_justice_q22" value="2"
                    {{ $q22_checked == "2" ? "checked" : "" }}>
                <label for="radioTwentyTwo3">Others</label>

                <span class="col-md-6 mt--4 q22_others_container {{ $q22_checked == '2' ? '' : 'othersText' }}"
                    style="margin-top:-8px;">
                    <input type="text" id="q22others" placeholder="Others" class="form-control"
                        value="{{ $q22_others_val }}" name="others_crime_justice_q22">
                </span>
            </div>

            <div id="twenty_two_question_view" class="{{ ($q22_checked == '1') ? '' : 'visibility' }}">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th rowspan="2">Name of the Shelters</th>
                            <th rowspan="2">Operators</th>
                            <th colspan="3">Capacity</th>
                            <th rowspan="2">Specialized for Trafficking?</th>
                            <th rowspan="2">Eligible Victims</th>
                            <th rowspan="2">Note</th>
                        </tr>
                        <tr>
                            <th>Men</th>
                            <th>Women</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @for($i=1; $i<=4; $i++) @php $men_val=$q22_table_data['q22Men'.$i] ?? 0;
                            $women_val=$q22_table_data['q22Women'.$i] ?? 0; $row_total=(int)$men_val + (int)$women_val;
                            @endphp <tr>
                            <td>
                                <input type="text" name="name_q22[]" id="q22Name{{$i}}" class="form-control q22Input"
                                    value="{{ $q22_table_data['q22Name'.$i] ?? '' }}">
                            </td>
                            <td>
                                <input type="text" name="operator_q22[]" id="q22Operator{{$i}}"
                                    class="form-control q22Input" value="{{ $q22_table_data['q22Operator'.$i] ?? '' }}">
                            </td>
                            <td>
                                <input type="number" name="capacity_men_q22[]" id="q22Men{{$i}}"
                                    class="form-control question22rowmen q22Input" value="{{ $men_val }}" min="0">
                            </td>
                            <td>
                                <input type="number" name="capacity_women_q22[]" id="q22Women{{$i}}"
                                    class="form-control question22rowWomen q22Input" value="{{ $women_val }}" min="0">
                            </td>
                            <td>
                                <input type="text" name="capacity_total_q22[]" id="rowTotal{{$i}}"
                                    class="form-control q22Input" value="{{ $row_total }}" readonly>
                            </td>
                            <td>
                                <input type="text" name="is_specialized_q22[]" id="q22Trafficking{{$i}}"
                                    class="form-control q22Input"
                                    value="{{ $q22_table_data['q22Trafficking'.$i] ?? '' }}">
                            </td>
                            <td>
                                <input type="text" name="eligible_victims_q22[]" id="q22Victims{{$i}}"
                                    class="form-control q22Input" value="{{ $q22_table_data['q22Victims'.$i] ?? '' }}">
                            </td>
                            <td>
                                <input type="text" name="note_q22[]" id="q22Note{{$i}}" class="form-control q22Input"
                                    value="{{ $q22_table_data['q22Note'.$i] ?? '' }}">
                            </td>
                            </tr>
                            @endfor

                            <tr>
                                <th colspan="2">Total</th>
                                <td><input type="text" id="total_men_q22" class="form-control q22Input" readonly></td>
                                <td><input type="text" id="total_women_q22" class="form-control q22Input" readonly></td>
                                <td><input type="text" id="grand_total_q22" class="form-control q22Input" readonly></td>
                            </tr>
                    </tbody>
                </table>
            </div>

            <br />
            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question22">Save</button>
            </p>

        </div>
    </div>
</div>
@endif

<script>
function calculateQ22Totals() {
    let totalMen = 0;
    let totalWomen = 0;

    for (let i = 1; i <= 4; i++) {
        let men = Number($('#q22Men' + i).val()) || 0;
        let women = Number($('#q22Women' + i).val()) || 0;

        let rowTotal = men + women;
        $('#rowTotal' + i).val(rowTotal);

        totalMen += men;
        totalWomen += women;
    }

    $('#total_men_q22').val(totalMen);
    $('#total_women_q22').val(totalWomen);
    $('#grand_total_q22').val(totalMen + totalWomen);
}


$(document).on('input', '.question22rowmen, .question22rowWomen', function() {
    let row = $(this).closest('tr');
    let men = Number(row.find('.question22rowmen').val()) || 0;
    let women = Number(row.find('.question22rowWomen').val()) || 0;

    row.find('input[id^="rowTotal"]').val(men + women);
    calculateQ22Totals();
});

$(document).ready(function() {
    calculateQ22Totals();
});

$('#Question-22').on('shown.bs.collapse', function() {
    calculateQ22Totals();
});
</script>

<script>
$(document).ready(function() {
    $(".twentytwo_status").on("change", function() {
        var statusvalue = $("input[name='is_crime_justice_q22']:checked").val();

        if (statusvalue == '1') {
            $('#twenty_two_question_view').removeClass('visibility').show();
            $('.q22_others_container').addClass('othersText').hide();
            $('#q22others').val("");
        } else if (statusvalue == "2") {
            $('#twenty_two_question_view').hide();
            $('.q22_others_container').removeClass('othersText').show();
        } else {
            $('#twenty_two_question_view').hide();
            $('.q22_others_container').addClass('othersText').hide();
            $('#q22others').val("");
        }
    });
});
</script>

<script>
$(document).on("click", "#temp-save-question22", function() {
    calculateQ22Totals();

    let q22_data = {};
    $('.q22Input').each(function() {
        if (this.id) {
            q22_data[this.id] = $(this).val();
        }
    });

    $.ajax({
        type: "POST",
        url: "/superadmin/case/temp-save-question",
        data: {
            _token: "{{ csrf_token() }}",
            question_no: 22,
            question22: {
                q22_checked_value: $("input[name='is_crime_justice_q22']:checked").val(),
                q22_data: q22_data,
                others: $("#q22others").val()
            }
        },
        success: function(response) {
            $('.question22 .card-header h6').css('color', 'blue');
            alert("Question 22  Saved Temporarily ");
        },
        error: function(err) {
            alert("Error saving data");
            console.log(err);
        }
    });
});
</script>