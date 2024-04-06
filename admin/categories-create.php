<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
    <div class="card-header">
            <h4 class="mb-0">Add Items
            <a href="categories.php" class="btn btn-danger float-end">Back</a>
            </h4>         
    </div>
    

    <div class="card-body">
    <?php alertMessage(); ?>
        <form action="./code.php" method="post">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">Item Name *</label>
                    <input type="text" name="itemname" required class="form-control"/>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Catogory  *</label>
                    <input type="text" name="category" placeholder="" required class="form-control"/>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quntity (KG/Packet) *</label>
                    <input type="number" name="qty" required class="form-control"/>
                </div>
                <div class="col-md-12 mb-3 text-end">
                    <button type="submit" name="savecategory" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
</div>