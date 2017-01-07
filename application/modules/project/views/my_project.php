<div class="row">
<?php if ($message){$this->load->view('layout/message',$this->data_layout); }?>
<div class="row">
	<div class="col-md-12">
	<div class="x_panel">
	  <div class="x_title">
	    <h2>Dự án của tôi</h2>
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

	    <!-- start project list -->
	    <table class="table table-striped projects">
	      <thead>
	        <tr>
	          <th style="width: 1%">#</th>
	          <th style="width: 20%">Tên dự án</th>
	          <th>Description</th>
	          <th>Vai trò</th>
	          <th>Tiến độ</th>
	          <th>Trạng thái</th>
	          <th style="width: 20%">% cống hiến</th>
	        </tr>
	      </thead>
	      <tbody>
	      <?php foreach ($list_project as $key => $value) { ?>
	        <tr>
	          <td>#</td>
	          <td>
	            <a href="<?php echo base_url('project/mission/index/'.$value->project_id) ?>"><strong><?php echo $value->project_info->project_name ?></strong></a>
	            <br>
	            <small>Ngày tạo : <?php echo $value->project_info->create_date ?></small>
	          </td>
	          <td>
	          <?php echo $value->project_info->description ?>
	          </td>
	          <td><?php echo $value->type ?></td>
	          <td class="project_progress">
	            <div class="progress progress_sm">
	              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $value->project_info->progress ?>" aria-valuenow="55" style="width: 57%;"></div>
	            </div>
	            <small><?php echo $value->project_info->progress ?>% Hoàn thành</small>
	          </td>
	          <td>
	            <button type="button" class="btn btn-success btn-xs"><?php echo check_status_project($value->project_info->status) ?></button>
	          </td>
	          <td>

	          </td>
	        </tr>
	      <?php } ?>
	      </tbody>
	    </table>
	    <!-- end project list -->

	  </div>
	</div>
	</div>
	</div>
</div>