<?php
$conn = conn();

if (isset($_GET['date']) && isset($_GET['type'])) {
    $level = $_SESSION['level'];
    $room = $_SESSION['room'];
    $date = $_GET['date'];
    $type = $_GET['type'];

    // Check have data??

    $sql = "SELECT id,detail FROM checked_room WHERE level = $level AND room = $room AND date = '$date'";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    $data = $result->fetch_assoc();

    if ($row == 0) {
        echo '<tr><th algin=center colspan="6" height=150><h1>ไม่มีการบันทึกข้อมูลประจำวัน</h1></th></tr>';
    } else {
        echo '<tr>
                    <th width="40" scope="col">ที่</th>
                    <th width="265" scope="col">ชื่อ-สกุล</th>
                    <th width="100" scope="col">เลขที่</th>
                    <th width="100" scope="col">การเข้าร่วม</th>
                    <th width="100" scope="col">หมายเหตุ</th>
                </tr>
            </thead>
            <tbody>';
        // Query By type
        if ($type == -1) {
            $sql = "SELECT student.stdID, student.gender, student.name, student.lastname, student.no,absent.type FROM student LEFT JOIN absent ON student.stdID = absent.stdID AND absent.date = '$date' WHERE student.level = $level AND student.room = $room ORDER BY student.no ASC";
        } elseif ($type == 0) {
            $sql = "SELECT student.stdID, student.gender, student.name, student.lastname, student.no FROM student WHERE student.stdID NOT IN(SELECT absent.stdID FROM absent WHERE date = '$date') AND level = $level AND room = $room ORDER BY student.no ASC";
        } elseif ($type == 1) {
            $sql = "SELECT student.stdID, student.gender, student.name, student.lastname, student.no,absent.type FROM student RIGHT JOIN absent ON student.stdID = absent.stdID WHERE absent.date = '$date' AND level = $level AND room = $room ORDER BY student.no ASC";
        } else {
            $sql = "SELECT student.stdID, student.gender, student.name, student.lastname, student.no,absent.type FROM student RIGHT JOIN absent ON student.stdID = absent.stdID  WHERE absent.date = '$date' AND absent.type = $type AND level = $level AND room = $room ORDER BY student.no ASC";
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
                echo '<tr
                style="background-color:' .
                    $color .
                    ';"';
                echo '>
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
                    $row["no"] .
                    '</td>
                        <td align="center">' .
                    $typename .
                    '</td>
                        <td align="center"></td>
                    </tr>';
                $i++;
            }
        } else {
            echo '<tr><td class="text-center" colspan="6">ไม่พบผลการค้นหา</td></tr>';
        }
    }
}
