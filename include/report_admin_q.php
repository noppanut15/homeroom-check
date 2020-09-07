<?php
$conn = conn();

if (isset($_GET['date']) && isset($_GET['type'])) {
    $level = $_GET['level'];
    $date = $_GET['date'];
    $type = $_GET['type'];

    // Check have data??

    $sql = "SELECT id FROM checked_room WHERE level = $level AND date = '$date'";
    $result = $conn->query($sql);
    $row = $result->num_rows;

    if ($row == 0 && $level != 0) {
        echo '<tr><th algin=center colspan="6" height=150><h1>ไม่มีการบันทึกข้อมูลประจำวัน</h1></th></tr>';
        // echo '<tr><th algin=center colspan="6" height=150><h1>'.$sql.'</h1></th></tr>';
    } else {
        // Query By type
        if ($level == 0) {
            if ($type == 0) {
                $sql = "SELECT student.stdID, student.gender, student.name, student.lastname, student.level, student.room, student.no,absent.type FROM student RIGHT JOIN absent ON student.stdID = absent.stdID WHERE absent.date = '$date' ORDER BY student.level ASC, student.room ASC,  student.no ASC";
            } else {
                $sql = "SELECT student.stdID, student.gender, student.name, student.lastname, student.level, student.room, student.no,absent.type FROM student RIGHT JOIN absent ON student.stdID = absent.stdID  WHERE absent.date = '$date' AND absent.type = $type ORDER BY student.level ASC, student.room ASC,  student.no ASC";
            }
        } else {
            if ($type == 0) {
                $sql = "SELECT student.stdID, student.gender, student.name, student.lastname, student.level, student.room, student.no,absent.type FROM student RIGHT JOIN absent ON student.stdID = absent.stdID WHERE absent.date = '$date' AND level = $level ORDER BY student.room ASC, student.no ASC";
            } else {
                $sql = "SELECT student.stdID, student.gender, student.name, student.lastname, student.level, student.room, student.no,absent.type FROM student RIGHT JOIN absent ON student.stdID = absent.stdID  WHERE absent.date = '$date' AND absent.type = $type AND level = $level ORDER BY student.room ASC, student.no ASC";
            }
        }

        //echo $sql;

        $result = $conn->query($sql);
        $row = $result->num_rows;

        if ($row > 0) {
            // output data of each row
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row["type"] == 2) {
                    $typename = "ลา";
                    $color = '#ffc107';
                } elseif ($row["type"] == 3) {
                    $typename = "ขาด";
                    $color = '#dc3545';
                } elseif ($row["type"] == 4) {
                    $typename = "สายโฮมรูม";
                    $color = '#17a2b8';
                } elseif ($row["type"] == 5) {
                    $typename = "สายรร.";
                    $color = '#bd93f9';
                } elseif ($row["type"] == 6) {
                    $typename = "กิจกรรม";
                    $color = '#ff79c6';
                } elseif ($row["type"] == null) {
                    $typename = "มา";
                    $color = '';
                }
                echo '
                <tr>
                    <th align="center">' .
                    $i .
                    '</th>
                    <th align="left">' .
                    $row["gender"] .
                    '' .
                    $row["name"] .
                    '  ' .
                    $row["lastname"] .
                    '</th>
                    <td align="center">' .
                    $row["level"] .
                    '/' .
                    $row["room"] .
                    '</td>
                    <td align="center">' .
                    $row["no"] .
                    '</td>
                    <th align="center" style="color:' .
                    $color .
                    ';">' .
                    $typename .
                    '</td>
                    <td></td>
                </tr>';
                // echo '<tr><th algin=center colspan="6" height=150><h1>'.$sql.'</h1></th></tr>';
                $i++;
            }
        } else {
            echo '<tr><td style="text-align:center;" colspan="6" height=150><h1>ไม่พบผลการค้นหา</h1></td></tr>';
            // echo '<tr><th algin=center colspan="6" height=150><h1>'.$sql.'</h1></th></tr>';
        }
    }
}
