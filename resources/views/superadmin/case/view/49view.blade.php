<?php
if (($questiontitles[48]->status ?? null) == 1) {

?>
  <div class="card">
    <div class="card-header" role="tab" id="heading-4">
      <h6 class="mb-0">
        <a data-toggle="collapse" href="#Question-49" aria-expanded="false"
          aria-controls="collapse-4">
          49.{{ $questiontitles[51]->title }}
        </a>
      </h6>
    </div>

    <div id="Question-49" class="collapse" role="tabpane49" aria-labelledby="heading-4"
      data-parent="#accordion-2">
      <div class="card-body">
        @if(isset($case->yes_no_other) && $case->yes_no_other->is_government_agreements_transparent_q49 == 1)
        <table class="table table-white table-bordered">
          <thead class="text-center align-middle">
            <tr style="background:#E5E5E5;">
              <th scope="col" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Country </th>
              <th scope="col" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Instruments</th>
              <th scope="col" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Attach/Upload Pdf</th>
            </tr>
          </thead>
          <tbody>
            @foreach($case->fortynine as $fortynine)
            <tr>
              <td>
                @if($fortynine->government_agreements_transparent_country_q49 == 1)
                India
                @elseif ($fortynine->government_agreements_transparent_country_q49 == 2)
                Nepal
                @elseif ($fortynine->government_agreements_transparent_country_q49 == 3)
                Sri lanka
                @elseif ($fortynine->government_agreements_transparent_country_q49 == 4)
                EU
                @elseif ($fortynine->government_agreements_transparent_country_q49 == 5)
                USA
                @elseif ($fortynine->government_agreements_transparent_country_q49 == 6)
                Saudi Arabia
                @elseif ($fortynine->government_agreements_transparent_country_q49 == 7)
                Qatar
                @elseif ($fortynine->government_agreements_transparent_country_q49 == 8)
                Lebanon
                @elseif ($fortynine->government_agreements_transparent_country_q49 == 9)
                Irag
                @elseif ($fortynine->government_agreements_transparent_country_q49 == 10)
                UAE
                @elseif ($fortynine->government_agreements_transparent_country_q49 == 11)
                Thailand
                @elseif ($fortynine->government_agreements_transparent_country_q49 == 12)
                Vietnam
                @elseif ($fortynine->government_agreements_transparent_country_q49 == 13)
                Cambodia
                @elseif ($fortynine->government_agreements_transparent_country_q49 == 14)
                South Africa
                @elseif ($fortynine->government_agreements_transparent_country_q49 == 15)
                Brazil
                @elseif ($fortynine->government_agreements_transparent_country_q49 == 16)
                UK

                @else
                {{$fortynine->government_agreements_transparent_country_q49}}
                @endif
              </td>
              <td>
                @if($fortynine->government_agreements_transparent_status_q49 == 1)
                Bil-lateral Agreement
                @elseif ($fortynine->government_agreements_transparent_status_q49 == 2)
                SOP
                @elseif ($fortynine->government_agreements_transparent_status_q49 == 3)
                Mutual Legal Arrangement
                @elseif ($fortynine->government_agreements_transparent_status_q49 == 4)
                MoU
                @elseif ($fortynine->government_agreements_transparent_status_q49 == 5)
                Trade Treaty
                @elseif ($fortynine->government_agreements_transparent_status_q49 == 6)
                G to G Agreement
                @endif

              </td>
              <td>
                @if(!empty($fortynine->document_upload_q49))
                <a href="{{ asset($fortynine->document_upload_q49) }}" target="_blank">View</a>
                @else
                not Found
                @endif

              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @elseif(isset($case->yes_no_other) && !empty($case->yes_no_other->other_government_agreements_transparent_q49))
        <div class="alert alert-info">
          <strong>Other Description:</strong> {{ $case->yes_no_other->other_government_agreements_transparent_q49 }}
        </div>

        @else
        <div class="text-center py-3">
          <p class="text-muted">No data available for this section.</p>
        </div>
        @endif

      </div>
    </div>
  </div>

<?php } ?>