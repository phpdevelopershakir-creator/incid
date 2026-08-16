@if (($questiontitles[17]->status ?? null) == 1)
@php
// ১. সেশন থেকে ১৮ নম্বর প্রশ্নের ডাটা পাওয়া
$question_18_data = session()->get('question18');

// ২. ক্যাটাগরি এবং এনজিও রেটিং অ্যারে ডিফাইন
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
$q18_checked = $question_18_data['q18radioSix18_checked_value'] ?? "1";
$q18_table_rows = $question_18_data['q18radioSix18_data'] ?? null;
$q18_others_val = $question_18_data['others'] ?? '';
@endphp

<div class="card question18">
    <div class="card-header" role="tab" id="heading-4">
        <h6 class="card-title" style="color: {{ !empty($question_18_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-18" aria-expanded="false" aria-controls="collapse-4">
                18. {{ $questiontitles[17]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-18" class="collapse" role="tabpanel" aria-labelledby="heading-4" data-parent="#accordion-2">
        <div class="card-body">

            <!-- Radio Options -->
            <div class="icheck-primary">
                <input type="radio" class="eighteen_status" id="q18_yes" name="is_government_officials_q18" value="1"
                    {{ $q18_checked == "1" ? 'checked' : '' }}>
                <label for="q18_yes">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" class="eighteen_status" id="q18_no" name="is_government_officials_q18" value="0"
                    {{ $q18_checked == "0" ? 'checked' : '' }}>
                <label for="q18_no">No</label>
            </div>

            <div class="icheck-primary input-group mb-3">
                <input type="radio" class="eighteen_status" id="q18_others" name="is_government_officials_q18" value="2"
                    {{ $q18_checked == "2" ? 'checked' : '' }}>
                <label for="q18_others">Others</label>

                <span class="col-md-6 mt--4 others_input_container"
                    style="display: {{ $q18_checked == '2' ? 'block' : 'none' }};">
                    <input type="text" id="q18radioThree3others" class="form-control" placeholder="Others"
                        name="other_government_officials_q18" value="{{ $q18_others_val }}">
                </span>
            </div>

            <!-- Table Container -->
            <div id="eighteen_question_view" class="card-body row"
                style="display: {{ $q18_checked == '1' ? 'flex' : 'none' }};">
                <table id="addRowq18radioThree3" class="table table-bordered text-center">
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
                        @if(!empty($q18_table_rows) && count($q18_table_rows) > 0)
                        @foreach($q18_table_rows as $i => $q18)
                        @php
                        $is_ngo = ($q18['category'] ?? '') == 8;
                        @endphp
                        <tr class="q18radioSix6QRow" id="q18row{{ $i+1 }}">
                            <td>
                                <input type="text" name="location_q18[]" class="form-control labor_title_q18"
                                    value="{{ $q18['title'] ?? '' }}">
                            </td>
                            <td>
                                <!-- Category Dropdown -->
                                <select name="category_q18[]" class="form-control labor_category_q18">
                                    <option value="" disabled selected>--Select Category--</option>
                                    @foreach ($category_lists as $key => $item)
                                    <option value="{{ $key }}" {{ ($q18['category'] ?? '') == $key ? 'selected' : '' }}>
                                        {{ $item }}
                                    </option>
                                    @endforeach
                                </select>

                                <!-- NGO Dynamic Dropdown -->
                                <div class="ngo_rating_container mt-1"
                                    style="display: {{ $is_ngo ? 'block' : 'none' }};">
                                    <select name="ngo_rating_q18[]" class="form-control labor_ngo_rating_q18">
                                        <option value="" disabled selected>--Select NGO Rating--</option>
                                        @foreach ($ngo_rating_lists as $rKey => $rItem)
                                        <option value="{{ $rKey }}"
                                            {{ ($q18['ngo_rating'] ?? '') == $rKey ? 'selected' : '' }}>
                                            {{ $rItem }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td>
                                <input type="number" name="men_q18[]" class="form-control labor_men_q18"
                                    value="{{ $q18['men'] ?? 0 }}" min="0">
                            </td>
                            <td>
                                <input type="number" name="women_q18[]" class="form-control labor_women_q18"
                                    value="{{ $q18['women'] ?? 0 }}" min="0">
                            </td>
                            <td>
                                <input type="number" name="total_q18[]" readonly class="form-control labor_total_q18"
                                    value="{{ $q18['total'] ?? 0 }}">
                            </td>
                            <td>
                                @if($i == 0)
                                <button type="button" class="btn btn-sm btn-primary"
                                    id="addRowDatasq18radioThree3">+</button>
                                @else
                                <button type="button" class="btn btn-danger btn-sm q18radioThree3btn_remove">-</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <!-- Default 1st Row -->
                        <tr class="q18radioSix6QRow">
                            <td><input type="text" name="location_q18[]" class="form-control labor_title_q18"></td>
                            <td>
                                <select name="category_q18[]" class="form-control labor_category_q18">
                                    <option value="" disabled selected>--Select Category--</option>
                                    @foreach ($category_lists as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>

                                <div class="ngo_rating_container mt-1" style="display: none;">
                                    <select name="ngo_rating_q18[]" class="form-control labor_ngo_rating_q18">
                                        <option value="" disabled selected>--Select NGO Rating--</option>
                                        @foreach ($ngo_rating_lists as $rKey => $rItem)
                                        <option value="{{ $rKey }}">{{ $rItem }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td>
                                <input type="number" name="men_q18[]" value="0" class="form-control labor_men_q18"
                                    min="0">
                            </td>
                            <td>
                                <input type="number" name="women_q18[]" value="0" class="form-control labor_women_q18"
                                    min="0">
                            </td>
                            <td>
                                <input type="number" name="total_q18[]" value="0" class="form-control labor_total_q18"
                                    readonly>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary"
                                    id="addRowDatasq18radioThree3">+</button>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <p class="text-right mt-3">
                <button type="button" class="btn btn-success" id="temp-save-question18">Save</button>
            </p>

        </div>
    </div>
</div>
@endif

<script>
$(document).ready(function() {

    // NGO সিলেক্ট করলে ড্রপডাউন শো/হাইড
    $(document).on("change", ".labor_category_q18", function() {
        let val = $(this).val();
        let ngoContainer = $(this).closest("td").find(".ngo_rating_container");

        if (val == "8") {
            ngoContainer.show();
        } else {
            ngoContainer.hide();
            ngoContainer.find(".labor_ngo_rating_q18").val("");
        }
    });

    // নতুন রো (Row) যোগ করা
    $(document).on("click", "#addRowDatasq18radioThree3", function() {
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

        let newRow = `
            <tr class="q18radioSix6QRow">
                <td><input type="text" name="location_q18[]" class="form-control labor_title_q18"></td>
                <td>
                    <select name="category_q18[]" class="form-control labor_category_q18">
                        ${categoryOptions}
                    </select>
                    <div class="ngo_rating_container mt-1" style="display: none;">
                        <select name="ngo_rating_q18[]" class="form-control labor_ngo_rating_q18">
                            ${ngoRatingOptions}
                        </select>
                    </div>
                </td>
                <td><input type="number" name="men_q18[]" value="0" class="form-control labor_men_q18" min="0"></td>
                <td><input type="number" name="women_q18[]" value="0" class="form-control labor_women_q18" min="0"></td>
                <td><input type="number" name="total_q18[]" readonly class="form-control labor_total_q18" value="0"></td>
                <td><button type="button" class="btn btn-danger btn-sm q18radioThree3btn_remove">-</button></td>
            </tr>
        `;
        $("#addRowq18radioThree3 tbody").append(newRow);
    });

    // রো রিমুভ করা
    $(document).on("click", ".q18radioThree3btn_remove", function() {
        $(this).closest("tr").remove();
    });

    // অটো টোটাল ক্যালকুলেশন
    $(document).on("input change keyup", ".labor_men_q18, .labor_women_q18", function() {
        let row = $(this).closest("tr");
        let men = parseInt(row.find(".labor_men_q18").val()) || 0;
        let women = parseInt(row.find(".labor_women_q18").val()) || 0;
        row.find(".labor_total_q18").val(men + women);
    });

    // রেডিও বাটন চেঞ্জ ইভেন্ট
    $(document).on("change", ".eighteen_status", function() {
        let value = $("input[name='is_government_officials_q18']:checked").val();

        if (value === "1") {
            $("#eighteen_question_view").css("display", "flex");
            $(".others_input_container").hide();
            $("#q18radioThree3others").val("");
        } else if (value === "2") {
            $("#eighteen_question_view").hide();
            $(".others_input_container").show();
        } else {
            $("#eighteen_question_view").hide();
            $(".others_input_container").hide();
            $("#q18radioThree3others").val("");
        }
    });

    // Temp Save AJAX লজিক
    $(document).on("click", "#temp-save-question18", function(e) {
        e.preventDefault();

        let yes_no_value = $("input[name='is_government_officials_q18']:checked").val();
        let tableData = [];

        $(".q18radioSix6QRow").each(function() {
            let title = $(this).find(".labor_title_q18").val();
            let category = $(this).find(".labor_category_q18").val();
            let ngo_rating = $(this).find(".labor_ngo_rating_q18").val();
            let men = $(this).find(".labor_men_q18").val() || 0;
            let women = $(this).find(".labor_women_q18").val() || 0;
            let total = $(this).find(".labor_total_q18").val() || 0;

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
            q18radioSix18_data: tableData,
            q18radioSix18_checked_value: yes_no_value,
            others: $("#q18radioThree3others").val(),
        };

        $.ajax({
            url: "/superadmin/case/temp-save-question",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                question18: saveData,
                question_no: 18
            },
            success: function(response) {
                $('.question18 .card-header h6').css('color', 'blue');
                alert("Question 18 Temp Saved ");
            },
            error: function(err) {
                alert("Something went wrong!");
                console.log(err);
            }
        });
    });

});
</script>