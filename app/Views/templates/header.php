<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?php echo base_url('/css/custom-bootstrap.css') ?>" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <title>Harold's Coffee</title>
</head>

<body style="min-height: 100vh; height: 100vh" class="d-flex flex-column">
  <div class="d-flex flex-column w-100 h-100">
    <div class="shadow-sm rounded sticky-top">
      <nav class="navbar navbar-light bg-primary justify-content-end">
        <ul class="navbar-nav flex-row mx-5 swap3">
          <?php
          $uri = service('uri');
          ?>
          <?php if (session()->get('isLoggedIn')) : ?>
            <li class="nav-item px-2 swapCart">
              <div class="">
                <button type=" button" class="btn btn-light dropdown-toggle" onclick="toggle()">
                  <i class="bi bi-cart"></i> <span class="badge badge-pill badge-danger" style="color: black"></span>
                </button>
                <div class="dropdown-menu p-4" id="popup">
                  <div class="row cart-detail">
                    <table class="table table-borderless">
                      <tbody>
                        <?php $sum = 0 ?>
                        <?php foreach ($cart_item as $item) : ?>
                          <tr>
                            <td><?php echo $item["coffee_name"] ?></td>
                            <td><?php echo $item["size"] ?></td>
                            <td><?php echo $item["quantity"] ?></td>
                          </tr>
                          <tr>
                            <?php if ($item['sweetness'] != 0 || $item['milk'] != 0) : ?>
                              <td>Customized:
                                <?php if ($item["sweetness"] != 0) { ?>
                                  <h6>Sweetness <?php echo $item["sweetness"] ?></h6>
                                <?php } ?>
                                <?php if ($item["milk"] != 0) { ?>
                                  <h6>Milk <?php echo $item["milk"] ?></h6>
                                <?php } ?>
                              </td>
                            <?php endif; ?>
                          </tr>
                          <?php $sum += $item["total_amount"] ?>
                        <?php endforeach; ?>
                      </tbody>
                    </table>

                    <!-- <table class="table table-borderless">
                    <tbody>
                      <tr>
                        <td>Iced White Mocha</td>
                        <td>$250.22</td>
                        <td>1</td>
                      </tr>
                    </tbody>
                  </table> -->
                    <!-- <div class="col-lg-12 col-sm-12 col-12 cart-detail-product">
                    <p>Iced White Mocha</p>
                    <span class="price text-info"> $250.22</span> <span class="count"> Quantity:01</span>
                  </div> -->
                  </div>
                  <div class="row total-header-section">
                    <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                      <hr>
                      <p>Total: <span class="text-info">$<?= $sum ?></span></p>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                      <button class="btn btn-secondary btn-block">
                        <a href="<?php echo base_url("/delivery") ?>" style="color:white; text-decoration:none">
                          Checkout
                        </a>
                      </button>
                    </div>
                  </div>
                </div>
            </li>
            <li class=" nav-item <?= ($uri->getSegment(1) == 'user' ? 'active' : null) ?>">
              <a class="nav-link px-2" style="font-size: 18px" href="<?php echo base_url('user'); ?>"><?php echo session()->get('username'); ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-2" style="font-size: 18px" href="<?php echo base_url("logout") ?>">Logout</a>
            </li>
            <script>
              let isOpen = false;
              let item = document.querySelector(".dropdown-menu");

              function toggle() {

                isOpen = !isOpen;
                item.style.display = isOpen ? "block" : "none";
                document.addEventListener("keydown", function(e) {
                  if (e.key === "Escape") {
                    isOpen = false;
                    item.style.display = isOpen ? "block" : "none";
                  }
                })
                document.addEventListener("click", function(e) {
                  if (!item.contains(e.target) && !document.querySelector(".dropdown-toggle").contains(e.target)) {
                    isOpen = false
                    item.style.display = isOpen ? "block" : "none";
                  }
                })
              }
            </script>
          <?php else : ?>
            <li class="nav-item <?= ($uri->getSegment(1) == 'login' ? 'active' : null) ?>">
              <a class="nav-link px-2" style="font-size: 18px" href="<?php echo base_url('login'); ?>">Login</a>
            </li>
            <li class="nav-item <?= ($uri->getSegment(1) == 'register' ? 'active' : null) ?>">
              <a class="nav-link px-2" style="font-size: 18px" href="<?php echo base_url('register'); ?>">Signup</a>
            </li>
          <?php endif; ?>
          <!-- <li class="nav-item">
                    cart</li> -->
        </ul>
      </nav>
      <nav class="navbar navbar-expand-lg navbar-light bg-primary px-5 frontof font-nav">
        <a class="navbar-brand" style="font-family: 'Sansita Swashed', cursive; font-size: 30px" href="<?php echo base_url(); ?>">Harold's
          Coffee</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav font-weight-normal">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo base_url("/menu") ?>">Menu</a>
            </li>
            <li class="nav-item">
              <span class="nav-link px-0">|</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Store</a>
            </li>
            <li class="nav-item">
              <span class="nav-link px-0">|</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Help</a>
            </li>
            <li class="nav-item">
              <span class="nav-link px-0">|</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url("/history") ?>">History</a>
            </li>
          </ul>
        </div>
      </nav>

    </div>