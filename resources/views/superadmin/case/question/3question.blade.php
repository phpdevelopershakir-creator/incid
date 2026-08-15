@if (($questiontitles[2]->status ?? null) == 1)
@php
$question_3_data = session()->get('question3');

$q3_checked = $question_3_data['q3_checked_value'] ?? "1";
$q3_rows_data_a = $question_3_data['q3_data_a'] ?? [];
$q3_rows_data_b = $question_3_data['q3_data_b'] ?? [];
$q3_others_val = $question_3_data['others'] ?? '';
@endphp

<style>
.visibility_q3 {
    display: none;
}

.othersText_q3 {
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
                <input type="radio" id="radioThree1" class="threestatus" name="is_technology_trafficking_applicable_q3"
                    value="1" {{ $q3_checked == "1" ? "checked" : "" }}>
                <label for="radioThree1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioThree2" class="threestatus" name="is_technology_trafficking_applicable_q3"
                    value="0" {{ $q3_checked == "0" ? "checked" : "" }}>
                <label for="radioThree2">No</label>
            </div>

            <div class="icheck-primary input-group mb-3">
                <input type="radio" id="radioThree3" class="threestatus" name="is_technology_trafficking_applicable_q3"
                    value="2" {{ $q3_checked == "2" ? "checked" : "" }}>
                <label for="radioThree3">Others</label>

                <span class="col-md-6 mt--4 q3_others_container {{ $q3_checked == '2' ? '' : 'othersText_q3' }}"
                    style="margin-top:-8px;">
                    <input type="text" id="q3others" placeholder="Others" class="form-control"
                        value="{{ $q3_others_val }}" name="other_technology_trafficking_applicable_q3">
                </span>
            </div>

            <!-- Table View -->
            <div id="3_question_view" class="{{ ($q3_checked == '1') ? '' : 'visibility_q3' }}">
                <table class="table table-bordered text-center" id="q3_table_a">
                    <thead>
                        <tr class="bg-light">
                            <th>Category</th>
                            <th>Purpose (Multiple Selection)</th>
                            <th>Type of Technology Used by Traffickers (Multiple Selection)</th>
                            <th>Description (victims/process and nature of victimization/government actions)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $categories = [
                        '1' => 'Fraudulent Recruitment',
                        '2' => 'Means',
                        '3' => 'Forms of Exploitation',
                        '4' => 'Emerging Trends'
                        ];
                        @endphp

                        @foreach($categories as $catKey => $catName)
                        @php
                        $row_data = null;
                        if(!empty($q3_rows_data_a)) {
                        foreach($q3_rows_data_a as $r) {
                        if(($r['category'] ?? '') == $catKey) {
                        $row_data = $r;
                        break;
                        }
                        }
                        }
                        @endphp
                        <tr class="q3_row_a">
                            <td>
                                <input type="hidden" name="category_q3[]" value="{{ $catKey }}">
                                <p class="mb-0 font-weight-bold">{{ $catName }}</p>
                            </td>
                            <td>
                                <select name="purpose_q3[]" class="form-control q3_purpose_select">
                                    @include('superadmin.case.helper.purpose', ['selected' => $row_data['purpose'] ??
                                    ''])
                                </select>
                            </td>
                            <td>
                                <select name="technology_q3[]" class="form-control q3_tech_select">
                                    @include('superadmin.case.helper.type_tec', ['selected' => $row_data['technology']
                                    ?? ''])
                                </select>
                            </td>
                            <td>
                                <input type="text" name="description_q3[]" class="form-control q3_desc_input"
                                    value="{{ $row_data['description'] ?? '' }}" placeholder="Description">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <br>
                <p class="font-weight-bold">Government Response</p>

                <table class="table table-bordered text-center" id="q3_table_b">
                    <thead>
                        <tr class="bg-light">
                            <th>Question</th>
                            <th>Responses (Multiple Selection)</th>
                            <th>Description (who is doing it? What are the results)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $questions_b = [
                        '1' => 'How are governments countering tech-enabled trafficking?',
                        '2' => 'What efforts are governments making to address the needs of victims of
                        technology-facilitated human trafficking?'
                        ];
                        @endphp

                        @foreach($questions_b as $qKey => $qText)
                        @php
                        $row_b_data = null;
                        if(!empty($q3_rows_data_b)) {
                        foreach($q3_rows_data_b as $rb) {
                        if(($rb['question'] ?? '') == $qKey) {
                        $row_b_data = $rb;
                        break;
                        }
                        }
                        }
                        @endphp
                        <tr class="q3_row_b">
                            <td class="text-left" style="width: 40%;">
                                <input type="hidden" name="question_q3b[]" value="{{ $qKey }}">
                                <p class="mb-0">{{ $qText }}</p>
                            </td>
                            <td>
                                <select name="response_q3b[]" class="form-control q3b_response_select">
                                    @include('superadmin.case.helper.responses', ['selected' => $row_b_data['response']
                                    ?? ''])
                                </select>
                            </td>
                            <td>
                                <input type="text" name="description_q3b[]" class="form-control q3b_desc_input"
                                    value="{{ $row_b_data['description'] ?? '' }}" placeholder="Description">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <p class="text-right mt-3">
                <button type="button" class="btn btn-success" id="temp-save-question3">Save</button>
            </p>
        </div>
    </div>
</div>
@endif

<script type="text/javascript">
$(document).ready(function() {
    // রেডিও বাটন টগল
    $(".threestatus").on("change", function() {
        var statusvalue = $("input[name='is_technology_trafficking_applicable_q3']:checked").val();

        if (statusvalue == '1') {
            $('#3_question_view').removeClass('visibility_q3').show();
            $('.q3_others_container').addClass('othersText_q3').hide();
            $('#q3others').val("");
        } else if (statusvalue == "2") {
            $('#3_question_view').hide();
            $('.q3_others_container').removeClass('othersText_q3').show();
        } else {
            $('#3_question_view').hide();
            $('.q3_others_container').addClass('othersText_q3').hide();
            $('#q3others').val("");
        }
    });

    // AJAX Temp Save
    $(document).on("click", "#temp-save-question3", function() {
        let q3_data_a = [];
        let q3_data_b = [];

        // Table A data collection
        $('#q3_table_a tbody tr.q3_row_a').each(function() {
            let category = $(this).find('input[name="category_q3[]"]').val();
            let purpose = $(this).find('.q3_purpose_select').val();
            let technology = $(this).find('.q3_tech_select').val();
            let description = $(this).find('.q3_desc_input').val();

            q3_data_a.push({
                category: category,
                purpose: purpose,
                technology: technology,
                description: description
            });
        });

        // Table B data collection
        $('#q3_table_b tbody tr.q3_row_b').each(function() {
            let question = $(this).find('input[name="question_q3b[]"]').val();
            let response_val = $(this).find('.q3b_response_select').val();
            let description = $(this).find('.q3b_desc_input').val();

            q3_data_b.push({
                question: question,
                response: response_val,
                description: description
            });
        });

        let saveData = {
            q3_checked_value: $("input[name='is_technology_trafficking_applicable_q3']:checked")
                .val(),
            q3_data_a: q3_data_a,
            q3_data_b: q3_data_b,
            others: $("#q3others").val()
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                _token: "{{ csrf_token() }}",
                question_no: 3,
                question3: saveData
            },
            success: function(response) {
                if (response.success || response) {
                    $('.question3 .card-header h6').css('color', 'blue');
                    alert("Question 3 Temp Saved ");
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