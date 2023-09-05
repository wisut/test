<?php
// Retrieve the token and message from the URL parameters
$token = $_GET['token'];
$fn = $_GET['fn'];
$fdt = $_GET['fdt'];
$message = $_GET['message'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "message=" . $message);
    $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $token . '');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // Disable SSL/TLS verification (not recommended in production)
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    $result = curl_exec($ch);

    if (curl_error($ch)) {
        //echo 'Error: ' . curl_error($ch);
    } else {
        $res = json_decode($result, true);
        //echo "Status: " . $res['status'] . "<br>";
        //echo "Message: " . $res['message'];
    }

    curl_close($ch);
?>

<script language="JavaScript">
  function CloseWindows() {
     windows.close();
  }
</script> 
