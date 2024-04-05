<?php
    require '../config/function.php';
    
    $paramResultId=checkParamId('id');
    if(is_numeric($paramResultId)){

        $adminId=validate($paramResultId);

        $admin =getById('admin',$adminId);
        if($admin['status'] ==200)
        {
            $adminDeleteRec =delete('admin',$adminId);
            if($adminDeleteRec){
                redirct('admin.php','Delete succsess...!');
            }


        }
        else{
            redirct('admin.php',$admin['message']);
        }
        
    }
    else{
        redirct('admin.php','Somthin went wrong');
    }

?>