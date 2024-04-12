<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
        <div class="card-header">
                <h4 class="mb-2">Edit categories
                <a href="categories.php" class="btn btn-danger float-end">Back</a>
                </h4>         
        </div>
    

    <div class="card-body">
    <?php alertMessage(); ?>


    
        <form action="./code.php" method="post">
            <?php
                if(isset($_GET['id']))
                {    
                    if($_GET['id'] !=''){

                        $categoryid = $_GET['id'];
                        

                    }else{
                        echo '<h4>Not Id Found...!</h4>';
                        return false;
                        
                    }
                }
                else
                {
                    echo '<h4>Not Id given....!</h4>';
                    return false;
                }
                $categoryData =getById('categories',$categoryid);

                if($categoryData){
                    if($categoryData['status']==200){
                        ?>
                        <input type="hidden" name="categoryId" value="<?= $categoryData['data']['id']; ?>">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Catogory *</label>
                                    <input type="text" name="category"  value="<?= $categoryData['data']['category']; ?>" class="form-control"/>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description" class="form-control"  value="<?= $categoryData['data']['description']; ?>"></textarea>
                                </div>
                                <div class="col-md-12 mb-3 text-end">
                                    <button type="submit" name="updateCategory"  class="btn btn-primary">Update</button>
                                </div>
                            </div>
                            <?php include('includes/footer.php'); ?>
                        <?php
                    }
                    else{
                        echo '<h5>' .$categoryData['message']. '</h5>';
                    }

                }
                else{
                    echo 'Somthing went wrong 1..!';
                }
            ?>


        </form>

    </div>


</div>

