<?php
if (($questiontitles[51]->status ?? null) == 1) {

?>
  <style>
    .visibility {
      display: none;
    }

    .othersText {
      display: none;
    }
  </style>

  <div class="card question52">
    <?php
    $status_Lists = [
      1 => "Enforced",
      2 => "Updated and enforced",
      3 => "Stricter enforcement",
      4 => "Increases efforts"

    ];
    ?>

    <div class="card-header" role="tab" id="heading-4">

      <h6 class="card-title" style="color: {{ isset($question_52_data) ? 'blue' : 'green' }};">
        <a data-toggle="collapse" href="#Question-52" aria-expanded="false"
          aria-controls="collapse-4">
          52.{{ $questiontitles[51]->title }}
        </a>
      </h6>
    </div>

    <div id="Question-52" class="collapse" role="tabpane52" aria-labelledby="heading-4"
      data-parent="#accordion-2">
      <div class="card-body">
        <div class="icheck-primary">
          <?php if (isset($question_52_data->q52_checked_value)) { ?>
            <input
              type="radio"
              id="radioFiftyTwo1"
              class="fiftytwostatus"
              name="is_government_prosecute_deport_q52"
              <?= (isset($question_52_data->q52_checked_value) && $question_52_data->q52_checked_value == "1") ? "checked" : ""; ?>
              value="1">
          <?php } else { ?>

            <input type="radio" id="radioFiftyTwo1" class="fiftytwostatus" name="is_government_prosecute_deport_q52" checked value="1">
          <?php } ?>

          <label for="radioFiftyTwo1">
            Yes
          </label>
        </div>
        <div class="icheck-primary">
          <input
            type="radio"
            id="radioFiftyTwo2"
            class="fiftytwostatus"
            name="is_government_prosecute_deport_q52"
            <?= (isset($question_52_data->q52_checked_value) && $question_52_data->q52_checked_value == "0") ? "checked" : ""; ?>

            value="0">
          <label for="radioFiftyTwo2">
            No
          </label>
        </div>
        <div class="icheck-primary icheck-primary input-group">
          <input
            type="radio"
            id="radioFiftyTwo3"
            class="fiftytwostatus"
            name="is_government_prosecute_deport_q52"
            <?= (isset($question_52_data->q52_checked_value) && $question_52_data->q52_checked_value == "2") ? "checked" : ""; ?>
            value="2">
          <label for="radioFiftyTwo3">
            Others
          </label> </label> <span class=" col-md-6 mt--4 <?= (isset($question_52_data->q52_checked_value) && $question_52_data->q52_checked_value == "2") ? "" : "othersText"; ?>">
            <input
              type="text"
              id="q52others"
              placeholder="Others "
              class="form-control "
              value="<?= (isset($question_52_data->others) && $question_52_data->others) ? $question_52_data->others : '' ?>"
              name="other_government_prosecute_deport_q52"></span>
        </div>



        <div id="52_question_view" class="<?= (isset($question_52_data->q52_checked_value)   && ($question_52_data->q52_checked_value == '0')) ? 'visibility' : ''; ?>">

          <!-- table  Start -->
          <table id="addRowQ52" class="table table-bordered text-center">
            <thead>
              <tr>
                <th>Action</th>
                <th>Status</th>
                <th>Upload</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>

              @if(isset($question_52_data->q52_data) && count($question_52_data->q52_data) > 0)

              @foreach($question_52_data->q52_data as $i => $q52)

              <tr class="qe52NoOfRow" id="row{{$i}}">

                <td>
                  <input type="text"
                    name="prosecute_title_q52[]"
                    class="form-control"
                    value="{{ $q52->prosecute_title_q52 ?? '' }}">
                </td>

                <td>
                  <select name="prosecute_status_q52[]" class="form-control">

                    <option value="">---Choose---</option>

                    @foreach ($status_Lists as $key => $training)
                    <option value="{{ $key }}"
                      {{ (isset($q52->prosecute_status_q52) && $q52->prosecute_status_q52 == $key) ? 'selected' : '' }}>
                      {{ $training }}
                    </option>
                    @endforeach

                  </select>
                </td>

                <td>
                  <input type="file" name="document_upload_q52[]" class="form-control">

                  @if(!empty($q52->document_upload_q52))
                  <a target="_blank" href="{{ asset('uploads/'.$q52->document_upload_q52) }}">
                    View
                  </a>
                  @endif
                </td>

                <td>
                  @if($i == 0)
                  <button type="button" id="addRowDatasq52" class="btn btn-sm btn-primary">+</button>
                  @else
                  <button type="button" class="btn btn-danger btn_remove">-</button>
                  @endif
                </td>

              </tr>

              @endforeach

              @else

              {{-- DEFAULT ROWS (UNCHANGED STRUCTURE) --}}
              <tr class="qe52NoOfRow">
                <td>
                  <p>Awareness raising on forced prostitution</p>
                  <input type="hidden" name="prosecute_title_q52[]" value="1">
                </td>
                <td>
                  <select name="prosecute_status_q52[]" class="form-control">
                    <option value="">---Choose---</option>
                    @foreach ($status_Lists as $key => $training)
                    <option value="{{ $key }}">{{ $training }}</option>
                    @endforeach
                  </select>
                </td>
                <td><input type="file" name="document_upload_q52[]" class="form-control"></td>
              </tr>

              <tr class="qe52NoOfRow">
                <td>
                  <p>Legal measures against exploitation</p>
                  <input type="hidden" name="prosecute_title_q52[]" value="2">
                </td>
                <td>
                  <select name="prosecute_status_q52[]" class="form-control">
                    <option value="">---Choose---</option>
                    @foreach ($status_Lists as $key => $training)
                    <option value="{{ $key }}">{{ $training }}</option>
                    @endforeach
                  </select>
                </td>
                <td><input type="file" name="document_upload_q52[]" class="form-control"></td>
              </tr>

              <tr class="qe52NoOfRow">
                <td>
                  <p>Legal actions against offenders</p>
                  <input type="hidden" name="prosecute_title_q52[]" value="3">
                </td>
                <td>
                  <select name="prosecute_status_q52[]" class="form-control">
                    <option value="">---Choose---</option>
                    @foreach ($status_Lists as $key => $training)
                    <option value="{{ $key }}">{{ $training }}</option>
                    @endforeach
                  </select>
                </td>
                <td><input type="file" name="document_upload_q52[]" class="form-control"></td>
              </tr>

              <tr class="qe52NoOfRow">
                <td>
                  <input type="text" name="prosecute_title_q52[]" class="form-control" placeholder="Others Specific">
                </td>
                <td>
                  <select name="prosecute_status_q52[]" class="form-control">
                    <option value="">---Choose---</option>
                    @foreach ($status_Lists as $key => $training)
                    <option value="{{ $key }}">{{ $training }}</option>
                    @endforeach
                  </select>
                </td>
                <td><input type="file" name="document_upload_q52[]" class="form-control"></td>
                <td>
                  <button type="button" id="addRowDatasq52" class="btn btn-sm btn-primary">+</button>
                </td>
              </tr>

              @endif

            </tbody>
          </table>




        </div>
        <br />
        <p class="text-right">
          <button type="button" class="btn btn-success" id="temp-save-question52">Save</button>
        </p>
      </div>
    </div>
  </div>


  <script type="text/javascript">
    $(document).ready(function() {
      $(".fiftytwostatus").on("click", function() {
        var statusvalue = $("input[name='is_government_prosecute_deport_q52']:checked").val();
        $('.question52').find('.othersText').hide()
        $('.question52').find('#q52others').val("")
        if (statusvalue == '1') {
          $('.question52').find('#52_question_view').show()
          $('.question52').find('span').addClass('othersText')
        } else if (statusvalue == "2") {
          $('.question52').find('#52_question_view').hide()
          $('.question52').find('span').removeClass('othersText')
          $('.question52').find('span').show()

        } else {
          $('.question52').find('#52_question_view').hide()
          $('.question52').find('span').addClass('othersText')


        }
      });
    });
  </script>
  <script type="text/javascript">
    $(document).on('click', '#addRowDatasq52', function() {

      let row = `
      <tr class="qe52NoOfRow">
        <td><input type="text" name="prosecute_title_q52[]" class="form-control" placeholder="Others Specific"></td>
        <td>
          <select name="prosecute_status_q52[]" class="form-control">
            <option value="">---Choose---</option>
            @foreach ($status_Lists as $key => $training)
              <option value="{{ $key }}">{{ $training }}</option>
            @endforeach
          </select>
        </td>
        <td><input type="file" name="document_upload_q52[]" class="form-control"></td>
        <td><button type="button" class="btn btn-danger btn_remove">-</button></td>
      </tr>
    `;

      $("#addRowQ52 tbody").append(row);

    });

    // REMOVE FIXED (MOST IMPORTANT)
    $(document).on('click', '.btn_remove', function() {
      $(this).closest('tr').remove();
    });
  </script>
<?php } ?>