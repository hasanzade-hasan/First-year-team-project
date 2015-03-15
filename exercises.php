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
								if (file_exists("./images/exercise/" . $row["Photo"] . "")) { 
									$Photo = "<img src=\"./images/exercise/" . $row["Photo"] . "\">"; 
								}
						?>
						<tr>
							<td class=contentCell id=stupidfuckcell>
								<p><?php echo $row["ExerciseName"]?></p>
								<p><?php echo nl2br( $row["Description"] )?></p>
							</td>
							<td class=contentCell><?php echo $Photo;?></td>
							<td class=contentCell><a href="./calendar.php?mode=ex&eid=<?php echo $row["ExerciseID"];?>&sdate=<?php echo $sdate;?>&idate=<?php echo $idate;?>" style="color:#000;">This is adds to the calendar</a></td>
						</tr>
						<?php }?>
	</table>
</div>
					
				</div>
			<?php include "./inc_footer.php"; ?>

	</body>
</html>
