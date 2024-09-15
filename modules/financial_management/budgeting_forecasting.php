<!-- /modules/financial_management/budgeting_forecasting.php -->
<?php include('../../includes/header.php'); ?>
<?php include('../../includes/db_connect.php'); ?>

<div class="container mx-auto px-4 py-8">
    <h2 class="text-4xl font-bold text-indigo-800 mb-6">Budgeting and Forecasting Management</h2>

    <!-- Form for Adding New Budget -->
    <form action="" method="POST" class="bg-white shadow-lg rounded-lg p-6 mb-6 space-y-4">
        <h3 class="text-2xl font-semibold text-indigo-600 mb-4">Add New Budget</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="form-group">
                <label for="year" class="block text-gray-700 font-medium mb-1">Year:</label>
                <input type="number" class="form-control w-full p-3 border rounded-lg shadow-sm" id="year" name="year" required>
            </div>
            <div class="form-group">
                <label for="budget_amount" class="block text-gray-700 font-medium mb-1">Budget Amount:</label>
                <input type="number" class="form-control w-full p-3 border rounded-lg shadow-sm" id="budget_amount" name="budget_amount" step="0.01" required>
            </div>
        </div>
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-700 transition-colors duration-300" name="add_budget">Add Budget</button>
    </form>

    <?php
    // Handle form submission to add new budget
    if (isset($_POST['add_budget'])) {
        $year = $_POST['year'];
        $budget_amount = $_POST['budget_amount'];

        $sql = "INSERT INTO budgeting_forecasting (year, budget_amount) VALUES ('$year', '$budget_amount')";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative' role='alert'>
                      <strong class='font-bold'>Success!</strong>
                      <span class='block sm:inline'>New budget added successfully</span>
                  </div>";
        } else {
            echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
                      <strong class='font-bold'>Error!</strong>
                      <span class='block sm:inline'>Error: " . $conn->error . "</span>
                  </div>";
        }
    }
    ?>

    <!-- Display Budgets -->
    <h3 class="text-3xl font-bold text-indigo-700 mb-4">Budgets</h3>
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-3 px-4 border-b text-left text-gray-700">Year</th>
                <th class="py-3 px-4 border-b text-left text-gray-700">Budget Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM budgeting_forecasting ORDER BY year DESC");
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr class='hover:bg-gray-50'>";
                    echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row['year']) . "</td>";
                    echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row['budget_amount']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2' class='py-2 px-4 border-b text-center text-gray-600'>No budgets found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include('../../includes/footer.php'); ?>
