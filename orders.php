<?php
require ('connection/connection.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.24.0/dist/apexcharts.min.js"></script>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script defer src="settings/settings.js"></script>
    <link rel="stylesheet" href="settings/settings.css">
</head>
<body>
<div class="sidebar">
    <ul class="nav-list">
    <li>
        <a href="/admin">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="/customers">
         <i class='bx bx-user' ></i>
         <span class="links_name">Customers</span>
       </a>
       <span class="tooltip">Customers</span>
     </li>
     <li>
       <a href="/stats">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Analytics</span>
       </a>
       <span class="tooltip">Analytics</span>
     </li>
     <li>
       <a href="/orders">
         <i class='bx bx-cart-alt' ></i>
         <span class="links_name">Orders</span>
       </a>
       <span class="tooltip">Orders</span>
     </li>
     <li>
     <li>
     <a href="#" id="settings-btn">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Settings</span>
       </a>
       <span class="tooltip">Settings</span>
     </li>
     </li>
    </ul>
  </div>
<div id="settings-popup" class="popup">
  <h2>Settings</h2>
  <form method="post" class="logoutbtn">
      <input method="post" type="submit" name="log_out" id="logout" value="Log Out">
    </form>
  <div class="toggle-and-button-container">
    <span class="btntext">Switch to Dark Mode:</span>
    <div class="dark-mode-toggle">
      <input type="checkbox" id="dark-mode-toggle" />
      <label for="dark-mode-toggle"></label>
    </div>
    <button id="close-btn">Close</button>
  </div>
</div>
</div>
</div>
</body>
</html>
<?php
$sql = "SELECT order_date, total_price FROM orders";
$result = mysqli_query($conn, $sql);

$dataPoints = array();
while ($row = mysqli_fetch_assoc($result)) {
    $date = strtotime($row['order_date']);
    $total_price = $row['total_price'];
    $point = array("x" => $date * 1000, "y" => $total_price);
    array_push($dataPoints, $point);
}
?>
<h2>Orders Chart</h2>
<div id="chart"></div>
<script>
    var options = {
        chart: {
            type: 'line',
            height: 350
        },
        series: [{
            name: 'Total',
            data: <?php echo json_encode($dataPoints); ?>
        }],
        xaxis: {
            type: 'datetime'
        },
        yaxis: {
            labels: {
                formatter: function (value) {
                    return "$" + value;
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();
</script>




<h2>Orders Table</h2>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Customer ID</th>
            <th>Customer Name</th>
            <th>Product</th>
            <th>Price</th>
            <th>Total Price</th>
            <th>Order Date</th>
            <th>Delete</th>
        </tr>
        <?php
        // Retrieve orders data
        $sql_orders = "SELECT * FROM orders";
        $result_orders = mysqli_query($conn, $sql_orders);

        if ($result_orders->num_rows > 0) {
            // Output data of each row
            while($row_orders = $result_orders->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row_orders["id"] . "</td>";
                echo "<td>" . $row_orders["customer_id"] . "</td>";
                echo "<td>" . $row_orders["customer_name"] . "</td>";
                echo "<td>" . $row_orders["product"] . "</td>";
                echo "<td>" . $row_orders["price"] . "</td>";
                echo "<td>" . $row_orders["total_price"] . "</td>";
                echo "<td>" . $row_orders["order_date"] . "</td>";
                echo "<td><a href='delete/delete_order.php?order_id=" . $row_orders["id"] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </table>

    <h2>Add New Order</h2>
<form method="post" action="">
    <label>Customer:</label>
    <select name="customer_id">
        <?php
            $sql_customers = "SELECT * FROM customers";
            $result_customers = mysqli_query($conn, $sql_customers);

            while($row = mysqli_fetch_array($result_customers)) {
                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
            }
        ?>
    </select><br><br>
    <label>Product:</label>
    <input type="text" name="product" required><br><br>
    <label>Price:</label>
    <input type="number" name="price" min="0" step="0.01" required><br><br>
    <!-- Order date -->
    <input type="date" name="order_date" value="<?php echo date('Y-m-d'); ?>" required><br><br>
    <input type="submit" name="submit" value="Add Order">
</form>

<?php
if (isset($_POST['submit'])) {
    $customer_id = $_POST['customer_id'];
    $product = $_POST['product'];
    $price = $_POST['price'];
    $total_price = $price; // total price is the same as price for now
    $order_date = $_POST['order_date'];
    $sql_insert_order = "INSERT INTO orders (customer_id, customer_name, product, price, total_price, order_date) VALUES ('$customer_id', (SELECT name FROM customers WHERE id = $customer_id), '$product', $price, $total_price, '$order_date')";
    if (mysqli_query($conn, $sql_insert_order)) {
        header('Location: orders.php');
    } else {
        echo "Error: " . $sql_insert_order . "<br>" . mysqli_error($conn);
    }
}
?>

<?php
// Retrieve customers data
$sql_customers = "SELECT * FROM customers";
$result_customers = mysqli_query($conn, $sql_customers);

// Insert new order into database
if (isset($_POST['customer_id']) && isset($_POST['product']) && isset($_POST['price'])) {
    $customer_id = $_POST['customer_id'];
    $product = $_POST['product'];
    $price = $_POST['price'];
    $total_price = $price;

    // Retrieve customer's name from customers table
    $sql_customer_name = "SELECT name FROM customers WHERE id='$customer_id'";
    $result_customer_name = mysqli_query($conn, $sql_customer_name);
    $customer_name = mysqli_fetch_array($result_customer_name)[0];

    // Insert order into orders table
    $sql_order = "INSERT INTO orders (customer_id, customer_name, product, price, total_price) VALUES ('$customer_id', '$customer_name', '$product', '$price', '$total_price')";
    if ($conn->query($sql_order) === TRUE) {
        echo "<p>New order added successfully!</p>";
    } else {
        echo "<p>Error: " . $sql_order . "<br>" . $conn->error . "</p>";
    }
}
// Chart of orders
$sql = "SELECT DATE_FORMAT(order_date, '%Y-%m') AS month, SUM(total_price) AS total FROM orders GROUP BY DATE_FORMAT(order_date, '%Y-%m')";
$result = $conn->query($sql);
$dataPoints = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $dataPoints[] = array("x" => strtotime($row["month"] . "-01") * 1000, "y" => $row["total"]);
    }
}

?>

<?php
require_once ('handlers/logout.php')
?>