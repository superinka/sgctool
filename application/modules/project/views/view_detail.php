<?php //pre($info_mission); ?>
<?php if ($message){$this->load->view('layout/message',$this->data_layout); }?>
<div class="row">
  <div class="col-md-3 col-xs-12 widget widget_tally_box">
    <div class="x_panel ui-ribbon-container fixed_height_390">
      <div class="ui-ribbon-wrapper">
        <div class="ui-ribbon">
          <?php echo check_status_mission($info_mission->status) ?>
        </div>
      </div>
      <div class="x_title">
        <h2><?php echo $info_mission->name ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <div style="text-align: center; margin-bottom: 17px">
          <span class="chart" data-percent="<?php echo $info_mission->progress ?>">
          <span class="percent"></span>
          </span>
        </div>

        <h3 class="name_title"><?php echo $info_mission->name ?></h3>
        <p><?php echo $info_mission->description ?></p>

        <div class="divider"></div>

        <p>Ngày tạo : <?php echo $info_mission->create_date  ?></p>
        <p>Ngày bắt đầu : <?php echo $info_mission->start_date  ?></p>
        <p>Ngày kết thúc : <?php echo $info_mission->end_date  ?></p>

      </div>
    </div>
  </div>
	<div class="col-md-6 col-sm-6 col-xs-12">
	    <div class="x_panel">
	      <div class="x_title">
	        <h2>Danh sách công việc</h2>
	        <?php if ($list_task!=null) { ?>
		        <?php if($account_type<4) {?>
		        <a href="<?php echo base_url('project/mission/add_mission/'.$project_id) ?>" class="btn btn-primary btn-xs navbar-right"><i class="fa fa-folder"></i> Thêm </a>
		        <?php }?>
	        <?php } ?>
	        <div class="clearfix"></div>
	      </div>
	      <?php
	      	if($list_task==null) {
	      		?>
	      		<p>Không có dữ liệu</p>
	      		<?php if($account_type<4) {?>  
			      	<a href="<?php echo base_url('project/mission/add_mission/') ?>">
			      	<button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> ADD</button>
			      	</a>
		      	<?php }?>
	      		<?php
	      	}
	      	else if ($list_task!=null) {
	      		foreach ($list_task as $key => $value) {
	      			
	      			?>
	      			<div>
			          <p><a href="<?php echo base_url('project/mission/view_detail/'.$value->id) ?>"><?php echo $value->name ?></a></p>
			          <div class="">
			            <div class="progress progress_sm" style="width: 80%;">
			              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $value->progress ?>"></div>
			            </div>
			          </div>
			        </div>
	      			<?php
	      		}
	      	}
	      ?>
	      
	    </div>
	</div>
	    <!-- Doughnut Chart -->
	    <!-- jQuery -->
  <div class="col-md-3 col-xs-12 widget widget_tally_box">
    <div class="x_panel fixed_height_390">
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

        <h3 class="name">Musimbi</h3>

        <div class="flex">
          <ul class="list-inline count2">
            <li>
              <h3>123</h3>
              <span>Articles</span>
            </li>
            <li>
              <h3>1234</h3>
              <span>Followers</span>
            </li>
            <li>
              <h3>123</h3>
              <span>Following</span>
            </li>
          </ul>
        </div>
        <p>
          If you've decided to go in development mode and tweak all of this a bit, there are few things you should do.
        </p>
      </div>
    </div>
  </div>

</div>

<div class="row">

</div>