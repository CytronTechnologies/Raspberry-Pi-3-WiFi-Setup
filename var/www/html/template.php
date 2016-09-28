<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Raspberry Pi 3 - Setup WiFi Connection</title>
<link href="resources/images/Cytron-Favicon.png" rel="icon">
</head>
<body>
<?php
	function scanWiFi()
	{
		$array = array("None");
		exec('sudo iwlist wlan0 scan | grep ESSID 2>error.log', $out, $status);
		$result = $out;
		$reslength = count($result);
		if($status===0){
			for($x = 0; $x < $reslength; $x++){
				$re="/ESSID:\"([a-zA-Z0-9_@-]+)\"/";
				$str=trim($result[$x]); 
				if(preg_match_all($re, $str, $matches)){
					//echo $matches[1][0];
					array_push($array, $matches[1][0]);
				}
			}
		}
		return $array;
	}
?>
<?php
	$wifi=scanWiFi();
	for($i=0;$i<count($wifi);$i++){
		echo $wifi[$i];echo "</br>";
	}
?>
</body>
</html>
