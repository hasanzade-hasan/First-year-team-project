<?php
	$page_title = "Map";
	include "./inc_header.php"; 		
?>
		<style>
			* {
			  margin: auto;
			  padding: 0;
			}

			table {
			  color: #333;
			  background-color: #40D6CA;
			  font-family: sans-serif;
			  font-size: .9em;
			  font-weight: bold;
			  text-align: left;
			  line-height: 50px;
			  width: 1000px;
			  margin: 20px auto;
			}

			th {
			  background: #1E8480;
				font-weight: bold;
				font-size: 25px !important;
				color: white !important;
				text-align: center !important;
				border: 2px solid #D0CACA;
			}
			th:first-child {padding: 0 15px 0 20px;}

			thead tr:last-child th {border-bottom: 2px solid #ddd;}

			td{
			  text-align: left;
			  padding-right: 10px;
			  border: 1px solid #D0CACA;
			}
			td:last-child {
			  text-align: right;
			  padding-right: 10px;
			}
		</style>
		<!-- One -->
			<section id="one" class="wrapper style1">
				<header class="major">
					<h2>MAP</h2>
					<div>
						<iframe id = "map" src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d9497.331844758186!2d-2.2394708613769536!3d53.480380344677535!3m2!1i1024!2i768!4f13.1!2m1!1sgyms+in+manchester!5e0!3m2!1sen!2suk!4v1425048709036" width="800" height="450" frameborder="0" style="border:0"></iframe>				
					</div>
					
						<table>
						  <thead>
						    <tr><th colspan="3">Some facilities here</th></tr>
						  </thead>
						  <tbody>
						    <tr>
						      <td>The Gym</td>
						      <td>
						        <a href= "http://www.thegymgroup.com/" class="button">more information...</a>
						    </tr>
						    <tr>
						      <td>PureGym</td>
						      <td>
						        <a href="http://www.puregym.com/" class="button">more information...</a>
						      </td>
						    </tr>
						    <tr>
						      <td>Just Gym</td>
						      <td>
						        <a href="http://www.payasugym.com/gyms-in-manchester/just-gym-manchester-gym-details" class="button">more information...</a>
						      </td>
						    </tr>
						    <tr>
						      <td>Unicorn Grocery</td>
						      <td>
						        <a href="http://www.unicorn-grocery.coop/contact.php" class="button">more information...</a>
						      </td>
						    </tr>
						    <tr>
						      <td>Manchester Aquatics Centre</td>
						      <td>
						        <a href="http://www.better.org.uk/leisure/manchester-aquatics-centre#/" class="button">more information...</a>
						      </td>
						    </tr>
						    <tr>
						      <td>Sugden Sports Centre</td>
						      <td>
						        <a href="https://www.sugdensportscentre.com/" class="button">more information...</a>
						      </td>
						    </tr>
						    <tr>
						      <td>Momentum Leisure Club</td>
						      <td>
						        <a href="http://www.payasugym.com/gyms-in-manchester/momentum-leisure-club-manchester-2-gym-details" class="button">more information...</a>
						      </td>
						    </tr>
						  </tbody>
						</table>

			<?php include "./inc_footer.php"; ?>
	</body>
</html>
