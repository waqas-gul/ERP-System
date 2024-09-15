<!-- /modules/financial_management/index.php -->  
<?php include('../../includes/header.php'); ?>  

<div class="container mx-auto px-4 py-8">  
    <h2 class="text-5xl font-bold text-indigo-800 mb-4 text-center">Financial Management</h2>  
    <p class="text-lg text-gray-700 mb-6 text-center">Select an option to manage your financial tasks:</p>  

    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">  
        <li class="hover:bg-indigo-100 bg-white shadow-lg rounded-lg overflow-hidden border-l-4 border-indigo-600 transition-transform duration-300 transform hover:scale-105">  
            <a href="general_ledger.php" class="block p-6 text-center">  
                <h3 class="text-2xl font-semibold text-indigo-600 mb-2">General Ledger</h3>  
                <p class="text-gray-700">Manage all financial transactions and summaries.</p>  
            </a>  
        </li>  

        <li class="hover:bg-indigo-100 bg-white shadow-lg rounded-lg overflow-hidden border-l-4 border-green-600 transition-transform duration-300 transform hover:scale-105">  
            <a href="accounts_payable.php" class="block p-6 text-center">  
                <h3 class="text-2xl font-semibold text-green-600 mb-2">Accounts Payable</h3>  
                <p class="text-gray-700">Track and manage outgoing payments.</p>  
            </a>  
        </li>  

        <li class="hover:bg-indigo-100 bg-white shadow-lg rounded-lg overflow-hidden border-l-4 border-yellow-600 transition-transform duration-300 transform hover:scale-105">  
            <a href="accounts_receivable.php" class="block p-6 text-center">  
                <h3 class="text-2xl font-semibold text-yellow-600 mb-2">Accounts Receivable</h3>  
                <p class="text-gray-700">Manage incoming payments and invoices.</p>  
            </a>  
        </li>  

        <li class="hover:bg-indigo-100 bg-white shadow-lg rounded-lg overflow-hidden border-l-4 border-red-600 transition-transform duration-300 transform hover:scale-105">  
            <a href="budgeting_forecasting.php" class="block p-6 text-center">  
                <h3 class="text-2xl font-semibold text-red-600 mb-2">Budgeting and Forecasting</h3>  
                <p class="text-gray-700">Plan and forecast financial performance.</p>  
            </a>  
        </li>  

        <li class="hover:bg-indigo-100 bg-white shadow-lg rounded-lg overflow-hidden border-l-4 border-purple-600 transition-transform duration-300 transform hover:scale-105">  
            <a href="financial_reporting.php" class="block p-6 text-center">  
                <h3 class="text-2xl font-semibold text-purple-600 mb-2">Financial Reporting</h3>  
                <p class="text-gray-700">Generate and review financial reports.</p>  
            </a>  
        </li>  
    </ul>  
</div>  

<?php include('../../includes/footer.php'); ?>