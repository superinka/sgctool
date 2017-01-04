
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
      <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?php echo base_url('home/index'); ?>">Tổng quan</a></li>
          <?php 
            if ($account_type ==1) {
              ?>
              <li><a href="<?php echo base_url('home/acc'); ?>">Tài khoản</a></li>
              <?php
            }
          ?>
        </ul>
      </li>
      <li><a><i class="fa fa-edit"></i> Báo cáo<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <?php if ($account_type > 2) { ?>
          <li><a href="<?php echo base_url('my_report/add_report') ?>">Viết báo cáo</a></li>
          <li><a href="<?php echo base_url('my_report/index') ?>">Báo cáo của tôi</a></li>
          <?php }?>
          <?php if ($account_type == 3) { ?>
          <li><a href="<?php echo base_url('my_report/check_report') ?>">Duyệt báo cáo</a></li>
          <?php } ?>
          <?php if ($account_type < 3) { ?>
          <li><a>Xem báo cáo<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li class="sub_menu"><a href="<?php echo base_url('view_report/index') ?>">Báo cáo hôm nay</a></li>
              <li><a href="#level2_1">Toàn bộ báo cáo</a></li>
            </ul>
          </li>
          <?php } ?>
        </ul>
      </li>
      <li><a><i class="fa fa-edit"></i> Nhiệm vụ<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <?php if ($account_type < 4) { ?>
          <li><a href="form.html">Tạo nhiệm vụ</a></li>
          <?php }?>
          <?php if ($account_type ==4) {?>
          <li><a href="<?php echo base_url('my_mission/index') ?>">Nhiệm vụ của tôi</a></li>
          <?php }?>
        </ul>
      </li>
      <li><a><i class="fa fa-edit"></i> Dự án<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?php echo base_url('project/index') ?>">Tổng quan</a></li>
          <li><a href="<?php echo base_url('project/index') ?>">Xem danh sách dự án</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-edit"></i> Danh sách nhân viên<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="form.html">Xem danh sách dự án</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-edit"></i> Đánh giá<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="form.html">Xem đánh giá</a></li>
        </ul>
      </li>
    </ul>
  </div>

</div>
            <!-- /sidebar menu -->