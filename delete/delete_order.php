<?php
    require_once('../connection/connection.php');
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM orders WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Order deleted successfully!</p>";
            header("Location: ../orders.php");
            exit(); // Ensures no further code is executed
        } else {
            echo "<p>Error deleting Order: " . $conn->error . "</p>";
        }
    } else {
        echo "<p>Invalid ID parameter.</p>";
    }
    echo '<a href="../orders.php">Back to orders.php</a>';
?>
