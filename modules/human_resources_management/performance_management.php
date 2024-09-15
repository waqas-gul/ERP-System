<!-- /modules/human_resources_management/performance_management.php -->  
<?php include('../../includes/header.php'); ?>  
<?php include('../../includes/db_connect.php'); ?>  

<div class="container mx-auto px-4 py-8 max-w-4xl">  
    <h2 class="text-4xl font-extrabold text-indigo-900 mb-6">Performance Management</h2>  

    <!-- Form for Adding Employee Performance Record -->  
    <div class="bg-white shadow-lg rounded-lg p-8 mb-6">  
        <h3 class="text-2xl font-semibold text-indigo-700 mb-4">Add Performance Record</h3>  
        <form action="" method="POST" class="space-y-4">  
            <div class="form-group">  
                <label for="employee_id" class="block text-gray-800 font-medium">Employee ID:</label>  
                <input type="number" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="employee_id" name="employee_id" required placeholder="Enter Employee ID">  
            </div>  
            <div class="form-group">  
                <label for="evaluation_period" class="block text-gray-800 font-medium">Evaluation Period:</label>  
                <input type="text" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="evaluation_period" name="evaluation_period" required placeholder="e.g., Q1 2023">  
            </div>  
            <div class="form-group">  
                <label for="performance_score" class="block text-gray-800 font-medium">Performance Score:</label>  
                <input type="number" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="performance_score" name="performance_score" step="0.01" required placeholder="Enter Performance Score">  
            </div>  
            <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-indigo-700 transition-colors duration-300" name="add_performance">Add Performance Record</button>  
        </form>  

        <?php  
        // Handle form submission to add performance record  
        if (isset($_POST['add_performance'])) {  
            $employee_id = $_POST['employee_id'];  
            $evaluation_period = $_POST['evaluation_period'];  
            $performance_score = $_POST['performance_score'];  

            $sql = "INSERT INTO performance_management (employee_id, evaluation_period, performance_score)   
                    VALUES ('$employee_id', '$evaluation_period', '$performance_score')";  
            if ($conn->query($sql) === TRUE) {  
                echo "<div class='bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg mt-4' role='alert'>  
                          <strong class='font-bold'>Success!</strong>  
                          <span class='block sm:inline'>Performance record added successfully</span>  
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

    <!-- Display Performance Records -->  
    <div class="bg-white shadow-lg rounded-lg p-6">  
        <h3 class="text-3xl font-semibold text-indigo-800 mb-4">Performance Records</h3>  
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">  
            <thead class="bg-gray-50">  
                <tr>  
                    <th class="py-3 px-4 text-left text-gray-600 font-medium">Employee ID</th>  
                    <th class="py-3 px-4 text-left text-gray-600 font-medium">Evaluation Period</th>  
                    <th class="py-3 px-4 text-left text-gray-600 font-medium">Performance Score</th>  
                </tr>  
            </thead>  
            <tbody>  
                <?php  
                $result = $conn->query("SELECT * FROM performance_management ORDER BY id DESC");  
                if ($result->num_rows > 0) {  
                    while ($row = $result->fetch_assoc()) {  
                        echo "<tr class='hover:bg-gray-50 transition-colors duration-200'>";  
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['employee_id']) . "</td>";  
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['evaluation_period']) . "</td>";  
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['performance_score']) . "</td>";  
                        echo "</tr>";  
                    }  
                } else {  
                    echo "<tr><td colspan='3' class='py-3 px-4 border-b text-center text-gray-500'>No performance records found</td></tr>";  
                }  
                ?>  
            </tbody>  
        </table>  
    </div>  
</div>  

<?php include('../../includes/footer.php'); ?>