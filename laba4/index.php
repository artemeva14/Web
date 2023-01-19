<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лаба4</title>
    <link rel="stylesheet" href="../laba2/CSS/style.css">
    <meta name="discription" content="Надо что-то придумать">
</head>
<?php
if (isset($_GET['page'])){
    switch ($_GET['page']){
        case 'list':
            require_once 'list.php';
            break;
        case 'create':
            require_once 'create.php';
            break;
        case 'update':
            require_once 'update.php';
            break;
        case 'delete':
            require_once 'delete.php';
            break;
    }
} else{
    require_once 'list.php';
}
?>
</body>
</html>