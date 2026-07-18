@if (($questiontitles[1]->status ?? null) == 1)
@php
$question_2_data = session()->get('question2');

$q2_checked = $question_2_data['q2_checked_value'] ?? "1";
$q2_rows_data = $question_2_data['q2_data'] ?? null;
$q2_others_val = $question_2_data['others'] ?? '';

$Nationality_Lists = [
1 => "Chinese National",
2 => "Cuban national",
3 => "North Korean National"
];

$Sector_Lists = [
1 => "Belt and Road Initiative",
2 => "Medical workers",
3 => "Athletes",
4 => "Coaches",
5 => "Artist",
6 => "Teachers",
7 => "Engineers",
8 => "Sea Merchants",
9 => "Government to Government Work",
10 => "Private Sector",
11 => "Others",
12 => "N/A"
];
@endphp

<style>
.visibility_q2 {
    display: none !important;
}

.othersText_q2 {
    display: none !important;
}
</style>

<div class="card question2">
    <div class="card-header" role="tab" id="heading-2">
        <h6 class="card-title" style="color: {{ !empty($question_2_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-2" aria-expanded="false" aria-controls="collapse-2">
                2. {{ $questiontitles[1]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-2" class="collapse" role="tabpanel" aria-labelledby="heading-2" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioTwo1" class="twostatus" name="is_government_transparent_q2" value="1"
                    {{ $q2_checked == "1" ? "checked" : "" }}>
                <label for="radioTwo1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioTwo2" class="twostatus" name="is_government_transparent_q2" value="0"
                    {{ $q2_checked == "0" ? "checked" : "" }}>
                <label for="radioTwo2">No</label>
            </div>

            <div class="icheck-primary input-group mb-3">
                <input type="radio" id="radioTwo3" class="twostatus" name="is_government_transparent_q2" value="2"
                    {{ $q2_checked == "2" ? "checked" : "" }}>
                <label for="radioTwo3">Others</label>

                <span class="col-md-6 mt--4 q2_others_container {{ $q2_checked == '2' ? '' : 'othersText_q2' }}"
                    style="margin-top:-8px;">
                    <input type="text" id="q2others" placeholder="Others" class="form-control"
                        value="{{ $q2_others_val }}" name="other_government_transparent_q2">
                </span>
            </div>

            <div id="2_question_view" class="{{ ($q2_checked == '1') ? '' : 'visibility_q2' }}">
                <table id="addRowQ2" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Nationality</th>
                            <th>Sector</th>
                            <th>Number of Citizen present in Bangladesh</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($q2_rows_data) && count($q2_rows_data) > 0)
                        @foreach($q2_rows_data as $index => $row)
                        {{-- এখানে শুধুমাত্র ভ্যালিড নিউমেরিক ডেটা ফিল্টার করা হচ্ছে যাতে অন্য কোনো কোশ্চেনের আবর্জনা ডেটা লোড না হতে পারে --}}
                        @if(isset($row['nationality']) && (is_numeric($row['nationality']) || $row['nationality'] ==
                        ""))
                        <tr class="qe2NoOfRow" id="row_q2_{{ $index }}">
                            <td>
                                <select name="government_nationality_q2[]" class="form-control q2-select">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($Nationality_Lists as $key => $nationality)
                                    <option value="{{ $key }}"
                                        {{ ($row['nationality'] ?? '') == $key ? 'selected' : '' }}>
                                        {{ $nationality }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="government_sector_q2[]" class="form-control q2-select">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($Sector_Lists as $key => $sector)
                                    <option value="{{ $key }}" {{ ($row['sector'] ?? '') == $key ? 'selected' : '' }}>
                                        {{ $sector }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="government_total_q2[]" value="{{ $row['total'] ?? 0 }}"
                                    class="form-control q2-total" min="0">
                            </td>
                            <td>
                                @if($index >= 3)
                                <button type="button" class="btn btn-danger btn-sm btn_remove_q2">-</button>
                                @endif
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        @else
                        {{-- প্রথমবার খালি থাকলে ডিফল্ট ৩টি রো --}}
                        @for ($i = 1; $i <= 3; $i++) <tr class="qe2NoOfRow" id="row_q2_fixed_{{ $i }}">
                            <td>
                                <select name="government_nationality_q2[]" class="form-control q2-select">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($Nationality_Lists as $key => $nationality)
                                    <option value="{{ $key }}">{{ $nationality }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="government_sector_q2[]" class="form-control q2-select">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($Sector_Lists as $key => $sector)
                                    <option value="{{ $key }}">{{ $sector }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="government_total_q2[]" value="0"
                                    class="form-control q2-total" min="0">
                            </td>
                            <td></td>
                            </tr>
                            @endfor
                            @endif
                    </tbody>
                </table>

                {{-- প্লাস বাটনটি টেবিলের নিচে রাখা হয়েছে সহজ ম্যানেজমেন্টের জন্য --}}
                <div class="text-left mb-3">
                    <button id="addRowDatasq2" type="button" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Add More Row
                    </button>
                </div>
            </div>

            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question2">Save</button>
            </p>
        </div>
    </div>
</div>
@endif

<script type="text/javascript">
$(document).ready(function() {
    // রেডিও বাটন চেঞ্জ হ্যান্ডলার
    $(".twostatus").on("change", function() {
        var statusvalue = $("input[name='is_government_transparent_q2']:checked").val();

        if (statusvalue == '1') {
            $('#2_question_view').removeClass('visibility_q2').show();
            $('.q2_others_container').addClass('othersText_q2').hide();
            $('#q2others').val("");
        } else if (statusvalue == "2") {
            $('#2_question_view').hide();
            $('.q2_others_container').removeClass('othersText_q2').show();
        } else {
            $('#2_question_view').hide();
            $('.q2_others_container').addClass('othersText_q2').hide();
            $('#q2others').val("");
        }
    });

    // Add More Row লজিক
    $(document).on('click', '#addRowDatasq2', function() {
        let uniqueId = new Date().getTime();

        let nationalityOptions = `<option value="" disabled selected>---Choose an item--</option>`;
        @foreach($Nationality_Lists as $key => $nationality)
        nationalityOptions += `<option value="{{ $key }}">{{ $nationality }}</option>`;
        @endforeach

        let sectorOptions = `<option value="" disabled selected>---Choose an item--</option>`;
        @foreach($Sector_Lists as $key => $sector)
        sectorOptions += `<option value="{{ $key }}">{{ $sector }}</option>`;
        @endforeach

        let html = `
        <tr class="qe2NoOfRow" id="row_q2_${uniqueId}">
            <td><select name="government_nationality_q2[]" class="form-control q2-select">${nationalityOptions}</select></td>
            <td><select name="government_sector_q2[]" class="form-control q2-select">${sectorOptions}</select></td>
            <td><input type="number" name="government_total_q2[]" class="form-control q2-total" value="0" min="0"></td>
            <td><button type="button" class="btn btn-danger btn-sm btn_remove_q2">-</button></td>
        </tr>`;

        $("#addRowQ2 tbody").append(html);
    });

    // ডায়নামিক রো রিমুভ লজিক
    $(document).on('click', '.btn_remove_q2', function() {
        $(this).closest('tr').remove();
    });

    // AJAX Temp Save লজিক (রিলোড ছাড়া)
    $(document).on("click", "#temp-save-question2", function() {
        let q2_rows_data = [];

        // কোড যেন অন্য কোনো সেকশনের ইনপুট ভুল করে না ধরে ফেলে, সে জন্য সুনির্দিষ্ট ক্লাস (.q2-select এবং .q2-total) দিয়ে ডাটা ফিল্টার করা হয়েছে
        $('#addRowQ2 tbody tr.qe2NoOfRow').each(function() {
            let nationality = $(this).find('.q2-select[name="government_nationality_q2[]"]')
                .val();
            let sector = $(this).find('.q2-select[name="government_sector_q2[]"]').val();
            let total = $(this).find('.q2-total[name="government_total_q2[]"]').val();

            // ভ্যালিডেশন: শুধুমাত্র সঠিক নিউমেরিক আইডি সিলেক্ট করা থাকলেই ডেটা যাবে
            if (nationality && sector && !isNaN(nationality) && !isNaN(sector)) {
                q2_rows_data.push({
                    nationality: nationality,
                    sector: sector,
                    total: total ? total : 0
                });
            }
        });

        // যদি কোনো ডেটা এন্ট্রি না করা থাকে, ৩টি রো ফাঁকা ফরম্যাট দিয়ে স্টোর হবে
        if (q2_rows_data.length === 0) {
            $('#addRowQ2 tbody tr.qe2NoOfRow').slice(0, 3).each(function() {
                q2_rows_data.push({
                    nationality: "",
                    sector: "",
                    total: 0
                });
            });
        }

        let saveData = {
            q2_checked_value: $("input[name='is_government_transparent_q2']:checked").val(),
            q2_data: q2_rows_data,
            others: $("#q2others").val()
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                _token: "{{ csrf_token() }}",
                question_no: 2,
                question2: saveData
            },
            success: function(response) {
                $('.question2 .card-header h6').css('color', 'blue');
                alert("Question 2 Saved Successfully!");
                // রিলোড হবে না (location.reload বাদ দেওয়া হয়েছে)
            },
            error: function() {
                alert("Something went wrong!");
            }
        });
    });
});
</script>