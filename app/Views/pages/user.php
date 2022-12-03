<div class="container">
    <div class="row mt-5">
        <div class="col-sm-6 p-5" style="color: #636363">
            <h3>Profile</h3>
            <hr>
            <i class="bi bi-pencil-square"></i>
            <form class="" action="" method="post">
                <div class="row">
                    <div class="form-group">
                        <p>Full name : <?php echo session()->get('fullname'); ?></p>
                        <p>Username : <?php echo session()->get('username'); ?></p>
                        <p>Gender : <?php echo session()->get('gender'); ?></p>
                        <p>Date of Birth : <?php echo date("d/m/Y", strtotime(session()->get('date_of_birth'))); ?></p>
                        <p>Email : <?php echo session()->get('email'); ?></p>
                        <p>Phone : <?php echo session()->get('phone_number'); ?></p>
                    </div>
                    <div class="form-group">
                        <label for="email">
                            <a class="nav-link px-2" href="<?php echo base_url('/update') ?>">Edit</a>
                            <a class="nav-link px-2" href="<?php echo base_url("/logout") ?>">Logout</a>

                        </label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>