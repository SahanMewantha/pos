<?php
    include('../config/function.php');

    if(isset($_POST["saveAdmin"]))
        {
        $name=validate($_POST['name']);
        $email=validate($_POST['email']);
        $password=validate($_POST['password']);
        $phone=validate($_POST['phone']);
        $is_ban=validate($_POST['is_ban']) == true ? 1:0;

        if($name != '' && $email != '' && $password != ''){

            $emailCheck = mysqli_query($conn,"SELECT * FROM admin WHERE email='$email'");
            if($emailCheck){
                if(mysqli_num_rows($emailCheck)>0){
                    redirct('admins-create.php','Email already used...!');
                }
            }
            $bcrypt_password=password_hash($password,PASSWORD_BCRYPT);

            $data=[
                'name'=>$name,
                'email'=>$email,
                'password'=>$password,
                'phone'=>$phone,
                'is_ban'=>$is_ban    				
            ];
            $result=insert('admin',$data);
            if($result){
                redirct('admin.php','Admin Created Succsessfully...!.');
            }
            else{
                redirct('admins-create.php','Somthin went wrong.');
            }
        }
        else{
            redirct('admins-create.php','Please fill requre fields.');
        }


    }

    if(isset($_POST['updateAdmin']))
    {
        $adminId=validate($_POST['adminId']);
        $adminData=getById('admin',$adminId);
        if($adminData['status']!=200){
            redirct('admins-edit.php?id='.$adminId,'Please fill requre fields.');
        }

        $name=validate($_POST['name']);
        $email=validate($_POST['email']);
        $password=validate($_POST['password']);
        $phone=validate($_POST['phone']);
        

        if($password !=''){
            $hashedPassword=password_hash($password,PASSWORD_BCRYPT);
        }
        else{
            $hashedPassword=$adminData['data']['password'];
        }
        if($name !='' && $email !=''){
            $data=[
                'name'=>$name,
                'email'=>$email,
                'password'=>$password,
                'phone'=>$phone,   				
            ];
            $result=update('admin',$adminId,$data);
            if($result){
                redirct('admin.php?id='.$adminId,'Admin Updated Succsessfully...!.');
            }
            else{
                redirct('admins-edit.php?id='.$adminId,'Somthin went wrong.');
            }

        }


        if($name != '' && $email != '' )
        {
        }
        else
        {
            redirct('admins-create.php','Please fill requre fields.');
        }


    }
    
?>