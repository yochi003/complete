<?php
session_start();
if(isset($_POST['submit'])){
    $panme=$_POST['pname'];
    $email=$_POST['email'];

    $sToken = "JGGNCflgdXFo2akAy61qU1DRhTFCQRXC3EQG16gxjqS";
	$sMessage = "ลงทะเบียนเรียบร้อย";
    $sMessage .= "ชื่อ: ". $panme . "\n";
    $sMessage .= "e-mail: ". $panme . "\n";

	
	$chOne = curl_init(); 
	curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt( $chOne, CURLOPT_POST, 1); 
	curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
	$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
	curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
	curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
	$result = curl_exec( $chOne ); 

	//Result error 
	
    if(curl_error($chOne)) 
	{ 
		echo 'error:' . curl_error($chOne); 
	} 
	else { 
		$result_ = json_decode($result, true); 
		echo "status : ".$result_['status']; echo "message : ". $result_['message'];
	} 

    /*if($result){
        $_SESSION['success'] = "ส่งข้อมูลการเเจ้งเตือน Line Notify เรียบร้อยเเล้ว";
        header("location: fr_user_test.php");
    }else{
        $_SESSION['error'] = "ส่งข้อมูลการเเจ้งเตือน Line Notify ไม่สำเร็ว";
        header("location: fr_user_test.php");
    }
	*/
	curl_close( $chOne );

}

?>