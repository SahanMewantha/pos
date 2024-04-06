<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
        <div class="card-header">
                <h4 class="mb-2">Edit Admin
                <a href="admin.php" class="btn btn-danger float-end">Back</a>
                </h4>         
        </div>
    

    <div class="card-body">
    <?php alertMessage(); ?>


    
        <form action="./code.php" method="post">
            <?php
                if(isset($_GET['id']))
                {    
                    if($_GET['id'] !=''){

                        $adminId = $_GET['id'];
                        

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
                $adminData =getById('admin',$adminId);

                if($adminData){
                    if($adminData['status']==200){
                        ?>
                        <input type="hidden" name="adminId" value="<?= $adminData['data']['id']; ?>">

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="">Name *</label>
                                    <input type="text" name="name"  value="<?= $adminData['data']['name']; ?>" class="form-control"/>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Email *</label>
                                    <input type="email" name="email"  value="<?= $adminData['data']['email']; ?>" class="form-control"/>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Password *</label>
                                    <input type="password" name="password"  value="<?= $adminData['data']['password']; ?>" class="form-control"/>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Phone Number *</label>
                                    <input type="number" name="phone"  value="<?= $adminData['data']['phone']; ?>" class="form-control"/>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Is Ban *</label>
                                    <input type="checkbox" name="is_ban" <?= $adminData['data']['is_ban']==true ? 'checked':'';  ?> style="width: 30px; height: 30px;"/>
                                </div>
                                <div class="col-md-12 mb-3 text-end">
                                    <button type="submit" name="updateAdmin" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                            <?php include('includes/footer.php'); ?>
                        <?php
                    }
                    else{
                        echo '<h5>' .$adminData['message']. '</h5>';
                    }

                }
                else{
                    echo 'Somthing went wrong 1..!';
                }
            ?>


        </form>

    </div>


</div>

