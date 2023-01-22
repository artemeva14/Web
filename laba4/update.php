<?php
$id=$_GET['id'];
$document = new DOMDocument();
$document->load('data.xml');
$products = $document->getElementsByTagName('products')->item(0);
$product=$products->getElementsByTagName('product');
$needed_product=$product->item(0);
$len = $product->length;
$id2 = 0;
for ($i = 0; $i < $len; $i++) {
    if ($product->item($i)->getElementsByTagName('id')->item(0)->nodeValue == $id) {
        $id2 = $i; 
        break;
    }
}
$needed_product = $product->item($id2);
?>

<form method="POST">
    <table>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name"  value="<?php echo $needed_product->getElementsByTagName('name')->item(0)->nodeValue ?>" minlength="1"></td>
        </tr>
        <tr>
            <td>Price:</td>
            <td><input type="text"  name="price" value="<?php echo $needed_product->getElementsByTagName('price')->item(0)->nodeValue ?>" minlength="1"></td>
        </tr>
        <tr>
            <td>Description:</td>
            <td><input type="text"  name="description" value="<?php echo $needed_product->getElementsByTagName('description')->item(0)->nodeValue ?>" minlength="1"></td>
        </tr>
        <tr>
            <td> </td>
            <td><input type="submit" value="Update" name="submit"></td>
        </tr>
    </table>
</form>

<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $prod3 = $document->createElement('product');
    $id3 = $document->createElement('id', intval($id));
    $prod3->appendChild($id3);
    $name3 = $document->createElement('name', $name);
    $prod3->appendChild($name3);
    $price3 = $document->createElement('price', $price);
    $prod3->appendChild($price3);
    $description3 = $document->createElement('description', $description);
    $prod3->appendChild($description3);

    $needed_id = 0;
    for ($i = 0; $i < $len; $i++) {
        if ($product->item($i)->getElementsByTagName('id')->item(0)->nodeValue == $id) {
            $nedeed_id = $i; 
            break;
        }
    }
    $products->replaceChild($prod3,$product->item($nedeed_id));
    $document->formatOutput = true;
    $document->save('data.xml')or die('Sorry :(');
    header('location: index.php?page=list');
}
?>

