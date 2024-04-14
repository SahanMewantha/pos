<?php
    require '../config/function.php';
    
    $paramResultId=checkParamId('id');
    if(is_numeric($paramResultId)){

        $productId=validate($paramResultId);

        $admin =getById('products',$productId);
        if($admin['status'] ==200)
        {
            $adminDeleteRec =delete('products',$productId);
            if($adminDeleteRec){
                redirct('product.php','Delete succsess...!');
            }


        }
        else{
            redirct('product.php',$admin['message']);
        }
        
    }
    else{
        redirct('product.php','Somthin went wrong');
    }

?>