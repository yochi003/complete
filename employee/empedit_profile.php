<?php
// echo '<br>';
// print_r($_POST);
// echo '<br>';
include 'condb.php';
$empid= $_POST['empid'];
$name = $_POST['name'];
$sname = $_POST['sname'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

    $sql = "UPDATE emplooyee SET
    emp_id  ='$empid', 
    emp_name = '$name',
    emp_sname = '$sname',
    emp_user	 = '$username',
    emp_password = '$password',
    emp_email = '$email',
    emp_phone = '$phone',
    emp_address = '$address'
    WHERE emp_id='$empid' ";

$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('แก้ไขข้อมูลเรียบร้อย');</script>";
    echo "<script> window.location='profile_emp.php';</script>";
}else{
    echo "<script> alert('ไม่สามารถแก้ไขข้อมูลได้'); </script>";
}
?>