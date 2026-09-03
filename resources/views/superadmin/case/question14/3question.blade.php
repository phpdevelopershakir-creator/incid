<?php
if (($questiontitles[2]->status ?? null) == 1) {

?>
  <style>
    .othersText {
      display: none;
    }

    .visibility {
      display: none;
    }
  </style>

  <div class="card question3">
    <div class="card-header" role="tab" id="heading-4">

      <h6 class="card-title" style="color: {{ isset($question_3_data) ? 'blue' : 'green' }};">
        <a data-toggle="collapse" href="#Question-3" aria-expanded="false"
          aria-controls="collapse-4">
          3.{{ $questiontitles[2]->title }}
        </a>
      </h6>
    </div>


    <div id="Question-3" class="collapse" role="tabpane3" aria-labelledby="heading-4"
      data-parent="#accordion-2">
      <div class="card-body">

        <!-- YES -->
        <div class="icheck-primary">
          <input type="radio" class="three_status" id="q3_yes"
            name="is_forced_labor_q3"
            value="1"
            {{ ($question_3_data->q3radioThree3_checked_value ?? "1") == "1" ? 'checked' : '' }}>
          <label for="q3_yes">Yes</label>
        </div>

        <!-- NO -->
        <div class="icheck-primary">
          <input type="radio" class="three_status" id="q3_no"
            name="is_forced_labor_q3"
            value="0"
            {{ ($question_3_data->q3radioThree3_checked_value ?? "") == "0" ? 'checked' : '' }}>
          <label for="q3_no">No</label>
        </div>

        <!-- OTHERS -->
        <div class="icheck-primary input-group mb-3">
          <input type="radio" class="three_status" id="q3_others"
            name="is_forced_labor_q3"
            value="2"
            {{ ($question_3_data->q3radioThree3_checked_value ?? "") == "2" ? 'checked' : '' }}>
          <label for="q3_others">Others</label>

          <span class="col-md-6 mt--4 {{ ($question_3_data->q3radioThree3_checked_value ?? "") == "2" ? '' : 'othersText'}}">
            <input type="text" id="q3radioThree3others" class="form-control"
              placeholder="Others"
              name="others_forced_labor_q3"
              value="{{ $question_3_data->others ?? '' }}">
          </span>
        </div>



        <!-- TABLE SECTION -->


      </div>
    </div>
  </div>






<script type="text/javascript">
  $(document).ready(function() {
    $(".three_status").on("click", function() {
      var statusvalue = $("input[name='is_forced_labor_q3']:checked").val();
      // alert(statusvalue)
      $('.question3').find('.othersText').hide()
      $('.question3').find('#q3radioThree3others').val("")
      if (statusvalue == '1') {
        $('.question3').find('#three_question_view').show()
        $('.question3').find('span').addClass('othersText')
      } else if (statusvalue == "2") {
        $('.question3').find('#three_question_view').hide()
        $('.question3').find('span').removeClass('othersText')
        $('.question3').find('span').show()
      } else {
        $('.question3').find('#three_question_view').hide()
        $('.question3').find('span').addClass('othersText')
      }
    });
  });
</script>

<?php } ?>