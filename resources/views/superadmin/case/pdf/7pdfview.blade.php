<?php
if (($questiontitles[6]->status ?? null) == 1) {
?>


    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 style="background-color: #97C6ED; color: #fff; padding: 10px; border-radius: 5px;">
                7.{{ $questiontitles[6]->title }}
            </h5>
        </div>

        <div class="card-body">
            <table class="custom-table">

                <thead>
                    <tr>
                        <th rowspan="2" scope="row">Ministry/Department Municipality body</th>
                        <th colspan="4" style="text-align: left">Number of Official Accused</th>
                    </tr>
                    <tr>
                        <th scope="row">Men</th>
                        <th scope="col">Women</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                    $menTotal = 0;
                    $womenTotal = 0;
                    $Total = 0;

                    @endphp
                    @foreach($case->seven as $seven)
                    <tr>

                        <td>{{$seven->justice_title_q7}}</td>
                        <td>{{$seven->justice_men_q7}}</td>
                        <td>{{$seven->justice_women_q7}}</td>
                        <td>{{$seven->justice_total_q7}}</td>
                    </tr>
                    @php
                    $menTotal += $seven->justice_men_q7;
                    $womenTotal += $seven->justice_women_q7;
                    $Total += $seven->justice_total_q7;


                    @endphp
                    @endforeach
                    <tr style="font-weight:bold; background:#f1f1f1;">
                        <td>Total</td>
                        <td>{{ $menTotal }}</td>
                        <td>{{ $womenTotal }}</td>
                        <td>{{ $Total }}</td>

                    </tr>

                </tbody>

            </table>
        </div>
    </div>
<?php } ?>