<?php
include 'condb.php';
$material_name = $_POST['matname'];
$material_number = $_POST['matnum'];

    $sql="INSERT INTO staple(material_name,material_number) 
    VALUES('$material_name','$material_number') ";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script> alert('บันทึกข้อมูลเรียบร้อย');</script>";
        echo "<script> window.location='fr_mat.php';</script>";
    }else{
        echo "<script> alert('ไม่สามารถบันทึกข้อมูลได้'); </script>";
    }
?>