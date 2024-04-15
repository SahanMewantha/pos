<?php
    include ('../config/function.php');

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
                    'price'=> $row['rice'],
                    'quntity'=> $row['quntity']
                ];
                array_push($_SESSION['productItemId'],$row['id']);
                array_push($_SESSION['productItem'],$productData);
            }
            else{
                redirct('orders-create.php','No product found !');  
            }

        }else{
            redirct('orders-create.php','Somthing went wrong !');
        }

    }
?>