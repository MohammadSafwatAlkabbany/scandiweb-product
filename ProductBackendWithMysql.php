<?php
require_once("database.php");

class ProductBackendWithMysql{
   // private $id;
    private $sku;
    private $name;
    private $price;
    private $size;
    private $height;
    private $length;
    private $width;
    private $weight;
    protected $dbCnx;

    public function __construct( $id=0, $sku="",$name="",$price="", $size="", $height="", $length="", $width="", $weight=""){
         $this-> id = $id;
         $this-> sku = $sku;
         $this-> name = $name;
         $this-> price = $price;
         $this-> size = $size;
         $this-> height = $height;
         $this-> length = $length;
         $this-> width = $width;
         $this-> weight = $weight;

         $this-> dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD,[ PDO::ATTR_DEFAULT_FETCH_MODE => PDO:: FETCH_ASSOC]);

    }

    

    public function setId($id){
        $this->id = $id;
   }

    public function getId(){
        return $this-> id;
    }
    
    public function setSku($sku){
        $this->sku = $sku;
    }

    public function getSku(){
        return $this-> sku;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this-> name;
    }
    public function setPrice($price){
        $this->price = $price;
    }

    public function getPrice(){
        return $this-> price;
    }
    public function setSize($size){
        $this->size = $size;
    }

    public function getSize(){
        return $this-> size;
    }
    public function setHeight($height){
        $this->height = $height;
    }

    public function getHeight(){
        return $this-> height;
    }
    public function setLength($length){
        $this->length = $length;
    }

    public function getLength(){
        return $this-> length;
    }
    public function setWidth($width){
        $this->width = $width;
    }

    public function getWidth(){
        return $this-> width;
    }

    public function setWeight($weight){
        $this->weight = $weight;
    }

    public function getWeight(){
        return $this-> weight;
    }

    public function insertData(){
        try{
            $stm = $this->dbCnx->prepare("INSERT INTO products(sku,name,price,size,height,length,width,weight) VALUES (?,?,?,?,?,?,?,?)");
            $stm->execute([$this->sku,$this->name,$this->price,$this->size,$this->height,$this->length,$this->width,$this->weight]);
            echo "<script> alert('data saved successfully'); document.location='productlist.php'</script>";
           // header("location: ProductList.php" );
        }catch(Exception $e){
            die("error in db insert");
           // return $e->getMessage();
        }    
    }

    public function fetchAll(){
        try{
            $stm = $this->dbCnx->prepare("SELECT * FROM products");
            $stm->execute();
            return $stm->fetchAll();
        }catch(Exception $e){
            die("error in db fetch");
           // return $e->getMessage();
        }
    }

    public function fetchOne(){
        try{
            $stm = $this->dbCnx->prepare("SELECT FROM products where sku=?");
            $stm->execute([$this->sku]);
           // (null !== $sku)?($Sku_exist=TRUE):'';
            return $stm->fetchAll();
             
        }catch(Exception $e){
            //return $Sku_exist;
            die("error in db fetch with id");
           // return $e->getMessage();
        }
    }
    
    public function update(){
        try{
            $stm = $this->dbCnx->prepare("UPDATE products SET sku = ?,name=?,price=?,size=?,height=?,length=?,width=?,weight=? where id=?");
            $stm->execute([$this->id,$this->sku,$this->name,$this->price,$this->size,$this->height,$this->length,$this->width,$this->weight]);
            echo "<script> alert('data updated successfully'); document.location='productlist.php'</script>";

        }catch(Exception $e){
            die("error in db update with id");
           // return $e->getMessage();
        }
    }

    public function delete(){
        try{
            $stm = $this->dbCnx->prepare("DELETE FROM products where id=?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
     //       echo "<script> alert('data deleted successfully'); document.location='productlist.php'</script>";

        }catch(Exception $e){
            die("error in db delete with id");
           // return $e->getMessage();
        }
    }

    
}



// filter_var($email, FILTER_VALIDATE_FLOAT)
//FILTER_SANITIZE_NUMBER_FLOAT Remove all characters except digits, +- and optionally .,eE. 
?>