<?php
if (isset($_POST['submit-registration']))
{
    $auth = new Auth($db);
    $auth->addUser($_POST['username'], $_POST['password1'], $_POST['password2']);
}
?>
<div class="row">
    <h2>Register</h2>
</div>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <form name="register-form" method='post' action=''>
            <div class="form-group">
                <label for="inputLogin">Login</label>
                <input type="text" name="username" class="form-control" id="inputLogin" placeholder="Login">
            </div>
            <div class="form-group">
                <label for="inputPassword1">Password</label>
                <input type="password" name="password1" class="form-control" id="inputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="inputPassword2">Password (repeat)</label>
                <input type="password" name="password2" class="form-control" id="inputPassword2" placeholder="Password">
            </div>
            <button type="submit" name="submit-registration" class="btn btn-default">Submit</button>
        </form>
    </div>
    <div class="col-sm-1"></div>
</div>