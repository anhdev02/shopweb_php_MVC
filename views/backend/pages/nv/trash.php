<table class="table">
    <tr>
        <th>Email</th>
        <th>Password</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Created_at</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach($data['trash'] as $value): ?>
    <tr>
        <td><?= $value['email'] ?></td>
        <td><?= $value['password'] ?></td>
        <td><?= $value['name'] ?></td>
        <td><?= $value['phone'] ?></td>
        <td><?= $value['created_at'] ?></td>
        <td><a href="<?= URL ?>index.php/backend/restoreNv/<?= $value['id'] ?>"><img style="width: 20px; height: 20px" class="icon" src="http://thietkeweb/pminhc/asset/backend/assets/images/backend_img/restore-icon.png"></a></td>
        <td><a href="<?= URL ?>index.php/backend/delNv/<?= $value['id'] ?>"><img style="width: 20px; height: 20px" class="icon" src="http://thietkeweb/pminhc/asset/backend/assets/images/backend_img/del_icon_big.png"></a></td>
    </tr>
    <?php endforeach; ?>
</table>

