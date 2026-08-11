@if (($questiontitles[26]->status ?? null) == 1)
@php
// ১. সেশন থেকে ২৭ নম্বর প্রশ্নের ডাটা ক্যাচ করা
$question_27_data = session()->get('question27');

$q27_checked = $question_27_data['q27_checked_value'] ?? "1";
$q27_others_val = $question_27_data['others'] ?? '';

// টেবিল ১ এর প্রশ্ন ডিফাইন করা
$t1_rows = [
'r1' => 'Financial Spending on Shelter and all re-integration care/services at shelters',
'r2' => 'In-kind support for shelter and care (This may include clothings, Food, medication)',
'r3' => 'Other direct support to VoTs outside shelter (such as Training, health services)',
'r4' => 'Financial payment to VoTs (cash transfer, seed money, soft loans, legal and humanitarian compensations)',
'r5' => 'In-kind support to VoTs',
'r6' => 'Others'
];

// টেবিল ২ এর প্রশ্ন ডিফাইন করা
$t2_rows = [
'r1' => 'Total allocation spent on Protection related direct and indirect services'
];

$t1_data = $question_27_data['table1_data'] ?? [];
$t2_data = $question_27_data['table2_data'] ?? [];
@endphp

<style>
.othersText {
    display: none;
}

.visibility {
    display: none;
}

.bdt_input_box {
    display: none;
    margin-top: 5px;
}
</style>

<div class="card question27">
    <div class="card-header" role="tab" id="heading-27">
        <h6 class="card-title" style="color: {{ !empty($question_27_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-27" aria-expanded="false" aria-controls="collapse-27">
                27. {{ $questiontitles[26]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-27" class="collapse" role="tabpanel" aria-labelledby="heading-27" data-parent="#accordion-2">
        <div class="card-body">

            <!-- মূল রেডিও বাটন -->
            <div class="icheck-primary">
                <input type="radio" class="twenty7_status" id="q27_yes" name="is_unit_court_q27" value="1"
                    {{ $q27_checked == "1" ? 'checked' : '' }}>
                <label for="q27_yes">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" class="twenty7_status" id="q27_no" name="is_unit_court_q27" value="0"
                    {{ $q27_checked == "0" ? 'checked' : '' }}>
                <label for="q27_no">No</label>
            </div>

            <div class="icheck-primary input-group mb-3">
                <input type="radio" class="twenty7_status" id="q27_others" name="is_unit_court_q27" value="2"
                    {{ $q27_checked == "2" ? 'checked' : '' }}>
                <label for="q27_others">Others</label>

                <span class="col-md-6 mt--4 others_input_container {{ $q27_checked == "2" ? '' : 'othersText' }}">
                    <input type="text" id="q27_others_input" class="form-control" placeholder="Others"
                        name="others_forced_labor_q27" value="{{ $q27_others_val }}">
                </span>
            </div>

            <div id="twenty7_question_view" class="{{ $q27_checked == '1' ? '' : 'visibility' }}">

                <!-- ==================== TABLE 1 ==================== -->
                <h6 class="font-weight-bold my-2">Type of Spending on Victim Care</h6>
                <table class="table table-bordered text-center mb-4">
                    <thead>
                        <tr class="bg-light">
                            <th style="width: 30%; vertical-align: middle;">Type of Spending on Victim Care</th>
                            <th style="width: 23%;">Central Government/Ministry</th>
                            <th style="width: 23%;">Local Government</th>
                            <th style="width: 23%;">NGO/INGO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($t1_rows as $key => $title)
                        <tr>
                            <td class="text-left font-weight-bold" style="vertical-align: middle;">{{ $title }}</td>

                            <!-- Central Government -->
                            <td>
                                @php $central_status = $t1_data[$key]['central_status'] ?? ''; @endphp
                                <select class="form-control q27_yesno_select" name="t1[{{$key}}][central_status]">
                                    <option value="" disabled selected>Choose an Item</option>
                                    <option value="Yes" {{ $central_status == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ $central_status == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                                <div class="bdt_input_box"
                                    style="display: {{ $central_status == 'Yes' ? 'block' : 'none' }};">
                                    <input type="number" class="form-control" placeholder="If Yes BDT Amount"
                                        name="t1[{{$key}}][central_bdt]"
                                        value="{{ $t1_data[$key]['central_bdt'] ?? '' }}">
                                </div>
                            </td>

                            <!-- Local Government -->
                            <td>
                                @php $local_status = $t1_data[$key]['local_status'] ?? ''; @endphp
                                <select class="form-control q27_yesno_select" name="t1[{{$key}}][local_status]">
                                    <option value="" disabled selected>Choose an Item</option>
                                    <option value="Yes" {{ $local_status == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ $local_status == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                                <div class="bdt_input_box"
                                    style="display: {{ $local_status == 'Yes' ? 'block' : 'none' }};">
                                    <input type="number" class="form-control" placeholder="If Yes BDT Amount"
                                        name="t1[{{$key}}][local_bdt]" value="{{ $t1_data[$key]['local_bdt'] ?? '' }}">
                                </div>
                            </td>

                            <!-- NGO/INGO -->
                            <td>
                                @php $ngo_status = $t1_data[$key]['ngo_status'] ?? ''; @endphp
                                <select class="form-control q27_yesno_select" name="t1[{{$key}}][ngo_status]">
                                    <option value="" disabled selected>Choose an Item</option>
                                    <option value="Yes" {{ $ngo_status == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ $ngo_status == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                                <div class="bdt_input_box"
                                    style="display: {{ $ngo_status == 'Yes' ? 'block' : 'none' }};">
                                    <input type="number" class="form-control" placeholder="If Yes BDT Amount"
                                        name="t1[{{$key}}][ngo_bdt]" value="{{ $t1_data[$key]['ngo_bdt'] ?? '' }}">
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- ==================== TABLE 2 ==================== -->
                <h6 class="font-weight-bold my-2">Total Protection Related Expenses</h6>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr class="bg-light">
                            <th style="width: 30%; vertical-align: middle;">Total Protection related expenses</th>
                            <th style="width: 23%;">Central Government/Ministry</th>
                            <th style="width: 23%;">Local Government</th>
                            <th style="width: 23%;">NGO/INGO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($t2_rows as $key => $title)
                        <tr>
                            <td class="text-left font-weight-bold" style="vertical-align: middle;">{{ $title }}</td>

                            <!-- Central Government -->
                            <td>
                                @php $central_status = $t2_data[$key]['central_status'] ?? ''; @endphp
                                <select class="form-control q27_yesno_select" name="t2[{{$key}}][central_status]">
                                    <option value="" disabled selected>Choose an Item</option>
                                    <option value="Yes" {{ $central_status == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ $central_status == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                                <div class="bdt_input_box"
                                    style="display: {{ $central_status == 'Yes' ? 'block' : 'none' }};">
                                    <input type="number" class="form-control" placeholder="If Yes BDT Amount"
                                        name="t2[{{$key}}][central_bdt]"
                                        value="{{ $t2_data[$key]['central_bdt'] ?? '' }}">
                                </div>
                            </td>

                            <!-- Local Government -->
                            <td>
                                @php $local_status = $t2_data[$key]['local_status'] ?? ''; @endphp
                                <select class="form-control q27_yesno_select" name="t2[{{$key}}][local_status]">
                                    <option value="" disabled selected>Choose an Item</option>
                                    <option value="Yes" {{ $local_status == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ $local_status == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                                <div class="bdt_input_box"
                                    style="display: {{ $local_status == 'Yes' ? 'block' : 'none' }};">
                                    <input type="number" class="form-control" placeholder="If Yes BDT Amount"
                                        name="t2[{{$key}}][local_bdt]" value="{{ $t2_data[$key]['local_bdt'] ?? '' }}">
                                </div>
                            </td>

                            <!-- NGO/INGO -->
                            <td>
                                @php $ngo_status = $t2_data[$key]['ngo_status'] ?? ''; @endphp
                                <select class="form-control q27_yesno_select" name="t2[{{$key}}][ngo_status]">
                                    <option value="" disabled selected>Choose an Item</option>
                                    <option value="Yes" {{ $ngo_status == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ $ngo_status == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                                <div class="bdt_input_box"
                                    style="display: {{ $ngo_status == 'Yes' ? 'block' : 'none' }};">
                                    <input type="number" class="form-control" placeholder="If Yes BDT Amount"
                                        name="t2[{{$key}}][ngo_bdt]" value="{{ $t2_data[$key]['ngo_bdt'] ?? '' }}">
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

            <p class="text-right mt-3">
                <button type="button" class="btn btn-success" id="temp-save-question27">Save</button>
            </p>

        </div>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    // ⬅️ টেবিলের ড্রপডাউনে Yes সিলেক্ট করলে BDT Input ফিল্ড শো/হাইড লজিক
    $(document).on("change", ".q27_yesno_select", function() {
        let val = $(this).val();
        let bdtBox = $(this).closest("td").find(".bdt_input_box");

        if (val === "Yes") {
            bdtBox.show();
        } else {
            bdtBox.hide();
            bdtBox.find("input").val(""); // No বা অন্য কিছু হলে রিসেট
        }
    });

    // ⬅️ মূল রেডিও বাটন অনুযায়ী টগল লজিক (Yes/No/Others)
    $(".twenty7_status").on("change", function() {
        let value = $("input[name='is_unit_court_q27']:checked").val();

        if (value === "1") {
            $("#twenty7_question_view").removeClass('visibility').show();
            $(".others_input_container").addClass('othersText').hide();
            $("#q27_others_input").val("");
        } else if (value === "2") {
            $("#twenty7_question_view").hide();
            $(".others_input_container").removeClass('othersText').show();
        } else {
            $("#twenty7_question_view").hide();
            $(".others_input_container").addClass('othersText').hide();
            $("#q27_others_input").val("");
        }
    });

    // ⬅️ টেম্পোরারি সেভ AJAX লজিক
    $("#temp-save-question27").click(function() {
        let yes_no_value = $("input[name='is_unit_court_q27']:checked").val();

        // টেবিল ১ এর ডাটা কালেকশন
        let table1Data = {};
        @foreach($t1_rows as $key => $title)
        table1Data['{{$key}}'] = {
            central_status: $("select[name='t1[{{$key}}][central_status]']").val(),
            central_bdt: $("input[name='t1[{{$key}}][central_bdt]']").val(),
            local_status: $("select[name='t1[{{$key}}][local_status]']").val(),
            local_bdt: $("input[name='t1[{{$key}}][local_bdt]']").val(),
            ngo_status: $("select[name='t1[{{$key}}][ngo_status]']").val(),
            ngo_bdt: $("input[name='t1[{{$key}}][ngo_bdt]']").val(),
        };
        @endforeach

        // টেবিল ২ এর ডাটা কালেকশন
        let table2Data = {};
        @foreach($t2_rows as $key => $title)
        table2Data['{{$key}}'] = {
            central_status: $("select[name='t2[{{$key}}][central_status]']").val(),
            central_bdt: $("input[name='t2[{{$key}}][central_bdt]']").val(),
            local_status: $("select[name='t2[{{$key}}][local_status]']").val(),
            local_bdt: $("input[name='t2[{{$key}}][local_bdt]']").val(),
            ngo_status: $("select[name='t2[{{$key}}][ngo_status]']").val(),
            ngo_bdt: $("input[name='t2[{{$key}}][ngo_bdt]']").val(),
        };
        @endforeach

        let saveData = {
            q27_checked_value: yes_no_value,
            table1_data: table1Data,
            table2_data: table2Data,
            others: $("#q27_others_input").val(),
        };

        $.ajax({
            url: "/superadmin/case/temp-save-question",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                question27: saveData,
                question_no: 27
            },
            success: function(response) {
                $('.question27 .card-header h6').css('color', 'blue');
                alert("Question 27 Has Been Saved Temporarily ✅");
            },
            error: function() {
                alert("Something went wrong!");
            }
        });
    });

});
</script>