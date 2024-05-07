<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
        <div class="card-header">
                <h4 class="mb-0">Orders View
                <a href="orders.php" class="btn btn-danger float-end">Back</a>
        
                </h4>        
        </div>
        <div class="card-body">
        

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
                            $ordersItemquery ="SELECT oi.quntity as orderItemQuntity, oi.price as orderItemPrice, o.*, oi.*, p.*
                                FROM orders as o, order_item as oi, products as p
                                WHERE oi.order_id=o.id AND p.id=oi.product_id AND o.tracking_no='$trackingNo'";

                            $orderITemsRes =mysqli_query($conn,$ordersItemquery);
                            if($orderITemsRes){
                                if(mysqli_num_rows($orderITemsRes)>0)
                                {
                                    ?>
                                        <h4 class="my-3">Order Item Details</h4>
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Quntity</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($orderITemsRes as $orderItemRow): ?>
                                                    <tr>
                                                        <td width="15%" class="fw-bold text-center">
                                                            <?= $orderItemRow['name']; ?>
                                                        </td>
                                                        <td width="15%" class="fw-bold text-center">
                                                            <?= number_format($orderItemRow['orderItemPrice']); ?>
                                                        </td>
                                                        <td width="15%" class="fw-bold text-center">
                                                        <?= $orderItemRow['orderItemQuntity']; ?>
                                                        </td>
                                                        <td width="15%" class="fw-bold text-center">
                                                            <?= number_format($orderItemRow['orderItemPrice'] * $orderItemRow['orderItemQuntity']); ?>
                                                        </td>

                                                    </tr>
                                                <?php endforeach; ?>
                                                <tr>
                                                    <td class="text-end fw-bold">Total Price :</td>
                                                    <td colspan="3" class="text-end fw-bold">RS:  <?= number_format($orderItemRow['total_amount']); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <?php

                                }
                                else{

                                }
                            }
                            else{
                                echo '<h5>No Record Found !<h5>';
                                return false;
                            }
                        ?>

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