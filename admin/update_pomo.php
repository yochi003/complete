<?php
include 'condb.php';
$pomo_id= $_POST['pomo_id'];
$pomoname= $_POST['pomoname'];
$pomo_number = $_POST['pomo_number'];
$pomosale= $_POST['pomosale'];
$pomo_img = $_POST['txtimg'];
$detailpomo = $_POST['detailpomo'];
// $pomo_open = $_POST['pomo_open'];
// $pomo_status = $_POST['pomo_status'];
if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
    $new_image_name = 'pr_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "../pomo/".$new_image_name;
    move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
    } else {
     $new_image_name = "$pomo_img";
    }

    $sql = "UPDATE promotion SET
    pomo_img = '$new_image_name',
    detail_pomo = '$detailpomo',
    pomo_name = '$pomoname',
    pomo_number = '$pomo_number',
    pomo_sale = '$pomosale',
    pomo_id = '$pomo_id'
    WHERE pomo_id ='$pomo_id'";

$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('แก้ไขข้อมูลเรียบร้อย');</script>";
    echo "<script> window.location='sh_pomo.php';</script>";
}else{
    echo "<script> alert('ไม่สามารถแก้ไขข้อมูลได้'); </script>";
}
?>