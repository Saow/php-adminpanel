<?php
require_once('connection/connection.php');


// Delete customer from database
if (isset($_GET['delete_customer_id'])) {
    $delete_customer_id = $_GET['delete_customer_id'];
    $sql_delete_customer = "DELETE FROM customers WHERE id='$delete_customer_id'";
    if ($conn->query($sql_delete_customer) === TRUE) {
        echo "<p>Customer deleted successfully!</p>";
    } else {
        echo "<p>Error: " . $sql_delete_customer . "<br>" . $conn->error . "</p>";
    }
}

// Edit customer data
if (isset($_POST['edit_customer_id']) && isset($_POST['edit_customer_name']) && isset($_POST['edit_customer_email']) && isset($_POST['edit_customer_phone']) && isset($_POST['edit_customer_address'])) {
    $edit_customer_id = $_POST['edit_customer_id'];
    $edit_customer_name = $_POST['edit_customer_name'];
    $edit_customer_email = $_POST['edit_customer_email'];
    $edit_customer_phone = $_POST['edit_customer_phone'];
    $edit_customer_address = $_POST['edit_customer_address'];
    $sql_edit_customer = "UPDATE customers SET name='$edit_customer_name', email='$edit_customer_email', phone='$edit_customer_phone', address='$edit_customer_address' WHERE id='$edit_customer_id'";
    if ($conn->query($sql_edit_customer) === TRUE) {
        echo "<p>Customer updated successfully!</p>";
    } else {
        echo "<p>Error: " . $sql_edit_customer . "<br>" .
        $conn->error . "</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
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
        <a href="index.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="customers.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">Customers</span>
       </a>
       <span class="tooltip">Customers</span>
     </li>
     <li>
       <a href="analytics/analytics.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Analytics</span>
       </a>
       <span class="tooltip">Analytics</span>
     </li>
     <li>
       <a href="orders.php">
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

<h2>Customers Table</h2>

<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

<?php
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $sql = "INSERT INTO customers (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";
    if ($conn->query($sql) === TRUE) {
        echo "<p class='success'>New customer added successfully!</p>";
    } else {
        echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}
    
        $sql = "SELECT * FROM customers";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["address"] . "</td><td><a href='edit/edit_customer.php?id=" . $row['id'] . "'>Edit</a></td><td><a href='delete/delete_customer.php?id=" . $row['id'] . "'>Delete</a></td></tr>";
            }
        }
    ?>
 </table>



<h3>Add New Customer</h3>
    <form method="post" class="customeradd">
    <label>Name:</label>
    <input type="text" name="name"><br><br>
    <label>Email:</label>
    <input type="email" name="email"><br><br>
    <label>Phone:</label>
    <input type="text" name="phone"><br><br>
    <label>Address:</label>
    <input type="text" name="address"><br><br>
    <input type="submit" value="Add Customer">
</form>
