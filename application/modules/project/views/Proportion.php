<div style="color:red; font-weight:600"><?php echo validation_errors(); ?></div>
<?php //pre($list_proportion_department); ?>
<div class="row">
	<div class="col-md-9">
	<form method="post" action="">
		<?php foreach ($list_proportion_department as $key => $value) { ?>
		<div class="row">
		<div class="form-group">
		    <label class="control-label col-md-3 col-sm-3 col-xs-12">Phòng <?php echo $value->department ?>
		    	<span class="required">*</span>
		    </label>
		    <div class="col-md-4 col-sm-4 col-xs-12">
		      <input id="<?php echo $key ?>" name="room[<?php echo $key ?>]" value="<?php $value ?>" class="form-control col-md-7 col-xs-12" required="required" type="text">
		    </div>
		</div>
		</div>		
		<?php } ?>
		
		<div class="ln_solid"></div>
			<div class="form-group">
			<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
			  <button type="submit" class="btn btn-success">Save</button>
			</div>
		</div>
	</form>
	</div>
</div>