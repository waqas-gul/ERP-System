<!-- /modules/supply_chain_management/supplier_management.php -->
<?php include('../../includes/header.php'); ?>
<?php include('../../includes/db_connect.php'); ?>

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h2 class="text-4xl font-extrabold text-indigo-900 mb-6 text-center">Supplier Management</h2>

    <!-- Form for Adding New Supplier -->
    <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
        <h3 class="text-2xl font-semibold text-indigo-700 mb-4">Add New Supplier</h3>
        <form action="" method="POST" class="space-y-4">
            <div class="form-group">
                <label for="supplier_name" class="block text-gray-800 font-medium">Supplier Name:</label>
                <input type="text" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="supplier_name" name="supplier_name" required>
            </div>
            <div class="form-group">
                <label for="supplier_contact" class="block text-gray-800 font-medium">Contact Information:</label>
                <input type="text" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="supplier_contact" name="supplier_contact" required>
            </div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-700 transition-colors duration-300 w-full" name="add_supplier">Add Supplier</button>
        </form>

        <?php
        // Handle form submission to add new supplier
        if (isset($_POST['add_supplier'])) {
            $supplier_name = $_POST['supplier_name'];
            $supplier_contact = $_POST['supplier_contact'];

            $sql = "INSERT INTO supplier_management (supplier_name, supplier_contact) 
                    VALUES ('$supplier_name', '$supplier_contact')";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg mt-4' role='alert'>
                          <strong class='font-bold'>Success!</strong> 
                          <span class='block sm:inline'>New supplier added successfully</span>
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

    <!-- Display Supplier Records -->
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h3 class="text-3xl font-semibold text-indigo-800 mb-4">Supplier List</h3>
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-left font-medium">Supplier Name</th>
                    <th class="py-3 px-4 text-left font-medium">Contact Information</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM supplier_management ORDER BY id DESC");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='hover:bg-gray-50 transition-colors duration-200'>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['supplier_name']) . "</td>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['supplier_contact']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2' class='py-3 px-4 border-b text-center text-gray-500'>No suppliers found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('../../includes/footer.php'); ?>
