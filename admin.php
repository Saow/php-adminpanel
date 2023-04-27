<?php
require_once('connection/connection.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.24.0/dist/apexcharts.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="sidebar.css">
    <script defer src="settings.js"></script>
    <link rel="stylesheet" href="settings.css">
</head>
<body>
    <h1>Welcome to the Admin Panel</h1>
    <div class="sidebar">
    <ul class="nav-list">
      <li>
        <a href="admin.php">
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
  <div class="toggle-and-button-container">
    <span class="btntext">Switch to Dark Mode:</span>
    <div class="dark-mode-toggle">
      <input type="checkbox" id="dark-mode-toggle" />
      <label for="dark-mode-toggle"></label>
    </div>
    <button id="close-btn">Close</button>
  </div>
</div>
</body>
</html>

<?php
require_once ('./handlers/logout.php')
?>


  <!-- Log out button
    <form method="post">
        <input method="post"type="submit" name="log_out" value="Log Out">
    </form> -->