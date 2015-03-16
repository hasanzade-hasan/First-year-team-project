<?php
		$page_title = "Exercises";
		$page_id = "5";
		include "./inc_header_my.php"; 
		if (!isset($sdate)) {
			$sdate = date("Y-m-d");
		}
		if (!isset($idate)) {
			$idate = date("Y-m-d");
		}
?>
					<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
					<style type="text/css" title="">
					.ui-datepicker-calendar {background-color:#fff;}
					</style>
					<div id = "content">
						<table class="contentTable">
						<thead>
							<tr>
								<td>Exercises</td>
								<td>Photo</td>
								<td>Add</td>
							</tr>
						</thead>
						<?php
							$sql="select * from ExercisesTable order by ExerciseID ASC";
							$result = mysqli_query($conn , $sql);
							$i = 1;
							while ($row = mysqli_fetch_assoc($result)) {
								$Photo = "";
						?>
						<tr>
							<td class=contentCell id=newCell>
								<p><?php echo $row["ExerciseName"]?></p>
								<p><?php echo nl2br( $row["Description"] )?></p>
							</td>
C
							<td class=contentCell><?php echo $row["Photo"];?></td>
							<td class=contentCell><input type="text" name="idate" value="<?php echo $idate;?>" class="idate" id="idate_<?php echo $row["ExerciseID"];?>" style="" readonly><a href="#" style="color:#000;" onclick="javascript:add_calendar(<?php echo $row["ExerciseID"];?>);return false;">This is adds to the calendar</a></td>
						</tr>
						<?php }?>
	</table>
</div>
					
				</div>
			<?php include "./inc_footer.php"; ?>
<script type="text/javascript">
<!--

 $(document).ready(function() {
  var clareCalendar = {
   weekHeader: 'Wk',
   dateFormat: 'yy-mm-dd',
   autoSize: false, 
   changeMonth: true,
   changeYear: true, 
   showMonthAfterYear: true, 
   buttonImageOnly: true,
   buttonText: 'calendar', 
   buttonImage: './images/calendar-icon.png',
   showOn: "both", 
   yearRange: 'c-99:c+99', 
   maxDate: '+1y', 
   minDate: '-1y'
  };
  $(".idate").datepicker(clareCalendar);
  $("img.ui-datepicker-trigger").attr("style","width:30px;margin-left:5px; vertical-align:middle; cursor:pointer;"); 
  $("#ui-datepicker-div").hide(); 
 });

function add_calendar(val){
	var idate = document.getElementById("idate_"+val).value;
	location.href='./calendar.php?mode=ex&eid='+val+'&sdate=<?php echo $sdate;?>&idate='+idate;
}

//-->
</script>
	</body>
</html>
