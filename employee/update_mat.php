<?php
include 'condb.php';
$matid= $_POST['matid'];
$matname = $_POST['matname'];
$matnum = $_POST['matnum'];

    $sql = "UPDATE staple SET
    material_id  ='$matid', 
    material_name = '$matname',
    material_number = '$matnum'
    WHERE material_id='$matid' ";

$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('แก้ไขข้อมูลเรียบร้อย');</script>";
    echo "<script> window.location='sh_mat.php';</script>";
}else{
    echo "<script> alert('ไม่สามารถแก้ไขข้อมูลได้'); </script>";
}
?>