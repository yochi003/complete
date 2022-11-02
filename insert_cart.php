<?php 
session_start();
include 'condb.php';
    $cusId = $_SESSION['userid'];
    $cusName=$_POST['cus_name'];
    $cusAddress=$_POST['cus_add'];
    $cusTel=$_POST['cus_tel'];

    // อัปโหลดสลิป
    if(is_uploaded_file($_FILES['slip']['tmp_name'])){
        $new_image_name = 'slip_'.uniqid().".".pathinfo(basename($_FILES['slip']['name']), PATHINFO_EXTENSION);
        $image_upload_path = "./slip/".$new_image_name;
        move_uploaded_file($_FILES['slip']['tmp_name'],$image_upload_path);
    }else{
        $new_image_name = "";
    }
    $sql="insert into tb_order(cus_id,cus_name,address,telephone,total_price,order_status,slip) 
    values('$cusId','$cusName','$cusAddress','$cusTel','" . $_SESSION["sum_price"] . "','1','$new_image_name')";
    mysqli_query($conn,$sql);  

    $orderID = mysqli_insert_id($conn);
    $_SESSION["order_id"] = $orderID;

    for ($i=0; $i <= (int)$_SESSION["intLine"]; $i++){
        if(($_SESSION["strProductID"][$i]) != ""){
        
        $sql1="select * from product where pro_id = '" . $_SESSION["strProductID"][$i] ."' ";
        $result1=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_array($result1);
        $price = $row1['price'];
        $total= $_SESSION["strQty"][$i] * $price;

        $sql2="insert into order_detail(orderID,pro_id,orderPrice,orderQty,Total)
        values('$orderID','" . $_SESSION["strProductID"][$i] . "','$price',
        '" . $_SESSION["strQty"][$i] ."','$total')" ;
        if(mysqli_query($conn,$sql2)){
            //ตัดสต็อก
        $sql3 = "update product set amount= amount - '" . $_SESSION["strQty"][$i] . "'
        where pro_id='" . $_SESSION["strProductID"][$i] . "'" ;
        mysqli_query($conn,$sql3);
        // echo "<script> alert('บันทึกข้อมูลเรียบร้อยแล้ว') </script>";
        echo "<script> window.location='print_order.php'; </script>";
        }  

        }

}
//-----line Notify
if(isset($_POST['submit'])){
    $date = date("d-m-Y");

    $sToken = "JGGNCflgdXFo2akAy61qU1DRhTFCQRXC3EQG16gxjqS";
    $sMessage = "วันที่ ". $date ."\n";
	$sMessage .= "มีออเดอร์เข้าเเล้ว\n";
    $sMessage .= "เลขที่ใบสั่งซื้อ" . $_SESSION["order_id"] . "\n";
    $sMessage .= "ลูกค้าชื่อ" . $cusName . "\n";
    $sMessage .= "เบอร์โทรศัพท์ " . $cusTel . "\n";

	
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
    

	
    if($result){
        $_SESSION['success'] = "ส่งข้อมูลการเเจ้งเตือน Line Notify เรียบร้อยเเล้ว";
        header("location: print_order.php");
    }else{
        $_SESSION['error'] = "ส่งข้อมูลการเเจ้งเตือน Line Notify ไม่สำเร็ว";
        header("location: print_order.php");

    }

	curl_close( $chOne );

}

    mysqli_close($conn);
    unset($_SESSION["intLine"]);
    unset($_SESSION["strProductID"]);
    unset($_SESSION["strQty"]);
    unset($_SESSION["sum_price"]);
    // session_destroy();
?>