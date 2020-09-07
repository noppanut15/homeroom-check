<?php
$conn = conn();

if (isset($_GET['date']) && isset($_GET['level'])) {
    $date = $_GET['date'];
    $level = $_GET['level'];

    if ($level == 0) {
        $sql = "SELECT student.stdID, student.level, student.room, student.no, student.gender, student.name, student.lastname, student.p_phone FROM student WHERE stdID IN(SELECT stdID FROM absent WHERE date = '$date' AND type = 4) ORDER BY student.level ASC , student.room, student.no ASC";
    } else {
        $sql = "SELECT student.stdID, student.level, student.room, student.no, student.gender, student.name, student.lastname, student.p_phone FROM student WHERE stdID IN(SELECT stdID FROM absent WHERE date = '$date' AND type = 4) AND student.level = $level ORDER BY student.room, student.no ASC";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            echo '
                    <tr>
                        <th align="center">' .
                $i .
                '</th>
                        <td align="left">' .
                $row['gender'] .
                '' .
                $row['name'] .
                '  ' .
                $row['lastname'] .
                '</td>
                        <td align="center">' .
                $row['level'] .
                '/' .
                $row['room'] .
                '</td>
                        <td align="center">' .
                $row['no'] .
                '</td>
                        <th align="center">' .
                $row['p_phone'] .
                '</th>
                    </tr>';

            $i++;
        }
    } else {
        echo '<tr><td style="text-align:center;" colspan="5" height=150><h1>ไม่พบผลการค้นหา</h1></td></tr>';
    }
}

?>
