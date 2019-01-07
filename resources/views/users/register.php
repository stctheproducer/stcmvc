<?php require $data['app_root'] . '/resources/views/inc/header.php';?>

<div class="row mb-5">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title"><?php echo $data['title']; ?></h2>
                <p class="card-text">Please fill the form to register</p>

                <form action="<?php echo $data['app_url']; ?>/users/register" method="post">
                    <!-- First name -->
                    <div class="form-group">
                      <label for="first_name">First Name<sup>*</sup></label>
                      <input type="text" name="first_name" id="first_name" class="form-control <?php echo (!empty($data['first_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['first_name']; ?>" aria-describedby="firstName">
                      <span class="invalid-feedback"><?php echo $data['first_name_err']; ?></span>
                      <small id="firstName" class="text-muted">What is your first name?</small>
                    </div>

                    <!-- Other names -->
                    <div class="form-group">
                      <label for="other_names">Other Name(s)</label>
                      <input type="text" name="other_names" id="other_names" class="form-control <?php echo (!empty($data['other_names_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['other_names']; ?>" aria-describedby="otherNames">
                      <span class="invalid-feedback"><?php echo $data['other_names_err']; ?></span>
                      <small id="otherNames" class="text-muted">Do you have any other names?</small>
                    </div>

                    <!-- Last name -->
                    <div class="form-group">
                      <label for="last_name">Last Name<sup>*</sup></label>
                      <input type="text" name="last_name" id="last_name" class="form-control <?php echo (!empty($data['last_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['last_name']; ?>" aria-describedby="lastName">
                      <span class="invalid-feedback"><?php echo $data['last_name_err']; ?></span>
                      <small id="lastName" class="text-muted">What is your last name?</small>
                    </div>

                    <!-- Email address -->
                    <div class="form-group">
                      <label for="email_address">Email Address<sup>*</sup></label>
                      <input type="email" class="form-control <?php echo (!empty($data['email_address_err'])) ? 'is-invalid' : ''; ?>" name="email_address" id="email_address" aria-describedby="emailAddress" value="<?php echo $data['email_address']; ?>">
                      <span class="invalid-feedback"><?php echo $data['email_address_err']; ?></span>
                      <small id="emailAddress" class="form-text text-muted">What is your email address?</small>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                      <label for="password">Password<sup>*</sup></label>
                      <input type="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" name="password" id="password">
                      <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                      <small id="emailAddress" class="form-text text-muted">Please create a strong password</small>
                    </div>

                    <!-- Confirm password -->
                    <div class="form-group">
                      <label for="confirm_password">Confirm Password<sup>*</sup></label>
                      <input type="password" class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" name="confirm_password" id="confirm_password">
                      <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                      <small id="emailAddress" class="form-text text-muted">Please confirm your created password</small>
                    </div>

                    <div class="row">
                        <!-- Submit -->
                        <div class="col">
                            <button type="submit" class="btn btn-success btn-block">Create</button>
                        </div>
                        <div class="col">
                            <a href="<?php echo $data['app_url']; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<?php require $data['app_root'] . '/resources/views/inc/footer.php';?>
