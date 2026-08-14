@if (($questiontitles[25]->status ?? null) == 1)
@php
// ১. সেশন থেকে ২৬ নম্বর প্রশ্নের ডাটা ক্যাচ করা
$question_26_data = session()->get('question26');

// ২. ক্যাটাগরি এবং এনজিও রেটিং অ্যারে ডিফাইন করা
$category_lists = [
1 => 'Social Worker',
2 => 'Police',
3 => 'BGB',
4 => 'Coastguard',
5 => 'VDP',
6 => 'Rail Police',
7 => 'Judiciary',
8 => 'NGO',
9 => 'Others'
];

$ngo_rating_lists = [
1 => 'Excellent',
2 => 'Good',
3 => 'Fair',
4 => 'Poor',
5 => 'Extremely Poor',
6 => 'Non-Functional'
];

// ৩. ডাটা ম্যাপ করা
$q26_checked = $question_26_data['q26_checked_value'] ?? "1";
$q26_table_rows_1 = $question_26_data['q26_data'] ?? null;
$q26_table_rows_2 = $question_26_data['q26_data_2'] ?? null;
$q26_others_val = $question_26_data['others'] ?? '';
@endphp

<style>
.othersText {
    display: none;
}

.visibility {
    display: none;
}

.ngo_rating_container {
    display: none;
    margin-top: 5px;
}
</style>

<div class="card question26">
    <div class="card-header" role="tab" id="heading-26">
        <h6 class="card-title" style="color: {{ !empty($question_26_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-26" aria-expanded="false" aria-controls="collapse-26">
                26. {{ $questiontitles[25]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-26" class="collapse" role="tabpanel" aria-labelledby="heading-26" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" class="twenty6_status" id="q26_yes" name="is_unit_court_q26" value="1"
                    {{ $q26_checked == "1" ? 'checked' : '' }}>
                <label for="q26_yes">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" class="twenty6_status" id="q26_no" name="is_unit_court_q26" value="0"
                    {{ $q26_checked == "0" ? 'checked' : '' }}>
                <label for="q26_no">No</label>
            </div>

            <div class="icheck-primary input-group mb-3">
                <input type="radio" class="twenty6_status" id="q26_others" name="is_unit_court_q26" value="2"
                    {{ $q26_checked == "2" ? 'checked' : '' }}>
                <label for="q26_others">Others</label>

                <span class="col-md-6 mt--4 others_input_container {{ $q26_checked == "2" ? '' : 'othersText' }}">
                    <input type="text" id="q26_others_input" class="form-control" placeholder="Others"
                        name="others_forced_labor_q26" value="{{ $q26_others_val }}">
                </span>
            </div>

            <div id="twenty6_question_view" class="card-body row {{ $q26_checked == '1' ? '' : 'visibility' }}">

                <!-- ==================== TABLE 1 ==================== -->
                <h6 class="w-100 font-weight-bold my-2">Please describe who and how many were trained</h6>
                <table id="addRowq26Table1" class="table table-bordered text-center mb-4">
                    <thead>
                        <tr>
                            <th rowspan="2" style="vertical-align: middle;">Location</th>
                            <th colspan="4">Number of personnel Trained</th>
                            <th rowspan="2" style="vertical-align: middle;">Action</th>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <th>Men</th>
                            <th>Women</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(!empty($q26_table_rows_1) && count($q26_table_rows_1) > 0)
                        @foreach($q26_table_rows_1 as $i => $q26)
                        @php
                        $is_ngo = ($q26['category'] ?? '') == 8;
                        @endphp
                        <tr class="q26_row_data_1" id="q26_t1_row{{ $i+1 }}">
                            <td>
                                <input type="text" name="labor_title_q26_1[]" class="form-control labor_title_q26"
                                    value="{{ $q26['title'] ?? '' }}">
                            </td>
                            <td>
                                <select name="labor_category_q26_1[]" class="form-control labor_category_q26">
                                    <option value="" disabled selected>--Select Category--</option>
                                    @foreach ($category_lists as $key => $item)
                                    <option value="{{ $key }}" {{ ($q26['category'] ?? '') == $key ? 'selected' : '' }}>
                                        {{ $item }}
                                    </option>
                                    @endforeach
                                </select>

                                <div class="ngo_rating_container" style="display: {{ $is_ngo ? 'block' : 'none' }};">
                                    <select name="ngo_rating_q26_1[]" class="form-control labor_ngo_rating_q26 mt-1">
                                        <option value="" disabled selected>--Select NGO Rating--</option>
                                        @foreach ($ngo_rating_lists as $rKey => $rItem)
                                        <option value="{{ $rKey }}"
                                            {{ ($q26['ngo_rating'] ?? '') == $rKey ? 'selected' : '' }}>
                                            {{ $rItem }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td>
                                <input type="number" name="labor_men_q26_1[]" id="labor_men_q26_t1_{{ $i+1 }}"
                                    class="form-control labor_men_q26" value="{{ $q26['men'] ?? 0 }}" min="0">
                            </td>
                            <td>
                                <input type="number" name="labor_women_q26_1[]" id="labor_women_q26_t1_{{ $i+1 }}"
                                    class="form-control labor_women_q26" value="{{ $q26['women'] ?? 0 }}" min="0">
                            </td>
                            <td>
                                <input type="number" name="labor_total_q26_1[]" readonly
                                    id="labor_total_q26_t1_{{ $i+1 }}" class="form-control labor_total_q26"
                                    value="{{ $q26['total'] ?? 0 }}">
                            </td>
                            <td>
                                @if($i == 0)
                                <button type="button" class="btn btn-sm btn-primary"
                                    id="addRowDataq26_Table1">+</button>
                                @else
                                <button type="button" id="t1_{{ $i+1 }}"
                                    class="btn btn-danger btn-sm q26btn_remove_t1">-</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr class="q26_row_data_1" id="q26_t1_row1">
                            <td><input type="text" name="labor_title_q26_1[]" class="form-control labor_title_q26"></td>
                            <td>
                                <select name="labor_category_q26_1[]" class="form-control labor_category_q26">
                                    <option value="" disabled selected>--Select Category--</option>
                                    @foreach ($category_lists as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                <div class="ngo_rating_container">
                                    <select name="ngo_rating_q26_1[]" class="form-control labor_ngo_rating_q26 mt-1">
                                        <option value="" disabled selected>--Select NGO Rating--</option>
                                        @foreach ($ngo_rating_lists as $rKey => $rItem)
                                        <option value="{{ $rKey }}">{{ $rItem }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td><input type="number" name="labor_men_q26_1[]" id="labor_men_q26_t1_1" value="0"
                                    class="form-control labor_men_q26" min="0"></td>
                            <td><input type="number" name="labor_women_q26_1[]" id="labor_women_q26_t1_1" value="0"
                                    class="form-control labor_women_q26" min="0"></td>
                            <td><input type="number" name="labor_total_q26_1[]" id="labor_total_q26_t1_1" value="0"
                                    class="form-control labor_total_q26" readonly></td>
                            <td><button type="button" class="btn btn-sm btn-primary"
                                    id="addRowDataq26_Table1">+</button></td>
                        </tr>
                        @endif
                    </tbody>
                </table>

                <!-- ==================== TABLE 2 ==================== -->
                <h6 class="w-100 font-weight-bold my-2">Did service providers have the knowledge and skills to support
                    victims through a consistent victim-centered approach?</h6>
                <table id="addRowq26Table2" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th rowspan="2" style="vertical-align: middle;">Location</th>
                            <th colspan="4">Number of personnel Trained</th>
                            <th rowspan="2" style="vertical-align: middle;">Action</th>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <th>Men</th>
                            <th>Women</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(!empty($q26_table_rows_2) && count($q26_table_rows_2) > 0)
                        @foreach($q26_table_rows_2 as $i => $q26)
                        @php
                        $is_ngo = ($q26['category'] ?? '') == 8;
                        @endphp
                        <tr class="q26_row_data_2" id="q26_t2_row{{ $i+1 }}">
                            <td>
                                <input type="text" name="labor_title_q26_2[]" class="form-control labor_title_q26"
                                    value="{{ $q26['title'] ?? '' }}">
                            </td>
                            <td>
                                <select name="labor_category_q26_2[]" class="form-control labor_category_q26">
                                    <option value="" disabled selected>--Select Category--</option>
                                    @foreach ($category_lists as $key => $item)
                                    <option value="{{ $key }}" {{ ($q26['category'] ?? '') == $key ? 'selected' : '' }}>
                                        {{ $item }}
                                    </option>
                                    @endforeach
                                </select>

                                <div class="ngo_rating_container" style="display: {{ $is_ngo ? 'block' : 'none' }};">
                                    <select name="ngo_rating_q26_2[]" class="form-control labor_ngo_rating_q26 mt-1">
                                        <option value="" disabled selected>--Select NGO Rating--</option>
                                        @foreach ($ngo_rating_lists as $rKey => $rItem)
                                        <option value="{{ $rKey }}"
                                            {{ ($q26['ngo_rating'] ?? '') == $rKey ? 'selected' : '' }}>
                                            {{ $rItem }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td>
                                <input type="number" name="labor_men_q26_2[]" id="labor_men_q26_t2_{{ $i+1 }}"
                                    class="form-control labor_men_q26" value="{{ $q26['men'] ?? 0 }}" min="0">
                            </td>
                            <td>
                                <input type="number" name="labor_women_q26_2[]" id="labor_women_q26_t2_{{ $i+1 }}"
                                    class="form-control labor_women_q26" value="{{ $q26['women'] ?? 0 }}" min="0">
                            </td>
                            <td>
                                <input type="number" name="labor_total_q26_2[]" readonly
                                    id="labor_total_q26_t2_{{ $i+1 }}" class="form-control labor_total_q26"
                                    value="{{ $q26['total'] ?? 0 }}">
                            </td>
                            <td>
                                @if($i == 0)
                                <button type="button" class="btn btn-sm btn-primary"
                                    id="addRowDataq26_Table2">+</button>
                                @else
                                <button type="button" id="t2_{{ $i+1 }}"
                                    class="btn btn-danger btn-sm q26btn_remove_t2">-</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr class="q26_row_data_2" id="q26_t2_row1">
                            <td><input type="text" name="labor_title_q26_2[]" class="form-control labor_title_q26"></td>
                            <td>
                                <select name="labor_category_q26_2[]" class="form-control labor_category_q26">
                                    <option value="" disabled selected>--Select Category--</option>
                                    @foreach ($category_lists as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                <div class="ngo_rating_container">
                                    <select name="ngo_rating_q26_2[]" class="form-control labor_ngo_rating_q26 mt-1">
                                        <option value="" disabled selected>--Select NGO Rating--</option>
                                        @foreach ($ngo_rating_lists as $rKey => $rItem)
                                        <option value="{{ $rKey }}">{{ $rItem }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td><input type="number" name="labor_men_q26_2[]" id="labor_men_q26_t2_1" value="0"
                                    class="form-control labor_men_q26" min="0"></td>
                            <td><input type="number" name="labor_women_q26_2[]" id="labor_women_q26_t2_1" value="0"
                                    class="form-control labor_women_q26" min="0"></td>
                            <td><input type="number" name="labor_total_q26_2[]" id="labor_total_q26_t2_1" value="0"
                                    class="form-control labor_total_q26" readonly></td>
                            <td><button type="button" class="btn btn-sm btn-primary"
                                    id="addRowDataq26_Table2">+</button></td>
                        </tr>
                        @endif
                    </tbody>
                </table>

            </div>

            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question26">Save</button>
            </p>

        </div>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    const jsCategoryLists = {
        1: 'Social Worker',
        2: 'Police',
        3: 'BGB',
        4: 'Coastguard',
        5: 'VDP',
        6: 'Rail Police',
        7: 'Judiciary',
        8: 'NGO',
        9: 'Others'
    };

    const jsNgoRatings = {
        1: 'Excellent',
        2: 'Good',
        3: 'Fair',
        4: 'Poor',
        5: 'Extremely Poor',
        6: 'Non-Functional'
    };

    function getOptionsHTML(options, defaultText) {
        let html = `<option value="" disabled selected>${defaultText}</option>`;
        $.each(options, function(key, value) {
            html += `<option value="${key}">${value}</option>`;
        });
        return html;
    }

    // NGO সিলেক্ট করলে ড্রপডাউন শো/হাইড করার চেঞ্জ ইভেন্ট
    $(document).on("change", ".labor_category_q26", function() {
        let val = $(this).val();
        let ngoContainer = $(this).closest("td").find(".ngo_rating_container");

        if (val == "8") { // 8 হলো NGO এর ID
            ngoContainer.show();
        } else {
            ngoContainer.hide();
            ngoContainer.find(".labor_ngo_rating_q26").val("");
        }
    });

    // ⬅️ টেবিল ১-এ নতুন রো যুক্ত করা
    $("#addRowDataq26_Table1").click(function() {
        let rowCount = new Date().getTime();
        let catOpts = getOptionsHTML(jsCategoryLists, '--Select Category--');
        let ngoOpts = getOptionsHTML(jsNgoRatings, '--Select NGO Rating--');

        $("#addRowq26Table1 tbody").append(`
            <tr class="q26_row_data_1" id="q26_t1_row${rowCount}">
                <td><input type="text" name="labor_title_q26_1[]" class="form-control labor_title_q26"></td>
                <td>
                    <select name="labor_category_q26_1[]" class="form-control labor_category_q26">${catOpts}</select>
                    <div class="ngo_rating_container">
                        <select name="ngo_rating_q26_1[]" class="form-control labor_ngo_rating_q26 mt-1">${ngoOpts}</select>
                    </div>
                </td>
                <td><input type="number" name="labor_men_q26_1[]" id="labor_men_q26_t1_${rowCount}" value="0" class="form-control labor_men_q26" min="0"></td>
                <td><input type="number" name="labor_women_q26_1[]" id="labor_women_q26_t1_${rowCount}" value="0" class="form-control labor_women_q26" min="0"></td>
                <td><input type="number" name="labor_total_q26_1[]" readonly id="labor_total_q26_t1_${rowCount}" class="form-control labor_total_q26" value="0"></td>
                <td><button type="button" id="t1_${rowCount}" class="btn btn-danger btn-sm q26btn_remove_t1">-</button></td>
            </tr>
        `);
    });

    // ⬅️ টেবিল ২-এ নতুন রো যুক্ত করা
    $("#addRowDataq26_Table2").click(function() {
        let rowCount = new Date().getTime();
        let catOpts = getOptionsHTML(jsCategoryLists, '--Select Category--');
        let ngoOpts = getOptionsHTML(jsNgoRatings, '--Select NGO Rating--');

        $("#addRowq26Table2 tbody").append(`
            <tr class="q26_row_data_2" id="q26_t2_row${rowCount}">
                <td><input type="text" name="labor_title_q26_2[]" class="form-control labor_title_q26"></td>
                <td>
                    <select name="labor_category_q26_2[]" class="form-control labor_category_q26">${catOpts}</select>
                    <div class="ngo_rating_container">
                        <select name="ngo_rating_q26_2[]" class="form-control labor_ngo_rating_q26 mt-1">${ngoOpts}</select>
                    </div>
                </td>
                <td><input type="number" name="labor_men_q26_2[]" id="labor_men_q26_t2_${rowCount}" value="0" class="form-control labor_men_q26" min="0"></td>
                <td><input type="number" name="labor_women_q26_2[]" id="labor_women_q26_t2_${rowCount}" value="0" class="form-control labor_women_q26" min="0"></td>
                <td><input type="number" name="labor_total_q26_2[]" readonly id="labor_total_q26_t2_${rowCount}" class="form-control labor_total_q26" value="0"></td>
                <td><button type="button" id="t2_${rowCount}" class="btn btn-danger btn-sm q26btn_remove_t2">-</button></td>
            </tr>
        `);
    });

    // ⬅️ টেবিল ১ থেকে রো রিমুভ
    $(document).on("click", ".q26btn_remove_t1", function() {
        let id = $(this).attr("id").replace('t1_', '');
        $("#q26_t1_row" + id).remove();
    });

    // ⬅️ টেবিল ২ থেকে রো রিমুভ
    $(document).on("click", ".q26btn_remove_t2", function() {
        let id = $(this).attr("id").replace('t2_', '');
        $("#q26_t2_row" + id).remove();
    });

    // ⬅️ পুরুষ ও মহিলা ইনপুটের ওপর ভিত্তি করে টোটাল ক্যালকুলেট (দুটি টেবিলের জন্যই)
    $(document).on("input change keyup", ".labor_men_q26, .labor_women_q26", function() {
        let row = $(this).closest("tr");
        let men = parseInt(row.find(".labor_men_q26").val()) || 0;
        let women = parseInt(row.find(".labor_women_q26").val()) || 0;
        row.find(".labor_total_q26").val(men + women);
    });

    // ⬅️ রেডিও বাটন অনুযায়ী টগল লজিক
    $(".twenty6_status").on("change", function() {
        let value = $("input[name='is_unit_court_q26']:checked").val();

        if (value === "1") {
            $("#twenty6_question_view").removeClass('visibility').show();
            $(".others_input_container").addClass('othersText').hide();
            $("#q26_others_input").val("");
        } else if (value === "2") {
            $("#twenty6_question_view").hide();
            $(".others_input_container").removeClass('othersText').show();
        } else {
            $("#twenty6_question_view").hide();
            $(".others_input_container").addClass('othersText').hide();
            $("#q26_others_input").val("");
        }
    });

    // ⬅️ টেম্পোরারি সেভ AJAX লজিক
    $("#temp-save-question26").click(function() {
        let yes_no_value = $("input[name='is_unit_court_q26']:checked").val();

        let tableData1 = [];
        $(".q26_row_data_1").each(function() {
            let title = $(this).find(".labor_title_q26").val();
            let category = $(this).find(".labor_category_q26").val();
            let ngo_rating = $(this).find(".labor_ngo_rating_q26").val();
            let men = $(this).find(".labor_men_q26").val() || 0;
            let women = $(this).find(".labor_women_q26").val() || 0;
            let total = $(this).find(".labor_total_q26").val() || 0;

            if (title || category || men > 0 || women > 0) {
                tableData1.push({
                    title: title,
                    category: category,
                    ngo_rating: ngo_rating,
                    men: men,
                    women: women,
                    total: total
                });
            }
        });

        let tableData2 = [];
        $(".q26_row_data_2").each(function() {
            let title = $(this).find(".labor_title_q26").val();
            let category = $(this).find(".labor_category_q26").val();
            let ngo_rating = $(this).find(".labor_ngo_rating_q26").val();
            let men = $(this).find(".labor_men_q26").val() || 0;
            let women = $(this).find(".labor_women_q26").val() || 0;
            let total = $(this).find(".labor_total_q26").val() || 0;

            if (title || category || men > 0 || women > 0) {
                tableData2.push({
                    title: title,
                    category: category,
                    ngo_rating: ngo_rating,
                    men: men,
                    women: women,
                    total: total
                });
            }
        });

        let saveData = {
            q26_data: tableData1,
            q26_data_2: tableData2,
            q26_checked_value: yes_no_value,
            others: $("#q26_others_input").val(),
        };

        $.ajax({
            url: "/superadmin/case/temp-save-question",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                question26: saveData,
                question_no: 26
            },
            success: function(response) {
                $('.question26 .card-header h6').css('color', 'blue');
                alert("Question 26 Temp Saved ");
            },
            error: function() {
                alert("Something went wrong!");
            }
        });
    });

});
</script>