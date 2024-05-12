<?php include ('includes/header.php'); ?>

<div class="container-fluid px-4">

    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Suppliers
            <a href="supplier-create.php" class="btn btn-primary float-end">Add Supplier</a>
            </h4>
        </div>
        <div class="card-body">
        <?php alertMessage(); ?>

        <?php 
        $suppliers=getall('suppliers');
        if(!$suppliers){
            echo '<h4>Somthing went Wrong...! </h4>';
            return false;
        }

        if(mysqli_num_rows($suppliers)>0)
        {
        ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>


                    <?php foreach($suppliers as $Item) :  ?>
                    <tr>
                        <td><?= $Item['id'] ?></td>
                        <td><?= $Item['cusname'] ?></td>
                        <td><?= $Item['phone'] ?></td>
                        <td><?= $Item['email'] ?></td>
                        <td>
                            <a href="suppliers-edit.php?id=<?=  $Item['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                            <a href="suppliers-delete.php?id=<?=  $Item['id'] ?>"
                              class="btn btn-danger btn-sm"
                              onclick="return confirm('Are you sure you went to delete this')">
                              Delete
                            </a>

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