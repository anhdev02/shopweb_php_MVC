<p>
    <a href="<?= URL ?>index.php/backend/newAdd"><button type="button" class="btn btn-primary">Add</button></a>
    <a href="<?= URL ?>index.php/backend/trashNewList"><button type="button" class="btn btn-primary">Trash(<?= $data['trash']?>)</button></a>
</p>
<table class="table">
    <tr>
        <th>Title</th>
        <th>Short_description</th>
        <th>Content</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach($data['news'] as $value): ?>
    <tr>
        <td><?= $value['title'] ?></td>
        <td><?= $value['short_description'] ?></td>
        <td><?= $value['content'] ?></td>
        <td>
            <?php if($value['status']==1){ ?>
                <a href="<?= URL ?>index.php/backend/statusNew/<?= $value['id'] ?>/0"><img style="width: 20px; height: 20px" class="icon" src= "<?= URL ?>asset/backend/assets/images/backend_img/check_icon_big.png"></a>
            <?php }else{ ?>
                <a href="<?= URL ?>index.php/backend/statusNew/<?= $value['id'] ?>/1"><img style="width: 20px; height: 20px" class="icon" src= "<?= URL ?>asset/backend/assets/images/backend_img/forbidden_icon_big.png"></a>
            <?php } ?>
        </td>
        <td><a href="<?= URL ?>index.php/backend/editNew/<?= $value['id'] ?>"><img style="width: 20px; height: 20px" class="icon" src="<?= URL ?>asset/backend/assets/images/backend_img/modify.png"></a></td>
        <td><a href="<?= URL ?>index.php/backend/delTempNew/<?= $value['id'] ?>"><img style="width: 20px; height: 20px" class="icon" src="<?= URL ?>asset/backend/assets/images/backend_img/del_icon_big.png"></a></td>
    </tr>
    <?php endforeach; ?>
</table>
<div><div class = "canchinh"><?= $data['paginator'] ?></div></div>


