<?php
if (($questiontitles[7]->status ?? null) == 1) {
?>


    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5>
                8.{{ $questiontitles[7]->title }}
            </h5>
        </div>

        <div class="card-body">
            <table class="custom-table">

                <thead>
                    <tr>
                        <th rowspan="2" style="text-align: center; vertical-align: middle;">Ministry/Department Municipality body</th>
                        <th colspan="4">Measures Taken</th>
                    </tr>
                    <tr>
                        <th>Investigation (numbwer)</th>
                        <th>Prosecution (number)</th>
                        <th>Conviction or Sentencing (number)</th>
                        <th>Administrative Measures (numbwer)</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                    $menTotal = 0;
                    $womenTotal = 0;
                    $thirdGenderTotal = 0;
                    $boysTotal = 0;

                    @endphp
                    @foreach($case->eight as $eight)
                    <tr>

                        <td>{{$eight->official_title_q8}}</td>
                        <td>{{$eight->official_investigation_q8}}</td>
                        <td>{{$eight->official_prosecution_q8}}</td>
                        <td>{{$eight->official_conviction_q8}}</td>
                        <td>{{$eight->official_administrative_q8}}</td>
                    </tr>
                    @php
                    $menTotal += $eight->official_investigation_q8;
                    $womenTotal += $eight->official_prosecution_q8;
                    $thirdGenderTotal += $eight->official_conviction_q8;
                    $boysTotal += $eight->official_administrative_q8;

                    @endphp
                    @endforeach
                    <tr style="font-weight:bold; background:#f1f1f1;">
                        <td>Total</td>
                        <td>{{ $menTotal }}</td>
                        <td>{{ $womenTotal }}</td>
                        <td>{{ $thirdGenderTotal }}</td>
                        <td>{{ $boysTotal }}</td>
                    </tr>

                </tbody>

            </table>
        </div>
    </div>
<?php } ?>