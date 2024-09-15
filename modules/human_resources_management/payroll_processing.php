<!-- /modules/human_resources_management/payroll_processing.php -->  
<?php include('../../includes/header.php'); ?>  
<?php include('../../includes/db_connect.php'); ?>  

<div class="container mx-auto px-4 py-8 max-w-4xl">  
    <h2 class="text-4xl font-extrabold text-indigo-900 mb-6">Payroll Processing</h2>  

    <!-- Form for Payroll Processing -->  
    <div class="bg-white shadow-lg rounded-lg p-8 mb-6">  
        <h3 class="text-2xl font-semibold text-indigo-700 mb-4">Process Payroll</h3>  
        <form action="" method="POST" class="space-y-6">  
            <div class="form-group">  
                <label for="employee_id" class="block text-gray-800 font-medium">Employee ID:</label>  
                <input type="number" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="employee_id" name="employee_id" required>  
            </div>  
            <div class="form-group">  
                <label for="payroll_month" class="block text-gray-800 font-medium">Payroll Month:</label>  
                <input type="text" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="payroll_month" name="payroll_month" placeholder="e.g., January 2023" required>  
            </div>  
            <div class="form-group">  
                <label for="salary_paid" class="block text-gray-800 font-medium">Salary Paid:</label>  
                <input type="number" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="salary_paid" name="salary_paid" step="0.01" required>  
            </div>  
            <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-indigo-700 transition-colors duration-300" name="process_payroll">Process Payroll</button>  
        </form>  

        <?php  
        // Handle form submission to process payroll  
        if (isset($_POST['process_payroll'])) {  
            $employee_id = $_POST['employee_id'];  
            $payroll_month = $_POST['payroll_month'];  
            $salary_paid = $_POST['salary_paid'];  

            $sql = "INSERT INTO payroll_processing (employee_id, payroll_month, salary_paid)   
                    VALUES ('$employee_id', '$payroll_month', '$salary_paid')";  
            if ($conn->query($sql) === TRUE) {  
                echo "<div class='bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg mt-4' role='alert'>  
                          <strong class='font-bold'>Success!</strong>  
                          <span class='block sm:inline'>Payroll processed successfully</span>  
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

    <!-- Display Payroll Records -->  
    <div class="bg-white shadow-lg rounded-lg p-6">  
        <h3 class="text-3xl font-semibold text-indigo-800 mb-4">Payroll Records</h3>  
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">  
            <thead class="bg-gray-50">  
                <tr>  
                    <th class="py-3 px-4 text-left text-gray-600 font-medium">Employee ID</th>  
                    <th class="py-3 px-4 text-left text-gray-600 font-medium">Payroll Month</th>  
                    <th class="py-3 px-4 text-left text-gray-600 font-medium">Salary Paid</th>  
                </tr>  
            </thead>  
            <tbody>  
                <?php  
                $result = $conn->query("SELECT * FROM payroll_processing ORDER BY id DESC");  
                if ($result->num_rows > 0) {  
                    while ($row = $result->fetch_assoc()) {  
                        echo "<tr class='hover:bg-gray-50 transition-colors duration-200'>";  
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['employee_id']) . "</td>";  
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['payroll_month']) . "</td>";  
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . number_format($row['salary_paid'], 2) . "</td>";  
                        echo "</tr>";  
                    }  
                } else {  
                    echo "<tr><td colspan='3' class='py-3 px-4 border-b text-center text-gray-500'>No payroll records found</td></tr>";  
                }  
                ?>  
            </tbody>  
        </table>  
    </div>  
</div>  

<?php include('../../includes/footer.php'); ?>