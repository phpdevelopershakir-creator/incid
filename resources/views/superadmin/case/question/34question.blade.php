@if (($questiontitles[33]->status ?? null) == 1)
@php
// ১. সেশন থেকে ৩৪ নম্বর প্রশ্নের ডাটা ক্যাচ করা
$question_34_data = session()->get('question34');

$q34_checked = $question_34_data['q34_checked_value'] ?? "1";
$q34_others_val = $question_34_data['others'] ?? '';

// প্রথম টেবিলের ডাটা (Victims participated in Investigation)
$part1 = $question_34_data['part1_data'] ?? [];
$p1_men = $part1['men'] ?? 0;
$p1_women = $part1['women'] ?? 0;
$p1_tg = $part1['tg'] ?? 0;
$p1_total = $part1['total'] ?? 0;

// দ্বিতীয় টেবিলের ডাটা (Type of Support Table)
$part2_rows = $question_34_data['part2_data'] ?? null;

// ড্রপডাউন অপশন লিস্ট
$support_types = [
    1 => 'Visa Categories',
    2 => 'Legal Support & Advice',
    3 => 'Witness Protection',
    4 => 'Victim-Witness Advocates',
    5 => 'Others'
];
@endphp

<style>
.othersText {
    display: none;
}
.visibility {
    display: none;
}
</style>

<div class="card question34">
    <div class="card-header" role="tab" id="heading-34">
        <h6 class="card-title" style="color: {{ !empty($question_34_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-34" aria-expanded="false" aria-controls="collapse-34">
                34. {{ $questiontitles[33]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-34" class="collapse" role="tabpanel" aria-labelledby="heading-34" data-parent="#accordion-2">
        <div class="card-body">

            <!-- মূল রেডিও বাটন -->
            <div class="icheck-primary">
                <input type="radio" class="thirtyfour_status" id="q34_yes" name="is_newly_identified_victims_q34" value="1"
                    {{ $q34_checked == "1" ? 'checked' : '' }}>
                <label for="q34_yes">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" class="thirtyfour_status" id="q34_no" name="is_newly_identified_victims_q34" value="0"
                    {{ $q34_checked == "0" ? 'checked' : '' }}>
                <label for="q34_no">No</label>
            </div>

            <div class="icheck-primary input-group mb-3">
                <input type="radio" class="thirtyfour_status" id="q34_others" name="is_newly_identified_victims_q34" value="2"
                    {{ $q34_checked == "2" ? 'checked' : '' }}>
                <label for="q34_others">Others</label>

                <span class="col-md-6 mt--4 others_input_container {{ $q34_checked == "2" ? '' : 'othersText' }}">
                    <input type="text" id="q34_others_input" class="form-control" placeholder="If OTHER please describe"
                        name="others_forced_labor_q34" value="{{ $q34_others_val }}">
                </span>
            </div>

            <div id="thirtyfour_question_view" class="{{ $q34_checked == '1' ? '' : 'visibility' }}">

                <!-- 🔴 SECTION 1: Investigation Table -->
                <p class="font-weight-bold mb-2">
                    How many newly identified victims participated in the investigation and prosecution of traffickers?
                </p>

                <table class="table table-bordered text-center mb-4">
                    <thead>
                        <tr class="bg-light">
                            <th style="vertical-align: middle;">Number of victims participated in Investigation</th>
                            <th style="width: 18%;">Men</th>
                            <th style="width: 18%;">Women</th>
                            <th style="width: 18%;">TG</th>
                            <th style="width: 18%;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="font-weight-bold text-left" style="vertical-align: middle;">Victims Count</td>
                            <td>
                                <input type="number" id="p1_men" name="men_victims_q34" class="form-control p1_calc" value="{{ $p1_men }}" min="0">
                            </td>
                            <td>
                                <input type="number" id="p1_women" name="women_victims_q34" class="form-control p1_calc" value="{{ $p1_women }}" min="0">
                            </td>
                            <td>
                                <input type="number" id="p1_tg" name="tg_victims_q34" class="form-control p1_calc" value="{{ $p1_tg }}" min="0">
                            </td>
                            <td>
                                <input type="number" id="p1_total" name="total_victims_q34" class="form-control" value="{{ $p1_total }}" readonly>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <hr>

                <!-- 🔴 SECTION 2: Type of Support Table -->
                <p class="font-weight-bold mb-2">
                    What, if any, support did the government provide to victims who assisted in the investigation and
                    prosecution of trafficking cases, such as visa categories that facilitate cooperation with law
                    enforcement, legal support and advice, witness protection, and victim-witness advocates?
                </p>

                <table id="q34_support_table" class="table table-bordered text-center">
                    <thead>
                        <tr class="bg-light">
                            <th rowspan="2" style="vertical-align: middle; width: 30%;">Type of Support</th>
                            <th colspan="4">Number of VoTs receiving support</th>
                            <th rowspan="2" style="vertical-align: middle; width: 10%;">Action</th>
                        </tr>
                        <tr class="bg-light">
                            <th>Men</th>
                            <th>Women</th>
                            <th>TG</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(!empty($part2_rows) && count($part2_rows) > 0)
                            @foreach($part2_rows as $i => $row)
                            <tr class="q34_p2_row" id="q34_p2_row_{{ $i+1 }}">
                                <td>
                                    <select class="form-control p2_support_type" name="number_victims_q34b[]">
                                        <option value="" disabled {{ empty($row['type']) ? 'selected' : '' }}>Choose an item.</option>
                                        @foreach($support_types as $sKey => $sVal)
                                        <option value="{{ $sKey }}" {{ ($row['type'] ?? '') == $sKey ? 'selected' : '' }}>
                                            {{ $sVal }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="number" name="men_victims_q34b[]" class="form-control p2_men p2_calc" value="{{ $row['men'] ?? 0 }}" min="0"></td>
                                <td><input type="number" name="women_victims_q34b[]" class="form-control p2_women p2_calc" value="{{ $row['women'] ?? 0 }}" min="0"></td>
                                <td><input type="number" name="tg_victims_q34b[]" class="form-control p2_tg p2_calc" value="{{ $row['tg'] ?? 0 }}" min="0"></td>
                                <td><input type="number" name="total_victims_q34b[]" class="form-control p2_total" value="{{ $row['total'] ?? 0 }}" readonly></td>
                                <td>
                                    @if($i == 0)
                                    <button type="button" class="btn btn-sm btn-primary" id="add_q34_p2_row">+</button>
                                    @else
                                    <button type="button" class="btn btn-sm btn-danger remove_q34_p2_row" data-id="{{ $i+1 }}">-</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr class="q34_p2_row" id="q34_p2_row_1">
                                <td>
                                    <select class="form-control p2_support_type" name="number_victims_q34b[]">
                                        <option value="" disabled selected>Choose an item.</option>
                                        @foreach($support_types as $sKey => $sVal)
                                        <option value="{{ $sKey }}">{{ $sVal }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="number" name="men_victims_q34b[]" class="form-control p2_men p2_calc" value="0" min="0"></td>
                                <td><input type="number" name="women_victims_q34b[]" class="form-control p2_women p2_calc" value="0" min="0"></td>
                                <td><input type="number" name="tg_victims_q34b[]" class="form-control p2_tg p2_calc" value="0" min="0"></td>
                                <td><input type="number" name="total_victims_q34b[]" class="form-control p2_total" value="0" readonly></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" id="add_q34_p2_row">+</button>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>

            </div>

            <p class="text-right mt-3">
                <button type="button" class="btn btn-success" id="temp-save-question34">Save</button>
            </p>

        </div>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    const supportOptions = `
        <option value="" disabled selected>Choose an item.</option>
        <option value="1">Visa Categories</option>
        <option value="2">Legal Support & Advice</option>
        <option value="3">Witness Protection</option>
        <option value="4">Victim-Witness Advocates</option>
        <option value="5">Others</option>
    `;

    // Section 1 Total calculation
    $(document).on("input change keyup", ".p1_calc", function() {
        let men = parseInt($("#p1_men").val()) || 0;
        let women = parseInt($("#p1_women").val()) || 0;
        let tg = parseInt($("#p1_tg").val()) || 0;

        $("#p1_total").val(men + women + tg);
    });

    // Section 2 Total calculation
    $(document).on("input change keyup", ".p2_calc", function() {
        let row = $(this).closest("tr");
        let men = parseInt(row.find(".p2_men").val()) || 0;
        let women = parseInt(row.find(".p2_women").val()) || 0;
        let tg = parseInt(row.find(".p2_tg").val()) || 0;

        row.find(".p2_total").val(men + women + tg);
    });

    // Dynamic Row Add (Dynamic array attributes specific to Controller)
    $("#add_q34_p2_row").click(function() {
        let rowId = new Date().getTime();

        $("#q34_support_table tbody").append(`
            <tr class="q34_p2_row" id="q34_p2_row_${rowId}">
                <td><select class="form-control p2_support_type" name="number_victims_q34b[]">${supportOptions}</select></td>
                <td><input type="number" name="men_victims_q34b[]" class="form-control p2_men p2_calc" value="0" min="0"></td>
                <td><input type="number" name="women_victims_q34b[]" class="form-control p2_women p2_calc" value="0" min="0"></td>
                <td><input type="number" name="tg_victims_q34b[]" class="form-control p2_tg p2_calc" value="0" min="0"></td>
                <td><input type="number" name="total_victims_q34b[]" class="form-control p2_total" value="0" readonly></td>
                <td><button type="button" class="btn btn-sm btn-danger remove_q34_p2_row" data-id="${rowId}">-</button></td>
            </tr>
        `);
    });

    // Section 2 Row Remove
    $(document).on("click", ".remove_q34_p2_row", function() {
        let id = $(this).data("id");
        $("#q34_p2_row_" + id).remove();
    });

    // রেডিও বাটন টগল লজিক (Yes/No/Others)
    $(".thirtyfour_status").on("change", function() {
        let value = $("input[name='is_newly_identified_victims_q34']:checked").val();

        if (value === "1") {
            $("#thirtyfour_question_view").removeClass('visibility').show();
            $(".others_input_container").addClass('othersText').hide();
            $("#q34_others_input").val("");
        } else if (value === "2") {
            $("#thirtyfour_question_view").hide();
            $(".others_input_container").removeClass('othersText').show();
        } else {
            $("#thirtyfour_question_view").hide();
            $(".others_input_container").addClass('othersText').hide();
            $("#q34_others_input").val("");
        }
    });

    // Temp Save AJAX
    $("#temp-save-question34").click(function() {
        let yes_no_value = $("input[name='is_newly_identified_victims_q34']:checked").val();

        // Part 1 Data
        let part1Data = {
            men: $("#p1_men").val() || 0,
            women: $("#p1_women").val() || 0,
            tg: $("#p1_tg").val() || 0,
            total: $("#p1_total").val() || 0,
        };

        // Part 2 Data
        let part2Data = [];
        $(".q34_p2_row").each(function() {
            let type = $(this).find(".p2_support_type").val();
            let men = $(this).find(".p2_men").val() || 0;
            let women = $(this).find(".p2_women").val() || 0;
            let tg = $(this).find(".p2_tg").val() || 0;
            let total = $(this).find(".p2_total").val() || 0;

            if (type || men > 0 || women > 0 || tg > 0) {
                part2Data.push({
                    type: type,
                    men: men,
                    women: women,
                    tg: tg,
                    total: total
                });
            }
        });

        let saveData = {
            q34_checked_value: yes_no_value,
            part1_data: part1Data,
            part2_data: part2Data,
            others: $("#q34_others_input").val(),
        };

        $.ajax({
            url: "/superadmin/case/temp-save-question",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                question34: saveData,
                question_no: 34
            },
            success: function(response) {
                $('.question34 .card-header h6').css('color', 'blue');
                alert("Question 34 Saved Temp Successfully");
            },
            error: function() {
                alert("Something went wrong!");
            }
        });
    });

});
</script>