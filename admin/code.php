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
        $description = validate($_POST['description']);
        $category = validate($_POST['category']);

        $data=[
            'description'=>$description,
            'category'=>$category

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

        $description = validate($_POST['description']);
        $category = validate($_POST['category']);

        if($description !='' && $category !=''){
            $data=[
                'description'=>$description,
                'category'=>$category
    
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

    
    if(isset($_POST['saveSupplier']))
    {
        
        $cusname=validate($_POST['cusname']);
        $phone=validate($_POST['phone']);
        $email=validate($_POST['mail']);

        if($cusname !=''){

            $emailCheck = mysqli_query($conn,"SELECT * FROM suppliers WHERE email='$email'");
            if($emailCheck){
                if(mysqli_num_rows($emailCheck)>0){
                    redirct('supplier-create.php','Email already used...!');
                }
            }
            $data=[
                'cusname'=>$cusname,
                'email'=>$email,
                'phone'=>$phone
                   				
            ];
            $result=insert('suppliers',$data);
            if($result){
                redirct('suplier.php','Supplier Added...!.');
            }
            else{
                redirct('supplier-create.php','Somthing went wrong.');
            }
        
        }
        

    }

    if(isset($_POST['updateSupplier']))
    {
        $cusid=validate($_POST['cusid']);
        $cusname=validate($_POST['cusname']);
        $phone=validate($_POST['phone']);
        $email=validate($_POST['mail']);

        if($cusname !='')
        {
            $emailCheck = mysqli_query($conn,"SELECT * FROM suppliers WHERE email='$email' AND id!='$cusid'");
            if($emailCheck){
                if(mysqli_num_rows($emailCheck)>0){
                    redirct('suppliers-edit.php?id='.$cusid,'Email already used...!');
                }
            }
            $data=[
                'cusname'=>$cusname,
                'email'=>$email,
                'phone'=>$phone
                   				
            ];
            $result=update('suppliers',$cusid,$data);
            if($result){
                redirct('suplier.php?id='.$cusid,'Suppliers updated...!.');
            }
            else{
                redirct('suppliers-edit.php?id='.$cusid,'Somthin went wrong.');
            }
        
        }
        

    }


    if(isset($_POST['saveProduct']))
    {
        $categoryid = validate($_POST['category_id']);
        $name = validate($_POST['name']);
        $price = validate($_POST['price']);
        $quntity = validate($_POST['quntity']);
        $status=isset($_POST['status']) ? 1:0;

        $data=[
            'catogory_id'=>$categoryid ,
            'name'=>$name,
            'price'=>$price,
            'quntity'=>$quntity,
            'status'=>$status

        ];
        $result=insert('products',$data);
        if($result){
            redirct('product.php','Item Created Succsessfully...!.');
        }
        else{
            redirct('products-create.php','Somthin went wrong.');
        }


    }

    if(isset($_POST['updateProduct']))
    {
        $product_id = validate($_POST['product_id']);

        $productDate=getById('products',$product_id);
        if(!$productDate){
            redirct('product.php','no product found');
        }

        $categoryid = validate($_POST['category_id']);
        $name = validate($_POST['name']);
        $price = validate($_POST['price']);
        $quntity = validate($_POST['quntity']);
        $status=isset($_POST['status']) ? 1:0;

        $data=[
            'catogory_id'=>$categoryid ,
            'name'=>$name,
            'price'=>$price,
            'quntity'=>$quntity,
            'status'=>$status

        ];
        $result=update('products',$product_id,$data);
        if($result){
            redirct('product-edit.php?id='.$product_id,'Item Created Succsessfully...!.');
        }
        else{
            redirct('product-edit.php?id='.$product_id,'Somthin went wrong.');
        }


    }





?>