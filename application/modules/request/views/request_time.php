<div class="row">
<?php if ($message){$this->load->view('layout/message',$this->data_layout); }?>
<?php 
$start_date_old = strtotime($old_info->start_date);
$newformat_start_date_old = date('m-d-Y',$start_date_old);
$end_date_old = strtotime($old_info->end_date);
$newformat_end_date_old = date('m-d-Y',$end_date_old);
?>
<div class="col-md-12">
<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
		    <h2>Dữ liệu cũ <small><?php echo $type ?></small></h2>
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
		    <br>
		    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" action="" method="post">

		      <div class="form-group">
		        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên <span class="required">*</span>
		        </label>
		        <div class="col-md-9 col-sm-9 col-xs-12">
		          <input type="text" id="old_name" name="old_name" readonly="readonly" placeholder="<?php echo $old_info->name ?>" value="" class="form-control col-md-7 col-xs-12">
		        </div>
		      </div>
		      <div class="form-group">
		        <label class="control-label col-md-2 col-sm-2 col-xs-12">Ngày bắt đầu <span class="required">*</span>
		        </label>
		        <div class="col-md-4 col-sm-4 col-xs-12">
		          <input type="text" id="old_name" name="old_name" readonly="readonly" placeholder="<?php echo $newformat_start_date_old ?>" value="" class="form-control col-md-7 col-xs-12">
		        </div>
		       	<label class="control-label col-md-2 col-sm-2 col-xs-12">Ngày kết thúc <span class="required">*</span>
		        </label>
		        <div class="col-md-4 col-sm-4 col-xs-12">
		          <input type="text" id="old_name" name="old_name" readonly="readonly" placeholder="<?php echo $newformat_end_date_old ?>" value="" class="form-control col-md-7 col-xs-12">
		        </div>
		      </div>
		      <div class="ln_solid"></div>

		    </form>
		  </div>
		</div>
	</div>

	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
		    <h2>Dữ liệu mới <small><?php echo $type ?></small></h2>
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
		    <br>
		    <form class="form-horizontal form-label-left" action="" method="post">

		      <div class="form-group">
		        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên <span class="required">*</span>
		        </label>
		        <div class="col-md-9 col-sm-9 col-xs-12">
		          <input type="text" id="new_name" name="new_name" readonly="readonly" placeholder="<?php echo $old_info->name ?>" value="" class="form-control col-md-7 col-xs-12">
		        </div>
		      </div>
		      <div class="form-group">
		        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Lí do <span class="required">*</span></label>
		        <div class="col-md-9 col-sm-9 col-xs-12">
		          <input id="new_note" class="form-control col-md-7 col-xs-12" type="text" required="required" name="new_note">
		        </div>
		      </div>
		      <div class="form-group">
		        <label class="control-label col-md-2 col-sm-2 col-xs-12">Ngày bắt đầu <span class="required">*</span>
		        </label>
		        <div class="col-md-4 col-sm-4 col-xs-12">
		          <input id="new_start_date" name="new_start_date" value="<?php echo $newformat_start_date_old ?>" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
		        </div>
		       	<label class="control-label col-md-2 col-sm-2 col-xs-12">Ngày kết thúc <span class="required">*</span>
		        </label>
		        <div class="col-md-4 col-sm-4 col-xs-12">
		          <input id="new_end_date" name="new_end_date" value="<?php echo $newformat_end_date_old ?>" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
		        </div>
		      </div>
		      <div class="ln_solid"></div>
		      <div class="form-group">
		        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		          <button type="reset" class="btn btn-primary">Cancel</button>
		          <button type="submit" class="btn btn-success">Submit</button>
		        </div>
		      </div>

		    </form>
		  </div>
		</div>
	</div>
</div>
</div>
</div>