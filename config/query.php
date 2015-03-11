<?php
	class useSql{
		function nomalQuery($table, $desc){
			$sql = " SELECT * FROM ".$table." ORDER BY ".$desc." DESC";
//echo $sql;
			$result = mysqli_query($sql);
			return $result;
		}
		function nomal2Query($table, $desc){
			$sql = " SELECT * FROM ".$table." ORDER BY ".$desc." ASC";
			$result = mysqli_query($sql);
			return $result;
		}

		function whereQuery($table, $where){
			$sql = " SELECT * FROM ".$table." WHERE ".$where;
//echo $sql."<br>";
			$result = mysqli_query($sql);
			return $result;
		}

		function distinctQuery($dis, $table, $where){
			$sql = " SELECT DISTINCT ".$dis." FROM ".$table." WHERE ".$where;
//echo $sql;
			$result = mysqli_query($sql);
			return $result;
		}

		function distinctCountQuery($dis, $table, $where){
			$sql = " SELECT DISTINCT ".$dis." FROM ".$table." WHERE ".$where;
//echo $sql;
			$result = mysqli_query($sql);
			$row = mysqli_num_rows($result);
			return $row;
		}

		function countQuery($table, $where){
			$sql = " SELECT count(*) FROM ".$table." WHERE ".$where;
//echo $sql."<br>";
			$result = mysqli_query($sql);
			$row = mysqli_fetch_row($result);
			return $row[0];
		}

		function insertQuery($table, $column, $data){
			$sql = "INSERT INTO ".$table." ( ".$column." ) VALUES( ".$data." )";
//echo $sql;
			mysqli_query($sql);
			return;
		}

		function updateQuery($table, $set, $where){
			$sql = "UPDATE ".$table." SET ".$set." WHERE ".$where;
//echo $sql."<br>";
			mysqli_query($sql);
			return;
		}
		function deleteQuery($table, $where){
			$sql = " DELETE FROM ".$table." WHERE ".$where;
//echo $sql; 
			mysqli_query($sql);
			return;
		}
	}
	

function sql_query($sql, $error=TRUE)
{
    if ($error)
        $result = @mysqli_query($conn, $sql) or die("<p>$sql<p>" . mysqli_errno() . " : " .  mysqli_error() . "<p>error file : $_SERVER[PHP_SELF]");
    else
        $result = @mysqli_query($conn, $sql);
    return $result;
}


function getdata($sql, $error=TRUE)
{
    $result = sql_query($sql, $error);
    $row = sql_fetch_array($result);
    return $row;
}

function chkData($sql, $error=TRUE)
{
    $result = sql_query($sql, $error);
    $row = sql_fetch_array($result);

	 if($row){
		return true;
	 }else{
		return false;
	 }
    
}

function sql_fetch_array($result)
{
    $row = @mysqli_fetch_assoc($result);
    return $row;
}

?>
