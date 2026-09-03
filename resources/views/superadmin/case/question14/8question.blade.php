@if (($questiontitles[7]->status ?? null) == 1)
    @php
        // সেশন থেকে ৮ নম্বর প্রশ্নের ডাটা অ্যারে হিসেবে তুলে নেওয়া হচ্ছে
        $question_8_data = session()->get('question8');

        $q8_checked = $question_8_data['q8_checked_value'] ?? "1"; // ডিফল্ট 'Yes'
        $q8_table_data = $question_8_data['q8_data'] ?? null;
        $q8_others_val = $question_8_data['others'] ?? '';
    @endphp

    <style>
        .othersText {
            display: none;
        }
        .visibility {
            display: none;
        }
    </style>

    <div class="card question8">
        <div class="card-header" role="tab" id="heading-8">
            <!-- ডাটা সেশনে থাকলে নীল (blue), না থাকলে সবুজ (green) কালার দেখাবে -->
            <h6 class="mb-0 card-title" style="color: {{ !empty($question_8_data) ? 'blue' : 'green' }};">
                <a data-toggle="collapse" href="#Question-8" aria-expanded="false" aria-controls="collapse-8">
                    8. {{ $questiontitles[7]->title }}
                </a>
            </h6>
        </div>

        <div id="Question-8" class="collapse" role="tabpane8" aria-labelledby="heading-8" data-parent="#accordion-2">
            <div class="card-body">
                
                <!-- YES -->
                <div class="icheck-primary">
                    <input type="radio" id="q8radioPrimary1" class="eight_status" name="is_involved_directly_trafficking_8q" value="1"
                        {{ $q8_checked == "1" ? "checked" : "" }}>
                    <label for="q8radioPrimary1">Yes</label>
                </div>
                
                <!-- NO -->
                <div class="icheck-primary">
                    <input type="radio" id="q8radioPrimary2" class="eight_status" name="is_involved_directly_trafficking_8q" value="0"
                        {{ $q8_checked == "0" ? "checked" : "" }}>
                    <label for="q8radioPrimary2">No</label>
                </div>

                <!-- OTHERS -->
                <div class="icheck-primary input-group mb-3">
                    <input type="radio" id="q8radioPrimary3" class="eight_status" name="is_involved_directly_trafficking_8q" value="2"
                        {{ $q8_checked == "2" ? "checked" : "" }}>
                    <label for="q8radioPrimary3">Others</label>
                    
                    <span class="col-md-6 mt--4 q8_others_container {{ $q8_checked == '2' ? '' : 'othersText' }}" style="margin-top:-8px;">
                        <input type="text" id="q8others" placeholder="Others" class="form-control"
                            value="{{ $q8_others_val }}" name="other_involved_directly_trafficking_8q">
                    </span>
                </div>

                <!-- TABLE SECTION -->
                <div id="8_question_view" class="{{ ($q8_checked == '1') ? '' : 'visibility' }}">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th rowspan="2" style="text-align: center; vertical-align: middle;">Ministry/Department Municipality body</th>
                                <th colspan="4">Measures Taken</th>
                            </tr>
                            <tr>
                                <th>Investigation (number)</th>
                                <th>Prosecution (number)</th>
                                <th>Conviction or Sentencing (number)</th>
                                <th>Administrative Measures (number)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= 4; $i++)
                                <tr>
                                    <td>
                                        <input type="text" name="official_title_q8[]" id="q8Title{{ $i }}" class="form-control q8Input"
                                            value="{{ $q8_table_data['q8Title' . $i] ?? '' }}">
                                    </td>
                                    <td>
                                        <input type="number" name="official_investigation_q8[]" id="q8Men{{ $i }}" min="0" class="form-control question8RowMen q8Input"
                                            value="{{ $q8_table_data['q8Men' . $i] ?? 0 }}">
                                    </td>
                                    <td>
                                        <input type="number" name="official_prosecution_q8[]" id="q8Women{{ $i }}" min="0" class="form-control question8RowWomen q8Input"
                                            value="{{ $q8_table_data['q8Women' . $i] ?? 0 }}">
                                    </td>
                                    <td>
                                        <input type="number" name="official_conviction_q8[]" id="q8Boy{{ $i }}" min="0" class="form-control question8RowBoys q8Input"
                                            value="{{ $q8_table_data['q8Boy' . $i] ?? 0 }}">
                                    </td>
                                    <td>
                                        <input type="number" name="official_administrative_q8[]" id="q8Girl{{ $i }}" min="0" class="form-control question8RowGirls q8Input"
                                            value="{{ $q8_table_data['q8Girl' . $i] ?? 0 }}">
                                    </td>
                                </tr>
                            @endfor

                            <tr>
                                <th>Total</th>
                                <td><input type="number" id="q8MenTotal" class="form-control q8gTotal q8Input" readonly></td>
                                <td><input type="number" id="q8WomenTotal" class="form-control q8gTotal q8Input" readonly></td>
                                <td><input type="number" id="q8BoysTotal" class="form-control q8gTotal q8Input" readonly></td>
                                <td><input type="number" id="q8GirlsTotal" class="form-control q8gTotal q8Input" readonly></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p class="text-right">
                    <button type="button" class="btn btn-success" id="temp-save-question8">Save</button>
                </p>

            </div>
        </div>
    </div>
@endif

<script>
    // ⬅️ টোটাল ক্যালকুলেশন ফাংশন
    function calculateQ8Totals() {
        let men = 0, women = 0, boys = 0, girls = 0;

        $(".question8RowMen").each(function() { men += parseInt($(this).val()) || 0; });
        $(".question8RowWomen").each(function() { women += parseInt($(this).val()) || 0; });
        $(".question8RowBoys").each(function() { boys += parseInt($(this).val()) || 0; });
        $(".question8RowGirls").each(function() { girls += parseInt($(this).val()) || 0; });

        $("#q8MenTotal").val(men);
        $("#q8WomenTotal").val(women);
        $("#q8BoysTotal").val(boys);
        $("#q8GirlsTotal").val(girls);
    }

    $(document).on("input", ".question8RowMen, .question8RowWomen, .question8RowBoys, .question8RowGirls", calculateQ8Totals);
    
    $(document).ready(function() {
        calculateQ8Totals(); // পেজ রিলোড হলে জেনারেট করা ডাটার টোটাল দেখানোর জন্য
    });
</script>

<script>
    // ⬅️ রেডিও বাটন হাইড/শো লজিক
    $(document).ready(function() {
        $(".eight_status").on("change", function() {
            var statusvalue = $("input.eight_status:checked").val();
            
            if (statusvalue == '1') {
                $('#8_question_view').removeClass('visibility').show();
                $('.q8_others_container').addClass('othersText').hide();
                $('#q8others').val("");
            } else if (statusvalue == "2") {
                $('#8_question_view').hide();
                $('.q8_others_container').removeClass('othersText').show();
            } else {
                $('#8_question_view').hide();
                $('.q8_others_container').addClass('othersText').hide();
                $('#q8others').val("");
            }
        });
    });
</script>

<script>
    // ⬅️ AJAX এর মাধ্যমে টেম্পোরারি ডাটা সেভ
    $(document).on("click", '#temp-save-question8', function() {
        calculateQ8Totals();

        let yes_no_value = $("input.eight_status:checked").val();
        var q8_data = {};

        $('.q8Input').each(function() {
            if (this.id) {
                q8_data[this.id] = $(this).val();
            }
        });

        let saveData = {
            q8_data: q8_data,
            q8_checked_value: yes_no_value,
            others: $("#q8others").val()
        };

        $.ajax({
            type: "POST",
            url: "/superadmin/case/temp-save-question",
            data: {
                _token: "{{ csrf_token() }}",
                question_no: 8,
                question8: saveData // ডাইনামিক সেশন কি 'question8'
            },
            success: function(response) {
                if(response.success) {
                    $('.question8 .card-header h6').css('color', 'blue');
                    alert("Question 8 Temp Saved ✅");
                } else {
                    alert("Not Saved");
                }
            },
            error: function(err) {
                alert("Something went wrong!");
                console.log(err);
            }
        });
    });
</script>