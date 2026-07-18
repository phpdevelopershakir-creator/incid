<?php
if (($questiontitles[10]->status ?? null) == 1) {
?>


    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5>
                11.{{ $questiontitles[10]->title }}
            </h5>
        </div>

        <div class="card-body">
            <table class="custom-table">

                <thead>
                    <tr>
                        <th>Country</th>
                        <th>Target group of Training (multiple response)</th>
                        <th>Total coverage</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach($case->eleven as $eleven)
                    <tr>
                        <th>
                            @if($eleven->government_agreements_transparent_country_q11 == 1)
                            India
                            @elseif ($eleven->government_agreements_transparent_country_q11 == 2)
                            Nepal
                            @elseif ($eleven->government_agreements_transparent_country_q11 == 3)
                            Sri lanka
                            @elseif ($eleven->government_agreements_transparent_country_q11 == 4)
                            EU
                            @elseif ($eleven->government_agreements_transparent_country_q11 == 5)
                            USA
                            @elseif ($eleven->government_agreements_transparent_country_q11 == 6)
                            Saudi Arabia
                            @elseif ($eleven->government_agreements_transparent_country_q11 == 7)
                            Qatar
                            @elseif ($eleven->government_agreements_transparent_country_q11 == 8)
                            Lebanon
                            @elseif ($eleven->government_agreements_transparent_country_q11 == 9)
                            Irag
                            @elseif ($eleven->government_agreements_transparent_country_q11 == 10)
                            UAE
                            @elseif ($eleven->government_agreements_transparent_country_q11 == 11)
                            Thailand
                            @elseif ($eleven->government_agreements_transparent_country_q11 == 12)
                            Vietnam
                            @elseif ($eleven->government_agreements_transparent_country_q11 == 13)
                            Cambodia
                            @elseif ($eleven->government_agreements_transparent_country_q11 == 14)
                            South Africa
                            @elseif ($eleven->government_agreements_transparent_country_q11 == 15)
                            Brazil
                            @elseif ($eleven->government_agreements_transparent_country_q11 == 16)
                            UK

                            @else
                            {{$eleven->government_agreements_transparent_country_q11}}
                            @endif
                        </th>
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
                        <td>
                            {{$eleven->government_agreements_transparent_total_q11}}

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
<?php } ?>