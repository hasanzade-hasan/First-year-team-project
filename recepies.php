<?php
		$page_title = "Recepies";
		$page_id = "4";
		include "./inc_header_my.php"; 
?>
					<div id = "content">
						<table class="contentTable">
						<thead>
							<tr>
								<td>Recipes</td>
								<td>Photo</td>
								<td>Add</td>
							</tr>
						</thead>
						<?php
							$sql="select * from RecipeName order by RecipeID ASC";
							$result = mysqli_query($conn , $sql);
							$i = 1;
							while ($row = mysqli_fetch_assoc($result)) {
								$Photo = "";
								if (file_exists("./images/recipe/" . $row["Photo"] . "")) { 
									$Photo = "<img src=\"./images/recipe/" . $row["Photo"] . "\">"; 
								}
						?>
						<tr>
							<td class=contentCell id=stupidfuckcell>
								<p><?php echo $row["RecipeName"]?></p>
								<p><?php echo nl2br( $row["Description"] )?></p>
							</td>
							<td class=contentCell><?php echo $Photo;?></td>
							<td class=contentCell><a href="./calculator.php?rid=<?php echo $row["RecipeID"];?>" style="color:#000;">This is adds to the calculator</a></td>
						</tr>
						<?php }?>
	</table>
</div>
					
				</div>
			<?php include "./inc_footer.php"; ?>

	</body>
</html>
