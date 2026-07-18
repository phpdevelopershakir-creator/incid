@if (($questiontitles[10]->status ?? null) == 1)
@php

$question_11_data = session()->get('question11');

$q11_checked = $question_11_data['q11_checked_value'] ?? "1"; // ডিফল্ট 'Yes'
$q11_rows_data = $question_11_data['q11_data'] ?? null;
$q11_others_val = $question_11_data['others'] ?? '';

$target_Lists = [
1 => "Government Official",
2 => "Immigration authority",
3 => "Law Enforcing Personnel",
4 => "Border Control Force",
5 => "Judiciary",
6 => "Diplomat"
];

$country_Lists = [
1 => "India", 2 => "Nepal", 3 => "Sri lanka", 4 => "EU",
5 => "USA", 6 => "Saudi Arabia", 7 => "Qatar", 8 => "Lebanon",
9 => "Iraq", 10 => "UAE", 11 => "Thailand", 12 => "Vietnam",
13 => "Cambodia", 14 => "South Africa", 15 => "Brazil", 16 => "UK"
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

<div class="card question11">
    <div class="card-header" role="tab" id="heading-11">
        <h6 class="card-title" style="color: {{ !empty($question_11_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-11" aria-expanded="false" aria-controls="collapse-11">
                11. {{ $questiontitles[10]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-11" class="collapse" role="tabpanel" aria-labelledby="heading-11" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioEleven1" class="elevenstatus"
                    name="is_government_agreements_transparent_q11" value="1"
                    {{ $q11_checked == "1" ? "checked" : "" }}>
                <label for="radioEleven1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioEleven2" class="elevenstatus"
                    name="is_government_agreements_transparent_q11" value="0"
                    {{ $q11_checked == "0" ? "checked" : "" }}>
                <label for="radioEleven2">No</label>
            </div>

            <div class="icheck-primary input-group mb-3">
                <input type="radio" id="radioEleven3" class="elevenstatus"
                    name="is_government_agreements_transparent_q11" value="2"
                    {{ $q11_checked == "2" ? "checked" : "" }}>
                <label for="radioEleven3">Others</label>

                <span class="col-md-6 mt--4 q11_others_container {{ $q11_checked == '2' ? '' : 'othersText' }}"
                    style="margin-top:-8px;">
                    <input type="text" id="q11others" placeholder="Others" class="form-control"
                        value="{{ $q11_others_val }}" name="other_government_agreements_transparent_q11">
                </span>
            </div>

            <div id="11_question_view" class="{{ ($q11_checked == '1') ? '' : 'visibility' }}">
                <table id="addRowQ11" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Country</th>
                            <th>Target group of Training (multiple response)</th>
                            <th>Total coverage</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($q11_rows_data) && count($q11_rows_data) > 0)

                        @foreach($q11_rows_data as $index => $row)
                        <tr class="qe11NoOfRow" id="row{{ $index }}">
                            <td>
                                @if($index == 0)

                                <select name="government_agreements_transparent_country_q11[]" class="form-control">
                                    <option value="" disabled>---Choose an item--</option>
                                    @foreach ($country_Lists as $key => $country)
                                    <option value="{{ $key }}" {{ ($row['country'] ?? '') == $key ? 'selected' : '' }}>
                                        {{ $country }}</option>
                                    @endforeach
                                </select>
                                @else

                                <input type="text" name="government_agreements_transparent_country_q11[]"
                                    class="form-control" placeholder="Others (Specify)___"
                                    value="{{ $row['country'] ?? '' }}">
                                @endif
                            </td>
                            <td>
                                <select name="government_agreements_transparent_status_q11[]" class="form-control">
                                    <option value="" disabled>---Choose an item--</option>
                                    @foreach ($target_Lists as $key => $target)
                                    <option value="{{ $key }}" {{ ($row['target'] ?? '') == $key ? 'selected' : '' }}>
                                        {{ $target }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="government_agreements_transparent_total_q11[]"
                                    value="{{ $row['total'] ?? 0 }}" class="form-control" min="0">
                            </td>
                            <td>
                                @if($index == 0)

                                @elseif($index == 1)

                                <button id="addRowDatasq11" type="button" class="btn btn-sm btn-primary">+</button>
                                @else

                                <button type="button" id="{{ $index }}" class="btn btn-danger btn_remove">-</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @else


                        <tr class="qe11NoOfRow" id="row0">
                            <td>
                                <select name="government_agreements_transparent_country_q11[]" class="form-control">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($country_Lists as $key => $country)
                                    <option value="{{ $key }}">{{ $country }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="government_agreements_transparent_status_q11[]" class="form-control">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($target_Lists as $key => $target)
                                    <option value="{{ $key }}">{{ $target }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="government_agreements_transparent_total_q11[]" value="0"
                                    class="form-control" min="0">
                            </td>
                            <td></td>
                        </tr>

                        <tr class="qe11NoOfRow" id="row1">
                            <td>
                                <input type="text" name="government_agreements_transparent_country_q11[]"
                                    class="form-control" placeholder="Others (Specify)___">
                            </td>
                            <td>
                                <select name="government_agreements_transparent_status_q11[]" class="form-control">
                                    <option value="" disabled selected>---Choose an item--</option>
                                    @foreach ($target_Lists as $key => $target)
                                    <option value="{{ $key }}">{{ $target }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="government_agreements_transparent_total_q11[]" value="0"
                                    class="form-control" min="0">
                            </td>
                            <td>

                                <button id="addRowDatasq11" type="button" class="btn btn-sm btn-primary">+</button>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question11">Save</button>
            </p>
        </div>
    </div>
</div>
@endif

<script type="text/javascript">
$(document).ready(function() {
    // ⬅️ রেডিও বাটন হাইড/শো লজিক
    $(".elevenstatus").on("change", function() {
        var statusvalue = $("input[name='is_government_agreements_transparent_q11']:checked").val();

        if (statusvalue == '1') {
            $('#11_question_view').removeClass('visibility').show();
            $('.q11_others_container').addClass('othersText').hide();
            $('#q11others').val("");
        } else if (statusvalue == "2") {
            $('#11_question_view').hide();
            $('.q11_others_container').removeClass('othersText').show();
        } else {
            $('#11_question_view').hide();
            $('.q11_others_container').addClass('othersText').hide();
            $('#q11others').val("");
        }
    });


    $("#addRowDatasq11").click(function() {
        let rowCount = $('.qe11NoOfRow').length + 1;
        let targetOptions =
            `@foreach ($target_Lists as $key => $target)<option value="{{ $key }}">{{ $target }}</option>@endforeach`;

        $("#addRowQ11 tbody").append(
            '<tr class="qe11NoOfRow" id="row' + rowCount + '">' +
            '<td><input type="text" name="government_agreements_transparent_country_q11[]" class="form-control" placeholder="Others (Specify)___"></td>' +
            '<td><select name="government_agreements_transparent_status_q11[]" class="form-control"><option value="" disabled selected>---Choose an item--</option>' +
            targetOptions + '</select></td>' +
            '<td><input type="number" name="government_agreements_transparent_total_q11[]" class="form-control" value="0" min="0"></td>' +
            '<td><button type="button" id="' + rowCount +
            '" class="btn btn-danger btn_remove">-</button></td>' +
            '</tr>'
        );
    });


    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr('id');
        $('#row' + button_id).remove();
    });


    $(document).on("click", "#temp-save-question11", function() {
        let q11_rows_data = [];

        $('.qe11NoOfRow').each(function() {

            let country = $(this).find(
                '[name="government_agreements_transparent_country_q11[]"]').val();
            let target = $(this).find(
                'select[name="government_agreements_transparent_status_q11[]"]').val();
            let total = $(this).find(
                'input[name="government_agreements_transparent_total_q11[]"]').val();

            if (country || target || total) {
                q11_rows_data.push({
                    country: country,
                    target: target,
                    total: total
                });
            }
        });

        let saveData = {
            q11_checked_value: $("input[name='is_government_agreements_transparent_q11']:checked")
                .val(),
            q11_data: q11_rows_data,
            others: $("#q11others").val()
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                _token: "{{ csrf_token() }}",
                question_no: 11,
                question11: saveData
            },
            success: function(response) {
                if (response.success) {
                    $('.question11 .card-header h6').css('color', 'blue');
                    alert("Question 11 Temp Saved ");
                } else {
                    alert("Not Saved");
                }
            },
            error: function() {
                alert("Something went wrong!");
            }
        });
    });
});
</script>