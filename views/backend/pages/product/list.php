<p>
    <a href="<?= URL ?>index.php/backend/prdAdd"><button type="button" class="btn btn-primary">Add</button></a>
    <a href="<?= URL ?>index.php/backend/trashPrdList"><button type="button" class="btn btn-primary">Trash(<?= $data['trash']?>)</button></a>
</p>
<table class="table">
    <tr class ="col-sm-15">
        <th>Product_name</th>
        <th>Price</th>
        <!-- <th>Product_detail</th> -->
        <th>Image</th>
        <th>Created_at</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach($data['products'] as $value): ?>
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
        <!-- <td><?= $value['product_detail'] ?></td> -->
        <td><img src="<?= URL?>asset/frontend/images/<?= $value['image']?>"></td>
        <td><?= $value['created_at'] ?></td>
        <td>
            <?php if($value['status']==1){ ?>
                <a href="<?= URL ?>index.php/backend/statusPrd/<?= $value['id'] ?>/0"><img style="width: 20px; height: 20px" class="icon" src= "<?= URL ?>asset/backend/assets/images/backend_img/check_icon_big.png"></a>
            <?php }else{ ?>
                <a href="<?= URL ?>index.php/backend/statusPrd/<?= $value['id'] ?>/1"><img style="width: 20px; height: 20px" class="icon" src= "<?= URL ?>asset/backend/assets/images/backend_img/forbidden_icon_big.png"></a>
            <?php } ?>
        </td>
        <td><a href="<?= URL ?>index.php/backend/editPrd/<?= $value['id'] ?>"><img style="width: 20px; height: 20px" class="icon" src="<?= URL ?>asset/backend/assets/images/backend_img/modify.png"></a></td>
        <td><a href="<?= URL ?>index.php/backend/delTempPrd/<?= $value['id'] ?>"><img style="width: 20px; height: 20px" class="icon" src="<?= URL ?>asset/backend/assets/images/backend_img/del_icon_big.png"></a></td>
    </tr>
    <?php endforeach; ?>
</table>
<div><div class = "canchinh"><?= $data['paginator'] ?></div></div>


