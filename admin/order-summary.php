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
                                        
                                    </div>

                                <?php

                            }
                            else{
                                echo '<h5 class="text-center">No item added</h5>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>