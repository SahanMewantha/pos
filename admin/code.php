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
                'password'=>$bcrypt_password,
                'phone'=>$phone,
                'is_ban'=>$is_ban    				
            ];
            $result=insert('admin',$data);
            if($result){
                redirct('admin.php','Admin Added...!.');
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
            redirct('categories-create.php','Please fill requre fields.');
        }


    }
    if(isset($_POST['savecategory']))
    {
        $itemname = validate($_POST['itemname']);
        $category = validate($_POST['category']);
        $quntity=validate($_POST['qty']);

        $data=[
            'itemname'=>$itemname,
            'category'=>$category,
            'quntity'=>$quntity

        ];
        $result=insert('categories',$data);
        if($result){
            redirct('categories.php','Item Created Succsessfully...!.');
        }
        else{
            redirct('categories-create.php','Somthin went wrong.');
        }


    }

    if(isset($_POST['updateCategory']))
    {
        $categoryid=validate($_POST['categoryId']);
        $adminData=getById('categories',$categoryid);
        if($adminData['status']!=200){
            redirct('categories-edit.php?id='.$categoryid,'Please fill requre fields.');
        }

        $itemname = validate($_POST['itemname']);
        $category = validate($_POST['category']);
        $quntity=validate($_POST['qty']);

        if($itemname !='' && $category !=''){
            $data=[
                'itemname'=>$itemname,
                'category'=>$category,
                'quntity'=>$quntity
    
            ];
            $result=update('categories',$categoryid,$data);
            if($result){
                redirct('categories.php?id='.$categoryid,'Item Updated Succsessfully...!.');
            }
            else{
                redirct('categories-edit.php?id='.$categoryid,'Somthin went wrong.');
            }

        }
    }


    if(isset($_POST['savecustomer']))
    {
        
        $cusname=validate($_POST['cusname']);
        $phone=validate($_POST['phone']);
        $email=validate($_POST['mail']);
        $status=isset($_POST['status']) ? 1:0;

        if($cusname !=''){

            $emailCheck = mysqli_query($conn,"SELECT * FROM customers WHERE email='$email'");
            if($emailCheck){
                if(mysqli_num_rows($emailCheck)>0){
                    redirct('customers-create.php','Email already used...!');
                }
            }
            $data=[
                'cusname'=>$cusname,
                'email'=>$email,
                'phone'=>$phone,
                'status'=>$status    				
            ];
            $result=insert('customers',$data);
            if($result){
                redirct('customer.php','customers Added...!.');
            }
            else{
                redirct('customer-create.php','Somthin went wrong.');
            }
        
        }
        

    }

    if(isset($_POST['updatecustomer']))
    {
        $cusid=validate($_POST['cusid']);
        $cusname=validate($_POST['cusname']);
        $phone=validate($_POST['phone']);
        $email=validate($_POST['mail']);
        $status=isset($_POST['status']) ? 1:0;

        if($cusname !='')
        {
            $emailCheck = mysqli_query($conn,"SELECT * FROM customers WHERE email='$email' AND id!='$cusid'");
            if($emailCheck){
                if(mysqli_num_rows($emailCheck)>0){
                    redirct('customers-edit.php?id='.$cusid,'Email already used...!');
                }
            }
            $data=[
                'cusname'=>$cusname,
                'email'=>$email,
                'phone'=>$phone,
                'status'=>$status    				
            ];
            $result=update('customers',$cusid,$data);
            if($result){
                redirct('customers-edit.php?id='.$cusid,'customers updated...!.');
            }
            else{
                redirct('customers-edit.php?id='.$cusid,'Somthin went wrong.');
            }
        
        }
        

    }

?>