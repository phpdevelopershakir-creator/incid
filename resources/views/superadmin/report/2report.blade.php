@php
$q2 = $questiontitles->firstWhere('id', 2) ?? null;

$Nationality_Lists = [
1 => "Chinese National",
2 => "Cuban national",
3 => "North Korean National"
];

$Sector_Lists = [
1 => "Belt and Road Initiative",
2 => "Medical workers",
3 => "Athletes",
4 => "Coaches",
5 => "Artist",
6 => "Teachers",
7 => "Engineers",
8 => "Sea Merchants",
9 => "Government to Government Work",
10 => "Private Sector",
11 => "Others",
12 => "N/A"
];
@endphp

@if(($q2->status ?? 1) == 1)
<div class="card mb-3">
    <div class="card-header" role="tab" id="heading-q2">
        <h6 class="mb-0">
            <a data-toggle="collapse" href="#Question-2" aria-expanded="false" aria-controls="Question-2"
                class="text-decoration-none">
                2. {{ $q2->title ?? 'Government Sector Nationality Report' }}
            </a>
        </h6>
    </div>

    <div id="Question-2" class="collapse" role="tabpanel" aria-labelledby="heading-q2" data-parent="#accordion-2">
        <div class="card-body">

            <div class="row mb-4">
                <!-- Detailed Data List Table -->
                <div class="col-md-7">
                    <h6 class="font-weight-bold mb-3">Data Details List</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nationality</th>
                                    <th>Sector</th>
                                    <th>Number of Citizen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($q2_data as $row)
                                <tr>
                                    <td>{{ $Nationality_Lists[$row->government_nationality_q2] ?? 'N/A' }}</td>
                                    <td>{{ $Sector_Lists[$row->government_sector_q2] ?? 'N/A' }}</td>
                                    <td>{{ $row->government_total_q2 }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">No Data Found</td>
                                </tr>
                                @endforelse
                                <tr class="font-weight-bold bg-light">
                                    <td colspan="2" class="text-right">Total:</td>
                                    <td>{{ $q2_grand_total }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Summary Ratio Table -->
                <div class="col-md-5">
                    <h6 class="font-weight-bold mb-3">Nationality Wise Ratio Summary</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle">
                            <thead class="bg-warning text-dark">
                                <tr>
                                    <th>Nationality</th>
                                    <th>Ratio (%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Chinese National</td>
                                    <td><span class="badge badge-info p-2">{{ $q2_cond1_percentage }}%</span></td>
                                </tr>
                                <tr>
                                    <td>Cuban National</td>
                                    <td><span class="badge badge-info p-2">{{ $q2_cond2_percentage }}%</span></td>
                                </tr>
                                <tr>
                                    <td>North Korean National</td>
                                    <td><span class="badge badge-info p-2">{{ $q2_cond3_percentage }}%</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Pie Chart Section -->
            <div class="row justify-content-center mt-4">
                <div class="col-md-6 text-center">
                    <h6 class="font-weight-bold mb-3">Nationality Wise Distribution</h6>
                    <div style="position: relative; height: 320px; width: 100%;">
                        <canvas id="q2PieChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
(function() {
    function initQ2PieChart() {
        var canvasElem = document.getElementById('q2PieChart');
        if (!canvasElem) return;

        if (typeof Chart === 'undefined') {
            setTimeout(initQ2PieChart, 150);
            return;
        }

        var ctx = canvasElem.getContext('2d');

        if (window.q2ChartInstance) {
            window.q2ChartInstance.destroy();
        }

        window.q2ChartInstance = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    'Chinese (' + @json($q2_cond1_percentage) + '%)',
                    'Cuban (' + @json($q2_cond2_percentage) + '%)',
                    'North Korean (' + @json($q2_cond3_percentage) + '%)'
                ],
                datasets: [{
                    data: [
                        Number(@json($q2_cond1_total ?? 0)),
                        Number(@json($q2_cond2_total ?? 0)),
                        Number(@json($q2_cond3_total ?? 0))
                    ],
                    backgroundColor: ['#007bff', '#28a745', '#ffc107'],
                    hoverBackgroundColor: ['#0056b3', '#1e7e34', '#d39e00'],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });
    }

    if (typeof $ !== 'undefined') {
        $(document).ready(function() {
            initQ2PieChart();

            $(document).on('shown.bs.collapse', '#Question-2', function() {
                initQ2PieChart();
            });
        });
    } else {
        document.addEventListener("DOMContentLoaded", initQ2PieChart);
    }
})();
</script>
@endif