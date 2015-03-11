<?
  mysql_connect('dbhost.cs.man.ac.uk', 'mbax4cb3', 'BubblesBubbles') or die( "Unable to connect to SQL server");
  mysql_select_db("mbax4cb3") or die( "Unable to select database");
  mysql_query("SET sql_mode = 'HIGH_NOT_PRECEDENCE';");
?>
