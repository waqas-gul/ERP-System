<!-- /modules/customer_relationship_management/customer_database.php -->
<?php include('../../includes/header.php'); ?>
<?php include('../../includes/db_connect.php'); ?>

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h2 class="text-4xl font-extrabold text-indigo-900 mb-6 text-center">Customer Database</h2>

    <!-- Form for Adding New Customer -->
    <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
        <h3 class="text-2xl font-semibold text-indigo-700 mb-4">Add New Customer</h3>
        <form action="" method="POST" class="space-y-4">
            <div class="form-group">
                <label for="customer_name" class="block text-gray-800 font-medium">Customer Name:</label>
                <input type="text" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="customer_name" name="customer_name" required>
            </div>
            <div class="form-group">
                <label for="customer_email" class="block text-gray-800 font-medium">Email:</label>
                <input type="email" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="customer_email" name="customer_email" required>
            </div>
            <div class="form-group">
                <label for="customer_phone" class="block text-gray-800 font-medium">Phone:</label>
                <input type="text" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="customer_phone" name="customer_phone" required>
            </div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-700 transition-colors duration-300 w-full" name="add_customer">Add Customer</button>
        </form>

        <?php
        // Handle form submission to add new customer
        if (isset($_POST['add_customer'])) {
            $customer_name = $_POST['customer_name'];
            $customer_email = $_POST['customer_email'];
            $customer_phone = $_POST['customer_phone'];

            $sql = "INSERT INTO customer_database (customer_name, customer_email, customer_phone) 
                    VALUES ('$customer_name', '$customer_email', '$customer_phone')";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg mt-4' role='alert'>
                          <strong class='font-bold'>Success!</strong> 
                          <span class='block sm:inline'>New customer added successfully</span>
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

    <!-- Display Customer Records -->
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h3 class="text-3xl font-semibold text-indigo-800 mb-4">Customer List</h3>
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-left font-medium">Customer Name</th>
                    <th class="py-3 px-4 text-left font-medium">Email</th>
                    <th class="py-3 px-4 text-left font-medium">Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM customer_database ORDER BY id DESC");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='hover:bg-gray-50 transition-colors duration-200'>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['customer_name']) . "</td>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['customer_email']) . "</td>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['customer_phone']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='py-3 px-4 border-b text-center text-gray-500'>No customers found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('../../includes/footer.php'); ?>
