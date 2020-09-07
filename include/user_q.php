<?php
$conn = conn();

$sql = "SELECT * FROM teacher";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $i = 1;
    while ($row = $result->fetch_assoc()) {
        if ($row['role'] == 99) {
            $rolename = "ผู้ดูแลระบบ";
        } elseif ($row['role'] == 1) {
            $rolename = "ครูที่ปรึกษา";
        }
        echo '
            <tr>
                <th>' .
            $i .
            '</th>
                <th>' .
            $row['level'] .
            '</th>
                <th>' .
            $row['room'] .
            '</th>
                <td>' .
            $row['gender'] .
            '</td>
                <td>' .
            $row['name'] .
            '</td>
                <td>' .
            $row['lastname'] .
            '</td>
                <td>' .
            $rolename .
            '</td>
                <td>' .
            $row['last_login'] .
            '</td>
                <td>
                    <a href="edit.php?id=' .
            $row['id'] .
            '" class="text-decoration-none"><button class="btn btn-sm btn-warning"><i class="fas fa-user-edit"></i> แก้ไข</button></a>
                    <a href="del.php?id=' .
            $row['id'] .
            '" class="text-decoration-none"><button class="btn btn-sm btn-danger"><i class="fas fa-user-minus"></i> ลบ</button></a>
                </td>
            </tr>';
        $i++;
    }
} else {
    echo '
        <tr>
            <td colspn=9>ไม่พบผลการค้นหา<td>
        </tr>';
}

?>
