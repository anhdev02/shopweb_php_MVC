<?php
    $p = $data['product'];
    // print_r($p);
?>
<form action="<?= URL ?>index.php/backend/doPrdEdit/<?= $p['id'] ?>" method="post" class="form-horizontal" enctype = "multipart/form-data">
  <div class="form-group">
    <label class = "col-sm-2 control-label">Product_name</label>
        <div class="col-sm-10">
            <input name="prd_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter category name" value = "<?= $p['product_name'] ?>">
        </div>
  </div>
  <div class="form-group">
    <label class = "col-sm-2 control-label">Price</label>
        <div class="col-sm-10">
            <input name="price" type="text" class="form-control" id="exampleInputEmail1" value = "<?= $p['price'] ?>">
        </div>
  </div>
  <div class="form-group">
    <label class = "col-sm-2 control-label">Detail</label>
        <div class="col-sm-8">
            <textarea name="detail" id="editor" cols="30" rows="10"><?= $p['product_detail'] ?></textarea>
        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
        </div>
  </div>
  <div class="form-group">
      <div class="col-sm-10">
          <label class = "col-sm-2 control-label">Category</label>
          <select class = "form-control" name="category" >
              <?php
                    foreach($data['category'] as $value){
                        if($p['product_category'] == $value['id']){

                            echo "<option selected value='".$value['id']."'>".$value['category_name']."</option>";
                        }else{
                            echo "<option value='".$value['id']."'>".$value['category_name']."</option>";

                        }
                    }
              ?>
          </select>
      </div>
  </div>
  <div class="form-group">
    <label class = "col-sm-2 control-label">Image</label>
    <div class="col-sm-2">
        <img src="<?= URL ?>asset/images/<?= $p['image'] ?>" alt="">
    </div>
        <div class="col-sm-8">
            <input name="image" type="file" class="form-control" id="exampleInputEmail1" value = "<?= $p['image'] ?>">
        </div>
  </div>
  <div class="form-group">
      <div class="col-sm-10">
          <label class = "col-sm-2 control-label">Status</label>
          <select class = "form-control" name="status">
              <?php
                if($p['status']==1){
                    echo "<option selected value='1'>Xuat ban</option>
                        <option value='0'>An</option>";
                }else{
                    echo "<option value='1'>Xuat ban</option>
                        <option selected value='0'>An</option>";
                }
              ?>
          </select>
      </div>
  </div>
</div>
  <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10"></div>
      <button type="submit" class="btn btn-primary">Edit</button>
  </div>
</div>
</form>