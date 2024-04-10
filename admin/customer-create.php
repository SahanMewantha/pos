<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
    <div class="card-header">
            <h4 class="mb-0">Add Customer
            <a href="customer.php" class="btn btn-danger float-end">Back</a>
            </h4>         
    </div>
    

    <div class="card-body">
    <?php alertMessage(); ?>
        <form action="./code.php" method="post">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">Customer Name *</label>
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
                <div class="col-md-6 mb-3">
                    <label for="">Status (Unchecked=Visible ,Checked=Hidden) </label>
                    <br><br>
                    <input type="checkbox" name="status" style="width:30px; height:30px;">
                </div>

                <div class="col-md-12 mb-3 text-end">
                    <br>
                    <button type="submit" name="savecustomer" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
</div>