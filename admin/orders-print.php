<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
        <div class="card-header">
                <h4 class="mb-0">Print Order
                <a href="orders.php" class="btn btn-danger float-end">Back</a>
        
                </h4>        
        </div>
        <div class="card-body">
            <?php
                if($_GET['track']){

                    $trackingNo = validate($_GET['track']);
                    if($trackingNo== ''){
                    ?>
                        <div class="text-center py-5">
                            <h5>Please provide tracking Number!</h5>
                            <div>
                            <a href="orders.php" class="btn btn-primary mt-4 w-25">Go Back to Oders</a>
                            </div>
                        
                        </div>
                    <?php
                    }

                    $orderQuery ="SELECT o.*, c.* FROM orders o , customers c
                        WHERE c.id=o.customer_id AND tracking_no='$trackingNo' LIMIT 1";
                    $orderQueryRes=mysqli_query($conn,$orderQuery);
                    if(!$orderQueryRes){
                        echo "<h5>Somthing wentwrong !<h5>";
                        return false;
                    }
                    if(mysqli_num_rows($orderQueryRes)>0){
                        $orderDataRow=mysqli_fetch_assoc($orderQueryRes);
                        ?>
                            <table style="width:100%;margin-bottom:20px;">
                                        <tbody>
                                            <tr>
                                                <td style="text-align:center;" colspan="2">
                                                    <h4 style="font-size:23px; line-height:30px; margin:2px; padding:0;">Fresh Harvest Farm</h4>
                                                    <p style="font-size:23px; line-height:30px; margin:2px; padding:0;">Fresh Harvest Farm 1st cross rd, Ampara</p>
                                                    <p style="font-size:23px; line-height:30px; margin:2px; padding:0;">Fresh Harvest Farm pvt ltd</p>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 style="font-size:20px; line-height:30px; margin:0px; padding:0;">Customer Details</h5>
                                                    <p style="font-size:14px; line-height:20px; margin:2px; padding:0;">Customer Name :<?= $orderDataRow['cusname'] ?></p>
                                                    <p style="font-size:14px; line-height:20px; margin:2px; padding:0;">Phone no:<?= $orderDataRow['phone'] ?></p>
                                                    <p style="font-size:14px; line-height:20px; margin:2px; padding:0;">Email :<?= $orderDataRow['email'] ?></p>
                                                </td>
                                                <td align="end">
                                                    <h5 style="font-size:20px; line-height:30px; margin:0px; padding:0;">Invoce Details</h5>
                                                    <p style="font-size:14px; line-height:20px; margin:2px; padding:0;">Invoce no: :<?= $orderDataRow['tracking_no']; ?></p>
                                                    <p style="font-size:14px; line-height:20px; margin:2px; padding:0;">Customer date :<?= date('d m y') ?></p>
                                                    <p style="font-size:14px; line-height:20px; margin:2px; padding:0;">Address :Ampara</p>
                                                </td>
                                            </tr>
                                        </tbody>
                            </table>

                        <?php

                    }
                    else{
                        echo "<h5>No data found !<h5>";
                        return false;
                    }
                    $orderrItemQuery="SELECT oi.quntity as orderItemQuntity, oi.price as orderItemPrice, o.*, oi.*, p.*
                        FROM orders o, order_item oi, products p 
                        WHERE oi.order_id=o.id AND p.id=product_id AND o.tracking_no='$trackingNo'";

                    $orderrItemQueryRes = mysqli_query($conn,$orderrItemQuery);
                    if($orderQueryRes){
                        if(mysqli_num_rows($orderrItemQueryRes)>0)
                        {
                            ?>
                                <div class="table-responsive mb-3">
                                        <table style="width:100%;" cellpadding="5">
                                            <thead>
                                                <tr>
                                                    <th align="start" style="border-bottom:1px solid #ccc;" width=5%;>ID</th>
                                                    <th align="start" style="border-bottom:1px solid #ccc;" width=5%;>Produc Name</th>
                                                    <th align="start" style="border-bottom:1px solid #ccc;" width=5%;>Price</th>
                                                    <th align="start" style="border-bottom:1px solid #ccc;" width=5%;>Quntity</th>
                                                    <th align="start" style="border-bottom:1px solid #ccc;" width=5%;>Total Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $i=1;

                                                    foreach($orderrItemQueryRes as $key =>$row):
                                                ?>
                                                <tr>
                                                    <td style="border-bottom:1px solid #ccc;"><?= $i++; ?></td>
                                                    <td style="border-bottom:1px solid #ccc;"><?= $row['name']; ?></td>
                                                    <td style="border-bottom:1px solid #ccc;"><?= number_format($row['orderItemPrice'],0) ?></td>
                                                    <td style="border-bottom:1px solid #ccc;"><?= $row['orderItemQuntity']; ?></td>
                                                    <td style="border-bottom:1px solid #ccc;" class="fwbold">
                                                        <?= number_format($row['price']* $row['quntity'],0) ?>
                                                    </td>

                                                </tr>
                                                <?php endforeach; ?>
                                                <tr>
                                                    <td colspan="4" align="end" style="font-weight:bold;">Grand Total :</td>
                                                    <td colspan="1"  style="font-weight:bold;"><?= number_format($totalAmount,0); ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">Payment Mode : <?= $_SESSION['payment_mode']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                    </div>

                            <?php
                        }else{

                        }

                    }
                    else{
                        echo "<h5>Somthing Went wrong !<h5>";
                        return false; 
                    }

                }else{

                }
            
            ?>

        
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>