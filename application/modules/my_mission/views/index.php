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

	 <div class="col-md-9 col-xs-12">
	 <?php if($list_project_active_by_me == null) {?>
	 <p><strong>Bạn Đang Không Có Dự Án Đang Chạy nào</strong></p>
	 <?php }?>
	 <?php if($list_project_active_by_me != null) {?>
	 	<?php  foreach ($list_project_active_by_me as $key => $value) { ?>
	 	<div class="row">
			 <div class="col-md-12 col-sm-12 col-xs-12 bg-white">
		      <div class="x_title">
		        <h2><?php echo $value->info->project_name ?> <span style="color:#fff!important" class="label label-success pull-right">Đang Chạy</span></h2>
		        <div class="clearfix"></div>
		      </div>

		      <div class="col-md-12 col-sm-12 col-xs-6">
		      	<?php if(array_key_exists('mission',$value)) {?>

				      	<?php  foreach ($value->mission as $k => $v) { ?>
				        <div>
				          <p><a href="<?php echo base_url('project/mission/view_detail/'.$value->info->id.'/'.$v->id) ?>"><?php echo $v->name ?> - <?php echo $v->progress ?>%</a></p>
				          <div class="">
				            <div class="progress progress_sm" style="width: 76%;">
				              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $v->progress ?>" aria-valuenow="0" style="width: 80%;"></div>
				            </div>
				          </div>
				        </div>		
				      	<?php } ?>

		      	<?php }?>
		        <?php if(array_key_exists('mission',$value) == false) {?>
		        <p>Không có nhiệm vụ nào !</p>
		        <?php }?>

		      </div>
	    	</div>
	    </div>
	 	<?php } ?>
	 <?php } ?>
	 
</div>