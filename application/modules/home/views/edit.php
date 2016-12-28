<h1>Sửa thông tin tài khoản : <?php echo $info_user->username ?></h1>
<div class="row">
<div class="col-md-9">
	<p style="color:red; font-weight:600"><?php echo validation_errors(); ?></p>
	<form class="form-horizontal form-label-left input_mask"  method="post" action="">

	  <div class="form-group">
	    <label class="control-label col-md-2 col-sm-2 col-xs-12">Tên đăng nhập <span class="required">*</span>
	    </label>
	    <div class="col-md-4 col-sm-4 col-xs-12">
	      <input type="text" class="form-control" readonly="readonly" name="username" value="<?php echo $info_user->username ?>" placeholder="<?php echo $info_user->username ?>">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-md-2 col-sm-2 col-xs-12">Mật khẩu
	    </label>
	    <div class="col-md-4 col-sm-4 col-xs-12">
	      <input type="password" class="form-control" placeholder="************" name ="password" value="">
	    </div>
	   	<label class="control-label col-md-2 col-sm-2 col-xs-12">Tên đầy đủ <span class="required">*</span>
	    </label>
	    <div class="col-md-4 col-sm-4 col-xs-12">
	      <input type="text" class="form-control" required="required" placeholder="<?php echo $info_employee->fullname ?>" name ="fullname" value="<?php echo $info_employee->fullname ?>">
	    </div>
	  </div>

	  <div class="form-group">
	    <label class="control-label col-md-2 col-sm-2 col-xs-12">Email <span class="required">*</span>
	    </label>
	    <div class="col-md-4 col-sm-4 col-xs-12">
	      <input type="text" class="form-control" required="required" placeholder="<?php echo $info_employee->email ?>" name = "email" value="<?php echo $info_employee->email ?>">
	    </div>
	   	<label class="control-label col-md-2 col-sm-2 col-xs-12">Phone <span class="required">*</span>
	    </label>
	    <div class="col-md-4 col-sm-4 col-xs-12">
	      <input type="text" class="form-control" required="phone" placeholder="<?php echo $info_employee->fullname ?>" name="phone" value="<?php echo $info_employee->phone ?>">
	    </div>
	  </div>
	  <div class="form-group">
	   	<label class="control-label col-md-2 col-sm-2 col-xs-12">Skype
	    </label>
	    <div class="col-md-4 col-sm-4 col-xs-12">
	      <input type="text" class="form-control" placeholder="<?php echo $info_employee->skype ?>" name="skype" value="<?php echo $info_employee->skype ?>">
	    </div>
	    <label class="control-label col-md-2 col-sm-2 col-xs-12">Facebook
	    </label>
	    <div class="col-md-4 col-sm-4 col-xs-12">
	      <input type="text" class="form-control" placeholder="<?php echo $info_employee->facebook ?>" name="facebook" value="<?php echo $info_employee->facebook ?>">
	    </div>
	  </div>
	  <div class="form-group">
	  </div>
	  <div class="form-group">
      <label class="control-label col-md-2 col-sm-2 col-xs-12">Giới tính</label>
	  <div class="col-md-4 col-sm-4 col-xs-12" style="padding-top:8px">
	    Nam:
	    <input type="radio" class="flat" name="sex" id="genderM" value="1" <?php if ($info_employee->sex ==1) echo 'checked=""'; ?> required /> 
	    Nữ:
	    <input type="radio" class="flat" name="sex" id="genderF" value="2"  <?php if ($info_employee->sex ==2) echo 'checked=""'; ?> />
	  </div>
	  <?php if (intval($account_type<4)) {?>
	  <label class="control-label col-md-2 col-sm-2 col-xs-12">Tình trạng acc</label>
	  <div class="col-md-4 col-sm-4 col-xs-12" style="padding-top:8px">
	    Kích hoạt:
	    <input type="radio" class="flat" name="status" id="statusOn" value="1" <?php if ($info_user->status ==1) echo 'checked=""'; ?> required /> 
	    Khóa:
	    <input type="radio" class="flat" name="status" id="statusOff" value="0"  <?php if ($info_user->status ==0) echo 'checked=""'; ?> />
	  </div>
	  <?php }?>
      </div>
      <?php 
      $time = strtotime($info_employee->birthday);
	  $newformat_birthday = date('m-d-Y',$time);

      ?>
	  <div class="form-group">
	    <label class="control-label col-md-2 col-sm-2 col-xs-12">Ngày sinh <span class="required">*</span>
	    </label>
	    <div class="col-md-4 col-sm-4 col-xs-12">
	      <input id="birthday" name="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $newformat_birthday ?>">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-md-2 col-sm-2 col-xs-12">Địa chỉ </label>
	    <div class="col-md-8 col-sm-8 col-xs-12">
	      <input type="text" class="form-control" id="address" name="address" value="<?php echo $info_employee->address ?>" placeholder="<?php echo $info_employee->address ?>">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-md-2 col-sm-2 col-xs-12">Cấp hiện tại</label>
		  <div class="col-md-2 col-sm-2 col-xs-12" style="padding-top:8px">
		    <p>
		    <input type="radio"  name="old_account_type" id="old_level" value="<?php echo $info_user->account_type ?>" checked="" required /> <?php echo action_acc_type($info_user->account_type) ?></p> 
		  </div>
		  <label class="control-label col-md-2 col-sm-2 col-xs-12">Cấp độ mới</label>
		  <div class="col-md-2 col-sm-2 col-xs-12" style="padding-top:8px">
		    <p>
		    <input type="radio"  name="account_type" id="nhanvien" value="4" <?php if($info_user->account_type==4) echo 'checked=""' ?> required /> Nhân viên</p> 
		    <p>
		    <input type="radio"  name="account_type" id="truongphong" value="3" <?php if($info_user->account_type==3) echo 'checked=""' ?> /> Trưởng Phòng</p> 
		    <p>
		    <input type="radio"  name="account_type" id="lanhdao" value="2" <?php if($info_user->account_type==2) echo 'checked=""' ?> /> Ban Lãnh Đạo</p> 
		  </div>
	  </div>
	  <?php //pre($list_center) ?>

	  <?php 
	  $a = $b = $c = 'none';
	  	if ($info_user->account_type==4) {
	  		$a ='block';
	  	}
	  	if ($info_user->account_type==3) {
	  		$b ='block';
	  	}
	  	if ($info_user->account_type==2) {
	  		$c ='block';
	  	}
	  ?>
  	  <?php 
  	  //pre($list_room);
      	for ($i=0; $i < count($list_room) ; $i++) { 
      		# code...
      		$a_room[$i] = $list_room[$i]->department_name;
      	}

      ?>

	  <div class="form-group" style="position:relative;">
	    <label class="control-label col-md-3 col-sm-3 col-xs-12">Quyền truy nhập</label>
	    <div class="col-md-6 col-sm-6 col-xs-12"  id='combo_nhanvien' style='display:<?php echo $a ?>;transition:all 1s;position:absolute;left: 27%;'>
	      <select class="select2_group form-control" name="room">
	      <?php 
	        foreach ($list_center as $r) {
	          ?>
	          <?php //echo count($r->child_room) ?>
			  <optgroup label="<?php echo $r['name']; ?>">
	            <?php foreach ($r['child_room'] as $x) { ?>

	            <option value="<?php echo $x['id']?>" <?php if((in_array($x['name'], $a_room)) == true) echo "selected"  ?> ><?php echo $x['name']?></option>
	            <?php } ?>
	          </optgroup>
	          <?php
	          
	        }
	      ?>
	      </select>
	    </div>
	   	<div class="col-md-6 col-sm-6 col-xs-12" id='combo_truongphong' style='display:<?php echo $b ?>;transition:all 1s;position:absolute;left: 27%;'>
	      <select class="select2_multiple form-control" multiple="multiple" name="rooms[]">

	      <?php 

	        foreach ($list_center as $r) {
	          ?>
	          <?php //echo count($r->child_room) ?>
	          <optgroup label="<?php echo $r['name']; ?>">
	            <?php foreach ($r['child_room'] as $x) { ?>

	            <option value="<?php echo $x['id']?>" <?php if((in_array($x['name'], $a_room)) == true) echo "selected"  ?> ><?php echo $x['name']?></option>
	            <?php } ?>
	          </optgroup>

	          <?php

	        }
	      ?>
	      </select>
	    </div>
	    <div class="col-md-6 col-sm-6 col-xs-12" id='combo_lanhdao' style='display:<?php echo $c ?>;transition:all 1s;position:absolute;left: 27%;'>
			<input type="text" class="form-control" readonly="readonly" placeholder="Toàn bộ các phòng" name="lead">
	    </div>
	  </div>
	  <div class="ln_solid"></div>
	  <div class="form-group">
	    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
	      <button type="reset" class="btn btn-primary">Tạo lại dữ liệu</button>
	      <button type="submit" class="btn btn-success">Cập nhật</button>
	    </div>
	  </div>

	</form>
</div>
</div>