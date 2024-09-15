<!-- /modules/supply_chain_management/order_management.php -->
<?php include('../../includes/header.php'); ?>
<?php include('../../includes/db_connect.php'); ?>

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h2 class="text-4xl font-extrabold text-indigo-900 mb-6 text-center">Order Management</h2>

    <!-- Form for Adding New Order -->
    <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
        <h3 class="text-2xl font-semibold text-indigo-700 mb-4">Add New Order</h3>
        <form action="" method="POST" class="space-y-4">
            <div class="form-group">
                <label for="order_item" class="block text-gray-800 font-medium">Order Item:</label>
                <input type="text" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="order_item" name="order_item" required>
            </div>
            <div class="form-group">
                <label for="order_quantity" class="block text-gray-800 font-medium">Quantity:</label>
                <input type="number" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="order_quantity" name="order_quantity" required>
            </div>
            <div class="form-group">
                <label for="order_date" class="block text-gray-800 font-medium">Order Date:</label>
                <input type="date" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="order_date" name="order_date" required>
            </div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-700 transition-colors duration-300 w-full" name="add_order">Add Order</button>
        </form>

        <?php
        // Handle form submission to add new order
        if (isset($_POST['add_order'])) {
            $order_item = $_POST['order_item'];
            $order_quantity = $_POST['order_quantity'];
            $order_date = $_POST['order_date'];

            $sql = "INSERT INTO order_management (order_item, order_quantity, order_date) 
                    VALUES ('$order_item', '$order_quantity', '$order_date')";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg mt-4' role='alert'>
                          <strong class='font-bold'>Success!</strong> 
                          <span class='block sm:inline'>New order added successfully</span>
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

    <!-- Display Order Records -->
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h3 class="text-3xl font-semibold text-indigo-800 mb-4">Order List</h3>
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-left font-medium">Order Item</th>
                    <th class="py-3 px-4 text-left font-medium">Quantity</th>
                    <th class="py-3 px-4 text-left font-medium">Order Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM order_management ORDER BY id DESC");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='hover:bg-gray-50 transition-colors duration-200'>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['order_item']) . "</td>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['order_quantity']) . "</td>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['order_date']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='py-3 px-4 border-b text-center text-gray-500'>No orders found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('../../includes/footer.php'); ?>
