<?php
    require '../config/function.php';
    
    $paramResultId=checkParamId('id');
    if(is_numeric($paramResultId)){

        $customerId=validate($paramResultId);

        $customer =getById('customers',$customerId);
        if($customer['status'] ==200)
        {
            $response =delete('customers',$customerId);
            if($response){
                redirct('customer.php','Delete succsess...!');
            }


        }
        else{
            redirct('customer.php',$customer['message']);
        }
        
    }
    else{
        redirct('customer  .php','Somthin went wrong');
    }

?>