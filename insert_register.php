<?php
include 'condb.php';
// echo "<pre>";
// print_r($_POST);
// echo "<pre>";
// รับค่าตัวแปรมาจากไฟล์ register
$ctm_name = $_POST['ctm_name'];
$ctm_sname = $_POST['ctm_sname'];
$ctm_user = $_POST['ctm_user'];
$ctm_email = $_POST['ctm_email'];
$ctm_password = $_POST['ctm_password'];
$ctm_phone = $_POST['ctm_phone'];
$ctm_address = $_POST['ctm_address'];

//คำสั้งเพิ่งข้อมูลลงตาราง member

$sql = "INSERT INTO customer(ctm_name,ctm_sname,ctm_user,ctm_email,ctm_password,ctm_phone,ctm_address) 
Values('$ctm_name','$ctm_sname','$ctm_user','$ctm_email','$ctm_password','$ctm_phone','$ctm_address') ";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "<script> alert('บันทึกข้อมูลเรียบร้อย'); </script> ";
    echo "<script> window.location='register.php'; </script> ";
} else {
    echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    echo "<script> alert('บันทึกข้อมูลไม่ได้'); </script>";

}
mysqli_close($conn);
?>
// session_start();
// include('condb.php');

// if(isset($_POST['reg_user'])){
// $ctm_name = $_POST['ctm_name'];
// $ctm_sname = $_POST['ctm_sname'];
// $ctm_user = $_POST['ctm_user'];
// $ctm_email = $_POST['ctm_email'];
// $ctm_password = $_POST['ctm_password1'];
// $ctm_password = $_POST['ctm_password2'];
// $ctm_phone = $_POST['ctm_phone'];
// $ctm_address = $_POST['ctm_address'];

// if()
// }