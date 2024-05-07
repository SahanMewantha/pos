<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
        <div class="card-header">
                <h4 class="mb-0">Orders View
                <a href="orders.php" class="btn btn-danger float-end">Back</a>
        
                </h4>        
        </div>
        <div class="card-body">
        <?php alertMessage(); ?>

        <?php
            if(isset($_GET['track']))
            {
                $trackingNo=validate($_GET['track']);

                $query = "SELECT o.*,c.* FROM orders o, customers c 
                WHERE c.id=o.customer_id AND tracking_no='$trackingNo'
                ORDER BY o.id DESC";

                $orders = mysqli_query($conn,$query);
                if($orders){
                    if(mysqli_num_rows($orders)>0){
                        $ordersData = mysqli_fetch_assoc($orders);
                        $orderId=$ordersData['id'];

                        ?>
                        <div class="card card-body shadow border-1 mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Order Details</h4>
                                    <label class="mb-1">
                                        Tracking No :
                                        <span class="fw-bold"><?=$ordersData['tracking_no'] ?></span>
                                    </label>
                                    </br>
                                    <label class="mb-1">
                                        Order Date :
                                        <span class="fw-bold"><?=$ordersData['order_date'] ?></span>
                                    </label>
                                    </br>
                                    <label class="mb-1">
                                        Order Status :
                                        <span class="fw-bold"><?=$ordersData['order_status'] ?></span>
                                    </label>
                                    </br>
                                    <label class="mb-1">
                                        Payment Mode :
                                        <span class="fw-bold"><?=$ordersData['payment_mode'] ?></span>
                                    </label>
                                    </br>
                                </div>
                                <div class="col-md-6">
                                    <h4>User Details</h4>
                                    <label class="mb-1">
                                        Full Name :
                                        <span class="fw-bold"><?=$ordersData['cusname'] ?></span>
                                    </label>
                                    </br>
                                    <label class="mb-1">
                                        Email Address :
                                        <span class="fw-bold"><?=$ordersData['email'] ?></span>
                                    </label>
                                    </br>
                                    <label class="mb-1">
                                        Phone Number :
                                        <span class="fw-bold"><?=$ordersData['phone'] ?></span>
                                    </label>
                                    </br>
                                </div>
                            </div>
                        </div>

                        <?php

                    }else{
                        echo '<h5>No Record Found !<h5>';
                        return false;
                    }
                }
                else{

                }

            }
        ?>

        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>