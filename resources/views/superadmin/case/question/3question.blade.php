@if (($questiontitles[2]->status ?? null) == 1)
@php
    // ১. সেশন এবং ডাটাবেজ থেকে ডাটা ক্যাচ করা
    $question_3_data = session()->get('question3');

    // ২. রেডিও স্ট্যাটাস ফিক্স করা (Session -> Database -> Default "1")
    $raw_checked = $question_3_data['is_technology_trafficking_applicable_q3'] 
                    ?? ($question_3_data['q3_checked_value'] 
                    ?? ($db_q3_status ?? null));

    $q3_checked = ($raw_checked !== null) ? (string)$raw_checked : "1";

    // ৩. Table A & B Data Fetching (Session or DB Model)
    $q3_rows_data_a = $question_3_data['q3_data_a'] ?? ($db_q3_data_a ?? []);
    $q3_rows_data_b = $question_3_data['q3_data_b'] ?? ($db_q3_data_b ?? []);

    // ৪. Others Field Fetching
    $q3_others_val = $question_3_data['other_technology_trafficking_applicable_q3'] 
                        ?? ($question_3_data['others'] 
                        ?? ($db_q3_others ?? ''));
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
        <h6 class="card-title" style="color: {{ (!empty($question_3_data) || !empty($db_q3_data_a)) ? 'blue' : 'green' }};">
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
                    value="1" {{ $q3_checked === "1" ? 'checked="checked"' : '' }}>
                <label for="radioThree1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioThree2" class="threestatus" name="is_technology_trafficking_applicable_q3"
                    value="0" {{ $q3_checked === "0" ? 'checked="checked"' : '' }}>
                <label for="radioThree2">No</label>
            </div>

            <div class="icheck-primary input-group mb-3">
                <input type="radio" id="radioThree3" class="threestatus" name="is_technology_trafficking_applicable_q3"
                    value="2" {{ $q3_checked === "2" ? 'checked="checked"' : '' }}>
                <label for="radioThree3">Others</label>

                <span class="col-md-6 mt--4 q3_others_container {{ $q3_checked === '2' ? '' : 'othersText_q3' }}"
                    style="margin-top:-8px;">
                    <input type="text" id="q3others" placeholder="Others" class="form-control"
                        value="{{ $q3_others_val }}" name="other_technology_trafficking_applicable_q3">
                </span>
            </div>

            <!-- Table View -->
            <div id="3_question_view" class="{{ $q3_checked === '1' ? '' : 'visibility_q3' }}">
                
                <!-- Table A: Categories -->
                <table class="table table-bordered text-center" id="q3_table_a">
                    <thead>
                        <tr class="bg-light">
                            <th style="width: 20%;">Category</th>
                            <th style="width: 25%;">Purpose</th>
                            <th style="width: 25%;">Type of Technology Used by Traffickers</th>
                            <th style="width: 30%;">Description (victims/process and nature of victimization/government actions)</th>
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

                        // Purpose List Array
                        $purpose_list = [
                            '1' => 'Recruitment & Communication',
                            '2' => 'Advertising & Marketing',
                            '3' => 'Financial Transactions',
                            '4' => 'Control & Surveillance',
                            '5' => 'Document Forgery / Logistics',
                            '6' => 'Others'
                        ];

                        // Technology List Array
                        $technology_list = [
                            '1' => 'Social Media Platforms (Facebook, Instagram, etc.)',
                            '2' => 'Messaging Apps (WhatsApp, Telegram, Signal)',
                            '3' => 'Dark Web / Online Marketplaces',
                            '4' => 'Mobile Banking / Cryptocurrency',
                            '5' => 'GPS / Location Tracking / Surveillance',
                            '6' => 'Job Portals / Fake Websites',
                            '7' => 'Others'
                        ];
                        @endphp

                        @foreach($categories as $catKey => $catName)
                        @php
                        $purpose_selected = '';
                        $tech_selected = '';
                        $desc_selected = '';

                        if(!empty($q3_rows_data_a)) {
                            foreach($q3_rows_data_a as $r) {
                                $c_cat = is_object($r) ? ($r->category_q3 ?? '') : ($r['category'] ?? ($r['category_q3'] ?? ''));
                                if($c_cat == $catKey) {
                                    $purpose_selected = is_object($r) ? ($r->purpose_q3 ?? '') : ($r['purpose'] ?? ($r['purpose_q3'] ?? ''));
                                    $tech_selected    = is_object($r) ? ($r->technology_q3 ?? '') : ($r['technology'] ?? ($r['technology_q3'] ?? ''));
                                    $desc_selected    = is_object($r) ? ($r->description_q3 ?? '') : ($r['description'] ?? ($r['description_q3'] ?? ''));
                                    break;
                                }
                            }
                        }
                        @endphp
                        <tr class="q3_row_a">
                            <td>
                                <input type="hidden" name="category_q3[]" value="{{ $catKey }}">
                                <p class="mb-0 font-weight-bold text-left">{{ $catName }}</p>
                            </td>
                            <td>
                                <select name="purpose_q3[]" class="form-control q3_purpose_select">
                                    <option value="">Select Purpose</option>
                                    @foreach($purpose_list as $pKey => $pName)
                                        <option value="{{ $pKey }}" {{ (string)$purpose_selected === (string)$pKey ? 'selected' : '' }}>
                                            {{ $pName }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="technology_q3[]" class="form-control q3_tech_select">
                                    <option value="">Select Technology</option>
                                    @foreach($technology_list as $tKey => $tName)
                                        <option value="{{ $tKey }}" {{ (string)$tech_selected === (string)$tKey ? 'selected' : '' }}>
                                            {{ $tName }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" name="description_q3[]" class="form-control q3_desc_input"
                                    value="{{ $desc_selected }}" placeholder="Description">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <br>
                <p class="font-weight-bold">Government Response</p>

                <!-- Table B: Government Response -->
                <table class="table table-bordered text-center" id="q3_table_b">
                    <thead>
                        <tr class="bg-light">
                            <th style="width: 35%;">Question</th>
                            <th style="width: 30%;">Responses</th>
                            <th style="width: 35%;">Description (who is doing it? What are the results)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $questions_b = [
                            '1' => 'How are governments countering tech-enabled trafficking?',
                            '2' => 'What efforts are governments making to address the needs of victims of technology-facilitated human trafficking?'
                        ];

                        // Response List Array
                        $response_list = [
                            '1' => 'Cyber Crime Unit Investigation',
                            '2' => 'Public Awareness Campaigns',
                            '3' => 'Legal Framework & Policy Action',
                            '4' => 'Victim Support Hotline & Services',
                            '5' => 'International Cooperation',
                            '6' => 'Others'
                        ];
                        @endphp

                        @foreach($questions_b as $qKey => $qText)
                        @php
                        $response_selected = '';
                        $desc_b_selected = '';

                        if(!empty($q3_rows_data_b)) {
                            foreach($q3_rows_data_b as $rb) {
                                $c_q = is_object($rb) ? ($rb->question_q3b ?? '') : ($rb['question'] ?? ($rb['question_q3b'] ?? ''));
                                if($c_q == $qKey) {
                                    $response_selected = is_object($rb) ? ($rb->response_q3b ?? '') : ($rb['response'] ?? ($rb['response_q3b'] ?? ''));
                                    $desc_b_selected   = is_object($rb) ? ($rb->description_q3b ?? '') : ($rb['description'] ?? ($rb['description_q3b'] ?? ''));
                                    break;
                                }
                            }
                        }
                        @endphp
                        <tr class="q3_row_b">
                            <td class="text-left">
                                <input type="hidden" name="question_q3b[]" value="{{ $qKey }}">
                                <p class="mb-0">{{ $qText }}</p>
                            </td>
                            <td>
                                <select name="response_q3b[]" class="form-control q3b_response_select">
                                    <option value="">Select Response</option>
                                    @foreach($response_list as $rKey => $rName)
                                        <option value="{{ $rKey }}" {{ (string)$response_selected === (string)$rKey ? 'selected' : '' }}>
                                            {{ $rName }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" name="description_q3b[]" class="form-control q3b_desc_input"
                                    value="{{ $desc_b_selected }}" placeholder="Description">
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

    // ১. রেডিও বাটন অনুযায়ী ভিউ শো/হাইড
    function toggleQ3View() {
        var initialVal = $(".question3 input[name='is_technology_trafficking_applicable_q3']:checked").val();
        if (initialVal == '1') {
            $('#3_question_view').removeClass('visibility_q3').show();
            $('.q3_others_container').addClass('othersText_q3').hide();
        } else if (initialVal == '2') {
            $('#3_question_view').hide();
            $('.q3_others_container').removeClass('othersText_q3').show();
        } else {
            $('#3_question_view').hide();
            $('.q3_others_container').addClass('othersText_q3').hide();
        }
    }

    toggleQ3View();

    $(document).on("change", ".question3 .threestatus", function() {
        toggleQ3View();
        if ($(this).val() != '2') {
            $('#q3others').val("");
        }
    });

    // ২. AJAX Temp Save Action
    $(document).on("click", "#temp-save-question3", function() {
        let q3_checked_val = $(".question3 input[name='is_technology_trafficking_applicable_q3']:checked").val() || null;
        let q3_data_a = [];
        let q3_data_b = [];

        // Table A Data Collection
        $('#q3_table_a tbody tr.q3_row_a').each(function() {
            let category = $(this).find('input[name="category_q3[]"]').val();
            let purpose = $(this).find('.q3_purpose_select').val();
            let technology = $(this).find('.q3_tech_select').val();
            let description = $(this).find('.q3_desc_input').val();

            q3_data_a.push({
                category: category,
                category_q3: category,
                purpose: purpose,
                purpose_q3: purpose,
                technology: technology,
                technology_q3: technology,
                description: description,
                description_q3: description
            });
        });

        // Table B Data Collection
        $('#q3_table_b tbody tr.q3_row_b').each(function() {
            let question = $(this).find('input[name="question_q3b[]"]').val();
            let response_val = $(this).find('.q3b_response_select').val();
            let description = $(this).find('.q3b_desc_input').val();

            q3_data_b.push({
                question: question,
                question_q3b: question,
                response: response_val,
                response_q3b: response_val,
                description: description,
                description_q3b: description
            });
        });

        let saveData = {
            is_technology_trafficking_applicable_q3: q3_checked_val,
            q3_checked_value: q3_checked_val,
            other_technology_trafficking_applicable_q3: $("#q3others").val(),
            others: $("#q3others").val(),
            q3_data_a: q3_data_a,
            q3_data_b: q3_data_b
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
                    alert("Question 3 Temp Saved Successfully!");
                } else {
                    alert("Not Saved");
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                alert("Something went wrong!");
            }
        });
    });

});
</script>