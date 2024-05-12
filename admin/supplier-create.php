<?php include ('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
    <div class="card-header">
            <h4 class="mb-0">Add Supplier
            <a href="customer.php" class="btn btn-danger float-end">Back</a>
            </h4>         
    </div>
    

    <div class="card-body">
    <?php alertMessage(); ?>
        <form action="./code.php" method="post">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">Supplier Name *</label>
                    <input type="text" name="cusname" required class="form-control"/>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Phone No *</label>
                    <input type="text" name="phone" placeholder="" required class="form-control"/>
                </div> 
                <div class="col-md-12 mb-3">
                    <label for="">Email *</label>
                    <input type="email" name="mail" required class="form-control"/>
                </div>

                <div class="col-md-12 mb-3 text-end">
                    <br>
                    <button type="submit" name="saveSupplier" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
</div>



<?php include('includes/footer.php'); ?>