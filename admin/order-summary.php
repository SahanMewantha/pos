<?php 
include('includes/header.php'); 
if(!isset($_SESSION['productItem'])){
    echo '<script> window.location.href="orders-create.php"; </script>';
}

?>

<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="mb-0"> Order Summary
                        <a href="orders-create.php" class="btn btn-danger float-end">Back to create Order</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php alertMessage(); ?>
                    <div class="myBillingArea">
                        <?php
                            if(isset($_SESSION['cphone'])){
                                $phone=validate($_SESSION['cphone']);
                                $invoiceNo=validate($_SESSION['invice_no']);

                                $cusQuery=mysqli_query($conn,"SELECT * FROM customers WHERE phone='$phone' LIMIT 1");
                                if($cusQuery){
                                    if(mysqli_num_rows($cusQuery)>0){
                                        $cRowData=mysqli_fetch_assoc($cusQuery);
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
                                                        <p style="font-size:14px; line-height:20px; margin:2px; padding:0;">Customer Name :<?= $cRowData['cusname'] ?></p>
                                                        <p style="font-size:14px; line-height:20px; margin:2px; padding:0;">Phone no:<?= $cRowData['phone'] ?></p>
                                                        <p style="font-size:14px; line-height:20px; margin:2px; padding:0;">Email :<?= $cRowData['email'] ?></p>
                                                    </td>
                                                    <td align="end">
                                                        <h5 style="font-size:20px; line-height:30px; margin:0px; padding:0;">Invoce Details</h5>
                                                        <p style="font-size:14px; line-height:20px; margin:2px; padding:0;">Invoce no: :<?= $invoiceNo; ?></p>
                                                        <p style="font-size:14px; line-height:20px; margin:2px; padding:0;">Customer date :<?= date('d m y') ?></p>
                                                        <p style="font-size:14px; line-height:20px; margin:2px; padding:0;">Address :</p>
                                                    </td>
                                                </tr>
                                            </tbody>

                                        </table>

                                        <?php
                                    }else{
                                        echo '<h5>No Customer Found !</h5>';
                                        return;
                                    }
                                }


                            }
                        ?>
                        <?php
                            if(isset($_SESSION['productItem'])){
                                $sessionProduct=$_SESSION['productItem'];
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
                                                    $totalAmount=0;
                                                    foreach($sessionProduct as $key =>$row):
                                                    $totalAmount += $row['price'] * $row['quntity']
                                                ?>
                                                <tr>
                                                    <td style="border-bottom:1px solid #ccc;"><?= $i++; ?></td>
                                                    <td style="border-bottom:1px solid #ccc;"><?= $row['name']; ?></td>
                                                    <td style="border-bottom:1px solid #ccc;"><?= number_format($row['price'],0) ?></td>
                                                    <td style="border-bottom:1px solid #ccc;"><?= $row['quntity']; ?></td>
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

                            }
                            else{
                                echo '<h5 class="text-center">No item added</h5>';
                            }
                        ?>




                    </div>
                    
                    <?php if(isset($_SESSION['productItem'])) :?>
                    <div class="mt-4 text-end">
                        <button type="button" class="btn btn-primary px-4 mx-1" id="saveOrder">Save Order</button>
                    </div>
                    <?php endif; ?>
                
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>