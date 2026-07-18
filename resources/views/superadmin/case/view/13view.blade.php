<?php
if (($questiontitles[12]->status ?? null) == 1) {

?>


    <div class="card question61">
        <div class="card-header" role="tab" id="heading-4">
            <h6 class="card-title" style="color: {{ isset($question_61_data) ? 'blue' : 'black' }};">
                <a data-toggle="collapse" href="#Question-13" aria-expanded="false"
                    aria-controls="collapse-4">
                    13.{{ $questiontitles[12]->title }}
                </a>
            </h6>
        </div>

        <div id="Question-13" class="collapse" role="tabpane13" aria-labelledby="heading-4"
            data-parent="#accordion-2">
            <div class="card-body">


                @if(isset($case->yes_no_other) && $case->yes_no_other->is_government_cooperate_foreign_counterparts_q13 == 1)
                <table class="table table-white table-bordered">
                    <h4>A.new investigations</h4>
                    <thead>
                        <tr style="background:#E5E5E5;">
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Country/Region/International Law Enforcement Organization</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Sex Trafficking</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Labour Trafficking</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Other/Unspecific Trafficking</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Total</th>
                        </tr>
                    </thead>
                    @foreach($case->thirteena as $thirteena)
                    <tbody>
                        <tr>
                            <td>{{ $thirteena->government_country_q13a }}</td>
                            <td class="text-center align-middle">{{ $thirteena->government_sex_q13a }}</td>
                            <td class="text-center align-middle">{{ $thirteena->government_labour_q13a }}</td>
                            <td class="text-center align-middle">{{ $thirteena->government_other_q13a }}</td>
                            <td class="text-center align-middle">{{ $thirteena->government_total_q13a }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <table class="table table-white table-bordered">
                    <h4>B.new investigations</h4>
                    <thead>
                        <tr style="background:#E5E5E5;">
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Country/Region/International Law Enforcement Organization</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Sex Trafficking</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Labour Trafficking</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Other/Unspecific Trafficking</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Total</th>
                        </tr>
                    </thead>
                    @foreach($case->thirteenb as $thirteenb)
                    <tbody>
                        <tr>
                            <td>{{ $thirteenb->government_country_q13b }}</td>
                            <td class="text-center align-middle">{{ $thirteenb->government_sex_q13b }}</td>
                            <td class="text-center align-middle">{{ $thirteenb->government_labour_q13b }}</td>
                            <td class="text-center align-middle">{{ $thirteenb->government_other_q13b }}</td>
                            <td class="text-center align-middle">{{ $thirteenb->government_total_q13b }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <table class="table table-white table-bordered">
                    <h4>C.new investigations</h4>
                    <thead>
                        <tr style="background:#E5E5E5;">
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Country/Region/International Law Enforcement Organization</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Sex Trafficking</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Labour Trafficking</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Other/Unspecific Trafficking</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Total</th>
                        </tr>
                    </thead>
                    @foreach($case->thirteenc as $thirteenc)
                    <tbody>
                        <tr>
                            <td>{{ $thirteenc->government_country_q13c }}</td>
                            <td class="text-center align-middle">{{ $thirteenc->government_sex_q13c }}</td>
                            <td class="text-center align-middle">{{ $thirteenc->government_labour_q13c }}</td>
                            <td class="text-center align-middle">{{ $thirteenc->government_other_q13c }}</td>
                            <td class="text-center align-middle">{{ $thirteenc->government_total_q13c }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <table class="table table-white table-bordered">
                    <h4>D.new investigations</h4>
                    <thead>
                        <tr style="background:#E5E5E5;">
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Country/Region/International Law Enforcement Organization</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Sex Trafficking</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Labour Trafficking</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Other/Unspecific Trafficking</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Total</th>
                        </tr>
                    </thead>
                    @foreach($case->thirteend as $thirteend)
                    <tbody>
                        <tr>
                            <td>{{ $thirteend->government_country_q13d }}</td>
                            <td class="text-center align-middle">{{ $thirteend->government_sex_q13d }}</td>
                            <td class="text-center align-middle">{{ $thirteend->government_labour_q13d }}</td>
                            <td class="text-center align-middle">{{ $thirteend->government_other_q13d }}</td>
                            <td class="text-center align-middle">{{ $thirteend->government_total_q13d }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @elseif(isset($case->yes_no_other) && !empty($case->yes_no_other->other_government_cooperate_foreign_counterparts_q13))
                <div class="alert alert-info">
                    <strong>Other Description:</strong> {{ $case->yes_no_other->other_government_cooperate_foreign_counterparts_q13 }}
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