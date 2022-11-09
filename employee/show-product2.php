<?php
// เริ่มคำสั่ง Export ไฟล์ PDF
require_once __DIR__ . '/vendor/autoload.php';

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
            'BI' => 'THSarabunNew BoldItalic.ttf'
        ]
    ], 
    'default_font' => 'sarabun'
]);
 // สิ้นสุดคำสั่ง Export ไฟล์ PDF ในส่วนบน เริ่มกำหนดตำแหน่งเริ่มต้นในการนำเนื้อหามาแสดงผลผ่าน
$mpdf->SetFont('sarabun','',16);
ob_start();  //ฟังก์ชัน ob_start()
?>
<?php
include 'condb.php';
session_start();
if(!isset($_SESSION['emp_user'])){
    header('location:login_emp.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>
<?php include 'menu1.php';   ?>
<body>
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        

                        <div class="card mb-4 mt-4">
                            <div class="card-header">
                            <div class="container">
        <br>
        <h4 class="text-center"><b>แสดงข้อมูลวัตถุดิบคงเหลือ</b></h4>
        <br>
        <table class="table">
    <tr>
        <th>ชื่อวัตถุดิบ</th>
        <th class="text-end">จำนวนวัตถุดิบ</th>
    </tr>
    <?php
    $total=0;
    $sql="select * from staple order by material_id";
    $result = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($result)){
    // $total=$total + $row['price'];  
    ?>
    <tr>
        <td><?=$row['material_name']?></td>
        <td class="text-end"><?=$row['material_number']?></td>
        
        
    </tr>
    <?php
    }
    mysqli_close($conn);
    ?>
    </table>
    <!-- <h4 class="text-end">รวมเป็นเงิน: <?=number_format($total,2)?> </h4> -->
    <br>
    <?php
 // คำสั่งการ Export ไฟล์เป็น PDF
$html = ob_get_contents();      // เรียกใช้ฟังก์ชัน รับข้อมูลที่จะมาแสดงผล
$mpdf->WriteHTML($html);        // รับข้อมูลเนื้อหาที่จะแสดงผลผ่านตัวแปร $html
$mpdf->Output('Report.pdf');  //สร้างไฟล์ PDF ชื่อว่า myReport.pdf
ob_end_flush();                 // ปิดการแสดงผลข้อมูลของไฟล์ HTML ณ จุดนี้
?>

<!--การสร้างลิงค์ เรียกไฟล์ myReport.pdf แสดงผลไฟล์ PDF  -->
<a href="Report.pdf"><button class="btn btn-primary">Export PDF</button> </a>

    </div>        
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>