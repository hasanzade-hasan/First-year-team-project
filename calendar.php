<?php
		$page_title = "PersonalCalendar";
		$page_id = "2";
		include "./inc_header_my.php"; 
		if (!isset($sdate)) {
			$sdate = date("Y-m-d");
		}
		if (date("w" , strtotime($sdate) ) == 1 ) {
			$start_date = $sdate;
		}else {
			$start_date =  date("Y-m-d", strtotime("last Monday" , strtotime($sdate)));
		}
		//add or remove exercise
		if (isset($mode)) {
			if ( $mode == "ex" ) {
				$sql = "INSERT INTO `DietExercise`(`UserID`, `ExerciseID`, `Date`) VALUES ('".$_SESSION["sn_idx"]."','$eid','$idate')";
				$res = mysqli_query( $conn , $sql);
			}
			if ( $mode == "exdel" ) {
				$sql = "DELETE FROM `DietExercise` WHERE `UserID` ='".$_SESSION["sn_idx"]."' and `Date`= '$idate'";
				$res = mysqli_query( $conn , $sql);				
			}
		}
?>

<style>
		body {
		  background: #fafafa url(https://jackrugile.com/images/misc/noise-diagonal.png);
		  color: #444;
		  /*font: 100%/30px 'Helvetica Neue', helvetica, arial, sans-serif;*/
		  text-shadow: 0 1px 0 #fff;
		}

		strong {
		  font-weight: bold; 
		}

		table {
		  background: #f5f5f5;
		  border-collapse: separate;
		  box-shadow: inset 0 1px 0 #fff;
		  font-size: 12px;
		  line-height: 24px;
		  margin: auto;
		  text-align: left;
		  width: 125em;
		}

		th {
		  background: url(https://jackrugile.com/images/misc/noise-diagonal.png), linear-gradient(#777, #444);
		  border-left: 1px solid #555;
		  border-right: 1px solid #777;
		  border-top: 1px solid #555;
		  border-bottom: 1px solid #333;
		  box-shadow: inset 0 1px 0 #999;
		  color: white !important;
		  font-weight: bold;
		  padding: 3px 5px;
		  position: relative;
		  text-shadow: 0 1px 0 #000;  
		  text-align: center !important;
  		padding-top: 10px !important;
  		font-size: 16px !important;
		}

		th:first-child {
		  border-left: 1px solid #777;  
		  box-shadow: inset 1px 1px 0 #999;
		}

		th:last-child {
		  box-shadow: inset -1px 1px 0 #999;
		}

		td {
		  border-right: 1px solid #fff;
		  border-left: 1px solid #e8e8e8;
		  border-top: 1px solid #fff;
		  border-bottom: 1px solid #e8e8e8;
		  padding: 3px 5px;
		  position: relative;
		  transition: all 300ms;
		}

		td:first-child {
		  box-shadow: inset 1px 0 0 #fff;
		}

		td:last-child {
		  border-right: 1px solid #e8e8e8;
		  box-shadow: inset -1px 0 0 #fff;
		} 

		tr {
		  background: url(https://jackrugile.com/images/misc/noise-diagonal.png);  
		}

		tr:nth-child(odd) td {
		  background: #f1f1f1 url(https://jackrugile.com/images/misc/noise-diagonal.png);  
		}

		tr:last-of-type td {
		  box-shadow: inset 0 -1px 0 #fff; 
		}

		tr:last-of-type td:first-child {
		  box-shadow: inset 1px -1px 0 #fff;
		}

		tr:last-of-type td:last-child {
		  box-shadow: inset -1px -1px 0 #fff;
		}
		.add{
		  margin-left: 2em;
		  margin-right: -2em;
		}
		.date{
		  margin-left: -5em;
		}
		.remove{
		  margin-left: -5em;
		  margin-right: -5em;
		}
		.add_exercise{
		  margin-left: -4em;
		}
		.remove_exercise{
		  margin-right: -4em;
		  margin-left: 2em;
		}
</style>
  
  <div id = "content">
		<p>
			<button type="button" onclick = "window.location.href='./calendar.php?sdate=<?php echo date("Y-m-d",strtotime("-7 days", strtotime($sdate))); ?>'"> &lt; Prev Week </button>
			<span style="color:#fff;" ><?php echo  date("d/m/Y" , strtotime( $sdate ) );?></span>
			<button type="button" onclick = "window.location.href='./calendar.php?sdate=<?php echo date("Y-m-d",strtotime("+7 days", strtotime($sdate))); ?>'"> Next Week &gt; </button>
		</p>
  	<table>
      <thead>
        <tr>
          <th>DATE</th>
          <th>BREAKFAST</th>
          <th>LUNCH</th>
          <th>DINNER</th>
          <th>EXERCISE</th>
          <th>TOTAL CALORIES</th>
        </tr>
      </thead>
      
      <tbody>	  
		<?php
		for ( $i = 0 ; $i < 7 ; $i++ ) {
			$cal_res=0;
			if ( $i == 0 ) {
				$list_date = $start_date;
			}else {
				$list_date = date("Y-m-d",strtotime("+".$i." days", strtotime($start_date)));
			}
			$view_date = date("d/m/Y" , strtotime($list_date) );
			$remove_B = false;
			$remove_L = false;
			$remove_D = false;
			$remove_E = false;
		?>

        <tr id = "row_idx_<?php echo $i+1;?>">
          <td>
            <span class = "date"><?php echo $view_date;?></span>
            <button class = "add" type="button" onclick = "window.location.href='calculator.php?sdate=<?php echo $list_date;?>'">Add food</button>
          </td>

          <td class = "cell">
			<?php 
				$sql="select * from DietFoods, Food where DietFoods.FoodID=Food.FoodID and UserID='" . $_SESSION["sn_idx"]. "' and `Date`='$list_date' and Meal='B'";
				$result=mysqli_query( $conn, $sql ) OR die(__FILE__." : Line ".__LINE__."<p>".mysql_error());
				while ($row = mysqli_fetch_assoc($result)) {
					$cal_res += $row["Quantity"] * $row["Calories"];
					echo $row["Name"] . "<br />";
					$remove_B = true;
				}
			?>
			<?php if ($remove_B == true ) {?>
            <button type="button" onclick = "window.location.href='./calculator.php?rm=B&sdate=<?php echo $list_date?>';">Edit</button>
            <button type="button" onclick = "window.location.href='./calculator_.php?mode=del&rm=B&sdate=<?php echo $list_date?>';">Remove</button>
			<?php }?>
          </td>

          <td>
			<?php 
				$sql="select * from DietFoods, Food where DietFoods.FoodID=Food.FoodID and UserID='" . $_SESSION["sn_idx"]. "' and `Date`='$list_date' and Meal='L'";
				$result=mysqli_query( $conn, $sql ) OR die(__FILE__." : Line ".__LINE__."<p>".mysql_error());
				while ($row = mysqli_fetch_assoc($result)) {
					$cal_res += $row["Quantity"] * $row["Calories"];
					echo $row["Name"] . "<br />";
					$remove_L = true;
				}
			?>
			<?php if ($remove_L == true ) {?>
            <button type="button" onclick = "window.location.href='./calculator.php?rm=L&sdate=<?php echo $list_date?>';">Edit</button>
            <button type="button" onclick = "window.location.href='./calculator_.php?mode=del&rm=L&sdate=<?php echo $list_date?>';">Remove</button>
			<?php }?>
          </td>
          
          <td>
			<?php 
				$sql="select * from DietFoods, Food where DietFoods.FoodID=Food.FoodID and UserID='" . $_SESSION["sn_idx"]. "' and `Date`='$list_date' and Meal='D'";
				$result=mysqli_query( $conn, $sql ) OR die(__FILE__." : Line ".__LINE__."<p>".mysql_error());
				while ($row = mysqli_fetch_assoc($result)) {
					$cal_res += $row["Quantity"] * $row["Calories"];
					echo $row["Name"] . "<br />";
					$remove_D = true;
				}
			?>
			<?php if ($remove_D == true ) {?>
            <button type="button" onclick = "window.location.href='./calculator.php?rm=D&sdate=<?php echo $list_date?>';">Edit</button>
            <button type="button" onclick = "window.location.href='./calculator_.php?mode=del&rm=D&sdate=<?php echo $list_date?>';">Remove</button>
			<?php }?>
          </td>

          <td>
			<?php 
				$sql="select * from `DietExercise` , ExercisesTable where `DietExercise`.ExerciseID=ExercisesTable.ExerciseID and UserID='" . $_SESSION["sn_idx"]. "' and `Date`='$list_date'";
				$result=mysqli_query( $conn, $sql ) OR die(__FILE__." : Line ".__LINE__."<p>".mysql_error());
				while ($row = mysqli_fetch_assoc($result)) {
					echo $row["ExerciseName"] . "<br />";
					$remove_E = true;
				}
			?>
            <button class = "add_exercise" type="button" onclick = "window.location.href='exercises.php?sdate=<?php echo $start_date;?>&idate=<?php echo $list_date;?>';">Add exercise</button>
			<?php if ($remove_E == true ) {?>
            <button class = "remove_exercise" type="button" onclick = "window.location.href='calendar.php?sdate=<?php echo $start_date;?>&idate=<?php echo $list_date;?>&mode=exdel';">Remove</button>
			<?php }?>
          </td>
          
          <td><?php echo number_format( $cal_res) ;?></td>
        </tr>
		<?php
		}
		?>
      </tbody>
    </table>
  </div>
					
	</div>
			<?php include "./inc_footer.php"; ?>

	</body>
</html>
