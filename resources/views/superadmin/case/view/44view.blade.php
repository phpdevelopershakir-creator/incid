   <?php
    if (($questiontitles[43]->status ?? null) == 1) {

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
               <a data-toggle="collapse" href="#Question-44" aria-expanded="false" aria-controls="collapse-4">
                   44.{{ $questiontitles[43]->title }}
               </a>
           </h6>
       </div>

       <div id="Question-44" class="collapse" role="tabpane44" aria-labelledby="heading-4" data-parent="#accordion-2">
           <div class="card-body">
           </div>
           @if(isset($case->yes_no_other) && $case->yes_no_other->is_awareness_campaigns_research_projects_q44 == 1)
           <table class="table table-white table-bordered">
               <thead class="text-center align-middle">
                   <tr style="background:#E5E5E5;">
                       <th scope="col" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">
                           Type of preventive Action</th>
                       <th scope="col" class="text-center" style="vertical-align: middle; padding-bottom: 20px;">
                           Allocation (in BDT) / Assessment</th>
                   </tr>
               </thead>
               <tbody>
                   @foreach($case->fortyfour as $fortyfour)
                   <tr>
                       <td>
                           @if ($fortyfour->awareness_campaigns_research_projects_title_q44 == 1)
                           Total Allocation under NPA for prevention
                           @elseif ($fortyfour->awareness_campaigns_research_projects_title_q44 == 2)
                           Total Allocation utilized under NPA for prevention
                           @elseif ($fortyfour->awareness_campaigns_research_projects_title_q44 == 3)
                           Total allocation spent for Awareness activities
                           @elseif ($fortyfour->awareness_campaigns_research_projects_title_q44 == 4)
                           Total allocation spent for safety-net
                           @elseif ($fortyfour->awareness_campaigns_research_projects_title_q44 == 5)
                           Total allocation spent for training to promote prevention
                           @elseif ($fortyfour->awareness_campaigns_research_projects_title_q44 == 6)
                           Assessment of Allocation
                           @endif

                       </td>

                       <td>
                           @if($fortyfour->awareness_campaigns_research_projects_status_q44 == 1)
                           Excess
                           @elseif ($fortyfour->awareness_campaigns_research_projects_status_q44 == 2)
                           Adequate
                           @elseif ($fortyfour->awareness_campaigns_research_projects_status_q44 == 3)
                           Inadequate
                           @elseif ($fortyfour->awareness_campaigns_research_projects_status_q44 == 4)
                           None
                           @else
                           {{$fortyfour->awareness_campaigns_research_projects_status_q44}}
                           @endif

                       </td>
                   </tr>
                   @endforeach
               </tbody>
           </table>
           @elseif(isset($case->yes_no_other) &&
           !empty($case->yes_no_other->other_awareness_campaigns_research_projects_q44))
           <div class="alert alert-info">
               <strong>Other Description:</strong>
               {{ $case->yes_no_other->other_awareness_campaigns_research_projects_q44 }}
           </div>

           @else
           <div class="text-center py-3">
               <p class="text-muted">No data available for this section.</p>
           </div>
           @endif
       </div>
   </div>


   <?php } ?>