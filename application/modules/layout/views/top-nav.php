<!-- top navigation -->
<?php //echo $id; ?>
<?php //echo $account_type; ?>
<?php //pre($list_request_by_me);?>
<?php $list_request_by_me = $this->CI->get_my_request();?>
<?php //pre($list_request_by_me);?>
<?php //echo time_elapsed_string('2013-05-01 00:22:35'); ?>
<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo admin_theme('');?>/production/images/img.jpg" alt="">
            <?php echo $username; ?>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="<?php echo base_url('home/home/edit_profile/'.$id)?>"> Profile</a></li>
            <li><a href="<?php echo base_url('home/home/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Thoát ra</a></li>
          </ul>
        </li>

        <?php if($account_type == 4 || $account_type == 3) {?>
        <li role="presentation" class="dropdown" style="padding-top: 5px;">
          <a href="javascript:;" class="dropdown-toggle info-number btn btn-app" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-bullhorn"></i>
            <span class="badge bg-green"><?php echo count($list_request_by_me) ?></span>
          </a>
          <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
          <?php if(count($list_request_by_me)==0){
            echo '<p style="text-align:center"><strong>Không có request nào</strong></p>';
          } ?>

            <?php foreach ($list_request_by_me as $key => $value) { ?>
            <?php 
            $create_time = strtotime($value->create_time);
            $newformat_create_time = date('Y-m-d H:i:s',$create_time);
            //echo $newformat_create_time; echo time();
            ?>
            <li>
              <a>
                <span class="image"><img src="<?php echo admin_theme('');?>/production/images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>Tôi</span>
                  <span class="time"><?php echo time_elapsed_string($create_time); ?></span>
                </span>
                <span class="message">
                  <?php echo $value->note ?>
                </span>
              </a>
            </li>
            <?php } ?>
            <li>
              <div class="text-center">
                <a>
                  <strong>Xem tất cả</strong>
                  <i class="fa fa-angle-right"></i>
                </a>
              </div>
            </li>
          </ul>
        </li>
        <?php }?>
      </ul>
    </nav>
  </div>
</div>
        <!-- /top navigation -->