<p>
    <a href="<?= URL ?>index.php/backend/nvAdd"><button type="button" class="btn btn-primary">Add</button></a>
    <a href="<?= URL ?>index.php/backend/trashNvList"><button type="button" class="btn btn-primary">Trash(<?= $data['trash']?>)</button></a>
</p>
<table class="table">
    <tr>
        <th>Email</th>
        <th>Password</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Created_at</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach($data['nv'] as $value): ?>
    <tr>
        <td><?= $value['email'] ?></td>
        <td><?= $value['password'] ?></td>
        <td><?= $value['name'] ?></td>
        <td><?= $value['phone'] ?></td>
        <td><?= $value['created_at'] ?></td>
        <td>
            <?php if($value['status']==1){ ?>
                <a href="<?= URL ?>index.php/backend/statusNv/<?= $value['id'] ?>/0"><img style="width: 20px; height: 20px" class="icon" src= "<?= URL ?>asset/backend/assets/images/backend_img/check_icon_big.png"></a>
            <?php }else{ ?>
                <a href="<?= URL ?>index.php/backend/statusNv/<?= $value['id'] ?>/1"><img style="width: 20px; height: 20px" class="icon" src= "<?= URL ?>asset/backend/assets/images/backend_img/forbidden_icon_big.png"></a>
            <?php } ?>
        </td>
        <td><a href="<?= URL ?>index.php/backend/editNv/<?= $value['id'] ?>"><img style="width: 20px; height: 20px" class="icon" src="<?= URL ?>asset/backend/assets/images/backend_img/modify.png"></a></td>
        <td><a href="<?= URL ?>index.php/backend/delTempNv/<?= $value['id'] ?>"><img style="width: 20px; height: 20px" class="icon" src="<?= URL ?>asset/backend/assets/images/backend_img/del_icon_big.png"></a></td>
    </tr>
    <?php endforeach; ?>
</table>
<div><div class = "canchinh"><?= $data['paginator'] ?></div></div>


