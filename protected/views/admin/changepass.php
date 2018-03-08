<form class="form-horizontal" role="form" style="width: 50%; margin: 10px auto;" method="post" action="<?php echo Yii::app()->getBaseUrl(true);?>/admin/changepass">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Mật khẩu cũ</label>
    <div class="col-sm-10">
      <input name="password" class="form-control" placeholder="Mật khẩu cũ" type="password"/>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Mật khẩu mới</label>
    <div class="col-sm-10">
      <input name="new_password" class="form-control" placeholder="Mật khẩu mới" type="password"/>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Gõ lại mật khẩu</label>
    <div class="col-sm-10">
      <input name="re_new_password" class="form-control" placeholder="Gõ lại mật khẩu" type="password"/>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>