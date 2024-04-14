<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
    <div class="card-header">
            <h4 class="mb-0">Edit Products
            <a href="product.php" class="btn btn-danger float-end">Back</a>
            </h4>        
    </div>
    

    <div class="card-body">
    <?php alertMessage(); ?>
        <form action="./code.php" method="post">

        <?php
            $paramValue=checkParamId('id');
            if(!is_numeric($paramValue)){

                echo '<h5> id is no integer </h5>';
                return false;
            }
            $product=getById('products',$paramValue); 
            if($product){
                if($product['status'] ==200){
                    ?>
            <input type="hidden" name="product_id" value="<?= $product['data']['id'] ?>"/>
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
                                        ?>
                                            <option 
                                                value="<?=$cateItem['id']; ?>'"
                                                <?= $product['data']['catogory_id'] == $cateItem['id'] ? 'selected':''; ?>
                                            >
                                                <?=$cateItem['category']; ?>
                                            </option>
                                        <?php

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
                    <input type="text" name="name" placeholder="" required value="<?= $product['data']['name'] ?>" class="form-control"/>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Product Price  *</label>
                    <input type="number" name="price" placeholder="" required value="<?= $product['data']['price'] ?>" class="form-control"/>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quntity  *</label>
                    <input type="number" name="quntity" placeholder="" required value="<?= $product['data']['quntity'] ?>" class="form-control"/>
                </div>

                <div class="col-md-6">
                    <label for="">Status (Unchecked=Visible ,Checked=Hidden) </label>
                    <br>
                    <input type="checkbox" name="status" value="<?= $product['data']['status']==true ? 'checked':'';  ?>" style="width:30px; height:30px;">
                </div>


                <div class="col-md-12  text-end">
                    <br>
                    <button type="submit" name="updateProduct" class="btn btn-primary">Update</button>
                </div>
            </div>
        <?php

            }
            else{
                echo '<h5>' .$product['message']. '</h5>'; 
            }
            }
            else{
            echo '<h5> Somthing went wrong ! </h5>';
            return false; 
            }                


        ?>
        </form>
</div>

<?php include('includes/footer.php'); ?>