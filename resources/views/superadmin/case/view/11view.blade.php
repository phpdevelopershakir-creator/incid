<?php
if (($questiontitles[10]->status ?? null) == 1) {

?>

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
<div class="card">
    <div class="card-header" role="tab" id="heading-4">
        <h6 class="mb-0">
            <a data-toggle="collapse" href="#Question-11" aria-expanded="false" aria-controls="collapse-4">
                11.{{ $questiontitles[51]->title }}
            </a>
        </h6>
    </div>

    <div id="Question-11" class="collapse" role="tabpane11" aria-labelledby="heading-4" data-parent="#accordion-2">
        <div class="card-body">
            @if(isset($case->yes_no_other) && $case->yes_no_other->is_government_agreements_transparent_q11 == 1)
            <table class="table table-white table-bordered">
                <thead class="text-center align-middle">
                    <tr style="background:#E5E5E5;">
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Country</th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Target group of
                            Training (multiple response)</th>
                        <th class="text-center" style="vertical-align: middle; padding-bottom: 20px;">Total coverage
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($case->eleven as $eleven)
                    <tr>
                        <td>


                            {{ $district_Lists[$eleven->government_agreements_transparent_country_q11] ?? $eleven->government_agreements_transparent_country_q11 }}
                        </td>
                        <td>
                            @if($eleven->government_agreements_transparent_status_q11 == 1)
                            Govemment Official
                            @elseif ($eleven->government_agreements_transparent_status_q11 == 2)
                            Immigration authority
                            @elseif ($eleven->government_agreements_transparent_status_q11 == 3)
                            Law Enforcing Personnel
                            @elseif ($eleven->government_agreements_transparent_status_q11 == 4)
                            Border Control Force
                            @elseif ($eleven->government_agreements_transparent_status_q11 == 5)
                            Judiciary
                            @elseif ($eleven->government_agreements_transparent_status_q11 == 6)
                            Diplomat
                            @endif

                        </td>
                        <td class="text-center align-middle">
                            {{$eleven->government_agreements_transparent_total_q11}}

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @elseif(isset($case->yes_no_other) &&
            !empty($case->yes_no_other->other_government_agreements_transparent_q11))
            <div class="alert alert-info">
                <strong>Other Description:</strong>
                {{ $case->yes_no_other->other_government_agreements_transparent_q11 }}
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