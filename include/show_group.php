<?php
$conn = conn();

$level = $_SESSION['level'];
$room = $_SESSION['room'];

$sql =
    "SELECT DISTINCT no_type FROM student WHERE level = '" .
    $level .
    "' AND room = '" .
    $room .
    "' ORDER BY no_type";

//echo $sql;
$resultSQL = mysqli_query($conn, $sql);

$group_name = [
    "1" => "คี่",
    "2" => "คู่",
    "3" => "พสวท.",
    "4" => "ภาษาฝรั่งเศส",
    "5" => "ภาษาจีน",
    "6" => "ภาษาญี่ปุ่น",
];
echo '<select name="group" id="group" class="form-select" onchange="showTable(this)">';
echo '<option value="" selected disabled>-XX-</option>';
while ($rows = mysqli_fetch_array($resultSQL)) {
    echo '<option value="' .
        $rows['no_type'] .
        '">' .
        $group_name[$rows['no_type']] .
        '</option>';
}
echo '</select>';

mysqli_close($conn);
?>
