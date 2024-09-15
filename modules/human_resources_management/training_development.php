<!-- /modules/human_resources_management/training_development.php -->  
<?php include('../../includes/header.php'); ?>  
<?php include('../../includes/db_connect.php'); ?>  

<div class="container mx-auto px-4 py-8 max-w-4xl">  
    <h2 class="text-4xl font-extrabold text-indigo-900 mb-6">Training and Development</h2>  

    <!-- Form for Adding Training Program -->  
    <div class="bg-white shadow-lg rounded-lg p-6 mb-6">  
        <h3 class="text-2xl font-semibold text-indigo-700 mb-4">Add a Training Program</h3>  
        <form action="" method="POST" class="space-y-4">  
            <div class="form-group">  
                <label for="program_name" class="block text-gray-800 font-medium">Program Name:</label>  
                <input type="text" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="program_name" name="program_name" required>  
            </div>  
            <div class="form-group">  
                <label for="program_description" class="block text-gray-800 font-medium">Program Description:</label>  
                <textarea class="form-control w-full p-3 border border-gray-300 rounded-lg" id="program_description" name="program_description" required></textarea>  
            </div>  
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-700 transition-colors duration-300" name="add_program">Add Program</button>  
        </form>  

        <?php  
        // Handle form submission to add training program  
        if (isset($_POST['add_program'])) {  
            $program_name = $_POST['program_name'];  
            $program_description = $_POST['program_description'];  

            $sql = "INSERT INTO training_development (program_name, program_description)   
                    VALUES ('$program_name', '$program_description')";  
            if ($conn->query($sql) === TRUE) {  
                echo "<div class='bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg mt-4' role='alert'>  
                          <strong class='font-bold'>Success!</strong>  
                          <span class='block sm:inline'>Training program added successfully</span>  
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

    <!-- Display Training Programs -->  
    <div class="bg-white shadow-lg rounded-lg p-6">  
        <h3 class="text-3xl font-semibold text-indigo-800 mb-4">Training Programs</h3>  
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">  
            <thead class="bg-indigo-600 text-white ">  
                <tr>  
                    <th class="py-3 px-4 text-left  font-medium">Program Name</th>  
                    <th class="py-3 px-4 text-left font-medium">Program Description</th>  
                </tr>  
            </thead>  
            <tbody>  
                <?php  
                $result = $conn->query("SELECT * FROM training_development ORDER BY id DESC");  
                if ($result->num_rows > 0) {  
                    while ($row = $result->fetch_assoc()) {  
                        echo "<tr class='hover:bg-gray-50 transition-colors duration-200'>";  
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['program_name']) . "</td>";  
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['program_description']) . "</td>";  
                        echo "</tr>";  
                    }  
                } else {  
                    echo "<tr><td colspan='2' class='py-3 px-4 border-b text-center text-gray-500'>No training programs found</td></tr>";  
                }  
                ?>  
            </tbody>  
        </table>  
    </div>  
</div>  

<?php include('../../includes/footer.php'); ?>