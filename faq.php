		<?php
		$page_title = "FAQ";
		include "./inc_header.php"; 		
		?>
		<!-- One -->
			<section id="one" class="wrapper style1">
				<header class="major">
					<h2>FAQ</h2>
				</header>
				<div id = "main">
					<table id="faqtable">
						<?php
							$sql="select * from FAQ order by IDX ASC";
							$result = mysqli_query($conn , $sql);
							$i = 1;
							while ($row = mysqli_fetch_assoc($result)) {
						?>
							<tr>
								<td class="question" id="q<?php echo $i;?>"><?php echo $row["Question"];?></td>
							</tr>
							<tr>
								<td class="answer" id="a1"><?php echo nl2br( $row["Answer"] );?></td>
							</tr>
						<?php
							$i++;
							}						
						?>
					</table>		
				</div>
			</section>
			<?php include "./inc_footer.php"; ?>
	</body>
</html>