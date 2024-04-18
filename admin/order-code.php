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
?>