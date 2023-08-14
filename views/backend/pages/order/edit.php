<?php
    $p = $data['edit'];
?>
<form action="<?= URL ?>index.php/backend/doOrdEdit/<?= $p['id'] ?>" method="post" class="form-horizontal">
  <div class="form-group">
    <label class = "col-sm-2 control-label">Id</label>
        <div class="col-sm-10">
            <input value = "<?= $p['id'] ?>" name="ord_id" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter order id">
        </div>
  </div>
  <div class="form-group">
    <label class = "col-sm-2 control-label">Customer</label>
        <div class="col-sm-10">
            <input value = "<?= $p['fullname'] ?>" name="ord_cus" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter order customer">
        </div>
  </div>
  <div class="form-group">
    <label class = "col-sm-2 control-label">Address</label>
        <div class="col-sm-10">
            <input value = "<?= $p['address'] ?>" name="ord_addr" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter order address">
        </div>
  </div>
  <div class="form-group">
    <label class = "col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input value = "<?= $p['email'] ?>" name="ord_email" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter order email">
        </div>
  </div>
  <div class="form-group">
    <label class = "col-sm-2 control-label">Phone</label>
        <div class="col-sm-10">
            <input value = "<?= $p['phone'] ?>" name="ord_phone" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter order phone">
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