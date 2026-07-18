@if (($questiontitles[12]->status ?? null) == 1)
@php
// ১৩-এর জায়গায় সব ১২ করে দেওয়া হলো
$question_12_data = session()->get('question12') ?? ($question_12_data ?? null);

$q12_checked = $question_12_data['q12_checked_value'] ?? "1";
$q12_others_val = $question_12_data['others'] ?? '';

// টেম্প সেভ সেশন অথবা ডেটাবেজ রিলেশন
$investigations_data = $question_12_data['investigations'] ?? ($question_12_data['twelvea'] ?? ($twelvea ?? null));
$prosecutions_data = $question_12_data['prosecutions'] ?? ($question_12_data['twelveb'] ?? ($twelveb ?? null));
$repatriations_data = $question_12_data['repatriations'] ?? ($question_12_data['twelvec'] ?? ($twelvec ?? null));
$extraditions_data = $question_12_data['extraditions'] ?? ($question_12_data['twelved'] ?? ($twelved ?? null));
@endphp

<style>
.othersText {
    display: none;
}

.visibility {
    display: none;
}
</style>

<div class="card question12">
    <div class="card-header" role="tab" id="heading-12">
        <h6 class="mb-0 card-title" style="color: {{ !empty($question_12_data) ? 'blue' : 'green' }};">
            <a data-toggle="collapse" href="#Question-12" aria-expanded="false" aria-controls="collapse-12">
                12. {{ $questiontitles[12]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-12" class="collapse" role="tabpanel" aria-labelledby="heading-12" data-parent="#accordion-2">
        <div class="card-body">

            <div class="icheck-primary">
                <input type="radio" id="radioTwelve1" class="twelve_status"
                    name="is_government_cooperate_foreign_counterparts_q12" value="1"
                    {{ $q12_checked == "1" ? "checked" : "" }}>
                <label for="radioTwelve1">Yes</label>
            </div>

            <div class="icheck-primary">
                <input type="radio" id="radioTwelve2" class="twelve_status"
                    name="is_government_cooperate_foreign_counterparts_q12" value="0"
                    {{ $q12_checked == "0" ? "checked" : "" }}>
                <label for="radioTwelve2">No</label>
            </div>

            <div class="icheck-primary input-group mb-3">
                <input type="radio" id="radioTwelve3" class="twelve_status"
                    name="is_government_cooperate_foreign_counterparts_q12" value="2"
                    {{ $q12_checked == "2" ? "checked" : "" }}>
                <label for="radioTwelve3">Others</label>
                <span class="col-md-6 mt--4 q12_others_container {{ $q12_checked == '2' ? '' : 'othersText' }}"
                    style="margin-top:-8px;">
                    <input type="text" id="q12others" placeholder="Others" class="form-control"
                        value="{{ $q12_others_val }}" name="other_government_cooperate_foreign_counterparts_q12">
                </span>
            </div>

            <div id="12_question_view" class="{{ $q12_checked == '1' ? '' : 'visibility' }}">

                <!-- A. Investigations -->
                <table class="table table-bordered text-center q12-section-table" data-section="investigations">
                    <h4>A. new investigations</h4>
                    <thead>
                        <tr>
                            <th>Country/Region/International Law Enforcement Organization</th>
                            <th>Sex Trafficking</th>
                            <th>Labour Trafficking</th>
                            <th>Other/Unspecific Trafficking</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i=0; $i<3; $i++) @php $row=$investigations_data[$i] ?? null;
                            $country=$row['government_cooperate_foreign_counterparts_country_q12'] ?? '' ;
                            $sex=$row['government_cooperate_foreign_counterparts_sex_trafficking_q12'] ?? 0;
                            $labour=$row['government_cooperate_foreign_counterparts_labour_trafficking_q12'] ?? 0;
                            $other=$row['government_cooperate_foreign_counterparts_other_trafficking_q12'] ?? 0;
                            $total=$row['government_cooperate_foreign_counterparts_total_trafficking_q12'] ?? 0; @endphp
                            <tr class="investigations_q12_row">
                            <td><input type="text" name="government_cooperate_foreign_counterparts_country_q12[]"
                                    class="form-control field-country" value="{{ $country }}"></td>
                            <td><input type="number"
                                    name="government_cooperate_foreign_counterparts_sex_trafficking_q12[]"
                                    class="form-control calc-input field-sex" value="{{ $sex }}" min="0"></td>
                            <td><input type="number"
                                    name="government_cooperate_foreign_counterparts_labour_trafficking_q12[]"
                                    class="form-control calc-input field-labour" value="{{ $labour }}" min="0"></td>
                            <td><input type="number"
                                    name="government_cooperate_foreign_counterparts_other_trafficking_q12[]"
                                    class="form-control calc-input field-other" value="{{ $other }}" min="0"></td>
                            <td><input type="text"
                                    name="government_cooperate_foreign_counterparts_total_trafficking_q12[]"
                                    class="form-control total-input field-total" value="{{ $total }}" readonly></td>
                            </tr>
                            @endfor
                    </tbody>
                </table>
                <br>

                <!-- B. Prosecutions -->
                <table class="table table-bordered text-center q12-section-table" data-section="prosecutions">
                    <h4>B. new prosecutions</h4>
                    <thead>
                        <tr>
                            <th>Country/Region/International Law Enforcement Organization</th>
                            <th>Sex Trafficking</th>
                            <th>Labour Trafficking</th>
                            <th>Other/Unspecific Trafficking</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i=0; $i<3; $i++) @php $row=$prosecutions_data[$i] ?? null;
                            $country=$row['government_country_q12b'] ?? '' ;
                            $sex=$row['government_sex_trafficking_q12b'] ?? 0;
                            $labour=$row['government_labour_trafficking_q12b'] ?? 0;
                            $other=$row['government_other_trafficking_q12b'] ?? 0;
                            $total=$row['government_total_trafficking_q12b'] ?? 0; @endphp <tr
                            class="prosecutions_q12_row">
                            <td><input type="text" name="government_country_q12b[]" class="form-control field-country"
                                    value="{{ $country }}"></td>
                            <td><input type="number" name="government_sex_trafficking_q12b[]"
                                    class="form-control calc-input field-sex" value="{{ $sex }}" min="0"></td>
                            <td><input type="number" name="government_labour_trafficking_q12b[]"
                                    class="form-control calc-input field-labour" value="{{ $labour }}" min="0"></td>
                            <td><input type="number" name="government_other_trafficking_q12b[]"
                                    class="form-control calc-input field-other" value="{{ $other }}" min="0"></td>
                            <td><input type="text" name="government_total_trafficking_q12b[]"
                                    class="form-control total-input field-total" value="{{ $total }}" readonly></td>
                            </tr>
                            @endfor
                    </tbody>
                </table>
                <br>

                <!-- C. Repatriations -->
                <table class="table table-bordered text-center q12-section-table" data-section="repatriations">
                    <h4>C. New repatriations</h4>
                    <thead>
                        <tr>
                            <th>Country/Region/International Law Enforcement Organization</th>
                            <th>Sex Trafficking</th>
                            <th>Labour Trafficking</th>
                            <th>Other/Unspecific Trafficking</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i=0; $i<3; $i++) @php $row=$repatriations_data[$i] ?? null;
                            $country=$row['government_country_q12c'] ?? '' ;
                            $sex=$row['government_sex_trafficking_q12c'] ?? 0;
                            $labour=$row['government_labour_trafficking_q12c'] ?? 0;
                            $other=$row['government_other_trafficking_q12c'] ?? 0;
                            $total=$row['government_total_trafficking_q12c'] ?? 0; @endphp <tr
                            class="repatriations_q12_row">
                            <td><input type="text" name="government_country_q12c[]" class="form-control field-country"
                                    value="{{ $country }}"></td>
                            <td><input type="number" name="government_sex_trafficking_q12c[]"
                                    class="form-control calc-input field-sex" value="{{ $sex }}" min="0"></td>
                            <td><input type="number" name="government_labour_trafficking_q12c[]"
                                    class="form-control calc-input field-labour" value="{{ $labour }}" min="0"></td>
                            <td><input type="number" name="government_other_trafficking_q12c[]"
                                    class="form-control calc-input field-other" value="{{ $other }}" min="0"></td>
                            <td><input type="text" name="government_total_trafficking_q12c[]"
                                    class="form-control total-input field-total" value="{{ $total }}" readonly></td>
                            </tr>
                            @endfor
                    </tbody>
                </table>
                <br>

                <!-- D. Extraditions -->
                <table class="table table-bordered text-center q12-section-table" data-section="extraditions">
                    <h4>D. New extraditions</h4>
                    <thead>
                        <tr>
                            <th>Country/Region/International Law Enforcement Organization</th>
                            <th>Sex Trafficking</th>
                            <th>Labour Trafficking</th>
                            <th>Other/Unspecific Trafficking</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i=0; $i<3; $i++) @php $row=$extraditions_data[$i] ?? null;
                            $country=$row['government_country_q12d'] ?? '' ;
                            $sex=$row['government_sex_trafficking_q12d'] ?? 0;
                            $labour=$row['government_labour_trafficking_q12d'] ?? 0;
                            $other=$row['government_other_trafficking_q12d'] ?? 0;
                            $total=$row['government_total_trafficking_q12d'] ?? 0; @endphp <tr
                            class="extraditions_q12_row">
                            <td><input type="text" name="government_country_q12d[]" class="form-control field-country"
                                    value="{{ $country }}"></td>
                            <td><input type="number" name="government_sex_trafficking_q12d[]"
                                    class="form-control calc-input field-sex" value="{{ $sex }}" min="0"></td>
                            <td><input type="number" name="government_labour_trafficking_q12d[]"
                                    class="form-control calc-input field-labour" value="{{ $labour }}" min="0"></td>
                            <td><input type="number" name="government_other_trafficking_q12d[]"
                                    class="form-control calc-input field-other" value="{{ $other }}" min="0"></td>
                            <td><input type="text" name="government_total_trafficking_q12d[]"
                                    class="form-control total-input field-total" value="{{ $total }}" readonly></td>
                            </tr>
                            @endfor
                    </tbody>
                </table>

            </div>
            <br />

            <p class="text-right">
                <button type="button" class="btn btn-success" id="temp-save-question12">Save</button>
            </p>

        </div>
    </div>
</div>
@endif

<script type="text/javascript">
$(document).ready(function() {

    // রেডিও স্ট্যাটাস চেঞ্জ হ্যান্ডলার
    $(document).on('change', '.twelve_status', function() {
        var statusvalue = $("input[name='is_government_cooperate_foreign_counterparts_q12']:checked")
            .val();
        if (statusvalue == '1') {
            $('#12_question_view').removeClass('visibility').show();
            $('.q12_others_container').addClass('othersText').hide();
            $('#q12others').val("");
        } else if (statusvalue == "2") {
            $('#12_question_view').hide();
            $('.q12_others_container').removeClass('othersText').show();
        } else {
            $('#12_question_view').hide();
            $('.q12_others_container').addClass('othersText').hide();
            $('#q12others').val("");
        }
    });

    // অটো টোটাল সামেশন ক্যালকুলেটর
    $(document).on('input change keyup', '.calc-input', function() {
        let row = $(this).closest('tr');
        let sex = parseInt(row.find('.field-sex').val()) || 0;
        let labour = parseInt(row.find('.field-labour').val()) || 0;
        let other = parseInt(row.find('.field-other').val()) || 0;
        row.find('.field-total').val(sex + labour + other);
    });

    // AJAX ড্রাফট/টেম্পোরারি সেভ
    $(document).on('click', '#temp-save-question12', function(e) {
        e.preventDefault();

        let yes_no_value = $("input[name='is_government_cooperate_foreign_counterparts_q12']:checked")
            .val();

        let investigations_arr = [];
        let prosecutions_arr = [];
        let repatriations_arr = [];
        let extraditions_arr = [];

        // A. investigations 
        $('.investigations_q12_row').each(function() {
            let country = $(this).find('.field-country').val();
            let sex = $(this).find('.field-sex').val();
            let labour = $(this).find('.field-labour').val();
            let other = $(this).find('.field-other').val();
            let total = $(this).find('.field-total').val();
            if (country || sex || labour || other) {
                investigations_arr.push({
                    government_cooperate_foreign_counterparts_country_q12: country,
                    government_cooperate_foreign_counterparts_sex_trafficking_q12: sex,
                    government_cooperate_foreign_counterparts_labour_trafficking_q12: labour,
                    government_cooperate_foreign_counterparts_other_trafficking_q12: other,
                    government_cooperate_foreign_counterparts_total_trafficking_q12: total
                });
            }
        });

        // B. prosecutions 
        $('.prosecutions_q12_row').each(function() {
            let country = $(this).find('.field-country').val();
            let sex = $(this).find('.field-sex').val();
            let labour = $(this).find('.field-labour').val();
            let other = $(this).find('.field-other').val();
            let total = $(this).find('.field-total').val();
            if (country || sex || labour || other) {
                prosecutions_arr.push({
                    government_country_q12b: country,
                    government_sex_trafficking_q12b: sex,
                    government_labour_trafficking_q12b: labour,
                    government_other_trafficking_q12b: other,
                    government_total_trafficking_q12b: total
                });
            }
        });

        // C. repatriations 
        $('.repatriations_q12_row').each(function() {
            let country = $(this).find('.field-country').val();
            let sex = $(this).find('.field-sex').val();
            let labour = $(this).find('.field-labour').val();
            let other = $(this).find('.field-other').val();
            let total = $(this).find('.field-total').val();
            if (country || sex || labour || other) {
                repatriations_arr.push({
                    government_country_q12c: country,
                    government_sex_trafficking_q12c: sex,
                    government_labour_trafficking_q12c: labour,
                    government_other_trafficking_q12c: other,
                    government_total_trafficking_q12c: total
                });
            }
        });

        // D. extraditions 
        $('.extraditions_q12_row').each(function() {
            let country = $(this).find('.field-country').val();
            let sex = $(this).find('.field-sex').val();
            let labour = $(this).find('.field-labour').val();
            let other = $(this).find('.field-other').val();
            let total = $(this).find('.field-total').val();
            if (country || sex || labour || other) {
                extraditions_arr.push({
                    government_country_q12d: country,
                    government_sex_trafficking_q12d: sex,
                    government_labour_trafficking_q12d: labour,
                    government_other_trafficking_q12d: other,
                    government_total_trafficking_q12d: total
                });
            }
        });

        let final_payload = {
            q12_checked_value: yes_no_value,
            others: $("#q12others").val(),
            investigations: investigations_arr,
            prosecutions: prosecutions_arr,
            repatriations: repatriations_arr,
            extraditions: extraditions_arr
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                "_token": "{{ csrf_token() }}",
                "question_no": 12, // কন্ট্রোলারের জন্য ১২ করে দেওয়া হলো
                "question12": final_payload // পেলোড অবজেক্ট কী ১২ করা হলো
            },
            success: function(response) {
                if (response.success || response) {
                    $('.question12 .card-header h6').css('color', 'blue');
                    alert("Question 12 Saved Temporarily ");
                }
            },
            error: function(err) {
                alert("Error saving data!");
                console.log(err);
            }
        });
    });

});
</script>