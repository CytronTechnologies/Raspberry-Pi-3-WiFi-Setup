<?php include 'setWiFi.php';?>
<?php
// define variables and set to empty values
$msgErr = $ssid = $email = $phone = $psk = "";
$success = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["ssid"]) && empty($_POST["ssid2"])) {
    $msgErr .= "SSID is required</br>";
    $success = false;
  } 
  else {
    if(!empty($_POST["ssid"]))
    	$ssid = test_input($_POST["ssid"]);
    else
	$ssid = test_input($_POST["ssid2"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9_@-]*$/",$ssid)) {
      $msgErr .= "Invalid SSID</br>";
      $success = false;
    }
  }
  
  $psk = test_input($_POST["password"]);
  
  if (empty($_POST["email"]) && empty($_POST["phone"])){
    $msgErr .= "Email or phone required</br>";
    $success = false;
  } 
  else {
    if (!empty($_POST["email"])) {
    	$email = test_input($_POST["email"]);
    	// check if e-mail address is well-formed
    	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      		$msgErr .= "Invalid email format</br>"; 
		$success = false;
    	}
    }
    if (!empty($_POST["phone"])) {
    	$phone = test_input($_POST["phone"]);
    	if (!preg_match("/^[0-9]*$/",$phone)) {
      		$msgErr .= "Invalid phone number</br>"; 
		$success = false;
    	}
    }
  }
  
  if($success)
  	$success = setWiFi($ssid, $psk);

  $data = array("success"=>$success,"message"=>$msgErr,"ssid"=>$ssid,"psk"=>$psk,"phone"=>$phone,"email"=>$email);
  //array_push($json, $msgErr, $ssid, $psk, $phone, $email);
  $json = json_encode($data);
  echo $json;
  
  /*restart network*/
  if($success){
	shell_exec("sudo reboot");
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
