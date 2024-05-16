<?php
    require '../config/function.php';
    
    $paramResultId=checkParamId('id');
    if(is_numeric($paramResultId)){

        $suppliersId=validate($paramResultId);

        $supplier =getById('suppliers',$suppliersId);
        if($supplier['status'] ==200)
        {
            $response =delete('suppliers',$suppliersId);
            if($response){
                redirct('suplier.php','Delete succsess...!');
            }


        }
        else{
            redirct('suplier.php',$supplier['message']);
        }
        
    }
    else{
        redirct('suplier.php','Somthin went wrong');
    }

?>