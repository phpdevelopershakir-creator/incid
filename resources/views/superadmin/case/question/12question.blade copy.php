@if (($questiontitles[11]->status ?? null) == 1)
@php
// সেশন থেকে ডাটা তুলে নেওয়া হচ্ছে (৪ নম্বরের মতো হুবহু একই নিয়মে)
$question_12_data = session()->get('question12');

$q12_checked = $question_12_data['q12_checked_value'] ?? "1";
$investigations_data = $question_12_data['investigations'] ?? null;
$prosecutions_data = $question_12_data['prosecutions'] ?? null;
$repatriations_data = $question_12_data['repatriations'] ?? null;
$extraditions_data = $question_12_data['extraditions'] ?? null;
$q12_others_val = $question_12_data['others'] ?? '';
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
        12. {{ $questiontitles[11]->title }}
      </a>
    </h6>
  </div>

  <div id="Question-12" class="collapse" role="tabpanel" aria-labelledby="heading-12" data-parent="#accordion-2">
    <div class="card-body">
      
      <!-- Radio Button Section -->
      <div class="icheck-primary">
        <input type="radio" id="radioTwelve1" class="twelve_status" name="is_government_cooperate_foreign_counterparts_q12" value="1" {{ $q12_checked == "1" ? "checked" : "" }}>
        <label for="radioTwelve1">Yes</label>
      </div>
      
      <div class="icheck-primary">
        <input type="radio" id="radioTwelve2" class="twelve_status" name="is_government_cooperate_foreign_counterparts_q12" value="0" {{ $q12_checked == "0" ? "checked" : "" }}>
        <label for="radioTwelve2">No</label>
      </div>

      <div class="icheck-primary input-group mb-3">
        <input type="radio" id="radioTwelve3" class="twelve_status" name="is_government_cooperate_foreign_counterparts_q12" value="2" {{ $q12_checked == "2" ? "checked" : "" }}>
        <label for="radioTwelve3">Others</label>
        <span class="col-md-6 mt--4 q12_others_container {{ $q12_checked == '2' ? '' : 'othersText' }}" style="margin-top:-8px;">
          <input type="text" id="q12others" placeholder="Others Specific" class="form-control" value="{{ $q12_others_val }}" name="other_government_cooperate_foreign_counterparts_q12">
        </span>
      </div>

      <!-- Main Tables Section -->
      <div id="12_question_view" class="{{ $q12_checked == '1' ? '' : 'visibility' }}">
        
        <!-- A. new investigations -->
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
            @for($i=0; $i<3; $i++)
            <tr class="investigations_row">
              <td><input type="text" class="form-control field-country" value="{{ $investigations_data[$i]['country'] ?? '' }}"></td>
              <td><input type="number" class="form-control men-input field-sex" value="{{ $investigations_data[$i]['sex'] ?? 0 }}" min="0"></td>
              <td><input type="number" class="form-control women-input field-labour" value="{{ $investigations_data[$i]['labour'] ?? 0 }}" min="0"></td>
              <td><input type="number" class="form-control tg-input field-other" value="{{ $investigations_data[$i]['other'] ?? 0 }}" min="0"></td>
              <td><input type="text" class="form-control total-input field-total" value="{{ $investigations_data[$i]['total'] ?? 0 }}" readonly></td>
            </tr>
            @endfor
          </tbody>
        </table>
        <br>

        <!-- B. new prosecutions -->
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
            @for($i=0; $i<3; $i++)
            <tr class="prosecutions_row">
              <td><input type="text" class="form-control field-country" value="{{ $prosecutions_data[$i]['country'] ?? '' }}"></td>
              <td><input type="number" class="form-control men-input field-sex" value="{{ $prosecutions_data[$i]['sex'] ?? 0 }}" min="0"></td>
              <td><input type="number" class="form-control women-input field-labour" value="{{ $prosecutions_data[$i]['labour'] ?? 0 }}" min="0"></td>
              <td><input type="number" class="form-control tg-input field-other" value="{{ $prosecutions_data[$i]['other'] ?? 0 }}" min="0"></td>
              <td><input type="text" class="form-control total-input field-total" value="{{ $prosecutions_data[$i]['total'] ?? 0 }}" readonly></td>
            </tr>
            @endfor
          </tbody>
        </table>
        <br>

        <!-- C. New repatriations -->
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
            @for($i=0; $i<3; $i++)
            <tr class="repatriations_row">
              <td><input type="text" class="form-control field-country" value="{{ $repatriations_data[$i]['country'] ?? '' }}"></td>
              <td><input type="number" class="form-control men-input field-sex" value="{{ $repatriations_data[$i]['sex'] ?? 0 }}" min="0"></td>
              <td><input type="number" class="form-control women-input field-labour" value="{{ $repatriations_data[$i]['labour'] ?? 0 }}" min="0"></td>
              <td><input type="number" class="form-control tg-input field-other" value="{{ $repatriations_data[$i]['other'] ?? 0 }}" min="0"></td>
              <td><input type="text" class="form-control total-input field-total" value="{{ $repatriations_data[$i]['total'] ?? 0 }}" readonly></td>
            </tr>
            @endfor
          </tbody>
        </table>
        <br>

        <!-- D. New extraditions -->
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
            @for($i=0; $i<3; $i++)
            <tr class="extraditions_row">
              <td><input type="text" class="form-control field-country" value="{{ $extraditions_data[$i]['country'] ?? '' }}"></td>
              <td><input type="number" class="form-control men-input field-sex" value="{{ $extraditions_data[$i]['sex'] ?? 0 }}" min="0"></td>
              <td><input type="number" class="form-control women-input field-labour" value="{{ $extraditions_data[$i]['labour'] ?? 0 }}" min="0"></td>
              <td><input type="number" class="form-control tg-input field-other" value="{{ $extraditions_data[$i]['other'] ?? 0 }}" min="0"></td>
              <td><input type="text" class="form-control total-input field-total" value="{{ $extraditions_data[$i]['total'] ?? 0 }}" readonly></td>
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

    // রেডিও বাটন কন্ডিশনাল শো/হাইড লজিক (৪ নম্বরের মতো হুবহু)
    $(document).on('change', '.twelve_status', function() {
      var statusvalue = $("input[name='is_government_cooperate_foreign_counterparts_q12']:checked").val();
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

    // অটো টোটাল রিয়েল-টাইম ক্যালকুলেশন
    $(document).on('input change', '.men-input, .women-input, .tg-input', function() {
      let row = $(this).closest('tr');
      let men = parseInt(row.find('.men-input').val()) || 0;
      let women = parseInt(row.find('.women-input').val()) || 0;
      let tg = parseInt(row.find('.tg-input').val()) || 0;
      row.find('.total-input').val(men + women + tg);
    });

    // 💾 AJAX ড্রাফট সেভ সাবমিশন লজিক (৪ নম্বরের মতো নিখুঁত করা হয়েছে)
    $(document).on('click', '#temp-save-question12', function(e) {
      e.preventDefault();

      let yes_no_value = $("input[name='is_government_cooperate_foreign_counterparts_q12']:checked").val();
      
      let investigations_arr = [];
      let prosecutions_arr = [];
      let repatriations_arr = [];
      let extraditions_arr = [];

      // A. Investigations ডাটা লুপ
      $('.investigations_row').each(function() {
        let country = $(this).find('.field-country').val();
        let sex = $(this).find('.field-sex').val();
        let labour = $(this).find('.field-labour').val();
        let other = $(this).find('.field-other').val();
        let total = $(this).find('.field-total').val();
        if(country || sex || labour || other) {
          investigations_arr.push({ country, sex, labour, other, total });
        }
      });

      // B. Prosecutions ডাটা লুপ
      $('.prosecutions_row').each(function() {
        let country = $(this).find('.field-country').val();
        let sex = $(this).find('.field-sex').val();
        let labour = $(this).find('.field-labour').val();
        let other = $(this).find('.field-other').val();
        let total = $(this).find('.field-total').val();
        if(country || sex || labour || other) {
          prosecutions_arr.push({ country, sex, labour, other, total });
        }
      });

      // C. Repatriations ডাটা লুপ
      $('.repatriations_row').each(function() {
        let country = $(this).find('.field-country').val();
        let sex = $(this).find('.field-sex').val();
        let labour = $(this).find('.field-labour').val();
        let other = $(this).find('.field-other').val();
        let total = $(this).find('.field-total').val();
        if(country || sex || labour || other) {
          repatriations_arr.push({ country, sex, labour, other, total });
        }
      });

      // D. Extraditions ডাটা লুপ
      $('.extraditions_row').each(function() {
        let country = $(this).find('.field-country').val();
        let sex = $(this).find('.field-sex').val();
        let labour = $(this).find('.field-labour').val();
        let other = $(this).find('.field-other').val();
        let total = $(this).find('.field-total').val();
        if(country || sex || labour || other) {
          extraditions_arr.push({ country, sex, labour, other, total });
        }
      });

      // ফাইনাল পেলোড
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
          "question_no": 12,        // সেশনে 'question12' কি তৈরি করবে
          "question12": final_payload // পেলোড অবজেক্ট সরাসরি পাঠানো হলো
        },
        success: function(response) {
          if(response.success) {
            $('.question12 .card-title').css('color', 'blue');
            alert("Question 12 Draft Saved Temporary ✅");
          }
        },
        error: function(err) {
          alert("Error saving data ❌");
          console.log(err);
        }
      });
    });

  });
</script>