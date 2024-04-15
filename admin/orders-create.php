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
                <label>Select Category</label>
                    <select name="product_id" class="form-select">
                        <option value="">Select Product</option>
                        <?php
                            $products=getAll('products');
                            if($products){
                                if(mysqli_num_rows($products)>0){
                                    foreach($products as $cateItem ){
                                        echo '<option value="'.$cateItem['id'].'">' .$cateItem['name'].'</option>';
                                    }
                                }
                                else{
                                    echo '<option value="">No products found</option>'; 
                                }    
                            }
                            else{
                                echo '<option value="">Somthing went wrong </option>';
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
<?php
    print_r($_SESSION['productItem'])
?>