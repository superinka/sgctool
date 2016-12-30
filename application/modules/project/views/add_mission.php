<h1>Trạng tạo mới nhiệm vụ</h1>
<h3>Dự án : <?php echo $info_project->project_name; ?></h3>
<div class="row">
	<div class="col-md-9">
		<p style="color:red; font-weight:600"><?php echo validation_errors(); ?></p>
		<form class="form-horizontal form-label-left input_mask"  method="post" action="">

		  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
		    <input type="text" required="required" class="form-control has-feedback-left" name="mission_name" id="mission_name" value="<?php echo set_value("mission_name")?>" placeholder="Tên nhiệm vụ">
		    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
		  </div>

		  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
		    <input type="text" class="form-control" id="description" name="description" value="<?php echo set_value("description")?>" placeholder="Description">
		    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-md-2 col-sm-2 col-xs-12">Ngày bắt đầu <span class="required">*</span>
		    </label>
		    <div class="col-md-4 col-sm-4 col-xs-12">
		      <input id="start_date" name="start_date" value="<?php echo set_value("start_date")?>" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
		    </div>
		   	<label class="control-label col-md-2 col-sm-2 col-xs-12">Ngày kết thúc <span class="required">*</span>
		    </label>
		    <div class="col-md-4 col-sm-4 col-xs-12">
		      <input id="end_date" name="end_date" value="<?php echo set_value("end_date")?>" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
		    </div>
		  </div>
		  
<!-- 		  <div class="form-group">
	      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tình trạng</label>
		  <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top:8px">
		    Đang chạy:
		    <input type="radio" class="flat" name="status" id="status1" value="1" checked="" required /> 
		    Hoàn thành:
		    <input type="radio" class="flat" name="status" id="status2" value="2" />
		   	Hủy Bỏ:
		    <input type="radio" class="flat" name="status" id="status3" value="3" />
		  </div>
	      </div> -->
<!-- 	      <div class="form-group">
	      <label class="control-label col-md-2 col-sm-2 col-xs-12">Tiến độ</label>
		  <div class="col-md-4 col-sm-4 col-xs-12">
			<input id="progress" name="progress" value="<?php echo set_value("progress")?>" class="form-control col-md-7 col-xs-12" required="required" type="text">
		  </div>
	      </div> -->
	      <?php if(count($list_department_employee) > 0){?>
		  <div class="form-group">
		      <label class="control-label col-md-2 col-sm-2 col-xs-12">Nhiệm vụ dành cho</label>
			  <div class="col-md-6 col-sm-6 col-xs-12">
				<select class="select2_group form-control" name="mission_user">
				  <?php 

			        foreach ($list_department_employee as $r) {
			          ?>
			          <?php //echo count($r->child_room) ?>
			          <optgroup label="<?php echo $r->department_name; ?>">
			            <?php foreach ($r->list_employee as $x) { ?>

			            <option value="<?php echo $x->user_id ?>" ><?php echo $x->fullname ?></option>
			            <?php } ?>
			          </optgroup>

			          <?php

			        }
			      ?>
				</select>
			   </div>
		   </div>
		   <?php }?>
		  <div class="ln_solid"></div>
		  <div class="form-group">
		    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
		      <button type="reset" class="btn btn-primary">Reset</button>
		      <button type="submit" class="btn btn-success">Tạo</button>
		    </div>
		  </div>

		</form>
	</div>
</div>