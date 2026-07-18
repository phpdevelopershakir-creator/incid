<?php
if (($questiontitles[5]->status ?? null) == 1) {
?>


    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5>
                6.{{ $questiontitles[5]->title }}
            </h5>
        </div>

        <div class="card-body">
            <table class="custom-table">

                <thead>

                    <tr>
                        <th rowspan="2" style="text-align:center; vertical-align:middle;">
                            Ministry/Department
                        </th>

                        <th colspan="3" style="text-align:center;">
                            Number of Official Accused
                        </th>

                        <th rowspan="2" style="text-align:center; vertical-align:middle;">
                            Result of which Policy/Law/Response
                        </th>
                    </tr>

                    <tr>
                        <th>Men</th>
                        <th>Women</th>
                        <th>Total</th>
                    </tr>

                </thead>

                <tbody>

                    @php
                    $menTotal = 0;
                    $womenTotal = 0;
                    $Total = 0;
                    @endphp

                    @foreach($case->six as $six)

                    <tr>
                        <td>{{$six->labor_title_q6}}</td>
                        <td>{{$six->labor_men_q6}}</td>
                        <td>{{$six->labor_women_q6}}</td>
                        <td>{{$six->labor_total_q6}}</td>
                        <td>{{$six->labor_response_q6}}</td>
                    </tr>

                    @php
                    $menTotal += $six->labor_men_q6;
                    $womenTotal += $six->labor_women_q6;
                    $Total += $six->labor_total_q6;
                    @endphp

                    @endforeach

                    <tr style="font-weight:bold; background:#f1f1f1;">
                        <td>Total</td>
                        <td>{{ $menTotal }}</td>
                        <td>{{ $womenTotal }}</td>
                        <td>{{ $Total }}</td>
                        <td></td>
                    </tr>

                </tbody>

            </table>
        </div>
    </div>
<?php } ?>