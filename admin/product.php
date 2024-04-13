<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">

    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Products
            <a href="products-create.php" class="btn btn-primary float-end">Create Products</a>
            </h4>
        </div>
        <div class="card-body">
        <?php alertMessage(); ?>

        <?php 
        $products=getall('products');
        if(!$products){
            echo '<h4>Somthing went Wrong...! </h4>';
            return false;
        }

        if(mysqli_num_rows($products)>0)
        {
        ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quntity</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>


                    <?php foreach($products as $Item) :  ?>
                    <tr>
                        <td><?= $Item['id'] ?></td>
                        <td><?= $Item['name'] ?></td>
                        <td><?= $Item['price'] ?></td>
                        <td><?= $Item['quntity'] ?></td>
                        <td>
                            <?php
                                if($Item['status']==1){
                                    echo '<span class="badge bg-danger">Hidden</span>';
                                }
                                else{
                                    echo '<span class="badge bg-primary">Visible</span>';
                                }
                            ?>
                        </td>
                        <td>
                            <a href="product-edit.php?id=<?=  $Item['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                            <a href="product-delete.php?id=<?=  $Item['id'] ?>"  class="btn btn-danger btn-sm">Delete</a>

                        </td>

                    </tr>
                    <?php endforeach; ?>


                </tbody>
            </table>
        </div>
        <?php 
                    } 
                        else
                        {
                    ?>
                            <tr>
                                <td colspan="4">No record Found</td>
                            </tr>
                    <?php      
                    }
        ?>
    </div>
    </div>



</div>

<?php include('includes/footer.php'); ?>