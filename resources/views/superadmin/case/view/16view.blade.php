<div class="card">
    <div class="card-header" role="tab" id="heading-4">
        <h6 class="mb-0">
            <a data-toggle="collapse" href="#Question-16" aria-expanded="false" aria-controls="collapse-4">
                16.{{ $questiontitles[15]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-16" class="collapse" role="tabpane16" aria-labelledby="heading-4" data-parent="#accordion-2">
        <div class="card-body">
            <div id="six_question_view">
                @if(isset($case->yes_no_other) && $case->yes_no_other->is_authorities_systematically_q16 == 1)
                <table class="table table-bordered text-center">

                    <thead class="text-center align-middle">
                        @foreach($case->sixteen as $sixteen)
                        <tr>
                            <th>Describe efforts taken by authorities to consistently and systematically use such
                                protocols or formal written procedures to proactively screen for indicators of human
                                trafficking.</th>

                            <th>
                                {{$sixteen->description_q16}}
                            </th>

                        </tr>
                        @endforeach
                        </tbody>
                </table>
                <br>

                <table class="table table-bordered text-center">
                    <thead class="text-center align-middle">

                        <tr style="background:#E5E5E5;">
                            <th rowspan="2" style="vertical-align: middle;">Location</th>
                            <th colspan="4">Number of personnel Trained</th>

                        </tr>
                        <tr style="background:#E5E5E5;">
                            <th>Category</th>
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
                        @foreach($case->sixteenb as $sixteenb)
                        <tr>
                            <th>
                                @php
                                $district_Lists = [
                                1 => "Bagerhat", 2 => "Bandarban", 3 => "Barguna", 4 => "Barishal",
                                5 => "Bhola", 6 => "Bogura", 7 => "Brahmanbaria", 8 => "Chandpur",
                                9 => "Chapainawabganj", 10 => "Chattogram", 11 => "Chuadanga", 12 => "Cumilla",
                                13 => "Cox's Bazar", 14 => "Dhaka", 15 => "Dinajpur", 16 => "Faridpur",
                                17 => "Feni", 18 => "Gaibandha", 19 => "Gazipur", 20 => "Gopalganj",
                                21 => "Habiganj", 22 => "Jamalpur", 23 => "Jashore", 24 => "Jhalakathi",
                                25 => "Jhenaidah", 26 => "Joypurhat", 27 => "Khagrachari", 28 => "Khulna",
                                29 => "Kishoreganj", 30 => "Kurigram", 31 => "Kushtia", 32 => "Lakshmipur",
                                33 => "Lalmonirhat", 34 => "Madaripur", 35 => "Magura", 36 => "Manikganj",
                                37 => "Meherpur", 38 => "Moulvibazar", 39 => "Munshiganj", 40 => "Mymensingh",
                                41 => "Naogaon", 42 => "Narail", 43 => "Narayanganj", 44 => "Narsingdi",
                                45 => "Natore", 46 => "Netrokona", 47 => "Nilphamari", 48 => "Noakhali",
                                49 => "Pabna", 50 => "Panchagarh", 51 => "Patuakhali", 52 => "Pirojpur",
                                53 => "Rajbari", 54 => "Rajshahi", 55 => "Rangamati", 56 => "Rangpur",
                                57 => "Satkhira", 58 => "Shariatpur", 59 => "Sherpur", 60 => "Sirajganj",
                                61 => "Sunamganj", 62 => "Sylhet", 63 => "Tangail", 64 => "Thakurgaon"
                                ];
                                @endphp

                                {{ $district_Lists[$sixteenb->location_q16] ?? 'N/A' }}

                            </th>

                            <th>
                                @php
                                $categories = [
                                1 => 'Social Worker',
                                2 => 'Police',
                                3 => 'BGB',
                                4 => 'Coastguard',
                                5 => 'VDP',
                                6 => 'Rail Police',
                                7 => 'Judiciary',
                                8 => 'NGO',
                                9 => 'Others'
                                ];
                                @endphp

                                {{ $categories[$sixteenb->category_q16] ?? 'N/A' }}
                            </th>

                            <th>
                                {{$sixteenb->men_q16}}
                            </th>
                            <th>
                                {{$sixteenb->women_q16}}
                            </th>
                            <th>
                                {{$sixteenb->total_q16}}
                            </th>




                        </tr>
                        @php
                        $menTotal += $sixteenb->men_q16;
                        $womenTotal += $sixteenb->women_q16;
                        $Total += $sixteenb->total_q16;


                        @endphp
                        @endforeach
                        <tr style="font-weight:bold; background:#f1f1f1;">
                            <td colspan="2">Total</td>
                            <td class="text-center align-middle">{{ $menTotal }}</td>
                            <td class="text-center align-middle">{{ $womenTotal }}</td>
                            <td class="text-center align-middle">{{ $Total }}</td>

                        </tr>
                    </tbody>
                </table>

                @elseif(isset($case->yes_no_other) &&
                !empty($case->yes_no_other->other_authorities_systematically_q16))
                <div class="alert alert-info">
                    <strong>Other Description:</strong>
                    {{ $case->yes_no_other->other_authorities_systematically_q16 }}
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