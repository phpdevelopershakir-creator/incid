@if (($questiontitles[15]->status ?? null) == 1)
@php
// ১. সেশন থেকে ১৬ নম্বর প্রশ্নের ডাটা ক্যাচ করা
$question_16_data = session()->get('question16');

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
$q16_checked = $question_16_data['q16radioSix16_checked_value'] ?? "1";
$q16_table_rows = $question_16_data['q16radioSix16_data'] ?? null;
$q16_others_val = $question_16_data['others'] ?? '';
$q16_description = $question_16_data['description'] ?? '';
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

<div class="card question16">
    <div class="card-header" role="tab" id="heading-4">
        <h6 class="card-title" style="color: {{ !empty($question_16_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-16" aria-expanded="false" aria-controls="collapse-4">
                16. {{ $questiontitles[15]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-16" class="collapse" role="tabpanel16" aria-labelledby="heading-4" data-parent="#accordion-2">
        <div class="card-body">

            <!-- Radio Options -->
            <div class="icheck-primary">
                <input type="radio" class="sixteen_status" id="q16_yes" name="is_unit_court_q16" value="1"
                    {{ $q16_checked == "1" ? 'checked' : '' }}>
                <label for="q16_yes">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" class="sixteen_status" id="q16_no" name="is_unit_court_q16" value="0"
                    {{ $q16_checked == "0" ? 'checked' : '' }}>
                <label for="q16_no">No</label>
            </div>

            <div class="icheck-primary input-group mb-3">
                <input type="radio" class="sixteen_status" id="q16_others" name="is_unit_court_q16" value="2"
                    {{ $q16_checked == "2" ? 'checked' : '' }}>
                <label for="q16_others">Others</label>

                <span class="col-md-6 mt--4 others_input_container {{ $q16_checked == "2" ? '' : 'othersText' }}">
                    <input type="text" id="q16radioThree3others" class="form-control" placeholder="Others"
                        name="others_forced_labor_q16" value="{{ $q16_others_val }}">
                </span>
            </div>

            <!-- Main Question View -->
            <div id="sixteen_question_view" class="{{ $q16_checked == '1' ? '' : 'visibility' }}">

                <p><strong>If yes</strong></p>

                <!-- 🖼️ স্ক্রিনশট অনুযায়ী সুন্দর বর্ণনা ক্ষেত্র (Description Table) -->
                <table class="table table-bordered mb-4">
                    <tbody>
                        <tr>
                            <td style="width: 45%; vertical-align: middle; font-weight: 500;">
                                Describe efforts taken by authorities to consistently and systematically use such
                                protocols or formal written procedures to proactively screen for indicators of human
                                trafficking.
                            </td>
                            <td>
                                <textarea name="description_q16" id="q16_description" class="form-control" rows="4"
                                    placeholder="Input Text Area description">{{ $q16_description }}</textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Main Dynamic Data Table -->
                <table id="addRowq16radioThree3" class="table table-bordered text-center">
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
                        @if(!empty($q16_table_rows) && count($q16_table_rows) > 0)
                        @foreach($q16_table_rows as $i => $q16)
                        @php
                        $is_ngo = ($q16['category'] ?? '') == 8;
                        @endphp
                        <tr class="q16radioSix6QRow" id="q16row{{ $i+1 }}">
                            <td>
                                <input type="text" name="labor_title_q16[]" class="form-control labor_title_q16"
                                    value="{{ $q16['title'] ?? '' }}">
                            </td>
                            <td>
                                <!-- মূল ক্যাটাগরি ড্রপডাউন -->
                                <select name="internal_traffick_type_of_hotlines_q16[]"
                                    class="form-control labor_category_q16">
                                    <option value="" disabled selected>--Select Category--</option>
                                    @foreach ($category_lists as $key => $item)
                                    <option value="{{ $key }}" {{ ($q16['category'] ?? '') == $key ? 'selected' : '' }}>
                                        {{ $item }}
                                    </option>
                                    @endforeach
                                </select>

                                <!-- NGO এর জন্য ডাইনামিক ড্রপডাউন -->
                                <div class="ngo_rating_container" style="display: {{ $is_ngo ? 'block' : 'none' }};">
                                    <select name="ngo_rating_q16[]" class="form-control labor_ngo_rating_q16 mt-1">
                                        <option value="" disabled selected>--Select NGO Rating--</option>
                                        @foreach ($ngo_rating_lists as $rKey => $rItem)
                                        <option value="{{ $rKey }}"
                                            {{ ($q16['ngo_rating'] ?? '') == $rKey ? 'selected' : '' }}>
                                            {{ $rItem }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td>
                                <input type="number" name="labor_men_q16[]" id="labor_men_q16_{{ $i+1 }}"
                                    class="form-control labor_men_q16" value="{{ $q16['men'] ?? 0 }}" min="0">
                            </td>
                            <td>
                                <input type="number" name="labor_women_q16[]" id="labor_women_q16_{{ $i+1 }}"
                                    class="form-control labor_women_q16" value="{{ $q16['women'] ?? 0 }}" min="0">
                            </td>
                            <td>
                                <input type="number" name="labor_total_q16[]" readonly id="labor_total_q16_{{ $i+1 }}"
                                    class="form-control labor_total_q16" value="{{ $q16['total'] ?? 0 }}">
                            </td>
                            <td>
                                @if($i == 0)
                                <button type="button" class="btn btn-sm btn-primary"
                                    id="addRowDatasq16radioThree3">+</button>
                                @else
                                <button type="button" id="{{ $i+1 }}"
                                    class="btn btn-danger btn-sm q16radioThree3btn_remove">-</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @else
                        {{-- প্রথমবার লোড হলে ডিফল্ট ১ম রো দেখাবে --}}
                        <tr class="q16radioSix6QRow" id="q16row1">
                            <td><input type="text" name="labor_title_q16[]" class="form-control labor_title_q16"></td>
                            <td>
                                <select name="internal_traffick_type_of_hotlines_q16[]"
                                    class="form-control labor_category_q16">
                                    <option value="" disabled selected>--Select Category--</option>
                                    @foreach ($category_lists as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>

                                <div class="ngo_rating_container">
                                    <select name="ngo_rating_q16[]" class="form-control labor_ngo_rating_q16 mt-1">
                                        <option value="" disabled selected>--Select NGO Rating--</option>
                                        @foreach ($ngo_rating_lists as $rKey => $rItem)
                                        <option value="{{ $rKey }}">{{ $rItem }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td>
                                <input type="number" name="labor_men_q16[]" id="labor_men_q16_1" value="0"
                                    class="form-control labor_men_q16" min="0">
                            </td>
                            <td>
                                <input type="number" name="labor_women_q16[]" id="labor_women_q16_1" value="0"
                                    class="form-control labor_women_q16" min="0">
                            </td>
                            <td>
                                <input type="number" name="labor_total_q16[]" id="labor_total_q16_1" value="0"
                                    class="form-control labor_total_q16" readonly>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary"
                                    id="addRowDatasq16radioThree3">+</button>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <p class="text-right mt-3">
                <button type="button" class="btn btn-success" id="temp-save-question16">Save</button>
            </p>

        </div>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    // NGO সিলেক্ট করলে ড্রপডাউন শো/হাইড
    $(document).on("change", ".labor_category_q16", function() {
        let val = $(this).val();
        let ngoContainer = $(this).closest("td").find(".ngo_rating_container");

        if (val == "8") { // 8 হলো NGO এর ID
            ngoContainer.show();
        } else {
            ngoContainer.hide();
            ngoContainer.find(".labor_ngo_rating_q16").val("");
        }
    });

    // ⬅️ টেবিল এ নতুন রো যুক্ত করা
    $("#addRowDatasq16radioThree3").click(function() {
        let rowCount = new Date().getTime();

        let jsCategoryLists = {
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

        let jsNgoRatings = {
            1: 'Excellent',
            2: 'Good',
            3: 'Fair',
            4: 'Poor',
            5: 'Extremely Poor',
            6: 'Non-Functional'
        };

        let categoryOptions = `<option value="" disabled selected>--Select Category--</option>`;
        $.each(jsCategoryLists, function(key, value) {
            categoryOptions += `<option value="${key}">${value}</option>`;
        });

        let ngoRatingOptions = `<option value="" disabled selected>--Select NGO Rating--</option>`;
        $.each(jsNgoRatings, function(key, value) {
            ngoRatingOptions += `<option value="${key}">${value}</option>`;
        });

        $("#addRowq16radioThree3 tbody").append(`
            <tr class="q16radioSix6QRow" id="q16row${rowCount}">
                <td><input type="text" name="labor_title_q16[]" class="form-control labor_title_q16"></td>
                <td>
                    <select name="internal_traffick_type_of_hotlines_q16[]" class="form-control labor_category_q16">
                        ${categoryOptions}
                    </select>

                    <div class="ngo_rating_container">
                        <select name="ngo_rating_q16[]" class="form-control labor_ngo_rating_q16 mt-1">
                            ${ngoRatingOptions}
                        </select>
                    </div>
                </td>
                <td><input type="number" name="labor_men_q16[]" id="labor_men_q16_${rowCount}" value="0" class="form-control labor_men_q16" min="0"></td>
                <td><input type="number" name="labor_women_q16[]" id="labor_women_q16_${rowCount}" value="0" class="form-control labor_women_q16" min="0"></td>
                <td><input type="number" name="labor_total_q16[]" readonly id="labor_total_q16_${rowCount}" class="form-control labor_total_q16" value="0"></td>
                <td><button type="button" id="${rowCount}" class="btn btn-danger btn-sm q16radioThree3btn_remove">-</button></td>
            </tr>
        `);
    });

    // ⬅️ রো রিমুভ করা
    $(document).on("click", ".q16radioThree3btn_remove", function() {
        let id = $(this).attr("id");
        $("#q16row" + id).remove();
    });

    // ⬅️ পুরুষ ও মহিলা ইনপুটের ওপর ভিত্তি করে অটো টোটাল
    $(document).on("input change keyup", ".labor_men_q16, .labor_women_q16", function() {
        let targetId = $(this).attr("id");
        let row = targetId.substring(targetId.lastIndexOf('_') + 1);

        let men = parseInt($("#labor_men_q16_" + row).val()) || 0;
        let women = parseInt($("#labor_women_q16_" + row).val()) || 0;

        $("#labor_total_q16_" + row).val(men + women);
    });

    // ⬅️ রেডিও বাটন অনুযায়ী টগল লজিক
    $(".sixteen_status").on("change", function() {
        let value = $("input[name='is_unit_court_q16']:checked").val();

        if (value === "1") {
            $("#sixteen_question_view").removeClass('visibility').show();
            $(".others_input_container").addClass('othersText').hide();
            $("#q16radioThree3others").val("");
        } else if (value === "2") {
            $("#sixteen_question_view").hide();
            $(".others_input_container").removeClass('othersText').show();
        } else {
            $("#sixteen_question_view").hide();
            $(".others_input_container").addClass('othersText').hide();
            $("#q16radioThree3others").val("");
        }
    });

    // ⬅️ টেম্পোরারি সেভ AJAX লজিক
    $("#temp-save-question16").click(function() {
        let yes_no_value = $("input[name='is_unit_court_q16']:checked").val();
        let description_text = $("#q16_description").val();
        let tableData = [];

        $(".q16radioSix6QRow").each(function() {
            let title = $(this).find(".labor_title_q16").val();
            let category = $(this).find(".labor_category_q16").val();
            let ngo_rating = $(this).find(".labor_ngo_rating_q16").val();
            let men = $(this).find(".labor_men_q16").val() || 0;
            let women = $(this).find(".labor_women_q16").val() || 0;
            let total = $(this).find(".labor_total_q16").val() || 0;

            if (title || category || men > 0 || women > 0) {
                tableData.push({
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
            q16radioSix16_data: tableData,
            q16radioSix16_checked_value: yes_no_value,
            description: description_text,
            others: $("#q16radioThree3others").val(),
        };

        $.ajax({
            url: "/superadmin/case/temp-save-question",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                question16: saveData,
                question_no: 16
            },
            success: function(response) {
                $('.question16 .card-header h6').css('color', 'blue');
                alert("Question 16 Temp Saved ");
            },
            error: function() {
                alert("Something went wrong!");
            }
        });
    });

});
</script>