<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 16 Report</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid my-4">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h5 class="m-0 font-weight-bold">% distribution of participants (Question 16)</h5>
            </div>
            <div class="card-body">

                <!-- Table Section -->
                <div class="table-responsive mb-5">
                    <table class="table table-bordered text-center align-middle">
                        <thead class="thead-light">
                            <tr>
                                <th>Location</th>
                                <th>Category</th>
                                <th>Men</th>
                                <th>Women</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_sixteen as $row)
                            @php
                            $row_total = ($row->total_q16 > 0) ? $row->total_q16 : ($row->men_q16 + $row->women_q16);
                            @endphp
                            <tr>
                                <td>{{ $row->location_q16 }}</td>

                                <!-- Category Condition Logic -->
                                <td>{{ $category_lists[$row->category_q16] ?? 'N/A' }}</td>

                                <td>{{ $row->men_q16 }}</td>
                                <td>{{ $row->women_q16 }}</td>
                                <td>{{ $row_total }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="font-weight-bold bg-light">
                            <tr>
                                <td colspan="2" class="text-right">Total</td>
                                <td>{{ $total_men }}</td>
                                <td>{{ $total_women }}</td>
                                <td>{{ $grand_total }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Pie Chart Section -->
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        <h6 class="font-weight-bold mb-3">Gender Wise Distribution</h6>
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

        var menPct = parseFloat("{{ $men_percentage }}") || 0;
        var womenPct = parseFloat("{{ $women_percentage }}") || 0;

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    'Total Men (' + menPct + '%)',
                    'Total Women (' + womenPct + '%)'
                ],
                datasets: [{
                    data: [menPct, womenPct],
                    backgroundColor: ['#36A2EB', '#FF6384'],
                    hoverBackgroundColor: ['#2BC0E4', '#FF416C'],
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