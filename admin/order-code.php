<?php
    include ('../config/function.php');

    if(!isset($_SESSION['productItem'])){
        $_SESSION['productItem']=[];
    }

    if(!isset($_SESSION['productItemId'])){
        $_SESSION['productItemId']=[];
    }

    if(isset($_POST['addItem']))
    {
        $productid=validate($_POST['product_id']);
        $quntity=validate($_POST['quntity']);
        
        $cheackProduct=mysqli_query($conn,"SELECT * FROM products WHERE id='$productid' LIMIT 1");
        if($cheackProduct){
            if(mysqli_num_rows($cheackProduct)>0){
                $row=mysqli_fetch_assoc($cheackProduct);
                if($row['quntity']<$quntity){
                    redirct('orders-create.php','Only' .$row['quntity']. 'quntity avilable !');  
                }
                $productData=[
                    'product_id' => $row['id'],
                    'name'=> $row['name'],
                    'price'=> $row['price'],
                    'quntity'=> $row['quntity']
                ];
                

                if(!in_array($row['id'],$_SESSION['productItemId'])){
                    array_push($_SESSION['productItemId'],$row['id']);
                    array_push($_SESSION['productItem'],$productData);
                }else{

                    foreach($_SESSION['productItem'] as $key =>$prodSessionItem){
                        if($prodSessionItem['product_id']==$row['id']){

                            $newQuntity =$prodSessionItem['quntity']+$quntity;
                            $productData=[
                                'product_id' => $row['id'],
                                'name'=> $row['name'],
                                'price'=> $row['price'],
                                'quntity'=> $newQuntity
                            ];
                            $_SESSION['productItem'][$key]=$productData;

                        }
                    }
                }
                redirct('orders-create.php','Item Added !'.$row['name']); 
            }
            else{
                redirct('orders-create.php','No product found !');  
            }

        }else{
            redirct('orders-create.php','Somthing went wrong !');
        }

    }

    if(isset($_POST['productIncDec'])){
        $productid=validate($_POST['product_id']);
        $quntity=validate($_POST['quntity']);

        $flag=false;
        foreach($_SESSION['productItem'] as $key=>$item){
            if($item['product_id']==$productid){
                $flag=true;
                $_SESSION['productItem'][$key]['quntity']=$quntity;
            }

        }
        if($flag){
            jsonResponse(200,'Success','Quntity Update');
        }
        else{
            jsonResponse(500,'Error','Somthing went wrong.please refrsh');
        }

    }

    if(isset($_POST['proceedToPlaceBtn'])){

        $phone=validate($_POST['cphone']);
        $payment_mode=validate($_POST['payment_mode']);

        $cheackCustomer=mysqli_query($conn,"SELECT * FROM customers where phone=$phone LIMIT 1");
        if($cheackCustomer){
            if(mysqli_num_rows($cheackCustomer)>0){
                $_SESSION['invice_no'] = "INV-".rand(111111,999999);
                $_SESSION['cphone']=$phone;
                $_SESSION['payment_mode']=$payment_mode;
                jsonResponse(200,'success','Customer Found!');
            }
            else{
                $_SESSION['cphone'] =$phone;
                jsonResponse(404,'warning','Customer Not Found!');
            }
        }
        else{
            jsonResponse(500,'error','somthin went wrong');
        }

    }

    if(isset($_POST['saveCustomerBtn']))
    {
        $name=validate($_POST['name']);
        $phone=validate($_POST['phone']);
        $email=validate($_POST['email']);

        if($name != '' && $phone != ''){
            $data=[
                'cusname'=>$name,
                'phone'=>$phone,
                'email'=>$email  				
            ];
            $result=insert('customers',$data);
            if($result){
                jsonResponse(200,'success','Customer create sucsessfully !');  
            }else{
                jsonResponse(500,'error','Somthing went wrong!');
            }
        }
    }

    if(isset($_POST['saveOrder']))
    {
        $phone=validate($_POST['cphone']);
        $invice_no=validate($_POST['invice_no']);
        $payment_mode=validate($_POST['payment_mode']);


        $cheackCustomer=mysqli_query($conn,"SELECT * FROM customers WHERE phone='$phone' LIMIT 1 ");
        if(!$cheackCustomer){
            jsonResponse(500,'error','Somthing Went Wrong!');
        }

        if(mysqli_num_rows($cheackCustomer)>0){
            $customerData=mysqli_fetch_assoc($cheackCustomer);

            if(!isset($_SESSION['productItem'])){
                jsonResponse(404,'warning','No Items to place Order !');  
            }

            $sessonProduct=$_SESSION['productItem'];

            $totalAmount=0;

            
            $data =[
                'customer_id' => $customerData['id'],
                'tracking_no' => rand(11111,99999),
                'invoce_no' => $invice_no,
                'total_amount' =>$totalAmount

            ];
        }



    }
?>