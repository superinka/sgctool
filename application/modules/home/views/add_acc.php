<h1>Trạng tạo mới nhân viên</h1>
<div class="col-md-9">
	<p style="color:red; font-weight:600"><?php echo validation_errors(); ?></p>
	<form class="form-horizontal form-label-left input_mask"  method="post" action="">

	  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
	    <input type="text" required="required" class="form-control has-feedback-left" name="nusername" id="nusername" value="<?php echo set_value("nusername")?>" placeholder="Tên đăng nhập">
	    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
	  </div>

	  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
	    <input type="text" required="required" class="form-control" id="nfullname" name="nfullname" value="<?php echo set_value("nfullname")?>" placeholder="Tên Đầy Đủ">
	    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
	  </div>
	  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
	    <input type="password" required="required" class="form-control has-feedback-left" id="npassword" name="npassword" placeholder="Mật khẩu">
	    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
	  </div>

	  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
	    <input type="text" required="required" class="form-control has-feedback-left" id="nemail" name ="nemail" value="<?php echo set_value("nemail")?>" placeholder="Email">
	    <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
	  </div>

	  <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
	    <input type="text" class="form-control" id="nphone" name="nphone" value="<?php echo set_value("nphone")?>" placeholder="Phone">
	    <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
	  </div>
	  <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
	    <input type="text" class="form-control has-feedback-left" id="nskype" name="nskype" value="<?php echo set_value("nskype")?>" placeholder="Skype">
	    <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
	  </div>

	  <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
	    <input type="text" class="form-control" id="nfacebook" name="nfacebook" value="<?php echo set_value("nfacebook")?>" placeholder="Facebook">
	    <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
	  </div>

	  <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Giới tính</label>
	  <div class="col-md-4 col-sm-4 col-xs-12" style="padding-top:8px">
	    Nam:
	    <input type="radio" class="flat" name="sex" id="genderM" value="1" checked="" required /> 
	    Nữ:
	    <input type="radio" class="flat" name="sex" id="genderF" value="2" />
	  </div>
      </div>
	  <div class="form-group">
	    <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày sinh <span class="required">*</span>
	    </label>
	    <div class="col-md-4 col-sm-4 col-xs-12">
	      <input id="birthday" name="nbirthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-md-3 col-sm-3 col-xs-12">Địa chỉ </label>
	    <div class="col-md-8 col-sm-8 col-xs-12">
	      <input type="text" class="form-control" id="nphone" name="address" value="<?php echo set_value("address")?>">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-md-3 col-sm-3 col-xs-12">Cấp nhân viên</label>
		  <div class="col-md-8 col-sm-8 col-xs-12" style="padding-top:8px">
		    <p>
		    <input type="radio"  name="account_type" id="nhanvien" value="4" checked="" required /> Nhân viên</p> 
		    <p>
		    <input type="radio"  name="account_type" id="truongphong" value="3" /> Trưởng Phòng</p> 
		    <p>
		    <input type="radio"  name="account_type" id="lanhdao" value="2" /> Ban Lãnh Đạo</p> 
		  </div>
	  </div>
	  <?php //pre($list_center) ?>

	  <div class="form-group" style="position:relative;">
	    <label class="control-label col-md-3 col-sm-3 col-xs-12">Quyền truy nhập</label>
	    <div class="col-md-6 col-sm-6 col-xs-12"  id='combo_nhanvien' style='display:block;transition:all 1s;position:absolute;left: 27%;'>
	      <select class="select2_group form-control" name="room">
	      <?php 
	        foreach ($list_center as $r) {
	          ?>
	          <?php //echo count($r->child_room) ?>
			  <optgroup label="<?php echo $r['name']; ?>">
	            <?php foreach ($r['child_room'] as $x) { ?>

	            <option value="<?php echo $x['id']?>"><?php echo $x['name']?></option>
	            <?php } ?>
	          </optgroup>
	          <?php
	          
	        }
	      ?>
	      </select>
	    </div>
	   	<div class="col-md-6 col-sm-6 col-xs-12" id='combo_truongphong' style='display:none;transition:all 1s;position:absolute;left: 27%;'>
	      <select class="select2_multiple form-control" multiple="multiple" name="rooms[]">
	      <?php 
	        foreach ($list_center as $r) {
	          ?>
	          <?php //echo count($r->child_room) ?>
	          <optgroup label="<?php echo $r['name']; ?>">
	            <?php foreach ($r['child_room'] as $x) { ?>

	            <option value="<?php echo $x['id']?>"><?php echo $x['name']?></option>
	            <?php } ?>
	          </optgroup>

	          <?php
	          
	        }
	      ?>
	      </select>
	    </div>
	    <div class="col-md-6 col-sm-6 col-xs-12" id='combo_lanhdao' style='display:none;transition:all 1s;position:absolute;left: 27%;'>
			<input type="text" class="form-control" readonly="readonly" placeholder="Toàn bộ các phòng" name="lead">
	    </div>
	  </div>
	  <div class="ln_solid"></div>
	  <div class="form-group">
	    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
	      <button type="reset" class="btn btn-primary">Tạo lại dữ liệu</button>
	      <button type="submit" class="btn btn-success">Tạo</button>
	    </div>
	  </div>

	</form>
</div>