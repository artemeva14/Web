
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
            <?php 
            $len = 1;
             $connection = new mysqli("localhost", "root", "", "cactus");
             $query = "SELECT * FROM cactus";
             $products = mysqli_query($connection, $query);
             foreach ($products as $product) { 
                ?>
                <tr>
                    <td><?php echo $len++?></td>
					<td><?php echo $product['name']?></a></td>
					<td><?php echo $product['price']?></td>
					<td><?php echo $product['description'] ?></td>
                    <td><a href="index.php?page=update&id=<?php echo $product['id']; ?>" style=" display:block; font-size: 24px; border-radius: 10px; border:1px solid black; background: lightblue; text-align: center; color: black;">Редактировать</a></td>
                    <td><a href= "index.php?page=delete&id=<?php echo $product['id']; ?>" style=" display:block; height:10%; font-size: 24px; border-radius: 10px; border:1px solid black; background: lightblue; text-align: center; color: black;" >Удалить</a></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        <a href="index.php?page=create" style=" display:block; margin-top: 3%; width:10%; height:10%; font-size: 24px; border-radius: 10px; border:1px solid black; background: lightblue; text-align: center; color: black;"> Добавить кактус</a>

    </div>
</div>

