<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
        <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                        <h4 class="mb-0">Orders</h4>
                    </div>
                    <div class="col-md-8">
                        <form action="" method="get">
                            <div class="row g-1">
                                <div class="col-md-4">
                                    <input type="date"
                                        class="form-control"
                                        name="date" value="<?= isset($_GET['date']) == true ? $_GET['date']: ''; ?>"
                                    />
                                </div>
                                <div class="col-md-4">
                                    <select name="payment_status" class="form-select">
                                        <option value="">Select payment Status</option>
                                        <option value="Cash payment"
                                        <?= 
                                        isset($_GET['payment_status'])==true 
                                        ?
                                        ($_GET['payment_status'] == 'Cash payment' ? 'selected': '')
                                        :
                                        ''; 
                                        ?>
                                        >
                                        Cash Payment</option>
                                        <option value="Online Payment"
                                        <?= 
                                        isset($_GET['payment_status'])==true 
                                        ?
                                        ($_GET['payment_status'] == 'Online Payment' ? 'selected': '')
                                        :
                                        ''; 
                                        ?>
                                        >
                                        Onlie Payment</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Filter <i class="fa fa-filter" aria-hidden="true"></i></button>
                                    <a href="orders.php" class="btn btn-danger">reset <i class="fa fa-repeat" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>        
        </div>
        <div class="card-body">
            <?php

                if(isset($_GET['date']) || isset($_GET['payment_status'])){
                    $orderDate=validate($_GET['date']);
                    $paymentStatus=validate($_GET['payment_status']);

                    if($orderDate != '' && $paymentStatus == ''){
                        $query="SELECT o.*,c.* FROM orders o, customers c 
                        WHERE c.id=o.customer_id AND o.order_date='$orderDate' ORDER BY o.id DESC";

                    }elseif($orderDate =='' && $paymentStatus == '' ){
                        $query="SELECT o.*,c.* FROM orders o, customers c 
                        WHERE c.id=o.customer_id AND o.payment_mode='$paymentStatus' ORDER BY o.id DESC";

                    }elseif($orderDate =='' && $paymentStatus != ''){
                        $query="SELECT o.*,c.* FROM orders o, customers c 
                        WHERE c.id=o.customer_id 
                        AND o.order_date='$orderDate' 
                        AND o.payment_mode='$paymentStatus' ORDER BY o.id DESC";
                    }else{
                        $query="SELECT o.*,c.* FROM orders o, customers c
                        WHERE c.id=o.customer_id ORDER BY o.id DESC";
                    }

                }
                else{
                    $query="SELECT o.*,c.* FROM orders o, customers c
                     WHERE c.id=o.customer_id ORDER BY o.id DESC";
                }
                
                $orders =mysqli_query($conn,$query);
                if($orders)
                {
                    if(mysqli_num_rows($orders)>0)
                    {
                        ?>
                            <table class="table table-striped table-bordered align-items-center justify-content-center">
                                <thead>
                                    <tr>
                                        <th>Tracking No</th>
                                        <th>C Name</th>
                                        <th>C Phone</th>
                                        <th>Order Date</th>
                                        <th>Order Status</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($orders as $ordersitem): ?>
                                    <tr>
                                        <td class="fw-bold"><?= $ordersitem['tracking_no'];?></td>
                                        <td><?= $ordersitem['cusname'];?></td>
                                        <td><?= $ordersitem['phone'];?></td>
                                        <td><?= date('d M, Y',strtotime($ordersitem['order_date']));?></td>
                                        <td><?= $ordersitem['order_status'];?></td>
                                        <td><?= $ordersitem['payment_mode'];?></td>
                                        <td>
                                            <a href="orders-view.php?track=<?= $ordersitem['tracking_no'];?>" class="btn btn-info mb-0 px-2 btn-sm">View </a>
                                            <a href="orders-print.php?track=<?= $ordersitem['tracking_no'];?>" class="btn btn-primary mb-0 px-2 btn-sm">Print <i class="fa fa-print" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>

                        <?php

                    }
                    else{
                        echo "<h5>No Records Found<h5>";
                    }

                }
                else{

                }
            ?>
            
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>