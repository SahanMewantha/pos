<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
        <div class="card-header">
                <h4 class="mb-0">Create Orders
                <a href="admin.php" class="btn btn-danger float-end">Back</a>
                </h4>         
        </div>
    

    <div class="card-body">
    <?php alertMessage(); ?>
        <form action="./order-code.php" method="post">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="">Select Product *</label>
                    <select name="product_id" class="form-select">
                        <option value="">== Select Product ==</option>
                        <?php
                            $products=getAll('products');
                            if(mysqli_num_rows($product)>0){
                                foreach($products as $productItem)
                                    ?> 
                                        <option value="<?= $productItem['id']; ?>"><?= $productItem['name']; ?></option>
                                    <?php

                            }else{
                                echo '<option value="">Product not found</option>';
                            }
                        ?>
                    </select>
                </div>

                <div class="col-md-2 mb-3">
                    <label for="">Quntity *</label>
                    <input type="number" name="quntity" value="1" class="form-control"/>
                </div>

                <div class="col-md-3 mb-3 text-end">
                    <br>
                    <button type="submit" name="addItem" class="btn btn-primary">Add Item</button>
                </div>
            </div>


        </form>

    </div>


</div>
