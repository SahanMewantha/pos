<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
    <div class="card-header">
            <h4 class="mb-0">Create Products
            <a href="product.php" class="btn btn-danger float-end">Back</a>
            </h4>         
    </div>
    

    <div class="card-body">
    <?php alertMessage(); ?>
        <form action="./code.php" method="post">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label>Select Category</label>
                    <select name="category_id" class="form-select">
                        <option value="">Select categories</option>
                        <?php
                            $categories=getAll('categories');
                            if($categories){
                                if(mysqli_num_rows($categories)>0){
                                    foreach($categories as $cateItem ){
                                        echo '<option value="'.$cateItem['id'].'">' .$cateItem['category'].'</option>';
                                    }
                                }
                                else{
                                    echo '<option value="">No categories found</option>'; 
                                }    
                            }
                            else{
                                echo '<option value="">Somthing went wrong </option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Product Name  *</label>
                    <input type="text" name="name" placeholder="" required class="form-control"/>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Product Price  *</label>
                    <input type="number" name="price" placeholder="" required class="form-control"/>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quntity  *</label>
                    <input type="number" name="quntity" placeholder="" required class="form-control"/>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>
                <div class="col-md-6">
                    <label for="">Status (Unchecked=Visible ,Checked=Hidden) </label>
                    <br>
                    <input type="checkbox" name="status" style="width:30px; height:30px;">
                </div>


                <div class="col-md-12  text-end">
                    <br>
                    <button type="submit" name="saveProduct" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
</div>

<?php include('includes/footer.php'); ?>