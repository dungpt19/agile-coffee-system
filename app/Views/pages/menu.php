<div class="menu">
    <div class="container">
        <div class="row">
            <?php foreach ($coffee_type as $coffeeType) : ?>
                <div class="col-6 mt-5">
                    <div class="row rounded py-1">
                        <div class="col-6">
                            <a class="link-secondary text-decoration-none my-1" href="<?php echo base_url() ?>">
                                <p class="my-1 fw-light text-dark fs-4"><?php echo $coffeeType["coffee_type"] ?><p>
                            </a>
                        </div>
                        <div class="col-sm">
                            <p class="my-1 fw-light text-dark fs-6">S</p>
                        </div>
                        <div class="col-sm">
                            <p class="my-1 fw-light text-dark fs-6">M</p>
                        </div>
                        <div class="col-sm">
                            <p class="my-1 fw-light text-dark fs-6">L</p>
                        </div>
                        <div class="col-sm">

                        </div>
                    </div>
                    <?php foreach ($coffees as $coffee) : ?>
                        <?php if ($coffee["coffee_type"] == $coffeeType["coffee_type"]) : ?>
                            <?php
                            $hover = $coffee["sold_out"] != 0 ?  "text-black-50 disabled" :  "coffee_hover text-dark";
                            $link =  $coffee["sold_out"] != 0 ?   "#" : "?coffee=" . $coffee["id"];
                            ?>
                            <div class="row rounded py-1 <?= $hover ?>">
                                <div class=" col-6">
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
                                    <a class="btn btn-secondary text-decoration-none my-1 add" onclick="getCoffee(<?= $coffee['id'] ?>,'<?= $coffee['coffee_name'] ?>')" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <u class="my-1 text-decoration-none">Add</u>
                                    </a>
                                </div>
                            </div>

                        <?php endif; ?>

                    <?php endforeach; ?>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
</div>
<!-- Modal -->
<?php include "modal.php" ?>