@if (($questiontitles[2]->status ?? null) == 1)
@php
$question_3_data = session()->get('question3');

$q3_checked = $question_3_data['q3_checked_value'] ?? "1";
$q3_rows_data = $question_3_data['q3_data'] ?? null;
$q3_others_val = $question_3_data['others'] ?? '';

@endphp

<style>
.visibility_q2 {
    display: none;
}

.othersText_q2 {
    display: none;
}
</style>

<div class="card question3">
    <div class="card-header" role="tab" id="heading-3">
        <h6 class="card-title" style="color: {{ !empty($question_3_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-3" aria-expanded="false" aria-controls="collapse-2">
                3. {{ $questiontitles[2]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-3" class="collapse" role="tabpanel" aria-labelledby="heading-3" data-parent="#accordion-2">
        <div class="card-body">

            <!-- Radio Buttons -->
            <div class="icheck-primary">
                <input type="radio" id="radioTwo1" class="threestatus" name="is_government_transparent_q3" value="1"
                    {{ $q3_checked == "1" ? "checked" : "" }}>
                <label for="radioTwo1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioTwo2" class="threestatus" name="is_government_transparent_q3" value="0"
                    {{ $q3_checked == "0" ? "checked" : "" }}>
                <label for="radioTwo2">No</label>
            </div>

            <div class="icheck-primary input-group mb-3">
                <input type="radio" id="radioTwo3" class="threestatus" name="is_government_transparent_q3" value="2"
                    {{ $q3_checked == "2" ? "checked" : "" }}>
                <label for="radioTwo3">Others</label>

                <span class="col-md-6 mt--4 q2_others_container {{ $q3_checked == '2' ? '' : 'othersText_q2' }}"
                    style="margin-top:-8px;">
                    <input type="text" id="q2others" placeholder="Others" class="form-control"
                        value="{{ $q3_others_val }}" name="other_government_transparent_q3">
                </span>
            </div>

            <!-- Table View -->
            <div id="3_question_view" class="{{ ($q3_checked == '1') ? '' : 'visibility_q2' }}">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Category </th>
                            <th>Purpose
                                (Multiple Selection)
                            </th>
                            <th>Type of Technology Used by Traffickers
                                (Multiple Selection)
                            </th>
                            <th>Description
                                (victims/process and nature of victimization/government actions)
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($q3_rows_data) && count($q3_rows_data) > 0)
                        {{-- সেশন ডাটা থাকলে সেটিকে রেন্ডার করা --}}
                        @foreach($q3_rows_data as $index => $row)
                        <tr class="qe2NoOfRow" id="row_q2_{{ $index }}">
                            <td>
                                <input type="text" class="form-control" placeholder="Fraudulent Recruitment">

                            </td>
                            <td>
                                <select name="government_sector_q2[]" class="form-control">
                                    @include('superadmin.case.helper.purpose')

                                </select>
                            </td>

                            <td>
                                <select name="government_sector_q2[]" class="form-control">

                                    @include('superadmin.case.helper.type_tec')
                                </select>
                            </td>
                            <td>
                                <input type="text" name="government_total_q2[]" class="form-control">
                            </td>

                        </tr>
                        @endforeach
                        @else
                        {{-- প্রথমবার পেজ লোড হলে ডিফল্ট রো জেনারেট হবে --}}

                        {{-- রো ১ (ফিক্সড) --}}
                        <tr class="qe2NoOfRow" id="row_q2_fixed_1">
                            <td>
                                <input type="text" class="form-control" placeholder="Means">

                            </td>
                            <td>
                                <select name="government_nationality_q2[]" class="form-control">
                                    @include('superadmin.case.helper.purpose')


                                </select>
                            </td>
                            <td>
                                <select name="government_sector_q2[]" class="form-control">
                                    @include('superadmin.case.helper.type_tec')

                                </select>
                            </td>
                            <td>
                                <input type="text" name="government_total_q2[]" class="form-control">
                            </td>
                            <td></td>
                        </tr>

                        {{-- রো ২ (ফিক্সড) --}}
                        <tr class="qe2NoOfRow" id="row_q2_fixed_2">
                            <td>
                                <input type="text" class="form-control" placeholder="Forms of Exploitation">

                            </td>

                            <td>
                                <select name="government_nationality_q2[]" class="form-control">
                                    @include('superadmin.case.helper.purpose')

                                </select>
                            </td>
                            <td>
                                <select name="government_sector_q2[]" class="form-control">
                                    @include('superadmin.case.helper.type_tec')

                                </select>
                            </td>
                            <td>
                                <input type="text" name="government_total_q2[]" class="form-control">
                            </td>
                            <td></td>
                        </tr>

                        {{-- রো ৩ (প্লাস বাটন যুক্ত) --}}
                        <tr class="qe2NoOfRow" id="row_q2_fixed_3">
                            <td>
                                <input type="text" class="form-control" placeholder="Forms of Exploitation">

                            </td>
                            <td>
                                <select name="government_nationality_q2[]" class="form-control">
                                    @include('superadmin.case.helper.purpose')
                                </select>
                            </td>
                            <td>
                                <select name="government_sector_q2[]" class="form-control">
                                    @include('superadmin.case.helper.type_tec')
                                </select>
                            </td>
                            <td>
                                <input type="text" name="government_total_q2[]" value="" class="form-control">
                            </td>

                        </tr>
                        <tr class="qe2NoOfRow" id="row_q2_fixed_3">
                            <td>
                                <input type="text" class="form-control" placeholder="Emerging Trends">

                            </td>
                            <td>
                                <select name="government_nationality_q2[]" class="form-control">
                                    @include('superadmin.case.helper.purpose')

                                </select>
                            </td>
                            <td>
                                <select name="government_sector_q2[]" class="form-control">
                                    @include('superadmin.case.helper.type_tec')

                                </select>
                            </td>
                            <td>
                                <input type="text" name="government_total_q2[]" value="" class="form-control">
                            </td>

                        </tr>
                        @endif
                    </tbody>
                </table>
                <br>
                <p>Government Response</p>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Question </th>
                            <th>Responses
                                (Multiple Selection)


                            </th>

                            <th>Description (who is doing it? What are the results)
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($q3_rows_data) && count($q3_rows_data) > 0)
                        {{-- সেশন ডাটা থাকলে সেটিকে রেন্ডার করা --}}
                        @foreach($q3_rows_data as $index => $row)
                        <tr class="qe2NoOfRow" id="row_q2_{{ $index }}">
                            <td>
                                <input type="text" class="form-control"
                                    placeholder="How are governments countering tech-enabled trafficking? ">

                            </td>
                            <td>
                                <select name="government_sector_q2[]" class="form-control">
                                    @include('superadmin.case.helper.responses')

                                </select>
                            </td>


                            <td>
                                <input type="text" name="government_total_q2[]" class="form-control">
                            </td>

                        </tr>
                        @endforeach
                        @else
                        {{-- প্রথমবার পেজ লোড হলে ডিফল্ট রো জেনারেট হবে --}}

                        {{-- রো ১ (ফিক্সড) --}}
                        <tr class="qe2NoOfRow" id="row_q2_fixed_1">
                            <td>
                                <input type="text" class="form-control"
                                    placeholder="How are governments countering tech-enabled trafficking? ">

                            </td>
                            <td>
                                <select name="government_nationality_q2[]" class="form-control">
                                    @include('superadmin.case.helper.responses')


                                </select>
                            </td>

                            <td>
                                <input type="text" name="government_total_q2[]" class="form-control">
                            </td>
                            <td></td>
                        </tr>

                        {{-- রো ২ (ফিক্সড) --}}
                        <tr class="qe2NoOfRow" id="row_q2_fixed_2">
                            <td>
                                <input type="text" class="form-control"
                                    placeholder="What efforts are governments making to address needs of victims of technology-facilitated human trafficking?">

                            </td>

                            <td>
                                <select name="government_nationality_q2[]" class="form-control">
                                    @include('superadmin.case.helper.responses')

                                </select>
                            </td>

                            <td>
                                <input type="text" name="government_total_q2[]" class="form-control">
                            </td>
                            <td></td>
                        </tr>


                        @endif
                    </tbody>
                </table>
            </div>

            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question3">Save</button>
            </p>
        </div>
    </div>
</div>
@endif

<script type="text/javascript">
$(document).ready(function() {
    // রেডিও বাটন হাইড/শো হ্যান্ডলার
    $(".threestatus").on("change", function() {
        var statusvalue = $("input[name='is_government_transparent_q3']:checked").val();

        if (statusvalue == '1') {
            $('#3_question_view').removeClass('visibility_q2').show();
            $('.q2_others_container').addClass('othersText_q2').hide();
            $('#q2others').val("");
        } else if (statusvalue == "2") {
            $('#3_question_view').hide();
            $('.q2_others_container').removeClass('othersText_q2').show();
        } else {
            $('#3_question_view').hide();
            $('.q2_others_container').addClass('othersText_q2').hide();
            $('#q2others').val("");
        }
    });

    // Add More Row লজিক (৩ নম্বর রো-এর প্লাস বাটনের জন্য)




    // AJAX Temp Save লজিক
    $(document).on("click", "#temp-save-question3", function() {
        let q3_rows_data = [];

        $('.qe2NoOfRow').each(function() {
            let nationality = $(this).find('select[name="government_nationality_q2[]"]').val();
            let sector = $(this).find('select[name="government_sector_q2[]"]').val();
            let total = $(this).find('input[name="government_total_q2[]"]').val();

            if (nationality || sector || total) {
                q3_rows_data.push({
                    nationality: nationality,
                    sector: sector,
                    total: total
                });
            }
        });

        let saveData = {
            q3_checked_value: $("input[name='is_government_transparent_q3']:checked").val(),
            q3_data: q3_rows_data,
            others: $("#q2others").val()
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                _token: "{{ csrf_token() }}",
                question_no: 2,
                question3: saveData
            },
            success: function(response) {
                $('.question3 .card-header h6').css('color', 'blue');
                alert("Question 2 Temp Saved ");
            },
            error: function() {
                alert("Something went wrong!");
            }
        });
    });
});
</script>