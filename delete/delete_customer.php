<?php
    require_once('../connection/connection.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM customers WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Customer deleted successfully!</p>";
        header("Location: ../customers.php");
        exit(); // Ensures no further code is executed
    } else {
        echo "<p>Error deleting customer: " . $conn->error . "</p>";
    }
    echo '<a href="../customers.php">Back to Customers.php</a>';
?>
