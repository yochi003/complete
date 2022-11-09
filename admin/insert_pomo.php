<?php
include 'condb.php';
$detail_pomo =$_POST['pomo'];
$pomoname= $_POST['pomoname'];
$pomo_number = $_POST['pomo_number'];
$pomosale= $_POST['pomosale'];
$pomo_status = $_POST['pomo_status'];
//อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['file2']['tmp_name'])) {
    $new_image_name = 'po_'.uniqid().".".pathinfo(basename($_FILES['file2']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "../pomo/".$new_image_name;
    move_uploaded_file($_FILES['file2']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "";
    }
    $sql="INSERT INTO promotion(pomo_img,detail_pomo,pomo_name,pomo_number,pomo_sale,pomo_status) 
    VALUES('$new_image_name','$detail_pomo','$pomoname','$pomo_number','$pomosale','$pomo_status') ";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script> alert('บันทึกข้อมูลเรียบร้อย');</script>";
        echo "<script> window.location='sh_pomo.php';</script>";
    }else{
        echo "<script> alert('ไม่สามารถบันทึกข้อมูลได้'); </script>";
    }
?>