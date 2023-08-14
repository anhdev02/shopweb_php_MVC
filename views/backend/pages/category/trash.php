<table class="table">
    <tr>
        <th>Category_id</th>
        <th>Category_name</th>
        <th>Parent</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    
    <?php if(isset($data['trash'])){ foreach($data['trash'] as $value): ?>
    <tr>
        <td><?= $value['id'] ?></td>
        <td><?= $value['category_name'] ?></td>
        <td>
            <?php
                if($value['parent']==0){
                    echo $value['parent'];
                }
                else{
                    foreach($data['trash'] as $p){
                        if($value['parent']==$p['id']){
                            echo $value['category_name'];
                        }
                    }
                }

            ?>
        </td>
       
        <td><a href="<?= URL ?>index.php/backend/restoreCat/<?= $value['id'] ?>"><img style="width: 20px; height: 20px" class="icon" src="<?= URL ?>asset/backend/assets/images/backend_img/restore-icon.png"></a></td>
        <td><a onclick="return confirm('Bạn có chắc chắn xóa không ?')" href="<?= URL ?>index.php/backend/delCat/<?= $value['id'] ?>"><img style="width: 20px; height: 20px" class="icon" src="<?= URL ?>asset/backend/assets/images/backend_img/del_icon_big.png"></a></td>
    </tr>
    <?php endforeach; }else{ echo "<tr><center><h2>Hiện tại danh sách trống</h2></center></tr>"; } ?> 
</table>
<div><div class = "canchinh"><?= $data['paginator'] ?></div></div>

