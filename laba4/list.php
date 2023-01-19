<?php
$document = new DOMDocument();
$document -> load('data.xml');
$products = $document -> getElementsByTagName('products') -> item(0);
?>

<div class = "content">
    <div class = "content-name">
        <h1>Кактусы</h1>
    </div>
    <div class = "list" style="align-items: center">
        <table class = "table" style="border: 1px solid black">
            <tr style="border: 1px solid black">
                <th>№</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
          
            <tbody>
            <?php $len = 0;
            $product = $products -> getElementsByTagName('product');
            while (is_object($product -> item($len++))){
                ?>
                <tr>
                    <td><?php echo $len?></td>
                    <td><?php echo $product -> item($len - 1) -> getElementsByTagName('name') -> item(0) -> nodeValue?></td>
                    <td><?php echo $product -> item($len - 1) -> getElementsByTagName('price') -> item(0) -> nodeValue?></td>
                    <td><?php echo $product -> item($len - 1) -> getElementsByTagName('description') -> item(0) -> nodeValue?></td>
                    <td><a href="index.php?page=update&id=<?php echo  $product->item($len-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>" style=" display:block; font-size: 24px; border-radius: 10px; border:1px solid black; background: lightblue; text-align: center; color: black;">Редактировать</a></td>
                    <td><a href= "index.php?page=delete&id=<?php echo  $product->item($len-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>" style=" display:block; height:10%; font-size: 24px; border-radius: 10px; border:1px solid black; background: lightblue; text-align: center; color: black;" >Удалить</a></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        <a href="index.php?page=create" style=" display:block; margin-top: 3%; width:10%; height:10%; font-size: 24px; border-radius: 10px; border:1px solid black; background: lightblue; text-align: center; color: black;"> Добавить кактус</a>

    </div>
</div>

