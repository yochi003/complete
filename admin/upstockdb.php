<?php
include 'condb.php';
$matid = $_POST['matid'];
$upstock = $_POST['upstock'];

$sql = "UPDATE staple SET material_number = material_number + $upstock WHERE material_id = $matid";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('เพิ่มสต็อกเรียบร้อย');</script>";
    echo "<script> window.location='sh_mat.php';</script>";
}else{
    echo "<script> alert('ไม่สามารถเพิ่มสต็อกได้'); </script>";
}

?>