<form action="<?= URL ?>index.php/backend/doOrdAdd" method="post" class="form-horizontal">
  <div class="form-group">
    <label class = "col-sm-2 control-label">Id</label>
        <div class="col-sm-10">
            <input name="ord_id" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter order id">
        </div>
  </div>
  <div class="form-group">
    <label class = "col-sm-2 control-label">Customer</label>
        <div class="col-sm-10">
            <input name="ord_cus" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter order customer">
        </div>
  </div>
  <div class="form-group">
    <label class = "col-sm-2 control-label">Address</label>
        <div class="col-sm-10">
            <input name="ord_addr" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter order address">
        </div>
  </div>
  <div class="form-group">
    <label class = "col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input name="ord_email" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter order email">
        </div>
  </div>
  <div class="form-group">
    <label class = "col-sm-2 control-label">Phone</label>
        <div class="col-sm-10">
            <input name="ord_phone" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter order phone">
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
</form>