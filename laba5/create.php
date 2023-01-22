<form method="POST">
    <table>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name" minlength="1"></td>
        </tr>
        <tr>
            <td>Price:</td>
            <td><input type="text" name="price" minlength="1"></td>
        </tr>
        <tr>
            <td>Description:</td>
            <td><input type="text"  name="description" minlength="1"></td>
        </tr>
        <tr>
            <td> </td>
            <td><input type="submit" value="Create" name="submit"></td>
        </tr>
    </table>
</form>

<?php
 $connection = new mysqli("localhost", "root", "", "cactus");
 $query = "SELECT * FROM cactus";
 $products = mysqli_query($connection, $query);
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $query2 = "INSERT INTO cactus (name, price, description) VALUES ('$name', '$price', '$description')";
    $query3 = mysqli_query($connection, $query2);
    header('location: index.php?page = list');
}
?>