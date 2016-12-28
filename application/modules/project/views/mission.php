<div class="row">
  <div class="col-md-3 col-xs-12 widget widget_tally_box">
    <div class="x_panel ui-ribbon-container fixed_height_390">
      <div class="ui-ribbon-wrapper">
        <div class="ui-ribbon">
          <?php echo check_status_project($info_project->status) ?>
        </div>
      </div>
      <div class="x_title">
        <h2><?php echo $info_project->short_name ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <div style="text-align: center; margin-bottom: 17px">
          <span class="chart" data-percent="<?php echo $info_project->progress ?>">
          <span class="percent"></span>
          </span>
        </div>

        <h3 class="name_title"><?php echo $info_project->short_name ?></h3>
        <p><?php echo $info_project->description ?></p>

        <div class="divider"></div>

        <p>If you've decided to go in development mode and tweak all of this a bit, there are few things you should do.</p>

      </div>
    </div>
  </div>

  <div class="col-md-6 col-sm-6 col-xs-12">
	  <div class="x_panel tile fixed_height_390 overflow_hidden">
	    <div class="x_title">
	      <h2>Cơ cấu dự án</h2>
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
	              <?php foreach ($list_emp['room'] as $r) { ?>
	              <tr>
	                <td>
	                  <p><i class="fa fa-square blue"></i><?php echo $r ?> </p>
	                </td>
	                <td>30%</td>
	              </tr>
	              <?php } ?>
	            </table>
	          </td>
	        </tr>
	      </table>
	    </div>
	  </div>
	</div>
	    <!-- Doughnut Chart -->
	    <!-- jQuery -->

    <script src="<?php echo admin_theme('');?>/vendors/jquery/dist/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        new Chart(document.getElementById("canvas1"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Symbian",
              "Blackberry",
              "Other",
              "Android",
              "IOS"
            ],
            datasets: [{
              data: [15, 20, 30, 10, 30],
              backgroundColor: [
                "#BDC3C7",
                "#9B59B6",
                "#E74C3C",
                "#26B99A",
                "#3498DB"
              ],
              hoverBackgroundColor: [
                "#CFD4D8",
                "#B370CF",
                "#E95E4F",
                "#36CAAB",
                "#49A9EA"
              ]
            }]
          },
          options: options
        });
      });
    </script>
    <!-- /Doughnut Chart -->

	 <div class="col-md-3 col-sm-12 col-xs-12">
	  <div class="x_panel fixed_height_390">
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
	    <ul class="list-unstyled top_profiles scroll-view" style="overflow: auto;">
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
	  </div>
	</div>
</div>