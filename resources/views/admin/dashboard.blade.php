<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <style>
        /* Add custom styles here */
        #salesGraph, #revenueGraph {
            width: 400px; /* Set fixed width */
            height: 300px; /* Set fixed height */
        }
    </style>
</head>
<body>
    <!-- Include the header component -->
    @include('components.header')

    <!-- Flex Container -->
    <div class="flex-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Include the sidebar component -->
            @include('components.sidebar')
            
        </div>

        <!-- Main Content -->
        <div class="content">
            <!-- Cards -->
              <!-- Cards -->
              <div class="card-container">
                <div class="card">
                    <!-- Card content for Today Sale -->
                    <i class="fas fa-shopping-cart"></i>
                    <h3>Today Sale</h3>
                    <!-- Content -->
                </div>
                <div class="card">
                    <!-- Card content for Total Today Revenue -->
                    <i class="fas fa-dollar-sign"></i>
                    <h3>Total Today Revenue</h3>
                    <!-- Content -->
                </div>
                <div class="card">
                    <!-- Card content for Total Revenue -->
                    <i class="fas fa-chart-line"></i>
                    <h3>Total Revenue</h3>
                    <!-- Content -->
                </div>
                <div class="card">
                    <!-- Card content for Total Sales -->
                    <i class="fas fa-chart-bar"></i>
                    <h3>Total Sales</h3>
                    <!-- Content -->
                </div>
            </div>

            <!-- Graphs -->
            <div class="graphs">
                <div class="graph">
                    <!-- Add canvas for the sales graph -->
                    
                    <h2>Sales Data Graph</h2>
                    <canvas id="salesGraph"></canvas>
                </div>
                <div class="graph">
                    <!-- Graph for Revenue data -->
                    <h2>Revenue Data Graph</h2>
                    <canvas id="revenueGraph"></canvas>
                </div>
            </div>

            
            <!-- Table -->
            <table class="invoices-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Invoice</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->date }}</td>
                        <td>{{ $invoice->invoice }}</td>
                        <td>{{ $invoice->customer }}</td>
                        <td>${{ number_format($invoice->amount, 2) }}</td>
                        <td>{{ $invoice->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- Include the footer component -->
    @include('components.footer')

    <script>
        // Placeholder sales data
        const salesData = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'], // Sample labels (e.g., months)
            datasets: [
                {
                    label: 'USA',
                    data: [/* Add USA sales data here */], // Replace with actual sales data
                    borderColor: 'blue',
                    fill: false
                },
                {
                    label: 'UK',
                    data: [/* Add UK sales data here */], // Replace with actual sales data
                    borderColor: 'red',
                    fill: false
                },
                {
                    label: 'AU',
                    data: [/* Add AU sales data here */], // Replace with actual sales data
                    borderColor: 'green',
                    fill: false
                }
            ]
        };

        // Placeholder revenue data
        const revenueData = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [
                {
                    label: 'USA',
                    data: [5000, 8000, 6000, 9000, 7000, 8500],
                    borderColor: 'blue',
                    fill: false
                },
                {
                    label: 'UK',
                    data: [4500, 7500, 5500, 8500, 6500, 8000],
                    borderColor: 'red',
                    fill: false
                },
                {
                    label: 'AU',
                    data: [4000, 7000, 5000, 8000, 6000, 7500],
                    borderColor: 'green',
                    fill: false
                }
            ]
        };

        // Create the sales graph
        const salesCtx = document.getElementById('salesGraph').getContext('2d');
        const salesChart = new Chart(salesCtx, {
            type: 'line',
            data: salesData,
            options: {
                responsive: false, 
                scales: {
                    xAxes: [{
                        ticks: {
                            maxTicksLimit: 10 
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            min: 0,
                            max: 1000
                        }
                    }]
                }
            }
        });

        // Create the revenue graph
        const revenueCtx = document.getElementById('revenueGraph').getContext('2d');
        const revenueChart = new Chart(revenueCtx, {
            type: 'line',
            data: revenueData,
            options: {
                responsive: false, 
                scales: {
                    xAxes: [{
                        ticks: {
                            maxTicksLimit: 10 
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            min: 0,
                            max: 10000 
                        }
                    }]
                }
            }
        });
    </script>
    

</body>
</html>
