<div class="card">
  <div class="card-header" role="tab" id="heading-4">
    <h6 class="mb-0">
      <a data-toggle="collapse" href="#Question-10" aria-expanded="false"
        aria-controls="collapse-4">
        10.{{ $questiontitles[9]->title }}
      </a>
    </h6>
  </div>

  <div id="Question-10" class="collapse" role="tabpane10" aria-labelledby="heading-4"
    data-parent="#accordion-2">
    <div class="card-body">
      <div id="six_question_view">
          <table class="table table-white table-bordered">

         <thead class="text-center align-middle">
           <tr style="background:#E5E5E5;">
              <th scope="col" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Description</th>
              <th scope="col" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Please Select Yes/No</th>
              <th scope="col" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Opinion</th>
            </tr>
          </thead>
          <tbody>
            @foreach($case->ten as $ten)
            <tr>
              <td style="text-align: left;">

                {{$ten->court_title_q10}}
              </td>
              <td>
                {{ $ten->court_type_q10 == 1 ? 'Yes' : 'No' }}
              </td>
              @if($ten->court_type_q10 == 1)
              <td>

                {{ $ten->court_description_q10 }}

              </td>
              @endif
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>