<?php
include "./config/config.php";
include "./config/connect.php";
include "./config/query.php";
if (!isset($gid)) {
	$gid = "";
}
if ($mode == "cal" ) {
	if ( $gid == "" ) {
		echo "empty required filed";
	}else {
		$food_list = array();
		$total_cal = 0;
		//10|^|100,2|^|50 ...
		if ( strpos( $gid , "," ) === false) { //1 item
			$food_list[0] = $gid;
		}else {
			$food_list = explode( "," , $gid );
		}
		for ( $i = 0 ; $i < count( $food_list ) ; $i++ ) {
			$food_arr =array();
			$food_arr = explode( "|^|" , $food_list[$i] );
			if ( $food_arr[1] > 0 ) {
				
				$food_info = getdata("select * from Food where FoodID = '$food_arr[0]' " , $conn );
				$cal_res = $food_info["Calories"] * $food_arr[1];
				$total_cal += $cal_res;
			}
		}
		if ($total_cal > 0 ) {
			echo number_format( $total_cal );
		}
	}
}elseif ($mode == "add" ) {
	$food_list = array();
	$total_cal = 0;
	if ( strpos( $gid , "," ) === false) { //1 item
		$food_list[0] = $gid;
	}else {
		$food_list = explode( "," , $gid );
	}

	for ( $i = 0 ; $i < count( $food_list ) ; $i++ ) {
		$food_arr =array();
		$food_arr = explode( "|^|" , $food_list[$i] );
		if ( $food_arr[1] > 0 ) {
			$sql = "insert into DietFoods(`UserID`,`Meal`,`Date`,`FoodID`,`Quantity`) values( '" . $_SESSION["sn_idx"] . "' , '$Meal' , '$cDate1' , '$food_arr[0]' , '$food_arr[1]')";
			$res = mysqli_query( $conn , $sql );
		}
	}
	echo "<script>location.href='./calendar.php?sdate=$cDate1';</script>";
}elseif ($mode == "edit" ) {
	$sql_del = "delete from DietFoods where UserID='" . $_SESSION["sn_idx"] . "' and Meal='$Meal' and `Date`='$cDate1'";
	$res = mysqli_query($conn , $sql_del);
	$food_list = array();
	$total_cal = 0;
	if ( strpos( $gid , "," ) === false) { //1 item
		$food_list[0] = $gid;
	}else {
		$food_list = explode( "," , $gid );
	}

	for ( $i = 0 ; $i < count( $food_list ) ; $i++ ) {
		$food_arr =array();
		$food_arr = explode( "|^|" , $food_list[$i] );
		if ( $food_arr[1] > 0 ) {
			$sql = "insert into DietFoods(`UserID`,`Meal`,`Date`,`FoodID`,`Quantity`) values( '" . $_SESSION["sn_idx"] . "' , '$Meal' , '$cDate1' , '$food_arr[0]' , '$food_arr[1]')";
			$res = mysqli_query($conn , $sql);
		}
	}
	echo "<script>location.href='./calendar.php?sdate=$cDate1';</script>";
}elseif ($mode == "del" ) {
	$sql_del = "delete from DietFoods where UserID='" . $_SESSION["sn_idx"] . "' and Meal='$rm' and Date='$sdate' ";
	$res = mysqli_query( $conn , $sql_del );
	//echo "<script>location.href='./calendar.php?sdate=$cDate1';</script>";
	echo "<script>history.back();</script>";
}
?>