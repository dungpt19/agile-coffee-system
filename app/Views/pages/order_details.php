<h3 style="text-align: center;">Order Details</h3>
<div class="flex-row-history" style="margin-left: 20%">
  <div class="margin-2">ID order: </div>
  <div><?= esc($order['id']) ?></div>
</div>
<div style="margin: 0 auto;">
  <table class="table table-history">
    <thead class="thead-light">
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Name</th>
        <th scope="col">Size</th>
        <th scope="col">Quantity</th>
        <th scope="col">Sweetness</th>
        <th scope="col">Milk</th>
        <th scope="col">Price</th>
      </tr>
    </thead>
    <tbody>
      <?php $STT = 1 ?>
      <?php foreach ($order_item as $item) : ?>
        <tr>
          <th scope="row"><?= esc($STT++) ?></th>
          <td><?= esc($item['coffee_name']) ?></td>
          <td><?= esc($item['size']) ?></td>
          <td><?= esc($item['quantity']) ?></td>
          <td><?= esc($item['sweetness']) ?></td>
          <td><?= esc($item['milk']) ?></td>
          <td><?= esc($item['total_amount']) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<hr style="width: 60%; margin: 0 auto; border-top: 0.5px dotted">
</hr>
<div class="flex-row-history" style="width: 60%; justify-content: space-between;margin: 0 auto;">
  <div style="color: #d3434f;"><?php echo ($order['status'] == 0 ? "Unconfirm" : ($order['status'] == 1 ? "Confirmed" : ($order['status'] == 2 ? "Delivering" : ($order['status'] == 3 ? "Delivered" : "Cancelled")))) ?></div>
  <div>
    <div class="totals-in-history space-history">Totals: <span><?= esc($order['total_amount']) ?></span> </div>
    <a class="btn-order-again" href="<?php echo base_url("") ?>">Order again</a>
  </div>
</div>