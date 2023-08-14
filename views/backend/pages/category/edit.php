<?php $r=array();  $r = $data['edit'];   ?>


<form action="<?= URL ?>index.php/backend/doEditCat/<?= $r['id'] ?>" method="post" class="form-horizontal">
  <div class="form-group">
    <label class = "col-sm-2 control-label">Category_name</label>
        <div class="col-sm-10">
            <input name="cat_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter category name" value = "<?= $r['category_name'] ?>">
        </div>
  </div>
  <div class="form-group">
      <div class="col-sm-10">
          <label class = "col-sm-2 control-label">Parent</label>
          <select class = "form-control" name="parent" >
              <?php
                    foreach($data['category'] as $value){
                        if($r['parent']==$value['id']){
                            echo "<option selected value='".$value['id']."'>".$value['category_name']."</option>";
                        }else{
                            echo "<option value='".$value['id']."'>".$value['category_name']."</option>";

                        }
                    }
              ?>
              <option value="0">0</option>
          </select>
      </div>
  </div>
  <div class="form-group">
      <div class="col-sm-10">
          <label class = "col-sm-2 control-label">Status</label>
          <select class = "form-control" name="status">
              <?php
                    if($r['status']==1){
                        echo "<option selected>1</option>";
                        echo "<option>0</option>";
                    }else{
                        echo "<option>1</option>";
                        echo "<option selected>0</option>";
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