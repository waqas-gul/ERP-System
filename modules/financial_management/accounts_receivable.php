<!-- /modules/financial_management/accounts_receivable.php -->
<?php include('../../includes/header.php'); ?>
<?php include('../../includes/db_connect.php'); ?>

<div class="container mx-auto px-4 py-8">
    <h2 class="text-4xl font-bold text-indigo-800 mb-6">Accounts Receivable Management</h2>

    <!-- Form for Adding New Customer Invoice -->
    <form action="" method="POST" class="bg-white shadow-lg rounded-lg p-6 mb-6 space-y-4">
        <h3 class="text-2xl font-semibold text-indigo-600 mb-4">Add New Invoice</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="form-group">
                <label for="customer" class="block text-gray-700 font-medium mb-1">Customer Name:</label>
                <input type="text" class="form-control w-full p-3 border rounded-lg shadow-sm" id="customer" name="customer" required>
            </div>
            <div class="form-group">
                <label for="invoice_amount" class="block text-gray-700 font-medium mb-1">Invoice Amount:</label>
                <input type="number" class="form-control w-full p-3 border rounded-lg shadow-sm" id="invoice_amount" name="invoice_amount" step="0.01" required>
            </div>
        </div>
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-700 transition-colors duration-300" name="add_invoice">Add Invoice</button>
    </form>

    <?php
    // Handle form submission to add new customer invoice
    if (isset($_POST['add_invoice'])) {
        $customer = $_POST['customer'];
        $invoice_amount = $_POST['invoice_amount'];

        $sql = "INSERT INTO accounts_receivable (customer, invoice_amount) VALUES ('$customer', '$invoice_amount')";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative' role='alert'>
                      <strong class='font-bold'>Success!</strong>
                      <span class='block sm:inline'>New invoice added successfully</span>
                  </div>";
        } else {
            echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
                      <strong class='font-bold'>Error!</strong>
                      <span class='block sm:inline'>Error: " . $conn->error . "</span>
                  </div>";
        }
    }
    ?>

    <!-- Display Customer Invoices -->
    <h3 class="text-3xl font-bold text-indigo-700 mb-4">Customer Invoices</h3>
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-3 px-4 border-b text-left text-gray-700">Customer</th>
                <th class="py-3 px-4 border-b text-left text-gray-700">Invoice Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM accounts_receivable ORDER BY id DESC");
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr class='hover:bg-gray-50'>";
                    echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row['customer']) . "</td>";
                    echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($row['invoice_amount']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2' class='py-2 px-4 border-b text-center text-gray-600'>No invoices found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include('../../includes/footer.php'); ?>
