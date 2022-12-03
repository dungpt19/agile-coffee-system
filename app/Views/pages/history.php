<div class="mt-0 d-flex flex-column">
  <nav style="width: 40%; margin: 0 auto">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-unconfirmed-tab" data-bs-toggle="tab" data-bs-target="#nav-unconfirmed" type="button" role="tab" aria-controls="nav-unconfirmed" aria-selected="true">Unconfirmed</button>
      <button class="nav-link" id="nav-confirmed-tab" data-bs-toggle="tab" data-bs-target="#nav-confirmed" type="button" role="tab" aria-controls="nav-confirmed" aria-selected="false">Confirmed</button>
      <button class="nav-link" id="nav-delivering-tab" data-bs-toggle="tab" data-bs-target="#nav-delivering" type="button" role="tab" aria-controls="nav-delivering" aria-selected="false">Delivering</button>
      <button class="nav-link" id="nav-delivered-tab" data-bs-toggle="tab" data-bs-target="#nav-delivered" type="button" role="tab" aria-controls="nav-delivered" aria-selected="false">Delivered</button>
      <button class="nav-link" id="nav-cancelled-tab" data-bs-toggle="tab" data-bs-target="#nav-cancelled" type="button" role="tab" aria-controls="nav-cancelled" aria-selected="false">Cancelled</button>
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active between" id="nav-unconfirmed" role="tabpanel" aria-labelledby="nav-unconfirmed-tab">
      <?php foreach ($list_orders as $order) : ?>
        <?php if ($order['status'] == 0) : ?>
          <form id="cancel-order<?= esc($order['order_id']) ?>" action="<?php echo base_url("order/cancel") ?>" method="post">
            <input type="hidden" name="order_id" value="<?= esc($order['order_id']) ?>" />
            <div class="card-history mb-4">
              <div class="date-order"> Order at
                <div style="margin-left: 5px;"><?= esc($order['ordered_at']) ?></div>
              </div>
              <div class="flex-row-history space-history">
                <div class="flex-row-history ">
                  <div>
                    <img src="<?php echo base_url("/img/coffee.jpg") ?>" alt="..." class="img-coffee"></img>
                  </div>
                  <div class="flex-col-history margin-1">
                    <div class="flex-row-history ">
                      <div class="bold-history margin-2">ID order: </div>
                      <div><?= esc($order['order_id']) ?></div>
                    </div>
                    <div class="flex-row-history">
                      <div class="bold-history margin-2">Total quantity: </div>
                      <div><?= esc($order['quantity']); ?></div>
                    </div>
                    <!-- <div class="flex-row-history">
                  <div class="bold-history margin-2">Size: </div>
                  <div>L, M, S</div>
                  </div> -->
                    <div class="flex-row-history">
                      <div class="bold-history margin-2">Totals: </div>
                      <div><?= esc($order['total_amount_order']); ?></div>
                    </div>
                  </div>
                </div>
                <div class="flex-col-history">
                  <a class="btn btn btn-outline-secondary mb-2" href="<?php echo base_url("order/details") . "/" . $order['order_id'] ?>">View order details</a>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal<?= esc($order['order_id']) ?>">
                    Cancel
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="modal<?= esc($order['order_id']) ?>" tabindex="-1" aria-labelledby="modalLabel<?= esc($order['order_id']) ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalLabel<?= esc($order['order_id']) ?>">Confirm</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to cancel your order?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                          <button type="submit" form="cancel-order<?= esc($order['order_id']) ?>" class="btn btn-danger">Yes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        <?php endif ?>
      <?php endforeach ?>
      <?php if ($unconfirm == 0) : ?>
        <div style="height: 400px;" class="d-flex align-items-center justify-content-center">No orders yet! Order now!!!</div>
      <?php endif ?>
    </div>


    <div class="tab-pane fade between" id="nav-confirmed" role="tabpanel" aria-labelledby="nav-confirmed-tab">
      <?php foreach ($list_orders as $order) : ?>
        <?php if ($order['status'] == 1) : ?>
          <div class="card-history mb-5">
            <div class="date-order"> Order at
              <div style="margin-left: 5px;"><?= esc($order['ordered_at']) ?></div>
            </div>
            <div class="flex-row-history space-history">
              <div class="flex-row-history ">
                <div>
                  <img src="<?php echo base_url("/img/coffee.jpg") ?>" alt="..." class="img-coffee"></img>
                </div>
                <div class="flex-col-history margin-1">
                  <div class="flex-row-history">
                    <div class="bold-history margin-2">ID order: </div>
                    <div><?= esc($order['order_id']) ?></div>
                  </div>
                  <div class="flex-row-history">
                    <div class="bold-history margin-2">Total quantity: </div>
                    <div><?= esc($order['quantity']); ?></div>
                  </div>
                  <!-- <div class="flex-row-history">
                  <div class="bold-history margin-2">Size: </div>
                  <div>L, M, S</div>
                </div> -->
                  <div class="flex-row-history">
                    <div class="bold-history margin-2">Totals: </div>
                    <div><?= esc($order['total_amount_order']); ?></div>
                  </div>
                </div>
              </div>
              <div class="flex-col-history">
                <a class="btn btn btn-outline-secondary mb-2" href="<?php echo base_url("order/details") . "/" . $order['order_id'] ?>">View order details</a>
                <a class="btn btn btn-secondary" href="<?php echo base_url("") ?>">
                  Order again
                </a>
              </div>
            </div>
          </div>
        <?php endif ?>
      <?php endforeach ?>
      <?php if ($confirm == 0) : ?>
        <div style="height: 400px;" class="d-flex align-items-center justify-content-center">No orders yet! Order now!!!</div>
      <?php endif ?>
    </div>

    <div class="tab-pane fade between" id="nav-delivering" role="tabpanel" aria-labelledby="nav-delivering-tab">
      <?php foreach ($list_orders as $order) : ?>
        <?php if ($order['status'] == 2) : ?>
          <div class="card-history mb-4">
            <div class="date-order"> Order at
              <div style="margin-left: 5px;"><?= esc($order['ordered_at']) ?></div>
            </div>
            <div class="flex-row-history space-history">
              <div class="flex-row-history ">
                <div>
                  <img src="<?php echo base_url("/img/coffee.jpg") ?>" alt="..." class="img-coffee"></img>
                </div>
                <div class="flex-col-history margin-1">
                  <div class="flex-row-history">
                    <div class="bold-history margin-2">ID order: </div>
                    <div><?= esc($order['order_id']) ?></div>
                  </div>
                  <div class="flex-row-history">
                    <div class="bold-history margin-2">Total quantity: </div>
                    <div><?= esc($order['quantity']); ?></div>
                  </div>
                  <!-- <div class="flex-row-history">
                  <div class="bold-history margin-2">Size: </div>
                  <div>L, M, S</div>
                </div> -->
                  <div class="flex-row-history">
                    <div class="bold-history margin-2">Totals: </div>
                    <div><?= esc($order['total_amount_order']); ?></div>
                  </div>
                </div>
              </div>
              <div class="flex-col-history">
                <a class="btn btn btn-outline-secondary mb-2" href="<?php echo base_url("order/details") . "/" . $order['order_id'] ?>">View order details</a>
                <a class="btn btn btn-secondary" href="<?php echo base_url("") ?>">
                  Order again
                </a>
              </div>
            </div>
          </div>
        <?php endif ?>
      <?php endforeach ?>
      <?php if ($delivering == 0) : ?>
        <div style="height: 400px;" class="d-flex align-items-center justify-content-center">No orders yet! Order now!!!</div>
      <?php endif ?>
    </div>

    <div class="tab-pane fade between" id="nav-delivered" role="tabpanel" aria-labelledby="nav-delivered-tab">
      <?php foreach ($list_orders as $order) : ?>
        <?php if ($order['status'] == 3) : ?>
          <div class="card-history mb-4">
            <div class="date-order"> Order at
              <div style="margin-left: 5px;"><?= esc($order['ordered_at']) ?></div>
            </div>
            <div class="flex-row-history space-history">
              <div class="flex-row-history ">
                <div>
                  <img src="<?php echo base_url("/img/coffee.jpg") ?>" alt="..." class="img-coffee"></img>
                </div>
                <div class="flex-col-history margin-1">
                  <div class="flex-row-history">
                    <div class="bold-history margin-2">ID order: </div>
                    <div><?= esc($order['order_id']) ?></div>
                  </div>
                  <div class="flex-row-history">
                    <div class="bold-history margin-2">Total quantity: </div>
                    <div><?= esc($order['quantity']); ?></div>
                  </div>
                  <!-- <div class="flex-row-history">
                  <div class="bold-history margin-2">Size: </div>
                  <div>L, M, S</div>
                </div> -->
                  <div class="flex-row-history">
                    <div class="bold-history margin-2">Totals: </div>
                    <div><?= esc($order['total_amount_order']); ?></div>
                  </div>
                </div>
              </div>
              <div class="flex-col-history">
                <a class="btn btn btn-outline-secondary mb-2" href="<?php echo base_url("order/details") . "/" . $order['order_id'] ?>">View order details</a>
                <a class="btn btn btn-secondary" href="<?php echo base_url("") ?>">
                  Order again
                  <!-- </button> -->
                </a>
              </div>
            </div>
          </div>
        <?php endif ?>
      <?php endforeach ?>
      <?php if ($delivered == 0) : ?>
        <div style="height: 400px;" class="d-flex align-items-center justify-content-center">No orders yet! Order now!!!</div>
      <?php endif ?>
    </div>

    <div class="tab-pane fade between" id="nav-cancelled" role="tabpanel" aria-labelledby="nav-cancelled-tab">
      <?php foreach ($list_orders as $order) : ?>
        <?php if ($order['status'] == 4) : ?>
          <div class="card-history mb-4">
            <div class="date-order"> Order at
              <div style="margin-left: 5px;"><?= esc($order['ordered_at']) ?></div>
            </div>
            <div class="flex-row-history space-history">
              <div class="flex-row-history ">
                <div>
                  <img src="<?php echo base_url("/img/coffee.jpg") ?>" alt="..." class="img-coffee"></img>
                </div>
                <div class="flex-col-history margin-1">
                  <div class="flex-row-history">
                    <div class="bold-history margin-2">ID order: </div>
                    <div><?= esc($order['order_id']) ?></div>
                  </div>
                  <div class="flex-row-history">
                    <div class="bold-history margin-2">Total quantity: </div>
                    <div><?= esc($order['quantity']); ?></div>
                  </div>
                  <!-- <div class="flex-row-history">
                  <div class="bold-history margin-2">Size: </div>
                  <div>L, M, S</div>
                  </div> -->
                  <div class="flex-row-history">
                    <div class="bold-history margin-2">Totals: </div>
                    <div><?= esc($order['total_amount_order']); ?></div>
                  </div>
                </div>
              </div>
              <div class="flex-col-history">
                <a class="btn btn btn-outline-secondary mb-2" href="<?php echo base_url("order/details") . "/" . $order['order_id'] ?>">View order details</a>
                <a class="btn btn btn-secondary" href="<?php echo base_url("") ?>">
                  Order again
                </a>
              </div>
            </div>
          </div>
        <?php endif ?>
      <?php endforeach ?>
      <?php if ($cancelled == 0) : ?>
        <div style="height: 400px;" class="d-flex align-items-center justify-content-center">No canceled orders yet!</div>
      <?php endif ?>
    </div>

  </div>
</div>