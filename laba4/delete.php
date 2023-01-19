<?php 
$id = $_GET['id'];
$document = new DOMDocument();
$document->load('data.xml');
$products = $document->getElementsByTagName('products')->item(0);
$product=$products->getElementsByTagName('product');

$len = $product->length;
$id2 = 0;
for ($i = 0; $i < $len; $i++) {
    if ($product->item($i)->getElementsByTagName('id')->item(0)->nodeValue == $id) {
        $id2 = $i; 
        break;
    }
}
$products->removeChild($product->item($id2));

$document->formatOutput=true;
$document->save('data.xml')or die('Sorry :(');
    header('location: index.php?page=list');
?>