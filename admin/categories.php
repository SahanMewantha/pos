<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">

    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Categories In Inventory
            <a href="categories-create.php" class="btn btn-primary float-end">Create Category</a>
            </h4>
        </div>
        <div class="card-body">
        <?php alertMessage(); ?>

        <?php 
        $categories=getall('categories');
        if(!$categories){
            echo '<h4>Somthing went Wrong...! </h4>';
            return false;
        }

        if(mysqli_num_rows($categories)>0)
        {
        ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Quntity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>


                    <?php foreach($categories as $Item) :  ?>
                    <tr>
                        <td><?= $Item['id'] ?></td>
                        <td><?= $Item['itemname'] ?></td>
                        <td><?= $Item['category'] ?></td>
                        <td><?= $Item['quntity'] ?></td>
                        <td>
                            <a href="categories-edit.php?id=<?=  $Item['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                            <a href="categories-delete.php?id=<?=  $Item['id'] ?>"  class="btn btn-danger btn-sm">Delete</a>

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