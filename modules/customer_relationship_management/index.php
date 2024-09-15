<!-- /modules/customer_relationship_management/index.php -->  
<?php include('../../includes/header.php'); ?>  

<div class="container mx-auto px-4 py-8">  
    <h2 class="text-3xl font-bold text-indigo-800 mb-4 text-center">Customer Relationship Management</h2>  
    <p class="text-lg text-gray-700 mb-6 text-center">Select an option:</p>  

    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">  
        <li class="hover:bg-indigo-100 bg-white shadow-lg rounded-lg overflow-hidden border-l-4 border-indigo-600 transition-transform duration-300 transform hover:scale-105">  
            <a href="customer_database.php" class="block p-6 text-center">  
                <h3 class="text-xl font-semibold text-indigo-600 mb-2">Customer Database</h3>  
                <p class="text-gray-700">Manage customer information and records efficiently.</p>  
            </a>  
        </li>  

        <li class="hover:bg-indigo-100 bg-white shadow-lg rounded-lg overflow-hidden border-l-4 border-green-600 transition-transform duration-300 transform hover:scale-105">  
            <a href="sales_management.php" class="block p-6 text-center">  
                <h3 class="text-xl font-semibold text-green-600 mb-2">Sales Management</h3>  
                <p class="text-gray-700">Streamline and oversee the sales process.</p>  
            </a>  
        </li>  

        <li class="hover:bg-indigo-100 bg-white shadow-lg rounded-lg overflow-hidden border-l-4 border-yellow-600 transition-transform duration-300 transform hover:scale-105">  
            <a href="marketing_automation.php" class="block p-6 text-center">  
                <h3 class="text-xl font-semibold text-yellow-600 mb-2">Marketing Automation</h3>  
                <p class="text-gray-700">Automate marketing tasks and campaigns.</p>  
            </a>  
        </li>  

        <li class="hover:bg-indigo-100 bg-white shadow-lg rounded-lg overflow-hidden border-l-4 border-red-600 transition-transform duration-300 transform hover:scale-105">  
            <a href="customer_support.php" class="block p-6 text-center">  
                <h3 class="text-xl font-semibold text-red-600 mb-2">Customer Support</h3>  
                <p class="text-gray-700">Manage customer queries and provide support.</p>  
            </a>  
        </li>  

        <li class="hover:bg-indigo-100 bg-white shadow-lg rounded-lg overflow-hidden border-l-4 border-purple-600 transition-transform duration-300 transform hover:scale-105">  
            <a href="feedback_surveys.php" class="block p-6 text-center">  
                <h3 class="text-xl font-semibold text-purple-600 mb-2">Feedback Surveys</h3>  
                <p class="text-gray-700">Collect and analyze customer feedback.</p>  
            </a>  
        </li>  
    </ul>  
</div>  

<?php include('../../includes/footer.php'); ?>