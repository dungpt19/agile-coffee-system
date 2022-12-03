<div class="container">
  <div class="row mt-5">
    <div class="col-sm-6 p-5" style="color: #636363">
      <h3>Sign up</h3>
      <hr>
      <?php if (session()->get('success')) { ?>
        <div class="alert alert-success" role="alert">
          <?php echo session()->get('success'); ?>
        </div>
      <?php } ?>
      <form class="" action="<?php echo base_url('register'); ?>" method="post">
        <div class="row">
          <div class="form-group">
            <label for="fullname">Full Name : <span style="color: red; font-size: 0.7rem"> *</span></label>
            <input type="text" class="form-control" name="fullname" id="fullname" value="<?php if (isset($_POST['fullname'])) {
                                                                                            echo $_POST['fullname'];
                                                                                          } ?>">
          </div>
          <div class="form-group">
            <label for="phone_number">Phone : <span style="color: red; font-size: 0.7rem"> *</span></label>
            <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?php if (isset($_POST['phone_number'])) {
                                                                                                    echo $_POST['phone_number'];
                                                                                                  } ?>">
          </div>
          <div class="form-group">
            <label for="email">Email : <span style="color: red; font-size: 0.7rem"> *</span></label>
            <input type="text" class="form-control" name="email" id="email" value="<?php if (isset($_POST['email'])) {
                                                                                      echo $_POST['email'];
                                                                                    } ?>">
          </div>
          <div class="form-group">
            <label for="username">Username : <span style="color: red; font-size: 0.7rem"> *</span></label>
            <input type="text" class="form-control" name="username" id="username" value="<?php if (isset($_POST['username'])) {
                                                                                            echo $_POST['username'];
                                                                                          } ?>">
          </div>
          <div class="form-group">
            <label for="password">Password : <span style="color: red; font-size: 0.7rem"> *</span></label>
            <input type="password" class="form-control" name="password" id="password" value="">
          </div>
          <div class="form-group">
            <label for="password_confirm">Confirm Password : <span style="color: red; font-size: 0.7rem">
                *</span></label>
            <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="">
          </div>

          <?php if (isset($validation)) { ?>
            <div class="alert m-auto text-danger" role="alert">
              <?php echo $validation->listErrors(); ?>
            </div>
          <?php } ?>
        </div>

        <button type="submit" class="btn btn-secondary col-12 mt-2">Đăng ký</button>
      </form>

    </div>
  </div>
</div>