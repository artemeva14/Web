<?php
    $connection = new mysqli("localhost", "root", "", "cactus");
    $query = "SELECT * FROM cactus";
    $products = mysqli_query($connection, $query);
    $id = intval($_GET['id']);
    foreach($products as $product){
        if ($id == $product['id']){
            ?>
<form method="POST">
    <table>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name"  value="<?php echo $product['name']; ?>" minlength="1"></td>
        </tr>
        <tr>
            <td>Price:</td>
            <td><input type="text"  name="price" value="<?php echo $product['price']; ?>" minlength="1"></td>
        </tr>
        <tr>
            <td>Description:</td>
            <td><input type="text"  name="description" value="<?php echo $product['description']; ?>" minlength="1"></td>
        </tr>
        <tr>
            <td> </td>
            <td><input type="submit" value="Update" name="submit"></td>
        </tr>
    </table>
</form>
<?php break;}
    }?>

<?php
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $query = "UPDATE `cactus` SET name='$name', price='$price', description='$description'  where id=$id";
    mysqli_query($connection, $query);
    header('location: index.php?page=list');
}
?>