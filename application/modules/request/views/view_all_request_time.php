<div class="row">
<?php //pre($task_info)?>
<?php if ($message){$this->load->view('layout/message',$this->data_layout); }?>
<?php 
$start_date = strtotime($task_info->start_date);
$newformat_start_date = date('m-d-Y',$start_date);
$end_date = strtotime($task_info->end_date);
$newformat_end_date = date('m-d-Y',$end_date);

$start_date_new = strtotime($task_info->new_start_date);
$newformat_start_date_new = date('m-d-Y',$start_date_new);
$end_date_new = strtotime($task_info->new_end_date);
$newformat_end_date_new = date('m-d-Y',$end_date_new);
$employee_name = $this->home_model->get_fullname_employee($list_request[0]->create_by);
//pre($task_info->create_by);
?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Thông tin yêu cầu <small></small></h2>
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

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Tên công việc</th>
              <th>Người tạo</th>
              <th>Ngày bắt đầu</th>
              <th>Ngày kết thúc</th>
              <th>Lí do</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td><?php echo $task_info->name ?></td>
              <td><?php echo $employee_name[0]->fullname;?></td>
              <td><?php echo $newformat_start_date .'--> <strong>'. $newformat_start_date_new. '</strong>' ?></td>
              <td><?php echo $newformat_end_date .'--> <strong>'. $newformat_end_date_new . '</strong>'?></td>
              <td><?php echo $task_info->new_note ?></td>

            </tr>
          </tbody>
        </table>

        <form action="" method="post">
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">Giải quyết</label>
          <div class="col-md-4 col-sm-4 col-xs-12" style="padding-top: 0px">
            Đồng ý:
            <input type="radio" class="flat" name="solve" id="status2" checked value="2" />
            Không Đồng ý:
            <input type="radio" class="flat" name="solve" id="status2" checked value="1" />

          </div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" class="btn btn-success">OK</button>
            </div>
          </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>