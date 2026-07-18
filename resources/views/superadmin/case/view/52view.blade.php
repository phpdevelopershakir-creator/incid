<?php
if (($questiontitles[51]->status ?? null) == 1) {

?>
  <div class="card">
    <div class="card-header" role="tab" id="heading-4">
      <h6 class="mb-0">
        <a data-toggle="collapse" href="#Question-52" aria-expanded="false"
          aria-controls="collapse-4">
          52.{{ $questiontitles[51]->title }}
        </a>
      </h6>
    </div>

    <div id="Question-52" class="collapse" role="tabpane52" aria-labelledby="heading-4"
      data-parent="#accordion-2">
      <div class="card-body">
        <div id="six_question_view">
          @if(isset($case->yes_no_other) && $case->yes_no_other->is_government_prosecute_deport_q52 == 1)
          <table class="table table-white table-bordered">
            <thead class="text-center align-middle">
              <tr style="background:#E5E5E5;">
                <th scope="col" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Action </th>
                <th scope="col" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Status</th>
                <th scope="col" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Attach/Upload Pdf</th>
              </tr>
            </thead>
            <tbody>
              @foreach($case->fiftytwo as $fiftytwo)
              <tr>
                <td style="text-align: left;">
                  @if($fiftytwo->prosecute_title_q52 == 1)
                  Awareness raising on forced prostitution and trafficking among citizens
                  @elseif ($fiftytwo->prosecute_title_q52 == 2)
                  Awareness raising on legal measures against sexual exploitation of trafficked individuals
                  @elseif ($fiftytwo->prosecute_title_q52 == 3)
                  Legal actions against foreign podophiles/sex-tourists (clients on underaged girls/VoTs)
                  @else
                  {{$fiftytwo->prosecute_title_q52}}
                  @endif
                </td>
                <td>
                  @if($fiftytwo->prosecute_status_q52 == 1)
                  Enforced
                  @elseif ($fiftytwo->prosecute_status_q52 == 2)
                  Updated and enforced
                  @elseif ($fiftytwo->prosecute_status_q52 == 3)
                  Stricter enforcement
                  @elseif ($fiftytwo->prosecute_status_q52 == 4)
                  Increases efforts
                  @endif

                </td>
                <td>
                  @if(!empty($fiftytwo->document_upload_q52))
                  <a href="{{ asset($fiftytwo->document_upload_q52) }}" target="_blank">View</a>
                  @else
                  not Found
                  @endif

                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @elseif(isset($case->yes_no_other) && !empty($case->yes_no_other->other_government_prosecute_deport_q52))
          <div class="alert alert-info">
            <strong>Other Description:</strong> {{ $case->yes_no_other->other_government_prosecute_deport_q52 }}
          </div>

          @else
          <div class="text-center py-3">
            <p class="text-muted">No data available for this section.</p>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>

<?php } ?>