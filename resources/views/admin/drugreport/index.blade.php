@extends('layouts.sidebar')
@section('container')
<div class="container">
    <h2>Drug Usage Report</h2>
    <div class="row">
        <div class="col-md-12">
            <h3>Drug Usage Table</h3>
            <table id="datatable1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Drug Name</th>
                        <th>Brand ID</th>
                        <th>Description</th>
                        <th>Category ID</th>
                        <th>Total Amount Used</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usedReport as $item)
                        <tr>
                            <td>{{ $item->drug_name }}</td>
                            <td>{{ $item->brand_id }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->category_id }}</td>
                            <td>{{ $item->total_amount }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3>Drugs Added</h3>
            <canvas id="drugsAddedChart"></canvas>
        </div>
        <div class="col-md-6">
            <h3>Drugs Used</h3>
            <canvas id="drugsUsedChart"></canvas>
        </div>
    </div>
</div>

<!-- Include jQuery and DataTables CSS/JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
$(document).ready(function() {
    // Data for drugs added
    var addedLabels = @json($addedReport->pluck('drug_name'));
    var addedData = @json($addedReport->pluck('total_stock'));

    // Data for drugs used
    var usedLabels = @json($usedReport->pluck('drug_name'));
    var usedData = @json($usedReport->pluck('total_amount'));

    // Drugs Added Chart
    var ctxAdded = document.getElementById('drugsAddedChart').getContext('2d');
    new Chart(ctxAdded, {
        type: 'bar',
        data: {
            labels: addedLabels,
            datasets: [{
                label: 'Total Stock Added',
                data: addedData,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Drugs Used Chart
    var ctxUsed = document.getElementById('drugsUsedChart').getContext('2d');
    new Chart(ctxUsed, {
        type: 'bar',
        data: {
            labels: usedLabels,
            datasets: [{
                label: 'Total Amount Used',
                data: usedData,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
@endsection
