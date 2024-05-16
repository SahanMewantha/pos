<?php include('includes/header.php'); ?>

<div class="modal fade" id="addcustomerModel" data-bs-backdrop="static" data-bs-keybord="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Customer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label>Enter Customer Name</label>
            <input type="text" class="form-control" id="c_name"/>
        </div>
        <div class="mb-3">
            <label>Enter Customer Phone Number</label>
            <input type="text" class="form-control" id="c_phone"/>
        </div>
        <div class="mb-3">
            <label>Enter Customer Emali (optional)</label>
            <input type="text" class="form-control" id="c_email"/>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary saveCustomer">Save</button>
      </div>
    </div>
  </div>
</div>



<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
        <div class="card-header">
                <h4 class="mb-0">Create Orders
                <a href="orders.php" class="btn btn-danger float-end">Back</a>
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
                    <button type="submit" name="addItem" class="btn btn-dark">Add To Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                </div>
            </div>


        </form>

    </div>
    
    <div class="card mt-3">
        <div class="card-header">
            <h4 class="mb-0">Cart Item</h4>
        </div>
        <div class="card-body" id="productArea">
            <?php
                if(isset($_SESSION['productItem']))
                {
                    $sessionProduct = $_SESSION['productItem'];
                    ?>
                    <div class="table-responsive mb-3" id="productContent">

                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quntity</th>
                                    <th>Total price</th>
                                    <th>Remove</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    $i=1;
                                     foreach($sessionProduct as $key => $item):
                                 
                                 ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $item['name']; ?></td>
                                    <td><?= $item['price']; ?></td>
                                    <td>
                                        <div class="input-group qtyBox">
                                            <input type="hidden" value="<?= $item['product_id'];?>" class="prodId"/>
                                            <button class="input-group-text decrement">-</button>
                                            <input type="text" value="<?= $item['quntity']; ?>" class="qty quntityInput"/>
                                            <button class="input-group-text increment">+</button>
                                        </div>
                                    </td>
                                    <td><?= number_format($item['price'] * $item['quntity'],0); ?></td>
                                    <td>
                                    <a href="order-item-delete.php?index=<?= $key; ?>" class="btn btn-danger ">Remove</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-2">
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Select Payment Mode</label>
                                <select id="payment_mode" class="form-select">
                                    <option value="">Select Method</option>
                                    <option value="Cash payment">Card Payment</option>
                                    <option value="Online Payment">Online Payment</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                               <label>Enter Customer Phone Number</label>
                               <input type="number" id="cphone" class="form-control" value=""/> 
                            </div>
                            <div class="col-md-4">
                                <br>
                                <button type="button" class="btn btn-warning w-100 proceedToPlace">Place Order</button>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                }
            ?>
        </div>

    </div>

</div>
<?php include('includes/footer.php'); ?>
