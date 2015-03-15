<?php
	$page_title = "Map";
	include "./inc_header.php"; 		
?>
		<style>
			* {
			  margin: auto;
			  padding: 0;
			  box-sizing: border-box;
			}

			table {
			  color: #333;
			  font-family: sans-serif;
			  font-size: .9em;
			  font-weight: 300;
			  text-align: left;
			  line-height: 50px;
			  border-spacing: 0;
			  border: 1px solid #428bca;
			  width: 1000px;
			  margin: 20px auto;
			}

			thead tr:first-child {
			  background: #428bca;
			  color: #fffaaa;
			  border: none;
			}

			th {font-weight: bold;}
			th:first-child, td:first-child {padding: 0 15px 0 20px;}

			thead tr:last-child th {border-bottom: 2px solid #ddd;}

			tbody tr:hover {background-color: #f0fbff;}
			tbody tr:last-child td {border: none;}
			tbody td {border-bottom: 1px solid #ddd;}

			td:last-child {
			  text-align: right;
			  padding-right: 10px;
			}

			.button {
			  color: #428bca;
			  text-align: center;
			  text-decoration: none;
			  padding-left: 15px;
			}

			.button:hover {
			  text-decoration: underline;
			  cursor: pointer;
			}
		</style>
		<!-- One -->
			<section id="one" class="wrapper style1">
				<header class="major">
					<h2>MAP</h2>
					<div id = "map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d9497.331844758186!2d-2.2394708613769536!3d53.480380344677535!3m2!1i1024!2i768!4f13.1!2m1!1sgyms+in+manchester!5e0!3m2!1sen!2suk!4v1425048709036" width="800" height="450" frameborder="0" style="border:0"></iframe>				
					</div>

					
						<table>
						  <thead>
						    <tr><th colspan="3">Some facilities here</th></tr>
						    <!--<tr>
						      <th>#</th>
						      <th colspan="2">Names</th>
						    </tr>-->
						  </thead>
						  <tbody>
						    <tr>
						      <td>1</td>
						      <td>Gym number 1</td>
						      <td>
						        <a href= "#" class="button">Find on map or go to website</a>
						    </tr>
						    <tr>
						      <td>2</td>
						      <td>Gym number 2</td>
						      <td>
						        <a href="#" class="button">Find on map or go to website</a>
						      </td>
						    </tr>
						    <tr>
						      <td>3</td>
						      <td>Gym number 3</td>
						      <td>
						        <a href="#" class="button">Find on map or go to website</a>
						      </td>
						    </tr>
						  </tbody>
						</table>

			<?php include "./inc_footer.php"; ?>
	</body>
</html>