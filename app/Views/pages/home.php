<?php include "quotes.php"; ?>

<div class="main">
    <!-- carousel -->
    <div class="cart-ss1-right">
        <!-- <div class="change-quantity decrease">-</div>
    <div class="amount">1</div>
    <div class="change-quantity increase">+</div> -->
    </div>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" style=" transition: transform 1s ease-out, opacity .5s ease-out;">
                <img src="<?php echo base_url("/img/Slice 4.jpg") ?>" class="img-fluid" alt="...">
                <div class="carousel-caption d-none d-md-block" style="
    z-index: 1;">
                    <h5><?php echo $quotes[$numbers[0]][0] ?></h5>
                    <p><?php echo $quotes[$numbers[0]][1] ?></p>
                </div>
            </div>
            <div class="carousel-item" style=" transition: transform 1s ease-out, opacity .5s ease-out;">
                <img src="<?php echo base_url("/img/Slice 5.jpg") ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block" style="
    z-index: 1; transition: transform 1s ease-out, opacity .5s ease-out;">
                    <h5><?php echo $quotes[$numbers[1]][0] ?></h5>
                    <p><?php echo $quotes[$numbers[1]][1] ?></p>
                </div>
            </div>
            <div class="carousel-item" style=" transition: transform 1s ease-out, opacity .5s ease-out;">
                <img src="<?php echo base_url("/img/Slice 6.jpg") ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block" style="
    z-index: 1; transition: transform 1s ease-out, opacity .5s ease-out;">
                    <h5><?php echo $quotes[$numbers[2]][0] ?></h5>
                    <p><?php echo $quotes[$numbers[2]][1] ?></p>
                </div>
            </div>
            <div class="carousel-item" style=" transition: transform 1s ease-out, opacity .5s ease-out;">
                <img src="<?php echo base_url("/img/Slice 7.jpg") ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block" style="
    z-index: 1; transition: transform 1s ease-out, opacity .5s ease-out;">
                    <h5><?php echo $quotes[$numbers[2]][0] ?></h5>
                    <p><?php echo $quotes[$numbers[2]][1] ?></p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <div class="back-overlay px-5">
            <?php if (!empty(session()->get('username'))) : ?>
                <div class="container h-75 mt-3 d-flex flex-row-reverse px-5">
                    <div class="bg-white h-100 w-25 rounded d-flex flex-column align-items-center justify-content-center" style="--bs-bg-opacity: .65;">
                        <div>
                            <h5 class=" fw-light">Good morning, <?php echo session()->get('username') ?></h5>
                        </div>
                        <a class="btn btn-secondary m-2 w-75 shadow-none fw-light" href="#" role="button">Pick Up</a>
                        <a class="btn btn-secondary m-2 w-75 shadow-none fw-light" href="<?= base_url("delivery") ?>" role="button">Delivery</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- carousel -->

    <div class="container mt-5 px-5">
        <div class="row">
            <div class="col-lg">
                <div class="row my-1">
                    <div class="col-6">
                        <strong>Top 5 Popular</strong>
                    </div>
                    <div class="col-sm">
                        <Span>S</Span>
                    </div>
                    <div class="col-sm">
                        <Span>M</Span>
                    </div>
                    <div class="col-sm">
                        <Span>L</Span>
                    </div>
                    <div class="col-sm">
                    </div>
                </div>
                <?php foreach ($top_5_popular as $coffee) : ?>
                    <?php
                    $hover = $coffee["sold_out"] != 0 ?  "text-black-50 disabled" :  "coffee_hover text-dark";
                    $link =  $coffee["sold_out"] != 0 ?   base_url() : base_url("coffee/" . $coffee["id"]);
                    ?>
                    <div class="row rounded py-1 <?= $hover ?>">
                        <div class="col-6">
                            <a class="text-decoration-none my-1 <?= $hover ?>" href="<?= $link ?>">
                                <p class="my-1"><?php echo $coffee["coffee_name"] ?></p>
                            </a>
                        </div>
                        <div class="col-sm">
                            <p class="my-1"><?php echo $coffee["price_s"] ?></p>
                        </div>
                        <div class="col-sm">
                            <p class="my-1"><?php echo $coffee["price_m"] ?></p>
                        </div>
                        <div class="col-sm">
                            <p class="my-1"><?php echo $coffee["price_l"] ?></p>
                        </div>
                        <div class="col-sm">
                            <a class="btn btn-secondary text-decoration-none my-1 add " onclick="getCoffee(<?= $coffee['id'] ?>,'<?= $coffee['coffee_name'] ?>')" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <u class="my-1 text-decoration-none">Add</u>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-lg">
                <div class="row my-1">
                    <div class="col-6">
                        <strong>Seasonal Special</strong>
                    </div>
                    <div class="col-sm">
                        <Span>S</Span>
                    </div>
                    <div class="col-sm">
                        <Span>M</Span>
                    </div>
                    <div class="col-sm">
                        <Span>L</Span>
                    </div>
                    <div class="col-sm">
                    </div>
                </div>
                <?php foreach ($seasonal_coffee as $coffee) : ?>
                    <?php
                    $hover = $coffee["sold_out"] != 0 ?  "text-black-50 disabled" :  "coffee_hover text-dark";
                    $link =  $coffee["sold_out"] != 0 ?   "#" : base_url("coffee/" . $coffee["id"]);
                    ?>
                    <div class="row rounded py-1 <?= $hover ?>">
                        <div class="col-6">
                            <a class="text-decoration-none my-1 <?= $hover ?>" href="<?= $link ?>">
                                <p class="my-1"><?php echo $coffee["coffee_name"] ?></p>
                            </a>
                        </div>
                        <div class="col-sm">
                            <p class="my-1"><?php echo $coffee["price_s"] ?></p>
                        </div>
                        <div class="col-sm">
                            <p class="my-1"><?php echo $coffee["price_m"] ?></p>
                        </div>
                        <div class="col-sm">
                            <p class="my-1"><?php echo $coffee["price_l"] ?></p>
                        </div>
                        <div class="col-sm">
                            <a class="btn btn-secondary  text-decoration-none my-1 add" onclick="getCoffee(<?= $coffee['id'] ?>,'<?= $coffee['coffee_name'] ?>')" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <u class="my-1 text-decoration-none">Add</u>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <div class="row my-1">
                    <div class="col-6">

                    </div>
                    <div class="col-sm">

                    </div>
                    <div class="col-sm">

                    </div>
                    <div class="col-sm">

                    </div>
                    <div class="col-sm">
                        <a class="link-secondary text-decoration-none my-1" href="<?php echo base_url() ?>">
                            <a class="btn btn-secondary my-1 link-secondary" href="<?php echo base_url("/menu") ?>">Explore Full Menu -></u>
                            </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <?php include "modal.php" ?>
    </div>
</div>