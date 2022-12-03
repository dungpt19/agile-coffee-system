<div class="container my-5">
    <div class="row m-auto">
        <div class="col-sm-3" style="color: #636363">
            <strong class="text-uppercase fs-4" style="color: #e71a0f"><span>Account</span></strong>
        </div>
        <div class="col-sm-8" style="color: #636363">
            <div class="row dashboard">
                <h3 class="col-sm-6">Update Profile</h3>
                <h3 class="col-sm-6">Update Password</h3>
            </div>
            <hr>
            <form class="" action="<?php echo base_url('update'); ?>" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="fullname">Full name:</label>
                            <input type="text" class="form-control" name="fullname" id="fullname"
                                value="<?php echo session()->get('fullname'); ?>" />
                            <label for="username">User name:</label>
                            <input type="text" class="form-control" name="username" id="username"
                                value="<?php echo session()->get('username'); ?>" />
                            <label for="gender">Gender:</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value="">--Please choose an option--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <label for="date_of_birth">Date of Birth:</label>
                            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
                                value="<?php echo session()->get('date_of_birth'); ?>" />
                            <label for="phone_number">Phone:</label>
                            <input type="text" class="form-control" name="phone_number" id="phone_number"
                                value="<?php echo session()->get('phone_number'); ?>" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="password">New Password:</label>
                            <input type="password" class="form-control" name="password" id="password" value="">
                        </div>
                        <div class="form-group">
                            <label for="password_confirm">Confirm Password: </label>
                            <input type="password" class="form-control" name="password_confirm" id="password_confirm"
                                value="">
                        </div>
                    </div>
                    <?php if (isset($validation)) : ?>
                    <div class="alert m-auto text-danger" role="alert">
                        <?= $validation->listErrors() ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-4">
                    </div>
                    <div class="col-12 col-sm-8 mt-1 text-end">
                        <a href="<?php echo base_url('/user'); ?>" style="text-decoration: none; font-size: 0.9rem">Quay
                            trở lại thông tin tài khoản</a>
                    </div>
                </div>
                <button type="submit" class="btn btn-danger col-12 mt-2">Update</button>
            </form>
        </div>
    </div>
</div>