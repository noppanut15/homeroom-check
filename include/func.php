<?php
include 'config.php';

function conn()
{
    global $host;
    global $username;
    global $password;
    global $database;
    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        // die("Connection failed: " . $conn->connect_error);
        echo '
            <script type="text/javascript">
            Swal.fire({
                icon: "error",
                title: "Error Establishing a Database Connection",
                text: "กรุณาติดต่อผู้ดูแลระบบ",
                showConfirmButton: false
              })
            </script>';
    } else {
        echo '
        <script type="text/javascript">
        Swal.fire({
            title: "Database Connected",
            icon: "success",
            toast: true,
            position: "bottom-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        })
        </script>';
    }
   


    $conn->set_charset("utf8");

    return $conn;
}

function gettoday($format)
{
    date_default_timezone_set('Asia/Bangkok');
    $d = date("d");
    $m = date("m");
    $Y = date("Y") + 543;

    if ($format == "d-m-Y") {
        $fulldate = "$d-$m-$Y";
    } elseif ($format == "d") {
        $fulldate = "$d";
    } elseif ($format == "m") {
        $fulldate = "$m";
    }

    return $fulldate;
}

$thai_day_arr = [
    "อาทิตย์",
    "จันทร์",
    "อังคาร",
    "พุธ",
    "พฤหัสบดี",
    "ศุกร์",
    "เสาร์",
];
$thai_month_arr = [
    "0" => "",
    "1" => "มกราคม",
    "2" => "กุมภาพันธ์",
    "3" => "มีนาคม",
    "4" => "เมษายน",
    "5" => "พฤษภาคม",
    "6" => "มิถุนายน",
    "7" => "กรกฎาคม",
    "8" => "สิงหาคม",
    "9" => "กันยายน",
    "10" => "ตุลาคม",
    "11" => "พฤศจิกายน",
    "12" => "ธันวาคม",
];
function thai_date($time)
{
    global $thai_day_arr, $thai_month_arr;
    $thai_date_return = "วัน" . $thai_day_arr[date("w", $time)];
    $thai_date_return .= "ที่ " . date("j", $time);
    $thai_date_return .= " เดือน" . $thai_month_arr[date("n", $time)];
    $thai_date_return .= " พ.ศ." . (date("Y", $time) + 543);
    return $thai_date_return;
}
