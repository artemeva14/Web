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
$document = new DOMDocument();
$document->load('data.xml');
$products = $document->getElementsByTagName('products')->item(0);
$product = $products->getElementsByTagName('product');
$len = $product->length;
$id = intval($len)+1;
if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $prod2 = $document->createElement('product');
    $id2 = $document->createElement('id', intval($id));
    $prod2->appendChild($id2);
    $name2 = $document->createElement('name', $name);
    $prod2->appendChild($name2);
    $price2 = $document->createElement('price', $price);
    $prod2->appendChild($price2);
    $description2 = $document->createElement('description', $description);
    $prod2->appendChild($description2);
    $products->appendChild($prod2);
    $document->formatOutput = true;
    $document->save('data.xml') or die ('Sorry :(');
    header('location: index.php?page_layout = list');
}

?>
