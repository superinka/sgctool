<!-- top tiles -->
<div class="row tile_count">
<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
  <span class="count_top"><i class="fa fa-user"></i> Tổng tài khoản</span>
  <div class="count"><?php echo $total_acc; ?></div>
</div>

</div>
<!-- top tiles -->

<?php //echo $account_type; ?>
<?php if ($account_type == 1) {
  # code...
  ?>
  <a href="<?php echo base_url('home/acc/add'); ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm tài khoản</button></a>
  <?php
} ?>

<?php if ($message){$this->load->view('layout/message',$this->data_layout); }?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>List tài khoản</small></h2>
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
            <th>ID</th>
            <th>Tên dăng nhập</th>
            <th>Ngày tạo</th>
            <th>Tình trạng</th>
            <th>Kiểu Acc</th>
          </tr>
        </thead>


        <tbody>
          <?php foreach ($list_acc as $row){ ?>
          <tr>
            <td><input type="checkbox" class="flat" name="table_records"></td>
            <td><?php echo $row->id ?></td>
            <td><?php echo $row->username ?></td>
            <td><?php echo $row->create_date ?></td>
            <td><?php echo action_status($row->status) ?></td>
            <td><?php echo action_acc_type($row->account_type) ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  </div>
</div>

