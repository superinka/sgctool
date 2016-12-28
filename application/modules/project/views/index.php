<!-- top tiles -->
<div class="row tile_count">
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
  <span class="count_top"><i class="fa fa-user"></i> Tổng số dự án</span>
  <div class="count"><?php echo $total; ?></div>
</div>
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
  <span class="count_top"><i class="fa fa-user"></i> dự án của bạn : </span>
  <div class="count green"><?php echo $numberproject;   ?></div>
</div>
</div>
<!-- /top tiles -->
<div class="row">
	<div class="col-md-12">
	<?php 
		if($account_type < 3 ) {
			?>
			<a href="<?php echo base_url('project/add'); ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm Dự Án</button></a>
			<?php
		}
	?>
	</div>
</div>

<?php if ($message){$this->load->view('layout/message',$this->data_layout); }?>

<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Danh sách dự án</h2>
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

        <p></p>

        <!-- start project list -->
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">#</th>
              <th style="width: 20%">Tên dự án</th>
              <th>Thành viên</th>
              <th>Thời gian</th>
              <th>Status</th>
              <th>Tiến độ</th>
              <th style="width: 20%">#Edit</th>
            </tr>
          </thead>
          <tbody>
          	<?php 
          	foreach ($list_project as $row){  
	      		$start_date = strtotime($row->start_date);
	      		$end_date = strtotime($row->end_date);
	      		$today_date = strtotime(date_create('now')->format('Y-m-d'));
	      		$nwd = networkdays($start_date, $end_date, $holidays);
	      		//$nwd = $nwd+1;
	      		$percent_day = 0;

				$date1 = strtotime($row->start_date);
				$date2 = strtotime($row->end_date);
				$total_day = ($date2 - $date1) / (60 * 60 * 24);
				$total_day = $total_day + 1;
				$pass_day = ($today_date - $date1) / (60 * 60 * 24);
				$pass_day = $pass_day + 1 ;

				$percent_day = percent_day($pass_day, $total_day);

				$color = 'green';
				if($percent_day>70) {
					$color = 'red';
				}

				if ($percent_day<25){
					$color = '#5cb85c';
				}

				$c = $row->status;

				//echo $c;

				$status_bg;

				if ($c==1) {$status_bg = 'info';}
				else if ($c==2) {$status_bg = 'success';}
				else if ($c==3) {$status_bg = 'danger';}          			
          	?>
            <tr>
              <td style="padding-top: 2%;">#</td>
              <td style="padding-top: 2%;">
                <a href="<?php echo base_url('project/view/'.$row->id) ?>"style="color:blue"><?php echo $row->project_name ?></a>
                <br />
                <small>Ngày tạo:  <?php echo $row->create_date ?></small><br>
                <small>Ngày bắt đầu:  <?php echo $row->start_date ?></small><br>
                <small>Ngày kết thúc:  <?php echo $row->end_date ?></small>
              </td>
              <td style="padding-top: 4%;">
                <ul class="list-inline">
                <?php foreach ($row->emp as $r) { ?>
                  <li>
                  <a href="" title="<?php echo $r->emp_name ?>">
                    <img src="<?php echo admin_theme('');?>/production/images/default-avatar.jpg" class="avatar" alt="Avatar">
                  </a>
                  </li>
                <?php } ?>

                </ul>
              </td>
              <td class="project_progress" style="padding-top: 4%;">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-<?php echo $color;?>" role="progressbar" data-transitiongoal="<?php echo $percent_day ?>"></div>
                </div>
                <small><?php echo 'Tổng :' .$total_day.' Ngày'.' - Đã qua  :';printf( "%.2f",  $percent_day ); ?>%</small>
              </td>
              <td style="padding-top: 4%;">
                <button type="button" class="btn btn-<?php echo $status_bg ?> btn-xs"><?php echo check_status_project($c) ?></button>
              </td>
              <td>   
	              <span class="chart" data-percent="<?php echo $row->progress ?>">
	              	<span class="percent"></span>
	              </span>	
              </td>
              <td>
                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                <?php if($account_type < 3) { ?>
                <a href="<?php echo base_url('project/edit/'.$row->id) ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                <a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('project/delete/'.$row->id)?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                <?php }?>
                
              </td>
            </tr>
            <?php }?>
            
          </tbody>
        </table>
        <!-- end project list -->

      </div>
    </div>
  </div>
</div>


<!-- <div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <h2>List Dự án</small></h2>
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
	    <p class="text-muted font-13 m-b-30">
	      
	    </p>
	    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
	      <thead>
	        <tr>
	          <th><input type="checkbox" id="check-all" class="flat"></th>
	          <th>Tên dự án</th>
	          <th>Ngày bắt đầu</th>
	          <th>Ngày kết thúc</th>
	          <th>Tổng ngày - Thời gian còn lại</th>
	          <th>Tiến độ</th>
	        </tr>
	      </thead>


	      <tbody>
	      	<?php 
	      	$i=1;
	      	foreach ($list_project as $row){ 

				//echo $percent_day;
	      	?>

	        <tr>
	          <td><input type="checkbox" class="flat" name="table_records"></td>
	          <td><a href="<?php echo base_url('project/view/'.$row->id) ?>"><?php echo $row->project_name .' - ' . $row->short_name ?></a></td>
	          <td><?php echo $row->start_date ?></td>
	          <td><?php echo $row->end_date ?></td>
	          <td>
	          	<div class="row"  style="padding:0px 10px 0px 10px">
	                <div class="progress_title">
	                  <span class="left"><?php echo'  Tổng Ngày'; ?></span>
	                  <span class="right">Đã qua</span>
	                  <div class="clearfix"></div>
	                </div>

	                <div class="col-xs-2">
	                  <span><?php echo $total_day ?></span>
	                </div>
	                <div class="col-xs-8">
	                  <div class="progress progress_sm">
	                    <div class="progress-bar bg-<?php echo $color;?>" role="progressbar" data-transitiongoal="<?php echo $percent_day?>"></div>
	                  </div>
	                </div>
	                <div class="col-xs-2 more_info">
	                  <span><?php printf( "%.2f",  $percent_day ); ?>%</span>
	                </div>
              	</div>
	          </td>
	          <td>
                 <span class="chart" data-percent="<?php echo $row->progress ?>">
                  	<span class="percent"></span>
                  </span>		
	          </td>
	        </tr>
	        
	        <?php } ?>
	      </tbody>
	    </table>
	  </div>
	</div>
	</div>
</div> -->