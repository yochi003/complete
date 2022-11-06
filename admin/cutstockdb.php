<?php
include 'condb.php';
$matid = $_POST['matid'];
$cutstock = $_POST['cutstock'];

$sql = "UPDATE staple SET material_number = material_number - $cutstock WHERE material_id = $matid";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('ตัดสต็อกเรียบร้อย');</script>";
    echo "<script> window.location='sh_mat.php';</script>";
}else{
    echo "<script> alert('ไม่สามารถตัดสต็อกได้'); </script>";
}

?>