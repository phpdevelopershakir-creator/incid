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
            $purpose_list = [
                '1' => 'Recruitment & Communication',
                '2' => 'Advertising & Marketing',
                '3' => 'Financial Transactions',
                '4' => 'Control & Surveillance',
                '5' => 'Document Forgery / Logistics',
                '6' => 'Others'
            ];
        
            $technology_list = [
                '1' => 'Social Media Platforms (Facebook, Instagram, etc.)',
                '2' => 'Messaging Apps (WhatsApp, Telegram, Signal)',
                '3' => 'Dark Web / Online Marketplaces',
                '4' => 'Mobile Banking / Cryptocurrency',
                '5' => 'GPS / Location Tracking / Surveillance',
                '6' => 'Job Portals / Fake Websites',
                '7' => 'Others'
            ];
        @endphp

                            <td>{{$three->category_q3}}</td>
                            <td>{{ $three->purpose_q3 ?? 'N/A' }}</td>
                            <td>{{ $three->technology_q3 ?? 'N/A' }}</td>
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
        '2' => 'What efforts are governments making to address the needs of victims of technology-facilitated human trafficking?'
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

                            <td>{{ $threeb->question_q3b ?? 'N/A' }}</td>
                            <td>{{  $threeb->response_q3b ?? 'N/A' }}</td>
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