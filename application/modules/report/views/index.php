<!-- top tiles -->
<div class="row tile_count">
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
  <span class="count_top"><i class="fa fa-user"></i> Tổng số báo cáo</span>
  <div class="count"><?php echo $total; ?></div>
</div>
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
  <span class="count_top"><i class="fa fa-user"></i> Số báo cáo của bạn : </span>
  <div class="count green"><?php echo $numberreport; ?></div>
</div>
</div>
<!-- /top tiles -->

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <h2>List báo cáo</small></h2>
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
	          <th>Description</th>
	          <th>Nhiệm vụ</th>
	          <th>Time Spend</th>
	          <th>Ngày tạo</th>
	          <th>Thời lượng</th>
	          <th>Completion</th>
	        </tr>
	      </thead>


	      <tbody>
	      	<?php foreach ($list as $row){ ?>
	        <tr>
	          <td><input type="checkbox" class="flat" name="table_records"></td>
	          <td><?php echo $row['des'] ?></td>
	          <td><?php echo $row['task_name']['name'] ?></td>
	          <td><?php echo $row['time_spend'] ?></td>
	          <td><?php echo $row['created_date'] ?></td>
	          <td><?php echo $row['time_spend']?></td>
	          <td><?php echo $row['completion'] ?></td>
	        </tr>
	        <?php } ?>
	      </tbody>
	    </table>
	  </div>
	</div>
	</div>
</div>