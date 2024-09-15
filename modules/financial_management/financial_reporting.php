<!-- /modules/financial_management/financial_reporting.php -->
<?php include('../../includes/header.php'); ?>
<?php include('../../includes/db_connect.php'); ?>

<div class="container mx-auto px-4 py-8">
    <h2 class="text-4xl font-bold text-indigo-800 mb-6">Financial Reporting</h2>

    <!-- Generate Financial Report Form -->
    <div class="bg-white shadow-lg rounded-lg p-6 mb-6 space-y-4">
        <h3 class="text-2xl font-semibold text-indigo-600 mb-4">Generate Financial Report</h3>
        <form action="" method="POST" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Date Range: Start Date -->
                <div class="form-group">
                    <label for="start_date" class="block text-gray-700 font-medium mb-1">Start Date:</label>
                    <input type="date" class="form-control w-full p-3 border rounded-lg shadow-sm" id="start_date" name="start_date" required>
                </div>
                <!-- Date Range: End Date -->
                <div class="form-group">
                    <label for="end_date" class="block text-gray-700 font-medium mb-1">End Date:</label>
                    <input type="date" class="form-control w-full p-3 border rounded-lg shadow-sm" id="end_date" name="end_date" required>
                </div>
            </div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-700 transition-colors duration-300" name="generate_report">Generate Report</button>
        </form>
    </div>

    <!-- Display Generated Report -->
    <?php
    if (isset($_POST['generate_report'])) {
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        // Validate date inputs
        if ($start_date <= $end_date) {
            // Fetch total debits and credits within the date range
            $sql = "SELECT SUM(debit) as total_debits, SUM(credit) as total_credits 
                    FROM general_ledger 
                    WHERE date >= '$start_date' AND date <= '$end_date'";
            $result = $conn->query($sql);

            if ($row = $result->fetch_assoc()) {
                echo "
                <div class='bg-white shadow-lg rounded-lg p-6 mb-6 space-y-4'>
                    <h3 class='text-2xl font-semibold text-indigo-600 mb-4'>Report from " . htmlspecialchars($start_date) . " to " . htmlspecialchars($end_date) . "</h3>
                    <table class='min-w-full bg-white border border-gray-200 rounded-lg shadow-md'>
                        <thead class='bg-gray-100'>
                            <tr>
                                <th class='py-3 px-4 border-b text-left text-gray-700'>Total Debits</th>
                                <th class='py-3 px-4 border-b text-left text-gray-700'>Total Credits</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class='hover:bg-gray-50'>
                                <td class='py-2 px-4 border-b'>" . htmlspecialchars($row['total_debits']) . "</td>
                                <td class='py-2 px-4 border-b'>" . htmlspecialchars($row['total_credits']) . "</td>
                            </tr>
                        </tbody>
                    </table>
                </div>";
            } else {
                echo "
                <div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
                    <strong class='font-bold'>Error:</strong>
                    <span class='block sm:inline'>No data found for the selected date range.</span>
                </div>";
            }
        } else {
            echo "
            <div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
                <strong class='font-bold'>Error:</strong>
                <span class='block sm:inline'>The start date cannot be greater than the end date.</span>
            </div>";
        }
    }
    ?>

</div>

<?php include('../../includes/footer.php'); ?>
