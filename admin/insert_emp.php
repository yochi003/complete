<?php
include 'condb.php';
$emp_name = $_POST['name'];
$emp_sname = $_POST['sname'];
$emp_user = $_POST['username'];
$emp_password = $_POST['password'];
$emp_email = $_POST['email'];
$emp_phone = $_POST['phone'];
$emp_address =$_POST['address'];

$sql = "INSERT INTO emplooyee(emp_name,emp_sname,emp_user,emp_password,emp_email,emp_phone,emp_address) 
values('$emp_name','$emp_sname','$emp_user','$emp_password','$emp_email','$emp_phone','$emp_address') ";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script> alert('บันทึกข้อมูลเรียบร้อย');</script>";
        echo "<script> window.location='sh_employee.php';</script>";
    }else{
        echo "<script> alert('ไม่สามารถบันทึกข้อมูลได้'); </script>";
    }
?>