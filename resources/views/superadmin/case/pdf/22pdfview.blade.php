<?php
if (($questiontitles[21]->status ?? null) == 1) {
?>


    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5>
                22.{{ $questiontitles[21]->title }}
            </h5>
        </div>

        <div class="card-body">
            <table class="custom-table">

                <thead>
                    <tr>
                        <th rowspan="2">Name of the Shalters </th>
                        <th rowspan="2">Operators </th>
                        <th colspan="3">Capacity </th>
                        <th rowspan="2">Specialized for Trafficking? </th>
                        <th rowspan="2">Eligible Victims</th>
                        <th rowspan="2">Note</th>
                    </tr>
                    <tr>
                        <th>Men</th>
                        <th>Women</th>
                        <th>Total</th>
                    </tr>
                </thead>>

                <tbody>
                    @php
                    $menTotal = 0;
                    $womenTotal = 0;
                    $Total = 0;

                    @endphp
                    @foreach($case->twentytwo as $twentytwo)
                    <tr>
                        <td> {{$twentytwo->name_q22}}</td>
                        <td> {{$twentytwo->operator_q22}}</td>
                        <td> {{$twentytwo->capacity_men_q22}}</td>
                        <td> {{$twentytwo->capacity_women_q22}}</td>
                        <td> {{$twentytwo->capacity_total_q22}}</td>
                        <td> {{$twentytwo->is_specialized_q22}}</td>
                        <td> {{$twentytwo->eligible_victims_q22}}</td>
                        <td> {{$twentytwo->note_q22}}</td>

                    </tr>
                    @php
                    $menTotal += $twentytwo->capacity_men_q22;
                    $womenTotal += $twentytwo->capacity_women_q22;
                    $Total += $twentytwo->capacity_total_q22;
                    @endphp
                    @endforeach
                    <tr style="font-weight:bold; background:#f1f1f1;">
                        <td colspan="2">Total</td>
                        <td>{{ $menTotal }}</td>
                        <td>{{ $womenTotal }}</td>
                        <td>{{ $Total }}</td>

                    </tr>
                </tbody>

            </table>
        </div>
    </div>
<?php } ?>