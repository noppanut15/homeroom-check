<?php
$conn = conn();

if (isset($_POST['date'])) {
    $date = $_POST['date'];

    $level_sql = "SELECT DISTINCT level FROM student ORDER BY level ASC";
    $result_level = $conn->query($level_sql);
    //$level = $result_level->fetch_row();

    $whole_all_sum = 0;
    $whole_present_sum = 0;
    $whole_absent_sum = 0;

    while ($level = $result_level->fetch_row()) {
        $level_all_sum = 0;
        $level_present_sum = 0;
        $level_absent_sum = 0;

        $room_sql = "SELECT DISTINCT room FROM student WHERE level = $level[0] ORDER BY room ASC";
        $result_room = $conn->query($room_sql);

        while ($room = $result_room->fetch_row()) {
            // Check Have data
            $checked_sql = "SELECT id FROM checked_room WHERE level = $level[0] AND room = $room[0] AND date = '$date'";
            $checked_result = $conn->query($checked_sql);
            if ($checked_result->num_rows == 0) {
                echo '
                <tr>
                    <th>' .
                    $level[0] .
                    '</th>
                    <th>' .
                    $room[0] .
                    '</th>
                    <th colspan=4>ไม่มีการบันทึกข้อมูล</th>
                </tr>';
            } else {
                $all_count = "SELECT COUNT(stdID) FROM student WHERE level = $level[0] AND room = $room[0]";
                $absent_count = "SELECT COUNT(stdID) FROM student WHERE level = $level[0] AND room = $room[0] AND stdID IN (SELECT stdID FROM absent WHERE date = '$date')";

                $result_all_count = $conn->query($all_count);
                $result_absent_count = $conn->query($absent_count);

                $all = $result_all_count->fetch_row();
                $absent = $result_absent_count->fetch_row();

                $present = $all[0] - $absent[0];

                $level_all_sum += $all[0];
                $level_present_sum += $present;
                $level_absent_sum += $absent[0];

                echo '
                <tr style="vertical-align:middle">
                    <th>' .
                    $level[0] .
                    '</th>
                    <th>' .
                    $room[0] .
                    '</th>
                    <td>' .
                    $present .
                    '</td>
                    <td class="table-danger">' .
                    $absent[0] .
                    '</td>
                    <td>' .
                    $all[0] .
                    '</td>
                    <td style="text-align: right">
                        <a class="text-decoration-none" target="_blank" href="report/std_report.php?level=' .
                    $level[0] .
                    '&room=' .
                    $room[0] .
                    '"><button class="btn btn-sm btn-primary"><i class="fas fa-print"></i> ทั้งหมด ม.' .
                    $level[0] .
                    '/' .
                    $room[0] .
                    '</button></a>
                        <a class="text-decoration-none" target="_blank" href="report/std_report.php?level=' .
                    $level[0] .
                    '&room=' .
                    $room[0] .
                    '"><button class="btn btn-sm btn-warning"><i class="fas fa-print"></i> ลา ม.' .
                    $level[0] .
                    '/' .
                    $room[0] .
                    '</button></a>
                        <a class="text-decoration-none" target="_blank" href="report/std_report.php?level=' .
                    $level[0] .
                    '&room=' .
                    $room[0] .
                    '"><button class="btn btn-sm btn-danger"><i class="fas fa-print"></i> ขาด ม.' .
                    $level[0] .
                    '/' .
                    $room[0] .
                    '</button></a>
                        <a class="text-decoration-none" target="_blank" href="report/std_report.php?level=' .
                    $level[0] .
                    '&room=' .
                    $room[0] .
                    '"><button class="btn btn-sm btn-info"><i class="fas fa-print"></i> สาย ม.' .
                    $level[0] .
                    '/' .
                    $room[0] .
                    '</button></a>
                    </td>
                </tr>';
            }
        }

        echo '
        <tr class="table-primary" style="vertical-align:middle">
            <th align=center colspan=2 width=100>รวมชั้น.' .
            $level[0] .
            '</th>
            <th>' .
            $level_present_sum .
            '</th>
            <th>' .
            $level_absent_sum .
            '</th>
            <th>' .
            $level_all_sum .
            '</th>
            <td style="text-align: right">
                <a class="text-decoration-none" target="_blank" href="report/std_report.php?level=' .
            $level[0] .
            '"><button class="btn btn-sm btn-primary"><i class="fas fa-print"></i> ทั้งหมด ม.' .
            $level[0] .
            '</button></a>
                <a class="text-decoration-none" target="_blank" href="report/std_report.php?level=' .
            $level[0] .
            '"><button class="btn btn-sm btn-warning"><i class="fas fa-print"></i> ลา ม.' .
            $level[0] .
            '</button></a>
                <a class="text-decoration-none" target="_blank" href="report/std_report.php?level=' .
            $level[0] .
            '"><button class="btn btn-sm btn-danger"><i class="fas fa-print"></i> ขาด ม.' .
            $level[0] .
            '</button></a>
                <a class="text-decoration-none" target="_blank" href="report/std_report.php?level=' .
            $level[0] .
            '"><button class="btn btn-sm btn-info"><i class="fas fa-print"></i> สาย ม.' .
            $level[0] .
            '</button></a>           
            </td>
        </tr>';
        $whole_all_sum += $level_all_sum;
        $whole_present_sum += $level_present_sum;
        $whole_absent_sum += $level_absent_sum;
    }

    echo '
    <tr class="table-danger" style="vertical-align:middle">
        <th align=center colspan=2>รวมทั้งหมด</th>
        <th>' .
        $whole_present_sum .
        '</th>
        <th>' .
        $whole_absent_sum .
        '</th>
        <th>' .
        $whole_all_sum .
        '</th>
        <td style="text-align: right">
                <a class="text-decoration-none" target="_blank" href="report/std_report.php?level=0"><button class="btn btn-sm btn-primary"><i class="fas fa-print"></i> ทั้งหมด</button></a>
                <a class="text-decoration-none" target="_blank" href="report/std_report.php?level=0"><button class="btn btn-sm btn-warning"><i class="fas fa-print"></i> ลา</button></a>
                <a class="text-decoration-none" target="_blank" href="report/std_report.php?level=0"><button class="btn btn-sm btn-danger"><i class="fas fa-print"></i> ขาด</button></a>
                <a class="text-decoration-none" target="_blank" href="report/std_report.php?level=0"><button class="btn btn-sm btn-info"><i class="fas fa-print"></i> สาย</button></a>           
            </td>
    </tr>';
}
$conn->close();
