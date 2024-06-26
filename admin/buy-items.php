<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
        <div class="card-header">
                <h4 class="mb-0">Buy From Suppliers
                <a href="orders.php" class="btn btn-danger float-end">Back</a>
                </h4>         
        </div>
    

    <div class="card-body">
    <?php alertMessage(); ?>
        <form action="./suppbuy-code.php" method="post">
            <div class="row">
                
                <div class="col-md-2 mb-3">
                        <label for="">Item Name *</label>
                        <input type="text" name="iname" class="form-control"/>
                </div>
                <div class="col-md-2 mb-3">
                        <label for="">Price *</label>
                        <input type="number" name="price"  class="form-control"/>
                </div>
                    

                <div class="col-md-2 mb-3">
                    <label for="">Quntity *</label>
                    <input type="number" name="quntity" value="1" class="form-control"/>
                </div>

                <div class="col-md-3 mb-3 text-end">
                    <br>
                    <button type="submit" name="supItem" class="btn btn-dark">Add To Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
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
                               <label>Enter Supplier Phone Number</label>
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