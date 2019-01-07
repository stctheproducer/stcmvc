<?php require $data['app_root'] . '/resources/views/inc/header.php';?>
<?php use App\Helpers\Session;?>

<div class="row mb-5">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-body">
                <?php Session::flash('register_success');?>
                <h2 class="card-title"><?php echo $data['title']; ?></h2>
                <p class="card-text">Please fill the form to login</p>

                <form action="<?php echo $data['app_url']; ?>/users/login" method="post">
                    <!-- Email address -->
                    <div class="form-group">
                      <label for="email_address">Email Address<sup>*</sup></label>
                      <input type="email" class="form-control <?php echo (!empty($data['email_address_err'])) ? 'is-invalid' : ''; ?>" name="email_address" id="email_address" aria-describedby="emailAddress" value="<?php echo $data['email_address']; ?>">
                      <span class="invalid-feedback"><?php echo $data['email_address_err']; ?></span>
                      <small id="emailAddress" class="form-text text-muted">Fill in your email address</small>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                      <label for="password">Password<sup>*</sup></label>
                      <input type="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" name="password" id="password">
                      <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                      <small id="emailAddress" class="form-text text-muted">What is your password?</small>
                    </div>

                    <div class="row">
                        <!-- Submit -->
                        <div class="col">
                            <button type="submit" class="btn btn-success btn-block">Log In</button>
                        </div>
                        <div class="col">
                            <a href="<?php echo $data['app_url']; ?>/users/register" class="btn btn-light btn-block">No account? Register</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<?php require $data['app_root'] . '/resources/views/inc/footer.php';?>
