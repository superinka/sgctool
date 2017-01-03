<?php //pre($list_room_manager);?>
<?php foreach ($list_room_manager as $key => $value) { ?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2 style="overflow: initial!important"><?php echo $value['department_name'];  ?> 
          <small>
          <?php if(array_key_exists('project',$value)==false) { ?>
            <strong>Không có dữ liệu</strong>
          <?php }?>
          </small>
        </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      <?php if(array_key_exists('project',$value)==true) { ?>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Desciption</th>
              <th>Nhân viên</th>
              <th>Dự án</th>
              <th>Nhiệm vụ</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($value['project'] as $k => $v) { ?>
            <?php if(array_key_exists('list_miss',$v)==true) { ?>
              <?php foreach ($v->list_miss as $a => $b) { ?>
                <?php if(array_key_exists('task',$b)==true) { ?>
                <?php foreach ($b->task as $c => $d) { ?>
                  <tr>
                    <th scope="row"></th>
                    <td><?php echo $d->name ?></td>
                    <td><?php echo $b->mission_for ?></td>
                    <td><?php echo $v->project_name ?></td>
                    <td><?php echo $d->name?></td>
                  </tr>
                <?php } ?>
                <?php } ?>
              <?php }?>
            <?php }?>
          <?php } ?>
          </tbody>
        </table>
      <?php } ?>

      </div>
    </div>
  </div>

  <div class="clearfix"></div>
</div>
<?php } ?>