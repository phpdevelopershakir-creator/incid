@php
// $questiontitles থেকে ID 1 অনুযায়ী Title ও Status বের করা
$q1 = $questiontitles->firstWhere('id', 1) ?? $questiontitles[0] ?? null;
@endphp

@if(($q1->status ?? null) == 1)
<div class="card mb-3">
    <div class="card-header" role="tab" id="heading-q1">
        <h6 class="mb-0">
            <a data-toggle="collapse" href="#Question-1" aria-expanded="false" aria-controls="Question-1"
                class="text-decoration-none">
                1. {{ $q1->title ?? 'Supreme Court Report' }}
            </a>
        </h6>
    </div>

    <div id="Question-1" class="collapse" role="tabpanel" aria-labelledby="heading-q1" data-parent="#accordion-2">
        <div class="card-body">

            <!-- Summary Table -->
            <div class="mb-4">
                <h6 class="font-weight-bold">Summary Table</h6>
                <div class="table-responsive">
                    <table class="table table-bordered text-center align-middle">
                        <thead class="thead-dark">
                            <tr>
                                <th>Total Revised</th>
                                <th>Total Abolished</th>
                                <th>Grand Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <span class="badge badge-primary p-2">
                                        {{ $status1_count }} ({{ $status1_percentage }}%)
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-warning p-2">
                                        {{ $status2_count }} ({{ $status2_percentage }}%)
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-dark p-2">
                                        {{ $grand_total }}
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Detailed Data Table -->
            <div class="table-responsive mb-4">
                <h6 class="font-weight-bold">Detailed Data List</h6>
                <table class="table table-bordered text-center align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th>Case ID</th>
                            <th>Supreme Court Title</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data_sixteen as $row)
                        <tr>
                            <td>{{ $row->case_id ?? 'N/A' }}</td>
                            <td>
                                @if($row->supreme_court_title == 1)
                                <span class="badge badge-primary">PSHT 2012</span>
                                @endif
                            </td>
                            <td>
                                @if($row->supreme_court_status == 1)
                                <span class="badge badge-primary">Revised</span>
                                @elseif($row->supreme_court_status == 2)
                                <span class="badge badge-warning">Abolished</span>
                                @else
                                <span class="badge badge-secondary">N/A</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">No Data Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Chart Section -->
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <h6 class="font-weight-bold mb-3">Supreme Court Distribution</h6>
                    <div style="position: relative; height: 320px; width: 100%;">
                        <canvas id="q1PieChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
(function() {
    function initQ1PieChart() {
        var canvasElem = document.getElementById('q1PieChart');
        if (!canvasElem) return;

        if (typeof Chart === 'undefined') {
            setTimeout(initQ1PieChart, 150);
            return;
        }

        var ctx = canvasElem.getContext('2d');

        if (window.q1ChartInstance) {
            window.q1ChartInstance.destroy();
        }

        // Blade data safely converted to JS
        var chartData = [
            Number(@json($status1_count ?? 0)),
            Number(@json($status2_count ?? 0))
        ];

        window.q1ChartInstance = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    'Revised (' + @json($status1_percentage) + '%)',
                    'Abolished (' + @json($status2_percentage) + '%)'
                ],
                datasets: [{
                    data: chartData,
                    backgroundColor: ['#007bff', '#ffc107'],
                    hoverBackgroundColor: ['#0056b3', '#d39e00'],
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

    // Event Binding
    if (typeof $ !== 'undefined') {
        $(document).ready(function() {
            initQ1PieChart();

            $(document).on('shown.bs.collapse', '#Question-1', function() {
                initQ1PieChart();
            });
        });
    } else {
        document.addEventListener("DOMContentLoaded", initQ1PieChart);
    }
})();
</script>
@endif