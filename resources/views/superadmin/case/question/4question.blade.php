@if (($questiontitles[3]->status ?? null) == 1)
@php

$question_4_data = session()->get('question4');

$q4_checked = $question_4_data['q4_checked_value'] ?? "1";
$q4_table_one = $question_4_data['q4_table_one'] ?? null;
$q4_table_two = $question_4_data['q4_table_two'] ?? null;
$q4_others_val = $question_4_data['others'] ?? '';

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

<div class="card question4">
    <div class="card-header" role="tab" id="heading-4">
        <h6 class="card-title" style="color: {{ !empty($question_4_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-4" aria-expanded="false" aria-controls="collapse-4">
                4. {{ $questiontitles[3]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-4" class="collapse" role="tabpanel" aria-labelledby="heading-4" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioFour1" class="fourstatus" name="is_supreme_court_q4" value="1"
                    {{ $q4_checked == "1" ? "checked" : "" }}>
                <label for="radioFour1">Yes</label>
            </div>
            <div class="icheck-primary">
                <input type="radio" id="radioFour2" class="fourstatus" name="is_supreme_court_q4" value="0"
                    {{ $q4_checked == "0" ? "checked" : "" }}>
                <label for="radioFour2">No</label>
            </div>
            <div class="icheck-primary input-group">
                <input type="radio" id="radioFour3" class="fourstatus" name="is_supreme_court_q4" value="2"
                    {{ $q4_checked == "2" ? "checked" : "" }}>
                <label for="radioFour3">Others</label>
                <span class="col-md-6 mt--4 q4_others_container {{ $q4_checked == '2' ? '' : 'othersText' }}">
                    <input type="text" id="q4others" placeholder="Others" class="form-control"
                        value="{{ $q4_others_val }}" name="others_supreme_court_q4">
                </span>
            </div>

            <div id="4_question_view" class="{{ $q4_checked == '1' ? '' : 'visibility' }}">

                <h5>Existing Law Changes</h5>
                <table id="addRowQ4" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">Title of The New Law</th>
                            <th scope="col">Contents of Change/Status</th>
                            <th scope="col">Attach/Upload Pdf</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($q4_table_one) && count($q4_table_one) > 0)
                        @foreach($q4_table_one as $index => $row)
                        <tr class="qe4NoOfRow" id="t1_q4_row_{{ $index }}">
                            <td>
                                @if($index == 0)
                                <select name="supreme_court_title_q4[]" class="form-control">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($training_responses as $key => $training)
                                    <option value="{{ $key }}" {{ ($row['title'] ?? '') == $key ? 'selected' : '' }}>
                                        {{ $training }}</option>
                                    @endforeach
                                </select>
                                @else
                                <input type="text" name="supreme_court_title_q4[]" class="form-control"
                                    placeholder="Others Specific" value="{{ $row['title'] ?? '' }}">
                                @endif
                            </td>
                            <td>
                                <select name="supreme_court_status_q4[]" class="form-control">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($training_status as $key => $status)
                                    <option value="{{ $key }}" {{ ($row['status'] ?? '') == $key ? 'selected' : '' }}>
                                        {{ $status }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="file" name="supreme_court_image_q4[]" class="form-control"></td>
                            <td>
                                @if($index == 0)
                                @elseif($index == 1)
                                <button id="addRowDatasQ4" type="button" class="btn btn-sm btn-primary">+</button>
                                @else
                                <button type="button" class="btn btn-danger btn_remove_t1_q4">-</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr class="qe4NoOfRow">
                            <td>
                                <select name="supreme_court_title_q4[]" class="form-control">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($training_responses as $key => $training)
                                    <option value="{{ $key }}">{{ $training }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="supreme_court_status_q4[]" class="form-control">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($training_status as $key => $status)
                                    <option value="{{ $key }}">{{ $status }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="file" name="supreme_court_image_q4[]" class="form-control"></td>
                            <td></td>
                        </tr>
                        <tr class="qe4NoOfRow">
                            <td>
                                <input type="text" name="supreme_court_title_q4[]" class="form-control"
                                    placeholder="Others (Specify)___">
                            </td>
                            <td>
                                <select name="supreme_court_status_q4[]" class="form-control">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($training_status as $key => $status)
                                    <option value="{{ $key }}">{{ $status }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="file" name="supreme_court_image_q4[]" class="form-control"></td>
                            <td><button id="addRowDatasQ4" type="button" class="btn btn-sm btn-primary">+</button></td>
                        </tr>
                        @endif
                    </tbody>
                </table>

                <hr />

                <h5>New Law</h5>
                <table id="addRow2Q4" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">Title of The New Law</th>
                            <th scope="col">Status</th>
                            <th scope="col">Attach/Upload Pdf</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($q4_table_two) && count($q4_table_two) > 0)
                        @foreach($q4_table_two as $index => $row)
                        <tr class="qe4NoOfRow2" id="t2_q4_row_{{ $index }}">
                            <td><input type="text" name="supreme_court_title_two_q4[]" class="form-control"
                                    value="{{ $row['title_two'] ?? '' }}"></td>
                            <td>
                                <select name="supreme_court_status_two_q4[]" class="form-control">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($training_responses_two as $key => $training)
                                    <option value="{{ $key }}"
                                        {{ ($row['status_two'] ?? '') == $key ? 'selected' : '' }}>{{ $training }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="file" name="supreme_court_image_two_q4[]" class="form-control"></td>
                            <td>
                                @if($index == 0)
                                <button id="addRowDatas2Q4" type="button" class="btn btn-sm btn-primary">+</button>
                                @else
                                <button type="button" class="btn btn-danger btn_remove_t2_q4">-</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr class="qe4NoOfRow2">
                            <td><input type="text" name="supreme_court_title_two_q4[]" class="form-control"
                                    placeholder="Enter Title"></td>
                            <td>
                                <select name="supreme_court_status_two_q4[]" class="form-control">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($training_responses_two as $key => $training)
                                    <option value="{{ $key }}">{{ $training }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="file" name="supreme_court_image_two_q4[]" class="form-control"></td>
                            <td><button id="addRowDatas2Q4" type="button" class="btn btn-sm btn-primary">+</button></td>
                        </tr>
                        @endif
                    </tbody>
                </table>

            </div>

            <br />
            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question4">Save</button>
            </p>
        </div>
    </div>
</div>
@endif

<script>
$(document).ready(function() {
    // Yes/No/Others কন্ডিশনাল শো হাইড লজিক
    $(".fourstatus").on("change", function() {
        var statusvalue = $("input[name='is_supreme_court_q4']:checked").val();
        if (statusvalue == '1') {
            $('#4_question_view').removeClass('visibility').show();
            $('.q4_others_container').addClass('othersText').hide();
            $('#q4others').val("");
        } else if (statusvalue == "2") {
            $('#4_question_view').hide();
            $('.q4_others_container').removeClass('othersText').show();
        } else {
            $('#4_question_view').hide();
            $('.q4_others_container').addClass('othersText').hide();
            $('#q4others').val("");
        }
    });

    // ➕ Table 1: ডাইনামিক রো অ্যাড করা
    let t1_counter = $('.qe4NoOfRow').length;
    $("#addRowDatasQ4").click(function() {
        t1_counter++;
        let htmlRow = `<tr class="qe4NoOfRow" id="t1_q4_row_${t1_counter}">
                <td><input type="text" name="supreme_court_title_q4[]" class="form-control" placeholder="Others (Specify)___"></td>
                <td>
                    <select name="supreme_court_status_q4[]" class="form-control">
                        <option value="" disabled selected>---Choose an item--</option>
                        <option value="1">Revised</option>
                        <option value="2">Abolished</option>
                    </select>
                </td>
                <td><input type="file" name="supreme_court_image_q4[]" class="form-control"></td>
                <td><button type="button" class="btn btn-danger btn_remove_t1_q4">-</button></td>
            </tr>`;
        $("#addRowQ4 tbody").append(htmlRow);
    });

    // ➖ Table 1: রো ডিলিট করা
    $(document).on('click', '.btn_remove_t1_q4', function() {
        $(this).closest('tr').remove();
    });


    // ➕ Table 2: ডাইনামিক রো অ্যাড করা
    let t2_counter = $('.qe4NoOfRow2').length;
    $(document).on('click', '#addRowDatas2Q4', function() {
        t2_counter++;
        let htmlRow2 = `<tr class="qe4NoOfRow2" id="t2_q4_row_${t2_counter}">
                <td><input type="text" name="supreme_court_title_two_q4[]" class="form-control" placeholder="Enter Title"></td>
                <td>
                    <select name="supreme_court_status_two_q4[]" class="form-control">
                        <option value="" disabled selected>---Choose an item--</option>
                        <option value="1">Planned</option>
                        <option value="2">On Process of Need Assessment</option>
                        <option value="3">Drafted</option>
                        <option value="4">Under Review of MoLJPA</option>
                        <option value="5">Waiting to be enacted</option>
                        <option value="6">Enforced</option>
                    </select>
                </td>
                <td><input type="file" name="supreme_court_image_two_q4[]" class="form-control"></td>
                <td><button type="button" class="btn btn-danger btn_remove_t2_q4">-</button></td>
            </tr>`;
        $("#addRow2Q4 tbody").append(htmlRow2);
    });

    // ➖ Table 2: রো ডিলিট করা
    $(document).on('click', '.btn_remove_t2_q4', function() {
        $(this).closest('tr').remove();
    });

    // 💾 AJAX ড্রাফট সেভ সাবমিশন লজিক
    $(document).on("click", '#temp-save-question4', function() {
        let table_one_data = [];
        let table_two_data = [];
        let yes_no_value = $("input[name='is_supreme_court_q4']:checked").val();

        // টেবিল ১ এর ডাটা কালেকশন লুপ
        $('.qe4NoOfRow').each(function() {
            let title = $(this).find('input[name="supreme_court_title_q4[]"]').val() || $(this)
                .find('select[name="supreme_court_title_q4[]"]').val();
            let status = $(this).find('select[name="supreme_court_status_q4[]"]').val();
            if (title || status) {
                table_one_data.push({
                    title: title,
                    status: status
                });
            }
        });

        // টেবিল ২ এর ডাটা কালেকশন লুপ
        $('.qe4NoOfRow2').each(function() {
            let title_two = $(this).find('input[name="supreme_court_title_two_q4[]"]').val();
            let status_two = $(this).find('select[name="supreme_court_status_two_q4[]"]').val();
            if (title_two || status_two) {
                table_two_data.push({
                    title_two: title_two,
                    status_two: status_two
                });
            }
        });

        let final_payload = {
            q4_checked_value: yes_no_value,
            q4_table_one: table_one_data,
            q4_table_two: table_two_data,
            others: $("#q4others").val()
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                "_token": "{{ csrf_token() }}",
                "question_no": 4, // সেশন কি ডাইনামিকলি 'question4' বানাবে
                "question4": final_payload // পেলোড ডাটা
            },
            success: function(response) {
                $('.question4 .card-title').css('color', 'blue');
                alert("Question 4 Draft Saved Temporary ✅");
            },
            error: function(err) {
                alert("Error saving data ❌");
                console.log(err);
            }
        });
    });
});
</script>