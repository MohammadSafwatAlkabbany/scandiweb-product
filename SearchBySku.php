<?php
/** this class to check the existence of particular sku in DB. 
 * It just recieve sku and return TRUE or FALSE */
class SearchBySku{

    public function fetchBySku($newSku)
    { 
        require_once("ProductBackendWithMysql.php");
        $data = new ProductBackendWithMysql();
        $all = $data->fetchAll();
        $sku_exist=FALSE;
        foreach($all as $key => $value)
            {
                (  $value['sku']===$newSku)? ($sku_exist=TRUE):'';
            }
        return $sku_exist;
    }
}
?>