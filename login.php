<?php
session_start();
if(isset($_SESSION['username'])) {
    header("Location: /admin");
}

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to the database
    $db_servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "admin_panel";

    $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query the database for the user
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // User authenticated successfully
        $_SESSION['username'] = $username;
        header("Location: /admin");
    } else {
        // Invalid username or password
        $message = "Invalid username or password.";
    }

    mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="sidebar.css">
    <link rel="icon" type="image/x-icon" href="/favicon/favicon.jpg">
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









    <?php if(isset($message)) { ?>
        <div><?php echo $message; ?></div>
    <?php } ?>
    <main>
    <h1>Login</h1>

    <form method="post">
        <label>Username:</label>
        <input type="text" name="username"><br><br>
        <label>Password:</label>
        <input type="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
    </main>
</body>
</html>
