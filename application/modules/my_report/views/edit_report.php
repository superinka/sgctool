
<?php //pre($list_department_employee);  ?>
<div class="row">
	<div class="col-md-9">
		<p style="color:red; font-weight:600"><?php echo validation_errors(); ?></p>
			<form class="form-horizontal form-label-left input_mask"  method="post" action="">

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Sửa báo cáo <small>hôm nay <?php echo $today ?> </small></h2>
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
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mô tả nhanh <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="description" name="description" required="required" value="<?php echo $report_info->description ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Note <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<textarea class="form-control" rows="3" name ="message" value="<?php echo $report_info->note ?>" placeholder="<?php echo $report_info->note ?>"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tiến độ</label>
                        <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
                          Hoàn thành:
                          <input type="radio" class="flat" name="progress" id="status1" value="100" <?php if ($report_info->progress==100) {echo 'checked=""';} ?> required /> 
                          Chưa Hoàn thành:
                          <input type="radio" class="flat" name="progress" id="status2" value="0" <?php if ($report_info->progress==0) {echo 'checked=""';} ?>/>
                        </div>
                      </div>
                      <div class="form-group">

                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Thời gian làm</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select class="select2_single form-control" required="required" name="time_spend" tabindex="-1">
                          <?php for ($i=0; $i < 12 ; $i++) { ?>
                          	<option value="<?php echo $i ?>" <?php if($i == $report_info->time_spend) {echo 'selected';} ?> ><?php echo $i ?>giờ</option>
                          <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Chọn công việc báo cáo</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select class="select3_single form-control" required="required" name="task" tabindex="-1">
                          <?php foreach ($list_task_active as $key => $value) { ?>
                          	<option value="<?php echo $value->id ?>" <?php if($value->id == $report_info->task_id) {echo 'selected';} ?> ><?php echo $value->name ?></option>
                          <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
	</form>
	</div>
</div>