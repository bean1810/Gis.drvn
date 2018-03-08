<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <link href="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/css/bootstrap.min.css" type="text/css"
        rel="stylesheet"/>
  <link href="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/css/bootstrap-select.min.css" type="text/css"
        rel="stylesheet"/>
  <link href="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/css/jquery.datetimepicker.css" type="text/css"
        rel="stylesheet"/>
  <link href="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/css/boot-grid.css" type="text/css"
        rel="stylesheet"/>
  <link href="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/css/uploadfile.css" type="text/css" rel="stylesheet"/>
  <link href="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/css/style.css" type="text/css" rel="stylesheet"/>
  <script type="text/javascript"
          src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/jquery-2.0.3.min.js"></script>
  <script type="text/javascript"
          src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/boot-grid.js"></script>
  
  <script type="text/javascript"
          src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/jquery.tablesorter.js"></script>
  <script type="text/javascript"
          src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/jquery.tablesorter.pager.js"></script>
  <script type="text/javascript"
          src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/bootstrap.min.js"></script>
  <script type="text/javascript"
          src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/bootstrap-select.min.js"></script>
  <script type="text/javascript"
          src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/jquery.datetimepicker.js"></script>
  <script type="text/javascript"
          src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/jquery.uploadfile.min.js"></script>
  <script type="text/javascript"
          src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/notification.js"></script>

  <script src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/ckeditor/ckeditor.js"></script>
  <title>Admin sites</title>
</head>
<body style="padding-top: 70px;">
<div id="wrapper">
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php Yii::app()->getBaseUrl(true); ?>/admin">Dashboard</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding-left: 20px; padding-right: 20px;">
      <ul class="nav navbar-nav">
        <?php
        if(isset(Yii::app()->session['auth_user'])) {
          //$menu = Auth::getMenu(Yii::app()->session['auth_user']));
        	$menu = Auth::getAllMenu();
	        foreach ($menu as $cat => $act) {
	          ?>
	          <li class="dropdown">
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $cat;?><b class="caret"></b></a>
	            <ul class="dropdown-menu">
	              <?php
	              foreach ($act as $key => $value) {
	                ?>
	                <li><a
	                    href="<?php echo Yii::app()->getBaseUrl(true) . "/" . $value['controller'] . "/" . $value['action'];?>"><?php echo $key;?></a>
	                </li>
	              <?php
	              }
	              ?>
	            </ul>
	          </li>
	        <?php
	        }
        }
        ?>
      </ul>
      <?php if(isset(Yii::app()->session['auth_user'])){?>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tài khoản <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo Yii::app()->getBaseUrl(true) . "/admin/changepass"?>">Đổi mật khẩu</a></li>
              <li><a href="<?php echo Yii::app()->getBaseUrl(true) . "/home/logout"?>">Đăng xuất</a></li>
            </ul>
          </li>
        </ul>
      <?php } ?>
    </div>
  </nav>
</div>
<div style="padding: 20px;">
	<?php echo $content; ?>
</div>

<?php if(isset(Yii::app()->session['error'])){?>
  <div id="NotificationJS" class="notification">
    <?php echo Yii::app()->session['error']; ?>
    <span class="close">x</span>
  </div>
  <?php Yii::app()->session['error'] = null;
} else{?>
  <div id="NotificationJS" class="notification" style="display: none;">

  </div>
<?php }?>
</body>
<script>
  CKEDITOR.config.extraPlugins = 'youtube';
  CKEDITOR.config.toolbar = [
		{ name: 'document', items : [ 'Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] },
		{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
		{ name: 'forms', items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 
	        'HiddenField' ] },
		'/',
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
		{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
		'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
		{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'insert', items : ['Youtube', 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
		'/',
		{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
		{ name: 'colors', items : [ 'TextColor','BGColor' ] },
		{ name: 'tools', items : [ 'Maximize', 'ShowBlocks','-','About' ] }
	];
  CKEDITOR.config.youtube_width = '500';
  CKEDITOR.config.youtube_height = '400';
  CKEDITOR.config.youtube_related = true;
  CKEDITOR.config.youtube_older = false;
  CKEDITOR.config.youtube_privacy = false;
</script>
</html>