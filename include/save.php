<?php
include 'func.php'; // Include Function File
$conn = conn();

$today = gettoday("d-m-Y");

if (isset($_POST['level']) && isset($_POST['room'])) {
    /* ลงข้อมูลสำรวจสภาพการเรียนการสอน */
    $level = $_POST['level'];
    $room = $_POST['room'];
    $date = $_POST['date'];

    $stdID = $_POST['stdID'];
    $status = $_POST['status'];

    $num_student = count($_POST['stdID']);

    // Data Debugging
    // echo "Level: $level <br> Room:  $room <br> Date:  $date";
    echo "<br> Number Student: $num_student <br>";

    // for($i=1;$i<=$num_student;$i++){
    //     echo "$i) ID :  $stdID[$i] Status: $status[$i]<br>";
    // }

    for ($i = 1; $i <= $num_student; ++$i) {
        $check_have_data_sql = "SELECT id FROM absent WHERE stdID = $stdID[$i] AND date = '$date'";
        // echo $check_have_data_sql.'<br>';

        $check_have_data_result = $conn->query($check_have_data_sql);

        if ($check_have_data_result->num_rows == 0) {
            // If don't have data INSERT
            if ($status[$i] != "") {
                $sql = "INSERT INTO absent(stdID, type, date) VALUES ($stdID[$i],$status[$i],'$date')";
                // echo "$i $sql <br>";
                $result = $conn->query($sql);
            }
        } elseif ($check_have_data_result->num_rows == 1) {
            // If have data
            if ($status[$i] == "") {
                $sql = "DELETE FROM absent WHERE stdID = $stdID[$i] AND date = '$date'";
                // echo "$i $sql <br>";
                $result = $conn->query($sql);
            } else {
                $sql = "UPDATE absent SET type = $status[$i] WHERE stdID = $stdID[$i] AND date = '$date'";
                // echo "$i $sql <br>";
                $result = $conn->query($sql);
            }
        }
    }
    header("location: ../admin/success.php?level=$level&room=$room");
} else {
    header("location: ../admin/error.php");
}



