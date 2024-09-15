<!-- /modules/customer_relationship_management/sales_management.php -->
<?php include('../../includes/header.php'); ?>
<?php include('../../includes/db_connect.php'); ?>

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h2 class="text-4xl font-extrabold text-blue-900 mb-6 text-center">Sales Management</h2>

    <!-- Form for Adding New Sale Opportunity -->
    <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
        <h3 class="text-2xl font-semibold text-blue-700 mb-4">Add New Sales Opportunity</h3>
        <form action="" method="POST" class="space-y-4">
            <div class="form-group">
                <label for="sales_opportunity" class="block text-gray-800 font-medium">Sales Opportunity:</label>
                <input type="text" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="sales_opportunity" name="sales_opportunity" required>
            </div>
            <div class="form-group">
                <label for="sales_amount" class="block text-gray-800 font-medium">Amount:</label>
                <input type="number" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="sales_amount" name="sales_amount" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="sales_date" class="block text-gray-800 font-medium">Opportunity Date:</label>
                <input type="date" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="sales_date" name="sales_date" required>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition-colors duration-300 w-full" name="add_sales">Add Sales Opportunity</button>
        </form>

        <?php
        // Handle form submission to add new sales opportunity
        if (isset($_POST['add_sales'])) {
            $sales_opportunity = $_POST['sales_opportunity'];
            $sales_amount = $_POST['sales_amount'];
            $sales_date = $_POST['sales_date'];

            $sql = "INSERT INTO sales_management (sales_opportunity, sales_amount, sales_date) 
                    VALUES ('$sales_opportunity', '$sales_amount', '$sales_date')";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg mt-4' role='alert'>
                          <strong class='font-bold'>Success!</strong> 
                          <span class='block sm:inline'>New sales opportunity added successfully</span>
                      </div>";
            } else {
                echo "<div class='bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded-lg mt-4' role='alert'>
                          <strong class='font-bold'>Error!</strong> 
                          <span class='block sm:inline'>Error: " . htmlspecialchars($conn->error) . "</span>
                      </div>";
            }
        }
        ?>
    </div>

    <!-- Display Sales Records -->
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h3 class="text-3xl font-semibold text-blue-800 mb-4">Sales Opportunities</h3>
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-left font-medium">Sales Opportunity</th>
                    <th class="py-3 px-4 text-left font-medium">Amount</th>
                    <th class="py-3 px-4 text-left font-medium">Opportunity Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM sales_management ORDER BY id DESC");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='hover:bg-gray-50 transition-colors duration-200'>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['sales_opportunity']) . "</td>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['sales_amount']) . "</td>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['sales_date']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='py-3 px-4 border-b text-center text-gray-500'>No sales opportunities found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('../../includes/footer.php'); ?>
