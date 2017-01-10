<div class="row">
<div class="col-md-12 col-sm-12">
<?php //pre($list_room_manager);?>
<!-- <div class="row">
<?php //pre($list_room_manager);?>
<?php if ($message){$this->load->view('layout/message',$this->data_layout); }?>
<h3>Báo cáo cần duyệt hôm nay</h3>
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
      <?php if(array_key_exists('list_miss',$value)==true) { ?>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Desciption</th>
              <th>Nhân viên</th>
              <th>Dự án</th>
              <th>Nhiệm vụ</th>
              <th>Thời gian tạo</th>
              <th>Số giờ làm</th>
              <th>Tình trạng</th>
              <th>Duyệt bởi</th>
              <th>Tình trạng duyệt</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($value['list_miss'] as $k => $v) { ?>
            <?php if(array_key_exists('task',$v)==true) { ?>
              <?php foreach ($v->task as $a => $b) { ?>
                <?php if(array_key_exists('list_report',$b)==true) { ?>
                <?php foreach ($b->list_report as $c => $d) { ?>

                	  
                	  <?php 
                	    $create_time = strtotime($d->create_time);
          						$newformat_create_time = date('Y-m-d H:i:s',$create_time);
          						$pm = ($this->my_report_model->get_fullname_employee($d->review_by));
                      $pj = $this->project_model->get_info($v->project_id);
                      $project_name = $pj->project_name;
          					  ?>
	                  <tr>
	                    <th scope="row"></th>
	                    <td><?php echo $d->description ?></td>
	                    <td><?php echo $v->mission_for ?></td>
	                    <td><?php echo $project_name ?></td>
	                    <td><?php echo $b->name?></td>
	                    <td><?php echo $newformat_create_time ?></td>
	                    <td><?php echo $d->time_spend ?></td>
	                    <td><?php echo check_progress_report($d->progress)?></td>
	                    <td><?php echo $pm[0]->fullname ?></td>
	                    <td><?php echo check_status_report($d->review_status); ?></td>
	                    <td>
	                    	<?php if($d->review_status==0) { ?>
	                    	<a href="<?php echo base_url('my_report/check/'.$d->id) ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Duyệt </a>
	                    	<?php }?>
	                    	<?php if($d->review_status==1) { ?>
	                    	<a onclick="return confirm('Are you sure you want to uncheck this report?');" href="<?php echo base_url('my_report/uncheck/'.$d->id) ?>" class="btn btn-danger btn-xs"><i class="fa fa-close"></i> Bỏ </a>
	                    	<?php }?>
	                    </td>
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
<div class="ln_solid"></div>
</div> -->

<!-- <div class="row">
<h3>Báo cáo đã duyệt hôm nay</h3>
<?php if ($list_report_checked_today==null) {?>
<strong>Không có dữ liệu</strong>
<?php }?>
<?php if ($list_report_checked_today!=null) {?>
<?php foreach ($list_report_checked_today as $key => $value) { ?>
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
      <?php if(array_key_exists('list_miss',$value)==true) { ?>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Desciption</th>
              <th>Nhân viên</th>
              <th>Dự án</th>
              <th>Nhiệm vụ</th>
              <th>Thời gian tạo</th>
              <th>Số giờ làm</th>
              <th>Tình trạng</th>
              <th>Duyệt bởi</th>
              <th>Tình trạng duyệt</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($value['list_miss'] as $k => $v) { ?>
            <?php if(array_key_exists('task',$v)==true) { ?>
              <?php foreach ($v->task as $a => $b) { ?>
                <?php if(array_key_exists('list_report',$b)==true) { ?>
                <?php foreach ($b->list_report as $c => $d) { ?>

                    
                    <?php 
                      $create_time = strtotime($d->create_time);
                      $newformat_create_time = date('Y-m-d H:i:s',$create_time);
                      $pm = ($this->my_report_model->get_fullname_employee($d->review_by));
                      $pj = $this->project_model->get_info($v->project_id);
                      $project_name = $pj->project_name;
                      ?>
                    <tr>
                      <th scope="row"></th>
                      <td><?php echo $d->description ?></td>
                      <td><?php echo $v->mission_for ?></td>
                      <td><?php echo $project_name ?></td>
                      <td><?php echo $b->name?></td>
                      <td><?php echo $newformat_create_time ?></td>
                      <td><?php echo $d->time_spend ?></td>
                      <td><?php echo check_progress_report($d->progress)?></td>
                      <td><?php echo $pm[0]->fullname ?></td>
                      <td><?php echo check_status_report($d->review_status); ?></td>
                      <td>
                        <?php if($d->review_status==0) { ?>
                        <a href="<?php echo base_url('my_report/check/'.$d->id) ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Duyệt </a>
                        <?php }?>
                        <?php if($d->review_status==1) { ?>
                        <a onclick="return confirm('Are you sure you want to uncheck this report?');" href="<?php echo base_url('my_report/uncheck/'.$d->id) ?>" class="btn btn-danger btn-xs"><i class="fa fa-close"></i> Bỏ </a>
                        <?php }?>
                      </td>
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
<?php } ?>
</div> -->


<div class="row">
<h3>Báo cáo cần duyệt <span class="badge badge-success"><?php echo $count_uncheck; ?></span></h3>
<?php if ($list_room_manager==null) {?>
<strong>Không có dữ liệu</strong>
<?php }?>
<?php if ($list_room_manager!=null) {?>
<?php foreach ($list_room_manager as $key => $value) { ?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2 style="overflow: initial!important"><?php echo $value['department_name'];  ?> 
          <small>
          <?php if(array_key_exists('project',$value)==false) { ?>
            <strong></strong>
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
      <?php if(array_key_exists('list_miss',$value)==true) { ?>
        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
          <thead>
            <tr>
              <th>#</th>
              <th>Desciption</th>
              <th>Nhân viên</th>
              <th>Dự án</th>
              <th>Nhiệm vụ</th>
              <th>Thời gian tạo</th>
              <th>Số giờ làm</th>
              <th>Tình trạng</th>
              <th>Duyệt bởi</th>
              <th>Tình trạng duyệt</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($value['list_miss'] as $k => $v) { ?>
            <?php if(array_key_exists('task',$v)==true) { ?>
              <?php foreach ($v->task as $a => $b) { ?>
                <?php if(array_key_exists('list_report_all',$b)==true) { ?>
                <?php foreach ($b->list_report_all as $c => $d) { ?>

                    
                    <?php 
                      $create_time = strtotime($d->create_time);
                      $newformat_create_time = date('Y-m-d H:i:s',$create_time);
                      $pm = ($this->my_report_model->get_fullname_employee($d->review_by));
                      $ac = $this->acc_model->get_info_rule($where = array('id'=>$d->create_by));
                      $ac = $ac->account_type;
                      $pj = $this->project_model->get_info($v->project_id);
                      $project_name = $pj->project_name;
                      $newformat_create_time2 = date('Y-m-d', $create_time);
                      if($newformat_create_time2 == $today){
                        $x = 'Hôm nay';
                      }
                      else {
                        $x = $newformat_create_time;
                      }
                      ?>
                    <tr>
                      <th scope="row"></th>
                      <td><?php echo $d->description ?></td>
                      <td><?php echo $v->mission_for ?></td>
                      <td><?php echo $project_name ?></td>
                      <td><?php echo $b->name?></td>
                      <td><?php echo $x ?></td>
                      <td><?php echo $d->time_spend ?></td>
                      <td><?php echo check_progress_report($d->progress)?></td>
                      <td>
                      <?php if($ac==4) { ?>
                        <?php echo $pm[0]->fullname ?>
                      <?php }?>
                      </td>
                      <td><?php echo check_status_report($d->review_status); ?></td>
                      <td>
                      <?php if($ac==4) { ?>
                        <?php if($d->review_status==0) { ?>
                        <a href="<?php echo base_url('my_report/check/'.$d->id) ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Duyệt </a>
                        <?php }?>
                        <?php if($d->review_status==1) { ?>
                        <a onclick="return confirm('Are you sure you want to uncheck this report?');" href="<?php echo base_url('my_report/uncheck/'.$d->id) ?>" class="btn btn-danger btn-xs"><i class="fa fa-close"></i> Bỏ </a>
                        <?php }?>
                      <?php }?>
                      </td>
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
<?php } ?>
</div>

<div class="row">
<h3>Báo cáo đã duyệt  <span class="badge badge-success"><?php echo $count_checked; ?></span></h3>
<?php if ($list_report_checked_today==null) {?>
<strong>Không có dữ liệu</strong>
<?php }?>
<?php if ($list_report_checked_today!=null) {?>
<?php foreach ($list_report_checked_today as $key => $value) { ?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2 style="overflow: initial!important"><?php echo $value['department_name'];  ?> 
          <small>
          <?php if(array_key_exists('project',$value)==false) { ?>
            <strong></strong>
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
      <?php if(array_key_exists('list_miss',$value)==true) { ?>
         <table id="datatable-checkbox2" class="table table-striped table-bordered bulk_action">
          <thead>
            <tr>
              <th>#</th>
              <th>Desciption</th>
              <th>Nhân viên</th>
              <th>Dự án</th>
              <th>Nhiệm vụ</th>
              <th>Thời gian tạo</th>
              <th>Số giờ làm</th>
              <th>Tình trạng</th>
              <th>Duyệt bởi</th>
              <th>Tình trạng duyệt</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($value['list_miss'] as $k => $v) { ?>
            <?php if(array_key_exists('task',$v)==true) { ?>
              <?php foreach ($v->task as $a => $b) { ?>
                <?php if(array_key_exists('list_report_all',$b)==true) { ?>
                <?php foreach ($b->list_report_all as $c => $d) { ?>

                    
                    <?php 
                      $create_time = strtotime($d->create_time);
                      $newformat_create_time = date('Y-m-d H:i:s',$create_time);
                      $pm = ($this->my_report_model->get_fullname_employee($d->review_by));
                      $pj = $this->project_model->get_info($v->project_id);
                      $project_name = $pj->project_name;
                      $ac = $this->acc_model->get_info_rule($where = array('id'=>$d->create_by));
                      $ac = $ac->account_type;
                      ?>
                    <tr>
                      <th scope="row"></th>
                      <td><?php echo $d->description ?></td>
                      <td><?php echo $v->mission_for ?></td>
                      <td><?php echo $project_name ?></td>
                      <td><?php echo $b->name?></td>
                      <td><?php echo $newformat_create_time ?></td>
                      <td><?php echo $d->time_spend ?></td>
                      <td><?php echo check_progress_report($d->progress)?></td>
                      <td>
                      <?php if($ac==4) { ?>
                        <?php echo $pm[0]->fullname ?>
                      <?php }?>    
                      </td>
                      <td><?php echo check_status_report($d->review_status); ?></td>
                      <td>
                      <?php if($ac==4) { ?>
                        <?php if($d->review_status==0) { ?>
                        <a href="<?php echo base_url('my_report/check/'.$d->id) ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Duyệt </a>
                        <?php }?>
                        <?php if($d->review_status==1) { ?>
                        <a onclick="return confirm('Are you sure you want to uncheck this report?');" href="<?php echo base_url('my_report/uncheck/'.$d->id) ?>" class="btn btn-danger btn-xs"><i class="fa fa-close"></i> Bỏ </a>
                        <?php }?>
                        <?php }?>
                      </td>
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
<?php } ?>
</div>

</div>
</div>