<div class="container">
  <div class="row mt-5">
    <div class="col-sm-6 p-5" style="color: #636363">
      <h3>Login</h3>
      <hr>

      <form class="" action="<?php echo base_url('/login'); ?>" method="post">
        <div class="">
          <div class="form-group">
            <label for="email">Email : </label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email..." value="">
          </div>
          <div class="form-group">
            <label for="password">Password : </label>
            <input type="password" class="form-control" name="password" id="password" value="" placeholder="Enter password...">
          </div>
          <?php if (isset($validation)) { ?>
            <div class="alert m-auto text-primary" role="alert">
              <?php echo $validation->listErrors(); ?>
            </div>
          <?php } ?>
        </div>
        <button type="submit" class="btn btn-secondary col-12 mt-2">Signin</button>
      </form>
    </div>
  </div>
</div>