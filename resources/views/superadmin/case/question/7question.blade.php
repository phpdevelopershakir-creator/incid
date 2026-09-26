@if (($questiontitles[6]->status ?? null) == 1)
@php
$question_7_data = session()->get('question7');

$q7_checked = $question_7_data['q7_checked_value'] ?? "1"; // ডিফল্ট 'Yes' (1)
$q7_table_data = $question_7_data['q7_data'] ?? null;
$q7_others_val = $question_7_data['others'] ?? '';

// Ministry Dropdown List
$ministries = [
"Ministry of Primary and Mass Education (MoPME)",
"Ministry of Agriculture (MoA)",
"Ministry of Civil Aviation and Tourism (MoCAT)",
"Ministry of Commerce (MoC)",
"Ministry of Road Transport and Bridges (MoRTB)",
"Ministry of Cultural Affairs (MoCA)",
"Ministry of Defence (MoD)",
"Ministry of Food (MoFood)",
"Ministry of Education (MoE)",
"Ministry of Environment, Forest and Climate Change (MoEFCC)",
"Ministry of Public Administration (MoPA)",
"Ministry of Fisheries and Livestock (MoFL)",
"Ministry of Finance (MoF)",
"Ministry of Foreign Affairs (MoFA)",
"Ministry of Health and Family Welfare (MoHFW)",
"Ministry of Home Affairs (MoHA)",
"Ministry of Housing and Public Works (MoHPW)",
"Ministry of Industries (MoInd)",
"Ministry of Information and Broadcasting (MoIB)",
"Ministry of Textiles and Jute (MoTJ)",
"Ministry of Labour and Employment (MoLE)",
"Ministry of Law, Justice and Parliamentary Affairs (MoLJPA)",
"Ministry of Land (MoL)",
"Ministry of Local Government, Rural Development and Co-operatives (MoLGRD&C)",
"Ministry of Expatriates' Welfare and Overseas Employment (MoEWOE)",
"Ministry of Shipping (MoS)",
"Ministry of Social Welfare (MoSW)",
"Ministry of Women and Children Affairs (MoWCA)",
"Ministry of Water Resources (MoWR)",
"Ministry of Youth and Sports (MoYS)",
"Ministry of Liberation War Affairs (MoLWA)",
"Ministry of Religious Affairs (MoRA)",
"Ministry of Railways (MoR)",
"Ministry of Science and Technology (MoST)",
"Ministry of Disaster Management and Relief (MoDMR)",
"Ministry of Chittagong Hill Tracts Affairs (MoCHTA)",
"Ministry of Power, Energy and Mineral Resources (MPEMR)",
"Ministry of Posts, Telecommunications and Information Technology (MoPTIT)",
"Ministry of Planning (MoP)",
"Bangladesh Embassy/Mission /Consulate"
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

<div class="card question7">
    <div class="card-header" role="tab" id="heading-7">
        <h6 class="mb-0 card-title" style="color: {{ !empty($question_7_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-7" aria-expanded="false" aria-controls="collapse-7">
                7. {{ $questiontitles[6]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-7" class="collapse" role="tabpane7" aria-labelledby="heading-7" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioSeven1" class="seven_status" name="is_exclusively_dedicated_trafficking_q7"
                    value="1" {{ $q7_checked == "1" ? "checked" : "" }}>
                <label for="radioSeven1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioSeven2" class="seven_status" name="is_exclusively_dedicated_trafficking_q7"
                    value="0" {{ $q7_checked == "0" ? "checked" : "" }}>
                <label for="radioSeven2">No</label>
            </div>

            <div class="icheck-primary input-group mb-3">
                <input type="radio" id="radioSeven3" class="seven_status" name="is_exclusively_dedicated_trafficking_q7"
                    value="2" {{ $q7_checked == "2" ? "checked" : "" }}>
                <label for="radioSeven3">Others</label>

                <span class="col-md-6 mt--4 q7_others_container {{ $q7_checked == '2' ? '' : 'othersText' }}"
                    style="margin-top:-8px;">
                    <input type="text" id="q7others" placeholder="Please describe" class="form-control"
                        value="{{ $q7_others_val }}" name="other_exclusively_dedicated_trafficking_q7">
                </span>
            </div>

            <div id="seven_question_view" class="{{ ($q7_checked == '1') ? '' : 'visibility' }}">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th style="width: 40%;">Ministry</th>
                            <th>Men</th>
                            <th>Women</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @for($i = 1; $i <= 4; $i++) @php $selected_ministry=$q7_table_data['q7Title'.$i] ?? '' ; @endphp
                            <tr>
                            <td>
                                <select name="justice_title_q7[]" id="q7Title{{$i}}" class="form-control q7Input">
                                    <option value="">Select Ministry</option>
                                    @foreach($ministries as $ministry)
                                    <option value="{{ $ministry }}"
                                        {{ $selected_ministry == $ministry ? 'selected' : '' }}>
                                        {{ $ministry }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td>
                                <input type="number" name="justice_men_q7[]" id="q7Men{{$i}}" min="0"
                                    class="form-control question7rowmen q7Input"
                                    value="{{ $q7_table_data['q7Men'.$i] ?? 0 }}">
                            </td>

                            <td>
                                <input type="number" name="justice_women_q7[]" id="q7Women{{$i}}" min="0"
                                    class="form-control question7rowWomen q7Input"
                                    value="{{ $q7_table_data['q7Women'.$i] ?? 0 }}">
                            </td>

                            <td>
                                <input type="text" name="justice_total_q7[]" id="rowTotal{{$i}}"
                                    class="form-control q7Input" value="{{ $q7_table_data['rowTotal'.$i] ?? 0 }}"
                                    readonly>
                            </td>
                            </tr>
                            @endfor

                            <tr>
                                <th>Total</th>
                                <td><input type="text" id="total_men_q7" class="form-control q7Input"
                                        value="{{ $q7_table_data['total_men_q7'] ?? 0 }}" readonly></td>
                                <td><input type="text" id="total_women_q7" class="form-control q7Input"
                                        value="{{ $q7_table_data['total_women_q7'] ?? 0 }}" readonly></td>
                                <td><input type="text" id="grand_total_q7" class="form-control q7Input"
                                        value="{{ $q7_table_data['grand_total_q7'] ?? 0 }}" readonly></td>
                            </tr>
                    </tbody>
                </table>
            </div>

            <br />
            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question7">Save</button>
            </p>

        </div>
    </div>
</div>
@endif

<script>
// ⬅️ টোটাল ক্যালকুলেশন ফাংশন
function calculateQ7Totals() {
    let totalMen = 0;
    let totalWomen = 0;

    for (let i = 1; i <= 4; i++) {
        let men = parseInt($('#q7Men' + i).val()) || 0;
        let women = parseInt($('#q7Women' + i).val()) || 0;
        let rowTotal = men + women;

        $('#rowTotal' + i).val(rowTotal);

        totalMen += men;
        totalWomen += women;
    }

    $('#total_men_q7').val(totalMen);
    $('#total_women_q7').val(totalWomen);
    $('#grand_total_q7').val(totalMen + totalWomen);
}

// ইনপুট বা চেঞ্জে ক্যালকুলেশন ট্রিগার
$(document).on('input change keyup build', '.question7rowmen, .question7rowWomen', calculateQ7Totals);

$(document).ready(function() {
    setTimeout(function() {
        calculateQ7Totals();
    }, 500);
});

// ⬅️ AJAX সেভ রিকোয়েস্ট
$(document).on("click", "#temp-save-question7", function() {
    calculateQ7Totals();

    let q7_data = {};

    $('.q7Input').each(function() {
        if (this.id) {
            q7_data[this.id] = $(this).val();
        }
    });

    q7_data['total_men_q7'] = $('#total_men_q7').val();
    q7_data['total_women_q7'] = $('#total_women_q7').val();
    q7_data['grand_total_q7'] = $('#grand_total_q7').val();

    let saveData = {
        q7_checked_value: $("input[name='is_exclusively_dedicated_trafficking_q7']:checked").val(),
        q7_data: q7_data,
        others: $("#q7others").val()
    };

    $.ajax({
        url: "/superadmin/case/temp-save-question",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            question_no: 7,
            question7: saveData
        },
        success: function(response) {
            if (response.success || response) {
                $('.question7 .card-header h6').css('color', 'blue');
                alert("Question 7 saved temporarily");
            } else {
                alert("Not Saved");
            }
        },
        error: function() {
            alert("Something went wrong!");
        }
    });
});

// Radio change logic
$(document).ready(function() {
    $(".seven_status").on("change", function() {
        var statusvalue = $("input[name='is_exclusively_dedicated_trafficking_q7']:checked").val();

        if (statusvalue == '1') {
            $('#seven_question_view').removeClass('visibility').show();
            $('.q7_others_container').addClass('othersText').hide();
            $('#q7others').val("");
            calculateQ7Totals();
        } else if (statusvalue == "2") {
            $('#seven_question_view').hide();
            $('.q7_others_container').removeClass('othersText').show();
        } else {
            $('#seven_question_view').hide();
            $('.q7_others_container').addClass('othersText').hide();
            $('#q7others').val("");
        }
    });
});
</script>