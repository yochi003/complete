<?php
session_start();
include 'condb.php';
if(!isset($_SESSION['ctm_user'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงข้อมูลสินค้า</title>
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
</head>

<body>
    <?php include 'navbar.php'?>
    <div class="container">
        <div class="row">
            <?php
        $sql = "SELECT * FROM promotion 
            ORDER BY pomo_id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $pomo_status = $row['pomo_status'];
        ?>
            <div class="col-sm-3">
                <div class="text-center">
                    <img src="./pomo/<?= $row['pomo_img'] ?>" width="300px" height="450" class="mt-5 p-2 my-2 border">
                    โค้ดโปรโมชั่น : <h3 class="text-success"><?=$row['pomo_name']?></h3><br>
                    รายละเอียดโปรโมชั่น : <?=$row['detail_pomo']?> <br>
                    สถานะ :                 
                    <?php
                        if($pomo_status == 1){
                            echo "<b style = 'color:green'>ใช้งานได้</b>";
                        }else if($pomo_status == 2){
                            echo "<b style = 'color:red'>หมดอายุ</b>";
                        }
                    ?>
                    <br>
                </div>
                <br>
            </div>
            <?php
        }
        mysqli_close($conn)
            ?>
</body>

</html>