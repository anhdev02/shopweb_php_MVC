<h1>Login</h1>
<form class="form-inline" action="<?= URL ?>index.php/backend/doLogin" method="POST">
    <label for="email" class="mb-2 mr-sm-2">Email</label><br>
    <input type="email" class="form-control mb-2 mr-sm-2" value="<?= (isset($_COOKIE['emailadmin'])) ? $_COOKIE['emailadmin'] : "" ?>" id="email2" placeholder="Enter email" name="email"><br>

    <label for="pass" class="mb-2 mr-sm-2">Password:</label><br>
    <input type="password" class="form-control mb-2 mr-sm-2" value="<?= (isset($_COOKIE['passadmin'])) ? $_COOKIE['passadmin'] : "" ?>" id="pwd2" placeholder="Enter password" name="pass">
    <div class="form-check mb-2 mr-sm-2">
    <input type="checkbox" name="remember" > Remember me
    </div>    
    <button type="submit" class="btn btn-primary mb-2">Login</button>
</form>