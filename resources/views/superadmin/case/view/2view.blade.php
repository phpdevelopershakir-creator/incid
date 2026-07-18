<?php
if (($questiontitles[1]->status ?? null) == 1) {

?>
<div class="card">
    <div class="card-header" role="tab" id="heading-2">
        <h6 class="mb-0">
            <a data-toggle="collapse" href="#Question-2" aria-expanded="false" aria-controls="collapse-4">
                2.{{ $questiontitles[1]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-2" class="collapse" role="tabpane2" aria-labelledby="heading-2" data-parent="#accordion-2">
        <div class="card-body">
            @if(isset($case->yes_no_other) && $case->yes_no_other->is_government_transparent_q2 == 1)
            <table class="table table-white table-bordered">
                <thead class="text-center align-middle">
                    <tr style="background:#E5E5E5;">
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Nationality</th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Target gSector
                        </th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Number of Citizen
                            present in Bangladesh
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($case->two as $two)
                    <tr>
                        <td>
                            @if($two->government_nationality_q2 == 1)
                            Chinese National
                            @elseif ($two->government_nationality_q2 == 2)
                            Cuban national
                            @elseif ($two->government_nationality_q2 ==
                            3)
                            North Korean National

                            @endif

                        </td>
                        <td>
                            @if($two->government_sector_q2 == 1)
                            Belt and Road Initiative
                            @elseif ($two->government_sector_q2 == 2)
                            Medical workers
                            @elseif ($two->government_sector_q2 == 3)
                            Athletes
                            @elseif ($two->government_sector_q2 == 4)
                            Coaches
                            @elseif ($two->government_sector_q2 == 5)
                            Artist
                            @elseif ($two->government_sector_q2 == 6)
                            Teachers
                            @elseif ($two->government_sector_q2 == 7)
                            Engineers
                            @elseif ($two->government_sector_q2 == 8)
                            Sea Merchants
                            @elseif ($two->government_sector_q2 == 9)
                            Government to Government Work
                            @elseif ($two->government_sector_q2 == 10)
                            Private Sector
                            @elseif ($two->government_sector_q2 == 11)
                            Others
                            @elseif ($two->government_sector_q2 == 12)
                            N/A
                            @endif

                        </td>
                        <td class="text-center align-middle">
                            {{$two->government_total_q2}}

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @elseif(isset($case->yes_no_other) &&
            !empty($case->yes_no_other->other_government_transparent_q2))
            <div class="alert alert-info">
                <strong>Other Description:</strong>
                {{ $case->yes_no_other->other_government_transparent_q2 }}
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