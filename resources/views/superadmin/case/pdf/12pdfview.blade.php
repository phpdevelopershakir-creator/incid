<?php
if (($questiontitles[11]->status ?? null) == 1) {
?>


    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5>
                12.{{ $questiontitles[11]->title }}
            </h5>
        </div>

        <div class="card-body">
            @php
            $index = 65;
            @endphp
            @foreach($twelveGrouped as $country => $rows)
            <h5 class="mt-3">{{ chr($index++) }}. {{ $labels[$country] ?? $country }}</h5>
            <table class="custom-table">

                <thead>
                    <tr>
                        <th>Country/Region/International Law Enforcement Organization</th>
                        <th>Sex Trafficking</th>
                        <th>Labour Trafficking</th>
                        <th>Other/Unspecific Trafficking</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($rows as $twelve)
                    <tr>
                        <td>{{ $twelve->government_cooperate_foreign_counterparts_country_q12 }}</td>
                        <td>{{ $twelve->government_cooperate_foreign_counterparts_sex_trafficking_q12 }}</td>
                        <td>{{ $twelve->government_cooperate_foreign_counterparts_labour_trafficking_q1 }}</td>
                        <td>{{ $twelve->government_cooperate_foreign_counterparts_other_trafficking_q12 }}</td>
                        <td>{{ $twelve->government_cooperate_foreign_counterparts_total_trafficking_q12 }}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            @endforeach
        </div>
    </div>
<?php } ?>