<?php $user_id = isset($_SESSION["id"]) ? $_SESSION["id"] : 0;
$quantity = isset($_SESSION["quantity"]) ? $_SESSION["quantity"] : 0;

?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-light">
            <div class="modal-header d-block">
                <button type="button" class="btn-close float-end shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title fw-light">Customize</h5>
                <h5 class="modal-title fw-light" id="exampleModalLabel"></h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action=<?= base_url("/add") ?> method="post">
                        <input type="hidden" name="user_id" value="<?= $user_id ?>" />
                        <input type="hidden" name="product_id" id="product_id" />
                        <input type="hidden" name="sweetness" value=0 />
                        <input type="hidden" name="milk" value=0 />
                        <div class="row my-2 mx-5">
                            <div class="col-6">
                                <p class="align-middle">Size</p>
                            </div>
                            <div class="col-6">
                                <div class="btn-group float-end">
                                    <input type="radio" class="btn-check" name="size" id="small" value="S" checked>
                                    <label class="btn btn-outline-secondary shadow-none" for="small">S</label>
                                    <input type="radio" class="btn-check" name="size" id="medium" value="M">
                                    <label class="btn btn-outline-secondary shadow-none" for="medium">M</label>
                                    <input type="radio" class="btn-check" name="size" id="large" value="L">
                                    <label class="btn btn-outline-secondary shadow-none" for="large">L</label>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2 mx-5">
                            <div class="col-6">
                                <p class="align-middle">
                                    Sweetness
                                </p>
                            </div>
                            <div class="col-6">
                                <div class="btn-group float-end">
                                    <input type="radio" class="btn-check" name="sweetness" id="s1" value="1">
                                    <label class="btn btn-outline-secondary shadow-none " for="s1">1</label>
                                    <input type="radio" class="btn-check" name="sweetness" id="s2" value="2">
                                    <label class="btn btn-outline-secondary shadow-none " for="s2">2</label>

                                </div>
                            </div>
                        </div>
                        <div class="row my-2 mx-5">
                            <div class="col-6">
                                <p class="align-middle">
                                    Milk
                                </p>
                            </div>
                            <div class="col-6">
                                <div class="btn-group float-end">
                                    <input type="radio" class="btn-check" name="milk" id="m1" value="1">
                                    <label class="btn btn-outline-secondary shadow-none " for="m1">1</label>
                                    <input type="radio" class="btn-check" name="milk" id="m2" value="2">
                                    <label class="btn btn-outline-secondary shadow-none " for="m2">2</label>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2 mx-5">
                            <div class="col-6">
                                <p class="align-middle">Count</p>
                            </div>
                            <div class="col-6">
                                <input type="number" name="quantity" class="float-end" onchange="setQuantity()" id="quantity" value="1" min="1" max="20">
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="submit" id="submit" onclick="setAmount()" class="btn btn-secondary shadow-none fw-light">
                    Add To Shopping Cart
                </button>
            </div>
        </div>
        </form>
    </div>
</div>
<script>
    logged_in_id = <?= $user_id ?>;
    quantity = 0;
    window.onload = function() {
        disableBtn();
    };

    function Uncheck(radio) {
        if ($(radio).is(':checked')) {
            $(this).removeClass("active");
            $(radio).prop('checked', false);
        } else {
            $(radio).prop('checked', true);

        }

    }



    function disableBtn() {
        if (logged_in_id === 0) {
            $("#submit").attr('disabled', "disabled");
            $("#submit").html('Please Log In First.');

        }
    };

    function setQuantity() {
        quantity = $("#quantity").val();
        console.log(quantity);
    };

    function getCoffee(id, name) {

        $("#exampleModalLabel").html(name);
        // $("#modalSubmit").attr('href', "<?= base_url("/coffee") ?>/" + id);
        $("#product_id").attr('value', id);
        $("#total_amount").attr('value', quantity);
    }

    function uncheckRadio() {

    }
</script>