<?php

/** This is the core class of the project. It receives all requests from the frontend 
 * and send them to different classes in backend. All classes can only accessed through this class.
 * Any future request should be added here first and the approperiate class is then added.  
 * upto now there are 4 functions ( two for 'add' request, one for 'delete' and one for 'mass delete'.
*   
*                                          -->> this the map of the project   <<--
 * ************************************************************************************************************************************************************************
 *                               ==(add request)=>prepareForValidation()=>ProductValidator(SearchBySKU())=> addProcess()=> inserProductAll()=> ProductBackendWithmySQL()  *
 * Frontend => MainProductProcess==(delete request)=>deleteProductByID()=>ProductBackendWithmySQL()                                                                       *
 *                               ==>(massdelete request)=> MassDeleteProduct()=>deleteProductByID()=>ProductBackendWithmySQL()                                            * 
 * ************************************************************************************************************************************************************************
 * */                                      


class MainProductProcess
{

    public function prepareForValidation()
    {
        $skuToBeValidated = filter_input(INPUT_POST, 'sku');
        $nameToBeValidated = filter_input(INPUT_POST, 'name');
        $priceToBeValidated = filter_input(INPUT_POST, 'price');
        $sizeToBeValidated = filter_input(INPUT_POST, 'size');
        $weightToBeValidated = filter_input(INPUT_POST, 'weight');
        $lengthToBeValidated = filter_input(INPUT_POST, 'length');
        $heightToBeValidated = filter_input(INPUT_POST, 'height');
        $widthToBeValidated = filter_input(INPUT_POST, 'width');

        $validators = array(
            "sku" => $skuToBeValidated, 
            "name" =>  $nameToBeValidated,
            "price" => $priceToBeValidated,
            "size" => $sizeToBeValidated,
            "weight" => $weightToBeValidated,
            "height" => $heightToBeValidated,
            "length" => $lengthToBeValidated,
            "width" => $widthToBeValidated
            );
        
        require_once('ProductValidator.php');
        $productValidator = new ProductValidator();
        $errors=$productValidator->validate($validators);
        $all = array($validators,$errors);
        return $all;

    }

    public function addProcess($data)
    {
    
        $DVDdata=[$data[1]['sku'],$data[1]['name'],$data[1]['price'],$data[1]['size']];
        $bookdata=[$data[1]['sku'],$data[1]['name'],$data[1]['price'],$data[1]['weight']];
        $furniturdata=[$data[1]['sku'],$data[1]['name'],$data[1]['price'],$data[1]['height'],$data[1]['length'],$data[1]['width']];
        
        require_once('InsertProductAll.php');
        $insertProductAll= new InsertProductAll();
        
        (count( array_keys( $DVDdata, "success" ))==4)?( $insertProductAll->insertDVD()):'';
        
        (count( array_keys( $bookdata, "success" ))==4)?($insertProductAll->insertBook()):''; 

        (count( array_keys( $furniturdata, "success" ))==6)?($insertProductAll->insertFurniture()):'';
    }        
        
    public function deleteProcess($id)
    {        
        require_once('DeleteProduct.php');
        $deleteProduct = new DeleteProduct();
        $deleteProduct -> deleteProductById($id);
    }

    public function massDeleteProcess($massId)
    {
        require_once('MassDeleteProduct.php');
        $massDeleteProduct = new MassDeleteProduct();
        $massDeleteProduct -> massDeleteProductById($massId);
    }    
}
?>