<?php require $data['app_root'] . '/resources/views/inc/header.php';?>

<?php require $data['app_root'] . '/resources/views/inc/nav.php';?>

<div class="container">
    <div class="row mt-5">
        <div class="col-8">
            <h1><?php echo $data['app_name']; ?></h1>
            <p><?php echo "The name of this application is " . $data['app_name'] . '.'; ?></p>
        </div>
    </div>
</div>

<?php require $data['app_root'] . '/resources/views/inc/footer.php';
