<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
        <div class="card-header">
                <h4 class="mb-0">Orders
        
                </h4>        
        </div>
        <div class="card-body">
            <?php
                $query="SELECT o.*,c.* FROM orders o, customers c WHERE c.id=o.customer_id ORDER BY o.id DESC";
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
                                            <a href="orders-view.php?track=<?= $ordersitem['tracking_no'];?>" class="btn btn-info mb-0 px-2 btn-sm">View</a>
                                            <a href="" class="btn btn-primary mb-0 px-2 btn-sm">Print</a>
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