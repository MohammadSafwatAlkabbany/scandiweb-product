<?php
$error = FALSE;
if(isset($_POST['save'])){
    require_once('MainProductProcess.php');
    $mainProductProcess = new MainProductProcess();
    $all=$mainProductProcess->prepareForValidation();
    
    (count( array_keys( $all[1], "success" ))>=4)?($mainProductProcess->addProcess($all)):$error = TRUE;
   
}
if(isset($_POST['cancel'])){
    header("location: ProductList.php" );
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="style.css" rel="stylesheet">

    <title>Add Product</title>

    <style type = "text/css">
        .dvdcss {
            display: none;
        }
        .bookcss {
            display: none;
        }
        .furniturecss {
            display: none;
        }
    </style>
</head>
<body>
<div class="header">
        <h1>Scandiweb</h1>
        <p>add product</p>
</div>
<div class="under_head">
    <h1>Fill out the information</h1>
</div>
    <div class="container">
        <form class="form-test" action="addproduct.php" method="POST">

        <input type="text" id="sku" name="sku" placeholder="Enter sku"
         value="<?php echo isset($_POST["sku"]) ? htmlentities($_POST["sku"]) : ''; ?>"/>
        <?php if($error && $all[1]['sku']!='success'){echo $all[1]['sku'];} ?><br>
       
        <input type="text" id="name" name="name" placeholder="Enter name"
        value="<?php echo isset($_POST["name"]) ? htmlentities($_POST["name"]) : ''; ?>"/>
        <?php if($error && $all[1]['name']!='success'){echo $all[1]['name'];}?><br>

        <input type="text" id="price" name="price" placeholder="Enter price"
        value="<?php echo isset($_POST["price"]) ? htmlentities($_POST["price"]) : ''; ?>"/>
        <?php if($error && $all[1]['price']!='success'){echo $all[1]['price'];}?><br>

         
            <select id="product" onchange="selectProduct(this)">
                <option value="choose product">choose product</option>
                <option value="DVD" >DVD</option>
                <option value="Book">Book</option>
                <option value="Furniture">Furniture</option>
            </select>
            <br>
        <div class ="dvdcss" id="dvd">
           <input type="text"   name="size" placeholder="Enter size"
           value="<?php echo isset($_POST["size"]) ? htmlentities($_POST["size"]) : ''; ?>"/>
           <?php if($error && $all[1]['size']!='success'){echo $all[1]['size'];}?><br>
        </div>

        <div class ="furniturecss" id="furniture">
        <input type="text"   name="height" placeholder="Enter height"
        value="<?php echo isset($_POST["height"]) ? htmlentities($_POST["height"]) : ''; ?>"/>
        <?php if($error && $all[1]['height']!='success'){echo $all[1]['height'];}?><br>
        
        <input type="text"   name="length" placeholder="Enter length"
        value="<?php echo isset($_POST["length"]) ? htmlentities($_POST["length"]) : ''; ?>"/>
        <?php if($error && $all[1]['length']!='success'){echo $all[1]['length'];}?><br>
        
        <input type="text"   name="width" placeholder="Enter width"
        value="<?php echo isset($_POST["width"]) ? htmlentities($_POST["width"]) : ''; ?>"/>
        <?php if($error && $all[1]['width']!='success'){echo $all[1]['width'];}?><br>
        </div>

        <div class ="bookcss" id="book" >
        <input type="text"  name="weight" placeholder="Enter weight"
        value="<?php echo isset($_POST["weight"]) ? htmlentities($_POST["weight"]) : ''; ?>"/>
        <?php if($error && $all[1]['weight']!='success'){echo $all[1]['weight'];}?><br>
        </div>

        <input type="submit" value="save" name="save"/>
        <input type="submit" value="cancel" name="cancel"/>
            
            <script type="text/javascript">
               function selectProduct(answer){
                //console.log(answer.value)
                if(answer.value == "choose product" ){
                    document.getElementById('dvd').classList.add('dvdcss');
                    document.getElementById('book').classList.add('bookcss');
                    document.getElementById('furniture').classList.add('furniturecss');
                    
                } 
                if(answer.value == "DVD"){
                    document.getElementById('dvd').classList.remove('dvdcss');
                    document.getElementById('book').classList.add('bookcss');
                    document.getElementById('furniture').classList.add('furniturecss');
                    
                } 
                if(answer.value == "Book"){
                    document.getElementById('book').classList.remove('bookcss');
                    document.getElementById('dvd').classList.add('dvdcss');
                    document.getElementById('furniture').classList.add('furniturecss');
                }
                if(answer.value == "Furniture"){
                    document.getElementById('furniture').classList.remove('furniturecss');
                    document.getElementById('dvd').classList.add('dvdcss');
                    document.getElementById('book').classList.add('bookcss');
                }
               }
            </script>

    </div>
    <br>
<footer >
  <p>&copy; Company, Ltd. All Rights Reserved.</p>
</footer>
</body>
</html>

</body>
</html>