<?php //pre($list_room_by_me) ?>
<?php if ($message){$this->load->view('layout/message',$this->data_layout); }?>
<div class="row">
	<div class="col-md-3">
		<div class="row">
		    <div class="col-md-12 col-xs-12 widget widget_tally_box">
			 	<div class="x_panel fixed_height_290">
		          <div class="x_content">

		            <div class="flex">
		              <ul class="list-inline widget_profile_box">
		                <li>
		                  <a>
		                    <i class="fa fa-facebook"></i>
		                  </a>
		                </li>
		                <li>
		                  <img src="<?php echo admin_theme('');?>/production/images/default-avatar.jpg"" alt="..." class="img-circle profile_img">
		                </li>
		                <li>
		                  <a>
		                    <i class="fa fa-twitter"></i>
		                  </a>
		                </li>
		              </ul>
		            </div>

		            <h3 class="name"><?php //echo //$info_mission->mission_user_name ?></h3>

		            <div class="flex">
		              <ul class="list-inline count2">
		                <li>
		                  <h3><?php echo $my_id; ?></h3>
		                  <span>ID</span>
		                </li>
		                <li>
		                  <h3><?php //echo count() ?></h3>
		                  <span>Dự án</span>
		                </li>
		                <li>
		                  <h3>123</h3>
		                  <span>Following</span>
		                </li>
		              </ul>
		            </div>
			 	  </div>
				</div>
		    </div>		
		</div>
	</div>

	<div class="col-md-9">
	<?php foreach ($list_room_by_me['department'] as $key => $value) { ?>
		
	
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Công việc cần báo cáo hôm nay <small><?php echo $value['name'] ?></small></h2>
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

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Tên công việc</th>
                          <th>Tên nhiệm vụ</th>
                          <th>Tên dự án</th>
                          <th>Tình trạng</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(array_key_exists('list_miss',$value)==true) {?>
                      	<?php  foreach ($value['list_miss'] as $k => $v) { //pre($v)?>
                      		<?php if(array_key_exists('list_task',$v)==true) { ?>
	                      		<?php  foreach ($v->list_task as $x => $y) { ?>
	                      		<?php 
	                      		if(array_key_exists('list_un_report_today',$y)==false && array_key_exists('list_reported_today',$y)==false) {$st ='<strong>Chưa báo cáo</strong><a href="'.(base_url('my_report/add_report')).'">'.' <strong style="color:red"><i class="fa fa-warning"></i> Báo cáo ngay</strong> </a>';}
	                      		if(array_key_exists('list_un_report_today',$y)==true || array_key_exists('list_reported_today',$y)==true) {$st ='<strong>Có báo cáo</strong>';}
	                      		?>
		                        <tr>
		                          <th scope="row"></th>
		                          <td><?php echo $y->name  ?></td>
		                          <td><?php echo $v->name  ?></td>
		                          <td><?php echo $v->project_name  ?></td>
		                          <td><?php echo $st  ?></td>
		                        </tr>
		                        <?php } ?>
	                        <?php }?>
                        <?php }?>
                      <?php }?>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>		
		</div>

	<?php } ?>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
	            <div class="x_panel">
	              <div class="x_title">
	                <h2>Tổng hợp báo cáo hôm nay<small></small></h2>
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

	                <table class="table table-bordered">
	                  <thead>
			            <tr>
			              <th>#</th>
			              <th>Desciption</th>
			              <th>Công việc</th>
			              <th>Phòng</th>
			              <th>Dự án</th>
			              <th>Thời gian tạo</th>
			              <th>Số giờ làm</th>
			              <th>Tình trạng</th>
			              <th>Duyệt bởi</th>
			              <th>Tình trạng duyệt</th>
			            </tr>
	                  </thead>
	                  <tbody>
	                  <?php foreach ($list_room_by_me['department'] as $key => $value) { ?>
		                  <?php if(array_key_exists('list_miss',$value)==true) {?>
		                  	<?php  foreach ($value['list_miss'] as $k => $v) { //pre($v)?>
		                  		<?php if(array_key_exists('list_task',$v)==true) { ?>
		                      		<?php  foreach ($v->list_task as $x => $y) { ?>
		                      		<?php 

		                      		if(array_key_exists('list_un_report_today',$y)==false && array_key_exists('list_reported_today',$y)==false) {$st ='<strong>Chưa báo cáo</strong><a href="'.(base_url('my_report/add_report')).'">'.' <strong style="color:red"><i class="fa fa-warning"></i> Báo cáo ngay</strong> </a>';}
		                      		if(array_key_exists('list_un_report_today',$y)==true || array_key_exists('list_reported_today',$y)==true) {$st ='<strong>Có báo cáo</strong>';}
		                      		if (array_key_exists('list_report_today',$y)==true ) {

		                      		?>
		                      		<?php  foreach ($y->list_report_today as $m => $n) { //pre($n)?>
		                      		<?php 
		                      		$create_time = strtotime($n->create_time);
	          						$newformat_create_time = date('Y-m-d H:i:s',$create_time);
	          						$pm = ($this->my_report_model->get_fullname_employee($n->review_by));
		                      		?>
							          <tr>
							          	<td></td>
							          	<td><?php echo $n->description ?></td>
							          	<td><?php echo $y->name?></td>
							          	<td><strong style="color:blue"><?php echo $value['name']; ?></strong></td>
							          	<td><?php echo $v->project_name?></td>
							          	<td><?php echo $newformat_create_time ?></td>
							          	<td><?php echo $n->time_spend ?></td>
							          	<td><?php echo check_progress_report($n->progress)?></td>
							          	<td><?php echo $pm[0]->fullname ?></td>
					                    <td><?php echo check_status_report($n->review_status); ?></td>
							          </tr>
							          <?php }?>
						          	<?php }?>
			                        <?php } ?>
		                        <?php }?>
		                    <?php }?>
		                  <?php }?>
	                  <?php }?>
	                  </tbody>
	                </table>

	              </div>
	            </div>
	          </div>		
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Lịch sử báo cáo<small></small></h2>
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

            <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
              <thead>
	            <tr>
	              <th>ID</th>
	              <th>Desciption</th>
	              <th>Công việc</th>
	              <th>Phòng</th>
	              <th>Dự án</th>
	              <th>Thời gian tạo</th>
	              <th>Số giờ làm</th>
	              <th>Tình trạng</th>
	              <th>Duyệt bởi</th>
	              <th>Tình trạng duyệt</th>
	            </tr>
              </thead>
              <tbody>
              <?php foreach ($all_report_by_me as $key => $value) { ?>
              <?php 
				$create_time = strtotime($value->create_time);
	          	$newformat_create_time = date('Y-m-d H:i:s',$create_time);
              ?>

		          <tr>
		          	<td><?php echo $value->id ?></td>
		          	<td><?php echo $value->description ?></td>
		          	<td><?php echo $value->task_name?></td>
		          	<td><strong style="color:blue"><?php echo $value->department_name; ?></strong></td>
		          	<td><?php echo $value->project_name?></td>
		          	<td><?php echo $newformat_create_time ?></td>
		          	<td><?php echo $value->time_spend ?></td>
		          	<td><?php echo check_progress_report($value->progress)?></td>
		          	<td><?php echo $value->review_by ?></td>
	                <td><?php echo check_status_report($value->review_status); ?></td>
		          </tr>

              <?php }?>
              </tbody>
            </table>

          </div>
        </div>
      </div>		
</div>