		<?php
		$page_title = "MY Profile";
		$page_id = "1";
		include "./inc_header_my.php"; 		
		if ($_SESSION["sn_idx"] == "" ) {
			echo "<script>alert('First, you need to log in.');location.href='/';</script>";
			exit;
		}else {
			//echo $_SESSION["sn_idx"] ;
		}
		if ( !isset($mode)) {
			$mode = "";
		}
		if ($mode == "upWeight" ) {
			$res = mysqli_query( $conn , "update User set Weight=$Weight where UserID = '" . $_SESSION["sn_idx"] . "'");
			if ($res) {
				$_SESSION["sn_weight"] = $Weight ;
				echo "<script>alert('The update has been completed.');location.href='myprofile.php';</script>";				
			}else {
				echo "<script>alert('error');location.href='myprofile.php';</script>";
			}
			exit;
		}
		if ($mode == "DietStart" ) {
			if($TargetWeight > $_SESSION["sn_weight"]){
				echo "<script>alert('Target weight should be greater than the current weight');location.href='myprofile.php';</script>";
			exit;
			}

			$sql = "insert into Diet values('" . $_SESSION["sn_idx"]. "' , '".date("Y-m-d")."' , '$TargetWeight')";
			$res = mysqli_query(  $conn , $sql );
			if ($res) {
				echo "<script>alert('The update has been completed.');location.href='myprofile.php';</script>";				
			}else {
				echo "<script>alert('error');location.href='myprofile.php';</script>";
			}
			exit;
		}
                if($mode == "DeleteDiet") {
			$res = mysqli_query( $conn, "delete from Diet where UserID = '" . $_SESSION["sn_idx"] . "'");
			if ($res) {
				echo "<script>alert('Set a new goal')location.href='myprofile.php'</script>";
			}else {
				echo "<script>alert('error');location.href='myprofile.php';</script>";
      			}
			exit;
                }
		?>
					<div id = "content">
						<div id = "details">
							<h1> Personal details </h1>
							<ul>
								<li> Name: <?php echo $_SESSION["sn_name"];?>    </li>
								<li> Surname: <?php echo $_SESSION["sn_surname"];?>    </li>
								<li> Gender: <?php echo ( $_SESSION["sn_gender"] == "0" ) ? "Male" : "Female"; ?>    </li>
								<li> Current weight: <?php echo $_SESSION["sn_weight"] ;?>    </li>
								<li> current height: <?php echo $_SESSION["sn_height"];?>    </li>
								<li> Update weight: </li>
								
							
								<form name='frm_regist' method="POST" action="myprofile.php">
									<input type="hidden" name="mode" value="upWeight">
								<il><input  placeholder="Weight" name="Weight"></il>
								<il>	<input type="submit" value="update" /> </il>
								</form>
						


							</ul>
							</div>
						<div id="box3">
								<h1> Your meals for today </h1>
								<ul>
								<li> Breakfast: 													
								<?php 
									$sql="select * from DietFoods, Food where DietFoods.FoodID=Food.FoodID and UserID='" . $_SESSION["sn_idx"]. "' and `Date`='" . date("Y-m-d") . "' and Meal='B'";
									$result=mysqli_query( $conn, $sql ) OR die(__FILE__." : Line ".__LINE__."<p>".mysql_error());
									while ($row = mysqli_fetch_assoc($result)) {
										//$cal_res += $row["Quantity"] * $row["Calories"];
										echo "<br />" . $row["Name"] ;
									}
								?>
								</li>
								<li> lunch:     				
								<?php 
									$sql="select * from DietFoods, Food where DietFoods.FoodID=Food.FoodID and UserID='" . $_SESSION["sn_idx"]. "' and `Date`='" . date("Y-m-d") . "' and Meal='L'";
									$result=mysqli_query( $conn, $sql ) OR die(__FILE__." : Line ".__LINE__."<p>".mysql_error());
									while ($row = mysqli_fetch_assoc($result)) {
										//$cal_res += $row["Quantity"] * $row["Calories"];
										echo "<br />" . $row["Name"];
									}
								?>
								</li>
								<li> dinner: 				
								<?php 
									$sql="select * from DietFoods, Food where DietFoods.FoodID=Food.FoodID and UserID='" . $_SESSION["sn_idx"]. "' and `Date`='" . date("Y-m-d") . "' and Meal='D'";
									$result=mysqli_query( $conn, $sql ) OR die(__FILE__." : Line ".__LINE__."<p>".mysql_error());
									while ($row = mysqli_fetch_assoc($result)) {
										//$cal_res += $row["Quantity"] * $row["Calories"];
										echo "<br />" . $row["Name"];
									}
								?>
								</li>
							</ul>

							</div>


<div id="box3">
							<h1> Start a diet </h1>
							<ul>
								<?php
								$Diet_info = getdata("select * from Diet where UserID='" . $_SESSION["sn_idx"] . "'" , $conn );
                                                                if ( $Diet_info["TargetWeight"] > $_SESSION["sn_weight"]){								   
									echo "You have reached your goal<br />";?>
							
								        <form name='frm_regist' method="POST" action="myprofile.php">
                                                                        <input type="hidden" name="mode" value="DeleteDiet">
									<input type="submit" value="Set a new goal" />
									</form>
                                                               
								<?php
								}
								if ( $Diet_info["StartDate"] != "" ) {?>
									<li> Start date: <?php echo $Diet_info["StartDate"]?>    </li>
									<li> TargetWeight: <?php echo $Diet_info["TargetWeight"]?> Kg   </li>							
								<?php
								}else{?>
									<form name='frm_regist' method="POST" action="myprofile.php">
									<input type="hidden" name="mode" value="DietStart">
									<li> TargetWeight: <input  placeholder="Kg" name="TargetWeight"></li>
									<input type="submit" value="New Diet Start" />
									</form>
								<?php
								}?>
							</ul>

							</div>
						

						<div id="box2">
							<h1> exercise of the day </h1>									
							<?php
								$row=getdata(	"select * from ExercisesTable order by rand() limit 0 , 1 " , $conn);
								$Photo = "";
								$media_height=210;
								$media_width=354;

								if( $row["Photo"] != "") { 
										$Photo = "<iframe width=\"$media_width\" height=\"$media_height\" src=\"" . $row["Photo"] ."\" frameborder=\"0\" allowfullscreen></iframe>"; 
								}
								echo $row["ExerciseName"] . "<br/ >";
								//echo $Photo . "<br/ >";
								echo substr( $row["Description"] , 0 , 50 );
                                                                echo $Photo;
							?>
						</div>

						

						
							
						<div id="box2l">
								<h1> Recipe of the day </h1>										
								<?php
									$row=getdata(	"select * from RecipeName order by rand() limit 0 , 1 " , $conn);
									$Photo = "";
									if (file_exists("./images/recipe/" . $row["Photo"] . "")) { 
										$Photo = "<img src=\"./images/recipe/" . $row["Photo"] . "\" style='width:80%;'>"; 
									}
									echo $row["RecipeName"] . "<br/ >";
									echo $Photo . "<br/ >";
									echo substr( $row["Description"] , 0 , 50 );
								?>
							</div>
							
					


						
						
						
						
						
							
							
					</div>
					
				
		
			<?php include "./inc_footer.php"; ?>

	</body>
</html>
