<?php
include 'condb.php';

$id = $_GET['id'];
$sql = "DELETE FROM emplooyee WHERE emp_id = '$id'";
if (mysqli_query($conn, $sql)) {
    echo "<script> alert('ลบข้อมูลเรียบร้อย');</script>";
    echo "<script> window.location='sh_employee.php';</script>";
} else {
    echo "<script> alert('ลบข้อมูลไม่สำเร็จ'); </script>";
}
?>