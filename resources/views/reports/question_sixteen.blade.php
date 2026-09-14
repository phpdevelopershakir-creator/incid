<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 1 Report</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid my-4">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h5 class="m-0 font-weight-bold">% distribution of participants (Question 1)</h5>
            </div>
            <div class="card-body">

                <!-- 1. Summary Table (Revised, Abolished & Grand Total in One Row) -->
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
                                        <span class="badge badge-primary p-2 fs-6">
                                            {{ $status1_count }} ({{ $status1_percentage }}%)
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-warning p-2 fs-6">
                                            {{ $status2_count }} ({{ $status2_percentage }}%)
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-dark p-2 fs-6">
                                            {{ $grand_total }}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- 2. Main Data List Table Section -->
                <div class="table-responsive mb-5">
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
                        <tfoot class="font-weight-bold bg-light">
                            <tr>
                                <td colspan="2" class="text-right">Total Count (Revised + Abolished)</td>
                                <td>{{ $grand_total }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- 3. Pie Chart Section -->
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        <h6 class="font-weight-bold mb-3">Supreme Court Distribution</h6>
                        <div style="position: relative; height: 320px; width: 100%;">
                            <canvas id="q16PieChart"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Scripts (jQuery & Chart.js CDN) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var canvasElem = document.getElementById('q16PieChart');
        if (!canvasElem) return;

        var ctx = canvasElem.getContext('2d');

        var status1Pct = parseFloat("{{ $status1_percentage }}") || 0;
        var status2Pct = parseFloat("{{ $status2_percentage }}") || 0;
        var status1Count = parseInt("{{ $status1_count }}") || 0;
        var status2Count = parseInt("{{ $status2_count }}") || 0;

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    'Revised (' + status1Pct + '%)',
                    'Abolished (' + status2Pct + '%)'
                ],
                datasets: [{
                    data: [status1Count, status2Count],
                    backgroundColor: [
                        '#007bff',
                        '#ffc107'
                    ], // Bootstrap Primary & Warning Colors
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
    });
    </script>
</body>

</html>