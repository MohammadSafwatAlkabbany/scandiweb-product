<?php
require_once("ProductBackendWithMysql.php");
$data = new ProductBackendWithMysql();
$all = $data->fetchAll();

require_once("MainProductProcess.php");
$mainProductProcess = new MainProductProcess();
if(isset($_GET['id']) && isset($_GET['req'])){
    if($_GET['req'] == "delete"){
        $mainProductProcess->deleteProcess($_GET['id']);
    }
}
if(isset($_POST['mass_delete'])){
    $mainProductProcess->massDeleteProcess($_POST['mass_delete_id']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Product List</title>
    
    

</head>
<body>
   
<div class="header">
        <h1>Scandiweb</h1>
        <p>List of all products</p>
</div>

<br>
<br>
<br>
<div class="nav">
    
    <div class="items-right">
    <a class="add-prod" href="addproduct.php"> Add product</a>
    <form action="productlist.php" method="POST">
    <button type='submit' value='mass_delete' name='mass_delete' class="mass-prod"> Mass Delete</button>
    </div>
</div>
 

<div class="list_view_test">
<?php
foreach($all as $key => $value){
?>

    <div class="list_view">
        <ul>
        <li><input type='checkbox' name='mass_delete_id[]' value="<?=$value['id'];?>" ></li>
            <li><p><span>Sku: <?= $value['sku']?></span></p></li>
            <li><p><span>Name: <?= $value['name']?><span></p></li>
            <li><p>Price: <?= $value['price']?> $</p></li>
            <li><p><?php if($value['weight']!=0){echo "Weight: ". $value['weight']. " kg";}?></p></li>
            <li><p><?php if($value['size']!=0){echo "Size: ".$value['size']. " cm";}?></p></li>
            <li><p><?php if($value['height']!=0){echo "Height: ". $value['height']. " * " . $value['length']. " * " .$value['width'] ;}?></p></li>
            
            <li><p><a href="productlist.php?id=<?= $value['id']?>&req=delete" class="button">DELETE</a><p></li>
        </ul>
    </div>
    <?php
}

?>
</div>



<br>
<footer >
  <p>&copy; Company, Ltd. All Rights Reserved.</p>
</footer>
</body>
</html>
