<!-- /modules/customer_relationship_management/marketing_automation.php -->
<?php include('../../includes/header.php'); ?>
<?php include('../../includes/db_connect.php'); ?>

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h2 class="text-4xl font-extrabold text-indigo-900 mb-6 text-center">Marketing Automation</h2>

    <!-- Form for Adding New Marketing Campaign -->
    <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
        <h3 class="text-2xl font-semibold text-indigo-700 mb-4">Add New Campaign</h3>
        <form action="" method="POST" class="space-y-4">
            <div class="form-group">
                <label for="campaign_name" class="block text-gray-800 font-medium">Campaign Name:</label>
                <input type="text" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="campaign_name" name="campaign_name" required>
            </div>
            <div class="form-group">
                <label for="campaign_start_date" class="block text-gray-800 font-medium">Start Date:</label>
                <input type="date" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="campaign_start_date" name="campaign_start_date" required>
            </div>
            <div class="form-group">
                <label for="campaign_end_date" class="block text-gray-800 font-medium">End Date:</label>
                <input type="date" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="campaign_end_date" name="campaign_end_date" required>
            </div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-700 transition-colors duration-300 w-full" name="add_campaign">Add Campaign</button>
        </form>

        <?php
        // Handle form submission to add new marketing campaign
        if (isset($_POST['add_campaign'])) {
            $campaign_name = $_POST['campaign_name'];
            $campaign_start_date = $_POST['campaign_start_date'];
            $campaign_end_date = $_POST['campaign_end_date'];

            $sql = "INSERT INTO marketing_automation (campaign_name, campaign_start_date, campaign_end_date) 
                    VALUES ('$campaign_name', '$campaign_start_date', '$campaign_end_date')";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg mt-4' role='alert'>
                          <strong class='font-bold'>Success!</strong> 
                          <span class='block sm:inline'>New marketing campaign added successfully</span>
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

    <!-- Display Marketing Campaign Records -->
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h3 class="text-3xl font-semibold text-indigo-800 mb-4">Marketing Campaigns</h3>
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-left font-medium">Campaign Name</th>
                    <th class="py-3 px-4 text-left font-medium">Start Date</th>
                    <th class="py-3 px-4 text-left font-medium">End Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM marketing_automation ORDER BY id DESC");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='hover:bg-gray-50 transition-colors duration-200'>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['campaign_name']) . "</td>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['campaign_start_date']) . "</td>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['campaign_end_date']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='py-3 px-4 border-b text-center text-gray-500'>No marketing campaigns found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('../../includes/footer.php'); ?>
