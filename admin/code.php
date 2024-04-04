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
    
?>