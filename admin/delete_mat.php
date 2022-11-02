<?php
include 'condb.php';
$id = $_GET['id'];

$sql = "DELETE FROM staple WHERE material_id = '$id'";

$result=mysqli_query($conn,$sql);

if(mysqli_query($conn,$sql)){
    echo "<script> alert('ลบข้อมูลเรียบร้อย');</script>";
    echo "<script> window.location='sh_mat.php';</script>";
}else{
    echo "<script> alert('ลบข้อมูลไม่สำเร็จ'); </script>";
}

?>