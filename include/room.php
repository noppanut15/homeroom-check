<?php
include 'func.php';
$conn = conn();
$level = $_GET['level'];

$sql = "SELECT DISTINCT room FROM student WHERE level = $level ORDER BY room ASC";

$result = $conn->query($sql);

if ($result->num_rows != 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' .
            $row['room'] .
            '">' .
            $row['room'] .
            '</option>';
    }
} else {
    echo '<option value="">ERROR</option>';
}
?>

