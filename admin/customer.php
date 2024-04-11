<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">

    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Customers
            <a href="customer-create.php" class="btn btn-primary float-end">Add Customer</a>
            </h4>
        </div>
        <div class="card-body">
        <?php alertMessage(); ?>

        <?php 
        $customers=getall('customers');
        if(!$customers){
            echo '<h4>Somthing went Wrong...! </h4>';
            return false;
        }

        if(mysqli_num_rows($customers)>0)
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
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>


                    <?php foreach($customers as $Item) :  ?>
                    <tr>
                        <td><?= $Item['id'] ?></td>
                        <td><?= $Item['cusname'] ?></td>
                        <td><?= $Item['phone'] ?></td>
                        <td><?= $Item['email'] ?></td>
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
                            <a href="customers-edit.php?id=<?=  $Item['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                            <a href="customers-delete.php?id=<?=  $Item['id'] ?>"
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