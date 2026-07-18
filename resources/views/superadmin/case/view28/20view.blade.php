<?php
if (($questiontitles[19]->status ?? null) == 1) {

?>

  <div class="card">
    <div class="card-header" role="tab" id="heading-4">
      <h6 class="mb-0">
        <a data-toggle="collapse" href="#Question-20" aria-expanded="false"
          aria-controls="collapse-4">
          20.{{ $questiontitles[19]->title }}

        </a>
      </h6>
    </div>

    <div id="Question-20" class="collapse" role="tabpane20" aria-labelledby="heading-4"
      data-parent="#accordion-2">
      <div class="card-body">
        <div id="six_question_view">

          <table class="table table-white table-bordered">
            <thead class="text-center align-middle">
              <tr style="background:#E5E5E5;">
                <th rowspan="2" style="text-align: center; vertical-align: middle;">Types of Hotlines</th>
                <th rowspan="2" style="vertical-align: middle;">Hotlines Number</th>
                <th colspan="6">Coverage</th>
              </tr>
              <tr style="background:#E5E5E5;">
                <th>Men</th>
                <th>Women</th>
                <th>3rd Gender</th>
                <th>Boy</th>
                <th>Girls</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <tr style="background:#E5E5E5;">
                <td colspan="8" style="text-align: center; font-weight: bold; background-color: #f8f9fa;">Internal Trafficking</td>
              </tr>
              @php
              $InternalmenTotal = 0;
              $InternalwomenTotal = 0;
              $InternalthirgenderTotal = 0;
              $InternalboyTotal = 0;
              $InternalgirlTotal = 0;
              $InternalTotal = 0;

              @endphp
              @foreach($case->twentya as $twentya)
              <tr>
                <td>
                  @if($twentya->internal_traffick_type_of_hotlines_q20 == 1)
                  MoWCA
                  @elseif ($twentya->internal_traffick_type_of_hotlines_q20 == 2)
                  MoHA
                  @elseif ($twentya->internal_traffick_type_of_hotlines_q20 == 3)
                  MoSW
                  @elseif ($twentya->internal_traffick_type_of_hotlines_q20 == 4)
                  MoEWOE
                  @elseif ($twentya->internal_traffick_type_of_hotlines_q20 == 5)
                  MoLJPA
                  @elseif ($twentya->internal_traffick_type_of_hotlines_q20 == 6)
                  INCIDIN Bangladesh
                  @elseif ($twentya->internal_traffick_type_of_hotlines_q20 == 7)
                  Ask
                  @elseif ($twentya->internal_traffick_type_of_hotlines_q20 == 8)
                  BNWLA
                  @elseif ($twentya->internal_traffick_type_of_hotlines_q20 == 9)
                  DAM
                  @else
                  {{$twentya->internal_traffick_type_of_hotlines_q20}}
                  @endif
                </td>
                <td class="text-center align-middle">{{$twentya->internal_hotlines_number_q20}}</td>
                <td class="text-center align-middle">{{$twentya->internal_traffick_men_q20}}</td>
                <td class="text-center align-middle">{{$twentya->internal_traffick_women_q20}}</td>
                <td class="text-center align-middle">{{$twentya->internal_traffick_third_gender_q20}}</td>
                <td class="text-center align-middle">{{$twentya->internal_traffick_boys_q20}}</td>
                <td class="text-center align-middle">{{$twentya->internal_traffick_girls_q20}}</td>
                <td class="text-center align-middle">{{$twentya->internal_traffick_total_q20}}</td>

              </tr>
              @php
              $InternalmenTotal += $twentya->internal_traffick_men_q20;
              $InternalwomenTotal += $twentya->internal_traffick_women_q20;
              $InternalthirgenderTotal += $twentya->internal_traffick_third_gender_q20;
              $InternalboyTotal += $twentya->internal_traffick_boys_q20;
              $InternalgirlTotal += $twentya->internal_traffick_girls_q20;
              $InternalTotal += $twentya->internal_traffick_total_q20;


              @endphp
              @endforeach
              <tr style="font-weight:bold; background:#f1f1f1;">
                <td style="text-align: left;" colspan="2">Total</td>
                <td class="text-center align-middle">{{ $InternalmenTotal }}</td>
                <td class="text-center align-middle">{{ $InternalwomenTotal }}</td>
                <td class="text-center align-middle">{{ $InternalthirgenderTotal }}</td>
                <td class="text-center align-middle">{{ $InternalboyTotal }}</td>
                <td class="text-center align-middle">{{ $InternalgirlTotal }}</td>
                <td class="text-center align-middle">{{ $InternalTotal }}</td>

              </tr>
            </tbody>
          </table>
          <br>
          <table class="table table-white table-bordered">
            <thead class="text-center align-middle">
              <tr style="background:#E5E5E5;">
                <th rowspan="2" style="text-align: center; vertical-align: middle;">Types of Hotlines</th>
                <th rowspan="2" style="vertical-align: middle;">Hotlines Number</th>
                <th colspan="6">Coverage</th>
              </tr>
              <tr style="background:#E5E5E5;">
                <th>Men</th>
                <th>Women</th>
                <th>3rd Gender</th>
                <th>Boy</th>
                <th>Girls</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <tr style="background:#E5E5E5;">
                <td colspan="8" style="text-align: center; font-weight: bold; background-color: #f8f9fa;">International Trafficking</td>
              </tr>
              @php
              $InternalionmenTotal = 0;
              $InternalionwomenTotal = 0;
              $InternalionthirgenderTotal = 0;
              $InternalionboyTotal = 0;
              $InternaliongirlTotal = 0;
              $InternalionTotal = 0;

              @endphp
              @foreach($case->twentyb as $twentyb)
              <tr>
                <td>
                  @if($twentyb->international_traffick_type_of_hotlines_q20 == 1)
                  MoWCA
                  @elseif ($twentyb->international_traffick_type_of_hotlines_q20 == 2)
                  MoHA
                  @elseif ($twentyb->international_traffick_type_of_hotlines_q20 == 3)
                  MoSW
                  @elseif ($twentyb->international_traffick_type_of_hotlines_q20 == 4)
                  MoEWOE
                  @elseif ($twentyb->international_traffick_type_of_hotlines_q20 == 5)
                  MoLJPA
                  @elseif ($twentyb->international_traffick_type_of_hotlines_q20 == 6)
                  INCIDIN Bangladesh
                  @elseif ($twentyb->international_traffick_type_of_hotlines_q20 == 7)
                  Ask
                  @elseif ($twentyb->international_traffick_type_of_hotlines_q20 == 8)
                  BNWLA
                  @elseif ($twentyb->international_traffick_type_of_hotlines_q20 == 9)
                  DAM
                  @else
                  {{$twentyb->international_traffick_type_of_hotlines_q20}}
                  @endif
                </td>
                <td class="text-center align-middle">{{$twentyb->international_hotlines_number_q20}}</td>
                <td class="text-center align-middle">{{$twentyb->international_traffick_men_q20}}</td>
                <td class="text-center align-middle">{{$twentyb->international_traffick_women_q20}}</td>
                <td class="text-center align-middle">{{$twentyb->international_traffick_third_gender_q20}}</td>
                <td class="text-center align-middle">{{$twentyb->international_traffick_boys_q20}}</td>
                <td class="text-center align-middle">{{$twentyb->international_traffick_girls_q20}}</td>
                <td class="text-center align-middle">{{$twentyb->international_traffick_total_q20}}</td>

              </tr>

              @php
              $InternalionmenTotal += $twentyb->international_traffick_men_q20;
              $InternalionwomenTotal += $twentyb->international_traffick_women_q20;
              $InternalionthirgenderTotal += $twentyb->international_traffick_third_gender_q20;
              $InternalionboyTotal += $twentyb->international_traffick_boys_q20;
              $InternaliongirlTotal += $twentyb->international_traffick_girls_q20;
              $InternalionTotal += $twentyb->international_traffick_total_q20;


              @endphp
              @endforeach

              <tr style="font-weight:bold; background:#f1f1f1;">
                <td style="text-align: left;" colspan="2">Total</td>
                <td class="text-center align-middle">{{ $InternalionmenTotal }}</td>
                <td class="text-center align-middle">{{ $InternalionwomenTotal }}</td>
                <td class="text-center align-middle">{{ $InternalionthirgenderTotal }}</td>
                <td class="text-center align-middle">{{ $InternalionboyTotal }}</td>
                <td class="text-center align-middle">{{ $InternaliongirlTotal }}</td>
                <td class="text-center align-middle">{{ $InternalionTotal }}</td>

              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


<?php } ?>