<!-- /modules/supply_chain_management/inventory_management.php -->
<?php include('../../includes/header.php'); ?>
<?php include('../../includes/db_connect.php'); ?>

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h2 class="text-4xl font-extrabold text-indigo-900 mb-6 text-center">Inventory Management</h2>

    <!-- Form for Adding New Inventory Item -->
    <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
        <h3 class="text-2xl font-semibold text-indigo-700 mb-4">Add New Inventory Item</h3>
        <form action="" method="POST" class="space-y-4">
            <div class="form-group">
                <label for="item_name" class="block text-gray-800 font-medium">Item Name:</label>
                <input type="text" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="item_name" name="item_name" required>
            </div>
            <div class="form-group">
                <label for="item_quantity" class="block text-gray-800 font-medium">Quantity:</label>
                <input type="number" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="item_quantity" name="item_quantity" required>
            </div>
            <div class="form-group">
                <label for="item_price" class="block text-gray-800 font-medium">Price:</label>
                <input type="number" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="item_price" name="item_price" step="0.01" required>
            </div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-700 transition-colors duration-300" name="add_item">Add Item</button>
        </form>

        <?php
        // Handle form submission to add new inventory item
        if (isset($_POST['add_item'])) {
            $item_name = $_POST['item_name'];
            $item_quantity = $_POST['item_quantity'];
            $item_price = $_POST['item_price'];

            $sql = "INSERT INTO inventory_management (item_name, item_quantity, item_price) 
                    VALUES ('$item_name', '$item_quantity', '$item_price')";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg mt-4' role='alert'>
                          <strong class='font-bold'>Success!</strong> 
                          <span class='block sm:inline'>New inventory item added successfully</span>
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

    <!-- Display Inventory Records -->
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h3 class="text-3xl font-semibold text-indigo-800 mb-4">Inventory List</h3>
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-left font-medium">Item Name</th>
                    <th class="py-3 px-4 text-left font-medium">Quantity</th>
                    <th class="py-3 px-4 text-left font-medium">Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM inventory_management ORDER BY id DESC");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='hover:bg-gray-50 transition-colors duration-200'>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['item_name']) . "</td>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['item_quantity']) . "</td>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars(number_format($row['item_price'], 2)) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='py-3 px-4 border-b text-center text-gray-500'>No inventory items found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('../../includes/footer.php'); ?>
