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
        $all_count = "SELECT COUNT(stdID) FROM student WHERE level = $level[0]";
        $absent_count = "SELECT COUNT(stdID) FROM student WHERE level = $level[0] AND stdID IN (SELECT stdID FROM absent WHERE date = '$date')";

        $result_all_count = $conn->query($all_count);
        $result_absent_count = $conn->query($absent_count);

        $level_all = $result_all_count->fetch_row();
        $level_absent = $result_absent_count->fetch_row();

        $level_present = intval($level_all[0]) - intval($level_absent[0]);

        echo '
        <tr class="table-striped table-primary" style="vertical-align:middle">
            <th align=center width=200>รวมชั้น.' .
            $level[0] .
            '</th>
            <th>' .
            $level_present .
            '</th>
            <th>' .
            $level_absent[0] .
            '</th>
            <th>' .
            $level_all[0] .
            '</th>
            <td style="text-align: right">
                <a class="text-decoration-none" target="_blank" href="report/std_report.php?level=' .
            $level[0] .
            '&type=0&date=' .
            $date .
            '"><button class="btn btn-sm btn-primary"><i class="fas fa-print"></i> ทั้งหมด ม.' .
            $level[0] .
            '</button></a>
                <a class="text-decoration-none" target="_blank" href="report/std_report.php?level=' .
            $level[0] .
            '&type=2&date=' .
            $date .
            '"><button class="btn btn-sm btn-warning"><i class="fas fa-print"></i> ลา ม.' .
            $level[0] .
            '</button></a>
                <a class="text-decoration-none" target="_blank" href="report/std_report.php?level=' .
            $level[0] .
            '&type=3&date=' .
            $date .
            '"><button class="btn btn-sm btn-danger"><i class="fas fa-print"></i> ขาด ม.' .
            $level[0] .
            '</button></a>
                <a class="text-decoration-none" target="_blank" href="report/std_report.php?level=' .
            $level[0] .
            '&type=4&date=' .
            $date .
            '"><button class="btn btn-sm btn-info"><i class="fas fa-print"></i> สายโฮมรูม ม.' .
            $level[0] .
            '</button></a>           
                <a class="text-decoration-none" target="_blank" href="report/std_report.php?level=' .
            $level[0] .
            '&type=5&date=' .
            $date .
            '"><button class="btn btn-sm" style="background-color:#bd93f9;"><i class="fas fa-print"></i> สายรร. ม.' .
            $level[0] .
            '</button></a>
                <a class="text-decoration-none" target="_blank" href="report/std_report.php?level=' .
            $level[0] .
            '&type=6&date=' .
            $date .
            '"><button class="btn btn-sm" style="background-color:#ff79c6;"><i class="fas fa-print"></i> กิจกรรม ม.' .
            $level[0] .
            '</button></a>           
            </td>
        </tr>';
        $whole_all_sum += $level_all[0];
        $whole_present_sum += $level_present;
        $whole_absent_sum += $level_absent[0];
    }

    echo '
    <tr class="table-danger" style="vertical-align:middle">
        <th align=center>รวมทั้งหมด</th>
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
                <a class="text-decoration-none" target="_blank" href="report/std_report.php?level=0&type=0&date=' .
        $date .
        '"><button class="btn btn-sm btn-primary"><i class="fas fa-print"></i> ทั้งหมด</button></a>
                <a class="text-decoration-none" target="_blank" href="report/std_report.php?level=0&type=2&date=' .
        $date .
        '"><button class="btn btn-sm btn-warning"><i class="fas fa-print"></i> ลา</button></a>
                <a class="text-decoration-none" target="_blank" href="report/std_report.php?level=0&type=3&date=' .
        $date .
        '"><button class="btn btn-sm btn-danger"><i class="fas fa-print"></i> ขาด</button></a>
                <a class="text-decoration-none" target="_blank" href="report/std_report.php?level=0&type=4&date=' .
        $date .
        '"><button class="btn btn-sm btn-info"><i class="fas fa-print"></i> สายโฮมรูม</button></a>           
                <a class="text-decoration-none" target="_blank" href="report/std_report.php?level=0&type=5&date=' .
        $date .
        '"><button class="btn btn-sm" style="background-color:#bd93f9;"><i class="fas fa-print"></i> สายรร.</button></a>
                <a class="text-decoration-none" target="_blank" href="report/std_report.php?level=0&type=6&date=' .
        $date .
        '"><button class="btn btn-sm" style="background-color:#ff79c6;"><i class="fas fa-print"></i> กิจกรรม</button></a>           
        </td>
    </tr>';
}
$conn->close();
