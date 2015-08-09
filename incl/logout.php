<?php
if (isset($_POST['logout-submit']))
{
	$auth = new Auth($db);
	$auth->logout();
}
?>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 logout-form">
    	<form name="logout-form" method='post' action=''>    		
        	<button type="submit" name="logout-submit" class="btn btn-danger btn-lg">Logout</button>
        </form>
    </div>
    <div class="col-sm-4"></div>
</div>