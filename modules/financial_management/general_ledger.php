<!-- /modules/financial_management/general_ledger.php -->
<?php include('../../includes/header.php'); ?>
<?php include('../../includes/db_connect.php'); ?>

<div class="container mx-auto px-4 py-8">
    <h2 class="text-4xl font-extrabold text-indigo-900 mb-6">General Ledger Management</h2>

    <!-- Form for Adding New Ledger Entry -->
    <div class="bg-white shadow-lg rounded-lg p-8 mb-6 space-y-6">
        <h3 class="text-2xl font-semibold text-indigo-700 mb-4">Add New Entry</h3>
        <form action="" method="POST" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-group">
                    <label for="date" class="block text-gray-800 font-medium">Date:</label>
                    <input type="date" class="form-control w-full p-3 border border-gray-300 rounded-lg shadow-sm" id="date" name="date" required>
                </div>
                <div class="form-group">
                    <label for="description" class="block text-gray-800 font-medium">Description:</label>
                    <input type="text" class="form-control w-full p-3 border border-gray-300 rounded-lg shadow-sm" id="description" name="description" required>
                </div>
                <div class="form-group">
                    <label for="debit" class="block text-gray-800 font-medium">Debit:</label>
                    <input type="number" class="form-control w-full p-3 border border-gray-300 rounded-lg shadow-sm" id="debit" name="debit" step="0.01">
                </div>
                <div class="form-group">
                    <label for="credit" class="block text-gray-800 font-medium">Credit:</label>
                    <input type="number" class="form-control w-full p-3 border border-gray-300 rounded-lg shadow-sm" id="credit" name="credit" step="0.01">
                </div>
            </div>
            <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-indigo-700 transition-colors duration-300" name="add_entry">Add Entry</button>
        </form>

        <?php
        // Handle form submission to add new ledger entry
        if (isset($_POST['add_entry'])) {
            $date = $_POST['date'];
            $description = $_POST['description'];
            $debit = $_POST['debit'] ?: 0;
            $credit = $_POST['credit'] ?: 0;

            $sql = "INSERT INTO general_ledger (date, description, debit, credit) VALUES ('$date', '$description', '$debit', '$credit')";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg shadow-md' role='alert'>
                          <strong class='font-bold'>Success!</strong>
                          <span class='block sm:inline'>New entry added successfully</span>
                      </div>";
            } else {
                echo "<div class='bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded-lg shadow-md' role='alert'>
                          <strong class='font-bold'>Error!</strong>
                          <span class='block sm:inline'>Error: " . $conn->error . "</span>
                      </div>";
            }
        }
        ?>
    </div>

    <!-- Display General Ledger Entries -->
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h3 class="text-3xl font-semibold text-indigo-800 mb-4">General Ledger Entries</h3>
        <table class="w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-gray-50">
                <tr>
                    <th class="py-3 px-4 text-left text-gray-600 font-medium">Date</th>
                    <th class="py-3 px-4 text-left text-gray-600 font-medium">Description</th>
                    <th class="py-3 px-4 text-left text-gray-600 font-medium">Debit</th>
                    <th class="py-3 px-4 text-left text-gray-600 font-medium">Credit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM general_ledger ORDER BY date DESC");
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr class='hover:bg-gray-50 transition-colors duration-200'>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['date']) . "</td>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['description']) . "</td>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . number_format($row['debit'], 2) . "</td>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . number_format($row['credit'], 2) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='py-3 px-4 border-b text-center text-gray-600'>No entries found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('../../includes/footer.php'); ?>
