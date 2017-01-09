<?php //pre($list_mission_leader_today); ?>
<?php //pre($list_mission_leader_uncheck_today); ?>
<div class="row">
	<div class="col-md-12 col-sm-12">
		<div class="row">
		<h3>Báo cáo cần duyệt hôm nay</h3>
		<?php foreach ($list_mission_leader_today as $key => $value) { ?>
			<div class="row">
			  <div class="col-md-12 col-sm-12 col-xs-12">
			    <div class="x_panel">
			      <div class="x_title">
			        <h2 style="overflow: initial!important"><?php echo $value->name;  ?> 
			          <small>
			          <?php if(array_key_exists('list_task_today',$value)==false) { ?>
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
			      <?php if(array_key_exists('list_task_today',$value)==true) { ?>
			        <table class="table table-bordered">
			          <thead>
			            <tr>
			              <th>#</th>
			              <th>Desciption</th>
			              <th>Trưởng phòng</th>
			              <th>Dự án</th>
			              <th>Thời gian tạo</th>
			              <th>Số giờ làm</th>
			              <th>Tình trạng</th>
			              <th>Duyệt bởi</th>
			              <th>Tình trạng duyệt</th>
			              <th>Action</th>
			            </tr>
			          </thead>
			          <tbody>
			          <?php 
			          	$name = $this->my_report_model->get_fullname_employee($value->create_by);
			          ?>
			          <?php foreach ($value->list_task_today as $k => $v) { //pre($v)?>
			          	<?php if(array_key_exists('list_report_today',$v)==true) { ?>
				          	<?php foreach ($v->list_report_today as $m => $n) { //pre($v)?>
				          	<?php 
								$create_time = strtotime($n->create_time);
	          					$newformat_create_time = date('Y-m-d H:i:s',$create_time);
	          					$pm = ($this->my_report_model->get_fullname_employee($n->review_by));
				          	?>
					          <tr>
					          	<td></td>
					          	<td><?php echo $n->description ?></td>
					          	<td><strong style="color:blue"><?php echo $name[0]->fullname; ?></strong></td>
					          	<td><?php echo $value->project_name?></td>
					          	<td><?php echo $newformat_create_time ?></td>
					          	<td><?php echo $n->time_spend ?></td>
					          	<td><?php echo check_progress_report($n->progress)?></td>
					          	<td><?php echo $pm[0]->fullname ?></td>
			                    <td><?php echo check_status_report($n->review_status); ?></td>
			                    <td>
			                    	<?php if($n->review_status==0) { ?>
			                    	<a href="<?php echo base_url('my_report/check/'.$n->id) ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Duyệt </a>
			                    	<?php }?>
			                    	<?php if($n->review_status==1) { ?>
			                    	<a onclick="return confirm('Are you sure you want to uncheck this report?');" href="<?php echo base_url('my_report/uncheck/'.$n->id) ?>" class="btn btn-danger btn-xs"><i class="fa fa-close"></i> Bỏ </a>
			                    	<?php }?>
			                    </td>
					          </tr>
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
		<?php }?>
		</div>

		<div class="row">
		<h3>Báo cáo đã duyệt hôm nay</h3>
		<?php if($list_mission_leader_checked_today==null) {?>
		<strong>Không có dữ liệu</strong>
		<?php }?>
		<?php if($list_mission_leader_checked_today!=null) {?>
		<?php foreach ($list_mission_leader_checked_today as $key => $value) { ?>
			<div class="row">
			  <div class="col-md-12 col-sm-12 col-xs-12">
			    <div class="x_panel">
			      <div class="x_title">
			        <h2 style="overflow: initial!important"><?php echo $value->name;  ?> 
			          <small>
			          <?php if(array_key_exists('list_task_today',$value)==false) { ?>
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
			      <?php if(array_key_exists('list_task_checked_today',$value)==true) { ?>
			        <table class="table table-bordered">
			          <thead>
			            <tr>
			              <th>#</th>
			              <th>Desciption</th>
			              <th>Trưởng phòng</th>
			              <th>Dự án</th>
			              <th>Thời gian tạo</th>
			              <th>Số giờ làm</th>
			              <th>Tình trạng</th>
			              <th>Duyệt bởi</th>
			              <th>Tình trạng duyệt</th>
			              <th>Action</th>
			            </tr>
			          </thead>
			          <tbody>
			          <?php 
			          	$name = $this->my_report_model->get_fullname_employee($value->create_by);
			          ?>
			          <?php foreach ($value->list_task_checked_today as $k => $v) { //pre($v)?>
			          	<?php if(array_key_exists('list_report_checked_today',$v)==true) { ?>
				          	<?php foreach ($v->list_report_checked_today as $m => $n) { //pre($v)?>
				          	<?php 
								$create_time = strtotime($n->create_time);
	          					$newformat_create_time = date('Y-m-d H:i:s',$create_time);
	          					$pm = ($this->my_report_model->get_fullname_employee($n->review_by));
				          	?>
					          <tr>
					          	<td></td>
					          	<td><?php echo $n->description ?></td>
					          	<td><strong style="color:blue"><?php echo $name[0]->fullname; ?></strong></td>
					          	<td><?php echo $value->project_name?></td>
					          	<td><?php echo $newformat_create_time ?></td>
					          	<td><?php echo $n->time_spend ?></td>
					          	<td><?php echo check_progress_report($n->progress)?></td>
					          	<td><?php echo $pm[0]->fullname ?></td>
			                    <td><?php echo check_status_report($n->review_status); ?></td>
			                    <td>
			                    	<?php if($n->review_status==0) { ?>
			                    	<a href="<?php echo base_url('my_report/check/'.$n->id) ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Duyệt </a>
			                    	<?php }?>
			                    	<?php if($n->review_status==1) { ?>
			                    	<a onclick="return confirm('Are you sure you want to uncheck this report?');" href="<?php echo base_url('my_report/uncheck/'.$n->id) ?>" class="btn btn-danger btn-xs"><i class="fa fa-close"></i> Bỏ </a>
			                    	<?php }?>
			                    </td>
					          </tr>
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
		<?php }?>
		<?php }?>
		</div>
	</div>
</div>