<?php
    require '../config/function.php';
    
    $paramResult=checkParamId('index');
    if(is_numeric($paramResult)){

        $indexValue=validate($paramResult);

        if(isset($_SESSION['productItem']) && isset($_SESSION['productItemId'])){

            unset($_SESSION['productItem'][$indexValue]);
            unset($_SESSION['productItemId'][$indexValue]);
            redirct('orders-create.php','Item Remove.....!');

        }
        else{
            redirct('orders-create.php','No item');
        }
    }



?>