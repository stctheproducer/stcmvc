<?php require $data['app_root'] . '/resources/views/inc/header.php';?>
<?php use App\Helpers\Session;?>

<div class="row">
    <div class="col-8">
        <h1><?php echo $data['title']; ?></h1>
        <p><?php echo "The name of this application is " . $data['app_name'] . '.'; ?></p>
        <p>
        Hello <?php echo Session::check('user_id') ? Session::get('user_first_name') : 'guest'; ?>,<br>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis eius incidunt, nihil, sunt necessitatibus a asperiores reprehenderit excepturi temporibus, accusantium esse? Inventore cupiditate voluptates quibusdam nihil debitis, aliquam magni doloribus provident nam repellat modi incidunt eos odit adipisci voluptate eligendi atque, perspiciatis reiciendis, fugit dicta quia ea? Veritatis consequuntur, accusamus, qui autem deleniti laborum beatae neque dolorum, asperiores porro accusantium amet obcaecati repellendus provident eveniet eius fuga nam eaque non. Soluta ratione at consectetur cumque cupiditate minima ipsum nam impedit dolore, ducimus, laborum delectus possimus suscipit animi sint dolores harum, id obcaecati culpa beatae. Modi dolore atque adipisci tenetur aut?</p>
    </div>
</div>

<?php require $data['app_root'] . '/resources/views/inc/footer.php';?>
