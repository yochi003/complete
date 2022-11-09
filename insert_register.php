<?php
include 'condb.php';
// echo "<pre>";
// print_r($_POST);
// echo "<pre>";
// รับค่าตัวแปรมาจากไฟล์ register
if(isset($_POST['reg_user'])){
$ctm_name = $_POST['ctm_name'];
$ctm_sname = $_POST['ctm_sname'];
$ctm_user = $_POST['ctm_user'];
$ctm_email = $_POST['ctm_email'];
$ctm_password = $_POST['ctm_password'];
$confirmctm_password = $_POST['confirmctm_password'];
$ctm_phone = $_POST['ctm_phone'];
$ctm_address = $_POST['ctm_address'];
if($ctm_password == $confirmctm_password){
    $sql = "INSERT INTO customer(ctm_name,ctm_sname,ctm_user,ctm_email,ctm_password,ctm_phone,ctm_address) 
    VALUES('$ctm_name','$ctm_sname','$ctm_user','$ctm_email','$ctm_password','$ctm_phone','$ctm_address')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script> alert('สมัครสมาชิกสำเร็จ'); </script> ";
        echo "<script> window.location='login.php'; </script> ";
    }else{
        echo "<script> alert('สมัครสมาชิกไม่สำเร็จ'); </script> ";
        echo "<script> window.location='register.php'; </script> ";
    }
}else{
    echo "<script> alert('รหัสผ่านไม่ตรงกัน'); </script> ";
    echo "<script> window.location='register.php'; </script> ";
}
}
?>