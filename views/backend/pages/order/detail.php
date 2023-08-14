<div class="row row-large ">
	<div class="large-9 col">
		<div class="row large-columns-1 medium-columns- small-columns-1">
            <div class="col post-item">
                <table class="table">
                    <tr>
                        <th>Order_id</th>
                        <th>Product_id</th>
                        <th>Qty</th>
                        <th>Product_name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Sale</th>
                    </tr>
                    <?php foreach($data['detail'] as $value): ?>
                    <tr>
                        <td><?= $value['order_id'] ?></td>
                        <td><?= $value['product_id'] ?></td>
                        <td><?= $value['qty'] ?></td>
                        <td><?= $value['product_name'] ?></td>
                        <td><img src="<?= URL?>asset/frontend/images/<?= $value['image']?>"></td>
                        <td><?= $value['price'] ?></td>
                        <td><?= $value['sale'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <a href="<?= URL ?>index.php/backend/orderList/<?= $_SESSION['page']?>"><button type="button" class="btn btn-primary">Quay lai</button></a>
            </div>
        </div>
    </div>
</div>