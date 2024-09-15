<!-- /modules/supply_chain_management/procurement.php -->
<?php include('../../includes/header.php'); ?>
<?php include('../../includes/db_connect.php'); ?>

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h2 class="text-4xl font-extrabold text-indigo-900 mb-6 text-center">Procurement Management</h2>

    <!-- Form for Adding New Procurement -->
    <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
        <h3 class="text-2xl font-semibold text-indigo-700 mb-4">Add New Procurement</h3>
        <form action="" method="POST" class="space-y-4">
            <div class="form-group">
                <label for="procurement_item" class="block text-gray-800 font-medium">Item Name:</label>
                <input type="text" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="procurement_item" name="procurement_item" required>
            </div>
            <div class="form-group">
                <label for="procurement_quantity" class="block text-gray-800 font-medium">Quantity:</label>
                <input type="number" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="procurement_quantity" name="procurement_quantity" required>
            </div>
            <div class="form-group">
                <label for="procurement_date" class="block text-gray-800 font-medium">Procurement Date:</label>
                <input type="date" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="procurement_date" name="procurement_date" required>
            </div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-700 transition-colors duration-300 w-full" name="add_procurement">Add Procurement</button>
        </form>

        <?php
        // Handle form submission to add new procurement
        if (isset($_POST['add_procurement'])) {
            $procurement_item = $_POST['procurement_item'];
            $procurement_quantity = $_POST['procurement_quantity'];
            $procurement_date = $_POST['procurement_date'];

            $sql = "INSERT INTO procurement (procurement_item, procurement_quantity, procurement_date) 
                    VALUES ('$procurement_item', '$procurement_quantity', '$procurement_date')";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg mt-4' role='alert'>
                          <strong class='font-bold'>Success!</strong> 
                          <span class='block sm:inline'>New procurement added successfully</span>
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

    <!-- Display Procurement Records -->
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h3 class="text-3xl font-semibold text-indigo-800 mb-4">Procurement Records</h3>
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-left font-medium">Item Name</th>
                    <th class="py-3 px-4 text-left font-medium">Quantity</th>
                    <th class="py-3 px-4 text-left font-medium">Procurement Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM procurement ORDER BY id DESC");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='hover:bg-gray-50 transition-colors duration-200'>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['procurement_item']) . "</td>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['procurement_quantity']) . "</td>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['procurement_date']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='py-3 px-4 border-b text-center text-gray-500'>No procurement records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('../../includes/footer.php'); ?>
