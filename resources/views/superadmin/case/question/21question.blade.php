@if (($questiontitles[20]->status ?? null) == 1)
@php

$question_21_data = session()->get('question21');

$q21_checked = $question_21_data['q21_checked_value'] ?? "1"; // ডিফল্ট 'Yes'
$q21_table_data = $question_21_data['q21_data'] ?? null;
$q21_others_val = $question_21_data['others'] ?? '';
@endphp

<style>
.othersText {
    display: none;
}

.visibility {
    display: none;
}
</style>

<div class="card question21">
    <div class="card-header" role="tab" id="heading-21">
        <h6 class="mb-0 card-title" style="color: {{ !empty($question_21_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-21" aria-expanded="false" aria-controls="collapse-21">
                21. {{ $questiontitles[20]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-21" class="collapse" role="tabpanel" aria-labelledby="heading-21" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioTwentyOne1" class="twentyone_status" name="is_crime_justice_q21" value="1"
                    {{ $q21_checked == "1" ? "checked" : "" }}>
                <label for="radioTwentyOne1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioTwentyOne2" class="twentyone_status" name="is_crime_justice_q21" value="0"
                    {{ $q21_checked == "0" ? "checked" : "" }}>
                <label for="radioTwentyOne2">No</label>
            </div>

            <div class="icheck-primary input-group mb-3">
                <input type="radio" id="radioTwentyOne3" class="twentyone_status" name="is_crime_justice_q21" value="2"
                    {{ $q21_checked == "2" ? "checked" : "" }}>
                <label for="radioTwentyOne3">Others</label>

                <span class="col-md-6 mt--4 q21_others_container {{ $q21_checked == '2' ? '' : 'othersText' }}"
                    style="margin-top:-8px;">
                    <input type="text" id="q21others" placeholder="Others" class="form-control"
                        value="{{ $q21_others_val }}" name="others_crime_justice_q21">
                </span>
            </div>

            <div id="twentyone_question_view" class="{{ ($q21_checked == '1') ? '' : 'visibility' }}">
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
                        @for($i=1; $i<=4; $i++) @php // সেশন অ্যারে থেকে নির্দিষ্ট ইনপুট ভ্যালু অ্যাসাইন করা
                            $men_val=$q21_table_data['q21Men'.$i] ?? 0; $women_val=$q21_table_data['q21Women'.$i] ?? 0;
                            $row_total=(int)$men_val + (int)$women_val; @endphp <tr>
                            <td>
                                <input type="text" name="name_q21[]" id="q21Name{{$i}}" class="form-control q21Input"
                                    value="{{ $q21_table_data['q21Name'.$i] ?? '' }}">
                            </td>
                            <td>
                                <input type="text" name="operator_q21[]" id="q21Operator{{$i}}"
                                    class="form-control q21Input" value="{{ $q21_table_data['q21Operator'.$i] ?? '' }}">
                            </td>
                            <td>
                                <input type="number" name="capacity_men_q21[]" id="q21Men{{$i}}"
                                    class="form-control question21rowmen q21Input" value="{{ $men_val }}" min="0">
                            </td>
                            <td>
                                <input type="number" name="capacity_women_q21[]" id="q21Women{{$i}}"
                                    class="form-control question21rowWomen q21Input" value="{{ $women_val }}" min="0">
                            </td>
                            <td>
                                <input type="text" name="capacity_total_q21[]" id="rowTotal{{$i}}"
                                    class="form-control q21Input" value="{{ $row_total }}" readonly>
                            </td>
                            <td>
                                <input type="text" name="is_specialized_q21[]" id="q21Trafficking{{$i}}"
                                    class="form-control q21Input"
                                    value="{{ $q21_table_data['q21Trafficking'.$i] ?? '' }}">
                            </td>
                            <td>
                                <input type="text" name="eligible_victims_q21[]" id="q21Victims{{$i}}"
                                    class="form-control q21Input" value="{{ $q21_table_data['q21Victims'.$i] ?? '' }}">
                            </td>
                            <td>
                                <input type="text" name="note_q21[]" id="q21Note{{$i}}" class="form-control q21Input"
                                    value="{{ $q21_table_data['q21Note'.$i] ?? '' }}">
                            </td>
                            </tr>
                            @endfor

                            <tr>
                                <th colspan="2">Total</th>
                                <td><input type="text" id="total_men_q21" class="form-control q21Input" readonly></td>
                                <td><input type="text" id="total_women_q21" class="form-control q21Input" readonly></td>
                                <td><input type="text" id="grand_total_q21" class="form-control q21Input" readonly></td>
                            </tr>
                    </tbody>
                </table>
            </div>

            <br />
            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question21">Save</button>
            </p>

        </div>
    </div>
</div>
@endif

<script>
function calculateQ21Totals() {
    let totalMen = 0;
    let totalWomen = 0;

    for (let i = 1; i <= 4; i++) {
        let men = Number($('#q21Men' + i).val()) || 0;
        let women = Number($('#q21Women' + i).val()) || 0;

        let rowTotal = men + women;
        $('#rowTotal' + i).val(rowTotal);

        totalMen += men;
        totalWomen += women;
    }

    $('#total_men_q21').val(totalMen);
    $('#total_women_q21').val(totalWomen);
    $('#grand_total_q21').val(totalMen + totalWomen);
}


$(document).on('input', '.question21rowmen, .question21rowWomen', function() {
    let row = $(this).closest('tr');
    let men = Number(row.find('.question21rowmen').val()) || 0;
    let women = Number(row.find('.question21rowWomen').val()) || 0;

    row.find('input[id^="rowTotal"]').val(men + women);
    calculateQ21Totals();
});

$(document).ready(function() {
    calculateQ21Totals();
});

$('#Question-21').on('shown.bs.collapse', function() {
    calculateQ21Totals();
});
</script>

<script>
$(document).ready(function() {
    $(".twentyone_status").on("change", function() {
        var statusvalue = $("input[name='is_crime_justice_q21']:checked").val();

        if (statusvalue == '1') {
            $('#twentyone_question_view').removeClass('visibility').show();
            $('.q21_others_container').addClass('othersText').hide();
            $('#q21others').val("");
        } else if (statusvalue == "2") {
            $('#twentyone_question_view').hide();
            $('.q21_others_container').removeClass('othersText').show();
        } else {
            $('#twentyone_question_view').hide();
            $('.q21_others_container').addClass('othersText').hide();
            $('#q21others').val("");
        }
    });
});
</script>

<script>
$(document).on("click", "#temp-save-question21", function() {
    calculateQ21Totals();

    let q21_data = {};
    $('.q21Input').each(function() {
        if (this.id) {
            q21_data[this.id] = $(this).val();
        }
    });

    $.ajax({
        type: "POST",
        url: "/superadmin/case/temp-save-question",
        data: {
            _token: "{{ csrf_token() }}",
            question_no: 21,
            question21: {
                q21_checked_value: $("input[name='is_crime_justice_q21']:checked").val(),
                q21_data: q21_data,
                others: $("#q21others").val()
            }
        },
        success: function(response) {
            $('.question21 .card-header h6').css('color', 'blue');
            alert("Question 21  Saved Temporarily ");
        },
        error: function(err) {
            alert("Error saving data");
            console.log(err);
        }
    });
});
</script>