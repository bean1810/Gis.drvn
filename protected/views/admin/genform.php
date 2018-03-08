<?php
if (isset($_GET['control']) && ($_GET['control'] == "new")) {
  ?>
  <div class="center-block text-right" style="width: 50%;"><a
      href="<?php echo Yii::app()->getBaseUrl(true) ?>/admin/genform/id/<?php echo $_GET['id'] ?>">
      <div class="btn btn-default">Back</div>
    </a></div>
  <form class="form-horizontal" role="form" style="width: 50%; margin: 10px auto;" method="post"
        action="<?php echo Yii::app()->getBaseUrl(true) ?>/admin/genform/id/<?php echo $_GET['id'] ?>/control/new">
    <?php
    foreach ($obj->label as $key => $value) {
      ?>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $value['name']; ?></label>

        <div class="col-sm-10">
          <?php
          if (strtoupper($value['type']) == "RELATION") {
            $relationTable = ucfirst($value['table']) . "Model";
            $objRelation = new $relationTable();
            $page = 0;
            $tmp = $objRelation->findAll();
            ?>
            <select class="form-control selectpicker" data-live-search="true" name="<?php echo $key; ?>">
              <?php
              foreach ($tmp as $i => $val) {
                ?>
                <option value="<?php echo $val['id']; ?>"><?php echo $val[$objRelation->label_select]; ?></option>
              <?php
              }
              ?>
            </select>
          <?php
          } else if (strtoupper($value['type']) == "STRING"){
          ?>
            <textarea id="editor<?php echo $key; ?>" class="form-control" name="<?php echo $key; ?>"
                      typeValue="<?php echo $value['type']; ?>" placeholder="<?php echo $value['name']; ?>"></textarea>
            <script>
              CKEDITOR.replace('editor' + '<?php echo $key;?>');
            </script>
          <?php
          }
          else{
          ?>
          <input class="form-control" name="<?php echo $key;?>" typeValue="<?php echo $value['type'];?>"
                 type="<?= isset($obj->hashCode[$key]) ? 'password' : 'text' ?>"
                 placeholder="<?php echo $value['name'];?>">
          <?php
          }
          ?>
        </div>
      </div>
    <?php
    }
    ?>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
<?php
} else if (isset($_GET['control']) && ($_GET['control'] == "edit")) {
  ?>
  <div class="center-block text-right" style="width: 50%;"><a
      href="<?php echo Yii::app()->getBaseUrl(true) ?>/admin/genform/id/<?php echo $_GET['id'] ?>">
      <div class="btn btn-default">Back</div>
    </a></div>
  <form class="form-horizontal" role="form" style="width: 50%; margin: 10px auto;" method="post"
        action="<?php echo Yii::app()->getBaseUrl(true) ?>/admin/genform/id/<?php echo $_GET['id'] ?>/control/edit/child/<?php echo $_GET['child']; ?>">
    <?php
    $data = $obj->find("id = " . $_GET['child']);
    foreach ($obj->label as $key => $value) {
      ?>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $value['name']; ?></label>

        <div class="col-sm-10">
          <?php
          if (strtoupper($value['type']) == "RELATION") {
            $relationTable = ucfirst($value['table']) . "Model";
            $objRelation = new $relationTable();
            $tmp = $objRelation->findAll();
            ?>
            <select class="form-control selectpicker" data-live-search="true" name="<?php echo $key; ?>">
              <?php
              foreach ($tmp as $i => $val) {
                ?>
                <option
                  value="<?php echo $val['id']; ?>" <?php if ($data[$key] == $val['id']) echo "selected"; ?>><?php echo $val[$objRelation->label_select]; ?></option>
              <?php
              }
              ?>
            </select>
          <?php
          } else if (strtoupper($value['type']) == "STRING"){
          ?>
            <textarea class="form-control" id="editor<?php echo $key; ?>" name="<?php echo $key; ?>"
                      typeValue="<?php echo $value['type']; ?>"
                      placeholder="<?php echo $value['name']; ?>"><?php echo $data[$key]; ?></textarea>
            <script>
              CKEDITOR.replace('editor' + '<?php echo $key;?>');
            </script>
          <?php
          }
          else{
          ?>
          <input class="form-control" name="<?php echo $key;?>" typeValue="<?php echo $value['type'];?>"
                 type="<?= isset($obj->hashCode[$key]) ? 'password' : 'text' ?>"
                 value="<?php echo $data[$key];?>" placeholder="<?php echo $value['name'];?>">
          <?php
          }
          ?>
        </div>
      </div>
    <?php
    }
    ?>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
<?php
} else if (isset($obj)) {
  ?>
  <a href="<?php echo Yii::app()->getBaseUrl(true) ?>/admin/genform/id/<?php echo $_GET['id'] ?>/control/new">
    <div class="btn btn-default">Add</div>
  </a>
  <table id="grid-basic" class="table table-condensed table-hover table-striped">
    <thead>
    <tr>
      <th data-column-id="id" data-type="numeric" data-order="desc">ID</th>
      <?php
      foreach ($obj->label as $key => $value) {
        if (isset($obj->hashCode[$key]) || (isset($obj->label[$key]['hide']) && $obj->label[$key]['hide'])) continue;
        ?>
        <th data-column-id="<?= $key ?>"><?php echo $value['name']; ?></th>
      <?php
      }
      ?>
      <th data-column-id="control_id" data-formatter="control">Control</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $list = $obj->findAll();
    foreach ($list as $key => $value) {
      ?>
      <tr>
        <td><?= $value->id ?></td>
        <?php
        foreach ($obj->label as $key => $val) {
          if (isset($obj->hashCode[$key]) || (isset($obj->label[$key]['hide']) && $obj->label[$key]['hide'])) continue;
          if (strtoupper($val['type']) == "RELATION") {
            $relationTable = ucfirst($val['table']) . "Model";
            $objRelation = new $relationTable();
            $tmp = $objRelation->find("id = " . $value[$key]);
            ?>
            <td
              style="word-wrap: break-word; max-width: 200px;"><?php echo Functions::m_htmlchars($tmp[$objRelation->label_select]); ?></td>
          <?php
          } else if (strtoupper($val['type']) == "STRING") {
            ?>
            <td style="word-wrap: break-word; max-width: 200px;">...</td>
          <?php
          } else {
            ?>
            <td
              style="word-wrap: break-word; max-width: 200px;"><?= Functions::m_htmlchars($value[$key]); ?></td>
          <?php
          }
        }
        ?>
        <td style="text-align: center; line-height: 40px;"><?= $value->id ?></td>
      </tr>
    <?php
    }
    ?>
    </tbody>
  </table>
<?php
} else {
  ?>
  <div class="thumbnail text-center center-block" style="width: 60%;">
    <?php
    foreach (ModelConfig::$config['database'] as $table => $value) {
      ?>
      <a href="<?php echo Yii::app()->getBaseUrl(true); ?>/admin/genform/id/<?php echo $table; ?>"
         class="btn btn-default"
         style="margin: 5px;"><?php echo ucfirst($table); ?> Model</a>
    <?php
    }
    ?>
  </div>
<?php
}
?>
<script>
  $(document).ready(function () {
    var input = $(".form-control");
    for (var i = 0; i < input.length; i++) {
      var type = "text";
      try {
        if ($(input[i]).attr('typeValue').toUpperCase() == "DATETIME") $(input[i]).datetimepicker({
          lang: 'en',
          timepicker: true,
          format: 'Y-m-d H:i:s'
        });
        if ($(input[i]).attr('typeValue').toUpperCase() == "DATE") $(input[i]).datetimepicker({
          lang: 'en',
          timepicker: false,
          format: 'Y-m-d'
        });
      }
      catch (e) {
        //
      }
    }
  });
  $(".selectpicker").selectpicker();

  $("#grid-basic").ready(function () {
    <?php
      if(isset($_GET['id'])){
        ?>
    var grid = $("#grid-basic").bootgrid({
      formatters: {
        "control": function (column, row) {
          return '<a href="<?php echo Yii::app()->getBaseUrl(true) ?>/admin/genform/id/<?= $_GET['id'] ?>/control/edit/child/' + row.id + '"><span class="btn btn-info">Edit</span></a><span> </span>'
            + '<a onclick="deleteLink(\'<?php echo Yii::app()->getBaseUrl(true) ?>/admin/genform/id/<?= $_GET['id'] ?>/control/delete/child/' + row.id + '\')"><span class="btn btn-warning">Delete</span></a>';
        }
      }
    });
    <?php
    }
    ?>
  });

  function deleteLink(url){
    if(confirm("Are you sure for delete it?")){
      window.location.href = url;
    }
  }
</script>