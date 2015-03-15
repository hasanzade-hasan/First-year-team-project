<?php
		$page_title = "Calculator";
		$page_id = "3";
		include "./inc_header_my.php"; 
		if (!isset($rid)) {
			$rid = "";
		}
		if (!isset($sdate)) {
			$sdate = "";
		}
?>
<script src="js/ajax.js"></script>
<style type="text/css" title="">
</style>
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>

					<div id = "content">
					
				<div id="listfoods">
					<h1><u> List of foods </u></h1>
					
							<ul>
								<?php 
									$sql="select * from Food order by Name ASC";
									$result=mysqli_query( $conn, $sql ) OR die(__FILE__." : Line ".__LINE__."<p>".mysql_error());
									$i = 1;
									while ($row = mysqli_fetch_assoc($result)) {
								?>								
									<li id="Food_li_<?php echo $row["FoodID"];?>"><a href="#" onclick="addFood(<?php echo $row["FoodID"];?>);return false;"><?php echo $row["Name"];?></a></li>
								<?php
									$i++;
									}
								?>
							</ul>
				</div>

				

				<div id = "calculator">
					<h1><u> calculator </u></h1>
					


				<form name='form2' method="POST" action="./calculator_.php" style="background:#fff;padding:0;">	
				<input type="hidden" name="mode" value="add">
				<input type="hidden" name="totalCal" value="0">
				<input type="hidden" name="gid" value="">
				<div id = "calcfood">
				<table align='center' width='100%' border='1' cellspacing='1' cellpadding='3' >
								<tr>
									<th style="text-align:center;">Food</th>
									<th style="text-align:center;">Quantity</th>
									<th style="text-align:center;">Remove</th>
								</tr>
								<?php 

									$sql="select B.* , A.RecipeID from RecipeFoods as A , Food as B where A.FoodID=B.FoodID order by B.Name ASC";
									$result=mysqli_query( $conn, $sql ) OR die(__FILE__." : Line ".__LINE__."<p>".mysql_error());
									$i = 1;
									while ($row = mysqli_fetch_assoc($result)) {
										if ($rid == $row["RecipeID"] ) {
											$chk = " checked";
											$view_list = "";
										}else {
											$chk = "";
											$view_list = "none";											
										}
								?>
								<tr id="Food_row_<?php echo $row["FoodID"];?>" style="display:<?php echo $view_list;?>;">
									<td style="width:40%;padding:0;"><input type="checkbox" style="display:none;" id="Food_list_<?php echo $row["FoodID"];?>" name="Food_list" value="<?php echo $row["FoodID"];?>" <?php echo $chk;?>><?php echo $row["Name"];?>
									</td>
									<td style="width:40%;padding:0;"><input type="text" id="Portion_list_<?php echo $row["FoodID"];?>" name="Portion" style="width:100px;text-align:right;" onkeyup="cal();"></td>
									<td style="width:20%;padding:0;"><a href="#" onclick="deleteFood(<?php echo $row["FoodID"];?>);return false;"> Remove </a></td>
								</tr>
								<?php
									$i++;
									}
								?>
							</table>
				</div>
				<div id = "total">
					<p> Total ammount of calories:<span id="TotalAmmount">0</span> Kcal</p>
								<select name="Meal" class="form-controll" style="border:1px solid #ccc;padding2%;height:1.75em;width:200px;" id="Meal">
									<option value="">- MEAL -</option>
									<option value="B">Breakfast</option>
									<option value="L">Lunch</option>
									<option value="D">Dinner</option>
								</select>
		
								<input type="text" name="cDate1" value="<?php echo $sdate;?>" id="cDate" style="width:150px;height:30px;margin:0;padding:0;" placeholder="Choose Date" />
							<span href ="#" class="button small" onclick="add_calendar();return false;"> Add to calendar </span>
			</div>
							</form>
	
		</div>
					
		</div>
		<!--
						<div class="box">
							<h1> Choose Recipe </h1>
							<div style="overflow-y:scroll;height:37em;border:1px solid #eee;">
							<ul>
								<?php
									$sql="select * from RecipeName order by RecipeName ASC";
									$result=mysqli_query( $conn , $sql) OR die(__FILE__." : Line ".__LINE__."<p>".mysql_error());
									$i = 1;
									while ($row = mysqli_fetch_assoc($result)) {
								?>
									<li><a href="./calculator.php?rid=<?php echo $row["RecipeID"];?>"><?php echo $row["RecipeName"];?></a></li>
								<?php
									$i++;
									}						
								?>
							</ul>
							</div>
						</div>
						<div class="box">
							<h1> Calculator </h1>
							<div style="overflow-y:scroll;height:37em;border:1px solid #eee;">
							<ul>
								<?php 
									$sql="select * from Food order by Name ASC";
									$result=mysqli_query( $conn, $sql ) OR die(__FILE__." : Line ".__LINE__."<p>".mysql_error());
									$i = 1;
									while ($row = mysqli_fetch_assoc($result)) {
								?>								
									<li id="Food_row_<?php echo $row["FoodID"];?>" style="display:;"><a href="#" onclick="deleteFood(<?php echo $row["FoodID"];?>);return false;"><?php echo $row["Name"];?></a></li>
								<?php
									$i++;
									}
								?>
							</ul>
							</div>
						</div>
						<div class="box">
							<h1> Calculator </h1>
							<form name='form2' method="POST" action="./calculator_.php" style="background:#fff;">	
							<input type="hidden" name="mode" value="add">
							<input type="hidden" name="totalCal" value="0">
							<input type="hidden" name="gid" value="">
							<div style="overflow-y:scroll;height:23em;border:1px solid #eee;">
							<table align='center' width='100%' border='1' cellspacing='1' cellpadding='3'>
								<tr>
									<th style="text-align:center;">Food</th>
									<th style="text-align:center;">Quantity</th>
									<th style="text-align:center;">Remove</th>
								</tr>
								<?php 
									if ($rid=="") {
										$sql="select * from Food order by Name ASC";
									}else {
										$sql="select B.* from RecipeFoods as A , Food as B where A.RecipeID='$rid' and A.FoodID=B.FoodID order by B.Name ASC";									
									}
									$result=mysqli_query( $conn, $sql ) OR die(__FILE__." : Line ".__LINE__."<p>".mysql_error());
									$i = 1;
									while ($row = mysqli_fetch_assoc($result)) {
								?>
								<tr id="Food_row_<?php echo $row["FoodID"];?>" style="display:;">
									<td style="width:40%;padding:0;"><input type="checkbox" style="display:none;" id="Food_list_<?php echo $row["FoodID"];?>" name="Food_list" value="<?php echo $row["FoodID"];?>" checked><?php echo $row["Name"];?>
									</td>
									<td style="width:40%;padding:0;"><input type="text" id="Portion_list_<?php echo $row["FoodID"];?>" name="Portion" style="width:100px;text-align:right;" onkeyup="cal();"></td>
									<td style="width:20%;padding:0;"><a href="#" onclick="deleteFood(<?php echo $row["FoodID"];?>);return false;"> Remove </a></td>
								</tr>
								<?php
									$i++;
									}
								?>
							</table>
							</div>
							<br />
							<p>
								Total ammount of calories: <span id="TotalAmmount">0</span> Kcal
							</p>
							<p>
								<select name="Meal" class="form-controll" style="border:1px solid #ccc;padding2%;height:1.75em;width:200px;" id="Meal">
									<option value="">Choose Meal</option>
									<option value="B">Breakfast</option>
									<option value="L">Lunch</option>
									<option value="D">Dinner</option>
								</select>
								<input type="text" name="cDate1" value="" id="cDate" style="width:150px;height:30px;margin:0;padding:0;" placeholder="Choose Date" />
							</p>
							<input type="submit" value="Add to Calendar" onclick="add_calendar();return false;">
							</form>
						</div>
				</div>
			</div-->

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
			  $("#cDate").datepicker(clareCalendar);
			  $("img.ui-datepicker-trigger").attr("style","margin-left:5px; vertical-align:middle; cursor:pointer;"); 
			  $("#ui-datepicker-div").hide(); 
			 });

			function addFood(val) {
				document.getElementById("Food_list_"+val).checked=true;
				document.getElementById("Food_row_"+val).style.display="";
			}

			function deleteFood(val) {
				document.getElementById("Food_list_"+val).checked=false;
				document.getElementById("Food_row_"+val).style.display="none";
			}

			function cal(val){
				var form=document.form2;
				var i , mValue; 
				var nChk = document.getElementsByName("Food_list");  
				var mChk = document.getElementsByName("Portion");  
				form.gid.value ='';
				if(nChk){
					for(i=0;i<nChk.length;i++) { 
						if(nChk[i].checked){  
							if (mChk[i].value=='')	{
								mValue = '0';
							}else {
								mValue = mChk[i].value;
							}
							if(form.gid.value ==''){
								form.gid.value = nChk[i].value+'|^|'+mValue;
							}else{
								form.gid.value =  form.gid.value+ ',' +nChk[i].value+'|^|'+mValue;
							}
						}
					}
					if(form.gid.value ==''){ 
						alert("list is empty");       
						return false; 
					}					
					sendRequest(
						cal_result, '&mode=cal&gid='+ form.gid.value,
						'POST',
						'./calculator_.php', true, true
					);
				}
			}
				function cal_result(oj){
					var res = decodeURIComponent(oj.responseText);
					document.getElementById("TotalAmmount").innerHTML=res;
					document.form2.totalCal.value=res;
				}

				function add_calendar(){
					var frm=document.form2;
					if (frm.totalCal.value == 0 ) {
						alert("insert Quantity");
						return false;
					}else if (document.getElementById("Meal").value=="") {
						alert("Choose Meal");
						return false;
					}else if ( frm.cDate1.value == "" ) {
						alert("Choose Date");
						return false;
					}else 
					
					document.form2.submit();
				}
			//-->
			</script>
			<?php include "./inc_footer.php"; ?>
	</body>
</html>
