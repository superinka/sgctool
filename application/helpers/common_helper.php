<?php 
	function public_url($url=''){
		return base_url('public/'.$url);
	}

	function admin_theme($url=''){
		return base_url('public/admin_temp'.$url);
	}
	
	function pre($list,$exit=true){
		echo "<pre>";
		print_r($list);
		
		if($exit){
			die();
		}
	}

	function action_gioitinh($gioitinh) {
		if ($gioitinh == 1) {
			$gt = 'Nam';
		}

		else if ($gioitinh == 2) {
			$gt = 'Nữ';
		}

		return $gt;

	}

	function action_acc_type($at) {
		if ($at == 1) {
			$rs = '<b style ="color:red">Superadmin</b>';
		}

		else if ($at == 2) {
			$rs = '<b style ="color:green">Ban Lãnh Đạo</b>';
		}

		else if ($at == 3) {
			$rs = '<b style ="color:blue">Trưởng Phòng</b>';
		}

		else if ($at == 4) {
			$rs = 'Nhân viên';
		}

		return $rs;

	}

	function action_status($i) {
		if ($i == 1) {
			$rs = 'Kích hoạt';
		}

		else if ($i == 0) {
			$rs = 'Bị Khóa';
		}

		return $rs;

	}

	function check_status_project($i) {
		if ($i == 1) {
			$rs = 'Đang chạy';
		}

		else if ($i == 2) {
			$rs = 'Hoàn Thành';
		}
		else if ($i == 3) {
			$rs = 'Hủy Bỏ';
		}

		return $rs;

	}

	function networkdays($s, $e, $holidays = array()) {
	    // If the start and end dates are given in the wrong order, flip them.    
	    if ($s > $e)
	        return networkdays($e, $s, $holidays);

	    // Find the ISO-8601 day of the week for the two dates.
	    $sd = date("N", $s);
	    $ed = date("N", $e);

	    // Find the number of weeks between the dates.
	    $w = floor(($e - $s)/(86400*7));    # Divide the difference in the two times by seven days to get the number of weeks.
	    if ($ed >= $sd) { $w--; }        # If the end date falls on the same day of the week or a later day of the week than the start date, subtract a week.

	    // Calculate net working days.
	    $nwd = max(6 - $sd, 0);    # If the start day is Saturday or Sunday, add zero, otherewise add six minus the weekday number.
	    $nwd += min($ed, 5);    # If the end day is Saturday or Sunday, add five, otherwise add the weekday number.
	    $nwd += $w * 5;        # Add five days for each week in between.

	    // Iterate through the array of holidays. For each holiday between the start and end dates that isn't a Saturday or a Sunday, remove one day.
	    foreach ($holidays as $h) {
	        $h = strtotime($h);
	        if ($h > $s && $h < $e && date("N", $h) < 6)
	            $nwd--;
	    }

	    return $nwd;
	}

	function percent_day($a, $b){

		if($a>$b) {
			return $rs = 100;
		}

		else {
			$rs = ($a/$b)*100;
		}

		return $rs;

	}


?>