<table class="table">
    <tr>
        <th>Product_name</th>
        <th>Price</th>
        <th>Product_detail</th>
        <th>Image</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php if(isset($data['trash'])){  foreach($data['trash'] as $value): ?>
    <tr>
        <td><?= $value['product_name'] ?></td>
        <td>
            <?=
               $value['price']

                // if($value['parent']==0){
                //     echo $value['parent'];
                // }
                // else{
                //     foreach($data['allCat'] as $p){
                //         if($value['parent']==$p['id']){
                //             echo $value['category_name'];
                //         }
                //     }
                // }

            ?>
        </td>
        <td><?= $value['product_detail'] ?></td>
        <td><img src="<?= URL?>asset/frontend/images/<?= $value['image']?>"</td>
        <td><a href="<?= URL ?>index.php/backend/restorePrd/<?= $value['id'] ?>"><img style="width: 20px; height: 20px" class="icon" src="<?= URL ?>asset/backend/assets/images/backend_img/restore-icon.png"></a></td>
        <td><a onclick="return confirm('Bạn có chắc chắn xóa không ?')" href="<?= URL ?>index.php/backend/delPrd/<?= $value['id'] ?>"><img style="width: 20px; height: 20px" class="icon" src="<?= URL ?>asset/backend/assets/images/backend_img/del_icon_big.png"></a></td>
    </tr>
    <?php endforeach; }else{ echo "<tr><center><h2>Hiện tại danh sách trống</h2></center></tr>"; }  ?>
</table>
<div><div class = "canchinh"><?= $data['paginator'] ?></div></div>


