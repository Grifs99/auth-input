<?php $conn = new Database(); ?>
<div class="row">
    <h2>Data</h2>
</div>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <table class="table">
            <tr>
                <th>id</th>
                <th>content</th>
            </tr>
            <?php foreach($conn->getData() as $row):?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['content']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="col-sm-1"></div>
</div>