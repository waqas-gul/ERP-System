<!-- /modules/human_resources_management/employee_records.php -->
<?php include('../../includes/header.php'); ?>
<?php include('../../includes/db_connect.php'); ?>

<div class="container mx-auto px-4 py-8">
    <h2 class="text-4xl font-extrabold text-indigo-900 mb-6">Employee Records Management</h2>

    <!-- Form for Adding New Employee -->
    <div class="bg-white shadow-lg rounded-lg p-8 mb-6 space-y-6">
        <h3 class="text-2xl font-semibold text-indigo-700 mb-4">Add New Employee</h3>
        <form action="" method="POST" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-group">
                    <label for="employee_name" class="block text-gray-800 font-medium">Employee Name:</label>
                    <input type="text" class="form-control w-full p-3 border border-gray-300 rounded-lg shadow-sm" id="employee_name" name="employee_name" required>
                </div>
                <div class="form-group">
                    <label for="employee_position" class="block text-gray-800 font-medium">Position:</label>
                    <input type="text" class="form-control w-full p-3 border border-gray-300 rounded-lg shadow-sm" id="employee_position" name="employee_position" required>
                </div>
                <div class="form-group">
                    <label for="employee_department" class="block text-gray-800 font-medium">Department:</label>
                    <input type="text" class="form-control w-full p-3 border border-gray-300 rounded-lg shadow-sm" id="employee_department" name="employee_department" required>
                </div>
                <div class="form-group">
                    <label for="employee_salary" class="block text-gray-800 font-medium">Salary:</label>
                    <input type="number" class="form-control w-full p-3 border border-gray-300 rounded-lg shadow-sm" id="employee_salary" name="employee_salary" step="0.01" required>
                </div>
            </div>
            <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-indigo-700 transition-colors duration-300" name="add_employee">Add Employee</button>
        </form>

        <?php
        // Handle form submission to add new employee
        if (isset($_POST['add_employee'])) {
            $employee_name = $_POST['employee_name'];
            $employee_position = $_POST['employee_position'];
            $employee_department = $_POST['employee_department'];
            $employee_salary = $_POST['employee_salary'];

            $sql = "INSERT INTO employee_records (employee_name, employee_position, employee_department, employee_salary) 
                    VALUES ('$employee_name', '$employee_position', '$employee_department', '$employee_salary')";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg shadow-md' role='alert'>
                          <strong class='font-bold'>Success!</strong>
                          <span class='block sm:inline'>New employee added successfully</span>
                      </div>";
            } else {
                echo "<div class='bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded-lg shadow-md' role='alert'>
                          <strong class='font-bold'>Error!</strong>
                          <span class='block sm:inline'>Error: " . $conn->error . "</span>
                      </div>";
            }
        }
        ?>
    </div>

    <!-- Display Employee Records -->
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h3 class="text-3xl font-semibold text-indigo-800 mb-4">Employee List</h3>
        <table class="w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-gray-50">
                <tr>
                    <th class="py-3 px-4 text-left text-gray-600 font-medium">Employee Name</th>
                    <th class="py-3 px-4 text-left text-gray-600 font-medium">Position</th>
                    <th class="py-3 px-4 text-left text-gray-600 font-medium">Department</th>
                    <th class="py-3 px-4 text-left text-gray-600 font-medium">Salary</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM employee_records ORDER BY id DESC");
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr class='hover:bg-gray-50 transition-colors duration-200'>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['employee_name']) . "</td>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['employee_position']) . "</td>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['employee_department']) . "</td>";
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . number_format($row['employee_salary'], 2) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='py-3 px-4 border-b text-center text-gray-600'>No employees found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('../../includes/footer.php'); ?>
