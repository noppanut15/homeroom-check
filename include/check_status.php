<?php

$conn = conn();

$level = $_SESSION['level'];
$room = $_SESSION['room'];
$today = gettoday('d-m-Y');
// echo $today;

$sql = "SELECT id FROM checked_room WHERE level = $level AND room = $room AND date = '$today'";
$result = $conn->query($sql);
$row = $result->num_rows;

// echo $row;

if ($row === 1) {
    echo '<span class="h4 bg-success text-white p-1">บันทึกข้อมูลแล้ว</span>';
} else {
    echo '<span class="h4 bg-danger text-white p-1">ยังไม่บันทึกข้อมูล</span>';
}

?>
