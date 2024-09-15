<!-- /modules/customer_relationship_management/feedback_surveys.php -->
<?php include('../../includes/header.php'); ?>
<?php include('../../includes/db_connect.php'); ?>

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h2 class="text-4xl font-extrabold text-indigo-900 mb-6 text-center">Feedback and Surveys</h2>

    <!-- Form for Adding New Feedback -->
    <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
        <h3 class="text-2xl font-semibold text-indigo-700 mb-4">Add New Feedback</h3>
        <form action="" method="POST" class="space-y-4">
            <div class="form-group">
                <label for="feedback_text" class="block text-gray-800 font-medium">Feedback:</label>
                <textarea class="form-control w-full p-3 border border-gray-300 rounded-lg" id="feedback_text" name="feedback_text" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="feedback_date" class="block text-gray-800 font-medium">Feedback Date:</label>
                <input type="date" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="feedback_date" name="feedback_date" required>
            </div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-700 transition-colors duration-300 w-full" name="add_feedback">Add Feedback</button>
        </form>

        <?php
        // Handle form submission to add new feedback
        if (isset($_POST['add_feedback'])) {
            $feedback_text = $_POST['feedback_text'];
            $feedback_date = $_POST['feedback_date'];

            $sql = "INSERT INTO feedback_surveys (feedback_text, feedback_date) 
                    VALUES ('$feedback_text', '$feedback_date')";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg mt-4' role='alert'>
                          <strong class='font-bold'>Success!</strong> 
                          <span class='block sm:inline'>New feedback added successfully</span>
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

    <!-- Display Feedback Records -->
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h3 class="text-3xl font-semibold text-indigo-800 mb-4">Feedback Records</h3>
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-left font-medium">Feedback</th>
                    <th class="py-3 px-4 text-left font-medium">Feedback Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM feedback_surveys ORDER BY id DESC");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='hover:bg-gray-50 transition-colors duration-200'>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['feedback_text']) . "</td>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['feedback_date']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2' class='py-3 px-4 border-b text-center text-gray-500'>No feedback records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('../../includes/footer.php'); ?>
