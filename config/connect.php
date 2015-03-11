<?php
  mysqli_connect('dbhost.cs.man.ac.uk', 'mbax4cb3', 'BubblesBubbles') or die( "Unable to connect to SQL server");
  mysqli_select_db("mbax4cb3") or die( "Unable to select database");
  mysqli_query("SET sql_mode = 'HIGH_NOT_PRECEDENCE';");
?>
