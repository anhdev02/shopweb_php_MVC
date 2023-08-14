<table class="table">
    <tr>
        <th>Title</th>
        <th>Content</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php if(isset($data['trash'])){  foreach($data['trash'] as $value): ?>
    <tr>
        <td><?= $value['title'] ?></td>
        <td><?= $value['content'] ?></td>
        <td><a href="<?= URL ?>index.php/backend/restoreNew/<?= $value['id'] ?>"><img style="width: 20px; height: 20px" class="icon" src="<?= URL ?>asset/backend/assets/images/backend_img/restore-icon.png"></a></td>
        <td><a onclick="return confirm('Bạn có chắc chắn xóa không ?')" href="<?= URL ?>index.php/backend/delNew/<?= $value['id'] ?>"><img style="width: 20px; height: 20px" class="icon" src="<?= URL ?>asset/backend/assets/images/backend_img/del_icon_big.png"></a></td>
    </tr>
    <?php endforeach; }else{ echo "<tr><center><h2>Hiện tại danh sách trống</h2></center></tr>"; } ?>
</table>
<div><div class = "canchinh"><?= $data['paginator'] ?></div></div>


