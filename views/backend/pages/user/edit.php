<?php
    $p = $data['edit'];
?>
<form action="<?= URL ?>index.php/backend/doUserEdit/<?= $p['id'] ?>" method="post" class="form-horizontal">
  <div class="form-group">
    <label class = "col-sm-2 control-label">Role</label>
        <div class="col-sm-10">
            <input value = "<?= $p['role'] ?>" name="role" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter user role">
        </div>
  </div>
  <div class="form-group">
    <label class = "col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input value = "<?= $p['email'] ?>" name="email" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter user email">
        </div>
  </div>
  <div class="form-group">
    <label class = "col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input value = "<?= $p['password'] ?>" name="password" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter user password">
        </div>
  </div>
  <div class="form-group">
    <label class = "col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
            <input value = "<?= $p['name'] ?>" name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter user name">
        </div>
</div>
  <div class="form-group">
    <label class = "col-sm-2 control-label">Phone</label>
        <div class="col-sm-10">
            <input value = "<?= $p['phone'] ?>" name="phone" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter user phone">
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