<form action="<?= URL ?>index.php/backend/doCatAdd" method="post" class="form-horizontal">
  <div class="form-group">
    <label class = "col-sm-2 control-label">Category_name</label>
        <div class="col-sm-10">
            <input name="cat_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter category name">
        </div>
  </div>
  <div class="form-group">
      <div class="col-sm-10">
          <label class = "col-sm-2 control-label">Parent</label>
          <select class = "form-control" name="parent" >
              <?php
                    foreach($data['category'] as $value){
                        echo "<option value='".$value['id']."'>".$value['category_name']."</option>";
                    }
              ?>
          </select>
      </div>
  </div>
  <div class="form-group">
      <div class="col-sm-10">
          <label class = "col-sm-2 control-label">Status</label>
          <select class = "form-control" name="status">
              <option value="1">1</option>
              <option value="0">0</option>
          </select>
      </div>
  </div>
</div>
  <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10"></div>
      <button type="submit" class="btn btn-primary">Add</button>
  </div>
</div>
</form>