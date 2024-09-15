<!-- /modules/customer_relationship_management/customer_support.php -->
<?php include('../../includes/header.php'); ?>
<?php include('../../includes/db_connect.php'); ?>

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h2 class="text-4xl font-extrabold text-indigo-900 mb-6 text-center">Customer Support</h2>

    <!-- Form for Adding New Support Request -->
    <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
        <h3 class="text-2xl font-semibold text-indigo-700 mb-4">Add New Support Request</h3>
        <form action="" method="POST" class="space-y-4">
            <div class="form-group">
                <label for="support_request" class="block text-gray-800 font-medium">Support Request:</label>
                <textarea class="form-control w-full p-3 border border-gray-300 rounded-lg" id="support_request" name="support_request" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="request_date" class="block text-gray-800 font-medium">Request Date:</label>
                <input type="date" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="request_date" name="request_date" required>
            </div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-700 transition-colors duration-300 w-full" name="add_support_request">Add Support Request</button>
        </form>

        <?php
        // Handle form submission to add new support request
        if (isset($_POST['add_support_request'])) {
            $support_request = $_POST['support_request'];
            $request_date = $_POST['request_date'];

            $sql = "INSERT INTO customer_support (support_request, request_date) 
                    VALUES ('$support_request', '$request_date')";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg mt-4' role='alert'>
                          <strong class='font-bold'>Success!</strong> 
                          <span class='block sm:inline'>New support request added successfully</span>
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

    <!-- Display Support Request Records -->
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h3 class="text-3xl font-semibold text-indigo-800 mb-4">Support Requests</h3>
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-left font-medium">Support Request</th>
                    <th class="py-3 px-4 text-left font-medium">Request Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM customer_support ORDER BY id DESC");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='hover:bg-gray-50 transition-colors duration-200'>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['support_request']) . "</td>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['request_date']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2' class='py-3 px-4 border-b text-center text-gray-500'>No support requests found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('../../includes/footer.php'); ?>
