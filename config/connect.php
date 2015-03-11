<?php
  $conn = mysqli_connect('dbhost.cs.man.ac.uk', 'mbax4cb3', 'BubblesBubbles',"mbax4cb3") or die( "Unable to connect to SQL server");
//  mysqli_select_db("mbax4cb3") or die( "Unable to select database");
  mysqli_query($conn, "SET sql_mode = 'HIGH_NOT_PRECEDENCE';");
?>
