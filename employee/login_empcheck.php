<?php
include 'condb.php';
session_start();

$emp_user = $_POST['emp_user'];
$emp_password = $_POST['emp_password'];

$sql = "SELECT * FROM emplooyee where emp_user='$emp_user' and emp_password='$emp_password' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if ($row > 0) {
    $_SESSION["emp_user"] = $row['emp_user'];
    $_SESSION["emp_password"] = $row['emp_password'];
    $_SESSION["empid"] = $row['emp_id'];
    $_SESSION["name"] = $row['emp_name'];
    $_SESSION["surname"] = $row['emp_sname']; 
    echo "<script> alert('เข้าสู่ระบบสำเร็จ'); </script>";
    echo "<script> window.location='index.php'; </script>";
} else {
    echo "<script> alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง'); </script>";
    echo "<script> window.location='login.php'; </script>";
}
?>