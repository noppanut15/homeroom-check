<?php
$conn = conn();

if (isset($_GET['date'])) {
    $level = $_GET['level'];
    $date = $_GET['date'];

    // Check have data??
    if ($level == 0) {
        $sql = "SELECT * FROM checked_room WHERE date = '$date' ORDER BY level ASC,room ASC";
    } else {
        $sql = "SELECT * FROM checked_room WHERE level = $level AND date = '$date' ORDER BY room ASC";
    }

    $result = $conn->query($sql);
    $num_row = $result->num_rows;

    if ($num_row == 0) {
        echo '<tr><th algin=center colspan="3" height=150><h1>ไม่มีการบันทึกข้อมูลประจำวัน</h1></th></tr>';
        //echo '<tr><th algin=center colspan="6" height=150><h1>' . $sql . '</h1></th></tr>';
    } else {
        while ($row = $result->fetch_assoc()) {
            $i = 1;
            echo '
            <tr>
                <th align="center">' .
                $i .
                '</th>
                <th align="center">ม.' .
                $row['level'] .
                '/' .
                $row['room'] .
                '</th>
                <td align="left">' .
                $row['detail'] .
                '</td>
            ';
            $i++;
        }
    }
}
