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

	function check_status_mission($i) {
		if ($i == 1) {
			$rs = 'Đang chạy';
		}

		else if ($i == 2) {
			$rs = 'Hủy Bỏ';
		}
		return $rs;

	}

	function check_status_report($i) {
		if ($i == 0) {
			$rs = '<span style="color:#d9534f;font-weight:600">Đang chờ</span>';
		}

		else if ($i == 1) {
			$rs = '<span style="color:#26B99A;font-weight:600">Đã duyệt</span>';
		}
		return $rs;

	}

	function check_progress_report($i) {
		if ($i == 0) {
			$rs = '<span style="color:#d9534f;font-weight:600">Chưa hoàn thành</span>';
		}

		else if ($i == 100) {
			$rs = '<span style="color:#26B99A;font-weight:600">Hoàn Thành</span>';
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

	function color_room($room_name) {
		switch ($room_name) {
			case 'Phòng Lập Trình':
				return '#F39C12';
				break;
			case 'Phòng Hệ Thống':
				return '#9B59B6';
				break;
			case 'Phòng Web':
				return '#E74C3C';
				break;
			case 'Phòng Đồ Họa':
				return '#26B99A';
				break;
			case 'Phòng Vận Hành':
				return '#1ABB9C';
				break;

			default:
				# code...
				return "#BDC3C7";
				break;
		}
	}

	function identical_values( $arrayA , $arrayB ) { 

    sort( $arrayA ); 
    sort( $arrayB ); 

    return $arrayA == $arrayB; 
	}

	function time_elapsed_string($eventTime){
	    $etime = time() - $eventTime;

	    if ($etime < 1)
	    {
	        return 'Vừa xong';
	    }

	    $a = array( 365 * 24 * 60 * 60  =>  'năm',
	                 30 * 24 * 60 * 60  =>  'tháng',
	                      24 * 60 * 60  =>  'ngày',
	                           60 * 60  =>  'giờ',
	                                60  =>  'phút',
	                                 1  =>  'giây'
	                );
	    $a_plural = array( 'năm'    => 'năm',
	                       'tháng'  => 'tháng',
	                       'ngày'   => 'ngày',
	                       'giờ'    => 'giờ',
	                       'phút'   => 'phút',
	                       'giây'   => 'giây'
	                );

	    foreach ($a as $secs => $str)
	    {
	        $d = $etime / $secs;
	        if ($d >= 1)
	        {
	            $r = round($d);
	            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' trước';
	        }
	    }
	}


	function type_of_request($type){
		switch ($type) {
			case 'c101':
				return 'Xin thêm thời gian' ;
				break;
			case 'c102':
				return 'Xin thêm thời gian' ;
				break;
			case 'c201':
				return 'Xin sửa tiến độ' ;
				break;							
			default:
				# code...
				break;
		}
	}
	function link_of_request($type){
		switch ($type) {
			case 'c101':
				return 'request/view_all_request_time' ;
				break;
			case 'c102':
				return 'request/view_all_request_time' ;
				break;
			case 'c201':
				return 'request/view_all_request_progress' ;
				break;							
			default:
				# code...
				break;
		}
	}
	function generateRandomString($length = 10) {
    	return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
	}



?>
