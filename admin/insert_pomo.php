<?php
include 'condb.php';

//อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['file2']['tmp_name'])) {
    $new_image_name = 'po_'.uniqid().".".pathinfo(basename($_FILES['file2']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "../pomo/".$new_image_name;
    move_uploaded_file($_FILES['file2']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "";
    }
    $sql="INSERT INTO promotion(pomo_img) 
    VALUES('$new_image_name') ";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script> alert('บันทึกข้อมูลเรียบร้อย');</script>";
        echo "<script> window.location='fr_pomo.php';</script>";
    }else{
        echo "<script> alert('ไม่สามารถบันทึกข้อมูลได้'); </script>";
    }
?>