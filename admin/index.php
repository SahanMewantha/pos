<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">



    <div class="row">
        <div class="col-md-12">
            <h1 class="mt-4">Dashboard</h1>  
        </div>

        <div class="col-md-3 mb-3">
            <div class="card card-body bg-primary p-3">
                <p class="text-sm mb-0 text-capitalize">Total Category <i class="fa fa-bar-chart" aria-hidden="true"></i></p>
                <h5 class="fw-bold mb-0">
                    <?= getCount('categories'); ?>
                </h5>

            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card card-body bg-info p-3">
                <p class="text-sm mb-0 text-capitalize ">Total Products <i class="fa fa-shopping-basket" aria-hidden="true"></i></p>
                <h5 class="fw-bold mb-0">
                    <?= getCount('products'); ?>
                </h5>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card card-body bg-danger p-3">
                <p class="text-sm mb-0 text-capitalize ">Total Admins <i class="fa fa-user-circle" aria-hidden="true"></i></p>
                <h5 class="fw-bold mb-0">
                    <?= getCount('admin'); ?>
                </h5>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card card-body bg-warning p-3">
                <p class="text-sm mb-0 text-capitalize ">Total Customers <i class="fa fa-user" aria-hidden="true"></i></i></p>
                <h5 class="fw-bold mb-0">
                    <?= getCount('customers'); ?>
                </h5>
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <hr>
            <h4>Orders</h4>
        </div>

        <div class="col-md-3 mb-3">
        <div class="card card-body bg-success p-4">
                <p class="text-sm mb-0 text-capitalize ">Today Orders  <i class="fa fa-envelope-open" aria-hidden="true"></i></p>
                <h5 class="fw-bold mb-0">
                    <?php
                        $todayDate = date('Y-m-d');
                        $todayOrders=mysqli_query($conn,"SELECT * FROM orders WHERE order_date='$todayDate'");
                        if($todayOrders){
                            if(mysqli_num_rows($todayOrders)>0){
                                $totalCount=mysqli_num_rows($todayOrders);
                                echo $totalCount;
                            }
                        }
                    ?>
                </h5>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card card-body bg-secondary p-4">
                <p class="text-sm mb-0 text-capitalize ">Total Orders <i class="fa fa-envelope-open-o" aria-hidden="true"></i></p>
                <h5 class="fw-bold mb-0">
                    <?= getCount('orders'); ?>
                </h5>
            </div>
        </div>
    </div>
</div>



<?php include('includes/footer.php'); ?>
