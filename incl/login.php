<?php
$error = true;

if (isset($_POST['submit-login']))
{
    $auth = new Auth($db);
    $error = $auth->login($_POST['username'], $_POST['password']);
    if ($error) {
        header('Location:  ./', true, 302);
        die();
    }
}
?>
<div class="row">
    <h2>Login</h2>
</div>
<?php if (!$error): ?>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
    <div class="alert alert-danger" role="alert">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    <span class="sr-only">Error:</span>
    Something happened! :'(
    </div>
    </div>
    <div class="col-sm-1"></div>
</div>
<?php endif; ?>
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