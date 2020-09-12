<?php
session_start();
include 'func.php';
$conn = conn();

$today = gettoday("d-m-Y");
$d = gettoday("d");
$m = gettoday("m");

if (isset($_SESSION['level']) && isset($_SESSION['room'])) {
    /* ลงข้อมูลสำรวจสภาพการเรียนการสอน */
    $level = $_SESSION['level'];
    $room = $_SESSION['room'];
    // echo $detail;

    // Check Duplicate
    $sql = "SELECT id FROM checked_room WHERE level = $level AND room = $room AND date = '$today'";
    //echo $sql;
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        for ($i = 1; $i <= count($_POST['std_']); $i++) {
            $no = $_POST['no'][$i];
            $latetype = $_POST['std_'][$no];
            $api_token = $_POST['api_token'][$i];


            if ($_POST['std_'][$no] != "") {
                $stdID = $_POST['stdID'][$no];
                //echo "stdID: ".$stdID;

                if ($latetype == 2) {
                    $typename = "ลา";
                } elseif ($latetype == 3) {
                    $typename = "ขาด";
                } elseif ($latetype == 4) {
                    $typename = "สายโฮมรูม";
                } elseif ($latetype == 5) {
                    $typename = "สายรร.";
                } elseif ($latetype == 6) {
                    $typename = "กิจกรรม";
                }

                if ($api_token != "") {
                    $message = "\n👨‍🎓 นายรัชชานนท์ ปานมาศ \n\n✏️ ไม่ได้เข้าร่วมกิจกรรมหน้าเสาธง\n📆 วันที่ $today\n🚫 สาเหตุ $typename";

                    echo $message;

                    sendlinemesg();

                    header('Content-Type: text/html; charset=utf8');
                    $res = notify_message($message, $api_token);
                    // echo $res;
                }
                $sql = "INSERT INTO absent (stdID, type, date) VALUES ($stdID,$latetype,'$today')";
                //echo $sql;
                $result = $conn->query($sql);
            }
        }

        //MARK AS Checked
        $sql = "INSERT INTO checked_room(level, room, date) VALUES ($level,$room,'$today')";
        //echo $sql;
        $result = $conn->query($sql);

        header("location: ../check/success.php");
    } else {
        header("location: ../check/dup.php");
    }
} else {
    header("location: ../check/error.php");
}

function sendlinemesg()
{
    define('LINE_API', "https://notify-api.line.me/api/notify");

    function notify_message($message, $token)
    {
        $queryData = array('message' => $message);
        $queryData = http_build_query($queryData, '', '&');
        $headerOptions = array(
            'http' => array(
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                    . "Authorization: Bearer " . $token . "\r\n"
                    . "Content-Length: " . strlen($queryData) . "\r\n",
                'content' => $queryData
            )
        );
        $context = stream_context_create($headerOptions);
        $result = file_get_contents(LINE_API, FALSE, $context);
        $res = json_decode($result);
        return $res;
    }
}
