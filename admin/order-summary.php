<?php 
include('includes/header.php'); 
if(!isset($_SESSION['productItem'])){
    echo '<script> window.location.href="orders-create.php"; </script>';
}

?>

<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0"> Order Summar
                        <a href="orders-create.php">Back to chreate Order</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php alertMessage(); ?>
                    <div class="myBillingArea">
                        <?php
                            if(isset($_SESSION['cphone'])){
                                $phone=validate($_SESSION['phone']);
                                $phone=validate($_SESSION['phone']);


                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>