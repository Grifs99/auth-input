<?php
if (isset($_POST['add-data-submit']))
{

    $db->addData($_POST["dataContent"]);
}
?>
<div class="row">
    <h2>Add data</h2>
</div>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <form action="" method="post">
            <div class="form-group">
                <textarea name="dataContent" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" name="add-data-submit" class="btn btn-default">Submit</button>
        </form>
    </div>
    <div class="col-sm-1"></div>
</div>