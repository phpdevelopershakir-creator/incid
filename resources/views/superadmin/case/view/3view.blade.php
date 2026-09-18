<?php
if (($questiontitles[2]->status ?? null) == 1) {

?>
<div class="card">
    <div class="card-header" role="tab" id="heading-4">
        <h6 class="mb-0">
            <a data-toggle="collapse" href="#Question-3" aria-expanded="false" aria-controls="collapse-4">
                3.{{ $questiontitles[2]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-3" class="collapse" role="tabpanel3" aria-labelledby="heading-4" data-parent="#accordion-2">
        <div class="card-body">
            <div id="six_question_view">
                @if(isset($case->yes_no_other) && $case->yes_no_other->is_technology_trafficking_applicable_q3 == 1)
                <table class="table table-bordered text-center">
                    <thead class="text-center align-middle">
                        <tr style="background:#E5E5E5;">
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Category</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Purpose
                                (Multiple Selection)</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Type of
                                Technology Used by Traffickers
                                (Multiple Selection)</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Description
                                (victims/process and nature
                                of victimization/government actions)</th>


                        </tr>

                    </thead>
                    <tbody>

                        @foreach($case->three as $three)
                        <tr>
                            @php
                            // Option Text Mappings

                            $category_list = [
                            '1' => 'Fraudulent Recruitment',
                            '2' => 'Means',
                            '3' => 'Forms of Exploitation',
                            '4' => 'Emerging Trends'
                            ];


                            $purpose_list = [
                            '1' => 'Online scam',
                            '2' => 'Fight in or support active conflict',
                            '3' => 'Pornography',
                            '4' => 'Sexual Exploitation',
                            '5' => 'Economic Exploitation',
                            '6' => 'Ransom',
                            '7' => 'Force',
                            '8' => 'Deceive',
                            '9' => 'Coerce',
                            '10' => 'Cyber scamming',
                            '11' => 'Sexual exploitation',
                            '12' => 'Online sexulal exploitation',
                            '13' => 'Ransome extortion',
                            '14' => 'Online scam',
                            '15' => 'Fight in or support active conflict',
                            '16' => 'Pornography',
                            '17' => 'Sexual Exploitation',
                            '18' => 'Economic Exploitation',
                            '19' => 'Ransom'
                            ];



                            $technology_list = [
                            '1' => 'Facebook',
                            '2' => 'Tiktok',
                            '3' => 'WhatsApp',
                            '4' => 'Instagram',
                            '5' => 'YouTube',
                            '6' => 'Telegram',
                            '7' => 'Other social media platform',
                            '8' => 'Phone Apps',
                            '9' => 'Online job portal',
                            '10' => 'Websites',
                            '11' => 'tele-marketting',
                            '12' => 'Online grooming',
                            '13' => 'bar code tatatooing',
                            '14' => 'location tracking apps & device',
                            '15' => 'sextortion',
                            '16' => 'Facebook',
                            '17' => 'Tiktok',
                            '18' => 'WhatsApp',
                            '19' => 'Instagram',
                            '20' => 'YouTube',
                            '21' => 'Telegram',
                            '22' => 'Other social media platform',
                            '23' => 'Phone Apps',
                            '24' => 'Online job portal',
                            '25' => 'Websites',
                            '26' => 'tele-marketting',
                            '27' => 'E-Comerce marketplace',
                            '28' => 'Darkweb',
                            '29' => 'Cryptocurremcy for transaction',
                            '30' => 'Darkweb to conceal activities',
                            '31' => 'Artificial Intelligence (AI)',
                            '32' => 'Live streaming to exploit in cyber space'


                            ];
                            @endphp
                            <td>{{ $purpose_list[$three->category_q3] ?? $three->category_q3 ?? 'N/A' }}</td>
                            <td>{{ $technology_list[$three->purpose_q3] ?? $three->purpose_q3 ?? 'N/A' }}</td>
                            <td>{{ $technology_list[$three->technology_q3] ?? $three->technology_q3 ?? 'N/A' }}</td>

                            <td>{{$three->description_q3}}</td>

                        </tr>

                        @endforeach


                    </tbody>
                </table>
                <br>
                <p class="font-weight-bold">Government Response</p>
                <table class="table table-bordered text-center">
                    <thead class="text-center align-middle">
                        <tr style="background:#E5E5E5;">
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Question</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Responses
                                (Multiple Selection)</th>
                            <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Description
                                (who is doing it? What are
                                the results)</th>

                        </tr>

                    </thead>
                    <tbody>

                        @foreach($case->threeb as $threeb)
                        <tr>
                            @php
                            // Question B List Mapping
                            $questions_b_list = [
                            '1' => 'How are governments countering tech-enabled trafficking?',
                            '2' => 'What efforts are governments making to address the needs of victims of
                            technology-facilitated human trafficking?'
                            ];

                            // Response List Mapping
                            $response_list = [
                            '1' => 'Cyber Crime Unit Investigation',
                            '2' => 'Public Awareness Campaigns',
                            '3' => 'Legal Framework & Policy Action',
                            '4' => 'Victim Support Hotline & Services',
                            '5' => 'International Cooperation',
                            '6' => 'Others'
                            ];
                            @endphp
                            <td>{{ $questions_b_list[$threeb->question_q3b] ?? $threeb->question_q3b ?? 'N/A' }}</td>
                            <td>{{ $response_list[$threeb->response_q3b] ?? $threeb->response_q3b ?? 'N/A' }}</td>

                            <td>{{$threeb->description_q3b}}</td>

                        </tr>

                        @endforeach


                    </tbody>
                </table>

                @elseif(isset($case->yes_no_other) &&
                !empty($case->yes_no_other->other_technology_trafficking_applicable_q3))
                <div class="alert alert-info">
                    <strong>Other Description:</strong>
                    {{ $case->yes_no_other->other_technology_trafficking_applicable_q3 }}
                </div>


                @else
                <div class="text-center py-3">
                    <p class="text-muted">No data available for this section.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<?php } ?>