@if (($questiontitles[5]->status ?? null) == 1)
@php
// সেশন থেকে সরাসরি ৬ নম্বর প্রশ্নের অ্যারে তুলে নেওয়া হচ্ছে
$question_6_data = session()->get('question6');

// ডাটাবেজ/সেশন স্ট্রাকচার অনুযায়ী ভ্যারিয়েবল ম্যাপ করা
$q6_checked = $question_6_data['q6radioSix3_checked_value'] ?? "1"; // ডিফল্ট 'Yes' (1)
$q6_table_rows = $question_6_data['q6radioSix3_data'] ?? null;
$q6_others_val = $question_6_data['others'] ?? '';
@endphp

<style>
  .othersText {
    display: none;
  }

  .visibility {
    display: none;
  }
</style>

<div class="card question6">
  <div class="card-header" role="tab" id="heading-4">
    <h6 class="card-title" style="color: {{ !empty($question_6_data) ? 'blue' : 'green' }};">
      <a data-toggle="collapse" href="#Question-6" aria-expanded="false" aria-controls="collapse-4">
        6. {{ $questiontitles[5]->title }}
      </a>
    </h6>
  </div>

  <div id="Question-6" class="collapse" role="tabpane6" aria-labelledby="heading-4" data-parent="#accordion-2">
    <div class="card-body">

      <div class="icheck-primary">
        <input type="radio" class="six_status" id="q6_yes" name="is_unit_court_q6" value="1"
          {{ $q6_checked == "1" ? 'checked' : '' }}>
        <label for="q6_yes">Yes</label>
      </div>

      <div class="icheck-primary">
        <input type="radio" class="six_status" id="q6_no" name="is_unit_court_q6" value="0"
          {{ $q6_checked == "0" ? 'checked' : '' }}>
        <label for="q6_no">No</label>
      </div>

      <div class="icheck-primary input-group mb-3">
        <input type="radio" class="six_status" id="q6_others" name="is_unit_court_q6" value="2"
          {{ $q6_checked == "2" ? 'checked' : '' }}>
        <label for="q6_others">Others</label>

        <span class="col-md-6 mt--4 others_input_container {{ $q6_checked == "2" ? '' : 'othersText' }}">
          <input type="text" id="q6radioThree3others" class="form-control" placeholder="Others"
            name="others_forced_labor_q6" value="{{ $q6_others_val }}">
        </span>
      </div>

      <div id="six_question_view" class="card-body row {{ $q6_checked == '1' ? '' : 'visibility' }}">
        <table id="addRowq6radioThree3" class="table table-bordered text-center">
          <thead>
            <tr>
              <th rowspan="2">Ministry/Department</th>
              <th colspan="3">Number of Official Accused</th>
              <th>Response</th>
              <th>Action</th>
            </tr>
            <tr>
              <th>Men</th>
              <th>Women</th>
              <th>Total</th>
              <th>Response</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            @php $i = 1; @endphp

            @if(!empty($q6_table_rows))
            @foreach($q6_table_rows as $q6)
            <tr class="q6radioSix6QRow" id="q6row{{ $i }}">
              <td><input type="text" name="labor_title_q6[]" class="form-control labor_title_q6" value="{{ $q6['title'] ?? '' }}"></td>
              <td>
                <input type="number" name="labor_men_q6[]" id="labor_men_q6_{{ $i }}" class="form-control labor_men_q6" value="{{ $q6['men'] ?? 0 }}" min="0">
              </td>
              <td>
                <input type="number" name="labor_women_q6[]" id="labor_women_q6_{{ $i }}" class="form-control labor_women_q6" value="{{ $q6['women'] ?? 0 }}" min="0">
              </td>
              <td>
                <input type="number" name="labor_total_q6[]" readonly id="labor_total_q6_{{ $i }}" class="form-control labor_total_q6" value="{{ $q6['total'] ?? 0 }}">
              </td>
              <td><input type="text" name="labor_response_q6[]" class="form-control labor_response_q6" value="{{ $q6['response'] ?? '' }}"></td>
              <td>
                @if($i == 1)
                <button type="button" class="btn btn-sm btn-primary" id="addRowDatasq6radioThree3">+</button>
                @else
                <button type="button" id="{{ $i }}" class="btn btn-danger q6radioThree3btn_remove">-</button>
                @endif
              </td>
            </tr>
            @php $i++; @endphp
            @endforeach
            @else
            <tr class="q6radioSix6QRow" id="q6row1">
              <td><input type="text" name="labor_title_q6[]" class="form-control labor_title_q6"></td>
              <td>
                <input type="number" name="labor_men_q6[]" id="labor_men_q6_1" value="0" class="form-control labor_men_q6" min="0">
              </td>
              <td>
                <input type="number" name="labor_women_q6[]" id="labor_women_q6_1" value="0" class="form-control labor_women_q6" min="0">
              </td>
              <td><input type="number" name="labor_total_q6[]" id="labor_total_q6_1" value="0" class="form-control labor_total_q6" readonly></td>
              <td><input type="text" name="labor_response_q6[]" class="form-control labor_response_q6"></td>
              <td>
                <button type="button" class="btn btn-sm btn-primary" id="addRowDatasq6radioThree3">+</button>
              </td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>

      <p class="text-right">
        <button type="button" class="btn btn-success" id="temp-save-question6">Save</button>
      </p>

    </div>
  </div>
</div>
@endif

<script>
  $(document).ready(function() {

    // ⬅️ টেবিল এ নতুন রো (Row) যুক্ত করা
    $("#addRowDatasq6radioThree3").click(function() {
      // আইডি ডুপ্লিকেট এড়াতে টাইমস্ট্যাম্প ব্যবহার করা সবচেয়ে নিরাপদ
      let rowCount = new Date().getTime();

      $("#addRowq6radioThree3 tbody").append(`
                <tr class="q6radioSix6QRow" id="q6row${rowCount}">
                    <td><input type="text" name="labor_title_q6[]" class="form-control labor_title_q6"></td>
                    <td><input type="number" name="labor_men_q6[]" id="labor_men_q6_${rowCount}" value="0" class="form-control labor_men_q6" min="0"></td>
                    <td><input type="number" name="labor_women_q6[]" id="labor_women_q6_${rowCount}" value="0" class="form-control labor_women_q6" min="0"></td>
                    <td><input type="number" name="labor_total_q6[]" readonly id="labor_total_q6_${rowCount}" class="form-control labor_total_q6" value="0"></td>
                    <td><input type="text" name="labor_response_q6[]" class="form-control labor_response_q6"></td>
                    <td><button type="button" id="${rowCount}" class="btn btn-danger q6radioThree3btn_remove">-</button></td>
                </tr>
            `);
    });

    // ⬅️ রো রিমুভ করা
    $(document).on("click", ".q6radioThree3btn_remove", function() {
      let id = $(this).attr("id");
      $("#q6row" + id).remove();
    });

    // ⬅️ পুরুষ ও মহিলা ইনপুটের ওপর ভিত্তি করে টোটাল অটো ক্যালকুলেট
    $("#addRowq6radioThree3").on("input", ".labor_men_q6, .labor_women_q6", function() {
      let targetId = $(this).attr("id");
      let row = targetId.substring(targetId.lastIndexOf('_') + 1);

      let men = parseInt($("#labor_men_q6_" + row).val()) || 0;
      let women = parseInt($("#labor_women_q6_" + row).val()) || 0;

      $("#labor_total_q6_" + row).val(men + women);
    });

    // ⬅️ রেডিও বাটন অনুযায়ী টগল লজিক (ক্লিন এবং অপ্টিমাইজড)
    $(".six_status").on("change", function() {
      let value = $("input[name='is_unit_court_q6']:checked").val();

      if (value === "1") {
        $("#six_question_view").removeClass('visibility').show();
        $(".others_input_container").hide();
        $("#q6radioThree3others").val(""); // ফাকা করে দেওয়া
      } else if (value === "2") {
        $("#six_question_view").hide();
        $(".others_input_container").removeClass('othersText').show();
      } else {
        $("#six_question_view").hide();
        $(".others_input_container").hide();
        $("#q6radioThree3others").val("");
      }
    });

    // ⬅️ সাময়িকভাবে ডাটা সেভ করার বাটনের কাজ
    $("#temp-save-question6").click(function() {
      let yes_no_value = $("input[name='is_unit_court_q6']:checked").val();
      let tableData = [];

      $(".q6radioSix6QRow").each(function() {
        let title = $(this).find(".labor_title_q6").val();
        // শুধু ডেটা থাকলেই টেবিলে পুশ করবে
        if (title || yes_no_value == "1") {
          tableData.push({
            title: title,
            men: $(this).find(".labor_men_q6").val() || 0,
            women: $(this).find(".labor_women_q6").val() || 0,
            total: $(this).find(".labor_total_q6").val() || 0,
            response: $(this).find(".labor_response_q6").val(),
          });
        }
      });

      let saveData = {
        q6radioSix3_data: tableData,
        q6radioSix3_checked_value: yes_no_value, // কন্ট্রোলারের স্ট্রাকচার কী-এর সাথে ম্যাচড
        others: $("#q6radioThree3others").val(),
      };

      $.ajax({
        url: "/superadmin/case/temp-save-question",
        type: "POST",
        data: {
          _token: "{{ csrf_token() }}",
          question6: saveData,
          question_no: 6 // ✅ কন্ট্রোলার এখন ডাইনামিকালি 'question6' নামে সেভ করবে
        },
        success: function(response) {
          if (response.success) {
            $('.question6 .card-header h6').css('color', 'blue');
            alert("Question 6 has been saved temporarily");
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