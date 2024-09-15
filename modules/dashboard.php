<?php include('../includes/header.php'); ?>
<?php include('../includes/db_connect.php'); ?>

<!-- Main container for sidebar and content -->
<div class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <div class="sidebar w-64 bg-indigo-700 text-white flex flex-col">
        <div class="p-4 flex items-center justify-center border-b border-gray-700">
            <h1 class="text-2xl font-bold">admin</h1>
        </div>
        <nav class="flex-1 mt-7">
            <ul>
                <li><a href="#" class="block px-6 py-4 text-white hover:bg-indigo-900">Dashboard</a></li>
                <li><a href="#" class="block px-6 py-4 text-white hover:bg-indigo-900">Sales</a></li>
                <li><a href="#" class="block px-6 py-4 text-white hover:bg-indigo-900">Marketing</a></li>
                <li><a href="#" class="block px-6 py-4 text-white hover:bg-indigo-900">CRM</a></li>
                <li><a href="#" class="block px-6 py-4 text-white hover:bg-indigo-900">Reports</a></li>
            </ul>
        </nav>
        <div class="p-4 border-t border-gray-700">
            <a href="#" class="block px-4 py-2 text-white hover:bg-indigo-900">Logout</a>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Header -->
        <header class="flex items-center justify-between p-6 bg-white shadow mb-4">
            <h2 class="text-3xl font-semibold text-gray-800">Dashboard</h2>
            <div class="flex items-center space-x-4">
                <button class="p-2 bg-gray-200 rounded-full text-gray-800 hover:bg-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7H5"></path>
                    </svg>
                </button>
                <button class="p-2 bg-gray-200 rounded-full text-gray-800 hover:bg-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h18M4 11h16M5 17h14"></path>
                    </svg>
                </button>
                <button class="p-2 bg-gray-200 rounded-full text-gray-800 hover:bg-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15a4 4 0 01-4 4H7a4 4 0 01-4-4V6a4 4 0 014-4h10a4 4 0 014 4v9z"></path>
                    </svg>
                </button>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-6">
                <!-- Card 1: Total Sales -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Total Sales</h3>
                    <canvas id="salesChart" class="w-full h-64"></canvas>
                </div>
                <!-- Card 2: Customer Feedback -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Customer Feedback</h3>
                    <canvas id="feedbackChart" class="w-full h-64"></canvas>
                </div>
                <!-- Card 3: Recent Activities -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Recent Activities</h3>
                    <ul>
                        <li class="border-b py-2">Activity 1</li>
                        <li class="border-b py-2">Activity 2</li>
                        <li class="border-b py-2">Activity 3</li>
                    </ul>
                </div>
            </div>
        </main>
    </div>
</div>

<script>// Initialize charts with Chart.js
const salesCtx = document.getElementById('salesChart').getContext('2d');
new Chart(salesCtx, {
    type: 'bar',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May'],
        datasets: [{
            label: 'Sales',
            data: [12, 19, 3, 5, 2],
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

const feedbackCtx = document.getElementById('feedbackChart').getContext('2d');
new Chart(feedbackCtx, {
    type: 'pie',
    data: {
        labels: ['Positive', 'Neutral', 'Negative'],
        datasets: [{
            label: 'Feedback',
            data: [55, 30, 15],
            backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(255, 99, 132, 0.2)'],
            borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(255, 99, 132, 1)'],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true
    }
});</script>



<?php include('../includes/footer.php'); ?>
