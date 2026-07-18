<?php
if (($questiontitles[11]->status ?? null) == 1) {

?>


<div class="card question61">
    <div class="card-header" role="tab" id="heading-4">
        <h6 class="card-title" style="color: {{ isset($question_61_data) ? 'blue' : 'black' }};">
            <a data-toggle="collapse" href="#Question-12" aria-expanded="false" aria-controls="collapse-4">
                12.{{ $questiontitles[11]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-12" class="collapse" role="tabpane12" aria-labelledby="heading-4" data-parent="#accordion-2">
        <div class="card-body">
            @if(isset($case->yes_no_other) && $case->yes_no_other->is_government_cooperate_foreign_counterparts_q12 ==
            1)
            <table class="table table-white table-bordered">
                <h4>A.new investigations</h4>
                <thead>
                    <tr style="background:#E5E5E5;">
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">
                            Country/Region/International Law Enforcement Organization</th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Sex Trafficking
                        </th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Labour Trafficking
                        </th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Other/Unspecific
                            Trafficking</th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Total</th>
                    </tr>
                </thead>
                @foreach($case->twelve as $twelve)
                <tbody>
                    <tr>
                        <td>{{ $twelve->government_cooperate_foreign_counterparts_country_q12 }}</td>
                        <td class="text-center align-middle">
                            {{ $twelve->government_cooperate_foreign_counterparts_sex_trafficking_q12 }}</td>
                        <td class="text-center align-middle">
                            {{ $twelve->government_cooperate_foreign_counterparts_labour_trafficking_q12 }}</td>
                        <td class="text-center align-middle">
                            {{ $twelve->government_cooperate_foreign_counterparts_other_trafficking_q12 }}</td>
                        <td class="text-center align-middle">
                            {{ $twelve->government_cooperate_foreign_counterparts_total_trafficking_q12 }}</td>
                    </tr>

                </tbody>
                @endforeach
            </table>

            <table class="table table-white table-bordered">
                <h4>B.new investigations</h4>
                <thead>
                    <tr style="background:#E5E5E5;">
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">
                            Country/Region/International Law Enforcement Organization</th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Sex Trafficking
                        </th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Labour Trafficking
                        </th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Other/Unspecific
                            Trafficking</th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Total</th>
                    </tr>
                </thead>
                @foreach($case->twelveb as $twelveb)
                <tbody>
                    <tr>
                        <td>{{ $twelveb->government_country_q12b }}</td>
                        <td class="text-center align-middle">{{ $twelveb->government_sex_trafficking_q12b }}</td>
                        <td class="text-center align-middle">{{ $twelveb->government_labour_trafficking_q12b }}</td>
                        <td class="text-center align-middle">{{ $twelveb->government_other_trafficking_q12b }}</td>
                        <td class="text-center align-middle">{{ $twelveb->government_total_trafficking_q12b }}
                        </td>
                    </tr>

                </tbody>
                @endforeach
            </table>
            <table class="table table-white table-bordered">
                <h4>C.new investigations</h4>
                <thead>
                    <tr style="background:#E5E5E5;">
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">
                            Country/Region/International Law Enforcement Organization</th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Sex Trafficking
                        </th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Labour Trafficking
                        </th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Other/Unspecific
                            Trafficking</th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Total</th>
                    </tr>
                </thead>
                @foreach($case->twelvec as $twelvec)
                <tbody>
                    <tr>
                        <td>{{ $twelvec->government_country_q12c }}</td>
                        <td class="text-center align-middle">{{ $twelvec->government_sex_trafficking_q12c }}</td>
                        <td class="text-center align-middle">{{ $twelvec->government_labour_trafficking_q12c }}
                        </td>
                        <td class="text-center align-middle">{{ $twelvec->government_other_trafficking_q12c }}</td>
                        <td class="text-center align-middle">{{ $twelvec->government_total_trafficking_q12c }}
                        </td>
                    </tr>

                </tbody>
                @endforeach
            </table>

            <table class="table table-white table-bordered">
                <h4>D.new investigations</h4>
                <thead>
                    <tr style="background:#E5E5E5;">
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">
                            Country/Region/International Law Enforcement Organization</th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Sex Trafficking
                        </th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Labour Trafficking
                        </th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Other/Unspecific
                            Trafficking</th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Total</th>
                    </tr>
                </thead>
                @foreach($case->twelved as $twelved)
                <tbody>
                    <tr>
                        <td>{{ $twelved->government_country_q12d }}</td>
                        <td class="text-center align-middle">{{ $twelved->government_sex_trafficking_q12d }}</td>
                        <td class="text-center align-middle">{{ $twelved->government_labour_trafficking_q12d }}
                        </td>
                        <td class="text-center align-middle">{{ $twelved->government_other_trafficking_q12d }}</td>
                        <td class="text-center align-middle">{{ $twelved->government_total_trafficking_q12d }}
                        </td>
                    </tr>

                </tbody>
                @endforeach
            </table>



            @elseif(isset($case->yes_no_other) &&
            !empty($case->yes_no_other->other_government_cooperate_foreign_counterparts_q12))
            <div class="alert alert-info">
                <strong>Other Description:</strong>
                {{ $case->yes_no_other->other_government_cooperate_foreign_counterparts_q12 }}
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