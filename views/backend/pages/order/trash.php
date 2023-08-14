<table class="table">
    <tr>
        <th>Id</th>
        <th>Order_date</th>
        <th>Customer</th>
        <th>Address</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach($data['trash'] as $value): ?>
    <tr>
        <td><?= $value['id'] ?></td>
        <td><?= $value['order_date'] ?></td>
        <td><?= $value['fullname'] ?></td>
        <td><?= $value['address'] ?></td>
        <td><?= $value['email'] ?></td>
        <td><?= $value['phone'] ?></td>
        <td><a href="<?= URL ?>index.php/backend/restoreOrd/<?= $value['id'] ?>"><img style="width: 20px; height: 20px" class="icon" src="<?= URL ?>asset/backend/assets/images/backend_img/restore-icon.png"></a></td>
        <td><a href="<?= URL ?>index.php/backend/delOrd/<?= $value['id'] ?>"><img style="width: 20px; height: 20px" class="icon" src="<?= URL ?>asset/backend/assets/images/backend_img/del_icon_big.png"></a></td>
    </tr>
    <?php endforeach; ?>
</table>


