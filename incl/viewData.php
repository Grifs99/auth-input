<?php
//dummy data
$data = array(
    array(
        "id"=>"1",
        "username"=>"danny",
        "password"=>"asdasdf2"
    ),
    array(
        "id"=>"2",
        "username"=>"apple",
        "password"=>"fefe2ef"
    ),
    array(
        "id"=>"3",
        "username"=>"pear",
        "password"=>"DF$#fsf"
    ),
    array(
        "id"=>"4",
        "username"=>"trunks",
        "password"=>"asdf2fg"
    ),
    array(
        "id"=>"5",
        "username"=>"stinky",
        "password"=>"asd23f23g"
    )
);
?>
<div class="row">
    <h2>Data</h2>
</div>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <table class="table">
            <tr>
                <th>id</th>
                <th>username</th>
                <th>password</th>
            </tr>
            <?php foreach($data as $row):?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="col-sm-1"></div>
    </div>