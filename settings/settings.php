<?php
require ('../connection/connection.php')
?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.24.0/dist/apexcharts.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../style1.css">
    <link rel="stylesheet" href="../sidebar.css">
</head>
<body>
    <h1>Welcome to the Admin Panel</h1>
    <div class="sidebar">
    <ul class="nav-list">
      <li>
        <a href="../admin.php">
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
       <a href="/analytics/analytics.php">
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
       <a href="settings.php">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Settings</span>
       </a>
       <span class="tooltip">Settings</span>
     </li>
     </li>
    </ul>
  </div>
  <style>
body {
  padding: 25px;
  background-color: white;
  color: black;
  font-size: 25px;
}

.dark-mode {
  background-color: black;
  color: white;
}
</style>
<form action="">
<button onclick="myFunction()">Toggle dark mode</button>
</form>
</body>
</html>