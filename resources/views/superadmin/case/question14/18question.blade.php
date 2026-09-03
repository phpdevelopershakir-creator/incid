<?php
if (($questiontitles[17]->status ?? null) == 1) {

?>
  <style>
    .othersText {
      display: none;
    }

    .visibility {
      display: none;
    }

    .type3Input {
      display: none;
    }
  </style>

  <div class="card question18">
    <?php
    $type_vot = [1 => "Sex Trafficing", 2 => "Forced labour", 3 => "Other Specify"];
    $protection_measures_taken = [1 => "Detained", 2 => "Referred to care", 3 => "Investigation"];
    $preventive_measures_taken = [1 => "Awareness Taising", 2 => "Stricter Border Control"];
    ?>

    <div class="card-header" role="tab" id="heading-18">
      <h6 class="card-title" style="color: {{ isset($question_18_data) ? 'blue' : 'green' }};">
        <a data-toggle="collapse" href="#Question-18" aria-expanded="false" aria-controls="collapse-18">
          18.{{ $questiontitles[17]->title }}
        </a>
      </h6>
    </div>

    <div id="Question-18" class="collapse" role="tabpanel" aria-labelledby="heading-18" data-parent="#accordion-2">
      <div class="card-body">

        <!-- YES / NO / OTHERS -->
        <div class="icheck-primary">
          <input type="radio" class="eighteen_status" id="q18_yes" name="is_trafficking_among_risk_population_18q" value="1" {{ ($question_18_data->q18radioEighteen3_checked_value ?? "1") == "1" ? 'checked' : '' }}>
          <label for="q18_yes">Yes</label>
        </div>
        <div class="icheck-primary">
          <input type="radio" class="eighteen_status" id="q18_no" name="is_trafficking_among_risk_population_18q" value="0" {{ ($question_18_data->q18radioEighteen3_checked_value ?? "") == "0" ? 'checked' : '' }}>
          <label for="q18_no">No</label>
        </div>
        <div class="icheck-primary input-group mb-3">
          <input type="radio" class="eighteen_status" id="q18_others" name="is_trafficking_among_risk_population_18q" value="2" {{ ($question_18_data->q18radioEighteen3_checked_value ?? "") == "2" ? 'checked' : '' }}>
          <label for="q18_others">Others</label>
          <span class="col-md-6 mt--4 {{ ($question_18_data->q18radioEighteen3_checked_value ?? "") == "2" ? '' : 'othersText'}}">
            <input type="text" id="q18radioThree3others" class="form-control" placeholder="Others" name="others_forced_labor_q18" value="{{ $question_18_data->others ?? '' }}">
          </span>
        </div>

        

      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {

          function checkTypeVOT(row) {
            let td = row.find(".type_vot_one").closest("td");
            if (row.find(".type_vot_one").val() == "3") {
              td.find(".type3Input").show();
            } else {
              td.find(".type3Input").hide().val("");
            }
          }

          // On page load: check all rows
          $(".q18radioEighteen3QRow").each(function() {
            checkTypeVOT($(this));
          });

          // On change type_vot
          $(document).on("change", ".type_vot_one", function() {
            checkTypeVOT($(this).closest("tr"));
          });
  </script>
  <script>
    $(document).ready(function() {

      /* ===============================
         YES / NO / OTHERS TOGGLE
      =============================== */
      function toggleQ18Sections() {
        let val = $("input[name='is_trafficking_among_risk_population_18q']:checked").val();

        if (val === "1") { // YES
          $("#eighteen_question_view").show();
          $(".othersText").hide();
        } else if (val === "2") { // OTHERS
          $(".othersText").show();
          $("#eighteen_question_view").hide();
        } else { // NO
          $("#eighteen_question_view").hide();
          $(".othersText").hide();
        }
      }

      toggleQ18Sections();
      $(document).on("change", ".eighteen_status", toggleQ18Sections);


      /* ===============================
         ADD ROW
      =============================== */
      $(document).on("click", "#addRowDatasq18radioThree3", function() {

        let newRow = $("#addRowq18radioThree3 tbody tr:first").clone();

        newRow.find("input").val(0);
        newRow.find("select").val("");
        newRow.find(".type3Input").hide();

        // remove duplicate ID
        newRow.find("#addRowDatasq18radioThree3").removeAttr("id");

        // convert + to -
        newRow.find("button")
          .removeClass("btn-primary")
          .addClass("btn-danger q18radioThree3btn_remove")
          .text("-");

        $("#addRowq18radioThree3 tbody").append(newRow);
      });


      /* ===============================
         REMOVE ROW
      =============================== */
      $(document).on("click", ".q18radioThree3btn_remove", function() {
        $(this).closest("tr").remove();
        calculateTotals();
      });


      /* ===============================
         AUTO TOTAL CALCULATION
      =============================== */
      $(document).on("input", ".men_18, .women_18, .third_gender_18", function() {
        calculateTotals();
      });

      function calculateTotals() {
        $(".q18radioEighteen3QRow").each(function() {
          let men = parseInt($(this).find(".men_18").val()) || 0;
          let women = parseInt($(this).find(".women_18").val()) || 0;
          let third = parseInt($(this).find(".third_gender_18").val()) || 0;
          $(this).find(".total_18").val(men + women + third);
        });
      }





      /* ===============================
         TEMP SAVE
      =============================== */
      $("#temp-save-question18").on("click", function() {

        calculateTotals();

        let yes_no_value =
          $("input[name='is_trafficking_among_risk_population_18q']:checked").val() || "";

        let tableData = [];

        $(".q18radioEighteen3QRow").each(function() {
          tableData.push({
            type_vot: $(this).find(".type_vot").val(),
            type_vot_other: $(this).find(".type3Input").val(),
            men: $(this).find(".men_18").val(),
            women: $(this).find(".women_18").val(),
            third_gender: $(this).find(".third_gender_18").val(),
            total: $(this).find(".total_18").val(),

            protection_measures_taken: $(this)
              .find("select[name='protection_measures_taken[]']")
              .val(),

            preventive_measures_taken: $(this)
              .find("select[name='preventive_measures_taken[]']")
              .val(),

          });
        });

        $.ajax({
          url: "/superadmin/case/temp-save-question",
          type: "POST",
          data: {
            _token: "{{ csrf_token() }}",
            question_no: 18,
            question18: {
              q18radioThree3_data: tableData,
              q18radioEighteen3_checked_value: yes_no_value,
              others: $("#q18radioThree3others").val()
            }
          },
          success: function() {
            alert("Question 18 Temp Saved!");
          }
        });
      });

    });
  </script>
<?php } ?>