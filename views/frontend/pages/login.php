<h1>Login</h1>
<form class="form-inline" action="<?= URL ?>index.php/frontend/doLogin" method="POST">
    <label for="email" class="mb-2 mr-sm-2">Email</label><br>
    <input type="email" class="form-control mb-2 mr-sm-2" value="<?= (isset($_COOKIE['email'])) ? $_COOKIE['email'] : "" ?>" id="email2" placeholder="Enter email" name="email"><br>

    <label for="pass" class="mb-2 mr-sm-2">Password:</label><br>
    <input type="password" class="form-control mb-2 mr-sm-2" value="<?= (isset($_COOKIE['pass'])) ? $_COOKIE['pass'] : "" ?>" id="pwd2" placeholder="Enter password" name="pass">
    <div class="form-check mb-2 mr-sm-2">
      <label class="form-check-label">
        <input type="checkbox" class="form-check-input" name="remember" > Remember me
      </label>
    </div>    
    <button type="submit" class="btn btn-primary mb-2">Login</button>
</form>