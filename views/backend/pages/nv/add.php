
<form action="http://thietkeweb/doan/index.php/backend/doNvAdd" method="post" class="form-horizontal">
  <div class="form-group">
    <label class = "col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input  name="email" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter user email">
        </div>
  </div>
  <div class="form-group">
    <label class = "col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input " name="password" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter user password">
        </div>
  </div>
  <div class="form-group">
    <label class = "col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter user name">
        </div>
</div>
  <div class="form-group">
    <label class = "col-sm-2 control-label">Phone</label>
        <div class="col-sm-10">
            <input  name="phone" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter user phone">
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