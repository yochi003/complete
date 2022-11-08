<?php
include 'condb.php';
$material_name = $_POST['matname'];

    $sql="INSERT INTO staple(material_name) 
    VALUES('$material_name') ";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script> alert('บันทึกข้อมูลเรียบร้อย');</script>";
        echo "<script> window.location='sh_mat.php';</script>";
    }else{
        echo "<script> alert('ไม่สามารถบันทึกข้อมูลได้'); </script>";
    }
?>