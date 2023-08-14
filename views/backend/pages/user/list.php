<table class="table">
    <tr>
        <th>Role</th>
        <th>Email</th>
        <th>Password</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Created_at</th>
        <th>Status</th>
        <th>Delete</th>
    </tr>
    <?php foreach($data['users'] as $value): ?>
    <tr>
        <td><?= $value['role'] ?></td>
        <td><?= $value['email'] ?></td>
        <td><?= $value['password'] ?></td>
        <td><?= $value['name'] ?></td>
        <td><?= $value['phone'] ?></td>
        <td><?= $value['created_at'] ?></td>
        <td>
            <?php if($value['status']==1){ ?>
                <a href="<?= URL ?>index.php/backend/statusUser/<?= $value['id'] ?>/0"><img style="width: 20px; height: 20px" class="icon" src= "<?= URL ?>asset/backend/assets/images/backend_img/check_icon_big.png"></a>
            <?php }else{ ?>
                <a href="<?= URL ?>index.php/backend/statusUser/<?= $value['id'] ?>/1"><img style="width: 20px; height: 20px" class="icon" src= "<?= URL ?>asset/backend/assets/images/backend_img/forbidden_icon_big.png"></a>
            <?php } ?>
        </td>
        <td><a onclick="return confirm('Bạn có chắc chắn xóa không ?')" href="<?= URL ?>index.php/backend/delUser/<?= $value['id'] ?>"><img style="width: 20px; height: 20px" class="icon" src="<?= URL ?>asset/backend/assets/images/backend_img/del_icon_big.png"></a></td>
    </tr>
    <?php endforeach; ?>
</table>
<div><div class = "canchinh"><?= $data['paginator'] ?></div></div>


