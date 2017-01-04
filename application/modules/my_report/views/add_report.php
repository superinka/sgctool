<div class="row">
<?php
//pre($list_report_today);

?>
	<?php if ($list_report_today==null) { ?>
		<?php echo '<p>Bạn chưa có report nào hôm nay !</p>'; ?>
	<?php }?>
	<?php  if ($list_report_today!=null) {?>
	<p>Bạn đã báo cáo <strong><?php echo count($list_report_today); ?></strong> lần hôm nay - 
	<?php echo $today ?>
	</p>
	<?php }?>
	<form class="form-horizontal form-label-left input_mask"  method="post" action="">

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Viết báo cáo <small>hôm nay <?php echo $today ?> </small></h2>
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
                          <input type="text" id="description" name="description" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Note <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<textarea id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tiến độ</label>
                        <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
                          Hoàn thành:
                          <input type="radio" class="flat" name="progress" id="status1" value="100" checked="" required /> 
                          Chưa Hoàn thành:
                          <input type="radio" class="flat" name="progress" id="status2" value="0" />
                        </div>
                      </div>
                      <div class="form-group">

                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Thời gian làm</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select class="select2_single form-control" required="required" name="time_spend" tabindex="-1">
                            <option></option>
                            <option value="1">1 giờ</option>
                            <option value="2">2 giờ</option>
                            <option value="3">3 giờ</option>
                            <option value="4">4 giờ</option>
                            <option value="5">5 giờ</option>
                            <option value="6">6 giờ</option>
                            <option value="7">7 giờ</option>
                            <option value="8">8 giờ</option>
                            <option value="9">9 giờ</option>
                            <option value="10">10 giờ</option>
                            <option value="11">11 giờ</option>
                            <option value="12">12 giờ</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Chọn công việc báo cáo</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select class="select3_single form-control" required="required" name="task" tabindex="-1">
                          <?php foreach ($list_task_active as $key => $value) { ?>
                          	<option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
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