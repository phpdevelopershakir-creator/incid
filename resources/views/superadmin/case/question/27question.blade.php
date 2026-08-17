@if (($questiontitles[26]->status ?? null) == 1)
@php
// ১. সেশন থেকে ২৭ নম্বর প্রশ্নের ডাটা ক্যাচ করা
$question_27_data = session()->get('question27');

$q27_checked = $question_27_data['q27_checked_value'] ?? "1";
$q27_others_val = $question_27_data['others'] ?? '';

// টেবিল ১ (TwentySeven) এর ফিক্সড টাইটেলসমূহ (আগের মতোই ৬টি রো)
$t1_rows = [
'Financial Spending on Shelter and all re-integration care/services at shelters',
'In-kind support for shelter and care (This may include clothings, Food, medication)',
'Other direct support to VoTs outside shelter (such as Training, health services)',
'Financial payment to VoTs (cash transfer, seed money, soft loans, legal and humanitarian compensations)',
'In-kind support to VoTs',
'Others'
];

// টেবিল ২ (TwentySevenB) এর ডিফল্ট টাইটেল
$t2_rows = [
'Total allocation spent on Protection related direct and indirect services'
];

// সেশন ডাটা রিকভারি
$c_gov_q27 = $question_27_data['central_government_q27'] ?? [];
$c_title_q27 = $question_27_data['central_government_title_q27'] ?? [];
$l_gov_q27 = $question_27_data['local_government_q27'] ?? [];
$l_title_q27 = $question_27_data['local_government_title_q27'] ?? [];
$ngo_q27 = $question_27_data['ngo_ingo_q27'] ?? [];
$ngo_title_q27 = $question_27_data['ngo_ingo_title_q27'] ?? [];

$c_gov_q27b = $question_27_data['central_government_q27b'] ?? [];
$c_title_q27b = $question_27_data['central_government_title_q27b'] ?? [];
$l_gov_q27b = $question_27_data['local_government_q27b'] ?? [];
$l_title_q27b = $question_27_data['local_government_title_q27b'] ?? [];
$ngo_q27b = $question_27_data['ngo_ingo_q27b'] ?? [];
$ngo_title_q27b = $question_27_data['ngo_ingo_title_q27b'] ?? [];
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
                <input type="radio" class="twenty7_status" id="q27_yes" name="is_government_direct_victim_q27" value="1"
                    {{ $q27_checked == "1" ? 'checked' : '' }}>
                <label for="q27_yes">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" class="twenty7_status" id="q27_no" name="is_government_direct_victim_q27" value="0"
                    {{ $q27_checked == "0" ? 'checked' : '' }}>
                <label for="q27_no">No</label>
            </div>

            <div class="icheck-primary input-group mb-3">
                <input type="radio" class="twenty7_status" id="q27_others" name="is_government_direct_victim_q27"
                    value="2" {{ $q27_checked == "2" ? 'checked' : '' }}>
                <label for="q27_others">Others</label>

                <span class="col-md-6 mt--4 others_input_container {{ $q27_checked == "2" ? '' : 'othersText' }}">
                    <input type="text" id="q27_others_input" class="form-control" placeholder="Others"
                        name="other_government_direct_victim_q27" value="{{ $q27_others_val }}">
                </span>
            </div>

            <div id="twenty7_question_view" class="{{ $q27_checked == '1' ? '' : 'visibility' }}">

                <!-- ==================== TABLE 1 (TwentySeven - 完全 আগের মতো ফিক্সড) ==================== -->
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
                        @foreach($t1_rows as $i => $title)
                        @php
                        $cg = $c_gov_q27[$i] ?? '';
                        $lg = $l_gov_q27[$i] ?? '';
                        $ng = $ngo_q27[$i] ?? '';
                        @endphp
                        <tr class="t1_row">
                            <td class="text-left font-weight-bold" style="vertical-align: middle;">
                                {{ $title }}
                                <input type="hidden" name="victim_care_q27[]" class="v_care" value="{{ $title }}">
                            </td>

                            <!-- Central Government -->
                            <td>
                                <select class="form-control q27_yesno_select c_gov" name="central_government_q27[]">
                                    <option value="" disabled {{ empty($cg) ? 'selected' : '' }}>Choose an Item</option>
                                    <option value="Yes" {{ $cg == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ $cg == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                                <div class="bdt_input_box" style="display: {{ $cg == 'Yes' ? 'block' : 'none' }};">
                                    <input type="text" class="form-control c_title" placeholder="If Yes BDT Amount"
                                        name="central_government_title_q27[]" value="{{ $c_title_q27[$i] ?? '' }}">
                                </div>
                            </td>

                            <!-- Local Government -->
                            <td>
                                <select class="form-control q27_yesno_select l_gov" name="local_government_q27[]">
                                    <option value="" disabled {{ empty($lg) ? 'selected' : '' }}>Choose an Item</option>
                                    <option value="Yes" {{ $lg == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ $lg == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                                <div class="bdt_input_box" style="display: {{ $lg == 'Yes' ? 'block' : 'none' }};">
                                    <input type="text" class="form-control l_title" placeholder="If Yes BDT Amount"
                                        name="local_government_title_q27[]" value="{{ $l_title_q27[$i] ?? '' }}">
                                </div>
                            </td>

                            <!-- NGO/INGO -->
                            <td>
                                <select class="form-control q27_yesno_select n_gov" name="ngo_ingo_q27[]">
                                    <option value="" disabled {{ empty($ng) ? 'selected' : '' }}>Choose an Item</option>
                                    <option value="Yes" {{ $ng == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ $ng == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                                <div class="bdt_input_box" style="display: {{ $ng == 'Yes' ? 'block' : 'none' }};">
                                    <input type="text" class="form-control n_title" placeholder="If Yes BDT Amount"
                                        name="ngo_ingo_title_q27[]" value="{{ $ngo_title_q27[$i] ?? '' }}">
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- ==================== TABLE 2 (TwentySevenB - ডায়নামিক এবং Add Row সহ) ==================== -->
                <h6 class="font-weight-bold my-2">Total Protection Related Expenses</h6>
                <table class="table table-bordered text-center mb-2" id="q27b_table">
                    <thead>
                        <tr class="bg-light">
                            <th style="width: 30%; vertical-align: middle;">Total Protection related expenses</th>
                            <th style="width: 21%;">Central Government/Ministry</th>
                            <th style="width: 21%;">Local Government</th>
                            <th style="width: 21%;">NGO/INGO</th>
                            <th style="width: 7%;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="q27b_tbody">
                        @if(!empty($c_gov_q27b))
                        @foreach($c_gov_q27b as $i => $val)
                        @php
                        $title = $question_27_data['victim_care_q27b'][$i] ?? ($t2_rows[$i] ?? '');
                        $cgb = $c_gov_q27b[$i] ?? '';
                        $lgb = $l_gov_q27b[$i] ?? '';
                        $ngb = $ngo_q27b[$i] ?? '';
                        @endphp
                        <tr class="t2_row">
                            <td>
                                <input type="text" name="victim_care_q27b[]" class="form-control v_care_b"
                                    value="{{ $title }}" placeholder="Service/Expense Title">
                            </td>

                            <!-- Central Government -->
                            <td>
                                <select class="form-control q27_yesno_select c_gov_b" name="central_government_q27b[]">
                                    <option value="" disabled {{ empty($cgb) ? 'selected' : '' }}>Choose an Item
                                    </option>
                                    <option value="Yes" {{ $cgb == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ $cgb == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                                <div class="bdt_input_box" style="display: {{ $cgb == 'Yes' ? 'block' : 'none' }};">
                                    <input type="text" class="form-control c_title_b" placeholder="If Yes BDT Amount"
                                        name="central_government_title_q27b[]" value="{{ $c_title_q27b[$i] ?? '' }}">
                                </div>
                            </td>

                            <!-- Local Government -->
                            <td>
                                <select class="form-control q27_yesno_select l_gov_b" name="local_government_q27b[]">
                                    <option value="" disabled {{ empty($lgb) ? 'selected' : '' }}>Choose an Item
                                    </option>
                                    <option value="Yes" {{ $lgb == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ $lgb == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                                <div class="bdt_input_box" style="display: {{ $lgb == 'Yes' ? 'block' : 'none' }};">
                                    <input type="text" class="form-control l_title_b" placeholder="If Yes BDT Amount"
                                        name="local_government_title_q27b[]" value="{{ $l_title_q27b[$i] ?? '' }}">
                                </div>
                            </td>

                            <!-- NGO/INGO -->
                            <td>
                                <select class="form-control q27_yesno_select n_gov_b" name="ngo_ingo_q27b[]">
                                    <option value="" disabled {{ empty($ngb) ? 'selected' : '' }}>Choose an Item
                                    </option>
                                    <option value="Yes" {{ $ngb == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ $ngb == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                                <div class="bdt_input_box" style="display: {{ $ngb == 'Yes' ? 'block' : 'none' }};">
                                    <input type="text" class="form-control n_title_b" placeholder="If Yes BDT Amount"
                                        name="ngo_ingo_title_q27b[]" value="{{ $ngo_title_q27b[$i] ?? '' }}">
                                </div>
                            </td>

                            <!-- Action -->
                            <!-- <td>
                                <button type="button" class="btn btn-sm btn-danger remove_row"><i
                                        class="fa fa-trash"></i></button>
                            </td> -->
                        </tr>
                        @endforeach
                        @else
                        <!-- Default Row -->
                        @foreach($t2_rows as $i => $title)
                        <tr class="t2_row">
                            <td>
                                <input type="text" name="victim_care_q27b[]" class="form-control v_care_b"
                                    value="{{ $title }}">
                            </td>
                            <td>
                                <select class="form-control q27_yesno_select c_gov_b" name="central_government_q27b[]">
                                    <option value="" disabled selected>Choose an Item</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <div class="bdt_input_box">
                                    <input type="text" class="form-control c_title_b" placeholder="If Yes BDT Amount"
                                        name="central_government_title_q27b[]">
                                </div>
                            </td>
                            <td>
                                <select class="form-control q27_yesno_select l_gov_b" name="local_government_q27b[]">
                                    <option value="" disabled selected>Choose an Item</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <div class="bdt_input_box">
                                    <input type="text" class="form-control l_title_b" placeholder="If Yes BDT Amount"
                                        name="local_government_title_q27b[]">
                                </div>
                            </td>
                            <td>
                                <select class="form-control q27_yesno_select n_gov_b" name="ngo_ingo_q27b[]">
                                    <option value="" disabled selected>Choose an Item</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <div class="bdt_input_box">
                                    <input type="text" class="form-control n_title_b" placeholder="If Yes BDT Amount"
                                        name="ngo_ingo_title_q27b[]">
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-danger remove_row"><i
                                        class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>

                <!-- টেবিল ২ এর নিচে Add Row বাটন -->
                <div class="text-left mb-3">
                    <button type="button" class="btn btn-sm btn-primary" id="add_q27b_row">
                        <i class="fa fa-plus"></i> Add Row
                    </button>
                </div>

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

    // ১. ড্রপডাউনে Yes দিলে BDT বক্স দেখানোর লজিক
    $(document).on("change", ".q27_yesno_select", function() {
        let val = $(this).val();
        let bdtBox = $(this).closest("td").find(".bdt_input_box");

        if (val === "Yes") {
            bdtBox.show();
        } else {
            bdtBox.hide();
            bdtBox.find("input").val("");
        }
    });

    // ২. রেডিও বাটন সিলেক্ট লজিক
    $(".twenty7_status").on("change", function() {
        let value = $("input[name='is_government_direct_victim_q27']:checked").val();

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

    // ৩. Table 2 - নিচে নতুন রো যোগ করা (Add Row Button Logic)
    $("#add_q27b_row").click(function() {
        let newRow = `
        <tr class="t2_row">
            <td>
                <input type="text" name="victim_care_q27b[]" class="form-control v_care_b" placeholder="Enter Title">
            </td>
            <td>
                <select class="form-control q27_yesno_select c_gov_b" name="central_government_q27b[]">
                    <option value="" disabled selected>Choose an Item</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
                <div class="bdt_input_box">
                    <input type="text" class="form-control c_title_b" placeholder="If Yes BDT Amount" name="central_government_title_q27b[]">
                </div>
            </td>
            <td>
                <select class="form-control q27_yesno_select l_gov_b" name="local_government_q27b[]">
                    <option value="" disabled selected>Choose an Item</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
                <div class="bdt_input_box">
                    <input type="text" class="form-control l_title_b" placeholder="If Yes BDT Amount" name="local_government_title_q27b[]">
                </div>
            </td>
            <td>
                <select class="form-control q27_yesno_select n_gov_b" name="ngo_ingo_q27b[]">
                    <option value="" disabled selected>Choose an Item</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
                <div class="bdt_input_box">
                    <input type="text" class="form-control n_title_b" placeholder="If Yes BDT Amount" name="ngo_ingo_title_q27b[]">
                </div>
            </td>
            <td>
                <button type="button" class="btn btn-sm btn-danger remove_row"><i class="fa fa-trash"></i></button>
            </td>
        </tr>`;

        $("#q27b_tbody").append(newRow);
    });

    // ৪. Table 2 - রো মুছে ফেলা (Remove Row Logic)
    $(document).on("click", ".remove_row", function() {
        if ($("#q27b_tbody tr").length > 1) {
            $(this).closest("tr").remove();
        } else {
            alert("At least one row is required!");
        }
    });

    // ৫. Temp Save (AJAX Logic)
    $("#temp-save-question27").click(function() {
        let yes_no_value = $("input[name='is_government_direct_victim_q27']:checked").val();

        // Table 1 Data
        let victim_care_q27 = [];
        let central_government_q27 = [];
        let central_government_title_q27 = [];
        let local_government_q27 = [];
        let local_government_title_q27 = [];
        let ngo_ingo_q27 = [];
        let ngo_ingo_title_q27 = [];

        $(".t1_row").each(function() {
            victim_care_q27.push($(this).find(".v_care").val() || null);
            central_government_q27.push($(this).find(".c_gov").val() || null);
            central_government_title_q27.push($(this).find(".c_title").val() || null);
            local_government_q27.push($(this).find(".l_gov").val() || null);
            local_government_title_q27.push($(this).find(".l_title").val() || null);
            ngo_ingo_q27.push($(this).find(".n_gov").val() || null);
            ngo_ingo_title_q27.push($(this).find(".n_title").val() || null);
        });

        // Table 2 Data
        let victim_care_q27b = [];
        let central_government_q27b = [];
        let central_government_title_q27b = [];
        let local_government_q27b = [];
        let local_government_title_q27b = [];
        let ngo_ingo_q27b = [];
        let ngo_ingo_title_q27b = [];

        $(".t2_row").each(function() {
            victim_care_q27b.push($(this).find(".v_care_b").val() || null);
            central_government_q27b.push($(this).find(".c_gov_b").val() || null);
            central_government_title_q27b.push($(this).find(".c_title_b").val() || null);
            local_government_q27b.push($(this).find(".l_gov_b").val() || null);
            local_government_title_q27b.push($(this).find(".l_title_b").val() || null);
            ngo_ingo_q27b.push($(this).find(".n_gov_b").val() || null);
            ngo_ingo_title_q27b.push($(this).find(".n_title_b").val() || null);
        });

        let saveData = {
            q27_checked_value: yes_no_value,

            // Table 1
            victim_care_q27: victim_care_q27,
            central_government_q27: central_government_q27,
            central_government_title_q27: central_government_title_q27,
            local_government_q27: local_government_q27,
            local_government_title_q27: local_government_title_q27,
            ngo_ingo_q27: ngo_ingo_q27,
            ngo_ingo_title_q27: ngo_ingo_title_q27,

            // Table 2
            victim_care_q27b: victim_care_q27b,
            central_government_q27b: central_government_q27b,
            central_government_title_q27b: central_government_title_q27b,
            local_government_q27b: local_government_q27b,
            local_government_title_q27b: local_government_title_q27b,
            ngo_ingo_q27b: ngo_ingo_q27b,
            ngo_ingo_title_q27b: ngo_ingo_title_q27b,

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
                alert("Question 27 Temp Saved Successfully");
            },
            error: function() {
                alert("Something went wrong!");
            }
        });
    });

});
</script>