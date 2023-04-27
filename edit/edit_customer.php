<?php
    require_once('connection/connection.php');

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $id = $_POST['id'];

        $sql = "UPDATE customers SET name='$name', email='$email', phone='$phone', address='$address' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Customer updated successfully!</p>";
        } else {
            echo "<p>Error updating customer: " . $conn->error . "</p>";
        }
    } else {
        $id = $_GET['id'];

        $sql = "SELECT * FROM customers WHERE id='$id'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $email = $row['email'];
            $phone = $row['phone'];
            $address = $row['address'];
        } else {
            echo "<p>Error: Customer not found.</p>";
            exit();
        }
    }
    echo '<a href="admin.php">Back to Admin Panel</a>';

?>

<h2>Edit Customer</h2>
<form method="post" action="">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <label for="name">Name:</label><br>
    <input type="text" name="name" value="<?php echo $name ?>"><br>
    <label for="email">Email:</label><br>
    <input type="email" name="email" value="<?php echo $email ?>"><br>
    <label for="phone">Phone:</label><br>
    <input type="tel" name="phone" value="<?php echo $phone ?>"><br>
    <label for="address">Address:</label><br>
    <textarea name="address" cols="10"><?php echo $address ?></textarea><br>
    <input type="submit" name="submit" value="Update">
</form>
