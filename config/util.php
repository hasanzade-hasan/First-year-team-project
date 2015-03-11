<?php
	function nDate(){
		$str = date(Ymd);
		return $str;
	}

	function get_totaldays($year,$month){
		$date=1;
		while(checkdate($month,$date,$year)){
			$date++;
		}
		$date--;
		return $date;
	}

	function eraseChar($string, $char){
		for($i=0; $i <= strlen($string); $i++){
			if($dong[$i] != $char)
				$tmp .= $string[$i];
		}
		return $tmp;
	}

	function checkChar($string, $char){
		 return $retString = strchr($string,$char);
	}

	function cutstr($msg, $cut_size, $tail="..."){
		if ($cut_size<=0) return $msg;
	
		$max_len = 70;
		if(strlen($msg) > $max_len)
			if(!eregi(" ", $msg))
				$msg = substr($msg,0,$max_len);
	
		for($i=0;$i<$cut_size;$i++)
			if(@ord($msg[$i])>127) $han++;
				else $eng++;
	
		$cut_size=$cut_size+(int)$han*0.6;
	
		//echo $cut_size; exit;
		$snow=1;
		for ($i=0;$i<strlen($msg);$i++) {
			if ($snow>$cut_size)
				return $snowtmp.$tail;
			if (ord($msg[$i])<=127) {
				$snowtmp.= $msg[$i];
				if ($snow%$cut_size==0)
					return $snowtmp.$tail; 
			}else{
				if ($snow%$cut_size==0)
					return $snowtmp.$tail;
				$snowtmp.=$msg[$i].$msg[++$i];
				$snow++;
			}
			$snow++;
		}
		return $snowtmp;
	}
	function cutstr2($msg, $cut_size, $tail=""){
		if ($cut_size<=0) return $msg;
	
		$max_len = 70;
		if(strlen($msg) > $max_len)
			if(!eregi(" ", $msg))
				$msg = substr($msg,0,$max_len);
	
		for($i=0;$i<$cut_size;$i++)
			if(@ord($msg[$i])>127) $han++;
				else $eng++;
	
		$cut_size=$cut_size+(int)$han*0.6;
	
		//echo $cut_size; exit;
		$snow=1;
		for ($i=0;$i<strlen($msg);$i++) {
			if ($snow>$cut_size)
				return $snowtmp.$tail;
			if (ord($msg[$i])<=127) {
				$snowtmp.= $msg[$i];
				if ($snow%$cut_size==0)
					return $snowtmp.$tail; 
			}else{
				if ($snow%$cut_size==0)
					return $snowtmp.$tail;
				$snowtmp.=$msg[$i].$msg[++$i];
				$snow++;
			}
			$snow++;
		}
		return $snowtmp;
	}

	function chkWord($fullText, $searchText, $splitText){
		$tmpText		= explode($splitText,$fullText);
		for($i=0;$fullText[$i] && $i <= 100;$i++){
			$fullText[$i] = str_replace(" ","",$fullText[$i]);
			if($fullText[$i] == $searchText) echo "checked";
			else "";
		}
	}

	function chkWord2($fullText, $searchText, $splitText){
		$tmpText		= explode($splitText,$fullText);

		for($i=0;$fullText[$i] && $i <= 100;$i++){
			$fullText[$i] = str_replace(" ","",$fullText[$i]);
			if($fullText[$i] == $searchText) return "OK";
			else return "NO";
		}
	}

	function MEM_CHECK() {
		if ($_COOKIE["userid"]) {
			return true;
		}else {
			return false;
		}
	}
?>