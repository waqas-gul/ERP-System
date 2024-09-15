<!-- /modules/human_resources_management/recruitment_onboarding.php -->  
<?php include('../../includes/header.php'); ?>  
<?php include('../../includes/db_connect.php'); ?>  

<div class="container mx-auto px-4 py-8 max-w-4xl">  
    <h2 class="text-4xl font-extrabold text-indigo-900 mb-6">Recruitment and Onboarding</h2>  

    <!-- Form for Posting a Job Opening -->  
    <div class="bg-white shadow-lg rounded-lg p-8 mb-6">  
        <h3 class="text-2xl font-semibold text-indigo-700 mb-4">Post a Job Opening</h3>  
        <form action="" method="POST" class="space-y-4">  
            <div class="form-group">  
                <label for="job_title" class="block text-gray-800 font-medium">Job Title:</label>  
                <input type="text" class="form-control w-full p-3 border border-gray-300 rounded-lg" id="job_title" name="job_title" required placeholder="e.g., Software Engineer">  
            </div>  
            <div class="form-group">  
                <label for="job_description" class="block text-gray-800 font-medium">Job Description:</label>  
                <textarea class="form-control w-full p-3 border border-gray-300 rounded-lg" id="job_description" name="job_description" rows="4" required placeholder="Provide a brief job description..."></textarea>  
            </div>  
            <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-indigo-700 transition-colors duration-300" name="post_job">Post Job</button>  
        </form>  

        <?php  
        // Handle form submission to post a job  
        if (isset($_POST['post_job'])) {  
            $job_title = $_POST['job_title'];  
            $job_description = $_POST['job_description'];  

            $sql = "INSERT INTO recruitment_onboarding (job_title, job_description)   
                    VALUES ('$job_title', '$job_description')";  
            if ($conn->query($sql) === TRUE) {  
                echo "<div class='bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg mt-4' role='alert'>  
                          <strong class='font-bold'>Success!</strong>  
                          <span class='block sm:inline'>Job posted successfully</span>  
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

    <!-- Display Job Openings -->  
    <div class="bg-white shadow-lg rounded-lg p-6">  
        <h3 class="text-3xl font-semibold text-indigo-800 mb-4">Job Openings</h3>  
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">  
            <thead class="bg-gray-50">  
                <tr>  
                    <th class="py-3 px-4 text-left text-gray-600 font-medium">Job Title</th>  
                    <th class="py-3 px-4 text-left text-gray-600 font-medium">Job Description</th>  
                </tr>  
            </thead>  
            <tbody>  
                <?php  
                $result = $conn->query("SELECT * FROM recruitment_onboarding ORDER BY id DESC");  
                if ($result->num_rows > 0) {  
                    while ($row = $result->fetch_assoc()) {  
                        echo "<tr class='hover:bg-gray-50 transition-colors duration-200'>";  
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['job_title']) . "</td>";  
                        echo "<td class='py-3 px-4 border-b text-gray-800'>" . htmlspecialchars($row['job_description']) . "</td>";  
                        echo "</tr>";  
                    }  
                } else {  
                    echo "<tr><td colspan='2' class='py-3 px-4 border-b text-center text-gray-500'>No job openings found</td></tr>";  
                }  
                ?>  
            </tbody>  
        </table>  
    </div>  
</div>  

<?php include('../../includes/footer.php'); ?>