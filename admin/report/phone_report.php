<?php include '../../include/session.php';
include '../../include/func.php';
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

<body>
    <div class="print">
        <table border="0">
            <thead>
                <tr>
                    <td align="center" colspan="6">เบอร์โทรผู้ปกครองนักเรียนที่มาสาย</td>
                </tr>
                <tr>
                    <td align="center" colspan="6">
                        <?php
                        if ($_GET['level'] == 0) {
                            echo "ทุกระดับชั้น";
                        } else {
                            echo 'ระดับชั้นมัธยมศึกษาปีที่ ' . $_GET['level'];
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="6">ประจำวันที่ <?php echo thai_date(
                                                                    $ac = strtotime("-543 years", strtotime($_GET['date'])),
                                                                ); ?></td>
                </tr>
                <tr>
                    <th width="40" scope="col">ที่</th>
                    <th width="265" scope="col">ชื่อ-สกุล</th>
                    <th width="100" scope="col">ห้อง</th>
                    <th width="100" scope="col">เลขที่</th>
                    <th width="150" scope="col">เบอรโทรศัพท์</th>
                </tr>
            </thead>
            <tbody>
                <?php include '../../include/report_phone_q.php'; ?>

            </tbody>
            <thead>
                <tr>
                    <td align="right" colspan="6">
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