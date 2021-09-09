<?php require_once("navbar.php");
require_once("include/users.php"); ?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>
                <?php
                if(!empty($_GET['err'])){
                $err = $_GET['err'];
                if($err == 2): ?>
                  <p class="pt-3 text-center" style="color:red;"><?php echo "Email is already in use."; ?></p>
                <?php elseif($err == 1): ?>
                  <p class="pt-3 text-center" style="color:red;"><?php echo "Sign in attemp has failed."; ?></p>
                <?php elseif($err == 3): ?>
                  <p class="pt-3 text-center" style="color:red;"><?php echo "Passwords doesn't match."; ?></p>
                <?php endif; };?>

                <div class="card-body">
                    <form method="POST" action="include/control.php">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value=""  autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control" name="username" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_repeat" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password_repeat" type="password" class="form-control" name="password_repeat">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="register">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once("basic/footer.php"); ?>
