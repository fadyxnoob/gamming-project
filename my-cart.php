<?php
    include('user/include/header.php');
    $empty_order = '';
    if(!isset($_SESSION['player'])){
        echo'<script>window.location.href="login.php"</script>';
    }
    if(isset($_SESSION['cart'])){}
?>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-9 mt-5 Cart_Box p-0 mx-auto">
              
                <div class="card text-center">
                    <div class="card-header fs-3 text-white">
                        My Cart
                    </div>
                    <div class="card-body text-dark">
                        <table class="table">
                            <thead>
                                <tr >
                                    <th scope="col" class="text-dark">#</th>
                                    <th scope="col" class="text-dark">P Name</th>
                                    <th scope="col" class="text-dark">P Price</th>
                                    <th scope="col" class="text-dark">Quantity</th>
                                    <th scope="col" class="text-dark">Total</th>
                                    <th scope="col" class="text-dark">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                            $total = 0;
                            if(isset($_SESSION['cart'])){
                                $serial = '';
                                foreach($_SESSION['cart'] as $key => $value){
                                    $serial = $key + 1;
                                    echo '<tr> 
                                        <th class="text-dark">'.$serial.'</th>
                                        <td>'.$value['item_name'].'</td>
                                        <td>'.$value['price'].'<input type="hidden" class="item_price" value="'.$value['price'].'"></td>
                                        <td> 
                                            <form method="POST" action="manage-cart.php">
                                                <input class="text-center item_quantity" name ="update_quantity" onclick="this.form.submit();" type="number" min="1" max="10" value="'.$value['quantity'].'">
                                                <input type="hidden" name="item_name" value="'.$value['item_name'].'">
                                            </form>
                                        </td>
                                        <td class="item_total"></td>
                                        <td>
                                            <form method="POST" action="manage-cart.php">
                                                <button name="remove_item" class="btn btn-danger btn-sm">Remove</button>
                                                <input type="hidden" name="item_name" value="'.$value['item_name'].'">
                                            </form>
                                        </td>       
                                    </tr>';
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <?php echo $empty_order;?>
            </div>
            <div class="title text-center mb-3">Order Now</div>
            <div class="col p-4 mx-auto order-form mb-5">
                <form action="purchase.php" method="POST" class="contact-form">
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Enter name">
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" name="email"class="form-control" id="exampleFormControlInput1"
                                    placeholder="i.e name@example.com">
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Phone No</label>
                                <input type="tel" name="phone" class="form-control" id="exampleFormControlInput1"
                                    placeholder="i.e +927188185161">
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Postal Code</label>
                                <input type="text" name="postal" class="form-control" id="exampleFormControlInput1"
                                    placeholder="i.e 526880">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Complete Address</label>
                                <input type="text" name="address" class="form-control" id="exampleFormControlInput1"
                                    placeholder="i.e chak no xyz, tehsil, dist ">
                            </div>
                        </div>
                        <div class="col-12 form-button text-center">
                            <button type="submit" name="order" class="btn fs-4">Purchase</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<Script>
var grand_total = 0;
var price = document.getElementsByClassName('item_price');
var quantity = document.getElementsByClassName('item_quantity');
var item_total = document.getElementsByClassName('item_total');
var gtotal = document.getElementById('gtotal');

function subTotal() {
    grand_total = 0;
    for (var i = 0; i < price.length; i++) {
        item_total[i].innerText = (price[i].value) * (quantity[i].value);
        grand_total += (price[i].value) * (quantity[i].value);
    }
    gtotal.innerText = grand_total;
}

var quantity = document.getElementsByClassName('item_quantity');
for (var i = 0; i < quantity.length; i++) {
    quantity[i].addEventListener('input', subTotal);
}

subTotal();
</Script>
<?php include('user\include\footer.php') ?>