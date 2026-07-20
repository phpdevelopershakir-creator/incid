   <?php
    if (($questiontitles[45]->status ?? null) == 1) {

    ?>
   <style>
.visibility {
    display: none;
}

.othersText {
    display: none;
}
   </style>
   <div class="card question57">
       <div class="card-header" role="tab" id="heading-4">
           <h6 class="card-title">
               <a data-toggle="collapse" href="#Question-46" aria-expanded="false" aria-controls="collapse-4">
                   46.{{ $questiontitles[45]->title }}
               </a>
           </h6>
       </div>

       <div id="Question-46" class="collapse" role="tabpane46" aria-labelledby="heading-4" data-parent="#accordion-2">
           <div class="card-body">
           </div>
           @if(isset($case->yes_no_other) && $case->yes_no_other->is_government_conduct_awareness_activities_q46 == 1)
           <table class="table table-white table-bordered">
               <thead class="text-center align-middle">
                   <tr style="background:#E5E5E5;">
                       <th rowspan="2" style="text-align: center; vertical-align: middle; min-width: 180px;">Types of
                           Activities</th>
                       <th colspan="6">Community (number covered)</th>
                       <th colspan="6">Organization (Number covered)</th>
                       <th colspan="3">Total (number covered)</th>

                   </tr>
                   <tr style="background:#E5E5E5;">
                       <th>M</th>
                       <th>W</th>
                       <th>TG</th>
                       <th>B</th>
                       <th>G</th>
                       <th>T</th>
                       <th>GO</th>
                       <th>NGO</th>
                       <th>INGO</th>
                       <th>UN</th>
                       <th>CTC</th>
                       <th>Others</th>
                       <th>M</th>
                       <th>F</th>
                       <th>T</th>
                   </tr>
               </thead>
               <tbody>
                   @php
                   $oneTotal = 0;
                   $twoTotal = 0;
                   $threeTotal = 0;
                   $fourTotal = 0;
                   $fiveTotal = 0;
                   $sixTotal = 0;
                   $sevenTotal = 0;
                   $eightTotal = 0;
                   $nineTotal = 0;
                   $tenTotal = 0;
                   $elevenTotal = 0;
                   $twelveTotal = 0;
                   $thirtyTotal = 0;
                   $fourteenTotal = 0;

                   $Total = 0;

                   @endphp
                   @foreach($case->fortysix as $fortysix)
                   <tr>

                       <td>
                           @if($fortysix->q46_type_activity == 1)
                           Courtyard meeting
                           @elseif ($fortysix->q46_type_activity == 2)
                           Bazar/hatt meeting
                           @elseif ($fortysix->q46_type_activity == 3)
                           CTC meeting
                           @elseif ($fortysix->q46_type_activity == 4)
                           Consultation
                           @elseif ($fortysix->q46_type_activity == 5)
                           Poster
                           @elseif ($fortysix->q46_type_activity == 6)
                           leaflet
                           @elseif ($fortysix->q46_type_activity == 7)
                           Booklet
                           @elseif ($fortysix->q46_type_activity == 8)
                           SMS
                           @elseif ($fortysix->q46_type_activity == 9)
                           Newsletter
                           @elseif ($fortysix->q46_type_activity == 10)
                           Billboard
                           @elseif ($fortysix->q46_type_activity == 11)
                           Folk show
                           @elseif ($fortysix->q46_type_activity == 12)
                           Film show
                           @elseif ($fortysix->q46_type_activity == 13)
                           Miking
                           @elseif ($fortysix->q46_type_activity == 14)
                           Web campaign
                           @else
                           {{$fortysix->q46_type_activity}}
                           @endif
                       </td>
                       <td class="text-center align-middle">{{$fortysix->q46_comm_m}}</td>
                       <td class="text-center align-middle">{{$fortysix->q46_comm_w}}</td>
                       <td class="text-center align-middle">{{$fortysix->q46_comm_tg}}</td>
                       <td class="text-center align-middle">{{$fortysix->q46_comm_b}}</td>
                       <td class="text-center align-middle">{{$fortysix->q46_comm_g}}</td>
                       <td class="text-center align-middle">{{$fortysix->q46_comm_t}}</td>
                       <td class="text-center align-middle">{{$fortysix->q46_org_go}}</td>
                       <td class="text-center align-middle">{{$fortysix->q46_org_ngo}}</td>
                       <td class="text-center align-middle">{{$fortysix->q46_org_ingo}}</td>
                       <td class="text-center align-middle">{{$fortysix->q46_org_un}}</td>
                       <td class="text-center align-middle">{{$fortysix->q46_org_ctc}}</td>
                       <td class="text-center align-middle">{{$fortysix->q46_org_others}}</td>
                       <td class="text-center align-middle"> {{$fortysix->q46_total_m}}</td>
                       <td class="text-center align-middle">{{$fortysix->q46_total_f}}</td>
                       <td class="text-center align-middle">{{$fortysix->q46_total_t}}</td>
                   </tr>
                   @php
                   $oneTotal += $fortysix->q46_comm_m;
                   $twoTotal += $fortysix->q46_comm_w;
                   $threeTotal += $fortysix->q46_comm_tg;
                   $fourTotal += $fortysix->q46_comm_b;
                   $fiveTotal += $fortysix->q46_comm_g;
                   $sixTotal += $fortysix->q46_comm_t;
                   $sevenTotal += $fortysix->q46_org_go;
                   $eightTotal += $fortysix->q46_org_ngo;
                   $nineTotal += $fortysix->q46_org_ingo;
                   $tenTotal += $fortysix->q46_org_un;
                   $elevenTotal += $fortysix->q46_org_ctc;
                   $twelveTotal += $fortysix->q46_org_others;
                   $thirtyTotal += $fortysix->q46_total_m;
                   $fourteenTotal += $fortysix->q46_total_f;
                   $Total += $fortysix->q46_total_t;



                   @endphp
                   @endforeach
                   <tr style="font-weight:bold; background:#f1f1f1;">
                       <td style="text-align: left;">Total</td>
                       <td class="text-center align-middle">{{ $oneTotal }}</td>
                       <td class="text-center align-middle">{{ $twoTotal }}</td>
                       <td class="text-center align-middle">{{ $threeTotal }}</td>
                       <td class="text-center align-middle">{{ $fourTotal }}</td>
                       <td class="text-center align-middle">{{ $fiveTotal }}</td>
                       <td class="text-center align-middle">{{ $sixTotal }}</td>
                       <td class="text-center align-middle">{{ $sevenTotal }}</td>
                       <td class="text-center align-middle">{{ $eightTotal }}</td>
                       <td class="text-center align-middle">{{ $nineTotal }}</td>
                       <td class="text-center align-middle">{{ $tenTotal }}</td>
                       <td class="text-center align-middle">{{ $elevenTotal }}</td>
                       <td class="text-center align-middle">{{ $twelveTotal }}</td>
                       <td class="text-center align-middle">{{ $thirtyTotal }}</td>
                       <td class="text-center align-middle">{{ $fourteenTotal }}</td>
                       <td class="text-center align-middle">{{ $Total }}</td>



                   </tr>
               </tbody>
           </table>
           @elseif(isset($case->yes_no_other) &&
           !empty($case->yes_no_other->other_government_conduct_awareness_activities_q46))
           <div class="alert alert-info">
               <strong>Other Description:</strong>
               {{ $case->yes_no_other->other_government_conduct_awareness_activities_q46 }}
           </div>

           @else
           <div class="text-center py-3">
               <p class="text-muted">No data available for this section.</p>
           </div>
           @endif
       </div>
   </div>


   <?php } ?>