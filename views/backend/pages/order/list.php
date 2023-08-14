
<table class="table">
    <tr>
        <th>Id</th>
        <th>Order_date</th>
        <th>Customer</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Detail</th>
    </tr>
    <?php foreach($data['orders'] as $value): ?>
    <tr>
        <td><?= $value['id'] ?></td>
        <td><?= $value['order_date'] ?></td>
        <td><?= $value['fullname'] ?></td>
        <td><?= $value['address'] ?></td>
        <td><?= $value['phone'] ?></td>
        <td><a href="<?= URL ?>index.php/backend/detail/<?= $value['id'] ?>"><img style="width: 20px; height: 20px" class="icon" src="<?= URL ?>asset/backend/assets/images/backend_img/detail.png"></a></td>
    </tr>
    <?php endforeach; ?>
</table>
<div><div class = "canchinh"><?= $data['paginator'] ?></div></div>


