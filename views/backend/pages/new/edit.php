<?php
    $p = $data['edit'];
?>
<form action="<?= URL ?>index.php/backend/doNewEdit/<?= $p['id'] ?>" method="post" class="form-horizontal">
  <div class="form-group">
    <label class = "col-sm-2 control-label">Title</label>
        <div class="col-sm-10">
            <input value = "<?= $p['title'] ?>" name="title" type="text" class="form-control" id="exampleInputEmail1">
        </div>
  </div>
  <div class="form-group">
    <label class = "col-sm-2 control-label">Short_description</label>
        <div class="col-sm-10">
            <input value = "<?= $p['short_description'] ?>" name="short_description" type="text" class="form-control" id="exampleInputEmail1">
        </div>
  </div>
  <div class="form-group">
    <label class = "col-sm-2 control-label">Content</label>
        <div class="col-sm-10">
            <input value = "<?= $p['content'] ?>" name="content" type="text" class="form-control" id="exampleInputEmail1">
        </div>
  </div>
  <div class="form-group">
      <div class="col-sm-10">
          <label class = "col-sm-2 control-label">Status</label>
          <select class = "form-control" name="status">
          <?php
                    if($p['status']==1){
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
</form>