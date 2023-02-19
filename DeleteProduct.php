<?php
/* This class to delete one Product by ID. It calls  ProductBackendWithMysql() for deletion */

 class DeleteProduct{
    
    public function deleteProductById($id)
    {
            require_once('ProductBackendWithMysql.php');
            $record = new ProductBackendWithMysql();
            $record->setId($id);    
            $record->delete();
            header("location: ProductList.php" );

        //  echo "<script> alert('data deleted successfully'); document.location='productlist.php'</script>";

    }
}

?>