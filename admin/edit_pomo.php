<?php
include 'condb.php';
$idpro = (isset($_GET['id'])) ? $_GET['id'] : '';
$sql = "SELECT * FROM promotion WHERE pomo_id='$idpro' ";
$result= mysqli_query($conn,$sql);
$rs=mysqli_fetch_array($result);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลสินค้า</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
     <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<body>
<?php include 'menu1.php'   ?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
<div class="card mb-4 mt-4">
<div class="card-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            <div class="alert alert-primary  h4 text-center mb-4" role="alert">
                แก้ไขข้อมูลสินค้า
            </div>

                <form name="form1" method="post" action="update_pomo.php" enctype="multipart/form-data">
                <label> รหัสสินค้า</label>
                <input type="text" name="pomo_id" class="form-control" readonly value="<?php echo $rs['pomo_id']?>" >
                <label> รูปภาพ </label><br><br>
                 <img src="../pomo/<?php echo $rs['pomo_img']?>"  width="100px" height="150px" ><br><br>
                <input type="file" name="file1" > <br> <br>
                <input type="hidden" name="txtimg" class="form-control" value="<?php echo $rs['pomo_img']?>" >
                 
                <button type="submit" class="btn btn-success">แก้ไข</button>
                <a class="btn btn-danger" href="sh_pomo.php" role="button">ยกเลิก</a>
                </form>
            </div>
            <script src="../js/bootstrap.bundle.min.js"></script>
        </div>
    </div>
</body>
</html>