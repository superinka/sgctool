<?php //pre($list_report_today); ?>
<div class="row">
<?php if($list_report_today==null){echo'<p>Hôm nay chưa có báo cáo !</p>';} ?>
<?php if($list_report_today!=null) {?>
<?php $b = round(($total_report_checked/$total_report_today*100),2); ?>
<div class="row">
	<div class="col-md-5 col-sm-5 col-xs-12">
	  <div class="x_panel tile fixed_height_290 overflow_hidden">
	    <div class="x_title">
	      <h2>Thống kê báo cáo : <small>Có <strong><?php echo count($list_report_today) ?></strong> báo cáo</small></h2>
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
	            <p>Thống kê báo cáo</p>
	          </th>
	          <th>
	            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
	              <p class="">Kiểu</p>
	            </div>
	            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
	              <p class="">Tiến độ</p>
	            </div>
	          </th>
	        </tr>
	        <tr>
	          <td>
	            <canvas id="canvas1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
	          </td>
	          <td>
	            <table class="tile_info">
	              <tr>
	                <td>
	                  <p><i class="fa fa-square green"></i>Hoàn thành </p>
	                </td>
	                <td><?php echo $b ?>%</td>
	              </tr>
	              <tr>
	                <td>
	                  <p><i class="fa fa-square red"></i>Chưa hoàn thành </p>
	                </td>
	                <td><?php echo (100-$b) ?>%</td>
	              </tr>
	            </table>
	          </td>
	        </tr>
	      </table>
	    </div>
	  </div>
	</div>
	<script src="<?php echo admin_theme('');?>/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Doughnut Chart -->
    <script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        var dt=[];
        dt = <?php echo json_encode($c); ?>;

        new Chart(document.getElementById("canvas1"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Hoàn thành",
              "Chưa hoàn thành"
            ],
            datasets: [{
              data: dt,
              backgroundColor: [
                "#26B99A",
                "#E74C3C"
              ],
              hoverBackgroundColor: [
                "#26B99A",
                "#E74C3C"
              ]
            }]
          },
          options: options
        });
      });
    </script>
</div>

<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel">
          <div class="x_title">
            <h2>Báo cáo chưa hoàn thành <small>Có <strong><?php echo count($list_report_uncheck_today) ?></strong> báo cáo</small></h2>
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
          <?php if($list_report_uncheck_today==null){echo'<p>Không có dữ liệu !</p>';} ?>
          <?php if($list_report_uncheck_today!=null){?>
          <div class="x_content">

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Mô tả</th>
                  <th>Nhân viên</th>
                  <th>Dự Án</th>
                  <th>Nhiệm vụ</th>
                  <th>Công việc</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($list_report_uncheck_today as $key => $value) { ?>
                <tr>
                  <th scope="row"></th>
                  <td><?php echo $value->description ?></td>
                  <td><?php echo $value->reporter ?></td>
                  <td><?php echo $value->reporter ?></td>
                  <td><?php echo $value->mission_name ?></td>
                  <td><?php echo $value->reporter ?></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>

          </div>
          <?php }?>
        </div>
	</div>

	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel">
          <div class="x_title">
            <h2>Báo cáo hoàn thành <small>Có <strong><?php echo count($list_report_checked_today) ?></strong> báo cáo</small></h2>
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
          <?php if($list_report_checked_today==null){echo'<p>Không có dữ liệu !</p>';} ?>
          <?php if($list_report_checked_today!=null){?>
          <div class="x_content">

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Mô tả</th>
                  <th>Nhân viên</th>
                  <th>Dự Án</th>
                  <th>Nhiệm vụ</th>
                  <th>Công việc</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($list_report_checked_today as $key => $value) { ?>
                <tr>
                  <th scope="row"></th>
                  <td><?php echo $value->description ?></td>
                  <td><?php echo $value->reporter ?></td>
                  <td><?php echo $value->reporter ?></td>
                  <td><?php echo $value->mission_name ?></td>
                  <td><?php echo $value->reporter ?></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>

          </div>
          <?php }?>
        </div>
	</div>
</div>

<?php }?>
</div>