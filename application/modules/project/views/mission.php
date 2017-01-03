<?php //pre($list_emp); ?>
<?php //pre($list_mission); ?>
<?php 
$total = 0;
foreach ($list_room_by_project as $k=>$v) {
	if (array_key_exists('mission',$v)) {
		$b = round(($v['score']*$v['proportion']),2); 
		$total = $b + $total;
	}

}
?>
<?php if ($message){$this->load->view('layout/message',$this->data_layout); }?>
<div class="row">
  <div class="col-md-3 col-xs-12 widget widget_tally_box">
  <div class="row">
    <div class="x_panel ui-ribbon-container fixed_height_690">
      <div class="ui-ribbon-wrapper">
        <div class="ui-ribbon">
          <?php echo check_status_project($info_project->status) ?>
        </div>
      </div>
      <div class="x_title">
        <h2>Code : <?php echo $info_project->short_name ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <div style="text-align: center; margin-bottom: 17px">
          <span class="chart" data-percent="<?php echo $total ?>">
          <span class="percent"></span>
          </span>
        </div>

        <h3 class="name_title"><?php echo $info_project->project_name ?></h3>
        <p><?php echo $info_project->description ?></p>

        <div class="divider"></div>

        <p>Ngày tạo : <?php echo $info_project->create_date  ?></p>
        <p>Ngày bắt đầu : <?php echo $info_project->start_date  ?></p>
        <p>Ngày kết thúc : <?php echo $info_project->end_date  ?></p>

      </div>
    </div>
    </div>

    <div class="row">
    <div class="x_panel fixed_height_690">
	    <div class="x_title">
	      <h2>Thành viên dự án : <?php echo $total_member; ?></h2>
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
	    <?php if($list_emp==null) {echo 'Không có dữ liệu';} ?>
	    <?php if($list_emp!=null){ ?>
	    <ul class="list-unstyled top_profiles scroll-view" style="overflow: auto;max-height: 300px">
	    <?php if(array_key_exists('leader',$list_emp)) {?>
		    <?php foreach ($list_emp['leader'] as $r) {
		    	?>
			      <li class="media event">
			        <a class="pull-left border-aero profile_thumb">
			          <i class="fa fa-user green"></i>
			        </a>
			        <div class="media-body">
			          <a class="title" href="#"><?php echo $r; ?></a>
			          <p><strong>Trưởng phòng  </strong> </p>
			          </p>
			        </div>
			      </li>
		    	<?php

		    } ?>
	    <?php }?>
	   	<?php foreach ($list_emp['member'] as $r) {
	    	?>
		      <li class="media event">
		        <a class="pull-left border-aero profile_thumb">
		          <i class="fa fa-user aero"></i>
		        </a>
		        <div class="media-body">
		          <a class="title" href="#"><?php echo $r[0]; ?></a>
		          <p><strong>Nhân viên</strong></p>
		          <small><?php echo $r[1]; ?></small>
		          </p>
		        </div>
		      </li>
	    	<?php

	    } ?>
	    </ul>
	    <?php } ?>
	  </div>

    </div>
  </div>
  <div class="col-md-9 col-sm-9 col-xs-12">
  <div class="row">
  <div class="col-md-12 col-xs-12">
	  <div class="x_panel tile fixed_height_690 overflow_hidden">
	    <div class="x_title">
	      <h2>Cơ cấu dự án</h2>
	      <ul class="nav navbar-right panel_toolbox">
	        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	        </li>
	        <li>
	          <a href="<?php echo base_url('project/proportion_department/'.$project_id) ?>"><i class="fa fa-wrench"></i></a>
	        </li>
	        <li><a class="close-link"><i class="fa fa-close"></i></a>
	        </li>
	      </ul>
	      <div class="clearfix"></div>
	    </div>
	    <div class="x_content">
	    <div class="row">
	      <?php if($list_emp==null) { ?>
	      	<p>Không có dữ liệu</p>
	      	<a href="http://localhost/sgctool/home/acc/add">
	      	<button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> ADD</button>
	      	</a>
	      <?php } ?>
	      <?php if($list_emp!=null){ ?>
	      <table class="" style="width:100%">
	        <tr>
	          <th style="width:37%;">
	            <p>Biểu Đồ Cơ cấu</p>
	          </th>
	          <th>
	            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
	              <p class="">Thành phần</p>
	            </div>
	            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
	              <p class="">Tỉ lệ chiếm</p>
	            </div>
	          </th>
	        </tr>
	        <tr>
	          <td>
	            <canvas id="canvas1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
	          </td>
	          <td>
	            <table class="tile_info">
	              <?php foreach ($list_emp['room-member'] as $k=>$v) { ?>
	              <tr>
	                <td>
	                  <p><i class="fa fa-square" style="color: <?php echo color_room($v); ?>"></i><?php echo $v ?> </p>
	                </td>
	                <td><?php echo $list_emp['proportion-room'][$k]  ?></td>
	              </tr>
	              <?php } ?>
	              <?php //pre($labels) ?>
	            </table>
	          </td>
	        </tr>
	      </table>
	      <script src="<?php echo admin_theme('');?>/vendors/jquery/dist/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        var backgroundColor = []; var hoverBackgroundColor =[];
        backgroundColor = <?php echo json_encode($list_emp['room-color']); ?>;
        hoverBackgroundColor = <?php echo json_encode($list_emp['room-color']); ?>;
        var jArray= <?php echo json_encode($list_emp['room-member']); ?>;
        var b =0;
        console.log(color);

        var c = 'doughnut';
        var labels=[];
        var labels2= [];
        console.log(jArray);
        var dt = <?php echo json_encode($list_emp['proportion-room']); ?>;
        console.log(dt);
        var data =[];
        var color = [];
        for(var i=0;i<(dt.length);i++){
	        //alert(jArray[i]);
	        b = b + parseInt(dt[i]);
	        data[i] = parseInt(dt[i]);
	    }
	    for(var i=0;i<(jArray.length);i++){
	        labels[i] = jArray[i];
	    }
	    var other = 0;
	    if (b < 100) {
	    	other = 100 - b;
	    	data.push(other);
	    	labels.push('khác');
	    }
	    var data2 = []; 
	    console.log(b);
	    console.log(other);
		console.log(jArray);
		console.log(data);
		console.log(labels);
		console.log(labels2);
        new Chart(document.getElementById("canvas1"), {
          type: c,
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels,
            datasets: [{
              data,
              backgroundColor,
              hoverBackgroundColor
            }]
          },
          options: options
        });
      });
    </script>
    <!-- /Doughnut Chart -->
	      	<?php } ?>
	        <?php if($account_type<3) {?>  
	      	<p class="" style="color:red"><?php if ($check==true) {echo'Dự liệu tạm thời, cần tạo mới ngay';} ?></p>
	      	<a href="<?php echo base_url('project/mission/add_pro/'.$project_id) ?>">
	      		<button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> ADD</button>
	      	</a>
	      	<?php }?>
	    </div>
	    <div class="row">
	    <?php if($list_emp!=null){ ?>
	    	<h2>Tiến độ phòng ban</h2>
	    	<?php 
	    	$total = 0;
	    	foreach ($list_room_by_project as $k=>$v) {
	    		$b = round(($v['score']*100),2); 
	    		$total = $b + $total;
	  			?>
	  			<div>
		          <p><?php echo $v['name'] ?></a> - <?php echo $b ?> %</p>
		          <div class="">
		            <div class="progress progress_sm" style="width: 80%;">
		              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php  echo $b;  ?>"></div>
		            </div>
		            <div class="ln_solid"></div>
		          </div>
		        </div>
	  			<?php
	      	}
	    	?>

	    <?php }?>
	    </div>
	    </div>
	  </div>
	</div>
	</div>
	    <!-- Doughnut Chart -->
	    <!-- jQuery -->
	<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
	    <div class="x_panel">
	      <div class="x_title">
	        <h2>Danh sách nhiệm vụ</h2>
	       	<ul class="nav navbar-right panel_toolbox">
		       	<li>
		       	<?php if ($list_mission!=null) { ?>
			        <?php if($account_type<4) {?>
			        <a href="<?php echo base_url('project/mission/add_mission/'.$project_id) ?>" class=""><i class="fa fa-plus-square"></i> Thêm </a>
			        <?php }?>
		        <?php } ?>
		       	</li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="<?php echo base_url('project/mission/add_mission/'.$project_id.'/') ?>">Sửa</a></li>
		            <li><a href="#">Settings 2</a></li>
		          </ul>
		        </li>
		        <li><a class="close-link"><i class="fa fa-close"></i></a>
		        </li>
		    </ul>

	        <div class="clearfix"></div>
	      </div>
	      <?php
	      	if($list_mission==null) {
	      		?>
	      		<p>Không có dữ liệu</p>
	      		<?php if($account_type<4) {?>  
			      	<a href="<?php echo base_url('project/mission/add_mission/'.$project_id) ?>">
			      	<button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> ADD</button>
			      	</a>
		      	<?php }?>
	      		<?php
	      	}
	      	else if ($list_mission!=null) {
	      		foreach ($list_mission as $key => $value) {
	      			
	      			?>
	      			<div>
			          <p><a href="<?php echo base_url('project/mission/view_detail/'.$project_id.'/'.$value->id) ?>"><?php echo $value->name ?></a> - <?php echo $value->progress ?> % - Thuộc : <?php echo $value->department_name ?></p>
			          <div class="">
			            <div class="progress progress_sm" style="width: 80%;">
			              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $value->progress ?>"></div>
			            </div>
			            <?php if($account_type<4) {?>  
			            <div class="">
			            	<a href="<?php echo base_url('project/mission/edit_mission/'.$project_id.'/'.$value->id.'/') ?>">Sửa</a>
			            </div>
			            <?php }?>
			            <div class="ln_solid"></div>
			          </div>
			        </div>
	      			<?php
	      		}
	      	}
	      ?>
	      
	    </div>
    </div>
	</div>

</div>

<div class="row">
    
</div>