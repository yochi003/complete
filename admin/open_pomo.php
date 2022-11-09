<?php
include 'condb.php';
$ids = $_GET['id'];

$sql = "UPDATE promotion SET pomo_status = 1  WHERE pomo_id = '$ids' ";
$result = mysqli_query($conn,$sql);
if($result){
    
    echo "<script>window.location='sh_pomo.php';</script>";
}else{
    echo "<script>alert('ไม่สามารถลบข้อมูลได้');</script>";     
}

mysqli_close($conn);

?>