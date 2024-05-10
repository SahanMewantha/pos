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

                    $orderQuery ="";

                }else{

                }
            
            ?>

        
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>