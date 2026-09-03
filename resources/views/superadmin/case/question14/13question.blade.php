@if (($questiontitles[12]->status ?? null) == 1)
@php
$question_13_data = session()->get('question13') ?? ($question_13_data ?? null);

$q13_checked = $question_13_data['q13_checked_value'] ?? "1";
$q13_others_val = $question_13_data['others'] ?? '';

// টেম্প সেভ সেশন অথবা ডেটাবেজ রিলেশন - দুই ডেটা সোর্স থেকেই যেন প্রপারলি ডেটা পায় তার ব্যবস্থা
$investigations_data = $question_13_data['investigations'] ?? ($question_13_data['thirteena'] ?? ($thirteena ?? null));
$prosecutions_data   = $question_13_data['prosecutions'] ?? ($question_13_data['thirteenb'] ?? ($thirteenb ?? null));
$repatriations_data  = $question_13_data['repatriations'] ?? ($question_13_data['thirteenc'] ?? ($thirteenc ?? null));
$extraditions_data   = $question_13_data['extraditions'] ?? ($question_13_data['thirteend'] ?? ($thirteend ?? null));
@endphp

<style>
  .othersText { display: none; }
  .visibility { display: none; }
</style>

<div class="card question13">
  <div class="card-header" role="tab" id="heading-13">
    <h6 class="mb-0 card-title" style="color: {{ !empty($question_13_data) ? 'blue' : 'green' }};">
      <a data-toggle="collapse" href="#Question-13" aria-expanded="false" aria-controls="collapse-13">
        13. {{ $questiontitles[12]->title }}
      </a>
    </h6>
  </div>

  <div id="Question-13" class="collapse" role="tabpanel" aria-labelledby="heading-13" data-parent="#accordion-2">
    <div class="card-body">

      <div class="icheck-primary">
        <input type="radio" id="radioThirteen1" class="thirteen_status" name="is_government_cooperate_foreign_counterparts_q13" value="1" {{ $q13_checked == "1" ? "checked" : "" }}>
        <label for="radioThirteen1">Yes</label>
      </div>

      <div class="icheck-primary">
        <input type="radio" id="radioThirteen2" class="thirteen_status" name="is_government_cooperate_foreign_counterparts_q13" value="0" {{ $q13_checked == "0" ? "checked" : "" }}>
        <label for="radioThirteen2">No</label>
      </div>

      <div class="icheck-primary input-group mb-3">
        <input type="radio" id="radioThirteen3" class="thirteen_status" name="is_government_cooperate_foreign_counterparts_q13" value="2" {{ $q13_checked == "2" ? "checked" : "" }}>
        <label for="radioThirteen3">Others</label>
        <span class="col-md-6 mt--4 q13_others_container {{ $q13_checked == '2' ? '' : 'othersText' }}" style="margin-top:-8px;">
          <input type="text" id="q13others" placeholder="Others Specific" class="form-control" value="{{ $q13_others_val }}" name="other_government_cooperate_foreign_counterparts_q13">
        </span>
      </div>

      <div id="13_question_view" class="{{ $q13_checked == '1' ? '' : 'visibility' }}">

        <!-- A. Investigations -->
        <table class="table table-bordered text-center q13-section-table" data-section="investigations">
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
            @for($i=0; $i<3; $i++)
              @php 
                $row = $investigations_data[$i] ?? null; 
                // ডেটাবেজ অথবা সেশন অবজেক্ট ফরম্যাট দুইটাই সাপোর্ট করবে
                $country = $row['government_country_q13a'] ?? ($row['government_cooperate_foreign_counterparts_country_q13a'] ?? '');
                $sex     = $row['government_sex_q13a'] ?? ($row['government_cooperate_foreign_counterparts_sex_trafficking_q13a'] ?? 0);
                $labour  = $row['government_labour_q13a'] ?? ($row['government_cooperate_foreign_counterparts_labour_trafficking_q1'] ?? 0);
                $other   = $row['government_other_q13a'] ?? ($row['government_cooperate_foreign_counterparts_other_trafficking_q13'] ?? 0);
                $total   = $row['government_total_q13a'] ?? ($row['government_cooperate_foreign_counterparts_total_trafficking_q13'] ?? 0);
              @endphp
              <tr class="investigations_q13_row">
                <td><input type="text" name="government_country_q13a[]" class="form-control field-country" value="{{ $country }}"></td>
                <td><input type="number" name="government_sex_q13a[]" class="form-control calc-input field-sex" value="{{ $sex }}" min="0"></td>
                <td><input type="number" name="government_labour_q13a[]" class="form-control calc-input field-labour" value="{{ $labour }}" min="0"></td>
                <td><input type="number" name="government_other_q13a[]" class="form-control calc-input field-other" value="{{ $other }}" min="0"></td>
                <td><input type="text" name="government_total_q13a[]" class="form-control total-input field-total" value="{{ $total }}" readonly></td>
              </tr>
            @endfor
          </tbody>
        </table>
        <br>

        <!-- B. Prosecutions -->
        <table class="table table-bordered text-center q13-section-table" data-section="prosecutions">
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
            @for($i=0; $i<3; $i++)
              @php 
                $row = $prosecutions_data[$i] ?? null; 
                $country = $row['government_country_q13b'] ?? ($row['government_cooperate_foreign_counterparts_country_q13b'] ?? '');
                $sex     = $row['government_sex_q13b'] ?? ($row['government_cooperate_foreign_counterparts_sex_trafficking_q13b'] ?? 0);
                $labour  = $row['government_labour_q13b'] ?? ($row['government_cooperate_foreign_counterparts_labour_trafficking_q1'] ?? 0);
                $other   = $row['government_other_q13b'] ?? ($row['government_cooperate_foreign_counterparts_other_trafficking_q13'] ?? 0);
                $total   = $row['government_total_q13b'] ?? ($row['government_cooperate_foreign_counterparts_total_trafficking_q13'] ?? 0);
              @endphp
              <tr class="prosecutions_q13_row">
                <td><input type="text" name="government_country_q13b[]" class="form-control field-country" value="{{ $country }}"></td>
                <td><input type="number" name="government_sex_q13b[]" class="form-control calc-input field-sex" value="{{ $sex }}" min="0"></td>
                <td><input type="number" name="government_labour_q13b[]" class="form-control calc-input field-labour" value="{{ $labour }}" min="0"></td>
                <td><input type="number" name="government_other_q13b[]" class="form-control calc-input field-other" value="{{ $other }}" min="0"></td>
                <td><input type="text" name="government_total_q13b[]" class="form-control total-input field-total" value="{{ $total }}" readonly></td>
              </tr>
            @endfor
          </tbody>
        </table>
        <br>

        <!-- C. Repatriations -->
        <table class="table table-bordered text-center q13-section-table" data-section="repatriations">
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
            @for($i=0; $i<3; $i++)
              @php 
                $row = $repatriations_data[$i] ?? null; 
                $country = $row['government_country_q13c'] ?? ($row['government_cooperate_foreign_counterparts_country_q13c'] ?? '');
                $sex     = $row['government_sex_q13c'] ?? ($row['government_cooperate_foreign_counterparts_sex_trafficking_q13c'] ?? 0);
                $labour  = $row['government_labour_q13c'] ?? ($row['government_cooperate_foreign_counterparts_labour_trafficking_q1'] ?? 0);
                $other   = $row['government_other_q13c'] ?? ($row['government_cooperate_foreign_counterparts_other_trafficking_q13'] ?? 0);
                $total   = $row['government_total_q13c'] ?? ($row['government_cooperate_foreign_counterparts_total_trafficking_q13'] ?? 0);
              @endphp
              <tr class="repatriations_q13_row">
                <td><input type="text" name="government_country_q13c[]" class="form-control field-country" value="{{ $country }}"></td>
                <td><input type="number" name="government_sex_q13c[]" class="form-control calc-input field-sex" value="{{ $sex }}" min="0"></td>
                <td><input type="number" name="government_labour_q13c[]" class="form-control calc-input field-labour" value="{{ $labour }}" min="0"></td>
                <td><input type="number" name="government_other_q13c[]" class="form-control calc-input field-other" value="{{ $other }}" min="0"></td>
                <td><input type="text" name="government_total_q13c[]" class="form-control total-input field-total" value="{{ $total }}" readonly></td>
              </tr>
            @endfor
          </tbody>
        </table>
        <br>

        <!-- D. Extraditions -->
        <table class="table table-bordered text-center q13-section-table" data-section="extraditions">
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
            @for($i=0; $i<3; $i++)
              @php 
                $row = $extraditions_data[$i] ?? null; 
                $country = $row['government_country_q13d'] ?? ($row['government_cooperate_foreign_counterparts_country_q13d'] ?? '');
                $sex     = $row['government_sex_q13d'] ?? ($row['government_cooperate_foreign_counterparts_sex_trafficking_q13d'] ?? 0);
                $labour  = $row['government_labour_q13d'] ?? ($row['government_cooperate_foreign_counterparts_labour_trafficking_q1'] ?? 0);
                $other   = $row['government_other_q13d'] ?? ($row['government_cooperate_foreign_counterparts_other_trafficking_q13'] ?? 0);
                $total   = $row['government_total_q13d'] ?? ($row['government_cooperate_foreign_counterparts_total_trafficking_q13'] ?? 0);
              @endphp
              <tr class="extraditions_q13_row">
                <td><input type="text" name="government_country_q13d[]" class="form-control field-country" value="{{ $country }}"></td>
                <td><input type="number" name="government_sex_q13d[]" class="form-control calc-input field-sex" value="{{ $sex }}" min="0"></td>
                <td><input type="number" name="government_labour_q13d[]" class="form-control calc-input field-labour" value="{{ $labour }}" min="0"></td>
                <td><input type="number" name="government_other_q13d[]" class="form-control calc-input field-other" value="{{ $other }}" min="0"></td>
                <td><input type="text" name="government_total_q13d[]" class="form-control total-input field-total" value="{{ $total }}" readonly></td>
              </tr>
            @endfor
          </tbody>
        </table>

      </div>
      <br />

      <p class="text-right">
        <button type="button" class="btn btn-success" id="temp-save-question13">Save</button>
      </p>

    </div>
  </div>
</div>
@endif

<script type="text/javascript">
  $(document).ready(function() {

    // রেডিও স্ট্যাটাস চেঞ্জ হ্যান্ডলার
    $(document).on('change', '.thirteen_status', function() {
      var statusvalue = $("input[name='is_government_cooperate_foreign_counterparts_q13']:checked").val();
      if (statusvalue == '1') {
        $('#13_question_view').removeClass('visibility').show();
        $('.q13_others_container').addClass('othersText').hide();
        $('#q13others').val("");
      } else if (statusvalue == "2") {
        $('#13_question_view').hide();
        $('.q13_others_container').removeClass('othersText').show();
      } else {
        $('#13_question_view').hide();
        $('.q13_others_container').addClass('othersText').hide();
        $('#q13others').val("");
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
    $(document).on('click', '#temp-save-question13', function(e) {
      e.preventDefault();

      let yes_no_value = $("input[name='is_government_cooperate_foreign_counterparts_q13']:checked").val();

      let investigations_arr = [];
      let prosecutions_arr = [];
      let repatriations_arr = [];
      let extraditions_arr = [];

      // A. investigations
      $('.investigations_q13_row').each(function() {
        let country = $(this).find('.field-country').val();
        let sex = $(this).find('.field-sex').val();
        let labour = $(this).find('.field-labour').val();
        let other = $(this).find('.field-other').val();
        let total = $(this).find('.field-total').val();
        if (country || sex || labour || other) {
          investigations_arr.push({
            government_country_q13a: country,
            government_sex_q13a: sex,
            government_labour_q13a: labour,
            government_other_q13a: other,
            government_total_q13a: total
          });
        }
      });

      // B. prosecutions
      $('.prosecutions_q13_row').each(function() {
        let country = $(this).find('.field-country').val();
        let sex = $(this).find('.field-sex').val();
        let labour = $(this).find('.field-labour').val();
        let other = $(this).find('.field-other').val();
        let total = $(this).find('.field-total').val();
        if (country || sex || labour || other) {
          prosecutions_arr.push({
            government_country_q13b: country,
            government_sex_q13b: sex,
            government_labour_q13b: labour,
            government_other_q13b: other,
            government_total_q13b: total
          });
        }
      });

      // C. repatriations
      $('.repatriations_q13_row').each(function() {
        let country = $(this).find('.field-country').val();
        let sex = $(this).find('.field-sex').val();
        let labour = $(this).find('.field-labour').val();
        let other = $(this).find('.field-other').val();
        let total = $(this).find('.field-total').val();
        if (country || sex || labour || other) {
          repatriations_arr.push({
            government_country_q13c: country,
            government_sex_q13c: sex,
            government_labour_q13c: labour,
            government_other_q13c: other,
            government_total_q13c: total
          });
        }
      });

      // D. extraditions
      $('.extraditions_q13_row').each(function() {
        let country = $(this).find('.field-country').val();
        let sex = $(this).find('.field-sex').val();
        let labour = $(this).find('.field-labour').val();
        let other = $(this).find('.field-other').val();
        let total = $(this).find('.field-total').val();
        if (country || sex || labour || other) {
          extraditions_arr.push({
            government_country_q13d: country,
            government_sex_q13d: sex,
            government_labour_q13d: labour,
            government_other_q13d: other,
            government_total_q13d: total
          });
        }
      });

      let final_payload = {
        q13_checked_value: yes_no_value,
        others: $("#q13others").val(),
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
          "question_no": 13,
          "question13": final_payload
        },
        success: function(response) {
          if (response.success || response) {
            $('.question13 .card-header h6').css('color', 'blue');
            alert("Question 13 Saved Temporarily");
          }
        },
        error: function(err) {
          alert("Error saving data");
          console.log(err);
        }
      });
    });

  });
</script>