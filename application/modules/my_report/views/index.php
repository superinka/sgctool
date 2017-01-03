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
		<div class="row">
			
		</div>
	</div>
</div>