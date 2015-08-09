<?php

if (isset($_POST['submit-login']))
{
    $auth = new Auth($db);
    $auth->login($_POST['username'], $_POST['password']);
    print_r($_SESSION);
}
?>
<div class="row">
    <h2>Login</h2>
</div>
<div class="row">
    <div class="col-sm-3"></div>
    <form name="login-form" method='post' action=''>
        <div class="col-sm-3">
            <input type="text" name="username" class="form-control" placeholder="Username">
        </div>
        <div class="col-sm-3">
            <div class="input-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
              <span class="input-group-btn">
                <button type="submit" name="submit-login" class="btn btn-success">Go!</button>
              </span>
            </div>
        </div>
    </form>
    <div class="col-sm-3"></div>
</div>