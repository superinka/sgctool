<?php //pre($info_mission); ?>
<?php //pre($info_project); ?>
<?php if ($message){$this->load->view('layout/message',$this->data_layout); }?>
<style type="text/css">
  ul.task-request li a i {padding-right: 15px;}
</style>
<div class="row">
  <div class="col-md-12 col-xs-12 widget widget_tally_box">
    <div class="row">
      <div class="x_panel ui-ribbon-container fixed_height_490">
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
            <span class="chart" data-percent="<?php echo $progress_task ?>">
            <span class="percent"></span>
            </span>
          </div>

          <h3 class="name_title"><?php echo $info_mission->name ?></h3>
          <p><?php echo $info_mission->description ?></p>

          <div class="divider"></div>

          <p>Ngày tạo : <?php echo $info_mission->create_date  ?></p>
          <p>Ngày bắt đầu : <?php echo $info_mission->start_date  ?></p>
          <p>Ngày kết thúc : <?php echo $info_mission->end_date  ?></p>
          <p>Đây là nhiệm vụ </p>
          <p>Thuộc dự án : <strong><a href="<?php echo base_url('project/mission/index/'.$project_id) ?>"><?php echo $info_project->project_name;?></a></strong></p>

        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 col-xs-12 widget widget_tally_box">
        <div class="x_panel fixed_height_390">
          <div class="x_content">
          <p>Nhiệm vụ của :</p>

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

            <h3 class="name"><?php echo $info_mission->mission_user_name ?></h3>

            <div class="flex">
              <ul class="list-inline count2">
                <li>
                  <h3><?php echo $info_mission->mission_user_id ?></h3>
                  <span>ID</span>
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
<!--             <p>
              If you've decided to go in development mode and tweak all of this a bit, there are few things you should do.
            </p> -->
          </div>
        </div>
      </div>
    </div>
  </div>
	<div class="col-md-8 col-sm-8 col-xs-12">
  <div class="row">
	    <div class="x_panel">
	      <div class="x_title">
	        <h2>Danh sách công việc: <small>Có <?php echo $count_task; ?> công việc</small></h2>
	        <?php if ($list_task==null) { ?>
		        <?php if($now_user_id==$info_mission->mission_user_id) {?>
		        <a href="<?php echo base_url('project/mission/add_task/'.$project_id.'/'.$mission_view_id) ?>" class="btn btn-primary btn-xs navbar-right"><i class="fa fa-folder"></i> Thêm </a>
		        <?php }?>
	        <?php } ?>
          <?php if ($list_task!=null) { ?>
            <?php if($now_user_id==$info_mission->mission_user_id) {?>
            <a href="<?php echo base_url('project/mission/add_task/'.$project_id.'/'.$mission_view_id) ?>" class="btn btn-primary btn-xs navbar-right"><i class="fa fa-folder"></i> Thêm </a>
            <?php }?>
          <?php } ?>
	        <div class="clearfix"></div>
	      </div>
	      <?php
	      	if($list_task==null) {
	      		?>
	      		<p>Không có dữ liệu</p>

	      		<?php
	      	}
	      	else if ($list_task!=null) {
            if(($account_type==4)&&($now_user_id!=$info_mission->mission_user_id)) {
              ?>
              <p><strong style="color:red">Đây không phải là nhiệm vụ của bạn, bạn không thể xem mục này !</strong></p>

              <?php
            }
            if(($account_type < 4) || ($now_user_id==$info_mission->mission_user_id)) {
              ?>
              

              <?php
              foreach ($list_task as $key => $value) {
                if ($value->status==0) {$c = 'danger'; $t = 'Chưa Hoàn Thành';} else {$c = 'success'; $t = 'Hoàn Thành';}
                ?>
                <div class="row">
                <div class="col-md-10">
                <div>
                  <p><i class="fa fa-angle-double-right"></i> <a href="<?php echo base_url('project/mission/view_detail/'.$value->id) ?>"><?php echo $value->name ?></a>  <span class="label label-<?php echo $c; ?> pull-right"><?php  echo $t?></span></p>

                </div>
                </div>

              <div class="col-md-2">
              <ul style="list-style: none; display: inline-flex; padding-left: 0px;" class="task_request">
                <li style="padding-right: 15px;"><a title="Xin sửa thời gian" href="<?php echo base_url('request/request_time_task/'.'c101-'.$value->code) ?>"><i class="fa fa-clock-o" aria-hidden="true"></i></a></li>
                <li style="padding-right: 15px;"><a title="Xin sửa tên" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i></a></li>
                <li><a title="Xin sửa tiến độ" href="#"><i class="fa fa-battery-full" aria-hidden="true"></i></a></li>
              </ul>
              </div>
              </div>
              <?php
              }

              ?>
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