<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
    <div class="card-header">
            <h4 class="mb-0">Edit Supplier
            <a href="customer.php" class="btn btn-danger float-end">Back</a>
            </h4>         
    </div>
    

    <div class="card-body">
    <?php alertMessage(); ?>
    <form action="./code.php" method="post">

        <?php
            $paramValue=checkParamId('id');
            if(!is_numeric($paramValue)){

                echo '<h5> .$paramValue. </h5>';
                return false;
            }
            $customer=getById('customers',$paramValue);                 
            if($customer['status'] ==200)
            {   
                ?>
                    <input type="hidden" name="cusid" value="<?= $customer['data']['id'];  ?>">
                    <div class="row"  >
                        <div class="col-md-12 mb-3">
                            <label for="">Supplier Name *</label>
                            <input type="text" name="cusname" required value="<?= $customer['data']['cusname'];  ?>" class="form-control"/>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Phone No *</label>
                            <input type="text" name="phone" required value="<?= $customer['data']['phone'];  ?>" class="form-control"/>
                        </div> 
                        <div class="col-md-12 mb-3">
                            <label for="">Email *</label>
                            <input type="email" name="mail" required value="<?= $customer['data']['email'];  ?>" class="form-control"/>
                        </div>

                        <div class="col-md-12 mb-3 text-end">
                            <br>
                            <button type="submit" name="updateSupplier" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                <?php
            }

            else
            {
                echo '<h5>' .$customer['message']. '</h5>';
                return false;
            }

        ?>


    </form>
</div>

<?php include('includes/footer.php'); ?>