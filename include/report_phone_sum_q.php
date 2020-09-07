<?php
$conn = conn();

if (isset($_POST['date'])) {
    $date = $_POST['date'];

    $level_sql = "SELECT DISTINCT level FROM student ORDER BY level ASC";
    $result_level = $conn->query($level_sql);
    //$level = $result_level->fetch_row();

    while ($level = $result_level->fetch_row()) {
        echo '
        <tr class="table-striped table-primary" style="vertical-align:middle">
            <th align=center width=200>ชั้นม.' .
            $level[0] .
            '</th>
            <td style="text-align: right">
                <a class="text-decoration-none" target="_blank" href="report/phone_report.php?level=' .
            $level[0] .
            '&date=' .
            $date .
            '"><button class="btn btn-sm btn-info"><i class="fas fa-print"></i> เบอร์โทรผู้ปกครองนักเรียนที่มาสาย ม.' .
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
        <th align=center>ทั้งหมด</th>
        <td style="text-align: right">
            <a class="text-decoration-none" target="_blank" href="report/phone_report.php?level=' .
        $level[0] .
        '&date=' .
        $date .
        '"><button class="btn btn-sm btn-info"><i class="fas fa-print"></i> เบอร์โทรผู้ปกครองนักเรียนที่มาสาย ทั้งหมด</button></a>
        </td>
    </tr>';
}
$conn->close();
