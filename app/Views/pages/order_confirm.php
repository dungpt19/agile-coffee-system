<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Harold's Coffee | Order Confirm</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./public/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="./public/font-awesome/font-awesome.min.css" type="text/css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> -->
    <!-- Custom css-->
    <link rel="stylesheet" href=".public/css/order-confirm.css">
</head>

<body>
    <main role="main">
        <div class="container mt-4">
            <form class="needs-validation" name="frmthanhtoan" action=<?= base_url("/confirm") ?> method="post">
                <div class="py-5 text-center">
                    <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
                    <h2>Order confirmation</h2>
                    <p class="lead">Please check Customer information, Cart information before placing an Order.</p>
                </div>
                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4" style="width: 462px; margin-left:154px">
                        <h4 class=" d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Cart</span>
                            <span class="badge badge-secondary badge-pill">2</span>
                        </h4>
                        <ul class="list-group mb-3" style="width:451px">
                            <?php $sum = 0 ?>
                            <?php foreach ($cart_item as $item) : ?>
                                <li class="product list-group-item d-flex justify-content-between lh-condensed">
                                    <div style="width: 262px">
                                        <h6 class="my-0"><?php echo $item["coffee_name"] ?> (<?php echo $item["size"] ?>)
                                        </h6>
                                        <small class="text-muted product-line-price">Customized:
                                            Size: <?php echo $item["size"] ?>,
                                            Sweetness: <?php echo $item["sweetness"] ?>,
                                            Milk: <?php echo $item["milk"] ?></small>
                                    </div>

                                    <div class="product-quantity" style="width: 52px; margin-left: 10px">
                                        <input type="number" value="<?php echo $item["quantity"] ?>" min="1" style="width:40px" disabled>
                                    </div>
                                    <div class="product-removal" style="margin-right: -18px; width: 95px">
                                        <!-- <button class="remove-product"
                                            style="border: 0; padding: 4px 8px; background-color: #c66; color: #fff; font-family: font-bold; font-size: 12px; border-radius: 3px;">
                                            Remove
                                        </button> -->
                                        <a href="<?= base_url("/order/delete") . "/" . $item["id"] ?>">
                                            <i class="bi bi-trash3 remove-product" style="border: 0; padding: 4px 8px; background-color: #c66; color: #fff; font-family: font-bold; font-size: 12px; border-radius: 3px;"></i>
                                        </a>
                                        <span class="text-muted" style="padding-left:15px"><?php echo $item["total_amount"] ?></span>
                                </li>
                                <?php $sum += $item["total_amount"] ?>
                            <?php endforeach; ?>
                            <!-- <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Pink Drink</h6>
                                    <small class="text-muted">14990000.00 x 8</small>
                                </div>
                                <span class="text-muted">119920000</span>
                            </li> -->
                            <li class="list-group-item d-flex justify-content-between" style="padding-right: 25px;">
                                <span>Total money</span>
                                <strong>$<?= $sum ?></strong>
                            </li>
                        </ul>
                        <!-- <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">Confirm</button>
                            </div>
                        </div> -->
                        <hr class="mb-4">
                        <!-- <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnDatHang"
                            style="margin-top: 0; margin-bottom: 0; margin-left: 353px; margin-right: 0;">Pickup</button> -->

                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnDatHang" style="margin-top: 0; margin-bottom: 0; margin-left: 353px; margin-right: 0;">
                            Confirm
                        </button>
                    </div>
                    <div class="col-md-8 order-md-1" style="width: 600px; margin-left:30px">
                        <h4 class="mb-3">Customer information</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="exampleInputName">Full Name</label>
                                <input type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Your full name" value="<?php echo session()->get('fullname'); ?>">
                            </div>

                            <!--  -->
                            <div class="col-md-12">
                                <label for="exampleInputAddress">Address</label>
                                <input type="text" class="form-control" id="exampleInputAddress"
                                    aria-describedby="addressHelp" placeholder="Your address" value="<?php if(isset($_POST['address'])) echo $_POST['address'] ?>" name="address">
                            </div>


                            <!-- <div class="col-md-12 input-group">
                                <label for="exampleInputAddress" style="flex: 0 0 auto; width: 100%;">Address</label>
                                <input type="text" class="form-control" id="exampleInputAddress"
                                    aria-describedby="addressHelp" placeholder="Your address">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button">
                                        <i class="bi bi-arrow-up-right-square"></i>
                                    </button>
                                </div>
                            </div> -->
                            <!--  -->
                            <div class="col-md-12">
                                <label for="exampleInputPhone">Phone</label>
                                <input id="exampleInputPhone" name="areaNo" class="form-control" type="tel" required aria-describedby="phoneHelp" placeholder="Your phone" pattern="[0-9]{10}" title="Please Enter Correct Phone Format" aria-label="Area code" value="<?php echo session()->get('phone_number'); ?>">
                            </div>
                            <div class="col-md-12">
                                <label for="exampleInputEmail">Email</label>
                                <!-- <input type="text" class="form-control" id="exampleInputEmail"
                                    aria-describedby="emailHelp" placeholder="Your email"> -->
                                <input class="form-control" id="exampleInputEmail" type="email" size="64" maxLength="64" required placeholder="username@gmail.com" pattern=".+@gmail\.com" title="Please Enter Correct Email Format" value="<?php echo session()->get('email'); ?>">
                            </div>
                            <!-- <h4 class="mb-3">Method order</h4>
                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="httt-1" name="httt_ma" type="radio" class="custom-control-input" required="" value="1">
                                    <label class="custom-control-label" for="httt-1">Delivery</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="httt-2" name="httt_ma" type="radio" class="custom-control-input" required="" value="2">
                                    <label class="custom-control-label" for="httt-2">Pickup</label>
                                </div>
                            </div> -->
                        </div>
                        <!-- <h4 class="mb-3">Payments</h4> -->
                        <!--  Tiền mặt MoMo ZaloPay ShopeePay-->
                        <!-- <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="httt-1" name="httt_ma" type="radio" class="custom-control-input" required="" value="1">
                                <label class="custom-control-label" for="httt-1">Cash on Delivery</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="httt-2" name="httt_ma" type="radio" class="custom-control-input" required="" value="2">
                                <label class="custom-control-label" for="httt-2">Direct Bank
                                    Transfer</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="httt-3" name="httt_ma" type="radio" class="custom-control-input" required="" value="3">
                                <label class="custom-control-label" for="httt-3">Paypal</label>
                                <img src="https://www.logolynx.com/images/logolynx/c3/c36093ca9fb6c250f74d319550acac4d.jpeg" alt="" width="50">
                            </div>
                        </div> -->
                    </div>
                </div>
        </div>
        <!-- End block content -->
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=".public/jquery/jquery.min.js"></script>
    <script src=".public/popperjs/popper.min.js"></script>
    <script src=".public/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom script  -->

    <script src=".public/js/app.js"></script>

</body>

</html>

</html>