<p>
    <a href="<?= URL ?>index.php/backend/catAdd"><button type="button" class="btn btn-primary">Add</button></a>
    <a href="<?= URL ?>index.php/backend/trashCatList"><button type="button" class="btn btn-primary">Trash(<?= $data['trash'] ?>)</button></a>
</p>
<table class="table">
    <tr>
        <th>Category_id</th>
        <th>Category_name</th>
        <th>Parent</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach($data['category'] as $value): ?>
    <tr>
        <td><?= $value['id'] ?></td>
        <td><?= $value['category_name'] ?></td>
        <td>
            <?php
                if($value['parent']==0){
                    echo $value['parent'];
                }
                else{
                    foreach($data['allCat'] as $p){
                        if($value['parent']==$p['id']){
                            echo $p['category_name'];
                        }
                    }
                }

            ?>
        </td>
        <td>
            <?php if($value['status']==1){ ?>
                <a href="<?= URL ?>index.php/backend/statusCat/<?= $value['id'] ?>/0"><img style="width: 20px; height: 20px" class="icon" src= "<?= URL ?>asset/backend/assets/images/backend_img/check_icon_big.png"></a>
            <?php }else{ ?>
                <a href="<?= URL ?>index.php/backend/statusCat/<?= $value['id'] ?>/1"><img style="width: 20px; height: 20px" class="icon" src= "<?= URL ?>asset/backend/assets/images/backend_img/forbidden_icon_big.png"></a>
            <?php } ?>
        </td>
        <td><a href="<?= URL ?>index.php/backend/editCat/<?= $value['id'] ?>"><img style="width: 20px; height: 20px" class="icon" src="<?= URL ?>asset/backend/assets/images/backend_img/modify.png"></a></td>
        <td><a href="<?= URL ?>index.php/backend/delTempCat/<?= $value['id'] ?>"><img style="width: 20px; height: 20px" class="icon" src="<?= URL ?>asset/backend/assets/images/backend_img/del_icon_big.png"></a></td>
    </tr>
    <?php endforeach; ?>
</table>
<div><div class = "canchinh"><?= $data['paginator'] ?></div></div>


