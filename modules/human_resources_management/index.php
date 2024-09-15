<!-- /modules/human_resources/index.php -->  
<?php include('../../includes/header.php'); ?>  

<div class="container mx-auto px-4 py-8">  
    <h2 class="text-5xl font-bold text-indigo-900 mb-6 text-center bg-gradient-to-r from-indigo-400 to-purple-600 text-transparent bg-clip-text">  
        Human Resources Management  
    </h2>  
    <p class="text-lg text-gray-700 mb-8 text-center">Select an option:</p>  

    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">  
        <li class="hover:bg-indigo-100 bg-white shadow-lg rounded-lg overflow-hidden border-l-4 border-indigo-600 transition-transform duration-300 transform hover:scale-105">  
            <a href="employee_records.php" class="block p-6 text-center">  
                <h3 class="text-2xl font-semibold text-indigo-600 mb-2">Employee Records</h3>  
                <p class="text-gray-700">Manage employee information and records.</p>  
            </a>  
        </li>  
        
        <li class="hover:bg-indigo-100 bg-white shadow-lg rounded-lg overflow-hidden border-l-4 border-green-600 transition-transform duration-300 transform hover:scale-105">  
            <a href="payroll_processing.php" class="block p-6 text-center">  
                <h3 class="text-2xl font-semibold text-green-600 mb-2">Payroll Processing</h3>  
                <p class="text-gray-700">Handle payroll calculations and distributions.</p>  
            </a>  
        </li>  

        <li class="hover:bg-indigo-100 bg-white shadow-lg rounded-lg overflow-hidden border-l-4 border-yellow-600 transition-transform duration-300 transform hover:scale-105">  
            <a href="recruitment_onboarding.php" class="block p-6 text-center">  
                <h3 class="text-2xl font-semibold text-yellow-600 mb-2">Recruitment Onboarding</h3>  
                <p class="text-gray-700">Manage the recruitment process and onboarding.</p>  
            </a>  
        </li>  

        <li class="hover:bg-indigo-100 bg-white shadow-lg rounded-lg overflow-hidden border-l-4 border-red-600 transition-transform duration-300 transform hover:scale-105">  
            <a href="performance_management.php" class="block p-6 text-center">  
                <h3 class="text-2xl font-semibold text-red-600 mb-2">Performance Management</h3>  
                <p class="text-gray-700">Evaluate and manage employee performance.</p>  
            </a>  
        </li>  
        
        <li class="hover:bg-indigo-100 bg-white shadow-lg rounded-lg overflow-hidden border-l-4 border-purple-600 transition-transform duration-300 transform hover:scale-105">  
            <a href="training_development.php" class="block p-6 text-center">  
                <h3 class="text-2xl font-semibold text-purple-600 mb-2">Training Development</h3>  
                <p class="text-gray-700">Plan and administer employee training programs.</p>  
            </a>  
        </li>  
    </ul>  
</div>  

<?php include('../../includes/footer.php'); ?>