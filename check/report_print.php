<?php 
$perm = 1;
include '../include/session.php';
include '../include/func.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงาน</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sarabun&display=swap');

        body {
            width: 100vw;
            font-family: 'Sarabun', sans-serif !important;
        }

        table,
        tr,
        td,
        th {
            border: solid 2px #000000 !important;
            border-collapse: collapse;
            margin: 0px auto;
        }

        td {
            padding: 5px 10px;
        }

        thead,
        th {
            font-weight: bold;
        }

        .print {
            margin: 0px auto;
        }

        @media print {
            body * {
                visibility: visible;
            }

            #no-print * {
                visibility: hidden;
            }

        }
    </style>
</head>
<?php
$type = $_GET['type'];

if ($type == -1) {
    $type_name = "ทั้งหมด";
} elseif ($type == 0) {
    $type_name = "มา";
} elseif ($type == 1) {
    $type_name = "ไม่เข้าร่วมทั้งหมด";
} elseif ($type == 2) {
    $type_name = "ลา";
} elseif ($type == 3) {
    $type_name = "ขาด";
} elseif ($type == 4) {
    $type_name = "สายโฮมรูม";
} elseif ($type == 5) {
    $type_name = "สายรร.";
} elseif ($type == 6) {
    $type_name = "กิจกรรม";
}
?>
<body>
    <div class="print">
        <table border="0">
            <thead>
                <tr>
                    <td align="center" colspan="5">รายงานการเข้าร่วมกิจกรรมหน้าเสาธง (<?php echo $type_name; ?>)</td>
                </tr>
                <tr>
                    <td align="center" colspan="5">ระดับชั้นมัธยมศึกษาปีที่ <?php echo $_SESSION[
                        'level'
                    ] .
                        '/' .
                        $_SESSION['room']; ?></td>
                </tr>
                <tr>
                    <td align="center" colspan="5">ประจำวันที่ <?php echo thai_date(
                        $ac = strtotime("-543 years", strtotime($_GET['date']))
                    ); ?></td>
                </tr>
                
                <?php include '../include/report_q.php'; ?>

            </tbody>
            <thead>
                <tr>
                    <td align="right" colspan="5">
                        ข้อมูล ณ วันที่
                        <?php
                        date_default_timezone_set('Asia/Bangkok');
                        $b = strtotime("+543 year");
                        $bud = date("d/m/Y", $b);
                        echo $bud;
                        ?>
                        เวลา
                        <?php echo date('H:i'); ?></td>
                </tr>
                <tr id="no-print">
                    <td align="center"><a href="javascript:window.print();">พิมพ์</a></td>
                    <td align="center"><a href="javascript:window.close();">ปิดหน้าต่างนี้</a></td>
                </tr>
            </thead>
        </table>

    </div>
</body>

</html>