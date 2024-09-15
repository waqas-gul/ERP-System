<!-- Header -->  
<?php include('includes/header.php'); ?>  

<!-- Main Content -->  
<div class="container mx-auto px-4 py-8">  
    <!-- Welcome Section -->  
    <div class="text-center my-2">  
        <h1 class="text-4xl font-extrabold text-indigo-800 mb-3 bg-gradient-to-r from-indigo-500 to-purple-500 text-transparent bg-clip-text shadow-lg py-4 px-6 rounded-lg inline-block">  
            Welcome to the ERP System  
        </h1>  
        <p class="text-xl text-gray-800 mb-5 max-w-2xl mx-auto bg-gray-100 border border-gray-200 rounded-lg p-6 shadow-md">  
            Select a module to manage:  
        </p>  
    </div>  

    <!-- Module Links -->  
    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">  
        <li class="bg-white shadow-lg rounded-lg overflow-hidden border-l-4 border-indigo-600 transition-transform duration-300 transform hover:scale-105 hover:bg-indigo-100">  
            <a href="modules/financial_management/index.php" class="block p-8 text-center">  
                <h2 class="text-2xl font-bold text-indigo-600 mb-2">Financial Management</h2>  
                <p class="text-gray-700">Manage financial records and transactions efficiently. This module provides a comprehensive suite of tools to handle all financial aspects of your organization.</p>  
            </a>  
        </li>  

        <li class="bg-white shadow-lg rounded-lg overflow-hidden border-l-4 border-green-600 transition-transform duration-300 transform hover:scale-105 hover:bg-indigo-100">  
            <a href="modules/human_resources_management/index.php" class="block p-8 text-center">  
                <h2 class="text-2xl font-bold text-green-600 mb-2">Human Resources Management</h2>  
                <p class="text-gray-700">Streamline HR processes and employee management. This module helps you with recruitment, performance tracking, and employee engagement.</p>  
            </a>  
        </li>  

        <li class="bg-white shadow-lg rounded-lg overflow-hidden border-l-4 border-yellow-600 transition-transform duration-300 transform hover:scale-105 hover:bg-indigo-100">  
            <a href="modules/supply_chain_management/index.php" class="block p-8 text-center">  
                <h2 class="text-2xl font-bold text-yellow-600 mb-2">Supply Chain Management</h2>  
                <p class="text-gray-700">Optimize your supply chain and logistics. This module provides tools for inventory management, order fulfillment, and vendor coordination.</p>  
            </a>  
        </li>  

        <li class="bg-white shadow-lg rounded-lg overflow-hidden border-l-4 border-red-600 transition-transform duration-300 transform hover:scale-105 hover:bg-indigo-100">  
            <a href="modules/customer_relationship_management/index.php" class="block p-8 text-center">  
                <h2 class="text-2xl font-bold text-red-600 mb-2">Customer Relationship Management</h2>  
                <p class="text-gray-700">Enhance customer interactions and satisfaction. This module offers features for customer support, feedback management, and relationship building.</p>  
            </a>  
        </li>  
    </ul>  
</div>  

<!-- Footer -->  
<?php include('includes/footer.php'); ?>