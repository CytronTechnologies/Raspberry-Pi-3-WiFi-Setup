<?php
function setWiFi($ssid, $psk){
	if(!empty($ssid)){
		/*edit /etc/network/interfaces/wlan0-dhcp.cfg file*/
		$myfile = fopen("/etc/network/interfaces.d/wlan0-dhcp.cfg","w");
		$txt = "iface wlan0 inet dhcp\r\n";
		$txt .= "\twpa-ssid \"".$ssid."\"\r\n\twpa-psk \"".$psk."\"\r\n";
		fwrite($myfile, $txt);
		fclose($myfile);
		
		return true;
	}
	return false;
}
?>
