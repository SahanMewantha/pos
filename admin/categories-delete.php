<?php
    require '../config/function.php';
    
    $paramResultId=checkParamId('id');
    if(is_numeric($paramResultId)){

        $adminId=validate($paramResultId);

        $admin =getById('categories',$adminId);
        if($admin['status'] ==200)
        {
            $adminDeleteRec =delete('categories',$adminId);
            if($adminDeleteRec){
                redirct('categories.php','Delete succsess...!');
            }


        }
        else{
            redirct('categories.php',$admin['message']);
        }
        
    }
    else{
        redirct('categories.php','Somthin went wrong');
    }

?>