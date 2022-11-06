<?php
// echo '<br>';
// print_r($_POST);
// echo '<br>';
include 'condb.php';
$admin_id= $_POST['admin_id'];
$ad_name = $_POST['ad_name'];
$ad_surname = $_POST['ad_surname'];
$admin_username = $_POST['admin_username'];
$admin_password = $_POST['admin_password'];
$email = $_POST['email'];
$phone = $_POST['phone'];

    $sql = "UPDATE admin SET
    admin_id  ='$admin_id', 
    ad_name = '$ad_name',
    ad_surname = '$ad_surname',
    admin_username	 = '$admin_username',
    admin_password = '$admin_password',
    email = '$email',
    phone = '$phone',
    WHERE admin_id='$admin_id'";

$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('แก้ไขข้อมูลเรียบร้อย');</script>";
    echo "<script> window.location='profile_am.php';</script>";
}else{
    echo "<script> alert('ไม่สามารถแก้ไขข้อมูลได้'); </script>";
}
?>