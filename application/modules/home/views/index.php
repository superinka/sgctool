<!-- top tiles -->
<div class="row tile_count">
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
  <span class="count_top"><i class="fa fa-user"></i> Tổng nhân viên</span>
  <div class="count"><?php echo $total; ?></div>
</div>
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
  <span class="count_top"><i class="fa fa-user"></i> Nhân viên Nam</span>
  <div class="count green"><?php echo $male; ?></div>
</div>
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
  <span class="count_top"><i class="fa fa-user"></i> Nhân viên nữ</span>
  <div class="count"><?php echo $female ?></div>
</div>
</div>
<!-- /top tiles -->

<div class="row">
	<div class="col-md-12">
	<?php 
		if ($account_type ==1) {
			# code...

			?>
			<a href="<?php echo base_url('home/acc/add'); ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm nhân viên</button></a>
			<?php
		}
		else if ($account_type ==2) {
			# code...

			?>
			<a href="<?php echo base_url('home/acc/add'); ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm nhân viên</button></a>
			<?php
		}
		else if ($account_type ==3) {
			# code...

			?>
			<a href="<?php echo base_url('home/acc/add'); ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm nhân viên</button></a>
			<?php
		}

		else {

		}

		//echo $account_type;
	?>


	</div>
</div>

<?php if ($message){$this->load->view('layout/message',$this->data_layout); }?>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>List nhân viên</small></h2>
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
            <th>Nhân viên</th>
            <th>Số điện thoại</th>
            <th>Sinh nhật</th>
            <th>Cấp độ</th>
            <th>Phòng</th>
            <th class=""><i class="fa fa-gear" style="float:right!important;"></i></th>
          </tr>
        </thead>


        <tbody>
          <?php foreach ($list_employee as $row){ ?>
          <tr>
            <td><input type="checkbox" class="flat" name="table_records"></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['phone'] ?></td>
            <td><?php echo $row['birthday'] ?></td>
            <td><?php echo action_acc_type($row['account_type']) ?></td>
            <td>
            	<?php
            	if($row['rooms']['0']!=null){
            		foreach ($row['rooms'] as $r) {
            			echo '<p>'.$r.'</p>';

            		} 

            	}
            	if ($row['rooms']['0']==null) {
            		echo 'Chưa rõ';
            	} 

            	?>
            </td>
            <td>
              <ul class="panel_toolbox" style="list-style:none;">
                <li><a href="<?php echo base_url('home/view/'.$row['user_id'])?>"><i class="fa fa-search-plus"></i></a></li>
                <?php if (intval($account_type) < 4) { ?>
                <li><a href="<?php echo base_url('home/edit/'.$row['user_id'])?>"><i class="fa fa-wrench"></i></a></li>
                <?php }?>
                <?php if ($account_type ==1) { ?>
                <li><a  onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('home/delete/'.$row['user_id'])?>"><i class="fa fa-close"></i></a></li>
                <?php }?>
                
              </ul>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  </div>
</div>



