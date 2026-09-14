@php
$q3 = $questiontitles->firstWhere('id', 3) ?? null;

$Purpose_Lists = [
1 => 'Recruitment & Communication',
2 => 'Advertising & Marketing',
3 => 'Financial Transactions',
4 => 'Control & Surveillance',
5 => 'Document Forgery / Logistics',
6 => 'Others'
];

$Technology_Lists = [
1 => 'Social Media Platforms (Facebook, Instagram, etc.)',
2 => 'Messaging Apps (WhatsApp, Telegram, Signal)',
3 => 'Dark Web / Online Marketplaces',
4 => 'Mobile Banking / Cryptocurrency',
5 => 'GPS / Location Tracking / Surveillance',
6 => 'Job Portals / Fake Websites',
7 => 'Others'
];
@endphp

@if(($q3->status ?? 1) == 1)
<div class="card mb-3">
    <div class="card-header" role="tab" id="heading-q3">
        <h6 class="mb-0">
            <a data-toggle="collapse" href="#Question-3" aria-expanded="false" aria-controls="Question-3"
                class="text-decoration-none">
                3. {{ $q3->title ?? 'Purpose and Technology Report' }}
            </a>
        </h6>
    </div>

    <div id="Question-3" class="collapse" role="tabpanel" aria-labelledby="heading-q3" data-parent="#accordion-2">
        <div class="card-body">

            <div class="row mb-4">
                <!-- Detailed Data List -->
                <div class="col-md-7">
                    <h6 class="font-weight-bold mb-3">Data Details List</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Purpose </th>
                                    <th>Technology </th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($q3_data as $row)
                                <tr>
                                    <td>{{ $Purpose_Lists[$row->purpose_q3] ?? 'N/A' }}</td>
                                    <td>{{ $Technology_Lists[$row->technology_q3] ?? 'N/A' }}</td>


                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">No Data Found</td>
                                </tr>
                                @endforelse
                                <tr class="font-weight-bold bg-light">
                                    <td colspan="2" class="text-right">Grand Total:</td>
                                    <td>{{ $q3_grand_total }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Summary Ratio Table -->
                <div class="col-md-5">
                    <h6 class="font-weight-bold mb-3">Category Wise Summary Ratio</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle">
                            <thead class="bg-warning text-dark">
                                <tr>
                                    <th>Category</th>
                                    <th>Total</th>
                                    <th>Ratio (%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Fraudulent Recruitment</td>
                                    <td>{{ $q3_cond1_total }}</td>
                                    <td><span class="badge badge-info p-2">{{ $q3_cond1_percentage }}%</span></td>
                                </tr>
                                <tr>
                                    <td>Means</td>
                                    <td>{{ $q3_cond2_total }}</td>
                                    <td><span class="badge badge-info p-2">{{ $q3_cond2_percentage }}%</span></td>
                                </tr>
                                <tr>
                                    <td>Forms of Exploitation</td>
                                    <td>{{ $q3_cond3_total }}</td>
                                    <td><span class="badge badge-info p-2">{{ $q3_cond3_percentage }}%</span></td>
                                </tr>
                                <tr>
                                    <td>Emerging Trends</td>
                                    <td>{{ $q3_cond4_total }}</td>
                                    <td><span class="badge badge-info p-2">{{ $q3_cond4_percentage }}%</span></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Pie Chart Section -->
            <div class="row justify-content-center mt-4">
                <div class="col-md-6 text-center">
                    <h6 class="font-weight-bold mb-3">Purpose & Technology Distribution</h6>
                    <div style="position: relative; height: 320px; width: 100%;">
                        <canvas id="q3PieChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
(function() {
    function initQ3PieChart() {
        var canvasElem = document.getElementById('q3PieChart');
        if (!canvasElem) return;

        if (typeof Chart === 'undefined') {
            setTimeout(initQ3PieChart, 150);
            return;
        }

        var ctx = canvasElem.getContext('2d');

        if (window.q3ChartInstance) {
            window.q3ChartInstance.destroy();
        }

        window.q3ChartInstance = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    'Fraudulent Recruitment (' + @json($q3_cond1_percentage) + '%)',
                    'Means (' + @json($q3_cond2_percentage) + '%)',
                    'Forms of Exploitation (' + @json($q3_cond3_percentage) + '%)',
                    'Emerging Trends (' + @json($q3_cond4_percentage) + '%)'
                ],
                datasets: [{
                    data: [
                        Number(@json($q3_cond1_total ?? 0)),
                        Number(@json($q3_cond2_total ?? 0)),
                        Number(@json($q3_cond3_total ?? 0)),
                        Number(@json($q3_cond4_total ?? 0))

                    ],
                    backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545'

                    ],
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
            initQ3PieChart();

            $(document).on('shown.bs.collapse', '#Question-3', function() {
                initQ3PieChart();
            });
        });
    } else {
        document.addEventListener("DOMContentLoaded", initQ3PieChart);
    }
})();
</script>
@endif