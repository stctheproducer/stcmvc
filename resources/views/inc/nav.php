<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-5">
    <div class="container">
        <a class="navbar-brand" href="<?php echo $data['app_url']; ?>"><?php echo $data['app_name']; ?></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapseNav" aria-controls="collapseNav"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapseNav">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/pages/about">About <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo isset($_SESSION['user_id']) ? $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'] : 'Users'; ?></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a class="dropdown-item" href="<?php echo $data['app_url']; ?>/users/logout">Logout</a>
                    <?php else: ?>
                        <a class="dropdown-item" href="<?php echo $data['app_url']; ?>/users/login">Login</a>
                        <a class="dropdown-item" href="<?php echo $data['app_url']; ?>/users/register">Register</a>
                    <?php endif;?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
