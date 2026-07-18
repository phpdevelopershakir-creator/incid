@if (($questiontitles[0]->status ?? null) == 1)
@php
$question_1_data = session()->get('question1');

$q1_checked = $question_1_data['q1_checked_value'] ?? "1";
$q1_table_one = $question_1_data['q1_table_one'] ?? null;
$q1_table_two = $question_1_data['q1_table_two'] ?? null;
$q1_others_val = $question_1_data['others'] ?? '';

$training_responses = [
1 => "PSHT 2012",
2 => "Rule of PSHTA (2017)",
3 => "OEMA 2013",
4 => "Children Act",
5 => "Labour Act",
6 => "MLA in Criminal Matter 2012",
7 => "Human Organ Transfer Rule 1999"
];

$training_status = [
1 => "Revised",
2 => "Abolished"
];

$training_responses_two = [
1 => "Planned",
2 => "On Process of Need Assessment",
3 => "Drafted",
4 => "Under Review of MoLJPA",
5 => "Waiting to be enacted",
6 => "Enforced"
];
@endphp

<style>
.visibility {
    display: none;
}

.othersText {
    display: none;
}
</style>

<div class="card question1">
    <div class="card-header" role="tab" id="heading-1">
        <h6 class="card-title" style="color: {{ !empty($question_1_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-1" aria-expanded="false" aria-controls="collapse-1">
                1. {{ $questiontitles[0]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-1" class="collapse" role="tabpanel" aria-labelledby="heading-1" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioOne1" class="onestatus" name="is_supreme_court_q1" value="1"
                    {{ $q1_checked == "1" ? "checked" : "" }}>
                <label for="radioOne1">Yes</label>
            </div>
            <div class="icheck-primary">
                <input type="radio" id="radioOne2" class="onestatus" name="is_supreme_court_q1" value="0"
                    {{ $q1_checked == "0" ? "checked" : "" }}>
                <label for="radioOne2">No</label>
            </div>
            <div class="icheck-primary input-group">
                <input type="radio" id="radioOne3" class="onestatus" name="is_supreme_court_q1" value="2"
                    {{ $q1_checked == "2" ? "checked" : "" }}>
                <label for="radioOne3">Others</label>
                <span class="col-md-6 mt--4 q1_others_container {{ $q1_checked == '2' ? '' : 'othersText' }}">
                    <input type="text" id="q7others" placeholder="Others" class="form-control"
                        value="{{ $q1_others_val }}" name="others_supreme_court_q1">
                </span>
            </div>

            <div id="1_question_view" class="{{ $q1_checked == '1' ? '' : 'visibility' }}">

                <h5>Existing Law Changes</h5>
                <table id="addRowQ10" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">Title of The New Law</th>
                            <th scope="col">Contents of Change/Status</th>
                            <th scope="col">Attach/Upload Pdf</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($q1_table_one) && count($q1_table_one) > 0)
                        @foreach($q1_table_one as $index => $row)
                        <tr class="qe1NoOfRow" id="t1_row_{{ $index }}">
                            <td>
                                @if($index == 0)
                                <select name="supreme_court_title[]" class="form-control q10Input row-title">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($training_responses as $key => $training)
                                    <option value="{{ $key }}" {{ ($row['title'] ?? '') == $key ? 'selected' : '' }}>
                                        {{ $training }}</option>
                                    @endforeach
                                </select>
                                @else
                                <input type="text" name="supreme_court_title[]" class="form-control row-title"
                                    placeholder="Others (Specify)___" value="{{ $row['title'] ?? '' }}">
                                @endif
                            </td>
                            <td>
                                <select name="supreme_court_status[]" class="form-control q10Input row-status">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($training_status as $key => $status)
                                    <option value="{{ $key }}" {{ ($row['status'] ?? '') == $key ? 'selected' : '' }}>
                                        {{ $status }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="file" name="supreme_court_image[]" class="form-control"></td>
                            <td>
                                @if($index == 0)
                                @elseif($index == 1)
                                <button id="addRowDatasQ1" type="button" class="btn btn-sm btn-primary">+</button>
                                @else
                                <button type="button" class="btn btn-danger btn_remove_t1">-</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr class="qe1NoOfRow">
                            <td>
                                <select name="supreme_court_title[]" class="form-control q10Input row-title">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($training_responses as $key => $training)
                                    <option value="{{ $key }}">{{ $training }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="supreme_court_status[]" class="form-control q10Input row-status">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($training_status as $key => $status)
                                    <option value="{{ $key }}">{{ $status }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="file" name="supreme_court_image[]" class="form-control"></td>
                            <td></td>
                        </tr>
                        <tr class="qe1NoOfRow">
                            <td><input type="text" name="supreme_court_title[]" class="form-control row-title"
                                    placeholder="Others Specific"></td>
                            <td>
                                <select name="supreme_court_status[]" class="form-control q10Input row-status">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($training_status as $key => $status)
                                    <option value="{{ $key }}">{{ $status }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="file" name="supreme_court_image[]" class="form-control"></td>
                            <td><button id="addRowDatasQ1" type="button" class="btn btn-sm btn-primary">+</button></td>
                        </tr>
                        @endif
                    </tbody>
                </table>

                <hr />

                <h5>New Law</h5>
                <table id="addRow2Q10" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">Title of The New Law</th>
                            <th scope="col">Status</th>
                            <th scope="col">Attach/Upload Pdf</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($q1_table_two) && count($q1_table_two) > 0)
                        @foreach($q1_table_two as $index => $row)
                        <tr class="qe1NoOfRow2" id="t2_row_{{ $index }}">
                            <td><input type="text" name="supreme_court_title_two[]" class="form-control row-title-two"
                                    value="{{ $row['title_two'] ?? '' }}"></td>
                            <td>
                                <select name="supreme_court_status_two[]" class="form-control q10Input row-status-two">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($training_responses_two as $key => $training)
                                    <option value="{{ $key }}"
                                        {{ ($row['status_two'] ?? '') == $key ? 'selected' : '' }}>{{ $training }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="file" name="supreme_court_image_two[]" class="form-control"></td>
                            <td>
                                @if($index == 0)
                                <button id="addRowDatas2Q10" type="button" class="btn btn-sm btn-primary">+</button>
                                @else
                                <button type="button" class="btn btn-danger btn_remove_t2">-</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr class="qe1NoOfRow2">
                            <td><input type="text" name="supreme_court_title_two[]" class="form-control row-title-two"
                                    placeholder="Enter Title"></td>
                            <td>
                                <select name="supreme_court_status_two[]" class="form-control q10Input row-status-two">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($training_responses_two as $key => $training)
                                    <option value="{{ $key }}">{{ $training }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="file" name="supreme_court_image_two[]" class="form-control"></td>
                            <td><button id="addRowDatas2Q10" type="button" class="btn btn-sm btn-primary">+</button>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>

            </div>

            <br />
            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question1">Save</button>
            </p>
        </div>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    // Radio button changes logic
    $(".onestatus").on("change", function() {
        var statusvalue = $("input[name='is_supreme_court_q1']:checked").val();
        if (statusvalue == '1') {
            $('#1_question_view').removeClass('visibility').show();
            $('.q1_others_container').addClass('othersText').hide();
            $('#q7others').val("");
        } else if (statusvalue == "2") {
            $('#1_question_view').hide();
            $('.q1_others_container').removeClass('othersText').show();
        } else {
            $('#1_question_view').hide();
            $('.q1_others_container').addClass('othersText').hide();
            $('#q7others').val("");
        }
    });

    // Table 1: Add Row (Existing Law Changes)
    let t1_counter = $('.qe1NoOfRow').length;
    $(document).on('click', '#addRowDatasQ1', function() {
        t1_counter++;
        let htmlRow = `<tr class="qe1NoOfRow" id="t1_row_${t1_counter}">
                <td><input type="text" name="supreme_court_title[]" class="form-control row-title" placeholder="Others (Specify)___"></td>
                <td>
                    <select name="supreme_court_status[]" class="form-control row-status">
                        <option value="" disabled selected>---Choose an item--</option>
                        <option value="1">Revised</option>
                        <option value="2">Abolished</option>
                    </select>
                </td>
                <td><input type="file" name="supreme_court_image[]" class="form-control"></td>
                <td><button type="button" class="btn btn-danger btn_remove_t1">-</button></td>
            </tr>`;
        $("#addRowQ10 tbody").append(htmlRow);
    });

    // Table 1: Remove Row
    $(document).on('click', '.btn_remove_t1', function() {
        $(this).closest('tr').remove();
    });

    // Table 2: Add Row (New Law)
    let t2_counter = $('.qe1NoOfRow2').length;
    $(document).on('click', '#addRowDatas2Q10', function() {
        t2_counter++;
        let htmlRow2 = `<tr class="qe1NoOfRow2" id="t2_row_${t2_counter}">
                <td><input type="text" name="supreme_court_title_two[]" class="form-control row-title-two" placeholder="Enter Title"></td>
                <td>
                    <select name="supreme_court_status_two[]" class="form-control row-status-two">
                        <option value="" disabled selected>---Choose an item--</option>
                        <option value="1">Planned</option>
                        <option value="2">On Process of Need Assessment</option>
                        <option value="3">Drafted</option>
                        <option value="4">Under Review of MoLJPA</option>
                        <option value="5">Waiting to be enacted</option>
                        <option value="6">Enforced</option>
                    </select>
                </td>
                <td><input type="file" name="supreme_court_image_two[]" class="form-control"></td>
                <td><button type="button" class="btn btn-danger btn_remove_t2">-</button></td>
            </tr>`;
        $("#addRow2Q10 tbody").append(htmlRow2);
    });

    // Table 2: Remove Row
    $(document).on('click', '.btn_remove_t2', function() {
        $(this).closest('tr').remove();
    });

    // Temporary Save Data Logic
    $(document).on("click", '#temp-save-question1', function() {
        let table_one_data = [];
        let table_two_data = [];
        let yes_no_value = $("input[name='is_supreme_court_q1']:checked").val();

        // Table 1 Data Loop
        $('.qe1NoOfRow').each(function() {
            let title = $(this).find('.row-title').val();
            let status = $(this).find('.row-status').val();

            if (title || status) {
                table_one_data.push({
                    title: title,
                    status: status
                });
            }
        });

        // Table 2 Data Loop
        $('.qe1NoOfRow2').each(function() {
            let title_two = $(this).find('.row-title-two').val();
            let status_two = $(this).find('.row-status-two').val();

            if (title_two || status_two) {
                table_two_data.push({
                    title_two: title_two,
                    status_two: status_two
                });
            }
        });

        let final_payload = {
            q1_checked_value: yes_no_value,
            q1_table_one: table_one_data,
            q1_table_two: table_two_data,
            others: $("#q7others").val()
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                "_token": "{{ csrf_token() }}",
                "question_no": 1,
                "question1": final_payload
            },
            success: function(response) {
                $('.question1 .card-title').css('color', 'blue');
                alert("Question 1 Saved Temporary");
            },
            error: function(err) {
                alert("Error saving data");
                console.log(err);
            }
        });
    });
});
</script>