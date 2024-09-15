<!-- Header -->  
<?php include('../../includes/header.php'); ?>  

<div class="container mx-auto px-4 py-8">  
    <h2 class="text-3xl font-bold text-indigo-800 mb-4 text-center">Supply Chain Management</h2>  
    <p class="text-lg text-gray-700 mb-6 text-center">Select an option:</p>  

    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">  
        <li class="bg-white shadow-lg rounded-lg overflow-hidden border-l-4 border-indigo-600 transition-transform duration-300 transform hover:scale-105 hover:bg-indigo-100">  
            <a href="inventory_management.php" class="block p-6 text-center">  
                <h3 class="text-xl font-semibold text-indigo-600 mb-2">Inventory Management</h3>  
                <p class="text-gray-700">Manage stock levels, inventory tracking, and product replenishment.</p>  
            </a>  
        </li>  

        <li class="bg-white shadow-lg rounded-lg overflow-hidden border-l-4 border-green-600 transition-transform duration-300 transform hover:scale-105 hover:bg-indigo-100">  
            <a href="procurement.php" class="block p-6 text-center">  
                <h3 class="text-xl font-semibold text-green-600 mb-2">Procurement</h3>  
                <p class="text-gray-700">Streamline purchasing processes and supplier management.</p>  
            </a>  
        </li>  

        <li class="bg-white shadow-lg rounded-lg overflow-hidden border-l-4 border-yellow-600 transition-transform duration-300 transform hover:scale-105 hover:bg-indigo-100">  
            <a href="supplier_management.php" class="block p-6 text-center">  
                <h3 class="text-xl font-semibold text-yellow-600 mb-2">Supplier Management</h3>  
                <p class="text-gray-700">Oversee supplier relationships and performance metrics.</p>  
            </a>  
        </li>  

        <li class="bg-white shadow-lg rounded-lg overflow-hidden border-l-4 border-red-600 transition-transform duration-300 transform hover:scale-105 hover:bg-indigo-100">  
            <a href="order_management.php" class="block p-6 text-center">  
                <h3 class="text-xl font-semibold text-red-600 mb-2">Order Management</h3>  
                <p class="text-gray-700">Manage customer orders, fulfillment, and shipping details.</p>  
            </a>  
        </li>  

        <li class="bg-white shadow-lg rounded-lg overflow-hidden border-l-4 border-purple-600 transition-transform duration-300 transform hover:scale-105 hover:bg-indigo-100">  
            <a href="warehouse_management.php" class="block p-6 text-center">  
                <h3 class="text-xl font-semibold text-purple-600 mb-2">Warehouse Management</h3>  
                <p class="text-gray-700">Optimize warehouse operations and layout for efficiency.</p>  
            </a>  
        </li>  
    </ul>  
</div>  

<!-- Footer -->  
<?php include('../../includes/footer.php'); ?>