<?php


/** This class is for product attributes validation. It recieves all product attributes and returns 
 * either the "error(if any)" or " success (if no errors)".
 * regarding sku => validate 1.not null 2.not less than 5 digit  3. not exist in DB.
 *           name=> validate 1.not null 2.not less than 5 digit.
 *           price=>validate 1.not null 2.numeric value.
 *           size, height, length, width and weight all the same with price, so I make a function 
 * to validate number and used it for them all.
  */
class ProductValidator 
{
    public function validateNumber($dataName,$data)
    {
        $dataError="";
        (empty($data)) ? ($dataError = 'Please insert '. $dataName)
        : ((filter_var($data, FILTER_VALIDATE_FLOAT)===false) ?  ($dataError = $dataName . ' must be a number.'):$dataError="success");
        return $dataError;
    }  

    public function validate($validators)
    {
        $skuError="";
        $nameError="";
        $priceError="";
        $sizeError="";
        $weightError="";
        $lenghtError="";
        $heightError="";
        $widthError="";
    
        require_once('SearchBySku.php');
        $searchBySku= new SearchBySku();
        $sku_exist=$searchBySku->fetchBySku($validators["sku"]);        

        (empty($validators["sku"])) ? ($skuError = 'Please insert SKU.')
          : ((iconv_strlen($validators["sku"])<5) ?  ($skuError = 'sku must be at least 5 characters.'):
        (($sku_exist==TRUE)?($skuError ="sku is already exist"):$skuError="success"));
        // return $skuError;

        (empty($validators["name"])) ? ($nameError = 'Please insert Name.')
          : ((iconv_strlen($validators["name"])<5) ?  ($nameError = 'name must be at least 5 characters.'):$nameError="success");
      
        $priceError=  ProductValidator :: validateNumber("price",$validators["price"]);
        $sizeError =  ProductValidator :: validateNumber("size",$validators["size"]);
        $weightError =  ProductValidator :: validateNumber("weight",$validators["weight"]);
        $heightError =  ProductValidator :: validateNumber("height",$validators["height"]);
        $lengthError =  ProductValidator :: validateNumber("length",$validators["length"]);
        $widthError =  ProductValidator :: validateNumber("width",$validators["width"]);
        $errors = array(
          "sku" => $skuError, 
          "name" =>  $nameError,
          "price" => $priceError,
          "size" => $sizeError,
          "weight" => $weightError,
          "height" => $heightError,
          "length" => $lengthError,      
          "width" => $widthError

          );
        return $errors;
    }
}

?>