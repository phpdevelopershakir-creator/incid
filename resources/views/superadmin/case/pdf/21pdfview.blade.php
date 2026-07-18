<?php
if (($questiontitles[20]->status ?? null) == 1) {
?>


    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5>
                21.{{ $questiontitles[20]->title }}
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
                </thead>

                <tbody>
                    @
                    @php
                    $menTotal = 0;
                    $womenTotal = 0;
                    $Total = 0;

                    @endphp
                    @foreach($case->twentyone as $twentyone)
                    <tr>
                        <td> {{$twentyone->name_q21}}</td>
                        <td> {{$twentyone->operator_q21}}</td>
                        <td> {{$twentyone->capacity_men_q21}}</td>
                        <td> {{$twentyone->capacity_women_q21}}</td>
                        <td> {{$twentyone->capacity_total_q21}}</td>
                        <td> {{$twentyone->is_specialized_q21}}</td>
                        <td> {{$twentyone->eligible_victims_q21}}</td>
                        <td> {{$twentyone->note_q21}}</td>

                    </tr>
                    @php
                    $menTotal += $twentyone->capacity_men_q21;
                    $womenTotal += $twentyone->capacity_women_q21;
                    $Total += $twentyone->capacity_total_q21;
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