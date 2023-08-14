<form action="<?= URL ?>index.php/backend/doNewAdd" method="post" class="form-horizontal">
  <div class="form-group">
    <label class = "col-sm-2 control-label">Title</label>
        <div class="col-sm-10">
            <input name="title" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter new title">
        </div>
  </div>
  <div class="form-group">
    <label class = "col-sm-2 control-label">Short_description</label>
        <div class="col-sm-10">
            <input name="short_description" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter new short_description">
        </div>
  </div>
  <div class="form-group">
    <label class = "col-sm-2 control-label">Content</label>
        <div class="col-sm-10">
            <input name="content" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter new content">
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