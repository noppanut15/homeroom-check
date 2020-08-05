<?php
session_start();
include 'func.php';
$conn = conn();

$today = gettoday("d-m-Y");
$d = gettoday("d");
$m = gettoday("m");

if (isset($_POST['group'])) {
    /* ลงข้อมูลสำรวจสภาพการเรียนการสอน */
    $level = $_SESSION['level'];
    $room = $_SESSION['room'];
    $detail = $_POST["detail"];
    // echo $detail;

    // Check Duplicate
    $sql = "SELECT id FROM checked_room WHERE level = $level AND room = $room AND date = '$today'";
    //echo $sql;
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        for ($i = 1; $i <= count($_POST['std_']); $i++) {
            $no = $_POST['no'][$i];
            $latetype = $_POST['std_'][$no];
            if ($_POST['std_'][$no] != "") {
                $stdID = $_POST['stdID'][$no];
                //echo "stdID: ".$stdID;
                $sql = "INSERT INTO absent (stdID, type, date) VALUES ($stdID,$latetype,'$today')";
                //echo $sql;
                $result = $conn->query($sql);
            }
        }

        //MARK AS Checked
        $sql = "INSERT INTO checked_room(level, room, date, detail) VALUES ($level,$room,'$today','$detail')";
        //echo $sql;
        $result = $conn->query($sql);

        header("location: ../check/success.php");
    } else {
        header("location: ../check/dup.php");
    }
} else {
    header("location: ../check/error.php");
}
