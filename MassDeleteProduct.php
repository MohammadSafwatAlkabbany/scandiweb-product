<?php
  /* This class to  mass delete Products by ID. It delete all ids in massID 
  by looping and use deleteProductByID function for individual deletion */
  
    class MassDeleteProduct
    {
        public function massDeleteProductById($massId)
        {
            require_once('DeleteProduct.php');

            $deletePoduct = new DeleteProduct();
            foreach($massId as $id)
            {
                $deletePoduct->deleteProductById($id);
            }
            header("location: ProductList.php" );

        }
    
    }
    
    
    
   /* 
    public  function massDeleteProductById($massId){
    
    require_once('ProductBackendWithMysql.php');

    $record = new ProductBackendWithMysql();
    

        foreach($massId as $id){
          $record->setId($id);
            
            $record->delete();
        }

        header("location: ProductList.php" );
 
    //  echo "<script> alert('data deleted successfully'); document.location='productlist.php'</script>";

    }
    */
   
    

?>